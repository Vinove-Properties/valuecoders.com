<?php 
  /*
  Template Name: Template V4.12 - Dec.22
  */
  get_header();
  global $post;
  $webpDir = WP_CONTENT_DIR.'/uploads-webpc/uploads/';
  $webpUrl = content_url().'/uploads-webpc/uploads/';
  ?>
<section class="banner-img-section">
  <picture class="main--featured--image__wrapper">
    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.webp">
    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.png">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-image.png" alt="Valuecoders" width="1920" height="920">
  </picture>
  <img class="bannerboy" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/banner-boy.svg" alt="Valuecoders">
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
        <div class="margin-t-50">
          <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo get_field('banner-cta'); ?></a>
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
        endwhile;
        
        $btnText      = get_field('form-btn');
        $headingText  = get_field('form-heading');
        
        if( empty($btnText) ){
        $btnText = "Hire Software Developers";  
        }
        
        if( empty($headingText) ){
        $headingText = '<h2>Connect with Us</h2><p>Get No Obligation Free Quote!</p>';
        }
        get_template_part( 'assets-v2/include/cmn', 'form', ['btn_text' => $btnText, 'frm-heading' => $headingText] );
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
<!--Counter Section-->
<section class="count-box-section bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <h2>What Makes ValueCoders Different</h2>
    </div>
    <div class="count-box-outer dis-flex margin-t-80">
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">18</span>+</span>
        <span class="count-box-small">Years Experience</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">650</span>+</span>
        <span class="count-box-small">Fulltime Developers</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2000</span>+</span>
        <span class="count-box-small">Man Years Exp</span>
      </div>
      <div class="count-box flex-4">
        <span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2500</span>+</span>
        <span class="count-box-small">Satisfied Customers</span>
      </div>
    </div>
  </div>
  </div>
</section>
<!--Counter Section End-->
<?php 
  $whyVC = get_field('why-choosevc');
  if( isset($whyVC['is_enable']) && ($whyVC['is_enable'] == "yes") ) :
  ?>  
<!--Three Reasons Section Start Here-->
<section class="icon-with-img-section three-reasons padding-t-150 padding-b-150">
  <div class="container">
    <div class="dis-flex">
      <div class="flex-2 text-box">
        <?php echo $whyVC['heading']; ?>
        <?php 
          if( $whyVC['point'] ){
          echo '<div class="countrow margin-t-60">'; 
            foreach( $whyVC['point'] as $row ){
              echo '<div class="countcol"> <div class="nocount"><i></i></div> '.$row['text'].'</div>';
            }  
          echo '</div>'; 
          }
          ?>            
        <div>
          <div class="btn-center">  
            <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $whyVC['cta-text']; ?></a>
          </div>
        </div>
      </div>
      <div class="flex-2 right-box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/three-reasons-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/three-reasons-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/three-reasons-image.png" alt="Valuecoders" width="848" height="699"> 
        </picture>
      </div>
    </div>
  </div>
</section>
<!--Three Reasons Section End Here-->
<?php endif; ?>
<?php 
  $clientele = get_field('clientele');
  if( isset($clientele['is_enable']) && ($clientele['is_enable'] == "yes") ) :
  ?>
<!--We Worked Section End Here-->
<section class="icon-with-img-section we-worked padding-t-70 padding-b-70">
  <div class="container">
    <div class="dis-flex">
      <div class="flex-2 left-box">
        <?php 
          if( $clientele['image'] ){
            echo pxlGetPtag( $clientele['image'] );
          }else{ ?>
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/client-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/client-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/client-image.png" alt="Valuecoders" width="716" height="507"> 
        </picture>
        <?php } ?>
      </div>
      <div class="flex-2 text-box">
        <?php echo $clientele['content']; ?>
        <div class="margin-t-70 btn-center btndesk">
          <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $clientele['cta-txt']; ?></a>
        </div>
      </div>
    </div>
    <div class="margin-t-70 btn-center btnmob">
      <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $clientele['cta-txt']; ?></a>
    </div>
  </div>
</section>
<!--We Worked Section End Here-->
<?php endif; ?>
<?php 
  $vcAwards = get_field('vc-awards');
  if( isset($vcAwards['is_enable']) && ($vcAwards['is_enable'] == "yes") ) :
  ?>
<!--Home Award Start Here-->
<section class="home-award-slider-section margin-t-60  padding-b-150">
  <div class="container">
    <div class="dis-flex home-award-slider-outer">
      <div class="flex-2">
        <div class="head-txt">
          <?php echo $vcAwards['content']; ?>
          <div class="margin-t-50 btn-center btndesk">
            <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $vcAwards['cta-txt']; ?></a>
          </div>
        </div>
      </div>
      <div class="flex-2">
        <div id="hasHome-award-slider" class="glider-contain home-award-slider">
          <div class="glider">
            <div class="slide-item">
              <div class="dis-flex">
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/cmmi-l3.png"
                      alt="Valuecoders" width="112" height="80">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-9.png"
                      alt="Valuecoders" width="69" height="69">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-2.png"
                      alt="Valuecoders" width="124" height="67">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box ">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-1.png"
                      alt="Valuecoders" width="166" height="69">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"  src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-12.png" alt="Valuecoders" width="60" height="78">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box ">
                    <img loading="lazy"  src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-13.png" alt="Valuecoders" width="52" height="87">
                  </div>
                </div>
              </div>
            </div>
            <div class="slide-item">
              <div class="dis-flex">
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light8.png"
                      alt="Valuecoders" width="105" height="89">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-14.png"
                      alt="Valuecoders" width="126" height="81">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-15.png"
                      alt="Valuecoders" width="126" height="81">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box ">
                    <img loading="lazy"
                      src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-16.png"
                      alt="Valuecoders" width="126" height="81">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box">
                    <img loading="lazy"  src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/home-award-for-light-17.png"
                      alt="Valuecoders" width="126" height="81">
                  </div>
                </div>
                <div class="flex-3">
                  <div class="logo-box ">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/award-slider/life-hacker.png" 
                      alt="Valuecoders" width="155" height="38">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div role="tablist" class="dots"></div>
        </div>
      </div>
    </div>
    <div class="margin-t-50 btn-center btnmob">
      <a class="yellow-btn pop-up" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $vcAwards['cta-txt']; ?></a>
    </div>
  </div>
</section>
<!--Home Award End Here-->
<?php endif; ?>
<?php 
  $hasTestimonail = get_field('cl-testimonials');
  if( isset( $hasTestimonail['is_enable'] ) && ($hasTestimonail['is_enable'] == "yes")  ) {
  
  ?>
<section class="customer-testimonial-section bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $hasTestimonail['content']; ?>            
    </div>
    <?php 
      $clReviews = get_field('client-review-v4', 'option');
      if( $clReviews ){ 
      ?>
    <div class="glider-contain customer-testimonial-slider">
      <div class="glider" id="glider">
        <?php 
          $sCount = 0;
          foreach( $clReviews as $row){ 
          $sCount++;
          $rating = ( isset($row['rating']) && !empty($row['rating']) ) ? $row['rating'] : 5;
          if( $sCount === 3 ) :
          ?>
        <div class="slide-item" id="DefClutch">
          <div class="content-box-outer">
            <div class="content-box">
              <p>"ValueCoders is a top performer in several Clutch categories receiving top reviews from its clients."</p>
              <br>
              <br>
            </div>
            <div class="cust-img-box dis-flex txt-center">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/clutch-image.png" alt="Valuecoders" width="242" height="106">
            </div>
          </div>
        </div>
        <?php endif; ?>  
        <div class="slide-item">
          <div class="content-box-outer">
            <div class="content-box">
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
  $stacks = get_field('dev-stacks');
  if( isset($stacks['is_enable']) && ($stacks['is_enable'] == "yes") ) :
  ?>
<section class="three-column-icon-section tools-developer padding-t-150 padding-b-150">
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
<?php get_footer(); ?>