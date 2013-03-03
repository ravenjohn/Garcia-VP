<?php
	defined('AUTH') or die;

	if(defined('RCONFIG')) return;
	
	DEFINE('RCONFIG',1);
	
	final class RConfig{
		const app_name = "Garcia Photo and Video Coverage";
		const app_version = "1.0";
		const app_copyright = "Copyright 2013";

		const app_url = "http://localhost/VERSION_AB5L_GROUP1/";
		const ajax_url = "ajax/?";

		const logs_path = "C://xampp/htdocs/VERSION_AB5L_GROUP1/_logs/";

		const log = true;
		
		const replaceCSS = true;
		const replaceJS = true;

		const minifyCSS = true;
		const minifyJS = true;
		const minifyHTML = true;
		
		const encryptHTML = false;
		
		const DB_HOST = "localhost";
		const DB_NAME = "garciadb";
		const DB_USERNAME = "root";
		const DB_PASSWORD = "";
	}
?>
