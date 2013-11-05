<div id = "special_features" style = "margin-left:200px; margin-top: 130px; width:150px;">

	Please login to explore all the great things on this site.<br>
	If you have not yet signed in, go to Sign in below.

</div>

<br><br><br><br><br>

<form id = "form_input" method='POST' action='/users/p_login'>

	<br>Email<br>
	<input type ='text' name ='email'>

	<br><br>Password<br>
	<input type ='password' name = 'password'>

	<br><br>

	<?php if(isset($error)): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<?php endif; ?>

	<input type = 'submit' value = 'LogIn'><br><br>

</form>

<br><br><br><br><br><br>

<div id="menu_horizontal">
        <ul>
            <li><a href="/users/signup">Signup</a></li>
            <li><a href="index">Home</a></li>
            <li><a href="htp://www.google.com">Google</a></li>
        </ul>
</div>