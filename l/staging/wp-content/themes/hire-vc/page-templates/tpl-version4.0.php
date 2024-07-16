<?php 
/*
Template Name: Template V4 - New Design  
*/
get_header();
global $post;
$webpDir  = WP_CONTENT_DIR.'/uploads-webpc/uploads/';
$webpUrl  = content_url().'/uploads-webpc/uploads/';

$dmOpt    = get_field('is_dmtpl');
$isDmPage = ( $dmOpt && ($dmOpt == "yes") ) ? true : false;

$MEtmp    = get_field('isme-tpl');
$isMEPage = ( $MEtmp && ($MEtmp == "yes") ) ? true : false;

$bookCall     = get_field('bac-btn');
$isBookCall   = ( isset( $bookCall ) && ($bookCall == "yes") ) ? true : false;

$tplVar       = get_post_meta( $post->ID, 'layout-v7', true );
$vSeven       = ($tplVar && ($tplVar === "yes")) ? true : false;

if( $isMEPage === true ) { ?>
<section class="banner-img-section mdebanner">
      <?php 
      $seikhImag = get_field('me-bimage');
      if( $seikhImag ){
        echo pxlGetPtag($seikhImag, 'main--featured--image__wrapper');
      }else{
      ?>
      <picture class="main--featured--image__wrapper">
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/seikh-banner.webp">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/seikh-banner.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/seikh-banner.png" alt="Valuecoders" width="1920" height="920">
      </picture>
      <?php } ?>
      <div class="container">
        <div class="two-box">
          <?php while( have_posts()) : the_post(); ?>
          <div class="flex-2">
            <?php the_content(); ?>

            
            <div class="margin-t-50">
              <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);">
              <?php echo get_field('banner-cta'); ?>                  
              </a>
            </div>
          </div>
          <?php endwhile; ?>
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
        'frm-heading' => $headingText] );
        ?>
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
<?php 
}else{   
?>  
<section class="banner-img-section">
  <picture class="main--featured--image__wrapper">
    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.webp">
    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.png">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.png" alt="Valuecoders" width="1920" height="920">
  </picture>
  <img class="bannerboy" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-boy-compress.png" alt="Valuecoders">
  <div class="container">
    <div class="two-box">
      <?php while( have_posts()) : the_post(); ?>
      <div class="flex-2">
        <?php 
          $pTitle = get_field('primary_title');
          if($pTitle){
            echo '<p class="pTitle">'.$pTitle.'</p>';
          }
          the_content(); 
          ?>
        <?php if( $isBookCall === false ) : ?>  
        <div class="margin-t-50">
          <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);">
            <?php echo get_field('banner-cta'); ?>              
            </a>
        </div>
      <?php endif; ?>

        <?php if( $vSeven === false ) : ?>
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
        <?php endif; ?>
      </div>
      <?php 
      endwhile;
    
    $btnText      = get_field('form-btn');
    $headingText  = get_field('frm-heading');      
    
    if( empty($headingText) ){
    $headingText = '<h2>Connect with Us</h2><p>Get No Obligation Free Quote!</p>';
    }
    
    $nonheadingText  = get_field('non-frm-heading');
    if( empty($nonheadingText) ){
    $nonheadingText = '<h2>Connect with Us</h2><p>Get No Obligation Free Quote!</p>';
    }    
    if( empty($btnText) ){
    $btnText = "Hire Software Developers";  
    }
    get_template_part( 'assets-v2/include/cmn', 'form', [
    'btn_text' => $btnText, 
    'dm_page' => $isDmPage, 
    'frm-heading' => $headingText, 
    'call-book' => $isBookCall,
    'non-frm-heading' => $nonheadingText
    ] 
    );
    ?>
    </div>
  </div>
  <?php if( $vSeven === false ) : ?>
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
  <?php endif; ?>
</section>
<?php } ?>
<?php if( $vSeven === true ) : ?>
<div class="overflow-hidden">
<div class="client-logo-box-section dis-flex items-center justify-sb">
  <div class="container">
    <div class="dis-flex">
      <div class="logo-heading">
        <h4>Trusted partner for startups and<br> Fortune 500 companies.</h4>
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/rating-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/rating-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/rating-image.png" alt="Valuecoders" width="325" height="45">
        </picture>
      </div>
      <div class="logo-box-outer">
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-01.svg" alt="Valuecoders" width="77" height="85"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-02.svg" alt="Valuecoders" width="132" height="45"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-03.svg" alt="Valuecoders" width="134" height="22"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-04.svg" alt="Valuecoders" width="85" height="34"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-05.svg" alt="Valuecoders" width="83" height="19"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-06.svg" alt="Valuecoders" width="136" height="40"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-07.svg" alt="Valuecoders" width="121" height="32"></div>
        <div class="logo-box"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/cllogo-08.svg" alt="Valuecoders" width="111" height="17"></div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="count-box-section padding-t-150 padding-b-150">
<div class="container">  
  <div class="head-txt text-center">
    <h2>What Makes ValueCoders Different</h2>
  </div>
  <div class="count-box-outer dis-flex margin-t-80">
    <div class="count-box flex-4">
      <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">19</span>+</span>
      <span class="count-box-small">Years in Business</span>
    </div>
    <div class="count-box flex-4">
      <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">650</span>+</span>
      <span class="count-box-small">Fulltime Developers</span>
    </div>
    <div class="count-box flex-4">
      <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2000</span>+</span>
      <span class="count-box-small">Man Years Experience</span>
    </div>
    <div class="count-box flex-4">
      <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2500</span>+</span>
      <span class="count-box-small">Satisfied Customers</span>
    </div>
  </div>
</div>
</div>
<?php endif; ?>

<?php 
$hasTestimonail = get_field('cl-testimonials');
if( isset( $hasTestimonail['is_enable'] ) && ($hasTestimonail['is_enable'] == "yes")  ) {
?>
<section class="customer-testimonial-section <?php echo ( $vSeven === true ) ? 'bg-cream' : 'bg-white'; ?> padding-t-150 padding-b-150" id="v4-cust-testimonial">
  <div class="container">
    <div class="head-txt text-center"><?php echo $hasTestimonail['content']; ?></div>
    <?php 
    if( $isDmPage === true ){
      $clReviews = get_field('dm-client-reviews');
    }else{
      $clReviews = get_field('client-review-v4', 'option');  
    }

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
<?php } ?>

<?php
if( $vSeven === true ){
$vcValues = get_field('wc-value');
if( isset( $vcValues['is_enable'] ) && ($vcValues['is_enable'] == "yes") ){
?>
<section class="client-animated padding-t-150 padding-b-150">
  <div class="container">
    <div class="dis-flex justify-sb items-center">
      <div class="flex-2 left-box">
        <div class="head-txt"><?php echo $vcValues['section-content']; ?></div>        
      </div>
      <div class="flex-2 right-box">
        <div class="client-section">
          <div class="cl-wrap">
            <div class="regn">North America</div>
            <div class="client-row">
              <div class="client-stack award-animate-slide-to-left hover:pause">
                <ul>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-1.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                 <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-2.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                 <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-3.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-4.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-5.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-6.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/na-logo-7.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>  
                </ul>
              </div>
            </div>
          </div>
          <div class="cl-wrap">
            <div class="regn">Asia Pacific Region</div>
            <div class="client-row">
              <div class="client-stack award-animate-slide-to-right hover:pause">
                <ul>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-1.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-2.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-3.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-4.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-5.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-6.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-7.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ap-logo-8.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="cl-wrap">
            <div class="regn">Europe</div>
            <div class="client-row">
              <div class="client-stack award-animate-slide-to-left hover:pause">
                <ul>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/eu-logo-1.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/eu-logo-2.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/eu-logo-3.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/eu-logo-4.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/eu-logo-5.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                <li>
                <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/eu-logo-6.png" alt="Valuecoders" 
                width="152" height="322">
                </picture>
                </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="cl-wrap">
            <div class="regn">Middle East & Africa</div>
            <div class="client-row">
              <div class="client-stack award-animate-slide-to-right hover:pause">
                <ul>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-1.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-2.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-3.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-4.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-5.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-6.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/me-logo-7.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="cl-wrap">
            <div class="regn">India</div>
            <div class="client-row">
              <div class="client-stack award-animate-slide-to-left hover:pause">
                <ul>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ind-logo-1.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ind-logo-2.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ind-logo-3.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ind-logo-4.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ind-logo-5.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                  <li>
                  <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-images/ind-logo-6.png" alt="Valuecoders" 
                  width="152" height="322">
                  </picture>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }
} 
?>

<?php 
  $whyHire = get_field('why-hire');
  if( isset($whyHire['is_enable']) && $whyHire['is_enable'] == "yes" ) :
  ?>
<section class="icon-with-img-section bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $whyHire['section-content']; ?>
    </div>
    <div class="dis-flex col-box-outer margin-t-100 ">
      <div class="flex-2">
        <div class="dis-flex icon-box-outer">
          <?php 
            if( $whyHire['pointers'] ){
            	foreach( $whyHire['pointers'] as $point ){
            echo '<div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
            <span class="icon">'.pxlGetPtag($point['icon']).'</span>
            <span class="icon-txt">'.$point['title'].'</span>
            </div>
            </div>';            		
            	}
            }
            ?>	
        </div>
      </div>
      <div class="flex-2 text-right right-box">
        <?php 
          $thumbnail = $whyHire['sec-image'];
          if( $thumbnail ){
          	echo pxlGetPtag( $thumbnail );
          }else{
          ?>
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-image.png" alt="Valuecoders" width="781"
            height="518">
        </picture>
        <?php } ?>
      </div>
    </div>
    
    <?php if( $vSeven === false ) : ?>
    <?php 
    if( $isMEPage === true ){
    $vprofile = get_field('vc-mprofile');
    ?>  
    <div class="count-box-section margin-t-70">
    <div class="count-box-outer dis-flex">
      <?php 
      if( $vprofile['vc-counter'] ){
        foreach ($vprofile['vc-counter'] as $row){
          echo '<div class="count-box flex-4">
          <span class="count-box-big">
            <span class="scroll-counter" data-counter-time="1000">'.$row['number'].'</span>+</span>
            <span class="count-box-small">'.$row['title'].'</span>
          </div>';  
        }
      } 
      ?>      
      <!-- 
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">18</span>+</span>
        <span class="count-box-small">Years in Business</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">650</span>+</span>
        <span class="count-box-small">Software Developers</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2000</span>+</span>
        <span class="count-box-small">Man Years Experience</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2500</span>+</span>
        <span class="count-box-small">Satisfied Customers</span>
      </div> 
    -->
    </div>
    </div>
    <?php }else{ ?>
      <div class="count-box-section">
      <div class="count-box-outer dis-flex">
        <div class="count-box flex-4">
          <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">19</span>+</span>
          <span class="count-box-small">Years in Business</span>
        </div>
        <div class="count-box flex-4">
          <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">
          <?php echo ( $isDmPage === true ) ? "100" : "650"; ?></span>+</span>
          <span class="count-box-small"><?php echo ( $isDmPage === true ) ? "Digital Marketers" : "Software Developers"; ?></span>
        </div>
        <div class="count-box flex-4">
          <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2000</span>+</span>
          <span class="count-box-small">Man Years Experience</span>
        </div>
        <div class="count-box flex-4">
          <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2500</span>+</span>
          <span class="count-box-small">Satisfied Customers</span>
        </div>
      </div>
      </div>
    <?php } ?>
    <?php endif; ?>

    <div class="margin-t-70 text-center">
      <span class="txtadd">Talk to our consultants</span>
      <?php 
      $talkCTA = (get_field('talk-cta')) ? get_field('talk-cta') : "Contact us now";
      ?>
      <a class="yellow-btn" href="javascript:void(0);" onclick="showPopFormOp();"><?php echo $talkCTA; ?></a>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
$hireNeeds = get_field('hire-needs');
if( isset($hireNeeds['is_enable']) && $hireNeeds['is_enable'] == "yes" ) :
?>
<section class="three-column-icon-section  <?php echo ( $vSeven === true ) ? 'bg-cream' : 'bg-white'; ?> padding-t-150 padding-b-150" id="acf-hire-needs">
  <div class="container">
    <div class="head-txt text-center">
      <h2><?php echo $hireNeeds['section_heading']; ?></h2>
      <?php echo $hireNeeds['top_content']; ?>
    </div>
    <?php 
      if( $hireNeeds['cards'] ){
      echo '<div class="dis-flex col-box-outer">';	
      foreach( $hireNeeds['cards'] as $card ){
      echo '<div class="flex-3 box-3">
              <div class="box bg-blue-opacity-light">
              	'.pxlGetPtag($card['icon']).'
                  <h3>'.$card['title'].'</h3>
                  <p>'.$card['text'].'</p>
              </div>
          </div>';
      }
      echo '</div>';
      }	
      ?>
    <div class="margin-t-70 text-center">
      <span class="txtadd">Ready to discuss?</span>
      <a class="yellow-btn" href="javascript:void(0);" onclick="showPopFormOp();">
      <?php echo $hireNeeds['cta-text']; ?>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
if( $vSeven === true ){
$hdProcess = get_field('hd-process');
if( isset( $hdProcess['is_enable'] ) && ($hdProcess['is_enable'] == "yes") ){
?>
<section class="process-work padding-t-150 padding-b-150">
<div class="container">
<div class="dis-flex accordian-row justify-sb">
  <div class="flex-2 col-left">
    <div class="head-txt text-center">
      <?php echo $hdProcess['lcontent']; ?>      
    </div>
    <div class="image-wrap">
      <?php 
      if( $hdProcess['l-image'] ){
      echo '<picture class="soft-img">
        <img loading="lazy" src="'.$hdProcess['l-image']['url'].'" width="'.$hdProcess['l-image']['width'].'" height="'.$hdProcess['l-image']['height'].'" alt="valuecoders">
      </picture>';  
      }
      ?>      
    </div>
  </div>
  <div class="flex-2 col-right">
    <div class="head-txt text-center">
      <?php echo $hdProcess['rcontent']; ?>      
    </div>
    <div class="image-wrap">
      <?php 
      if( $hdProcess['r-image'] ){
      echo '<picture class="soft-img">
        <img loading="lazy" src="'.$hdProcess['r-image']['url'].'" width="'.$hdProcess['r-image']['width'].'" height="'.$hdProcess['r-image']['height'].'" alt="valuecoders">
      </picture>';  
      }
      ?>
    </div>
  </div>
</div>
</div>
</section>
<?php }} ?>

<?php 
  $stacks = get_field('dev-stacks');
  if( isset($stacks['is_enable']) && ($stacks['is_enable'] == "yes") ) :
  ?>
<section class="three-column-icon-section tools-developer bg-cream  padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $stacks['section_heading']; ?>
    </div>
    <?php 
      if( $stacks['cards'] ){
      	echo '<div class="dis-flex col-box-outer">';
      	foreach( $stacks['cards'] as $row ){
      	echo '<div class="flex-4 box-4">
      <div class="box">';
      if( $row['icon'] ){
      echo pxlGetPtag($row['icon']);	
      }
      echo $row['text'].
      '</div>
      </div>';	
      }        	
      	echo '</div>';
      }
      ?>
  </div>
</section>
<?php endif; ?>
<?php 
  $developers = get_field('inhouse-developers');
  if( isset($developers['is_enable']) && ($developers['is_enable'] == "yes") ) :
  ?>
<section class="blog-column-section padding-t-150 padding-b-150 bg-white">
  <div class="container">
    <div class="head-txt text-center"><?php echo $developers['section_heading']; ?></div>
    <div class="dis-flex margin-t-100 php-brains-sprite">
      <?php 
        if( $developers['cards'] ){
        $i = 0;	
        foreach( $developers['cards'] as $row ){
        $levelTag = ['bg-blue', 'bg-pink', 'bg-orange'];	
        ?>
      <div class="flex-3 profile-blok-outer">
        <div class="profile-blocks">
          <div class="profile-blocks-inner">
            <span class="<?php echo $levelTag[$i]; ?>">(<?php echo $row['level']; ?>)</span>
            <div class="profile-des-outer dis-flex">
              <?php echo pxlGetPtag($row['icon'], "pofile-pic"); ?>                  
              <div class="profile-des">
                <h3><?php echo $row['name']; ?></h3>
                <span class="exp"><i class="icon icon1"></i> <?php echo $row['experience']; ?></span>
                <span class="project"><i class="icon icon3"></i> <?php echo $row['projects']; ?></span>
              </div>
            </div>
            <?php echo $row['text']; ?>
          </div>
        </div>
      </div>
      <?php 
        $i++;
        }
        }
        ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
  $csSlider = get_field('work-sample');
  if( isset($csSlider['is_enable']) && $csSlider['is_enable'] == "yes" ) :
  ?>
<section class="industry-casestudy-sec padding-t-150 padding-b-150" id="industry">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $csSlider['title']; ?>
    </div>
    <?php 
      if( $csSlider['slides'] ){
      	echo '<div class="case-study-sec margin-t-50">
        <div class="glider-contain">
          <div class="glider industry-case-sec">';
          foreach( $csSlider['slides'] as $row ){
          echo '<div class="slide-item">
              <div class="dis-flex content">
                <div class="caseimg">'.pxlGetPtag($row['thumbnail']).'</div>
                <div class="casetext">'.$row['title'].'</div>
              </div>
            </div>';	
          }
          echo '</div>
          <div class="prev-next-btn">
            <button class="glider-prev"></button>
            <button class="glider-next"></button>
          </div>
        </div>
      </div>';
      }
      ?>
  </div>
</section>
<?php endif; ?>
<?php 
$hireSetps = get_field('col-hirestep');
//print_r($hireSetps); die;
if( isset($hireSetps['is_enable']) && $hireSetps['is_enable'] == "yes" ) :
?>
<section class="step-icon-img-section bg-cream padding-t-150 padding-b-150 <?php echo ( $isDmPage === true ) ? "dm-process" : ""; ?>">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $hireSetps['content']; ?>
    </div>
    <div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
    <?php 
    if( $isDmPage === true ){ ?>
      <div class="flex-4 icon-box">
        <p>Define your project’s scope with our Experts</p>
      </div>
      <div class="flex-4 icon-box">
        <p>Select candidates for the screening process</p>
      </div>
      <div class="flex-4 icon-box">
        <p>Take interview of selected candidates</p>
      </div>
      <div class="flex-4 icon-box final-step">
        <p>Initiate project on-boarding & assign tasks</p>
      </div>
    <?php }else{ ?>    
      <div class="flex-4 icon-box">
        <i class="icon icon1"></i>
        <h3>Inquiry</h3>
        <p>We get on a call to understand your requirements and evaluate mutual fitment.</p>
      </div>
      <div class="flex-4 icon-box">
        <i class="icon icon2"></i>
        <h3>Select Developers</h3>
        <p>We give you access to our 650+ skilled developers to personally interview and select the best candidate for your team.</p>
      </div>
      <div class="flex-4 icon-box">
        <i class="icon icon4"></i>
        <h3>Team Integration</h3>
        <p>Our developers are now a part of your team. Assign tasks and receive daily updates for seamless collaboration and accountability.</p>
      </div>
      <div class="flex-4 icon-box final-step">
        <i class="icon icon5"></i>
        <h3>Team Scaling</h3>
        <p>We provide you with the flexibility to scale your team, whether it be expanding or reducing team size.</p>
      </div>    
    <?php } ?>
    </div>

    <?php 
    /*
    if( !wp_is_mobile() ) : 
    if( $isDmPage === true ){
    ?>
    <picture>
      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/dm-image-i3.webp">
      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/dm-image-i3.png">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/dm-image-i3.png" alt="Valuecoders" width="1620" height="315"> 
    </picture>
    <?php }else{ ?>
      <picture>
      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/our-hiring-process-img-for-lighter2.webp">
      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/our-hiring-process-img-for-lighter2.png">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/our-hiring-process-img-for-lighter2.png" alt="Valuecoders" width="1620" height="315"> 
    </picture>
    <?php } 
    endif; 
    */
    ?>
    <!-- 
    <div class="dis-flex justify-center hiring-step-sprite">
      <div class="flex-4 icon-box text-center not-step">
        <i class="icon icon6"></i>
        <h3>Not Satisfied</h3>
        <?php 
        if( $isDmPage === true ){
          echo '<p>If you are not satisfied with the resource, restart the process with new resources.</p>';
        }else{
          echo '<p>If you are not satisfied with the engineer, we are happy to understand the gap(s) and replace the engineer(s).</p>';
        }
        ?>
      </div>
    </div> 
    -->
    <div class="margin-t-100 text-center">
      <a class="yellow-btn" onclick="showPopFormOp();" href="javascript:"><?php echo $hireSetps['cta-text']; ?> <i class="arrow-icon"></i></a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
if( $isMEPage === true ) { 
$iserve = get_field('inds-weserv');
if( isset($iserve['is_enable']) && $iserve['is_enable'] == "yes" ) :  
?>
<section class="three-column-icon-section ind-serve bg-cream padding-t-150 padding-b-150">
<div class="container">
  <div class="head-txt text-center">
    <h2><?php echo $iserve['section_heading']; ?></h2>
  </div>
  <?php if( $iserve['cards'] ){ ?>
  <div class="dis-flex col-box-outer">
    <?php foreach( $iserve['cards'] as $card ){ ?>
    <div class="flex-5 box-3 text-center">
      <div class="box">
        <?php 
        if($card['icon']){
          echo pxlGetPtag($card['icon']);
        } 
        ?>
        <h3><?php echo $card['title']; ?></h3>
      </div>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
  <div class="margin-t-70 text-center">
    <span class="txtadd">Ready to discuss?</span>
    <a class="yellow-btn" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $iserve['cta-text']; ?></a>
  </div>
</div>
</section>
<?php endif; 
}
?>

<?php 
if( $isDmPage === true ){ 
$hmodel = get_field('hrm-col');
if( isset( $hmodel['enable'] ) && ($hmodel['enable'] == "yes") ) :  
?>
<section class="three-column-icon-section bg-white padding-t-150 padding-b-150 hiring-models-col">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $hmodel['content']; ?>
    </div>
    <div class="dis-flex col-box-outer">
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png" alt="Valuecoders" width="64" height="61">
          </picture>
          <h3>Dedicated Team</h3>
          <div class="content-box">
            <p>It is an expert autonomous team comprising of different roles (e.g. digital marketers, project manager, software engineers, QA engineers, and other roles) capable of delivering technology and marketing solutions rapidly and efficiently. The roles are defined for each specific project and management is conducted jointly by a Scrum Master and the client's product owner.</p>
            <ul>
              <li>Agile processes</li>
              <li>Transparent pricing</li>
              <li>Monthly billing</li>
              <li>Maximum flexibility</li>
              <li>Suitable for startups & enterprises of any industry</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png" alt="Valuecoders" width="64" height="61">
          </picture>
          <h3>Team Augmentation</h3>
          <div class="content-box">
            <p>Suitable for every scale of business and project, team augmentation helps add required talent to you team to fill the talent gap. The augmented team members work as part of your local or distributed team, attending your regular daily meetings and reporting directly to your managers. This helps businesses scale immediately and on-demand.</p>
            <ul>
              <li>Scale on-demand</li>
              <li>Quick & cost-effective</li>
              <li>Monthly billing</li>
              <li>Avoid hiring hassles</li>
              <li>Transparent pricing</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png" alt="Valuecoders" width="64" height="61">
          </picture>
          <h3>Project Based</h3>
          <div class="content-box">
            <span class="content-head">Fixed Price Model:</span>
            <p>When project specifications, scope, deliverables and acceptance criteria are clearly defined, we can evaluate and offer a fixed quote for the project. This is mostly suitable for small-mid scale projects with well documented specifications.</p>
            <span class="content-head">Time & Material Model:</span>
            <p>Suitable for projects that have undefined or dynamic scope requirements or complicated business requirements due to which the cost estimation is not possible. Therefore, digital marketers can be hired per their time.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
endif;
}else{ 
$forceDisble = get_field('disbale-hm');
if( $forceDisble !== "yes" ){
?>
<section class="three-column-icon-section bg-white padding-t-150 padding-b-150 hiring-models-col">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Choose From Our Hiring Models</h2>
      <p>With us, you can choose from multiple hiring models that best suit your needs.</p>
    </div>
    <div class="dis-flex col-box-outer">
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png" alt="Valuecoders" width="64" height="61">
          </picture>
          <h3>Dedicated Team</h3>
          <div class="content-box">
            <p>It is an expert autonomous team comprising of different roles (e.g. project manager, software engineers, QA engineers, and other roles) capable of delivering technology solutions rapidly and efficiently. The roles are defined for each specific project and management is conducted jointly by a Scrum Master and the client's product owner.</p>
            <ul>
              <li>Agile processes</li>
              <li>Transparent pricing</li>
              <li>Monthly billing</li>
              <li>Maximum flexibility</li>
              <li>Suitable for startups, MVPs and software </li>
              <li>product companies</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png" alt="Valuecoders" width="64" height="61">
          </picture>
          <h3>Team Augmentation</h3>
          <div class="content-box">
            <p>Suitable for every scale of business and project, team augmentation helps add required talent to you team to fill the talent gap. The augmented team members work as part of your local or distributed team, attending your regular daily meetings and reporting directly to your managers. This helps businesses scale immediately and on-demand.</p>
            <ul>
              <li>Scale on-demand</li>
              <li>Quick & cost-effective</li>
              <li>Monthly billing</li>
              <li>Avoid hiring hassles</li>
              <li>Transparent pricing</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png" alt="Valuecoders" width="64" height="61">
          </picture>
          <h3>Project Based</h3>
          <div class="content-box">
            <span class="content-head">Fixed Price Model:</span>
            <p>When project specifications, scope, deliverables and acceptance criteria are clearly defined, we can evaluate and offer a fixed quote for the project. This is mostly suitable for small-mid scale projects with well documented specifications.</p>
            <span class="content-head">Time & Material Model:</span>
            <p>Suitable for projects that have undefined or dynamic scope requirements or complicated business requirements due to which the cost estimation is not possible. Therefore, developers can be hired per their time.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}
} ?>


<?php 
$faqs = get_field('vc-faq');
if( isset($faqs['is_enable']) && $faqs['is_enable'] == "yes" ) :
?>
<section class="faq-section bg-cream padding-t-150 padding-b-150">
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