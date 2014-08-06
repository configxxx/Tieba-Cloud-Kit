<?php header("Content-Type: text/html;charset=utf-8");
require_once("class.mysql.php");
require_once("./config/config.inc.php");

if(isset($_POST['submit_reg']))
{
	if (!empty($_POST["username"]) && !empty($_POST["userpassword"])) {
		//regist event
		$reg_mysql = new mysql_main(TK_HOST,TK_NAME,TK_PASSWORD);
		$user_info = array('user_name' =>$_POST['username'], 'user_password'=>md5($_POST['userpassword']));
		$reg_mysql-> connect_member('INSERT INTO tck_member(username,password) VALUES ("'.$user_info["user_name"].'","'.$user_info["user_password"].'")',$user_info['user_name'],0);	
	}else{
		echo"用户名或密码为空！";
		exit();
	}
}elseif(isset($_POST['submit_log'])){
	$log_mysql = new mysql_main(TK_HOST,TK_NAME,TK_PASSWORD);
	$user_info = array('user_name_log' =>$_POST['username_log'], 'user_password_log'=>md5($_POST['userpassword_log']));
	$res=$log_mysql->connect_member('select uid from tck_member where username in("'.$user_info['user_name_log'].'") and password in("'.$user_info["user_password_log"].'")',"",1);
	if($res==1)
	{
		session_start();
		$_SESSION["s_uname"] = $user_info['user_name_log'];
		$_SESSION["s_upasswd"] = $user_info['user_password_log'];
		setcookie(session_name(), session_id(), time() + 365*24*3600, "/");
		header("Location:../index.php");
	}else{
		echo"登陆失败，请检查你的用户名或者密码是否正确!";
	}

}else{
	exit("Undefine");
}
?>
