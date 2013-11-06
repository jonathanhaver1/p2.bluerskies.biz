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


<div id="includeSideMenu"></div>


<div id="comment_box_right">
    Pick a friend to email a post to.
</div>