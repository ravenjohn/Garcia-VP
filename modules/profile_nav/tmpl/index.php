<?php
	defined('AUTH') or die;
	$res = API::execute("raven/count_reservations",array());
	$res = $res['data'][0]['reservationCount'];
?>
<div id="profile_nav_div" class="module">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Hi <span class="bold"><?php echo ($_SESSION['role']=='user')?$_SESSION['email']:$_SESSION['username']?>!</span></a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<?php if($_SESSION['role']=='admin'){?>
						<li>
							<a onclick="return toggleCalendar();" href="#home">Calendar</a>
						</li>
						<li>
							<a onclick="return toggleSummary();" href="#home">Summary</a>
						</li>
						<?php }?>
						<li>
							<a <?php if($_SESSION['role']=='admin') echo 'href="#home" onclick="return toggleReservations();"';?>><?php if($_SESSION['role']=='user') echo 'My';?> Reservations <span class="badge badge-important"><?php echo $res; ?></span></a>
						</li>
						<li>
							<a onclick="<?php echo ($_SESSION['role']=='admin')?'return toggleManagePackages();':"$('#packages_menu').click(); return false;";?>" href="#home"><?php echo ($_SESSION['role']=='user')?"Make Reservation":"Manage Packages";?></a>
						</li>
					</ul>
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Account <i class="icon-cog"></i>
							</a>
							<ul class="dropdown-menu">
								<?php if($_SESSION['role']=='user'){?>
								<li><a href="#home" onclick="return showEditProfile();">Edit Profile</a></li>
								<?php }else if($_SESSION['role']=='admin'){?>
								<li><a href="#home" onclick="return adminChangePasswordModal();">Change Password</a></li>
								<?php }?>
								<li class="divider"></li>
								<li><a href="#home" onclick="logout();"><i class="icon-signout"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if($_SESSION['role']=='user'){
	$profile = API::execute('jom/get_profile',$_SESSION);
	$profile = $profile['data'][0];?>

<div id="editProfileDiv" class="none">
	<form class="form" action="<?php echo RConfig::ajax_url;?>edit_account" method="POST" onsubmit="return editAccount(this);" id="editAccountForm">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="text" name="email" required="required" disabled="disabled" class="text-tooltip" data-toggle="tooltip" title="Sorry but you can not change this." data-html="true" value="<?php echo $_SESSION['email']?>"/>
		</div>
		<br />
		<div class="input-prepend">
			<span class="add-on"><i class="icon-lock"></i></span>
			<input type="password" name="password" max="16" pattern=".{8,16}" placeholder="Password" class="text-tooltip" data-toggle="tooltip" title="Leave empty if you don't want<br/>to change password." data-html="true"/>
		</div>
		<br />
		<div class="input-prepend">
			<span class="add-on"></span>
			<input type="password" name="cpassword" max="16" pattern=".{8,16}" placeholder="Confirm Password" class="text-tooltip" data-toggle="tooltip" title="Leave empty if you don't want<br/>to change password" data-html="true"/>
		</div>
		<br />
		<div class="input-prepend">
			<span class="add-on">FN</span>
			<input type="text" name="fullName" max="255" required="required" placeholder="Full Name" class="text-tooltip" data-toggle="tooltip" title="Please type your complete full name." data-html="true" value="<?php echo $profile['fullName']; ?>"/>
		</div>
		<br />
		<div class="input-prepend">
			<span class="add-on"><i class="icon-mobile-phone"></i></span>
			<input type="text" name="contact" max="30" pattern="[()0-9+ -]{7,30}" required="required" placeholder="Contact Number"  class="text-tooltip" data-toggle="tooltip" title="Please type your contact number." data-html="true" value="<?php echo $profile['contact']; ?>"/>
		</div>
		<br />
		<div class="input-prepend">
			<span class="add-on"><i class="icon-map-marker"></i></span>
			<input type="text" name="address" max="100" pattern="[a-zA-Z0-9., #'()-]{4,100}" required="required" placeholder="Address"  class="text-tooltip" data-toggle="tooltip" title="Please type your current address." data-html="true" value="<?php echo $profile['address']; ?>"/>
		</div>
		<br />
		<button type="submit" class="btn btn-large btn-primary" id="editAccountButton" data-loading-text="Saving ..." data-success-text="SAVED!" data-default-text="SAVE!">SAVE!</button>
	</form>
</div>

<?php }else if($_SESSION['role']=='admin'){?>
<div id="changePasswordDiv" class="none">
	<form class="form" action="<?php echo RConfig::ajax_url;?>admin_password" method="POST" onsubmit="return changePassword(this);" id="changePasswordForm">
		<br />
		<div class="input-prepend">
			<span class="add-on"><i class="icon-lock"></i></span>
			<input type="password" name="password" max="16" pattern=".{8,16}" placeholder="New Password" class="text-tooltip" data-toggle="tooltip" title="8-16 characters only." data-html="true"/>
		</div>
		<br />
		<div class="input-prepend">
			<span class="add-on"></span>
			<input type="password" name="cpassword" max="16" pattern=".{8,16}" placeholder="Confirm Password" class="text-tooltip" data-toggle="tooltip" title="Just retype your password." data-html="true"/>
		</div>
		<br />
		<button type="submit" class="btn btn-large btn-primary" id="changePasswordButton" data-loading-text="Saving ..." data-success-text="SAVED!" data-default-text="SAVE!">SAVE!</button>
	</form>
</div>
<?php }?>