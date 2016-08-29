
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
                        <input type="text" id="inventory_year" name="inventory_year" class="inputbox inputboxsm" value=""/> 
                    </p>

                    
            		<p>
                        <label for="inventory_odometer"><strong>Odometer:</strong></label>
                        <input type="text" id="inventory_odometer" name="inventory_odometer" class="inputbox" value=""  /> 
                        
                    </p> 
            		<p>
                        <label for="inventory_age"><strong>Age:</strong></label>
                        <input type="text" id="inventory_age" name="inventory_age" class="inputbox inputboxsm" value=""/> 
                    </p>                    
                    
            		<p>
                        <label for="inventory_cost"><strong>Cost:</strong></label>
                        <input type="text" id="inventory_cost" name="inventory_cost" class="inputbox" value=""  /> 
                        
                    </p> 

					<input id="inventory_submit" name="inventory_submit" type="button" value="  Add  " class="btn_fi" onClick="val_inventory('add');">
                    <input name="act" type="hidden" value="add" />
                    <input name="did" type="hidden" value="<?=$did ?>" />

                </form>  

              
                
            </div>
        </div>
        <!-- Content Box End -->                

        <!-- Content Box Start -->
        <div class="contentcontainer med right">
            <div class="headings alt">
                <h2>Inventory - Import as CSV</h2>
            </div>
<br />
<br />

        <!-- Content Box Start -->
        <div class="contentcontainer med left" id="tabs">
            <div class="headings">
                <h2 class="left">CSV Import/Export</h2>
                <ul class="smltabs">
                	<li><a href="#tabs-1">Import</a></li>
                    <li><a href="#tabs-2">Export</a></li>
                </ul>
            </div>
            <div class="contentbox" id="tabs-1">
            	
            	<form action="index.php?/administrator/csv/import" name="form_csv_import" id="form_csv_import" method="post" enctype="multipart/form-data">
                	<p id="errmes2" class="red"></p>
<br />
<br />
                    
<div id="csv_uploader">

<p>Please only upload CSV files.</p>
<p>Only properly formatted CSV files will upload and import. For a formatted CSV select the Export Tab and click Export. If you have any current inventory the Export will contain the format and the current inventory. If you do not currently have any inventory the Export will let you download a CSV template with proper formatting.</p>
<p>This import utility will only replace entire inventories. It does not add/delete. So upload your complete inventory. If you want to edit your existing inventory as CSV <span style="text-decoration:underline">you should first download your current inventory</span>, then edit the CSV and upload the new inventory.</p>

<input type="file" id="csv_uploader" name="csv_uploader" class="btn_up" /> 
<br />
<br />
<br />



</div>
<br />


<div style="float:left; display:inline; width:100px;">
<input id="csv_import_submit" name="csv_import_submit" type="button" value="  Import  " class="btn_fi" onClick="val_csv_import(); " onmouseover="document.getElementById('spec_mes').style.display = 'block';">
</div>
<div style="float:left; width:100%;display: none;color:#76414a; font-size:18px; padding-top: 12px;" id="spec_mes">                    
When you click the "Import" button remember:<br />
 LARGE FILES can take several minutes<br />
to upload and process.
</div>
<div style="clear:both;"></div>

<br />
<div id="upload_status_csv2" style="display:none;">

	<img src="<?=base_url() ?>images/loading.gif" alt="Loading" /> Please wait while your file is uploaded...
<br />
<br />
    
</div>                  
                    
                    <input name="act" type="hidden" value="add_import" />
                    <input name="did" type="hidden" value="<?=$did ?>" />

                </form>
                
                
                
                
                
                
                </div>
                <div class="contentbox" id="tabs-2">
                <br />
            	<form action="index.php?/administrator/csv/export" name="form_csv_export" id="form_csv_export" method="post" >
                	<p id="errmes2" class="red"></p>
                 
           		    <p>Click the Export button to download a CSV of your current inventory. If you do not have anything in your current inventory this will download a properly formatted "template" CSV. </p> 
<br />

<div id="export_file_display" style="display:none;">
<strong>File for Export: </strong>
<span id="export_file"></span><br />
</div>


					<a href="<?=base_url() ?>data_import/inventory_template.csv"><input id="csv_export_submit" name="csv_export_submit" type="button" value="  Export  " class="btn_fi" ></a>
<br />
<br />
                    
                    <input name="act" type="hidden" value="do_export" />
					<input name="did" type="hidden" value="<?=$did ?>" />
                    
                </form>
				</div>
        </div>
        <!-- Content Box End -->
        
        
        <!-- Content Box Start -->
        <div class="contentcontainer sml right">
            <div class="headings alt">
            <div class="headings alt">
            <div style="float: left; display: inline; width: 50%;"><h2>Status</h2></div>
            <div style="float: left; display: inline; width: 50%;">
            
                <ul class="pagination" style="margin-top:10px;">
                
                    <li class="page"><a href="index.php?/administrator/inventory_list/<?=$did ?>" title=""><span style="font-size: 16px; text-shadow: 1px 1px 1px #666;">Back to List</span></a></li>
                </ul>
            </div>
            <div style="clear:both;"></div>
                
            </div>
            <div class="contentbox">

<div style="text-align:left; line-height:24px;">

<br />
<br />
<div id="suc_mes" class="status success" style="display:none;">
    
    <p><img src="<?=base_url() ?>images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes ?></p>
</div>

<div id="err_mes" class="status error" style="display:none;">
    
    <p><img src="<?=base_url() ?>images/icons/icon_error.png" alt="Error" /><span>Error!</span> <?=$err_mes ?></p>
</div>

<div id="upload_status_csv" style="display:none;">

	<img src="<?=base_url() ?>images/loading.gif" alt="Loading" /> Please wait while we parse your data...
    
</div>  
<br />
<br />
<p id="parsing_results"></p>

<script>

mes1 = '<?=$suc_mes ?>';
if (mes1 != '') {
	document.getElementById('suc_mes').style.display = 'block';
	document.getElementById('upload_status_csv2').style.display = 'none';
	////// start file parsing ///////
	do_csv('<?=$data_file ?>',<?=$did ?>);
	
} else {
	document.getElementById('suc_mes').style.display = 'none';
}

mes2 = '<?=$err_mes ?>';
if (mes2 != '') {
	document.getElementById('err_mes').style.display = 'block';
} else {
	document.getElementById('err_mes').style.display = 'none';
}

wtab = '<?=$tab ?>';
if (wtab == 'export') {
	//window.open("#tabs-2");	
}

</script>     
   
        
    

<br />
<br />
<br />
</div>            	
            </div>
        </div>
        <!-- Content Box End -->
        
        </div>
        </div>
 