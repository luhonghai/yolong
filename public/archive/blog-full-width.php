<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Full Width List Blog - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'blog';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Full Width <span class="vc_main-color">Blog</span></h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="blog-list-mini.php">Blogs</a> </li>
          <li class="active">Full Width</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_blog-full-width block">
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12 large-image full-width">
            <div class="vc_blog-list">
              <h2> Latest <span class="vc_main-color"> Blogs </span> </h2>
              <div class="vc_splitter"> <span class="bg"> </span> </div>
              <article class="blog-row clearfix">
                <div class="blog-left">
                  <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/blog/01-large.jpg"  /> </a>
                    <div class="vc_hover">
                      <div class="hover-wrapper">
                        <div class="icon-wrapper">
                          <ul>
                            <li class="vc_icon"> <a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v=ASO_zypdnsQ" > <i class="icon-play-sign"> </i> </a> </li>
                            <li class="vc_icon"> <a  href="blog-single.php" > <i class="fa fa-link"> </i> </a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-right clearfix">
                  <div class="entry-date">
                    <div class="day">28</div>
                    <div class="month">Aug</div>
                  </div>
                  <div class="title">
                    <h3> <a href="blog-single.php"> Starting a new business </a> </h3>
                    <span class="comments"> <i class="icon-comments"> </i> 16 </span> <span class="taxonomy"> <i class="icon-tags"> </i> <a href="#"> Design </a>, <a href="#"> Creative </a> </span> </div>
                  <div class="description">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidtation ullamco laboris nisi ut aliquip ex, sed do eiusmod tempor incidtation ullamco laboris nisi ut aliquip ex... <a href="blog-single.php" class="vc_read-more"> read more </a> </p>
                  </div>
                </div>
              </article>
              <article class="blog-row clearfix">
                <div class="blog-left">
                  <div class="vc_anim vc_anim-slide"> <a href="blog-single.php" class="vc_preview"> <img alt="example image" src="img/blog/02-large.jpg"  /> </a>
                    <div class="vc_hover">
                      <div class="hover-wrapper">
                        <div class="icon-wrapper">
                          <ul>
                            <li class="vc_icon"> <a data-rel="prettyPhoto" href="img/blog/02.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                            <li class="vc_icon"> <a  href="blog-single.php" > <i class="fa fa-link"> </i> </a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-right clearfix">
                  <div class="entry-date">
                    <div class="day">01</div>
                    <div class="month">May</div>
                  </div>
                  <div class="title">
                    <h3> <a href="#"> Building Up Your Portfolio </a> </h3>
                    <span class="comments"> <i class="icon-comments"> </i> 16 </span> <span class="taxonomy"> <i class="icon-tags"> </i> <a href="#"> Design </a>, <a href="#"> Creative </a> </span> </div>
                  <div class="description">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidtation ullamcosed do eiusmod tempor incidtation ullamco laboris nisi ut aliquip ex... <a href="blog-single.php" class="vc_read-more"> read more </a> </p>
                  </div>
                </div>
              </article>
              <article class="blog-row">
                <div class="blog-left">
                  <div id="vc_single-portfolio" class="vc_single-portfolio">
                    <div class="vc_carousel-control clearfix"> <a href="#"> <i class="fa fa-chevron-left"> </i> </a> <a href="#"> <i class="fa fa-chevron-right"> </i> </a> </div>
                    <div class="vc_carousel-wrap">
                      <div class="vc_carousel clearfix">
                        <div class="vc_carousel-column">
                          <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio-blog]"   href="img/portfolio/01-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/01-big.jpg" /> </a> </div>
                        </div>
                        <div class="vc_carousel-column">
                          <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio-blog]"  href="img/portfolio/02-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/02-big.jpg" /> </a> </div>
                        </div>
                        <div class="vc_carousel-column">
                          <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio-blog]"  href="img/portfolio/03-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/03-big.jpg" /> </a> </div>
                        </div>
                        <div class="vc_carousel-column">
                          <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio-blog]"  href="img/portfolio/04-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/04-big.jpg" /> </a> </div>
                        </div>
                      </div>
                      <!--vc_carousel --> 
                    </div>
                    <!-- vc_carousel-wrap -->
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="blog-right clearfix">
                  <div class="entry-date">
                    <div class="day">12</div>
                    <div class="month">Dec</div>
                  </div>
                  <div class="title">
                    <h3> <a href="blog-single.php"> Creativity in Positivity </a> </h3>
                    <span class="comments"> <i class="icon-comments"> </i> 16 </span> <span class="taxonomy"> <i class="icon-tags"> </i> <a href="#"> Design </a>, <a href="#"> Creative </a> </span> </div>
                  <div class="description">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidtation ullamco laboris nisi ut aliquip exsed do eiusmod tempor incidtation ullamco laboris nisi ut aliquip exsed do eiusmod tempor incidtation ullamco laboris nisi ut aliquip... <a href="blog-single.php" class="vc_read-more"> read more </a> </p>
                  </div>
                </div>
              </article>
              <div class="clearfix"> </div>
            </div>
            <!-- .vc_blog-list -->
            
            <div class="text-center">
              <ul class="pagination pagination-lg">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- span12 --> 
          
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- wrapper --> 
  </div>
  <!-- v.c_blog-large-image block --> 
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->




<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>