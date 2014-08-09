<?php header("Content-Type: text/html;charset=utf-8");
session_start();
@require_once(dirname(dirname(__FILE__))."\config\config.inc.php");
@require_once(dirname(dirname(__FILE__))."\config\admin.config.php");
@require_once(dirname(dirname(dirname(__FILE__))).'\api.php');
@require_once("class.baiduopt.php");

function is_bind()
{
	$uname=$_SESSION['s_uname'];
	$content=meng();//api
	$tiebaname=uiget_tiebaname($uname);
	$touxiang_url="http://tb.himg.baidu.com/sys/portrait/item/".uiget_touxiang($uname);
	$check = baiduopt::confirmation(get_cookie($uname));
	if($check['is_login']==true)
	{
		return '	<h2 align="center"><img src="'.$touxiang_url.'"/></h2><p class="text" align="center">嗨~亲爱的 <a href="#">'.$tiebaname.'</a></p>
					<pre class="prettyprint" align="center">'.$content.'</pre><section class="container"><div class="login">
					<h1>Your Baidu Account:</h1><form method="post" action="./lib/user.bind.php">
					<pre style="background-color:white;">百度账号: '.$tiebaname.'</pre>
					<pre style="background-color:white;">邮      箱: '.uiget_tiebaemail($uname).'</pre>
					<pre style="background-color:white;">手      机: '.uiget_tiebamobile($uname).'</pre>
					<input name="logout" type="submit" value="退出登录">
					</form></div></section>';
	}else{
		return'		<h2 align="center"><img src="./UI/images/tieba.png"/></h2>	<p class="text" align="center">最后一步, <a href="#">'.$uname.'</a>请复制你的百度账号Cookie。</p>
					<pre class="prettyprint">如果你不知道如何获取Cookie，请点击最后一个阶梯查看教程.你也可以通过修改百度账号Password来使Cookie失效.Enjoy!</pre><section class="container">
					<div class="login"><h1>Tieba Account Cookie Bind</h1><form method="post" action="./lib/user.bind.php">
					<p><input type="text" name="cookie" value="" placeholder="粘贴你的百度Cookie"></p>
					<p align="center" class="submit"><input type="submit" name="baidu_commit" value="确认"></p>
					</form></div></section>';
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
