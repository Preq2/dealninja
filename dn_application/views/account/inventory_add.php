
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Inventory</a></li>
            <li>/</li>
            <li class="current">Add Inventory</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>Inventory - Add New</h2>
            </div>
            <div class="contentbox">
            	<div class="sm_txt">All Field Required</div>
            	<form action="index.php?/administrator/inventory_list" name="form_inventory" id="form_inventory" method="post" autocomplete="off">
                	<p id="errmes" class="red"></p>


            		<p>
                        <label for="inventory_name"><strong>Name:<span class="sm_txt"> (friendly name)</span></strong></label>
                        <input type="text" id="inventory_name" name="inventory_name" class="inputbox" value="" /> 
                    </p>

            		<p>
                        <label for="inventory_nada"><strong>NADA:</strong></label>
                        <input type="text" id="inventory_nada" name="inventory_nada" class="inputbox" value=""  /> 
                    </p>
                    
            		<p>
                        <label for="inventory_stk"><strong>STK:</strong></label>
                        <input type="text" id="inventory_stk" name="inventory_stk" class="inputbox inputboxsm" value=""  /> 
                        
                    </p>                    
            		<p>
                        <label for="inventory_make"><strong>Make:</strong></label>
                        <input type="text" id="inventory_make" name="inventory_make" class="inputbox" value=""  /> 
                        <!--br />
                        <span class="smltxt">(Not Required)</span-->
                    </p>

            		<p>
                        <label for="inventory_model"><strong>Model:</strong></label>
                        <input type="text" id="inventory_model" name="inventory_model" class="inputbox" value=""  /> 
                    </p>

                  
            		<p>
                        <label for="inventory_year"><strong>Year:</strong></label>
                        <input type="text" id="inventory_year" name="inventory_year" class="inputbox inputboxsm" value="" /> 
                    </p>

                    
            		<p>
                        <label for="inventory_odometer"><strong>Odometer:</strong></label>
                        <input type="text" id="inventory_odometer" name="inventory_odometer" class="inputbox" value=""  /> 
                        
                    </p> 
            		<p>
                        <label for="inventory_age"><strong>Age:</strong></label>
                        <input type="text" id="inventory_age" name="inventory_age" class="inputbox inputboxsm" value="" /> 
                    </p>                    
            		<p>
                        <label for="inventory_cost"><strong>Cost:</strong></label>
                        <input type="text" id="inventory_cost" name="inventory_cost" class="inputbox" value=""  /> 
                        
                    </p> 

					<input id="inventory_submit" name="inventory_submit" type="button" value="  Add  " class="btn_fi" onClick="val_inventory('add');">
                    <input name="act" type="hidden" value="add" />
                    <input name="inventory_age" type="hidden" value="" />
                    <input name="did" type="hidden" value="<?=$did ?>" />

                </form>  

              
                
            </div>
        </div>
        <!-- Content Box End -->                

        
        </div>
        </div>
 