<?php header("Content-Type: text/html;charset=utf-8");

function print_feedback($errid)
{
	$state_ok="../UI/images/ok.png";
	$state_error="../UI/images/error.png";
	$html1='
	<head>
		<title>错误！</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<link href="../UI/css/reset.css" rel="stylesheet" type="text/css" />
		<link href="../UI/css/prettify.css" rel="stylesheet" type="text/css" />
		<link href="../UI/css/styles.css" rel="stylesheet" type="text/css" /> 
		<script src="../UI/js/jquery.min.js" type="text/javascript"></script> 
		<script src="../UI/js/jquery.scrollTo.js" type="text/javascript"></script> 
		<script src="../UI/js/prettify.js" type="text/javascript"></script> 
		<script src="../UI/js/jquery.ascensor.js" type="text/javascript"></script> 
		<script src="../UI/js/myscript.js" type="text/javascript"></script>
		<link rel="shortcut icon" href="../UI/images/favicon.ico" />
	</head>
	<body><div id="general"><div id="content"><div><div class="contenu"><h1><img src="';
	$html2='"/></h1><p><a class="houseLink0" rel="ConcentLink" href="">';
	$html3='</a></p></div></div></div></div></body>';
	if($errid < 0)
	{
		die("Undefine Error");
	}elseif($errid>=0 &&$errid <=5)
	{
		switch ($errid){
			case 0:
				$print="你想要的账号已经被另一个坏蛋注册了！";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
				break;
			case 1:
				$print="怎么搞得，注册时数据库查询出错";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			case 2:
				$print ="注册时连接数据库失败,RPWT,找站长解决吧";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			case 3:
				$print ="[+]登陆时连接数据库失败,RPWT,找站长解决吧";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			case 4:
				$print ="太粗心了！你注册的用户名或密码为空，赶快填上！";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			case 5:
				$print="哎呀，登陆失败了，请检查你的用户名或者密码是否正确!";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
		}
	}else if($errid>5 && $errid <=10)
	{
		switch ($errid) {
			case 6:
				$print="能看到这个页面还真不容易啊，未定义操作";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
		}
	}
}
?>