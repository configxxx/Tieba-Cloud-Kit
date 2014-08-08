<?php header("Content-Type: text/html;charset=utf-8");
require_once(dirname(dirname(__FILE__)).'\lib\class.mysql.php');
$configinc = dirname(dirname(__FILE__))."\lib\config\config.inc.php";
chmod($configinc,0755);
//配置文件建立
$config=array('<?php header("Content-Type: text/html;charset=utf-8");'."\n",
			  'define("TK_HOST","'.$_GET['db_host'].'");'."\n",
		      'define("TK_NAME","'.$_GET['db_name'].'");'."\n",
			  'define("TK_PASSWORD","'.$_GET['db_password'].'");'."\n",
			  'define("TK_TABLE","'.$_GET['db_table'].'");'."\n",
			  'define("TK_ROOT_PASSWORD","'.$_GET['root_password'].'");'."\n",
			  'define("TK_ROOT_NAME","'.$_GET['root_name'].'");'."\n",
			  '?>');
file_put_contents($configinc,$config);
require_once($configinc);
$mysql=new mysql_server_init(TK_HOST,TK_NAME,TK_PASSWORD,TK_TABLE);
$mysql->sql_operator();
$mysql->admin_query(TK_ROOT_NAME,TK_ROOT_PASSWORD);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Install</title>
<link rel="stylesheet" type="text/css" href="../UI/main.css">
<div id="comment">
  <h2>配置完成！</h2>
  <p>You have been succeed to install it!</p>
	<p>&nbsp;</p>
</div>
<div id="config">
	<p align="center">Bug请反馈到1948638989@qq.com </p>
	<p align="center"><a href="../user.php">开始使用!</a></p>
</div>
<p id="aboutme" align="center">Copyleft <img src="../UI/copyleft.ico" width="15" height="15"> 2014.08 By Racaljk. -Source here https://github.com/racaljk/Tieba-Cloud-Kit</p>

