function adminValidateLogin(f){
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			if(jqXHR.status==200){
				if(data=="0")
					alert("Incorrect username or password");
				else{
					loadModules();
					$('#main_menu').append('<li><a href="#logout" class="main_menu_link" id="logoutButton">LOGOUT</a></li>');
					rebindLogout();
				}
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}