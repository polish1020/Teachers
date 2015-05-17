<?php
include_once("../login/checkloginstu.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>我的课程 - <?php echo $_SESSION['uName']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="../css/site.css">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>

	<body>
		<div class="container">			
			<div><img src="../image/logo.gif" style="width:100%"></div>
			<!--菜单-->
			<?php 
				if($_SESSION['utype']=="stu"){
					include_once '../include/menu_navibar_stu.inc';
				}
				else if($_SESSION['utype']=="tea"){
					include_once '../include/menu_navibar_tea.inc';
				}
				echo "<script>document.getElementById('name').innerHTML='".trim($_SESSION['uName'])."';</script>";
			?>			
			<div class="row">
				<!--left side  左侧导航列表-->
				<div class="span3">
					<div class="well" style="padding: 8px 0;">					
						<!--login--><!--ul_list-->
						<?php 																
							include_once '../include/ul_list_stu.inc'; 
						?>												
					</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
				</div><!--end of <div class="span3">-->

				<!--right side 右侧工作区-->
				<div class="span9">
					<h1>课程列表</h1>
					<fieldset>
						<legend>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" id="coYear">2014-2015</button>
                            <button type="buton" class="btn btn-primary dropdown-toggle btn-lg" data-toggle="dropdown">
                                学年<span class="caret"></span>
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
                        </div><!--End of btn-group-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" id="coTerm">所有</button>
                            <button type="buton" class="btn btn-primary dropdown-toggle btn-lg" data-toggle="dropdown">
                                学期<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="changeTerm">
                                <div><li><a>秋冬</a></li></div>
                                <div><li><a>春夏</a></li></div>
                                <div><li><a>秋</a></li></div>
                                <div><li><a>冬</a></li></div>
                                <div><li><a>春</a></li></div>
                                <div><li><a>夏</a></li></div>
                                <div><li><a>短</a></li></div>
                                <div><li class="divider"></li></div>
                                <div><li><a>所有</a></li></div>
                            </ul>
                        </div><!--End of btn-group-->
                        
                    </legend>

                    <div id="result">
                        <table class="table table-striped table-hover">
                            <caption id="tabletitle"></caption>
                            <thead>
                                <tr id="tablehead">
                                    <th>课程编号</th>
                                    <th>课程名称</th>
                                    <th>学年</th>
                                    <th>学期</th>
                                    <th>老师</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="tablebody">
                            </tbody>
                        </table>
                    </div>
					</fieldset>
				</div><!--End of span9-->

			</div><!--End of row-->
		</div><!--End of container-->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/site.js"></script>
		<script type="text/javascript" src="./CourseList.js"></script>
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
