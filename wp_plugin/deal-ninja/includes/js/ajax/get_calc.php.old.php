<?
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('_connect.php');

include_once('_functions_calc.php');


$did = $_REQUEST['did'];
$bid = 1; //$_REQUEST['did'];
$score = $_REQUEST['score'];
$max_payment = $_REQUEST['max_payment'];
$stock_num = $_REQUEST['stock_num'];
$min_gross = $_REQUEST['min_gross'];

$inv_where = "";

if ($stock_num != '') {
	$inv_where = " AND inventory_stk = '" . $stock_num . "'";
}

if ($min_gross == '') {
	$min_gross = 0;
} 



$sqld = "SELECT * FROM dealer WHERE dealer_id = " . $did;
$queryd = mysql_query($sqld);	
$dealer = mysql_fetch_array($queryd);

$sqlbs = "SELECT  banks.bank_id FROM bank inner join bank_assignment ba on ba.bank_id = bank.bank_id WHERE dealer_id = " . $did;
$querybs = mysql_query($sqld);   
$banks = mysql_fetch_array($querybs);


$sqls = "SELECT * FROM bank_score WHERE bank_score_start >= " . $score . " AND bank_score_end <= " . $score . " AND bank_id = " . $bid;
$querys = mysql_query($sqls);	
$fe_perc = mysql_fetch_array($querys);

//echo $fe_perc['bank_score_fe'] . '<<<<<<<br>';
////// Get The Banks we are running //////
$num_of_banks = 1;







$no_results = 0;

if ($fe_perc['bank_score_fe'] != 0) {
	$no_results = 1;
}

if ($no_results) {
?>
			<form action="index.php?/account/archive_process" name="archive_process" id="archive_process" method="post">
            	<table width="100%" id="offer_table">

                   

                	<thead>
                    	<tr>
                        	<th><input name="" type="checkbox" value="" id="checkboxall" onchange="check_all_boxes_archive();" /></th>
                            <th>Stocky#</th>
                            <th>Vehicle</th>
                        	<th>Cost</th>
                            <th>NADA</th>
                            <th>Sell</th>
                            <th></th>
                            <th>Fr. Gross</th>
                            <th>Back Adv.</th>
                            <th>Br Ev Pymt.</th>
                            <th>Pymt.</th>
                            <th>Max Pymt.</th>
                            <th>Term</th>
                            <th>Int.</th>
                            <th>Bank Name</th>
                        </tr>
                    </thead>
                    <tbody>                    
<?
for ($b=0;$b<=$num_of_banks;$b++) {
	
    $sqlb = "SELECT * FROM bank WHERE bank_id = " . $banks[$b]['bank_id'];
    $queryb = mysql_query($sqlb);	
    $bank = mysql_fetch_array($queryb);
?>
	
<tr style="background:#333; color:#fff;">
<td colspan="15"><h2><?=$bank['bank_name'] ?></h2></td>
</tr>	

<?
$sqli = "SELECT * FROM inventory WHERE dealer_id = " . $did . $inv_where;
$queryi = mysql_query($sqli);

$bgsw = 1;
$ctr = 0;
while ($inventory = mysql_fetch_array($queryi)) {

	if ($bgsw == 1){
		$bg = '';
		$bgsw = 0;
	} else {
		$bg = ' class="alt"';
		$bgsw = 1;
	}

$sqly = "SELECT * FROM bank_year WHERE bank_year_start >= " . $inventory['inventory_year'] . " AND bank_year_end <= " . $inventory['inventory_year'] . " AND bank_id = " . $bid;
$queryy = mysql_query($sqly);	
$term = mysql_fetch_array($queryy);

$month_term = $term['bank_year_term'];

$sqlr = "SELECT * FROM bank_rate WHERE bank_id = " . $bid . " AND bank_score_id = " . $fe_perc['bank_score_id'] . " AND bank_year_id = " . $term['bank_year_id'];
$queryr = mysql_query($sqlr);	
$rate = mysql_fetch_array($queryr);

$annual_interest_percent = $rate['bank_rate_rate'];

$nada = $inventory['inventory_nada']; // nada value or cost
$cost = intval($inventory['inventory_cost']); // cost
$fe = $fe_perc['bank_score_fe']; // front end perc look up
$with_fe = $nada * $fe; // the value (nada) time the fe
$title_fee = $dealer['dealer_title_fee'];
$tax = $dealer['dealer_tax_rate']; // percentage of sales tax
$tot_title_fee = $with_fe - $title_fee; // with_fe minus title fee
$tot_tax = round($tot_title_fee / 1.0325,2);
//$tax = $dealer['dealer_tax_rate']; // percentage of sales tax
//$tot_tax = round($tax/100 * $tot_title_fee, 2); // the dollar amount of sales tax
//$tot_after_tax = $tot_title_fee - $tot_tax; // 
$doc_fee = $dealer['dealer_doc_fee'];
$tot_after_doc_fee =  $tot_tax - $doc_fee; // minus tax
$selling_price = $tot_after_doc_fee;

$be = $fe_perc['bank_score_be']/100 * $with_fe;
$be = round($be,2);

if ($be >= 5000) {
	$be = 5000;
}


//echo $cost . ' + ' . + $doc_fee . '<br>';
$price_with_brev = $cost + $doc_fee;
//echo $price_with_brev . '<br>';
$price_with_brev_tax = round($tax / 100 * $price_with_brev,2);
//echo $price_with_brev_tax . '<br>';
$price_with_brev_with_tax = $price_with_brev + $price_with_brev_tax;
//echo $price_with_brev_with_tax . '<br>';
$price_with_brev_with_title = $price_with_brev_with_tax + $title_fee;
//echo $price_with_brev_with_title . '<br><br>';
$payment_with_br_ev = get_payment($price_with_brev_with_title,$month_term,$annual_interest_percent);

$payment_at_cost = get_payment($cost,$month_term,$annual_interest_percent);

$payment_with_fe = get_payment($with_fe,$month_term,$annual_interest_percent);

$price_fe_be = $with_fe + $be;
$payment_with_fe_be = get_payment($price_fe_be,$month_term,$annual_interest_percent);



$front_gross = $selling_price - $cost; // Or Profit: nada minus the selling price

// if min gross filter
$sw_min_gross = 0;
$sw_max_payment = 0;

if ($min_gross <= $front_gross) {
	// show offer item
	$sw_min_gross = 1;
} else {
	$sw_min_gross = 0;
}

//echo $max_payment . '<=' . $payment_at_cost . '<br>';

if ($max_payment >= $payment_at_cost) {
	// show offer item
	$sw_max_payment = 1;
} else {
	$sw_max_payment = 0;
}




$interest_rate = '';
//$term = $month_term['bank_year_term'] / 12; // in months

$payment = '';


$calc = '';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">NADA:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $nada . '</div><div style="clear:both"></div>';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">FE PERC:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $fe . '</div><div style="clear:both"></div>';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Bank will finance:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $with_fe . '</div><div style="clear:both"></div>';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Title Fee:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $title_fee . '</div><div style="clear:both"></div>';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Tot minus Title Fee:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $tot_title_fee . '</div><div style="clear:both"></div>';
//$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Tax rate:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $tax . '</div><div style="clear:both"></div>';

$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Pre Tax:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $tot_tax . '</div><div style="clear:both"></div>';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Doc fee:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $doc_fee . '</div><div style="clear:both"></div>';
$calc .= '<div style="float:left;display:inline; width:300px;text-align:right;">Tot minus doc fee - Selling Price:</div><div style="float:left;display:inline; width:300px;text-align:left;">&nbsp;&nbsp;&nbsp;' . $tot_after_doc_fee . '</div><div style="clear:both"></div>';


if ($sw_min_gross && $sw_max_payment) {
?>

                        <tr>
							<td colspan="15" id="td_calc_<?= $ctr ?>"><div id="show_calc_<?= $ctr ?>" style="display:none; "><?=$calc ?></div></td>
                        </tr>    
                
                        <tr<?=$bg  ?>>
                            <td><input type="checkbox" value="<?= $inventory['inventory_id'] ?>" name="cb_archive[]" id="cb_archive_<?= $ctr ?>" /></td>
                            <td><?= $inventory['inventory_stk'] ?></td>
                            <td><?= $inventory['inventory_name'] ?></td>
                            <td><?= intval($inventory['inventory_cost']) ?></td>
                            <td><?= $inventory['inventory_nada'] ?></td>
                            <td><?=$selling_price ?> </td>
                            <td><a href="javascript:;" onclick="show_hide_calc(<?= $ctr ?>)"><img src="./images/bul_fi_subhead.png" /></a></td>
                            <td><?=$front_gross ?></td>
                            <td><?=$be ?></td>
                            <td><?=$payment_with_br_ev ?></td>
                            <td><?=$payment_with_fe ?></td>
                            <td><?=$payment_with_fe_be ?></td>
                            <td><?=$month_term ?></td>
                            <td><?=$annual_interest_percent ?></td>
                            <td><?=$bank['bank_name'] ?></td>
                        
                        
                        </tr>
                        
<?
$ctr++;


} // end if min gross

} // end while inventory

} // end looping thru banks


?>                        

                    </tbody>
                </table>
<? if ($sw_min_gross) { ?>
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
  
<? } else { ?>
<br />
<br />

<h3>No Results</h3>
<br />

<? } ?>

</form>

<?
} else { // else if no_results 
?>




<h3>No Results</h3>



<?
} // end if no_results
?>




