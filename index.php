<?php 
session_start();
@require_once('./lib/config/config.inc.php');
@require_once('./lib/class.mysql.php');
if($_SESSION["s_uname"] == "")
{
	$print=' <p><a class="houseLink0" rel="ConcentLink" href="#house1">注册</a> |  <a href="#house1"  class="houseLink0" rel="ConcentLink">登陆</a></p>';
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
					<pre class="prettyprint">如果你不知道如何获取Cookie，请点击最后一个阶梯查看教程.Enjoy!</pre>
					  <section class="container">
					    <div class="login">
					      <h1>Tieba Account Cookie Bind</h1>
					      <form method="post" action="./lib/core/class.baiduopt.php">
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
	
});</pre>
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
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis, ante vitae dapibus venenatis, velit metus imperdiet magna, sit amet iaculis nunc ligula sed lacus. Vivamus elit justo, mattis id ultricies a, lacinia id purus. Nunc nec erat turpis, non egestas purus. Duis non lectus venenatis nunc blandit mattis vitae eget risus. Nullam eget consectetur diam. Etiam nulla tortor, dictum ullamcorper tincidunt a, laoreet quis urna. Phasellus nunc sapien, lobortis sed rutrum eu, ullamcorper sed ante. Donec nec vulputate nulla. Curabitur magna ligula, pharetra eu adipiscing cursus, posuere quis tortor. Integer posuere porta velit sed mattis. Duis sed urna orci, ac rutrum ligula. Duis et lacinia eros. Quisque erat quam, fringilla at lobortis non, pellentesque et ligula. Ut volutpat metus justo, eu interdum urna.
					
					Pellentesque feugiat enim in dolor mollis et gravida ligula ultrices. Quisque id enim ante, quis facilisis felis. Pellentesque condimentum lorem pellentesque libero mollis suscipit. Nulla facilisi. Suspendisse potenti. Aenean faucibus risus quis mi condimentum scelerisque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis cursus nibh id neque pharetra id vulputate dolor consequat. Duis ac nibh massa, ac ullamcorper nibh. Aenean ut urna ut turpis suscipit posuere ut tempus lacus. Nam sed metus nunc, at tempus nibh. Duis eu erat est. Praesent diam risus, cursus nec interdum vel, pharetra et augue. In nec leo nec nunc tincidunt interdum. Vivamus erat turpis, dapibus vel tempus id, adipiscing rhoncus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc eros leo, imperdiet in iaculis nec, semper sed augue.
					
					Sed ac odio libero. Fusce eget consequat risus. Suspendisse eget velit ante. Nunc eget justo in nunc elementum scelerisque. Fusce facilisis feugiat porta. Vivamus blandit elementum quam, id gravida tellus venenatis eu. Proin eu dolor ac orci consectetur pretium. Praesent malesuada ligula sed elit semper sed euismod turpis mattis. Pellentesque ornare, velit et fringilla adipiscing, massa eros porta lorem, vel egestas neque velit a mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					
					Ut congue diam eu nunc tempor eu laoreet lorem auctor. Morbi sed neque justo, eu pharetra quam. Proin erat sapien, porta interdum egestas non, ultrices in risus. In hac habitasse platea dictumst. Nulla facilisi. Aliquam malesuada, lorem non egestas ornare, quam orci posuere enim, ut consectetur turpis massa luctus enim. Vestibulum eget dui sapien, sit amet ullamcorper velit. Donec quis augue et neque rutrum interdum. Nullam leo sem, consequat vitae varius ac, aliquet tempus nunc. Maecenas quis tempor orci. In quis libero urna. Vivamus vulputate nisi nulla, ut aliquam arcu.
					
					Nam scelerisque, orci vel porta varius, tortor magna blandit neque, id ullamcorper nibh leo sit amet libero. Cras fermentum pellentesque tincidunt. Suspendisse dictum tristique nisi in ultrices. Duis tempus ipsum vitae lorem faucibus lobortis. Pellentesque hendrerit, lectus ut vulputate cursus, nibh eros auctor diam, sed auctor magna lectus quis lorem. Nam sapien augue, ullamcorper quis imperdiet non, varius at purus. Nunc rhoncus arcu nec libero dapibus bibendum. Nunc cursus dui at quam congue ac eleifend tortor aliquet. Proin vel feugiat nulla. Mauris pharetra, odio in vestibulum dignissim, velit quam egestas metus, vel commodo neque quam non magna. Aliquam ac dui tellus, a suscipit turpis. Donec eget nibh vitae massa pulvinar commodo. Vivamus quis dolor eget leo ultrices posuere in at diam. Ut eget odio nisi, et condimentum nisi. Suspendisse </p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis, ante vitae dapibus venenatis, velit metus imperdiet magna, sit amet iaculis nunc ligula sed lacus. Vivamus elit justo, mattis id ultricies a, lacinia id purus. Nunc nec erat turpis, non egestas purus. Duis non lectus venenatis nunc blandit mattis vitae eget risus. Nullam eget consectetur diam. Etiam nulla tortor, dictum ullamcorper tincidunt a, laoreet quis urna. Phasellus nunc sapien, lobortis sed rutrum eu, ullamcorper sed ante. Donec nec vulputate nulla. Curabitur magna ligula, pharetra eu adipiscing cursus, posuere quis tortor. Integer posuere porta velit sed mattis. Duis sed urna orci, ac rutrum ligula. Duis et lacinia eros. Quisque erat quam, fringilla at lobortis non, pellentesque et ligula. Ut volutpat metus justo, eu interdum urna.
					
					Pellentesque feugiat enim in dolor mollis et gravida ligula ultrices. Quisque id enim ante, quis facilisis felis. Pellentesque condimentum lorem pellentesque libero mollis suscipit. Nulla facilisi. Suspendisse potenti. Aenean faucibus risus quis mi condimentum scelerisque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis cursus nibh id neque pharetra id vulputate dolor consequat. Duis ac nibh massa, ac ullamcorper nibh. Aenean ut urna ut turpis suscipit posuere ut tempus lacus. Nam sed metus nunc, at tempus nibh. Duis eu erat est. Praesent diam risus, cursus nec interdum vel, pharetra et augue. In nec leo nec nunc tincidunt interdum. Vivamus erat turpis, dapibus vel tempus id, adipiscing rhoncus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc eros leo, imperdiet in iaculis nec, semper sed augue.
					
					Sed ac odio libero. Fusce eget consequat risus. Suspendisse eget velit ante. Nunc eget justo in nunc elementum scelerisque. Fusce facilisis feugiat porta. Vivamus blandit elementum quam, id gravida tellus venenatis eu. Proin eu dolor ac orci consectetur pretium. Praesent malesuada ligula sed elit semper sed euismod turpis mattis. Pellentesque ornare, velit et fringilla adipiscing, massa eros porta lorem, vel egestas neque velit a mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					
					Ut congue diam eu nunc tempor eu laoreet lorem auctor. Morbi sed neque justo, eu pharetra quam. Proin erat sapien, porta interdum egestas non, ultrices in risus. In hac habitasse platea dictumst. Nulla facilisi. Aliquam malesuada, lorem non egestas ornare, quam orci posuere enim, ut consectetur turpis massa luctus enim. Vestibulum eget dui sapien, sit amet ullamcorper velit. Donec quis augue et neque rutrum interdum. Nullam leo sem, consequat vitae varius ac, aliquet tempus nunc. Maecenas quis tempor orci. In quis libero urna. Vivamus vulputate nisi nulla, ut aliquam arcu.
					
					Nam scelerisque, orci vel porta varius, tortor magna blandit neque, id ullamcorper nibh leo sit amet libero. Cras fermentum pellentesque tincidunt. Suspendisse dictum tristique nisi in ultrices. Duis tempus ipsum vitae lorem faucibus lobortis. Pellentesque hendrerit, lectus ut vulputate cursus, nibh eros auctor diam, sed auctor magna lectus quis lorem. Nam sapien augue, ullamcorper quis imperdiet non, varius at purus. Nunc rhoncus arcu nec libero dapibus bibendum. Nunc cursus dui at quam congue ac eleifend tortor aliquet. Proin vel feugiat nulla. Mauris pharetra, odio in vestibulum dignissim, velit quam egestas metus, vel commodo neque quam non magna. Aliquam ac dui tellus, a suscipit turpis. Donec eget nibh vitae massa pulvinar commodo. Vivamus quis dolor eget leo ultrices posuere in at diam. Ut eget odio nisi, et condimentum nisi. Suspendisse </p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis, ante vitae dapibus venenatis, velit metus imperdiet magna, sit amet iaculis nunc ligula sed lacus. Vivamus elit justo, mattis id ultricies a, lacinia id purus. Nunc nec erat turpis, non egestas purus. Duis non lectus venenatis nunc blandit mattis vitae eget risus. Nullam eget consectetur diam. Etiam nulla tortor, dictum ullamcorper tincidunt a, laoreet quis urna. Phasellus nunc sapien, lobortis sed rutrum eu, ullamcorper sed ante. Donec nec vulputate nulla. Curabitur magna ligula, pharetra eu adipiscing cursus, posuere quis tortor. Integer posuere porta velit sed mattis. Duis sed urna orci, ac rutrum ligula. Duis et lacinia eros. Quisque erat quam, fringilla at lobortis non, pellentesque et ligula. Ut volutpat metus justo, eu interdum urna.
					
					Pellentesque feugiat enim in dolor mollis et gravida ligula ultrices. Quisque id enim ante, quis facilisis felis. Pellentesque condimentum lorem pellentesque libero mollis suscipit. Nulla facilisi. Suspendisse potenti. Aenean faucibus risus quis mi condimentum scelerisque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis cursus nibh id neque pharetra id vulputate dolor consequat. Duis ac nibh massa, ac ullamcorper nibh. Aenean ut urna ut turpis suscipit posuere ut tempus lacus. Nam sed metus nunc, at tempus nibh. Duis eu erat est. Praesent diam risus, cursus nec interdum vel, pharetra et augue. In nec leo nec nunc tincidunt interdum. Vivamus erat turpis, dapibus vel tempus id, adipiscing rhoncus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc eros leo, imperdiet in iaculis nec, semper sed augue.
					
					Sed ac odio libero. Fusce eget consequat risus. Suspendisse eget velit ante. Nunc eget justo in nunc elementum scelerisque. Fusce facilisis feugiat porta. Vivamus blandit elementum quam, id gravida tellus venenatis eu. Proin eu dolor ac orci consectetur pretium. Praesent malesuada ligula sed elit semper sed euismod turpis mattis. Pellentesque ornare, velit et fringilla adipiscing, massa eros porta lorem, vel egestas neque velit a mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					
					Ut congue diam eu nunc tempor eu laoreet lorem auctor. Morbi sed neque justo, eu pharetra quam. Proin erat sapien, porta interdum egestas non, ultrices in risus. In hac habitasse platea dictumst. Nulla facilisi. Aliquam malesuada, lorem non egestas ornare, quam orci posuere enim, ut consectetur turpis massa luctus enim. Vestibulum eget dui sapien, sit amet ullamcorper velit. Donec quis augue et neque rutrum interdum. Nullam leo sem, consequat vitae varius ac, aliquet tempus nunc. Maecenas quis tempor orci. In quis libero urna. Vivamus vulputate nisi nulla, ut aliquam arcu.
					
					Nam scelerisque, orci vel porta varius, tortor magna blandit neque, id ullamcorper nibh leo sit amet libero. Cras fermentum pellentesque tincidunt. Suspendisse dictum tristique nisi in ultrices. Duis tempus ipsum vitae lorem faucibus lobortis. Pellentesque hendrerit, lectus ut vulputate cursus, nibh eros auctor diam, sed auctor magna lectus quis lorem. Nam sapien augue, ullamcorper quis imperdiet non, varius at purus. Nunc rhoncus arcu nec libero dapibus bibendum. Nunc cursus dui at quam congue ac eleifend tortor aliquet. Proin vel feugiat nulla. Mauris pharetra, odio in vestibulum dignissim, velit quam egestas metus, vel commodo neque quam non magna. Aliquam ac dui tellus, a suscipit turpis. Donec eget nibh vitae massa pulvinar commodo. Vivamus quis dolor eget leo ultrices posuere in at diam. Ut eget odio nisi, et condimentum nisi. Suspendisse </p>
				</div>
			</div>

			<?php 
			if($_SESSION['s_uname']==TK_ROOT_NAME)
			{
				$con = mysql_connect("localhost", "hello", "321");
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
