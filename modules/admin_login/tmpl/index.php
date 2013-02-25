<div id="admin_log_in_div">
	<form method="POST" action="<?php echo RConfig::ajax_url?>admin_login" onsubmit="return adminValidateLogin(this)">
		<input type="text" name="username" min="6" max="16" pattern="[a-zA-Z0-9@\.]{6,16}" required="required" placeholder="Username..."/>
		<input type="password" name="password" min="8" max="16" pattern="[a-zA-Z0-9]{8,16}" required="required" placeholder="Password..."/>
		<input type="submit" name="login"/>
	</form>
</div>