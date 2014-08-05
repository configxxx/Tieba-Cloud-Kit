<?php
session_start();
if($_SESSION["s_uname"] == "")
{
	$print=' <p><a class="houseLink0" rel="ConcentLink" href="#house1">注册</a> |  <a href="#house1"  class="houseLink0" rel="ConcentLink">登陆</a></p>';
}else{
	$print='欢迎使用贴吧云工具箱，'.$_SESSION['s_uname'];
}
?>
<head>
	<title>贴吧工具箱</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link href="./theme/css/reset.css" rel="stylesheet" type="text/css" />
	<link href="./theme/css/prettify.css" rel="stylesheet" type="text/css" />
	<link href="./theme/css/styles.css" rel="stylesheet" type="text/css" /> 
	<script src="./theme/js/jquery.min.js" type="text/javascript"></script> 
	<script src="./theme/js/jquery.scrollTo.js" type="text/javascript"></script> 
	<script src="./theme/js/prettify.js" type="text/javascript"></script> 
	<script src="./theme/js/jquery.ascensor.js" type="text/javascript"></script> 
	<script src="./theme/js/myscript.js" type="text/javascript"></script>
	<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
	<link rel="icon" type="./theme/image/gif" href="./theme/images/favicon.ico" />
	<link rel="shortcut icon" href="./theme/images/favicon.ico" />
	<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="general">
		<div id="content">
		<!--Contenu1-->
			<div>
				<div class="contenu">
					<h1><img src="./theme/images/toolbox.png"/></h1>
					<p>百度贴吧云工具箱v1.0  - 那些云上的日子</p>
					<p><?php echo $print;?></p>
				</div>
			</div>
			<div>
				<div class="contenu">
					<h2 align="center"><img src="./theme/images/user.ico"/></h2>
					
					<p class="text" align="center">在使用贴吧云工具箱之前，您需要注册一个云工具箱的账号<a href="#"></a></p>
					
					
<pre class="prettyprint">
&lt;p&gt;You should regist an account to enjoy it!&lt;/p&gt;&lt;br&gt;&lt;pre&gt;It is different from baidu account.&lt;/pre&gt;&lt;br&gt;</pre>
</div>
		
                    </div>
			  <div>
			<!--Contenu3-->
				<div class="contenu">
					<h2><img src="./theme/images/operationHtml.png"/></h2>
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
					<h2><img src="./theme/images/operationJs.png"/></h2>
					<p class="text">then in your script file, simply write:</p> <br/>
					<pre class="prettyprint">$('#house').ascensor();</pre>
				</div>
			</div>
			
			
			<!--Contenu5-->
			<div>
				<div class="contenu">
					<h2><img src="./theme/images/operationJs2.png"/></h2>
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
					<h2><img src="./theme/images/operationJs3.png"/></h2>
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
					<h2><img src="./theme/images/operationJs4.png"/></h2>
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
					<h2><img src="./theme/images/operationCss.png"/></h2>
					<p class="text">Then, Hide scrollbar in css</p><br/>
					<pre class="prettyprint">body{overflow: hidden;}</pre>
				</div>
			</div>
			
			
			<div>
				<div class="contenu">
					<h2><img src="./theme/images/operationTest.png"/></h2>
					<p class="text">This does not prevent their occurrence when there is too much content</p><br/>
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
			
			
			<!--Contenu8-->
			<div>
				<div class="contenu">
					<h2><img src="./theme/images/end.png"/></h2>
					<p class="text">Normally, everything should work. The plugin is still in development. if you use this plugin, talk about it or have any suggestions, bugs, please let me know at <a href="mailto:&#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#107;&#105;&#114;&#107;&#097;&#115;&#046;&#099;&#104;">this e-mail</a></p>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
</body>
