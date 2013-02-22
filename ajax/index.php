<?php
	DEFINE('AUTH',1);
	session_start();
	foreach(glob("../bin/*.php") as $file) include $file;
	
	if(isset($_GET['admin_log_in'])){
		$result = API::execute('conrad/login',$_POST);
		var_dump($result);
		if(empty($result['data']))
			echo "Incorrect username or password.";
		else{
			$_SESSION['username'] = $_POST['username'];
			echo "Hi ".$_POST['username'];
		}
	}
	else if(isset($_GET['log_in'])){
		$result = API::execute('conrad/log_in',$_POST);
		var_dump($result);
		if(empty($result['data']))
			echo "Incorrect username or password.";
		else{
			$_SESSION['username'] = $_POST['username'];
			echo "Hi ".$_POST['username'];
		}
	}
	else if(isset($_GET['get_users'])){
		$result = API::execute('info/get_users',array());
	}
	else if(isset($_GET['sign_up'])){
		$result = API::execute('conrad/sign_up',$_POST);
		print_r(json_encode($result));
	}
	else if(isset($_GET['logout'])){
		session_destroy();
		//LOG
		header('Location: '.RConfig::app_url);
	}
	else if(isset($_GET['create_package'])){
		print_r(json_encode(API::execute("karla/create_package",$_POST)));
	}
	else if(isset($_GET['delete_package'])){
		print_r(json_encode(API::execute("karla/delete_package",$_POST)));
	}
	else if(isset($_GET['make_reservation'])){
		print_r(json_encode(API::execute("marian/make_reservation",$_POST)));
	}else if(isset($_GET['check_for_conflict'])){
		print_r(json_encode(API::execute("jom/check_for_conflict",$_POST)));
	}else if(isset($_GET['view_pending'])){
		print_r(json_encode(API::execute("jom/view_pending",$_POST)));
	}else if(isset($_GET['find_similar'])){
		print_r(json_encode(API::execute("jom/find_similar",$_POST)));
	}else if(isset($_GET['approve_reservation'])){
		print_r(json_encode(API::execute("jom/approve_reservation",$_POST)));
	}
	else{?><h1>You are not allowed to use this API.</h1><?php }
?>