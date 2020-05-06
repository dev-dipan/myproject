<?php 
session_start();
//print_r($_SESSION);die;
if($_SESSION['id']!=true){
    header("location:index.php");
    exit();

}
include "connect.php";
    $sql="SELECT * FROM `user_tb` WHERE `id`='".$_SESSION['id']."'";
    //echo $sql;die;
    $data=mysqli_query($conn,$sql);
    $result=mysqli_fetch_array($data);
    //print_r($data);die();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
<script src="js/profile.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/sweetalert.min.js"></script>
	<title><?=ucfirst($result['name']).' '?>User Profile</title>
</head>
<script>
  function showhide() {

    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<body>
<div class="container emp-profile">
  
    <h3 class="font-weight-bold error text-center pt-5 pb-0 mb-0">Edit Profile</h3>
    
    <section class="testimonial py-3 " id="testimonial">
      <div class="container">
        <div class="row ">
            <div class="col-md-6 py-5  text-black">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="col-sm-12 profile-img"  ><img title="profile image" class="img-circle img-responsive pro_img" style="border-radius: .3rem;margin-left: -66px;margin-top: 0px;" src="<?=$result['picture']?>"></a></div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="pb-4 text-center font-weight-bold">Personal Information</h4>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class=""><span><i class="fa fa-user mr-1"></i></span>Full Name</label>
                          <input id="name" name="name" placeholder="Full Name" value="<?=$result['name']?>" class="form-control" type="text" autofocus>
                          <span id="nameerr" class="error"></span>
                        </div>
                        <div class="form-group col-md-6">
                          <label class=""><span><i class="fa fa-envelope mr-1"></i></span>Email</label>
                          <input type="email" class="form-control" name="email" value="<?=$result['email']?>" id="email" placeholder="Email" >                          
                        </div>
                      </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=""><span><i class="fa fa-calendar mr-1"></i></span>Date Of Birth</label>
                            <input id="datetime" name="dob" placeholder="Date Of Birth" value="<?=$result['dob']?>" class="form-control form_datetime1"  type="text">
                            <span id="dateofbirtherr" class="error"></span>
                        </div>
                        <div class="form-group col-md-6"> 
                                  <label class=""><span><i class="fa fa-transgender mr-1"></i></span>Gender</label>                                 
                                  <select id="gender" name="gender" class="form-control">
                                    <option selected value="">Choose Gender...</option>
                                    <option value="male" <?=($result['gender']=="male" ?'selected':'')?>> Male</option>
                                    <option value="female" <?=($result['gender']=="female" ?'selected':'')?>> Female</option>                          
                                  </select>
                                <span id="gendererr" class="error"></span>
                        </div>                        
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                                  <label class=""><span><i class="fa fa-address-card mr-1"></i></span>Address</label>
                                  <textarea id="address" name="add" cols="40" rows="5" class="form-control" placeholder="Type Your Address"><?=$result['address']?></textarea>
                                  <span id="addresserr" class="error"></span>
                        </div>                                                
                    </div>                    
                    
                
            </div>
            <div class="col-md-6 py-5 ">
                <h4 class="pb-4 font-weight-bold text-center mb-4">Professional & Other Info. </h4>
                    <label class=""><span><i class="fa fa-cogs mr-1"></i></span>Skills</label>                
                        <div class="form-row ml-2 mb-1" id="skill_box">
                          <div class="form-group col-md-3">
                              <label class="checkbox-inline">
                                <input type="checkbox" <?=(in_array("C", json_decode($result['skill'])))?'checked':''?> class="skill" name="skill" value="C">&nbsp;C</label>
                          </div>
                          <div class="form-group col-md-3">
                              <label class="checkbox-inline">
                                <input type="checkbox" class="skill" <?=(in_array("JAVA", json_decode($result['skill'])))?'checked':''?> name="skill" value="JAVA">&nbsp;JAVA</label>
                          </div>
                          <div class="form-group col-md-3">
                              <label class="checkbox-inline">
                                <input type="checkbox" class="skill" <?=(in_array("C++", json_decode($result['skill'])))?'checked':''?> name="skill" value="C++">&nbsp;C++</label>
                          </div>
                          <div class="form-group col-md-3">
                              <label class="checkbox-inline">
                                <input type="checkbox" class="skill" <?=(in_array("PYTHON", json_decode($result['skill'])))?'checked':''?> name="skill" value="PYTHON">&nbsp;PYTHON</label>
                          </div>
                          <span id="skillerr" class="error text-center"></span>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-12">
                             <label class=""><span><i class="fa fa-certificate mr-1"></i></span>Course</label>                                 
                              <select id="course" name="course" class="form-control">
                                <option selected value=""> Select Course </option>
                                <option value="comlit" <?=($result['course']=="comlit" ?'selected':'')?>> Comparative Literature </option>
                                <option value="ethhack" <?=($result['course']=="ethhack" ?'selected':'')?>> Ethical Hacking </option>
                                <option value="repbio" <?=($result['course']=="repbio" ?'selected':'')?>> Reproductional Biology </option>
                              </select>
                              <span id="courseerr" class="error"></span>
                            </div>
                        </div>
                        <div class="form-row">                        
                          <div class="form-group col-md-4"> 
                           <label class=""><span><i class="fa fa-flag mr-1"></i></span>Country</label>                                 
                              <select id="country" name="country" class="form-control">
                                <option value="" selected> Country </option>
                                <option value="India" <?=($result['country']=="India" ?'selected':'')?>> India </option>
                                <option value="Bhutan" <?=($result['country']=="Bhutan" ?'selected':'')?>> Bhutan </option>
                                <option value="Indonesia" <?=($result['country']=="Indonesia" ?'selected':'')?>> Indonesia </option>
                              </select>
                              <span id="countryerr" class="error"></span>
                          </div>  
                          <div class="form-group col-md-8">
                             <label class=""><span><i class="fa fa-camera mr-1"></i></span>Picture</label>
                            <div class="upload-file-button justify-content-between picture_btn">                        
                              <div class="custom-file float-right ">
                                <input type="file" class="custom-file-input" id="picture" accept=".jpg,.png" name="picture">
                                <label class="custom-file-label photo" for="picture">Please Upload Your Photo</label>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            <span id="file2" class="error"></span>
                          </div>
                        </div>                      
                        <div class="form-row">                        
                          <div class="form-group col-md-7">
                           <label class=""><span><i class="fa fa-question mr-1"></i></span>Security Question</label>                                  
                              <select id="question" name="question" class="form-control">
                                <option value="" selected> Set Security Question</option>
                                <option value="food" <?=($result['reset_question']=="food" ?'selected':'')?> > What's your favourite food? </option>
                                <option value="pet" <?=($result['reset_question']=="pet" ?'selected':'')?>> Your pet name? </option>
                                <option value="band" <?=($result['reset_question']=="band" ?'selected':'')?>> Your favourite band? </option>
                              </select>
                              <span id="questionerr" class="error"></span>
                          </div>                        
                           <div class="form-group col-md-5">
                            <label class=""><span><i class="fa fa-shield mr-1"></i></span>Security Answer</label>
                                <input id="answer" name="answer" value="<?=$result['reset_answer']?>" placeholder="Your Answer" class="form-control" type="text">
                                <span id="answererr" class="error"></span>
                            </div>  
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class=""><span><i class="fa fa-key mr-1"></i></span>Password</label>
                            <input id="password" name="password" placeholder="password" class="form-control"  type="password">
                            <!-- <span toggle="#password" onclick="showhide()" class="fa fa-fw fa-eye text-right btn-btn-info toggle-password"></span> -->
                            <!-- <input type="Button" onclick="showhide()">Show/Hide -->
                            <span class="error" id="passworderr"></span>
                        </div>
                                                
                    </div>                    
                            <div class="form-row">
                              <div class="form-group col-md-6"><span class="error" id="errorall"></span></div>
                            </div>
                        </div>
                        <div class="col-md-12 py-2 text-center">
                            <div class="row">
                                <div class="col-md-4">
                                <button type="button" class="btn btn-info" id="edit_profile"><i class="fa fa-edit">&nbsp;Edit Profile</i></button>
                                </div>
                                <div class="form-group col-md-4">
                                  <button type="submit" class="btn btn-success" id="edit_sub" data-id="<?=$result['id']?>" name="edit_sub" hidden><i class="fa fa-save">&nbsp;Update Profile</i></button>
                                <!-- <input type="submit" class="btn btn-success" id="edit_sub" name="edit_sub" value="Submit" hidden> -->
                                </div>
                                <div class="form-group col-md-4"><a href="logout.php" class="btn btn-danger btn-md"><i class="fa fa-power-off"></i>&nbsp;Logout</a></div>
                            </div>                      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>          
</div>
</body>
</html>
<script type="text/javascript">
    $("#datetime").datepicker({
        format: 'yyyy-mm-dd'
    });
</script>