<?php

/**
* Add, maintain and dsiplay
* registered users and user information
**/
class users_controller extends base_controller {

	public function _construct() {
		parent::_construct;

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
		}
	}

	/**
	* Add a new user
	**/
	public function signup() {
		
		##Setup view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title = "Sign Up";

		#Render template
		echo $this->template;
	}

	public function p_signup() {

		# storing time of creation and modfication for the user
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();

		# Encrypt the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Create an encrypted token via their email address and a random string
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

		#insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);

		##Setup view
		$this->template->content = View::instance('v_users_successful_signup');
		$this->template->title = "Welcome!";

		#Render template
		echo $this->template;
	}

	public function login($error = NULL) {

		#Set up view
		$this->template->content = View::instance('v_users_login');
		$this->template->content->error = $error;
		$this->template->title = "Login";

	sleep(10);

		# Render template
		echo $this->template;
	}

	public function p_login() {
		# Sanitize the user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Hash submitted password for comparison with db
		$_POST['password'] = sha1 (PASSWORD_SALT.$_POST['password']);

		# Search the db for this email and password
		# Retrieve the token if it is available
		$q = "	SELECT token
				FROM users
				WHERE email = '".$_POST['email']."'
				AND password = '".$_POST['password']."'";

		$token = DB::instance(DB_NAME)->select_field($q);

		# No matching token -> login failed -> return to login page
		if(!$token) {

			Router::redirect("/users/login/error");

		# Matching token -> login succeeded
		} else {
			
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+2 weeks'), '/');

			# Send to the main page
			Router::redirect("/");
		}
	}

	/**
	* Logout a registered user
	**/
	public function logout() {

		# Generate and save a new token for the next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		# Update the database
		$data = Array("token" => $new_token);
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		# 'Delete' token
		setcookie("token", "", strtotime('-1 year'), '/');

		# send back to main index
		Router::redirect("/");
	}

	/**
	* Display the profile of a registered user
	**/
	public function profile() {
		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		# Query whehther Profile exists
		$q = "	SELECT profile_id
				FROM user_profiles
				WHERE user_id = ".$this->user->user_id;
		$profile_exists = DB::instance(DB_NAME)->select_field($q);

		# If the user does not have a profile display 'Sorry No Profile'
		if (!$profile_exists) {
				$this->template->content = View::instance('v_users_no_profile');
				$this->template->title = "No Profile";

				# Render the View
				echo $this->template;
			} else {
				# if the user has a profile

			# if logged in -> Setup view
			$this->template->content = View::instance('v_profiles_display');
			$this->template->title = "Your Profile";

			# Query for user profile information
			$q = '	SELECT 
						user_profiles.city,
						user_profiles.country,
						user_profiles.interests,
						user_profiles.birthyear,
						users.first_name,
						users.last_name
					FROM user_profiles
					JOIN users ON
						user_profiles.user_id = users.user_id 
					WHERE user_profiles.user_id = '.$this->user->user_id;

			$profile = DB::instance(DB_NAME)->select_row($q);

			# Pass data to the View and render it
			$this->template->content->profile = $profile;
			echo $this->template;
		}
	}
}

?>