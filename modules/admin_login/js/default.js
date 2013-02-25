function adminValidateLogin(f){
	for(var i=0; i<f.elements.length; i++){
		var e = f.elements[i];
		if(e.type!='submit' && e.value==""){
			e.focus();
			alert("Please input username and password before logging in");
			return false;
		}
	}
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			if(jqXHR.status==200){
				if(data=="0"){
					alert("Incorrect username or password");
				}else{
					$('#admin_log_in_div').hide();
					$("#logout_div").show();
					$("#create_package_div").show();
					
				}
				console.log(data);
			}else{
				alert("Something went wrong :(");
			}
		}
	);
	return false;
}