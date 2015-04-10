<?
// FileName: test_pager.php
// 这是一段简单的示例代码，前边省略了使用pear db类建立数据库连接的代码 



require "pager.class.php"; 


if ( isset($_GET['page']) )
{
   $page = (int)$_GET['page'];
}
else
{
   $page = 1;
} 
$sql = "select * from table order by id"; 
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

?>