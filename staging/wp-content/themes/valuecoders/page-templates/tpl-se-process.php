<?php 
/*
Template Name: Software Eng. Process Template
*/ 
global $post;
$thisPostID = $post->ID;
$vcBtn 			= get_field('vc-cta', $thisPostID);
get_header();
?>
<section class="hero-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v4.0/images/service-banner.png);">
  <div class="container">
    <div class="content-wrap">
      <div class="breadcrumbs">
      <a href="<?php echo get_bloginfo('url'); ?>">Home</a> <a href="<?php echo site_url('/software-development-services-company'); ?>">Services</a> Our Software Engineering Process
      </div>
      <div class="dis-flex">
        <div class="left-box">
          <?php 
          while( have_posts() ) : the_post(); 
          the_content();
          endwhile;
          ?>
          <div class="btn-sec margin-t-50 ">
          <a href="<?php echo site_url('/contact'); ?>" class="btn rounded">
          <span class="text-white">CONTACT US</span>
          </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('include/companies', 'v4.0'); ?>

<?php 
$stageOne = get_field('stg-1');
if( isset($stageOne['is_enabled']) && ($stageOne['is_enabled'] == "yes") ) :
?>
<section class="icon-three-column-section bg-light padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center"><?php echo $stageOne['content']; ?></div>
  <div class="dis-flex col-box-outer margin-t-100">
    <?php 
    if( $stageOne['card'] ){
    foreach( $stageOne['card'] as $row ){
      echo '<div class="flex-3 box-3 has-anchor"><div class="box">';
      if( $row['icon'] ){
        echo vc_pictureElm( $row['icon'], 'ValueCoders' );  
      }
      echo $row['content'];
      echo '</div></div>';
      }  
    }
    ?>    
  </div>
</div>
</section>
<?php endif; ?>


<?php 
$stageTwo = get_field('stg-2');
if( isset($stageTwo['is_enabled']) && ($stageTwo['is_enabled'] == "yes") ) :
?>
<section class="design-stage padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $stageTwo['content']; ?></div>    
    <div class="dis-flex col-box-outer margin-t-80">
      <?php 
      if( $stageTwo['card'] ){
      foreach( $stageTwo['card'] as $row ){
      echo '<div class="box-3">
      <div class="box">
      <div class="d-img">';
      if( $row['icon'] ){
      echo vc_pictureElm( $row['icon'], 'ValueCoders' );  
      }
      echo '</div><div class="desp">'.$row['content'].'</div></div></div>';  
      }
      }
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$stageThree = get_field('stg-3');
if( isset($stageThree['is_enabled']) && ($stageThree['is_enabled'] == "yes") ) :
?>
<section class="accordion-section bg-blue-linear  padding-t-120">
  <div class="dis-flex accordian-row">
    <div class="col-left">
    <div class="head-txt"><?php echo $stageThree['content']; ?></div>
    <div class="image-wrap">
    <?php 
    if( $stageThree['image'] ){
    echo vc_pictureElm($stageThree['image'], 'ValueCoders', 'soft-img');
    }
    ?>
    </div>
    </div>

    <div class="col-right padding-b-120">        
    <?php 
    if( $stageThree['card'] ){
      $i = 0;
      foreach( $stageThree['card'] as $row ){ 
        $i++;
        $is_active = ( $i === 1 )  ? 'active' : '';
        echo '<div class="accordionItem '.$is_active.'">
        <h3 class="accordion-toggle">'.$row['title'].'</h3>
        <div class="accordion-content">'.$row['content'].'</div>
        </div>';
      }  
    }
    ?>    
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$devPhase = get_field('dev-phase');
if( isset($devPhase['is_enabled']) && ($devPhase['is_enabled'] == "yes") ) :
?>
<section class="development-phase padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $devPhase['content']; ?></div>
    <div class="dis-flex col-box-outer margin-t-100">
    <?php 
    if( $devPhase['card'] ){
    foreach( $devPhase['card'] as $row ){
      echo '<div class="flex-6"><div class="box">'.$row['content'].'</div></div>';
    }  
    }
    ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$proLaunch = get_field('pro-launch');
if( isset($proLaunch['is_enabled']) && ($proLaunch['is_enabled'] == "yes") ) :
?>
<section class="product-launch bg-light padding-t-120 padding-b-120">
<div class="container">
  <div class="dis-flex  col-box-outer">
    <div class="row-box dis-flex justify-sb items-center">
      <div class="flex-2">
        <?php echo $proLaunch['content']; ?>
      </div>
      <div class="flex-2">
        <div class="img-box">
          <?php 
          if( $stageThree['image'] ){
          echo vc_pictureElm($proLaunch['image'], 'ValueCoders');
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php endif; ?>  

<?php 
$stageFour = get_field('stg-4');
if( isset($stageFour['is_enabled']) && ($stageFour['is_enabled'] == "yes") ) :
?>
<section class="maintenance padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center"><?php echo $stageFour['content']; ?></div>
  <div class="dis-flex col-box-outer margin-t-100">
    <?php 
    if( $stageFour['card'] ){
      foreach( $stageFour['card'] as $row ){
        echo '<div class="flex-4"><div class="box">';
        if( $row['icon'] ){
          echo vc_pictureElm( $row['icon'], 'ValueCoders' );  
        }
        echo $row['content'];
        echo '</div></div>';
      }  
    }
    ?>
  </div>
</div>
</section>
<?php endif; ?>

<?php 
$devMod = get_field('dev-mt');
if( isset($devMod['is_enabled']) && ($devMod['is_enabled'] == "yes") ) :
?>
<section class="core-values bg-light">
  <div class="dis-flex">
    <div class="flex-2 left-box">
    <?php 
    if( $devMod['image'] ){
    echo vc_pictureElm( $devMod['image'], 'ValueCoders' );
    }
    ?>
    </div>    
    <div class="flex-2 right-box padding-t-100  padding-b-100">
      <?php echo $devMod['content']; ?>
      <div class="dis-flex items-center core-outer">
      <?php 
      if( $devMod['card'] ){
      foreach( $devMod['card'] as $row ){
      echo '<div class="flex-2"><div class="box">';
      if( $row['icon'] ){
        echo vc_pictureElm( $row['icon'], 'ValueCoders', 'icon-box' );  
      }
      echo $row['content'];
      echo '</div></div>'; 
      }
      }
      ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$vServices = get_field('vc-services');
if( isset($vServices['is_enabled']) && ($vServices['is_enabled'] == "yes") ) :
$htContent  = $vServices['content'];
$headText   = fnextractHeadins('h2', $htContent );  
?>
<section class="three-column-icon-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php 
      if( $vServices['card'] ){
        foreach( $vServices['card'] as $row ){
          echo '<div class="flex-3 box-3"><div class="box">'.$row['content'].'</div></div>';
        }
      }
      ?>          
    </div>
  </div>
</section>
<?php endif; ?>

<section class="lets-discuss-cta bg-blue-linear padding-t-70 padding-b-70">
<div class="container">
  <div class="dis-flex justify-sb">
    <div class="left-sec">
      <div class="head-txt">
        <h2>Dive Into Innovation</h2>
        <p>Embark on a journey with our cutting-edge software solutions.</p>
      </div>
      <div class="btn-sec margin-t-50">
      <a href="<?php echo site_url('/contact'); ?>" class="btn rounded">
      <span class="text-white">CONTACT US</span>
      </a>
      </div>      
    </div>

    <div class="right-sec">
      <picture class="icon-box">
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/cta-image.png">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/cta-image.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cta-image.png" alt="valuecoders" width="345" height="206">
      </picture>
    </div>
  </div>
</div>
</section>
<?php get_template_part('include/testimonials', 'v4.0'); ?>
<?php get_footer(); ?>