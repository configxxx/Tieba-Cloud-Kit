<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>User</title>
<link rel="stylesheet" type="text/css" href="./theme/main.css">
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>

<div id="comment"><h2><img src="theme/user.ico" /></h2><p>User Interface</p></div>

<div id="config">
  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">用户注册</li>
      <li class="TabbedPanelsTab" tabindex="0">用户登陆</li>
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
      <form method="post" name="user_reg" action="lib/user.panel.php">
        <p>您想要注册的账号:</p>
            <input id="username" name="username"/>
          <p>您账号的密码:</p>
            <p>
              <input id="userpassword" name="userpassword" type="password" />
            </p>
            <p>
              <input id="submit_reg" name="submit_reg" type="submit" value="确认注册" />
            </p>
      </form>
      </div>
      <div class="TabbedPanelsContent">
            <form method="post" name="user_log" action="lib/user.panel.php">
        <p>账号:</p>
          <input id="username_log" name="username_log" />
          <p>密码:</p>
          <p>
            <input id="userpassword_log" name="userpassword_log" type="password" />
            </p>
          <p>
            <input id="submit_log" name="submit_log" type="submit" value="登陆"/>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>

<p id="aboutme" align="center">Copyleft <img src="./theme/copyleft.ico" width="15" height="15"> 2014 Racaljk. All rights reserved. -Source here https://github.com/racaljk/Tieba-Cloud-Kit</p>

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>