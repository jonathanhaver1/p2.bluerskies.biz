<html>
<body>

<?php
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["entry"]; 

$blog_number = file_get_contents('./files/postings.txt')
?>

Welcome <?=$name?><br>
Your email address is: <?=$email?><br>
Your blog entry text is: <?=$text?><br>

<?php
// define file
$file = './files/blog.txt';

// get blog content
$content = file_get_contents($file);
$blog_number ++;
// Append a new person to the file
$new_content = $name . " : " . $email . " : " . $text;
$content .= $new_content;
// Write the contents back to the file
file_put_contents($file, $content);
file_put_contents('./files/postings.txt', $blog_number);
?>

<br>
Your information has been written to the blog.

<ul>
	<li><a href="create.php">Create</a> a blog entry</li>
	<li><a href="look.php">Look</a> at the blog</li>
</ul>

</body>
</html>