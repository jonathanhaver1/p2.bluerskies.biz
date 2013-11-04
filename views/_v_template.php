<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/css/generalStyle.css">
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div id="banner_bluerskies">
		Bluer Skies
	</div>

		<div id='banner_photo'>
			<br>
			<img src="/css/bluerskies.jpg" alt="Bluer Skies" width="800" height="100"><br>
		</div>

	<div id ='menu'>

		<a href='/'>Home</a>

		<!-- Menu for users who are logged in -->
		<?php if($user): ?>

			<a href='/users/logout'>Logout</a>
			<a href='/users/profile'>Profile</a>

			<!-- Menu options for users who are not logged in -->
		<?php else: ?>
			<a href='/users/signup'>Sign up</a>
			<a href='/users/login'>Log in</a>
		<?php endif; ?>
	</div>



	<?php if(isset($content)) echo $content; ?>

</body>
</html>