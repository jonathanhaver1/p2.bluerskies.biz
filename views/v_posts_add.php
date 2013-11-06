<h2>Add New Post</h2>

<form  id = "form_input" style = 'left: 100px;' method='POST' action='/posts/p_add'>

    <span style='align:center'><br>

        <label for='content'>My new post:</label><br>
        <textarea name='content' id='content' type='text' rows='6' cols='45'></textarea><br>

    </span>

    You may not leave this field blank<br><br>
    
    <input type='submit' value='Create Post'><br><br>

</form>


<div id="comment_box_right">
    Write your post in this box and click 'Add Post' when you are done.<br>
    Other memebers can read your posts and forward them to their friends.
</div>


<div id="menu_horizontal" style = "position: absolute; top: 560px;">
        <ul>
            <li><a href="/posts/index">View<br>Posts</a></li>
            <li><a href="/posts/users">Follow<br>Users</a></li>
            <li><a href="/profiles/find_profile">Vew<br>Profiles</a></li>
        </ul>
</div> 