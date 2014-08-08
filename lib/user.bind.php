<?php header("Content-Type: text/html;charset=utf-8");
session_start();
require_once("class.mysql.php");
require_once("./core/class.baiduopt.php");

if(!empty($_POST['cookie']))
{
	$bduss=$_POST['cookie'];
	$username=$_SESSION['s_uname'];
	$stoken="";
	$json =baiduopt::get_userinfo($bduss);
	user_bind::bind($json,$bduss,"",$username);
	$str = baiduopt::get_liked_tieba($bduss);
	$tieba = html_analysis($str);
	$con=mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
	if(!$con)
	{
		print_feedback(15);
	}else{
		if(mysql_select_db(TK_TABLE))
		{
			for ($i=0; $i < count($tieba); $i++) 
			{ 
				@mysql_query('INSERT INTO  tck_liked_tieba(username,utf_8,url,fid) 
					VALUES ("'.$username.'","'.$tieba[$i]['utf8_name'].'","'.$tieba[$i]['url'].'","'.$tieba[$i]['balvid'].'")');
			}
		}
	}
	reply_ok('绑定成功啦~\(≧▽≦)/~啦啦啦',"index.php");
}elseif($_POST['logout']){
	database::logout($_SESSION['s_uname']);
}else{
	print_feedback(20);
}
?>