<?php
	/*
	 *	don't forget to wrap your module with <div id="module_name_div"></div>
	 *	and delete this comment :)
	 */
	 $packages = API::execute("conrad/cal",array());
?>

<script>
	$(document).ready(function() {
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
					$y = substr("{$packages['data'][$a]['startDate']}",0,4);
					$m = substr("{$packages['data'][$a]['startDate']}",5,2) - 1;
					$d = substr("{$packages['data'][$a]['startDate']}",8,2);
					$h = substr("{$packages['data'][$a]['startDate']}",11,2);
					$mn = substr("{$packages['data'][$a]['startDate']}",14,2);
					/*$s = substr("{$packages['data'][$a]['startDate']}",17,2);*/
					$y1 = substr("{$packages['data'][$a]['endDate']}",0,4);
					$m1 = substr("{$packages['data'][$a]['endDate']}",5,2) - 1;
					$d1 = substr("{$packages['data'][$a]['endDate']}",8,2);
					$h1 = substr("{$packages['data'][$a]['endDate']}",11,2);
					$mn1 = substr("{$packages['data'][$a]['endDate']}",14,2);
					/*$s1 = substr("{$packages['data'][$a]['startDate']}",17,2);*/
				?>
					title: "<?php echo $packages['data'][$a]['title'];?>",
					start: new Date(<?php echo $y.','.$m.','.$d.','.$h.','.$mn;?>),
					end: new Date(<?php echo $y1.','.$m1.','.$d1.','.$h1.','.$mn1;?>),
					description: 'Start Date:<?php echo $packages['data'][$a]['startDate']?></br>End Date :<?php echo $packages['data'][$a]['endDate']?></br>Location:<?php echo $packages['data'][$a]['location']?></br>Additional Request:<?php echo $packages['data'][$a]['additionalRequest']?>',
					allDay: false
				}<?php if($a+1!=count($packages['data']))echo ',';}?>
			],
			/*
			eventRender: function(event, element) {
				element.qtip({
				content: event.description
			});
			}
			*/
		})
	});
</script>
<div id="calendar" class="module">
</div>