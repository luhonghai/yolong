<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Confession</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    
        <!-- Favicons -->
        <link rel="shortcut icon" href="favicon.html">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.html">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-57x57.html" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.html" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.html" />
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<!-- Base Stylesheet -->
        <link rel="stylesheet" href="css/base.css?ver=1.0">
		<script type='text/javascript' src="js/jquery-1.11.0.min.js"></script>
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
		<!-- Header -->
		<div id="header">
			<!-- Top bar -->
			<?php if ( theme_option('top_bar') == 1 ) {
				include('theme/topbar.php');
			}
			?>
			<!-- End Top bar -->
			<div class="logo_menu_area">
				<div class="container">
					<div class="row">
						<div class="span4">
							<!-- Logo -->
							<div id="logo">
								<a href="index-2.html"><img src="images/logo.png" alt="" /></a>
							</div>
							<span class="site-descript">best company ever</span>
							<!-- End Logo -->
						</div>
						<div class="span8">
							<!-- Menu -->
							<div class="search-button">
							</div>
							<div class="search-button-1">
								<div class="search-popup">
									<input type="text" class="search-query" placeholder="Search" name="s">
								</div>
							</div>
							<div class="dl-menu-container">
								<div id="dl-menu" class="dl-menuwrapper">
									<button class="dl-trigger">Open Menu</button>
									<ul class="dl-menu">
										<li>
											<a href="./">Home </a>
										</li>
										<li>
											<a href="/index.php?view=confessions">Confessions</a>
										</li>
										<li>
											<a href="/index.php?view=signup">LogIn / SignUp</a>
										</li>
										<li class="dl-search">
											<div class="responsive-searchbox">
												<input type="text" class="search-query" placeholder="Search" name="s-responsive" style="">
												<input class="responsive-submit" type="submit" value="" name="search-submit" style="">
											</div>
										</li>								
									</ul>
									
								</div><!-- /dl-menuwrapper -->
							</div>
							<!-- End Menu -->
							
						</div>
						<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
			<div class="dl-responsive-menu-container"></div>
		</div>
		<div class="clearfix"></div>
		<!-- End Header -->