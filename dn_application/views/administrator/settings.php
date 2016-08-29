
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator</a></li>
            <li>/</li>
            <li class="current">Edit System Configuration</li>
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
                <h2>System Configuration - Edit</h2>
            </div>
            <div class="contentbox">
            	
            	<form action="index.php?/administrator/settings" name="form_settings" id="form_settings" method="post">
                	<p id="errmes" class="red"></p>
                    
                    <h2>General</h2>
                    <div class="spacer"></div>
            		<p>
                        <label for="setting_company_name"><strong>Website Name:</strong></label>
                        <input type="text" id="setting_company_name" name="setting_company_name" class="inputbox" value="<?=$settings['setting_company_name'] ?>" /> 
                        
                    </p>
            		<p>
                        <label for="setting_url"><strong>Application URL:</strong></label>
                        <input type="text" id="setting_url" name="setting_url" class="inputbox" value="<?=$settings['setting_url'] ?>" /> 
                        
                    </p>                    
            		<p>
                        <label for="setting_email_support"><strong>Support Email Address:</strong></label>
                        <input type="text" id="setting_email_support" name="setting_email_support" class="inputbox" value="<?=$settings['setting_email_support'] ?>" /> 
                        
                        
                    </p>   
            		<p>
                        <label for="setting_phone_support"><strong>Support Phone Number:</strong></label>
                        <input type="text" id="setting_phone_support" name="setting_phone_support" class="inputbox" value="<?=$settings['setting_phone_support'] ?>" /> 
                        
                        
                    </p>
            		<p>
                        <label for="setting_email_admin"><strong>Admin Email Address:</strong></label>
                        <input type="text" id="setting_email_admin" name="setting_email_admin" class="inputbox" value="<?=$settings['setting_email_admin'] ?>" /> 
                        
                        
                    </p>   
            		<p>
                        <label for="setting_email_test"><strong>Test Email Address:</strong></label>
                        <input type="text" id="setting_email_test" name="setting_email_test" class="inputbox" value="<?=$settings['setting_email_test'] ?>" /> 
                        
                        
                    </p>
					<input id="settings_submit" name="settings_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_settings('edit');">                    
<br />
<br />
<br />
<br />
<br />
<br />


                    
                    <h2>Email Templates</h2> 
                    <div class="spacer"></div>
                    
                    <p><span class="smltxt">The system sends HTML emails which allow for inclusion of your logo and styling for branding purposes. </span> </p>
                    <p><span class="smltxt">The Email Template Top and Bottom add a header and footer to your email, are coded in HTML, and should only be edited by a web professional. </span> </p>
                    
                    
                    
                    
<br />
<br />
                                                        
            		<p>
                        <label for="setting_email_template_top"><strong>Email Template Top:</strong></label>
                        <textarea class="norm_textarea" id="setting_email_template_top" name="setting_email_template_top" rows="10" cols="75"><?=$settings['setting_email_template_top'] ?></textarea>
                                               
                    </p>                    
            		<p>
                        <label for="setting_email_template_bottom"><strong>Email Template Bottom:</strong></label>
                        <textarea class="norm_textarea" id="setting_email_template_bottom" name="setting_email_template_bottom" rows="10" cols="75"><?=$settings['setting_email_template_bottom'] ?></textarea>
                        
                        
                    </p> 
					<input id="settings_submit" name="settings_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_settings('edit');">                    
<br />
<br />
<br />
<br />
<br />
<br />
                    <h2>Email: System Generated</h2> 
                    <div class="spacer"></div>  
                    <span class="smltxt">(You have the option to edit the subject and include a message on some of the system's auto-generate emails. Do NOT leave subjects blank. Some of these emails also contain additional information such as salutations and account info like usernames and passwords. This text contains variables and is necessarily hard-wired and can only be edited by the developer. )</span>                   
<br />
<br />
<br />
                   
                    
            		<!--p>
                        <label for="setting_email_welcome_subject"><strong>Invite/Welcome Subject:</strong></label>
                        <input type="text" id="setting_email_welcome_subject" name="setting_email_welcome_subject" class="inputbox" value="" />
                    </p> 
            		<p>
                        <label for="setting_email_welcome_body"><strong>Invite/Welcome Body:</strong></label>
                        <textarea class="custom_email_body" id="setting_email_welcome_body" name="setting_email_welcome_body" rows="10" cols="75"></textarea> 
                        
                    </p> 
<br /-->
                    <input name="setting_email_welcome_subject" type="hidden" value="xxx" />
                    <input name="setting_email_welcome_body" type="hidden" value="xxx" />
            		<p>
                        <label for="setting_email_password_reset_subject"><strong>Password Reset Subject:</strong></label>
                        <input type="text" id="setting_email_password_reset_subject" name="setting_email_password_reset_subject" class="inputbox" value="<?=$settings['setting_email_password_reset_subject'] ?>" />
                          

                    </p> 
            		<p>
                        <label for="setting_email_password_reset_body"><strong>Password Reset Body:</strong></label>
                        <textarea class="custom_email_body" id="setting_email_password_reset_body" name="setting_email_password_reset_body" rows="10" cols="75"><?=$settings['setting_email_password_reset_body'] ?></textarea> 
                        
                    </p>


					<input id="settings_submit" name="settings_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_settings('edit');">
                    <input name="act" type="hidden" value="edit" />

                </form>                
                
                

                
                
                
                
            </div>
        </div>
        <!-- Content Box End -->

 