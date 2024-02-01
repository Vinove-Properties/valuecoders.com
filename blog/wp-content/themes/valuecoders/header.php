<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>    
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
    }else{ ?>

    <section class="search-section <?php echo (is_single()) ? 'detailed-section' : ''; ?> padding-t-100 padding-b-120" data-dir="<?php echo get_template_directory(); ?>">
        <div class="container">
        <?php 
    if( is_single() ){
    global $post;  
    $author_id    = $post->post_author; 
    $commentCount = ( get_comments_number($post->ID) > 1 ) ? get_comments_number($post->ID).' Comments' : get_comments_number($post->ID).' Comment';
    echo '<div class="top-header-section">';
    get_template_part('inc/search', 'popup');
    echo '<div class="single-post-container">
                  <div class="top-header-banner">
                      <h1>'.get_the_title().'</h1>
                      
                      <!--
                      <div class="posted-details">
                      <ul>
                          <li><img src="'.get_bloginfo('template_url').'/images/blog-testi-img.png" align="Posted By"> By '.get_the_author_meta( 'user_nicename' , $author_id ).'</li>
                          <li>'.do_shortcode('[rt_reading_time label="" postfix="min read"]').'</li>
                          <li>'.$commentCount.'</li>
                      </ul>
                      </div>
                      -->

                      <div class="social-icon-box">
                          <div class="share-icon">
                              <i></i> <span>Share</span>
                          </div>
                          <div class="social-icons">
                              <a href="http://twitter.com/intent/tweet?text='.get_the_title().'&url='.get_the_permalink().'" class="a2a_button_twitter" target="_blank" rel="noopener noreferrer"></a>
                              <a href="https://www.facebook.com/sharer?u='.get_the_permalink().'&t='.get_the_title().'.." class="a2a_button_facebook" target="_blank" rel="noopener noreferrer"></a>
                              <a href="http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title().'" class="a2a_button_linkedin" target="_blank" rel="noopener noreferrer"></a>
                          </div>
                      </div>
                  </div>
              </div>';
    echo '</div></div>';
    /*
    <a href="#" class="for-insta"></a>
    <a href="#" class="for-youtube"></a>
    */
    }else{ 
    ?>
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
   

  /*if( is_archive() ){
    echo '<header class="page-header">';
    the_archive_title( '<h1 class="page-title">', '</h1>' );
    the_archive_description( '<div class="archive-description">', '</div>' );
    echo '</header>';
  }*/

  }
  ?>
    </div>
</section>
<?php } ?>
<main id="content" class="neve-main">