<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
</head>
<body>
<div style="height:500px;width:800px;">
<?php

	//加载配置信息
	//include_once "./common/config.php";
	//打开数据连接
	//include_once "./common/openconnection.php";
	
	include_once "../../common/dac.class.php";
	
	///////////////////////////////////////////////////////////////////////////////////////
	$pagename="tealist.php";
	$tbname="T_Teacher";//数据表名称
	$orderby="teaID";//排序字段
	//生成表头
	$thh=array("序号","教师姓名","英文名","帐号名（工号）","密码","电话");
	//指定显示效果
	$style=array("width:60px","width:100px","width:200px","width:200px","","");
	$fld=array("teaID","teaName","teaEnName","teaWorkNum","teaPasswd","teaTel");
	////////////////////////////////////////////////////////////////////////////////////////

	//创建表头
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
	

	//获取记录总数与页数

	//新建数据连接对象
	$dac=new DAC();
	$sql="select * from $tbname";
	$count=$dac->result_query($sql);
	$totalNumber=$count;

	//echo $count."<br>";
	$perNumber=sys_conf::$perNumber;

	$totalPage=ceil($totalNumber/$perNumber); //计算出总页数

	//echo 	"总页数:".$totalPage."<br>";
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
	$sql = "select * from ".$tbname." order by ".$orderby." limit $frompage,$perNumber";// order by teaID"; 

	//执行SQL语句
	$res=$dac->query($sql);
	
	
	buildTalbeHead($thh);
	
	
	//遍历显示结果
	$num=count($res);
	
	

	for($i=0;$i<$num;$i++)
	{
		$row=$res[$i];
		buildTableCont($row,$fld,$style);
	}
	//生成表尾
	buildTableBottom();


	//关闭数据库
    //释放对象
	$dac=null;
?>


<hr>
<table border=1 width=100% ><tr>
<td align=left>
页次：<? echo $page; ?>/<?echo $totalPage;?>页&nbsp;每页<?echo $PERPAGE;?>&nbsp;主题数:<?echo $totalNumber;?>
</td>
<td align=right>
分页：<a href="<?echo $pagename;?>?page=<?echo 1?>">首页</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $prepage; ?>">上一页</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $nextpage; ?>">下一页</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $totalPage; ?>">末页</a>
到第<input type=text name=thispg id=thispg value=<?echo $page;?>>页<input type=button value="Go" onclick="gogo();">
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