<?
include_once "sysconf.class.php";

class DAC
{
	//���� 
	private $host; //�������� 
	private $user; //�û��� 
	private $pwd; //���� 
	private $dbname; //���ݿ��� 
	private $connection; //���ӱ�ʶ 

	//���� 
	//__get()����ȡ����ֵ 
	function __get($property_name){ 
		if(isset($this->$property_name)) { 
			return($this->$property_name); 
		} 
		else{ 
			return(NULL); 
		} 
	} 

	//__set()�����õ���˽����������ֵ�������������޸����� 
	function __set($property_name, $value) 
	{ 
		$this->$property_name = $value; 
	} 


	//__construct�����캯������������,�ں�������ʱ�Զ����ý�����ԭ���½�����ʱ����ʽ���� 
	function __construct() 
	{ 
		$this->host=sys_conf::$dbhost; //ʹ��sys_conf��ľ�̬���� 
		$this->user=sys_conf::$dbuser; 
		$this->pwd=sys_conf::$dbpswd; 
		$this->dbname=sys_conf::$dbname; 


		//���������ݿ������ 
		//echo $this->host."-----".$this->user."-----".$this->pwd;

		$this->connection=mysql_connect($this->host,$this->user,$this->pwd);//�������� 
		mysql_query("set names 'gbk'");//�ַ�����ͳһ 
		mysql_select_db("$this->dbname", $this->connection); //ѡ�����ݿ���ս�� 
	} 

	//__destruct�������������Ͽ�����,�ں���ִ�����ʱ�Զ�����������ʵ�ֹر����ݿ�����ӣ���֤���ݿ����ݵİ�ȫ 
	function __destruct() 
	{ 
		mysql_close($this->connection); 
	} 


	//��ɾ�ģ�����$sqlΪInsert update 
	function execute($sql) 
	{ 
		mysql_query($sql); 
		//echo "д�����ݿ�ɹ���"; 
		//echo "����dataclass���execute����"; 
	}//execute 


	//�飺����$sqlΪInsert��� 
	//����ֵΪ�������飬�����е�ÿһԪ��Ϊһ�м�¼���ɵĶ��� 
	function query($sql) 
	{ 
		$result_array=array(); //�������� 
		$i=0; //�����±� 
		$query_result=@mysql_query($sql,$this->connection); //��ѯ���� 
		while($row=@mysql_fetch_array($query_result)) 
		{ 
			$result_array[$i++]=$row; 
		}//while 
		return $result_array; 
	} 
	

	
	//��ò�ѯ����ļ�¼������ 
	function result_query($sql) 
	{ 
		$result=mysql_query($sql); 
		$result_c=mysql_num_rows($result); 
		return $result_c; 
	} 


	//��ò�ѯ����ļ�¼������ 
	function get_rows_count($sql) 
	{ 
		echo $sql;
		
		$count=mysql_query($sql); //��ü�¼����
		$rs=mysql_fetch_array($count); //����
		$totalNumber=$rs[0];

		return $totalNumber;
	} 
}

?>