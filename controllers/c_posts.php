<?php

class posts_controller extends base_controller {

	public function _construct() {
		parent::_construct();

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }
	}

	public function add() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }

	##Setup view
	$this->template->content = View::instance('v_posts_add');
	$this->template->title = "Compose a Post";

	#Render template
	echo $this->template;

	}

	public function p_add() {

		# Associate this post with this user
		$_POST['user_id']  = $this->user->user_id;

		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('posts', $_POST);

		# Quick and dirty feedback

			##Setup view
			$this->template->content = View::instance('v_posts_added_successfully');
			$this->template->title = "Success";
			echo $this->template;
	}

	public function index() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }

		# Set up the View
		$this->template->content = View::instance('v_posts_index');
		$this->template->title   = "Posts";

		# Build the query
    	# Query
    	$q = 'SELECT 
            posts.post_id,
            posts.content,
            posts.created,
            posts.likes,
            posts.user_id AS post_user_id,
            users_users.user_id AS follower_id,
            users.first_name,
            users.last_name
        FROM posts
        INNER JOIN users_users 
            ON posts.user_id = users_users.user_id_followed
        INNER JOIN users 
            ON posts.user_id = users.user_id
        WHERE users_users.user_id = '.$this->user->user_id;

		# Run the query
		$posts = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->posts = $posts;

		# Render the View
		echo $this->template;
	}


	public function users() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }

		# Set up the View
		$this->template->content = View::instance("v_posts_users");
		$this->template->title   = "Users";

		# Build the query to get all the users
		$q = "	SELECT *
				FROM users";

		# Execute the query to get all the users. 
		# Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);

		# Build the query to figure out what connections does this user already have? 
		# I.e. who are they following
		$q = "	SELECT * 
				FROM users_users
				WHERE user_id = ".$this->user->user_id;

		# Execute this query with the select_array method
		# select_array will return our results in an array and use the "users_id_followed" field as the index.
		# This will come in handy when we get to the view
		# Store our results (an array) in the variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

		# Pass data (users and connections) to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;

		# Render the view
		echo $this->template;
	}

	public function follow($user_id_followed) {

		# Prepare the data array to be inserted
		$data = Array(
		"created" => Time::now(),
		"user_id" => $this->user->user_id,
		"user_id_followed" => $user_id_followed
		);

		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# Send them back
		Router::redirect("/posts/users");
	}

	public function unfollow($user_id_followed) {

		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# Send them back
		Router::redirect("/posts/users");

	}

	public function email($post_id = null) {

		##Setup view
		$this->template->content = View::instance('v_posts_email');
		$this->template->title = "Email the Post to a Friend";
		$this->template->content->post_id = $post_id;

		# Prepare list of friends
		# Build the query
   		# Query
    	$q = 'SELECT 
    			friends.friend_id,
            	friends.first_name,
            	friends.last_name,
            	friends.email
        		FROM friends';

		# Run the query
		$friends = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->friends = $friends;

		# Render the View
		echo $this->template;
	}

	public function p_email($friend_id = null, $post_id = null) {

   		# Query name and email address of the friend
    	$q = "SELECT 
            	email,
            	first_name,
            	last_name
        		FROM friends
                WHERE friend_id = ".$friend_id;
		$email = DB::instance(DB_NAME)->select_row($q);

		# Query the post and the author
    	$q = 'SELECT 
            posts.content,
            posts.created,
            users.first_name,
            users.last_name
        FROM posts
        INNER JOIN users 
            ON posts.user_id = users.user_id
        WHERE posts.post_id = '.$post_id;
		$post = DB::instance(DB_NAME)->select_row($q);

		# Build the Email Array
		$to[] = Array("name" => $email['first_name']." ".$email['last_name'], "email" => $email['email']);
		$from = Array("name" => APP_NAME, "email" => APP_EMAIL);
		$subject = "A post that may interest you";
		$body =
					"Hi ".$email['first_name'].",\n
					\n
					I just found this post that may interest you:\n
					\n
					Author: ".$post['first_name']." ".$post['last_name']."\n
					Date: ".$post['created']."\n
					Post: ".$post['content']."\n";
		$cc  = "";
		$bcc = "";

		# Send email
		$email = Email::send($to, $from, $subject, $body, true, $cc, $bcc);
	}

		public function like($post_id = null) {

		# get current likes information from database
   		$q = 'SELECT 
            	likes
        		FROM posts
        		WHERE post_id = '.$post_id;
		$likes = DB::instance(DB_NAME)->select_field($q);

		# increment the value by 1
		$likes += 1;

		# update the database
		$data = Array("likes" => $likes);
		DB::instance(DB_NAME)->update("posts", $data, "WHERE post_id = '".$post_id."'");

		# Send them back
		Router::redirect("/posts/index");
	}

}

?>