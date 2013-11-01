<!DOCTYPE html>
<html>
<head>
	<title>Welcome new Users</title>
</head>
<body>

<h1>
	Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
</h1>

<body>

	<div id="special_features">
		On this site you will be able to build a micro blog.<br>
		<br>
		<strong>+1</strong> You can also<br><br>

		Edit and display profile info<br>
		Send a post to a friend or all your friends<br>
		Send a profile to a friend or all your friends<br>
		Compile, modify and display a list of your friends<br>
		Invite friends to join the site and contribute<br>

	</div>
	<br>
	<br>


	<div id="menu_side">
			<h2>POSTS</h2>
			<ul>
				<li class='active'><a href="/posts/index">View Posts</a></li>
				<li><a href="/posts/users">Follow Users</a>
				<li class='last'><a href="/posts/add">Add Post</a></li>
			</ul>
			<br>
			<br>
			<br>
			<br>
			<h2>PROFILES</h2>
			<ul>
				<li class='active'><a href="/profiles/find_profile">Display Profile</a></li>
				<li><a href="/users/profile">Your Profile</a></li>
				<li><a href="/profiles/create_profile">Add Profile</a></li>
				<li class='last'><a href="/profiles/modify_profile">Modify Profile</a></li>
			</ul>
			<br>
			<br>
			<br>
			<br>
			<h2>FRIENDS</h2>
			<ul>
				<li class ='active'><a href="/friends/index">Friends List</a></li>
				<li class='last'><a href="/friends/add">Add Friend</a></li>
			</ul>
	</div>

</body>