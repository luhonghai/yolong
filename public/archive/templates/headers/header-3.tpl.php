<?php require_once('templates/headers/head.tpl.php'); ?>

<body class="<?php if ($boxed) echo 'boxed'; ?> <?php if (isset($background)) echo $background; ?> clearfix" data-smooth-scrolling="1">     
<div class="vc_body">

<!-- Header Start -->
  <header data-active="<?php if (isset($page)) echo $page; ?>" class="header-3 <?php if (isset($header_mode)) echo $header_mode; ?>" id="header">
  	<div class="vc_secondary-menu-wrapper">
    	<div class="container"><div class="row">  
		  <div class="vc_secondary-menu">
            <div class="vc_contact-top-wrapper col-xs-12 col-sm-7 col-md-8 col-lg-9">
              <div class="vc_contact-top">
                <div class="pull-left">
						<h5><span><?php echo theme_option('top_bar_text'); ?></span> </h5>
					</div> 
              </div>
            </div>
            <div class="vc_social-share-wrapper hidden-xs col-sm-5 col-md-4 col-lg-3">
                  <div class="vc_social-share vc_tight vc_grey-color vc_border-top pull-right"> 
                      <a title="Twitter" class="twitter" href="#"> <i class="fa fa-twitter"></i> </a> 
                      <a title="Facebook" class="facebook" href="#"> <i class="fa fa-facebook"></i> </a> 
                      <a title="Gplus" class="gplus" href="#"> <i class=" fa fa-google-plus"></i> </a> 
                      <a title="linkedin" class="linkedin" href="#"> <i class="fa fa-linkedin"></i> </a> 
                      <a title="email" class="email" href="#"> <i class="fa fa-envelope"></i> </a> 
                      <a title="Rss" class="rss" href="#"> <i class="fa fa-rss"></i> </a>              
                  </div>
            </div>
          </div>
    	</div></div>
        <!-- container row -->      
    </div>         
    <!-- vc_secondary-menu-wrapper -->
    <div class="vc_primary-menu-wrapper">  
    <div class="container">
      <div class="row">     
          <nav class="vc_menu"> 
          	<div class="logo">
                <a href="index.php"> 
                    <img  alt="logo" src="img/logo-2.png"> 
                </a>
            </div>
            <div class="vc_btn-navbar">
              <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".vc_primary-menu"> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
            </div>
            <div class="vc_primary-menu pull-right">
				<?php include_once('templates/headers/'.$primary_menu.'.tpl.php') ?>
            </div>
            <!-- vc_primary-menu --> 
          </nav>
      </div>
      <div class="vc_sub-menu-bg"><div class="element-1"></div><div class="element-2"></div></div>
    </div>
    </div>
    <!-- vc_primary-menu-wrapper -->
    <div class="vc_menu-bg"><div class="element-1"></div><div class="element-2"></div></div>
  </header>
  <!-- Header Ends --> 