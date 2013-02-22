--this files contains all the stored procedures needed for the app

DROP PROCEDURE IF EXISTS CREATE_PACKAGE;
DELIMITER $$
CREATE PROCEDURE CREATE_PACKAGE(_name VARCHAR(64), _cost VARCHAR(16))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE name = _name;
	IF _exists THEN
		SELECT CONCAT("Package name '", _name , "' already exists.") as message, "0" as statusCode;
	ELSE
		INSERT INTO __packages VALUES(_name, _cost);
		SELECT CONCAT("Package '", _name ,"' successfully created.") as message, "1" as statusCode;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS DELETE_PACKAGE;
DELIMITER $$
CREATE PROCEDURE DELETE_PACKAGE(_name VARCHAR(64))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE name = _name;
	IF _exists THEN
		DELETE FROM __packages WHERE name = _name;
		SELECT CONCAT("Package '", _name ,"' successfully deleted.") as message, "1" as statusCode;
	ELSE
		SELECT CONCAT("Package '", _name , "' does not exist.") as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS UPDATE_PACKAGE;
DELIMITER $$
CREATE PROCEDURE UPDATE_PACKAGE(_name VARCHAR(64), _cost VARCHAR(16))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE name = _name;
	IF _exists THEN
		UPDATE __packages SET cost = _cost WHERE name = _name;
		SELECT CONCAT("Package '", _name ,"' successfully updated.") as message, "1" as statusCode;
	ELSE
		SELECT CONCAT("Package '", _name , "' does not exist.") as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS MAKE_RESERVATION;
DELIMITER $$
CREATE PROCEDURE MAKE_RESERVATION(_user_name VARCHAR(16), _packageName VARCHAR(64), _startDate VARCHAR(10) , _endDate VARCHAR(10),  _location VARCHAR(100), _additionalRequest VARCHAR(1000))
BEGIN

	INSERT INTO __reservations(username, packageName, startDate, endDate, location, additionalRequest, status) VALUES(_username, _packageName, _startDate, _endDate, _location, _additionalRequest, "pending");
/*
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE name = _name;
	IF _exists THEN
		SELECT CONCAT("Package name '", _name , "' already exists.") as message, "0" as statusCode;
	ELSE
		INSERT INTO __packages VALUES(_name, _cost);
		SELECT CONCAT("Package '", _name ,"' successfully created.") as message, "1" as statusCode;
	END IF;
*/
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
DELIMITER $$
CREATE PROCEDURE VIEW_PENDING()
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __reservations r WHERE  r.status LIKE '%pending%';
	IF _exists THEN
		SELECT *, "1" as statusCode FROM __reservations r WHERE r.status LIKE '%pending%';
	ELSE
		SELECT "No pending requests." as message, "0" as statusCode;
	END IF;
END $$
DELIMITER ;

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