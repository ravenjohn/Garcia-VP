<?php
	defined('AUTH') or die;
	$input[] = $_POST['username'];
	$input[] = $_POST['password'];
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "SELECT * FROM __users WHERE (username='$input[0]' OR email='$input[0]') AND password=sha1(MD5('$input[1]'));";