<?php
	defined('AUTH') or die;
	
	$change_password = false;
	
	$input[] = $_POST['fullName'];
	$input[] = $_POST['address'];
	$input[] = $_POST['contact'];
	
	if(isset($_POST['password'])){
		$input[] = $_POST['password'].RConfig::PASSWORD_SALT;
		$change_password = true;
	}
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE __users SET fullName = '$input[0]', address = '$input[1]', contact = '$input[2]' ".(($change_password)?", password = SHA1(MD5('$input[3]'))":"")." WHERE email = '".$_SESSION['email']."';";