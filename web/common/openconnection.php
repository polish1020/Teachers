<?
	function openconnection()
	{
		global $DB_SERVER,$DB_USER,$DB_PASS;//����ȫ�ֱ���
//		
		$db = mysql_connect($DB_SERVER,$DB_USER,$DB_PASS);

//		$db = mysql_connect("10.77.30.12","exam","fcding");


		if (!$db){
			die('Could not connect: ' . mysql_error());
			return 0;
		}     
		else
			{
				//echo "Mysql�Ѿ���ȷ����";
				return $db;	
			}
	}

	$cn=openconnection();

?>