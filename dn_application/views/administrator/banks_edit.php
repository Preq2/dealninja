
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Banks</a></li>
            <li>/</li>
            <li class="current">Edit Banks</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>Banks - Edit</h2>
            </div>
            <div class="contentbox">
            	<div style="sm_txt">* Required</div>
            	<form action="index.php?/administrator/banks_list" name="form_banks" id="form_banks" method="post" autocomplete="off">
                	<p id="errmes" class="red"></p>


            		<p>
                        <label for="bank_name"><strong>Name:<span class="sm_txt"> *</span></strong></label>
                        <input type="text" id="bank_name" name="bank_name" class="inputbox" value="<?=$bank['bank_name'] ?>" /> 
                    </p>

            		<p>
                        <label for="bank_address1"><strong>Address 1:</strong></label>
                        <input type="text" id="bank_address1" name="bank_address1" class="inputbox" value="<?=$bank['bank_address1'] ?>"  /> 
                    </p>
                    
            		<p>
                        <label for="bank_address2"><strong>Address 2:</strong></label>
                        <input type="text" id="bank_address2" name="bank_address2" class="inputbox" value="<?=$bank['bank_address2'] ?>"  /> 
                        <!--br />
                        <span class="smltxt">(Not Required)</span-->
                    </p>

            		<p>
                        <label for="bank_city"><strong>City:<span class="sm_txt"> *</span></strong></label>
                        <input type="text" id="bank_city" name="bank_city" class="inputbox" value="<?=$bank['bank_city'] ?>"  /> 
                    </p>

            		<p>
                        <label for="bank_state"><strong>State:<span class="sm_txt"> *</span></strong></label>
                        <select type="text" id="bank_state" name="bank_state"  >
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
bstate = '<?=$bank['bank_state'] ?>';

if (bstate != '') {
	document.getElementById('bank_state').value = bstate;
}
</script>                    
            		<p>
                        <label for="bank_zip"><strong>Zip Code:</strong></label>
                        <input type="text" id="bank_zip" name="bank_zip" class="inputbox inputboxsm" value="<?=$bank['bank_zip'] ?>"  /> 
                    </p>
                    
            		<p>
                        <label for="bank_phone"><strong>Phone:</strong></label>
                        <input type="text" id="bank_phone" name="bank_phone" class="inputbox inputboxsm" value="<?=$bank['bank_phone'] ?>"  /> 
                        
                    </p> 
                    
            		<p>
                        <label for="bank_email"><strong>Email:</strong></label>
                        <input type="text" id="bank_email" name="bank_email" class="inputbox" value="<?=$bank['bank_email'] ?>"  /> 
                        
                    </p> 
                    
            		<p>
                        <label for="bank_url"><strong>Website:</strong></label>
                        <input type="text" id="bank_url" name="bank_url" class="inputbox" value="<?=$bank['bank_url'] ?>"  /> 
                        
                    </p> 

					<input id="banks_submit" name="banks_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_bank('edit');">
                    <input name="act" type="hidden" value="edit" />
                    <input name="bid" type="hidden" value="<?=$bank['bank_id'] ?>" />

                </form>  
                
                
            </div>
        </div>
        <!-- Content Box End -->

 