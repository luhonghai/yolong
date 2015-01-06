<!DOCTYPE html>
<!--[if IE 7]><html class = "ie7"><![endif]-->
<!--[if IE 8]><html class = "ie8"><![endif]-->
<!--[if IE 9]><html class = "ie9"><![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html>
<!--<![endif]-->
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<title><?php echo get_option('site_title'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css?ver=1.0.0" />
<link rel="stylesheet" type="text/css" href="css/selectric.css?ver=1.0.0" />
<link rel="stylesheet" href="css/img_picker.css">
<link rel="stylesheet" href="css/sky-forms.css?ver=1.0.0">

<?php
	global $css;
	
	echo $css;
?>

<script type="text/javascript" src="js/jquery-1.11.0.js" ></script>

<script src="js/imgPicker.js"></script>

<?php
	global $js;
	
	echo $js;
?>

<script type="text/javascript" src="js/jquery.selectric.min.js" ></script>
<!-- Base MasterSlider style sheet -->
<link rel="stylesheet" href="plugins/masterslider/style/masterslider.css" />
		 
<!-- MasterSlider default skin -->
<link rel="stylesheet" href="plugins/masterslider/skins/default/style.css" />
		
<!-- MasterSlider main JS file -->
<script src="plugins/masterslider/masterslider.min.js"></script>
<!--[if IE]><script src="js/html5.js"></script><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->
</head>
<body>
<div class="wrapper with-slider version3">

	<?php if ( $user_info['role'] == 1 ) { ?>
	<div class="admin-bar">
		<a href="./admin/index.php?view=dashboard" class="admin-bar-button">Admin Dashboard</a>
		<a href="./index.php?view=schools" class="admin-bar-button">Schools</a>
		<?php if ( $user_info['role'] == 1 && !$input->gc['enable-edit'] && $input->gc['enable-edit'] != true){ ?>
			<a href="./index.php?view=<?php echo $input->gc['view'];?>&enable-edit=true" class="admin-bar-button">Enable Edit</a>
		<?php } else if ( $user_info['role'] == 1 && $input->gc['enable-edit'] == true){ ?>
			<a href="./index.php?view=<?php echo $input->gc['view'];?>&enable-edit=false" class="admin-bar-button">Disable Edit</a>
		<?php } ?>
	</div>
	<?php } ?>
	
	<header>

		<div class="site-header">
			<div class="site-title"><a href="./index.php?view=home"><img src="images/logo.png" alt="*" /></a>
				<h1><a href="./index.php?view=home"><?php echo get_option('site_name'); ?></a></h1>
			</div>
			<!-- .site-title -->
			<nav class="site-nav">
				<ul>
					<li <?php echo menu_active('home');?> ><a href="./index.php?view=home">Home</a></li>
					<li <?php echo menu_active('confessions');?>><a href="./index.php?view=confessions">Confessions</a></li>
					<li <?php echo menu_active('dares');?>><a href="./index.php?view=dares">Dares</a></li>
					<li <?php echo menu_active('challenges');?>><a href="./index.php?view=challenges">Challenges</a></li>
				</ul>
			</nav>
			<!-- .site-nav -->
			<div class="user-area">
				<?php if (isLogged() == 'true') {
				
				if ( $user_info['avatar'] != 0 ){
					$avatar = get_image_name($user_info['avatar']);
					echo '<img src="files/' . $avatar['image'] . '" class="avatar">';
				}else { ?>
					<img src="images/default_avatar.png" alt="Avatar" class="avatar">
				<?php } ?>
				
				<p>Hi, <span><?php echo $user_info['username']; ?></span>! - ₦<?php echo $user_info['money']; ?></p>
				<ul class="user-options">
					<li><a href="./index.php?view=profile">My Profile Settings</a></li>
					<?php 
					$friends_feature = get_membership($user_info['id']);
					if( $friends_feature['friends'] == 1 ){ ?>
					
					<li><a href="./index.php?view=friends">Friends</a></li>
					
					<?php } if( get_option('membership') == 1 ){ ?>
						<li><a href="./index.php?view=membership">Membership</a></li>
					<?php } ?>
					<li><a href="./index.php?view=deposit">Deposit</a></li>
					<li><a href="./index.php?view=sign-out">Sign Out</a></li>
				</ul>	
				<?php } ?>
				
				<!-- .user-options -->
			</div>
			<!-- .user-area -->
		</div>
    <!-- .site-header -->
	</header>