<?
include_once('_connect.php');
include_once('../../includes/functions.php');

echo $_GET['do_what'] . "In email ajax script";
/*
require_once('../../cap_application/libraries/phpmailer/class.phpmailer.php');
include("../../cap_application/libraries/phpmailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$sql = "SELECT * FROM setting WHERE setting_id = 1";
$result = mysql_query($sql);
$setting = mysql_fetch_array($result);

if ($_GET['emid'] != 0) {
	$sql2 = "SELECT * FROM email WHERE email_id = " . $_GET['emid'];
	$result2 = mysql_query($sql2);
	$email_text = mysql_fetch_array($result2);	
}






if ($_GET['do_what'] == 'client_invite') {
		
		$sql4 = "SELECT * FROM client WHERE client_id = " . $_GET['cid'];
		$result4 = mysql_query($sql4);
		$client = mysql_fetch_array($result4);

		$to = $client['client_email'];
		
		$name = $client['client_first_name'] . ' ' . $client['client_last_name'];
		
		$subject = 'Bererere' . $setting['setting_email_welcome_subject'];
		
		$message = '<html><body>';
		$message .= $setting['setting_email_template_top'];
		$message .= 'Hello ' . $customer['client_first_name'] . '<br /><br />';
		$message .= $setting['setting_email_account_created_body'] . '<br /><br />';
		$message .= 'Visit <a href="http://' . $setting['setting_url'] . '">' . $setting['setting_url'] . '</a> and use<br /><br />';
		$message .= 'Invitation Client Id: ' . pad_unpad_client_id($_GET['cid'],'pad') . '<br /><br />';
		$message .= $setting['setting_email_template_bottom'];
		$message .= '</body></html>';	

		$message2 .= 'Hello ' . $customer['client_first_name'] . '\n\n';
		$message2 .= $setting['setting_email_account_created_body'] . '\n\n';
		$message2 .= 'Visit <a href="http://' . $setting['setting_url'] . '">' . $setting['setting_url'] . '</a> and use\n\n';
		$message2 .= 'Invitation Client Id: ' . pad_unpad_client_id($_GET['cid'],'pad') . '\n\n';
	
		
		
		
		
		
		
		
$mail             = new PHPMailer();

$body             = $message;
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = $setting['setting_smtp_host']; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = $setting['setting_smtp_host']; // sets the SMTP server
$mail->Port       = 26;                    // set the SMTP port for the GMAIL server
$mail->Username   = $setting['setting_smtp_account']; // SMTP account username
$mail->Password   = $setting['setting_smtp_password'];        // SMTP account password

$mail->SetFrom('webadmin@squareupuk.com', $setting['setting_company_name']);

$mail->AddReplyTo("noreply@squareupuk.com", $setting['setting_company_name']);

$mail->Subject    = $subject;

$mail->AltBody    = $message2; // optional, comment out and test

$mail->MsgHTML($body);

$address = $to;
$mail->AddAddress($address, $name);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

		


}





if ($_GET['do_what'] == 'custom_email_test') {
	
	$to = $setting['setting_email_test'];
	
	$subject = $email_text['email_subject'];
	
	$message = '<html><body>';
	$message .= $setting['setting_email_template_top'];
	$message .= 'Dear "Test Email",<br><br>' . $_GET['emid'];
	$message .= $email_text['email_text'];
	$message .= $setting['setting_email_template_bottom'];
	$message .= '</body></html>';	
	
	//echo $to . '---' . $subject . '---' . $message . '---' . $headers;
	echo mail('test@emotivationmedia.com', 'testqweqwe', 'messssssssss', 'From: support@squareupuk.com\r\nReply-To: support@squareupuk.com\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=ISO-8859-1') . '------<br>';
	echo 'after mail()';
	
	if (mail($to, $subject, $message, $headers)) {
		echo 'Test Email was Successfully Sent!';
	} else {
		//echo 'Test Email Error222!';	
	}	








} 

if ($_GET['do_what'] == 'custom_email') {
	

	
	$subject = $email_text['email_subject'];

	$sql3 = "SELECT * FROM email_list INNER JOIN customer ON email_list.user_id = customer.customer_id WHERE email_list.email_id = " . $_GET['emid'];
	$result3 = mysql_query($sql3);
	
	$suc_ctr = 0;
	$err_ctr = 0;
	while ($email_addy = mysql_fetch_array($result3)) {
	
		$to = $email_addy['email_list_recipient'];	

		$message = '<html><body>';
		$message .= $setting['setting_email_template_top'];
		$message .= 'Dear ' . $email_addy['customer_first_name'] . ' ' . $email_addy['customer_last_name'] . ',';
		$message .= $email_text['email_text'];
		$message .= $setting['setting_email_template_bottom'];
		$message .= '</body></html>';	
		
		if (mail($to, $subject, $message, $headers)) {
			$upd = "UPDATE email_list SET email_list_sent = 1 WHERE email_list_id = " . $email_addy['email_list_id'];
			$query = mysql_query($upd);
			$suc_ctr++;
		} else {
			$err_ctr++;	
		}		
	
	}

	echo $suc_ctr . ' Emails Successfully Sent<br>' . $err_ctr . ' Errors';
	
	
}



if ($_GET['do_what'] == 'purchase') {

		$sql6 = "SELECT * FROM myorder WHERE myorder_id = " . $_GET['emid'];
		$result6 = mysql_query($sql6);
		$myorder = mysql_fetch_array($result6);

		$sql7 = "SELECT * FROM customer WHERE customer_id = " . $myorder['customer_id'];
		$result7 = mysql_query($sql7);
		$customer = mysql_fetch_array($result7);

		$sql8 = "SELECT * FROM product WHERE product_id = " . $myorder['product_id'];
		$result8 = mysql_query($sql8);
		$prod = mysql_fetch_array($result8);

		$to = $setting['setting_email_admin'];
		
		$subject = 'A new subscription has been processed';
		
		$message = '<html><body>';
		$message .= $setting['setting_email_template_top'];
		$message .= '<strong>Order Details</strong><br /><br />';
		$message .= 'Customer: ' . $customer['customer_last_name'] . ', ' . $customer['customer_first_name'];
		$message .= '<br />Created On: ' . date('m/d/Y H:i:s');
		//$message .= '<br />Transaction id: ' . $myorder['myorder_confirmation_code'] . '<br /><br />';
		
		$message .= 'Subscription: ' . $prod['product_name'];
		$message .= '<br />Duration: ' . date('m/d/Y',strtotime($myorder['myorder_start_date'])) . ' - ' . date('m/d/Y',strtotime($myorder['myorder_end_date']));
		$message .= '<br />Total Cost: $' . $myorder['myorder_total'];
		
		if ($myorder['promotion_id'] != '') {
			$message .= ' --- using coupon with id ' . $myorder['promotion_id'] . ' and includes a discount of $' . $myorder['myorder_discount'];
		}

		$message .= $setting['setting_email_template_bottom'];
		$message .= '</body></html>';	
		
		mail($to, $subject, $message, $headers);
		
		
		
		$to = $customer['customer_email'];
		
		$subject = $setting['setting_email_purchase_subject'];
		
		$message = '<html><body>';
		$message .= $setting['setting_email_template_top'];
		$message .= 'Dear ' . $customer['customer_first_name'] . ' ' . $customer['customer_last_name'] . ',<br /><br />';
		$message .= $setting['setting_email_purchase_body'];
		$message .= '<strong>Order Details</strong><br /><br />';

		$message .= '<br />Order Date: ' . date('m/d/Y H:i:s');
		$message .= '<br />Transaction id: ' . $myorder['myorder_confirmation_code'] . '<br /><br />';
		
		$message .= 'Subscription: ' . $prod['product_name'];
		$message .= '<br />Duration: ' . date('m/d/Y',strtotime($myorder['myorder_start_date'])) . ' - ' . date('m/d/Y',strtotime($myorder['myorder_end_date']));
		$message .= '<br />Total Cost: $' . $myorder['myorder_total'];
		
		$message .= $setting['setting_email_template_bottom'];
		$message .= '</body></html>';	
		
		mail($to, $subject, $message, $headers);		
		
}
	
if ($_GET['do_what'] == 'message_notification') {
	

	$conid = $_GET['emid'];
		
	if ($_GET['who_do'] == 'to_adviser') {
		
		$sql88 = "SELECT * FROM consultation INNER JOIN user ON consultation.adviser_id = user.user_id WHERE consultation.consultation_id = " . $conid;
		$result88 = mysql_query($sql88);
		$rows88 = mysql_fetch_array($result88);			
		
		$to = $rows88['user_email'];
		$subject = 'One of your consultations has sent a reply/comment/question';
		$name = $rows88['user_first_name'];
	} else {
		
		$sql88 = "SELECT * FROM consultation INNER JOIN customer ON consultation.customer_id = customer.customer_id WHERE consultation.consultation_id = " . $conid;
		$result88 = mysql_query($sql88);
		$rows88 = mysql_fetch_array($result88);			
		
		
		$to = $rows88['customer_email'];
		$subject = 'AskMyBookkeeper.com: Your adviser has posted to your consultation';
	}		
	
	
	
	
	
	$message = '<html><body>';
	$message .= $setting['setting_email_template_top'];
	$message .= 'Dear ' . $name . ',<br><br>';
	$message .= 'Consulation #: ' . $conid . '<br><br>';
	$message .= 'There is a new posted message on the above open consultation that needs your attention. <br><br>';
	$message .= 'Sincerely, <br>Customer Service - AskMyBookkeeper.com<br><br>';
	$message .= $setting['setting_email_template_bottom'];
	$message .= '</body></html>';	
	
	if (mail($to, $subject, $message, $headers)) {
		//echo 'Message Email was Successfully Sent!' . '-' . $to . '-' . $subject . '-' . $message . '-';
	} else {
		//echo 'Message Email Error!';	
	}	
	
}



if ($_GET['do_what'] == 'pr_email') {
	
	$to = $_GET['who_do'];
	
	$subject = $setting['setting_email_password_reset_subject'];
	
	$message = '<html><body>';
	$message .= $setting['setting_email_template_top'];
	$message .= 'Dear "Client",<br><br>';
	$message .= $setting['setting_email_password_reset_body'] . '<br><br>';	
	$message .= '<a href="' . $_GET['lnk'] . '" >' . $_GET['lnk'] . '</a>';
	//$message .= $unsubscribe;
	$message .= $setting['setting_email_template_bottom'];
	$message .= '</body></html>';	
	
	if (mail($to, $subject, $message, $headers)) {
		echo 'Email was Successfully Sent!';
	} else {
		echo 'Email Error!';	
	}	
	
}

if ($_GET['do_what'] == 'decline_1' || $_GET['do_what'] == 'accept_1' || $_GET['do_what'] == 'decline_2' || $_GET['do_what'] == 'accept_2' || $_GET['do_what'] == 'decline_3' || $_GET['do_what'] == 'accept_3') {
	
	$end_date = date('d-m-Y', strtotime('+3 days'));
	
	if (GET['do_what'] == 'accept_1' || $_GET['do_what'] == 'accept_2' || $_GET['do_what'] == 'accept_3') {
		$extxt = 'SquareUp has generated a debt settlement offer for you, with repayment options, and you have a limited time to accept.';
	} else {
		$extxt = 'After filling out the Financial Evaluator you declined to allow us to look up your credit score. SquareUp would like to generate a debt settlement offer for you, with repayment options, and you have a limited time to accept. If you would like at this time to receive your settlement offer, return to ' .  . ' and login with the credentials we sent in a previous email. Then click the "Accept" link or button.';
	}
	
		
		$sql4 = "SELECT * FROM client WHERE client_id = " . $_GET['who_do'];
		$result4 = mysql_query($sql4);
		$client = mysql_fetch_array($result4);

		$to = $client['client_email'];
		
		$name = $client['client_first_name'] . ' ' . $client['client_last_name'];
		
		$subject = $setting['setting_email_offer_expires_subject'];
		
		$message = '<html><body>';
		$message .= $setting['setting_email_template_top'];
		$message .= 'Hello ' . $customer['client_first_name'] . '<br /><br />';
		$message .= $setting['setting_email_offer_expires_body'] . '<br /><br />';
		$message .= $extxt . '<br /><br />';
		$message .= 'You have until ' . $end_date . '.<br /><br />';
		$message .= 'Visit <a href="http://' . $setting['setting_url'] . '">' . $setting['setting_url'] . '</a><br /><br />';
		$message .= $setting['setting_email_template_bottom'];
		$message .= '</body></html>';	

		$message2 .= 'Hello ' . $customer['client_first_name'] . '\n\n';
		$message2 .= $setting['setting_email_offer_expires_body'] . '\n\n';
		$message2 .= 'Visit <a href="http://' . $setting['setting_url'] . '">' . $setting['setting_url'] . '</a>\n\n';
	
		
		
		
		
		
		
		
$mail             = new PHPMailer();

$body             = $message;
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = $setting['setting_smtp_host']; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = $setting['setting_smtp_host']; // sets the SMTP server
$mail->Port       = 26;                    // set the SMTP port for the GMAIL server
$mail->Username   = $setting['setting_smtp_account']; // SMTP account username
$mail->Password   = $setting['setting_smtp_password'];        // SMTP account password

$mail->SetFrom('webadmin@squareupuk.com', $setting['setting_company_name']);

$mail->AddReplyTo("noreply@squareupuk.com", $setting['setting_company_name']);

$mail->Subject    = $subject;

$mail->AltBody    = $message2; // optional, comment out and test

$mail->MsgHTML($body);

$address = $to;
$mail->AddAddress($address, $name);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo $_GET['do_what'] . "Mailer Error: " . $mail->ErrorInfo;
} else {
	
	if (GET['do_what'] == 'accept_1' || $_GET['do_what'] == 'accept_2' || $_GET['do_what'] == 'accept_3') {
		$what_field = 'client_accepted_email_sent';
		$what_num = str_replace('accept_','',$_GET['do_what']);
	} else {
		$what_field = 'client_declined_email_sent';
		$what_num = str_replace('decline_','',$_GET['do_what']);
	}
	
	$upd = "UPDATE client SET " . $what_field . " = " . $what_num . " 
								WHERE client_id = " . $_REQUEST['cid'];
	
	$query = mysql_query($upd);	
	
  echo $_GET['do_what'] . "Message sent!";
}

		


}
*/
?>
