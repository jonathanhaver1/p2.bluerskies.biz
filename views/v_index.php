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
		<li>Upload a profile photo</li>
		<li>Email verification (requires users to click a link in their email before their account is created)</li>
		<li>"Send to a friend" feature where posts can be emailed to friends</li>
		</ul>

		<br>
		<br>

			<li><a href="/posts/add">Add a Post</a></li>
	<li><a href="/posts/add">See the Index</a></li>
	<li>Take a Look at Who is around</li>
	<li><a href="/users/profile">Check Out Your Profile</li>


</body>