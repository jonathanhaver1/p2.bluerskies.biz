<h2>Add a New Post</h2>

<form style = 'position: absolute; left: 100px;' id = "form_profile" method='POST' action='/posts/p_add'>

    <span style='align:center'>

        <label for='content'>My new post:</label><br>

            <textarea name='content' id='content' type='text' rows='6' cols='45'></textarea><br><br><br>

    </span>
    
    <input type='submit' value='Create Profile'><br><br>

</form>



<div id="comment_box_right" style = "top: 250px">
    Write your post in this box and click 'Add Post' when you are done.<br>
    Other memebers can read your posts and forward them to their friends.
</div>

<br><br>

<div id="menu_horizontal" style = "position: absolute; top: 500px;">
        <ul>
            <li><a href="/posts/index">View<br>Posts</a></li>
            <li><a href="/posts/users">Follow<br>Users</a></li>
            <li><a href="/profiles/find_profile">Vew<br>Profiles</a></li>
        </ul>
</div> 