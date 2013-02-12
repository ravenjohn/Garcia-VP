<?php
	DEFINE('AUTH',1);
	session_start();
	foreach(glob("../bin/*.php") as $file) include $file;
	
	if(isset($_GET['login'])){
		$result = API::execute('auth/login',$_POST);
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
	else if(isset($_GET['logout'])){
		session_destroy();
		//LOG
	}
	else{?><h1>You are not allowed to use this API.</h1><?php }
?>