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
			die("connecting error");
		}else{
			@mysql_query('CREATE DATABASE IF NOT EXISTS '.$this->dbname.' default charset utf8',$con)
		    or die("failed to create database.");
			 if (mysql_select_db($this->dbname, $con)){
				 mysql_query("set names utf8");
				@mysql_query('CREATE TABLE tck_member(uid int NOT NULL AUTO_INCREMENT PRIMARY KEY,username varchar(15),password varchar(200))',$con)
				or die("mysql query error3");
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
				or die("create admin data error3");	
				@mysql_query('ALTER TABLE tck_member ORDER BY uid')
				or die("mysqll query error 4");
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
?>