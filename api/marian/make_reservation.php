<?php
	session_start();
	
	defined('AUTH') or die;
	$input[] = $_SESSION['username'];
	$input[] = $_POST['packageName'];
	$input[] = $_POST['startDate'];
	$input[] = $_POST['endDate'];
	$input[] = $_POST['location'];
	$input[] = $_POST['additionalRequest'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL MAKE_RESERVATION('$input[0]','$input[1]','$input[2]','$input[3]','$input[4]', '$input[5]');";