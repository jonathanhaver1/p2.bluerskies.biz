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
	</div>

		
	<div id="remark">
		<ul>
			<li>Edit and display profile info</li>
			<li>Send a post to a friend</li>
			<li>Send your profile to a friend</li>
			<li>Get a special welcome email</li>
		</ul>
	</div>

		<ul>
			POSTS<br>
			<li><a href="/posts/index">Index of Posts</a></li>
			<li><a href="/posts/index">View a stream of posts from the users you follow</a></li>
			<li><a href="/posts/add">Add a Post</a></li>
			<li><a href="/posts/users">Follow or Unfollow Other Users</a>
			<br>
			<br>PEOPLE<br>
			<li><a href="profiles/find_profile">Find a Profile</a></li>
			<li><a href="/profiles/create_profile">Add Profile</a></li>
			<li><a href="/profiles/modify_profile">Modify Profile</a></li>
			<li><a href="/users/profile">Check Out Your Profile</a></li>
			See a list of all other users
		</ul>



</body>