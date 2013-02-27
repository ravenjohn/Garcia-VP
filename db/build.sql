drop database if exists garciadb;
CREATE database garciadb;
use garciadb;

drop table if exists __users;
create table __users(
	username VARCHAR(16) primary key,
	password VARCHAR(40) NOT NULL,
	email VARCHAR(32) NOT NULL,
	firstName VARCHAR(40) NOT NULL,
	lastName VARCHAR(30) NOT NULL,
	address VARCHAR(100) NOT NULL,
	contact VARCHAR(30) NOT NULL,
	birthday DATE NOT NULL
);

drop table if exists __admin;
create table __admins(
	username VARCHAR(16) primary key,
	password VARCHAR(40) NOT NULL
);

drop table if exists __packages;
create table __packages(
	id INT(11) primary key auto_increment,
	category VARCHAR(256) NOT NULL,
	name VARCHAR(256) NOT NULL,
	cost VARCHAR(256) NOT NULL
);

drop table if exists __reservations;
create table __reservations(
	id INT(11) auto_increment primary key,
	username VARCHAR(16) NOT NULL,
	packageName VARCHAR(64) NOT NULL,
	startDate DATETIME NOT NULL,
	endDate DATETIME NOT NULL,
	location VARCHAR(100) NOT NULL,
	additionalRequest VARCHAR(1500),
	status VARCHAR(64)
);


DELETE FROM __packages;
INSERT INTO __packages VALUES("","Photo Booth Packages","First Hour","3500 (Every extra hour - 1000)");
INSERT INTO __packages VALUES("","Photo Booth Packages","Photo Service and Booth Package","7000");
INSERT INTO __packages VALUES("","Photo and Video","Photo Service","2500");

INSERT INTO __admins VALUES('admin','admin');