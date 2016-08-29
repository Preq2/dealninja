
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Banks</a></li>
            <li>/</li>
            <li class="current">List Banks</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer">
            <div class="headings alt">
            <div style="float: left; display: inline; width: 50%;"><h2>Banks - List</h2></div>
            <div style="float: left; display: inline; width: 50%;">
            
            <ul class="pagination" style="margin-top:10px;">
            
            <li class="page"><a href="index.php?/administrator/banks_add" title=""><span style="font-size: 16px; text-shadow: 1px 1px 1px #666;">Add New</span></a></li></ul></div>
            <div style="clear:both;"></div>
                
            </div>
            <div class="contentbox" >
                <div id="sort_wrapper" style="width: 350px; float:right; display:inline;">
                    <form action="" method="post" name="search_banks" id="search_banks">
                    Find: <input type="text" id="search_keyword" name="search_keyword" class="inputbox"  placeholder="enter whole or part of Banks name" style="width: 230px; height: 18px; font-size:12px; padding: 6px;" /> <input type="submit" value="Search" class="btn_alt" />
                    <input name="act" type="hidden" value="search" />
                    </form>
                </div>            
                <!--div id="search_wrapper" style="width: 340px; float:right; display:inline; text-align:left;">
                    <form action="" method="post" name="search_banks" id="search_banks">
                    Sort by: 
                    <select id="sort_keyword" name="sort_keyword">
                    <option value="all">Show All</option>
                    <option value="alerts_type">Show Alert - Missing Type</option>
                    </select>
                    
                     <input type="submit" value="Sort" class="btn_alt" />
                    <input name="act" type="hidden" value="sort" />
                    </form>
                </div-->            

                
                <div style="clear:both;"></div>
            
            </div>
            
        </div>
        <!-- Content Box End -->
<? if ($suc_mes != '') { ?>
        <div class="status success">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="./images/icons/icon_success.png" alt="Success" /><span>Success!</span> <?=$suc_mes ?></p>
        </div>
<? } ?>
 <!-- Alternative Content Box Start -->
         <div class="contentcontainer">
            <div class="headings altheading">
                <h2>Results</h2>
            </div>
            
            <div class="contentbox">

<div class="pagination_wrapper">
<?=$pagination?>
</div>
         
            	<table width="100%">

                    
<? if (!$bank_list) { ?>

                    	<tr>
                        	<td colspan="4">No Results</td>
                        </tr>
                        
<? } else { ?>                    

                	<thead>
                    	<tr>
                        	
                            <th>ID</th>
                            <th>Name</th>
                        	<th>Address</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>                    
<?
$bgsw = 1;
$ctr = 0;
foreach ($bank_list as $bank_item): 

	if ($bgsw == 1){
		$bg = '';
		$bgsw = 0;
	} else {
		$bg = ' class="alt"';
		$bgsw = 1;
	}
	
?>
                    
                    	<tr<?=$bg  ?>>
                        	
                            <td><?= $bank_item['bank_id'] ?></td>
                        	<td><?=$bank_item['bank_name'] ?></td>
                            <td>
							<? 
							echo $bank_item['bank_address1']; 
							if ($bank_item['bank_address2'] != '') {
								echo ', ' . $bank_item['bank_address2']; 
							}
							echo '<br />' . $bank_item['bank_city'] . ', ';
							echo $bank_item['bank_state'] . ' ';
							echo $bank_item['bank_zip'] . ' ';
							?>
                            
                            </td>
                            <td><?= $bank_item['bank_phone'] ?></td>
                            <td>
                            	<a href="index.php?/administrator/banks_edit/<?= $bank_item['bank_id'] ?>" title=""><img src="./images/icons/icon_edit.png" alt="Edit" /></a>&nbsp;&nbsp;&nbsp;
                            	<a href="index.php?/administrator/banks_rates/<?= $bank_item['bank_id'] ?>" title=""><img src="./images/icons/icon_chart.png" alt="Edit" /></a>&nbsp;&nbsp;&nbsp;
                                <a href="index.php?/administrator/banks_del/<?= $bank_item['bank_id'] ?>" title=""><img src="./images/icons/icon_delete.png" alt="Delete" onclick="return confirm('Are you sure you wish to delete this bank?');" /></a>
                            </td>
                            
                        </tr>
                        
<?php
$ctr++;
endforeach 
?>                        
                        
<? } ?>
                    </tbody>
                </table>
<? if ($bank_list) { ?>

<div class="extrabottom" style="padding-top:20px;">
                                       
               
                
                <div class="bulkactions">
                    <ul>
                        <li>&nbsp;&nbsp;<img src="./images/icons/icon_edit.png" alt="Edit" /> Edit</li>
                        <li><img src="./images/icons/icon_chart.png" alt="Matrics" /> Manage Metrics</li>
                        <!--li><img src="./images/icons/icon_unapprove.png" alt="Unapprove" /> Unapprove</li-->
                        <li>&nbsp;&nbsp;<img src="./images/icons/icon_delete.png" alt="Delete" /> Remove</li>
                    </ul>

                </div>
                <div style="clear: both;"></div>
                <!--ul class="pagination">
                	<li class="text">Previous</li>
                    <li class="page"><a href="#" title="">1</a></li>
                    <li><a href="#" title="">2</a></li>
                    <li><a href="#" title="">3</a></li>
                    <li><a href="#" title="">4</a></li>
                    <li class="text"><a href="#" title="">Next</a></li>
                </ul-->
</div>
                        
<? } ?>                 


            </div>
            
        </div>
        <!-- Alternative Content Box End -->
        
    
        
        