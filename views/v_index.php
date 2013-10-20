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

		On this site you will be able to build a micro blog.

	</br>

		LogIn Status:

	</p>


	<a href= "/posts/add_post">Write a Blog Entry</a>


	<div>

	</div>

</body>