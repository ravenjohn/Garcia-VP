<div id="admin_login_div" class="mod module">
	<br />
	<div class="none pull-left" id="admin_login_form" name="admin_login_form">
		<form method="POST" action="<?php echo RConfig::ajax_url?>admin_login" onsubmit="return adminValidateLogin(this)" class="form form-horizontal">
			<div class="input-append input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="username" max="16" required="required" placeholder="Username" id="admin_username"/>
			</div><br />
			<div class="input-append input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" name="password" max="16" required="required" placeholder="Password"/>
			</div>
			<input type="submit" class="none" style="height: 0; width: 0; background: none; border: 0;"/>
		</form>
	</div>
	<br />
	<button class="pull-left btn-link" onclick="$('#admin_login_form').fadeToggle(); document.getElementById('admin_username').focus()"><?php echo RConfig::app_copyright;?></button>
</div>