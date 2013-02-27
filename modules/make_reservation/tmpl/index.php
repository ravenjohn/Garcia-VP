<?php if(!isset($packages)) $packages = API::execute("karla/read_packages",array());?>
<div id="make_reservation_div" class="mod module">
	<div class="span3 gradient">
		<h3>Make Reservation</h3>
		<form method="POST" action="<?php echo RConfig::ajax_url?>make_reservation" onsubmit="return make_reservation(this);" class="form">
			<input type="text" id="packageName_temp" name="packageName" max="256" required="required" placeholder="<- Please select one package" disabled="disabled"/>
			<input type="date" name="startDate" required="required">
			<input type="date" name="endDate" required="required" >
			<input type="text" name="location" max="256" required="required" placeholder="Location"/>
			<textarea name="additionalRequest" max="1500" placeholder="Additional Request"></textarea>
			<button type="submit" class="btn btn-primary"><i class="icon-shopping-cart"></i> Make Reservation</button>
		</form>
	</div>
</div>