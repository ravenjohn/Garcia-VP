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
