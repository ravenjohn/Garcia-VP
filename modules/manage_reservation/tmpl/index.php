<?php
	$reservations = API::execute("raven/get_reservations",array());
?>
<div id="manage_reservation_div" class="module">
	<h3>Reservations</h3>
	<?php if(empty($reservations['items'])){ ?>
		You have no reservations . . .  :(
	<?php }else{ ?>
	<form action="<?php echo RConfig::ajax_url?>reservation_" class="form" name="manage_reservation_form" method="POST">
		<div id="reservations" class="">
			<?php foreach($reservations['data'] as $p){
				if($_SESSION['role']=='user' && $p['email']!=$_SESSION['email']) continue; ?>
			<div class="reservationView thumbnail">
				<?php
					$label = "default";
					if($p['status'] == 'APPROVED')
						$label = "success";
					else if(substr($p['status'],0,9) == 'Cancelled')
						$label = "important";
				?>
				<span class="label label-<?php echo $label; ?>"><?php echo $p['status'];?></span>
				<h3><?php echo $p['title']; ?></h3>
				<div class="caption">
					<p class="justified">
						<?php if($_SESSION['role']=='admin'){?>
							<b><?php echo $p['email']; ?></b> wants to reserve a
						<?php }else{?>
							I want to reserve a
						<?php }?>
						<b><?php echo $p['name']; ?></b> from <b><?php echo date('M d, Y h:iA', $p['startDate']); ?></b> to <b><?php echo date('M d, Y h:iA', $p['endDate']); ?></b> in <b><?php echo $p['location']; ?></b> with the following details:
					</p>
					<div class="well">
						<?php echo $p['additionalRequest']; ?>
					</div>
					<?php if($_SESSION['role']=='admin'){?>
						<button type="button" class="btn btn-primary" onclick="approve_reservation(<?php echo $p['id']?>);">APPROVE</button>
					<?php }?>
					<?php if($p['status']=='PENDING'){?>
						<button type="button" class="btn btn-danger  pull-right" onclick="cancel_reservation(<?php echo $p['id']?>);" id="cancelButton<?php echo $p['id']?>" data-loading-text="Cancelling...">CANCEL</button>
					<?php }else if($p['status']=='APPROVED'){?>
						<button type="button" class="btn btn-primary pull-right" onclick="view_quotation(<?php echo $p['id']?>);" id="quotationButton<?php echo $p['id']?>" data-loading-text="Loading...">VIEW QUOTATION</button>
					<?php }?>
				</div>
			</div>
			<?php }?>
		</div>
	</form>
	<?php }?>
</div>