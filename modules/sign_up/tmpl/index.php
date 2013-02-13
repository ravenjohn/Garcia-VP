<div id="sign_up_div" class="window">
	<form method="POST" action="<?php echo RConfig::ajax_url?>sign_up" onsubmit="return sign_up(this)">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" pattern="[a-zA-Z0-9]{8,16}" required="required" placeholder="Username..."/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" min="8" max="16" pattern="[a-zA-Z0-9]{8,16}" required="required" placeholder="Password..."/></td>
			</tr>
			<tr>
				<td>E-mail Address</td>
				<td><input type="email" name="email" pattern="[a-zA-Z0-9_]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+" required="required" placeholder="Email..."/></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstName" min="2" max="40" pattern="[a-zA-Z ]*[-]?[a-zA-Z ]*" required="required" placeholder="First Name..."></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lastName" min="7" max="30" pattern="[a-zA-Z ]*[-]?[a-zA-Z ]*" required="required" placeholder="Last Name..."></td>
			</tr>
			<tr>
				<td>Contact No</td>
				<td><input type="text" name="contact" min="7" max="30" pattern="[()0-9+ -]{7,30}" required="required" placeholder="Contact Number..."></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" min="4" max="100" pattern="[a-zA-Z0-9., #'()-]{4,100}" required="required" placeholder="Address..."></td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td><input type="date" name="birthday" min="10" max="10" pattern="[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}" required="required" placeholder="YYYY-MM-DD..."></td>
			</tr>
			<tr>
				<td><input type="submit" name="signup"/></td>
			</tr>
		</table>
	</form>
	
</div>