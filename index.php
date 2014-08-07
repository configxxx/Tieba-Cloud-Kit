<?php 
session_start();
@require_once('./lib/class.mysql.php');
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
function get_mysql_version(){
	$con = mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
	return mysql_get_server_info($con);
}
/*
function is_bind()
{
	$con=mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
	if(!$con)
	{
		print_feedback(2);
	}else{
	if(mysql_select_db(TK_TABLE, $con))
	{
		$check=mysql_query('SELECT  * FROM tck_member WHERE username in("'.$_SESSION['s_uname'].'")');
		if(mysql_num_rows($check)){
		}else{
		}
	}
}*/
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
		<!--Contenu1-->
			<div>
				<div class="contenu">
					<h1><img src="./UI/images/toolbox.png"/></h1>
					<p>百度贴吧云工具箱v1.0  - 那些云上的日子</p>
					<?php echo $print;?>
					<P>&nbsp;</P><P>&nbsp;</P><P>&nbsp;</P><P>&nbsp;</P>
					<p id="aboutme" align="center">Copyleft <img src="./UI/copyleft.ico" width="15" height="15"> 2014 Racaljk. All rights reserved. -Source here https://github.com/racaljk/Tieba-Cloud-Kit</p>
				</div>
			</div>
			<div>
				<div class="contenu">
					<h2 align="center"><img src="./UI/images/tieba.png"/></h2>
					<p class="text" align="center">最后一步, <a href="#"><?php echo $_SESSION['s_uname'];?></a>请复制你的百度账号Cookie。</p>
					<pre class="prettyprint">如果你不知道如何获取Cookie，请点击最后一个阶梯查看教程.你也可以通过修改百度账号Password来使Cookie失效.Enjoy!</pre>
					  <section class="container">
					    <div class="login">
					      <h1>Tieba Account Cookie Bind</h1>
					      <form method="post" action="./lib/user.bind.php">
					        <p><input type="text" name="cookie" value="" placeholder="粘贴你的百度Cookie"></p>
					        <p align="center" class="submit"><input type="submit" name="baidu_commit" value="确认"></p>
					      </form>
					    </div>
					  </section>
				</div>
            </div>
			 <div>
			<!--Contenu3-->
				<div class="contenu">
					<h2><img src="./UI/images/operationHtml.png"/></h2>
					<p class="text">You need to think like an architect for the future. You must build a house with 5 floors. For this he must do so:</p>
						<pre class="prettyprint">
						&lt;div id="house"&gt;
							&lt;div&gt;&lt;!-- Etage1--&gt;
								&lt;div id="ContentName"&gt;&lt;/div&gt;&lt;!-- Content of the floor 1--&gt;
							&lt;/div&gt;
							&lt;div&gt;&lt;!-- Etage2--&gt;	
								&lt;div id="ContentName"&gt;&lt;/div&gt;&lt;!-- Content of the floor 2--&gt;
							&lt;/div&gt;
							&lt;div&gt;&lt;!-- Etage3--&gt;
								&lt;div id="ContentName"&gt;&lt;/div&gt;&lt;!-- Content of the floor 3--&gt;
							&lt;/div&gt;	
							&lt;div&gt;&lt;!-- Etage4--&gt;
								&lt;div id="ContentName"&gt;&lt;/div&gt;&lt;!-- Content of the floor 4--&gt;
							&lt;/div&gt;
							&lt;div&gt;&lt;!-- Etage5--&gt;
								&lt;div id="ContentName"&gt;&lt;/div&gt;&lt;!-- Content of the floor 5--&gt;
							&lt;/div&gt;
						&lt;/div&gt;
						</pre>

				</div>	
			</div>

			<div>		
			<!--Contenu4-->
				<div class="contenu">
					<h2><img src="./UI/images/operationJs.png"/></h2>
					<p class="text">then in your script file, simply write:</p> <br/>
					<pre class="prettyprint">$('#house').ascensor();</pre>
				</div>
			</div>
			
			
			<!--Contenu5-->
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/operationJs2.png"/></h2>
					<p class="text">There are several settings for this plugin.</p><br/>
					<pre class="prettyprint">$('#house').ascensor({
					
					AscensorName:'house',
						//you can choose the name that will define id and class (default:'maison')
					WindowsFocus:true,
						//if you start on the first content(default:true)
					WindowsOn:'0',
						//if you can to start to the 0,1,2,3 etc.. content
					Direction:'y',
						//What will be the direction of the ascensor
					NavigationDirection:'xy',
						//what will be his navigation direction(par défaut:'xy')
					});
					</pre>
				</div>
			</div>
			
			
			<!--Contenu6-->
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/operationJs3.png"/></h2>
						<p class="text">There are also settings that allow the creation of navigation, disabling certain keys or even send the code to add elements.</p><br/>
						<pre class="prettyprint">$('#content').ascensor({
														
							Navig:true,
								//if you need a navigation system
							Link:true,
								//If you need a link per page for the next page
							PrevNext:true,
								//if you need a prev/next button
							KeyArrow:false,
								//deactivate the arrow key
							keySwitch:false,
								//deactivate navigation by arrow key
							CSSstyles:true,
								//if you need the Default CSS plugin
							ReturnURL:true,
								//if you need a url per page
							ReturnCode:true,
								//Give you id and class of the navig/link/content
									
						});</pre>
				</div>
			</div>
			
			
			<!--Contenu7-->
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/operationJs4.png"/></h2>
					<p class="text">There are more complicated settings for this plugin. They can create a system map that defines the scale (AscensorMap) in which we will place each element by a series of coordinates (ContentCoord).</p><br/>
					<pre class="prettyprint">$('#content').ascensor({
													
						ChocolateAscensor:true,
							//if you need to place yourself all the stage
						AscensorMap: '4|3',
							//define the size of a map
						ContentCoord:'1|1 &amp; 2|2 &amp; 1|2 &amp; 3|4 &amp; 1|3 &amp; 3|1 &amp; 2|3'
							//place stage one by one, indicating they positionx|positiony
							
					});</pre>
				</div>
			</div>
			
			
			<!--Contenu7-->
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/operationCss.png"/></h2>
					<p class="text">Then, Hide scrollbar in css</p><br/>
					<pre class="prettyprint">body{overflow: hidden;}</pre>
				</div>
			</div>
			
			
			<div>
				<div class="contenu">
					<h2><img src="./UI/images/tut.png"/></h2>
					<p class="text">如果你不知道如何获取百度Cookie不妨阅读下面教程。</p><br/>
					<p>1.Chrome浏览器/遨游3/360极速浏览器/..</p>
					<p>·</p>
					</div>
			</div>

			<?php 
			if($_SESSION['s_uname']==TK_ROOT_NAME)
			{
				$con = mysql_connect(TK_HOST,TK_NAME,TK_PASSWORD);
				echo "MySQL server info: " . mysql_get_server_info($con);
				$ip=$_SERVER["REMOTE_ADDR"];
				$version=get_mysql_version();
				$div_head='<div><div class="contenu">';
				$div_tail= '</div></div>';
				$div_body="
				<h2><img src='./UI/images/admin.ico'/></h2>
				<pre class='prettyprint'>Admin Name: {$_SESSION["s_uname"]}	Ip    Address: {$ip}	MySQL Version: {$version}
				</pre>
				";
				echo $div_head.$div_body.$div_tail;			
			}
			?>
		</div>
		</div>
</div>
</body>
