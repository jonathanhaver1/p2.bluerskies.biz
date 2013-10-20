<?php

class users_controller extends base_controller {

public function _construct() {
	parent::_construct;
	echo "users_controller construct called <br><br>";
}

public function index() {
	echo "This is the index page";
}

public function signup() {
	##Setup view
	$this->template->content = View::instance('v_users_signup');
	$this->template->title = "Sign Up";

	#Render template
	echo $this->template;
}

public function p_signup() {
	echo 'pre';
	print_r($_POST);
	echo '</pre>';

	# storing time of creation and modfication for the user
	$_POST['created'] = Time::now();
	$_POST['modified'] = Time::now();

	# Encrypt the password
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

	# Create an encrypted token via their email address and a random string
	$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

	#insert this user into the database
	$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

	#make a proper view here
	echo 'You\'re signed up';
}

public function login() {
	#Setup view
	$this->template->content = View::instance('v_users_login');
	$this->template->title = "Login";

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
		Router::redirect("/users/login/");
	# Matching token -> login succeeded
	} else {
		/* Store this token in a cookie
		param 1 = name of the cookie
		param 2 = the value of the cookie
		param 4 = the path of the cookie
		*/
		setcookie("token", $token, strtotime('+1 year'), '/');

		# Send to the main page
		Router::redirect("/");
	}
}

public function logout() {

	# Generate and save a new token for the next login
	$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

	# Update the database
	$data = Array("token" => $new_token);
	DB::instance(DB_NAME)->update("users", $data, "WHERE token = #".$this->user->token."'");

	# 'Delete' token
	setcookie("token", "", strtotime('-1 year'), '/');

	# send back to main index
	Router::redirect("/");
}

public function profile() {
	# if not logged in -> redirect to the login page
	if (!$this->user) {
		Router::redirect('/users/login');
	}

	# if logged in -> Setup view
	$this->template->content = View::instance('v_users_profile');
	$this->template->title = "Profile of ".$this->user->first_name;

	# Render template
	echo $this->template;
}

//public function profile ($user_name = NULL) {
//
//	if (user_name == NULL) {
//		echo "No user specified";
//	}
//	else {
//		echo "This is the profile for ".$user_name;
//	}
//}
}

?>