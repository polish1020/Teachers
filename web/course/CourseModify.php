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
		<title>课程列表 - <?php echo $_SESSION['uName']; ?></title>
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
					<h1>修改课程信息</h1>
					<fieldset>
						<legend>编辑课程信息
                            <div class="btn-group pull-right"><a href="CourseList.php"><button type="button" class="btn btn-primary" >返回课程列表</button></a></div>
                        </legend>
                        <form class="form-horizontal" role="form">

                            <div class="control-group">
                                <label for="coBH" class="control-label">课程编号</label>
                                <div class="controls">
                                    <input type="text" class="form-control popover-dismiss" id="coBH" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课程编号">
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coName" class="control-label">课程名称</label>
                                <div class="controls">
                                    <input type="text" class="form-control popover-dismiss" id="coName" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课程名称">
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coYear" class="control-label">开课学年</label>
                                <div class="controls">
                                    <input type="text" class="form-control popover-dismiss" id="coYear" value="" disabled data-container="body" data-toggle="popover" data-placement="right" data-content="请选择开课学年">
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coDept" class="control-label">开课学院</label>
                                <div class="controls">
                                    <select type="text" class="form-control popover-dismiss" id="coDept" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择开课学院">
										<option >计算机学院</option>                                       
                                    </select>
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coTerm" class="control-label">开课学期</label>
                                <div class="controls">
                                    <select type="text" class="form-control popover-dismiss" id="coTerm" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择开课学期">
										<option >春</option>
										<option >夏</option>
										<option >春夏</option>
										<option >秋</option>
										<option >冬</option>
										<option >秋冬</option>
										<option >短</option>                                        
                                    </select>
                                </div><!--End of controls-->
                            </div><!--End of form-group-->
                            
                            <div class="control-group">
                                <label for="coPrecis" class="control-label">课程标签</label>
                                <div class="controls">
                                    <input type="text" class="form-control popover-dismiss" id="coPrecis" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课程标签">
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coNote" class="control-label">课程介绍</label>
                                <div class="controls">
                                    <textarea type="text" class="form-control popover-dismiss" id="coNote" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课程介绍"></textarea>
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coCalendar" class="control-label">课程大纲</label>
                                <div class="controls">
                                    <textarea type="text" class="form-control popover-dismiss" id="coCalendar" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课程大纲"></textarea>
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="control-group">
                                <label for="coStatus" class="control-label">状态</label>
                                <div class="controls">
                                    <select type="text" class="form-control popover-dismiss" id="coStatus" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择课程状态">
										<option id="1">开启</option> 
                                        <option id="0">关闭</option>                                             
                                    </select>
                                </div><!--End of controls-->
                            </div><!--End of form-group-->

                            <div class="form-actions">
								<button type="button" class="btn btn-primary" id="save">保存</button> 
								<button type="button" class="btn" id="cancle">取消</button>
							</div>

                        </from><!--End of form-->
					</fieldset>
				</div><!--End of span9------------------------------------------------------------------------------>

			</div><!--End of row-->
		</div><!--End of container-->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/site.js"></script>
		<script type="text/javascript" src="./CourseModify.js"></script>
        <script type="text/javascript" src="../js/urlGet.js"></script>
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
