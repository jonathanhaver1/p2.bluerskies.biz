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

	<div id = "menu">
		<ul>
			<li><a href="/profiles/find_profile">Display a Profile of Another User</a></li>
			<li><a href="/users/profile">Check Out Your Profile</a></li>
			<li><a href="/profiles/create_profile">Add Your Profile</a></li>
			<li><a href="/profiles/modify_profile">Modify Your Profile</a></li>
		</ul>
	</div>

<br>
<br>
<br>
