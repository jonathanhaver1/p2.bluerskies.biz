<!DOCTYPE html>
<html>

	<head>

		<title>Home</title>

	</head>
	

	<body>

		<h1>
			Welcome to <?=APP_NAME?><?php if($user) echo ',<br>'.$user->first_name;?></h1>
		</h1>

		<div id="special_features" style = "top: 130px">
			On this site you will be able to contribute to online discussions.<br><br>
			<strong>Members (Users)</strong> can participate in the discussion
			and have individual profiles which can be viewed by other members.<br><br>
			Every member can form an own group of <strong>friends</strong> who can receive
			copies of the members' posts.<br><br>

			<span style = "font-size: large; background-color: #CCCCFF"><strong>+1</strong></span> You can also<br><br>

			+ Create and modify your profile<br>
			+ Display other users' profiles<br>
			See if + a user has not registered a profile,<br>
			+ you are not following user posts or + have not registered friends.<br>
			+ Email a post to a friend from your list of friends<br>
			+ Compile and display a list of your friends<br>
			+ Invite friends to join the site and contribute by email<br>
			+ Like Posts (+1)<br>
			+ See your log in status (upper right corner)<br>
			+ and more ...

		</div>

     	<div id="includeSideMenu"></div>

		<footer style="font-size: small">Banner Photo © Chrisharvey (
						<a href="http://www.dreamstime.com/">Dreamstime Stock Photos</a>
						& <a href="http://www.stockfreeimages.com/">Stock Free Images</a>)
		</footer>

	</body>

</html>