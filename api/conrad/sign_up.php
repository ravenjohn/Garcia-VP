<?php
	defined('AUTH') or die;
	$input[] = $_POST['email'];
	$input[] = $_POST['password'].RConfig::PASSWORD_SALT;
	$input[] = $_POST['fullName'];
	$input[] = $_POST['address'];
	$input[] = $_POST['contact'];
	$input[] = $_POST['confirmationToken'];
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "SELECT SIGN_UP('$input[0]', '$input[1]', '$input[2]', '$input[3]' ,'$input[4]','$input[5]') as status;";