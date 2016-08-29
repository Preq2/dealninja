
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Inventory</a></li>
            <li>/</li>
            <li class="current">List Inventory</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer">
            <div class="well">
            <div style="float: left; display: inline; width: 50%;"><h2>Inventory - List</h2></div>
            <div style="float: left; display: inline; width: 50%;">
            
            <ul class="pagination" style="margin-top:10px;">
            
            	<li class="page"><a class="btn btn-info" href="index.php?/account/inventory_add/<?=$did ?>" title="">
                    <span style="font-size: 16px; text-shadow: 1px 1px 1px #666;">Add New</span></a></li>
            </ul>
            </div>
            <div style="clear:both;"></div>
                
            </div>
            <div class="contentbox hide" >
                <!--div id="sort_wrapper" style="width: 350px; float:right; display:inline;">
                    <form action="" method="post" name="search_Inventory" id="search_Inventory">
                    Find: <input type="text" id="search_keyword" name="search_keyword" class="inputbox"  placeholder="enter whole or part of Inventory name" style="width: 230px; height: 18px; font-size:12px; padding: 6px;" /> <input type="submit" value="Search" class="btn_alt" />
                    <input name="act" type="hidden" value="search" />
                    </form>
                </div>            
                <div id="search_wrapper" style="width: 340px; float:right; display:inline; text-align:left;">
                    <form action="" method="post" name="search_Inventory" id="search_Inventory">
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
            <div class="well well-sm">
                Results
            </div>
            
            <div class="contentbox">

<div class="pagination_wrapper">
<?=$pagination?>
</div>
         
            	<table width="100%" class="table table-hover">

                    
<? if (!$inventory_list) { ?>

                    	<tr>
                        	<td colspan="4">No Results</td>
                        </tr>
                        
<? } else { ?>                    

                	<thead>
                    	<tr>
                        	
                            <th>STK #</th>
                            <th>Name</th>
                        	<th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>NADA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>                    
<?
$bgsw = 1;
$ctr = 0;
foreach ($inventory_list as $inventory_item): 

	if ($bgsw == 1){
		$bg = '';
		$bgsw = 0;
	} else {
		$bg = ' class="alt"';
		$bgsw = 1;
	}
	
?>
                    
                    	<tr<?=$bg  ?>>
                        	
                            <td><?= $inventory_item['inventory_stk'] ?></td>
                        	<td><?=$inventory_item['inventory_name'] ?></td>
                            <td><?=$inventory_item['inventory_make'] ?></td>
                            <td><?=$inventory_item['inventory_model'] ?></td>
                            <td><?=$inventory_item['inventory_year'] ?></td>
                            <td><?=$inventory_item['inventory_nada'] ?></td>
                            <td>
                            	<a href="index.php?/administrator/inventory_edit/<?= $inventory_item['inventory_id'] ?>" title=""><img src="./images/icons/icon_edit.png" alt="Edit" /></a>&nbsp;&nbsp;&nbsp;

                                <a href="index.php?/administrator/inventory_del/<?= $inventory_item['inventory_id'] ?>" title=""><img src="./images/icons/icon_delete.png" alt="Delete" onclick="return confirm('Are you sure you wish to delete this inventory?');" /></a>
                            </td>
                            
                        </tr>
                        
<?php
$ctr++;
endforeach 
?>                        
                        
<? } ?>
                    </tbody>
                </table>
<? if ($inventory_list) { ?>

<div class="extrabottom" style="padding-top:20px;">
                                       
               
                
                <div class="bulkactions">
                    <ul>
                        <li>&nbsp;&nbsp;<img src="./images/icons/icon_edit.png" alt="Edit" /> Edit</li>
                        <!--li><img src="./images/icons/icon_approve.png" alt="Approve" /> Approve</li>
                        <li><img src="./images/icons/icon_unapprove.png" alt="Unapprove" /> Unapprove</li-->
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
        
    
        
        