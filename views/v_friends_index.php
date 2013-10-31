<?php foreach($friends as $friend): ?>

<div id = 'introduction'>

    <h1>Name:   <?=$friend['first_name']?> <?=$friend['last_name']?></h1>

    <a href='/friends/email_invitation/<?=$friend['friend_id']?>'>Email this Friend an Invitation</a>

</div>
<?php endforeach; ?>