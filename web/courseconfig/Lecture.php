<?php
session_start();
if(!isset($_SESSION['uNum'])){
	header("location: ../index.php");
	exit;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>课程管理 - <?php echo $_SESSION['uName']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../css/site.css">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>

	<body>
		<div class="container">			
			<div><img src="../image/logo.gif" style="width:100%"></div>
			<!--菜单----------------------------------------------------------------------------------------->
			<?php 
				if($_SESSION['utype']=="stu"){
					include_once '../include/menu_navibar_stu.inc';
				}
				else if($_SESSION['utype']=="tea"){
					include_once '../include/menu_navibar_tea.inc';
				}
				echo "<script>document.getElementById('name').innerHTML='".$_SESSION['uName']."';</script>";
			?>			
			<div class="row">			
				<!--left side  左侧导航列表--------------------------------------------------------------------->
				<div class="span3">
					<div class="well" style="padding: 8px 0;">					
						<!--login--><!--ul_list-->
						<?php 																
							include_once '../include/ul_list.inc'; 
						?>												
					</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
				</div><!--end of <div class="span3">-->

				<!--right side 右侧工作区--------------------------------------------------------------------------->
				<div class="span9">
					
					<fieldset>
						<legend>
						    配置课程信息：<span id="coName"></span>
						    
						</legend>
                            <ul class="nav nav-tabs">
                                <li class="active"><a>课件管理</a></li>
                                <li><a href="#">实验管理</a></li>
                                <li><a href="#">作业管理</a></li>
                                <li><a href="#">资料管理</a></li>
                                <li><a href="#">题库管理</a></li>
                                <li><a href="#">设置班级</a></li>
                                <div class="btn-group pull-right"><button type="button" class="btn btn-primary" id="new" >添加课件</button></div>
                            </ul>
                            
                        <table class="table table-striped table-hover">
                            <caption id="tabletitle"></caption>
                            <thead>
                                <tr id="tablehead">
                                    <th>ID</th>
                                    <th>章节</th>
                                    <th>标题</th>
                                    <th>描述</th>
                                    <th>备注</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            
                            <tbody id="tablebody">
                            </tbody>                        
                        </table>
					</fieldset>
				</div><!--End of span9------------------------------------------------------------------------------>
                <iframe id="filedownload" style="display:none" href=""></iframe>
			</div><!--End of row-->
		</div><!--End of container-->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/site.js"></script>
		<script type="text/javascript" src="./Lecture.js"></script>
        <script type="text/javascript" src="../js/urlGet.js"></script>
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
