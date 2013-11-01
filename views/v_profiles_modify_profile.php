
<form method='POST' action='/profiles/p_modify_profile'>

	Hit enter if you do not want to change a field<br><br>

    <label for='city'>New City:</label>
    <textarea name='city' id='city' type='text' size='25'></textarea><br>

    <label for='country'>New Country:</label>
    <textarea name='country' id='country' type='text' size='25'></textarea><br>

    <label for='birthyear'>New Birth Year:</label>
    <textarea name='birthyear' id='birthyear' type='text' size='25'></textarea><br>

    <label for='interests'>New Interests: </label>
    <textarea name='interests' id='interests' type='text' size='25'></textarea><br>

    <br><br>

    <input type='submit' value='Modify Profile'>


</form> 

    <br><br>
    <br><br>

    <div id="menu_horizontal">
            <ul>
                <li><a href="/profiles/find_profile">Profiles</a></li>
                <li><a href="/users/profile">Your Profile</a></li>
                <li><a href="/profiles/create_profile">Add Profile</a></li>
                <li><a href="/profiles/modify_profile">Modify Profile</a></li>
            </ul>
    </div>