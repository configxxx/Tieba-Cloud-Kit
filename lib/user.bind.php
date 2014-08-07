<?php header("Content-Type: text/html;charset=utf-8");
session_start();
require_once("class.mysql.php");
require_once("./core/class.baiduopt.php");

if(!empty($_POST['cookie']))
{
	//$bduss=$_POST['cookie'];
	$bduss="BDUSS=hmZElvcjNtMEhScXVyd1RKOEZweUljb2VzMmY4MkZMNXJkRjdjLVpCT094Z2xVQVFBQUFBJCQAAAAAAAAAAAEAAAB3raIhz8C1wdCht8m7-gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAI454lOOOeJTV3";
	$username=$_SESSION['s_uname'];
	$stoken="";
	$json =baiduopt::get_userinfo($bduss);
	user_bind::bind($json,$bduss,"",$username);
	reply_ok('绑定成功啦~\(≧▽≦)/~啦啦啦',"index.php");
}else{
	print_feedback(20);
}
?>