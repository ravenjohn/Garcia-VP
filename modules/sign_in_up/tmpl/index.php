<?php defined('AUTH') or die;?>
<div id="sign_in_up_div" class="module">
	<div id="introDiv">
		<h1>Let us capture the best parts of your life!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu libero eget arcu consequat ullamcorper. Curabitur justo lectus, ullamcorper ac tristique nec, facilisis id augue. Nullam luctus eni..</p>
	</div>
	<div class="span4">
		<h3>SIGN IN!</h3>
		<form method="POST" action="<?php echo RConfig::ajax_url; ?>user_login" onsubmit="return validateLogin(this)" class="form">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="username" max="16" pattern="[a-zA-Z0-9@\.]{6,16}" required="required" placeholder="Username" id="loginUsername"/>
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" name="password" max="16" required="required" placeholder="Password"/>
			</div>
			<br />
			<small><a href="#">I forgot my password :'(</a></small><br />
			<button type="submit" class="btn btn-large btn-primary">LOGIN!</button>
		</form>
	</div>
	<div class="span4">
		<h3>SIGN UP!</h3>
		<form method="POST" action="<?php echo RConfig::ajax_url?>sign_up" onsubmit="return sign_up(this)" class="form">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="username" pattern="[a-zA-Z0-9]{8,16}" required="required" placeholder="Username" class="text-tooltip" data-toggle="tooltip" title="8-16 characters only." data-html="true" data-placement="bottom"/>
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" name="password" max="16" pattern=".{8,16}" required="required" placeholder="Password" class="text-tooltip" data-toggle="tooltip" title="8-16 characters only." data-html="true"/>
			</div>
			<div class="input-prepend">
				<span class="add-on"></span>
				<input type="password" name="cpassword" max="16" pattern=".{8,16}" required="required" placeholder="Confirm Password" class="text-tooltip" data-toggle="tooltip" title="Just retype your password." data-html="true"/>
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="email" name="email" pattern="[a-zA-Z0-9_]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+" required="required" placeholder="Email" class="text-tooltip" data-toggle="tooltip" title="You should be able to receive <br />confimation email after <br />creating an account." data-html="true"/>
			</div>
			<div class="input-prepend">
				<span class="add-on">FN</span>
				<input type="text" name="firstName" max="40" pattern="[a-zA-Z ]*[-]?[a-zA-Z ]*" required="required" placeholder="First Name" class="text-tooltip" data-toggle="tooltip" title="Please type your complete first name." data-html="true"/>
			</div>
			<div class="input-prepend">
				<span class="add-on">LN</span>
				<input type="text" name="lastName" max="30" pattern="[a-zA-Z ]*[-]?[a-zA-Z ]*" required="required" placeholder="Last Name"  class="text-tooltip" data-toggle="tooltip" title="Please type your last name." data-html="true"/>
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-mobile-phone"></i></span>
				<input type="text" name="contact" max="30" pattern="[()0-9+ -]{7,30}" required="required" placeholder="Contact Number"  class="text-tooltip" data-toggle="tooltip" title="Please type your contact number." data-html="true"/>
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-map-marker"></i></span>
				<input type="text" name="address" max="100" pattern="[a-zA-Z0-9., #'()-]{4,100}" required="required" placeholder="Address"  class="text-tooltip" data-toggle="tooltip" title="Please type your current address." data-html="true"/>
			</div>
			<button type="submit" class="btn btn-large btn-primary">CREATE ACCOUNT!</button>
		</form>
	</div>
</div>