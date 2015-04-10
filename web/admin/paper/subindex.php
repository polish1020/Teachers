<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="gbk">
		<title>Dashboard - Akira</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../../css/site.css" rel="stylesheet">
	  
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<div class="container">			
			<div class="row"><img src="../../image/logo.gif" style="width:100%;height:80px;"></div>
			<!--菜单-->
						<!--菜单-->
			<div class="row">
			<?php 
//				include '../../include/menu_navibar_tea_bs.inc'; 
				include '../../include/menu_navibar_adm.inc'; 

			?>
			</div>

			<div class="row">
			<?
				//处理按课程显示题目
				if ( isset($_GET['action']))
				{
				   $action = (int)$_GET['action'];
				} 
				else
				   $action=0;//0-list，1-addnew, 2-update
				
				switch($action){
					case 0:
						include_once "sublist.php";
					case 1:
						include_once "addnewsub.php";
				}				
			?>
			</div>

		</div>
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/site.js"></script>
		
	</body>
</html>