<?php 
include 'connect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$address = $_POST['addr'];
	$skill = $_POST['skill'];
	$course = $_POST['course'];
	$country = $_POST['country'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$updated_at=date('Y-m-d H:i:s');
	if(isset($_FILES['picture']) && !empty($_FILES['picture'])){
		$removesql="SELECT `picture` FROM `user_tb` WHERE `id`='".$id."'";
		$removedata=mysqli_query($conn,$removesql);
		$resultpic=mysqli_fetch_array($removedata);
		unlink($resultpic['picture']);
		$picture = $_FILES['picture']['name'];
		$tmpname= $_FILES['picture']['tmp_name'];
		$destination= 'uploads/'.$id.'_'.$picture;
		move_uploaded_file($tmpname, $destination);

		$updatesql="UPDATE `user_tb` SET `name`='".$name."',`dob`='".$dob."',`gender`='".$gender."',`address`='".$address."',`skill`='".$skill."',`course`='".$course."',`country`='".$country."',`reset_question`='".$question."',`reset_answer`='".$answer."',`picture`='".$destination."', `updated_at`='".$updated_at."' WHERE `email`='".$email."' AND `password`='".$password."' AND `id`='".$id."'";
		$dataupdate=mysqli_query($conn,$updatesql);
		if(isset($dataupdate)){
			$result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `user_tb` WHERE `id`='".$id."'"));
			echo json_encode($result);
		}else{
			$result= array();
			echo json_encode($result);
		}
	}else{
		$updatesql="UPDATE `user_tb` SET `name`='".$name."',`dob`='".$dob."',`gender`='".$gender."',`address`='".$address."',`skill`='".$skill."',`course`='".$course."',`country`='".$country."',`reset_question`='".$question."',`reset_answer`='".$answer."',`updated_at`='".$updated_at."' WHERE `email`='".$email."' AND `password`='".$password."' AND `id`='".$id."'" ;
		//echo $updatesql;die('dip the panu');
		$dataupdate=mysqli_query($conn,$updatesql);
	}
	if(isset($dataupdate)){
		$result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `user_tb` WHERE `id`='".$id."'"));
		echo json_encode($result);
	}else{
		$result= array();
		echo json_encode($result);
	}

?>