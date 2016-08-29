    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Banks</a></li>
            <li>/</li>
            <li class="current">Rates</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->
<div id="rightside_container" style="width:95%">
<div id="rightside">
<h3><?=$bank['bank_name']?></h3>
	<a  href="index.php?/administrator/banks_rates_add/<?=$bank['bank_id']?>" 
		  class="btn btn-info glyphicon glyphicon-plus" style="font-family:arial"> RATE  </a>
<br/>
<br/>
<div class="container" style="margin:0px;width:100%">
	<div class="row">
<?
$sqlbs = "SELECT * FROM bank_rate_grid WHERE bank_id = " . $bank['bank_id'] . "  ORDER BY brg_tier_name";
$queryrates = mysql_query($sqlbs);	

$i =-1;
 while ($brg = mysql_fetch_object($queryrates)){

 	$i++;
 

?>
 
   <div class="col-md-3 col-sm-6">
     <div  class="panel panel-default">
     <div class="panel-heading">
       <div class="panel-title"> <?=$brg->brg_tier_name?></div>
  </div>
    <div class="panel-body">

     <table style="width:100%; font-size:8pt; font-family:arial">
       <tr>
       	<td width="75%">Rate %:</td> <td><?=$brg->brg_rate?></td>
       	</tr>
       	<tr>
       	<td>Term:</td> <td><?=$brg->brg_term ?></td>
       	</tr>
        <tr>
        <td>Min Loan Amount:</td> <td><?=$brg->brg_min_loan ?></td>
        </tr>
       	<tr>
       	<td>Score Start:</td> <td><?=$brg->brg_score_start?></td>
       	</tr>
       	<tr>
       	<td>Score End:</td> <td> <?=$brg->brg_score_end?></td>
       	</tr>
       	<tr>
       	<td>Model Year Start:</td> <td><?=$brg->brg_model_year_start?></td>
       	</tr>
       	<tr>
       	<td>Model Year End:</td> <td><?=$brg->brg_model_year_end?></td>
       	</tr>
       	<tr>
       	<td>Mileage Start:</td> <td><?=$brg->brg_mileage_start?></td>
       	</tr>
       	<tr>
       	<td>Mileage End</td> <td><?=$brg->brg_mileage_end?></td>
       	</tr>
       	
       	<tr>
       	<td>FE %</td> <td><?=$brg->brg_FE_percent?></td>
       	</tr>
       	<tr>
       	<td>FE Max($):</td> <td><?=$brg->brg_FE_cap?></td>
       	</tr>
       	<tr>
       	<td>BE %</td> <td><?=$brg->brg_BE_percent?></td>
       	</tr>
       	<tr>
       	<td>BE Max($):</td> <td><?=$brg->brg_BE_cap?></td>
       	</tr>
       	
       	
       	
     </table>
	</div>

	<div class="panel-footer">
		<a class="btn btn-default"  href="index.php?/administrator/banks_rates_edit/<?=$brg->id_bank_rate_grid?>"   > Edit</a>
		<a class="btn btn-success" onClick="alert('coming soon');" href="index.php?/administrator/banks_rates_copy/<?=$brg->id_bank_rate_grid?>"   > Copy</a>
    <br> <br>
    <a class="btn btn-danger"  href="index.php?/administrator/banks_rates_del/<?=$brg->id_bank_rate_grid?>" 	> Delete</a>
	</div>
   </div>
</div>
  

<?

}

?>
</div> 
</div>
</div>
</div>





