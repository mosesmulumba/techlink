<?php
	//require_once("PHPMailerAutoload.php");

	class Help{
		protected static $_table_name = "helps";
		public $message;
		
		public function send($mailTo, $sender){
			//echo "mail($send_to, $this->subject, $this->message, 'From:'.$this->reply_email)";
			$body_message = $this->message;


			require_once("PHPMailerAutoload.php");
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "jluwaga@umu.ac.ug";                 // SMTP username
			$mail->Password = "jjuko888";                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->addReplyTo('jluwaga@umu.ac.ug', 'Luwaga Jude');
			$mail->setFrom('jluwaga@umu.ac.ug', 'Luwaga Jude');
			$mail->addAddress('jluwaga@umu.ac.ug', 'Luwaga Jude');
			$mail->addAddress($mailTo, $sender);
	

			$mail->Subject = 'Test Jude Email 2';
			$mail->Body    = $body_message;

			if(!$mail->send()) {
				return false;
			} else {
				return true;
			}

		}
	}

	$help = new Help();
	$help->message = "Test Email for Jude Luwaga";
	if($help->send("mmutebi@umu.ac.ug", "Michael Mutebi")){
		echo "Message sent successfully";
	}else{
		echo "Message sending failed";
	}

?>
