<!DOCTYPE html>
<html>

	<head>

		<title><?php if(isset($title)) echo $title; ?></title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/css/generalStyle.css">

		<!-- include jsquery for the side menu -->
		<script src="/js/jquery-1.10.2.min.js"></script> 
	    	<script> 
	    		$(function(){
	      			$("#includeSideMenu").load("/libraries/menu_side.html"); 
	    		});
    	</script> 
						
		<!-- Controller Specific JS/CSS -->
		<?php if(isset($client_files_head)) echo $client_files_head; ?>
		
	</head>

	<body>	

		<!-- display the banner header -->
		<div id="banner_bluerskies">

			Bluer Skies

		</div>

		<div id='banner_photo'><br>

				<img src="/css/bluerskies.jpg" alt="Bluer Skies" width="800" height="100"><br>

		</div>

		<!-- main menu buttons -->

		<div id ='menu'>

			<a href='/'>Home</a>
			<a href='/posts/index'>Posts</a>
			<a href='/users/profile'>Profile</a>
			<a href='/friends/index'>Friends</a>
			<a href='/posts/users'>Users</a>
			<br><br><br><br><br><br><br><br><br>

			<!-- Menu for users who are logged in -->
			<?php if($user): ?>

				<span id = "login_status">You are <strong>LOGGED IN</strong></span>
				<a href='/users/logout'>Logout</a>


			<!-- Menu options for users who are not logged in -->
			<?php else: ?>

				<span id = "login_status">You are <strong>LOGGED OUT</strong></span>
				<a href='/users/signup'>Sign up</a>
				<a href='/users/login'>Log in</a>

			<?php endif; ?>

		</div>

		<?php if(isset($content)) echo $content; ?>

	</body>
	
</html>