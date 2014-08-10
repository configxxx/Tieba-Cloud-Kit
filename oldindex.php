<?php 
session_start();
@require_once('./lib/class.mysql.php');
@require_once('./lib/core/class.baiduopt.php');
@require_once('./lib/core/indexui.php');
@require_once('admin.setting.php');
if(@$_SESSION["s_uname"] == "")
{
	header('Location:user.php');
}else{
	if($_SESSION["s_uname"] ==TK_ROOT_NAME){
		$print='欢迎使用贴吧云工具箱,超级管理员<a href="#">'.$_SESSION['s_uname']."</a>".",您拥有最高权限";
	}else{
		$print='你好，'.'<a href="#">'.$_SESSION['s_uname']."</a>".',欢迎使用贴吧云工具箱';
	}
}
$html_page_2=is_bind();
$html_page_3=tieba_list(get_cookie($_SESSION['s_uname']));

function get_mysql_version(){
	$con = mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
	return mysql_get_server_info($con);
}
?>

<head>
	<title>贴吧工具箱</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link href="./UI/css/reset.css" rel="stylesheet" type="text/css" />
	<link href="./UI/css/prettify.css" rel="stylesheet" type="text/css" />
	<link href="./UI/css/styles.css" rel="stylesheet" type="text/css" /> 
	<script src="./UI/js/jquery.min.js" type="text/javascript"></script> 
	<script src="./UI/js/jquery.scrollTo.js" type="text/javascript"></script> 
	<script src="./UI/js/prettify.js" type="text/javascript"></script> 
	<script src="./UI/js/jquery.ascensor.js" type="text/javascript"></script> 
	<script src="./UI/js/myscript.js" type="text/javascript"></script>
	<link rel="icon" type="./UI/image/gif" href="./UI/images/favicon.ico" />
	<link rel="stylesheet" href="./UI/css/connect_style.css">
</head>

<body>
	<div id="general">
		<div id="content">
		<!--index-->
			<div>
				<div class="contenu">
					<h1><img src="./UI/images/toolbox.png"/></h1>
					<p>百度贴吧云工具箱v1.0  - 那些云上的日子</p>
					<?php echo $print;?>
					<P>&nbsp;</P><P>&nbsp;</P><P>&nbsp;</P><P>&nbsp;</P>
					<p id="aboutme" align="center">Copyleft <img src="./UI/copyleft.ico" width="15" height="15"> 2014 Racaljk. All rights reserved. -Source here https://github.com/racaljk/Tieba-Cloud-Kit</p>
				</div>
			</div>
			<!--baidu account bind-->
			<div>
				<div class="contenu">
					<?php echo $html_page_2;?>
				</div>
            </div>
			 
			<!--tieba info-->
            <div style="overflow-y:auto;">
				<div class="contenu" style="overflow:auto">
					<h2><img src="./UI/images/sign_state.png"/></h2>
					<?php 
					echo $html_page_3[1];
					foreach ($html_page_3[0] as $value) {
						echo $value;
					};?>
				</div>	
			</div>		
			<!--plugin and aboutme-->
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/plugin.ico"/></h2>
						<p class="text">如果你有好的建议或者愿意帮助我维护这个项目请联系qq1948638989或者cthulhujk@gmail.com</p><br/>
						<pre class="prettyprint">Thanks!</pre>
				</div>
			</div>
			
			
			<!--tut-->
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/tut.png"/></h2>
					<p class="text">如果你不知道如何获取百度Cookie不妨阅读下面教程。</p><br/>
					<p>1.Chrome浏览器/遨游3/360极速浏览器/..</p>
					<p>·第一步, 进入http://tieba.baidu.com/然后登陆你的账号，点击浏览器地址栏类似文件夹的图标，在弹出的方框中选择"显示Cookies和网站数据"</p>
					<p>·第一步, 在弹出的的方框中依次选择baidu.com->Cookie->BDUSS,然后你就可以下面的内容上查看你的Cookie，注意，他不是完全的，只显示了一部分，所以需要点击内容那个区域然后ctrl+a选中再按下ctrl+c复制</p>
					<p>·第三步, 最后在你的cookie前面加上BDUSS=,即BDUSS=XXXXX,最后把这些全部复制到账号绑定页面按下确定即可完成绑定</p>
					<p>&nbsp;</p>
					<p>在下一个版本中可能会增加自动绑定，敬请期待~</p>
					 <p>图文教程：(如果无法查看请随意调整浏览器大小，然后即可查看)</p>	
					<h2><img src="./UI/tut/step1.png"/></h2>
					<h2><img src="./UI/tut/step2.png"/></h2>
				</div>
			</div>
		<!--adminsetting-->
		<?php
		if($_SESSION['s_uname'] == TK_ROOT_NAME)
		{
			echo '<div>	
			<div class="contenu">
				<h2><img src="./UI/images/setting.ico"/></h2>
					<p class="text">您好'.$_SESSION['s_uname'].',您可以根据需要进行一些设定。</p> <br/>
						<form id="admin" name="admin" method="post" action="admin.setting.php">
							<p><label for="sign_mode"></label>签到模式:
							<select id ="sign_mode" name="sign_mode" size="1" id="sign_mode">
							    <option value="1">客户端签到</option>
							    <option value="2">网页签到</option>
							</select>
							</p>
							<p>签到百度文库<label>
							<input type="checkbox" id="sign"name="sign[]" value="wenku_sign_button" /></label><br /></p>
							<p>签到百度知道<label>
							<input type="checkbox" id="sign" name="sign[]"  value="zhidao_sign_button" /></label><br /></p>	
						<pre class="prettyprint"><input type="submit" id="submit" name="submit" value="保存设置"></pre>
						</form>
				</div>
		</div>';
		}else{
			//hidden
		}
		?>
	</div>
</body>