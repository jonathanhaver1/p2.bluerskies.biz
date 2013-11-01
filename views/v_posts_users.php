    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>

<?php foreach($users as $user): ?>




<article>

        <!-- Print this user's name -->
    <span id="post_table_name"><?=$user['first_name']?> <?=$user['last_name']?></span>


        <!-- If there exists a connection with this user, show a unfollow link -->
        <?php if(isset($connections[$user['user_id']])): ?>
        <span id="post_content"><a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a></span>
        <!-- Otherwise, show the follow link -->
        <?php else: ?>
        <span id="post_content"><a href='/posts/follow/<?=$user['user_id']?>'>Follow</a></span>
        <?php endif; ?>


    <br><br><br>

</article>


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
        When you follow a user, you follow all their posts.<br>
        To view the posts by the users you follow click on 'View Posts'.
    </div>