<?php if(!isset($packages)) $packages = API::execute("karla/read_packages",array());?>
<div id="make_reservation_div" class="module well">
	<h3>Make Reservation</h3>
	<form method="POST" action="<?php echo RConfig::ajax_url?>make_reservation" onsubmit="return make_reservation(this);" class="form">
		<input type="hidden" id="packageName_temp2" name="packageId"/>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-book"></i></span>
			<input type="text" name="title" required="required" class="span8" placeholder="Title e.g. Heaven's 7th Birthday!"/>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-gift"></i></span>
			<input type="text" id="packageName_temp" max="256" required="required" placeholder="Please select one package from above" disabled="disabled" class="span8"/>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-globe"></i></span>
			<input type="text" name="location" max="256" required="required" placeholder="Location" class="span8"/>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-th-list"></i></span>
			<textarea name="additionalRequest" max="2000" placeholder="Additional informations, requests, comments, etc.." class="span8" rows="7" required="required"></textarea>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-calendar"></i> Fr : </span>
			<input type="date" name="startDate" required="required" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-time"></i> Time : </span>
			<input type="number" min="1" max="12" name="startTime" required="required"/>
		</div>
		<select name="startMeridian">
			<option value='AM'>AM</option>
			<option value='PM'>PM</option>
		</select>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-calendar"></i> To : </span>
			<input type="date" name="endDate" required="required" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-time"></i> Time : </span>
			<input type="number" min="1" max="12" name="endTime" required="required"/>
		</div>
		<select name="endMeridian">
			<option value='AM'>AM</option>
			<option value='PM'>PM</option>
		</select>
		<button type="submit" class="btn btn-primary btn-large" data-default-text="Make Reservations" data-loading-text="Processing ..." id="makeReservationButton">Make Reservation</button>
	</form>
</div>