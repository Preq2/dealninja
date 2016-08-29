<?php

  ini_set('display_errors',1);
 
  // echo plugins_url( 'deal-ninja/includes/js/tablesorter/jquery.tablesorter.min.js',dirname(__FILE__) );
 
 $current_user  = wp_get_current_user();

 //If DId is not set get it using the user email address of the wordpress user ;)
 if (!isset($_SESSION['did'])) {
   require_once('_connect.php');

   $sqlDID = "Select dealer_id from user  inner join dealer on dealer.user_id = user.user_id where user_email='" . $current_user->user_email . "'";
   $dn_query = mysql_query($sqlDID);
   $dn_obj = mysql_fetch_object($dn_query);
   $_SESSION['did'] = $dn_obj->dealer_id;
 }
 $did = $_SESSION['did'];
?>
<script src="<?php echo plugins_url('deal-ninja/includes/js/jquery.js'); ?>"></script>

<script src="<?php echo plugins_url('deal-ninja/includes/js/jquery_ui/jquery-ui.min.js'); ?>"></script>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<script src="<?php echo plugins_url('deal-ninja/includes/js/form_validate.js'); ?>"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="<?php echo plugins_url( 'deal-ninja/includes/js/tablesorter/jquery.tablesorter.min.js','deal-ninja' );?>"></script>
 <link rel="stylesheet" href="<?php echo plugins_url('deal-ninja/includes/js/tablesorter/themes/blue/style.css','deal-ninja') ?>" />

    <!-- Content Box Start -->
    <h3>Loan Rates Look-up and Calculator</h3>
            <h4><?php   include_once('_connect.php');echo mysql_error();?>
              <?php echo $did; ?>
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
                               <?php
                               
                             
                               $sqlba = "SELECT * FROM bank_assignment INNER JOIN bank ON bank_assignment.bank_id = bank.bank_id WHERE dealer_id = " . $did;
                               $queryba = mysql_query($sqlba);	
                               echo mysql_error();
                               ?>
                               <table width="100%">
                                <?php if (!mysql_num_rows($queryba)) { ?>

                                <tr>
                                   <td colspan="4">Your Banks Have Not Yet Been Assigned</td>
                               </tr>

                               <?php } else { ?>                    


                               <tbody>                    
                                <?php
                                $bgsw = 1;
                                $ctr = 0;
                                while ($bank_item = mysql_fetch_array($queryba)) {

                                    ?>

                                    <?php if ($bgsw == 1) { ?> 
                                    <tr>
                                       <td width="5%"><input type="checkbox" value="|<?=$bank_item['bank_id'] ?>|" name="cb_bank[]" id="cb_bank_<?= $ctr ?>" /></td>
                                       <td><?=$bank_item['bank_name'] ?></td>

                                       <?php } else { ?>

                                       <td width="5%"><input type="checkbox" value="|<?=$bank_item['bank_id'] ?>|" name="cb_bank[]" id="cb_bank_<?= $ctr ?>" /></td>
                                       <td><?=$bank_item['bank_name'] ?></td>

                                   </tr>                            

                                   <?php } ?>                            






                                   <?php

                                   if ($bgsw == 1){

                                      $bgsw = 0;
                                  } else {

                                      $bgsw = 1;
                                  }

                                  $ctr++;
                             
                              }
                              ?>                        

                              <?php } ?>
                          </tbody>
                      </table>



                  </div>
              </div>

              <!-- end banks hidden div -->

              <div class="noticeboxalt3" id="lookup_tiers"  style="display:none; ">
                 <div class="innernotice3" >

                <?php
                    $sqltf = "SELECT * FROM vw_bank_tiers WHERE dealer_id = " . $did . " ORDER BY bank_name asc, t";
                    $tf_rows = "";
                    $querytf = mysql_query($sqltf);  

                ?>
                 
                                <?php if (mysql_num_rows($querytf)) { 
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
    


    <div style="clear: both;"></div>
   <!-- <input id="lookup_submit2" name="lookup_submit2" type="button" value="  Search  " class="btn_fi" onClick="val_lookup();"> -->
    <button id="lookup_submit" href="#" name="lookup_submit" type="button"  data-loading-text="Loading..." class="btn btn_fi btn-primary" onClick="val_lookup()">  Search </button>

    <input name="act" type="hidden" value="lookup" />
    <input name="did" id="did" type="hidden" value="<?php echo $did ?>" />

</form>  











<div class="dash_containers">

    <div class="dash_bot" style="background: #FC708B">

    </div>
</div>



<?php
$mess = "";
$sqlb = "SELECT * FROM bank_assignment WHERE dealer_id = " . $did;
$queryb = mysql_query($sqlb);	
echo mysql_error();

if (!mysql_num_rows($queryb)) {
    ?>
    <div class="status warning">
       <p class="closestatus"><a href="" title="Close">xx</a>

       </p>
       <p><img src="img/icons/icon_warning.png" alt="Warning" /><span>Attention!</span> No Banks are configured for this dealer account. Searches will not function.</p>
   </div>
   <script>
   document.getElementById('lookup_submit').disabled = true;
   </script>        
   <?php
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

           

        </div>




    </div>
</div>
<!-- Content Box End -->
<script> 
$(document).ready(function(){
  $(".menu_h").click(function(){
    $("#leftside").fadeOut();
    document.getElementById('leftside_min').style.display = 'block';
    document.getElementById('breadcrumb').style.marginLeft = '60px';
    document.getElementById('rightside').style.margin = '20px 20px 20px 60px';
  });
  $(".menu_s").click(function(){
    $("#leftside").fadeIn();
    document.getElementById('leftside_min').style.display = 'none';
    document.getElementById('breadcrumb').style.margin = '0 0 0 226px';
    document.getElementById('rightside').style.margin = '20px 20px 0 250px';
  });
  
  $("#cb_lookup_banks").click(function(){


    if ($('#cb_lookup_banks').is(':checked')) {
      $("#lookup_banks").fadeIn();
      $("#cb_lookup_tiers").attr('checked', false); // Uncheck other Box
      $("#lookup_tiers").fadeOut();
    } else {
      $("#lookup_banks").fadeOut();
    }                    
                 
    
    
  }); 

    $("#cb_lookup_tiers").click(function(){


    if ($('#cb_lookup_tiers').is(':checked')) {
      $("#lookup_tiers").fadeIn();
      $("#cb_lookup_banks").attr('checked', false); // Uncheck other Box
      $("#lookup_banks").fadeOut();
    } else {
      $("#lookup_tiers").fadeOut();
      
    }                    
                 
    
    
  }); 



  
});

function build_tiers(which) {

mes = '';

  if (document.getElementById('bank_' + which + '_tiers').value == '') {
    mes = mes + 'Enter the number of years ranges/tiers\n';
    changeClass('bank_' + which + '_tiers', 'inputbox inputboxsmsm errorbox');
  } else {
    
    changeClass('bank_' + which + '_tiers', 'inputbox inputboxsmsm');
  }
  
  if (mes != '') {
    
    

    
  } else {
    
    tiers = document.getElementById('bank_' + which + '_tiers').value;
    temp_op = '<table><thead><tr><td></td><th><div style="text-align:center">Start Value</div></th><th><div style="text-align:center">End Value</div></th>';
    if (which == 'year') {
      temp_op = temp_op + '<th><div style="text-align:center">Max. Term</div></th>';
    }
    temp_op = temp_op + '</tr></thead>';
    
    for (i=1;i<=tiers;i++) {
      
      temp_op = temp_op + '<tr><td>Tier ' + i + '</td>';
      temp_op = temp_op + '<td><input type="text" id="bank_' + which + '_start_' + i + '" name="bank_' + which + '_start_' + i + '" class="inputbox inputboxsmsm" /></td>';
      temp_op = temp_op + '<td><input type="text" id="bank_' + which + '_end_' + i + '" name="bank_' + which + '_end_' + i + '" class="inputbox inputboxsmsm" /></td>';
      
      if (which == 'year') {
        temp_op = temp_op + '<td><input type="text" id="bank_' + which + '_term_' + i + '" name="bank_' + which + '_term_' + i + '" class="inputbox inputboxsmsm" /></td>';
      }
  
      temp_op = temp_op + '</tr>';
    }
    temp_op = temp_op + '</table>';
    
    //alert(temp_op);
    document.getElementById('bank_' + which + '_chart').innerHTML = temp_op;
    $("#bank_" + which + "_chart").fadeIn(2000);    
    
  }

}
  
</script>
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
         $("#offer_table").tablesorter({sortList: [[8,1], [0,0]]});  
    } 
); 







//AJAX Calls
function get_calc(did,score,max_payment,min_gross,stock_num,sort_filter,cb_bank,beacon_ignore,tier_filter) {
  
  $( "#loadergif" ).dialog( "open" );

    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange=function() {

      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var ans = xmlhttp.responseText;
        
        var str = ans;
        //alert(ans);
        
        document.getElementById('lookup_results').innerHTML = ans;
        
        
        $('#lookup_submit').button('reset');
         $("#offer_table").tablesorter(); 
        
      }
      
    }
    //alert(beacon_ignore);
    xmlhttp.open("GET"," /wp-content/plugins/deal-ninja/includes/js/ajax/get_calc.php?did=" + did + "&score=" + score + "&max_payment=" + max_payment + "&min_gross=" + min_gross + "&stock_num=" + stock_num + "&sort_filter=" +sort_filter + "&cb_bank=" + cb_bank + "&beacon_ignore=" + beacon_ignore +"&tier_filter=" + tier_filter);
    xmlhttp.send();     
  
}

</script>
 




