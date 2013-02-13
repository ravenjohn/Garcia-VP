<div id="log_in_div">
	<form action="<?php echo RConfig::ajax_url?>log_in" onsubmit="return validateLogin(this)">
		<input type="email" name="username" min="6" max="16" pattern="[a-zA-Z0-9@\.]{6,16}" required="required" placeholder="Username..."/>
		<input type="password" name="password" min="8" max="16" pattern="[a-zA-Z0-9]{8,16}" required="required" placeholder="Password..."/>
		<input type="submit" name="login"/>
	</form>
</div>