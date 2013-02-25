<?php
	defined('AUTH') or die;
	$input[] = $_POST['username'];
	$input[] = $_POST['password'];
	$input[] = $_POST['email'];
	$input[] = $_POST['firstName'];
	$input[] = $_POST['lastName'];
	$input[] = $_POST['address'];
	$input[] = $_POST['contact'];
	$input[] = $_POST['birthday'];
	$check = false;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL SIGN_UP('$input[0]', '$input[1]', '$input[2]', '$input[3]', '$input[4]' ,'$input[5]' , '$input[6]', '$input[7]');";

/* DROP PROCEDURE IF EXISTS SIGN_UP;
DELIMITER $$
CREATE PROCEDURE SIGN_UP(_username VARCHAR(16), _password VARCHAR(40), _email VARCHAR(32), _firstName VARCHAR(40), _lastName VARCHAR(30), _address VARCHAR(100), _contact VARCHAR(30), _birthday DATE)
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __users WHERE username = _username;
	IF _exists THEN
		SELECT "Username already taken" as message, "0" as status;
	ELSE
		INSERT into __users values(_username, sha1(md5(_password)), _email, _firstName, _lastName, _address, _contact, _birthday);
		SELECT "Account successfully created" as message, "1" as status;
	END IF;
END $$
DELIMITER ; */