<?php

include_once('_connect.php');

//SQL INSERTS
$insBRG = "Insert into imp_brg
	(
	bank_id, brg_tier_name, brg_rate, brg_score_start,brg_score_end,
	brg_model_year_start, brg_model_year_end, brg_mileage_start, brg_mileage_end,
	brg_term, brg_FE_percent,brg_FE_cap , brg_BE_percent ,   brg_BE_cap
	) ";

$insINV = "INSERT INTO `dealninja`.`imp_inv`
		(
		
		`dealer_id`,
		`inventory_name`,
		`inventory_nada`,
		`inventory_invoice`,
		`inventory_stk`,
		`inventory_year`,
		`inventory_make`,
		`inventory_model`,
		`inventory_age`,
		`inventory_odometer`,
		`inventory_cost`,
		`inventory_date_changed`,
		`inventory_is_deleted`,
		`inventory_category`,
		`inventory_rebate`, `inventory_vin`)
";


//Method: POST
//URL:    Token Endpoint
//Body:   grant_type=client_credentials&client_id=Client ID&client_secret=Client Secret
$activeEndPoint="https://c1ect864.caspio.com/oauth/token";
$caspio_URL ="https://c1ect864.caspio.com/rest/v1";
$Client_ID="fbea5b0314264c8540764e0b0ecd2cd123b2c41bfbc6f1ea52";
$Client_Secret="5b29519e68aa44a2bf9b73d0498d262dce060466587d70b7bd";
$caspio_auth_url = "grant_type=client_credentials&client_id=$Client_ID&client_secret=$Client_Secret";

//Get Token
$caspio_oauth = getFromAuth($activeEndPoint , $caspio_auth_url);
$br = "<BR>";
//Set Return limit to 1000
/*q={"select":"fields list",
   "where":"WHERE condition",
   "groupby":"grouping fields list",
   "orderby":"ordering fields list",
   "limit":<rows count>}
   */
$q = '?q={"limit":"1000"}';
$caspio_r = json_decode($caspio_oauth);
$caspio_token = $caspio_r->access_token;
 //. $bank_tbls[0] . "rows"
$dp = getFromService($caspio_URL . "/tables", $caspio_token);
$obj = json_decode($dp, TRUE);


//Clear Data from Import Tables
 mysql_query("Delete from imp_brg;"); 
 mysql_query("Delete from imp_inv;"); 


//print_r($obj['Result']);
echo "<PRE>";
for($i=0; $i<count($obj['Result']); $i++) {
    $pagename = $obj['Result'][$i] ;
   // print_r($obj['Result'][$i]);
    echo "<hr>";
    echo $pagename ;
    if (substr($pagename,0,5) =="bank_"){
	    	//echo " is a bank";
	     $page_json = getFromService($caspio_URL."/tables/". $pagename . "/rows". $q,$caspio_token );
	     //echo $br . $caspio_URL."/tables/". $pagename . "/rows". $q ;
	     $page_obj = json_decode($page_json, TRUE);
	     //var_export($page_obj);
	     // var_export($page_obj['Result']);
	     $sql =  valsBRG($page_obj['Result'], $insBRG);
	     echo $br;
    }
    if (substr($pagename,0,4) =="inv_"  && substr($pagename, -8) =="_invoice"){
	    	//echo " is inventory";
	     $page_json = getFromService($caspio_URL."/tables/". $pagename . "/rows". $q,$caspio_token );
	     $pgArr =explode("_",$pagename);
	     $bid = $pgArr[1];
	     $page_obj = json_decode($page_json, TRUE);
	     //var_export($page_obj);
	     // var_export($page_obj['Result']);
	     echo "<BR>" . $pagename . " Imported" ;
	     $sql =  valsINV($page_obj['Result'], $insINV,$bid);
	     echo $br;
    }
     if (substr($pagename,0,4) =="inv_"  && substr($pagename, -8) == "_rebates"){
     	 $page_json = getFromService($caspio_URL."/tables/". $pagename . "/rows". $q,$caspio_token );
     	 $pgArr =explode("_",$pagename);
     	 $bid = $pgArr[1];
	     $page_obj = json_decode($page_json, TRUE);
	    // print_r($page_obj['Result']);
	     echo "<BR>" . $pagename . " Imported" ;
	     $sql =  valsREB($page_obj['Result'], $insINV,$bid);

     }
         if (substr($pagename,0,4) =="inv_"  && substr($pagename, -5) == "_nada"){
     	 $page_json = getFromService($caspio_URL."/tables/". $pagename . "/rows". $q,$caspio_token );
     	 $pgArr =explode("_",$pagename);
     	 $bid = $pgArr[1];
	     $page_obj = json_decode($page_json, TRUE);
	     echo "<BR>" . $pagename . " Imported" ;
	    // print_r($page_obj['Result']);
	     $sql =  valsBV ($page_obj['Result'], $insINV,$bid);

     }
    echo "<BR>";
}



mysql_query("call imp_caspio_bankinfo");
mysql_query("call imp_caspio_inventory");
echo "<h1>" . mysql_error() . "</h1>";



//Get Rows  from REST API
function getFromAuth($service_url, $data_string) {
	//echo $service_url;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl, CURLOPT_HEADER, false);
	 

	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	//echo $curl_response;
	$decoded = json_decode($curl_response);
	if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
		die('error occured: ' . $decoded->response->errormessage);
	}
	//echo 'response ok!';
	return $curl_response;

}

function getFromService($service_url, $caspio_token) {
	//echo $service_url;
	//echo $caspio_token;	
	//exit;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	//curl_setopt($curl, CURLOPT_POST, true);
	//curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	'Authorization: Bearer '. $caspio_token ,                                                                          
    'Content-Type: application/json',  
    'Accept: application/json'                                                                      
	)); 
	 

	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	//echo $curl_response;
	$decoded = json_decode($curl_response);
	if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
		die('error occured: ' . $decoded->response->errormessage);
	}
	//echo 'response ok!';
	return $curl_response;

}

function valsBRG ($arr, $insBRG) {
   // print_r($arr);
	$vals = "";
	for($b=0; $b<count($arr); $b++) {
    	$vals = $insBRG;
		$vals .= "  values ('" .
			$arr[$b]['brg_bank_id']. "','" .
			$arr[$b]['brg_tier_name']."','" .
			$arr[$b]['brg_rate']."','" .
			$arr[$b]['brg_score_start']."','" .
			$arr[$b]['brg_score_end']."','" .
			$arr[$b]['brg_model_year_start']."','" .
			$arr[$b]['brg_model_year_end']."','" .
			$arr[$b]['brg_mileage_start']."','" .
			$arr[$b]['brg_mileage_end']."','" .
			$arr[$b]['brg_term']."','" .
			$arr[$b]['brg_fe_percent']."','" .
			$arr[$b]['brg_fe_cap']."','" .
			$arr[$b]['brg_be_percent']."','" .
			$arr[$b]['brg_be_cap']. "') ;" ;
 mysql_query($vals);  
 //echo mysql_error();
		 
		
	}	
 return $vals;

}

function valsINV ($arr, $insINV, $bid) {
   // print_r($arr);
	for($b=0; $b<count($arr); $b++) {
    	$vals = $insINV;
    	//print_r($insINV);
    	//print_r($arr[$b]);
    	if (!array_key_exists('inventory_invoice', $arr[$b])){
    		$arr[$b]['inventory_invoice'] =0;
		}
		if (!array_key_exists('inventory_nada', $arr[$b])){
    		$arr[$b]['inventory_nada'] =0;
		}
		 $vals .= "  values ('" .
			$bid . "','".
			$arr[$b]['VehicleType']."','" .
			$arr[$b]['inventory_nada']."','" .
			$arr[$b]['inventory_invoice']."','" .
			$arr[$b]['inventory_stk']."','" .
			$arr[$b]['inventory_year']."','" .
			$arr[$b]['inventory_make']."','" .
			$arr[$b]['inventory_model']."','" .
			$arr[$b]['inventory_age']."','" .
			$arr[$b]['inventory_odometer']."','" .
			$arr[$b]['inventory_cost']."','" .
			date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)) . "','" . "0','" .
			$arr[$b]['NewUsed']."','0','" .
			$arr[$b]['inventory_vin']. "') ;" ;
           //echo $vals;
 mysql_query($vals);  
 echo mysql_error();


		
	}	
 return $vals;

}

function valsREB($arr,$insREB,$bid){

	for($b=0; $b<count($arr); $b++) {
		echo "<br>";
		
		$arr[$b]['inventory_rebate1price'] =$arr[$b]['inventory_rebate1price'] =="" ?0:$arr[$b]['inventory_rebate1price'];
		$arr[$b]['inventory_rebate2price'] =$arr[$b]['inventory_rebate2price'] =="" ?0:$arr[$b]['inventory_rebate2price'];
		$arr[$b]['inventory_rebate3price'] =$arr[$b]['inventory_rebate3price'] =="" ?0:$arr[$b]['inventory_rebate3price'];

		$updREB = "Update imp_inv set "
		. " inventory_rebate1price = " . $arr[$b]['inventory_rebate1price']
		. " ,inventory_rebate2price = " . $arr[$b]['inventory_rebate2price'] 
		. " ,inventory_rebate3price = " . $arr[$b]['inventory_rebate3price']
		.


		" where inventory_vin='" .$arr[$b]['inventory_vin']  . "' and dealer_id='" . $bid . "'" ;
		//echo $updREB . "<br>";
		mysql_query($updREB);
		mysql_error();
	}
}

 


function valsBV($arr,$insBV,$bid){

	for($b=0; $b<count($arr); $b++) {
		echo "<br>";
		

		$updBV = "Update imp_inv set "
		. " inventory_nada = " . $arr[$b]['inventory_nada']
		.


		" where inventory_vin='" .$arr[$b]['inventory_vin']  . "' and dealer_id='" . $bid . "'" ;
		//echo $updBV . "<br>";
		mysql_query($updBV);
		mysql_error();
	}
}

/*  [PK_ID] => 1
            [a_name] => 
            [modelCode] => 1EV37
            [msrp] => $77,104
            [inventory_stk] => C700424
            [inventory_rebate1desc] => Consumer Cash Program
            [inventory_rebate1exp] => Expires: 5/2/16
            [inventory_rebate2desc] => Chevrolet Bonus Cash Program
            [inventory_rebate2exp] => Expires: 5/2/16
            [inventory_rebate3desc] => 
            [inventory_rebate3exp] => 
            [inventory_rebate1price] => 1500
            [inventory_rebate2price] => 1000
            [inventory_rebate3price] => 
*/
?>
