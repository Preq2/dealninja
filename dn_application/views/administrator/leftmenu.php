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
            <p class="username" style="color: #ccc;">Administrator</p>
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
                    <li><a href="<?=base_url() ?>index.php?/administrator/dashboard" title="goto dashboard">Dashboard</a></li>
                    <li><a href="<?=base_url() ?>index.php?/administrator/users_list" title="list/edit/delete">Administrators</a></li>
                    
                </ul>
            </li>
            <li>
                <a class="expanded heading">Dealers</a>
                 <ul class="navigation">
                    <li><a href="<?=base_url() ?>index.php?/administrator/dealers_list" title="">&nbsp;&nbsp;&nbsp;&nbsp;Dealers List</a></li>
                    <li><a href="<?=base_url() ?>index.php?/administrator/dealers_add" title="">&nbsp;&nbsp;&nbsp;&nbsp;Dealers Add New</a></li>
                </ul>
            </li>
            <li>
                <a class="expanded heading">Banks</a>
                 <ul class="navigation">
                    <li><a href="<?=base_url() ?>index.php?/administrator/banks_list" title="">&nbsp;&nbsp;&nbsp;&nbsp;Banks List</a></li>
                    <li><a href="<?=base_url() ?>index.php?/administrator/banks_add" title="">&nbsp;&nbsp;&nbsp;&nbsp;Banks Add New</a></li>
                </ul>
            </li>            
        	<li>
                <ul class="navigation">

                    <li><a href="<?=base_url() ?>index.php?/administrator/settings" title="">System Configuration</a></li>
                    <li><a href="<?=base_url() ?>index.php?/caspio_pull" title="">Caspio Pull</a></li>
                      
                </ul>
            </li>
            
          
          
        </ul>
       
        
<br />
<br />
<br />
<br />
<br />
<span style="color: #333;">

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
</span>     
 
        
        
    </div>
    <!-- Left Dark Bar End --> 
    

    


    






</body>
</html>