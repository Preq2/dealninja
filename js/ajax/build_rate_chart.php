<?
include_once('_connect.php');
/**/


$sqlbs = "SELECT * FROM bank_score WHERE bank_id = " . $_REQUEST['bid'] . " ORDER BY bank_score_end DESC";
$querybs = mysql_query($sqlbs);	
?>


<form action="index.php?/administrator/banks_metrics/<?=$bank['bank_id'] ?>" name="form_banks_rates" id="form_banks_rates" method="post" autocomplete="off"> 
<table class="rates_chart">

<?
if (!mysql_num_rows($querybs)) {
?>
<tr><td><h2>Not Yet Available</h2></td></tr>
<?	
} else {

?>
                    
<thead>                     
<tr>
<th></th>
<?
$ctr = 0;
while ($bs = mysql_fetch_array($querybs)) {
	if ($bs['bank_score_start'] == 1000) {
		$bss = '<';
	} else {
		$bss = $bs['bank_score_start'];
	}
	if ($bs['bank_score_end'] == 0) {
		$bse = '>';
	} else {
		$bse = $bs['bank_score_end'];
	}
	$arr_fe[$ctr] = $bs['bank_score_fe'];
	$arr_be[$ctr] = $bs['bank_score_be'];
	$arr_scid[$ctr] = $bs['bank_score_id'];
?>

<th style="	text-align:center;"><?=$bss ?> - <?=$bse ?></th>

<?	
$ctr++;
}
?>
</tr>
</thead>

<tbody>
<tr>
<td style="	background: #000;color: #CCC;text-align:right;border: #fff solid 1px; font-weight:bold;">Front_End Advance</td>
<?
for ($i=0;$i<$ctr;$i++) {
	if ($arr_fe[$i] == 0.0000) {
		$fe = '';
	} else {
		$fe = $arr_fe[$i];
	}
	
?>

<td style="	background: #000;color: #CCC;text-align:center;border: #fff solid 1px;"><?=$fe ?></td>

<?	
}
?>
</tr>
<tr>
<td style="	background: #000;color: #CCC;text-align:right;border: #fff solid 1px; font-weight:bold;">Back_End</td>
<?
for ($i=0;$i<$ctr;$i++) {
	if ($arr_be[$i] == 0.0000) {
		$be = '';
	} else {
		$be = $arr_be[$i];
	}
?>

<td style="	background: #000;color: #CCC;text-align:center;border: #fff solid 1px;"><?=$be ?></td>

<?	
}
?>
</tr>


<?
$sqlby = "SELECT * FROM bank_year WHERE bank_id = " . $_REQUEST['bid'] . " ORDER BY bank_year_end DESC";
$queryby = mysql_query($sqlby);	


if (mysql_num_rows($queryby)) {
?>
<tr>
<td style="	background: #999;" colspan="<?=$ctr + 1 ?>">&nbsp;</td>
</tr>

<tr>
<td style="width:170px;">
<div style="float:left; display: inline; width:80px; border-bottom: #000 solid 1px;">Model Year</div>
<div style="float:left; display: inline; width:80px; text-align:center; border-bottom: #000 solid 1px;">Max. Term</div>
<div style="clear:both;"></div>
</td>
<td style="	background: #999;" colspan="<?=$ctr?>">&nbsp;</td>
</tr>

<?		
	$rvtr = 0;
	while ($by = mysql_fetch_array($queryby)) {
?>
<tr>

<td>
<div style="float:left; display: inline; width:80px;"><?=$by['bank_year_start'] ?> - <?=$by['bank_year_end'] ?></div>
<div style="float:left; display: inline; width:80px; text-align:center;"><?=$by['bank_year_term'] ?></div>
<div style="clear:both;"></div>
</td>
<?
for ($i=0;$i<$ctr;$i++) {
?>
<td style="text-align:center;border: #666 solid 1px;"><input name="rate_<?=$by['bank_year_id'] ?>_<?=$arr_scid[$ctr] ?>" type="text" style="width:100%" /></td>
<?	
$rvtr++;
}
?>
</tr>
<?	
	}
} // end by
?>

</tbody>

<?	
} // if bs
?>



</table>
<? if (mysql_num_rows($querybs) && mysql_num_rows($queryby)) { ?>
<br />
<br />

	<input id="banks_rates_submit" name="banks_rates_submit" type="button" value="  Edit Rates  " class="btn_fi" onClick="val_banks_rates(<?=$rvtr ?>);">
    <input name="act" type="hidden" value="edit_rates" />
    <input name="rvtr" type="hidden" value="<?=$rvtr ?>" />
</form> 
<? } ?>