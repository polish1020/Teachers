<?php
	
		session_start();
    	if(!isset($_SESSION['uNum']) || $_SESSION["utype"] != "tea"){
	    	header("location: ../index.php");
	    	exit;
    	}
	
	
?>