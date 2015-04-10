
<?
	//加载配置信息
	//include_once "./common/config.php";
	//打开数据连接
	//include_once "./common/openconnection.php";
	
	include_once "../../common/dac.class.php";

	//处理按课程显示题目
	if ( isset($_GET['kc']))
	{
	   $kc = (int)$_GET['kc'];
	} 
	else
		$kc=0;
	//处理按题型显示题目
	if ( isset($_GET['tx']))
	{
	   $tx = (int)$_GET['tx'];
	}
	else $tx=0;
	

	
	//处理分页获取当前页码
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
<td valign=middle style="width:60px">选择课程</td>
<td valign=bottom style="width:60px" >
<select id=selkc name=selkc class="select1">
<option value=0>----选择课程----</option>
<option value=1 <? if($kc==1) echo "selected";?>>-计算机科学基础-</option>
<option value=2 if($kc==2) echo "selected";>-C语言程序设计-</option>
<option value=3 if($kc==3) echo "selected";>-JAVA语言程序设计-</option>
</select></td>
<td valign=middle style="width:60px" nowrap>
选择题型</td>
<td valign=bottom style="width:60px" nowrap>
<select id=seltx name=seltx class="select1">
<option value=0>--所有题型--</option>
<?php

	$num=count(sys_conf::$SUBTYPE_ARR);
//	public static $SUBTYPE_ARR=array("请选择","判断题","单选题","选择性填空题","填空题","连线题","程序填空题","程序阅读题","简答题","编程题","论述题","选择性程序阅读题","选择性程序填空题");
	
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
   <input type="button" class="btn btn-default" onclick="query();" value="查 询">

</td>
<td valign=middle style="width:70px" align=center nowrap>
   <input type="button" class="btn btn-default" onclick="addnew();" value="添 加">

</td>
<td valign=middle >


</td></tr></table>
</nav>

<?php
	
	///////////////////////////////////////////////////////////////////////////////////////
	$pagename="subindex.php";
	$tbname="T_Sublib";//数据表名称
	$orderby="subID";//排序字段
	//生成表头
	//$thh=array("序号","课程","编号","题目内容","题型","选项A","选项B","选项C","选项D","选项E","选项F","选项G","选项H","答案");
	$thh=array("序号","课程","编号","题目内容","题型","选项","答案");
	//指定显示效果
	$style=array("width:60px","width:100px","width:100px","width:600px","width:100px","width:400px","","","","","","","","");
	$fld=array("subID","ccName","subBH","subCont","subTypeID","Opt01","Opt02","Opt03","Opt04","Opt05","Opt06","Opt07","Opt08","subAns");
	$unionfld=array(1,1,1,1,1,8,1);
	$cfld=array("0","0","0","0","CSUBTYPETONAME","0","0");
	////////////////////////////////////////////////////////////////////////////////////////
	
	

	//新建数据连接对象
	$dac=new DAC();
	
	//--------------------------------------------------------------
	//获取记录总数与页数
	$sql="select * from ".$tbname;;
	
	
	//条件：按课程选取

	if($kc>0 || $tx>0) $sql=$sql." where 0<>1 ";
	
	if($kc>0) $sql = $sql." and coID=$kc";

	//按题型显示题目
	if($tx>0) $sql = $sql." and subTypeID=$tx";

	//echo $sql."<br>";

	$count=$dac->result_query($sql);
	$totalNumber=$count;
	$perNumber=sys_conf::$perNumber;
	$totalPage=ceil($totalNumber/$perNumber); //计算出总页数

	//echo 	"总页数:".$totalPage."<br>";
	//--------------------------------------------------------------
	
	//分页处理
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
	
	//准备SQL语句
	$sql = "select a.*,b.ccName from ".$tbname." a, T_CommonCource b ";
	$sql = $sql." where a.coID=b.ccID";

	//条件：按课程选取
	if($kc>0) $sql = $sql." and b.ccID=$kc";

	//按题型显示题目
	if($tx>0) $sql = $sql." and a.subTypeID=$tx";
	
	$sql = $sql." order by a.".$orderby;// order by teaID"; 
	
	$sql = $sql." limit $frompage,$perNumber";

	//echo $sql;
	
	//执行SQL语句
	$res=$dac->query($sql);
	
	sys_conf::buildTalbeHead($thh);
	
	
	//遍历显示结果
	$num=count($res);
	//$echo $num;

	for($i=0;$i<$num;$i++)
	{
		$row=$res[$i];
		echo $row["SID"];
		sys_conf::buildTableContUnionFld($row,$fld,$style,$unionfld,$cfld);
	}
	//生成表尾
	sys_conf::buildTableBottom();


	//关闭数据库
    //释放对象
	$dac=null;
?>


<!--<div class=row>
<table border=1 width=100% ><tr>
<td align=left>
页次：<? echo $page; ?>/<?echo $totalPage;?>页&nbsp;每页<?echo $PERPAGE;?>&nbsp;主题数:<?echo $totalNumber;?>
</td>
<td align=right >
分页：<a href="<?echo $pagename;?>?page=<?echo 1;?>&kc=<?echo $kc;?>&tx=<?echo $tx;?>">首页</a>&nbsp;<a  href="<?echo $pagename;?>?page=<?echo $prepage; ?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>"><span style="cursor:hand">上一页</span></a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $nextpage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">下一页</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $totalPage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">末页</a>
到第<input type=text name=thispg id=thispg value=<?echo $page;?>>页<input type=button value="Go" onclick="gogo();">
</td>
</tr>
</table>
</div>
-->
<ol class="breadcrumb">
  <li>页次：<? echo $page; ?>/<?echo $totalPage;?>页&nbsp;每页<?echo $PERPAGE;?>&nbsp;主题数:<?echo $totalNumber;?></li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>分页：<a href="<?echo $pagename;?>?page=<?echo 1;?>&kc=<?echo $kc;?>&tx=<?echo $tx;?>">首页</a>&nbsp;<a  href="<?echo $pagename;?>?page=<?echo $prepage; ?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>"><span style="cursor:hand">上一页</span></a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $nextpage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">下一页</a>&nbsp;<a href="<?echo $pagename;?>?page=<?echo $totalPage;?>&tx=<?echo $tx;?>&kc=<?echo $kc;?>">末页</a>
到第<input type=text name=thispg id=thispg value=<?echo $page;?>>页<input type=button value="Go" onclick="gogo();">
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
