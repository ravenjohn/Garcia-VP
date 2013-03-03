<?php
	DEFINE('AUTH',1);
	session_start();
	foreach(glob("../bin/*.php") as $file) include $file;
	
	if(isset($_GET['admin_login'])){
		$result = API::execute('conrad/admin_login',$_POST);
		if(empty($result['data'])){
			echo "0";
		}
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
		print_r(json_encode(API::execute('conrad/sign_up',$_POST)));
	}
	else if(isset($_GET['logout'])){
		session_destroy();
		echo "Successfully logged out";
	}
	else if(isset($_GET['create_package'])){
		print_r(json_encode(API::execute("karla/create_package",$_POST)));
	}
	else if(isset($_GET['delete_package'])){
		print_r(json_encode(API::execute("karla/delete_package",$_POST)));
	}
	else if(isset($_GET['make_reservation'])){
		print_r(json_encode(API::execute("marian/make_reservation",$_POST)));
	}
	else if(isset($_GET['reservation_approve'])){
		print_r(json_encode(API::execute("jom/approve_reservation",$_POST)));
	}
	else if(isset($_GET['reservation_cancel'])){
		print_r(json_encode(API::execute("marian/cancel_reservation",$_POST)));
	}
	else{?><h1>You are not allowed to use this API.</h1><?php }
?>