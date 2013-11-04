<h2>View Profiles</h2>

<div id ="description">
    These are the registered users.<br>
    Just take a look at their profiles.
</div>


<br><br><br><br><br><br><br>

<article>

<?php foreach($user_profiles as $user_profile): ?>

    <!-- Print this user's name -->
    <?=$user_profile['first_name']?> <?=$user_profile['last_name']?><br>

    <a href='/profiles/p_find_profile/<?=$user_profile['profile_id']?>'>Display this user's profile</a><br>
    ________________________________________<br><br>

<?php endforeach; ?>


</article>

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


<div id="comment_box_right">
	These are the users who have created profiles for themselves.<br>
	You can view them individually and send them to your friends.
</div>