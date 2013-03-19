<?php
	defined('AUTH') or die;
	$reservations = API::execute("raven/get_reservations",array());
?>
<div id="manage_reservation_div" class="module <?php if($_SESSION['role']=='admin') echo "none";?>">
	<h3>Reservations</h3>
	<?php if(empty($reservations['items'])){ ?>
		You have no reservations . . .  :(
	<?php }else{ ?>
	<form action="<?php echo RConfig::ajax_url?>reservation_" class="form" id="manage_reservation_form" method="POST">
		<input type="hidden" name="reservationId" id="reservationId1"/>
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
				<span class="label label-<?php echo $label; ?>" id="reservationLabel<?php echo $p['id'];?>"><?php echo $p['status'];?></span>
				<h3><?php echo $p['title']; ?></h3>
				<div class="caption">
					<p class="justified">
						<?php if($_SESSION['role']=='admin'){?>
							<b><a href="#home" onclick="return showProfileModal('<?php echo $p['email']; ?>');"><?php echo $p['email']; ?></a></b> wants to reserve a
						<?php }else{?>
							I want to reserve a
						<?php }?>
						<b><?php echo $p['name']; ?></b> from <b><?php echo date('M d, Y h:iA', strtotime($p['startDate'])); ?></b> to <b><?php echo date('M d, Y h:iA', strtotime($p['endDate'])); ?></b> in <b><?php echo $p['location']; ?></b> with the following details:
					</p>
					<div class="well">
						<?php echo $p['additionalRequest']; ?>
					</div>
					
					<div id="reservationButtons<?php echo $p['id'];?>">
						<?php if($p['status']=='PENDING' && $_SESSION['role']=='admin'){?>
							<button type="button" class="btn btn-primary pull-left" onclick="approve_reservation(<?php echo $p['id']?>);" id="approveButton<?php echo $p['id'];?>" data-loading-text="Approving...">APPROVE</button>
						<?php }?>
						
						<?php if($p['status']=='PENDING' && $_SESSION['role'] == 'user'){?>
							<button type="button" class="btn btn-danger  pull-right" onclick="cancel_reservation(<?php echo $p['id']?>);" id="cancelButton<?php echo $p['id']?>" data-loading-text="Cancelling...">CANCEL</button>
						<?php }	else if($p['status']=='PENDING' && $_SESSION['role'] == 'admin'){?>
							<button type="button" class="btn pull-right" onclick="cancel_reservation(<?php echo $p['id']?>);" id="cancelButton<?php echo $p['id']?>" data-loading-text="Declining...">DECLINE</button>
						<?php }else if($p['status']=='APPROVED' && $_SESSION['role'] == 'user' && $p['hasQuotation']=='1'){?>
							<button type="button" class="btn btn-primary pull-right" onclick="view_quotation(<?php echo $p['id']?>);" id="quotationButton<?php echo $p['id']?>" data-loading-text="Loading...">VIEW QUOTATION</button>
						<?php } else if($p['status']=='APPROVED' && $_SESSION['role'] == 'admin'){?>
							<button type="button" class="btn btn-success pull-right" onclick="viewQuotationModal(<?php echo $p['id']?>,'<?php echo $p['name'].' '.$p['cost']; ?>');" id="quotationButton<?php echo $p['id']?>" data-loading-text="Loading...">MANAGE QUOTATION</button>
						<?php }?>
					</div>
					
					
				</div>
			</div>
			<?php }?>
		</div>
	</form>
	<?php }?>
</div>

<?php if($_SESSION['role']=='admin'){?>
	<div id="createQuotationDiv" class="none">
		<br />
		<form class="form" method="POST" onsubmit="return createQuotation(this);" action="<?php echo RConfig::ajax_url;?>view_quotation" id="createQuotationForm" target="_blank">
			<table class="table table-hover table-bordered" id="quotationTable">
					<input type="hidden" name="reservationId" id="quotationReservationId"/>
					<tr id="quotationTableHeader">
						<th class="span4">Items</th>
						<th>Cost</th>
					</tr>
					<tr>
						<td>
							<input type="text" class="span4" name="item[]" placeholder="Photobooth Service"/>
						</td>
						<td>
							<div class="input-append">
								<input type="number" class="span1 costInput newInput" name="cost[]" placeholder="4000"/>
								<span class="add-on">.00</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="span4" name="item[]" placeholder="Additional Request"/>
						</td>
						<td>
							<div class="input-append">
								<input type="number" class="span1 costInput newInput" name="cost[]" placeholder="4000"/>
								<span class="add-on">.00</span>
							</div>
						</td>
					</tr>
					<tr id="addRowButton">
						<td colspan="2" align="center">
							<button class="btn span5" type="button" onclick="return addQuotationItem();"><i class="icon-plus"></i> ADD ITEM</button>
						</td>
					</tr>
					<tr>
						<th align='right'>TOTAL</th>
						<td id="totalCost">0.00</td>
						<input type="hidden" name="total" id="totalCostInput"/>
					</tr>
			</table>
			<button class="btn span5 btn-primary btn-large" type="submit" data-loading-text="Rendering ...">VIEW QUOTATION</button>
		</form>
	</div>
<?php }?>