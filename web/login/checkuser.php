
<?php
	//fracheck
	//require('conn_database.php'); 
	include("../common/config.php");
	$unum=$_POST['userNum'];
	$pwd=$_POST['userPwd'];   
	//echo "<script>alert('".$unum."');</script>";
	//echo "<script>alert('".$pwd."');</script>";
	//echo $unum;
	//echo $pwd;
	if(!preg_match('/^[a-zA-Z0-9_]{2,20}$/',$unum)){
	echo "<script language=javascript>alert('用户名输入错误');</script>";
	exit;
	}
	if(!preg_match('/^[a-zA-Z0-9_]{2,20}$/',$pwd)){
	echo "<script language=javascript>alert('密码输入错误');</script>";
	exit;
	}
	//echo "<script language=javascript>alert('请输入用户名2');</script>";

	if($unum=="")
	{
		echo "<script language=javascript>alert('请输入用户名');</script>";
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
	mysql_query("SET NAMES UTF8");
	
	
    mysql_select_db("db_common");

	$query="select * from V_UserInfo where uNum='".$unum."'";
	
	echo $query."<br>";


	$res=mysql_query($query,$con);
	
	if(!$res)
		{
			echo "Database Error";
			exit;
		}
	
	if(mysql_num_rows($res)==0)
	{
		echo "<script language=javascript>alert('用户不存在');</script>";
   
		exit;
	}//end if 
	
	//echo "<script language=javascript>alert('请输入用户名5');</script>";
	
	$row=mysql_fetch_array($res);

	$pwd1=$row["uPwd"];

	echo "sys_passwd:".$pwd1."<br>";

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
	$utyp=$row["uType"];
	$telephone=$row["telephone"];

	session_start();
	session_register('uName');
	$uName=$name;
	$_SESSION["uNum"]=$unum;
	$_SESSION["uid"]=$uid;
	$_SESSION["uPwd"]=$pwd;
	$_SESSION["uName"]=$name;
	$_SESSION["utype"]=$utyp;
	$_SESSION["telephone"]=$telephone;


	mysql_close($con);
	if($utyp=="stu")
		//echo "<script language=javascript>window.parent.navigate(\"../index_stu.php\");</script>";
		echo "<script language=javascript>window.top.location=\"../index/index_stu.php?uid=".$uid."\"; ;</script>";
//		header("Location:../index_stu.php");	
	else if($utyp=="tea")
		echo "<script language=javascript>window.top.location=\"../index/index_tea.php?uid=".$uid."\"; ;</script>";
		//header("Location:../index_tea.php");	
	else if($utyp=="adm")
		echo "<script language=javascript>window.top.location=\"../index/index_adm.php?uid=".$uid."\"; ;</script>";
		//echo "<script language=javascript>window.parent.navigate(\"../index_adm.php\");</script>";
//		header("Location:../index_adm.php");	
?>