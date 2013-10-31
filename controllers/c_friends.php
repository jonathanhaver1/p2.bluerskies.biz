<?php

class friends_controller extends base_controller {

	public function _construct() {
		parent::_construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
		}
	}

	public function add() {

	##Setup view
	$this->template->content = View::instance('v_friends_add');
	$this->template->title = "Add a Friend";

	#Render template
	echo $this->template;

	}

	public function p_add() {

		# Add a timestamp
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('friends', $_POST);

		# Quick and dirty feedback

			##Setup view
			$this->template->content = View::instance('v_friends_added_successfully');
			$this->template->title = "Success";
			echo $this->template;
	}

	public function index() {

		# Set up the View
		$this->template->content = View::instance('v_friends_index');
		$this->template->title   = "Friends";

		# Build the query
   		# Query
    	$q = 'SELECT 
    			friends.friend_id,
            	friends.first_name,
            	friends.last_name,
            	friends.modified
        		FROM friends';

		# Run the query
		$friends = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->friends = $friends;

		# Render the View
		echo $this->template;
	}

	public function email_invitation($friend_id = null) {

		# Build the query
   		# Query
    	$q = 'SELECT 
            	first_name,
            	last_name,
            	email
        		FROM friends
                WHERE friend_id = '.$friend_id;

		# Run the query
		$friend = DB::instance(DB_NAME)->select_row($q);

		# Build a multi-dimension array of recipients of this email
		$to[] = Array("name" => $friend['first_name']." ".$friend['last_name'], "email" => $friend['last_name']);

		# Build a single-dimension array of who this email is coming from
		# note it's using the constants we set in the configuration above)
		$from = Array("name" => APP_NAME, "email" => APP_EMAIL);

		# Subject
		$subject = "Invite";

		# You can set the body as just a string of text
		$body = 	"Hi ".$friend['first_name'].", I would like you to try out my new application BluerSkies at bluerskies.biz.\n
					There is some really fun stuff to do on it.\n
					All the very best,\n\n
					Jonathan";

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