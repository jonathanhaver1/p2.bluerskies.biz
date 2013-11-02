
<form id = "form_profile" method='POST' action='/profiles/p_modify_profile'>

    <br>

    <span style='align:center'>

    Please enter your details.<br>
    If you want to skip a field, leave it blank.
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
    <input type='submit' value='Modify Profile'>

    <br><br>

</form> 



    <div id="menu_side">
            <h2>POSTS</h2>
            <ul>
                <li class='active'><a href="/posts/index">View Posts</a></li>
                <li><a href="/posts/users">Follow Users</a>
                <li class='last'><a href="/posts/add">Add Post</a></li>
            </ul>
            <br>
            <br>
            <br>
            <br>
            <h2>PROFILES</h2>
            <ul>
                <li class='active'><a href="/profiles/find_profile">Display Profile</a></li>
                <li><a href="/users/profile">Your Profile</a></li>
                <li><a href="/profiles/create_profile">Add Profile</a></li>
                <li class='last'><a href="/profiles/modify_profile">Modify Profile</a></li>
            </ul>
            <br>
            <br>
            <br>
            <br>
            <h2>FRIENDS</h2>
            <ul>
                <li class ='active'><a href="/friends/index">Friends List</a></li>
                <li class='last'><a href="/friends/add">Add Friend</a></li>
            </ul>
    </div>

    <div id="comment_box_right">
            Modify your profile.<br>Other users will be able to see the changes.
    </div>