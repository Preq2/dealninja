<?
 
include_once('_connect.php');

include_once('_functions_calc.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
 
 
$did = $_REQUEST['did'];
$bid = $_REQUEST['cb_bank'];
$bid_tier = $_REQUEST['tier_filter'];
$score = $_REQUEST['score'];
$max_payment = $_REQUEST['max_payment'];
$stock_num = $_REQUEST['stock_num'];
$min_gross = $_REQUEST['min_gross'];
$sort_filter = $_REQUEST['sort_filter'];

$cashdown = $_REQUEST['cashdown'];
$trade = $_REQUEST['trade'];
$tradeacv = $_REQUEST['tradeacv'];

$beacon_clause = "  ";  //init beacon
$showAllTiers = false;
$showAllTerms = false;
$inv_where = "";
switch ($sort_filter){
    case "frgross":
    $sort_filter = " FrontEndMax  ";
    $beacon_clause = " AND  " . $score . " between brg_score_end  AND brg_score_start " ;
    break;

    case "lowpay":
    $sort_filter = " get_payment((inventory_cost + dealer_doc_fee + dealer_title_fee)  * (1.0 + dealer_tax_rate/100), brg_term/12, brg_rate ) ";
    $beacon_clause = " AND  " . $score . " between brg_score_end  AND brg_score_start " ;
    break;

    case "bthgross":
    $sort_filter = " FrontEndMax +  be - (tot_tax - dealer_title_fee - dealer_doc_fee) ";
    $beacon_clause = " AND  " . $score . " between brg_score_end  AND brg_score_start " ;
    break;

    case "lowinterest":
    $sort_filter = " brg_rate ";
    $beacon_clause = " AND  " . $score . " between brg_score_end  AND brg_score_start " ;
    break;

    case "inventory_stk":
    $beacon_clause = " AND  " . $score . " between brg_score_end  AND brg_score_start " ;
    break;
    case "bank_tiers":
    $sort_filter = " inventory_stk ";
    $showAllTiers = true;
    case "bank_terms":
    $sort_filter = " inventory_stk";
    $showAllTerms = false;
    
    break;
       
}

if ($stock_num != '') {
    $inv_where = " AND inventory_stk = '" . $stock_num . "'";
}

if ($min_gross == '') {
    $min_gross = -10000000;
} 

//Check for Banks
if ($bid !='') {
    $bnk_where = "  AND instr('" . $bid . "',concat('|' , bank_id, '|')) > 0 ";
}
else {
    $bnk_where = " ";
}

//Check for Bank Tiers
if ($bid_tier !='') {
    $bid_tier = urldecode($bid_tier);
   $bid_tier_where = "  AND brg_bank_tier_combo_id = '" . $bid_tier . "'";
   //Reset Beacon to high numbers since it no longer matters
   $beacon_clause = "    ";
   //echo $bid_tier;

}
 else {
    $bid_tier_where = " ";
 }   


//Check for Beacon Ignore
//echo $_REQUEST['beacon_ignore'];
//if ($_REQUEST['beacon_ignore']=="no"){
 //   $beacon_clause = " AND  " . $score . " between brg_score_end  AND brg_score_start " ;
//}

//else {
//    $beacon_clause = "  "; 
//}
?>



            <form action="index.php?/account/archive_process" name="archive_process" id="archive_process" method="post">
                <table width="100%" id="offer_table" class="tablesorter" >

                   

                    <thead>
                        <tr>
                            
                            <th>Stock#</th>
                            <th>Vehicle</th>
                            <th>Odometer</th>
                            <th>Cost</th>
                            <th>Rebates</th>
                            <th>NADA</th>
                            <th>OTD</th>
                            <th>Sell</th>
                          <!--  <th>Tax</th> -->
                            
                            <th>Max Front</th>
                            <th>Back Adv.</th>
                            <th>Br Ev Pymt.</th>
                            <th>Pymt.</th>
                            <th>Max Pymt.</th>
                            <th>Term</th>
                            <th>Int.</th>
                            <th>Bank Name</th>
                            <th>Bank Tier</th>
                        </tr>
                    </thead>
                    <tbody>                    

                    
<?

$sqld = "SELECT Distinct * ,
          get_payment(FrontEndMax+BE,brg_term/12,brg_rate) payment_with_fe_be,
          FrontEndMax - tot_tax - dealer_title_fee - dealer_doc_fee  SellingPrice,
          get_payment((inventory_cost + dealer_doc_fee + dealer_title_fee)  * (1.0 + dealer_tax_rate/100), brg_term/12, brg_rate) BreakEvenPayment
         FROM vw_InventoryMatch3
         WHERE dealer_id = " . $did . " AND  ((FrontEndMax - tot_tax - dealer_title_fee - dealer_doc_fee) - inventory_cost) > " . $min_gross  . 
         $beacon_clause  . 
          $bid_tier_where .
         " AND (inventory_cost > 4000  and inventory_nada > 100 ) " .
         " AND   get_payment(FrontEndMax+BE,brg_term/12,brg_rate)  <=  " . $max_payment . 
          $inv_where . $bnk_where .  "    ORDER BY inventory_stk, ". $sort_filter   ." desc" ;


echo "<hr>";
$queryd = mysql_query($sqld);   
//$resultarr = mysql_fetch_array($queryd);
 echo mysql_error() ;//. "<br><br><small>" . $sqld . "</small>";
//echo "<hr>";
//echo print_r($resultarr);

$ctr = 0;
$laststock = "";
while ($results = mysql_fetch_array($queryd)) 
  {

  $ctr++;
  if ($laststock != $results['inventory_stk'] || $sort_filter =='inventory_stk' || $showAllTiers)
  {
?>
                        
                        <tr>
                           
                            <td><?= $results['inventory_stk'] ?></td>
                            <td><?= substr($results['inventory_name'],0,20) ?></td>
                            <td><?= substr($results['inventory_odometer'],0,20) ?></td>
                            
                            <td><?= intval($results['inventory_cost']) ?></td>
                            <td><?= round($results['inventory_rebate'],2) ?></td>
                            
                            <td><?= $results['inventory_nada'] ?></td>
                            <td><?=round($results['FrontEndMax'],2)?></td>
                            <td><?=round($results['SellingPrice'], 2) ?></td>
                          <!--  <td><?=round($results['tot_tax'],2) ?></td> -->
                            
                            <td><?=round($results['SellingPrice'] - $results['inventory_cost'] ,2)?></td>
                            <td><?=round($results['be'],2) ?></td>
                            <td><?=round($results['BreakEvenPayment'] ,2)?></td>
                            <td><?=round($results['payment_with_fe'] ,2)?></td>
                            <td><?=round($results['payment_with_fe_be'],2) ?></td>
                            <td><?=$results['brg_term'] ?></td>
                            <td><?=$results['brg_rate'] ?> </td>
                            <td><?=$results['bank_name'] ?> </td>
                            <td><?=$results['brg_tier_name'] ?> </td>
                                
                        
                        
                        </tr>
                        
<?
    $laststock = $results['inventory_stk'];

    } // IF

    else {
        $laststock = $results['inventory_stk'];
    }
 } //WHILE LOOP
?>
                        

                    </tbody>
                </table>

                <div class="extrabottom" style="padding-top:20px;">
                           
                        <input type="button" value="Archive Selected" class="btn_fi" onclick="val_archive_selected('archive_process')"/>              

              </div>
                <!--ul class="pagination">
                    <li class="text">Previous</li>
                    <li class="page"><a href="#" title="">1</a></li>
                    <li><a href="#" title="">2</a></li>
                    <li><a href="#" title="">3</a></li>
                    <li><a href="#" title="">4</a></li>
                    <li class="text"><a href="#" title="">Next</a></li>
                </ul-->
                <div style="clear: both;"></div>
  
<?   ?>


</form>

<script type="text/javascript">
 $("#offer_table").tablesorter({sortList: [[8,1], [0,0]]}); 
</script>




