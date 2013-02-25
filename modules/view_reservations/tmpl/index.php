<?php
	$packages = API::execute("marian/read_reservations",array());
?>
<div id="view_reservations_div">
	<table class="table table-bordered" id="view_reservations_table">
		<?php
		if(empty($packages['items'])){ ?>
			<tr class="remove">
				<th colspan="3">No reservations to display . . .  :( </th>
			</tr>
		<?php
		}else{
			foreach($packages['data'] as $p){?>
			<tr>
				<td><?php echo $p['packageName']; ?></td>
				<td><?php echo $p['startDate']; ?></td>
				<td><?php echo $p['endDate']; ?></td>
				<td><?php echo $p['location']; ?></td>
				<td><?php echo $p['additionalRequest']; ?></td>
				<td><?php echo $p['status']; ?></td>
				<td><input type="button" id="cancel" value="Cancel"></input></td>
				<td><a href="<?php echo RConfig::ajax_url?>" id="<?php echo $p['name']; ?>" onclick="return cancel_reservation(this);"> </a></td>
			</tr>
		<?php }
		}?>
	</table>
</div>