<h2>Index of Your Friends</h2>

<div id ="description">
        Below are the friends you have entered.
        You can now invite a friend to become a user of this platform.<br>
</div>

<br><br><br><br><br><br><br>


<?php foreach($friends as $friend): ?>

    <div id ="friends_list">

        <span id="post_table_name"><?=$friend['first_name']?> <?=$friend['last_name']?></span><br>

        on the list since: 
        <time datetime="<?=Time::display($friend['modified'],'Y-m-d G:i')?>">
                <?=Time::display($friend['modified'])?>
        </time><br>

        <form action="/friends/email_invitation/<?=$friend['friend_id']?>">
            <input type="submit" value="Email this Friend an Invitation">
        </form><br><br>

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


<div id = "comment_box_right">
	This is a list of your friends. Indicate if you want to send a friend an inivtation.
</div>