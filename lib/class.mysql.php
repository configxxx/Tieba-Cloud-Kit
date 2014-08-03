<?php header("Content-Type: text/html;charset=utf-8");
##Only used for tieba cloud kit!
class mysql_server{
	function __construct($_host,$_name,$_password,$_dbname)
	{
		$this->host=$_host;
		$this->admin_name=$_name;
		$this->admin_password=$_password;
		$this->dbname=$_dbname;
	}
	function sql_operator($sql)
	{
		$con=mysql_connect($this->host,$this->admin_name,$this->admin_password);
		if(!$con)
		{
			die("connecting error");
		}else{
			if(mysql_select_db($this->dbname,$con)==false)
			{
				@mysql_query("CREATE DATABASE ".$this->dbname)
				or die("create database error");
				@mysql_query($sql)
				or die("mysql query error");

			}else{
				@mysql_query($sql)
				or die("mysql query error");
			}
		}
	}
	//仅仅用于配置初始化！
	function admin_query($admin_name,$admin_password){
		$init_admin='INSERT INTO tck_member(uid,username,password) VALUES( 1 ,'.$admin_name.$admin_password.')';
		@mysql_query(init_admin)
		or die("create admin data error");
	} 
	var $host;
	var	$admin_name;
	var $admin_password;
	var $dbname;
}
?>