<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['id'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE __reservations SET status='Cancelled by ".(($_SESSION['role']=='admin')?$_SESSION['username']:$_SESSION['email'])."' WHERE id = '$input[0]';";