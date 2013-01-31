<div id="login_div" class="window">
	<form action="<?php echo RConfig::ajax_url?>login" onsubmit="return validateLogin(this)">
	<input type="text" name="username"/>
	<input type="password" name="password"/>
	<input type="submit" name="login"/>
	</form>
</div>