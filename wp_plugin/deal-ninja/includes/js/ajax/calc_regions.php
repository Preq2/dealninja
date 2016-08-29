<?
include_once('_connect.php');
/**/
$sqld = "SELECT * FROM dealer WHERE dealer_id = '" . $_REQUEST['did'];
$queryd = mysql_query($sqld);	
$dealer = mysql_fetch_row($queryd);

echo $dealer['dealer_id'] . '<br>';
echo $dealer['dealer_first_name'] . ' ' . $dealer['dealer_last_name'] . '<br>';
echo $dealer['dealer_company'] . '<br>';
?>
