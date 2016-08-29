
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator's</a></li>
            <li>/</li>
            <li class="current">CSV Import</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside">

  
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
                	<p id="errmes" class="red"></p>
                 
           		    <p>   
                  
                  		<label for="csv_set"><strong>Select Data Set to Import:</strong></label>
                        
                        <select type="text" id="csv_set" name="csv_set" class="inputbox" >
                        
                        <option value=""> - select - </option>
                        <option value="ilsa_staff">ILSA Staff</option>
                        <option value="agency_appt">Agency Appointments</option>
                        <option value="agent_appt">Agent Appointments</option>
                        <option value="agent_ce">Agent CE's</option>
                        <option value="client_ce">Client CE's</option>
                        <option value="corp_app">Corporate Appointments</option>
                        <option value="corp_lic">Corporate Licenses</option>
                        <option value="ind_app">Independants Appointments</option>
                        <option value="login_database">Login Database</option>
                        <option value="rpg">RPG</option>
                        </select>
                        
                    </p> 
<br />
                    
<div id="csv_uploader">
<p>Please only upload CSV files and be sure the Data Set matches the file you select for uploading!
</p>
<input type="file" id="csv_uploader" name="csv_uploader" class="btn_up" /> 
<br />
<br />
<br />



</div>
<br />


<div style="float:left; display:inline; width:100px;">
<input id="csv_import_submit" name="csv_import_submit" type="button" value="  Import  " class="btn_fi" onClick="val_csv_import(); document.getElementById('upload_status_csv2').style.display = 'block';" onmouseover="document.getElementById('spec_mes').style.display = 'block';">
</div>
<div style="float:left; width:600px;display: none;color:#76414a; font-size:18px; padding-top: 12px;" id="spec_mes">                    
When you click the "Import" button remember:<br />
 LARGE FILES can take several minutes to upload and process.
</div>
<div style="clear:both;"></div>

<br />
<div id="upload_status_csv2" style="display:none;">

	<img src="<?=base_url() ?>images/loading.gif" alt="Loading" /> Please wait while your file is uploaded...
<br />
<br />
    
</div>                  
                    
                    <input name="act" type="hidden" value="add_import" />

                </form>
                
                
                
                
                
                
                </div>
                <div class="contentbox" id="tabs-2">
                <br />
            	<form action="index.php?/administrator/csv/export" name="form_csv_export" id="form_csv_export" method="post" >
                	<p id="errmes2" class="red"></p>
                 
           		    <p>   
                  
                  		<label for="csv_set"><strong>Select File for Download:</strong></label>
                        
                        <select type="text" id="csv_set2" name="csv_set2" class="inputbox" onchange="document.getElementById('export_file_display').style.display = 'block';document.getElementById('export_file').innerHTML = this.value;" >
                        
                        <option value=""> - select - </option>
                          <optgroup label="Gateway Data Templates">
                            <option value="companies.csv">Companies</option>
                            <option value="employees.csv">Employees</option>
                          </optgroup>
                          <optgroup label="Reports Data">
                            <option value="xxxxxx.csv">xxxxxx</option>
                            <option value="auzzzzz.csv">zzzzzz</option>
                          </optgroup>
                        </select>
                        
                    </p> 
<br />

<div id="export_file_display" style="display:none;">
<strong>File for Export: </strong>
<span id="export_file"></span><br />
</div>


					<input id="csv_export_submit" name="csv_export_submit" type="button" value="  Export  " class="btn_fi" onClick="val_csv_export();" >
<br />
<br />
                    
                    <input name="act" type="hidden" value="do_export" />

                </form>
				</div>
        </div>
        <!-- Content Box End -->
        
        
        <!-- Content Box Start -->
        <div class="contentcontainer sml right">
            <div class="headings alt">
                <h2>Status</h2>
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
	do_csv('<?=$data_file ?>','<?=$data_type ?>');
	
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


 