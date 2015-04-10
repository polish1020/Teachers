<?
include_once "sysconf.class.php";

class DAC
{
	//属性 
	private $host; //服务器名 
	private $user; //用户名 
	private $pwd; //密码 
	private $dbname; //数据库名 
	private $connection; //连接标识 

	//方法 
	//__get()：获取属性值 
	function __get($property_name){ 
		if(isset($this->$property_name)) { 
			return($this->$property_name); 
		} 
		else{ 
			return(NULL); 
		} 
	} 

	//__set()：设置单个私有数据属性值，用于少量的修改数据 
	function __set($property_name, $value) 
	{ 
		$this->$property_name = $value; 
	} 


	//__construct：构造函数，建立连接,在函数建立时自动调用建立，原则新建对象时不显式调用 
	function __construct() 
	{ 
		$this->host=sys_conf::$dbhost; //使用sys_conf类的静态属性 
		$this->user=sys_conf::$dbuser; 
		$this->pwd=sys_conf::$dbpswd; 
		$this->dbname=sys_conf::$dbname; 


		//建立与数据库的连接 
		//echo $this->host."-----".$this->user."-----".$this->pwd;

		$this->connection=mysql_connect($this->host,$this->user,$this->pwd);//建立连接 
		mysql_query("set names 'gbk'");//字符集的统一 
		mysql_select_db("$this->dbname", $this->connection); //选择数据库挑战杯 
	} 

	//__destruct：析构函数，断开连接,在函数执行完毕时自动调用析构。实现关闭数据库的连接，保证数据库数据的安全 
	function __destruct() 
	{ 
		mysql_close($this->connection); 
	} 


	//增删改：参数$sql为Insert update 
	function execute($sql) 
	{ 
		mysql_query($sql); 
		//echo "写入数据库成功了"; 
		//echo "我是dataclass类的execute函数"; 
	}//execute 


	//查：参数$sql为Insert语句 
	//返回值为对象数组，数组中的每一元素为一行记录构成的对象 
	function query($sql) 
	{ 
		$result_array=array(); //返回数组 
		$i=0; //数组下标 
		$query_result=@mysql_query($sql,$this->connection); //查询数据 
		while($row=@mysql_fetch_array($query_result)) 
		{ 
			$result_array[$i++]=$row; 
		}//while 
		return $result_array; 
	} 
	

	
	//获得查询结果的纪录数函数 
	function result_query($sql) 
	{ 
		$result=mysql_query($sql); 
		$result_c=mysql_num_rows($result); 
		return $result_c; 
	} 


	//获得查询结果的纪录数函数 
	function get_rows_count($sql) 
	{ 
		echo $sql;
		
		$count=mysql_query($sql); //获得记录总数
		$rs=mysql_fetch_array($count); //搜索
		$totalNumber=$rs[0];

		return $totalNumber;
	} 
}

?>