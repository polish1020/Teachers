
<?
	//����������Ϣ
	//include_once "./common/config.php";
	//����������
	//include_once "./common/openconnection.php";
	
	include_once "../../common/dac.class.php";

	//�����γ���ʾ��Ŀ
	if ( isset($_GET['kc']))
	{
	   $kc = (int)$_GET['kc'];
	} 
	else
		$kc=0;
	//����������ʾ��Ŀ
	if ( isset($_GET['tx']))
	{
	   $tx = (int)$_GET['tx'];
	}
	else $tx=0;
	

	
	//�����ҳ��ȡ��ǰҳ��
	if ( isset($_GET['page']))
	{
	   $page = (int)$_GET['page'];
	}
	else
	{
	   $page = 1;
	} 
	
?>

<nav class="navbar navbar-default" role="navigation">

<table border=0 width="100%" height=30px ><tr valign=middle>
<td valign=middle style="width:60px">ѡ��γ�</td>
<td valign=bottom style="width:60px" >
<select id=selkc name=selkc class="select1">
<option value=0>----ѡ��γ�----</option>
<option value=1 <? if($kc==1) echo "selected";?>>-�������ѧ����-</option>
<option value=2 if($kc==2) echo "selected";>-C���Գ������-</option>
<option value=3 if($kc==3) echo "selected";>-JAVA���Գ������-</option>
</select></td>
<td valign=middle style="width:60px" nowrap>
ѡ������</td>
<td valign=bottom style="width:60px" nowrap>
<select id=seltx name=seltx class="select1">
<option value=0>--��������--</option>
<?php

	$num=count(sys_conf::$SUBTYPE_ARR);
//	public static $SUBTYPE_ARR=array("��ѡ��","�ж���","��ѡ��","ѡ���������","�����","������","���������","�����Ķ���","�����","�����","������","ѡ���Գ����Ķ���","ѡ���Գ��������");
	
	for($i=1;$i<$num;$i++){
		if($tx==$i) 
			echo "<option selected value=$i>-".sys_conf::$SUBTYPE_ARR[$i]."-</option>";
		else
			echo "<option value=$i>-".sys_conf::$SUBTYPE_ARR[$i]."-</option>";
	}
?>
</select>
</td >
<td valign=middle style="width:70px"  align=center  nowrap>
   <input type="button" class="btn btn-default" onclick="query();" value="�� ѯ">

</td>
<td valign=middle style="width:70px" align=center nowrap>
   <input type="button" class="btn btn-default" onclick="addnew();" value="�� ��">

</td>
<td valign=middle >


</td></tr></table>
</nav>

<?php
	
	///////////////////////////////////////////////////////////////////////////////////////
	$pagename="subindex.php";
	$tbname="T_Sublib";//���ݱ�����
	$orderby="subID";//�����ֶ�
	//���ɱ�ͷ
	//$thh=array("���","�γ�","���","��Ŀ����","����","ѡ��A","ѡ��B","ѡ��C","ѡ��D","ѡ��E","ѡ��F","ѡ��G","ѡ��H","��");
	$thh=array("���","�γ�","���","��Ŀ����","����","ѡ��","��");
	//ָ����ʾЧ��
	$style=array("width:60px","width:100px","width:100px","width:600px","width:100px","width:400px","","","","","","","","");
	$fld=array("subID","ccName","subBH","subCont","subTypeID","Opt01","Opt02","Opt03","Opt04","Opt05","Opt06","Opt07","Opt08","subAns");
	$unionfld=array(1,1,1,1,1,8,1);
	$cfld=array("0","0","0","0","CSUBTYPETONAME","0","0");
	////////////////////////////////////////////////////////////////////////////////////////
	
	

	//�½��������Ӷ���
	$dac=new DAC();
	
	//--------------------------------------------------------------
	//��ȡ��¼������ҳ��
	$sql="select * from ".$tbname;;
	
	
	//���������γ�ѡȡ

	if($kc>0 || $tx>0) $sql=$sql." where 0<>1 ";
	
	if($kc>0) $sql = $sql." and coID=$kc";

	//��������ʾ��Ŀ
	if($tx>0) $sql = $sql." and subTypeID=$tx";

	//echo $sql."<br>";

	$count=$dac->result_query($sql);
	$totalNumber=$count;
	$perNumber=sys_conf::$perNumber;
	$totalPage=ceil($totalNumber/$perNumber); //�������ҳ��

	//echo 	"��ҳ��:".$totalPage."<br>";
	//--------------------------------------------------------------
	
	//��ҳ����
	if ($page==0||$page==1) {
		$prepage=1;
		$nextpage=2;
		if($nextpage>$totalPage) $nextpage=$totalPage;
	}
	else if ($page==$totalPage) 
	{
		$page=$totalPage;
		$prepage=$totalPage-1;
		if($prepage==0) $prepage=1;
		$nextpage=$totalPage;
	}
	else
	{
		//$page=
		$prepage=$page-1;
		if($prepage==0) $prepage=1;

		$nextpage=$page+1;

		if($nextpage>=$totalPage) $nextpage=$totalPage;
	}
	
	$frompage=($page-1)*$perNumber;
	
	//׼��SQL���
	$sql = "select a.*,b.ccName from ".$tbname." a, T_CommonCource b ";
	$sql = $sql." where a.coID=b.ccID";

	//���������γ�ѡȡ
	if($kc>0) $sql = $sql." and b.ccID=$kc";

	//��������ʾ��Ŀ
	if($tx>0) $sql = $sql." and a.subTypeID=$tx";
	
	$sql = $sql." order by a.".$orderby;// order by teaID"; 
	
	$sql = $sql." limit $frompage,$perNumber";

	//echo $sql;
	
	//ִ��SQL���
	$res=$dac->query($sql);
	
	sys_conf::buildTalbeHead($thh);
	
	
	//������ʾ���
	$num=count($res);
	//$echo $num;

	for($i=0;$i<$num;$i++)
	{
		$row=$res[$i];
		echo $row["SID"];
		sys_conf::buildTableContUnionFld($row,$fld,$style,$unionfld,$cfld);
	}
	//���ɱ�β
	sys_conf::buildTableBottom();


	//�ر����ݿ�
    //�ͷŶ���
	$dac=null;
?>


<!--<div class=row>
<table border=1 width=100% ><tr>
<td align=left>
ҳ�Σ�<? echo $page; ?>/<?echo $totalPage;?>ҳ&nbsp;ÿҳ<?echo $PERPAGE;?>&nbsp;������:<?echo $totalNumber;?>
</td>
<td align=right >
��ҳ��<a href="<?echo $pagename;?>?page=<?echo 1;?>&kc=<?echo $kc;?>&tx=<?echo $tx;?>">��ҳ</a>&nbsp;<a  href="<?echo $pagename;?>?page=<?echo $prepage; ?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>"><span style="cursor:hand">��һҳ</span></a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $nextpage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">��һҳ</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $totalPage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">ĩҳ</a>
����<input type=text name=thispg id=thispg value=<?echo $page;?>>ҳ<input type=button value="Go" onclick="gogo();">
</td>
</tr>
</table>
</div>
-->
<ol class="breadcrumb">
  <li>ҳ�Σ�<? echo $page; ?>/<?echo $totalPage;?>ҳ&nbsp;ÿҳ<?echo $PERPAGE;?>&nbsp;������:<?echo $totalNumber;?></li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>��ҳ��<a href="<?echo $pagename;?>?page=<?echo 1;?>&kc=<?echo $kc;?>&tx=<?echo $tx;?>">��ҳ</a>&nbsp;<a  href="<?echo $pagename;?>?page=<?echo $prepage; ?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>"><span style="cursor:hand">��һҳ</span></a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $nextpage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">��һҳ</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $totalPage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">ĩҳ</a>
����<input type=text name=thispg id=thispg value=<?echo $page;?>>ҳ<input type=button value="Go" onclick="gogo();">
</li>
</ol>


<a id=mylnk></a>

<script language=javascript>
	function gogo()
	{
		//var nowpage=thispg.value;
		var kc=selkc.options[selkc.selectedIndex].value;
		var tx=seltx.options[seltx.selectedIndex].value;

		var url="<?echo $pagename;?>?page=" + thispg.value ;

		if(kc>0) 
			url=url + "&kc=" + kc;

		if(tx>0) 
			url=url + "&tx=" + tx;

		//alert(url);

		mylnk.href=url;
		mylnk.click();
	}
	

	function goprev()
	{
		//var nowpage=thispg.value;
		//var url="<?echo $pagename;?>?page=<?echo $prepage; ?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>"
		var url="<?echo $pagename;?>?page=<?echo $prepage; ?>";
		
		var kc=selkc.options[selkc.selectedIndex].value;
		var tx=seltx.options[seltx.selectedIndex].value;

		if(kc>0) url=url + "&kc=" + kc.toString();

		if(tx>0) url=url + "&tx=" + tx.toString();


		//alert(url);

		mylnk.href=url;
		//window.navigate(url);
		mylnk.click();
	}
	


	function gonext()
	{
		//var nowpage=thispg.value;
		mylnk.href="<?echo $pagename;?>?page=" + thispg.value ;
		mylnk.click();
	}
	
	
	function gofirst()
	{
		//var nowpage=thispg.value;
		mylnk.href="<?echo $pagename;?>?page=" + thispg.value ;
		mylnk.click();
	}
	
	function golast()
	{
		//var nowpage=thispg.value;
		mylnk.href="<?echo $pagename;?>?page=" + thispg.value ;
		mylnk.click();
	}


	function query()
	{
		//alert("query");
		
		var kc=selkc.options[selkc.selectedIndex].value;
		var tx=seltx.options[seltx.selectedIndex].value;

		var url;

		//alert (kc);

		url="<?echo $pagename;?>?page=<?echo $page;?>";

		if(kc>0) 
			url=url + "&kc=" + kc;

		if(tx>0) 
			url=url + "&tx=" + tx;

		//alert (url);
		
		mylnk.href=url;
		mylnk.click();

		return (0);
	}
	
	function addnew()
	{
		var url="subindex.php?action=1";
		mylnk.href=url;
		mylnk.click();
		return(0);
	}
</script>
