<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['reservationId'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);
	
	$query = "SELECT a.*, c.fullName, c.address, b.* FROM __quotations a, __reservations b, __users c WHERE a.reservationId = '$input[0]' AND b.id = '$input[0]' AND b.id = a.reservationId AND c.email = b.email;";