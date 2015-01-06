<?php

$admin = $_SESSION['admin'];

$admin_info = $db->fetchRow(("SELECT admin, email, fullname, genre FROM admins WHERE admin='" . $admin . "'"));

?>
<!DOCTYPE html>
<html>
<head>
<title>Confession</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bs3/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">
<link href="css/atom-style.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="plugins/PCharts/style.css" type="text/css">
<link href="plugins/kalendar/kalendar.css" rel="stylesheet">
<link rel="stylesheet" href="../plugins/redactor/redactor.css" />
	
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/jquery-ui-1.9.1.js"></script> 
</head>
<body>
<!--layout-container start-->
<div id="layout-container"> 
  <!--Left navbar start-->
  <div id="nav"> 
    <!--logo start-->
    <div class="profile">
      <div class="logo"><a href="index.html"><img src="images/logo.png" alt=""></a></div>
    </div><!--logo end--> 
    
    <!--navigation start-->
    <ul class="navigation">
		<li><a <?php echo ( $_GET['view'] == 'dashboard' ? 'class="active"' : '' ); ?> href="./"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
		<li class="sub"><a <?php echo ( $_GET['view'] == 'pages' ? 'class="active"' : '' ); ?> href="index.php?view=pages"><i class="fa fa-file"></i><span>Pages</span></a>
			<ul class="navigation-sub">
				<li><a <?php echo ( $_GET['view'] == 'sliders' ? 'class="active"' : '' ); ?> href="index.php?view=sliders"><i class="fa fa-leaf"></i><span>Sliders</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'sidebars' ? 'class="active"' : '' ); ?> href="index.php?view=sidebars"><i class="fa fa-leaf"></i><span>Sidebars</span></a></li>
			</ul>
		</li>
		<li><a <?php echo ( $_GET['view'] == 'posts' ? 'class="active"' : '' ); ?> href="index.php?view=posts"><i class="fa fa-folder-open-o"></i><span>Posts</span></a></li>
		<li class="sub"><a <?php echo ( $_GET['view'] == 'users' ? 'class="active"' : '' ); ?> href="index.php?view=users"><i class="fa fa-smile-o"></i><span>Users</span></a>
			<ul class="navigation-sub">
				<li><a <?php echo ( $_GET['view'] == 'memberships' ? 'class="active"' : '' ); ?> href="index.php?view=memberships"><i class="fa fa-leaf"></i><span>Memberships</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'dares' ? 'class="active"' : '' ); ?> href="index.php?view=dares"><i class="fa fa-leaf"></i><span>Dares</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'challenges' ? 'class="active"' : '' ); ?> href="index.php?view=challenges"><i class="fa fa-leaf"></i><span>Challenges</span></a></li>
			</ul>
		</li>
		<li><a <?php echo ( $_GET['view'] == 'schools' ? 'class="active"' : '' ); ?> href="index.php?view=schools"><i class="fa fa-list-alt"></i><span>Schools</span></a></li>
		<li class="sub"><a <?php echo ( $_GET['view'] == 'settings' ? 'class="active"' : '' ); ?> href="index.php?view=settings"><i class="fa fa-gear"></i><span>Settings</span></a>
			<ul class="navigation-sub">
				<li><a <?php echo ( $_GET['view'] == 'badge-settings' ? 'class="active"' : '' ); ?> href="index.php?view=badge-settings"><i class="fa fa-bookmark"></i><span>Badges</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'transactions' ? 'class="active"' : '' ); ?> href="index.php?view=transactions"><i class="fa fa-bookmark"></i><span>Transactions</span></a></li>
			</ul>
		</li>
		<li class="sub"><a <?php echo ( $_GET['view'] == 'theme-settings' ? 'class="active"' : '' ); ?> href="index.php?view=theme-settings"><i class="fa fa-font"></i><span>Theme</span></a>
			<ul class="navigation-sub">
				<li><a <?php echo ( $_GET['view'] == 'theme-settings' ? 'class="active"' : '' ); ?> href="index.php?view=theme-settings"><i class="fa fa-table"></i><span>General</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'theme-header' ? 'class="active"' : '' ); ?> href="index.php?view=theme-header"><i class="fa fa-table"></i><span>Header</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'theme-pages' ? 'class="active"' : '' ); ?> href="index.php?view=theme-pages"><i class="fa fa-table"></i><span>Pages</span></a></li>
				<li><a <?php echo ( $_GET['view'] == 'theme-footer' ? 'class="active"' : '' ); ?> href="index.php?view=theme-footer"><i class="fa fa-leaf"></i><span>Footer</span></a></li>
			</ul>
		</li>
   </ul><!--navigation end--> 
  </div><!--Left navbar end--> 
  
  
  <!--main start-->
  <div id="main">
    <div class="head-title">
      <div class="menu-switch"><i class="fa fa-bars"></i></div>
      <!--row start-->
      <div class="row"> 
        <!--col-md-12 start-->
        <div class="col-md-12"> 
          <!--profile dropdown start-->
          <ul class="user-info pull-right">
            <li class="hidden-xs">
              <input type="text" placeholder=" Search" class="form-control page-search">
            </li>
            <li class="profile-info dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <img class="img-circle" alt="" src="images/avatar.jpg"><?php echo $admin_info['fullname']; ?> </a>
              <ul class="dropdown-menu">
                <li class="caret"></li>
                <li> <a href="edit-profile.html"> <i class="fa fa-user"></i> Edit Profile </a> </li>
                <li> <a href="#"> <i class="fa fa-inbox"></i> Inbox </a> </li>
                <li> <a href="fullcalendar.html"> <i class="fa fa-calendar"></i> Calendar </a> </li>
                <li> <a href="login.html"> <i class="fa fa-clipboard"></i> Log Out </a> </li>
              </ul>
            </li>
          </ul><!--profile dropdown end--> 
          
          <!--top nav start-->
          <ul class="nav top-menu hidden-xs notify-row">
            <!--task start-->
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-tasks"></i> <span class="badge bg-success">6</span> </a>
              <ul class="dropdown-menu extended tasks-bar">
                <div class="notify-arrow notify-arrow-red"></div>
                <li>
                  <p class="red">You have 4 pending tasks</p>
                </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Dashboard v1.3</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success"> <span class="sr-only">40% Complete</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning"> <span class="sr-only">60% Complete (warning)</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Iphone Development</div>
                    <div class="percent">87%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"> <span class="sr-only">87% Complete</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Mobile App</div>
                    <div class="percent">33%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger"> <span class="sr-only">33% Complete (danger)</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Dashboard v1.3</div>
                    <div class="percent">45%</div>
                  </div>
                  <div class="progress progress-striped active">
                    <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar"> <span class="sr-only">45% Complete</span> </div>
                  </div>
                  </a> </li>
                <li class="external"> <a href="#">See All Tasks</a> </li>
              </ul>
            </li><!--task end--> 
            
            <!--message start-->
            <li class="dropdown" id="header_inbox_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i> <span class="badge bg-important">5</span> </a>
              <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-red"></div>
                <li>
                  <p class="red">You have 7 new messages</p>
                </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">Jonathan Smith</span> <span class="time">Just now</span> </span> <span class="message"> consectetur adipiscing elit </span> </a> </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">John Doe</span> <span class="time">20 mins</span> </span> <span class="message">consectetur adipiscing elit </span> </a> </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">Jonathan Smith</span> <span class="time">5 hrs</span> </span> <span class="message"> This is awesome dashboard. </span> </a> </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">John Doe</span> <span class="time">Just now</span> </span> <span class="message"> consectetur adipiscing elit </span> </a> </li>
                <li class="external"> <a href="#">See all messages</a> </li>
              </ul>
            </li><!--message end--> 
            
            <!--notification start-->
            <li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span class="badge bg-warning">7</span> </a>
              <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-red"></div>
                <li>
                  <p class="red">You have 3 new notifications</p>
                </li>
                <li> <a href="#"> <span class="label label-danger"><i class="fa fa-bolt"></i></span> Server #3 overloaded. <span class="small italic">34 mins</span> </a> </li>
                <li> <a href="#"> <span class="label label-warning"><i class="fa fa-bell"></i></span> Server #10 not respoding. <span class="small italic">1 Hours</span> </a> </li>
                <li> <a href="#"> <span class="label label-danger"><i class="fa fa-bolt"></i></span> Database overloaded 24%. <span class="small italic">4 hrs</span> </a> </li>
                <li> <a href="#"> <span class="label label-success"><i class="fa fa-plus"></i></span> New user registered. <span class="small italic">Just now</span> </a> </li>
                <li> <a href="#"> <span class="label label-info"><i class="fa fa-bullhorn"></i></span> Application error. <span class="small italic">10 mins</span> </a> </li>
                <li class="external"> <a href="#">See all notifications</a> </li>
              </ul>
            </li><!--notification end-->
          </ul><!--top nav end--> 
        </div><!--col-md-12 end--> 
      </div><!--row end--> 
    </div>
    <!--margin-container start-->
    <div class="margin-container">
    <!--scrollable wrapper start-->
      <div class="scrollable wrapper">