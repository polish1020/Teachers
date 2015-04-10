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
						    
						    
						</legend>
						
                            <ul class="nav nav-tabs">
                                <?php
                                    include_once("../include/navibar_CourseConfig.inc");
                                ?>
                                <div class="btn-group pull-right"><button id="back" type="button" class="btn btn-primary" >返回学生列表</button></div>
                            </ul>
                        
                            <form class="form-horizontal" role="form">

                                <div class="control-group">
                                    <label for="stuNumber" class="control-label">学号</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="stuNumber" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写学号">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="stuName" class="control-label">姓名</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="stuName" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写学生姓名">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="stuEnName" class="control-label">英文名</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="stuEnName" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写英文名">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="telphone" class="control-label">电话</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="telphone" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写联系电话">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="stuQQNum" class="control-label">QQ</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="stuQQNum" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写ＱＱ">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="stuFace" class="control-label">stuFace</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="stuFace" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写Face">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="deptName" class="control-label">学院</label>
                                    <div class="controls">
                                        <select type="text" class="form-control popover-dismiss" id="deptName" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写学院">
                                            <option>计算机学院</option>                               
                                        </select>
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="stuDesc" class="control-label">描述</label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control popover-dismiss" id="stuDesc" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写描述"></textarea>
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                
                                <div class="control-group">
                                    <label for="stuStatsu" class="control-label">状态</label>
                                    <div class="controls">
                                        <select type="text" class="form-control popover-dismiss" id="stuStatus" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择学生是否开启">
                                            <option>开启</option>
                                            <option>关闭</option>
                                        </select>
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="form-actions">
								    <button type="button" class="btn btn-primary" id="save">保存</button> 
								    <button type="button" class="btn" id="cancle">取消</button>
							    </div>
                            </form>
					</fieldset>
				</div><!--End of span9------------------------------------------------------------------------------>

			</div><!--End of row-->
		</div><!--End of container-->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/site.js"></script>
        <script type="text/javascript" src="../js/urlGet.js"></script>
        <script type="text/javascript" src="../js/AjaxFileUploader/ajaxfileupload.js"></script>
        <script type="text/javascript" src="../js/config.js"></script>
        <script type="text/javascript" src="./StudentModify.js"></script>
        
        
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
