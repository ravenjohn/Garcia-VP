$('#yearOnly').click(function(){
	if($(this).is(':checked')){
		$('#month').removeAttr("disabled");
	}else{
		$('#monthYearOnly').removeAttr("checked");
		$('#month, #day').attr("disabled","disabled");
	}
});
$('#monthYearOnly').click(function(){
	if($(this).is(':checked')){
		$('#yearOnly').attr("checked","checked");
		$('#day, #month').removeAttr("disabled");
	}else{
		$('#day').attr("disabled","disabled");
	}
});

function viewSummary(f){
	date = '';
	if(!($('#yearOnly').is(':checked')))
		date = $('#year').val();
	else if(($('#yearOnly').is(':checked')) && !($('#monthYearOnly').is(':checked')))
		date = $('#year').val()+'-'+$('#month').val();
	else
		date = $('#year').val()+'-'+$('#month').val()+'-'+$('#day').val();
	$.post($(f).attr('action'), {'date' : date},
		function (data,textStatus,jqXHR){
			console.log(data);
			data = JSON.parse(data);
			data = data['data'];
			$('#summaryTable').html('');
			total = 0;
			$('#summaryTable').append('
				<tr>
					<th align="center">Reservations</th>
					<th>Income</th>
				</tr>
			');
			for(i=0;i<data.length;i++){
				total+=parseInt(data[i].totalCost);
				$('#summaryTable').append('
					<tr>
						<td>'+data[i].title+'</td>
						<td align="right">'+data[i].totalCost+'</td>
					</tr>
				');
			}
			$('#summaryTable').append('
				<tr>
					<td>TOTAL</td>
					<td align="right">'+total+'</td>
				</tr>
			');
		}
	);
	return false;
}