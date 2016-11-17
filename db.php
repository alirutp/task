<?php
class db{

	private $conn;

	private static $instance = null;
   
    private function __construct() {
		
		if (!$this->conn = @mysql_connect(DB_HOST, DB_USER, DB_PASSWD)) {
					echo "连接数据库失败";
                    exit;
            }
		
		@mysql_select_db(DB_NAME, $this->conn);
	}
   
	 public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new db();
		}
		return self::$instance;
	}

	
	 function sitename(){ 
    return db::getInstance()->once_fetch_array("select * from setting where keyname='site_name'")['keyvalue'];
     }	

	  function getVersion() {
		return mysql_get_server_info();
	 }
	 
	 	function once_fetch_array($sql) {
		$this->result = $this->query($sql);
		return $this->fetch_array($this->result);
	}

		function query($sql, $ignore_err = FALSE) {
		$this->result = @mysql_query($sql, $this->conn);
		$this->queryCount++;
		if (!$ignore_err && !$this->result) {
			emMsg("SQL语句执行错误：$sql <br />");
		}else {
			return $this->result;
		}
	}
		function fetch_array($query , $type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $type);
	}


	 
}