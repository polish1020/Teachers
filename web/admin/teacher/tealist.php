<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
</head>
<body>
<div style="height:500px;width:800px;">
<?php

	//����������Ϣ
	//include_once "./common/config.php";
	//����������
	//include_once "./common/openconnection.php";
	
	include_once "../../common/dac.class.php";
	
	///////////////////////////////////////////////////////////////////////////////////////
	$pagename="tealist.php";
	$tbname="T_Teacher";//���ݱ�����
	$orderby="teaID";//�����ֶ�
	//���ɱ�ͷ
	$thh=array("���","��ʦ����","Ӣ����","�ʺ��������ţ�","����","�绰");
	//ָ����ʾЧ��
	$style=array("width:60px","width:100px","width:200px","width:200px","","");
	$fld=array("teaID","teaName","teaEnName","teaWorkNum","teaPasswd","teaTel");
	////////////////////////////////////////////////////////////////////////////////////////

	//������ͷ
	function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table border=1 width=800px><tr>";
		for($i=0;$i<$num;$i++)
			echo "<th nowrap align=center>".$th[$i]."</th>";
		echo "</tr>";
	} 

	function buildTableCont($row,$fld,$style)
	{
		$num=count($fld);
		echo "<tr>";
		for($i=0;$i<$num;$i++)
			echo "<td style=\"".$style[$i]."\">".$row[$fld[$i]]."</td>";
		echo "</tr>";
		
	}

	//������β
	function buildTableBottom()
	{
		echo "</table>";
	}


	
	
	//�����ҳ��ȡ��ǰҳ��
	if ( isset($_GET['page']) )
	{
	   $page = (int)$_GET['page'];
	}
	else
	{
	   $page = 1;
	} 
	
	if ($page==0) {
		$page=1;
	}
	

	//��ȡ��¼������ҳ��

	//�½��������Ӷ���
	$dac=new DAC();
	$sql="select * from $tbname";
	$count=$dac->result_query($sql);
	$totalNumber=$count;

	//echo $count."<br>";
	$perNumber=sys_conf::$perNumber;

	$totalPage=ceil($totalNumber/$perNumber); //�������ҳ��

	//echo 	"��ҳ��:".$totalPage."<br>";
	//--------------------------------------------------------------
	

	
	if ($page==0||$page==1) {
		$prepage=1;
		$nextpage=2;
	}
	else if ($page==$totalPage) 
	{
		$page=$totalPage;
		$prepage=$totalPage-1;
		$nextpage=$totalPage;
	}
	else
	{
		//$page=
		$prepage=$page-1;
		$nextpage=$page+1;
	}
	
	$frompage=($page-1)*$perNumber;
	
	//׼��SQL���
	$sql = "select * from ".$tbname." order by ".$orderby." limit $frompage,$perNumber";// order by teaID"; 

	//ִ��SQL���
	$res=$dac->query($sql);
	
	
	buildTalbeHead($thh);
	
	
	//������ʾ���
	$num=count($res);
	
	

	for($i=0;$i<$num;$i++)
	{
		$row=$res[$i];
		buildTableCont($row,$fld,$style);
	}
	//���ɱ�β
	buildTableBottom();


	//�ر����ݿ�
    //�ͷŶ���
	$dac=null;
?>


<hr>
<table border=1 width=100% ><tr>
<td align=left>
ҳ�Σ�<? echo $page; ?>/<?echo $totalPage;?>ҳ&nbsp;ÿҳ<?echo $PERPAGE;?>&nbsp;������:<?echo $totalNumber;?>
</td>
<td align=right>
��ҳ��<a href="<?echo $pagename;?>?page=<?echo 1?>">��ҳ</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $prepage; ?>">��һҳ</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $nextpage; ?>">��һҳ</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $totalPage; ?>">ĩҳ</a>
����<input type=text name=thispg id=thispg value=<?echo $page;?>>ҳ<input type=button value="Go" onclick="gogo();">
</td>
</tr>
</table>
<a id=mylnk></a>
<script language=javascript>
	function gogo()
	{
		//var nowpage=thispg.value;
		mylnk.href="<?echo $pagename;?>?page=" + thispg.value ;
		mylnk.click();
	}
</script>
</div>
</body>
</html>