<?php header("Content-Type: text/html;charset=utf-8");
session_start();
require_once("class.mysql.php");
require_once("./core/class.baiduopt.php");
require_once('class.sqlserver.php');

if(!empty($_POST['cookie']))
{
	$bduss=$_POST['cookie'];
	$username=$_SESSION['s_uname'];
	$stoken="";
	$json =baiduopt::get_userinfo($bduss);

	$data=array($bduss,$stoken,
		$json['data']['user_name_show'],
		$json['data']['email'],
		$json['data']['mobilephone'],
		$json['data']['user_portrait']);

	$sql=new sqlserver();
	$sql->update_tck_user_bind($username,$data);//bind id,write to database.

	$str = baiduopt::get_liked_tieba($bduss);
	$tieba = html_analysis($str);
	$sql->insert('tck_liked_tieba',count($tieba),$username,$tieba);
	reply_ok('绑定成功啦~\(≧▽≦)/~啦啦啦',"index.php");
}elseif($_POST['logout']){
	$sql=new sqlserver();
	$sql->clean('tck_user_bind',$_SESSION['s_uname']);
}else{
	print_feedback(20);
}
?>