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
    $return = array("Type"=>"","Result"=>"");
    
    //获取common_class信息	
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
	if($_POST['coStatus']==1){
        $coStatus=1;
    }
	else{
        $coStatus=0;
    }
	if($_POST['courseName']=="自定义课程"){
		$ccID=0;
	}
	else {
		$ccID=$_POST['ccID'];
	}

/*
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
*/
    include_once('../common/conn_database.php');
	//$link=mysql_connect("10.77.30.12", "cstcadmin", "ccs87951254");
    mysql_select_db("db_".$_SESSION["uNum"]);
    //Iscreated
    $query = 'select * from t_course where ';    


    $query='insert into t_course (coBH, coName, techID, coYear, coTerm, coCreateDate, coDept, coNote, coPrecis, coCalender, coStatus, ccID) values ('.$coBH.', '.$coName.', '.$techID.', '.$coYear.', '.$coTerm.', '.$coCreateDate.', '.$coDept.', '.$coNote.', '.$coPrecis.', '.$coCalender.', '.$coStatus.', '.$ccID.')';
    if(!($result=mysql_query($query))){
        
    }
    echo json_encode($return);
?>

</html>
