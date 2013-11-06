<h2>Posts You Follow</h2>

<div id ="description">
    These are the posts from people you are following.<br>
    If you want to see more posts, follow more users.
</div>

<br><br><br><br><br><br><br>


<?php foreach($posts as $post): ?>

    <article>

        Likes: <strong><?=$post['likes']?></strong><br><br>

        <span id="post_table_name"><u><?=$post['first_name']?> <?=$post['last_name']?></u></span>

        posted<br>on

        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
                <span style="font: arial"><?=Time::display($post['created'])?></span>
        </time>

        :<br><br>

        <span id="post_content"><?=$post['content']?></span><br><br>

        <form action="/posts/email/<?=$post['post_id']?>">
            <input type="submit" value="Email this Post">
        </form>

        <form action="/posts/like/<?=$post['post_id']?>">
            <input type="submit" value="Like +1">
        </form>

        ____________________________________<br><br>

    </article>

<?php endforeach; ?>


<div id="includeSideMenu"></div>


<div id = "comment_box_right">
    On this page you see the posts by the people you follow.<br>
    You can email a post using 'Email This Post'.<br><br>
    <strong>You can only email posts to FRIENDS.<br>
        Please make sure you have registered at least one friend to email a post to.</strong>
</div>