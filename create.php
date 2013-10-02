<!doctype html>
// On this page people can create their blog entries
<?php
require_once('php_scripts/init.php')
?>
<head>
	<meta name="description" content="microblog">
	<meta name="author" content="Christian Jonathan Haverkampf"
</head>
<body>

<form action="write_entry.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Blog Text: <input type="text" name="entry"><br>
<input type="submit">
</form>

</body>