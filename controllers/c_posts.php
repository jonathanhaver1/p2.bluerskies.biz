<?php

class posts_controller extends base_controller {

	public function _construct() {
		parent::_construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
		}
	}

	public function add() {

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

	public function display_posts() {
		
		$posts = array();
		$userid = 529;

		$sql = "SELECT body, stamp
				FROM posts
				WHERE user_id = '$userid'
				ORDER BY stamp
				DESC";
		$result = mysql_query($sql);

		echo $result;

	}

	public function index() {

	# Set up the View
	$this->template->content = View::instance('v_posts_index');
	$this->template->title   = "Posts";

	# Build the query
	$q = "SELECT 
            posts.* , 
            users.first_name, 
            users.last_name
		FROM posts
        INNER JOIN users 
            ON posts.user_id = users.user_id";

	# Run the query
	$posts = DB::instance(DB_NAME)->select_rows($q);

	# Pass data to the View
	$this->template->content->posts = $posts;

	# Render the View
	echo $this->template;

}


	public function users() {

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

	public function email($post_id) {

		##Setup view
		$this->template->content = View::instance('v_posts_email');
		$this->template->title = "Compose a Post";

		#Render template
		echo $this->template;
	}

	public function p_email() {

		##Setup view
		$this->template->content = View::instance('v_posts_email');
		$this->template->title = "Compose a Post";

		#Render template
		echo $this->template;

		# Build a multi-dimension array of recipients of this email
		$to[] = Array("name" => "Judy Grimes", "email" => "judy@gmail.com");

		# Build a single-dimension array of who this email is coming from
		# note it's using the constants we set in the configuration above)
		$from = Array("name" => APP_NAME, "email" => APP_EMAIL);

		# Subject
		$subject = "Welcome to JavaBeans";

		# You can set the body as just a string of text
		$body = "Hi Judy, this is just a message to confirm your registration at JavaBeans.com";

		# OR, if your email is complex and involves HTML/CSS, you can build the body via a View just like we do in our controllers
		# $body = View::instance('e_users_welcome');

		# Build multi-dimension arrays of name / email pairs for cc / bcc if you want to 
		$cc  = "";
		$bcc = "";

		# With everything set, send the email
		$email = Email::send($to, $from, $subject, $body, true, $cc, $bcc);
	}

}

?>