<?

$sqlbs = "SELECT * FROM bank_score WHERE bank_id = " . $bank['bank_id'];
$querybs = mysql_query($sqlbs);	
$bs = mysql_fetch_array($querybs);

$swbs = 0;
if (mysql_num_rows($querybs)) {
	$swbs = 1;
}

$sqlby = "SELECT * FROM bank_year WHERE bank_id = " . $bank['bank_id'];
$queryby = mysql_query($sqlby);	
$by = mysql_fetch_array($queryby);

$swby = 0;
if (mysql_num_rows($queryby)) {
	$swby = 1;
}


?>
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Banks</a></li>
            <li>/</li>
            <li class="current">Manage Metrics</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->
              


    <!-- Right Side/Main Content Start -->
    <!-- these container divs are terminated in footer.php -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">


<? if ($suc_mes != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes ?></p>
        </div>
<? } ?>
  
        <!-- Content Box Start -->
        <div class="contentcontainer sml left" id="tabs">
            <div class="headings">
                <h2 class="left">Banks - Manage Data</h2>
                <ul class="smltabs">
                	<!--li><a href="#tabs-1">Metrics</a></li-->
                    <li><a href="#tabs-2">Scores</a></li>
                    <li><a href="#tabs-3">Years</a></li>
                </ul>
            </div>
            <!--div class="contentbox" id="tabs-1">
            	
<form action="index.php?/administrator/banks_metrics/<?=$bank['bank_id'] ?>" name="form_banks_metrics" id="form_banks_metrics" method="post" autocomplete="off"> 
            
<? if ($suc_mes1 != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes1 ?></p>
        </div>
<? } ?>            
            
            <h1>General</h1>
            	<div class="sm_txt">All Fields Required</div>
<br />

                	<p id="errmes" class="red"></p>


            		<p>
                        <label for="bank_metric_fe_advance"><strong>Front-End Advance:</strong></label>
                        <input type="text" id="bank_metric_fe_advance" name="bank_metric_fe_advance" class="inputbox inputboxsmsm" value="<?=$bank_metrics['bank_metric_fe_advance'] ?>" />
                        <br />
						<span class="sm_txt">Enter percentage as decimal.<br />i.e. 125% = 1.25</span> 
                    </p>

            		<p>
                        <label for="bank_metric_be_advance"><strong>Back-End Advance:</strong></label>
                        <input type="text" id="bank_metric_be_advance" name="bank_metric_be_advance" class="inputbox inputboxsmsm" value="<?=$bank_metrics['bank_metric_be_advance'] ?>" /> 
                        <br />
						<span class="sm_txt">Enter percentage as decimal.<br />i.e. 125% = 1.25</span>                        
                    </p>
                    
            		<p>
                        <label for="bank_metric_max_term"><strong>Maximum Term:</strong></label>
                        <input type="text" id="bank_metric_max_term" name="bank_metric_max_term" class="inputbox inputboxsmsm" value="<?=$bank_metrics['bank_metric_max_term'] ?>" /> 
                        <br />
						<span class="sm_txt">In months.<br />i.e. 48 or 60</span>                        
                    </p> 
                    
	<input id="banks_metrics_submit" name="banks_metrics_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_banks_metrics();">                    
	<input name="act" type="hidden" value="edit_metrics" />
    <input name="bid" type="hidden" value="<?=$bank['bank_id'] ?>" />
</form>  
                
                
                
                
                
                
                </div-->
                
                
                
                
<?
$sqlbs = "SELECT * FROM bank_score WHERE bank_id = " . $bank['bank_id'] . " ORDER BY bank_score_start ASC";
$querybs = mysql_query($sqlbs);	

if (mysql_num_rows($querybs)) {
?>
<script>
build_rate_chart(<?=$bank['bank_id'] ?>);
</script>
<?	
}
?>
                
                
                
                
                
                <div class="contentbox" id="tabs-2">
                <br />
<form action="index.php?/administrator/banks_metrics/<?=$bank['bank_id'] ?>" name="form_banks_scores_tiers" id="form_banks_scores_tiers" method="post" autocomplete="off"> 

<? if ($suc_mes2 != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes2 ?></p>
        </div>
<? } ?>

            <h1>Beacon Score Ranges</h1>
            	<div class="sm_txt">Enter number of columns and press "Enter"</div>
<br />
<p id="errmes1" class="red"></p>
            		<p>
                        <label for="bank_score_tiers"><strong>How Many Beacon Score Tiers:</strong></label>
                        <input type="text" id="bank_score_tiers" name="bank_score_tiers" class="inputbox inputboxsmsm" /> &nbsp;&nbsp;
                        <input id="bank_score_tiers_but" name="bank_score_tiers_but" type="button" value="  Enter  " class="btn_sub" onclick="build_tiers('score');">
                    </p>
<br />
<br />

<div id="bank_score_chart" style="display:none;">
										 
		
</div>


<br />
<br />
					
                    <input id="banks_scores_tiers_submit" name="banks_scores_tiers_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_banks_scores_tiers();">
 	
    <input name="act" type="hidden" value="edit_scores" />
    <input name="bid" type="hidden" value="<?=$bank['bank_id'] ?>" />
</form> 
				</div>
                
                
                
                
                
                
                
                
                <div class="contentbox" id="tabs-3">
                <br />
<form action="index.php?/administrator/banks_metrics/<?=$bank['bank_id'] ?>" name="form_banks_years_tiers" id="form_banks_years_tiers" method="post" autocomplete="off"> 

<? if ($suc_mes2 != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes3 ?></p>
        </div>
<? } ?>

            <h1>Vehicle Year Ranges</h1>
            	<div class="sm_txt">Enter number of columns and press "Enter"</div>
<br />
<p id="errmes2" class="red"></p>
            		<p>
                        <label for="bank_year_tiers"><strong>How Many Vehicle Year Tiers:</strong></label>
                        <input type="text" id="bank_year_tiers" name="bank_year_tiers" class="inputbox inputboxsmsm" /> &nbsp;&nbsp;
                        <input id="bank_year_tiers_but" name="bank_year_tiers_but" type="button" value="  Enter  " class="btn_sub" onclick="build_tiers('year');">
                    </p>
<br />
<br />

<div id="bank_year_chart" style="display:none;">
										 
		
</div>


<br />
<br />
					
                    <input id="banks_years_tiers_submit" name="banks_years_tiers_submit" type="button" value="  Edit  " class="btn_fi" onClick="val_banks_years_tiers();">
 	
    <input name="act" type="hidden" value="edit_years" />
    <input name="bid" type="hidden" value="<?=$bank['bank_id'] ?>" />
</form> 
				</div>                
                
        </div>
        <!-- Content Box End -->
        
        
        <!-- Content Box Start -->
        <div class="contentcontainer med right">
            <div class="headings alt">
                <h2>Banks - Rates Input Chart</h2>
            </div>
            <div class="contentbox">                
<br />
<br />

<div id="bank_rate_chart">
	
</div>
                
<br />
<br />               
                
            </div>
        </div>
        <!-- Content Box End -->
<? if ($swbs == 1) { ?>        
<script>
document.getElementById('bank_score_tiers').value = <?=mysql_num_rows($querybs) ?>;
build_tiers('score');
</script>
<? } ?>

<? if ($swby == 1) { ?>        
<script>
document.getElementById('bank_year_tiers').value = <?=mysql_num_rows($queryby) ?>;
build_tiers('year');
</script>
<? } ?>

