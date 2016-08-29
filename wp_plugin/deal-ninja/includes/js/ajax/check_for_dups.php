<?
include_once('_connect.php');
/**/
$sql = "SELECT * FROM user WHERE user_email = '" . $_REQUEST['em'] . "' AND user_is_deleted = 0";
$query = mysql_query($sql);	

echo mysql_num_rows($query);


?>
