<?php

$users = display_users();
$following = following($_SESSION['userid']);

if (count($users)){
	?>
	<table border = '1' cellspacing = '0' cellpadding = '5' width = '500'>
		<?php foreach ($users as $key => $value) {
			echo "<tr valign = 'top'>\n";
			echo "<td>".$key ."</td>\n";
			echo "<td>".$value;
			if (in_array($key,$following)) {
				echo "<small> <a href ='action.php?id=$key&do=unfollow'>unfollow</a> </small>";
			} else {
				echo "<small> <a href ='action.php?id=$key&do=follow'>follow</a> </small>"
			}
			echo "</td>\n";
			echo "</tr>\n";
			}
		}
}

?>

<h2>Users you are following</h2>

<?php
$users = show_users($_SESSION['user_id']);

if (count($users)) {
	?>
	<ul>
		<?php
		foreach ($users as $key => $value) {
			echo "<li>".$value."</li>\n";
		}
		?>
	</ul>
	<?php
} else {
	?>
	<p><i>You are not following anyone</b></p>
	<?php
}
?>
}

}