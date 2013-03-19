<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['name'];
	$input[] = $_POST['cost'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query[] = "INSERT INTO __packages VALUES('','$input[0]','$input[1]');";
	$query[] = "SELECT LAST_INSERT_ID() as id;";