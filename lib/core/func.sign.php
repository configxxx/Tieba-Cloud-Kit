<?php header("Content-Type: text/html;charset=utf-8");
@require_once('../class.mysql.php');
@require_once("class.baiduopt.php");
session_start();
error_reporting(1024);
function do_sign($cookie,$username){
	$tieba = array();
	$return_code=array();
	$tieba_get=database::sign_get($username);
	for ($i=0; $i < count($tieba_get); $i++) { 
		$tieba[$i] = array('url' => $tieba_get[$i][3],'fid'=>$tieba_get[$i][4]);
	}
	for ($k=0; $k < count($tieba); $k++) { 
		$return_code[$k]=baiduopt::client_sign($cookie,$tieba[$k]);
	}
	print_r($return_code);
}
$cookie=get_cookie($_SESSION['s_uname']);
do_sign($cookie);
?>