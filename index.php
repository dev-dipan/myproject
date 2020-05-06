<?php
//print_r($_COOKIE['password']);die('aaaa');
$message="";
if(isset($_REQUEST['reg']) && $_REQUEST['reg']==1){
  $message="Registration successful";
}
if(isset($_REQUEST['log']) && $_REQUEST['log']==0){
  $message=$_REQUEST['message'];
}
if(isset($_REQUEST['log']) && $_REQUEST['log']==2){
  $message="Login failed";
}
if(isset($_REQUEST['log']) && $_REQUEST['log']==3){
  $message="Admin has blocked you";
}
if(isset($_REQUEST['log']) && $_REQUEST['log']==4){
  $message="Password Updated";
}
if(isset($_REQUEST['logout']) && $_REQUEST['logout']==1){
  $message="Successfully Logged Out";
}

session_start();
if ($_SESSION!=null) {
  if(isset($_SESSION['id'])){
    header("location:profile.php");
  }
}

?>
<!DOCTYPE html>
  <html>
    <head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<title>User Login</title>
    </head>
<body>
<div id="login">        
  <div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <form id="login-form" class="form" action="login_cookie_action.php" method="post">
            <h3 class="text-center text-info">Login</h3>
              <div class="form-group">
                <label for="username" class="text-info"><span><i class="fa fa-envelope mr-1"></i></span>Username</label>
                <input type="email" name="email" id="email" class="form-control" value="<?=(isset($_COOKIE['email']) && $_COOKIE['email']!='') ? $_COOKIE['email']:''; ?>">
                <span class="col-md-12 error text-center" id="useremail"></span>
              </div>
              <div class="form-group">
                <label for="password" class="text-info"><span><i class="fa fa-key mr-1"></i></span>Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="<?=(isset($_COOKIE['password']) && $_COOKIE['password']!='') ? $_COOKIE['password']:''; ?>">
                <span class="col-md-12 error text-center" id="userpass"></span>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="remember-me" class="text-info">
                    <span>Remember me</span> <span>
                      <input id="remember-me" name="remember-me" type="checkbox" value="1"<?php echo isset($_COOKIE['email']) && isset($_COOKIE['password'])?'checked':''; ?>>
                    </span>
                  </label>
                </div>
                <div class="form-group col-md-6 text-right">
                  <a href="forgetpassword.php" class="text-info">Forget Password</a>
                </div>
              </div>                
                <div class="form-row" >
                  <div class="col-md-6">
                  <?php if(isset($_REQUEST['log']) && $_REQUEST['log']==4){?>
                      <span class="col-md-12 successupdate font-weight-bold" id="info"><?=$message?></span>
                  <?php } else{?>
                      <span class="col-md-12 error loginmessage" id="info"><?=$message?></span>
                  <?php } ?>
                  </div>
                  <div class="col-md-6 row "style="padding-right: 46px;">
                    <div class="col-md-8">
                      <button type="submit" name="submit" id="loginbtn" class="btn btn-success">Login&nbsp;<i class="fa fa-sign-in p-0"></i></button>
                    </div>                  
                    <div class="col-md-4 ">
                      <a href="registration.php" class="btn btn-warning"><i class="fa fa-user-plus">&nbsp;Register</i></a>
                    </div>
                  </div>                             
                </div>                               
              </div>
              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html> 

  <script type="text/javascript">
    setTimeout(function(){
      $('.successupdate,.loginmessage').hide();
  }, 2000);
    
    $('#loginbtn').on('click',function(e){
      var count=0;
      //e.preventDefault();
      if($('#email').val()==''){
        $('#email').css('border','3px solid red');
        $('#useremail').text("Please Enter Username");
        count=1;
      }else{
        $('#email').css('border','1px solid rgb(206, 212, 218)');
         $('#useremail').text("");
        count=0;
      }
      if($('#password').val()==''){
        $('#password').css('border','3px solid red');
        $('#userpass').text("Please Enter Password");
        count=1;
      }else{
        $('#password').css('border','1px solid rgb(206, 212, 218)');
        $('#userpass').text("");
       count=0;
      }
      if (count>0) {
        return false;
      }else{
        return true;
      }
    })

  </script>