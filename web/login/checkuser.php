
<?php
	//fracheck
	//require('conn_database.php'); 
	include_once("../common/config.php");
	$unum=$_POST['userNum'];
	$pwd=$_POST['userPwd'];   
    if($unum==""){
		echo "<script language=javascript>alert('请输入用户名');</script>";
		exit;
	}
    else if($pwd==""){
        echo "<script language=javascript>alert('请输入密码');</script>";
        exit;
    }
	else if(!preg_match('/^[a-zA-Z0-9_]{2,20}$/',$unum)){
	    echo "<script language=javascript>alert('用户名输入错误');</script>";
	    exit;
	}
	else if(!preg_match('/^[a-zA-Z0-9_]{2,20}$/',$pwd)){
	    echo "<script language=javascript>alert('密码输入错误');</script>";
	    exit;
	}

	

	//连接数据库
	include_once('../common/conn_database.php');
	/*
	$dbh=mysql_connect("10.77.30.12", "cstcadmin", "ccs87951254");

	if(!$dbh)
	{
		echo "Error:Could not connect to database.";
		exit;
	}
	*/
    
    mysql_select_db("db_common");
	$query="select * from V_UserInfo where uNum='".$unum."'";	
	$res=mysql_query($query,$con);
	if(!$res){
		echo mysql_error();
		//echo "<script language=javascript>alert('". mysql_error() ."');</script>";
		exit;
	}
	if(mysql_num_rows($res)==0){
		echo "<script language=javascript>alert('用户不存在');</script>";  
		exit;
	}//end if 	

	$userList = array();
	$userCount = mysql_num_rows($res);

	for ($i = 0; $i < $userCount; $i++) {
		$row = mysql_fetch_array($res);
		$userList[$i] = $row;
	}


	$pwd1=$row["uPwd"];

	if($pwd1!=$pwd)
	{
		echo "<script language=javascript>alert('密码不正确');</script>";
		//echo "密码不正确";
		exit;
	}//end if

	/*存在union和join的View不允许Update

	$time= date('y-m-d h:i:s',time());
	$update_time="update V_UserInfo set online=1,login_time=".time()." where uNum='".$unum."'";
	$error=mysql_error();
	echo "here<br/>";
	if(!($update=mysql_query($update_time,$dbh))){
		echo "<script language=javascript>alert('登录失败,');</script>";
		echo mysql_error();
		die(mysql_error());
	}
	*/

	$name=$row["uName"];
	$uid=$row["uID"];
	$utype=$row["uType"];
	$telephone=$row["telephone"];

	session_start();
	$uName=$name;
	$_SESSION["uNum"]=$unum;
	$_SESSION["uid"]=$uid;
	$_SESSION["uPwd"]=$pwd;
	$_SESSION["uName"]=$name;
	$_SESSION["utype"]=$utype;
	$_SESSION["telephone"]=$telephone;


	if ($utype == "stu") {
		$_SESSION["teaID"] = $row["teaID"];
		$_SESSION["coID"] = $row["coID"];
		$_SESSION["classID"] = $row["classID"];
		$_SESSION["userList"] = $userList;
	}


	include_once('../common/closeconnection.php');

	if($utype=="stu")
		echo "<script language=javascript>window.top.location=\"../index/index_stu.php?uid=".$uid."\"; ;</script>";

	else if($utype=="tea")
		echo "<script language=javascript>window.top.location=\"../index/index_tea.php?uid=".$uid."\"; ;</script>";

	else if($utype=="adm")
		echo "<script language=javascript>window.top.location=\"../index/index_adm.php?uid=".$uid."\"; ;</script>";

?>
