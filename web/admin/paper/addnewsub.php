
<?


?>
 
 <div class=row>

 <!--left side  ��ർ���б�-->

	<div class="span3">
		<div class="well" style="padding: 8px 0;">
		
			<!--login-->
			<?php 

				//�����¼�ɹ����ﲻ��ʾ
				
				//include_once './include/login.inc'; 
				
			
				//<!--ul_list-->
			
				include_once '../../include/ul_list.inc'; 
			?>
			
			
		</div> <!--end of <div class="well" style="padding: 8px 0;">--> 
	</div><!--end of <div class="span3">-->

	 <!--right side �Ҳ๤����-->
	<div class="span9">


<TABLE  id="Table3" cellSpacing="0" cellPadding="2" width="900" border="0">
<TR>
	<TD class="ContentTitle" style="HEIGHT: 15px" colSpan="4">
		<P>��Ŀ������Ϣ</P>
	</TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" noWrap align="right">
	�γ����ƣ�</TD>
	<TD style="WIDTH: 360px"><select name="lstCource" id="lstCource" style="WIDTH: 100%">
	<option selected="selected" value="1">��ѧ���������</option>
	<option value="2">C���Գ������</option>
	<option value="3">VB�������</option>
	<option value="4">JAVA�������</option>
</select></TD>
<TD style="WIDTH: 90px" noWrap align="right">������ٷ��ࣺ</TD>
<TD width="360"><FONT face="����"><select name="lstSubCat" id="lstSubCat" style="WIDTH: 100%">
	<option value="-1">��ѡ�������ݷ���</option>
	<option value="62">A00����=============</option>
	<option value="1">A01������ĸ���</option>
	<option value="2">A02�ص�</option>
	<option value="3">A03����</option>
	<option value="4">A04��;</option>
	<option value="5">A05��չʷ</option>
	<option value="63">B00��============</option>
	<option value="6">B01���Ƶĸ���ص�</option>
	<option value="7">B02���ü����Ƽ��໥ת��</option>
	<option value="8">B03�����Ƶļӡ������㼰�߼�����</option>
	<option value="9">B04��ֵ��ԭ�롢���롢����</option>
	<option value="10">B05�������͸�����</option>
	<option value="11">B06ASCII�뼰������ʽ��BCD���Unicode����</option>
	<option value="12">B07���ı��루���롢�ڡ������룩</option>
	<option value="64">C00Ӳ��===========</option>
	<option value="13">C01�����ϵͳ�Ļ������</option>
	<option value="14">C02��&#183;ŵ������ϵ�ṹ����Ҫ����</option>
	<option value="15">C03�߼��������߼���·������*��</option>
	<option value="16">C04Ӳ��ϵͳ��ɣ�CPU�������������������Ĵ�������CISC��RISC</option>
	<option value="17">C05�洢ϵͳ��ɣ��洢��������λ���֡��ֳ�����ַ,Cache������洢�������洢�豸</option>
	<option value="18">C06����������Ʒ�ʽ�����ߺͽӿڣ�USB�ӿ����ߣ���������豸</option>
	<option value="19">C07���������塢��Դ��΢���������ʾ��������������������չ�ۡ��˿ڣ���ý������ϵͳ</option>
	<option value="65">D00�����OS============</option>
	<option value="20">D01����ĸ�����������</option>
	<option value="21">D02����ϵͳ������ࡢ��νṹ������ģ��</option>
	<option value="22">D03�����Ĳ���ϵͳ����DOS��Windows��Windows NT��Unix��Linux�ȣ�</option>
	<option value="23">D04���̹���I/O�豸����</option>
	<option value="24">D05�ļ�ϵͳ�Ĺ��ܺͽṹ���ļ��ļ������ļ�˳��������ȡ�ķ������ڴ���������ڴ漰PC�����ڴ����</option>
	<option value="25">D06Windows����ϵͳ���ļ���֯��ʽ�ͻ����������ļ����ļ�Ŀ¼�ĸ���ļ����������򣬳������ļ����ͣ��ļ����ļ��еĽ������������ƶ������ơ�ɾ������ݷ�ʽ�Ľ�������Դ��������ʹ�ã���������ʹ�õȡ�</option>
	<option value="26">D07BIOS��CMOS�ĸ��������</option>
	<option value="66">E00���ԡ�����������㷨=========</option>
	<option value="27">E01ָ���ָ��ϵͳ</option>
	<option value="28">E02��ࡢ���롢���ͳ���</option>
	<option value="29">E03����ĸ������������ԣ��������ԡ�������ԡ�����������̺��������ĳ���������Եĸ����ص㣩</option>
	<option value="30">E04�㷨�Ļ������������Ʋ���</option>
	<option value="31">E05��������������ĳ�����ơ����ݽṹ�ĸ���</option>
	<option value="67">F00Ӧ�����===========</option>
	<option value="32">F01Ӧ������Ļ������</option>
	<option value="33">F02���ִ��������Word</option>
	<option value="34">F03���ӱ�������Excel</option>
	<option value="35">F04�ĸ���ʾ�����PowerPoint</option>
	<option value="36">F05����Ӧ�������������ý���������ѧ�빤�̼��������ͼ��/ͼ�����</option>
	<option value="68">G00���ݿ�============</option>
	<option value="37">G01���ݿ�ϵͳ�Ļ�������Ͷ��壻���ݿ⼼���ķ�չ�����ݹ���ϵͳ�Ĺ���</option>
	<option value="38">G02���ݿ������ģ�ͣ���ϵ�����ݿ��е�һЩ��������</option>
	<option value="39">G03���������ݿ��Ʒ���������ͷֲ�ʽ���ݿ�����ݿ⼼�����������ݿ�ϵͳ��C/S��B/S��</option>
	<option value="40">G04SQL�ĸ�����ص㣻�򵥵�SQL���</option>
	<option value="41">G05Access2000 </option>
	<option value="69">H00����============</option>
	<option value="42">H01���緢չʷ�����������Ķ��������ã���������</option>
	<option value="43">H02ͨ���ŵ��ͽ��ʡ�����ͨ���е���Ҫ����ָ��</option>
	<option value="44">H03�����������࣬��������˽ṹ��</option>
	<option value="45">H04����Э��ĸ���</option>
	<option value="46">H05������������ɣ������������豸</option>
	<option value="47">H06LAN���������������߾�������������������ATM��VPM</option>
	<option value="48">H07�������������������������ھ�</option>
	<option value="49">H08Internet�ķ�չʷ����Ϥ�й���������״</option>
	<option value="50">H09Internet�е�һЩ��������</option>
	<option value="51">H10TCP/IPЭ�飻Windows��TCP/IP����</option>
	<option value="52">H11������IP��ַ��Internet�е�ַ�ķ��ࡢ����͹�����ʽ��</option>
	<option value="53">H12Internet�Ľ��뷽ʽ��</option>
	<option value="54">H13Internet�ṩ����Ҫ�����ܣ�Windows��IE��E-mail��FTP�ȵ�ʹ��</option>
	<option value="55">H14FrontPage</option>
	<option value="70">I00����==============</option>
	<option value="56">I01������̵ĺ��塢��������������ڡ��������ģ�ͺ������������</option>
	<option value="57">I02�����Ŀ�����������ʦְҵ��������Ҫ��</option>
	<option value="58">I03���ָ����ܼ��㣻������ڿ�ѧ�о�����������뽻ͨ�������������ֵȷ����Ӧ�ã��˽��������������弰�ڸ��и�ҵ��Ӧ�ã��˽��������˹����ܡ�������ʵ�����ӷ���ȷ����Ӧ��</option>
	<option value="59">I04������ͷ��ɣ������Ȩ�������������˽�����ĸ��������ͻ����Ĺ�ϵ</option>
	<option value="60">I05�������ȫ���̺ͼ����ϵͳ���գ��ڿ͵�Σ��������������Ķ��壬����������Ĳ����볣�����࣬������Σ��������������Ĵ�����ʽ�����η���������ǽ�ĸ���ͼ��ֳ����ķ���ǽ�Ľṹ�����ã�</option>
	<option value="61">I06�����רҵ��Ա�ĵ��±�׼��</option>
</select></FONT></TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" noWrap align="right"><FONT face="����">��Ŀ���ͣ�</FONT></TD>
	<TD style="WIDTH: 360px"><select name="lstSubType" id="lstSubType" style="WIDTH: 100%">
	<option value="-1">��ѡ������</option>
	<option selected="selected" value="0">��������</option>
	<option value="1">�ж���</option>
	<option value="2">��ѡ��</option>
	<option value="3">ѡ���������</option>
	<option value="4">�����</option>
	<option value="5">������</option>
	<option value="6">���������</option>
	<option value="7">�����Ķ���</option>
	<option value="8">�����</option>
	<option value="9">�����</option>
	<option value="10">������</option>
	<option value="11">ѡ���Գ����Ķ���</option>
	<option value="12">ѡ���Գ��������</option>
</select></TD>
<TD style="WIDTH: 90px" noWrap align="right"><FONT face="����">��Ŀ���<FONT color="#ff0000">*</FONT>��</FONT></TD>
<TD width="360"><FONT face="����"><input name="txtSubID" type="text" value="010400001" id="txtSubID" class="inputfields" style="width:100%;" /></FONT></TD>
		</TR>
										
<TR>
	<TD style="WIDTH: 90px" noWrap align="right"><FONT face="����">��Ŀ���⣺</FONT></TD>
	<TD width="360"><FONT face="����"><input name="txtSubTitle" type="text" id="txtSubTitle" class="inputfields" style="width:100%;" /></FONT></TD>
	<td style="WIDTH: 90px" noWrap align="right">�����ţ�</td>
	<td width="360"><input name="txtSubSimilar" type="text" id="txtSubSimilar" class="inputfields" style="width:100%;" /></td>
</TR>

<TR>
	<TD style="WIDTH: 90px" noWrap align="right">��Ŀ����(<font color="#ff0000">*</font>)��</TD>
	<TD style="WIDTH: 810px" colSpan="3"><FONT face="����"><textarea name="txtSubCont" id="txtSubCont" class="inputfields" style="height:71px;width:100%;"></textarea></FONT></TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" noWrap align="right">��׼�𰸣�</TD>
	<TD style="WIDTH: 810px" colSpan="3"><input name="txtAnswer" type="text" id="txtAnswer" class="inputfields" style="width:100%;" /></TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" align="right"><FONT face="����">��ĿͼƬ��</FONT></TD>
	<TD style="WIDTH: 360px">
		<img id="imgUrl" border="0" />
	</TD>
	<TD style="WIDTH: 90px" align="right"><FONT face="����">ѡ��ͼƬ��</FONT></TD>
	<TD style="WIDTH: 360px">
		<input type="file" name="fileupImage" id="fileupImage" style="width:100%;" />
	</TD>
</TR>
<TR>
	<TD style="WIDTH: 90px" align="right"><FONT face="����">�𰸹���</FONT></TD>
	<TD style="WIDTH: 360px"><input name="txtAnswerRule" type="text" id="txtAnswerRule" class="inputfields" style="width:100%;" />
		<span>���������ɻ����Ĺ������ڴ�,��1,2��ʾ1,2�ɻ���.</TD>
			<TD style="WIDTH: 90px" align="right"><FONT face="����">�Ѷ�ϵ����</FONT></TD>
			<TD style="WIDTH: 360px"><input name="txtSubDiffculty" type="text" id="txtSubDiffculty" class="inputfields" style="width:100%;" /></TD>
		</TR>
		<TR>
			<TD style="WIDTH: 90px" align="right"><FONT face="����">�״̬��</FONT></TD>
			<TD style="WIDTH: 360px"><FONT face="����"><input id="chkStatus" type="checkbox" name="chkStatus" /><label for="chkStatus">��Ч��ѡ�б�ʾ����Ŀ��Ч��</label></FONT></TD>
			<TD style="WIDTH: 90px" align="right"><FONT face="����"><FONT face="����">��Ŀ���ʣ�</FONT></FONT></TD>
			<TD style="WIDTH: 360px"><FONT face="����"><input id="chkIsExamSub" type="checkbox" name="chkIsExamSub" /><label for="chkIsExamSub">�Ƿ�Ϊ�����⣨ѡ�б�ʾ���⣬��ѡΪ��ϰ�⣩</label></FONT></TD>
		</TR>
		<TR>
			<TD style="WIDTH: 90px" align="right">���ݱ��ݣ�</TD>
			<TD colspan="3"><FONT face="����">
				<textarea name="txtSubContBak" id="txtSubContBak" class="inputfields" style="height:150px;width:100%;"></textarea></FONT></TD>
		</TR>
		<TR>
			<TD class="ContentTitle" style="HEIGHT: 15px" colSpan="4">��Ŀ��չ��Ϣ:==&gt;���[flag]��<span 
					class="style1">Ĭ��Ϊ0����ʾѡ���⣨��ѡ����ѡ������Ŀѡ��������ѡ�������1����Ϊ��ѡ��ķ�����Ϣ���ã������ķ�� 
				�����ı�׼�𰸹ؼ�����Ϣ���ã������жϵ÷֣�.</span></TD>
		</TR>
		<TR>
			<TD class="" style="HEIGHT: 15px" colSpan="4">
				<table id="tblSubExt" style="BORDER-RIGHT: gray 2px solid; BORDER-TOP: gray 2px solid; Z-INDEX: 101; LEFT: 40px; BORDER-LEFT: gray 2px solid; WIDTH: 100%; BORDER-BOTTOM: gray 2px solid" cellspacing="0" cellpadding="0" border="0">
	<tr style="BORDER-RIGHT: gray 2px solid; BORDER-TOP: gray 2px solid; BORDER-LEFT: gray 2px solid; BACKGROUND-COLOR: lightgrey" align="center" height="20">
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 20px; BORDER-BOTTOM: tan 1pt solid"><span style="width:18px;"><input id="chkAll" type="checkbox" name="chkAll" /></span></TD>
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 200px; BORDER-BOTTOM: tan 1pt solid"><FONT face="����">����</FONT></TD>
		<TD class="style3" style="border: 1pt solid tan;"><FONT face="����">��չ��������</FONT></TD>
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 50px; BORDER-BOTTOM: tan 1pt solid"><FONT face="����">˳��</FONT></TD>
		<TD class="style2" style="border: 1pt solid tan;" nowrap="nowrap"><FONT face="����">���</FONT></TD>
		<TD class="HeadToolBack" style="BORDER-RIGHT: tan 1pt solid; BORDER-TOP: tan 1pt solid; BORDER-LEFT: tan 1pt solid; WIDTH: 180px; BORDER-BOTTOM: tan 1pt solid">
                                                            ��Ч״̬</TD>
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
