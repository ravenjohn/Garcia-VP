<?php
	defined('AUTH') or die;
	$input[] = $_POST['oldPassword'].RConfig::PASSWORD_SALT;
	$input[] = $_POST['newPassword'].RConfig::PASSWORD_SALT;
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE __admins SET password = SHA1(MD5('$input[1]')) WHERE password = SHA1(MD5('$input[0]'));";
