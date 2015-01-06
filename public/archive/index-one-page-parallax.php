<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'One Page Parallax Home - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'home-menu';   // To set active on the same id of primary menu ?>
<?php $specific_css = 'one-page-parallax'; // For specific page css, located at css/specific/ $specific_css .css also responsive files: css/specific/ $specific_css -responsive.css  ?>
<!-- End of Data -->

<!-- This variable set manually just for demo purpose, you should set header for all pages in templates/config.php -->
<?php $header = 'header-4';   // Header Type ?>
<?php $primary_menu = 'one-page-menu';   // Primary Menu ?>
<?php $footer = 'footer-4';   // Footer Type ?>
<?php $footer_mode = 'mode-2';   // Footer Mode ?>


<!-- End Demo -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
<div class="one-page-parallax">
  <div class="vc_banner" data-waypoint="home">
    <div class="wrapper">
        <div class="banner-text text-1 text-center">
            <p class="text-1">Get the Most Delicious</p>
            <p class="vc_subtitle" style="font-size:32px;"><span class="vc_inverted">Vencorp</span> Theme</p>                
        </div>
            
        <div class="banner-image image-1" style="height:335px; top:190px; background:url(img/parallax-img/imac-center.png) no-repeat top center;">
        </div>        
        <div class="banner container" style="position:relative;"   data-stellar-offset-parent="true"   data-stellar-horizontal-offset="0"  data-stellar-vertical-offset="0">            
				<div class="banner-icon icon-xl icon-1" data-stellar-ratio="1.5">
                    <span class="icon"><i class="fa fa-rocket"></i></span>
                </div>
                <div class="banner-icon icon-lg icon-2"  data-stellar-ratio="1.8">
                    <span class="icon"><i class="fa fa-bar-chart-o"></i></span>
                </div>
                <div class="banner-icon icon-md icon-3"  data-stellar-ratio="1.2">
                    <span class="icon"><i class="fa fa-picture-o"></i></span>
                </div>
                <div class="banner-icon icon-sm icon-4"  data-stellar-ratio="1.3">
                    <span class="icon"><i class="fa fa-comments"></i></span>
                </div>  
                
				<div class="banner-icon icon-lg icon-5" data-stellar-ratio="1.5">
                    <span class="icon"><i class="fa fa-cloud-download"></i></span>
                </div>
                <div class="banner-icon icon-lg icon-6"  data-stellar-ratio="1.8">
                    <span class="icon"><i class="fa fa-cogs"></i></span>
                </div>
                <div class="banner-icon icon-md icon-7"  data-stellar-ratio="1.2">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                </div>
                <div class="banner-icon icon-sm icon-8"  data-stellar-ratio="1.3">
                    <span class="icon"><i class=" fa fa-tasks"></i></span>
                </div>                                                    
     
        </div>        
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->

  <div class="vc_signup background-12 block">
  	<div class="wrapper">
    	<div class="container">
        	<div class="row">
                <div class="col-md-7 text-col">
                    <p class="vc_subtitle " style="margin-bottom:20px; color:#FFF; font-weight:bold;"><span class="vc_inverted">Let us set you free</span> from your pain</p>
                    <p style="color:#CCC;" >Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore explicabo. </p>

                </div>
                <div class="col-md-4 newsletter-col">
                	<div class="vc_top-newsletter">
                        <div class="vc_newsletter-form">
                            <h3 style="font-size:30px;"> Newsletter </h3>
                            <div id="vc_newsletter-form-success" class="alert alert-success hidden"> <strong> Success! </strong> You've been added to our email list. </div>
                            <div id="vc_newsletter-form-error" class="alert alert-error hidden"> </div>
                            <div class="info">                
                                <p> Subscribe to our awesome up-to-date products and news.</p>
                            
                                <form  id="newsletter" method="POST" action="functions/newsletter-subscribe.php" class="form-inline">
                                  <div class="control-group row">
                                    <div class="col-xs-7 form-input" >
                                        <input type="email" id="email" name="email" placeholder="Email Address" required  />
                                    </div>
                                    <div class="col-xs-5 form-btn">
                                        <button type="submit" class="vc_btn"> Go ! </button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
  </div>

  <div class="vc_splitter"  ></div>

  <div class="vc_features-block slide-waypoint"  id="one-page-features"   style="border-bottom:none;"  data-waypoint="features">

  	<div class="wrapper">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 first-row-col-1">
                <p class="vc_subtitle"><span class="vc_inverted"> We simply </span>the best ...</p>
                <p class="vc_softtitle block">Ut sit amet dignissim libero. Integer scelerisque...</p>
                <div class="image-preview">
                    <div class="row">
                        <div class="col-md-5 text-center">
                              <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto" href="blog-single.php" class="vc_preview"> <img alt="example image" src="img/home-alt/01.jpg"  /> </a>
                                <div class="vc_hover">
                                  <div class="hover-wrapper">
                                    <div class="icon-wrapper">
                                      <ul>
                                        <li class="vc_icon"> <a data-rel="prettyPhoto"  href="img/home-alt/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>                    
                        </div>
                        <div class="col-md-5 col-md-offset-1 text-center">
                              <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto" href="blog-single.php" class="vc_preview"> <img alt="example image" src="img/home-alt/02.jpg"  /> </a>
                                <div class="vc_hover">
                                  <div class="hover-wrapper">
                                    <div class="icon-wrapper">
                                      <ul>
                                        <li class="vc_icon"> <a data-rel="prettyPhoto"  href="img/home-alt/02.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>                       
                        </div>                    
                    </div>
                </div>

                </div><!-- col-md-8 --> 
                <div class="col-md-4 first-row-col-2">
                	<br/>
                	<p class="vc_list-title"><i class="fa fa-check-circle  vc_main-color"></i> Want to <strong>Know Why?</strong></p>
                	<p class="vc_list-desc">Ut sit amet dignissim libero. Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero.</p> 
                	<p class="vc_list-title"><i class="fa fa-check-circle  vc_main-color"></i> Our Humble <strong>Features</strong></p>
                	<p class="vc_list-desc">Ut sit amet dignissim libero. Integer scelerisque, eros  a adipiscing arcu sapien eu nisi.</p>
                    <p class="vc_list-title"><i class="fa fa-check-circle  vc_main-color"></i> This is the <strong>Strong Point</strong></p>
                	<p class="vc_list-desc">Ut sit amet dignissim libero. Integer scelerisque,  arcu sapien eu nisi.</p>                    
                </div>  <!-- col-md-4 -->           
            </div>
            <div class="vc_line-splitter"></div>
            <div class="vc_splitter"></div>
            <div class="vc_splitter"></div>
        	<div class="row">
            	<div class="col-md-5 second-row-col-1">
                <p class="vc_subtitle" style="margin-top:20px;"><span class="vc_inverted">True </span>Experience</p>
                <p class="vc_softtitle">Ut sit amet dignissim libero. Integer scelerisque...<br/><br/></p>
				<p style="margin-bottom:20px;">Ut sit amet dignissim libero. Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero, a adipiscing arcu sapien eu nisi.  </p> 
                <p><a class="vc_btn" href="http://themeforest.net/item/elegant-responsive-html5-w-animated-metro-slider/5440458?ref=venmond">Work With Us</a></p>
                    
                </div><!-- col-md-8 --> 
                <div class="col-md-6 col-md-offset-1 text-center  second-row-col-2">
                	<img alt="example image" src="img/home-alt/03.png">
                </div>  <!-- col-md-4 -->           
            </div>            
            <!-- row --> 
          </div>
          <!-- container --> 
        </div>
        <!-- wrapper --> 
      </div>
      <!-- vc_features-->
      
  <div class="vc_features block">
    <div class="wrapper"  data-stellar-background-ratio="0.5" data-stellar-offset-vertical="-200">
      <div class="container">
        <h2 style="color:#FFF;"> Robust <span class="vc_main-color"> Features </span> </h2>
        <div class="row">
          <div class="col-md-12 text-center">
			 <p style="color:#FFF; font-size:24px;"><strong>"With just changing variables.</strong> <span style="color:#EEE">Vencorp Does all the things.</span>"</p>
             <a class="vc_btn" href="http://themeforest.net/item/elegant-responsive-html5-w-animated-metro-slider/5440458?ref=venmond">Order Vencorp Now</a>
          </div>
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_features-->  
  <div class="vc_pricing-tables block slide-waypoint" data-waypoint="offers" id="one-page-offers">
    <div class="wrapper">
      <div class="container">
        <h2 class="text-center block"><span class="vc_ornament vc_mr-10"></span>Our  <span class="vc_main-color"> Offers</span><span class="vc_ornament vc_ml-10"></span></h2>      
        <section>
          <div class="row block">
            <div class="vc_pricing-table">
              <div class="col-md-3">
                <div class="plan">
                  <h3>Basic Plan</h3>
                  <div class="price"> <span class="main">$9</span> <span class="suffix">99</span> <span class="text">Per Month</span> </div>
                  <div class="features">
                    <ul>
                      <li><b>10GB</b> Disk Space</li>
                      <li><b>100GB</b> Monthly Bandwidth</li>
                      <li><b>20</b> Email Accounts</li>
                      <li><b>Unlimited</b> subdomains</li>
                    </ul>
                    <a href="#" class="vc_btn btn-large">Get Started</a> </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="plan featured">
                  <div class="tag"> <span class="text"> Best Seller </span> </div>
                  <h3> Moderate Plan </h3>
                  <div class="price"> <span class="main">$25</span> <span class="suffix">99</span> <span class="text">Per Month</span> </div>
                  <div class="features">
                    <ul>
                      <li><b>10GB</b> Disk Space</li>
                      <li><b>100GB</b> Monthly Bandwidth</li>
                      <li><b>20</b> Email Accounts</li>
                      <li><b>Unlimited</b> subdomains</li>
                    </ul>
                    <a href="#" class="vc_btn btn-large">Get Started</a> </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="plan">
                  <h3>Business Plan</h3>
                  <div class="price"> <span class="main">$74</span> <span class="suffix">99</span> <span class="text">Per Month</span> </div>
                  <div class="features">
                    <ul>
                      <li><b>10GB</b> Disk Space</li>
                      <li><b>100GB</b> Monthly Bandwidth</li>
                      <li><b>20</b> Email Accounts</li>
                      <li><b>Unlimited</b> subdomains</li>
                    </ul>
                    <a href="#" class="vc_btn btn-large">Get Started</a> </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="plan">
                  <h3>Corporate Plan</h3>
                  <div class="price"> <span class="main">$199</span> <span class="suffix">99</span> <span class="text">Per Month</span> </div>
                  <div class="features">
                    <ul>
                      <li><b>10GB</b> Disk Space</li>
                      <li><b>100GB</b> Monthly Bandwidth</li>
                      <li><b>20</b> Email Accounts</li>
                      <li><b>Unlimited</b> subdomains</li>
                    </ul>
                    <a href="#" class="vc_btn btn-large">Get Started</a> </div>
                </div>
              </div>
            </div>
          </div>
        </section>

    </div>
    </div>
    </div>

<div class="vc_portfolio slide-waypoint block" data-waypoint="portfolio">
    <div class="wrapper">
      <div class="container">       
      	<h2 class="text-center" style="margin-bottom:40px;"><span class="vc_ornament vc_mr-10"></span>Our <span class="vc_main-color">Portfolio</span><span class="vc_ornament vc_ml-10"></span></h2>
        <div class="text-center" style="width:450px; margin-left:auto; margin-right:auto;">  
        <ul id="portfolio-filter" class="nav nav-pills">
          <li class="active"><a href="#" data-filter="*">All</a></li>
          <li><a href="#" data-filter=".p-icons">Icons</a></li>
          <li><a href="#" data-filter=".p-illustration">Illustration</a></li>
          <li><a href="#" data-filter=".p-web">Web Design</a></li>
          <li><a href="#" data-filter=".p-logo">Logo</a></li>
        </ul>
        </div>
        <div id="portfolio" class="vc_portfolio-page portfolio-3 row clearfix">
          <div class="portfolio-item p-icons col-md-4">
            <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Link Only Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-music"></i> </div>
            </div>
          </div>
          <div class="portfolio-item p-web  col-md-4">
            <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/03.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Youtube Video Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v=ASO_zypdnsQ" > <i class="fa fa-play-circle"> </i> </a> </li>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-video-camera"></i> </div>
            </div>
          </div>
          <div class="portfolio-item p-illustration p-logo col-md-4">
            <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Single Image Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a data-rel="prettyPhoto" href="img/portfolio/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-picture-o"></i> </div>
            </div>
          </div>
          <div class="portfolio-item p-web p-logo col-md-4">
            <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/03.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Vimeo Video Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a data-rel="prettyPhoto" href="http://vimeo.com/7874398&amp;width=700" > <i class="fa fa-play-circle"> </i> </a> </li>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-video-camera"></i> </div>
            </div>
          </div>          
          <div class="portfolio-item p-icons p-logo col-md-4">
            <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Image Gallery Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a  data-rel="prettyPhoto[portfolio-1]" href="img/portfolio/02.jpg" > <i class="fa fa-search-plus"> </i> </a> <a class="hidden" data-rel="prettyPhoto[portfolio-1]" href="img/portfolio/01.jpg" ></a> <a class="hidden" data-rel="prettyPhoto[portfolio-1]" href="img/portfolio/03.jpg" ></a> </li>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-film"></i> </div>
            </div>
          </div>
          <div class="portfolio-item p-illustration col-md-4">
            <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Single Image Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a data-rel="prettyPhoto" href="img/portfolio/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-picture-o"></i> </div>
            </div>
          </div>          



        </div>
        <!-- .row --> 
      </div>
      <!-- .container --> 
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_portfolio --> 
  <div class="vc_splitter"></div>
  <div class="vc_client slide-waypoint block" data-waypoint="clients">
    <div class="wrapper">
      <div class="container">
        <h4> Our Client </h4>
        <p class="subtitle"> Our Most Precious Clients </p>
        <div class="vc_splitter"> <span class="bg"> </span> </div>
        <div class="vc_carousel-wrap">
          <div class="vc_carousel clearfix">
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/01.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/02.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/03.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/04.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/05.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/06.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/07.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/01.png" /> </a> </div>
            <div class="vc_carousel-column"> <a href="#" class="content"> <img alt="example image" src="img/client-logo/02.png" /> </a> </div>
          </div>
          <div class="clearfix"> </div>
          <div class="vc_pager clearfix" id="vc_client-pager"> </div>
        </div>
        <!-- .vc_carousel-wrap --> 
      </div>
      <!-- .container -->
      <div class="clearfix"> </div>
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_client -->           
    <div class="vc_testimonial-block background-12 slide-waypoint" data-waypoint="testimonial">
        <div class="wrapper">
            <div class="container">
                <div class="row">
					<h2 class="block-title text-center"><span class="vc_ornament vc_mr-10"></span>Client <span class="vc_main-color">Testimonial</span><span class="vc_ornament vc_ml-10"></span></h2>                
                    <div class="col-sm-7 text-center text-1" >
                    	<h1 style="color:#FFF; margin-top:70px;">"Over 10,000 Happy Customers"</h1>
                        <p class="vc_grey" style="font-size:30px; letter-spacing:-.5px;">Satisfied with our Products</p>
                    </div>  <!-- col-sm-6 -->           
                    <div class="col-sm-5 text-2" >
                    	<?php include('templates/widgets/widget-testimonial-slide.tpl.php'); ?>
                    </div>  <!-- col-sm-6 -->           
                    
                </div>            
                <!-- row --> 
            </div>
            <!-- container --> 
        </div>
        <!-- wrapper --> 
    </div>
    <!-- vc_features-->

  <div class="vc_map slide-waypoint block" data-waypoint="contact" style="margin-top:0; border-top:4px solid #CCCCCC;">
    <div class="wrapper">
      <div id="map" class="map"> </div>
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_map -->
  
  <div class="vc_contact-us block">
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-1">

            <h2>Send Us an <span class="vc_main-color">Email</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidtation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidtation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidtation ullamco.</p>
            <div id="contact-form-result">
              <div id="success" class="alert alert-success hidden">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.</div>
              <div id="error" class="alert alert-danger hidden">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>
              <div id="empty" class="alert alert-danger hidden">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Please <strong>Fill up</strong> all the Fields and Try Again.</div>
              <div id="unexpected" class="alert alert-danger hidden">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                An <strong>unexpected error</strong> occured. Please Try Again later.</div>
            </div>
            <form id="contact-form" name="contact-form" action="functions/contact.php" method="post">
              <input type="hidden" value="info@venmond.com" name="admin-email" id="admin-email">
              <input type="hidden" value="Venmond, Inc." name="admin-name" id="admin-name">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="contact-form-name">Name<span class="vc_red">*</span></label>
                    <div class="controls">
                      <input type="text" placeholder="" id="contact-form-name" name="contact-form-name" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="contact-form-email">Email<span class="vc_red">*</span></label>
                    <div class="controls">
                      <input type="email" placeholder="" id="contact-form-email" name="contact-form-email" required >
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="contact-form-service">Service</label>
                    <div class="controls">
                      <select id="contact-form-service" name="contact-form-service">
                        <option>Web Design</option>
                        <option>Logo Design</option>
                        <option>Marketing</option>
                        <option>Illustration</option>
                        <option>Others</option>
                      </select>
                    </div>
                  </div>
                </div> <!-- col-md-4 -->
              </div> <!-- row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  	<label  for="contact-form-subject">Subject<span class="vc_red">*</span></label>                    
                    <div class="controls">
                      <input type="text" placeholder="" id="contact-form-subject" name="contact-form-subject" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  	<label for="contact-form-message">Message<span class="vc_red">*</span></label>                   
                    <div class="controls">
                      <textarea  rows="10" cols="58" id="contact-form-message" name="contact-form-message" required ></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="vc_btn" type="submit" id="contact-form-submit" name="contact-form-submit" value="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
          <!-- .col-md-8 -->
          <div class="col-md-4 sidebar text-2">
            <div id="vc_contact-widget" class="sidebar-widget block">
              <div class="content">
                <div class="contact-info">
                  <h4  class="vc_bg-blue"><i class="icon-map-marker"></i> Our Headquarters</h4>
                  <div class="content">
                    <ul class="vc_li">
                      <li>Map Address 90210<br>
                        Los Angeles <br>
                        California 97845<br>
                        United States</li>
                    </ul>
                  </div>
                </div>
                <div class="contact-info">
                  <h4 class="vc_bg-orange"><i class="icon-phone"></i> Call us</h4>
                  <div class="content">
                    <ul class="vc_li">
                      <li>Toll Free: 1800-135-4656</li>
                      <li>Fax: 1800-123-4567</li>
                    </ul>
                  </div>
                </div>
                <div class="contact-info">
                  <h4  class="vc_bg-green"><i class="fa fa-envelope-alt"></i> Email Addresses</h4>
                  <div class="content">
                    <ul class="vc_li">
                      <li>sales@vencorp.com</li>
                      <li>support@vencorp.com</li>
                    </ul>
                  </div>
                </div>
                <div class="contact-info">
                  <h4 class="vc_bg-red"><i class="icon-time"></i> Business Hour</h4>
                  <div class="content">
                    <ul class="vc_li">
                      <li>Monday - Friday 9am to 5pm </li>
                      <li>Saturday - 9am to 2pm</li>
                      <li>Sunday - Closed</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- .col-md-4 -->           
        </div>
        <!-- .row -->         
      </div>
      <!-- .container -->        
    </div>
    <!-- .wrapper -->    
  </div>
  <!-- .vc_contact-us --> 
</div>

<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="js/jquery.stellar.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/specific/one-page-parallax.js"></script>
<script type="text/javascript" src="js/specific/portfolio.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="js/jquery.gmap.min.js"></script>
<script type="text/javascript"  src="js/specific/map-large.js"></script> 
<script type="text/javascript" src="js/specific/contact.js"></script> 


<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>