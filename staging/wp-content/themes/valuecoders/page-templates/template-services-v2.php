<?php
  /* 
  Template Name: Service Page version-2 Template 
  */ 
  global $post;
  $thisPostID = $post->ID;
  $vcBtn 			= get_field('vc-cta', $thisPostID);
  get_header();
  /*
  Development Notes :
  Main service Page ID is : 11941
  */
  $mainServicePage  = 11941;
  $cmnBanner        = get_field('sbg-thumbnail');
  $bannerImageSrc   = get_bloginfo('template_url').'/v4.0/images/service-banner.png';
  if( is_array( $cmnBanner ) ){
  $bannerImageSrc = getVcWebpSrcURL( $cmnBanner );
  }
  $hasReview = get_field('review-section');
  if( isset( $hasReview['is_enabled'] ) && ($hasReview['is_enabled'] == "yes") ){
  
  ?>
<section class="banner-section padding-t-120 padding-b-120" style="background-image:url(<?php echo $bannerImageSrc; ?>);">
  <div class="container">
    <div class="banner-wrap dis-flex justify-sb">
      <div class="left-sec">
        <div class="breadcrumbs">
          <?php 
            $bcCategory = get_field('bc-vcategory');
            $bcTitle 		= get_field('bc-title');
            if( $bcTitle ){
            $bct = $bcTitle;
            }else{
            $bct = get_the_title();
            }
            
            if( isset( $bcCategory ) && ($bcCategory == "solutions") ){
            echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Solutions</span> '.$bct;		
            }elseif( isset( $bcCategory ) && ($bcCategory == "industries") ){
               echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Industries</span> '.$bct;   
               }
               else{
            echo '<a href="'.get_bloginfo('url').'">Home</a> 
               <a href="'.site_url('/software-development-services-company').'">Services</a> '.$bct;
            }
            ?>
        </div>
        <div class="badges">
          <picture>
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/partner-01.svg" alt="valuecoders"
              width="107" height="60">
          </picture>
          <picture>
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/partner-02.svg" alt="valuecoders"
              width="107" height="60">
          </picture>
          <picture>
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/partner-03.svg" alt="valuecoders"
              width="107" height="60">
          </picture>
          <picture>
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/partner-04.svg" alt="valuecoders"
              width="107" height="60">
          </picture>
        </div>
        <div class="banner-content">
          <?php 
            while( have_posts() ) : the_post();
            	the_content();
            endwhile;	
            ?>
        </div>
        <div class="btn-sec margin-t-50 ">
          <a href="https://www.valuecoders.com/v2wp/contact" class="btn rounded">
          <span class="text-white">Get Free Consulation</span>
          </a>
        </div>
      </div>
      <div class="right-sec">
        <div class="flip-section">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front flip-round">
                <div class="value">91%</div>
                <span class="title">Retention Rate</span>
                <p class="desc">Industry average: 50%</p>
              </div>
              <div class="flip-card-back flip-round">
                <span class="title">WHY IS OUR RETENTION RATE SO HIGH?</span>
                <p class="desc">Scalable solutions Industry specialists Proven results</p>
              </div>
            </div>
          </div>
          <div class="flip-card flip-card-two">
            <div class="flip-card-inner">
              <div class="flip-card-front flip-round">
                <div class="value">93%</div>
                <span class="title">Retention Rate</span>
                <p class="desc">Industry Average:50%</p>
              </div>
              <div class="flip-card-back flip-round">
                <span class="title">WHY IS OUR RETENTION RATE SO HIGH?</span>
                <p class="desc">Scalable solutions Industry specialists Proven results</p>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-card">
          <div class="strt-sec">
            <div class="img-div">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/card-thumb.png">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/card-thumb.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/card-thumb.png"
                  alt="valuecoders" width="88" height="88">
              </picture>
            </div>
            <div class="cont-div">
              <?php echo $hasReview['review-content'];  ?>
            </div>
          </div>
          <div class="clb">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flavia.png" alt="Clutch icon">
            Flavia A, Review from Clutch.co
          </div>
          <div class="ratings">
            <div class="rating">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/5-star.svg" alt="Clutch icon">
              <span>Rated 4.8/5 stars on <strong>G2</strong></span>
            </div>
            <div class="rating">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/5-star.svg" alt="Clutch icon"><span>Rated 4.9/5 stars on <strong>Clutch</strong></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }else{ ?>
<section class="hero-section vlazy" style="background-image:url(<?php echo $bannerImageSrc; ?>);">
  <div class="container">
    <div class="content-wrap">
      <div class="breadcrumbs">
        <?php 
          $bcCategory = get_field('bc-vcategory');
          $bcTitle 		= get_field('bc-title');
          if( $bcTitle ){
          $bct = $bcTitle;
          }else{
          $bct = get_the_title();
          }
          
          if( isset( $bcCategory ) && ($bcCategory == "solutions") ){
          echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Solutions</span> '.$bct;		
          }elseif( isset( $bcCategory ) && ($bcCategory == "industries") ){
             echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Industries</span> '.$bct;   
             }
             else{
          echo '<a href="'.get_bloginfo('url').'">Home</a> 
             <a href="'.site_url('/software-development-services-company').'">Services</a> '.$bct;
          }
          ?>
      </div>
      <div class="for-client-logo-box dis-flex">
        <div class="logo-box logo1"></div>
        <div class="logo-box logo2"></div>
        <div class="logo-box logo3"></div>
        <div class="logo-box logo4"></div>
      </div>
      <div class="dis-flex">
        <div class="left-box">
          <?php 
            while( have_posts() ) : the_post();
            	the_content();
            endwhile;	
            ?>
          <?php cmnCTA_v3('Book a Free Consultation', false); ?>          
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>	
<div class="slide-logo  dis-flex items-center justify-sb">
  <div class="container">
    <div class="dis-flex">
      <div class="logo-heading">
        <h4><span>Trusted by startups and Fortune <strong>500</strong> companies</span></h4>
      </div>
      <div class="logo-section">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/startup-image.svg" alt="valuecoders"
            width="1232" height="189">
        </picture>
      </div>
    </div>
  </div>
</div>
<?php  	
  // tech Specification in accordian format.
  $specifications = get_field('tech-spec');
  if( isset( $specifications['is_enabled'] ) && ($specifications['is_enabled'] == "yes") ){ 
  $htContent 	  = $specifications['content'];
  $content 	    = $specifications['content'];
  $sectionType 	= (isset($specifications['specifications']) && (count($specifications['specifications']) > 6)) ? 'accordian' : 'tab';
  
  $spec = ( $specifications['specifications'] ) ? $specifications['specifications'] : false;
  if( $sectionType == "tab" ){
  ?>
<section class="service-tab padding-t-120 padding-b-120" id="v3-tech-spec">
  <div class="container">
    <div class="heading text-center">
      <?php echo $content; ?>
    </div>
    <div class="service-tabs-section margin-t-80">
      <div class="tab-row">
        <?php 
        if( $spec ){
        echo '<nav id="service-tabs" class="tab-nav"><div class="tab-scroll">';
        $tc = 0;
        foreach( $spec as $row ){ $tc++;
          $active = ( $tc === 1 ) ? ' active' : '';
          echo '<div class="tablist '.$active.'" data-tab="#tab0'.$tc.'"><a href="#tab0'.$tc.'">
              '.$row['title'].'</a>
            </div>'
        }
        echo '</nav></div>';  

        echo '<div class="bcontents">';
        $tc = 0;
        foreach( $spec as $row ){ $tc++;
        $active = ( $tc === 1 ) ? ' active' : '';
        $picture = ( $row['image'] ) ? vc_pictureElm( $row['image'], $row['title'] ) : '';
        $link = ( $row['link'] ) ? '<div class="know-more-link"><a href="'.vc_siteurl($row['link']).'">Know More</a></div>' : '';
        echo '<div id="tab0'.$tc.'" class="tab-contents '.$active.'">
            <div class="dis-flex">
              <div class="image-box">'.$picture.'</div>
              <div class="content-box">'.$row['content'].$link.'</div>
            </div>
          </div>';
        echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>
<?php 
  }else{ 
  ?>
<section class="accordion-section padding-t-120" id="vc-tech-spec">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $specifications['content']; ?></div>
      <div class="image-wrap">
        <?php 
          if( $specifications['image'] ){
            echo vc_pictureElm( $specifications['image'], 'ValueCoders', 'soft-img' );
          }else{ 
          ?>
        <picture class="soft-img">
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/services-main.webp">
          <source type="image/jpg" srcset="<?php bloginfo('template_url'); ?>/dev-img/services-main.jpg">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/services-main.jpg" width="1200" 
            height="1250" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
    <div class="col-right padding-b-120">
      <?php 
        if( $specifications['specifications'] ){
          $g = 0;
          foreach( $specifications['specifications'] as $row ){ 
            $g++;
            $isActive = ( $g == 1 ) ? " active" : "";
            $title    = ($row['link']) ? '<a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a>' : '';
            $hasAnchor = (isset($row['link']) && !empty($row['link'])) ? 'has-link' : '';
            echo '<div class="accordionItem'.$isActive.'">
            <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$row['title'].'</span>'.$title.'</h3>
            <div class="accordion-content">
            <p>'.$row['text'].'</p>
            </div>
            </div>';    
          }
        }
        ?>
    </div>
  </div>
</section>
<?php 
  }
  }
  ?>

<section class="lets-discuss-cta bg-blue-linear padding-t-70 padding-b-70">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-sec">
        <div class="head-txt">
					<h2><?php 
					echo (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : 
					"Transform Your Business Today"; ?>
					</h2>
					<p>
					<?php 
					echo (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : 
					"Discover bespoke IT solutions for unparalleled business growth."; 
					?></p>
        </div>
        <div class="btn-sec margin-t-50">
        <a href="<?php echo site_url('/contact'); ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
        </div>
      </div>
      <div class="right-sec">
        <picture class="icon-box">
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/cta-image.png">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/cta-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cta-image.png" alt="valuecoders" width="345" 
          height="206">
        </picture>
      </div>
    </div>
  </div>
</section>


<?php get_template_part('include/why', 'hirev4.0'); ?>


<section class="counter-column-section bg-blue-linear padding-t-70 padding-b-70">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-sec">
        <div class="head-txt">
				<h2>
				<?php 
				echo (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : 
				"Got a Project in Mind? Tell Us More"; ?>
				</h2>
				<p>
				<?php 
				echo (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : 
				"Drop us a line and we'll get back to you immediately to schedule a call and discuss your needs personally."; ?>				
				</p>
        </div>
        <div class="btn-sec margin-t-50">
        <a href="<?php echo site_url('/contact'); ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
        </div>
      </div>
      <div class="right-sec">
        <div class="cir-sec">
          <div class="cir-box">
            <div class="text-wrap">
              <span class="display">675+</span>
              <span class="paragraph">Full-time Staff</span>
              <svg viewBox="0 0 100 100" class="animate-spin-slow wheel-sc">
                <path id=":R8pm9la:" fill="none" d="M0,50a50,50 0 1,1 100,0a50,50 0 1,1 -100,0"></path>
                <text class="origin-center">
                  <textPath class="fill-text" textLength="292" href="#:R8pm9la:">projects executed successfully</textPath>
                </text>
              </svg>
            </div>
          </div>
          <div class="cir-box">
            <div class="text-wrap">
              <span class="display">19+</span>
              <span class="paragraph">Years Experience</span>
              <svg viewBox="0 0 100 100" class="animate-spin-slow wheel-sc">
                <path id=":R8pm9lb:" fill="none" d="M0,50a50,50 0 1,1 100,0a50,50 0 1,1 -100,0"></path>
                <text class="origin-center">
                  <textPath class="fill-text" textLength="292" href="#:R8pm9lb:">Years Of Experience in this feild</textPath>
                </text>
              </svg>
            </div>
          </div>
          <div class="cir-box">
            <div class="text-wrap">
              <span class="display">2500+</span>
              <span class="paragraph">Satisfied <br>Customers</span>
              <svg viewBox="0 0 100 100" class="animate-spin-slow wheel-sc">
                <path id=":R8pm9lc:" fill="none" d="M0,50a50,50 0 1,1 100,0a50,50 0 1,1 -100,0"></path>
                <text class="origin-center">
                  <textPath class="fill-text" textLength="292" href="#:R8pm9lc:">Total No. of Satisfied Customers</textPath>
                </text>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
  $tailTech = get_field('tailored_tech');
  if( isset($tailTech['is_enabled'] ) && ($tailTech['is_enabled'] == "yes") ) :
  ?>
<section class="tailored-tech padding-t-120 padding-b-120">
      <div class="container">
        <div class="dis-flex tailored-out">
          <div class="left-section">
            <div class="flex-1">
              <div class="heading">
			  <?php echo $tailTech['top_content']; ?>
              </div>
            </div>
          </div>
          <div class="dis-flex tailored-slider" id="tailored-slide">
            <div class="glider" id="glider">


              <div class="flex-3">
                <div class="box-3" style="background-image:url(<?php bloginfo('template_url'); ?>/v4.0/images/tech-image.png);">
                  <h3>Startups</h3>
                  <div class="overlay-text">
                    <div class="over-img">
                      <picture>
                        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/tech-01.png">
                        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/tech-01.png">
                        <img class="icon" loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/tech-01.png"
                          alt="valuecoders" width="40" height="40">
                      </picture>
                    </div>
                    <h3>Startups</h3>
                    <p>Accelerate your startup’s growth with tailor-made software solutions designed to streamline operations and scale your business effectively.</p>
                  </div>
                </div>
              </div>
              
             
            </div>
          </div>
          <div role="tablist" class="dots"></div>
          <div class="prev-next-btn">
            <button class="glider-prev tail-prev" aria-disabled="false"></button>
            <button class="glider-next tail-next" aria-disabled="false"></button>
          </div>
        </div>
      </div>
    </section>


	<?php endif; ?>



<?php getCmnIndustriesv4(); ?>
<?php
  $guideTopics 	= get_field('guide-topics');
  $gtEnabled 		= $guideTopics['is_enabled'];
  if( $gtEnabled == 'yes' ) :
  ?>
<section id="has-ug" class="tab-scroll-section padding-t-120 padding-b-120 <?php echo $guideTopics['sc_background']; ?>">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $guideTopics['content']; ?>
    </div>
    <?php 
      $topics = $guideTopics['topics'];
      if( $topics ) :
      ?>
    <div id="scroll-box" class="dis-flex margin-t-100 tab-contents">
      <div class="left-tabs" id="left-scroll">
        <div class="sticky-tab">
          <span class="tab-head clr-white">Guide Topics</span>
          <div class="tab-nav">
            <?php 
              $tn = 0;
              foreach( $topics as $topicNav ){
              	$tn++;
              	$isActive = "";
              	if( $tn == 1 ){
              		$isActive = "is-active";
              	}
              	echo '<a href="#ug'.$tn.'" class="tab-link">'.$topicNav['title'].'</a>';
              } 
              ?>
          </div>
        </div>
      </div>
      <div class="right-tabs" id="right-scroll">
        <?php 
          $tn = 0;
          foreach( $topics as $topicText ){
          	$tn++;
          	$isActive = "";
          	if( $tn == 1 ){
          		$isActive = "is-active";
          	}
          	echo '<div class="tab-content" id="ug'.$tn.'">'.$topicText['text'].'</div>';
          } 
          ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<!-- Hire Model #Starts Here -->
<?php 
  $hireModel 			  = get_field('hiring_models');
  $hireModelEnable 	= $hireModel['is_enabled'];
  $secTheme         = (isset($hireModel['sc_background']) && !empty($hireModel['sc_background'])) ? $hireModel['sc_background'] : '';
  if( ($hireModelEnable == 'yes') && !is_page( $mainServicePage ) ) : 
  if( is_page( 10158 ) ) {
  ?>
<section class="hiring-models padding-t-120 padding-b-120 <?php echo $secTheme; ?>" id="vc-hiring_models" id="vc-hiring_models">
  <div class="container">
    <div class="head-txt text-center">
      <h2><?php echo $hireModel['section_title_hiring_model']; ?></h2>
      <p><?php echo $hireModel['section_description_hiring_model']; ?></p>
    </div>
    <?php 
      $hCards = $hireModel['hiring_cards'];
      if( $hCards ) : ?>
    <div class="dis-flex col-box-outer asp-net-usage-sprite">
      <?php 
        $h = 1; 
        foreach( $hCards as $row ) {
        ?>
      <div class="flex-3 box-3">
        <div class="box bg-blue-opacity-light">
          <?php 
            $dtIcon = $row['icon-dt'];
            $dtIconwp = $row['icon-dt-webp'];
            if( $dtIcon && $dtIconwp ){
            echo '<picture class="dark-theme-img">
            <source type="image/webp" srcset="'.$dtIconwp['url'].'">
            <source type="'.$dtIcon['mime_type'].'" srcset="'.$dtIcon['url'].'">
            <img loading="lazy" src="'.$dtIcon['url'].'" alt="'.$dtIcon['title'].'" width="'.$dtIcon['width'].'" 
            height="'.$dtIcon['height'].'"> 
            </picture>';
            }
            
            $ltIcon = $row['icon-lt'];
            $ltIconwp = $row['icon-lt-webp'];
            if( $ltIcon && $ltIconwp ){
            echo '<picture class="lighter-theme-img">
            <source type="image/webp" srcset="'.$ltIconwp['url'].'">
            <source type="'.$ltIcon['mime_type'].'" srcset="'.$ltIcon['url'].'">
            <img loading="lazy" src="'.$ltIcon['url'].'" alt="'.$ltIcon['title'].'" width="'.$ltIcon['width'].'" 
            height="'.$ltIcon['height'].'"> 
            </picture>';
            }
            ?>
          <?php echo $row['content']; ?>
        </div>
      </div>
      <?php $h++; 
        } 
        ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php 
  }else{
  	hireModelCmn( $secTheme );
  } 
  endif; 
  ?>
<?php getPageCaseStudiesV3( $thisPostID ); ?>
<?php 
  /*
  $blogSec = get_field('bposts');
  if( $blogSec ){
  	if( isset( $blogSec['is_enabled'] ) && ($blogSec['is_enabled'] == "yes") ){
  		$bTheme = ( isset($blogSec['sc_background']) && !empty( $blogSec['sc_background'] ) ) ? $blogSec['sc_background'] 
  		: 'bg-dark-theme';
  		$tagSlug = ( isset($blogSec['tag-pslug']) && !empty( $blogSec['tag-pslug'] ) ) ? $blogSec['tag-pslug'] : '';
  		vcShowLatestPosts($bTheme, $tagSlug );
  	}
  }
  */ 
  ?>
<?php 
  $faqs 		= get_field('faq-group');
  $faqEnable 	= $faqs['is_enabled'];
  if( $faqEnable == "yes" ) :
  ?>
<section class="faq-section padding-t-120 padding-b-120" data-nosnippet>
  <div class="container">
    <div class="head-txt text-center"><?php echo $faqs['content']; ?></div>
    <?php 
      if( $faqs['faq'] ){
      	echo '<div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">';
      	$faqCount = 0;
      	foreach ($faqs['faq'] as $row){ $faqCount++;
      		$isActive = "";
      		if( $faqCount <= 3 ){
      			$isActive = "active";
      		}
      		echo '<div class="faq-accordion-item-outer '.$isActive.'" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
      			<h3 class="faq-accordion-toggle" itemprop="name">'.$row['title'].'</h3>
      			<div class="faq-accordion-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">'.$row['text'].'</div></div>
      		</div>';
      	}
      	echo '</div>';
      } 
      ?>
  </div>
</section>
<?php endif; ?>
<?php if( is_page( 11149 ) ){ ?>
<section class="table-list-section bg-light padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Comparative Analysis : In-House, Freelancers Or ValueCoders</h2>
      <p>There are many options available for hiring your IT talent. Some of these options are hiring an in-house talent, working with freelancers, or get offshore experts with us. Let’s do a comparative analysis of these options:</p>
    </div>
    <div class="dis-flex col-box-outer margin-t-100">
      <div class="flex-4 table-list">
        <ul>
          <li class="title clr-white">Factor</li>
          <li>Time to get right developers</li>
          <li>Time to start a project</li>
          <li>Recurring cost of training & benefits</li>
          <li>Time to scale size of the team</li>
          <li>Pricing (weekly average)</li>
          <li>Project failure risk</li>
        </ul>
      </div>
      <div class="flex-4 table-list bg-row-yellow">
        <ul>
          <li class="title">ValueCoders</li>
          <li>1 day - 2 weeks</li>
          <li>1 day - 2 weeks</li>
          <li>0</li>
          <li>1 day - 2 weeks</li>
          <li>1.5X</li>
          <li>Extremely low, we have a 98% success rate</li>
        </ul>
      </div>
      <div class="flex-4 table-list">
        <ul>
          <li class="title clr-white">In - House</li>
          <li>4 - 12 weeks</li>
          <li>2 - 10 weeks</li>
          <li>$10,000 -$30,000</li>
          <li>4 - 16 weeks</li>
          <li>2X</li>
          <li>Low</li>
        </ul>
      </div>
      <div class="flex-4 table-list">
        <ul>
          <li class="title clr-white">Freelance</li>
          <li>1 - 12 weeks</li>
          <li>1 - 10 weeks</li>
          <li>0</li>
          <li>1 - 12 weeks</li>
          <li>1X</li>
          <li>Very High</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php cmnTestimonials_v3( $thisPostID ); ?>
<?php get_footer(); ?>