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

		<div id='photo'>
			<br>
			<img src="/css/bluerskies.jpg" alt="Bluer Skies" width="500" height="100"><br>
			<span style="font-size: x-small">© Chrisharvey (
				<a href="http://www.dreamstime.com/">Dreamstime Stock Photos</a>
				& <a href="http://www.stockfreeimages.com/">Stock Free Images</a>)
			</span>

		</div>

	<?php if(isset($content)) echo $content; ?>

</body>
</html>