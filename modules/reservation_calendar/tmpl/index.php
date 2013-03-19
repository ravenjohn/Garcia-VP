<?php
	 $packages = API::execute("conrad/cal",array());
	 //var_dump($packages);
?>

<script>
	/*$(document).ready(function() {*/
		$('#calendar').fullCalendar({
			header: {
				left: 'prevYear,prev today next,nextYear ',
				center: 'title',
				right: ''/*'month,agendaWeek,agendaDay'*/
			},
			events: [
			<?php for($a = 0; $a<count($packages['data']); $a+=1){?> 
				{
				<?php 
					$startDate = substr("{$packages['data'][$a]['startDate']}",0,10);
					$endDate = substr("{$packages['data'][$a]['endDate']}",0,10);
				?>
					title: "<?php echo $packages['data'][$a]['title'];?>",
					start: "<?php echo $startDate;?>",
					end: "<?php echo $endDate;?>",
					startDate: "<?php echo $startDate;?>",
					endDate: "<?php echo $endDate;?>",
					/*user:"<?php echo $packages['data'][$a]['username']?>",*/
					location:"<?php echo $packages['data'][$a]['location']?>",
					/*additionalRequest:"<?php echo $packages['data'][$a]['additionalRequest']?>",*/
					allDay: true
				}<?php if($a+1!=count($packages['data']))echo ',';}?>
			],
			
			eventClick: function(calEvent, jsEvent, view) {

				alert('Title: ' + calEvent.title + '\nStart Date: ' + calEvent.startDate + '\nEnd Date: '+ calEvent.endDate + '\nLocation: ' + calEvent.location);
				
			}
		});
	/*});*/
</script>
<div id="calendar" class="module">
</div>