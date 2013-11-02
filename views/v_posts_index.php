
	<br><br><br><br><br><br><br><br><br><br><br><br>

<?php foreach($posts as $post): ?>


<article>

    <span id="post_table_name"><?=$post['first_name']?> <?=$post['last_name']?> posted:</span>

        <br>
        Likes: <?=$post['likes']?>
        <br>
        <br>

    <span id="post_content"><?=$post['content']?></span>

    <br><br>

    <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
        <span style="font: arial">Date/Time: <?=Time::display($post['created'])?></span>
    </time>


    <br>
    <a href="/posts/email/<?=$post['post_id']?>">Email this Post</a><br>
    <a href="/posts/like/<?=$post['post_id']?>">Like +1</a><br>
    <br>

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
        On this page you see the posts by the people you follow.<br>
        You can email a post using 'Email This Post'.
    </div>