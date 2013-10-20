<?php

class Post_Functions {
	

	public function display_posts($userid) {
		
		posts = array();

		$user_string = implode(',', $userid);
		$extra = " and id in ($user_string)";

		if ($limit > 0) {
			$extra = "limit $limit";
		} else {
			$extra = '';
		}

		$sql = "SELECT body, stamp FROM posts
				WHERE user_id = '$userid' ORDER BY stamp DESC"
		$result = mysql_query($sql);

		while($data = mysql_fetch_object($result)) {
			$posts[] = array(	'stamp' => $data->stamp,
								'userid' => $userid,
								'body' => $data->body
							);
		}

		return $posts;

	}
	
	
}
