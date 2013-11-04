<h2>Posts</h2>

<div id ="description">
    These are the posts from people you are following.<br>
    If you want to see more posts, follow more people.
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php foreach($posts as $post): ?>


    <article>

        Likes: <?=$post['likes']?><br>
        <br>

        <span id="post_table_name"><?=$post['first_name']?> <?=$post['last_name']?> posted:</span>



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

        <span id = "menu_side_header">POSTS</span>

        <ul>
            <li class='active'><a href="/posts/index">View Posts</a></li>
            <li><a href="/posts/users">Follow Users</a>
            <li class='last'><a href="/posts/add">Add Post</a></li>
        </ul>

        <span id = "menu_side_header">PROFILES</span>

        <ul>
            <li class='active'><a href="/profiles/find_profile">Display Profile</a></li>
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
    On this page you see the posts by the people you follow.<br>
    You can email a post using 'Email This Post'.
</div>