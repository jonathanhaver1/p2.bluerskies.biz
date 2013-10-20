<?php

class User_Functions {

	public function check_count($first, $second) {
		$sql = "SELECT count(*) FROM following WHERE user_id = '$second' and follower_id = 'first'";
		$result = mysql_query($sql);
		return $row[0];
	}

	public function follow_user($me, $them) {
		$count = check_count($me, $them);
		if ($count == 0) {
			$sql = "INSERT INTO following (user_id, follower_id VALUES ($them, $me)";
				$result = mysql_query($sql);
		}
	}

	public function unfollow_user($me, $them) {
		$count = check_count ($me, $them);

			if ($count != 0) {
				$sql = "DELETE FROM following (WHERE user_id =$them and follower = '$me' limit !";
				$result = mysql_query($sql);
			}
	}

	public function disply_users($user_id = 0) {

		if ($user_id > 0) {
			$follow = array();
			$fsql = "SELECT user_id FROM following WHERE follower_id = '$user_id'";
			$fresult = mysql_query($fsql);

			while($f = mysql_fetch_object($fresult)) {
				array_push($follow, $f->user_id);
			}

			if (count($follow)) {
				$id_string = implode (',', $folllow);
				$extra = " and id in ($id_string)";

			} else {
				return array ();
			}
		}
		
		$users = array();
		$sql = "SELECT user_id, username FROM users WHERE status = 'active' ORDER BY username";

		$result = mysql_query($sql);

		while ($data = mysql_fetch_object($result)) {
			$users[$data->id] = $data->username;
		}
		return $users;
	}

}

?>