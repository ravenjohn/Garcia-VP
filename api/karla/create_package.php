<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['category'];
	$input[] = $_POST['name'];
	$input[] = $_POST['cost'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL CREATE_PACKAGE('$input[0]','$input[1]','$input[2]');";