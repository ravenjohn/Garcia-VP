<?php
$result = API::execute('jom/view_pending',array());
$conflict = API::execute('jom/check_for_conflict',array()); 
$similar = API::execute('jom/find_similar', array());  
$reservations = API::execute("jom/view_pending",array());?>
<div id="manage_reservation_div" class="mod admin_module user_module">
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
						<?php if($_SESSION['role']=='admin'){?>
							<button type="button" class="btn btn-primary" onclick="approve_reservation(<?php echo $p['id']?>);">APPROVE</button>
						<?php }?>
							<button type="button" class="btn btn-danger" onclick="cancel_reservation(<?php echo $p['id']?>);">CANCEL</button>
						</td>
						<?php
						if($_SESSION['role']=='admin'){
							foreach($conflict["data"] as $c){
								if($p["id"] == $c["id"]){
									echo "<td>CONFLICT!</td>";
								}
							}
							
							foreach($similar["data"] as $s){
								if($p["id"] == $s["id"]){
									echo "<td>CONFLICT! Similar dates.</td>";
								}
							}
						}
						?>
					</tr>
					<?php }?>
				<?php	}?>
			</table>
		</form>
	</div>
</div>