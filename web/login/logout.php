
<?php
session_start();
if(!isset($_SESSION['uNum'])){
	echo "<script language=javascript>window.top.location='../index.php' ;</script>";
	exit;
}

if(isset($_SESSION['uNum'])){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-3600);
	}
	session_destroy();
}
echo "<script language=javascript>window.top.location='../index.php' ;</script>";
?>
