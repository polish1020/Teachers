<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
</head>
<body>
<div style="height:500px;width:800px;">
<?php

	//����������Ϣ
	include_once "./common/config.php";

	//����������
	include_once "./common/openconnection.php";


	//������ͷ

	function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table border=1 width=800px><tr>";
		for($i=0;$i<$num;$i++)
			echo "<td>".$th[$i]."</td>";
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
	
	
	echo "��ǰҳ�룺".$page."<br>";
	
	global $cn;//���빫����������
	
	$link=$cn;
    
	if (!$link){
	     die('Could not connect: ' . mysql_error());
	}     
    else echo "Mysql�Ѿ���ȷ����<br>";
     
	
    mysql_select_db("db_common");
	mysql_query('set names gbk', $link);

	//global $PERPAGE;

	//��ȡ��¼������ҳ��
	$perNumber=$PERPAGE;
	$count=mysql_query("select count(*) from T_Teacher"); //��ü�¼����
	$rs=mysql_fetch_array($count); //����
	$totalNumber=$rs[0];
	$totalPage=ceil($totalNumber/$perNumber); //�������ҳ��
	echo 	"��ҳ��:".$totalPage."<br>";
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
	//$sql = "select * from T_PaperLib order by CourceID,PaperLibTitle"; 
	$sql = "select * from T_Teacher order by teaID limit $frompage,$perNumber";// order by teaID"; 

	echo $sql."<br><hr>";

	//ִ��SQL���
	$res=mysql_query($sql,$link);
	
	//��ͷ
	$thh=array("���","��ʦ����","Ӣ����","�ʺ��������ţ�","����","�绰");

	buildTalbeHead($thh);

	//echo "<table>"
	//������ʾ���
	while($row=mysql_fetch_array($res))
	{
		echo "<tr>";
		
		echo "<td>";
		echo $row["teaID"];
		echo "</td>";

		echo "<td>";
		echo $row["teaName"];
		echo "</td>";
		
		echo "<td>";
		echo $row["teaEnName"];
		echo "</td>";

		echo "<td>";
		echo $row["teaWorkNum"];
		echo "</td>";

		echo "<td>";
		echo $row["teaPasswd"];
		echo "</td>";

		echo "<td>";
		echo $row["teaTel"];
		echo "</td>";

		echo "</tr>";	
	}
	
	buildTableBottom();


	//�ر����ݿ�
    mysql_close($link);

	//phpinfo();
     
?>


<hr>
<table border=1 width=100% ><tr>
<td align=left>
ҳ�Σ�<? echo $page; ?>/<?echo $totalPage;?>ҳ&nbsp;ÿҳ<?echo $PERPAGE;?>&nbsp;������:<?echo $totalNumber;?>
</td>
<td align=right>
��ҳ��<a href="test.php?page=<?echo 1?>">��ҳ</a>&nbsp;<a href="test.php?page=<?echo $prepage; ?>">��һҳ</a>&nbsp;<a href="test.php?page=<?echo $nextpage; ?>">��һҳ</a>&nbsp;<a href="test.php?page=<?echo $totalPage; ?>">ĩҳ</a>
����<input type=text name=thispg id=thispg value=<?echo $page;?>>ҳ<input type=button value="Go" onclick="gogo();">
</td>
</tr>
</table>
<a id=mylnk></a>
<script language=javascript>
	function gogo()
	{
		//var nowpage=thispg.value;
		mylnk.href="test.php?page=" + thispg.value ;
		mylnk.click();
	}
</script>
</div>
</body>
</html>