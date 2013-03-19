<div id="footer_div" class="module">
	<a class="btn-link" onclick="showLoginForm();"><?php echo RConfig::app_copyright;?></a>
	<div id="adminFormDiv" class="none">
		<form class="form" action="<?php echo RConfig::ajax_url;?>admin_login" method="POST" onsubmit="return adminLogin(this);" id="adminForm">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="username" required="required" placeholder="Username"/>
			</div>
			<br />
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" name="password" required="required" placeholder="Password" max="16"/>
			</div>
			<br />
			<button type="submit" id="adminLoginButton" class="btn btn-large btn-primary" data-loading-text="Logging in ..." data-default-text="LOGIN!">LOGIN!</button>
		</form>
	</div>
</div>