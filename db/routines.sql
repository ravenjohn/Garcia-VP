DROP FUNCTION IF EXISTS SIGN_UP;
DELIMITER $$
CREATE FUNCTION SIGN_UP(_email VARCHAR(255), _password VARCHAR(255), _fullName VARCHAR(255), _address VARCHAR(255), _contact VARCHAR(255), _confToken VARCHAR(255))
RETURNS INT
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __users WHERE email = _email;
	IF _exists THEN
		RETURN 0;
	ELSE
		INSERT into __users values(_email, sha1(md5(_password)), _fullName, _address, _contact, FALSE, _confToken,'');
		RETURN 1;
	END IF;
END $$
DELIMITER ; 

DROP FUNCTION IF EXISTS RESET_PASSWORD;
DELIMITER $$
CREATE FUNCTION RESET_PASSWORD(_email VARCHAR(255), _resetPasswordToken VARCHAR(255))
RETURNS INT
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __users WHERE email = _email;
	IF _exists THEN
		UPDATE __users SET resetPasswordToken = _resetPasswordToken WHERE email = _email;
		RETURN 1;
	ELSE
		RETURN 0;
	END IF;
END $$
DELIMITER ; 