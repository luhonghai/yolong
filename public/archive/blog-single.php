<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Single Blog - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'blog';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Blog</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="blog-list-mini.php">Blogs</a> </li>
          <li class="active">Single Blog</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_single-blog block">
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-9 single-blog">
            <div class="vc_blog-list">
              <div class="header">
                <div class="entry-date">
                  <div class="day">28</div>
                  <div class="month">Aug</div>
                </div>
                <div class="title">
                  <h3> <a href="blog-single.php"> Starting a new business </a> </h3>
                  <span class="year info"><i class="glyphicon glyphicon-calendar"></i> 2012</span><span class="user info"> <i class="fa fa-user"> </i> <a href="#"> Admin</a> </span> <span class="comments info"> <i class="fa fa-comments"> </i> <a href="#comment-title">16</a> </span> <span class="taxonomy info"> <i class="fa fa-tags"> </i> <a href="#"> Design </a>, <a href="#"> Creative </a> </span> </div>
              </div>
              <div class="clearfix"></div>
              <article class="blog-row clearfix">
                <div class="blog-left">
                  <div class="vc_anim vc_anim-slide"> <a href="img/blog/big.jpg" class="vc_preview"> <img alt="example image" src="img/blog/big.jpg"  /> </a>
                    <div class="vc_hover">
                      <div class="hover-wrapper">
                        <div class="icon-wrapper">
                          <ul>
                            <li class="vc_icon"> <a data-rel="prettyPhoto" href="img/blog/big.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-right clearfix">
                  <div class="description">
                    <p> Sed iaculis viverra enim, accumsan rutrum mauris semper et. Quisque sagittis rhoncus pulvinar. Nunc luctus orci at lacus tristique, in auctor nunc laoreet. Pellentesque dapibus dapibus metus vitae consequat. Vestibulum dictum sapien et augue hendrerit interdum. Aenean quis neque eget lorem tincidunt rutrum. Aliquam vestibulum purus ac dictum viverra. Curabitur sit amet tempor libero, sit amet sollicitudin quam.<br/>
                      <br/>
                      Sed feugiat purus libero, at varius sapien sollicitudin ac. Fusce ut gravida nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus pellentesque ipsum et nunc lacinia tristique. Aliquam non vehicula erat. Fusce at eleifend velit. Ut sit amet lacinia tortor. In eget mollis libero, id adipiscing ipsum. Donec eu consectetur velit, et tristique nunc.<br/>
                      <br/>
                      <a href="#">Aliquam eget sem</a> et nisl aliquam gravida quis et augue. Ut eu purus eget enim fringilla consequat. Maecenas eget arcu non turpis lacinia euismod in id velit. Mauris vitae venenatis felis. Etiam commodo rutrum orci a bibendum. Nulla facilisi. Vestibulum id molestie dui, vitae ultricies enim. Fusce feugiat pharetra leo et varius. Suspendisse id scelerisque arcu. Aenean sollicitudin et erat et pulvinar. Nam egestas sit amet enim quis rutrum.Suspendisse aliquet <a href="#">neque nec diam dapibus</a> cursus sed sed elit. Nulla facilisi. Mauris aliquam tellus eu dictum blandit. Praesent nec condimentum nunc. Quisque id mauris sed ipsum volutpat mollis tempus nec nunc. Maecenas lorem enim, feugiat nec consectetur ac, porttitor molestie ipsum. Sed non arcu arcu. Nunc ut lacus non eros viverra suscipit.</p>
                    <blockquote>Pellentesque tempor tellus eget pellentesque. usce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus. Fusce lacinia tempor malesuada. </blockquote>
                    <p> Morbi aliquet aliquam tellus eu fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras vitae ligula auctor, dictum sapien vel, luctus nisl. Maecenas imperdiet neque nisl. Suspendisse metus risus, interdum et imperdiet non, placerat vitae magna. Cras et blandit erat. Curabitur quis venenatis risus. Vestibulum dapibus odio at arcu tempus, ut pretium lectus feugiat. Morbi et risus metus. Nullam vitae turpis vitae libero dictum dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean purus enim, ultrices at fermentum vitae, fermentum non ipsum. Proin ac lorem nunc. Suspendisse vel faucibus purus, sed varius nulla. <br/>
                      <br/>
                    </p>
                  </div>
                </div>
              </article>
              <div class="vc_share-post">
              <div class="text">
                <h4 class="vc_main-color"><i class="icon-share-alt"></i></h4>
              </div>
              <div class="widget"> 
                <!-- AddThis Button BEGIN -->
                <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-51f5ff9515d6d31e"><img alt="example image" src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" style="border:0"/></a>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51f5ff9515d6d31e"></script>
                <!-- AddThis Button END -->
              </div>
              </div>
              <div class="vc_separator comment-separator"></div>
              <div class="vc_related-project block">
                <div class="wrapper">
                  <h3 class="pull-left"> Related <span class="vc_main-color"> Posts </span> </h3>
                  <div class="vc_carousel-control clearfix"> <a href="#"> <i class="fa fa-chevron-left"> </i> </a> <a href="#"> <i class="fa fa-chevron-right"> </i> </a> </div>
                  <div class="vc_splitter"> <span class="bg"> </span> </div>
                  <div class="vc_carousel-wrap">
                    <div class="vc_carousel clearfix">
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>                                
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Starting A New Business 2</a></p>
                        </div>
                      </div>
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/02.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Some Other Title</a></p>
                        </div>                        
                      </div>
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/03.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a data-rel="prettyPhoto[related]" href="img/portfolio/03.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Wrap Your Design Sense</a></p>
                        </div>                        
                      </div>
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/04.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/04.jpg"  > <i class="fa fa-search-plus"> </i> </a> </li>
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Talk Nature</a></p>
                        </div>                        
                      </div> <!-- .vc_carousel-column -->
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a  href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/01.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/01.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>                                
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Starting A New Business 2</a></p>
                        </div>
                      </div>
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/02.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/02.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Some Other Title</a></p>
                        </div>                        
                      </div>
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/03.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a data-rel="prettyPhoto[related]" href="img/portfolio/03.jpg" > <i class="fa fa-search-plus"> </i> </a> </li>
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Wrap Your Design Sense</a></p>
                        </div>                        
                      </div>
                      <div class="vc_carousel-column">
                        <div class="vc_anim vc_anim-slide"> <a href="portfolio-single-project.php" class="vc_preview"> <img alt="example image" src="img/portfolio/04.jpg" /> </a>
                          <div class="vc_hover">
                            <div class="hover-wrapper">
                              <div class="icon-wrapper">
                                <ul>
                                  <li class="vc_icon"> <a  data-rel="prettyPhoto[related]" href="img/portfolio/04.jpg"  > <i class="fa fa-search-plus"> </i> </a> </li>
                                  <li class="vc_icon"> <a  href="portfolio-single-project.php" > <i class="fa fa-link"> </i> </a> </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="title">
                        	<p><a href="#">Talk Nature</a></p>
                        </div>                        
                      </div> <!-- .vc_carousel-column -->                      
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div>
              </div>
              <div class="vc_separator comment-separator"></div>
            </div>
            <div class="vc_comments clearfix" id="comments">
              <h3 class="comments-title">Comments</h3>
              <ul class="commentlist clearfix">
                <li id="li-comment-1" class="comment">
                  <div class="comment-wrap clearfix" id="comment-1">
                    <div class="comment-meta">
                      <div class="comment-author"> <img alt="example image"  src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" > </div>
                    </div>
                    <div class="comment-content clearfix">
                      <div class="comment-author">John Doe</div>
                      <div class="comment-date"><a title="Permalink to this comment" href="#">April 24, 2012 at 10:46 am</a> </div>
                      <div class="comment-reply"><a href="#" class="vc_btn btn-small"><i class="fa fa-reply"></i>Reply</a></div>
                      <div class="comment-arrow"></div>
                      <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <ul>
                    <li id="li-comment-2" class="comment">
                      <div class="comment-wrap clearfix" id="comment-2">
                        <div class="comment-meta">
                          <div class="comment-author"> <img alt="example image"  src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" > </div>
                        </div>
                        <div class="comment-content clearfix">
                          <div class="comment-author">John Doe</div>
                          <div class="comment-date"><a title="Permalink to this comment" href="#">April 24, 2012 at 10:46 am</a> </div>
                          <div class="comment-reply"><a href="#" class="vc_btn btn-small"><i class="fa fa-reply"></i>Reply</a></div>
                          <div class="comment-arrow"></div>
                          <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="clear"></div>
                      </div>
                    </li>
                    <li id="li-comment-3" class="comment">
                      <div class="comment-wrap clearfix" id="comment-3">
                        <div class="comment-meta">
                          <div class="comment-author"> <img alt="example image"  src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" > </div>
                        </div>
                        <div class="comment-content clearfix">
                          <div class="comment-author">John Doe</div>
                          <div class="comment-date"><a title="Permalink to this comment" href="#">April 24, 2012 at 10:46 am</a> </div>
                          <div class="comment-reply"><a href="#" class="vc_btn btn-small"><i class="fa fa-reply"></i>Reply</a></div>
                          <div class="comment-arrow"></div>
                          <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <ul>
                        <li id="li-comment-4" class="comment">
                          <div class="comment-wrap clearfix" id="comment-4">
                            <div class="comment-meta">
                              <div class="comment-author"> <img alt="example image"  src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" > </div>
                            </div>
                            <div class="comment-content clearfix">
                              <div class="comment-author">John Doe</div>
                              <div class="comment-date"><a title="Permalink to this comment" href="#">April 24, 2012 at 10:46 am</a> </div>
                              <div class="comment-reply"><a href="#" class="vc_btn btn-small"><i class="fa fa-reply"></i>Reply</a></div>
                              <div class="comment-arrow"></div>
                              <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                            </div>
                            <div class="clear"></div>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li id="li-comment-5" class="comment">
                  <div class="comment-wrap clearfix" id="comment-5">
                    <div class="comment-meta">
                      <div class="comment-author"> <img alt="example image"  src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" > </div>
                    </div>
                    <div class="comment-content clearfix">
                      <div class="comment-author">John Doe</div>
                      <div class="comment-date"><a title="Permalink to this comment" href="#">April 24, 2012 at 10:46 am</a> </div>
                      <div class="comment-reply"><a href="#" class="vc_btn btn-small"><i class="fa fa-reply"></i>Reply</a></div>
                      <div class="comment-arrow"></div>
                      <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                    </div>
                    <div class="clear"></div>
                  </div>
                </li>
              </ul>
              <div class="clear"></div>
              <div class="vc_separator comment-separator"></div>
              <div class="clearfix" id="respond">
                <h3>Leave a <span>Comment</span></h3>
                <form id="commentform" method="post" action="#" class="clearfix">
				<div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="author">Name <span class="vc_red">*</span></label>
                        <div class="controls">
                          <input type="text" tabindex="1" size="22" value="" id="author" name="author">
                        </div>
                      </div>
                    </div> 
                </div>
				<div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="author-email">Email <span class="vc_red">*</span> <small>(will not be published)</small></label>
                        <div class="controls">
                          <input type="text" tabindex="2" size="22" value="" id="author-email" name="author-email">
                        </div>
                      </div>
                    </div> 
                </div>  
				<div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="url">Website</label>
                        <div class="controls">
                          <input type="text" tabindex="3" size="22" value="" id="url" name="url">
                        </div>
                      </div>
                    </div> 
                </div>
				<div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                    	<label for="comment">Comment</label>
                        <div class="controls">
							<textarea  tabindex="4" rows="10" cols="58" name="comment" id="comment"></textarea>
                        </div>
                      </div>
                    </div> 
                </div> 
				<div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                    	<button class="vc_btn" value="Submit" tabindex="5" id="submit-button" type="submit" name="submit">Submit Comment</button>
                      </div>
                    </div> 
                </div>                                                                                  
                </form>
              </div>
            </div>
          </div>
          <!-- col-md-9 -->
          <div class="col-md-3 sidebar">
				<?php include('templates/sidebars/sidebar-mini.tpl.php'); ?>	          	 
          </div>
          <!-- .sidebar .col-md-3--> 
        </div>
        <!-- row--> 
      </div>
      <!-- container --> 
    </div>
    <!-- wrapper --> 
  </div>
  <!-- block -->
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->




<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>