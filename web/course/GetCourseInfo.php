<?php
header("Content-Type: text/html; charset=utf-8");
include_once('../common/conn_database.php'); 
include_once('../common/config.php'); 
$db_selected=mysql_select_db($DBcommon, $con);
mysql_query("SET NAMES UTF8");
switch ($_POST['Type']) {
	case 'Search':{
		$return = array("Type"=>"","Course"=>"");
		$
	}

	default:
		break;
}

$return['Type'] = $_POST['Type'];
echo json_encode($return);
//mysql_free_result($result);
include_once('../common/closeconnection.php'); 

?>
