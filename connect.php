<?php
//connect.php
$server = 'localhost';
$username   = 'root';
$password   = 'root';
$database   = 'amitforum';
$link = mysql_connect('localhost', 'root', 'root','amitforum');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if(!mysql_select_db($database))
{
    exit('Error: could not select the database');
}
//mysql_close($link);
?>
