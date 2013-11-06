<h2>Log In</h2>

<!-- comments box on upper side right !-->
<div id = "comment_box_right">

	Please login to explore all the great things on this site.<br>
	If you have not yet signed in, go to Sign in below.

</div><br><br><br><br><br>


<!-- login data !-->
<form id = "form_input" method='POST' action='/users/p_login'><br>

	Email<br>
	<input type ='text' name ='email'><br><br>

	Password<br>
	<input type ='password' name = 'password'><br><br>

	<?php if(isset($error)): ?>

		<div class='error'>
			Login failed.<br>Please double check your email and password.
		</div><br>

	<?php endif; ?>


	<br>Please make sure you fill in all fields<br><br>

	<input type = 'submit' value = 'Log In'><br><br>

</form><br><br><br><br><br><br>


<!-- menu below !-->
<div id="menu_horizontal" style = "margin-top: 150px">
    <ul>
        <li><a href="/users/signup">Sign<br>Up</a></li>
        <li><a href="index">Home</a></li>
        <li><a href="htp://www.google.com">Google</a></li>
    </ul>
</div>