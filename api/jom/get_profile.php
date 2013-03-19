<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['email'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "SELECT * FROM __users WHERE email = '$input[0]';";
