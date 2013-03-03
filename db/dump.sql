drop garciadb;
create database garciadb;
use garciadb;

-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: garciadb
-- ------------------------------------------------------
-- Server version	5.5.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `__admins`
--

DROP TABLE IF EXISTS `__admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__admins` (
  `username` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `__admins`
--

LOCK TABLES `__admins` WRITE;
/*!40000 ALTER TABLE `__admins` DISABLE KEYS */;
INSERT INTO `__admins` VALUES ('adminadmin','ec04321e2c7bf2e0b01bac41896796b19f22a244');
/*!40000 ALTER TABLE `__admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `__packages`
--

DROP TABLE IF EXISTS `__packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  `name` varchar(256) NOT NULL,
  `cost` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `__packages`
--

LOCK TABLES `__packages` WRITE;
/*!40000 ALTER TABLE `__packages` DISABLE KEYS */;
INSERT INTO `__packages` VALUES (4,'Photo Booth Packages','First Hour','3500 (Every extra hour - 1000)'),(5,'Photo Booth Packages','Photo Service and Booth Package','7000'),(6,'Photo and Video','Photo Service','2500'),(7,'Photo Booth Packages','ninz','5000'),(11,'Photo Booth Packages','asdf a','asdfasdf');
/*!40000 ALTER TABLE `__packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `__reservations`
--

DROP TABLE IF EXISTS `__reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `packageName` varchar(64) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `location` varchar(100) NOT NULL,
  `additionalRequest` varchar(1500) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `__reservations`
--

LOCK TABLES `__reservations` WRITE;
/*!40000 ALTER TABLE `__reservations` DISABLE KEYS */;
INSERT INTO `__reservations` VALUES (1,'tantan','4','0023-12-31 00:00:00','0003-12-31 00:00:00','2132','asdfasdf','PENDING'),(2,'tantan','11','0131-12-31 00:00:00','0023-12-31 00:00:00','asdfasf','asdfadf','PENDING'),(3,'','4','0023-12-31 00:00:00','0013-12-23 00:00:00','12321','adsf','PENDING'),(4,'','4','0023-12-31 00:00:00','0013-12-23 00:00:00','12321','adsf','PENDING'),(5,'','4','0023-12-31 00:00:00','0013-12-23 00:00:00','12321','adsf','PENDING'),(6,'','','0000-00-00 00:00:00','0000-00-00 00:00:00','','','PENDING'),(7,'tantan','Photo Service and Booth Package','1231-12-12 00:00:00','3424-04-12 00:00:00','wqreq','asdf','PENDING');
/*!40000 ALTER TABLE `__reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `__users`
--

DROP TABLE IF EXISTS `__users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(32) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `__users`
--

LOCK TABLES `__users` WRITE;
/*!40000 ALTER TABLE `__users` DISABLE KEYS */;
INSERT INTO `__users` VALUES ('tantan','6f729ce9bc72ecddc0a8175bf8e994fbe4aea7cd','tanta@gmail.com','tantan','Tan','Cotabato City','0963513521','1993-06-13');
/*!40000 ALTER TABLE `__users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'garciadb'
--
/*!50003 DROP PROCEDURE IF EXISTS `CREATE_PACKAGE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `CREATE_PACKAGE`(_category VARCHAR(256), _name VARCHAR(256), _cost VARCHAR(256))
BEGIN
	INSERT INTO __packages VALUES('',_category,_name,_cost);
	SELECT id FROM __packages ORDER BY id DESC LIMIT 1;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DELETE_PACKAGE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `DELETE_PACKAGE`(_id VARCHAR(64))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE id = _id;
	IF _exists THEN
		SELECT CONCAT("Package successfully deleted.") as message, "1" as statusCode;
		DELETE FROM __packages WHERE id = _id;
	ELSE
		SELECT CONCAT("Package does not exist.") as message, "0" as statusCode;
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SIGN_UP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `SIGN_UP`(_username VARCHAR(16), _password VARCHAR(40), _email VARCHAR(32), _firstName VARCHAR(40), _lastName VARCHAR(30), _address VARCHAR(100), _contact VARCHAR(30), _birthday DATE)
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __users WHERE username = _username;
	IF _exists THEN
		SELECT "Username already taken" as message, "0" as status;
	ELSE
		INSERT into __users values(_username, sha1(md5(_password)), _email, _firstName, _lastName, _address, _contact, _birthday);
		SELECT "Account successfully created" as message, "1" as status;
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UPDATE_PACKAGE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `UPDATE_PACKAGE`(_name VARCHAR(64), _cost VARCHAR(16))
BEGIN
	DECLARE _exists BOOLEAN DEFAULT FALSE;
	SELECT COUNT(*) > 0 INTO _exists FROM __packages WHERE name = _name;
	IF _exists THEN
		UPDATE __packages SET cost = _cost WHERE name = _name;
		SELECT CONCAT("Package '", _name ,"' successfully updated.") as message, "1" as statusCode;
	ELSE
		SELECT CONCAT("Package '", _name , "' does not exist.") as message, "0" as statusCode;
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-03 21:20:35
