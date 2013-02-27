<?php $reservations = API::execute("jom/view_pending",array());?>
<div id="manage_reservation_div" class="mod admin_module">
	<div class="span9 offset3 gradient">
		<form action="<?php echo RConfig::ajax_url?>delete_package" class="form" name="manage_package_form" method="POST">
			<table class="table table-bordered" class="view_reservations_table">
				<tr>
					<th>Username</th>
					<th>Package</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Location</th>
					<th>Additional Request</th>
					<th>Action</th>
				</tr>
				<?php if(empty($reservations['items'])){ ?>
				<tr class="remove">
					<th colspan="3">No reservations to display . . .  :( </th>
				</tr>
				<?php }else{?>
					<input type="hidden" name="id"/>
					<?php foreach($reservations['data'] as $p){?>
					<tr>
						<td><?php echo $p['username']; ?></td>
						<td><?php echo $p['packageName']; ?></td>
						<td><?php echo $p['startDate']; ?></td>
						<td><?php echo $p['endDate']; ?></td>
						<td><?php echo $p['location']; ?></td>
						<td><?php echo $p['additionalRequest']; ?></td>
						<td>
							<button type="button" class="btn btn-primary" onclick="approve_reservation(<?php echo $p['id']?>);"><i class="icon-trash"></i></button>
							<button type="button" class="btn btn-danger" onclick="cancel_reservation(<?php echo $p['id']?>);"><i class="icon-trash"></i></button>
						</td>
					</tr>
					<?php }?>
				<?php	}?>
			</table>
		</form>
	</div>
</div>