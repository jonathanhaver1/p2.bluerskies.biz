<h2>Create Your Profile</h2>

<div id ="description">
    You can create and post your profile below.<br>
    If you already have a profile you will be taken their automatically.<br>

</div>

<!-- request pofile data !-->
<form id = "form_profile" method='POST' action='/profiles/p_create_profile'>

	<span style='align:center'>

        <br>
        Please enter your details.<br>
        You must fill in all fields.<br><br>

        <label for='city'>City:</label><br>
        <textarea name='city' id='city' type='text' size='25'></textarea><br><br>

        <label for='country'>Country:</label><br>
        <textarea name='country' id='country' type='text' size='25'></textarea><br><br>

        <label for='birthyear'>Birth Year:</label><br>
        <textarea name='birthyear' id='birthyear' type='text' size='25'></textarea><br><br>

        <label for='interests'>Interests: </label><br>
        <textarea name='interests' id='interests' type='text' rows='5' cols='30'></textarea><br><br>

        <br>

    </span>
    
    <input type='submit' value='Create Profile'><br><br>

</form> 


<!-- main menu side left !-->
<div id="includeSideMenu"></div>


<!-- comment box upper right !-->
<div id="comment_box_right">
        Create your profile. Other users will be able to see it.
</div>