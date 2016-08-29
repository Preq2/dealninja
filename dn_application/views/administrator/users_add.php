
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator's</a></li>
            <li>/</li>
            <li class="current">Add Administrator Users</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>Administrator Users - Add New</h2>
            </div>
            <div class="contentbox">
            	
            	<form action="index.php?/administrator/users_list" name="form_users" id="form_users" method="post" autocomplete="off">
                	<p id="errmes" class="red"></p>
            		<p>
                        <label for="user_first_name"><strong>First Name:</strong></label>
                        <input type="text" id="user_first_name" name="user_first_name" class="inputbox" /> 
                        
                    </p>
            		<p>
                        <label for="user_last_name"><strong>Last Name:</strong></label>
                        <input type="text" id="user_last_name" name="user_last_name" class="inputbox" /> 
                        
                        
                    </p>                    
            		<p>
                        <label for="user_email"><strong>Email:</strong></label>
                        <input type="text" id="user_email" name="user_email" class="inputbox" onblur="check_for_dups(this.value,'<?=base_url() ?>js/ajax/check_for_dups.php','users_submit')" />
                         <br />
                        <span class="smltxt">(Email Address is used as login username)</span>
                        <br />
                        <span id="is_dup" class="red"></span>

                    </p>                    
                    
                    
            		<p>
                        <label for="any_password"><strong>Password:</strong></label>
                        <input type="password" id="any_password" name="any_password" class="inputbox" onkeyup="check_password();" />
                        
                    </p>
            		<p>
                        <label for="any_passwordc"><strong>Repeat Password:</strong></label>
                        <input type="password" id="any_passwordc" name="any_passwordc" class="inputbox" onkeyup="check_password();" /> 
                        <br />
                        <span id="pw_mes" class="smltxt red"></span>
                    </p>

					<input id="users_submit" name="users_submit" type="button" value="  Add  " class="btn_fi" onClick="val_users('add');">
                    <input name="act" type="hidden" value="add" />
                    <input name="bad_email" id="bad_email" type="hidden" value="1" />
                    <input name="bad_password" id="bad_password" type="hidden" value="1" />
                </form>                
                
                

                
                
                
                
            </div>
        </div>
        <!-- Content Box End -->

 