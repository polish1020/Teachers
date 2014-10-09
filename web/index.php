<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>计算机学院基础教学中心网站</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>

		

		<div class="container">		
		
			<div><img src="./image/logo.gif" style="width:100%"></div>
			<!--菜单-->
			
			<?php 
			include_once './include/menu_navibar_default.inc'; 
			?>
			 <!--菜单-->


			<div class="row">
				
				 <!--left side  左侧导航列表-->
				<div class="span3">
					<div class="well" style="padding: 8px 0;">
					
						<!--login-->
						<?php 
							//如果登录成功这里不显示
							include_once './include/login.inc'; 
							//<!--ul_list-->
							include_once './include/link.inc'; 
						?>												
					</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
				</div><!--end of <div class="span3">-->

				 <!--right side 右侧工作区-->
				<div class="span9">
					
					<h4>
						最新消息
					</h4>
					<div style="padding: 15px; margin-bottom: 10px; font-size: 15px;font-weight: 200;line-height: 30px;color: inherit;background-color: #eeeeee; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
					参加2013-2014春夏学期计算机基础类课程考试的考生，必须携带学生证和身份证。如果有学生证或身份证之一遗失的应抓紧补证，无法及时补证的需持有辅导员的签字且加盖求是学院公章的证明。双证均没有的，不能参加考试。证件不齐者成绩记0分且不予成绩更正。
					</div>

					<h4>
						课程简介
					</h4>
					
					C/C++/JAVA程序设计基础及实验
					<div style="padding: 15px; margin-bottom: 10px; font-size: 15px;font-weight: 200;line-height: 30px;color: inherit;background-color: #eeeeee; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
					程序设计基础与实验（C/C++/JAVA）课程是我校各专业必修的计算机技术基础课程之一，通过介绍程序设计语言的功能及其编程技术，使学生了解高级程序设计语言的结构，掌握基本的程序设计过程和技巧，掌握基本的分析问题和利用计算机求解问题的能力，具备初步的高级语言程序设计能力。成绩评定：总评=笔试*50%+实验*25%+平时*25%。合格最低要求：笔试成绩必须≥55，且实验必须合格。
					<br>
					</div>
					计算机科学基础
					<div style="padding: 15px; margin-bottom: 10px; font-size: 15px;font-weight: 200;line-height: 30px;color: inherit;background-color: #eeeeee; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
					本课程是我校理、工、农、医、文等类各本科专业必修的计算机基础课程， 通过本课程的学习，使学生对计算机科学领域所涉及的知识、发展的趋势有一个全面的了解， 并能掌握计算机的基本操作技能，熟悉常见应用软件的使用，初步培养计算机意识，以便能在当 今这个信息化社会中更好地学习、生活和工作，同时也为后继计算机及相关课程的学习打好基础。成绩评定：总评=笔试*50%+综合报告*25%+平时*25%。合格最低要求：理论成绩必须≥55。
					</div>
				<!--
				<DIV id="scrollobj" class="hero-unit" style="white-space:nowrap;overflow:hidden;width:750px;height:20px;"
				onmouseover="aa()" onmouseout="b()" >
				程序设计基础与实验（C/C++/JAVA）课程是我校各专业必修的计算机技术基础课程之一，通过介绍程序设计语言的功能及其编程技术，使学生了解高级程序设计语言的结构，掌握基本的程序设计过程和技巧，掌握基本的分析问题和利用计算机求解问题的能力，具备初步的高级语言程序设计能力。成绩评定：总评=笔试*50%+实验*25%+平时*25%。合格最低要求：笔试成绩必须≥55，且实验必须合格。
				</DIV>
				<MARQUEE behavior="scroll" contenteditable="true" direction="down"
					onstart="this.firstChild.innerHTML=this.firstChild.innerHTML;"
					scrollamount="3" width="500" height=0px>
						<SPAN unselectable="on"></SPAN>
				</MARQUEE>
				<script language="javascript" type="text/javascript">
				<!--
					function scroll(obj) {
						var tmp = (obj.scrollLeft)++;
						//当滚动条到达右边顶端时  style="white-space:nowrap;overflow:hidden;width:500px;height:200px"
						if (obj.scrollLeft==tmp) obj.innerHTML += obj.innerHTML;
						//当滚动条滚动了初始内容的宽度时滚动条回到最左端
						if (obj.scrollLeft>=obj.firstChild.offsetWidth) obj.scrollLeft=0;
					}
					var a =	setInterval("scroll(document.getElementById('scrollobj'))",20);
					function aa(){
						clearInterval(a);
					}
					function b(){
						a=setInterval("scroll(document.getElementById('scrollobj'))",10);
					}
				//-->
				<!--</script>
						-->			
					

					<div class="well summary">
						<ul>
							<li>
								<a href="#"><span class="count">3</span> Projects</a>
							</li>
							<li>
								<a href="#"><span class="count">27</span> Tasks</a>
							</li>
							<li>
								<a href="#"><span class="count">7</span> Messages</a>
							</li>
							<li class="last">
								<a href="#"><span class="count">5</span> Files</a>
							</li>
						</ul>
					</div>


				</div>
			</div>

		</div>
		<hr>
		

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/site.js"></script>
		<?php 
			include_once './include/footer.php'; 
		?>
	</body>
</html>
