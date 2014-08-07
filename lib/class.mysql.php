<?php header("Content-Type: text/html;charset=utf-8");
include("/config/config.inc.php");
include("func.feedback.php");
##Only used for tieba cloud kit!
class mysql_server_init{
	function __construct($_host,$_name,$_password,$_dbname)
	{
		$this->host=$_host;
		$this->admin_name=$_name;
		$this->admin_password=$_password;
		$this->dbname=$_dbname;
	}
	function sql_operator()
	{
		$con=mysql_connect($this->host,$this->admin_name,$this->admin_password);
		if(!$con)
		{
			print_feedback(15);
		}else{
			@mysql_query('CREATE DATABASE IF NOT EXISTS '.$this->dbname.' default charset utf8',$con)
		    or print_feedback(15);
			 if (mysql_select_db($this->dbname, $con)){
				 mysql_query("set names utf8");
				@mysql_query('CREATE TABLE tck_member(uid int NOT NULL AUTO_INCREMENT PRIMARY KEY,username varchar(15),password varchar(200))',$con)
				or print_feedback(16);
				@mysql_query('CREATE TABLE tck_user_bind(uid int NOT NULL AUTO_INCREMENT PRIMARY KEY,username varchar(15),cookie varchar(256),stoken varchar(40),user_baidu_id varchar(50),baidu_email varchar(25),baidu_mobile varchar(13),touxiang varchar(50))',$con)
				or print_feedback(19);
			 }
		}
	}
	//仅仅用于配置初始化！
	function admin_query($admin_name,$admin_password){
		$con =mysql_connect($this->host,$this->admin_name,$this->admin_password);
		if($con){
			if(mysql_select_db($this->dbname)){
				$salt=md5($admin_password);
				@mysql_query('INSERT INTO tck_member(uid,username,password) VALUES( 0 ,"'."$admin_name".'",'.'"'."$salt".'")')
				or print_feedback(17);
				@mysql_query('INSERT INTO tck_user_bind(uid,username) VALUES( 0 ,"'.$admin_name.'")')
				or print_feedback(17);
				@mysql_query('ALTER TABLE tck_member ORDER BY uid')
				or print_feedback(18);
			}
		}
	} 
	var $host;
	var	$admin_name;
	var $admin_password;
	var $dbname;
}

class mysql_main{
	function __construct($_host,$_name,$_password)
	{
		$this->host=$_host;
		$this->admin_name=$_name;
		$this->admin_password=$_password;
	}
	function connect_member($sql_content,$reg_name,$flag)
	{
		if($flag==0)//log or regist
		{
			$con=mysql_connect($this->host,$this->admin_name,$this->admin_password);
			if(!$con)
			{
				print_feedback(2);
			}else{
				if(mysql_select_db(TK_TABLE, $con))
				{
					$check=mysql_query('SELECT  * FROM tck_member WHERE username in("'.$reg_name.'")');
					if(mysql_num_rows($check))
					{
						print_feedback(0);
					}else{
						@mysql_query($sql_content)
						or print_feedback(1);
					}
				}
			}
		}
		else{
			$con=mysql_connect($this->host,$this->admin_name,$this->admin_password);
			if(!$con)
			{
				print_feedback(3);
			}else{
				if(mysql_select_db(TK_TABLE, $con))
				{
					$check=mysql_query($sql_content);
					if($result = mysql_fetch_array($check))
					{
						return 1;
					}else{
						return 0;
					}
				}
			}
		}
	}
	var $host;
	var	$admin_name;
	var $admin_password;
}


class user_bind
{
	public static function bind($json,$cookie,$stoken,$username){
		$con=mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
		if(!$con)
		{
			print_feedback(8);
		}else{
			if(mysql_select_db(TK_TABLE,$con))
			{
				mysql_query("set names utf8");
				mysql_query('UPDATE tck_user_bind SET cookie="'.$cookie.'",stoken="'.$stoken.'",user_baidu_id="'.$json['data']['user_name_show'].'",baidu_email="'.$json['data']['email'].'",baidu_mobile="'.$json['data']['mobilephone'].'",touxiang="'.$json['data']['user_portrait'].'" WHERE username="'.$username.'"')
				or print_feedback(19);
			}else{
				print_feedback(21);
			}
		}
	}
}
?>