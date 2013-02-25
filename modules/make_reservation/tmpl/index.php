<div id="make_reservation_div">
	<h3>Make Reservation</h3>
	<form method="POST" action="<?php echo RConfig::ajax_url?>make_reservation" onsubmit="return make_reservation(this);" class="form ">
<!--		<input type="text" name="packageName" max="64" min="2" required="required" placeholder="Package Name"/><br />-->
		
		<?php $packages = API::execute('marian/get_packages', array()); ?>
		<select name="packageName" required="required">
			<?php foreach($packages['data'] as $p){?>	<option value="<?php echo $p['name']?>"><?php echo $p['name'];?></option><?php }?>
		</select>
		<br/>

		<input type="date" name="startDate" min="10" max="10" pattern="[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}" required="required" placeholder="YYYY-MM-DD..."><br />
		<input type="date" name="endDate" min="10" max="10" pattern="[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}" required="required" placeholder="YYYY-MM-DD..."><br />
		<input type="text" name="location" max="100" min="2" required="required" placeholder="Location"/><br />
		<input type="text" name="additionalRequest" max="1000" min="2" placeholder="Additional Request"/><br />
		<input type="submit" value="Make Reservation" class="btn btn-primary"/>
	</form>
</div>