<!DOCTYPE html>
<html>
<head>
	<title>Welcome new Users</title>
</head>
<body>

<h1>
	Welcome to <?=APP_NAME?><?php if($user) echo ',<br>'.$user->first_name; ?></h1>
</h1>

<body>

	<div id="special_features">
		On this site you will be able to contribute to online discussions.<br>
		<strong>Members (Users)</strong> can participate in the discussion
		and have individual profiles which can be viewed by other members.<br>
		Every member can have a group of <strong>friends</strong> who can receive
		copies of the posts.
		<br><br>
		<strong>+1</strong> You can also<br><br>

		Edit and display profile information<br>
		Email a post to a friend<br>
		Compile, modify and display a list of your friends<br>
		Invite friends to join the site and contribute<br>
		Like Posts (+1)<br>
		See your log in status (upper right corner)

	</div>
	<br>
	<br>


<div id="menu_side">

        <span id = "menu_side_header">POSTS</span>

        <ul>
            <li class='active'><a href="/posts/index">View Posts</a></li>
            <li><a href="/posts/users">Follow Users</a>
            <li class='last'><a href="/posts/add">Add Post</a></li>
        </ul>

        <span id = "menu_side_header">PROFILES</span>

        <ul>
            <li class='active'><a href="/profiles/find_profile">View Profiles</a></li>
            <li><a href="/users/profile">Your Profile</a></li>
            <li><a href="/profiles/create_profile">Add Profile</a></li>
            <li class='last'><a href="/profiles/modify_profile">Modify Profile</a></li>
        </ul>


        <span id = "menu_side_header">FRIENDS</span>

        <ul>
            <li class ='active'><a href="/friends/index">Friends List</a></li>
            <li class='last'><a href="/friends/add">Add Friend</a></li>
        </ul>

</div>


<footer style="font-size: x-small">Banner Photo © Chrisharvey (
				<a href="http://www.dreamstime.com/">Dreamstime Stock Photos</a>
				& <a href="http://www.stockfreeimages.com/">Stock Free Images</a>)
			</footer>

</body>