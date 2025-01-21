<?php
	//require_once("PHPMailerAutoload.php");

	class Help{
		protected static $_table_name = "helps";
		public $message;
		
		public function send(){
			//echo "mail($send_to, $this->subject, $this->message, 'From:'.$this->reply_email)";
			$body_message = $this->message;


			require_once("PHPMailerAutoload.php");
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "libadmin@umu.ac.ug";                 // SMTP username
			$mail->Password = "atlas618";                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->addReplyTo('jluwaga@umu.ac.ug', 'jluwaga@umu.ac.ug');
			$mail->addReplyTo('jluwaga@umu.ac.ug', 'Luwaga Jude');
			$mail->addReplyTo('mmutebi@umu.ac.ug', 'MIchael Mutebi');
			$mail->setFrom('jluwaga@umu.ac.ug', 'jluwaga@umu.ac.ug');

			$mail->addAddress('mmutebi@umu.ac.ug', 'Michael Mutebi');
			$mail->addAddress('jluwaga@umu.ac.ug', 'Luwaga Jude');
	        $mail->addAddress('juluwaga@gmail.com', 'Luwaga Jude');
            $mail->addAddress('emirembe@umu.ac.ug', 'Mirembe Eva');
            $mail->addAddress('hlutaya@umu.ac.ug', 'Lutaya Henry');
			$mail->addAddress('juluwaga@gmail.com', 'Luwaga Jude');

			$mail->Subject = 'Please you have overstayed with the Projector';
			$mail->Body    = $body_message;

			if(!$mail->send()) {
				return false;
			} else {
				return true;
			}

		}
	}

	$help = new Help();
	$help->message = "Please you have overstayed with the Projector";
	if($help->send()){
		echo "Message sent successfully";
	}else{
		echo "Message sending failed";
	}

?>
