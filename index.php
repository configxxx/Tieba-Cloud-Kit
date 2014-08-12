<?php 
session_start();
require_once('./lib/class.mysql.php');
require_once('./lib/core/class.baiduopt.php');
require_once('./lib/core/indexui.php');
require_once('admin.setting.php');

$opt_flag="";

if($_SESSION["s_uname"] == "")
{
    header('Location:user.php');
}else{
    global $opt_flag;
    if($_SESSION["s_uname"] ==TK_ROOT_NAME){
        $opt_flag=true;//for admin mode
    }else{
        $opt_flag=false;//for normal mode
    }
}

$baidu_info=tieba_info();
$_list=tieba_list();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tieba CLoud Kit</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
<!--#############################################################################################-->
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#home" class="logo"> <i class="fa fa-cloud"></i> 贴吧云工具箱
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $baidu_info['name']?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">     
                                    <?php echo '<img src="'.$baidu_info['tieba_touxiang'].'" class="img-circle" alt="User Image" /><p>'.$baidu_info['tieba_name'][0].$baidu_info['tieba_name'][1].'</p>';?>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class=" text-center">
                                        <p><?php echo $baidu_info['other_api']?></p>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <form method="post" action="./lib/user.panel.php"><div class="pull-left">
                                        <a href="#bind_id" class="btn btn-default btn-flat" data-toggle="tab">账号信息</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="./lib/logout.php" class="btn btn-default btn-flat">退出登录</a>
                                    </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
<!--#############################################################################################-->        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        <?php echo '
                            <img src="'.$baidu_info['tieba_touxiang'].'" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                        <p>你好，'.$baidu_info['name'].'</p>';
                        ?>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!--主页-->
                        <li class="active">
                            <a href="#home" data-toggle="tab">
                                <i class="fa fa-dashboard"></i> <span>主页</span>
                            </a>
                        </li>
                        <!--账号信息-->
                        <li>
                            <a href="#bind_id" data-toggle="tab">
                                <i class="fa fa-th"></i> <span>帐号信息</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li class="treeview">

                            <ul class="treeview-menu">
                                <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Forms</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                                <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>我的贴吧</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#mytieba" data-toggle="tab"><i class="fa fa-angle-double-right"></i> 我喜欢的吧</a></li>
                                <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> 统计数据</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>管理面板</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
                                <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                                <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                                <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                                <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="pages/calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>
                        <li>
                            <a href="pages/mailbox.html">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>支持</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                                <li><a href="http://www.racalinux.cn" target="_blank"><i class="fa fa-angle-double-right"></i> 博客</a></li>
                                <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                                <li><a href="#getcookie" data-toggle="tab"><i class="fa fa-angle-double-right"></i>如何获取Cookie？</a></li>
                                <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                                <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <div class="tab-content" >
<!--#############################################################################################-->
            <div class="tab-pane active"  id="home">

            <aside class="right-side">

                <section class="content-header">
                    <h1>
                        
                        <small>Control panel</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        帐号信息
                                    </h3>
                                    <p>
                                        My Baidu ID
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-chain "></i>
                                </div>
                                <a href="#bind_id"  data-toggle="tab" class="small-box-footer">
                                    Do it <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        我的贴吧
                                    </h3>
                                    <p>
                                        My Tieba
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <a href="#mytieba" class="small-box-footer" data-toggle="tab">
                                    See it <i class="fa fa-vimeo-square"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        44
                                    </h3>
                                    <p>
                                        User Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">                                                                               

                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">用户操作</h3>
                                    <div class="box-tools pull-right">
                                        <ul class="pagination pagination-sm inline">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="todo-list">
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <!-- checkbox -->
                                            <input type="checkbox" value="" name=""/>
                                            <!-- todo text -->
                                            <span class="text">Design a nice theme</span>
                                            <!-- Emphasis label -->
                                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Make the theme responsive</span>
                                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Check your messages and notifications</span>
                                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                                </div>
                            </div><!-- /.box -->

                          

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">                           

                            <!-- Calendar -->
                            <div class="box box-solid bg-green-gradient">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title">Calendar</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <!-- button with a dropdown -->
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li><a href="#">Add new event</a></li>
                                                <li><a href="#">Clear events</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">View calendar</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                                        
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <!--The calendar -->
                                    <div id="calendar" style="width: 100%"></div>
                                </div><!-- /.box-body -->  
                                <div class="box-footer text-black">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- Progress bars -->
                                            <div class="clearfix">
                                                <span class="pull-left">Task #1</span>
                                                <small class="pull-right">90%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                            </div>

                                            <div class="clearfix">
                                                <span class="pull-left">Task #2</span>
                                                <small class="pull-right">70%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                            </div>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="clearfix">
                                                <span class="pull-left">Task #3</span>
                                                <small class="pull-right">60%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                            </div>

                                            <div class="clearfix">
                                                <span class="pull-left">Task #4</span>
                                                <small class="pull-right">40%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->                                                                        
                                </div>
                            </div><!-- /.box -->                            

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside>
            </div>
<!--#############################################################################################-->
            <div class="tab-pane" id="bind_id"  >
                <aside class="right-side">
                <!--header-->
                <section class="content-header">
                    <h1>
                        账号信息
                        <small>My id info</small>
                    </h1>
                </section>
                <!--end header-->
                <!--notice-->
                <?php
                if($baidu_info['is_login']==true){
                    $info_box='
                    <section class="content">
                            <div class="row">
                                <div class="col-md-4">
                                        <div class="box box-solid box-success">
                                            <div class="box-header">
                                                <h3 class="box-title">ID Info</h3>
                                                <div class="box-tools pull-right">
                                                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body" style="display: block;font-size:20px;">
                                            <img src="'.$baidu_info['tieba_touxiang'].'"><br>
                                                百度账号: <code>'.$baidu_info['tieba_name'][1].'</code><br>
                                                绑定邮箱: <code>'.$baidu_info['baidu_email'].'</code><br>
                                                绑定手机: <code>'.$baidu_info['baidu_mobile'].'</code><br>
                                            </div><!-- /.box-body -->
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="box box-solid box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Tieba Info</h3>
                                                <div class="box-tools pull-right">
                                                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                贴吧总数:<code>'.count($_list).'</code><br>
                                                经验最高的贴吧:<code>'.$_list[0]['utf8_name'].'</code><br>
                                                经验最低的贴吧:<code>'.$_list[count($_list)-1]['utf8_name'].'</code><br>
                                            </div>
                                        </div>
                                <div>
                            </div>
                        </section>';
                            echo $info_box;
                }else{
                    echo        
                '<div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>注意：</b>你没有绑定百度账号,所以无法使用云工具箱,请把你的Cookie粘贴至下面以完成绑定.
                    </div>
                </div>
                <!--end notice-->

                <!--main ui-->
                <section class="content invoice">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> 请粘贴你的Cookie至下面，如果你不知道如何获取Cookie,请 访问侧栏"支持->获取Cookie."部分.
                                <small class="pull-right">Default</small>
                            </h2>
                        </div>
                    </div>
                    <div class="row invoice-info"> 
                    <form method="post" action="./lib/user.bind.php">
                    <div class="input-group">
                    <span class="input-group-addon">BDUSS=</span>
                    <input type="text" class="form-control" placeholder="Your cookie" id="cookie" name="cookie" style="width:60%;" >
                    </div><p>&nbsp;</p>
                    <input type="submit" class="form-control" id="submit_bind" name="submit_bind"  style="width:10%">
                    </form>          
                    </div>
                </section>
                <!--end main ui-->';
                } 
                ?>
                </aside>
            </div>
<!--#############################################################################################-->
            <div class="tab-pane" id="mytieba">
            <aside class="right-side"> 
                <section class="content-header">
                    <h1>
                        My Tieba
                        <small>advanced tieba data</small>
                    </h1>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">我喜欢的贴吧</h3>
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="tieba_list" class="table table-bordered table-hober">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>贴吧名</th>
                                                <th>经验</th>
                                                <th>状态</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $table=array();
                                            $k=0;
                                            if($_list[0] == 0 )
                                            {
                                                echo $_list[1];
                                            }else{
                                                foreach ($_list as  $value) {
                                                    $table[$k] .='<tr><td>'.$k.'</td><td>'.$value['utf8_name'].'</td><td>undefine</td><td>undefine</td></tr>';
                                                    $k++;
                                                }
                                                 print_r(implode("",$table));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>         
                    </div>
                </section>

            </aside>
            </div>
 <!--#############################################################################################-->
            <div class="tab-pane" id="getcookie">
            <aside class="right-side"> 
                <section class="content-header">
                    <h1>Support Page</h1>
                </section>
                <section class="content">
                    <div class="row"><div class="col-md-12"><div class="box box-primary">
                     <div class="box-header">
                            <i class="fa fa-edit"></i>
                            <h3 class="box-title">How to Get Cookie</h3>
                    
                    </div>
                    <div class="box-body pad table-responsive">
                        <p>Chrome浏览器/遨游3/360极速浏览器/..</p>
                        <p>·第一步, 进入http://tieba.baidu.com/然后登陆你的账号，点击浏览器地址栏类似文件夹的图标，在弹出的方框中选择"显示Cookies和网站数据"</p>
                        <p>·第一步, 在弹出的的方框中依次选择baidu.com->Cookie->BDUSS,然后你就可以下面的内容上查看你的Cookie，注意，他不是完全的，只显示了一部分，所以需要点击内容那个区域然后ctrl+a选中再按下ctrl+c复制</p>
                        <p>·第三步, 最后把这些全部复制到账号绑定页面按下确定即可完成绑定</p>
                        <p>&nbsp;</p>
                        <p>在下一个版本中可能会增加自动绑定API，敬请期待~</p>
                         <p>图文教程</p>  
                        <h2><img src="./img/tut/step1.png"/></h2>
                        <h2><img src="./img/tut/step2.png"/></h2>
                        <p>如果你还有其他教程请发送至1948638989@qq.com</p> 
                    </div>
                    </div>
                    </div>
                    </div>
                </section>

            </aside>
            </div>
 <!--#############################################################################################-->
     
         </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>
</html>