<?

?>
<script src="/js/tablesorter/jquery.tablesorter.min.js"></script>
<!-- Top Breadcrumb Start -->
<div id="breadcrumb">
   <ul>	
       <li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
       <li><strong>Location:</strong></li>
       <li><a href="#" title="">Administrator</a></li>
       <li>/</li>
       <li class="current">Dashboard</li>
   </ul>
</div>
<!-- Top Breadcrumb End -->


<!-- Right Side/Main Content Start -->
<div id="rightside">



    <!-- Content Box Start -->
    <div class="panel">
        <div class="panel-header">
            <h3>Loan Rates Look-up and Calculator</h3>
        </div>

        <div class="panel-content">
            <form action="index.php?/account/lookup_results" class="form-inline" name="form_lookup" id="form_lookup" method="post" autocomplete="off">


                <div class="form-group panel-item" >
                    <div class="innernotice2">

                        <p id="errmes" class="red"></p> 
                        <label class="control-label">Required Criteria</label>
                       <br/>    
                          <div class="input-group"> 
                            <span class="input-group-addon" id="basic-addon1">Beacon Score</span>
                             <input type="text" class="form-control" id="lookup_beacon" name="lookup_beacon" placeholder="0-1000" aria-describedby="basic-addon1">
                             
                          </div>
                           <input type="hidden" class="checkbox" name="beacon_ignore" id="beacon_ignore"> 
                          <div class="input-group">
                            <span class="input-group-addon">Maximum Payment:</span>
                            <input type="text" id="lookup_payment" name="lookup_payment" class="form-control" value="" style="background:#fff;"  /> 
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">Sort Filter:</span>
                            <select id="sort_filter" name="sort_filter" class="form-control" style="background:#fff;"  >
                              <option value="inventory_stk">Show 60,72,84</option>
                              <option value="frgross">MAX Front Gross</option>
                              <option value="bthgross">Max Total (F &amp; B) Gross</option>
                            <!--  <option value="lowpay">Lowest Payment</option>
                              <option value="lowinterest">Lowest Interest</option> -->
                              
                            <!--  <option value="bank_tiers">All Tiers</option> -->
                              
                            </select> 
                          </div>
                          

                          <br>

                          <label class="control-label">Optional Filters</label>
                          <br>
                          <div class="input-group">
                            <span class="input-group-addon">Cash Down:</span>
                            <input type="text" id="lookup_cashdown" name="lookup_cashdown" class="form-control" value="" style="background:#fff;"  /> 

                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">Trade-In Allowance:</span>
                            <input type="text" id="lookup_trade" name="lookup_trade" class="form-control" value="" style="background:#fff;"  /> 

                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">Trade ACV:</span>
                            <input type="text" id="lookup_tradeacv" name="lookup_tradeacv" class="form-control" value="" style="background:#fff;"  /> 

                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">Min. Acceptable Front-end Gross:</span>
                            <input type="text" id="lookup_front_end" name="lookup_front_end" class="form-control" value="" style="background:#fff;"  /> 

                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">Specific Stock Number:</span>
                            <input type="text" id="lookup_stock" name="lookup_stock" class="form-control" value="" style="background:#fff;"  /> 

                          </div>
                          <br/>
                          <div class="input-group">
                               <input name="cb_lookup_banks" id="cb_lookup_banks" type="checkbox" value="1" />
                                <label for="cb_lookup_banks" style="display : inline; text-align:left; width:180px;" id="cb_lookup_banks_label">
                               <strong>For Specific Bank(s)</strong></label>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                               <input name="cb_lookup_tiers" id="cb_lookup_tiers" type="checkbox" value="1" />
                                <label for="cb_lookup_tiers" style="display : inline; text-align:left; width:180px;" id="cb_lookup_tiers_label">
                               <strong>For Specific Bank Tier</strong></label>
                          </div>

                    </div>
                

                <!-- end form box --> 

                <div class="noticeboxalt3" >
                    <div class="innernotice3" >
                  
</div>
                        <!-- start banks hidden div -->
                        <div class="noticebox" id="lookup_banks" style="display:none; width:380px;">
                            <div class="innernotice" style="width:348px;">

                               <h3>Select Bank(s)</h3>
                               <br />
                               <br />
                               <?
                               $sqlba = "SELECT * FROM bank_assignment INNER JOIN bank ON bank_assignment.bank_id = bank.bank_id WHERE dealer_id = " . $did;
                               $queryba = mysql_query($sqlba);	

                               ?>
                               <table width="100%">
                                <? if (!mysql_num_rows($queryba)) { ?>

                                <tr>
                                   <td colspan="4">Your Banks Have Not Yet Been Assigned</td>
                               </tr>

                               <? } else { ?>                    


                               <tbody>                    
                                <?
                                $bgsw = 1;
                                $ctr = 0;
                                while ($bank_item = mysql_fetch_array($queryba)) {

                                    ?>

                                    <? if ($bgsw == 1) { ?> 
                                    <tr>
                                       <td width="5%"><input type="checkbox" value="|<?=$bank_item['bank_id'] ?>|" name="cb_bank[]" id="cb_bank_<?= $ctr ?>" /></td>
                                       <td><?=$bank_item['bank_name'] ?></td>

                                       <? } else { ?>

                                       <td width="5%"><input type="checkbox" value="|<?=$bank_item['bank_id'] ?>|" name="cb_bank[]" id="cb_bank_<?= $ctr ?>" /></td>
                                       <td><?=$bank_item['bank_name'] ?></td>

                                   </tr>                            

                                   <? } ?>                            






                                   <?

                                   if ($bgsw == 1){

                                      $bgsw = 0;
                                  } else {

                                      $bgsw = 1;
                                  }

                                  $ctr++;
                             
                              }
                              ?>                        

                              <? } ?>
                          </tbody>
                      </table>



                  </div>
              </div>

              <!-- end banks hidden div -->

              <div class="noticeboxalt3" id="lookup_tiers"  style="display:none; ">
                 <div class="innernotice3" >

                <?
                    $sqltf = "SELECT * FROM vw_bank_tiers WHERE dealer_id = " . $did . " ORDER BY bank_name asc, t";
                    $tf_rows = "";
                    $querytf = mysql_query($sqltf);  

                ?>
                 
                                <? if (mysql_num_rows($querytf)) { 
                                      while ($tf_item = mysql_fetch_array($querytf)) {
                                        $tf_rows .= "<option value='" .  $tf_item['v']  ."'>" . $tf_item['t'] . "</option>";
                                      }
                                    
                                    }
                                ?>
               
                <select name="tier_filter" id="sl_tf">
                  <option value="all"> -- All Tiers --</option>
                   
                    <?=$tf_rows?>
                </select>
              </div>
              <p>
                <br />
                <br />
                
            </p>  


              </div>
        </div>
    </div><!-- end form box -->
    <input id="lookup_submit" name="lookup_submit" type="button" value="  Search  " class="btn_fi" onClick="val_lookup();">


    <div style="clear: both;"></div>

    <input name="act" type="hidden" value="lookup" />
    <input name="did" id="did" type="hidden" value="<?=$did ?>" />

</form>  











<div class="dash_containers">

    <div class="dash_bot" style="background: #FC708B">

    </div>
</div>



<?
$mess = "";
$sqlb = "SELECT * FROM bank_assignment WHERE dealer_id = " . $did;
$queryb = mysql_query($sqlb);	


if (!mysql_num_rows($queryb)) {
    ?>
    <div class="status warning">
       <p class="closestatus"><a href="" title="Close">x</a></p>
       <p><img src="img/icons/icon_warning.png" alt="Warning" /><span>Attention!</span> No Banks are configured for this dealer account. Searches will not function.</p>
   </div>
   <script>
   document.getElementById('lookup_submit').disabled = true;
   </script>        
   <?
   $mess = '';
}

echo $mess;
?>



</div>
</div>
<!-- Content Box End -->

<!-- Content Box Start -->
<div class="contentcontainer lrg right2" id="results_containter">
    <div class="headings alt">
        <h2>Results</h2>
    </div>
    <div class="contentbox">
        <br />

        <div id="lookup_results">

            <h3>No Search</h3>

        </div>




    </div>
</div>
<!-- Content Box End -->

<script type='text/javascript'>
function show_hide_calc(ctr) {

	if (document.getElementById('show_calc_' + ctr).style.display == 'none') {
		document.getElementById('show_calc_' + ctr).style.display = 'block';
		document.getElementById('td_calc_' + ctr).style.background = '#E4E8A8';
	} else {
		document.getElementById('show_calc_' + ctr).style.display = 'none';
		document.getElementById('td_calc_' + ctr).style.background = 'none';
	}
	
	
}

 
$(document).ready(function() 
    { 
        $("#offer_table").tablesorter(); 
    } 
); 
</script>
 




