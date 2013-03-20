<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['date'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);
	
	$query = "SELECT a.*, TOTAL_COST(a.id) as totalCost FROM __reservations a WHERE a.status LIKE '%approve%' AND (a.startDate like '$input[0]-%' OR a.endDate like '$input[0]-%');";
	