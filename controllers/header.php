<?php

$SERVER = 'localhost';
$USER = 'root';
$PASSWORD = '';
$DATABASE = 'p2_bluerskies_biz';

$mylink = mysql_connect($SERVER, $USER, $PASSWORD);

if (!$mylink) {
	echo "Sorry, could not connect to the database";
	exit;
}

mysql_select_db( $DATABASE);
?>