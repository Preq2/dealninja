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
	


if ($_GET['type'] == 'ilsa_staff') {

	$file_path = '../../' . $_GET['file'];	
		
	$arr_data = csv_to_array($file_path, ',');
	
	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {
		
		$fsql = "SELECT * FROM staff WHERE ilsa_id = " . $arr_data[$i]['EmpId'] . ' AND staff_team_id = ' . $arr_data[$i]['DepartmentID'];
		$fres = mysql_query($fsql);
		
		if (!mysql_num_rows($fres)) {
			
			$ins = "INSERT INTO staff (ilsa_id,
									  staff_team_id, 
									  staff_name,
									  staff_title,
									  staff_phone,
									  staff_email
									  ) VALUES (
									  " . $arr_data[$i]['EmpId'] . ",
									  " . $arr_data[$i]['DepartmentID'] . ",
									  '" . addslashes($arr_data[$i]['Name']) . "',
									  '" . addslashes($arr_data[$i]['Title']) . "',
									  '254-729-" . $arr_data[$i]['Extention'] . "',
									  '" . $arr_data[$i]['Email'] . "@ilsainc.com')";			
			
			//echo mysql_query($ins) . ' - ' . $i . '<br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}
			
			
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

if ($_GET['type'] == 'agency_appt') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_corp_lic" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_agency_appt  (uid, tax_id, region_code, company_name, license_number_in_state, date_sent_to_ic, producer_code, insurnace_company, record_state, license_type, record_lines, lines_note, effective, renewed, expiration, termination_date, record_comment, appointment_request_date) VALUES ('" . addslashes($arr_data[$i]['UID']) . "',																																																																											   '" . addslashes($arr_data[$i]['Tax ID']) . "',																																																																																		   " . $arr_data[$i]['Region Code'] . ",																																																																																		   '" . addslashes($arr_data[$i]['CompanyName']) . "',																																																																																		   '" . addslashes($arr_data[$i]['License Number in State']) . "',																																																																																	   '" . date('Y-m-d', strtotime($arr_data[$i]['Date Sent to IC'])) . " 00:00:00',																																																																																											  '" . addslashes($arr_data[$i]['ProducerCode']) . "',																																																																																							  '" . addslashes($arr_data[$i]['Insurance Company']) . "',																																																																																												  '" . addslashes($arr_data[$i]['State']) . "',																																																																																												  '" . addslashes($arr_data[$i]['License Type']) . "',																																																																																												  '" . addslashes($arr_data[$i]['Lines']) . "',																																																																																											  '" . addslashes($arr_data[$i]['Lines Note']) . "',																																																																																													  '" . date('Y-m-d', strtotime($arr_data[$i]['Effective'])) . " 00:00:00',																																																																																																							 '" . date('Y-m-d', strtotime($arr_data[$i]['Renewed'])) . " 00:00:00',																																																																																																																		'" . date('Y-m-d', strtotime($arr_data[$i]['Expiration'])) . " 00:00:00',																																																																																																																													   '" . date('Y-m-d', strtotime($arr_data[$i]['Termination Date'])) . " 00:00:00',																																																																																																																																								  '" . addslashes($arr_data[$i]['Comment']) . "',																																																																																																																																								  '" . date('Y-m-d', strtotime($arr_data[$i]['Appointment Request Date'])) . " 00:00:00')";	
			
			//echo $ins . '<br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "record_agency_appt".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'agent_appt') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_corp_lic" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_agent_appt  (UID,
													LicNoInState,
													DateSenttoIC,
													InsCompany,
													ApptState,
													ApptLicType,
													ApptLines,
													ApptLineNotes,
													ApptEffective,
													ApptRenewed,
													ApptExpiration,
													TerminationDate,
													ApptComment,
													RegionCode
													) VALUES (
													'" . addslashes($arr_data[$i]['UID']) . "',	
													'" . addslashes($arr_data[$i]['LicNoInState']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['DateSenttoIC'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['InsCompany']) . "',
													'" . addslashes($arr_data[$i]['ApptState']) . "',
													'" . addslashes($arr_data[$i]['ApptLicType']) . "',
													'" . addslashes($arr_data[$i]['ApptLines']) . "',
													'" . addslashes($arr_data[$i]['ApptLineNotes']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['ApptEffective'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['ApptRenewed'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['ApptExpiration'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['TerminationDate'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['ApptComment']) . "',
													" . $arr_data[$i]['RegionCode'] . "
													)";	
			
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "record_agent_appt".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'agent_ce') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_corp_lic" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_agent_ce  (UID,
													CEDate,
													CourseCode,
													Credits,
													ApprovedState,
													CourseProvider,
													CourseName,
													RegionCode
													) VALUES (
													'" . addslashes($arr_data[$i]['UID']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['CEDate'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['CourseCode']) . "',
													" . $arr_data[$i]['Credits'] . ",
													'" . addslashes($arr_data[$i]['ApprovedState']) . "',
													'" . addslashes($arr_data[$i]['CourseProvider']) . "',
													'" . addslashes($arr_data[$i]['CourseName']) . "',
													" . $arr_data[$i]['RegionCode'] . "
													)";	
			
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_agent_ce".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'client_ce') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_corp_lic" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_client_ce  (Username,
													CompanyName,
													AddrChange,
													ApptRequests,
													CorpTaxFilings,
													Team,
													RenewalsRep,
													Renewals,
													AccountRep,
													Password,
													AnnualReturns,
													Bonds,
													ServiceType,
													TaxID,
													Phone,
													Fax,
													BAddr,
													BState,
													BCity,
													BZip,
													MailingAddr,
													MailingState,
													MailingCity,
													MailingZip,
													ProjectStartDate,
													ClientCode
													) VALUES (
													" . $arr_data[$i]['Username'] . ",
													'" . addslashes($arr_data[$i]['CompanyName']) . "',
													'" . addslashes($arr_data[$i]['AddrChange']) . "',
													'" . addslashes($arr_data[$i]['ApptRequests']) . "',
													'" . addslashes($arr_data[$i]['CorpTaxFilings']) . "',
													" . $arr_data[$i]['Team'] . ",
													'" . addslashes($arr_data[$i]['RenewalsRep']) . "',
													'" . addslashes($arr_data[$i]['Renewals']) . "',
													'" . addslashes($arr_data[$i]['AccountRep']) . "',
													'" . addslashes($arr_data[$i]['Password']) . "',
													'" . addslashes($arr_data[$i]['AnnualReturns']) . "',
													'" . addslashes($arr_data[$i]['Bonds']) . "',
													'" . addslashes($arr_data[$i]['ServiceType']) . "',
													" . $arr_data[$i]['TaxID'] . ",
													'" . addslashes($arr_data[$i]['Phone']) . "',
													'" . addslashes($arr_data[$i]['Fax']) . "',
													'" . addslashes($arr_data[$i]['BAddr']) . "',
													'" . addslashes($arr_data[$i]['BState']) . "',
													'" . addslashes($arr_data[$i]['BCity']) . "',
													'" . addslashes($arr_data[$i]['BZip']) . "',
													'" . addslashes($arr_data[$i]['MailingAddr']) . "',
													'" . addslashes($arr_data[$i]['MailingState']) . "',
													'" . addslashes($arr_data[$i]['MailingCity']) . "',
													'" . addslashes($arr_data[$i]['MailingZip']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['ProjectStartDate'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['ClientCode']) . "'
													)";	
			
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_client_ce".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'corp_app') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_corp_lic" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_corp_app  (RegionCode,
													CompanyName,
													report_state,
													DateSenttoIC,
													Effective,
													Expiration,
													report_comment,
													TerminationDate,
													ServiceType,
													Password,
													DateEntered,
													ProducerCode
													) VALUES (
													" . $arr_data[$i]['Region Code'] . ",
													'" . addslashes($arr_data[$i]['CompanyName']) . "',
													'" . addslashes($arr_data[$i]['State']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Date Sent to IC'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Effective'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Expiration'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['Comment']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Termination Date'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['Service Type']) . "',
													'" . addslashes($arr_data[$i]['Password']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Date Entered'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['ProducerCode']) . "'
													)";	
		
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_corp_app".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'corp_lic') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_corp_lic" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_corp_lic  (RegionCode,
													ServiceType,
													DomicileState,
													CorpAppPrepared,
													CorpAppsentoDOI,
													CorpRenewalSent,
													CompanyName,
													LicenseID,
													LicensureState,
													Status,
													Type,
													TypeNotes,
													report_lines,
													LinesNotes,
													OriginalDate,
													LastIssued,
													Expiration,
													report_comments,
													Password,
													TaxID,
													CorpAppSentClient,
													CorpRenewalRecieved,
													ProducerCode
													) VALUES (
													" . $arr_data[$i]['RegionCode'] . ",
													'" . addslashes($arr_data[$i]['ServiceType']) . "',
													'" . addslashes($arr_data[$i]['DomicileState']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['CorpAppPrepared'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['CorpAppsentoDOI'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['CorpRenewalSent'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['CompanyName']) . "',
													'" . addslashes($arr_data[$i]['LicenseID']) . "',
													'" . addslashes($arr_data[$i]['LicensureState']) . "',
													'" . addslashes($arr_data[$i]['Status']) . "',
													'" . addslashes($arr_data[$i]['Type']) . "',
													'" . addslashes($arr_data[$i]['TypeNotes']) . "',
													'" . addslashes($arr_data[$i]['Lines']) . "',
													'" . addslashes($arr_data[$i]['LinesNotes']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['OriginalDate'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['LastIssued'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Expiration'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['Comments']) . "',
													'" . addslashes($arr_data[$i]['Password']) . "',
													'" . addslashes($arr_data[$i]['TaxID']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['CorpAppSentClient'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['CorpRenewalRecieved'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['ProducerCode']) . "'
													)";	
		
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_corp_lic".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'ind_app') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_ind_app" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_ind_app  (RegionCode,
													LastName,
													FirstName,
													Company,
													report_state,
													Expiration,
													ServiceType,
													LinesNote,
													report_comment,
													DateSent,
													EmployeeID,
													AgentID,
													Effective,
													TerminationDate,
													TerminationReason,
													DateEntered,
													Password
													) VALUES (
													" . $arr_data[$i]['RegionCode'] . ",
													'" . addslashes($arr_data[$i]['LastName']) . "',
													'" . addslashes($arr_data[$i]['FirstName']) . "',
													'" . addslashes($arr_data[$i]['Company']) . "',
													'" . addslashes($arr_data[$i]['State']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Expiration'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['ServiceType']) . "',
													'" . addslashes($arr_data[$i]['LinesNote']) . "',
													'" . addslashes($arr_data[$i]['Comment']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['DateSent'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['EmployeeID']) . "',
													'" . addslashes($arr_data[$i]['AgentID']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Effective'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['TerminationDate'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['TerminationReason']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['DateEntered'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['Password']) . "'
													)";	
		
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_ind_app".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'login_database') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_login_database" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_login_database  (Role,
													RegionCode,
													Username,
													Password,
													EntityName,
													SID,
													EmailAddress,
													Comments,
													BirthDate,
													SecQuestion,
													SecAnswer,
													LastName,
													EMC,
													EC,
													HomeRegionCode,
													IndvLicRequest,
													EmailSent,
													DateTimeStamp
													) VALUES (
													'" . addslashes($arr_data[$i]['Role']) . "',
													" . $arr_data[$i]['RegionCode'] . ",
													'" . addslashes($arr_data[$i]['Username']) . "',
													'" . addslashes($arr_data[$i]['Password']) . "',
													'" . addslashes($arr_data[$i]['EntityName']) . "',
													'" . addslashes($arr_data[$i]['SID']) . "',
													'" . addslashes($arr_data[$i]['EmailAddress']) . "',
													'" . addslashes($arr_data[$i]['Comments']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['BirthDate'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['SecQuestion']) . "',
													'" . addslashes($arr_data[$i]['SecAnswer']) . "',
													'" . addslashes($arr_data[$i]['LastName']) . "',
													'" . addslashes($arr_data[$i]['EMC']) . "',
													'" . addslashes($arr_data[$i]['EC']) . "',
													'" . addslashes($arr_data[$i]['HomeRegionCode']) . "',
													'" . addslashes($arr_data[$i]['IndvLicRequest']) . "',
													'" . addslashes($arr_data[$i]['EmailSent']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['DateTimeStamp'])) . " 00:00:00'
													)";	
		
			//echo $ins . '<br><br>';
			
			if(mysql_query($ins)) {
				$rctr++;
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_login_database".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}

if ($_GET['type'] == 'rpg') {

	$file_path = '../../' . $_GET['file'];	
	
	$del_all = "DELETE FROM report_rpg" ;
	mysql_query($del_all);	
		
	$arr_data = csv_to_array($file_path, ',');

	$rctr = 0;
	for ($i=0;$i<count($arr_data);$i++) {

			$ins = "INSERT INTO report_rpg  (Regioncode,
														bname,
														LicenseID,
														LicensureState,
														Status,
														TypeNotes,
														LinesNotes,
														OriginalDate,
														LastIssued,
														Expiration,
														Comments,
														Renewals,
														AppPreparedBy,
														NoofAppsPrepared,
														Appsenttoclientforsignature,
														CorpAppsenttoDOI_InsCo,
														CorpRenewalSent,
														CorpRenewalReceived,
														password
													) VALUES (
													" . $arr_data[$i]['Regioncode'] . ",
													'" . addslashes($arr_data[$i]['bname']) . "',
													'" . addslashes($arr_data[$i]['LicenseID']) . "',
													'" . addslashes($arr_data[$i]['Licensure State']) . "',
													'" . addslashes($arr_data[$i]['Status']) . "',
													'" . addslashes($arr_data[$i]['Type Notes']) . "',
													'" . addslashes($arr_data[$i]['Lines Notes']) . "',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Original Date'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Last Issued'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Expiration'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['Comments']) . "',
													'" . addslashes($arr_data[$i]['Renewals']) . "',
													'" . addslashes($arr_data[$i]['App Prepared By']) . "',
													" . $arr_data[$i]['No of Apps Prepared'] . ",													
													'" . date('Y-m-d', strtotime($arr_data[$i]['App sent to client for signature'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Corp App sent to DOI/Ins Co'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Corp Renewal Sent'])) . " 00:00:00',
													'" . date('Y-m-d', strtotime($arr_data[$i]['Corp Renewal Received'])) . " 00:00:00',
													'" . addslashes($arr_data[$i]['password']) . "'
													)";	
		
			//
			
			if(mysql_query($ins)) {
				$rctr++;
			} else {
				echo $ins . '<br><br>';
			}


	}
	
	$num_recs = count($arr_data);

echo 'Writing to database table: "report_rpg".<br>';
echo $num_recs . ' records read from file.<br>';
echo $rctr . ' new records written to the database.<br>';	

}



?>
