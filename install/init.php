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
//todo:读取confiincphp然后连接
$mysql=new mysql_server("127.0.0.1","root","","test");
$mysql->sql_operator();
$mysql->admin_query("克苏鲁","123");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Install</title>
<link rel="stylesheet" type="text/css" href="../theme/main.css">
<div id="comment">
	<h2>配置完成！</h2>
    <p>You have been succeed to install it!</p>
	<p>&nbsp;</p>
</div>
<div id="config">
	<p align="center">Bug请反馈到1948638989@qq.com </p>
</div>
<p id="aboutme" align="center">Copyleft <img src="../theme/copyleft.ico" width="15" height="15"> 2014 Racaljk. All rights reserved. -Source here https://github.com/racaljk/Tieba-Kit</p>

