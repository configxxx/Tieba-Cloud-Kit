<?php 

require_once('functional.php');
/**
* cron class
*/

class cron
{
	public function __construct()
	{
		$this->con=mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
		if(!$this->con) exit();
		if(mysql_select_db(TK_TABLE))
		{
			$res = mysql_query('SELECT COUNT(*) FROM tck_liked_tieba WHERE 1');
			$this->count= mysql_fetch_array($res)[0];
		}
	}

	public function run()
	{
		$sign_data=array();
		$current = mysql_fetch_array(mysql_query('SELECT number FROM tck_cron WHERE id="do_sign"'))[0];
		for ($i=$current; $i < $current+3; $i++) 
		{ 
			$res=mysql_query('SELECT * FROM tck_user_bind WHERE uid="'.$i.'"');
			$temp=mysql_fetch_array($res);
			$sign_data[0] = $temp[1];//name
			$sign_data[1] = $temp[2];//cookie
			$res2 = mysql_query('SELECT fid FROM tck_liked_tieba WHERE username="'.$sign_data[0].'"');
			$temp2=mysql_fetch_array($res2);
			$sign_data[2] = $temp2; //fid	
			print_r($sign_data);	
		}
	}
	private $count;
	private $con;
	private $start_id;
}

$s=new cron();
$s->run();
?>