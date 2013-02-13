<?php
	defined('AUTH') or die;
	$input[] = $_POST['username'];
	$input[] = $_POST['password'];
	$input[] = $_POST['email'];
	$input[] = $_POST['firstName'];
	$input[] = $_POST['lastName'];
	$input[] = $_POST['contact'];
	$input[] = $_POST['address'];
	$input[] = $_POST['birthday'];
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL SIGN_UP('$input[0]', '$input[1]', '$input[2]', '$input[3]', '$input[4]' ,'$input[5]' , '$input[6]', '$input[7]');"
?>