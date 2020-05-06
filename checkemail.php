<?php

include "connect.php";
$email=$_POST['email'];
$query= "SELECT * FROM user_tb WHERE email='".$email."'";
$check_email= mysqli_query($conn,$query);
//print_r(mysqli_num_rows($check_email)); die('aa');
if(mysqli_num_rows($check_email)==1){
	echo 0;
}else {
	echo 1;
}

?>