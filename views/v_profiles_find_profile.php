<h2>View Profiles</h2>

<div id ="description">
    These are the registered users.<br>
    Here you can take a look at their profiles.
</div>


<br><br><br><br><br><br><br>

<article>

<?php foreach($user_profiles as $user_profile): ?>

    <!-- Print this user's name -->
    <?=$user_profile['first_name']?> <?=$user_profile['last_name']?><br>

    <form action="/profiles/p_find_profile/<?=$user_profile['profile_id']?>">
        <input type="submit" value="Display Profile">
    </form><br><br>

<?php endforeach; ?>


</article>


<div id="includeSideMenu"></div>


<div id="comment_box_right">
	These are the users who have created profiles for themselves.<br>
	You can view them individually and send them to your friends.
</div>