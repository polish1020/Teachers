<?php
session_start();
if(!isset($_SESSION['uNum'])){
	echo "<script language=javascript>window.top.location='../index.php' ;</script>";
	exit;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="gb2312">
		<title>Dashboard - Akira</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../css/site.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>

		

		<div class="container">			
			<div><img src="../image/logo.gif" style="width:100%"></div>
			<!--�˵�-->
						<!--�˵�-->
			<?php 
				include_once '../include/menu_navibar_adm.inc'; 
			?>
			<?php
			echo "<script>document.getElementById('name').innerHTML='".$_SESSION['uName']."';</script>";
			?>


			<div class="row">
				
				 <!--left side  ��ർ���б�-->
				<div class="span3">
					<div class="well" style="padding: 8px 0;">
					
						<!--login-->
						<?php 

							//�����¼�ɹ����ﲻ��ʾ
							
//							include_once './include/login.inc'; 
							
						
							//<!--ul_list-->
						
							include_once '../include/ul_list.inc'; 
						?>
						
						
					</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
				</div><!--end of <div class="span3">-->

				 <!--right side �Ҳ๤����-->
				<div class="span9">
					
					<h4>
						������Ϣ
					</h4>
					<div style="padding: 15px; margin-bottom: 10px; font-size: 15px;font-weight: 200;line-height: 30px;color: inherit;background-color: #eeeeee; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
					�μ�2013-2014����ѧ�ڼ����������γ̿��ԵĿ���������Я��ѧ��֤�����֤�������ѧ��֤�����֤֮һ��ʧ��Ӧץ����֤���޷���ʱ��֤������и���Ա��ǩ���ҼӸ�����ѧԺ���µ�֤����˫֤��û�еģ����ܲμӿ��ԡ�֤�������߳ɼ���0���Ҳ���ɼ�������
					</div>

					<h4>
						�γ̼��
					</h4>
					
					C/C++/JAVA������ƻ�����ʵ��
					<div style="padding: 15px; margin-bottom: 10px; font-size: 15px;font-weight: 200;line-height: 30px;color: inherit;background-color: #eeeeee; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
					������ƻ�����ʵ�飨C/C++/JAVA���γ�����У��רҵ���޵ļ�������������γ�֮һ��ͨ�����ܳ���������ԵĹ��ܼ����̼�����ʹѧ���˽�߼�����������ԵĽṹ�����ջ����ĳ�����ƹ��̺ͼ��ɣ����ջ����ķ�����������ü�������������������߱������ĸ߼����Գ�������������ɼ�����������=����*50%+ʵ��*25%+ƽʱ*25%���ϸ����Ҫ�󣺱��Գɼ������55����ʵ�����ϸ�
					<br>
					</div>
					�������ѧ����
					<div style="padding: 15px; margin-bottom: 10px; font-size: 15px;font-weight: 200;line-height: 30px;color: inherit;background-color: #eeeeee; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
					���γ�����У������ũ��ҽ���ĵ��������רҵ���޵ļ���������γ̣� ͨ�����γ̵�ѧϰ��ʹѧ���Լ������ѧ�������漰��֪ʶ����չ��������һ��ȫ����˽⣬ �������ռ�����Ļ����������ܣ���Ϥ����Ӧ�������ʹ�ã����������������ʶ���Ա����ڵ� �������Ϣ������и��õ�ѧϰ������͹�����ͬʱҲΪ��̼��������ؿγ̵�ѧϰ��û������ɼ�����������=����*50%+�ۺϱ���*25%+ƽʱ*25%���ϸ����Ҫ�����۳ɼ������55��
					</div>
				<!--
				<DIV id="scrollobj" class="hero-unit" style="white-space:nowrap;overflow:hidden;width:750px;height:20px;"
				onmouseover="aa()" onmouseout="b()" >
				������ƻ�����ʵ�飨C/C++/JAVA���γ�����У��רҵ���޵ļ�������������γ�֮һ��ͨ�����ܳ���������ԵĹ��ܼ����̼�����ʹѧ���˽�߼�����������ԵĽṹ�����ջ����ĳ�����ƹ��̺ͼ��ɣ����ջ����ķ�����������ü�������������������߱������ĸ߼����Գ�������������ɼ�����������=����*50%+ʵ��*25%+ƽʱ*25%���ϸ����Ҫ�󣺱��Գɼ������55����ʵ�����ϸ�
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
						//�������������ұ߶���ʱ  style="white-space:nowrap;overflow:hidden;width:500px;height:200px"
						if (obj.scrollLeft==tmp) obj.innerHTML += obj.innerHTML;
						//�������������˳�ʼ���ݵĿ��ʱ�������ص������
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

					<h2>
						Recent Activity
					</h2>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									Project
								</th>
								<th>
									Client
								</th>
								<th>
									Type
								</th>
								<th>
									Date
								</th>
								<th>
									View
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									Nike.com Redesign
								</td>
								<td>
									Monsters Inc
								</td>
								<td>
									New Task
								</td>
								<td>
									4 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Nike.com Redesign
								</td>
								<td>
									Monsters Inc
								</td>
								<td>
									New Message
								</td>
								<td>
									5 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Nike.com Redesign
								</td>
								<td>
									Monsters Inc
								</td>
								<td>
									New Project
								</td>
								<td>
									5 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Twitter Server Consulting
								</td>
								<td>
									Bad Robot
								</td>
								<td>
									New Task
								</td>
								<td>
									6 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Childrens Book Illustration
								</td>
								<td>
									Evil Genius
								</td>
								<td>
									New Message
								</td>
								<td>
									9 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Twitter Server Consulting
								</td>
								<td>
									Bad Robot
								</td>
								<td>
									New Task
								</td>
								<td>
									16 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Twitter Server Consulting
								</td>
								<td>
									Bad Robot
								</td>
								<td>
									New Project
								</td>
								<td>
									16 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
							<tr>
								<td>
									Twitter Server Proposal
								</td>
								<td>
									Bad Robot
								</td>
								<td>
									Completed Project
								</td>
								<td>
									20 days ago
								</td>
								<td>
									<a href="#" class="view-link">View</a>
								</td>
							</tr>
						</tbody>
					</table>

					<ul class="pager">
						<li class="next">
							<a href="activity.htm">More &rarr;</a>
						</li>
					</ul>
                    
					<ul class="pager">
						<li class="next">
							More Templates <a href="http://www.cssmoban.com/" target="_blank" title="ģ��֮��">ģ��֮��</a> - Collect from <a href="http://www.cssmoban.com/" title="��ҳģ��" target="_blank">��ҳģ��</a>
						</li>
					</ul>

				</div>
			</div>

		</div>
		<hr>

		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/site.js"></script>
		
	</body>
</html>