<div id="sign_in_up_div" class="mod">
	<div class="span3 module">
		<div class="accordion" id="accordion2">
			
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
						SIGN UP!
					</a>
				</div>
				<div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
						<form method="POST" action="<?php echo RConfig::ajax_url?>sign_up" onsubmit="return sign_up(this)" class="form form-vertical">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span>
								<input type="text" name="username" pattern="[a-zA-Z0-9]{8,16}" required="required" placeholder="Username" class="text-tooltip" data-toggle="tooltip" title="8-16 characters only." data-html="true"/>
							</div>
							<div class="input-prepend">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input type="password" name="password" max="16" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" placeholder="Password" class="text-tooltip" data-toggle="tooltip" title="Must have atleast 1 small letter,<br />1 capital letter and 1 number." data-html="true"/>
							</div>
							<div class="input-prepend">
								<span class="add-on"></span>
								<input type="password" name="cpassword" max="16" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" placeholder="Confirm Password" class="text-tooltip" data-toggle="tooltip" title="Just retype your password." data-html="true"/>
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
							<div class="input-prepend">
								<span class="add-on"><i class="icon-gift"></i></span>
								<input type="date" name="birthday" required="required" data-toggle="tooltip" title="Birthday"  class="tooltipped" class="text-tooltip" data-toggle="tooltip" title="Please select your birthday." data-html="true"/>
							</div>
							<button type="submit" class="btn btn-large btn-primary">CREATE ACCOUNT!</button>
						</form>
					</div>
				</div>
			</div>
		
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
						SIGN IN!
					</a>
				</div>
				<div id="collapseOne" class="accordion-body collapse in">
					<div class="accordion-inner">
						<form method="POST" action="<?php echo RConfig::ajax_url; ?>user_login" onsubmit="return validateLogin(this)" class="form form-vertical">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span>
								<input type="text" name="username" max="16" pattern="[a-zA-Z0-9@\.]{6,16}" required="required" placeholder="Username"/>
							</div>
							<div class="input-prepend">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input type="password" name="password" max="16" required="required" placeholder="Password"/>
							</div>
							<small><a href="#">I forgot my password :'(</a></small><br />
							<button type="submit" class="btn btn-large btn-primary">LOGIN!</button>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="span9 module" id="introDiv">
		<h1>Let us capture the best parts of your life!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu libero eget arcu consequat ullamcorper. Curabitur justo lectus, ullamcorper ac tristique nec, facilisis id augue. Nullam luctus enim nec tellus aliquam ut dapibus ligula semper.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu libero eget arcu consequat ullamcorper. Curabitur justo lectus, ullamcorper ac tristique nec, facilisis id augue. Nullam luctus enim nec tellus aliquam ut dapibus ligula semper.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu libero eget arcu consequat ullamcorper. Curabitur justo lectus, ullamcorper ac tristique nec, facilisis id augue. Nullam luctus enim nec tellus aliquam ut dapibus ligula semper.</p>
	</div>
</div>