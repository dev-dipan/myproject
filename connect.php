<?php
$conn=mysqli_connect('localhost','root','','portal_db');
if(!$conn)
{
	die('Could not connect: '.mysqli_error());
}
//echo 'Connected successfully <br>';

?>