<h2>Create Your Profile</h2>

<div id ="description">
    You can create and post your profile below.<br>
    If you already have a profile you will be taken their automatically.<br>

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



<div id="menu_side">

    <span id = "menu_side_header">POSTS</span>

    <ul>
        <li class='active'><a href="/posts/index">View Posts</a></li>
        <li><a href="/posts/users">Follow Users</a>
        <li class='last'><a href="/posts/add">Add Post</a></li>
    </ul>

    <span id = "menu_side_header">PROFILES</span>

    <ul>
        <li class='active'><a href="/profiles/find_profile">View Profiles</a></li>
        <li><a href="/users/profile">Your Profile</a></li>
        <li><a href="/profiles/create_profile">Add Profile</a></li>
        <li class='last'><a href="/profiles/modify_profile">Modify Profile</a></li>
    </ul>


    <span id = "menu_side_header">FRIENDS</span>

    <ul>
        <li class ='active'><a href="/friends/index">Friends List</a></li>
        <li class='last'><a href="/friends/add">Add Friend</a></li>
    </ul>

</div>


<div id="comment_box_right">
        Create your profile. Other users will be able to see it.
</div>