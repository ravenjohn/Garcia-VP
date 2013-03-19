function validateLogin(f){
	$('#loginButton').button('loading');
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			$('#loginButton').button('default');
			if(jqXHR.status==200){
				console.log(data);
				if(data=="0")
					alertModal("Sign In","Incorrect username or password.&nbsp;:(&nbsp;Please try again.");
				else if(data=="2")
					alertModal("Sign In","Please confirm your account through your email, &nbsp; first. &nbsp; :)
						<br />
						<button class='btn' onclick='resendConfirmationToken();' data-loading-text='Sending ...' data-success-text='Sent!' id='resendConfButton'> Resend Confirmation Email </button>
					");
				else
					loadModules();
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}
function sign_up(f){
	if(f.password.value!=f.cpassword.value){
		alertModal("Sign Up","Passwords did not match,&nbsp;please retype your password.");
		return false;
	}
	$('#createAccountButton').button('loading');
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			$('#createAccountButton').button('default');
			if(jqXHR.status==200){
				data = JSON.parse(data);
				data = data['data'][0];
				alertModal("Sign Up",(data['status']=='0')?"Email already registered.&nbsp;:(":"Registration Successful!<br /><br />Please confirm your account through your email! &nbsp; :)");
				if(data['status']=='1') f.reset();
			}else{
				alert("Something went wrong :(");				
			}
		}
	);
	return false;
}
function forgotPasswordForm(){
	$('#passwordBlock').fadeOut("fast");
	$('#loginButton').fadeOut("fast");
	$('#forgotPasswordText').fadeOut("fast");
	$('#backToLogin').fadeIn("slow");
	$('#sendResetPasswordButton').fadeIn("slow");
	return false;
}
function showUserLoginForm(){
	$('#backToLogin').fadeOut("fast");
	$('#sendResetPasswordButton').fadeOut("fast");
	$('#passwordBlock').fadeIn("slow");
	$('#loginButton').fadeIn("slow");
	$('#forgotPasswordText').fadeIn("slow");
	return false;
}
function sendResetPassword(){
	$('#sendResetPasswordButton').button('loading');
	$.post( 'ajax/?send_reset_password', {'email' : $('#loginEmail').val()},
		function(data, textStatus, jqXHR) {
			$('#sendResetPasswordButton').button('default');
			if(jqXHR.status==200){
				console.log(data);
				data = JSON.parse(data);
				data = data['data'][0];
				alertModal("Forgot Password",(data['status']=='0')?"Email is not found.&nbsp;:(":"Password reset instruction has been sent to your email account! &nbsp; :)");
			}else{
				alert("Something went wrong :(");				
			}
		}
	);
}
function resendConfirmationToken(){
	$('#resendConfButton').button('loading');
	$.post( 'ajax/?send_confirmation_email', {'email' : $('#loginEmail').val()},
		function(data, textStatus, jqXHR) {
			if(jqXHR.status==200){
				console.log(data);
				data = JSON.parse(data);
				data = data['data'][0];
				$('#resendConfButton').button('success');
				$('#resendConfButton').addClass('disabled');
				$('#resendConfButton').attr("disabled","disabled");
			}else{
				alert("Something went wrong :(");				
			}
		}
	);
}
$('.tooltipped').tooltip();
$('.text-tooltip').tooltip();
$('.text-tooltip').focus(function(){
	$(this).tooltip('show');
});
$('.text-tooltip').focusout(function(){
	$(this).tooltip('hide');
});
$('#myCarousel').carousel();