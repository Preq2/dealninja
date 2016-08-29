<?

?>
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="./images/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Administrator</a></li>
            <li>/</li>
            <li class="current">Dashboard</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->


    <!-- Right Side/Main Content Start -->
    <div id="rightside_container" style=" background:#eaeaea;padding-top: 20px;">
    <div id="rightside">
    
  
    
        <!-- Content Box Start -->
        <div class="contentcontainer med left">
            <div class="headings alt">
                <h2>Notices</h2>
            </div>
            <div class="contentbox">
<?
$has_notices = 0;
?>
<div class="dash_containers">
<div class="dash_top">
<br />

<? if (!$has_notices) { ?>

<h3 style="color:#76414a;">Congradulations <?=$this->session->userdata('user_name') ?>! </h3> 
<p>
You have no currenct notices or alerts that need your immediate attention.</p>
<br />
<br />

<p>This is the Admin Dashboard and can contain any information we can derive from the data. Usually this includes Alerts and Notices and similar. If you don't want or need the dashboard view then we can make your default landing page some other view.</p>

<? } else { ?>

<h3 style="color:#76414a;">Attention <?=$this->session->userdata('user_name') ?>! </h3> 
<p>
You have one or more problems or alerts that require your immediate attention. See the following:</p>

<? } ?>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />


</div>
<div class="dash_bot" style="background: #FC708B">

</div>
</div>

<div class="dash_containers">
<div class="dash_top">



</div>
<div class="dash_bot" style="background: #FC708B">

</div>
</div>

<div class="dash_containers">
<div class="dash_top">
<br />
<br />
<br />


</div>
<div class="dash_bot" style="background: #FC708B">

</div>
</div>

<div style="clear:both;"></div> 

<!--div class="spacer"></div-->


 
            


    
            	
            </div>
        </div>
        <!-- Content Box End -->

        <!-- Content Box Start -->
        <div class="contentcontainer sml right">
            <div class="headings alt">
                <h2>Stats</h2>
            </div>
            <div class="contentbox">

<div style="text-align:left; line-height:24px;">
<br />

<br />
<h1>No stats at this time.</h1>

<br />
<br />

<br />
<br />

</div>



<br />
<br />
<br />
<br />
<br />
<br />
        
<br />
<br />

<div class="spacer"></div> 
<br />

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
            	
            </div>
        </div>
        <!-- Content Box End -->






