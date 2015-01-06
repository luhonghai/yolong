<?php

	if ( isLogged() == 'false' || $user_info['role'] != 1 ) {
		header("Location: /index.php?view=home");
	} 
	
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title><?php echo get_option('site_name'); ?> | Web Application</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<link rel="stylesheet" href="../plugins/redactor/redactor.css" />
<?php if ( $input->gc['view'] == 'menu' ) { ?>
	
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery-ui-1.10.4.min.css" type="text/css" />
	
<?php } ?>
<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
<script src="js/app.v1.js"></script>
<link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->

</head>
<body class="">
<section class="vbox">
  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="index.html" class="navbar-brand"><img src="images/logo.png" class="m-r-sm"><?php echo get_option('site_name'); ?></a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
	<ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php echo get_gravatar($user_info['email'], 30); ?>"> </span> <?php echo $user_info['fullname']; ?> <b class="caret"></b> </a>
        <ul class="dropdown-menu animated fadeInRight">
          <span class="arrow top"></span>
          <li> <a href="#">Settings</a> </li>
          <li> <a href="profile.html">Profile</a> </li>
          <li class="divider"></li>
          <li> <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-black aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="<?php echo get_gravatar($user_info['email'], 50); ?>"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php echo $user_info['fullname']; ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Administrator</span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    <li> <a href="#">Settings</a> </li>
                    <li> <a href="profile.html">Profile</a> </li>
                    <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>
                    <li> <a href="docs.html">Help</a> </li>
                    <li class="divider"></li>
                    <li> <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                <ul class="nav nav-main" data-ride="collapse">
					<li <?php echo ( $_GET['view'] == 'dashboard' ? 'class="active"' : '' ); ?>> <a href="./" class="auto"> <i class="i i-layer icon"> </i> <span class="font-bold">Dashboard</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'pages' ? 'class="active"' : '' ); ?>> <a href="index.php?view=pages" class="auto"> <i class="i i-folder icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('pages'); ?></b>Pages</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'posts' ? 'class="active"' : '' ); ?>> <a href="index.php?view=posts" class="auto"> <i class="i i-file icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('posts'); ?></b>Posts</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'comments' ? 'class="active"' : '' ); ?>> <a href="index.php?view=comments" class="auto"> <i class="i i-chat icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('comments'); ?></b>Comments</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'users' ? 'class="active"' : '' ); ?>> <a href="index.php?view=users" class="auto"> <i class="i i-user2 icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('users'); ?></b>Users</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'dares' ? 'class="active"' : '' ); ?>> <a href="index.php?view=dares" class="auto"> <i class="fa fa-hand-o-right icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('dares'); ?></b>Dares</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'challenges' ? 'class="active"' : '' ); ?>> <a href="index.php?view=challenges" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('challenges'); ?></b>Challenges</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'schools' ? 'class="active"' : '' ); ?>> <a href="index.php?view=schools" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('schools'); ?></b>Schools</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'transactions' ? 'class="active"' : '' ); ?>> <a href="index.php?view=transactions" class="auto"> <i class="i i-cart icon"> </i> <span class="font-bold"> <b class="badge bg-danger pull-right"><?php echo count_rows('transactions'); ?></b>Transactions</span> </a> </li>
					<li <?php echo ( $_GET['view'] == 'settings' ? 'class="active"' : '' ); ?>> <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-params icon"> </i> <span class="font-bold">Settings</span> </a>
					<ul class="nav dk">
						<li <?php echo ( $_GET['view'] == 'settings' ? 'class="active"' : '' ); ?>> <a href="index.php?view=settings" class="auto"> <i class="i i-dot"></i> <span>General</span> </a> </li>
						<li <?php echo ( $_GET['view'] == 'sliders' ? 'class="active"' : '' ); ?>> <a href="index.php?view=sliders" class="auto"> <i class="i i-dot"></i> <span>Sliders</span> </a> </li>
						<li <?php echo ( $_GET['view'] == 'menu' ? 'class="active"' : '' ); ?>> <a href="index.php?view=menu" class="auto"> <i class="i i-dot"></i> <span>Menu</span> </a> </li>
						<li <?php echo ( $_GET['view'] == 'badges' ? 'class="active"' : '' ); ?>> <a href="index.php?view=badges" class="auto"> <i class="i i-dot"></i> <span>User Badges</span> </a> </li>
						<li <?php echo ( $_GET['view'] == 'memberships' ? 'class="active"' : '' ); ?>> <a href="index.php?view=memberships" class="auto"> <i class="i i-dot"></i> <span>Memberships</span> </a> </li>
                    </ul>
                  </li>
                </ul>
              </nav>
              <!-- / nav -->
            </div>
          </section>
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="hbox stretch">
          <section>
            <section class="vbox">
              <section class="scrollable padder">
                