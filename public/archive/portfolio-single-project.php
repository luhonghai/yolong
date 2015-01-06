<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Single Project Portfolio - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'portfolios';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Portfolio</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="portfolio-2-columns.php">Portfolio</a> </li>
          <li class="active">Single Project</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_single-project block">
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-7 project-image">
            <div id="vc_single-portfolio" class="vc_single-portfolio">
              <div class="vc_carousel-control clearfix"> <a href="#"> <i class="fa fa-chevron-left"> </i> </a> <a href="#"> <i class="fa fa-chevron-right"> </i> </a> </div>
              <div class="vc_carousel-wrap">
                <div class="vc_carousel clearfix">
                  <div class="vc_carousel-column">
                    <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio]"   href="img/portfolio/01-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/01-big.jpg" /> </a> </div>
                  </div>
                  <div class="vc_carousel-column">
                    <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio]"  href="img/portfolio/02-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/02-big.jpg" /> </a> </div>
                  </div>
                  <div class="vc_carousel-column">
                    <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio]"  href="img/portfolio/03-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/03-big.jpg" /> </a> </div>
                  </div>
                  <div class="vc_carousel-column">
                    <div class="vc_anim vc_anim-slide"> <a data-rel="prettyPhoto[portfolio]"  href="img/portfolio/04-big.jpg" class="vc_preview"> <img alt="example image" src="img/portfolio/04-big.jpg" /> </a> </div>
                  </div>
                </div>
                <!--vc_carousel --> 
              </div>
              <!-- vc_carousel-wrap -->
              <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="vc_share-post">
              <div class="text">
                <h4 class="vc_main-color"><i class="fa fa-share"></i></h4>
              </div>
              <div class="widget"> 
                <!-- AddThis Button BEGIN -->
                <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-51f5ff9515d6d31e"><img alt="example image" src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" style="border:0"/></a>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51f5ff9515d6d31e"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
          </div>
          <!-- col-md-7 -->
          <div class="col-md-5 project-details">
            <h2>Great Project Name</h2>
            <div class="vc_splitter"></div>
            <div class="tabs">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home-tab">Description</a></li>
                <li><a data-toggle="tab" href="#list-tab">Detail</a></li>
              </ul>
              <div class="tab-content">
                <div id="home-tab" class="tab-pane active">
                  <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                </div>
                <div id="list-tab" class="tab-pane">
                  <div class="form-horizontal clearfix">
                    <div class="control-group">
                      <div class="control-label">Date Published</div>
                      <div class="controls"> <span class="help-inline">February, 12th 2013</span> </div>
                    </div>
                    <div class="control-group">
                      <div class="control-label">Category</div>
                      <div class="controls"> <span class="help-inline"><a href="#">Wordpress</a>, <a href="#">Web Design</a></span> </div>
                    </div>
                    <div class="control-group">
                      <div class="control-label">Client</div>
                      <div class="controls"> <span class="help-inline">John Doe</span> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_splitter"></div>
            <a class="vc_btn" href="#">View Project <i style="margin-left:10px; margin-right:0;" class="fa fa-chevron-circle-right"></i></a> </div>
          
          <!-- col-md-5 --> 
          
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_single-portfolio -->
  <div class="container block">
    <div class="vc_separator"></div>
  </div>
  <div class="vc_related-project block">
    <div class="wrapper">
      <div class="container">
        <h2 class="pull-left"> Related <span class="vc_main-color"> Projects </span> </h2>
        <div class="vc_carousel-control clearfix"> <a href="#"> <i class="fa fa-chevron-left"> </i> </a> <a href="#"> <i class="fa fa-chevron-right"> </i> </a> </div>
        <div class="vc_splitter"> <span class="bg"> </span> </div>
        <div class="vc_carousel-wrap">
          <div class="vc_carousel clearfix">
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> My Best Portfolio </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a data-rel="prettyPhoto[related]" href="img/portfolio/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> My Best Portfolio </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/02.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/03.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> My Best Portfolio </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a data-rel="prettyPhoto[related]" href="img/portfolio/03.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/04.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> Great O High </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/04.jpg"  > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> My Best Portfolio </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a data-rel="prettyPhoto[related]" href="img/portfolio/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> My Best Portfolio </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/02.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/03.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> My Best Portfolio </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a data-rel="prettyPhoto[related]" href="img/portfolio/03.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_carousel-column">
              <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/04.jpg" /> </a>
                <div class="vc_hover">
                  <div class="hover-wrapper">
                    <div class="text-wrapper">
                      <h4> Great O High </h4>
                    </div>
                    <div class="icon-wrapper">
                      <ul>
                        <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/04.jpg"  > <i class="fa fa-search-plus"> </i> </a> </li>
                        <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- vc_carousel --> 
        </div>
        <!-- vc_carousel-wrap --> 
      </div>
      <!-- .container -->
      <div class="clearfix"> </div>
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_related-project -->  
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="js/specific/portfolio.js"></script>



<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>