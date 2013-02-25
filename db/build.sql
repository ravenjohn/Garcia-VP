drop database if exists garciadb;
CREATE database garciadb;
use garciadb;

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

create table __admins(
	username VARCHAR(16) primary key,
	password VARCHAR(40) NOT NULL
);

create table __packages(
	name VARCHAR(64) primary key,
	cost VARCHAR(16) NOT NULL
);

create table __reservations(
	id INT(11) auto_increment primary key,
	username VARCHAR(16) NOT NULL,
	packageName VARCHAR(64) NOT NULL,
	startDate DATETIME NOT NULL,
	endDate DATETIME NOT NULL,
	location VARCHAR(100) NOT NULL,
	additionalRequest VARCHAR(1000),
	status VARCHAR(64)
);
