<?php
  /**
   * The template for displaying the header
   *
   * Displays all of the head element and everything up until the page header div.
   *
   * @package Neve
   * @since   1.0.0
   */
  
  $header_classes = apply_filters( 'nv_header_classes', 'header' );
  ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php /* ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-27094506-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-27094506-2');
    </script>
    <?php */ ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-PQ4DZV5');
    </script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
  </head>
  <body id="themeAdd" <?php neve_body_attrs(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQ4DZV5"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>
    <?php 
    $root_dir = ( $_SERVER['DOCUMENT_ROOT'] ) ? $_SERVER['DOCUMENT_ROOT'] : '';
    //require_once $root_dir.'/vc-nevigation.php';
    //require_once $root_dir.'/menu-v3.php';
    require_once get_stylesheet_directory().'/menu-v3.php';
    ?>
    <section class="search-section" data-dir="<?php echo get_template_directory(); ?>">
    <div class="container">
    <div class="blog-heading">
    <?php if( is_front_page() || is_home() ) : ?>    
        <h1> Embark On A Journey Of Technical Growth With Us!</h1>
    <?php endif; ?>
    </div>
      <div class="search_header">
        <div class="searchdiv">
          <button  class="searchsubmit" value="search" id="myBtn"></button>

          <div id="contentPopup" class="popup-wrapper">
            <div class="popWrap">
            <div class="popup-content">
             <span class="close"></span>
          <?php $site_url = trailingslashit( get_bloginfo('url') ); ?>   
          <form action="<?php echo $site_url; ?>" method="get" class="search_box">
            <input type="search" placeholder="Type to start your search..." class="search" name="s" id="search" value="<?php the_search_query(); ?>" />
            <button  class="searchsubmit" value="search"></button>
          </div>
            <div>
            </div>
          </div>

            
            
          </form>
        </div>
        <div id="newsletter-col">
          <button class="newsletter" value="search" id="myBtn2"></button>

          <div id="newsletterPopup" class="popup-wrapper">
            <div class="popWrap">
            <div class="popup-content">
             <span class="closeicon"></span>
               <h3>Like What You’re Reading?</h3>
          <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
        </div>
      </div>
      </div>
        </div>
      </div>
    </div>
    </section>



    <?php //endif; ?>   
    <?php do_action( 'neve_before_primary' ); ?>
    <main id="content" class="neve-main" role="main">
    <?php
    do_action( 'neve_after_primary_start' );