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
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../css/site.css" rel="stylesheet">
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
				echo "<script>document.getElementById('name').innerHTML='".$_SESSION['uName']."';</script>";
			?>			
			<div class="row">			
				 <!--left side  左侧导航列表-->
				<div class="span3">
					<div class="well" style="padding: 8px 0;">					
						<!--login--><!--ul_list-->
						<?php 																
							include_once '../include/ul_list.inc'; 
						?>												
					</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
				</div><!--end of <div class="span3">-->

				<?php
                    //连接数据库
					include_once('../common/conn_database.php'); 
					//$con=mysql_connect("10.77.30.12", "cstcadmin", "ccs87951254");
					mysql_query("SET NAMES UTF8");
					mysql_select_db("db_common");
					$selectcourse="select * from T_CommonCource";
					$sql=mysql_query($selectcourse);
					if(!$sql){
						echo "Error2: ".mysql_error()."";
						exit();
					}
					$course=$_GET["course"];
				?>
				 <!--right side 右侧工作区-->
				<div class="span9">
					<h1>新增课程</h1>

					<!--<iframe name="fracheck" style="width:0px;height:0px;display:none;"> </iframe>-->
					<form id="newcourse" class="form-horizontal">
						<fieldset>
							<legend>编辑课程信息
							    <div class="btn-group pull-right"><a href="CourseList.php"><button type="button" class="btn btn-primary" >返回课程列表</button></a></div>
							</legend>
							<div class="control-group">
								<label class="control-label" for="courseName">从公共课模版创建</label>
								<div class="controls">

									<select class="form-control popover-dismiss" id="courseName" onChange="change();" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择课程名称">
										<?php											
											while($res=mysql_fetch_array($sql)){
												if($res['ccName']==$course){
													echo "<option selected='selected'>";
												}
												else{
													echo "<option>";
												}
												echo $res['ccName']."</option>";
											}																						
										?>
									</select>
									<script>
										function change(){										
											var url="newcourse.php?course="+newcourse.courseName.value+"";
											window.location.href=url;
											window.location.reload; 
										}
									</script>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="coBH">课程编号</label>
								<div class="controls">
								<?php
									
									$query="select * from T_CommonCource where ccName='".$course."'";
									if(!($sql=mysql_query($query))){
										echo "Error3: ".mysql_error()."";
										exit();
									}
									if(!($res=mysql_fetch_array($sql))){
										//echo "Error4: No result";
									}
									echo "<input type='text' class='form-control popover-dismiss' id='coBH' name='".$res['ccID']."' value='".$res['ccBH']."' data-container='body' data-toggle='popover' data-placement='right' data-content='请填写课程编号' />";
								?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="coName">课程名称</label>
								<div class="controls">
								<?php
									echo "<input type='text' class='form-control popover-dismiss' id='coName' name='coName' value='".$res['ccName']."' data-container='body' data-toggle='popover' data-placement='right' data-content='请填写课程名称' />";
								?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="coYear">开课学年</label>
								<div class="controls">
									<select class="form-control popover-dismiss" id="coYear" name="coYear" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择开课学年">
										<option id="2001">2001-2002</option>
										<option id="2002">2002-2003</option>
										<option id="2003">2003-2004</option>
										<option id="2004">2004-2005</option>
										<option id="2005">2005-2006</option>
										<option id="2006">2006-2007</option>
										<option id="2007">2007-2008</option>
										<option id="2008">2008-2009</option>
										<option id="2009">2009-2010</option>
										<option id="2010">2010-2011</option>
										<option id="2011">2011-2012</option>
										<option id="2012">2012-2013</option>
										<option id="2013">2013-2014</option>
										<option id="2014" selected>2014-2015</option>
										<option id="2015">2015-2016</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="coTerm">开课学期</label>
								<div class="controls">
									<select class="form-control popover-dismiss" id="coTerm" name="coTerm" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择开课学期">
										<option >春</option>
										<option >夏</option>
										<option >春夏</option>
										<option >秋</option>
										<option >冬</option>
										<option selected>秋冬</option>
										<option >短</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label popover-dismiss" for="coDept">所在学院</label>
								<div class="controls">
									<select class="form-control popover-dismiss" id="coDept" name="coDept" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择开课学院">
										<option>计算机学院</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="coPrecis">标签</label>
								<div class="controls">
									<?php
										echo "<input type='text' class='form-control popover-dismiss' id='coPrecis' name='coPrecis' value='".$res['ccPrecis']."' data-container='body' data-toggle='popover' data-placement='right' data-content='请填写课程标签' />";
									?>
								</div>
							</div>
												
							<div class="control-group">
								<label class="control-label" for="coNote">课程介绍</label>
								<div class="controls">
									
									<?php
										echo "<textarea class='form-control popover-dismiss' id='coNote' name='coNote' rows='6' cols='10' data-container='body' data-toggle='popover' data-placement='right' data-content='请填写课程介绍'>".$res['ccNote']."</textarea>";
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="coCalender">课程大纲</label>
								<div class="controls">
									<?php
										echo "<textarea class='form-control popover-dismiss' id='coCalender' name='coCalender' rows='6' cols='10' data-container='body' data-toggle='popover' data-placement='right' data-content='请填写课程大纲'>".$res['ccCalender']."</textarea>";
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="coStatus">立即生效</label>
								<div class="controls">
									<select type="text" class="form-control popover-dismiss" id="coStatus" value="" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择课程状态">
										<option id="1">开启</option> 
                                        <option id="0">关闭</option>                                             
                                    </select>
								</div>
							</div>	
												
							<div class="form-actions">
								<button type="button" class="btn btn-primary" id="save">保存</button> 
								<button type="reset" class="btn" id="cancle">取消</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/site.js"></script>
		<script type="text/javascript" src="./newcourse.js"></script>
		
		<?php
			include_once('../common/closeconnection.php'); 
            include_once("../include/footer.php");
		?>
	</body>
</html>
