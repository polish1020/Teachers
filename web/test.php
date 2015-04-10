<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
</head>
<body>
<div style="height:500px;width:800px;">
<?php

	//加载配置信息
	include_once "./common/config.php";

	//打开数据连接
	include_once "./common/openconnection.php";


	//创建表头

	function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table border=1 width=800px><tr>";
		for($i=0;$i<$num;$i++)
			echo "<td>".$th[$i]."</td>";
		echo "</tr>";
	}

	//创建表尾
	function buildTableBottom()
	{
		echo "</table>";
		
	}


	//处理分页获取当前页码
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
	
	
	echo "当前页码：".$page."<br>";
	
	global $cn;//引入公共数据连接
	
	$link=$cn;
    
	if (!$link){
	     die('Could not connect: ' . mysql_error());
	}     
    else echo "Mysql已经正确配置<br>";
     
	
    mysql_select_db("db_common");
	mysql_query('set names gbk', $link);

	//global $PERPAGE;

	//获取记录总数与页数
	$perNumber=$PERPAGE;
	$count=mysql_query("select count(*) from T_Teacher"); //获得记录总数
	$rs=mysql_fetch_array($count); //搜索
	$totalNumber=$rs[0];
	$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
	echo 	"总页数:".$totalPage."<br>";
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
	
	//准备SQL语句
	//$sql = "select * from T_PaperLib order by CourceID,PaperLibTitle"; 
	$sql = "select * from T_Teacher order by teaID limit $frompage,$perNumber";// order by teaID"; 

	echo $sql."<br><hr>";

	//执行SQL语句
	$res=mysql_query($sql,$link);
	
	//表头
	$thh=array("序号","教师姓名","英文名","帐号名（工号）","密码","电话");

	buildTalbeHead($thh);

	//echo "<table>"
	//遍历显示结果
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


	//关闭数据库
    mysql_close($link);

	//phpinfo();
     
?>


<hr>
<table border=1 width=100% ><tr>
<td align=left>
页次：<? echo $page; ?>/<?echo $totalPage;?>页&nbsp;每页<?echo $PERPAGE;?>&nbsp;主题数:<?echo $totalNumber;?>
</td>
<td align=right>
分页：<a href="test.php?page=<?echo 1?>">首页</a>&nbsp;<a href="test.php?page=<?echo $prepage; ?>">上一页</a>&nbsp;<a href="test.php?page=<?echo $nextpage; ?>">下一页</a>&nbsp;<a href="test.php?page=<?echo $totalPage; ?>">末页</a>
到第<input type=text name=thispg id=thispg value=<?echo $page;?>>页<input type=button value="Go" onclick="gogo();">
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