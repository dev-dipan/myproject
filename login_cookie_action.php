<?php
session_start();
include "connect.php";

$email= $_REQUEST['email'];
$password= md5($_REQUEST['password']);
$cookie_password= $_REQUEST['password'];

$sql= "SELECT * FROM user_tb WHERE email='".$email."' AND password='".$password."' ";
//echo $sql;die('aaa');
$data= mysqli_query($conn, $sql);
//print_r($data);die('dipan');
if(mysqli_num_rows($data)==1){
	$fetch= mysqli_fetch_array($data);
	if($fetch['status']==0){

		if(isset($_REQUEST['remember-me'])){setcookie('email',$email,time()+60*60*24);
			setcookie('password',$cookie_password,time()+60*60*24);
			}
			
		else{
			setcookie('email',$email,time()-60*60*24);
			setcookie('password',$cookie_password,time()-60*60*24);
		}
		
		$_SESSION['id']=$fetch['id'];
		//echo "Login Successful";
		header("location:profile.php?log=1");
	}
	else{
		//echo "Admin has blocked you";
		header("location:index.php?log=3");
	}
}else{
	//echo "Login Failed";
	header("location:index.php?log=2");
}

?>