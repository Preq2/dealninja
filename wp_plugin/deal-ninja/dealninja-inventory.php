<?php
 require_once('_connect.php');

if (!isset($_SESSION['did'])) {
   require_once('_connect.php');

   $sqlDID = "Select dealer_id from user  inner join dealer on dealer.user_id = user.user_id where user_email='" . $current_user->user_email . "'";
   $dn_query = mysql_query($sqlDID);
   $dn_obj = mysql_fetch_object($dn_query);
   $_SESSION['did'] = $dn_obj->dealer_id;
 }
 $did = $_SESSION['did'];


//-echo $did;

$invSQL = "select * from inventory where dealer_id = " . $did;
//echo $invSQL;
$dn_query = mysql_query($invSQL);




 ?>

 <table class="nz-table">
 	<thead style="color:#90c857">
 		<tr>
	 		<th>Stock #</th>
	 		<th>Name</th>
	 		<th>Make</th>
	 		<th>Model</th>
	 		<th>Year</th>
	 		<th>Mileage</th>
	 		<th>NADA</th>
	 		<th></th>
 		</tr>
 	</thead>
 	<tbody>
     <?php

     	while ($dn_obj = mysql_fetch_object($dn_query)) {
     		$inv_row .= "<tr>";
     		$inv_row .= "<td>$dn_obj->inventory_stk</td>";
     		$inv_row .= "<td>$dn_obj->inventory_name</td>";
     		$inv_row .= "<td>$dn_obj->inventory_make</td>";
     		$inv_row .= "<td>$dn_obj->inventory_model</td>";
     		$inv_row .= "<td>$dn_obj->inventory_year</td>";
     		$inv_row .= "<td>$dn_obj->inventory_odometer</td>";
     		$inv_row .= "<td>$dn_obj->inventory_nada</td>";
     		$inv_row .= "<td> <a href='?id=32&action=edit'>edit</a></td>";
     		$inv_row .= "</tr>"; 
     	}
     	echo $inv_row;
		mysql_free_result($dn_query)
     ?>
 	</tbody>

 </table>