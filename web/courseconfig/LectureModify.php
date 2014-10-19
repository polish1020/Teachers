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
						    配置课程信息：<span id="coName" name=""></span>
						</legend>
                            <ul class="nav nav-tabs">
                                <li class="active"><a>课件管理</a></li>
                                <li><a href="#">实验管理</a></li>
                                <li><a href="#">作业管理</a></li>
                                <li><a href="#">资料管理</a></li>
                                <li><a href="#">题库管理</a></li>
                                <li><a href="#">设置班级</a></li>
                                <div class="btn-group pull-right"><button id="back" type="button" class="btn btn-primary" >返回课件列表</button></div>
                            </ul>
                            <form class="form-horizontal" role="form">
                            
                                <div class="control-group">
                                    <label for="lectNum" class="control-label">课件章节号</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="lectNum" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课件章节号">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="lectTitle" class="control-label">课件标题</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="lectTitle" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课件标题">
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="lectNote" class="control-label">课件内容描述</label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control popover-dismiss" id="lectNote" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写课件内容描述"></textarea>
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="lectDesc" class="control-label">备注</label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control popover-dismiss" id="lectDesc" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请填写备注"></textarea>
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="lectStatus" class="control-label">状态</label>
                                    <div class="controls">
                                        <select type="text" class="form-control popover-dismiss" id="lectStatus" name="" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择课件书否开启">
                                            <option>开启</option>
                                            <option>关闭</option>
                                        </select>
                                    </div><!--End of controls-->
                                </div><!--End of form-group-->
                                
                                <div class="control-group">
                                    <label for="lectFile" class="control-label">课件</label>
                                    <div class="controls">
                                        <input type="text" class="form-control popover-dismiss" id="lectFile" name="lectFile" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择文件" disabled>
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
		<script type="text/javascript" src="./LectureModify.js"></script>
        <script type="text/javascript" src="../js/urlGet.js"></script>
        <script type="text/javascript" src="../js/AjaxFileUploader/ajaxfileupload.js"></script>
        
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
