<?
class sys_conf
{
	public static $dbhost="10.77.30.12";
	public static $dbuser="exam";
	public static $dbpswd="fcding";
	public static $dbname="db_common";	
	public static $perNumber=10;
	public static $SUBTYPE_ARR=array("请选择","判断题","单选题","选择性填空题","填空题","连线题","程序填空题","程序阅读题","简答题","编程题","论述题","选择性程序阅读题","选择性程序填空题");
	public static $OPTABC=array("A","B","C","D","E","F","G","H","I","J");


	//-----------------------------------------------------------------------------------

	//创建表头
	public static function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table class=\"table table-bordered table-striped\" width=100%><tr>";
		for($i=0;$i<$num;$i++)
			echo "<th nowrap align=center>".$th[$i]."</th>";
		echo "<th>操作</th>";
		echo "</tr>";
	} 


	//$thh=array("序号","课程","编号","题目内容","题型","选项","答案");
	//指定显示效果
	//$style=array("width:60px","width:100px","width:100px","width:600px","width:100px","width:400px","","","","","","","","");
	//$fld=array("subID","ccName","subBH","subCont","subTypeID","Opt01","Opt02","Opt03","Opt04","Opt05","Opt06","Opt07","Opt08","subAns");
	//$unionfld=array(1,1,1,1,1,8,1);

	//创建表头For: T_Sublib
	public static function buildTableContUnionFld($row,$fld,$style,$unifld,$cfld)
	{
		$num=count($fld);
		$tbnum=count($unifld);
		//$from=$unifld[0];$to=$unifld[1];//合并
		echo "<tr>";
		$from=0;
		for($i=0;$i<$tbnum;$i++){
			$unionnum=$unifld[$i];//合并字段的个数
			$to=$from+$unionnum;

			if($unionnum==1)
			{
				$ss=$row[$fld[$from]];
				
				$from=$to;
			}
			else
			{
				$ss="";
				$k=0;
				for($j=$from;$j<$to;$j++)
				{
					if($j==$from) $ss=sys_conf::$OPTABC[$k].".".$row[$fld[$j]]."&nbsp;&nbsp;";
					else {
						$ss=$ss.sys_conf::$OPTABC[$k].".".$row[$fld[$j]]."&nbsp;&nbsp;";					
					}
					$k++;
				}
//				echo "<td style=\"".$style[$i]."\">".$ss."</td>";
				$from=$to;
			}			
			
			$ccfld=$cfld[$i];
			//echo $ccfld."<br>";
			if($ccfld=="CSUBTYPETONAME")
				$ss=sys_conf::$SUBTYPE_ARR[$ss];

			echo "<td style=\"".$style[$i]."\">".$ss."</td>";
			/////////////////////////////////////////////////
		}
		
		echo "<th nowrap><a href=\"aa.php\">详细</a>|<a href=\"aa.php\">修改</a>|<a href=\"aa.php\">删除</a></th>";
		echo "</tr>";
		
	}
	
	public static function buildTableCont($row,$fld,$style)
	{
		$num=count($fld);
		echo "<tr>";
		for($i=0;$i<$num;$i++){
				echo "<td style=\"".$style[$i]."\">".$row[$fld[$i]]."</td>";
		}
		echo "<th nowrap><a href=\"aa.php\">详细</a>|<a href=\"aa.php\">删除</a></th>";
		echo "</tr>";
		
	}


	//创建表尾
	public static function buildTableBottom()
	{
		echo "</table>";
	}
}


	


?>

