<?
include('../common/config.php');

/////////////////////////////////////////////////////
//1.����������
$db =  mysql_connect($DB_SERVER,$DB_USER,$DB_PASS);
mysql_select_db($DBCom);


//------------------------------------------
//2.�����ҳ��ʾ�Ծ�ʵ���б�
//------------------------------------------
require "pager.class.php"; 


Class MemberPager extends Pager
{
	function showMemberList()
	{
	
	global $db;
	
	$data = $this->getPageData(); 
	// ��ʾ����Ĵ���
       // ......
	$th=$tablehead;
	buildTalbeHead($th);
	
	
	buildTableBottom();	
   }

	
	//������ͷ
	function buildTalbeHead($th,$num)
	{
		echo "<table border=1><tr>";
		for(i=0;i<$num;i++)
			echo "<td>".$th[i]."</td>";
		echo "</tr>";
	}

	//������β
	function buildTableBottom()
	{
		echo "</table>";
		
	}
	
	
} 


/// ����
if ( isset($_GET['page']) )
{
   $page = (int)$_GET['page'];
}
else
{
   $page = 1;
} 

$sql = "select * from T_PaperLib order by CourceID,PaperLibTitle"; 

$tablehead=array("����","�γ�","������","����","��ϸ");

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
   $turnover = "��ҳ|��һҳ|";
}
else
{
   $turnover = "��ҳ|��һҳ|";
} 
if ( $pager->isLastPage )
{
   $turnover .= "��һҳ|βҳ";
}
else
{
   $turnover .= "��һҳ|βҳ";
}

*/
?>