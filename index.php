<?php
	DEFINE('AUTH', 1);
	ob_start();
	session_start();
	foreach(glob("lib/*.php") as $file) require $file;
	require('template/layout.php');
	RModuleMgr::minifyHTML(ob_get_clean());