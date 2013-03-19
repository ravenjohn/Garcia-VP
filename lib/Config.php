<?php
	defined('AUTH') or die;

	if(defined('RCONFIG')) return;
	
	DEFINE('RCONFIG',1);
	
	final class RConfig{
	
		const app_name			= "Garcia Photo and Video Coverage";
		const app_version		= "1.0";
		const app_copyright		= "Copyright 2013";
		const app_description 	= "Garcia, Photo and Video, Photography, Videography, Advertising";

		const app_url 			= "http://localhost/VERSION_AB5L_GROUP1/";
		const ajax_url 			= "ajax/?";

		const logs_path 		= "C://xampp/htdocs/VERSION_AB5L_GROUP1/_logs/";

		const log 				= true;
		
		const replaceCSS 		= true;
		const replaceJS 		= true;

		const minifyCSS 		= true;
		const minifyJS 			= true;
		const minifyHTML 		= true;
		
		const encryptHTML 		= false;
		
		const MAIL_NAME 		= "Codewars 2013";
		const MAIL_USERNAME 	= "codewars2013@gmail.com";
		const MAIL_PASSWORD 	= "codewarsthebest";
		const MAIL_HOST 		= "ssl://smtp.gmail.com";
		const MAIL_PORT 		= "465";
		
		const DB_HOST 			= "localhost";
		const DB_NAME 			= "garciadb";
		const DB_USERNAME 		= "root";
		const DB_PASSWORD 		= "";
		
		const PASSWORD_SALT 	= "0efec51fd7cf517793321ec68fd852811537b69c";
		
	}