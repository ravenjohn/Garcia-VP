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
			$result = API::execute('conrad/is_confirmed',$_POST);
			$result = $result['data'][0]['statusCode'];
			if(isset($_GET['token'])){
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['role'] = 'user';
				API::execute('conrad/confirm_user',$_POST);?>
				<script>window.location = "<?php echo RConfig::app_url;?>#home";</script><?php
				exit;
			}else if($result == "1"){
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['role'] = 'user';
				echo "1";
			}else{
				echo "2";
			}
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
	else if(isset($_GET['send_confirmation_email'])){
		$results = API::execute('jom/get_profile',$_POST);
		$result = $results['data'][0];
		$to = "<".$result['email'].">";
		$subject = "Welcome to Garcia's Photo and Video";
		$body = "Welcome ".$result['fullName']."!<br /><br />";
		$body .= "You can confirm your account email through the link below:<br /><br />";
		$body .= "<a href='".RConfig::app_url."ajax/?user_login&email=".$result['email']."&token=".$result['confirmationToken']."'>Confirm my account</a>";
		RMailer::send($to,$subject,$body);
		print_r(json_encode($results));
	}
	else if(isset($_GET['send_reset_password'])){
		$_POST['resetPasswordToken'] = RMailer::generateRandomString();
		$result = API::execute('conrad/reset_password',$_POST);
		if($result['data'][0]['status']=='1'){
			$to = "<".$_POST['email'].">";
			$subject = "Garcia's Photo and Video Password Reset Instruction";
			$body = "Hello,<br /><br />";
			$body .= "Please change your password after clicking the link below:<br /><br />";
			$body .= "<a href='".RConfig::app_url."ajax/?user_login&email=".$_POST['email']."&token=".$_POST['resetPasswordToken']."'>Reset my password</a>";
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
	else if(isset($_GET['get_profile'])){
		print_r(json_encode(API::execute("jom/get_profile",$_POST)));
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
	else if(isset($_GET['toggle_feedback'])){
		print_r(json_encode(API::execute("raven/toggle_feedback",$_POST)));
	}
	else if(isset($_GET['create_quotation'])){
		print_r(json_encode(API::execute("jom/create_quotation",$_POST)));
	}
	else if(isset($_GET['get_quotation'])){
		print_r(json_encode(API::execute("marian/get_quotation",$_POST)));
	}
	else if(isset($_GET['add_gallery']) && $_SESSION['role']=='admin'){
		echo mkdir("../static/img/gallery/".strtolower($_POST['galleryName']));
	}
	else if(isset($_GET['view_quotation'])){
		
		require_once '../tcpdf/config/lang/eng.php' ;
		require_once '../tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Garcia\'s Video and Photo');
		$pdf->SetTitle('Reservation Quotation');
		$pdf->SetSubject('Reservation Quotation');
		$pdf->SetKeywords('Garcia\s Video and Photo, PDF, quotation, Neophyte, Receipt');
		$pdf->SetHeaderData('', 0, "Garcia's Video and Photo".' ', "Videography, Photography and Advertising\n".RConfig::app_url);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->setLanguageArray($l);
		$pdf->SetFont('helvetica', 'B', 20);
		$pdf->AddPage();

		$html = '';
		$res = API::execute("marian/get_quotation",$_POST);

		$pdf->Write(0, 'Quotation', '', 0, 'C', true, 0, false, false, 0);

		$pdf->SetFont('times', '', 12);

		$html .= '<br /><br />Event: '.$res['data'][0]['title'];
		$html .= '<br />Name: '.$res['data'][0]['fullName'];
		$html .= '<br />Address: '.$res['data'][0]['address'];
		$html .= '<br />Details: '.date('M d, Y h:iA', strtotime($res['data'][0]['startDate'])).' to '.date('M d, Y h:iA', strtotime($res['data'][0]['endDate'])).' at '.$res['data'][0]['location'];
		
		$html .= '<style>'.file_get_contents('../tcpdf/css/style.min.css').'</style>';
		
		$html .= '<br /><br /><br /><table class="table">';
		$html .= '<tr><td align="center" width="75%">ITEM</td><td align="center" width="25%">COST</td></tr>';
		$val = 0;
		foreach($res['data'] as $r){
			$html .= '<tr>';
				$html .= '<td width="75%" class="item">     '.$r['item'].'</td>';
				$html .= '<td align="right" width="25%">'.(!empty($r['cost'])?number_format(intval($r['cost'])).'.00':'&nbsp;').'</td>';
			$html .= '</tr>';
			$val += intval($r['cost']);
		}
		$html .= '<tr><td align="right" width="75%">TOTAL&nbsp;&nbsp;&nbsp;</td><td align="right" width="25%">Php '.number_format($val).'.00</td></tr>';
		$html .= '</table>';

		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output('quotation.pdf', 'I');
	}
	else{?><h1>You are not allowed to use this API.</h1><?php }
?>