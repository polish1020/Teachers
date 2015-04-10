<?php
session_start();
if(!isset($_SESSION['uNum'])){
	header("location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>Profile - <?php echo $_SESSION['uName']; ?></title>
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
						<!--菜单-->
			<?php 
				if($_SESSION['utype']=="stu"){
					include_once '../include/menu_navibar_stu.inc';
				}
				else if($_SESSION['utype']=="tea"){
					include_once '../include/menu_navibar_tea.inc';
				}

			?>
			<?php
			echo "<script>document.getElementById('name').innerHTML='".$_SESSION['uName']."';</script>";
			?>
			

			<div class="row">
				
				 <!--left side  左侧导航列表-->
				<div class="span3">
					<div class="well" style="padding: 8px 0;">
					
						<!--login-->
						<?php 

							//如果登录成功这里不显示
							
							//include_once './include/login.inc'; 
							
						
							//<!--ul_list-->
						
							include_once '../include/ul_list.inc'; 
						?>
						
						
					</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
				</div><!--end of <div class="span3">-->

				 <!--right side 右侧工作区-->
				<div class="span9">
					<h1>
						Edit Your Profile
					</h1>
					<form id="edit-profile" class="form-horizontal">
						<fieldset>
							<legend>Your Profile</legend>
							<div class="control-group">
								<label class="control-label" for="input01">Name</label>
								<div class="controls">
									<?php
									echo "<input type='text' class='input-xlarge' id='input01' value=".$_SESSION['uName']." />";
									?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Phone</label>
								<div class="controls">
								<?php
									echo "<input type='text' class='input-xlarge' id='input01' value='".$_SESSION['telephone']."' />";
								?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Email</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" value="john.smith@example.org" />
								</div>
							</div>
												
							<div class="control-group">
								<label class="control-label" for="textarea">Biography</label>
								<div class="controls">
									<textarea class="input-xlarge" id="textarea" rows="4">Web technology junkie who writes innovative and bestselling technical books. Also enjoys Sunday bicycle rides and all "good" comedy.</textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="optionsCheckbox">Public Profile</label>
								<div class="controls">
									<input type="checkbox" id="optionsCheckbox" value="option1" checked="checked" />
								</div>
							</div>						
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button> <button class="btn">Cancel</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/site.js"></script>
		<script>
		//改变导航栏样式
			document.getElementById('index').className="dropdown";
			document.getElementById('setting').className="active dropdown";
		</script>
        <?php
            include_once("../include/footer.php");
        ?>
	</body>
</html>
