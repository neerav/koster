<!doctype html>  

<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php wp_title(); ?> </title> 
  <meta name="description" content="<?php get_bloginfo ( 'description' );  ?>">
  <meta name="author" content="James Koster">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="<?php bloginfo ( 'template_url' );  ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo ( 'template_url' );  ?>/apple-touch-icon.png">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- CSS : implied media="all" -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <div id="wrapper">
  
  		<nav class="main-nav">
  
			<h3 class="nav-toggle"><a href="#"><?php _e('Navigation','koster'); ?></a></h3>
			
			<?php wp_nav_menu( 'main' ); ?>
		
		</nav>
  
		<header id="header" class="row visible">
			
			
			<?php display_logo(); ?>
			
			<?php if ( is_home() ) { ?>
			
			    <h1 class="tencol site-title last"><?php bloginfo('name'); ?></h1>
				
			<?php } else { ?>
			    
			    <a href="<?php echo home_url(); ?>" class="tencol site-title last"><?php bloginfo('name'); ?></a>
			    
			<?php } ?>
		
		</header>
  