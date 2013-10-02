<!doctype html>
/* On this page people can create their blog entries
<?php
require_once('php_scripts/init.php')
?>
<head>
	<meta name="description" content="microblog">
	<meta name="author" content="Christian Jonathan Haverkampf"
</head>
<body>

<?php
$file = './files/blog.txt';
// get blog content
$content = file_get_contents($file);
?>

The text currently in the blog is:
<?=$content?>

<ul>
	<li><a href="create.php">Create</a> a blog entry</li>
	<li><a href="look.php">Look</a> at the blog</li>
</ul>


</body>