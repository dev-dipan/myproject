<?php 
include 'connect.php';
session_start();
$step=$_POST['step'];
//$email=$_POST['email'];
if ($step=="first") {
	$email=$_POST['email'];
	$question=$_POST['question'];
	$answer=$_POST['answer'];
	$checkquestionsql="SELECT `email` FROM  user_tb WHERE `email`='".$email."' AND `reset_question`='".$question."' AND `reset_answer`='".$answer."'";
	//echo $checkquestionsql;die('aaa');
	$checkdata=mysqli_query($conn,$checkquestionsql);
	if (mysqli_num_rows($checkdata)==1) {		
		$_SESSION['email']=$email;
		echo 1;
	}else{
		echo 0;
	}
}elseif($step=="second"){
	$password=md5($_POST['password']);
	$updatepasssql="UPDATE user_tb SET `password`='".$password."' WHERE `email`='".$_SESSION['email']."'" ;
	$updatedata=mysqli_query($conn,$updatepasssql);
	if ($updatedata) {
		echo 1;
	}else{
		echo 0;
	}
}

?>