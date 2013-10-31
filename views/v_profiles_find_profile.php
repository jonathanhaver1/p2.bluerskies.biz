<?php foreach($user_profiles as $user_profile): ?>

    <!-- Print this user's name -->
    <?=$user_profile['first_name']?> <?=$user_profile['last_name']?>

    <a href='/profiles/p_find_profile/<?=$user_profile['profile_id']?>'>Display this Profile</a>

    <br><br>

<?php endforeach; ?>