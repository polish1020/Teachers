<?
// FileName: test_pager.php
// ����һ�μ򵥵�ʾ�����룬ǰ��ʡ����ʹ��pear db�ཨ�����ݿ����ӵĴ��� 



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

?>