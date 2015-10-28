<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
 
    <!--=== META TAGS ===-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
    <!--=== LINK TAGS ===-->
    <link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/images/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 
    <!--=== TITLE ===-->  
   <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?></title>
   <?php wp_head(); ?>
    <script>
    new WOW().init();
    </script>
   

  <link href="<? echo THEME_DIR ?>/css/layout/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <link href="<? echo THEME_DIR ?>/css/layout/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
  <!--[if IE]>
      <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->


    <!--=== WP_HEAD() ===-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>


    <script src="https://use.typekit.net/kdd0ebl.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
    

    <script type="text/javascript">


          function hidePreLoader() {
        
    
    $j("#preloader").stop().animate({opacity:"0"},{
        queue       : false,
        duration    : 300,
        complete    : function() {
      $j("#preloader").remove();
    }});
    }

           window.addEventListener('DOMContentLoaded', function() {
            new QueryLoader2(document.querySelector("body"), {
            barColor: "#f39501",
            backgroundColor: "#000",
            barHeight: 5,
            minimumTime: 500,
            fadeOutTime: 1000,
            percentage: true,
            onComplete: hidePreLoader,
        });
    });

    </script>
    

      
</head>

<div id="preloader"></div>

<div class="tk-brandon-grotesque">

<header>
<div class="container-header fixed header Fixed">
  
  <a href="<? echo BLOG_URL ?>"><img src="<? echo THEME_DIR; ?>/images/mainLogo.png" alt=""></a>


<!-- bottone menu -->
<a href="#mobile-menu" id="menuBtn-wrapper">
<div class="menuBtn pe_menu_btn">
<div class="lines-wrapper">
<div class="first line"></div>
<div class="second line"></div>
<div class="third line"></div>
</div>
</div>
</a>
<!-- bottone menu -->



<div id="menu-open" class="Fixed"></div>

</div>	
</header>


<nav id="mobile-menu">
      

      <div class="container">
      <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <ul class="tk-brandon-grotesque">
          <a href="index.php?page_id=27"><li>Comunicazione</li></a> 
          <a href=""><li>Eventi</li></a> 
          <a href=""><li>Allestimenti</li></a> 
          <a href=""><li>Vetrinistica</li></a> 
          <a href=""><li>Ristrutturazioni</li></a> 
          <a href=""><li>Portfolio Clienti</li></a> 
          <a href=""><li>Contatti</li></a> 
          

      </ul>
          
        </div>

      </div>
        
      </div>
      
       
</nav>



<main id="main-wrapper">


