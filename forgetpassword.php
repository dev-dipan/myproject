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
<title>Update Password</title>
    </head>
      <body>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" method="post">
                                <h3 class="text-center text-info">Forget Password</h3>
                                <div class="form-group">
                                    <label for="username" class="text-info">User Email</label>&nbsp;<span class="error" id="errmail">*&nbsp; Please Hit Tab button after complete email</span>
                                    <input type="email" name="usermail" id="usermail" class="form-control">
                                    <span class="error" id="mailerr"></span>
                                </div>
                                <div class="form-group" id="question_block" style="display: none;">
                                    <label for="question" class="text-info">Security Question:</label><br>
                                    <select class="form-control" id="question">
                                    <option value="">Choose Question..</option>
                                    <option value="food"> What's your favourite food? </option>
                                    <option value="pet"> Your pet name? </option>
                                    <option value="band"> Your favourite band? </option>                                    
                                    </select>
                                    <span id="questionerr"></span>
                                </div>
                                <div class="form-group" id="answer_block" style="display: none;">
                                    <label for="answer" class="text-info">Your Answer</label><br>
                                    <input type="text" name="answer" id="answer" class="form-control">
                                    <span id="answererr"></span>
                                </div>
                                <div id="submit_block" class="from-group text-right" style="display: none;">
                                    <input type="submit" name="submit_question" id="submit_question" value="Forget Password" class="btn btn-danger btn-md text-black font-weight-bold">
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