function logout(){
	$.post("ajax/?logout",{},
		function (data){
			loadModules('home');
		}
	);
	return false;
}
function showEditProfile(){
	alertModal("Edit Profile",$('#editProfileDiv').html());
	$('.tooltipped').tooltip();
	$('.text-tooltip').tooltip();
	$('.text-tooltip').focus(function(){
		$(this).tooltip('show');
	});
	$('.text-tooltip').focusout(function(){
		$(this).tooltip('hide');
	});
}
function adminChangePasswordModal(){
	alertModal("Change Admin Password",$('#changePasswordDiv').html());
	$('.tooltipped').tooltip();
	$('.text-tooltip').tooltip();
	$('.text-tooltip').focus(function(){
		$(this).tooltip('show');
	});
	$('.text-tooltip').focusout(function(){
		$(this).tooltip('hide');
	});
}
function changePassword(f){
	if(f.password.value!=f.cpassword.value){
		alert("Passwords did not match. Please retype your passwords.");
		return false;
	}
	if(confirm("Are you sure you want to change your password?")){
		$('#changePasswordButton').button('loading');
		$.post( $(f).attr('action'), $(f).serialize(),
			function(data, textStatus, jqXHR) {
				$('#changePasswordButton').button('success');
				$('#changePasswordButton').addClass('btn-success');
			}
		);
		setTimeout(function (){
			$('#changePasswordButton').removeClass('btn-success');
			$('#changePasswordButton').button('default');
		},3000);
	}
	return false;
}
function editAccount(f){
	if(f.password.value!=f.cpassword.value){
		alert("Passwords did not match. Please retype your passwords.");
		return false;
	}
	if(confirm("Are you sure you want to edit your profile?")){
		$('#editAccountButton').button('loading');
		$.post( $(f).attr('action'), $(f).serialize(),
			function(data, textStatus, jqXHR) {
				$('#editAccountButton').button('success');
				$('#editAccountButton').addClass('btn-success');
			}
		);
		setTimeout(function (){
			$('#editAccountButton').removeClass('btn-success');
			$('#editAccountButton').button('default');
		},3000);
	}
	return false;
}
function toggleReservations(){
	$('#calendar_div, #manage_package_div').fadeOut("fast", function(){
		$('#manage_reservation_div').fadeIn("slow");
		reMasonReservations();
	});
}
function toggleCalendar(){
	$('#manage_reservation_div, #manage_package_div').fadeOut("fast", function(){
		$('#calendar_div').fadeIn("fast");
	});
}
function toggleManagePackages(){
	$('#manage_reservation_div, #calendar_div').fadeOut("fast", function(){
		$('#manage_package_div').fadeIn("fast");
	});
}