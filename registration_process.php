<?php
	include 'connect.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	//echo $_POST['password'];die('aaaa');
	//echo $password;
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$addr = $_POST['addr'];
	$skill = $_POST['skill'];
	$course = $_POST['course'];
	$country = $_POST['country'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	

	$sql= "INSERT INTO `user_tb`(`name`, `dob`, `email`, `gender`, `course`, `address`,`skill`, `country`, `reset_question`, `reset_answer`, `password`, `status`) VALUES('".$name."','".$dob."','".$email."','".$gender."','".$course."','".$addr."','".$skill."','".$country."','".$question."','".$answer."','".$password."','0')";
	//echo "<pre>";print_r($sql);die('aa');
	$data=mysqli_query($conn,$sql);
	if($data){
		$id= mysqli_insert_id($conn);
		//echo $id;die();
		$picture = $_FILES['picture']['name'];
		$tmpname= $_FILES['picture']['tmp_name'];
		$destination= 'uploads/'.$id.'_'.$picture;
		move_uploaded_file($tmpname, $destination);
		$createddate=date('Y-m-d h:i:s');
		$resql="UPDATE `user_tb` SET `picture`='".$destination."' WHERE `id`='".$id."'";
		//echo $resql;die();
		$redata=mysqli_query($conn,$resql);
		if ($redata) {
			$result=array("code"=>200);
		}
		else{
			$desql= "DELETE FROM user_tb where `id`='".$id."'";
			$dedata=mysqli_query($conn,$desql);
			$result=array("code"=>500);
		}
	}
	else{		
		$result=array("code"=>500);
	}
	echo json_encode($result);
?>