<?php

class posts_controller extends base_controller {

	public function add_post () {

	##Setup view
	$this->template->content = View::instance('v_posts_add_post');
	$this->template->title = "Compose a Post";

	#Render template
	echo $this->template;

	}

	public function add_new_post () {

		$userid = $_SESSION['user_id'];

		$body = substr($_POST['body'],0,700);

		//add_post($userid, $body);
		$sql = "INSERT INTO posts (user_id, body, stamp)
				VALUES ($userid, '". mysql_real_escape_string($body). "', now())";
		$result = mysql_query($sql);
	}

	public function display_posts() {
		
		$posts = array();
		$userid = 529;

		// $user_string = implode(',', $userid);
		// $extra = " and id in ($user_string)";

		// if ($limit > 0) {
		//	$extra = "limit $limit";
		//} else {
		//	$extra = '';
		//}

		$sql = "SELECT body, stamp
				FROM posts
				WHERE user_id = '$userid'
				ORDER BY stamp
				DESC";
		$result = mysql_query($sql);

		//while($data = mysql_fetch_object($result)) {
		//	$posts[] = array(	'stamp' => $data->stamp,
		//						'userid' => $userid,
		//						'body' => $data->body
		//					);
		//}

		//return $posts;

		echo $result;

	}

}

?>