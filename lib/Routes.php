<?php
	defined('AUTH') or die;

	if(isset($_GET['get'])){
		$g = $_GET['get'];
		$modules = array();
		if($g=='home' && !isset($_SESSION['role']))
			$modules[] = "sign_in_up";
		else if($g=='gallery')
			$modules[] = "gallery";
		else if($g=='contact')
			$modules[] = "contact";
		else if($g=='feedbacks')
			$modules[] = "view_feedbacks";
		else if($g=='packages'){
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){

				$modules[] = "manage_package";
			}
			else{
				$modules[] = "view_packages";
				$modules[] = "make_reservation";
			}
		}
		if(!isset($_SESSION['role']))
			$modules[] = "footer";	
		if($g=='home'){
			if(isset($_SESSION['role'])){
				$modules[] = "profile_nav";
				if($_SESSION['role']=='admin'){
				$modules[] = "reservation_calendar";
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