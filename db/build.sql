drop database if exists garciadb;
CREATE database garciadb;
use garciadb;

drop table if exists __users;
create table __users(
	email VARCHAR(255) NOT NULL primary key,
	password VARCHAR(255) NOT NULL,
	fullName VARCHAR(255) NOT NULL,
	address VARCHAR(255) NOT NULL,
	contact VARCHAR(255) NOT NULL,
	confirmed BOOLEAN DEFAULT FALSE,
	confirmationToken VARCHAR(255),
	resetPasswordToken VARCHAR(255)
);

drop table if exists __admin;
create table __admins(
	username VARCHAR(255) primary key,
	password VARCHAR(255) NOT NULL
);

drop table if exists __packages;
create table __packages(
	id INT(11) primary key auto_increment,
	name VARCHAR(255) NOT NULL,
	cost VARCHAR(255) NOT NULL
);

drop table if exists __reservations;
create table __reservations(
	id INT(11) auto_increment primary key,
	title VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	packageId INT(255) NOT NULL,
	startDate DATETIME NOT NULL,
	endDate DATETIME NOT NULL,
	location VARCHAR(100) NOT NULL,
	additionalRequest TEXT,
	status VARCHAR(255)
);

drop table if exists __feedbacks;
create table __feedbacks(
	id INT(11) auto_increment primary key,
	email VARCHAR(255) NOT NULL,
	content VARCHAR(255) NOT NULL,
	status VARCHAR(255)
);

drop table if exists __quotations;
create table __quotations(
	id INT(11) auto_increment primary key,
	reservationId INT(11) NOT NULL,
	item VARCHAR(255) NOT NULL,
	cost INT (11)
);


DELETE FROM __packages;
INSERT INTO __packages VALUES("","Photo Booth First Hour","3500 (Every extra hour - 1000)");
INSERT INTO __packages VALUES("","Photo Service and Booth Package","7000");
INSERT INTO __packages VALUES("","Photo Service","2500");

INSERT INTO __feedbacks VALUES("","rjlagrimas08@gmail.com","It was true, they really created memories that we'll cherish for a lifetime! :)","APPROVED");
INSERT INTO __feedbacks VALUES("","rjlagrimas08@gmail.com","This is a sample feedback. asdf asdfasf asdfasd asd fadsf asdf asd fhbadsfj asdj jdfad jdn kjadnfk jasndfkasdjf kjdf naksdj nfadkjsfn aksjdfn ajksd nfkajsdfnkajsdfn kajsdf nkasjd fnkasjdf","APPROVED");
INSERT INTO __feedbacks VALUES("","rjlagrimas08@gmail.com","Ampanget -.-","PENDING");