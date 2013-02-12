<?php
	DEFINE('AUTH', 1);
	session_start();
	foreach(glob("bin/*.php") as $file) include $file;
	$modules = array();
	$modules[] = array("name"=>"add_package","position"=>"main");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo RConfig::app_name;?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="author" href="humans.txt">
		<?php RModuleMgr::renderStyles();?>
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon.png">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-144x144-precomposed.png" sizes="144x144">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-114x114-precomposed.png" sizes="114x114">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-72x72-precomposed.png" sizes="72x72">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-57x57-precomposed.png" sizes="57x57">
		<link rel="shortcut icon" href="static/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="static/img/favicon.ico" type="image/x-icon">
		<!--[if lt IE 7]>
			<link href="//netdna.bootstrapcdn.com/font-awesome/3.0/css/font-awesome-ie7.css" rel="stylesheet">
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    </head>
    <body>
		<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		<div id="header-wrapper">
			<?php RModuleMgr::renderModules($modules,"header");?>
		</div>
		<div id="banner-wrapper">
			<?php RModuleMgr::renderModules($modules,"banner");?>
		</div>
		<div id="featured-wrapper">
			<?php RModuleMgr::renderModules($modules,"featured");?>
		</div>
		<div id="main-wrapper">
			<?php RModuleMgr::renderModules($modules,"main");?>
		</div>
		<div id="footer-wrapper">
			<?php RModuleMgr::renderModules($modules,"footer");?>
		</div>		
		<?php RModuleMgr::renderScripts();?>
	</body>
</html>