<ul>
    <li id="home-menu"> <a href="/index.php?view=home" data-waypoint="home"> Home <i class="fa fa-caret-down"> </i>  </a>
	</li>
	
    <li id="features-menu"> <a href="/index.php?view=confessions"  data-waypoint="features"> Confessions </a>              
    </li>                
	
	<?php if (isLogged() == 'false') {?>
    <li id="offers-menu"> <a href="/index.php?view=signup"  data-waypoint="offers"> LogIn / SignUp</a>  
    </li>  
	<?php } ?>
	
	<?php if (isLogged() == 'true') {?>
    <li id="offers-menu"> <a href="/index.php?view=profile"  data-waypoint="offers"> Profile</a>  
	
    </li>  
	<?php } ?>
	
	<?php if (isLogged() == 'true') {?>
    <li id="offers-menu"> <a href="/index.php?view=dares"  data-waypoint="offers"> Dares</a>  
	
    </li>  
	<?php } ?>
	
		<?php if (isLogged() == 'true') {?>
    <li id="offers-menu"> <a href="/index.php?view=challenges"  data-waypoint="offers"> Challenges</a>  
	
    </li>  
	<?php } ?>
	
	<?php if (get_option('aboutus') != 'none') {?>
    <li id="contact-menu"> <a href="/index.php?view=aboutus" data-waypoint="contact"> About Us </a> 
    </li>
	<?php } ?>
</ul>
<!-- Head menu search form ends --> 