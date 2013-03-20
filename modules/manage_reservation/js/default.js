function approve_reservation(a){
	if(confirm("Are you really sure you want to approve this reservation?")){
		$('#approveButton'+a).button('loading');
		f = manage_reservation_form;
		$.post($(f).attr('action')+'approve',{'id':a},
			function(data,textStatus,jqXHR){
				if(jqXHR.status==200){
					console.log(data);
					$('#approveButton'+a).fadeOut('slow');
					$('#reservationLabel'+a).addClass("label-success");
					$('#reservationLabel'+a).html("APPROVED");
					$('#reservationButtons'+a).html('<button type="button" class="btn btn-success pull-right" onclick="viewQuotationModal('+a+');" id="quotationButton'+a+'" data-loading-text="Loading...">MANAGE QUOTATION</button>');
				}
				else
					alert("Something went wrong :(");
			}
		);
	}
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

function showProfileModal(email){
	$.post('ajax/?get_profile',{'email':email},
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				console.log(data);
				data = JSON.parse(data);
				data = data['data'][0];
				body  = 'Full Name :&nbsp;<b>'+data['fullName']+'</b><br />';
				body += 'Contact Number :&nbsp;<b>'+data['contact']+'</b><br />';
				body += 'Address :&nbsp;<b>'+data['address']+'</b><br />';
				alertModal(email,body);
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}

function viewQuotationModal(a,name){
	alertModal("Create Quotation<br /><small>"+name+"</small>",$('#createQuotationDiv').html());
	$('#quotationReservationId').val(a);
	$.post('ajax/?get_quotation',{'reservationId':a},
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				console.log(data);
				data = JSON.parse(data);
				data = data['data'];
				for(i=0;i<data.length;i++){
					$('#quotationTableHeader').after('
					<tr>
						<td>
							<input type="text" class="span4" name="item[]" placeholder="Item" value="'+ data[i].item +'"/>
						</td>
						<td>
							<div class="input-append">
								<input type="number" class="span1 costInput newInput" name="cost[]" placeholder="4000" value="'+ data[i].cost +'"/>
								<span class="add-on">.00</span>
							</div>
						</td>
					</tr>
					');
				}
				compute();
				rebindAutoCompute();
			}
			else
				alert("Something went wrong :(");
		}
	);	
	return false;
}
function addQuotationItem(){
	$('#addRowButton').before('
	<tr>
		<td>
			<input type="text" class="span4" name="item[]" placeholder="Item"/>
		</td>
		<td>
			<div class="input-append">
				<input type="number" class="span1 costInput newInput" name="cost[]" placeholder="4000"/>
				<span class="add-on">.00</span>
			</div>
		</td>
	</tr>
	');
	rebindAutoCompute();
	return false;
}

function rebindAutoCompute(){
	$('.newInput').focusout(function(e){
		compute();
		$('.newInput').removeClass('newInput');
	});
}

function compute(){
	val = 0;
	for(i=0;i<$('.costInput').length;i++){
		if(/^[0-9]{1,}$/.test($('.costInput')[i].value))
			val+=parseInt($('.costInput')[i].value);
	}
	$('#totalCost').html(val+'.00');
	$('#totalCostInput').val(val);
}

function reMasonReservations(){
	var $container = $('#reservations');
	$container.masonry({
		itemSelector : '.reservationView',
		columnWidth : 290
	});
}

function createQuotation(f){
	$.post('ajax/?create_quotation',$(f).serialize(),
		function(data,textStatus,jqXHR){
			console.log(data);
			f.submit();
		}
	);
	return false;
}

function view_quotation(id){
	$('#reservationId1').val(id);
	temp = $("#manage_reservation_form").attr('action');
	$("#manage_reservation_form").attr('action','ajax/?view_quotation');
	$("#manage_reservation_form").attr('target','_blank');
	$("#manage_reservation_form").submit();
	$("#manage_reservation_form").attr('action',temp);
	$("#manage_reservation_form").removeAttr('target');
}

reMasonReservations();