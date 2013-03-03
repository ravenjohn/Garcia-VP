<?php
$reservations = API::execute('karla/view_summary',array());
?>
<div id="view_summary_div" class="mod admin_module user_module">
	<div class="span9 offset3 gradient">
		<form action="<?php echo RConfig::ajax_url?>reservation_" class="form" name="manage_reservation_form" method="POST">
			<table class="table table-bordered" class="view_reservations_table">
				<tr>
					<th>Username</th>
					<th>Package</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Location</th>
					<th>Additional Request</th>
					<th>Action</th>
					<th></th>
				</tr>
				<?php if(empty($reservations['items'])){ ?>
				<tr class="remove">
					<th colspan="3">No reservations to display . . .  :( </th>
				</tr>
				<?php }else{?>
					<input type="hidden" name="id"/>
					<?php foreach($reservations['data'] as $p){
						if($_SESSION['role']=='user' && $p['username']!=$_SESSION['username']) continue;
					?>
					<tr>
						<td><?php echo $p['username']; ?></td>
						<td><?php echo $p['packageName']; ?></td>
						<td><?php echo $p['startDate']; ?></td>
						<td><?php echo $p['endDate']; ?></td>
						<td><?php echo $p['location']; ?></td>
						<td><?php echo $p['additionalRequest']; ?></td>
						<td>
					</tr>
					<?php }?>
				<?php	}?>
			</table>
		</form>
	</div>
</div>