<?php
	defined('AUTH') or die;

	if(isset($_GET['get'])){
		$g = $_GET['get'];
		$modules = array();
		if($g=='home' && !isset($_SESSION['username']))
			$modules[] = "sign_in_up";
		else if($g=='gallery')
			$modules[] = "gallery";
		else if($g=='contact')
			$modules[] = "contact";
		else if($g=='packages'){
			$modules[] = "view_packages";
			$modules[] = "make_reservation";
		}
		if(!isset($_SESSION['username']))
			$modules[] = "admin_login";	
		if($g=='home'){
			if(isset($_SESSION['role'])){
				$modules[] = "profile_nav";
				if($_SESSION['role']=='admin'){
					$modules[] = "manage_package";
					$modules[] = "check_for_conflict";
				}
				$modules[] = "manage_reservation";
			}
		}
		if($g=='menu'){
			$modules = array();
			$modules[] = "menu";
		}
		RModuleMgr::renderModules($modules);
		exit;
	}