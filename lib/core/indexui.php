<?php header("Content-Type: text/html;charset=utf-8");
session_start();
require_once(dirname(dirname(__FILE__))."\config\config.inc.php");
require_once(dirname(dirname(__FILE__))."\config\admin.config.php");
require_once(dirname(dirname(dirname(__FILE__))).'\api.php');
require_once("class.baiduopt.php");

function bind()
{
	$uname=$_SESSION['s_uname'];
	$check=baiduopt::confirmation(get_cookie($uname));
	if($check['is_login']==true)
	{
			$content=array();
			$uname=$_SESSION['s_uname'];
			$content['api_'] = meng();
			$content['baidu_name'] = ui_get_tiebaname($uname);
			$content['baidu_mobile'] = uiget_tiebamobile($uname);
			$content['baidu_email'] = uiget_tiebaemail($uname);
			$content['touxiang'] = "http://tb.himg.baidu.com/sys/portrait/item/".uiget_touxiang($uname);
			return $content;
	}
	else{
			return 0;
	}	
}


function tieba_list($cookie)
{
	$uname=$_SESSION['s_uname'];
	$print=array();
	$str = baiduopt::get_liked_tieba($cookie);
	/*使用原生输出
	$tieba = html_analysis($str);
	for ($i=0; $i < count($tieba); $i++) { 
		$print[$i] =$tieba[$i]['utf8_name'].'<br><br>';
	}
	$ret = implode("",$print);
	*/
	$name=uiget_tiebaname($uname);
	$count=count($tieba);
	$check = baiduopt::confirmation(get_cookie($uname));
	if($check['is_login']==true)
	{
		TK_WENKEN_SIGN_SWITCH==""?$wenku="管理员开启了文库签到":$wenku="管理员关闭了文库签到";
		TK_WENKEN_SIGN_SWITCH==""?$zhidao="管理员开启了知道签到":$zhidao="管理员关闭了知道签到";
		/*
		$construct='<pre class="prettyprint">亲爱的 '.$name.' 你一共喜欢了'.$count.' 个吧,下面是详细情况:</pre><br/><p>公告：'.$wenku.'||'.$zhidao.'</p>
		<p>'.$ret.'</p>';*/
		return array($str,'<pre class="prettyprint">亲爱的 '.$name.',下面是你喜欢的贴吧的详细情况:</pre><br/><p>公告：'.$wenku.'||'.$zhidao.'</p>
		<p>'.$ret.'</p>');
	}else{
		return '<pre class="prettyprint">Warning: You Should Bind Baidu Id First.</pre><p>╮(╯▽╰)╭没有绑定百度账号无法显示。</p>';
	}
}
?>
