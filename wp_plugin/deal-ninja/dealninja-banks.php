
  
    

<? if ($suc_mes != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes ?></p>
        </div>
<? } ?>
          <!-- Content Box Start -->
        <div class="contentcontainer med left">
<form action="index.php?/account/banks_manage" name="form_banks" id="form_banks" method="post" autocomplete="off">

            	<table width="100%">
<? if (!$bank_list) { ?>

                    	<tr>
                        	<td colspan="4">No Results</td>
                        </tr>
                        
<? } else { ?>                    

                	<thead>
                    	<tr>
                        	
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        	<th>&nbsp;</th>
                            <th>&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>                    
<?
$bgsw = 1;
$ctr = 0;
foreach ($bank_list as $bank_item): 

$sql = "SELECT * FROM bank_assignment WHERE dealer_id = " . $did . " AND bank_id = " . $bank_item['bank_id'];
$res = mysql_query($sql);
$ch = '';
if (mysql_num_rows($res)) {
	$ch = 'checked';
} 
?>
                
<? if ($bgsw == 1) { ?> 
                   	<tr>
                        	<td width="5%"><input type="checkbox" value="<?=$bank_item['bank_id'] ?>" name="cb_bank[]" id="cb_bank_<?= $ctr ?>" <?=$ch ?> /></td>
                        	<td><?=$bank_item['bank_name'] ?></td>

<? } else { ?>

                            <td width="5%"><input type="checkbox" value="<?=$bank_item['bank_id'] ?>" name="cb_bank[]" id="cb_bank_<?= $ctr ?>" <?=$ch ?> /></td>
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
endforeach 
?>                        
                        
<? } ?>
                    </tbody>
                </table>
 <br />
<br />
               
					<input id="dealers_submit" name="dealers_submit" type="button" value="  Assign Banks  " class="btn_fi" onclick="document.getElementById('form_banks').submit();">
                    <input name="act" type="hidden" value="bank_assignment" />
                    <input name="did" type="hidden" value="<?=$did ?>" />

</form>                
                
            </div>
        </div>
        <!-- Content Box End -->
        
    
        
        