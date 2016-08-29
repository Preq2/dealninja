<?
$level = $this->session->userdata('user_level');
?>
<div id="leftside_min" style="display:none;"> 
	<div id="hide_menu"><a href="#menu" class="menu_s"><img src="<?=base_url() ?>images/icon_bs_menu.png" /></a></div>
</div> 

        <!-- Left Dark Bar Start -->
    <div id="leftside">
    	<div class="user">
        
        <div id="hide_menu" style="width: 22px; float:right; display:inline;"><a href="#menu" class="menu_h"><img src="<?=base_url() ?>images/icon_bs_menu.png" /></a></div>
        
        	<h2 class="leftmenu" style="margin-bottom: 14px;"><span class="welcome_label">Welcome</span><br /><?=$this->session->userdata('user_name') ?></h2>
            
            <p>You are logged in as:</p>
            <div style="margin: 6px 0px 6px 0px;">
            <p class="username" style="color: #ccc;">A Dealer</p>
			</div>
            <div style="text-align:right;">
            <p class="userbtn" style="float:right;"><a href="<?=base_url() ?>index.php?/login/logout" title="">Log out</a></p>
            <p class="userbtn" style="float:right;"><a href="<?=base_url() ?>index.php?/administrator/users_edit/<?=$this->session->userdata('user_id') ?>" title="">Profile</a></p>
            
            </div>
        </div>

        <div class="notifications">
<br />
<br />

        </div>        
        
        <ul id="nav">

        	<li>
                <ul class="navigation">
                    <li><a href="<?=base_url() ?>index.php?/account/dashboard_<?=$level ?>" title="">Dashboard</a></li>
                   
                </ul>
            </li>

            <li>
                <a class="expanded heading">My Inventory</a>
                 <ul class="navigation">
                    <li><a href="<?=base_url() ?>index.php?/account/inventory_list" title="View Inventory">&nbsp;&nbsp;&nbsp;&nbsp;View Inventory</a></li>
                    <li><a href="<?=base_url() ?>index.php?/account/inventory_add" title="Add Inventory">&nbsp;&nbsp;&nbsp;&nbsp;Add Inventory</a></li>
                    <!--li><a href="<?=base_url() ?>index.php?/account/inventory_csv" title="CSV Import / Export">&nbsp;&nbsp;&nbsp;&nbsp;CSV Import / Export</a></li-->
                </ul>
            </li>  
             <li>
                <a class="expanded heading">Calculators</a>
                 <ul class="navigation">
                    <li><a href="<?=base_url() ?>index.php?/account/cal_have_pay_stub" title="Have Pay Stub">&nbsp;&nbsp;&nbsp;&nbsp;Have Pay Stub</a></li>
                    <li><a href="<?=base_url() ?>index.php?/account/cal_hourly" title="Hourly">&nbsp;&nbsp;&nbsp;&nbsp;Hourly</a></li>
                     <li><a href="<?=base_url() ?>index.php?/account/cal_salary" title="Salary">&nbsp;&nbsp;&nbsp;&nbsp;Salary</a></li>
                      <li><a href="<?=base_url() ?>index.php?/account/cal_back_into_sale" title="">&nbsp;&nbsp;&nbsp;&nbsp;Back Into Sale</a></li>
                    <!--li><a href="<?=base_url() ?>index.php?/account/inventory_csv" title="CSV Import / Export">&nbsp;&nbsp;&nbsp;&nbsp;CSV Import / Export</a></li-->
                </ul>
            </li> 
            <li>
                <a class="expanded heading">My Banks</a>
                 <ul class="navigation">
                     <li><a href="<?=base_url() ?>index.php?/account/banks_manage" title="">&nbsp;&nbsp;&nbsp;&nbsp;Rate Sheets</a></li>
                    <li><a href="<?=base_url() ?>index.php?/account/banks_manage" title="">&nbsp;&nbsp;&nbsp;&nbsp;Manage Banks</a></li>
                </ul>
            </li>            

            <li>
                <a class="expanded heading">Archive</a>
                 <ul class="navigation">
                    <li><a href="#" title="">&nbsp;&nbsp;&nbsp;&nbsp;View Saved Reports</a></li>
                </ul>
            </li>
         
        </ul>
       
        
<br />
<br />
<br />
<br />
<br />
<!--span style="color: #333;">

<br />

This is debug text and will be removed at the end of development<br />
<br />

<?
echo 'user id = ' . $this->session->userdata('user_id'); 
echo '<br> dealer id = ' . $this->session->userdata('dealer_id'); 
echo '<br> level id = ' . $this->session->userdata('user_level_id'); 
echo '<br> level = ' . $this->session->userdata('user_level'); 
echo '<br> name = ' . $this->session->userdata('user_name'); 

?>
</span-->     
 
        
        
    </div>
    <!-- Left Dark Bar End --> 
    

    


    






</body>
</html>


