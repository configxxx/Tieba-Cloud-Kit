<?php
require('./lib/core/func.sign.php');
session_start();
echo "执行签到成功";
$cookie=get_cookie($_SESSION['s_uname']);
do_sign($cookie,$_SESSION['s_uname']);
?>