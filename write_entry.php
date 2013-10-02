<html>
<body>

<?php
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["write_entry"]; 
?>

Welcome <?=$name?><br>
Your email address is: <?=$email?><br>
Your blog entry text is: <?=$text?><br>

<?php
// define file
$file = 'blog.txt';
// get blog content
$content = file_get_contents($file);
// Append a new person to the file
$content .= $name + ":" + $email + ":" + $text + "***";
// Write the contents back to the file
file_put_contents($file, $content);
?>

</body>
</html>