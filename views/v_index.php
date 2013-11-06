<!DOCTYPE html>
<html>

	<head>

		<title>Home</title>

	</head>
	

	<body>


		<!-- display first name of user if logged in !-->
		<h1>
			Welcome to <?=APP_NAME?><?php if($user) echo ',<br>'.$user->first_name;?></h1>
		</h1>

		<!-- features box centre-right !-->
		<div id="special_features" style = "font-size: 14px">
			On this site you will be able to contribute to online discussions.<br><br>
			<strong>Members (Users)</strong> can participate in the discussion
			and have individual profiles which can be viewed by other members.<br><br>
			Every member can form an own group of <strong>friends</strong> who can receive
			copies of the members' posts.<br><br>

			<span style = "font-size: large; background-color: #CCCCFF"><strong>+1</strong></span> You can also<br><br>

			+ Create and modify your profile<br>
			+ Display other users' profiles<br>
			+ Email a post to a friend from your list of friends<br>
			+ Compile and display a list of your friends<br>
			+ Invite friends to join the site and contribute by email<br>
			+ Like Posts (+1)<br>
			+ See your log in status (upper right corner)<br>
			+ and more ...<br>
			(project for the future: upload photos)<br>

			Error checking: See if a user lacks a registered profile,
			you are not following other members, you have not listed any friends,
			an input field is accidentally left blank, an email address already exists on signup, and more...<br>

		</div>

		<!-- main menu on left side !-->
     	<div id="includeSideMenu"></div>

		<!-- photo copyright !-->
		<div id ="photo_copyright" style="font-size: small">Banner Photo © Chrisharvey (
			<a href="http://www.dreamstime.com/">Dreamstime Stock Photos</a>
			& <a href="http://www.stockfreeimages.com/">Stock Free Images</a>)
		</div>

	</body>

</html>