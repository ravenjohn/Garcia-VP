<?php
	DEFINE('AUTH', 1);
	ob_start();
	session_start();
	foreach(glob("bin/*.php") as $file) include $file;
	$modules = array();
	$modules[] = "header";
	$modules[] = "menu";
	if(isset($_GET['get'])){
		$modules = array();
		if($_GET['get']=='home' && !isset($_SESSION['username']))
			$modules[] = "sign_in_up";
		else if($_GET['get']=='gallery')
			$modules[] = "gallery";
		else if($_GET['get']=='packages'){
			$modules[] = "view_packages";
			$modules[] = "make_reservation";
		}
		if(!isset($_SESSION['username']))
			$modules[] = "admin_login";
		if(isset($_SESSION['role'])){
			$modules[] = "profile_nav";
			if($_SESSION['role']=='admin'){
				$modules[] = "manage_package";
				$modules[] = "check_for_conflict";
			}
			$modules[] = "manage_reservation";
		}
		RModuleMgr::renderModules($modules);
		exit;
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cache-control" content="public">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Garcia Photo and Video, Photographym Videography, Advertising">
		<title><?php echo RConfig::app_name;?></title>
		<link rel="author" href="humans.txt">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
		<?php RModuleMgr::renderStyles();?>
		<link rel="icon" href="static/img/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon.png">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-144x144-precomposed.png" sizes="144x144">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-114x114-precomposed.png" sizes="114x114">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-72x72-precomposed.png" sizes="72x72">
		<link rel="apple-touch-icon-precomposed" href="static/img/apple-touch-icon-57x57-precomposed.png" sizes="57x57">
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
		<section class="container">
			<div class="row" id="app_div">
				<?php RModuleMgr::renderModules($modules);?>
			</div>
		</section>
		<?php RModuleMgr::renderScripts();?>
	</body>
</html>
<?php RModuleMgr::minifyHTML(ob_get_clean());?>