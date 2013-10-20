<?php

include_once("header.php");
include_once("Action_Functions.php");
include_once("Post_Functions.php");
include_once("User_Functions.php");

$userid = $_COOKIE['user_id'];

$body = substr($_POST['body'],0,700);

//add_post($userid, $body);
		$sql = "INSERT INTO posts (user_id, body, stamp)
				VALUES ($userid, '". mysql_real_escape_string($body). "', now())";
		$result = mysql_query($sql);
?>


<?php
header("Location:c_index.php");
?>