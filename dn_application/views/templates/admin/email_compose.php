<?
include_once('js/ajax/connect.php');

/*
foreach ($_POST['cb_email_customers'] as $val) {
	echo $val . "<br>";
}
*/
//echo 'email id = ' . '<br>';
//echo 'which = ' . $which . '<br>';

if (isset($_POST['emid'])) {
	//echo '---------------------------------------------------------<br>' . $_POST['emid'];
	$email_subject = $_POST['email_subject'];
	$email_text = $_POST['email_text'];
	//echo $email_subject  . '---<br>';
	//echo $email_text  . '---<br>';	
	$upd = "UPDATE email SET
							email_subject = '" . mysql_real_escape_string($email_subject) . "',
							email_text = '" . mysql_real_escape_string($email_text) . "'
							WHERE email_id = " . $_POST['emid'];
	$query = mysql_query($upd);
	
	if ($_POST['is_test'] == 1) {
		$do_what = 'custom_email_test';
	} else {
		$do_what = 'custom_email';		
	}
	
	
?>
<script>

do_email_ajax('<?=$do_what ?>',<?=$_POST['emid'] ?>,0);

</script>

<?	
	
} else {
	//echo 'not herere';
	$email_subject = '';
	$email_text = '';	
}
?>



    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator</a></li>
            <li>/</li>
            <li class="current">Compose Email</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside">
  
<? if ($suc_mes != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes ?></p>
        </div>
<? } ?>    
    
        <!-- Content Box Start -->
        <div class="contentcontainer med left">
            <div class="headings alt">
                <h2>Compose Your Email</h2>
            </div>
            <div class="contentbox">
            
            
                <form action="<?=base_url() ?>index.php?/administrator/email_compose" method="post" name="form_email_custom" id="form_email_custom">
              
                
                
                <p>
                <label for="email_subject"><strong>subject:</strong></label>
                <input id="email_subject" name="email_subject" class="inputbox" type="text" value="<?=$email_subject ?>" />
                </p>
                <p>
                <label for="email_text"><strong>message:</strong></label>
                <textarea name="email_text" id="email_text" class="custom_email_body" style="width: 400px; height: 200px;"><?=$email_text ?></textarea>
                </p>

                <input name="is_test" id="is_test" type="hidden" value="" />
                <input name="emid" type="hidden" value="<?=$emid ?>" />
                
                <input id="email_test_submit" name="email_test_submit" type="button" value=" send test email " onClick="val_email_test(1);" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="email_submit" name="email_submit" type="button" value=" send email " onClick="val_email_test(0);" class="btn">

                
                
                
                </form>            
            
            
            
                
                
            </div>
        </div>
        <!-- Content Box End -->



