<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['reservationId'];
	$input[] = $_POST['item[]'];
	$input[] = $_POST['cost[]'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	for($i=0;$i<count($input[1]);$i++)
		$query = "INSERT INTO __quotations VALUES('$input[0]','$input[1][$i]','$input[2][$i]');";