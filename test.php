<?
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('js/ajax/connect.php');



function get_interest_factor($year_term, $monthly_interest_rate) {
	global $base_rate;
	
	$factor      = 0;
	$base_rate   = 1 + $monthly_interest_rate;
	$denominator = $base_rate;
	for ($i=0; $i < ($year_term * 12); $i++) {
		$factor += (1 / $denominator);
		$denominator *= $base_rate;
	}
	return $factor;
} 

function amort($sale_price,$year_term,$annual_interest_percent) {
	
        $down_percent            = 0;

		$month_term              = $year_term * 12;
		$down_payment            = $sale_price * ($down_percent / 100);
		$annual_interest_rate    = $annual_interest_percent / 100;
		$monthly_interest_rate   = $annual_interest_rate / 12;
		$financing_price         = $sale_price - $down_payment;
		$monthly_factor          = get_interest_factor($year_term, $monthly_interest_rate);
		$monthly_payment         = $financing_price / $monthly_factor;

	return $monthly_payment;
	
	
}

$did = 7; //$_REQUEST['did'];
$score = 690; //$_REQUEST['score'];
$max_payment = 350; //$_REQUEST['max_payment'];

$sqld = "SELECT * FROM dealer WHERE dealer_id = " . $did;
$queryd = mysql_query($sqld);	
$dealer = mysql_fetch_array($queryd);
/*
echo $dealer['dealer_id'] . '<br>';
echo $dealer['dealer_first_name'] . ' ' . $dealer['dealer_last_name'] . '<br>';
echo $dealer['dealer_company'] . '<br>';
*/
$sqly = "SELECT * FROM inventory WHERE dealer_id = " . $did;
$queryy = mysql_query($sqly);	
$inventory = mysql_fetch_array($queryy);

$sqly = "SELECT * FROM bank_year WHERE bank_year_start >= " . $score . " AND bank_year_end >= " . $score;
$queryy = mysql_query($sqly);	
$month_term = mysql_fetch_array($queryy);


/*
$sqlbr = "SELECT * FROM bank_rate WHERE dealer_id = " . $did;
$querybr = mysql_query($sqlbr);	
$bank_rate = mysql_fetch_array($querybr);
*/
$nada = ''; // value or cost
$with_fe = ''; // the value (nada) time the fe
$title_fee = '';
$tot_title_fee = ''; // with_fe minus title fee
$tax = ''; // percentage of sales tax
$tot_tax = ''; // the dollar amount of sales tax
$tot_after_tax = ''; // 
$doc_fee = '';
$tot_after_doc_fee = ''; // minus tax
$selling_price = '';

$front_gross = ''; // Or Profit: nada minus the selling price

$interest_rate = '';
$term = $month_term['bank_year_term'] / 12; // in months

$payment = '';

echo round(amort(10000,5.83333333333,3.25),2) . '<<<<<<<<<<<<<<<<<<<<br>';

echo 70 / 12;
?>
