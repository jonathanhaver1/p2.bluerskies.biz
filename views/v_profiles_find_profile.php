<h2>View Profiles</h2>

<!-- under banner !-->
<div id ="description">
    These are the registered users.<br>
    Here you can take a look at their profiles.
</div>

<br><br><br><br><br><br><br>


<!-- loop through users !-->
<div id = "data_list">

	<?php foreach($user_profiles as $user_profile): ?>

	    <!-- Print this user's name -->
	    <span id = "post_table_name"><?=$user_profile['first_name']?> <?=$user_profile['last_name']?></span><br>

	    <form action="/profiles/p_find_profile/<?=$user_profile['profile_id']?>">
	        <input type="submit" value="Display Profile">
	    </form><br><br>

	<?php endforeach; ?>

</div>

<!-- side menu !-->
<div id="includeSideMenu"></div>

<!-- lcomment box on right of screen !-->
<div id="comment_box_right">
	These are the users who have created profiles for themselves.<br>
	You can view them individually and send them to your friends.
</div>