<?
	function openconnection()
	{
		global $DB_SERVER,$DB_USER,$DB_PASS;//引入全局变量
//		
		$db = mysql_connect($DB_SERVER,$DB_USER,$DB_PASS);

//		$db = mysql_connect("10.77.30.12","exam","fcding");


		if (!$db){
			die('Could not connect: ' . mysql_error());
			return 0;
		}     
		else
			{
				//echo "Mysql已经正确配置";
				return $db;	
			}
	}

	$cn=openconnection();

?>