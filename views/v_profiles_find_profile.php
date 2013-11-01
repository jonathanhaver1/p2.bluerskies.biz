<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>

<article>

<?php foreach($user_profiles as $user_profile): ?>

    <!-- Print this user's name -->
    <?=$user_profile['first_name']?> <?=$user_profile['last_name']?>

    <a href='/profiles/p_find_profile/<?=$user_profile['profile_id']?>'>Display this Profile</a>

    <br><br>

<?php endforeach; ?>

</article>

	<div id="menu_side">
			<h2>POSTS</h2>
			<ul>
				<li class='active'><a href="/posts/index">View Posts</a></li>
				<li><a href="/posts/users">Follow Users</a>
				<li class='last'><a href="/posts/add">Add Post</a></li>
			</ul>
			<br>
			<br>
			<br>
			<br>
			<h2>PROFILES</h2>
			<ul>
				<li class='active'><a href="/profiles/find_profile">Display Profile</a></li>
				<li><a href="/users/profile">Your Profile</a></li>
				<li><a href="/profiles/create_profile">Add Profile</a></li>
				<li class='last'><a href="/profiles/modify_profile">Modify Profile</a></li>
			</ul>
			<br>
			<br>
			<br>
			<br>
			<h2>FRIENDS</h2>
			<ul>
				<li class ='active'><a href="/friends/index">Friends List</a></li>
				<li class='last'><a href="/friends/add">Add Friend</a></li>
			</ul>
	</div>

	<div id="comment_box_right">
	These are the users who have created profiles for themselves.<br>
	You can view them individually and send them to your friends.
	</div>