<?php 
if(Input::get('user_id')){
	$user_id = Input::get('user_id');
	//echo $user_id;
}
//exit;
if(Input::get('help_id')){		
	$help_id = urldecode(base64_decode(Input::get('help_id')));
	if($help_id > 0){
		$help = Help::find_by_id($help_id);
		$fields = array("sender", "reply_email","subject","message", "department", "time", "user_id");
		foreach ($fields as $field){
			$$field = $help->$field;
		}
		if(Input::get('delete')){
			if(isset($session)){
				//admin_only($session->user_id);
			}
			Help::delete_all_where("id", $help_id);
			$session->message("success: Delete was successfully");
			if(admin()){
				redirect_to("index.php?p=helps");
			}
		}
		if(Input::get('resend')){
			$help->send($help->user_id);
			$session->message("success: Email was resent successfully");
			if(admin()){
				redirect_to("index.php?p=helps");
			}
		}
		if(Input::get('reset')){
			$email = Email::find_all(" WHERE email = '".$help->reply_email."'");
			//echo "<pre>".print_r($email, true)."</pre>";
			
			if($email[0]->id){
				//echo $email[0]->user_id;
				//exit;
				$user = User::find_by_id($email[0]->user_id);
				$user->password = sha1(trim(strtolower($user->username)));	
				$user->save();
				$message = "<p>Your password has been reset: <br>Username: ".$user->username."<br>Password: ".$user->username."</p><br><br>Login via: https://alumni.umu.ac.ug/public/index.php?p=login";
				Help::send_pass($help->reply_email, $message);
				$session->message("success: Password was reset successfuly");
				if(admin()){
					redirect_to("index.php?p=helps");
				}	
			}else{
				$session->message("error: The email address ".$help->reply_email." is not available in the system");
				if(admin()){
					redirect_to("index.php?p=helps");
				}
			}
			//$help->send();
			//$session->message("success: Email was resent successfully");
			//if(admin()){
			//	redirect_to("index.php?p=helps");
			//}
		}

		if(Input::get('forgot')){
			$email = Email::find_all(" WHERE email = '".Input::get('email')."'");
			//echo "<pre>".print_r($email, true)."</pre>";
			
			if($email[0]->id){
				//echo $email[0]->user_id;
				//exit;
				$user = User::find_by_id($email[0]->user_id);
				$user->password = sha1(trim(strtolower($user->username)));	
				$user->save();
				$message = "<p>Your password has been reset: <br>Username: ".$user->username."<br>Password: ".$user->username."</p><br><br>Login via: https://alumni.umu.ac.ug/public/index.php?p=login and change your password to a more secure password";
				Help::send_pass($email[0]->email, $message);
				$session->message("success: Your username and password has been sent to your email, ".$email[0]->email." Please check this email to access your account");
				redirect_to("index.php?p=login");	
				
			}else{
				$session->message("error: The email address that you have provided (".$help->reply_email.") is not available in the system. Click register to register with the system");
				redirect_to("index.php?p=login");
			}
			//$help->send();
			//$session->message("success: Email was resent successfully");
			//if(admin()){
			//	redirect_to("index.php?p=helps");
			//}
		}

		
	}
}else{
	$help_id = 0;
	$inputs = array("sender", "reply_email","subject","message", "department");
	foreach ($inputs as $input){
		$$input = Input::get($input);
	}
}
if(Input::get('submit')){
	
	$inputs = array("sender", "reply_email","subject","message", "department");
		$i = 0;
		foreach ($inputs as $input){
			$$input = Input::get($input);
		}
		//if($){
		
		
		//$alumni->user_id = $user_id;

	if($help_id==0){
		$help = new Help();
	}
	$attributes  = array("sender", "reply_email","subject","message", "department", "user_id");
	foreach ($attributes as $attribute){
		$help->$attribute = trim($$attribute);
	}
	if(empty($help->subject)){
		$help->subject = "User Request/Suggestion";
	}
	if(!empty($help->message)){
		//echo "<pre>".print_r($help, true)."</pre>";
		//echo "<pre>".print_r($send_to, true)."</pre>";
		//$send_to = implode(',', $send_to);
		//echo 'mail("'.$send_to.'","User Request/Suggestion", "'.$help->message.'", "From:'.$help->reply_email.'")';
		//mail("'.$send_to.'","'.$help->subject.'", "'.$help->message.'", "From:'.$help->reply_email.'");
		//echo $user_id;
		//exit;
		$action = $help->save();
		if(is_numeric($action)){
			if(isset($help->user_id)){
				$help->send($help->user_id);	
			}else{
				$help->send();
			}	
		//mail("mmutebi@umu.ac.ug,mwessi85@gmail.com","'.$help->subject.'", "'.$help->message.'", "From:'.$help->reply_email.'");
			$session->message("success: Request was added successfully");
		}else{
			$session->message("success: Request edit was successfull");
		}
		if(admin()){
			redirect_to("index.php?p=helps");
		}
		$session->message("success: ".$help->sender.", your request was sent successfully. We will get back to you using the email address that you provided (".$help->reply_email.")");
		redirect_to("index.php");
	}
}else{	

}
?>