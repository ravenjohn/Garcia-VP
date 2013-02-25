function cancel_reservation(f){
	var f = f;
	$.post($(f).attr('action'), $(f).serialize(),
		function (data, textStatus, jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				console.log(data);
				alert(data.message);
			}else{
				console.log(jqXHR);
				alert('Something went wrong :(');
			}
		}
	);
	return false;
}