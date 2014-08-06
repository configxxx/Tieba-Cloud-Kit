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
				$print="用户已经被注册！";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
				break;
			case 1:
				$print="注册时数据库查询出错，请联系站长解决!";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			case 2:
				$print ="注册时连接数据库失败，请重新尝试注册或者联系管理员.";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			case 3:
				$print ="登陆时连接数据库失败，请重新尝试登陆或者联系管理员.";
				echo $html1.$state_error.$html2.$print.$html3;
				exit();
			default:
				die("Undefine Error ID");
				break;
		}
	}
}
?>