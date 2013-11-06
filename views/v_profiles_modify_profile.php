<h2>Modify Your Profile</h2>

<!-- text under banner !-->
<div id ="description">

    You can modify and update your profile below<br><br>

    <span style = "font-style: italic">If you already have a profile and clicked on 'Add Profile'
    you are taken here automatically.</span>
    
</div>

<!-- request new profile information!-->
<form id = "form_profile" method='POST' action='/profiles/p_modify_profile'>

    <br>

    <span style='align:center'>

        Please enter your details.<br>
        You must fill in all fields.
        <br>
        <br>

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
    <input type='submit' value='Modify Profile'><br><br>

</form> 


<!-- main menu side left !-->
<div id="includeSideMenu"></div>


<!-- comment box in the upper right !-->
<div id="comment_box_right">
        Modify your profile.<br>Other users will be able to see the changes.
</div>