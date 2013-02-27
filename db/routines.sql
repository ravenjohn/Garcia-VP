--this files contains all the stored procedures needed for the app

DROP PROCEDURE IF EXISTS SIGN_UP;
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
DELIMITER ; 

DELIMITER $$
DROP PROCEDURE IF EXISTS CREATE_PACKAGE;
CREATE PROCEDURE CREATE_PACKAGE(_category VARCHAR(256), _name VARCHAR(256), _cost VARCHAR(256))
BEGIN
	INSERT INTO __packages VALUES('',_category,_name,_cost);
	SELECT id FROM __packages ORDER BY id DESC LIMIT 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS DELETE_PACKAGE;
DELIMITER $$
CREATE PROCEDURE DELETE_PACKAGE(_id INT(11))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE id = _id;
	IF _exists THEN
		SELECT CONCAT("Package successfully deleted.") as message, "1" as statusCode;
		DELETE FROM __packages WHERE id = _id;
	ELSE
		SELECT CONCAT("Package does not exist.") as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS CHECK_FOR_CONFLICTS;
DELIMITER $$
CREATE PROCEDURE CHECK_FOR_CONFLICTS()
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __reservations r WHERE (r.startDate < (SELECT CURDATE()) OR r.endDate = (SELECT CURDATE())) AND r.status LIKE '%pending%';
	IF _exists THEN
		SELECT *, "1" as statusCode FROM __reservations r WHERE (r.startDate < (SELECT CURDATE()) OR r.endDate = (SELECT CURDATE())) AND r.status LIKE '%pending%';
	ELSE
		SELECT "No conflicts." as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS APPROVE_RESERVATION;
DELIMITER $$
CREATE PROCEDURE APPROVE_RESERVATION(_id INT(11), _username VARCHAR(16))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __reservations r WHERE r.id = _id;
	IF _exists THEN
		UPDATE __reservations SET status = "APPROVED" WHERE id = _id;
		SELECT CONCAT("Reservation ID #'", _id ,"' of  '", _username, "' is APPROVED!") as message, "1" as statusCode;
	ELSE
		SELECT "Still PENDING." as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS VIEW_PENDING;

DROP PROCEDURE IF EXISTS FIND_SIMILAR;
DELIMITER $$
CREATE PROCEDURE FIND_SIMILAR()
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __reservations r, __reservations s WHERE  (r.status LIKE '%pending%'  AND s.status LIKE '%pending%') AND (r.startDate = s.startDate AND r.id != s.id);
	IF _exists THEN
		SELECT *, "1" as statusCode FROM __reservations r, __reservations s WHERE  (r.status LIKE '%pending%'  AND s.status LIKE '%pending%') AND (r.startDate = s.startDate AND r.id != s.id );
	ELSE
		SELECT " " as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;
>>>>>>> 725f52d056d3c909728604d5c7a0a5f367e6eac9
