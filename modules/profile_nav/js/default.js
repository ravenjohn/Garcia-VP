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
