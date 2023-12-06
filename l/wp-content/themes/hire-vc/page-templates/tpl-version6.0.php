<?php 
/*
Template Name: Template Version 6.0
*/
get_header();
$hasTestimonail = get_field('cl-testimonials');
$counterBG = 'bg-cream';
if( isset( $hasTestimonail['is_enable'] ) && ($hasTestimonail['is_enable'] == "yes") ) {
  if( isset( $hasTestimonail['position'] ) && ($hasTestimonail['position'] == "top") ){
    $counterBG = '';
  }
}
?>
<section class="banner-img-section">
  <picture class="main--featured--image__wrapper">
    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.webp">
    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.png">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.png" alt="Valuecoders" width="1920"
      height="920">
  </picture>
  <img class="bannerboy" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-boy.svg" alt="Valuecoders">
  <div class="container">
    <div class="two-box">
      <div class="flex-2">
        <?php the_content(); ?>
        <div class="margin-t-50">
          <a class="yellow-btn pop-up" href="javascript:void(0)">
            <?php echo get_field('banner-cta'); ?>              
          </a>
        </div>        
        <div class="clintlogo">
          <div class="logobox">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo1.webp">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo1.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo1.png" alt="Valuecoders" width="86"
                height="62">
            </picture>
          </div>
          <div class="logobox">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo2.webp">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo2.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo2.png" alt="Valuecoders" width="108"
                height="66">
            </picture>
          </div>
          <div class="logobox">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo3.webp">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo3.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo3.png" alt="Valuecoders" width="150"
                height="45">
            </picture>
          </div>
          <div class="logobox">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo4.webp">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo4.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/bnrlogo4.png" alt="Valuecoders" width="115"
                height="48">
            </picture>
          </div>
        </div>
      </div>
      <?php 
      $btnText      = get_field('form-btn');
      $headingText  = get_field('frm-heading');

      if( empty($headingText) ){
      $headingText = '<h2>Connect with Us</h2><p>Get No Obligation Free Quote!</p>';
      }

      if( empty($btnText) ){
      $btnText = "Hire Software Developers";  
      }
      get_template_part( 'assets-v2/include/cmn', 'form', ['btn_text' => $btnText, 'dm_page' => $isDmPage, 
      'frm-heading' => $headingText, 'call-book' => true] );
      ?>

      

    </div>
  </div>
  <div class="client-logo-box-section dis-flex items-center justify-sb">
    <div class="container">
      <div class="dis-flex">
        <div class="logo-heading">
          <h4>Trusted by startups<br> and Fortune 500 companies</h4>
        </div>
        <div class="logo-box-outer dis-flex">
          <div class="logo-box logo1"></div>
          <div class="logo-box logo2"></div>
          <div class="logo-box logo3"></div>
          <div class="logo-box logo4"></div>
          <div class="logo-box logo5"></div>
          <div class="logo-box logo6"></div>
          <div class="logo-box logo7"></div>
          <div class="logo-box logo8"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="counter-section icon-with-img-section <?php echo $counterBG; ?> padding-t-150 padding-b-150">
  <div class="container">
    <?php 
    $getCounter = get_field('counter-html');
    if( $getCounter ){
      echo $getCounter;
    }else{
      echo '<div class="head-txt text-center">
      <h2>What Makes ValueCoders Different</h2>
      </div>
      <div class="count-box-section  margin-t-50">
      <div class="count-box-outer dis-flex">
      <div class="count-box flex-4">
        <span class="count-box-big">18+</span>
        <span class="count-box-small">Years in Business</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big">650+</span>
        <span class="count-box-small">Software Developers</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big">2000+</span>
        <span class="count-box-small">Man Years Experience</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big">2500+</span>
        <span class="count-box-small">Satisfied Customers</span>
      </div>
      </div>
      </div>';
    }
    ?>
    
  </div>
</section>

<?php 

if( isset( $hasTestimonail['is_enable'] ) && ($hasTestimonail['is_enable'] == "yes") ) {
if( isset( $hasTestimonail['position'] ) && ($hasTestimonail['position'] == "top") ){
?>
<section class="customer-testimonial-section bg-cream padding-t-150 padding-b-150" id="v4-cust-testimonial">
  <div class="container">
    <div class="head-txt text-center"><?php echo $hasTestimonail['content']; ?></div>
    <?php     
    $clReviews = $hasTestimonail['client-reviews'];
    if( $clReviews ){ 
    ?>
    <div class="glider-contain customer-testimonial-slider">
      <div class="glider" id="why-glider">
        <?php 
        foreach( $clReviews as $row){ 
        $rating = ( isset($row['rating']) && !empty($row['rating']) ) ? $row['rating'] : 5;
        ?>
        <div class="slide-item">
          <div class="content-box-outer">
            <div class="content-box<?php echo " str-".$rating; ?>">
              <p><?php echo $row['content']; ?></p>
            </div>
            <div class="cust-img-box dis-flex">
              <div class="profile">
              <?php echo pxlGetPtag($row['thumbnail']); ?>
              </div>
              <div class="profile-text">
                <h5><?php echo $row['client_name']; ?></h5>
                <h6><?php echo $row['designation']; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div role="tablist" class="dots"></div>
    </div>
    <?php } ?>
  </div>
</section>
<?php } 
}
?>

<?php 
$whyTrail = get_field('why-trial');
if( isset($whyTrail['is_enable']) && $whyTrail['is_enable'] == "yes" ) :
?>
<section class="icon-with-img-section  padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $whyTrail['section-content']; ?>      
    </div>
    <div class="dis-flex col-box-outer justify-sb  margin-t-50 items-center">
      <div class="flex-2 text-right right-box">
      <?php 
      if( $whyTrail['sec-image'] ){
        echo pxlGetPtag( $whyTrail['sec-image'] );
      }
      ?>              
      </div>
      <div class="flex-2 left-box">
        <div class="dis-flex icon-box-outer">
          <?php
          if( $whyTrail['block'] ){
          foreach($whyTrail['block'] as $row ) {
            $icon = '';
            if( $row['icon'] ){
            $icon = pxlGetPtag( $row['icon'] );  
            }  
            echo '<div class="flex-2 margin-t-50">
            <div class="dis-flex">'.$icon.$row['content'].'</div>
            </div>';
            }  
          }
          ?>          
        </div>
      </div>
    </div>
    <div class="margin-t-70 text-center">
      <span class="txtadd"><?php echo $whyTrail['cta-abv']; ?></span>
      <a class="yellow-btn" href="#contact-sec"><?php echo $whyTrail['cta-text']; ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$whyHire = get_field('why-hire');
if( isset($whyHire['is_enable']) && $whyHire['is_enable'] == "yes" ) :
?>
<section class="why-hire bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $whyHire['section-content']; ?>      
    </div>
    <div class="dis-flex col-box-outer justify-sb margin-t-100 items-center">
      <div class="flex-2 left-box">
          <?php 
          if( $whyHire['block'] ){
            foreach( $whyHire['block'] as $row ) {
            echo '<div class="why-sec">'.$row['text'].'</div>';    
            }
          }
          ?>
      </div>
      <div class="flex-2 text-right right-box">
        <?php 
        if( $whyHire['sec-image'] ){
        echo pxlGetPtag( $whyHire['sec-image'] );
        }
        ?>        
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$hireNeed = get_field('hire-needs');
if( isset($hireNeed['is_enable']) && $hireNeed['is_enable'] == "yes" ) :
?>
<section class="three-column-icon-section bg-white padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $hireNeed['section-content']; ?>      
    </div>
    <?php 
    if( $hireNeed['block'] ){
    echo '<div class="dis-flex col-box-outer">';
    foreach( $hireNeed['block'] as $row ){
    $icon = ( $row['icon'] ) ? pxlGetPtag( $row['icon'], 'dark-light-img' ) : '';
    echo '<div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          '.$icon.$row['content'].'
        </div>
      </div>';
    }  
    echo '</div>';  
    }
    ?>
    <div class="margin-t-70 text-center">
      <span class="txtadd"><?php echo $hireNeed['cta-abv']; ?></span>
      <a class="yellow-btn" href="#contact-sec"><?php echo $hireNeed['cta-text']; ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$hireProcess = get_field('hire-process');
if( isset($hireProcess['is_enable']) && $hireProcess['is_enable'] == "yes" ) :
?>
<section class="process-work bg-cream padding-t-150 padding-b-150">
      <div class="container">
        <div class="dis-flex accordian-row justify-sb">
          <div class="flex-2 col-left">
            <div class="head-txt text-center">
            <?php echo $hireProcess['itop-content']; ?>
            </div>
            <div class="image-wrap">
              <?php 
              if( $hireProcess['sec-image'] ){
                echo '<picture class="soft-img">
                <img loading="lazy" src="'.$hireProcess['sec-image']['url'].'" 
                width="'.$hireProcess['sec-image']['width'].'" height="'.$hireProcess['sec-image']['height'].'" 
                alt="valuecoders">
                </picture>';
              }
              ?>
            </div>
          </div>
          <div class="flex-2 col-right">
            <div class="head-txt text-center"><?php echo $hireProcess['section-content']; ?></div>            
            <?php 
            if( $hireProcess['block'] ){
            echo '<div class="process-step">';
            $p = 0;
            foreach ($hireProcess['block'] as $row){
            $p++;
            $icon = ( $row['icon'] ) ? pxlGetPtag( $row['icon'] ) : '';
            echo '<div class="step-sec dis-flex">
            <div class="step-icon">'.$icon.'</div>
            <div class="step-desc"><span class="step-no">STEP '.$p.'</span>'.$row['content'].'</div>
            </div>';
            }
            echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>

<?php 
$hireModel = get_field('hire-model');
if( isset($hireModel['is_enable']) && $hireModel['is_enable'] == "yes" ) :
?>
<section class="three-column-icon-section bg-white padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $hireModel['section-content']; ?>      
    </div>
    <?php 
      if( $hireModel['block'] ){
      echo '<div class="dis-flex col-box-outer">';
      foreach( $hireModel['block'] as $row ){
      $icon = ( $row['icon'] ) ? pxlGetPtag( $row['icon'] ) : '';
      echo '<div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          '.$icon.'
          <h3>'.$row['title'].'</h3>
          <div class="content-box">
          '.$row['content'].'            
          </div>
        </div>
      </div>';
      }
      echo '</div>';
      }
      ?>    
    <div class="margin-t-70 text-center">
      <span class="txtadd"><?php echo $hireModel['cta-abv']; ?></span>
      <a class="yellow-btn" href="#contact-sec"><?php echo $hireModel['cta-text']; ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
if( isset( $hasTestimonail['is_enable'] ) && ($hasTestimonail['is_enable'] == "yes") ) {
if( isset( $hasTestimonail['position'] ) && ($hasTestimonail['position'] == "bottom") ){
?>
<section class="customer-testimonial-section bg-cream padding-t-150 padding-b-150" id="v4-cust-testimonial">
  <div class="container">
    <div class="head-txt text-center"><?php echo $hasTestimonail['content']; ?></div>
    <?php     
    $clReviews = $hasTestimonail['client-reviews'];
    if( $clReviews ){ 
    ?>
    <div class="glider-contain customer-testimonial-slider">
      <div class="glider" id="why-glider">
        <?php 
        foreach( $clReviews as $row){ 
        $rating = ( isset($row['rating']) && !empty($row['rating']) ) ? $row['rating'] : 5;
        ?>
        <div class="slide-item">
          <div class="content-box-outer">
            <div class="content-box<?php echo " str-".$rating; ?>">
              <p><?php echo $row['content']; ?></p>
            </div>
            <div class="cust-img-box dis-flex">
              <div class="profile">
              <?php echo pxlGetPtag($row['thumbnail']); ?>
              </div>
              <div class="profile-text">
                <h5><?php echo $row['client_name']; ?></h5>
                <h6><?php echo $row['designation']; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div role="tablist" class="dots"></div>
    </div>
    <?php } ?>
  </div>
</section>
<?php } 
}
?>

<?php 
$faqs = get_field('vc-faq');
if( isset($faqs['is_enable']) && $faqs['is_enable'] == "yes" ) :
?>
<section class="faq-section padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center"><?php echo $faqs['section_heading']; ?></div>
    <?php 
      if( $faqs['in-faq'] ){
      	echo '<div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">';
      	$f = 0;
      	foreach( $faqs['in-faq'] as $row ){ $f++;
      		$isActive = ( $f === 1 ) ? " active" : "";
      		echo '<div class="faq-accordion-item-outer '.$isActive.'" itemscope itemprop="mainEntity"
          itemtype="https://schema.org/Question">
          <h3 class="faq-accordion-toggle">'.$row['title'].'</h3>
          <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
            itemtype="https://schema.org/Answer">
            '.$row['text'].'
          </div>
        </div>';
      	}
      	echo '</div>';
      }
      ?>        
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>