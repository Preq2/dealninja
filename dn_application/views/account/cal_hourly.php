  <style>
   input[type="text"]{ 
    width: 96%;
	height: 100%;
	border: none; 
	background-color: transparent;
   }
   
   .bg_color_yellow {
    background-color: #FFFF00;
   }
   
   .bg_color_darkyellow {
    background-color: #FFE699;
   }   

   .bg_color_yellow {
    background-color: #FFFF00;
   }

   .bg_color_gray {
    background-color: #D0CECE;
   }
   
   .bg_color_blue {
    background-color: #9DC3E6;
   }   
   
   .bg_color_green {
    background-color: #C5E0B4;
   }     
   
   .calc_container {
    width: 600px;
	margin: auto;
   }

  </style>
  <script type="text/javascript">
  
   function round(x){
    return Math.round(x);
   } 
  
  function ToExcelDate(x) {
   unix = Math.round(+new Date(x)/1000);
   excel = round(25569 + (unix / 86400));
   return round(excel);
  }   
  
   function get_field_data(x){
    return Number(document.getElementById(x).value);
   }

   function get_field_text_data(x){
    return document.getElementById(x).value;
   }   
   
   function set_field_data(x,y){
    document.getElementById(x).value = y;
    return true;
   }  
   

   function calculate() {

   	//ToExcelDate('Jan 31, 2016');

   	// Field 2
   	field2 = ToExcelDate(get_field_text_data("calc_field_9")) - get_field_data("calc_field_1");
   	set_field_data("calc_field_2", field2);
   	// End field 2 //     

   	// Field 3
   	field3 = get_field_data("calc_field_2") / 7;
   	set_field_data("calc_field_3", field3.toFixed(3));
   	// End field 3 //      

   	// Field 4
   	field4 = get_field_data("calc_field_8") / get_field_data("calc_field_3");
   	set_field_data("calc_field_4", round(field4));
   	// End field 4 //   

   	// Field 5
   	field5 = get_field_data("calc_field_4") * 4.33;
   	set_field_data("calc_field_5", round(field5));
   	// End field 5 //   

   	// Field 12
   	field12 = (get_field_data("calc_field_8") / get_field_data("calc_field_3") * 4.33) + get_field_data("calc_field_10");
   	set_field_data("calc_field_12", round(field12));
   	// End field 12 //

   	// Field 13
   	field13 = get_field_data("calc_field_12") + get_field_data("calc_field_11");
   	set_field_data("calc_field_13", round(field13));
   	// End field 13 //	

   	// Field 14
   	field14 = get_field_data("calc_field_12") * get_field_data("calc_field_6");
   	if (get_field_data("calc_field_12") < get_field_data("calc_field_7")) {
   		field14 = 0;
   	}
   	set_field_data("calc_field_14", round(field14));
   	// End field 14 //	

   	// Field 15
   	field15 = get_field_data("calc_field_13") * get_field_data("calc_field_6");
   	if (get_field_data("calc_field_13") < get_field_data("calc_field_7")) {
   		field15 = 0;
   	}
   	set_field_data("calc_field_15", round(field15));
   	// End field 15 //

   	// Field 20
   	field20 = (get_field_data("calc_field_16") * 173.33) + (get_field_data("calc_field_17") * get_field_data("calc_field_16") * 1.5 * 4.33) + get_field_data("calc_field_18");
   	set_field_data("calc_field_20", round(field20));
   	// End field 20 //	

   	// Field 21
   	field21 = get_field_data("calc_field_20") + get_field_data("calc_field_19");
   	set_field_data("calc_field_21", round(field21));
   	// End field 21 //	

   	// Field 22
   	field22 = get_field_data("calc_field_20") * get_field_data("calc_field_6");
   	if (get_field_data("calc_field_20") < get_field_data("calc_field_7")) {
   		field22 = 0;
   	}
   	set_field_data("calc_field_22", round(field22));
   	// End field 22 //	

   	// Field 22
   	field23 = get_field_data("calc_field_21") * get_field_data("calc_field_6");
   	if (get_field_data("calc_field_21") < get_field_data("calc_field_7")) {
   		field23 = 0;
   	}
   	set_field_data("calc_field_23", round(field23));
   	// End field 23 //		

   } 

   </script>
<div class="calc_container">
 <table width="600" border="1" style="display: none;">
  <tr>
   <td width="80%">Dec 31st of prior year</td>
   <td><input id="calc_field_1" type="text" value="42369"></td>
  </tr>
  <tr>
   <td width="80%">Numer of days between Pay period ending and Dec 31st of prior year</td>
   <td><input id="calc_field_2" type="text" value="31"></td>
  </tr>  
  <tr>
   <td width="80%">Number of weeks in current paystub</td>
   <td><input id="calc_field_3" type="text"></td>
  </tr>  
  <tr>
   <td width="80%">Income per week</td>
   <td><input id="calc_field_4" type="text"></td>
  </tr>  
  <tr>
   <td width="80%">Multiply by 4.33</td>
   <td><input id="calc_field_5" type="text"></td>
  </tr>    
 </table>
 
 
 <table class="table table-bordered">
  <tr>
   <td width="80%">Payment to income</td>
   <td class="bg_color_green"><input id="calc_field_6" class="form-control" type="text" value="0.18"></td>
  </tr>
  <tr>
   <td width="80%">Min income</td>
   <td class="bg_color_green"><input id="calc_field_7" class="form-control" type="text" value="1800"></td>
  </tr>  
 </table>
 
 
 <table class="table table-bordered" style="display: none;">
  <tr>
   <td class="bg-primary" width="80%">Do you have a recent (within 30 days) paystub?</td>
   <td class="bg-primary">Inputs</td>
  </tr>
  <tr>
   <td width="80%">YTD on your most current paystub?</td>
   <td class="bg_color_blue"><input class="bg_color_blue form-control" id="calc_field_8" type="text" value="1600"></td>
  </tr>  
  <tr>
   <td width="80%">Pay period ending</td>
   <td class="bg_color_blue"><input class="bg_color_blue form-control" id="calc_field_9" type="text" value="1/31/2016"></td>
  </tr>  
  <tr>
   <td width="80%">Other monthly POI. SSI/ChildSupport </td>
   <td class="bg_color_blue"><input id="calc_field_10" class="form-control" type="text" value="350"></td>
  </tr>  
  <tr>
   <td width="80%">Other i.e. Mow lawns, babysit/ebay/misc</td>
   <td class="bg_color_blue"><input id="calc_field_11" class="form-control" type="text" value="150"></td>
  </tr>    
  <tr>
   <td class="bg_color_darkyellow" width="80%">Total Monthly POI</td>
   <td class="bg_color_darkyellow"><input id="calc_field_12" class="form-control" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_darkyellow" width="80%">Total Monthly Stated income</td>
   <td class="bg_color_darkyellow"><input id="calc_field_13" class="form-control" type="text"></td>
  </tr>    
 </table> 
 
 <table class="table table-bordered" style="display: none;">
  <tr>
   <td class="bg-primary" width="70%">Payment you qualify for:</td>
   <td class="bg-primary"></td>
  </tr>
  <tr>
   <td class="bg_color_yellow" width="70%">POI loan</td>
   <td class="bg_color_yellow"><input id="calc_field_14" class="form-control" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_yellow" width="70%">Stated income loan</td>
   <td class="bg_color_yellow"><input id="calc_field_15" class="form-control" type="text"></td>
  </tr>    
 </table> 
 
 
 <table class="table table-bordered">
  <tr>
   <td class="bg-primary" width="80%">If you don't have a recent paystub: </td>
   <td class="bg-primary"></td>
  </tr>
  <tr>
   <td width="80%">What do you make per hour?</td>
   <td class="bg_color_blue"><input id="calc_field_16" class="form-control" type="text" value="0"></td>
  </tr>  
  <tr>
   <td width="80%">How many hours of OT per week do you get?</td>
   <td class="bg_color_blue"><input id="calc_field_17" class="form-control" type="text" value="0"></td>
  </tr>  
  <tr>
   <td width="80%">Other monthly POI. SSI/ChildSupport </td>
   <td class="bg_color_blue"><input id="calc_field_18" class="form-control" type="text" value="0"></td>
  </tr>  
  <tr>
   <td width="80%">Other Monthly income i.e. Mow lawns, babysit/ SSI/ebay/misc</td>
   <td class="bg_color_blue"><input id="calc_field_19" class="form-control" type="text" value="0"></td>
  </tr>    
  <tr>
   <td class="bg_color_darkyellow" width="80%">Total Monthly POI</td>
   <td class="bg_color_darkyellow"><input id="calc_field_20" class="form-control" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_darkyellow" width="80%">Total monthly Stated Income</td>
   <td class="bg_color_darkyellow"><input id="calc_field_21" class="form-control" type="text"></td>
  </tr>    
 </table> 

 
 <table class="table table-bordered">
  <tr>
   <td class="bg-primary" width="70%">Payment you qualify for:</td>
   <td class="bg-primary"></td>
  </tr>
  <tr>
   <td class="bg_color_yellow" width="70%">POI loan</td>
   <td class="bg_color_yellow"><input id="calc_field_22" class="form-control" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_yellow" width="70%">Stated income loan</td>
   <td class="bg_color_yellow"><input id="calc_field_23" class="form-control" type="text"></td>
  </tr>    
 </table> 
 
 <button onclick="calculate();" class="btn btn-default btn-lg btn-block">Calculate</button><br><br>
</div></div>
</div>
<div id="wsb-element-2db436b4-43b7-4fd6-adf3-8bbadfe9c01d" class="wsb-element-text" data-type="element"> <div class="txt "><p><span style="color:#000000;"><strong>Hourly Employees</strong></span></p></div> </div> </div></div><div id="wsb-canvas-template-footer" class="wsb-canvas-page-footer footer" style="margin: auto; min-height:100px; height: 100px; width: 1020px; position: relative;"><div id="wsb-canvas-template-footer-container" class="footer-container" style="position: absolute">  </div></div><div class="view-as-mobile" style="padding:10px;position:relative;text-align:center;display:none;"><a href="#" onclick="return false;">View on Mobile</a></div></div></div><script type="text/javascript"> require(['jquery', 'common/cookiemanager/cookiemanager', 'designer/iebackground/iebackground'], function ($, cookieManager, bg) { if (cookieManager.getCookie("WSB.ForceDesktop")) { $('.view-as-mobile', '.wsb-canvas-page-container').show().find('a').bind('click', function () { cookieManager.eraseCookie("WSB.ForceDesktop"); window.location.reload(true); }); } bg.fixBackground(); }); </script></body></html>