<?php

/**
* Process, maintain and display
* user profiles
**/
class profiles_controller extends base_controller {

	public function _construct() {
		parent::_construct;

		# Make sure user is logged in if they want to use anything in this controller
		if (!$this->user) {
			Router::redirect('/users/login');
		}
	}

	/**
	* Add a user profile
	**/
	public function create_profile() {
		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		# check if profile already exists
		$q = "	SELECT profile_id
				FROM user_profiles
				WHERE user_id = ".$this->user->user_id;

		$profile_id = DB::instance(DB_NAME)->select_field($q);

		# Profile already exists -> route to profile modification
		if($profile_id) {

			Router::redirect("/profiles/modify_profile");

		# Profile does not already exist
		} else {

		##Setup view
		$this->template->content = View::instance('v_profiles_create_profile');
		$this->template->title = "Create a Profile";

		#Render template
		echo $this->template;
		}
	}

	public function p_create_profile() {

		# Make sure none of the fields was left blank
		# Array of fields
		$submitted = array('city', 'country', 'birthyear', 'interests');

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

			$_POST['user_id'] = $this->user->user_id;

			#insert this user into the database
			$profile_id = DB::instance(DB_NAME)->insert("user_profiles", $_POST);

			#Setup view & render it
			$this->template->content = View::instance('v_profiles_successful_creation');
			$this->template->title = "Profile Created";
			echo $this->template;
		}
	}

	/**
	* Modify a user profile
	**/
	public function modify_profile() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		##Setup view
		$this->template->content = View::instance('v_profiles_modify_profile');
		$this->template->title = "Modify my Profile";

		#Render template
		echo $this->template;
	}

	public function p_modify_profile() {

		# Make sure none of the fields was left blank
		# Array of fields
		$submitted = array('city', 'country', 'birthyear', 'interests');

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

			$_POST['user_id'] = $this->user->user_id;
			#insert this user into the database
			$profile_id = DB::instance(DB_NAME)->update("user_profiles", $_POST, "WHERE user_id = ".$this->user->user_id);

			##Setup view
			$this->template->content = View::instance('v_profiles_successful_change');
			$this->template->title = "Profile Updated";

			#Render template
			echo $this->template;
		}
	}

	/**
	* Find and display
	* a user profile
	**/
	public function find_profile() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		# Set up the View
		$this->template->content = View::instance("v_profiles_find_profile");
		$this->template->title   = "Find a Profile";

		# Query for all User Profiles
		$q = "	SELECT
					user_profiles.profile_id,
					users.user_id,
					users.first_name,
					users.last_name
				FROM user_profiles
				INNER JOIN users 
				ON users.user_id = user_profiles.user_id";

		# Execute search abd store the result array in the variable $users
		$user_profiles = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the view
		$this->template->content->user_profiles = $user_profiles;

		# Render the view
		echo $this->template;
	}

	public function p_find_profile($user_id = null) {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		# Query whehther Profile exists
		$q = "	SELECT profile_id
				FROM user_profiles
				WHERE user_id = ".$user_id;
		$profile_exists = DB::instance(DB_NAME)->select_field($q);

		# If the user does not have a profile display 'Sorry No Profile'
		if (!$profile_exists) {
			#Setup view
			$this->template->content = View::instance('v_profiles_no_profile');
			$this->template->title = "No Profile";

			# Render the View
			echo $this->template;
		} else {

		# If the user has a profile
		# Query for the Profile Information
		$q = "	SELECT
					user_profiles.city,
					user_profiles.country,
					user_profiles.interests,
					user_profiles.birthyear,
					users.first_name,
					users.last_name
				FROM user_profiles
				INNER JOIN users 
				ON users.user_id = user_profiles.user_id
				WHERE user_profiles.user_id = ".$user_id;

		$profile = DB::instance(DB_NAME)->select_row($q);

		#Setup view, pass data to and render it
		$this->template->content = View::instance('v_profiles_display');

		$this->template->title = "Profile of ".$profile['first_name'];
		$this->template->content->profile = $profile;
		
		echo $this->template;
		}
	}
}


?>