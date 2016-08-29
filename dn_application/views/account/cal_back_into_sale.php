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
  <script>
  
   function round(x){
    return Math.round(x);
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
   

   function calculate(){
   
	// Field 5
	 field5 = (get_field_data("calc_field_10") - get_field_data("calc_field_9") - get_field_data("calc_field_8"))/(1 + get_field_data("calc_field_6")); 
	 set_field_data("calc_field_5",field5.toFixed(2)); 
	// End field 5 //  
	
	// Field 7
	 field7 = (get_field_data("calc_field_5") * get_field_data("calc_field_6")); 
	 set_field_data("calc_field_7",field7.toFixed(2)); 
	// End field 7 //  	
	
	// Field 3
	 field3 = (get_field_data("calc_field_5") - get_field_data("calc_field_4")); 
	 set_field_data("calc_field_3",field3.toFixed(2)); 
	// End field 3 // 	
	
	// Field 1
	 field1 = (get_field_data("calc_field_2") + get_field_data("calc_field_3")); 
	 set_field_data("calc_field_1",field1.toFixed(2)); 
	// End field 1 // 		

   }
  </script>
<div class="calc_container">

 
 <table class="table table-bordered">
  <tr>
   <td class="bg-primary" width="80%">Calculator</td>
   <td class="bg-primary">Inputs</td>
  </tr>
  <tr>
   <td class="bg_color_darkyellow" width="80%">Sale Price</td>
   <td class="bg_color_darkyellow"><input class="bg_color_darkyellow form-control" id="calc_field_1" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_blue" width="80%">Trade Allow</td>
   <td class="bg_color_blue"><input class="bg_color_blue form-control" id="calc_field_2" type="text" value="0"></td>
  </tr>  
  <tr>
   <td width="80%">Trade Diff</td>
   <td class=""><input id="calc_field_3" class="form-control" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_green" width="80%">Doc fee</td>
   <td class="bg_color_green"><input id="calc_field_4" class="form-control" type="text" value="899.1"></td>
  </tr>    
  <tr>
   <td class="" width="80%">Sub Total</td>
   <td class=""><input id="calc_field_5" class="form-control" type="text"></td>
  </tr>  
  <tr>
   <td class="bg_color_green" width="80%">Tax Rate</td>
   <td class="bg_color_green"><input id="calc_field_6" class="form-control" type="text" value="0.0325"></td>
  </tr>    
   <tr>
   <td class="" width="80%">Tax</td>
   <td class=""><input id="calc_field_7" class="form-control" type="text"></td>
  </tr>    
   <tr>
   <td class="bg_color_green" width="80%">Title Fee</td>
   <td class="bg_color_green"><input id="calc_field_8" class="form-control" type="text" value="16.5"></td>
  </tr>     
 </table> 
 
 <table class="table table-bordered">
  <tr>
   <td class="bg_color_blue" width="80%">Payoff</td>
   <td class="bg_color_blue"><input id="calc_field_9" class="form-control" type="text" value="0"></td>
  </tr>
  <tr>
   <td class="bg_color_blue" width="80%">Total OTD</td>
   <td class="bg_color_blue"><input id="calc_field_10" class="form-control" type="text" value="0"></td>
  </tr>  
 </table>

 
 <button onclick="calculate();" class="btn btn-default btn-lg btn-block">Calculate</button><br><br>
</div></div>
</div> 