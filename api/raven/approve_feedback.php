<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['id'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE __feedbacks SET status = 'APPROVED';";