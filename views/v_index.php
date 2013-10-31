<!DOCTYPE html>
<html>
<head>
	<title>Welcome new Users</title>
</head>
<body>

<h1>
	Welcome to <?=APP_NAME?><?php if($user) echo ','.$user->first_name; ?></h1>
</h1>

<body>

	<div id="introduction">
		On this site you will be able to build a micro blog.<br>
		<br>
		<strong>+1</strong> You can also

		<ul>
			<li>Edit and display profile info</li>
			<li>Send a post to your friends</li>
			<li>Send a profile to your friends</li>
			<li>Compile, modify and display a list of your friends</li>
			<li>Invite friends to join the site and contribute</li>
		</ul>
	</div>

		<ul>
			POSTS<br>
			<li><a href="/posts/index">View a stream of posts from the users you follow</a></li>
			<li><a href="/posts/users">Follow or Unfollow Other Users</a>
			<li><a href="/posts/add">Add a Post</a></li>
			<br>
			<br>PROFILES<br>
			<li><a href="/profiles/find_profile">Display a Profile of Another User</a></li>
			<li><a href="/users/profile">Check Out Your Profile</a></li>
			<li><a href="/profiles/create_profile">Add Your Profile</a></li>
			<li><a href="/profiles/modify_profile">Modify Your Profile</a></li>
			<br>
			<br>FRIENDS<br>
			<li><a href="/friends/index">See Your List of Friends</a></li>
						<li>	Modify the List</li>
						<li>	Remove a Friend</li>
						<li>	Invite a Friend</li>

			<li><a href="/friends/add">Add a Friend</a></li>
		</ul>



</body>