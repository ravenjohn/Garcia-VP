function make_reservation(f){
	if(f.packageName.value=='' || f.packageName.value==null) {
		alert("Please select a package first");
		return false;
	}
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				if(data.error=="")
					alert("Successfully reserved. Please wait for the admin to contact you.");
				else
					alert(data.error);
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}