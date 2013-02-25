<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['name'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL CANCEL_RESERVATION('$input[0]');";