<?
class sys_conf
{
	public static $dbhost="10.77.30.12";
	public static $dbuser="exam";
	public static $dbpswd="fcding";
	public static $dbname="db_common";	
	public static $perNumber=10;
	public static $SUBTYPE_ARR=array("��ѡ��","�ж���","��ѡ��","ѡ���������","�����","������","���������","�����Ķ���","�����","�����","������","ѡ���Գ����Ķ���","ѡ���Գ��������");
	public static $OPTABC=array("A","B","C","D","E","F","G","H","I","J");


	//-----------------------------------------------------------------------------------

	//������ͷ
	public static function buildTalbeHead($th)
	{
		$num=count($th);
		echo "<table class=\"table table-bordered table-striped\" width=100%><tr>";
		for($i=0;$i<$num;$i++)
			echo "<th nowrap align=center>".$th[$i]."</th>";
		echo "<th>����</th>";
		echo "</tr>";
	} 


	//$thh=array("���","�γ�","���","��Ŀ����","����","ѡ��","��");
	//ָ����ʾЧ��
	//$style=array("width:60px","width:100px","width:100px","width:600px","width:100px","width:400px","","","","","","","","");
	//$fld=array("subID","ccName","subBH","subCont","subTypeID","Opt01","Opt02","Opt03","Opt04","Opt05","Opt06","Opt07","Opt08","subAns");
	//$unionfld=array(1,1,1,1,1,8,1);

	//������ͷFor: T_Sublib
	public static function buildTableContUnionFld($row,$fld,$style,$unifld,$cfld)
	{
		$num=count($fld);
		$tbnum=count($unifld);
		//$from=$unifld[0];$to=$unifld[1];//�ϲ�
		echo "<tr>";
		$from=0;
		for($i=0;$i<$tbnum;$i++){
			$unionnum=$unifld[$i];//�ϲ��ֶεĸ���
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
		
		echo "<th nowrap><a href=\"aa.php\">��ϸ</a>|<a href=\"aa.php\">�޸�</a>|<a href=\"aa.php\">ɾ��</a></th>";
		echo "</tr>";
		
	}
	
	public static function buildTableCont($row,$fld,$style)
	{
		$num=count($fld);
		echo "<tr>";
		for($i=0;$i<$num;$i++){
				echo "<td style=\"".$style[$i]."\">".$row[$fld[$i]]."</td>";
		}
		echo "<th nowrap><a href=\"aa.php\">��ϸ</a>|<a href=\"aa.php\">ɾ��</a></th>";
		echo "</tr>";
		
	}


	//������β
	public static function buildTableBottom()
	{
		echo "</table>";
	}
}


	


?>

