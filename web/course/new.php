<?php
	session_start();
	if(!isset($_SESSION['uNum'])){
		header("location: ../index.php");
		exit;
	}

    include_once("../common/FileCopy.php");
    include_once("../common/FileDelete.php");
    error_reporting(0);
    date_default_timezone_set('PRC');
    $return = array("Info"=>"","Result"=>"");
    
    //获取common_class信息	
	$coBH=$_POST['ThiscoBH'];
	$coName=$_POST['ThiscoName'];
    $coName = mysql_real_escape_string($coName);
	$techID=$_SESSION['uid'];
	$coYear=$_POST['ThiscoYear'];
	$coTerm=$_POST['ThiscoTerm'];
	$coCreateDate=date('Y-m-d H:m:s',time());
	$coDept=$_POST['ThiscoDept'];
	$coNote=$_POST['ThiscoNote'];
	$coPrecis=$_POST['ThiscoPrecis'];
	$coCalender=$_POST['ThiscoCalender'];
    $coCalender = mysql_real_escape_string($coCalender);
	if($_POST['ThiscoStatus']==1){
        $coStatus=1;
    }
	else{
        $coStatus=0;
    }
	if($_POST['ThiscourseName']=="自定义课程"){
		$ccID=0;
	}
	else {
		$ccID=$_POST['ThisccID'];
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
    //用课程编号、教师ID、开课年份、开课学期、开课学院 来判断课程是否已经建立。
    //$techID = 10000000002;
    $query = 'select * from t_course where coName="'.$coName.'" and techID='.$techID.' and coYear="'.$coYear.'" and coTerm="'.$coTerm.'" and coDept="'.$coDept.'"';
    if(!($result=mysql_query($query))){
        $return['Result'] = "fail";
        $return['Info'] = "Search error : ".mysql_error();
    }
    else{
        if(($row = mysql_fetch_array($result))){
            $return['Result'] = "fail";
            $return['Info'] = "课程已经存在，请到课程管理界面查看";
        }
        else{
            //echo $coCreateDate;
            $query='insert into t_course (coBH, coName, techID, coYear, coTerm, coCreateDate, coDept, coNote, coPrecis, coCalendar, coStatus, ccID) values ("'.$coBH.'", "'.$coName.'", '.$techID.', "'.$coYear.'", "'.$coTerm.'", "'.$coCreateDate.'", "'.$coDept.'", "'.$coNote.'", "'.$coPrecis.'", "'.$coCalender.'", '.$coStatus.', '.$ccID.')';
            if(!($result=mysql_query($query))){
                $return['Result'] = "fail";
                $return['Info'] = "Insert error : ".mysql_error();
            }
            else{
                $return['Result'] = "success";
                $return['Info'] = "成功创建课程： ".$coName."";
                $coID = mysql_insert_id();
                $src = "../../teacherdata/lessontemplate";
                $dst = "../../teacherdata/".$_SESSION["uNum"]."/lesson/".$coYear."/".$coID."";
                $dst_year = "../../teacherdata/".$_SESSION["uNum"]."/lesson/".$coYear;
                if(!file_exists($dst_year)){
                    mkdir($dst_year);                    
                }
                FileCopy($src, $dst);
            }
        }
    }

    echo json_encode($return);
?>





