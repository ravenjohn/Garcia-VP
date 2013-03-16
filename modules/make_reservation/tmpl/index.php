<?php if(!isset($packages)) $packages = API::execute("karla/read_packages",array());?>
<div id="make_reservation_div" class="span9 module">
	<h3>Make Reservation</h3>
	<form method="POST" action="<?php echo RConfig::ajax_url?>make_reservation" onsubmit="return make_reservation(this);" class="form">
		<input type="hidden" id="packageName_temp2" name="packageId"/>
		<div class="input-prepend">
			<span class="add-on">Title</span>
			<input type="text" name="title" required="required" class="span8" placeholder="e.g. Heaven's 7th Birthday!"/>
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
			<textarea name="additionalRequest" max="1500" placeholder="Additional Request" class="span8"></textarea>
		</div>
		<div class="form-actions">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-calendar"></i> From : </span>
				<input type="date" name="startDate" required="required" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-calendar"></i> To : </span>
				<input type="date" name="endDate" required="required" />
			</div>
			<input type="submit" class="btn btn-primary btn-large" value="Make Reservation" />
		</div>
	</form>
</div>