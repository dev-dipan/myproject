$(function(){
	$("#refresh").on('click',function(){
		$('.photo').text("Please Upload Your Photo");
		$(".picture_btn,#name,#email,#password,#cnfpassword,#datetime,#gender,#add,#skill_box,#course,#country,#question,#answer").css('border','1px solid rgb(206, 212, 218)');
		$(".error").text("");
	});
	var count=0;
	$('#email').on('change',function(){
	  var email=$(this).val();
	  if(email==''){
	    $('#mail2').text("Please enter email");
	    return false;
	  }else{
	    $.ajax({
	      url:"checkemail.php",
	      data:{'email':email},
	      datatype:'json',
	      type:'post',
	      success:function(response){
	        if (response==0){
	          $('#mail2').text("Email-id already exists").css('color red');
	          $('#reg_sub').prop('disabled', true);
	        }else{
	          $('#mail2').text("");
	          $('#reg_sub').prop('disabled', false);
	        }
	      }
	    });
	  }
	});
	$('#usermail').on('change',function(){
		//alert('aaa');
	  var email=$(this).val();
	  if(email==''){
	    $('#mailerr').text("Please enter email");
	    $('#usermail').css('border','3px solid red');
	    return false;
	  }else{
	    $.ajax({
	      url:"checkemail.php",
	      data:{'email':email},
	      datatype:'json',
	      type:'post',
	      success:function(response){
	        if (response==0){
	          $('#mailerr').text("");
	          //$('#reg_sub').prop('disabled', true);
	          $('#errmail').text("*");
	          $('#usermail').css('border','1px solid rgb(206, 212, 218)');
	          $('#answer_block').show();
	          $('#question_block').show();
	          $('#submit_block').show();

	        }else{
	          $('#mailerr').text("Please Enter Registerd Mail");
	          //$('#mailerr').text("Please enter email");
	          $('#answer_block').hide();
	          $('#question_block').hide();
	          $('#submit_block').hide();
	          return false;
	        }
	      }
	    });
	  }
	});

$("#submit_question").click(function(e){
	e.preventDefault();
	var question = $("#question").val();
	var answer = $("#answer").val();
	var email=$('#usermail').val();
	  if(email==''){
	  	$("#usermail").css('border','3px solid red');
	    $('#mailerr').text("Please enter email");
	    count++;
	  }else{
	  	$("#mailerr").html("");
      	$("#usermail").css('border','1px solid black');
      	count=0;
	  }
	if(question=='' ||question==undefined){
      $("#question").css('border','3px solid red');
      $("#questionerr").html("Please select a question").css("color","red");
      count++;
    }
    else{
      $("#questionerr").html("");
      $("#question").css('border','1px solid black');
      count=0;
    }
    if(answer=='' ||answer==undefined){
      $("#answer").css('border','3px solid red');
      $("#answererr").html("Please give a answer").css("color","red");
      count++;
    }
    else{
      $("#answererr").html("");
      $("#answer").css('border','1px solid black');
      count=0;
    }
    if (count>0) {
		return false;
	}else{
		var step="first";
		$.ajax({
			url:'password_change.php',
			type: 'post',
			data: {'step':step,'email':email,'question':question,'answer':answer},
			datatype: 'json',
			success:function(response){
				if (response==1) {
					$('#submiterr').text("");
					location.replace("updatepassword.php");															
				}else{
					$('#submiterr').text("Your Data doesn't matched").css("color","red");
					return false;
					
				}
			}
		});
	}
});

$("#submit_password").click(function(e){
	e.preventDefault();
	var pass= $('#password').val();
	var cnfpass= $('#cnfpassword').val();
	if (pass=='' ||pass==undefined) {
		$("#password").css('border','3px solid red');
      	$("#passerr").html("Please Enter Your New Password").css("color","red");
      	count++;
	}else{
		$("#passerr").html("");
	    $("#password").css('border','1px solid black');
	}
	if (cnfpass=='' ||cnfpass==undefined) {
		$("#cnfpassword").css('border','3px solid red');
      	$("#cnferr").html("Please Retype your Password").css("color","red");
      	count++;
	}else{
		$("#cnferr").html("");
	    $("#cnfpassword").css('border','1px solid black');
	    count=0;
	}
	if(pass!='' && cnfpass!=''){
		if(pass!=cnfpass){
			$("#cnferr").html("Password not matched").css("color","red");
			count++;
		}else{
			$("#cnferr").html("Password matched").css("color","green");
			count=0;
		}
	}
	if(count>0){
		return false;
	}else{
		var step= "second";
		$.ajax({
			url:'password_change.php',
			type: 'post',
			data: {'step':step,'password':pass},
			datatype: 'json',
			success:function(response){
				if (response==1) {
					$('#submiterr').text("");
					location.replace("index.php?log=4");
					$('#info').text("Password Updated");
					sessionStorage.clear();															
				}else{
					$('#submiterr').text("Sorry Can't Update").css("color","red");
					return false;					
				}
			}
		});
	}
});

  $("#reg_sub").click(function(e){ 
  e.preventDefault(); 	
	    
	    var name=$("#name").val();
	    if(name=='' ||name==undefined){
	      $("#name").css('border','3px solid red');
	      $("#name2").html("Please Enter Your Name").css("color","red");
	      count++;
	    }
	    else{
	      $("#name2").html("");
	      $("#name").css('border','1px solid black');
	      count=0;
	    }
	//email
		var email=$("#email").val();
		var atpos=email.indexOf("@");
		var getpos=email.lastIndexOf(".");
		if(atpos<1 || getpos-atpos<6){
			$("#email").css('border','3px solid red');
			$("#mail2").html("Please enter your mail id").css("color","red");
			count++;
		}
		else{
			$("#mail2").html("");
			$("#email").css('border','1px solid black');
			count=0;
		}

	//address
		var address=$("#add").val();
		if(address=='' || address== undefined){
			$("#add").css('border','3px solid red');
			$("#add2").html("Please Enter The Address").css("color","red");
			count++
		}
		else{
			$("#add2").html("");
			$("#add").css('border','1px solid black');
			count=0;
		}

	//password
		var pass= $('#password').val();
		if(pass=='' || pass== undefined){
			$("#password").css('border','3px solid red');
			$("#mpasserror").html("Please Enter The Password").css("color","red");
			count++
		}else{
			$("#mpasserror").html("");
			$("#password").css('border','1px solid black');
			count=0;
		}
	//confirm password
		var cpass= $('#cnfpassword').val();
		if(cpass=='' || cpass== undefined){
			$("#cnfpassword").css('border','3px solid red');
			$("#cnferror").html("Please Re-enter The Password").css("color","red");
			count++
		}else{
			$("#cnferror").html("");
			$("#cnfpassword").css('border','1px solid black');
			count=0;
		}
	//dob
		var dob= $('#datetime').val();
		if(dob=='' || dob== undefined){
			$("#datetime").css('border','3px solid red');
			$("#dob2").html("Please select your DOB").css("color","red");
			count++
		}else{
			$("#dob2").html("");
			$("#datetime").css('border','1px solid black');
			count=0;
		}
	//gen
		var gen= $('#gender').val();
		if(gen=='' || gen== undefined){
			$("#gender").css('border','3px solid red');
			$("#gender2").html("Please select your gender").css("color","red");
			count++
		}else{
			$("#gender2").html("");
			$("#gender").css('border','1px solid black');
			count=0;
		}
	//skills
		var skill=[];
		$.each($("input[name='skill']:checked"), function(){
			//alert('aa');
               skill.push($(this).val());
		});
		skillstring=JSON.stringify(skill);
		//alert(skillstring);
		if(Object.keys(skill).length == 0){
			$("#skill_box").css('border','3px solid red');
			$("#skill2").html("Please Mention one Skill").css("color","red");
			count++;
		} else {
			$("#skill2").html("");
			$("#skill_box").css('border','1px solid black');
			count=0;
		}
	//course
		var course= $('#course').val();
		if(course=='' || course== undefined){
			$("#course").css('border','3px solid red');
			$("#course2").html("Please select your course").css("color","red");
			count++
		}else{
			$("#course2").html("");
			$("#course").css('border','1px solid black');
			count=0;
		}
	//country
		var country=$("#country").val();
		//alert(country);
		if(country=='' || country== undefined){
			$("#country").css('border','3px solid red');
			$("#country2").html("Please Define one Country").css("color","red");
			count++;
		}
		else{
			$("#country2").html("");
			$("#country").css('border','1px solid black');
			count=0;
		}
	//file upload

		var file=$("#picture").val();
		if(file.length== 0){
			$(".picture_btn").css('border','3px solid red');
			$("#file2").html("Please Submit a file").css("color","red");
			count++;
		}
		else{
			$("#file2").html("");
			$(".picture_btn").css('border','3px solid green');
			count=0;
		}
	//security question
		var question=$("#question").val();
		if(question=='' || question== undefined){
			$("#question").css('border','3px solid red');
			$("#question2").html("Please select a question").css("color","red");
			count++;
		}
		else{
			$("#question2").html("");
			$("#question").css('border','1px solid black');
			count=0;
		}
	//security answer
		var answer=$("#answer").val();
		if(answer== '' || answer== undefined){
			$("#answer").css('border','3px solid red');
			$("#answer2").html("Please Set an answer").css("color","red");
			count++
		}
		else{
			$("#answer2").html("");
			$("#answer").css('border','1px solid black');
			count=0;
		}
		if (count>0) {
			return false;
		}else{
			var formdata = new FormData();
			formdata.append('name',name);
			formdata.append('email',email);
			formdata.append('password',pass);
			formdata.append('dob',dob);
			formdata.append('gender',gen);
			formdata.append('addr',address);
			formdata.append('skill',skillstring);
			formdata.append('course',course);
			formdata.append('country',country);
			if(file != undefined || file != ''){ 
				var picture = $("#picture").prop('files')[0];
				formdata.append('picture', picture);
			}
			formdata.append('question',question);
			formdata.append('answer',answer);
			$.ajax({
				url:'registration_process.php',
				type   : 'post',
				cache: false,
		        contentType: false,
		        processData: false,
				data   : formdata,
				success: function (response) 
				{
					var parseres= JSON.parse(response);
					if(parseres.code==200){
						window.location.replace("index.php")
					}else{
						$('#errorall').text("Registration Unsuccessfull Please Check the Fields");
					}
				}
				/*error: function(response){
					if (response.code==500) {
						$('#errorall').text("Registration Unsuccessfull Please Check the Fields");
					}
				}*/
			});
		}
		

	/*function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.pro_img').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#picture").change(function() {
		readURL(this);
	});*/
/*$(document).find('#file').on('change',function(){
	//get the file name
	var fileName = $(this).val().replace('C:\\fakepath\\', " ");
	//replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName);
});*/
 });
});
