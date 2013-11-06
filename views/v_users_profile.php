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

<div id="menu_horizontal" style = "margin-top: 200px">
	<ul>
		<li><a href="/profiles/modify_profile">Modify<br>Your Profile</a></li>
		<li><a href="/friends/add">Add<br>a Friend</a></li>
		<li><a href="/posts/index">View<br>Posts</a></li>
	</ul>
</div>