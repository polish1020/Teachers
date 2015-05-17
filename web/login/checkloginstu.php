<?php
	
		session_start();
    	if(!isset($_SESSION['uNum']) || $_SESSION["utype"] != "stu"){
	    	header("location: ../index.php");
	    	exit;
    	}
	
	
?>