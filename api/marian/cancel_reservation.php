<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['id'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE __reservations SET status='".(($_SESSION['role']=='admin')?"Declined by ".$_SESSION['username']:"Cancelled by ".$_SESSION['email'])."' WHERE id = '$input[0]';";