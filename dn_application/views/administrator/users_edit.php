
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator's</a></li>
            <li>/</li>
            <li class="current">Edit Administrator Users</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>Administrator Users - Edit</h2>
            </div>
            <div class="contentbox">
            	
            	<form action="index.php?/administrator/users_list" name="form_users" id="form_users" method="post" autocomplete="off">
                	<p id="errmes" class="red"></p>
            		<p>
                        <label for="user_first_name"><strong>First Name:</strong></label>
                        <input type="text" id="user_first_name" name="user_first_name" class="inputbox" value="<?=$user['user_first_name'] ?>" /> 
                        
                    </p>
            		<p>
                        <label for="user_last_name"><strong>Last Name:</strong></label>
                        <input type="text" id="user_last_name" name="user_last_name" class="inputbox" value="<?=$user['user_last_name'] ?>" /> 
                        
                        
                    </p>                    
            		<p>
                        <label for="user_email"><strong>Email:</strong></label>
                        <input type="text" id="user_email" name="user_email" class="inputbox"  onblur=" if (this.value != document.getElementById('user_email_h').value) { check_for_dups(this.value,'<?=base_url() ?>js/ajax/check_for_dups.php','users_submit'); }" value="<?=$user['user_email'] ?>" />
                        <input id="user_email_h" name="user_email_h" type="hidden" value="<?=$user['user_email'] ?>" />
                         <br />
                        <span class="smltxt">(Email Address is used as login username)</span>
                        <br />
                        <span id="is_dup" class="red"></span>

                    </p>                    

<div class="spacer"></div>
<h2>Password Reset</h2>
<p>Password cannot be recovered only reset. Leave blank to keep old password.</p>                     
                    
            		<p>
                        <label for="user_password"><strong>Password:</strong></label>
                        <input type="password" id="user_password" name="user_password" class="inputbox" onkeyup="check_password();" value="" />
                        
                    </p>
            		<p>
                        <label for="user_passwordc"><strong>Repeat Password:</strong></label>
                        <input type="password" id="user_passwordc" name="user_passwordc" class="inputbox" onkeyup="check_password();" value="" /> 
                        <br />
                        <span id="pw_mes" class="smltxt red"></span>
                    </p>

					<input id="users_submit" name="users_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_users('edit');">
                    <input name="act" type="hidden" value="edit" />
                    <input name="uid" type="hidden" value="<?=$user['user_id'] ?>" />
                    <input name="bad_email" id="bad_email" type="hidden" value="0" />
                    <input name="bad_password" id="bad_password" type="hidden" value="0" />
                </form>                
                
                

                
                
                
                
            </div>
        </div>
        <!-- Content Box End -->

 