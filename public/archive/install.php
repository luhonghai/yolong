<?
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Miniblog Installer</title>
<style type="text/css">
<!--
body {
	margin:0 auto;
	padding:10px;
	font-family:Geneva, Arial, Helvetica, sans-serif;
	font-size:1.0em;
}
div#wrapper {
	width:50%;
	margin:0 auto;
	padding:0;
}
span.success {
	font-weight:bold;
	color:#339900;
}
span.error {
	font-weight:bold;
	color:#ff0000;
}
span.sqlerror strong, span.tip strong {
	display:block;
	padding:5px;
	background-color:#ccc;
}
span.sqlerror, span.tip {
	border:1px solid #ccc;
	margin-top:10px;
	display:block;
	font-size:0.9em;
}
span.sqlerror span, span.tip span {	
	display:block;
	padding:5px;
}
span.sqlerror strong {
	background-color:#3399CC;
}
span.sqlerror {
	border:1px solid #3399CC;
}
em {
	background-color:#ddd;
	font-family:"Courier New", Courier, monospace;
}
h1 {
	border-bottom:1px solid #ddd;
	font-size:1.4em;
	color:#333;
}
a {
	font-size:0.9em;
	color:#ffffff;
	background-color:#333333;
	padding:3px;
	text-decoration:none;
}
//-->
</style>
</head>

<body>
<div id="wrapper">
<h1>Installing</h1>
<?php

	define('IN_BLOG', true);
	define('PATH', '');
	
	include(PATH . 'includes/global.php');
	
	global $db;
	
	/* installer vars */
	$install_step = (int) $_GET['step'];
		
	$success = '<span class="success">Success!</span><br />';
	$fail    = '<span class="error">Failed!</span><br />';
	
	$sql_error = '<br /><span class="sqlerror"><strong>MySQL said:</strong><span>%s</span></span><br />';
	
	$tip  = '<span class="tip"><strong>Tip:</strong><span>%s</span></span>';
	$code = '<span class="tip"><strong>Code:</strong><span>%s</span></span>';
	
	$continue = '<br /><a href="install.php?step=%d">Continue &raquo;</a>';
	
	if($install_step == 1 || $install_step == 0)
	{
		
		echo 'Testing connection....';
		
		echo $success;
		echo 'Testing database....';
			
			
		if(!$db)
		{
			echo $fail;
		}
		else
		{
			echo $success;
			echo(sprintf($continue, 2));
		}
		

	}
	
	
	if($install_step == 2)
	{
		if(!$db)
		{
			header("Location: install.php");
			exit;
		}
		
		echo 'Creating tables <em>Confession</em>, <em>confession_config</em>...';
		
		$sql = "CREATE TABLE `posts` (
				  `post_id` int(20) NOT NULL auto_increment,
				  `user_id` int(20) NOT NULL default '0',
				  `anonymous` int(20) NOT NULL default '0',
				  `post_slug` varchar(255) NOT NULL default '',
				  `post_title` varchar(255) NOT NULL default '',
				  `post_content` longtext NOT NULL,
				  `date` int(20) NOT NULL default '0',
				  `published` int(1) NOT NULL default '0',
				  PRIMARY KEY  (`post_id`)
				)";
				
		$result = $db->query($sql);
		
		$sql = "CREATE TABLE `schools` (
				  `school_id` int(20) NOT NULL auto_increment,
				  `school_name` varchar(255) NOT NULL default '',
				  `school_location` varchar(255) NOT NULL default '',
				  PRIMARY KEY  (`school_id`)
				)";
				
		$result = $db->query($sql);
		
		$sql = "CREATE TABLE `users` (
				  `user_id` int(11) NOT NULL auto_increment,
				  `username` varchar(255) NOT NULL default '',
				  `password` varchar(255) NOT NULL default '',
				  `email` varchar(255) NOT NULL default '',
				  `fullname` varchar(255) NOT NULL default '',
				  `school_id` int(20) NOT NULL default '0',
				  `date` int(20) NOT NULL default '0',
				  `genre` int(1) NOT NULL default '0',
				  PRIMARY KEY  (`user_id`)
				)";
				
		$result = $db->query($sql);
		
		$sql = "CREATE TABLE `admins` (
				  `admin_id` int(11) NOT NULL auto_increment,
				  `admin` varchar(255) NOT NULL default '',
				  `password` varchar(255) NOT NULL default '',
				  `email` varchar(255) NOT NULL default '',
				  `fullname` varchar(255) NOT NULL default '',
				  `genre` int(1) NOT NULL default '0',
				  PRIMARY KEY  (`admin_id`)
				)";
				
		$result = $db->query($sql);
		
		$sql = "CREATE TABLE `confession_config` (
				  `config_name` varchar(255) NOT NULL default '',
				  `config_value` varchar(255) NOT NULL default '',
				  `config_explain` longtext NOT NULL
				)";
		
		$result2 = $db->query($sql);
		
		echo $success;
		echo 'Inserting record data...';
			
		$sql = "INSERT INTO `admins` (`admin`, `password`, `email`, `fullname`, `genre`) VALUES
				('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'email@yahoo.com', 'Master Admin', '0')";
			
		$result = $db->query($sql);

		echo $success;
		echo(sprintf($continue, 3));
		
	}
	
	if($install_step == 3)
	{
	
		?>
			<p>Installation is now complete!<br /><br />
				View your miniblog here: <a href="index.php">miniblog</a><br /><br />
				Login to your miniblog admin panel, with password: <strong>password</strong> here: <a href="adm/admin.php">admin</a><br /><br /></p>
				<p><strong>Installation complete!</strong></p>
				<p><strong>Please delete this file (install.php) from your server</strong></p>
			</code>
				
		<?
	
	}
	
	
?>
</div>
</body>
</html>
<?
ob_end_flush();
?>
		