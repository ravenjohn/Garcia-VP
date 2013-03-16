<?php
	$result = API::execute('jom/view_pending',array());
	$conflict = API::execute('jom/check_for_conflict',array()); 
	$similar = API::execute('jom/find_similar', array());  
	$reservations = API::execute("jom/view_pending",array());
?>
<div id="manage_reservation_div" class="module">
	<h3>Reservations</h3>
	<?php if(empty($reservations['items'])){ ?>
		You have no reservations . . .  :(
	<?php }else{ ?>
	<form action="<?php echo RConfig::ajax_url?>reservation_" class="form" name="manage_reservation_form" method="POST">
		<input type="hidden" name="id"/>
		<ul class="thumbnails">
			<?php foreach($reservations['data'] as $p){
				if($_SESSION['role']=='user' && $p['username']!=$_SESSION['username']) continue; ?>
			<li class="span3">
				<div class="thumbnail reservationView">
					<h4><?php echo $p['title']; ?></h4>
					<?php if($_SESSION['role']=='admin'){?>
					Username: <?php echo $p['username']; ?>
					<?php }?>
					<br />
					Package: <?php echo $p['packageName']; ?>
					<br />
					Date: <?php echo $p['startDate']; ?> - <?php echo $p['endDate']; ?>
					<br />
					Location: <?php echo $p['location']; ?>
					<br />
					Additional Request: <?php echo $p['additionalRequest']; ?>
					<br />
					<?php if($_SESSION['role']=='admin'){?>
						<button type="button" class="btn btn-primary" onclick="approve_reservation(<?php echo $p['id']?>);">APPROVE</button>
					<?php }?>
					<button type="button" class="btn btn-danger" onclick="cancel_reservation(<?php echo $p['id']?>);">CANCEL</button>
				</div>
			</li>
			<?php }?>
		</ul>
	</form>
	<?php }?>
</div>