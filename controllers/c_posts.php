<?php

class posts_controller {

	public function add_post () {

		echo "
		<form method='post' action='/controllers/add.php'>
		<p>Your post:</p>
		<textarea name='body' rows='5' cols='40'></textarea>
		<p><input type='submit' value='submit'/></p>
		</form>

		</body>
		</html>
		";

	}
}

?>