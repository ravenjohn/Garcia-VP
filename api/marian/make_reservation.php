<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['title'];
	$input[] = $_SESSION['email'];
	$input[] = $_POST['packageId'];
	$input[] = $_POST['startDate'].' '.(intval($_POST['startTime'])+(($_POST['startMeridian']=='AM')?0:12)).':00:00';
	$input[] = $_POST['endDate'].' '.(intval($_POST['endTime'])+(($_POST['endMeridian']=='AM')?0:12)).':00:00';
	$input[] = $_POST['location'];
	$input[] = $_POST['additionalRequest'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);
	
	$query = "INSERT INTO __reservations VALUES('','$input[0]','$input[1]','$input[2]','$input[3]','$input[4]','$input[5]','$input[6]','PENDING');";