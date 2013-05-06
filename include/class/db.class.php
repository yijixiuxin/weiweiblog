<?php if (!defined('APPPATH')) exit('not permission');

/**
 * 数据库操作类
 */

class db {
	private $dbHost = 'localhost';	//数据库地址
	private $dbUser = 'root';	//数据库用户名
	private $dbPwd = '';	//数据库密码
	private $dbName = '';	//数据库名称
	private $dbPort = '3306';	//数据库端口
	private $dbChar = 'utf8';	//数据库字符集

	private $db = NULL;		//数据库链接对象

	//数据库的构造方法，在实例化数据库类时执行
	public function __construct($dbHost = '', $dbUser = '', $dbPwd = '', $dbName = '', $dbPort = '') {
		if ($dbHost !== '' && $dbUser !== '' && $dbName !== '') {
			$this->dbHost = $dbHost;
			$this->dbUser = $dbUser;
			$this->dbPwd = $dbPwd;
			$this->dbName = $dbName;
			$dbPort && $this->dbPort = $dbPort;
            $this->db = $this->connect();	//链接数据库
		}
	}

	public function dbset($key, $val) {
		if (isset($this->$key)) {
			$this->$key = $val;
		}
	}

	//链接数据库的方法
	public function connect() {
		$this->db = @mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd);
		if (empty($this->db)) exit('db connect error');	//链接数据库错误，直接退出程序，输出错误信息
		mysql_select_db($this->dbName, $this->db);	//选择指定的数据库
		$this->query("SET NAMES {$this->dbChar}");	//设置数据库的字符集
	}

	//执行sql语句
	public function query($sql) {
		return mysql_query($sql, $this->db);
	}
  	//返回结果集中的一条记录
  	public function fetch_one($query) {
      	return mysql_fetch_array($query, MYSQL_ASSOC);
  	}
  	//返回结果集中的所有记录
  	public function fetch_all($query) {
  		$arr = array();
  		while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
  			$arr[] = $row;
  		}
  		return $arr;
  	}
  	//返回最后一次插入记录的ID
  	public function insert_id() {
  		return mysql_insert_id($this->db);
  	}

}

?>