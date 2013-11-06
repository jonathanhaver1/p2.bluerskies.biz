<h2>Follow Users</h2>

<div id ="description">
        You will be able to see the posts of the users you follow.<br>
        You can here make your selection of whom to follow.
</div>

<br><br><br><br><br><br><br>

<?php foreach($users as $user): ?>

    <article>

        <!-- Print this user's name -->
        <span id="post_table_name"><?=$user['first_name']?> <?=$user['last_name']?></span>
        <br>

        <form action="/profiles/p_find_profile/<?=$user['user_id']?>">
            <input type="submit" value="Display Profile">
        </form><br>

        <!-- If there exists a connection with this user, show a unfollow link -->
        <?php if(isset($connections[$user['user_id']])): ?>
            <span id="post_content"><a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a></span>
        <!-- Otherwise, show the follow link -->
        <?php else: ?>
            <span id="post_content"><a href='/posts/follow/<?=$user['user_id']?>'>Follow</a></span>
        <?php endif; ?>

        <br>
        ____________________________________<br><br>

    </article>

<?php endforeach; ?>


<div id="includeSideMenu"></div>


<div id = "comment_box_right">
    When you follow a user, you follow all their posts.<br>
    To view the posts by the users you follow click on 'View Posts'.
</div>