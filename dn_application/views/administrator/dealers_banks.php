
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Dealers</a></li>
            <li>/</li>
            <li class="current">Assign Banks</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer sml left">
            <div class="headings alt">
                <h2>Dealer</h2>
            </div>
            <div class="contentbox">

 <br />
<br />
                      
                        <h3 style="color:#76414a;"> <?=$dealer['dealer_first_name'] ?> <?=$dealer['dealer_last_name'] ?></h3>
<br />


                        <h3 style="color:#76414a;"> <?=$dealer['dealer_company'] ?></h3>
<br />

                        <div> <?=$dealer['dealer_address1'] ?></div>



                        <? if ($dealer['dealer_address2'] != '') { ?>

                        <div> <?=$dealer['dealer_address2'] ?></div>  

                                  
                        <? } ?>

                        <div> <?=$dealer['dealer_city'] ?>, <?=$dealer['dealer_state'] ?> <?=$dealer['dealer_zip'] ?></div>
<br />

                        <div> <?=$dealer['dealer_phone'] ?></div>
<br />

                        <div> <?=$dealer['dealer_email'] ?></div>



                
                
                
                
            </div>
        </div>
        <!-- Content Box End -->

 
         <!-- Content Box Start -->
        <div class="contentcontainer med right">
            <div class="headings alt">
                <h2>Assign Banks</h2>
            </div>
            <div class="contentbox">                
<br />
<br />
<form action="index.php?/administrator/dealers_list" name="form_banks" id="form_banks" method="post" autocomplete="off">

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

$sql = "SELECT * FROM bank_assignment WHERE dealer_id = " . $dealer['dealer_id'] . " AND bank_id = " . $bank_item['bank_id'];
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
                    <input name="did" type="hidden" value="<?=$dealer['dealer_id'] ?>" />

</form>                
                
            </div>
        </div>
        <!-- Content Box End -->
