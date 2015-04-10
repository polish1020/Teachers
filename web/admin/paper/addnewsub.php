
<?


?>
 
 <div class=row>

 <!--left side  左侧导航列表-->

	<div class="span3">
		<div class="well" style="padding: 8px 0;">
		
			<!--login-->
			<?php 

				//如果登录成功这里不显示
				
				//include_once './include/login.inc'; 
				
			
				//<!--ul_list-->
			
				include_once '../../include/ul_list.inc'; 
			?>
			
			
		</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
	</div><!--end of <div class="span3">-->

	 <!--right side 右侧工作区-->
	<div class="span9">


<TABLE  id="Table3" cellSpacing="0" cellPadding="2" width="900" border="0">
<TR>
	<TD class="ContentTitle" style="HEIGHT: 15px" colSpan="4">
		<P>题目基本信息</P>
	</TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" noWrap align="right">
	课程名称：</TD>
	<TD style="WIDTH: 360px"><select name="lstCource" id="lstCource" style="WIDTH: 100%">
	<option selected="selected" value="1">大学计算机基础</option>
	<option value="2">C语言程序设计</option>
	<option value="3">VB程序设计</option>
	<option value="4">JAVA程序设计</option>
</select></TD>
<TD style="WIDTH: 90px" noWrap align="right">所属大纲分类：</TD>
<TD width="360"><FONT face="宋体"><select name="lstSubCat" id="lstSubCat" style="WIDTH: 100%">
	<option value="-1">请选择大纲内容分类</option>
	<option value="62">A00基础=============</option>
	<option value="1">A01计算机的概念</option>
	<option value="2">A02特点</option>
	<option value="3">A03分类</option>
	<option value="4">A04用途</option>
	<option value="5">A05发展史</option>
	<option value="63">B00码============</option>
	<option value="6">B01数制的概念、特点</option>
	<option value="7">B02常用计数制及相互转换</option>
	<option value="8">B03二进制的加、乘运算及逻辑运算</option>
	<option value="9">B04真值、原码、反码、补码</option>
	<option value="10">B05定点数和浮点数</option>
	<option value="11">B06ASCII码及编码形式；BCD码和Unicode编码</option>
	<option value="12">B07中文编码（输入、内、字型码）</option>
	<option value="64">C00硬件===========</option>
	<option value="13">C01计算机系统的基本组成</option>
	<option value="14">C02冯&#183;诺依曼体系结构的主要特征</option>
	<option value="15">C03逻辑代数与逻辑电路基础（*）</option>
	<option value="16">C04硬件系统组成，CPU（控制器、运算器、寄存器），CISC、RISC</option>
	<option value="17">C05存储系统组成；存储容量及单位；字、字长、地址,Cache，虚拟存储技术；存储设备</option>
	<option value="18">C06输入输出控制方式；总线和接口，USB接口总线；输入输出设备</option>
	<option value="19">C07其它：主板、电源、微机插件（显示卡、声卡、网卡）、扩展槽、端口，多媒体计算机系统</option>
	<option value="65">D00软件和OS============</option>
	<option value="20">D01软件的概念、分类和作用</option>
	<option value="21">D02操作系统概念、分类、层次结构、功能模块</option>
	<option value="22">D03常见的操作系统（如DOS，Windows，Windows NT，Unix、Linux等）</option>
	<option value="23">D04进程管理及I/O设备管理。</option>
	<option value="24">D05文件系统的功能和结构，文件的检索；文件顺序和随机存取的方法；内存管理、虚拟内存及PC机的内存管理</option>
	<option value="25">D06Windows操作系统的文件组织形式和基本操作：文件及文件目录的概念、文件的命名规则，常见的文件类型；文件、文件夹的建立、改名、移动、复制、删除；快捷方式的建立；资源管理器的使用；控制面板的使用等。</option>
	<option value="26">D07BIOS、CMOS的概念及其作用</option>
	<option value="66">E00语言、程序设计与算法=========</option>
	<option value="27">E01指令和指令系统</option>
	<option value="28">E02汇编、编译、解释程序。</option>
	<option value="29">E03程序的概念，程序设计语言（机器语言、汇编语言、其它面向过程和面向对象的程序设计语言的各自特点）</option>
	<option value="30">E04算法的基本概念及程序设计步骤</option>
	<option value="31">E05其它：基于组件的程序设计。数据结构的概念</option>
	<option value="67">F00应用软件===========</option>
	<option value="32">F01应用软件的基本概念。</option>
	<option value="33">F02文字处理软件和Word</option>
	<option value="34">F03电子表格软件和Excel</option>
	<option value="35">F04文稿演示软件和PowerPoint</option>
	<option value="36">F05其它应用软件：常见多媒体软件、科学与工程计算软件及图形/图像软件</option>
	<option value="68">G00数据库============</option>
	<option value="37">G01数据库系统的基本概念和定义；数据库技术的发展；数据管理系统的功能</option>
	<option value="38">G02数据库的数据模型；关系型数据库中的一些基本概念</option>
	<option value="39">G03常见的数据库产品；面向对象和分布式数据库等数据库技术，构建数据库系统（C/S、B/S）</option>
	<option value="40">G04SQL的概念和特点；简单的SQL语句</option>
	<option value="41">G05Access2000 </option>
	<option value="69">H00网络============</option>
	<option value="42">H01网络发展史，计算机网络的定义与作用，常用术语</option>
	<option value="43">H02通信信道和介质、数据通信中的主要技术指标</option>
	<option value="44">H03计算机网络分类，网络的拓扑结构；</option>
	<option value="45">H04网络协议的概念</option>
	<option value="46">H05计算机网络的组成，常见的网络设备</option>
	<option value="47">H06LAN的组网技术、无线局域网，广域网构建；ATM和VPM</option>
	<option value="48">H07网络服务器和网络软件；网上邻居</option>
	<option value="49">H08Internet的发展史，熟悉中国互联网现状</option>
	<option value="50">H09Internet中的一些基本概念</option>
	<option value="51">H10TCP/IP协议；Windows的TCP/IP设置</option>
	<option value="52">H11域名与IP地址，Internet中地址的分类、分配和工作方式；</option>
	<option value="53">H12Internet的接入方式；</option>
	<option value="54">H13Internet提供的主要服务功能；Windows中IE、E-mail、FTP等的使用</option>
	<option value="55">H14FrontPage</option>
	<option value="70">I00其它==============</option>
	<option value="56">I01软件工程的含义、软件开发生命周期、软件开发模型和软件开发过程</option>
	<option value="57">I02软件项目管理；软件工程师职业及其素质要求</option>
	<option value="58">I03多种高性能计算；计算机在科学研究、与教育、与交通、与艺术和娱乐等方面的应用，了解计算机辅助的意义及在各行各业的应用，了解计算机在人工智能、虚拟现实、电子服务等方面的应用</option>
	<option value="59">I04计算机和法律，软件版权和自由软件，隐私保护的概念；计算机和环境的关系</option>
	<option value="60">I05计算机安全工程和计算机系统风险，黑客的危害；计算机病毒的定义，计算机病毒的产生与常见种类，病毒的危害，计算机病毒的传播方式及防治方法；防火墙的概念和几种常见的防火墙的结构及作用；</option>
	<option value="61">I06计算机专业人员的道德标准。</option>
</select></FONT></TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" noWrap align="right"><FONT face="宋体">题目类型：</FONT></TD>
	<TD style="WIDTH: 360px"><select name="lstSubType" id="lstSubType" style="WIDTH: 100%">
	<option value="-1">请选择题型</option>
	<option selected="selected" value="0">所有题型</option>
	<option value="1">判断题</option>
	<option value="2">单选题</option>
	<option value="3">选择性填空题</option>
	<option value="4">填空题</option>
	<option value="5">连线题</option>
	<option value="6">程序填空题</option>
	<option value="7">程序阅读题</option>
	<option value="8">简答题</option>
	<option value="9">编程题</option>
	<option value="10">论述题</option>
	<option value="11">选择性程序阅读题</option>
	<option value="12">选择性程序填空题</option>
</select></TD>
<TD style="WIDTH: 90px" noWrap align="right"><FONT face="宋体">题目编号<FONT color="#ff0000">*</FONT>：</FONT></TD>
<TD width="360"><FONT face="宋体"><input name="txtSubID" type="text" value="010400001" id="txtSubID" class="inputfields" style="width:100%;" /></FONT></TD>
		</TR>
										
<TR>
	<TD style="WIDTH: 90px" noWrap align="right"><FONT face="宋体">题目标题：</FONT></TD>
	<TD width="360"><FONT face="宋体"><input name="txtSubTitle" type="text" id="txtSubTitle" class="inputfields" style="width:100%;" /></FONT></TD>
	<td style="WIDTH: 90px" noWrap align="right">相关题号：</td>
	<td width="360"><input name="txtSubSimilar" type="text" id="txtSubSimilar" class="inputfields" style="width:100%;" /></td>
</TR>

<TR>
	<TD style="WIDTH: 90px" noWrap align="right">题目内容(<font color="#ff0000">*</font>)：</TD>
	<TD style="WIDTH: 810px" colSpan="3"><FONT face="宋体"><textarea name="txtSubCont" id="txtSubCont" class="inputfields" style="height:71px;width:100%;"></textarea></FONT></TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" noWrap align="right">标准答案：</TD>
	<TD style="WIDTH: 810px" colSpan="3"><input name="txtAnswer" type="text" id="txtAnswer" class="inputfields" style="width:100%;" /></TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" align="right"><FONT face="宋体">题目图片：</FONT></TD>
	<TD style="WIDTH: 360px">
		<img id="imgUrl" border="0" />
	</TD>
	<TD style="WIDTH: 90px" align="right"><FONT face="宋体">选择图片：</FONT></TD>
	<TD style="WIDTH: 360px">
		<input type="file" name="fileupImage" id="fileupImage" style="width:100%;" />
	</TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" align="right"><FONT face="宋体">答案规则：</FONT></TD>
	<TD style="WIDTH: 360px"><input name="txtAnswerRule" type="text" id="txtAnswerRule" class="inputfields" style="width:100%;" />
		<span>填空题答案若可互换的规则定义在此,如1,2表示1,2可互换.</TD>
			<TD style="WIDTH: 90px" align="right"><FONT face="宋体">难度系数：</FONT></TD>
			<TD style="WIDTH: 360px"><input name="txtSubDiffculty" type="text" id="txtSubDiffculty" class="inputfields" style="width:100%;" /></TD>
		</TR>
		<TR>
			<TD style="WIDTH: 90px" align="right"><FONT face="宋体">活动状态：</FONT></TD>
			<TD style="WIDTH: 360px"><FONT face="宋体"><input id="chkStatus" type="checkbox" name="chkStatus" /><label for="chkStatus">有效（选中表示该题目有效）</label></FONT></TD>
			<TD style="WIDTH: 90px" align="right"><FONT face="宋体"><FONT face="宋体">题目性质：</FONT></FONT></TD>
			<TD style="WIDTH: 360px"><FONT face="宋体"><input id="chkIsExamSub" type="checkbox" name="chkIsExamSub" /><label for="chkIsExamSub">是否为考试题（选中表示考题，不选为练习题）</label></FONT></TD>
		</TR>
		<TR>
			<TD style="WIDTH: 90px" align="right">内容备份：</TD>
			<TD colspan="3"><FONT face="宋体">
				<textarea name="txtSubContBak" id="txtSubContBak" class="inputfields" style="height:150px;width:100%;"></textarea></FONT></TD>
		</TR>
		<TR>
			<TD class="ContentTitle" style="HEIGHT: 15px" colSpan="4">题目扩展信息:==&gt;标记[flag]：<span 
					class="style1">默认为0，表示选择题（单选、多选）的题目选项；连线题的选择项；若是1，则为多选题的分组信息设置；填空题的分项； 
				简答题的标准答案关键词信息设置（用于判断得分）.</span></TD>
		</TR>
		<TR>
			<TD class="" style="HEIGHT: 15px" colSpan="4">
				<table id="tblSubExt" style="BORDER-RIGHT: gray 2px solid; BORDER-TOP: gray 2px solid; Z-INDEX: 101; LEFT: 40px; BORDER-LEFT: gray 2px solid; WIDTH: 100%; BORDER-BOTTOM: gray 2px solid" cellspacing="0" cellpadding="0" border="0">
	<tr style="BORDER-RIGHT: gray 2px solid; BORDER-TOP: gray 2px solid; BORDER-LEFT: gray 2px solid; BACKGROUND-COLOR: lightgrey" align="center" height="20">
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 20px; BORDER-BOTTOM: tan 1pt solid"><span style="width:18px;"><input id="chkAll" type="checkbox" name="chkAll" /></span></TD>
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 200px; BORDER-BOTTOM: tan 1pt solid"><FONT face="宋体">标题</FONT></TD>
		<TD class="style3" style="border: 1pt solid tan;"><FONT face="宋体">扩展内容描述</FONT></TD>
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 50px; BORDER-BOTTOM: tan 1pt solid"><FONT face="宋体">顺序</FONT></TD>
		<TD class="style2" style="border: 1pt solid tan;" nowrap="nowrap"><FONT face="宋体">标记</FONT></TD>
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 180px; BORDER-BOTTOM: tan 1pt solid">
                                                            有效状态</TD>
	</tr>
	<tr id="r1" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus1" type="checkbox" name="chkStatus1" /></span></td>
		<td id="C1"><input name="txtTitle1" type="text" id="txtTitle1" class="txtNoRight" /></td>
		<td><input name="txtExtCont1" type="text" id="txtExtCont1" class="txtNoRight" /></td>
		<td><input name="txtOrder1" type="text" value="1" id="txtOrder1" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag1" type="checkbox" name="chkFlag1" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus1" type="checkbox" name="chkEStatus1" checked="checked" /></span><input name="txtSubExtID1" type="text" id="txtSubExtID1" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r2" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus2" type="checkbox" name="chkStatus2" /></span></td>
		<td id="C2"><input name="txtTitle2" type="text" id="txtTitle2" class="txtNoRight" /></td>
		<td><input name="txtExtCont2" type="text" id="txtExtCont2" class="txtNoRight" /></td>
		<td><input name="txtOrder2" type="text" value="2" id="txtOrder2" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag2" type="checkbox" name="chkFlag2" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus2" type="checkbox" name="chkEStatus2" checked="checked" /></span><input name="txtSubExtID2" type="text" id="txtSubExtID2" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r3" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus3" type="checkbox" name="chkStatus3" /></span></td>
		<td id="C3"><input name="txtTitle3" type="text" id="txtTitle3" class="txtNoRight" /></td>
		<td><input name="txtExtCont3" type="text" id="txtExtCont3" class="txtNoRight" /></td>
		<td><input name="txtOrder3" type="text" value="3" id="txtOrder3" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag3" type="checkbox" name="chkFlag3" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus3" type="checkbox" name="chkEStatus3" checked="checked" /></span><input name="txtSubExtID3" type="text" id="txtSubExtID3" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r4" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus4" type="checkbox" name="chkStatus4" /></span></td>
		<td id="C4"><input name="txtTitle4" type="text" id="txtTitle4" class="txtNoRight" /></td>
		<td><input name="txtExtCont4" type="text" id="txtExtCont4" class="txtNoRight" /></td>
		<td><input name="txtOrder4" type="text" value="4" id="txtOrder4" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag4" type="checkbox" name="chkFlag4" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus4" type="checkbox" name="chkEStatus4" checked="checked" /></span><input name="txtSubExtID4" type="text" id="txtSubExtID4" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r5" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus5" type="checkbox" name="chkStatus5" /></span></td>
		<td id="C5"><input name="txtTitle5" type="text" id="txtTitle5" class="txtNoRight" /></td>
		<td><input name="txtExtCont5" type="text" id="txtExtCont5" class="txtNoRight" /></td>
		<td><input name="txtOrder5" type="text" value="5" id="txtOrder5" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag5" type="checkbox" name="chkFlag5" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus5" type="checkbox" name="chkEStatus5" checked="checked" /></span><input name="txtSubExtID5" type="text" id="txtSubExtID5" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r6" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus6" type="checkbox" name="chkStatus6" /></span></td>
		<td id="C6"><input name="txtTitle6" type="text" id="txtTitle6" class="txtNoRight" /></td>
		<td><input name="txtExtCont6" type="text" id="txtExtCont6" class="txtNoRight" /></td>
		<td><input name="txtOrder6" type="text" value="6" id="txtOrder6" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag6" type="checkbox" name="chkFlag6" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus6" type="checkbox" name="chkEStatus6" checked="checked" /></span><input name="txtSubExtID6" type="text" id="txtSubExtID6" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r7" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus7" type="checkbox" name="chkStatus7" /></span></td>
		<td id="C7"><input name="txtTitle7" type="text" id="txtTitle7" class="txtNoRight" /></td>
		<td><input name="txtExtCont7" type="text" id="txtExtCont7" class="txtNoRight" /></td>
		<td><input name="txtOrder7" type="text" value="7" id="txtOrder7" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag7" type="checkbox" name="chkFlag7" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus7" type="checkbox" name="chkEStatus7" checked="checked" /></span><input name="txtSubExtID7" type="text" id="txtSubExtID7" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r8" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus8" type="checkbox" name="chkStatus8" /></span></td>
		<td id="C8"><input name="txtTitle8" type="text" id="txtTitle8" class="txtNoRight" /></td>
		<td><input name="txtExtCont8" type="text" id="txtExtCont8" class="txtNoRight" /></td>
		<td><input name="txtOrder8" type="text" value="8" id="txtOrder8" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag8" type="checkbox" name="chkFlag8" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus8" type="checkbox" name="chkEStatus8" checked="checked" /></span><input name="txtSubExtID8" type="text" id="txtSubExtID8" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r9" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus9" type="checkbox" name="chkStatus9" /></span></td>
		<td id="C9"><input name="txtTitle9" type="text" id="txtTitle9" class="txtNoRight" /></td>
		<td><input name="txtExtCont9" type="text" id="txtExtCont9" class="txtNoRight" /></td>
		<td><input name="txtOrder9" type="text" value="9" id="txtOrder9" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag9" type="checkbox" name="chkFlag9" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus9" type="checkbox" name="chkEStatus9" checked="checked" /></span><input name="txtSubExtID9" type="text" id="txtSubExtID9" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r10" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus10" type="checkbox" name="chkStatus10" /></span></td>
		<td id="C10"><input name="txtTitle10" type="text" id="txtTitle10" class="txtNoRight" /></td>
		<td><input name="txtExtCont10" type="text" id="txtExtCont10" class="txtNoRight" /></td>
		<td><input name="txtOrder10" type="text" value="10" id="txtOrder10" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag10" type="checkbox" name="chkFlag10" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus10" type="checkbox" name="chkEStatus10" checked="checked" /></span><input name="txtSubExtID10" type="text" id="txtSubExtID10" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r11" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus11" type="checkbox" name="chkStatus11" /></span></td>
		<td id="C11"><input name="txtTitle11" type="text" id="txtTitle11" class="txtNoRight" /></td>
		<td><input name="txtExtCont11" type="text" id="txtExtCont11" class="txtNoRight" /></td>
		<td><input name="txtOrder11" type="text" value="11" id="txtOrder11" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag11" type="checkbox" name="chkFlag11" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus11" type="checkbox" name="chkEStatus11" checked="checked" /></span><input name="txtSubExtID11" type="text" id="txtSubExtID11" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r12" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus12" type="checkbox" name="chkStatus12" /></span></td>
		<td id="C12"><input name="txtTitle12" type="text" id="txtTitle12" class="txtNoRight" /></td>
		<td><input name="txtExtCont12" type="text" id="txtExtCont12" class="txtNoRight" /></td>
		<td><input name="txtOrder12" type="text" value="12" id="txtOrder12" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag12" type="checkbox" name="chkFlag12" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus12" type="checkbox" name="chkEStatus12" checked="checked" /></span><input name="txtSubExtID12" type="text" id="txtSubExtID12" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r13" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus13" type="checkbox" name="chkStatus13" /></span></td>
		<td id="C13"><input name="txtTitle13" type="text" id="txtTitle13" class="txtNoRight" /></td>
		<td><input name="txtExtCont13" type="text" id="txtExtCont13" class="txtNoRight" /></td>
		<td><input name="txtOrder13" type="text" value="13" id="txtOrder13" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag13" type="checkbox" name="chkFlag13" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus13" type="checkbox" name="chkEStatus13" checked="checked" /></span><input name="txtSubExtID13" type="text" id="txtSubExtID13" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r14" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus14" type="checkbox" name="chkStatus14" /></span></td>
		<td id="C14"><input name="txtTitle14" type="text" id="txtTitle14" class="txtNoRight" /></td>
		<td><input name="txtExtCont14" type="text" id="txtExtCont14" class="txtNoRight" /></td>
		<td><input name="txtOrder14" type="text" value="14" id="txtOrder14" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag14" type="checkbox" name="chkFlag14" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus14" type="checkbox" name="chkEStatus14" checked="checked" /></span><input name="txtSubExtID14" type="text" id="txtSubExtID14" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r15" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus15" type="checkbox" name="chkStatus15" /></span></td>
		<td id="C15"><input name="txtTitle15" type="text" id="txtTitle15" class="txtNoRight" /></td>
		<td><input name="txtExtCont15" type="text" id="txtExtCont15" class="txtNoRight" /></td>
		<td><input name="txtOrder15" type="text" value="15" id="txtOrder15" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag15" type="checkbox" name="chkFlag15" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus15" type="checkbox" name="chkEStatus15" checked="checked" /></span><input name="txtSubExtID15" type="text" id="txtSubExtID15" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r16" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus16" type="checkbox" name="chkStatus16" /></span></td>
		<td id="C16"><input name="txtTitle16" type="text" id="txtTitle16" class="txtNoRight" /></td>
		<td><input name="txtExtCont16" type="text" id="txtExtCont16" class="txtNoRight" /></td>
		<td><input name="txtOrder16" type="text" value="16" id="txtOrder16" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag16" type="checkbox" name="chkFlag16" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus16" type="checkbox" name="chkEStatus16" checked="checked" /></span><input name="txtSubExtID16" type="text" id="txtSubExtID16" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r17" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus17" type="checkbox" name="chkStatus17" /></span></td>
		<td id="C17"><input name="txtTitle17" type="text" id="txtTitle17" class="txtNoRight" /></td>
		<td><input name="txtExtCont17" type="text" id="txtExtCont17" class="txtNoRight" /></td>
		<td><input name="txtOrder17" type="text" value="17" id="txtOrder17" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag17" type="checkbox" name="chkFlag17" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus17" type="checkbox" name="chkEStatus17" checked="checked" /></span><input name="txtSubExtID17" type="text" id="txtSubExtID17" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r18" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus18" type="checkbox" name="chkStatus18" /></span></td>
		<td id="C18"><input name="txtTitle18" type="text" id="txtTitle18" class="txtNoRight" /></td>
		<td><input name="txtExtCont18" type="text" id="txtExtCont18" class="txtNoRight" /></td>
		<td><input name="txtOrder18" type="text" value="18" id="txtOrder18" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag18" type="checkbox" name="chkFlag18" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus18" type="checkbox" name="chkEStatus18" checked="checked" /></span><input name="txtSubExtID18" type="text" id="txtSubExtID18" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r19" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus19" type="checkbox" name="chkStatus19" /></span></td>
		<td id="C19"><input name="txtTitle19" type="text" id="txtTitle19" class="txtNoRight" /></td>
		<td><input name="txtExtCont19" type="text" id="txtExtCont19" class="txtNoRight" /></td>
		<td><input name="txtOrder19" type="text" value="19" id="txtOrder19" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag19" type="checkbox" name="chkFlag19" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus19" type="checkbox" name="chkEStatus19" checked="checked" /></span><input name="txtSubExtID19" type="text" id="txtSubExtID19" class="txtNoRight" style="width:1px;" /></td>
	</tr>
	<tr id="r20" style="DISPLAY:none;BORDER-LEFT-COLOR: #c0c0c0; BORDER-BOTTOM-COLOR: #c0c0c0; BORDER-TOP-COLOR: #c0c0c0; BORDER-RIGHT-COLOR: #c0c0c0;Height:20px;">
		<td align="center"><span class="txtNoRight"><input id="chkStatus20" type="checkbox" name="chkStatus20" /></span></td>
		<td id="C20"><input name="txtTitle20" type="text" id="txtTitle20" class="txtNoRight" /></td>
		<td><input name="txtExtCont20" type="text" id="txtExtCont20" class="txtNoRight" /></td>
		<td><input name="txtOrder20" type="text" value="20" id="txtOrder20" class="txtNoRight" /></td>
		<td><span class="txtNoRight"><input id="chkFlag20" type="checkbox" name="chkFlag20" /></span></td>
		<td><span class="txtNoRight"><input id="chkEStatus20" type="checkbox" name="chkEStatus20" checked="checked" /></span><input name="txtSubExtID20" type="text" id="txtSubExtID20" class="txtNoRight" style="width:1px;" /></td>
	</tr>
</table>

				</TD>
			</TR>
		</TABLE>
		<input name="hidFlag" type="hidden" id="hidFlag" style="WIDTH: 48px; HEIGHT: 22px" size="2" value="0" /> <input name="ExtHig" type="text" id="ExtHig" style="WIDTH: 48px; HEIGHT: 22px" size="2" value="0" />
	</TD>
</tr>
</TABLE>





	</div>
</div>
</div>
