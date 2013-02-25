<?php
	DEFINE('AUTH',1);
	session_start();
	foreach(glob("../bin/*.php") as $file) include $file;
	
	if(isset($_GET['admin_login'])){
		$result = API::execute('conrad/admin_login',$_POST);
		if(empty($result['data']))
			echo "0";
		else{
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['role'] = 'admin';
			echo "1";
		}
	}
	else if(isset($_GET['user_login'])){
		$result = API::execute('conrad/user_login',$_POST);
		if(empty($result['data']))
			echo "0";
		else{
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['role'] = 'user';
			echo "1";
		}
	}
	else if(isset($_GET['sign_up'])){
		$result = API::execute('conrad/sign_up',$_POST);
		print_r(json_encode($result));
	}
	else if(isset($_GET['logout'])){
		session_destroy();
		header('Location: '.RConfig::app_url);
	}
	else{?><h1>You are not allowed to use this API.</h1><?php }
?>