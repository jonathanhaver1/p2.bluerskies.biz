<h2>Email a Post to a Friend</h2>

<div id ="description">
        Pick one of your friends below to email the post to.<br>
</div>


<form method='POST' action='/posts/p_email/'.<?=$post_id?>>


list friends

Enter Friend's Details:

	    <label for='first_name'>First Name:</label><br>
	    <textarea name='first_name' id='first_name' rows='1' cols='25'></textarea>

	   	<label for='last_name'>Last Name:</label><br>
	    <textarea name='last_name' id='last_name' rows='1' cols='25'></textarea>

	    <br><br>
	    <input type='submit' value='New post'>

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
            <li class='active'><a href="/profiles/find_profile">Display Profile</a></li>
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
            Pick a friend to email a post to.
    </div>