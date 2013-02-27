function adminValidateLogin(f){
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			if(jqXHR.status==200){
				if(data=="0")
					alert("Incorrect username or password");
				else
					fadeMods($('.logout_module'),0,$('.admin_module'));
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}