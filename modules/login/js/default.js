function validateLogin(f){
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
				alert(data);
			}else{
				alert("Something went wrong :(");
			}
		}
	);
	return false;
}