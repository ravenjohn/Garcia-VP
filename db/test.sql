
/*
DROP PROCEDURE IF EXISTS VIEW_USERS;	
DELIMITER $$
CREATE PROCEDURE VIEW_USERS()
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM user_data;
	IF _exists THEN
		SELECT * from user_data;
	ELSE
		SELECT "no data" as message;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS ADD_USER;	
DELIMITER $$
CREATE PROCEDURE ADD_USER(_username VARCHAR(16), _password VARCHAR(40))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __users WHERE username = _username;
	IF _exists THEN
		SELECT "Username already taken" as message, "123" as error;
	ELSE
		INSERT into __users values(_username, sha1(md5(_password)));
		SELECT _username as username,_password as password;
	END IF;
END $$
DELIMITER ;
*/

DROP PROCEDURE IF EXISTS SIGN_UP;	
DELIMITER $$
CREATE PROCEDURE SIGN_UP(_username VARCHAR(16), _password VARCHAR(40), _firstName VARCHAR(40), _lastName VARCHAR(30), _contact VARCHAR(30), _address VARCHAR(100), _birthday VARCHAR(10))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __users WHERE username = _username;
	IF _exists THEN
		SELECT "Username already taken" as message, "123" as error;
	ELSE
		INSERT into __users values(_username, sha1(md5(_password)), _firstName, _lastName, _contact, _address, _birthday);
		SELECT _username as username,_password as password;
	END IF;
END $$
DELIMITER ;