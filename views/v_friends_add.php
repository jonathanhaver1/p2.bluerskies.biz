<h2>Add a Friend</h2>

<div id ="description">
    You can add a friend below<br>
    to forward messages and to send an invitation.
</div>


<form id = "form_profile" method='POST' action='/friends/p_add'>

	<span style='align:center'><br>

        Please enter your friend's details<br><br><br>

        <label for='first_name'>First Name:</label><br>
        <textarea name='first_name' id='first_name' type='text' size='30'></textarea><br><br>

        <label for='last_name'>Last Name:</label><br>
        <textarea name='last_name' id='last_name' type='text' size='30'></textarea><br><br>

        <label for='email'>Email Address:</label><br>
        <textarea name='email' id='email' type='text' size='30'></textarea><br><br>

        <label for='interests'>Interests:</label><br>
        <textarea name='interests' id='interests' type='text' rows='4' cols='30'></textarea><br><br>

        <label for='comments'>Comments:</label><br>
        <textarea name='comments' id='comments' type='text' rows='8' cols='30'></textarea><br><br>

        <br>

    </span>

    <input type='submit' value='Add Friend'><br><br>

</form> 


<div id="includeSideMenu"></div>


<div id = "comment_box_right">
    When you add a friend, only you have access to your friends.<br>
    You can send posts and profiles to your friends.<br>
    You can also send them an invitation to join as users.
</div>