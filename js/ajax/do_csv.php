<?
include_once('_connect.php');



$sql = "SELECT * FROM setting WHERE setting_id = 1";
$result = mysql_query($sql);
$setting = mysql_fetch_array($result);

/*
$sql8 = "SELECT * FROM client WHERE client_id = " . $_GET['who_do'];
$result8 = mysql_query($sql8);
$client = mysql_fetch_array($result8);
*/

function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
			
				if(!array_combine($header, $row)) {
				  die("<BR><span style='color:#f00; font-weight: bold;font-size: 18px;'>Your Input File is Corrupted! Please fix and re-upload.</span><BR>");
				} else {
				  $data[] = array_combine($header, $row);
				}
                
        }
        fclose($handle);
    }
    return $data;
}	
	


if ($_GET['type'] == 'inventory') {

	$file_path = '../../' . $_GET['file'];	
		
	$arr_data = csv_to_array($file_path, ',');
	/**/
	$rctr = 0;
	
	// first clear the inventory table
	$del = "DELETE FROM inventory WHERE dealer_id = " . $_GET['did'];
	mysql_query($del);
	
	for ($i=0;$i<count($arr_data);$i++) {
		
		$odo = str_replace(',','',$arr_data[$i]['odometer']);
		$cost = str_replace(',','',$arr_data[$i]['cost']);
		$cost = str_replace('$','',$cost);

			
		$ins = "INSERT INTO inventory (dealer_id,
								  inventory_name, 
								  inventory_nada,
								  inventory_stk,
								  inventory_make,
								  inventory_model,
								  inventory_year,
								  inventory_age,
								  inventory_odometer,
								  inventory_cost
								  ) VALUES (
								  " . $_GET['did'] . ",
								  '" . addslashes($arr_data[$i]['name']) . "',
								  '" . addslashes($arr_data[$i]['nada']) . "',
								  '" . addslashes($arr_data[$i]['stk']) . "',
								  '" . addslashes($arr_data[$i]['make']) . "',
								  '" . addslashes($arr_data[$i]['model']) . "',
								  " . $arr_data[$i]['year'] . ",								  
								  " . $arr_data[$i]['age'] . ",
								  " . $odo . ",
								  " . $cost . "
								  )";			
		
		//echo $arr_data[$i]['year'] . '<br><br>';
		
		if(mysql_query($ins)) {
			$rctr++;
		}


	}
	
	$num_recs = count($arr_data);

echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

	/*
	echo var_dump($arr_data) . '<br><br>';
	
	echo count($arr_data) . '<br>';
	echo $arr_data[0]['EmpId'] . '<br>';
	echo $arr_data[0]['Name'] . '<br>';
	echo $arr_data[0]['Extention'] . '<br>';
	echo $arr_data[0]['Team'] . '<br>';
	echo $arr_data[0]['Title'] . '<br>';
	echo $arr_data[0]['Email'] . '<br>';
	echo $arr_data[0]['DepartmentID'] . '<br>';
	*/
}




?>
