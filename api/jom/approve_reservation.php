<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['id'];
	$input[] = $_POST['username'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL APPROVE_RESERVATION('$input[0]','$input[1]');";
?>