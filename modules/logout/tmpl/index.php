<div id="logout_div" class="mod admin_module user_module">
	<form method="POST" action="<?php echo RConfig::ajax_url?>logout" onsubmit="return logout(this);">
		<input type="submit" value="logout" class="btn"/>
	</form>
</div>