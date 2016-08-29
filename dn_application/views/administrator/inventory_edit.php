
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">inventory</a></li>
            <li>/</li>
            <li class="current">Edit inventory</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>inventory - Edit</h2>
            </div>
            <div class="contentbox">
            	<div class="sm_txt">All Fields Required</div>
            	<form action="index.php?/administrator/inventory_list/<?=$inventory['dealer_id'] ?>" name="form_inventory" id="form_inventory" method="post" autocomplete="off">
                	<p id="errmes" class="red"></p>


            		<p>
                        <label for="inventory_name"><strong>Name:<span class="sm_txt">&nbsp;&nbsp;(friendly name)</span></strong></label>
                        <input type="text" id="inventory_name" name="inventory_name" class="inputbox" value="<?=$inventory['inventory_name'] ?>" /> 
                    </p>

            		<p>
                        <label for="inventory_nada"><strong>NADA:</strong></label>
                        <input type="text" id="inventory_nada" name="inventory_nada" class="inputbox" value="<?=$inventory['inventory_nada'] ?>"  /> 
                    </p>
                    
            		<p>
                        <label for="inventory_stk"><strong>STK:</strong></label>
                        <input type="text" id="inventory_stk" name="inventory_stk" class="inputbox inputboxsm" value="<?=$inventory['inventory_stk'] ?>"  /> 
                        
                    </p>                    
            		<p>
                        <label for="inventory_make"><strong>Make:</strong></label>
                        <input type="text" id="inventory_make" name="inventory_make" class="inputbox" value="<?=$inventory['inventory_make'] ?>"  /> 
                        <!--br />
                        <span class="smltxt">(Not Required)</span-->
                    </p>

            		<p>
                        <label for="inventory_model"><strong>Model:</strong></label>
                        <input type="text" id="inventory_model" name="inventory_model" class="inputbox" value="<?=$inventory['inventory_model'] ?>"  /> 
                    </p>

                  
            		<p>
                        <label for="inventory_year"><strong>Year:</strong></label>
                        <input type="text" id="inventory_year" name="inventory_year" class="inputbox inputboxsm" value="<?=$inventory['inventory_year'] ?>"  /> 
                    </p>

                    
            		<p>
                        <label for="inventory_odometer"><strong>Odometer:</strong></label>
                        <input type="text" id="inventory_odometer" name="inventory_odometer" class="inputbox" value="<?=$inventory['inventory_odometer'] ?>"  /> 
                        
                    </p> 
            		<p>
                        <label for="inventory_age"><strong>Age:</strong></label>
                        <input type="text" id="inventory_age" name="inventory_age" class="inputbox inputboxsm" value="<?=$inventory['inventory_age'] ?>"/> 
                    </p>                         
            		<p>
                        <label for="inventory_cost"><strong>Cost:</strong></label>
                        <input type="text" id="inventory_cost" name="inventory_cost" class="inputbox" value="<?=$inventory['inventory_cost'] ?>"  /> 
                        
                    </p> 

					<input id="inventory_submit" name="inventory_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_inventory('edit');">
                    <input name="act" type="hidden" value="edit" />
                    <input name="iid" type="hidden" value="<?=$inventory['inventory_id'] ?>" />

                </form>  
               
                
            </div>
        </div>
        <!-- Content Box End -->

 