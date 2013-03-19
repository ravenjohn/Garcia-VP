<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['content'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "INSERT INTO __feedbacks VALUES('','".$_SESSION['email']."','$input[0]','0');";