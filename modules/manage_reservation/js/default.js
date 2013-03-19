function approve_reservation(a){
	f = manage_reservation_form;
	$.post($(f).attr('action')+'approve',{'id':a},
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				alertModal("Approve Reservation",data.message);
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}
function cancel_reservation(a){
	if(confirm("Are you really sure you want to cancel this reservation?")){
		$('#cancelButton'+a).button('loading');
		f = manage_reservation_form;
		$.post($(f).attr('action')+'cancel',{'id':a},
			function(data,textStatus,jqXHR){
				if(jqXHR.status==200){
					console.log(data);
					$('#cancelButton'+a).parent().parent().parent().fadeOut("slow").remove();
					reMasonReservations();
				}
				else
					alert("Something went wrong :(");
			}
		);
	}
	return false;
}

function reMasonReservations(){
	var $container = $('#reservations');
	$container.masonry({
		itemSelector : '.reservationView',
		columnWidth : 290
	});
}
reMasonReservations();