<?php defined('AUTH') or die;?>
<div id="sign_in_up_div" class="module">
	<div id="introDiv">
		<h1>Capturing moments from today... Creating memories for a lifetime.</h1>
	</div>
	<div id="myCarousel" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="static/img/gallery/wedding/4.jpg" alt="" width="870px">
				<div class="carousel-caption">
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			</div>
			<div class="item">
				<img src="static/img/gallery/photobooth/18p.jpg" alt="" width="870px">
				<div class="carousel-caption">
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			</div>
			<div class="item">
				<img src="static/img/gallery/debut/16d.jpg" alt="" width="870px">
				<div class="carousel-caption">
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	</div>
		<div class="span3 well">
			<h3>Sign In</h3>
			<hr />
			<form method="POST" action="<?php echo RConfig::ajax_url; ?>user_login" onsubmit="return validateLogin(this)" class="form">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>
					<input type="text" name="email" max="16" pattern="[a-zA-Z0-9_]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+" required="required" placeholder="Email" id="loginEmail"/>
				</div>
				<div class="input-prepend" id="passwordBlock">
					<span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" name="password" max="16" required="required" placeholder="Password"/>
				</div>
				<br />
				<small>
					<a onclick="return forgotPasswordForm();" id="forgotPasswordText" href="#home">I forgot my password :'(</a>
					<a onclick="return showUserLoginForm();" class="none" id="backToLogin" href="#home">Login</a>
				</small>
				<br />
				<button type="button" id="sendResetPasswordButton" class="btn btn-large btn-primary none" data-loading-text="Sending ..." data-default-text="SEND INSTRUCTIONS" onclick="sendResetPassword();">SEND INSTRUCTIONS</button>
				<button type="submit" id="loginButton" class="btn btn-large btn-primary" data-loading-text="Logging in ..." data-default-text="LOGIN!">LOGIN!</button>
			</form>
		</div>
		<div class="span3 well offset1">
			<h3>Sign Up</h3>
			<hr />
			<form method="POST" action="<?php echo RConfig::ajax_url?>sign_up" onsubmit="return sign_up(this)" class="form">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>
					<input type="email" name="email" pattern="[a-zA-Z0-9_]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+" required="required" placeholder="Email" class="text-tooltip" data-toggle="tooltip" title="You should be able to receive <br />confimation email after <br />creating an account." data-html="true"/>
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
					<span class="add-on">FN</span>
					<input type="text" name="fullName" max="255" required="required" placeholder="Full Name" class="text-tooltip" data-toggle="tooltip" title="Please type your complete full name." data-html="true"/>
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-mobile-phone"></i></span>
					<input type="text" name="contact" max="30" pattern="[()0-9+ -]{7,30}" required="required" placeholder="Contact Number"  class="text-tooltip" data-toggle="tooltip" title="Please type your contact number." data-html="true"/>
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-map-marker"></i></span>
					<input type="text" name="address" max="100" pattern="[a-zA-Z0-9., #'()-]{4,100}" required="required" placeholder="Address"  class="text-tooltip" data-toggle="tooltip" title="Please type your current address." data-html="true"/>
				</div>
				<button type="submit" class="btn btn-large btn-primary" id="createAccountButton" data-loading-text="Creating Account ..." data-default-text="CREATE ACCOUNT!">CREATE ACCOUNT!</button>
			</form>
		</div>
</div>