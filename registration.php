<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/ajax.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
<script>
  function showhide() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  };

  function showhide2() {
    var x = document.getElementById("cnfpassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<title>Registration</title>
</head>
<body>
<section class="testimonial py-5 " id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 py-5 border text-black  ">
                <h4 class="pb-4 text-center font-weight-bold">Personal Information</h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class=""><span><i class="fa fa-user mr-1"></i></span>Full Name</label>
                          <input id="name" name="name" placeholder="Full Name" class="form-control" type="text" autofocus>
                          <span id="name2" class="error"></span>
                        </div>
                        <div class="form-group col-md-6">
                          <label class=""><span><i class="fa fa-envelope mr-1"></i></span>Email</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" >
                          <span id="mail2" class="error"></span>
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=""><span><i class="fa fa-key mr-1"></i></span>Password</label>
                            <input id="password" name="password" placeholder="password" class="form-control"  type="password">
                            <span toggle="#password" onclick="showhide()" class="fa fa-fw fa-eye field-icon btn-btn-info toggle-password"></span>
                            <!-- <input type="Button" onclick="showhide()">Show/Hide -->
                            <span class="error" id="mpasserror"></span>

                        </div>
                        <div class="form-group col-md-6">
                            <label class=""><span><i class="fa fa-key mr-1"></i></span>Confirm Password</label>
                            <input id="cnfpassword" name="cnfpassword" placeholder="Confirm password" class="form-control" type="password">
                             <span toggle="#cnfpassword" onclick="showhide2()" class="fa fa-fw fa-eye field-icon btn-btn-info toggle-password"></span>
                            <!-- <input type="Button" onclick="showhide()">Show/Hide -->
                            <span class="error" id="cnferror"></span>
                        </div>
                        <span class="error" id="passerror"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=""><span><i class="fa fa-calendar mr-1"></i></span>Date Of Birth</label>
                            <input id="datetime" name="dob" placeholder="Date Of Birth" class="form-control form_datetime1"  type="text">
                            <span id="dob2" class="error"></span>
                        </div>
                        <div class="form-group col-md-6"> 
                                  <label class=""><span><i class="fa fa-transgender mr-1"></i></span>Gender</label>
                                  <select id="gender" name="gender" class="form-control">
                                    <option selected value="">Choose Gender...</option>
                                    <option value="male"> Male</option>
                                    <option value="female"> Female</option>                          
                                  </select>
                                <span id="gender2" class="error"></span>
                        </div>                        
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                                  <label class=""><span><i class="fa fa-address-card mr-1"></i></span>Address</label>
                                  <textarea id="add" name="add" cols="40" rows="2" class="form-control" placeholder="Type Your Address"></textarea>
                                  <span id="add2" class="error"></span>
                        </div>                                                
                    </div>                    
                    
                
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4 font-weight-bold text-center">Professional & Other Info. </h4>
                 <label class=""><span><i class="fa fa-cogs mr-1"></i></span>Skills</label>                
                    <div class="form-row ml-2 mb-1" id="skill_box">

                      <div class="form-group col-md-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" class="" name="skill" value="C">&nbsp;C</label>
                      </div>
                      <div class="form-group col-md-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" class="" name="skill" value="JAVA">&nbsp;JAVA</label>
                      </div>
                      <div class="form-group col-md-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" class="" name="skill" value="C++">&nbsp;C++</label>
                      </div>
                      <div class="form-group col-md-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" class="" name="skill" value="PYTHON">&nbsp;PYTHON</label>
                      </div>
                      <span id="skill2" class="error text-center"></span>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                         <label class=""><span><i class="fa fa-certificate mr-1"></i></span>Course</label>                                  
                          <select id="course" name="course" class="form-control">
                            <option selected value=""> Select Course </option>
                            <option value="comlit"> Comparative Literature </option>
                            <option value="ethhack"> Ethical Hacking </option>
                            <option value="bio"> Biology </option>
                          </select>
                          <span id="course2" class="error"></span>
                        </div>
                    </div>
                    <div class="form-row">                        
                      <div class="form-group col-md-4"> 
                       <label class=""><span><i class="fa fa-flag mr-1"></i></span>Country</label>                                 
                          <select id="country" name="country" class="form-control">
                            <option value="" selected> Country </option>
                            <option value="India"> India </option>
                            <option value="Bhutan"> Bhutan </option>
                            <option value="China"> China </option>
                          </select>
                          <span id="country2" class="error"></span>
                      </div>  
                      <div class="form-group col-md-8">
                         <label class=""><span><i class="fa fa-camera mr-1"></i></span>Picture</label>
                        <div class="upload-file-button justify-content-between picture_btn">                        
                          <div class="custom-file float-right ">
                            <input type="file" class="custom-file-input" id="picture" name="picture">
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
                            <option value="food"> What's your favourite food? </option>
                            <option value="pet"> Your pet name? </option>
                            <option value="band"> Your favourite band? </option>
                          </select>
                          <span id="question2" class="error"></span>
                      </div>                        
                       <div class="form-group col-md-5">
                        <label class=""><span><i class="fa fa-shield mr-1"></i></span>Security Answer</label>
                            <input id="answer" name="answer" placeholder="Your Answer" class="form-control" type="text">
                            <span id="answer2" class="error"></span>
                        </div>  
                    </div>                    
                    <div class="form-row">
                      <div class="form-group col-md-6"><span class="error" id="errorall"></span></div>
                    </div>
                    </div>
                    <div class="col-md-12 py-2 border text-center">
                      <div class="row">
                        <div class="col-md-4">
                          <button type="reset" class="btn btn-danger" id="refresh"><i class="fa fa-refresh">&nbsp;Refresh</i></button>
                        </div>
                        <div class="form-group col-md-4">
                          <input type="submit" class="btn btn-success" id="reg_sub" name="reg_sub" value="Submit">
                        </div>
                        <div class="form-group col-md-4"><a href="index.php" class="btn-btn-warning">Back to Login</a></div>
                      </div>                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<script type="text/javascript">
   $("#datetime").datepicker({
        format: 'yyyy-mm-dd'
    });

  $("#cnfpassword").on('change',function(){
    
    var pass= $('#password').val();
    var cnfpass= $('#cnfpassword').val();
    //alert(cnfpass);
    if (pass==cnfpass) {
      $('#passerror').text("Password matched").css('color green');
      $("#password").css('border','3px solid green');      
      $("#cnfpassword").css('border','3px solid green');      
    }else{
      $('#passerror').text("Password didn't Matched").css('color red');
      $("#password").css('border','3px solid red');      
      $("#cnfpassword").css('border','3px solid red');
      return false;
    }
});
  $(document).ready(function(){
    $(document).find('#picture').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //alert(fileName);
        if(fileName!= ''){
          var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
          if ($.inArray(fileName.split('.').pop().toLowerCase(), fileExtension) == -1){         
            $(".picture_btn").css('border','3px solid red');
            $('#file2').text("Please Upload a valid Image File");
            $('#reg_sub').prop('disabled', true);
          }else{
            $(".picture_btn").css('border','3px solid green');
            $(this).next('.photo').text(fileName);
            $('#file2').text("");
            $('#reg_sub').prop('disabled', false);
          }         
        }else{
          $(".picture_btn").css('border','3px solid red');
          $(this).next('.photo').text("Please Upload a File");
        }    
      });
    /*$(document).find('#picture').on('change',function(){
      //get the file name
      var fileName = $(this).val().replace('C:\\fakepath\\', " ");
      //alert(fileName);
      if(fileName!= ''){
      //replace the "Choose a file" label
        $(".picture_btn").css('border','3px solid green');
        $(this).next('.photo').text(fileName);
        $('#file2').text("");
      }else{
        $(".picture_btn").css('border','3px solid red');
        $(this).next('.photo').text("Please Upload a File");
      }    
    });*/
  });

  
  
</script>