
    <br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br>

<?php foreach($friends as $friend): ?>

<div id ="friends_list">

    <span id="post_table_name"><?=$friend['first_name']?> <?=$friend['last_name']?></span><br>

    <span id="post_content"><a href='/friends/email_invitation/<?=$friend['friend_id']?>'>Email this Friend an Invitation</a></span>

    <br><br>

</div>

<?php endforeach; ?>

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

    <div id = "comment_box_right">
    	This is a list of your friends. Indicate if you want to send a friend an inivtation.
    </div>