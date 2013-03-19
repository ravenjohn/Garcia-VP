<?php
	defined('AUTH') or die;

	if(defined('RMAILER')) return;
	
	if(!defined('RCONFIG'))
		include_once 'bin/RConfig.php';
	
	DEFINE('RMAILER',1);
	
	
	final class RMailer{
	
		public static function send($to,$subject,$body){
			require_once "Mail.php";
			require_once "Mail/mime.php";
			
			$headers = array (
				'From' => RConfig::MAIL_NAME." <".RConfig::MAIL_USERNAME.">",
				'To' => $to,
				'Subject' => $subject
			);
			
			$html = '<html><body>'.$body.'</body></html>';
			
			$mime = new Mail_mime("\n");
			$mime->setHTMLBody($html);
			$body = $mime->get();
			
			$headers = $mime->headers($headers);
				
			$smtp = Mail::factory('smtp',
				array ('host' => RConfig::MAIL_HOST,
				'port' => RConfig::MAIL_PORT,
				'auth' => true,
				'username' => RConfig::MAIL_USERNAME,
				'password' => RConfig::MAIL_PASSWORD)
			);

			$mail = $smtp->send($to, $headers, $body);
			
			if(PEAR::isError($mail)){
				RLogger::log('E', 'send_email', $headers, $to, $mail->getMessage());
			}else{
				RLogger::log('D', 'send_email', $headers, $to, "Successful");
			}
			return !(PEAR::isError($mail));
		}
		
		public static function generateRandomString($length = 10){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			
			for ($i=0; $i<$length; $i++){
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			
			return $randomString;
		}
	}