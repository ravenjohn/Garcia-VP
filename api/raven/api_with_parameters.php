<?php
	defined('AUTH') or die;
	
	//getting parameters from post
	// $input[] = $_POST['username'];
	// $input[] = $_POST['password'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	//sample query, wrap every $input[index] with single quotes
	// $query = "INSERT INTO users VALUES('$input[0]',MD5('$input[1]'));";

	//dont forget to delete all unnecessary comments