




  <body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php?/home#first"><i class="icon_logo"><img src="<?=base_url() ?>images/icon_logo.png" /></i> DealNinja</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="index.php?/home#one">Intro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php?/home#two">Features</a>
                    </li>                    
                    <li>
                        <a class="page-scroll" href="index.php?/home#three">Plans</a>
                    </li>
                    <!--li>
                        <a class="page-scroll" href="#four">Gallery</a>
                    </li-->

                    <li>
                        <a class="page-scroll" href="index.php?/home#last">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" data-toggle="modal" title="A free Bootstrap video landing theme" href="index.php?/home#aboutModal">About</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>

    
    <section class="bg-primary" id="one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center" style="background:#1d1d1d;">
                <br>
<br>
<br>

                    <h2 class="text-center">Password Recovery</h2>
                    <h5 class="text-center">
                        Your Username is the email address you used when you registered your account.
                         To have your password sent to that email address, please enter below.
                    </h5>
                    <div class="col-lg-10 col-lg-offset-1 text-center" style="margin-bottom: 40px;">


<? if ($suc_mes != '') { ?>
        <div class="status success" style="color:#619917;">

        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes ?></p>
        </div>
<? } ?> 
<? if ($err_mes != '') { ?>
        <div class="status error" style="color:#3d3333;">

        	<p><img src="./images/icons/icon_error.png" alt="Error" /><span>Error!</span> <?=$err_mes ?></p>
        </div>
<? } ?>         

<? if ($view_state == 1) { ?>
            	<form action="index.php?/login/password_recovery" name="form_password_recovery_email"
                 id="form_password_recovery_email" method="post">

<br />


                            <div class="col-md-12">
                                <label></label>
                                <input type="text" class="form-control" placeholder="Enter Account Email" id="pr_email" name="pr_email">
                            </div>

                            <div class="col-md-4 col-md-offset-4">
                                <label></label>
                                <button type="button" id="pr_submit" name="pr_submit" class="btn btn-primary btn-block btn-lg" onClick="val_password_recovery('email');">Send <i class="ion-android-arrow-forward"></i></button>
                            </div>
                            
                            <div style="clear:both;"></div>
<br />

                    <input name="act" id="act" type="hidden" value="send_pr_email" />
                </form>
<? } ?>

<? if ($view_state == 2) { 

$reset_link = '';
$reset_link .= base_url() . 'index.php?/login/password_recovery/' . $token;


?>

<p>Check your email for instructions on completing your password reset.</p>

<script>

	do_email('pr_email',0,'<?=$email ?>','<?=$reset_link?>');

</script>
<? } ?>

<? if ($view_state == 3) { ?>

            	<form action="index.php?/login/password_recovery" name="form_password_recovery_reset" id="form_password_recovery_reset" method="post">
                <p>Your Username is the email address you used when you registered your account. 
                    To have your password sent to that email address, please enter below.</p>
 <br />
               
                	<p id="errmes2" class="red"></p>
            		<p>
                        <label for="any_password"><strong>New Password:</strong></label>
                        <input type="password" id="any_password" name="any_password" class="inputbox" onKeyUp="check_password();" value="" />
                        
                    </p>
<br />
                    
            		<p>
                        <label for="any_passwordc"><strong>Repeat New Password:</strong></label>
                        <input type="password" id="any_passwordc" name="any_passwordc" class="inputbox" onKeyUp="check_password();" value="" /> 
                        <br />
                        <span id="pw_mes" class="smltxt red"></span>
                    </p>
<br />


      				<input type="button" value="Submit" id="pr_submit" class="btn_fi" onClick="val_password_recovery('reset');" />
                    <input name="act" id="act" type="hidden" value="reset_password" />
                    <input name="uid" id="uid" type="hidden" value="<?=$uid ?>" />
                    <input name="token" id="token" type="hidden" value="<?=$token ?>" />
                    <input name="bad_password" id="bad_password" type="hidden" value="1" />
                </form>
<? } ?> 

<? if ($view_state == 4) { ?>

<p>Go <a href="index.php?/login">HERE</a> to Login to your account with your new password.</p>

<? } ?>
        
<br />

 

<br />
<div>
<p>Still need assistance logging in?<br /><a href="index.php?/home#last">Contact customer support.</a></p>
</div> 

                    </div>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

                </div>
               
            </div>
        </div>
    </section>










<script>
function check_password() {


		if (document.getElementById('any_password').value == document.getElementById('any_password').value) {
			document.getElementById('any_password').className = 'inputbox';																		   
			document.getElementById('pw_mes').innerHTML = '';
			document.getElementById('bad_password').value = 0;			
		} else {
			
			
			document.getElementById('any_password').className = 'inputbox error_fi';																	   
			document.getElementById('pw_mes').innerHTML = 'Passwords do not match!';
			document.getElementById('pw_mes2').innerHTML = 'Passwords do not match!';
			document.getElementById('bad_password').value = 1;			
		}		

	
}


</script>




