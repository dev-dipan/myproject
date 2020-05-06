$(document).ready(function(){
	//Swal.fire('User Profile');
	var count = 0;
	function readURL(input) {
		//alert('aa');
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.pro_img').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#password').keyup(function(){
		var pass= $(this).val();
		if(pass == '' || pass == undefined){
			$('#edit_sub').prop('disabled', true);
			$('#passworderr').text("Please Give Your Password");
			$('#password').css('border','3px solid red');
			return false;
		}else{
			$('#passworderr').text("");
			$('#password').css('border','1px solid rgb(206, 212, 218)');
			$.ajax({
				url: 'checkpassword.php',
				type: 'post',
				data:{'password':pass},
				datatype:'json',
				success: function(response){
					if(response==1){
						$('#edit_sub').prop('disabled', false);
					}else{
						$('#edit_sub').prop('disabled', true);
					}
				}
			});
		}
	})

	
    $(document).find('#picture').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //alert(fileName);
        if(fileName!= ''){
          var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
          if ($.inArray(fileName.split('.').pop().toLowerCase(), fileExtension) == -1){
      		$(".picture_btn").css('border','3px solid red');
      		$('#picture').next('.photo').text("Please Upload Your Photo");
        	$('#file2').text("Please Upload a valid Image File");
        	return false;
          }else{
            var _URL = window.URL || window.webkitURL;
            var file=$(this)[0].files[0];
            img = new Image();
            var imgwidth = 0;
            var imgheight = 0;
            var maxwidth = 640;
            var maxheight = 640;
            img.src = _URL.createObjectURL(file);
            img.onload = function() {
              imgwidth = this.width;
              imgheight = this.height;
              if(imgwidth <= maxwidth && imgheight <= maxheight){
                $(".picture_btn").css('border','3px solid green');
                $('#picture').next('.photo').text(fileName);
                $('#file2').text("");
                var reader = new FileReader();
				reader.onload = function(e) {
					$('.pro_img').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
                return true;
              }else{
                $(".picture_btn").css('border','3px solid red');
                $('#file2').text("Please Upload a Image Max 640x640");
                $('#picture').next('.photo').text("Please Upload Your Photo");
                return false;
              }
            }
          }         
        }else{
          $(".picture_btn").css('border','3px solid red');
          $('#picture').next('.photo').text("Please Upload Your Photo");
        }    
      });

	/*$(document).find('#picture').on('change',function(){
      //get the file name
      var fileName = $(this).val().replace('C:\\fakepath\\', " ");
      //alert(fileName);
      if(fileName!= ''){
      	var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      	if ($.inArray(fileName.split('.').pop().toLowerCase(), fileExtension) == -1){
      		$('#edit_sub').prop('disabled', false);
      		$(".picture_btn").css('border','3px solid red');
        	$('#file2').text("Please Upload a valid Image File");
        	$('#edit_sub').prop('disabled', true);
      	}else{
      		$(".picture_btn").css('border','3px solid green');
        	$(this).next('.photo').text(fileName);
       		$('#file2').text("");
        	readURL(this);
        	$('#edit_sub').prop('disabled', false);
        	
      	}
        
      }else{
        $(".picture_btn").css('border','3px solid red');
        $(this).next('.photo').text("Please Upload a File");
      }    
    });*/
		
	$('#name,#email,#address,#country,#question,#password,#answer,#gender,.skill,#datetime,#picture,#course').prop('disabled', true);
	//$('#edit_sub').prop('disabled', true);
	$('#edit_profile').on('click',function(){
		$('#edit_profile').hide();
		$('#edit_sub').prop('hidden', false);
		$('#edit_sub').prop('disabled', true);
		$('#name,#address,#country,#question,#password,#answer,#gender,.skill,#datetime,#picture,#course').prop('disabled', false);
	})
	$('#edit_sub').on('click',function(e){
		e.preventDefault();
		//alert(count);
		var id= $(this).data('id');
		
		//alert(id);return false;
		if ($('#name').val() == '' || $('#name').val() == undefined) {
			$('#name').css('border','3px solid red');
			$('#nameerr').text("Please Enter Your Name");
			return false;
		}else{
			var name 		= $('#name').val();
			$('#nameerr').text("");
			$('#name').css('border','1px solid rgb(206, 212, 218)');
			count = 0;			
		}

		var email 		= $('#email').val();

		if ($('#datetime').val() == '' || $('#datetime').val() == undefined) {
			$('#dateofbirtherr').text("Please Enter Date of Birth");
			$('#datetime').css('border','3px solid red');
			return false;			
		}else{
			var dob 		= $('#datetime').val();
			$('#dateofbirtherr').text("");
			$('#datetime').css('border','1px solid rgb(206, 212, 218)');
			count = 0;
		}

		if ($("select[id='gender']").val() == '' || $("select[id='gender']") == undefined) {
			$('#gendererr').text("Please Select Your Gender");
			$('#gender').css('border','3px solid red');
			return false;
		}else{
			var gender 		= $('#gender').val();
			$('#gendererr').text("");
			$('#gender').css('border','1px solid rgb(206, 212, 218)');
			count = 0;			
		}

		if ($('#address').val() == '' || $('#address').val() == undefined) {
			$('#addresserr').text("Please Enter Your Address");
			$('#address').css('border','3px solid red');
			return false;
		}else{
			var address 	= $('#address').val();
			$('#addresserr').text("");
			$('#address').css('border','1px solid rgb(206, 212, 218)');
			count = 0;
		}

		var skill=[];
		$.each($("input[name='skill']:checked"), function(){
               skill.push($(this).val());
		});
		
		if(Object.keys(skill).length != 0){
			$("#skillerr").text("");
			$("#skill_box").css('border','none');
			var skillstring=JSON.stringify(skill);
			count = 0;			
		} else {
			$("#skill_box").css('border','3px solid red');
			$("#skillerr").text("Please Mention one Skill");
			return false;
		}

		if ($("select[id='course']").val() == '' || $("select[id='course']").val() == undefined) {
			$('#courseerr').text("Please Select Your Course");
			$('#course').css('border','3px solid red');
			return false;
		}else{
			var course 		= $("select[id='course']").val();
			$('#courseerr').text("");
			$('#course').css('border','1px solid rgb(206, 212, 218)');
			count = 0;
			
		}

		if ($("select[id='country']").val() == '' || $("select[id='country']").val() == undefined) {
			$('#countryerr').text("Please Select Your Country");
			$('#country').css('border','3px solid red');
			return false;
		}else{
			var country 	= $("select[id='country']").val();
			$('#countryerr').text("");
			$('#country').css('border','1px solid rgb(206, 212, 218)');
			count = 0;			
		}

		if ($("select[id='question']").val() == '' || $("select[id='question']").val() == undefined) {
			$('#questionerr').text("Please Select Your Question");
			$('#question').css('border','3px solid red');
			return false;
		}else{
			var question 	= $("select[id='question']").val();
			$('#questionerr').text("");
			$('#question').css('border','1px solid rgb(206, 212, 218)');
			count = 0;			
		}

		if ($('#answer').val() == '' || $('#answer').val() == undefined) {
			$('#answererr').text("Please Enter Your Answer");
			$('#answer').css('border','3px solid red');
			return false;
		}else{
			var answer 		= $('#answer').val();
			$('#answererr').text("");
			$('#answer').css('border','1px solid rgb(206, 212, 218)');
			count = 0;
			
		}
		var picture 	= $('#picture').val();
		if(picture == '' || picture == undefined){
			$(".picture_btn").css('border','1px solid rgb(206, 212, 218)');
		}else{
			$(".picture_btn").css('border','3px solid green');
		}

		if ($('#password').val() == '' || $('#password').val() == undefined) {
			$('#passworderr').text("Please Give Your Password");
			$('#password').css('border','3px solid red');
			return false;
		}else{
			var password 	= $('#password').val();
			//alert(password);
			$('#passworderr').text("");
			$('#password').css('border','1px solid rgb(206, 212, 218)');
			count = 0;			
		}

				
		//alert(count);

		if (count>0) {
			return false;
		}
		else{
			//alert(count);return false;
			const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-success ml-5',
			    cancelButton: 'btn btn-danger mr-5'
			  },
			  buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
			  title: 'Are you sure?',
			  text: "Your Data Will be Updated !",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Yes, Update',
			  cancelButtonText: 'No, cancel!',
			  reverseButtons: true
			}).then((result) => {
			  if (result.value) {
			    var formdata = new FormData();
				formdata.append('id',id); 
				formdata.append('name',name);
				formdata.append('email',email);
				formdata.append('password',password);
				formdata.append('dob',dob);
				formdata.append('gender',gender);
				formdata.append('addr',address);
				formdata.append('skill',skillstring);
				formdata.append('course',course);
				formdata.append('country',country);
				formdata.append('question',question);
				formdata.append('answer',answer);
				if(picture != undefined || picture != ''){ 
					var file = $("#picture").prop('files')[0];
					formdata.append('picture', file);
				}
				$.ajax({
					url:'edit_process.php',
					type:'post',
					data:formdata,
					cache: false,
			        contentType: false,
			        processData: false,
			        success: function (response) 
					{
						/*console.log(response);
						return false;*/
						if(response.length!=0){
							Swal.fire({
							  icon: 'success',
							  title: 'Congrats!',
							  text: 'You Have Successfully Updated'
							});
							$('#name,#email,#address,#country,#question,#password,#answer,#gender,.skill,#datetime,#picture,#course').prop('disabled', true);
							$('#edit_sub').prop('hidden', true);
							$('.photo').text("Please Upload Your Photo");
							$(".picture_btn").css('border','1px solid rgb(206, 212, 218)');
							$("#picture").val("");
							$("#password").val("");						
							$('#edit_profile').show();
						}else{
							Swal.fire({
							  icon: 'error',
							  title: 'Not good',
							  text: 'Something is wrong'
							});
						}
					}
				});
				swalWithBootstrapButtons.fire(
			      'Updated!',
			      'successfully'
			    )
			  } else if (
			    /* Read more about handling dismissals below */
			    result.dismiss === Swal.DismissReason.cancel
			  ) {
			    swalWithBootstrapButtons.fire(
			      'Cancelled',
			      'Your Edits will be Reverted :)',
			      'error'
			    )
			    window.location.reload();
			  }
			})
			
		}

	});
});