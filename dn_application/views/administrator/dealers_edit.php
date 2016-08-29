
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Dealers</a></li>
            <li>/</li>
            <li class="current">Edit Dealers</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>Dealers - Edit</h2>
            </div>
            <div class="contentbox">
            	
            	<form action="index.php?/administrator/dealers_list" name="form_dealers" id="form_dealers" method="post" autocomplete="off">
                	<p id="errmes" class="red"></p>


            		<p>
                        <label for="dealer_first_name"><strong>First Name:</strong></label>
                        <input type="text" id="dealer_first_name" name="dealer_first_name" class="inputbox" value="<?=$dealer['dealer_first_name'] ?>" /> 
                    </p>
                    
            		<p>
                        <label for="dealer_last_name"><strong>Last Name:</strong></label>
                        <input type="text" id="dealer_last_name" name="dealer_last_name" class="inputbox" value="<?=$dealer['dealer_last_name'] ?>"  /> 
                    </p>
               
            		<p>
                        <label for="dealer_company"><strong>Company:</strong></label>
                        <input type="text" id="dealer_company" name="dealer_company" class="inputbox" value="<?=$dealer['dealer_company'] ?>"  /> 
                    </p>

            		<p>
                        <label for="dealer_address1"><strong>Address 1:</strong></label>
                        <input type="text" id="dealer_address1" name="dealer_address1" class="inputbox" value="<?=$dealer['dealer_address1'] ?>"  /> 
                    </p>
                    
            		<p>
                        <label for="dealer_address2"><strong>Address 2:</strong></label>
                        <input type="text" id="dealer_address2" name="dealer_address2" class="inputbox" value="<?=$dealer['dealer_address2'] ?>"  /> 
                        <!--br />
                        <span class="smltxt">(Not Required)</span-->
                    </p>

            		<p>
                        <label for="dealer_city"><strong>City:</strong></label>
                        <input type="text" id="dealer_city" name="dealer_city" class="inputbox" value="<?=$dealer['dealer_city'] ?>"  /> 
                    </p>

            		<p>
                        <label for="dealer_state"><strong>State:</strong></label>
                        <select type="text" id="dealer_state" name="dealer_state"  >
                        		<option value="AL">AL</option>
                                <option value="AK">AK</option>
                                <option value="AZ">AZ</option>
                                <option value="AR">AR</option>
                                <option value="CA">CA</option>
                                <option value="CO">CO</option>
                                <option value="CT">CT</option>
                                <option value="DE">DE</option>
                                <option value="DC">DC</option>
                                <option value="FL">FL</option>
                                <option value="GA">GA</option>
                                <option value="HI">HI</option>
                                <option value="ID">ID</option>
                                <option value="IL">IL</option>
                                <option value="IN">IN</option>
                                <option value="IA">IA</option>
                                <option value="KS">KS</option>
                                <option value="KY">KY</option>
                                <option value="LA">LA</option>
                                <option value="ME">ME</option>
                                <option value="MD">MD</option>
                                <option value="MA">MA</option>
                                <option value="MI">MI</option>
                                <option value="MN">MN</option>
                                <option value="MS">MS</option>
                                <option value="MO">MO</option>
                                <option value="MT">MT</option>
                                <option value="NE">NE</option>
                                <option value="NV">NV</option>
                                <option value="NH">NH</option>
                                <option value="NJ">NJ</option>
                                <option value="NM">NM</option>
                                <option value="NY">NY</option>
                                <option value="NC">NC</option>
                                <option value="ND">ND</option>
                                <option value="OH">OH</option>
                                <option value="OK">OK</option>
                                <option value="OR">OR</option>
                                <option value="PA">PA</option>
                                <option value="RI">RI</option>
                                <option value="SC">SC</option>
                                <option value="SD">SD</option>
                                <option value="TN">TN</option>
                                <option value="TX">TX</option>
                                <option value="UT">UT</option>
                                <option value="VT">VT</option>
                                <option value="VA">VA</option>
                                <option value="WA">WA</option>
                                <option value="WV">WV</option>
                                <option value="WI">WI</option>
                                <option value="WY">WY</option>
                        </select>
                        
                    </p>            
<script>
dstate = '<?=$dealer['dealer_state'] ?>';

if (dstate != '') {
	document.getElementById('dealer_state').value = dstate;
}
</script>
            		<p>
                        <label for="dealer_zip"><strong>Zip Code:</strong></label>
                        <input type="text" id="dealer_zip" name="dealer_zip" class="inputbox inputboxsm" value="<?=$dealer['dealer_zip'] ?>"  /> 
                    </p>
                    
            		<p>
                        <label for="dealer_phone"><strong>Phone:</strong></label>
                        <input type="text" id="dealer_phone" name="dealer_phone" class="inputbox inputboxsm" value="<?=$dealer['dealer_phone'] ?>"  /> 
                        
                    </p> 
                   
            		<p>
                        <label for="user_email"><strong>Email:</strong></label>

                        <input type="text" id="user_email" name="user_email" class="inputbox"  onblur=" if (this.value != document.getElementById('user_email_h').value) { check_for_dups(this.value,'<?=base_url() ?>js/ajax/check_for_dups.php','users_submit'); }" value="<?=$dealer['dealer_email'] ?>" />
                        <input id="user_email_h" name="user_email_h" type="hidden" value="<?=$dealer['dealer_email'] ?>" />                        
                         <br />
                        <span class="smltxt">(Email Address is used as login username)</span>
                        <br />
                        <span id="is_dup" class="red"></span>

                    </p>                    
<br />
<br />
<div class="spacer"></div>
<br />
            		<p>
                        <label for="dealer_tax_rate"><strong>Tax Rate:<span class="sm_txt"> * (percentage as decimal)</span></strong></label>
                        <input type="text" id="dealer_tax_rate" name="dealer_tax_rate" class="inputbox inputboxsm" value="<?=$dealer['dealer_tax_rate'] ?>" /> 
                    </p>
            		<p>
                        <label for="dealer_title_fee"><strong>Title Fee:<span class="sm_txt"> *</span></strong></label>
                        $<input type="text" id="dealer_title_fee" name="dealer_title_fee" class="inputbox inputboxsm" value="<?=$dealer['dealer_title_fee'] ?>" /> 
                    </p>                    
            		<p>
                        <label for="dealer_doc_fee"><strong>Doc Fee:<span class="sm_txt"> *</span></strong></label>
                        $<input type="text" id="dealer_doc_fee" name="dealer_doc_fee" class="inputbox inputboxsm" value="<?=$dealer['dealer_doc_fee'] ?>" /> 
                    </p> 

					<input id="dealers_submit" name="dealers_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_dealer('edit');">
                    <input name="act" type="hidden" value="edit" />
                    <input name="did" type="hidden" value="<?=$dealer['dealer_id'] ?>" />
                    <input name="uid" type="hidden" value="<?=$dealer['user_id'] ?>" />
                    <input name="dealers_status" type="hidden" value="" />
                    <input name="dealers_level" type="hidden" value="" />
                    <input name="bad_email" id="bad_email" type="hidden" value="0" />
                </form>        
                

                
                
                
                
            </div>
        </div>
        <!-- Content Box End -->

 