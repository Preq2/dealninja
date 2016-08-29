//AJAX Calls
function get_calc(did,score,max_payment,min_gross,stock_num,sort_filter,cb_bank,beacon_ignore,tier_filter) {
	
	$( "#loadergif" ).dialog( "open" );

		if (window.XMLHttpRequest) {
		  xmlhttp=new XMLHttpRequest();
		} else {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {

			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var ans = xmlhttp.responseText;
				
				var str = ans;
				//alert(ans);
				
				document.getElementById('lookup_results').innerHTML = ans;
				
				$( "#loadergif" ).dialog( "close" );
				// $("#offer_table").tablesorter(); 
				  $("#offer_table").tablesorter({sortList: [[8,1], [0,0]]}); 
				
			}
			
		}
		//alert(beacon_ignore);
		xmlhttp.open("GET","http://dealninja.us/js/ajax/get_calc.php?did=" + did + "&score=" + score + "&max_payment=" + max_payment + "&min_gross=" + min_gross + "&stock_num=" + stock_num + "&sort_filter=" +sort_filter + "&cb_bank=" + cb_bank + "&beacon_ignore=" + beacon_ignore +"&tier_filter=" + tier_filter);
		xmlhttp.send();			
	
}