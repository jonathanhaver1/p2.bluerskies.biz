<h2>Email a Post to a Friend</h2>


<div id ="description">
        Pick one of your friends below to email the post to.<br>
</div>

<br><br><br><br><br><br><br>


<?php foreach($friends as $friend): ?>

    <div id ="friends_list">

        <span id="post_table_name"><?=$friend['first_name']?> <?=$friend['last_name']?></span><br>

        <?=$friend['email']?><br>

        <span id="post_content"><a href='/posts/p_email/<?=$friend['friend_id']?>/<?=$post_id?>'>Email this post to this friend</a></span>

        <br><br>

    </div>

<?php endforeach; ?>


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
    Pick a friend to email a post to.
</div>