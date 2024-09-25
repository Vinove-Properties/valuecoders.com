<?php get_header(); ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<section class="banner-section">
  <div class="container">
  <?php 
    $topCTA = get_field('ptop-cta');  
    if( (isset( $topCTA['required'] ) && ($topCTA['required'] != "no"))  || (!isset( $topCTA['required']) ) ) :
    $heading  = ( isset( $topCTA['heading'] ) && !empty( $topCTA['heading'] ) ) ? $topCTA['heading'] : 'Build for Tomorrow';
    $text     = ( isset( $topCTA['text'] ) && !empty( $topCTA['text'] ) ) ? $topCTA['text'] : "Create solutions that last. Partner with ValueCoders for software solutions that set you apart.";

    $text2     = ( isset( $topCTA['text2'] ) && !empty( $topCTA['text2'] ) ) ? $topCTA['text2'] : "Software Engineering  <span>|</span> Digital Marketing  <span>|</span> Dedicated Teams";
    ?>
  <div class="cta-section">
    <div class="top-cta">
      <div class="colLeft">
        <div class="ct-head"><?php echo $heading; ?></div>
        <p><?php echo $text; ?></p>
        <!-- <p><strong><?php echo $text2; ?></strong></p> -->
      </div>
      <div class="colMid">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/cta-image.svg" alt="valuecoders" 
            width="270" height="170">
        </picture>
      </div>
      <div class="ctaRit">
        <div class="btn-sec">
          <a href="https://www.valuecoders.com/contact" target="_blank" class="btn rounded"><span class="text-white">Book A Free Consultation</span></a>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  
  <?php 
    if( is_single() ){
    global $post;  
    $author_id    = $post->post_author; 
    $commentCount = ( get_comments_number($post->ID) > 1 ) ? get_comments_number($post->ID).' Comments' : get_comments_number($post->ID).' Comment';
    $authThumbnail    = get_template_directory_uri().'/assets/images/author.png';
    $authorThumbnail  = get_field( 'auth-thumb', 'user_'.$author_id );
    if( $authorThumbnail && isset( $authorThumbnail['url'] ) ){
      $authThumbnail = $authorThumbnail['url'];
    }else{  
      $user_avtar   = get_user_meta( $author_id, 'wp_user_avatars', true );
      if( $user_avtar ){
        $authThumbnail = isset( $user_avtar['full'] ) ? $user_avtar['full'] : get_bloginfo('url').'/dev-img/author-profile.png';
      }
    }
    $btText = get_field('bt-text');
    $btText = (!empty($btText)) ? '<p class="bt-text">'.$btText.'</p>' : '';
    
    $keyAway = get_field('col-keyaway');
    $takeText = '';
    if( isset($keyAway['required']) && ($keyAway['required'] == "yes") ){
      if( isset( $keyAway['content'] ) && !empty($keyAway['content']) ){
      $takeText = '<div class="row-key-takeaway">'.$keyAway['content'].'</div>';  
      }  
    }
    /*$takeText = '<div class="row-key-takeaway">
    <p>Create your ideal web application with this comprehensive step-by-step guide, providing a strategic and successful development process. It includes:</p>
    <ul>
      <li>Meaning and Benefits of Web Application</li>
      <li>Types of Web Application</li>
      <li>Detailed Plan for Starting the Development</li>
    </ul>
    </div>';*/  
    echo '<div class="top-header-section">';
    get_template_part('inc/search', 'popup');
    //<li class="posted-on">Published <span class="dt">'.get_the_time('F j, Y').'</span></li>
    echo '<div class="single-post-container">
                  <div class="top-header-banner">
                      <h1>'.get_the_title().'</h1>
                      '.$btText.'
                      <div class="entery-wrap">
                      <div class="meta-wrap">
                      <div class="author-img">
                        <img loading="lazy" src="'.$authThumbnail.'" width="52" height="52" alt="'.get_the_author().'"/>
                      </div>
                      <ul class="entry-meta">
    <li class="meta author vcard">
    <span class="author-name fn">Written by '.get_the_author_posts_link().'</span>
    </li>    
    </ul>
    </div>
                      
    <div class="social-icon-box">
    <div class="share-head">
    Share Article:
    </div>
    <div class="social-icons">
    <a href="https://www.facebook.com/sharer?u='.get_the_permalink().'&t='.get_the_title().'.." class="a2a_button_facebook" target="_blank" rel="noopener noreferrer"></a>
    <a href="http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title().'" class="a2a_button_linkedin" target="_blank" rel="noopener noreferrer"></a>
    <a href="http://twitter.com/intent/tweet?text='.get_the_title().'&url='.get_the_permalink().'" class="a2a_button_twitter" target="_blank" rel="noopener noreferrer"></a>
      
    </div>
    </div>
    </div>
    </div></div>';
    echo '</div>'.$takeText.'</div>';
    }else{ 
    } 
    ?>
</section>
<?php /* ?>
<div class="detail-image">
  <div class="container">
    <div class="detail-thumb">
      <?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
    </div>
  </div>
</div>
<?php */ ?>
<main id="primary" class="site-main  detail-page">
  <?php
    global $post;
    get_header();
    $TocDisable   = get_post_meta( $post->ID, '_ez-toc-disabled', true);
    $isTocDisable = ( isset( $TocDisable ) && ($TocDisable == "1") ) ? true : false;
    $exPostId = [29846];
    if( in_array($post->ID, $exPostId) ){
    $isTocDisable = true;    
    }
    $author_id    = $post->post_author; 
    ?>
  <div class="container archive-container">
    <div class="second-row" id="stickytoc">
      <div class="buyers-guide">
        <div class="vcb-col-left" id="vcb-col-left">          
          
          
          
          <?php if( $isTocDisable === false ) : ?>  
          <div class="table-c active" id="elm-toc">
            <h3>Table of Contents <a class="sw-hd" href="javascript:void(0);" onclick="document.getElementById('elm-toc').classList.toggle('active');">
              <span class="hide">(Hide)</span>
              <span class="show">(Show)</span>
            </a></h3>
            <div class="tocsec">
              <?php dynamic_sidebar('sidebar-1'); ?>
            </div>
          </div>
          <?php endif; ?>
       

          <?php 
            $sbCTA = get_field('sb-cta');  
            if( (isset( $sbCTA['required'] ) && ($sbCTA['required'] != "no"))  || (!isset( $sbCTA['required']) ) ) :
            $sbText  = (isset( $sbCTA['text'] ) && !empty($sbCTA['text'])) ? $sbCTA['text'] : 'Struggling with Tech Complexity?';
            ?>
          <div class="customcta">          
          <div class="cus-cont">
          <div class="cushed"><?php echo $sbText; ?></div>
          <div class="text"><?php echo $sbCTA; ?></div>
          <div class="btn-container">
            <div class="btn-sec">
            <a href="https://www.valuecoders.com/contact" target="_blank" class="btn rounded" data-wpel-link="external" 
            rel="nofollow external noopener noreferrer"><span class="text-white">Schedule A Call</span></a>
            </div>
          </div>
          </div>
          </div>
          <?php endif; ?>
          
          <?php 
          $haspostPdf     = get_post_meta( $post->ID, 'post_pdf', true );
          $haspostPdflink = get_post_meta( $post->ID, 'vc-post-pdf', true );
          if( $haspostPdf || $haspostPdflink){
          $guidename  = (!empty(get_post_meta($post->ID,'guide_name',true))) ? 
          get_post_meta($post->ID,'guide_name',true) :  'A Complete Guide to<br> IT Outsourcing 2023';
          echo '<div class="customcta">
            <div class="cushed">'.$guidename.'</div>
            <div class="btn-container">
              <a class="white-btn" onclick="_triggerEbook();" href="javascript:void(0);">Download Now</a>
            </div>
          </div>';
          }
          ?>

        <?php /* ?>
        <div class="detail-subsbox">
          <h3>Subscribe to our blog</h3>
          <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
        </div>
        <?php */ ?> 
        
        </div>
        <div class="vcb-col-right <?php echo ( $isTocDisable === true ) ? ' no-toc-row' : ''; ?>" id="vcb-col-right">
          <article id="post-<?php echo esc_attr( get_the_ID() ); ?>" class="nv-single-post-wrap">
            <?php             
              //Postpdf();
              if( have_posts() ) :
              while( have_posts() ) : the_post();
                  the_content();
              endwhile;
              if( comments_open() || get_comments_number() ){
                  //comments_template();
              }
              endif;
              ?>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
<?php 
get_template_part('inc/file', 'pdownload');
get_footer();?>