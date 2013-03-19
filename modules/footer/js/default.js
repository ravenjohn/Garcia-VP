function showLoginForm(){
	alertModal("Admin Login",$('#adminFormDiv').html());
}
function adminLogin(f){
	$('#adminLoginButton').button('loading');
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			$('#adminLoginButton').button('default');
			if(jqXHR.status==200){
				if(data=="0")
					alert("Incorrect username or password");
				else{
					$('#alertModal').modal('hide');
					if(window.location.hash !== "#home")
						$('#home_menu').click();
					loadModules();
				}
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}