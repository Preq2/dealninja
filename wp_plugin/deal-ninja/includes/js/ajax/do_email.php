<?
include_once('_connect.php');
include_once('../../includes/functions.php');

require_once('../../gw_application/libraries/phpmailer/class.phpmailer.php');
include("../../gw_application/libraries/phpmailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$sql = "SELECT * FROM setting WHERE setting_id = 1";
$result = mysql_query($sql);
$setting = mysql_fetch_array($result);

$sql8 = "SELECT * FROM client WHERE client_id = " . $_GET['who_do'];
$result8 = mysql_query($sql8);
//$client = mysql_fetch_array($result8);

if ($_GET['emid'] != 0) {
	$sql2 = "SELECT * FROM email WHERE email_id = " . $_GET['emid'];
	$result2 = mysql_query($sql2);
	$email_text = mysql_fetch_array($result2);	
}

if ($_GET['do_what'] == 'pr_email') {
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: support@ilsainc.com\r\n";
	$headers .= "Reply-To: support@ilsainc.com\r\n";
	$headers .= "Return-Path: support@ilsainc.com\r\n";	
	
	$to = $_GET['who_do'];
	
	$subject = $setting['setting_email_password_reset_subject'];
	
	$message = '<html><body>';
	$message .= $setting['setting_email_template_top'];
	$message .= 'Dear "Client Gateway User",<br><br>';
	$message .= $setting['setting_email_password_reset_body'] . '<br><br>';	
	$message .= '<a href="' . $_GET['reset_link'] . '" >' . $_GET['reset_link'] . '</a>' . '<br><br>';
	$message .= 'If you need any assistance please contact <a href="http://www.ilsainc.com/contact-ilsa" >ILSA Customer Support</a>.<br><br>';

	$message .= $setting['setting_email_template_bottom'];
	$message .= '</body></html>';	
	
	if (mail($to, $subject, $message, $headers)) {
		echo 1;
	} else {
		echo 0;	
	}	
	//echo $to . ' - ' . $subject . ' - ' . $message . ' - ' . $headers;
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

	$sql3 = "SELECT * FROM email_list INNER JOIN client ON email_list.user_id = client.client_id WHERE email_list.email_id = " . $_GET['emid'];
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





?>
