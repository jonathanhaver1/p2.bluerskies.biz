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

	<p>

		On this site you will be able to build a micro blog.<br>
		You can also
		<ul>
			<li>Edit and display profile info</li>
			<li>Send a post to a friend</li>
		</ul>


		<br>
		<br>

		<ul>
			POSTS<br>
			<li><a href="/posts/index">Index</a></li>
			<li><a href="/posts/add">Add a Post</a></li>
			<li><a href="/posts/users">Follow or Unfollow Other Users</a>
			<br>
			<br>PEOPLE<br>
			<li><a href="profiles/find_profile">Find a Profile</a></li>
			<li><a href="/profiles/create_profile">Add Profile</a></li>
			<li><a href="/profiles/modify_profile">Modify Profile</a></li>
			<li><a href="/users/profile">Check Out Your Profile</a></li>
		</ul>



</body>