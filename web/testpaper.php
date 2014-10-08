<?

phpinfo();
//include('../../common/config.php');

/////////////////////////////////////////////////////

/*
//1.打开数据连接
//$db =  mysql_connect($DB_SERVER,$DB_USER,$DB_PASS);


$db =  mysql_connect("localhost","exam","fcding");

mysql_select_db("db_common");


require ("paper.class.php");



Class MemberPager extends Pager
{
	function showMemberList()
	{

		global $db;

		echo "hello----1";

		//echo $db;

	}

///*	
	//创建表头
	function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table border=1><tr>";
		
		for($i=0;$i<$num;$i++)
			echo "<td>sss</td>";
		
		echo "</tr>";
	}
//*/
	//创建表尾
	function buildTableBottom()
	{
		echo "</table>";
		
	}
	
	
} ;

//echo "hello";


*/

/// 调用
if ( isset($_GET['page']) )
{
   $page = (int)$_GET['page'];
}
else
{
   $page = 1;
} 


echo $page."<br>";

//$sql = "select * from T_PaperLib order by CourceID,PaperLibTitle"; 
$sql = "select * from T_Teacher order by teaID"; 

echo $sql;


$res=mysql_query($sql,$db);

$total=0;

while($row=mysql_fetch_array($res))
{
	echo $row["teaName"]."111<br>";
	
}


//$link = $db->limitQuery($this->sql, $from, $count);


/*

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

?>