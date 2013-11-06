<h2>Index of Your Friends</h2>

<div id ="description">

        Below are the friends you have entered.
        You can now invite a friend to become a user of this platform.<br>

</div>

<br><br><br><br><br><br><br>


<?php foreach($friends as $friend): ?>

    <div id ="friends_list">

        <span id="post_table_name">

            <?=$friend['first_name']?> <?=$friend['last_name']?><br>
            Email: <?=$friend['email']?><br>
            Interests: <?=$friend['interests']?><br>
            Comments: <?=$friend['comments']?><br><br>

        </span>

        on the list since: 

        <time datetime="<?=Time::display($friend['modified'],'Y-m-d G:i')?>">
                <?=Time::display($friend['modified'])?><br>
        </time>

        <form action="/friends/email_invitation/<?=$friend['friend_id']?>">
            <input type="submit" value="Email this Friend an Invitation">
        </form><br><br>

    </div>

<?php endforeach; ?>


<div id="includeSideMenu"></div>


<div id = "comment_box_right">
	This is a list of your friends. Indicate if you want to send a friend an inivtation.
</div>