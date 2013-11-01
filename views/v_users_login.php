
<br><br><br><br><br><br><br><br><br><br>

Please login to explore all the great things on this site.

<br><br><br><br>

<form method='POST' action='/users/p_login'>


	Email<br>
	<input type ='text' name ='email'>

	<br><br>

	Password<br>
	<input type ='password' name = 'password'>

	<br><br>

	<?php if(isset($error)): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<?php endif; ?>

	<input type = 'submit' value = 'LogIn'>

</form>

    <br><br>
 <br><br> <br><br> <br><br> <br><br> <br><br>
    <div id="menu_horizontal">
            <ul>
                <li><a href="/users/signup">Signup</a></li>
                <li><a href="index">Home</a></li>
            </ul>
    </div>