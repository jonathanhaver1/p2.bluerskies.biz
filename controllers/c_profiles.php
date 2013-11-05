<?php

class profiles_controller extends base_controller {

	public function _construct() {
		parent::_construct;
	}

	public function create_profile() {
		# if not logged in -> redirect to the login page
		if (!$this->user) {
		Router::redirect('/users/login'); }

		##Setup view
		$this->template->content = View::instance('v_profiles_create_profile');
		$this->template->title = "Create a Profile";

		#Render template
		echo $this->template;
	}

	public function p_create_profile() {

		$_POST['user_id'] = $this->user->user_id;

		#insert this user into the database
		DB::instance(DB_NAME)->insert("user_profiles", $_POST);

		##Setup view
		$this->template->content = View::instance('v_profiles_successful_creation');
		$this->template->title = "Profile Update!";

		#Render template
		echo $this->template;
	}

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

		$_POST['user_id'] = $this->user->user_id;
		#insert this user into the database
		DB::instance(DB_NAME)->update("user_profiles", $_POST, "WHERE user_id = ".$this->user->user_id);

		##Setup view
		$this->template->content = View::instance('v_profiles_successful_change');
		$this->template->title = "Profile Update!";

		#Render template
		echo $this->template;
	}

/**
	public function display_profile() {

		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}
	
		# Set up the View
		$this->template->content = View::instance('v_posts_index');
		$this->template->title   = "Posts";

		# Build the query
		$q = 'SELECT 
				posts.content,
				posts.created,
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
**/

	public function find_profile() {
		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		# Set up the View
		$this->template->content = View::instance("v_profiles_find_profile");
		$this->template->title   = "Find a Profile";

		# Query for Profiles
		$q = "	SELECT
					user_profiles.profile_id,
					users.first_name,
					users.last_name
				FROM user_profiles
				INNER JOIN users 
				ON users.user_id = user_profiles.user_id";

		# Execute the query to get all the users. 
		# Store the result array in the variable $users
		$user_profiles = DB::instance(DB_NAME)->select_rows($q);

		# Pass data (users and connections) to the view
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
			# if the user has a profile

			# Query for Profiles
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

			# Execute the query to get all the users. 
			# Store the result array in the variable $users
			$profile = DB::instance(DB_NAME)->select_row($q);

			#Setup view
			$this->template->content = View::instance('v_profiles_display');
			$this->template->title = "Profile of ".$profile['first_name'];

			# Pass data to the View
			$this->template->content->profile = $profile;
			
			# Render the View
			echo $this->template;
		}
	}
}


?>