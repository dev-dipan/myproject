<?php
	include 'connect.php';
	session_start();
	if (isset($_POST['password'])){
		$password=md5($_POST['password']);
		$id=$_SESSION['id'];
		$checkpasssql= "SELECT `password` FROM `user_tb` WHERE `id`='".$id."' AND `password`='".$password."'";
		$checkdata= mysqli_query($conn,$checkpasssql);
		if(mysqli_num_rows($checkdata)==1){
			echo 1;
		}else{
			echo 0;
		}
	}
?>