<?php 

	require_once('includes/global.php');
	
	require_once('includes/functions.php');

	$author = get_option('author'); // for author meta data: <meta name="author" content="$author; ">
	$website_name = get_option('site_name'); // for closing title every page: <title>$title;  | $website_name;</title> 
	$footer_message = theme_option('footer_text'); // Set Copyright message on footer
	
	$responsive = theme_option('responsive'); // 1= Responsive, 0 = Non Responsive 
	$boxed = theme_option('boxed'); // 1= Boxed Layout, 0 = Full Width Layout
	
	$background = theme_option('background'); // '' = none, or 'background-1'  to 'background-14'
	$banner_title_bg = theme_option('title_background'); // '' = original, or 'background-1'  to 'background-14'
	$theme_color = theme_option('theme_color'); // 'color-blue', 'color-green', 'color-orange', 'color-purple', 'color-red', color-yellow'
	
	$header = theme_option('header_style'); // 'header-1' or 'header-2' or 'header-3' or 'header-4'
	$footer = theme_option('footer_style'); // 'footer-1' or 'footer-2' or 'footer-3' or 'footer-4'
	
	$header_mode = theme_option('header_mode'); // 'mode-1'= Slash, 'mode-2'= Stylish, 'mode-3'= Soft
	$footer_mode = theme_option('footer_mode'); // 'mode-1'= Slash, 'mode-2'= Stylish,	'mode-3'= Soft
	
	$primary_menu = 'one-page-menu'; // located at templates/headers/ $primary_menu .tpl.php
	
?>