-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Gazda (Host): custsql-ipg41.eigbox.net
-- Timp de generare: Iun 09, 2014 at 05:03 PM
-- Versiune server: 5.5.32
-- Versiune PHP: 4.4.9
-- 
-- Baza de date: `confessions`
-- 

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `admins`
-- 

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `genre` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Salvarea datelor din tabel `admins`
-- 

INSERT INTO `admins` VALUES (1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'email@yahoo.com', 'Master Admin', 0);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `badges`
-- 

CREATE TABLE `badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `require_for` tinyint(1) NOT NULL,
  `option_one` int(11) NOT NULL,
  `option_two` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Salvarea datelor din tabel `badges`
-- 

INSERT INTO `badges` VALUES (2, 'Completing Some Task', 'images/avatar1.png', 4, 2, 90);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `challenges`
-- 

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_a` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  `content` text NOT NULL,
  `proof` text NOT NULL,
  `date` int(11) NOT NULL,
  `money` double(14,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Salvarea datelor din tabel `challenges`
-- 

INSERT INTO `challenges` VALUES (1, 0, 0, '', '', 1402335696, 22.00, 1);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `comments`
-- 

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Salvarea datelor din tabel `comments`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `dares`
-- 

CREATE TABLE `dares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_a` int(11) NOT NULL,
  `user_b` int(11) NOT NULL,
  `content` text NOT NULL,
  `proof` text NOT NULL,
  `money` double(14,2) NOT NULL,
  `date` int(11) NOT NULL,
  `time_finish` int(11) NOT NULL,
  `finish_at` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Salvarea datelor din tabel `dares`
-- 

INSERT INTO `dares` VALUES (1, 1, 0, '<p>you have to do the next thing</p>', '', 5.00, 1402332312, 6, 0, 1);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `memberships`
-- 

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time` int(11) NOT NULL,
  `price` double(14,2) NOT NULL,
  `confessions_points` int(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Salvarea datelor din tabel `memberships`
-- 

INSERT INTO `memberships` VALUES (1, 'Standard', 'wafgsdg sdgsdg', 365, 0.00, 0, 0);
INSERT INTO `memberships` VALUES (2, 'Pro', 'More Things', 30, 500.00, 0, 1);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `pages`
-- 

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `sidebar_id` int(11) NOT NULL,
  `slider` tinyint(1) NOT NULL DEFAULT '0',
  `slider_id` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Salvarea datelor din tabel `pages`
-- 

INSERT INTO `pages` VALUES (1, 'Test Page', 'test-page', '', 1, 0, 0, 0, 0);
INSERT INTO `pages` VALUES (2, 'Home Page', 'home-page', '<div class="row">\r\n          <div class="col-md-3 widget block">\r\n 				<div class="vc_links-widget">\r\n  <h3>Categories</h3>\r\n  <div class="content">\r\n    <ul class="vc_li">\r\n      <li><a href="#">Drupal</a></li>\r\n      <li><a href="#">Wordpress</a></li>\r\n      <li><a href="#">HTML</a></li>\r\n      <li><a href="#">CSS</a></li>\r\n      <li><a href="#">Web Design</a></li>\r\n    </ul>\r\n  </div>\r\n</div>         \r\n          </div>\r\n          <div class="col-md-3  widget block">\r\n 				<div class="vc_login-widget">\r\n    <h3 class="vc_widget-title">Login Form</h3>\r\n    <div class="content">\r\n        <form class="form">\r\n            <div class="form-group">\r\n              <label class="sr-only" for="login-email">Search Here</label>\r\n              <input type="text" placeholder="Email" name="login-email" id="login-email">\r\n            </div>    \r\n            <div class="form-group">                               \r\n              <label class="sr-only" for="login-password">Search Here</label>\r\n              <input type="password" placeholder="Password" name="login-password" id="login-password">\r\n            </div>   \r\n            <div class="form-group">  \r\n                <label class="checkbox">\r\n                    <input type="checkbox">\r\n                    <small>Remember me</small> \r\n                </label>\r\n                <div class="lost-password"> <a href="#">Lost Password?</a> </div>\r\n            </div>\r\n            <div class="form-group">\r\n              <button type="submit" class="vc_btn btn-small">Sign in</button>\r\n              <button type="submit" class="vc_btn btn-small">Register</button>\r\n            </div>\r\n        </form>\r\n    </div>\r\n</div>\r\n            \r\n          </div>\r\n          <div class="col-md-3  widget block">\r\n 				<!--\r\nIgnore or delete this code. Just for testing purpose.\r\n<style>\r\n	.vc_testimonial .vc_carousel-column{\r\n		width:360px;\r\n	}\r\n	@media (min-width: 992px) and (max-width: 1199px) {\r\n		.vc_testimonial .vc_carousel-column{\r\n			width:300px;\r\n		}		\r\n	}\r\n	@media (max-width: 991px) {\r\n		.vc_testimonial .vc_carousel-column{\r\n			width:320px;\r\n		}		\r\n	}\r\n</style>-->\r\n<div class="vc_testimonial vc_align-right">\r\n  <div class="vc_pager vc_testimonial-pager clearfix" style="display: block;"> <a href="#" class=""><span>1</span></a><a href="#" class=""><span>2</span></a><a href="#" class="selected"><span>3</span></a></div>\r\n  <div class="clearfix"> </div>\r\n  <div class="vc_carousel-wrap">\r\n    <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 283px; height: 377px; margin: 0px; overflow: hidden;"><div class="vc_carousel clearfix" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; height: 2639px; width: 283px; z-index: auto;">\r\n      \r\n      \r\n      <div class="vc_carousel-column" style="">\r\n        <div class="testimonial-box">\r\n          <blockquote> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. </blockquote>\r\n        </div>\r\n        <div class="caret-wrapper"> <i class="fa fa-caret-down"></i> </div>\r\n        <div class="clearfix"> </div>\r\n        <div class="profile">\r\n            <img class="picture" alt="example image" src="img/about/09.jpg">\r\n            <div class="info">\r\n                <div class="name">\r\n                    <h4>Gregory Minatour</h4>\r\n                </div>\r\n                <div class="position vc_inverted">\r\n                    Tech Industry Suzuko\r\n                </div>\r\n            </div>\r\n        </div>\r\n      </div>\r\n    <div class="vc_carousel-column" style="">\r\n            <div class="testimonial-box">\r\n              <blockquote> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. </blockquote>\r\n            </div>\r\n            <div class="caret-wrapper"> <i class="fa fa-caret-down"></i> </div>\r\n            <div class="clearfix"> </div>\r\n            <div class="profile">\r\n                <img class="picture" alt="example image" src="img/about/05.jpg">\r\n                <div class="info">\r\n                    <div class="name">\r\n                        <h4>Henry Benetto</h4>\r\n                    </div>\r\n                    <div class="position vc_inverted">\r\n                        CEO OtherCompany.com\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n      </div><div class="vc_carousel-column" style="">\r\n        <div class="testimonial-box">\r\n          <blockquote> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. </blockquote>\r\n        </div>\r\n        <div class="caret-wrapper"> <i class="fa fa-caret-down"></i> </div>\r\n        <div class="clearfix"> </div>\r\n        <div class="profile">\r\n            <img class="picture" alt="example image" src="img/about/07.jpg">\r\n            <div class="info">\r\n                <div class="name">\r\n                    <h4>Luam Duricah</h4>\r\n                </div>\r\n                <div class="position vc_inverted">\r\n                    CEO Luam.com\r\n                </div>\r\n            </div>\r\n        </div>\r\n      </div></div></div>\r\n    <!-- .vc_carousel --> \r\n  </div>\r\n  <!-- .vc_carousel-wrap --> \r\n  \r\n</div>\r\n<!-- .vc_testimonial -->                      \r\n          </div>\r\n          <div class="col-md-3  widget block">\r\n 				<div class="vc_our-expertise">\r\n  <h2> Our <span class="vc_main-color"> Expertise </span> </h2>\r\n  <div class="vc_splitter"> <span class="bg"> </span> </div>\r\n  <div class="clearfix"> </div>\r\n  <div>\r\n    <h5> Wordpress </h5>\r\n    <div class="progress progress-striped active">\r\n      <div class="progress-bar progress-bar-success" style="width:95%"> </div>\r\n    </div>	\r\n  </div>\r\n  <div>\r\n    <h5> Photoshop </h5>\r\n    <div class="progress progress-striped active">\r\n      <div class="progress-bar progress-bar-info" style="width:85%"> </div>\r\n    </div>\r\n  </div>\r\n  <div>\r\n    <h5> HTML &amp; CSS </h5>\r\n    <div class="progress progress-striped active">\r\n      <div class="progress-bar progress-bar-warning" style="width:85%"> </div>\r\n    </div>\r\n  </div>\r\n  <div>\r\n    <h5> JQuery </h5>\r\n    <div class="progress progress-striped active">\r\n      <div class="progress-bar progress-bar-danger" style="width:70%"> </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<!-- vc_our-expertise -->            \r\n          </div>\r\n        </div>', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `posts`
-- 

CREATE TABLE `posts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL DEFAULT '0',
  `anonymous` int(20) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `date` int(20) NOT NULL DEFAULT '0',
  `published` int(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Salvarea datelor din tabel `posts`
-- 

INSERT INTO `posts` VALUES (3, 1, 0, '', 'My brother ff', '<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh.</p>', '', '', 1401755209, 1, 0);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `schools`
-- 

CREATE TABLE `schools` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL DEFAULT '',
  `school_location` varchar(255) NOT NULL DEFAULT '',
  `confessions` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Salvarea datelor din tabel `schools`
-- 

INSERT INTO `schools` VALUES (1, 'Henri Coanda', 'Ramnicu Valcea', 0);
INSERT INTO `schools` VALUES (4, 'example 2 of school', 'New York', 0);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `settings`
-- 

CREATE TABLE `settings` (
  `field` varchar(255) NOT NULL,
  `value` text NOT NULL,
  UNIQUE KEY `field` (`field`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `settings`
-- 

INSERT INTO `settings` VALUES ('site_name', 'Confessions');
INSERT INTO `settings` VALUES ('site_title', 'Confessions');
INSERT INTO `settings` VALUES ('homepage', '2');
INSERT INTO `settings` VALUES ('aboutus', 'none');
INSERT INTO `settings` VALUES ('web_site_domain', 'edpress-cms.info');
INSERT INTO `settings` VALUES ('merchant_id', 'demo');
INSERT INTO `settings` VALUES ('post_image', 'http://e-poze.info/wp-content/uploads/2014/01/cat-night-wallpaper.jpg');

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `sliders`
-- 

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Salvarea datelor din tabel `sliders`
-- 

INSERT INTO `sliders` VALUES (1, 'HomePage Slider');

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `slides`
-- 

CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Salvarea datelor din tabel `slides`
-- 

INSERT INTO `slides` VALUES (1, 1, 'http://www.jogjis.com/stock/tropical-forest-river.jpg', 'Continut');

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `theme_settings`
-- 

CREATE TABLE `theme_settings` (
  `field` varchar(255) NOT NULL,
  `value` text NOT NULL,
  UNIQUE KEY `field` (`field`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `theme_settings`
-- 

INSERT INTO `theme_settings` VALUES ('top_bar_background', 'rgba(235,235,235,1)');
INSERT INTO `theme_settings` VALUES ('top_bar_color', 'rgba(94,94,94,1)');
INSERT INTO `theme_settings` VALUES ('top_bar', '1');
INSERT INTO `theme_settings` VALUES ('top_bar_text', 'Welcome to Yolo.ng');
INSERT INTO `theme_settings` VALUES ('top_bar_social', '1');
INSERT INTO `theme_settings` VALUES ('title_background', '');
INSERT INTO `theme_settings` VALUES ('header_style', 'header-2');
INSERT INTO `theme_settings` VALUES ('background', '');
INSERT INTO `theme_settings` VALUES ('responsive', '1');
INSERT INTO `theme_settings` VALUES ('boxed', '0');
INSERT INTO `theme_settings` VALUES ('theme_color', 'color-blue');
INSERT INTO `theme_settings` VALUES ('footer_style', 'footer-3');
INSERT INTO `theme_settings` VALUES ('footer_mode', 'mode-3');
INSERT INTO `theme_settings` VALUES ('header_mode', 'mode-3');

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `transactions`
-- 

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `deposit` double(14,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Salvarea datelor din tabel `transactions`
-- 

INSERT INTO `transactions` VALUES (1, 0, '', 1402058855, 0.00, '');

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `user_badges`
-- 

CREATE TABLE `user_badges` (
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `user_badges`
-- 

INSERT INTO `user_badges` VALUES (1, 2);
INSERT INTO `user_badges` VALUES (2, 0);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `school_id` int(20) NOT NULL DEFAULT '0',
  `date` int(20) NOT NULL DEFAULT '0',
  `money` double(14,2) NOT NULL,
  `membership` int(11) NOT NULL,
  `expire` int(11) NOT NULL,
  `genre` int(1) NOT NULL DEFAULT '0',
  `points` int(14) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Salvarea datelor din tabel `users`
-- 

INSERT INTO `users` VALUES (1, 'eddy11ro', '8cc588fa0418934f827b90cafb4afb89', 'bytomigroup@yahoo.ro', 'Petrescu Eduard Ionut', 0, 0, 5.00, 0, 0, 0, 0, 0, '');
