<?php
	DEFINE('AUTH',1);
	session_start();
	foreach(glob("../lib/*.php") as $file) include $file;
	
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
		if(isset($_GET['token'])){
			$_POST['email'] = $_GET['email'];
			$_POST['token'] = $_GET['token'];
		}
		$result = API::execute('conrad/user_login',$_POST);
		if(empty($result['data'])){
			if(isset($_GET['token'])){ ?>
				<script>window.location = "<?php echo RConfig::app_url;?>#home";</script><?php
				exit;
			}
			echo "0";
		}else{
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['role'] = 'user';
			if(isset($_GET['token'])){ ?>
				<script>window.location = "<?php echo RConfig::app_url;?>#home";</script><?php
				exit;
			}
			echo "1";
		}
	}
	else if(isset($_GET['sign_up'])){
		$_POST['confirmationToken'] = RMailer::generateRandomString();
		$result = API::execute('conrad/sign_up',$_POST);
		if($result['data'][0]['status']=='1'){
			$to = "<".$_POST['email'].">";
			$subject = "Welcome to Garcia's Photo and Video";
			$body = "Welcome ".$_POST['fullName']."!<br /><br />";
			$body .= "You can confirm your account email through the link below:<br /><br />";
			$body .= "<a href='".RConfig::app_url."ajax/?user_login&email=".$_POST['email']."&token=".$_POST['confirmationToken']."'>Confirm my account</a>";
			RMailer::send($to,$subject,$body);
		}
		print_r(json_encode($result));
	}
	else if(isset($_GET['send_reset_password'])){
		$_POST['resetPasswordToken'] = RMailer::generateRandomString();
		$result = API::execute('conrad/reset_password',$_POST);
		if($result['data'][0]['status']=='1'){
			$to = "<".$_POST['email'].">";
			$subject = "Garcia's Photo and Video Password Reset Instruction";
			$body = "Hello,<br /><br />";
			$body .= "You can reset your password through the link below:<br /><br />";
			$body .= "<a href='".RConfig::app_url."ajax/?reset_password&email=".$_POST['email']."&token=".$_POST['resetPasswordToken']."'>Reset my password</a>";
			RMailer::send($to,$subject,$body);
		}
		print_r(json_encode($result));
	}
	else if(isset($_GET['logout'])){
		session_destroy();
		echo "Successfully logged out";
	}
	else if(isset($_GET['edit_account'])){
		print_r(json_encode(API::execute("conrad/edit_account",$_POST)));
	}
	else if(isset($_GET['create_package'])){
		print_r(json_encode(API::execute("karla/create_package",$_POST)));
	}
	else if(isset($_GET['delete_package'])){
		print_r(json_encode(API::execute("karla/delete_package",$_POST)));
	}
	else if(isset($_GET['make_reservation'])){
		if(isset($_SESSION['role'])){
			print_r(json_encode(API::execute("marian/make_reservation",$_POST)));
		}else{
			echo "0";
		}
	}
	else if(isset($_GET['reservation_approve'])){
		print_r(json_encode(API::execute("jom/approve_reservation",$_POST)));
	}
	else if(isset($_GET['reservation_cancel'])){
		print_r(json_encode(API::execute("marian/cancel_reservation",$_POST)));
	}
	else if(isset($_GET['add_feedback'])){
		if(isset($_SESSION['role'])){
			print_r(json_encode(API::execute("raven/add_feedback",$_POST)));
		}else{
			echo "0";
		}
	}
	else if(isset($_GET['view_summary'])){
		print_r(json_encode(API::execute("karla/view_summary",$_POST)));
	}
	else{?><h1>You are not allowed to use this API.</h1><?php }
?>