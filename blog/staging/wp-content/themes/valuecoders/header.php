<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <style type="text/css">
    body.single-post .header-two.header-bg.sc-up .dark-theme-logo-lg,
    body.single-post .header-two:hover .dark-theme-logo-lg,  
    body.single-post .dark-theme-logo{display:none;}  
    body.single-post .author-img img,
    .auth-image img{border-radius:50%; }
    @media only screen and (max-width: 1139px){
    body.single-post .header-two .dark-theme-logo-lg{display:none;}
    }
    </style>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PL37X57');
    </script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PL37X57" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php 
    $root_dir = ( $_SERVER['DOCUMENT_ROOT'] ) ? $_SERVER['DOCUMENT_ROOT'] : '';
    require_once get_stylesheet_directory().'/menu-v3.12.php';

    
    if( is_author() ) {
      get_template_part('inc/author', 'section');
    }else{
      if( !is_single() ) :
    ?>
    <section class="search-section padding-t-100 padding-b-120" data-dir="<?php echo get_template_directory(); ?>">
    <div class="container">
    <div class="blog-search-outer"> 
    <div class="blog-heading">
    <?php if( is_front_page() || is_home() ) { ?>    
        <h1> Embark On A Journey Of Technical Growth With Us!</h1>
    <?php }elseif( is_archive() ){
        echo '<header class="page-header">';
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        echo '</header>';
    }elseif( is_search() ){ ?>
        <header class="page-header">
        <h1 class="page-title">
      <?php
      /* translators: %s: search query. */
      printf( esc_html__( 'Search Results for: %s', 'valuecoders' ), '<span>' . get_search_query() . '</span>' );
      ?>
        </h1>
          </header><!-- .page-header -->
    <?php }
    ?>
    </div>
    <?php get_template_part('inc/search', 'popup'); ?>
    </div>
     <?php 
     if( is_front_page() || is_home() || is_archive() ) :
    global $wp;
    $current_url = home_url( add_query_arg( array(), $wp->request ) );
       //echo '<pre>'.$current_url.'</pre>';
     $vcategory = get_terms( ['taxonomy'=>'category', 'hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC' ] );
     if( $vcategory ){
      echo '<div class="cat-list">';
      foreach( $vcategory as $term ){
          $isActive = ( $current_url.'/' == get_term_link( $term ) ) ? " cat-active" : "";
        echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="cx-taxid'.$term->term_id.$isActive.'" title="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
      }
      echo '</div>';  
     }
     endif;
  endif;      
  }

  ?>

    </div>
  
</section>

<main id="content" class="neve-main">