
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator</a></li>
            <li>/</li>
            <li class="current">List Administrator Users</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer">
            <div class="headings alt">
            <div style="float: left; display: inline; width: 50%;"><h2>Administrator Users - List</h2></div>
            <div style="float: left; display: inline; width: 50%;">
            
            <ul class="pagination" style="margin-top:10px;">
            
            <li class="page"><a href="index.php?/administrator/users_add" title=""><span style="font-size: 16px; text-shadow: 1px 1px 1px #666;">Add New</span></a></li></ul></div>
            <div style="clear:both;"></div>
                
            </div>
            <div class="contentbox" style="text-align:right;">
            	<form action="" method="post" name="search_users" id="search_users">
                Find: <input type="text" id="search_keyword" name="search_keyword" class="inputbox"  placeholder="enter whole or part of last name" style="width: 220px; height: 18px; font-size:12px; padding: 6px;" /> <input type="submit" value="Search" class="btn_alt" />
                <input name="act" type="hidden" value="search" />
                </form>
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
            <form action="index.php?/administrator/email_compose" name="bulk_process" id="bulk_process" method="post">
            	<table width="100%">

                    
<? if (!$user) { ?>

                    	<tr>
                        	<td colspan="4">No Results</td>
                        </tr>
                        
<? } else { ?>                    

                	<thead>
                    	<tr>
                        	<!--th><input name="" type="checkbox" value="" id="checkboxall" onchange="check_all_boxes();" /></th-->
                            <th>ID</th>
                        	<th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>                    
<?
$bgsw = 1;
$ctr = 0;
foreach ($user as $user_item): 

	if ($bgsw == 1){
		$bg = '';
		$bgsw = 0;
	} else {
		$bg = ' class="alt"';
		$bgsw = 1;
	}
?>
                    
                    	<tr<?=$bg  ?>>
                        	<!--td><input type="checkbox" value="<?= $user_item['user_id'] ?>" name="cb_email[]" id="cb_email_<?= $ctr ?>" /></td-->
                            <td><?= $user_item['user_id'] ?></td>
                        	<td><?= $user_item['user_last_name'] ?>, <?=$user_item['user_first_name'] ?></td>
                            <td><a href="mailto:<?=$user_item['user_email'] ?>" class="darker"><?=$user_item['user_email'] ?></a></td>
                            <td>
                            	<a href="index.php?/administrator/users_edit/<?= $user_item['user_id'] ?>" title=""><img src="./images/icons/icon_edit.png" alt="Edit" /></a>&nbsp;&nbsp;&nbsp;

                                <a href="index.php?/administrator/users_del/<?= $user_item['user_id'] ?>" title=""><img src="./images/icons/icon_delete.png" alt="Delete" onclick="return confirm('Are you sure you wish to delete this user?');" /></a>
                            </td>
                            
                        </tr>
                        
<?php
$ctr++;
endforeach 
?>                        
                        
<? } ?>
                    </tbody>
                </table>
<? if ($user) { ?>

<div class="extrabottom" style="padding-top:20px;">
                        <!--input type="button" value="Email Selected" class="btn_fi" onclick="val_email_selected('bulk_process')"/-->                
               
                
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

                </form>
            </div>
            
        </div>
        <!-- Alternative Content Box End -->
        
    
        
        