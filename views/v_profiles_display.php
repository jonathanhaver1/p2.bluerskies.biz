<!-- name from table user_profiles !-->
<h1>This is the profile of<br>
	<?=$profile['first_name']?> <?=$profile['last_name']?></h1>

<!-- data from table user_profiles ! -->
<div id = "profile">
	<br>
	City:		<?=$profile['city']?><br>
	<br>
	Country:	<?=$profile['country']?><br>
	<br>
	Interests:	<?=$profile['interests']?><br>
	<br>
	Birth Year: <?=$profile['birthyear']?><br>
</div>

<!-- horizontal menu !-->
<div id="menu_horizontal" style = "margin-top: 240px; margin-left: 43px">
		<ul>
			<li><a href="/profiles/modify_profile">Modify<br>Your Profile</a></li>
			<li><a href="/friends/add">Add<br>a Friend</a></li>
			<li><a href="/posts/index">View<br>Posts</a></li>
		</ul>
</div>