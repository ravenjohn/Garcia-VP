<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['id'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "DELETE FROM __packages WHERE id = '$input[0]';";