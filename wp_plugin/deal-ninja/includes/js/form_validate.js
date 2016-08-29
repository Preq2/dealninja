// JavaScript Document

function changeClass(elementID, newClass) {

	var element = document.getElementById(elementID);
	
	element.setAttribute("class", newClass); //For Most Browsers
	element.setAttribute("className", newClass); //For IE; harmless to other browsers.
}


function val_login() {

mes = '';

	if (document.getElementById('username').value == '' || document.getElementById('username').value == 'username') {
		mes = mes + 'A username is required<br>';
		changeClass('username', 'form-control_err');
	}
	if (document.getElementById('password').value == '' || document.getElementById('password').value == 'password') {
		mes = mes + 'A password is required<br>';
		changeClass('password', 'form-control_err');
	}

	if (mes) {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_login").submit();
	}
}

function val_csv_import() {

mes = '';

	//alert($('input[type=file]').val());
	if ($('input[type=file]').val() == '') {
		mes = mes + 'You must select a file to upload.<br>';
		//changeClass('csv_set', 'inputbox errorbox');
	}

	

	if (mes) {
		document.getElementById('errmes2').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById('upload_status_csv2').style.display = 'block';
		document.getElementById("form_csv_import").submit();
	}
}

function val_csv_export() {

mes = '';
	
	if (document.getElementById('csv_set2').innerHTML == '') {
		mes = mes + 'You must select the file you want to export.<br>';
		changeClass('csv_set', 'inputbox errorbox');
	}

	

	if (mes) {
		document.getElementById('errmes2').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_csv_export").submit();
	}
}

function val_users(which) {
	
	mes = '';
	
	if (which == 'add') {
		
		if (document.getElementById('user_first_name').value == '') {
			mes = mes + 'A first name is required<br>';
			changeClass('user_first_name', 'inputbox errorbox');
		}
		if (document.getElementById('user_last_name').value == '') {
			mes = mes + 'A last name is required<br>';
			changeClass('user_last_name', 'inputbox errorbox');
		}
	
		if (document.getElementById('user_email').value == '') {
			mes = mes + 'A valid email address is required<br>';
			changeClass('user_email', 'inputbox errorbox');
		} else {
			if (document.getElementById('bad_email').value == 1) {
				mes = mes + 'This email is in use.<br>';
			}		
		}
		if (document.getElementById('any_password').value == '') {
			mes = mes + 'A password is required<br>';
			changeClass('any_password', 'inputbox errorbox');
		} else {
			if (document.getElementById('bad_password').value == 1) {
				mes = mes + 'Your passwords do not match.<br>';
			}		
		}	
		
	} else {
		
		if (document.getElementById('user_first_name').value == '') {
			mes = mes + 'A first name is required<br>';
			changeClass('user_first_name', 'inputbox errorbox');
		}
		if (document.getElementById('user_last_name').value == '') {
			mes = mes + 'A last name is required<br>';
			changeClass('user_last_name', 'inputbox errorbox');
		}
	
		if (document.getElementById('user_email').value == '') {
			mes = mes + 'A valid email address is required<br>';
			changeClass('user_email', 'inputbox errorbox');
		} else {
			if (document.getElementById('bad_email').value == 1) {
				mes = mes + 'This email is in use.<br>';
			}		
		}
	
		
	}


	if (mes != '') {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_users").submit();
	}


}

function val_dealer(which) {
	
	mes = '';

	if (document.getElementById('dealer_first_name').value == '') {
		mes = mes + 'A first name is required<br>';
		changeClass('dealer_first_name', 'inputbox errorbox');
	}
	if (document.getElementById('dealer_last_name').value == '') {
		mes = mes + 'A last name is required<br>';
		changeClass('dealer_last_name', 'inputbox errorbox');
	}	
	if (document.getElementById('dealer_company').value == '') {
		mes = mes + 'A dealer company is required<br>';
		changeClass('dealer_company', 'inputbox errorbox');
	}
	if (document.getElementById('dealer_address1').value == '') {
		mes = mes + 'An address 1 is required<br>';
		changeClass('dealer_address1', 'inputbox errorbox');
	}		
	
	if (document.getElementById('dealer_city').value == '') {
		mes = mes + 'A city is required<br>';
		changeClass('dealer_city', 'inputbox inputboxsm errorbox');
	}		
	if (document.getElementById('dealer_state').value == '') {
		mes = mes + 'A state is required<br>';
		changeClass('dealer_state', 'inputbox inputboxsm errorbox');
	}		
	if (document.getElementById('dealer_zip').value == '') {
		mes = mes + 'A zip is required<br>';
		changeClass('dealer_zip', 'inputbox inputboxsm errorbox');
	}	
	if (document.getElementById('dealer_phone').value == '') {
		mes = mes + 'A phone number is required<br>';
		changeClass('dealer_phone', 'inputbox inputboxsm errorbox');
	}	

	if (document.getElementById('dealer_tax_rate').value == '') {
		mes = mes + 'A tax rate is required<br>';
		changeClass('dealer_tax_rate', 'inputbox inputboxsm errorbox');
	}		
	if (document.getElementById('dealer_title_fee').value == '') {
		mes = mes + 'A title fee is required<br>';
		changeClass('dealer_title_fee', 'inputbox inputboxsm errorbox');
	}	
	if (document.getElementById('dealer_doc_fee').value == '') {
		mes = mes + 'A doc fee is required<br>';
		changeClass('dealer_doc_fee', 'inputbox inputboxsm errorbox');
	}



	if (document.getElementById('user_email').value == '') {
		mes = mes + 'A valid email address is required<br>';
		changeClass('user_email', 'inputbox errorbox');
	} else {
		if (document.getElementById('bad_email').value == 1) {
			mes = mes + 'This email is in use.<br>';
		}		
	}
		
if (which == 'add') {
		if (document.getElementById('any_password').value == '') {
			mes = mes + 'A password is required<br>';
			changeClass('any_password', 'inputbox errorbox');
		} else {
			if (document.getElementById('bad_password').value == 1) {
				mes = mes + 'Your passwords do not match.<br>';
			}		
		}		
	
}
		
	


	if (mes != '') {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_dealers").submit();
	}


}


function val_inventory(which) {
	
	mes = '';

	if (document.getElementById('inventory_name').value == '') {
		mes = mes + 'A name is required<br>';
		changeClass('inventory_name', 'inputbox errorbox');
	}
	if (document.getElementById('inventory_nada').value == '') {
		mes = mes + 'A NADA is required<br>';
		changeClass('inventory_nada', 'inputbox errorbox');
	}	
	if (document.getElementById('inventory_stk').value == '') {
		mes = mes + 'A stock number is required<br>';
		changeClass('inventory_stk', 'inputbox inputboxsm errorbox');
	}
	if (document.getElementById('inventory_make').value == '') {
		mes = mes + 'A make is required<br>';
		changeClass('inventory_make', 'inputbox errorbox');
	}		
	
	if (document.getElementById('inventory_model').value == '') {
		mes = mes + 'A model is required<br>';
		changeClass('inventory_model', 'inputbox errorbox');
	}		
	if (document.getElementById('inventory_year').value == '') {
		mes = mes + 'A year is required<br>';
		changeClass('inventory_year', 'inputbox inputboxsm errorbox');
	}		
	/*
	if (document.getElementById('inventory_age').value == '') {
		mes = mes + 'A age is required<br>';
		changeClass('inventory_age', 'inputbox inputboxsm errorbox');
	}	
	*/
	if (document.getElementById('inventory_odometer').value == '') {
		mes = mes + 'A odometer is required<br>';
		changeClass('inventory_odometer', 'inputbox errorbox');
	}	
	if (document.getElementById('inventory_cost').value == '') {
		mes = mes + 'A cost is required<br>';
		changeClass('inventory_cost', 'inputbox errorbox');
	}	

	


	if (mes != '') {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_inventory").submit();
	}


}

function val_bank(which) {
	
	mes = '';

	if (document.getElementById('bank_name').value == '') {
		mes = mes + 'A first name is required<br>';
		changeClass('bank_name', 'inputbox errorbox');
	}

	if (document.getElementById('bank_city').value == '') {
		mes = mes + 'A city is required<br>';
		changeClass('bank_city', 'inputbox inputboxsm errorbox');
	}		
	if (document.getElementById('bank_state').value == '') {
		mes = mes + 'A state is required<br>';
		changeClass('bank_state', 'inputbox inputboxsm errorbox');
	}		

	if (mes != '') {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_banks").submit();
	}


}



function val_password_recovery(which) {
	
	mes = '';
	
	if (which == 'email') {
		
		if (document.getElementById('pr_email').value == '') {
			mes = mes + 'A valid email address is required<br>';
			changeClass('pr_email', 'form-control_err');
		}			
		
	} else {
		
		if (document.getElementById('any_password').value == '') {
			mes = mes + 'A password is required<br>';
			changeClass('any_password', 'form-control_err');
		} else {
			if (document.getElementById('bad_password').value == 1) {
				mes = mes + 'Your passwords do not match.<br>';
			}		
		}			
		
	}

	if (mes != '') {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById('form_password_recovery_' + which).submit();
	}	
	
	
}

function val_settings() {
	
mes = '';

	if (document.getElementById('setting_company_name').value == '') {
		mes = mes + 'A website name is required<br>';
		changeClass('setting_company_name', 'inputbox errorbox');
	}
	if (document.getElementById('setting_url').value == '') {
		mes = mes + 'A website url is required<br>';
		changeClass('setting_url', 'inputbox errorbox');
	}
	if (document.getElementById('setting_email_support').value == '') {
		mes = mes + 'A support email is required<br>';
		changeClass('setting_email_support', 'inputbox errorbox');
	}	
	if (document.getElementById('setting_phone_support').value == '') {
		mes = mes + 'A support phone # is required<br>';
		changeClass('setting_phone_support', 'inputbox errorbox');
	}	
	if (document.getElementById('setting_email_admin').value == '') {
		mes = mes + 'An admin email is required<br>';
		changeClass('setting_email_admin', 'inputbox errorbox');
	}	
	if (document.getElementById('setting_email_test').value == '') {
		mes = mes + 'A test email is required<br>';
		changeClass('setting_email_test', 'inputbox errorbox');
	}	
	if (document.getElementById('setting_email_template_top').value == '') {
		mes = mes + 'An email template top is required<br>';
		changeClass('setting_email_template_top', 'inputbox errorbox');
	}
	if (document.getElementById('setting_email_template_bottom').value == '') {
		mes = mes + 'An email template bottom is required<br>';
		changeClass('setting_email_template_bottom', 'inputbox errorbox');
	}	

	if (document.getElementById('setting_email_password_reset_subject').value == '') {
		mes = mes + 'A password reset subject is required<br>';
		changeClass('setting_email_password_reset_subject', 'inputbox errorbox');
	}	

	if (mes) {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_settings").submit();
	}
}


function val_email_test(which) {

mes = '';
//alert(tinyMCE.get('custom_email_body').getContent());
	if (document.getElementById('email_subject').value == '') {
		mes = mes + 'A subject is required\n';
	}

	document.getElementById('is_test').value = which;

	if (mes != '') {
		alert(mes);
	} else {
		document.getElementById("form_email_custom").submit();
	}
}


function val_keyword() {

mes = '';

	if (document.getElementById('search_keyword').value == '') {
		mes = mes + 'A keyword is required\n';
	}

	if (mes != '') {
		alert(mes);
	} else {
		document.getElementById("form_seach_customer").submit();
	}
}


function val_keyword_transaction() {

mes = '';

	if (document.getElementById('search_keyword').value == '') {
		mes = mes + 'A keyword is required\n';
	}

	if (mes != '') {
		alert(mes);
	} else {
		document.getElementById("form_keyword_search_transaction").submit();
	}
}

function val_date_search() {
	
mes = '';

	if (document.getElementById('search_start_date').value == '') {
		mes = mes + 'A start date is required\n';
	}
	if (document.getElementById('search_end_date').value == '') {
		mes = mes + 'An end date is required\n';
	}
	
	if (mes != '') {
		alert(mes);
	} else {
		document.getElementById("form_date_search_transaction").submit();
	}	
}

function val_banks_metrics() {
	
mes = '';

	if (document.getElementById('bank_metric_fe_advance').value == '') {
		mes = mes + 'A front-end advance is required<br>';
		changeClass('bank_metric_fe_advance', 'inputbox inputboxsmsm errorbox');
	}
	if (document.getElementById('bank_metric_be_advance').value == '') {
		mes = mes + 'An back-end advance is required<br>';
		changeClass('bank_metric_be_advance', 'inputbox inputboxsmsm errorbox');
	}
	if (document.getElementById('bank_metric_max_term').value == '') {
		mes = mes + 'A meximum term is required<br>';
		changeClass('bank_metric_max_term', 'inputbox inputboxsmsm errorbox');
	}
	
	if (mes != '') {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_banks_metrics").submit();
	}	
}


function val_banks_scores_tiers() {
	
mes = '';
num_tiers = document.getElementById('bank_score_tiers').value;


	if (num_tiers == '') {
		mes = mes + 'A number of tiers is required<br>';
		changeClass('bank_score_tiers', 'inputbox inputboxsmsm errorbox');
	} else {
		
		for (i=1;i<=num_tiers;i++) {
			
			if (document.getElementById('bank_score_start_' + i).value == '' || document.getElementById('bank_score_end_' + i).value == '') {
				mes = mes + 'You are missing values for tier ' + i + '<br>';
				changeClass('bank_score_start_' + i, 'inputbox inputboxsmsm errorbox');
				changeClass('bank_score_end_' + i, 'inputbox inputboxsmsm errorbox');
			}			
			
		}		
		
	}



	if (mes != '') {
		document.getElementById('errmes1').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_banks_scores_tiers").submit();
	}	
}

function val_banks_years_tiers() {
	
mes = '';
num_tiers = document.getElementById('bank_year_tiers').value;


	if (num_tiers == '') {
		mes = mes + 'A number of tiers is required<br>';
		changeClass('bank_year_tiers', 'inputbox inputboxsmsm errorbox');
	} else {
		
		for (i=1;i<=num_tiers;i++) {
			
			if (document.getElementById('bank_year_start_' + i).value == '' || document.getElementById('bank_year_end_' + i).value == '') {
				mes = mes + 'You are missing values for tier ' + i + '<br>';
				changeClass('bank_year_start_' + i, 'inputbox inputboxsmsm errorbox');
				changeClass('bank_year_end_' + i, 'inputbox inputboxsmsm errorbox');
			}			
			
		}		
		
	}



	if (mes != '') {
		document.getElementById('errmes2').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		document.getElementById("form_banks_years_tiers").submit();
	}	
}

function val_lookup() {
	
	
	//alert($('input[name="cb_bank[]"]:checked').length);

	mes = '';

	if (document.getElementById('lookup_beacon').value == '') {
		mes = mes + 'A beacon score is required<br>';
		changeClass('lookup_beacon', 'inputbox inputboxsm errorbox');
	}
	if (document.getElementById('lookup_payment').value == '') {
		mes = mes + 'A maximum payment is required<br>';
		changeClass('lookup_payment', 'inputbox inputboxsm errorbox');
	}
	
	if ($('input[name="cb_lookup_banks"]:checked').length) {
		if (!$('input[name="cb_bank[]"]:checked').length) {
			mes = mes + 'Please select a bank(s)<br>';
			document.getElementById('cb_lookup_banks_label').style.color = "#c61b1b";
		}		
	}
	
	//Get Submit Button
	//var btn  = document.getElementById('lookup_submit');
	   $('#lookup_submit').button('loading');
//cb_bank[]	

	if (mes) {
		document.getElementById('errmes').innerHTML = 'Please correct the following errors...<br>' + mes;
	} else {
		//alert(document.getElementById('lookup_beacon').value + ' = ' + document.getElementById('lookup_payment').value);
		var dealer_id = document.getElementById('did').value;
		var beacon_score =document.getElementById('lookup_beacon').value ; 
		var max_payment =document.getElementById('lookup_payment').value ; 
		var max_front_end =document.getElementById('lookup_front_end').value ; 
		var stk_number =  document.getElementById('lookup_stock').value ; 
		var sort_filter =document.getElementById('sort_filter').value ; 
		var beacon_ignore = (document.getElementById('beacon_ignore').checked)?"yes":"no";
		var cb_bank =[];
		var sb = $( "#sl_tf" ).val();
			sb = encodeURIComponent(sb);
			//alert(sb);
		var tier_filter = "";
		$("input:checkbox[name='cb_bank[]']:checked").each(function(){
    		cb_bank.push($(this).val());
		});
		if ($('#cb_lookup_tiers').is(':checked')) {
			 
			tier_filter = sb;
		}
		//Pull together Cashdown, Trade and Trade ACV ... We'll call it offset
		var cashdown =document.getElementById('lookup_cashdown').value ; 
		var trade =document.getElementById('lookup_trade').value ; 
		var tradeacv =document.getElementById('lookup_tradeacv').value ; 
		//alert('Dealer ID:' + dealer_id);
		get_calc(dealer_id,beacon_score,max_payment,
			      max_front_end,stk_number, sort_filter, cb_bank, 
			      beacon_ignore,tier_filter,cashdown,trade,tradeacv);
		
		//Set Focus to Results Table
		//document.getElementById('offer_table').focus();
		//window.location.hash = '#offer_table';
		 

	}
}



function val_archive_selected(form) {
	var sw = 0;
	var checkboxes = new Array(); 
	checkboxes = document['archive_process'].getElementsByTagName('input');	

	  for (var i=0; i<(checkboxes.length - 2); i++)  {
		  
		  if (document.getElementById('cb_archive_' + i).checked) {
			  sw = 1;
		  }
	
	  }
	  
	 if (sw == 0) {
		 alert('No Items Selected');
	 } else {
		 document.getElementById(form).submit();
	 }
	 
}










