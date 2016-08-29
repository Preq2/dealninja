<?php
class Email_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function do_ci_email($which,$cid,$meta)
	{
/**/

		$this -> db -> select('*');
		$this -> db -> from('client');
		$this -> db -> where('client_id = ' . $cid);
		$this -> db -> limit(1);

		$query = $this -> db -> get();


		if($query -> num_rows() == 1) {

			///////////// start send email
			/////////////
			
			$message = '';
			$message2 = '';
			$content = '';
			$additional_text_html = '';
			$additional_text_plain = '';
			$subject = '';
			
			$arr_meta = explode('::',$meta);
	
			$this -> db -> select('*');
			$this -> db -> from('client');
			$this -> db -> where('client_id = ' . $cid);
			$this -> db -> limit(1);
	
			$query = $this -> db -> get();		
			$client = $query->row_array();
	
			$this -> db -> select('*');
			$this -> db -> from('setting');
			$this -> db -> limit(1);
	
			$query2 = $this -> db -> get();		
			$setting = $query2->row_array();
			
			if ($which == 'invite email') {


				$subject .= $setting['setting_email_welcome_subject'];
				$content .= $setting['setting_email_welcome_body'];
				$additional_text_html .= '<br><br>We have the ability and willingness to tailor your debt settlement that meets your needs. With us you will have a peace of mind, respect, and reliability.<br><br>';
				$additional_text_html .= 'Go to <a href="http://' . $setting['setting_url'] . '">' . $setting['setting_url'] . '</a> and Verify your Invitation by typing:<br><br>';
				$additional_text_html .= 'Invitation Client Id: ' . pad_unpad_client_id($cid,'pad') . '<br><br>';
		
				
			} elseif ($which == 'new account') {
				
				$subject .= $setting['setting_email_account_created_subject'];
				$content .= $setting['setting_email_account_created_body'];
				$additional_text_html .= 'Your Account Login Credentials:<br><br>';
				$additional_text_html .= 'Username: ' . $client['client_email'] . '<br>';
				$additional_text_html .= 'Password: (use password you created when you verified your invitation)<br>';
				$additional_text_plain .= 'Visit <a href="http://' . $setting['setting_url'] . '">' . $setting['setting_url'] . '</a> to log into your account.' . '\n\n';
				$additional_text_html .= 'Please keep for your records.<br><br>';
			
				
			} else {


			}
	
	
			$to = $client['client_email'];
			$name = $client['client_first_name'] . ' ' . $client['client_last_name'];
			
			$message .= '<html><body>';
			$message .= $setting['setting_email_template_top'];
			$message .= 'Hello ' . $client['client_first_name'] . '<br /><br />';
			$message .= $content . '<br /><br />';
			$message .= $additional_text_html;
			$message .= $setting['setting_email_template_bottom'];
			$message .= '</body></html>';	
	
			$message2 .= 'Hello ' . $client['client_first_name'] . '\n\n';
			$message2 .= $content . '\n\n';
			$message2 .= $additional_text_plain;
	
	
			$mail             = new PHPMailer();
			
			$body             = $message;
			//$body             = eregi_replace("[\]",'',$body);
			
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = $setting['setting_smtp_host']; // SMTP server
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = $setting['setting_smtp_host']; // sets the SMTP server
			$mail->Port       = 26;                    // set the SMTP port for the GMAIL server
			$mail->Username   = $setting['setting_smtp_account']; // SMTP account username
			$mail->Password   = $setting['setting_smtp_password'];        // SMTP account password
			
			$mail->SetFrom($setting['setting_smtp_account'], $setting['setting_company_name']);
			
			$mail->AddReplyTo("noreply@squareupuk.com", $setting['setting_company_name']);
			
			$mail->Subject    = $subject;
			
			$mail->AltBody    = $message2; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			$address = $to;
			$mail->AddAddress($address, $name);
			
			//$mail->AddAttachment("images/phpmailer.gif");      // attachment
			//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
			
			$mail->Send();
			
			/*
			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "Message sent!";
			}
			*/

			///////////// end send email
			/////////////

		}












		
	}
	
	
	
	
	
	
	
	


}

?>