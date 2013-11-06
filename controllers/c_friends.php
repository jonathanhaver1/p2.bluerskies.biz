<?php

/**
* Maintain a personal list of friends
* and process email invitations
**/
class friends_controller extends base_controller {

	public function _construct() {
		parent::_construct();

		# Registered users only
		if (!$this->user) {
			Router::redirect('/users/login');
		}
	}

	/**
	* Add a Friend
	**/
	public function add() {

		# Registered users only
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		##Setup view
		$this->template->content = View::instance('v_friends_add');
		$this->template->title = "Add a Friend";

		#Render template
		echo $this->template;

	}

	public function p_add() {

		# Make sure none of the fields was left blank
		# Array of fields
		$submitted = array('first_name', 'last_name', 'email', 'interests', 'comments');

		# Loop through fields
		$empty_field = false;
		foreach($submitted as $field) {
  			if (empty($_POST[$field])) {
    		$empty_field = true;
  			}
		}

		# if a fied has been left blank - alert user
		if ($empty_field) {
  			$this->template->content = View::instance('v_error_empty_fields');
			$this->template->title = "Empty Fields";
			echo $this->template;

		# if all fields have been filled in
		} else {

			# Associate this friend with this user
			$_POST['user_id']  = $this->user->user_id;

			# Add a timestamp
			$_POST['created']  = Time::now();
			$_POST['modified'] = Time::now();

			# Insert into database
			DB::instance(DB_NAME)->insert('friends', $_POST);

			##Setup view and render it
			$this->template->content = View::instance('v_friends_added_successfully');
			$this->template->title = "Success";
			echo $this->template;
		}
	}

	public function index() {

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

			# Set up the View
			$this->template->content = View::instance('v_friends_index');
			$this->template->title   = "Friends";

			# Query for list of friends
	    	$q = '	SELECT 
	            	friend_id,
	            	first_name,
	            	last_name,
	            	email,
	            	modified,
	            	interests,
	            	interests,
	            	comments
	        		FROM friends
	        		WHERE user_id = '.$this->user->user_id;

			$friends = DB::instance(DB_NAME)->select_rows($q);

			# Pass data to the View and render it
			$this->template->content->friends = $friends;
			echo $this->template;
		}
	}


	/**
	* Email an invitation to a friend
	**/
	public function email_invitation($friend_id = null) {

   		# Query for friend name and email
    	$q = 'SELECT 
            	first_name,
            	last_name,
            	email
        		FROM friends
                WHERE friend_id = '.$friend_id;

		$friend = DB::instance(DB_NAME)->select_row($q);

		# Build a multi-dimension array for the email
		$to[] = Array("name" => $friend['first_name']." ".$friend['last_name'], "email" => $friend['last_name']);
		$from = Array("name" => APP_NAME, "email" => APP_EMAIL);
		$subject = "Invite";
		$body = 	"Hi ".$friend['first_name'].", I would like you to try out my new application BluerSkies at bluerskies.biz.\n
					There is some really fun stuff to do on it.\n
					See you there,\n\n
					".$this->user->first_name;
		$cc  = "";
		$bcc = "";

		# send email
		$email = Email::send($to, $from, $subject, $body, true, $cc, $bcc);

		##Setup view and render it: email sent
		$this->template->content = View::instance('v_friends_invitation_emailed_successfully');
		$this->template->title = "Invitation Emailed";

		echo $this->template;
	}
}

?>