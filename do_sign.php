<?php
require_onec('./lib/class.cron.php');
$sign=new cron_sign();
$sign->run();
?>