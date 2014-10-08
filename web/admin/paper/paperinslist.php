<?
include('../../common/config.php');

/////////////////////////////////////////////////////
//1.打开数据连接
$db =  mysql_connect($DB_SERVER,$DB_USER,$DB_PASS);
mysql_select_db($DBCom);


//------------------------------------------
//2.处理分页显示试卷实例列表
//------------------------------------------
require "pager.class.php"; 


/*
Class MemberPager extends Pager
{
	function showMemberList()
	{
	
	global $db;

	echo "hello";
	echo $db;
//	exit(0);
	//$data = $this->getPageData(); 
	// 显示结果的代码
       // ......
//	$th=$tablehead;

//	echo $th[0];
//	buildTalbeHead($th);
	
	
//	buildTableBottom();	
   }

	
	//创建表头
	function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table border=1><tr>";
		for(i=0;i<$num;i++)
			echo "<td>".$th[i]."</td>";
		echo "</tr>";
	}

	//创建表尾
	function buildTableBottom()
	{
		echo "</table>";
		
	}
	
	
} 


/// 调用
if ( isset($_GET['page']) )
{
   $page = (int)$_GET['page'];
}
else
{
   $page = 1;
} 

//$sql = "select * from T_PaperLib order by CourceID,PaperLibTitle"; 
$sql = "select * from T_Teacher order by teaID"; 
echo $sql;



//$tablehead=array("标题","课程","创建者","题型","详细");

$pager_option = array(
       "sql" => $sql,
       "PageSize" => 10,
       "CurrentPageID" => $page
); 

if ( isset($_GET['numItems']) )
{
   $pager_option['numItems'] = (int)$_GET['numItems'];
} 


$pager = @new MemberPager($pager_option); 

$pager->showMemberList();


*/
/*

if ( isset($_GET['page']) )
{
   $page = (int)$_GET['page'];
}
else
{
   $page = 1;
} 
$sql = "select * from T_PaperLib order by CourceID,PaperLibTitle"; 

$pager_option = array(
       "sql" => $sql,
       "PageSize" => 10,
       "CurrentPageID" => $page
); 
if ( isset($_GET['numItems']) )
{
   $pager_option['numItems'] = (int)$_GET['numItems'];
} 
$pager = @new Pager($pager_option); 

$data = $pager->getPageData(); 







if ( $pager->isFirstPage )
{
   $turnover = "首页|上一页|";
}
else
{
   $turnover = "首页|上一页|";
} 
if ( $pager->isLastPage )
{
   $turnover .= "下一页|尾页";
}
else
{
   $turnover .= "下一页|尾页";
}

*/
?>