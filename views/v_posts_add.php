<h2>Add a New Post</h2>

<form method='POST' action='/posts/p_add' style = "position: absolute; left: 100px">

    <br>
    My new post:

    <label for='content'></label><br>
    <textarea name='content' id='content' rows='12' cols='45'></textarea>
    <br><br>

    <input type='submit' value='New post'>
    <br><br>

</form>

<div id="comment_box_right">
    Write your post in this box and click 'Add Post' when you are done.<br>
    Your friends can read your posts and forward them to their friends.
</div>

<div id="menu_horizontal" style = "position: absolute; top: 450px;">
        <ul>
            <li><a href="/posts/index">View<br>Posts</a></li>
            <li><a href="/posts/users">Follow<br>Users</a></li>
            <li><a href="/profiles/find_profile">Vew<br>Profiles</a></li>
        </ul>
</div> 