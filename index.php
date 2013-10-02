<!doctype html>
<?php
require_once('php_scripts/init.php')
?>
<head>
	<meta name="description" content="microblog">
	<meta name="author" content="Christian Jonathan Haverkampf"
</head>
<body>
	<?php $today = date("F j, Y, g:i a")?> 
	<br>
	Welcome!
	<br>
	<?=$today?>
	On the following pages you will be able to create blog entries
	and see what other people have written.
<ul>
	<li><a href="create.php">Create</a> a blog entry</li>
	<li><a href="look.php">Look</a> at the blog</li>
</ul>

</body>