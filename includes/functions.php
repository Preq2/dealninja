<?

// globals


// various functions


function encrypt_decrypt($action, $string) {
	
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Do you do, feel like I do 42';
    $secret_iv = 'wok are delisously spelled wrong';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		
    }

    return $output;
}

function pad_unpad_client_id($cid,$pad) {
	
	if ($pad == 'pad') {
		
		if ($cid <= 9999) {
			
			$cid = str_pad($cid, 4, "0", STR_PAD_LEFT);
			$cid = '2356' . $cid;
			
		} else {
			$cid = str_pad($cid, 8, "1000", STR_PAD_LEFT);
		}	
		
	} else {
		if (strpos($cid, "2356") === 0) {
			
			$cid = substr($cid, -4);
			$cid = ltrim($cid, '0');
		} else {
			if (strpos($cid, "100") === 0) {
				$cid = substr($cid, -5);
			}
			if (strpos($cid, "10") === 0) {
				$cid = substr($cid, -6);
			}
			
		}
	}

	return $cid;
	
}

function calc_income_tot($amount,$freq) {
	
	$tot = '';
	$monthly = '';
	if ($freq == 'weekly') {
		$tot = $amount * 52;
		$monthly = $tot / 12;
	}
	if ($freq == 'fortnightly') {
		$tot = $amount * 26;
		$monthly = $tot / 12;
	}
	if ($freq == 'monthly') {
		$monthly = $amount;
	}
	if ($freq == 'quarterly') {
		$tot = $amount * 4;
		$monthly = $tot / 12;
	}
	if ($freq == 'annually') {
		$monthly = $amount / 12;
	}
	/**/		
	return $monthly;
	
}

/*
function add_new_eventlog($cid,$type,$brief,$detail) {
	
	$sql = "INSERT INTO fdn_eventlog (client_id,fdn_eventlog_type,fdn_eventlog_brief,fdn_eventlog_text) VALUES (" . $cid . ",'" . $type . "','" . $brief . "','" . $detail . "')";
	mysql_query($sql);
	
	
}

function datim($what, $which = 1) {
	
	if ($which == 1) {
		$fixed = date('m-d-y g:ia', strtotime($what));
	} else if ($which == 2) {
		$fixed = date('m/d/y', strtotime($what));
	} else {
		$fixed = 'error';
	}
	
	
	return $fixed;
	
}


function convert_state($name, $to) {
	$states = array(
	array('name'=>'Alabama', 'abbrev'=>'AL'),
	array('name'=>'Alaska', 'abbrev'=>'AK'),
	array('name'=>'Arizona', 'abbrev'=>'AZ'),
	array('name'=>'Arkansas', 'abbrev'=>'AR'),
	array('name'=>'California', 'abbrev'=>'CA'),
	array('name'=>'Colorado', 'abbrev'=>'CO'),
	array('name'=>'Connecticut', 'abbrev'=>'CT'),
	array('name'=>'Delaware', 'abbrev'=>'DE'),
	array('name'=>'Florida', 'abbrev'=>'FL'),
	array('name'=>'Georgia', 'abbrev'=>'GA'),
	array('name'=>'Hawaii', 'abbrev'=>'HI'),
	array('name'=>'Idaho', 'abbrev'=>'ID'),
	array('name'=>'Illinois', 'abbrev'=>'IL'),
	array('name'=>'Indiana', 'abbrev'=>'IN'),
	array('name'=>'Iowa', 'abbrev'=>'IA'),
	array('name'=>'Kansas', 'abbrev'=>'KS'),
	array('name'=>'Kentucky', 'abbrev'=>'KY'),
	array('name'=>'Louisiana', 'abbrev'=>'LA'),
	array('name'=>'Maine', 'abbrev'=>'ME'),
	array('name'=>'Maryland', 'abbrev'=>'MD'),
	array('name'=>'Massachusetts', 'abbrev'=>'MA'),
	array('name'=>'Michigan', 'abbrev'=>'MI'),
	array('name'=>'Minnesota', 'abbrev'=>'MN'),
	array('name'=>'Mississippi', 'abbrev'=>'MS'),
	array('name'=>'Missouri', 'abbrev'=>'MO'),
	array('name'=>'Montana', 'abbrev'=>'MT'),
	array('name'=>'Nebraska', 'abbrev'=>'NE'),
	array('name'=>'Nevada', 'abbrev'=>'NV'),
	array('name'=>'New Hampshire', 'abbrev'=>'NH'),
	array('name'=>'New Jersey', 'abbrev'=>'NJ'),
	array('name'=>'New Mexico', 'abbrev'=>'NM'),
	array('name'=>'New York', 'abbrev'=>'NY'),
	array('name'=>'North Carolina', 'abbrev'=>'NC'),
	array('name'=>'North Dakota', 'abbrev'=>'ND'),
	array('name'=>'Ohio', 'abbrev'=>'OH'),
	array('name'=>'Oklahoma', 'abbrev'=>'OK'),
	array('name'=>'Oregon', 'abbrev'=>'OR'),
	array('name'=>'Pennsylvania', 'abbrev'=>'PA'),
	array('name'=>'Rhode Island', 'abbrev'=>'RI'),
	array('name'=>'South Carolina', 'abbrev'=>'SC'),
	array('name'=>'South Dakota', 'abbrev'=>'SD'),
	array('name'=>'Tennessee', 'abbrev'=>'TN'),
	array('name'=>'Texas', 'abbrev'=>'TX'),
	array('name'=>'Utah', 'abbrev'=>'UT'),
	array('name'=>'Vermont', 'abbrev'=>'VT'),
	array('name'=>'Virginia', 'abbrev'=>'VA'),
	array('name'=>'Washington', 'abbrev'=>'WA'),
	array('name'=>'West Virginia', 'abbrev'=>'WV'),
	array('name'=>'Wisconsin', 'abbrev'=>'WI'),
	array('name'=>'Wyoming', 'abbrev'=>'WY')
	);

	$return = false;
	foreach ($states as $state) {
		if ($to == 'name') {
			if (strtolower($state['abbrev']) == strtolower($name)){
				$return = $state['name'];
				break;
			}
		} else if ($to == 'abbrev') {
			if (strtolower($state['name']) == strtolower($name)){
				$return = strtoupper($state['abbrev']);
				break;
			}
		}
	}
	return $return;
}


function nopay($cid) {
	$sql = "SELECT * FROM tblinvoices WHERE userid = " . $cid . " AND status = 'Unpaid'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result)) {
		//echo 'nopayyyyyyyyyyyyyyyyy';
		header('Location:clientarea.php?action=nopay');
	}
	
	$keys = mysql_fetch_array($result);
}

function add_mask($what,$amt,$dir) {
	
	$str = $what;
	$len = strlen($str);
	$newstr = '';
	
	if ($len <= 7) {
		
		$amt = 1;

		for ($i=1;$i<=($len - $amt);$i++) {
			$newstr .= '*';
		}
		
		$newstr .= substr($str, $len - $amt, $amt);
		
	} else {
		
		if ($dir == 'back') {
			
			for ($i=1;$i<=($len - $amt);$i++) {
				$newstr .= '*';
			}
			
			$newstr .= substr($str, $len - $amt, $amt);
			
		}		
		
	}
	

	
	return $newstr;
}
*/

?>