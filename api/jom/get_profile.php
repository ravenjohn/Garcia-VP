<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['email'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "SELECT email, fullName, address, contact, confirmed, confirmationToken FROM __users WHERE email = '$input[0]';";
