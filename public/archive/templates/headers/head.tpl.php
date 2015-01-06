<head>
    <meta charset="utf-8" />
    <title><?php if (isset($title)) echo $title; ?> | <?php if (isset($website_name)) echo $website_name; ?></title>
    <meta name="keywords" content="<?php if (isset($keywords)) echo $keywords; ?>" />
    <meta name="description" content="<?php if (isset($description)) echo $description; ?>">
    <meta name="author" content="<?php if (isset($author)) echo $author; ?>">
    
    <!-- Set the viewport width to device width for mobile -->
    <?php if ($responsive){?><meta name="viewport" content="width=device-width, initial-scale=1.0"><?php }?>    
    
    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/ico/favicon.ico">
    
    
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->

    <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope-plugin/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet" type="text/css">
	<link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">  
	<link href="css/animate.min.css" rel="stylesheet" type="text/css"> 
 
    <!-- Theme CSS -->
    <link href="css/theme.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->
    <link href="css/header/<?php echo $header ?>.css" rel="stylesheet">

	<!-- Specific Page CSS -->
	<?php if (isset($specific_css) && $specific_css != '') { ?>
    	<link href="css/specific/<?php echo $specific_css ?>.css" rel="stylesheet">    	
    <?php }?>

    <!-- Design Mode CSS -->
    <link id="link-header-mode" href="css/mode/<?php echo $header_mode ?>-header.css" rel="stylesheet" type="text/css"> 
    <link id="link-footer-mode" href="css/mode/<?php echo $footer_mode ?>-footer.css" rel="stylesheet" type="text/css">    
    <link id="link-color" href="css/color/<?php echo $theme_color ?>.css" rel="stylesheet" type="text/css">

        
    <!-- Responsive CSS -->
    <?php if ($responsive){?>
    	<link href="css/theme-responsive.css" rel="stylesheet" type="text/css"> 
    	<link href="css/header/<?php echo $header ?>-responsive.css" rel="stylesheet" type="text/css"> 
        <link id="link-header-mode-r" href="css/mode/<?php echo $header_mode ?>-header-responsive.css" rel="stylesheet" type="text/css"> 
        <link id="link-footer-mode-r" href="css/mode/<?php echo $footer_mode ?>-footer-responsive.css" rel="stylesheet" type="text/css">
    	<link id="link-color" href="css/color/<?php echo $theme_color ?>-responsive.css" rel="stylesheet" type="text/css">        
		<?php if (isset($specific_css) && $specific_css != '') { ?>
            <link href="css/specific/<?php echo $specific_css ?>-responsive.css" rel="stylesheet">    	
        <?php }?>              
	<?php } else { ?>
    	<link href="css/non-responsive.css" rel="stylesheet" type="text/css">  
	<?php } ?>  

    <!-- Custom CSS -->
    <link href="custom/custom.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="plugins/redactor/redactor.css" />

    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="js/modernizr.js"></script> 
	<script type="text/javascript" src="js/jquery.js"></script> 
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
    
</head>    