// JavaScript Document






function do_email(do_what,emid,who_do,reset_link,sort_filter) {

	//alert(cid + ' housing status');
	//$( "#loadergif" ).dialog( "open" );

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
				
				/*
				if (ans == 1) {
					alert('sent');
				} else {
					alert('error');
				}
				*/

			}
			
		}
		
		xmlhttp.open("GET","js/ajax/do_email.php?who_do=" + who_do + '&do_what=' + do_what + '&reset_link=' + reset_link + '&emid=' + emid );
		xmlhttp.send();			
	
}

function do_csv(data_file,did) {

	//alert(cid + ' housing status');
	document.getElementById('upload_status_csv').style.display = 'block';

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
				
				document.getElementById('parsing_results').innerHTML = '<strong>Results:</strong><br>' + ans;
				document.getElementById('upload_status_csv').style.display = 'none';

			}
			
		}
		
		xmlhttp.open("GET","js/ajax/do_csv.php?file=" + data_file + '&type=inventory&did=' + did);
		xmlhttp.send();			
	
}

function check_for_dups(email,where,what) {

	if (email == '') {

	} else {


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
				
				if (what == 'dealer') {
					
					if (ans == 1) {
						
						//alert('111');
						document.getElementById('dealer_email').className = 'inputbox errorbox';	
						document.getElementById('is_dup').innerHTML = 'This email is already registered in our system!';
						document.getElementById('bad_email').value = '1';
							
	
					
					} else {
						//alert('222');
						document.getElementById('dealer_email').className = 'inputbox correctbox';
						document.getElementById('is_dup').innerHTML = '';
						document.getElementById('bad_email').value = '0';
							
	
	
					}					
					
					
				} else {
					
					if (ans == 1) {
						
						//alert('111');
						document.getElementById('user_email').className = 'inputbox errorbox';	
						document.getElementById('is_dup').innerHTML = 'This email is already registered in our system!';
						document.getElementById('bad_email').value = '1';
							
	
					
					} else {
						//alert('222');
						document.getElementById('user_email').className = 'inputbox correctbox';
						document.getElementById('is_dup').innerHTML = '';
						document.getElementById('bad_email').value = '0';
							
	
	
					}					
					
				}
				


			}
			
		}
		
		xmlhttp.open("GET",where + "?em=" + email,true);
		xmlhttp.send();


	}

}


function get_calc(did,score,max_payment,min_gross,stock_num,sort_filter,cb_bank,beacon_ignore,tier_filter,cashdown,trade,tradeacv) {
	
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
				 $("#offer_table").tablesorter(); 
				
			}
			
		}
		//alert(beacon_ignore);
		xmlhttp.open("GET","js/ajax/get_calc.php?did=" + did + "&score=" + score + "&max_payment=" + max_payment + "&min_gross=" + min_gross + "&stock_num=" + stock_num + "&sort_filter=" +sort_filter + "&cb_bank=" + cb_bank + "&beacon_ignore=" + beacon_ignore +"&tier_filter=" + tier_filter + "&cashdown="  + cashdown + "&trade=" +trade + "&tradeacv="  + tradeacv);
		xmlhttp.send();			
	
}

function build_rate_chart(bid) {
	
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
				
				document.getElementById('bank_rate_chart').innerHTML = ans;
				
				$( "#loadergif" ).dialog( "close" );
				
			}
			
		}
		
		xmlhttp.open("GET","js/ajax/build_rate_chart.php?bid=" + bid);
		xmlhttp.send();			
	
}