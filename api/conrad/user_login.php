<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['email'];
	if(isset($_GET['token'])){
		$input[] = $_POST['token'];
	}else{
		$input[] = $_POST['password'].RConfig::PASSWORD_SALT;
	}

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "SELECT * FROM __users WHERE email='$input[0]' AND (confirmationToken='$input[1]' OR resetPasswordToken='$input[1]' OR password=sha1(MD5('$input[1]')));";