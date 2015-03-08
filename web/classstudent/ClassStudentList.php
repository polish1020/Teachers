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
						    <h3 id="head">配置课程信息：<span id="coName"></span>  班级：<span id="class"> </span></h3>
						    
						    <!--
						<div class="btn-group">
                            <button type="button" class="btn btn-default" id="coYear">2014-2015</button>
                            <button type="buton" class="btn btn-primary dropdown-toggle btn-lg" data-toggle="dropdown">
                                选择班级<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="changeYear">
                                <div><li><a>2009-2010</a></li></div>
                                <div><li><a>2010-2011</a></li></div>
                                <div><li><a>2011-2012</a></li></div>
                                <div><li><a>2012-2013</a></li></div>
                                <div><li><a>2013-2014</a></li></div>
                                <div><li><a>2014-2015</a></li></div>
                                <div><li><a>2015-2016</a></li></div>
                                <div><li><a>2016-2017</a></li></div>
                            </ul>
                        </div>
                        -->
                        
                        <div class="btn-group">
                            <button type="buton" class="btn btn-default dropdown-toggle btn-lg" data-toggle="dropdown">
                                条件<span class="caret"></span>
                            </button>
                            <button type="button" class="btn btn-default" id="ticket" name="">学号</button>
                            
                            <ul class="dropdown-menu" role="menu" id="changeticket">
                                <div><li><a>姓名</a></li></div>
                                <div><li><a>学号</a></li></div>
                                <div><li><a>英文名</a></li></div>
                                <div><li><a>电话</a></li></div>
                                <div><li><a>QQ号码</a></li></div>
                                <div><li><a>学院</a></li></div>
                 
                            </ul>
                        </div><!--End of btn-group-->
                        
                        
                        
                           
                                    <input type="text" id="key" name="key" value="" style="width: 100px">
                             
                        
                        
                        <div class="btn-group">
                            
                            <button type="button" class="btn btn-primary" id="search">筛选</button>
                            
                        </div><!--End of btn-group-->
                        
                        <div class="btn-group"><button type="button" class="btn btn-primary" id="addone" >添加学生</button></div>
                        <input type="file" name="stufile" id="stufile" value="">
                        <div class="btn-group"><button type="button" class="btn btn-primary" id="addmore" >批量导入</button></div>
                        
                        <div class="btn-group pull-right"><button type="button" class="btn btn-primary" id="back" >返回班级列表</button></div>
                        
						</legend>
                            
                            
                        <table class="table table-striped table-hover">
                            <caption id="tabletitle"></caption>
                            <thead>
                                <tr id="tablehead">
                                    <th>ID</th>
                                    <th>学号</th>
                                    <th>姓名</th>
                                    <th>英文名</th>
                                    <th>联系电话</th>
                                    
                                    <th>QQ号码</th>
                                    <th>学院</th>
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
		<script type="text/javascript" src="../js/AjaxFileUploader/ajaxfileupload.js"></script>
		<script type="text/javascript" src="../js/site.js"></script>
        <script type="text/javascript" src="../js/urlGet.js"></script>
        <script type="text/javascript" src="./ClassStudentList.js"></script>
        <script type="text/javascript" src="../js/config.js"></script>
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
