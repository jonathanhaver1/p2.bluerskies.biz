<?php

/**
* Process and Display user posts
**/
class posts_controller extends base_controller {

	public function _construct() {
		parent::_construct();

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }
	}

	/**
	* Add a Post
	**/
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

		# Make sure the fields has not been left blank
  		if (empty($_POST['content'])) {

		# if the fied has been left blank - alert user
  			$this->template->content = View::instance('v_error_empty_fields');
			$this->template->title = "Empty Fields";
			echo $this->template;

		# if the field has been filled in
		} else {

			# Associate this post with this user
			$_POST['user_id']  = $this->user->user_id;

			# Unix timestamp of when this post was created / modified
			$_POST['created']  = Time::now();
			$_POST['modified'] = Time::now();

			# Insert into database
			DB::instance(DB_NAME)->insert('posts', $_POST);

			# Setup view
			$this->template->content = View::instance('v_posts_added_successfully');
			$this->template->title = "Success";
			echo $this->template;
		}
	}

	/**
	* Provide an index of posts
	**/
	public function index() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }

		# Query whehther Posts exist
		$q = '	SELECT post_id
				FROM posts
		        INNER JOIN users_users 
		            ON posts.user_id = users_users.user_id_followed
		        INNER JOIN users 
		            ON posts.user_id = users.user_id
		        WHERE users_users.user_id = '.$this->user->user_id;
		$post_exists = DB::instance(DB_NAME)->select_field($q);

		# If no posts to display, display 'Sorry No Profile'
		if (!$post_exists) {
			#Setup view
			$this->template->content = View::instance('v_posts_no_posts');
			$this->template->title = "No Posts";

			# Render the View
			echo $this->template;
		} else {

		# Set up the View
		$this->template->content = View::instance('v_posts_index');
		$this->template->title   = "Posts";

    	# Query the database for post information
    	$q = '	SELECT 
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

		$posts = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View and render the View
		$this->template->content->posts = $posts;
		echo $this->template;
		}
	}


	/**
	* Follow and Unfollow other users
	**/
	public function users() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }

		# Set up the View
		$this->template->content = View::instance("v_posts_users");
		$this->template->title   = "Users";

		# Query for all the users
		$q = "	SELECT *
				FROM users";

		$users = DB::instance(DB_NAME)->select_rows($q);

		# Query for connections
		$q = "	SELECT * 
				FROM users_users
				WHERE user_id = ".$this->user->user_id;

		# select_array will return our results in an array and use the "users_id_followed" field as the index.
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

		# Insert into database
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

	/**
	* Email a Post
	**/
	public function email($post_id = null) {

		# Query whehther friends exist
		$q = '	SELECT friend_id
				FROM friends
		        WHERE user_id = '.$this->user->user_id;
				$friends_exist = DB::instance(DB_NAME)->select_field($q);

		# If no friends to display, display 'Sorry No Friends'
		if (!$friends_exist) {
			#Setup view
			$this->template->content = View::instance('v_friends_no_friends');
			$this->template->title = "No Friends registered";

			# Render the View
			echo $this->template;

		# If friends to display
		} else {

			##Setup view
			$this->template->content = View::instance('v_posts_email');
			$this->template->title = "Email the Post to a Friend";
			$this->template->content->post_id = $post_id;

	   		# Query for list of friends
	    	$q = 'SELECT 
	    			friends.friend_id,
	            	friends.first_name,
	            	friends.last_name,
	            	friends.email
	        		FROM friends
	        		WHERE friends.user_id = '.$this->user->user_id;

			$friends = DB::instance(DB_NAME)->select_rows($q);

			# Pass data to the View and render it
			$this->template->content->friends = $friends;

			echo $this->template;
		}
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

		##Setup view
		$this->template->content = View::instance('v_posts_emailed_successfully');
		$this->template->title = "Post emailed";

		#Render template
		echo $this->template;
	}

	/**
	* Like a Post
	**/
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