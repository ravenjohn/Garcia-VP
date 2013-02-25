<div id="create_package_div">
	<h3>Create Package</h3>
	<form method="POST" action="<?php echo RConfig::ajax_url?>create_package" onsubmit="return create_package(this);" class="form ">
		<input type="text" name="name" max="64" min="2" placeholder="Package Name"/><br />
		<input type="text" name="cost" max="16" min="2" placeholder="Cost"/><br />
		<input type="submit" value="Create Package" class="btn btn-primary"/>
	</form>
</div>