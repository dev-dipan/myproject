<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<title>Update Password</title>
</head>
<script type="text/javascript">
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
	<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Update Password</h3>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="pass" id="password" class="form-control">
                                <span id="passerr"></span>
                                <!-- <span toggle="#password" onclick="showhide()" class="fa fa-fw fa-eye field-icon btn-btn-info toggle-password"></span> -->
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Confirm Password</label><br>
                                <input type="password" name="cnfpass" id="cnfpassword" class="form-control">
                                <span id="cnferr"></span>
                            </div>
                            <div id="" class="from-group text-right">
                                <input type="submit" name="submit_password" id="submit_password" value="Change Password" class="btn btn-success btn-md text-black font-weight-bold">
                                <span id="submiterr"></span>
                            </div>          
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>