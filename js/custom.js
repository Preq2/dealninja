

function check_password() {


		if (document.getElementById('any_password').value == document.getElementById('any_passwordc').value) {
			document.getElementById('any_passwordc').className = 'inputbox';																		   
			document.getElementById('pw_mes').innerHTML = '';
			document.getElementById('bad_password').value = 0;			
		} else {
			
			
			document.getElementById('any_passwordc').className = 'inputbox errorbox';																	   
			document.getElementById('pw_mes').innerHTML = 'Passwords do not match!';
			//document.getElementById('pw_mes2').innerHTML = 'Passwords do not match!';
			document.getElementById('bad_password').value = 1;			
		}		

	
}
function check_password_fi() {

//alert('');
		if (document.getElementById('user_password').value == document.getElementById('user_passwordc').value) {
			document.getElementById('user_passwordc').className = 'inputbox';																		   
			document.getElementById('pw_mes').innerHTML = '';
			document.getElementById('bad_password').value = 0;			
		} else {
			
			
			document.getElementById('user_passwordc').className = 'inputbox error_fi';																	   
			document.getElementById('pw_mes').innerHTML = 'Passwords do not match!';
			document.getElementById('bad_password').value = 1;			
		}		

	
}

function show_off(which) {
	
		if (document.getElementById('div_' + which).style.backgroundColor == 'rgb(102, 102, 102)') {
			document.getElementById('div_' + which).style.backgroundColor = '';
			document.getElementById('show_' + which + '_h').value = 1;
		} else {
			document.getElementById('div_' + which).style.backgroundColor = 'rgb(102, 102, 102)';
			document.getElementById('show_' + which + '_h').value = 0;
		}	

	make_fields_list();

}


function check_all_boxes() {
	//alert('');
	var checkboxes = new Array(); 
	checkboxes = document['bulk_process'].getElementsByTagName('input');	

  for (var i=0; i<(checkboxes.length - 2); i++)  {
	  
	document.getElementById('cb_email_' + i).checked = document.getElementById('checkboxall').checked;

  }
  
}

function check_all_boxes_archive() {
	//alert('');
	var checkboxes = new Array(); 
	checkboxes = document['archive_process'].getElementsByTagName('input');	

  for (var i=0; i<(checkboxes.length - 2); i++)  {
	  
	document.getElementById('cb_archive_' + i).checked = document.getElementById('checkboxall').checked;

  }
  
}

function check_dob(val) {
	
	if (val.length == 2) {
		op = val + '/';
		document.getElementById('client_dob').value = op;
	}
	if (val.length == 5) {
		op = val + '/';
		document.getElementById('client_dob').value = op;
	}
	
	dd = val.substr(0,2);
	if (dd > 31) {
		document.getElementById('client_dob').value = '';
		alert('Please enter a valid day of the month');
	}
	//alert();
	/**/
	mm = val.substr(3,2);
	if (mm > 12) {
		document.getElementById('client_dob').value = val.substring(0, 3);
		alert('Please enter a valid month');
	}	

}

function submitenter(myfield,e,fun,arg) {
	
	var keycode;
	if (window.event) {
		keycode = window.event.keyCode;
	} else if (e) {
		keycode = e.which;
	} else{
		keycode = 0;
	}
	
	if (keycode == 13) {
		if (arg == '') {
			fun();
		} else {
			fun(arg);
		}
		
	}

}

/*
$(document).ready(function() {
						   


	//$( "#application_preview_current" ).dialog();

		
		
		$( "#application_dob" ).datepicker({
			inline: true,
			changeYear: true
		});	



	
	
});	
*/
