<?php
	defined('AUTH') or die;
	$packages = API::execute("conrad/cal",array());
?>
<script>
	$('#calendar_div').fullCalendar({
		header: {
			left: 'prevYear,prev today next,nextYear ',
			center: 'title',
			right: ''
		},
		events: [
			<?php for($a = 0; $a<count($packages['data']); $a+=1){?> 
				{
				<?php 
					$startDate = substr($packages['data'][$a]['startDate'],0,10);
					$endDate = substr($packages['data'][$a]['endDate'],0,10);
				?>
					title: "<?php echo $packages['data'][$a]['title'];?>",
					start: "<?php echo $startDate;?>",
					end: "<?php echo $endDate;?>",
					startDate: "<?php echo $startDate;?>",
					endDate: "<?php echo $endDate;?>",
					location:"<?php echo $packages['data'][$a]['location']?>",
					allDay: true
				}
				<?php
				if($a+1!=count($packages['data']))echo ',';
			}?>
		],
		
		eventClick: function(calEvent, jsEvent, view) {
			alertModal(calEvent.title,'Start Date: ' + calEvent.startDate + '<br />End Date: '+ calEvent.endDate + '<br />Location: ' + calEvent.location);
		}
	});
</script>
<div id="calendar_div" class="module">
</div>