<?php
	defined('AUTH') or die;
	$input[] = $_POST['email'];
	$input[] = $_POST['resetPasswordToken'];
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "SELECT RESET_PASSWORD('$input[0]','$input[1]') as status;";
