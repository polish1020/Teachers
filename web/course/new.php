<?php
	session_start();
	if(!isset($_SESSION['uNum'])){
		header("location: index.php");
		exit;
	}
?>

<html>
<head>
	<meta charset="utf-8">
</head>
<?php
	$link=mysql_connect("10.77.30.12", "cstcadmin", "ccs87951254");
	if(!$link){
		echo "Error1: ".mysql_error()."";
		exit();
	}
	mysql_query("SET NAMES UTF8");
	
	$coBH=$_POST['coBH'];
	$coName=$_POST['coName'];
	$techID=$_SESSION['uid'];
	$coYear=$_POST['coYear'];
	$coTerm=$_POST['coTerm'];
	$coCreateDate=date('y-m-d h:m:s',time());
	$coDept=$_POST['coDept'];
	$coNote=$_POST['coNote'];
	$coPrecis=$_POST['coPrecis'];
	$coCalender=$_POST['coCalender'];
	if($_POST['coStatus']==1){$coStatus=1;}
	else{$coStatus=0;}
	if($_POST['courseName']=="自定义课程"){
		$ccID=0;
	}
	else {
		$ccID=$_POST['ccID'];
	}

	

	echo "coBH:".$coBH."<br />";
	echo "coName:".$coName."<br />";
	echo "techID:".$techID."<br />";
	echo "coYear:".$coYear."<br />";
	echo "coTerm:".$coTerm."<br />";
	echo "coCreateDate:".$coCreateDate."<br />";
	echo "coDept:".$coDept."<br />";
	echo "coNote:".$coNote."<br />";
	echo "coPrecis:".$coPrecis."<br />";
	echo "coCalender:".$coCalender."<br />";
	echo "coStatus:".$coStatus."<br />";
	echo "ccID:".$ccID."<br />";

?>

</html>