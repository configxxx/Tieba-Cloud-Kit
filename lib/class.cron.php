<?php 

require_once('./core/class.baiduopt.php');
/**
* cron class
*/

class cron_sign
{
	public function __construct()
	{
		$this->con=mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
		if(!$this->con) exit();
		if(mysql_select_db(TK_TABLE))
		{
			$res = mysql_query('SELECT COUNT(*) FROM tck_user_bind WHERE 1');
			$this->count= mysql_fetch_array($res)[0];
		}
	}

	public function run()
	{
		$temp=array();
		$fid1=array();
		$fid2=array();
		$current = mysql_fetch_array(mysql_query('SELECT number FROM tck_cron WHERE id="do_sign"'))[0];
		if($current < $this->count)
		{
			for ($i=$current; $i < $current+2; $i++) 
			{ 
				$res=mysql_query('SELECT * FROM tck_user_bind WHERE uid="'.$i.'"');
				$t=mysql_fetch_array($res);
				array_push($temp,$t[1]);
				array_push($temp,$t[2]);
			}
			$res2 = mysql_query('SELECT fid,url FROM tck_liked_tieba WHERE username="'.$temp[0].'"');
			while($result = mysql_fetch_array($res2)){
				$fid1[]=$result;
			}
			$res3 = mysql_query('SELECT fid,url FROM tck_liked_tieba WHERE username="'.$temp[2].'"');
			while($result = mysql_fetch_array($res3)){
				$fid2[]=$result;
			}		
			$this->dosign($temp[1],$fid1);
			$this->dosign($temp[3],$fid2);
			$this->update_db($current+2);
		}else{
			$this->update_db(1);
		}
	}

	private function dosign($cookie,$fid_arr)
	{
		$t=array();
		$tieba=array();
		for ($i=0; $i < count($fid_arr); $i++) { 
			$tieba[$i] = array('url'=>$fid_arr[$i][1],'fid'=>$fid_arr[$i][0]);
			$t = baiduopt::client_sign($cookie,$tieba[$i]);
		}
		print_r($tieba);
	}

	private function update_db($now)
	{
		if($this->con)
		{
			if(mysql_select_db(TK_TABLE))
			{
				mysql_query('UPDATE tck_cron SET number='.$now.' WHERE id="do_sign"');
			}
		}
	}
	private $count;
	private $con;
	private $start_id;
}

$s=new cron_sign();
$s->run();
?>