<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = '4 Columns Portfolio - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'portfolios';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>4 Columns</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="portfolio-2-columns.php">Portfolio</a> </li>
          <li class="active">4 Columns</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_portfolio block">
    <div class="wrapper">
      <div class="container"> 
        <ul id="portfolio-filter" class="nav nav-pills">
          <li class="active"><a href="#" data-filter="*">All</a></li>
          <li><a href="#" data-filter=".p-icons">Icons</a></li>
          <li><a href="#" data-filter=".p-illustration">Illustration</a></li>
          <li><a href="#" data-filter=".p-web">Web Design</a></li>
          <li><a href="#" data-filter=".p-logo">Logo</a></li>
        </ul>
        <div id="portfolio" class="vc_portfolio-page portfolio-4 row clearfix">
          <div class="portfolio-item p-icons col-md-3">
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
          <div class="portfolio-item p-web  col-md-3">
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
          <div class="portfolio-item p-illustration p-logo col-md-3">
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
          <div class="portfolio-item p-icons p-logo col-md-3">
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
          <div class="portfolio-item p-web p-logo col-md-3">
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
          <div class="portfolio-item p-illustration col-md-3">
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
          <div class="portfolio-item p-icons p-logo col-md-3">
            <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> Image Gallery Example </h4>
                  </div>
                  <div class="icon-wrapper">
                    <ul>
                      <li class="vc_icon"> <a  data-rel="prettyPhoto[portfolio-3]" href="img/portfolio/02.jpg" > <i class="fa fa-search-plus"> </i> </a> <a class="hidden" data-rel="prettyPhoto[portfolio-3]" href="img/portfolio/01.jpg" ></a> <a class="hidden" data-rel="prettyPhoto[portfolio-3]" href="img/portfolio/03.jpg" ></a> </li>
                      <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="vc_category"> <i class="fa fa-film"></i> </div>
            </div>
          </div>
          <div class="portfolio-item p-web col-md-3">
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
          <div class="portfolio-item p-illustration col-md-3">
            <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
              <div class="vc_hover">
                <div class="hover-wrapper">
                  <div class="text-wrapper">
                    <h4> My Best Portfolio </h4>
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
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="js/specific/portfolio.js"></script>



<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>