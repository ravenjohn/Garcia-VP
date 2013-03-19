<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['reservationId'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);
	
	$query = "SELECT * FROM __quotations WHERE reservationId = '$input[0]';";