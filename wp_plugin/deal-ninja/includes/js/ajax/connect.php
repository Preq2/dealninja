<?php
$SA_DBSERVER = 'localhost';
$SA_USERNAME = 'dealninjadb';
$SA_PASSWORD = 'DBingle42!';
$SA_DATABASENAME = 'dealninja';

	$db=mysql_connect($SA_DBSERVER, $SA_USERNAME, $SA_PASSWORD);
	if ($db){
//		echo "connected<br>";
	} else {
//		die('Could not connect: ' . mysql_error());
	}

	if (mysql_select_db($SA_DATABASENAME,$db)){
//		echo("Database selected<br>");
	} else {
//		echo("Could not select database<br>");
//		die('Failed on selection: ' . mysql_error());
	}
	
//$link = mysqli_connect("myhost","myuser","mypassw","mybd") or die("Error " . mysqli_error($link)); 	
	
?>