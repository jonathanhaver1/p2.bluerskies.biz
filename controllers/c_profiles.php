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

		$user_id = $this->user->user_id;

		#insert this user into the database
		DB::instance(DB_NAME)->update("user_profiles", $_POST, "WHERE user_id = ".$user_id." ");

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

		$user_id = $this->user->user_id;
		#insert this user into the database
		DB::instance(DB_NAME)->update("user_profiles", $_POST, "WHERE user_id = ".$this->user->user_id);

		##Setup view
		$this->template->content = View::instance('v_profiles_successful_change');
		$this->template->title = "Profile Update!";

		#Render template
		echo $this->template;
	}

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

	public function find_profile() {
		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		// ask which user in v_find_profile()
		// return with POST to p_find_profile()
	}


	public function p_find_profile() {
		# if not logged in -> redirect to the login page
		if (!$this->user) {
			Router::redirect('/users/login');
		}

		# if logged in -> Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title = "Profile of ".$POST['user_id'];

			# Build the query
		$q = 'SELECT 
				city,
				country,
				interests,
				birthyear
			FROM user_profiles
			WHERE user_id = '.$POST['user_id'];

		# Run the query
		$profile = DB::instance(DB_NAME)->select_row($q);

		# Pass data to the View
		$this->template->content->profile = $profile;
		
		# Render the View
		echo $this->template;
	}
}


?>