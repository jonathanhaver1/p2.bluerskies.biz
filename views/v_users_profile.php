<h1>This is the profile of <?=$user->first_name?></h1>

<div id = "profile">
	<br>
	City:		<?=$profile['city']?><br>
	Country:	<?=$profile['country']?><br>
	<br>
	Interests:	<?=$profile['interests']?><br>
	<br>
	Birth Year: <?=$profile['birthyear']?><br>
</div>


	<div id="menu_horizontal">
			<ul>
				<li><a href="/posts/index">View Posts</a></li>
				<li><a href="/posts/users">Follow Users</a>
				<li><a href="/posts/add">Add Post</a></li>
			</ul>
			<ul>
				<li><a href="/profiles/find_profile">Display Profile</a></li>
				<li><a href="/users/profile">Your Profile</a></li>
				<li><a href="/profiles/create_profile">Add Profile</a></li>
				<li><a href="/profiles/modify_profile">Modify Profile</a></li>
			</ul>
			<ul>
				<li><a href="/friends/index">Friends List</a></li>
				<li><a href="/friends/add">Add Friend</a></li>
			</ul>
	</div>


