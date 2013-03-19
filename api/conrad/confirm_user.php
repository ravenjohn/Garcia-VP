<?php
	defined('AUTH') or die;
	
	$change_password = false;
	
	$input[] = $_POST['email'];
	
	if(isset($_POST['password'])){
		$input[] = $_POST['password'].RConfig::PASSWORD_SALT;
		$change_password = true;
	}
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE __users SET confirmed = TRUE WHERE email = '$input[0]';";