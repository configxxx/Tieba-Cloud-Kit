<?php
/**
* A new mysql class,easy to use.
* Just for tieba cloud kit.
*/

require_once('/config/config.inc.php');
require_once('/func.feedback.php');

class sql_base
{
	public function __construct()
	{
		$this->host=TK_HOST;
		$this->db_name=TK_NAME;
		$this->db_password=TK_PASSWORD;
		$this->db=TK_TABLE;
		$con=mysql_connect($this->host,$this->db_name,$this->db_password);
	}

	public function exists($username)
	{
		$check = $this->query('SELECT  * FROM tck_member WHERE username in("'.$username.'")');
		if(mysql_num_rows($check))
		{
			return 0;//存在
		}else{
			return 1;//不存在
		}
	}

	public function query_loop($sql)
	{
		if($this->db_select())
		{
			@mysql_query("set names utf8");
			for ($i=0; $i <count($sql); $i++) { 
				@mysql_query($sql[$i]);
			}
		}		
	}

	public function query($sql)
	{
		if($this->db_select())
		{
			@mysql_query("set names utf8");
			return @mysql_query($sql);
		}
	}

	public function columns($table)
	{
		return mysql_fetch_array($this->query('SHOW COLUMNS FROM '.$table));
	}

	protected function db_select()
	{
		if(mysql_select_db($this->db)){return true;}else{return false;}
	}

	protected $host;
	protected $db_name;
	protected $db_password;
	protected $con;
	protected $db;
}

class sqlserver extends sql_base
{
	public function __construct()
	{
		parent::__construct();
	}

	public function update_tck_user_bind($username,$data)
	{
		parent::query('UPDATE tck_user_bind  SET cookie="'.$data[0].'",stoken="'.$data[1].'",user_baidu_id="'.$data[2].'",
			baidu_email="'.$data[3].'",baidu_mobile="'.$data[4].'",touxiang="'.$data[5].'" WHERE username="'.$username.'"');
	}
	public function insert($table,$loop,$username,$data)
	{
		if($table=="tck_liked_tieba")
		{
			for ($i=0; $i < $loop_data; $i++) { 
				parent::query('INSERT INTO tck_liked_tieba(username,utf_8,url,fid) VALUES("'.$username.'","'.$data[$i]['utf8_name'].'","'.$data[$i]['url'].'","'.$data[$i]['balvid'].'")');
			}
		}
	}

	public function clean($table,$username)
	{
		if($table=='tck_user_bind')
		{
			parent::query('UPDATE tck_user_bind SET cookie="",stoken="",user_baidu_id="",baidu_email="",baidu_mobile="",touxiang="" WHERE username="'.$username.'"');
			header('Location:../index.php');
		}
	}

	public function regist($username,$user_password,$flag)
	{
		if($flag==0)//regist
		{
			if(parent::exists($username)==0)
			{
				print_feedback(0);
			}else{
				parent::query_loop(array('INSERT INTO tck_member(username,password) VALUES ("'.$username.'","'.$user_password.'")','INSERT INTO tck_user_bind(username) VALUES("'.$username.'")'));
			}
		}else{
			//login
			$check = parent::query('select uid from tck_member where username in("'.$username.'") and password in("'.$user_password.'")');
			if($result = mysql_fetch_array($check))
			{
				return 1;
			}else{
				return 0;
			}
		}
	}
}
?>