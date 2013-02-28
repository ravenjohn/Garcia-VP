function approve_reservation(a){
	manage_reservation_form.id.value = a;
	f = manage_reservation_form;
	$.post($(f).attr('action')+'approve',$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				alert(data.message);
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}
function cancel_reservation(a){
	manage_reservation_form.id.value = a;
	f = manage_reservation_form;
	$.post($(f).attr('action')+'cancel',$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				alert(data.message);
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}