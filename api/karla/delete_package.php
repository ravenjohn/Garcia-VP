<?php
	defined('AUTH') or die;
	
	$input[] = $_GET['id'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL DELETE_PACKAGE('$input[0]');";