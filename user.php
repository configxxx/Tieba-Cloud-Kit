<head>
	<title>用户注册</title>
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
					<p><a class="houseLink0" rel="ConcentLink" href="#house1">注册</a>  |  <a href="#house1"  class="houseLink0" rel="ConcentLink">登陆</a></p>
				</div>
			</div>
            <!--Contenu2-->
			<div>
				<div class="contenu">
					<h2 align="center"><img src="./theme/images/user.ico"/></h2>

					<p class="text" align="center">在使用贴吧云工具箱之前，您需要注册一个云工具箱的账号<a href="#"></a></p>


                <pre  align="center" class="prettyprint">&lt;p&gt;请注意这是贴吧云工具箱账号而不是百度账号，请勿混淆！&lt;/p&gt;</pre>
                </div>
				<div id="TabbedPanels1" class="TabbedPanels">
				  <ul class="TabbedPanelsTabGroup">
				    <li class="TabbedPanelsTab" tabindex="0">注册</li>
				    <li class="TabbedPanelsTab" tabindex="0">登陆</li>
			      </ul>
				  <div class="TabbedPanelsContentGroup">
                        <div class="TabbedPanelsContent">
                         <form method="post" name="user_reg" action="lib/user.panel.php">
                            <p>您想要注册的账号:</p>
                            <input id="username" name="username"/>
                            <p>您账号的密码:</p>
                            <p class="TabbedPanelsContent"><input id="userpassword" name="userpassword" type="password" /></p>
                            <p><input id="submit_reg" name="submit_reg" type="submit" value="确认注册" /></p>
                        </form>
                        </div>
                        <div class="TabbedPanelsContent">
                        <form method="post" name="user_log" action="lib/user.panel.php">
                            <p>账号:</p>
                            <input id="username_log" name="username_log" />
                            <p>密码:</p>
                            <p><input id="userpassword_log" name="userpassword_log" type="password" /></p>
                            <p><input id="submit_log" name="submit_log" type="submit" value="登陆"/></p>
                        </form>
                        </div>
			      </div>
			  </div>
	      </div>

			<!--Contenu3-->
            <div>
				<div class="contenu">
					<h2><img src="./theme/images/end.png"/></h2>
					<p class="text">贴吧云工具箱账号注册完成了，点击这里开始云游~</p>
                    <pre class="prettyprint">
                    &lt;div&gt;有问题请联系管理员.&lt;/div&gt;
                    </pre>
				</div>	
			</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
</body>