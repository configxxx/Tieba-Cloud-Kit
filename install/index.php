<?php
$html_head ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Install</title><link rel="stylesheet" type="text/css" href="../theme/main.css">';

$html_body ='<div id="comment"><h2>贴吧云工具箱配置向导</h2><p>Tieba Cloud  Kit Configuration Wizard</p>
<p>&nbsp;</p></div><div id="config">';
$html_form='<form id="configform" name ="configform" method="get" action="init.php">
<p>数据库服务器<input id="db_host" name="db_host"\> 数据库账号<input id="db_name" name="db_name"\></p>
<P>数据库密码<input id="db_password" name="db_password"> 数据库名称<input id="db_table" name="db_table" value="tck"\></P>
<P>ROOT用户名<input id="root_name" name="root_name"> ROOT密码<input id="root_password" name ="root_password"\></P>
<P>&nbsp;</P><P><input type="submit" name="submit" id="submit" value="确认提交配置信"></P>
</form></div><p>&nbsp;&nbsp;</p>';

$html_tail='<p id="aboutme" align="center">Copyleft <img src="../theme/copyleft.ico" width="15" height="15"> 2014 Racaljk. All rights reserved. -Source here https://github.com/racaljk/Tieba-Kit</p>';

$html="$html_head.$html_body.$html_form.$html_tail";
echo $html;
?>
