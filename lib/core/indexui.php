<?php header("Content-Type: text/html;charset=utf-8");
session_start();
require_once(dirname(dirname(__FILE__))."\config\config.inc.php");
require_once(dirname(dirname(dirname(__FILE__))).'\api.php');

function is_bind()
{
	$con=mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
	if(!$con)
	{
		print_feedback(2);
	}else{
		if(mysql_select_db(TK_TABLE, $con))
		{
			$check=mysql_query('SELECT uid FROM tck_user_bind WHERE username in("'.$_SESSION['s_uname'].'")');
			if(mysql_num_rows($check)){
				mysql_query("SET NAMES utf8");
				$count=mysql_fetch_array(@mysql_query('SELECT * FROM `tck_user_bind` WHERE username="'.$_SESSION['s_uname'].'"'));
				$touxiang_url="http://tb.himg.baidu.com/sys/portrait/item/".$count[7];
				$content=meng();
				return '	
				<h2 align="center"><img src="'.$touxiang_url.'"/></h2>
					<p class="text" align="center">嗨~亲爱的 <a href="#">'.$count[4].'</a></p>
						<pre class="prettyprint" align="center">'.$content.'</pre>
						  <section class="container">
						    <div class="login">
						      <h1>Your Baidu Account:</h1>
						      <form method="" action="">
						        <p style="color:black;">百度账号:'.$count[4].'</p>
						        <p style="color:black;">邮    箱:'.$count[5].'</p>
						        <p style="color:black;">手    机:'.$count[6].'</p>
						      </form>
						    </div>
						  </section>';
			}else{
				return '
				<h2 align="center"><img src="./UI/images/tieba.png"/></h2>	
					<p class="text" align="center">最后一步, <a href="#">'.$_SESSION['s_uname'].'</a>请复制你的百度账号Cookie。</p>
						<pre class="prettyprint">如果你不知道如何获取Cookie，请点击最后一个阶梯查看教程.你也可以通过修改百度账号Password来使Cookie失效.Enjoy!</pre>
						  <section class="container">
						    <div class="login">
						      <h1>Tieba Account Cookie Bind</h1>
						      <form method="post" action="./lib/user.bind.php">
						        <p><input type="text" name="cookie" value="" placeholder="粘贴你的百度Cookie"></p>
						        <p align="center" class="submit"><input type="submit" name="baidu_commit" value="确认"></p>
						      </form>
						    </div>
						  </section>';
			}
		}
	}
}

?>
