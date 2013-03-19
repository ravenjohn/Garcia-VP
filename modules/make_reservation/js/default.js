function make_reservation(f){
	if(f.packageId.value=='' || f.packageId.value==null) {
		alertModal("Make Reservation","Please select a package first");
		return false;
	}
	a = new Date(f.startDate.value);
	b = new Date(f.endDate.value);
	a = a.setHours(parseInt(f.startTime.value)+((f.startMeridian.value=='AM')?0:12));
	b = b.setHours(parseInt(f.endTime.value)+((f.endMeridian.value=='AM')?0:12));
	if((a < new Date()) || (a > b)){
		alertModal("Make Reservation","Invalid date. Please make sure your dates are realistic.");
		return false;
	}
	$('#makeReservationButton').button('loading');
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			$('#makeReservationButton').button('default');
			if(jqXHR.status==200){
				console.log(data);
				if(data=="0"){
					alertModal("Make Reservation","Please login first before making a reservation.");
				}else{
					data = JSON.parse(data);
					if(data.error==""){
						alertModal("Make Reservation","Successfully reserved. Please wait for the admin to contact you.");
						f.reset();
					}
				}
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}