<?php
  /* Nandani
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
  $bannerImageSrc   = get_bloginfo('template_url').'/v3.0/images/service-banner.png';
  if( is_array( $cmnBanner ) ){
  $bannerImageSrc = getVcWebpSrcURL( $cmnBanner );
  }
  $hasReview = get_field('review-section');
  if( isset( $hasReview['is_enabled'] ) && ($hasReview['is_enabled'] == "yes") ){
  $rwThumbnail = ( $hasReview['review_thumb'] ) ? $hasReview['review_thumb'] : 
  get_bloginfo('template_url').'/v4.0/images/card-thumb.png'; 
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
            }
            elseif( isset( $bcCategory ) && ($bcCategory == "industries") ){
            echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Industries</span> '.$bct;   
            }
            elseif(!empty( $bcCategory ) && ($bcCategory === "custom")){
              $cuTitle  = get_field('bc-custitle');
              $cuLink   = get_field('bc-cuslink');
              $bCat     = '<a class="no-after" href="'.vc_siteurl($cuLink).'">'.$cuTitle.'</a> ';
              if( $cuTitle && $cuLink ){
                echo '<a href="'.get_bloginfo('url').'">Home</a> '.$bCat.$thispTitle;  
              }else{
                echo '<a href="'.get_bloginfo('url').'">Home</a> '.$thispTitle; 
              }
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
          <a href="https://www.valuecoders.com/contact" class="btn rounded">
          <span class="text-white">Get Free Consultation</span>
          </a>
        </div>
      </div>
      <div class="right-sec">
        <div class="flip-section">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front flip-round">
                <div class="value">20+</div>
                 <span class="title">YEARS OF EXPERIENCE</span>
                   <!--<p class="desc"> In-house Experts</p>-->
              </div>
              <div class="flip-card-back flip-round">
                <span class="title">DELIVERING PROVEN RESULTS & EXPERTISE</span>
                <!--<p class="desc">Helping Businesses with Digital Transformation</p>-->
              </div>
            </div>
          </div>
          <div class="flip-card flip-card-two">
            <div class="flip-card-inner">
              <div class="flip-card-front flip-round">
                <div class="value">97%</div>
                <span class="title">Client-retention</span>
                <!--<p class="desc">Industry Average:50%</p>-->
              </div>
              <div class="flip-card-back flip-round">
                 <span class="title">Building Lasting Partnerships</span>
                 <!--<p class="desc">Building Lasting Partnerships</p>-->
              </div>
            </div>
          </div>
        </div>
        <div class="hero-card">
          <div class="strt-sec">
            <div class="img-div"> 
            <picture>
            <img loading="lazy" src="<?php echo $rwThumbnail; ?>" alt="valuecoders" width="88" height="88">
            </picture>
            </div>
            <div class="cont-div">
              <?php echo $hasReview['review-content'];  ?>
            </div>
          </div>
          <div class="clb">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flavia.png" alt="Clutch icon">
            Review from Clutch.co
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
<?php } 
get_template_part('inc/cmn', 'startups');
//vcTrustedStartups($thisPostID); 
?>
<?php	
// tech Specification in accordian format.
$specifications = get_field('tech-spec');
if( isset( $specifications['is_enabled'] ) && ($specifications['is_enabled'] == "yes") ){ 
$htContent 	  = $specifications['content'];
$content 	    = $specifications['content'];
$sectionType 	= (isset($specifications['specifications']) && (count($specifications['specifications']) > 6)) ? 'accordian' : 'tab';

if( isset( $specifications['sec-type'] ) && ($specifications['sec-type'] !== "null") ){
  $sectionType = ( $specifications['sec-type'] === "tab" ) ? 'tab' : 'accordian';
}

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
              </div>';
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
          
          }
          echo '</div>';
          }
          ?>
      </div>
    </div>
  </div>
</section>
<?php 
}else{ 
  echo '<section class="tools-developer tech-stack-list padding-t-120 padding-b-120">';
  echo '<div class="container">';
  echo '<div class="heading text-center">'.$specifications['content'].'</div>';  
  if( $specifications['specifications'] ){
  echo '<div class="dis-flex margin-t-80 row">';
  foreach( $specifications['specifications'] as $row ){
    $hasLink = ( isset($row['link']) && !empty($row['link']) ) ? 'has-vlink' : '';
    $title = $row['title'];
    $learnLink = '';
    if( $hasLink ){
    $title = '<a href="'.$row['link'].'">'.$row['title'].'</a>';    
    }
    
    if( isset( $row['link'] ) && !empty( $row['link'] ) ){
    $learnLink = '<div class="exbtn margin-t-50"><a class="explore-btn" href="'.$row['link'].'">Know More</a></div>';  
    }

    echo '<div class="flex-3 '.$hasLink.'">
    <div class="card no-bg"><div class="box-3">
    <h3>'.$title.'</h3>
    '.$row['content'].'
    '.$learnLink.'
    </div></div>
    </div>';
      
  }
  echo '</div>';  
  }
  echo '</div>';
  echo '</section>';
}
}
?>
<?php 
  $eOneHeading  = (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : "Let's Discuss Your Project";
  $eOneBody     = (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : "Get free consultation and let us know your project idea to turn it into an amazing digital product.";
  $eOnelt = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
  "Book a Free Consultation"; 
  $eCtaOne = '<h2>'.$eOneHeading.'</h2>';
  $eCtaOne .= '<p>'.$eOneBody.'</p>';
  echo expert_talk_cta( $eCtaOne, $eOnelt );
  ?>
<?php //get_template_part('include/why', 'hirev4.0'); ?>
<?php  
  $vcProfile = get_field('vc-profile');
  if( $vcProfile ) :
  $vcProfileEnable = $vcProfile['is_enable'];
  if( $vcProfileEnable == "yes" ) { 
  
  $whContent        =  $vcProfile['top-content']; 
  $profileContent   = $vcProfile['content']; 
  $proText          = vCodeRemoveUlTags( $profileContent );
  $whContent .=  $proText;
  if(is_page(19105)){
    $whContent .=  '<ul>
    <li>Customized solutions for unique projects</li>
    <li>97% client satisfaction rate</li>
    <li>Proven track record of success</li>
    <li>Expert team of seasoned professionals</li>
    <li>Comprehensive risk assessment strategies</li>
    <li>Fast turnaround time for prototypes</li>
    <li>Future-focused, scalable solutions guaranteed</li>
    '.$vcProfile['add-pointers'].'
    </ul>';  
  }
  elseif( is_page(19106)){
    $whContent .=  '<ul>
    <li>Trusted by startups to Fortune 500</li>
    <li>97% client satisfaction rate</li>
    <li>Data-driven marketing strategies</li>
    <li>100% transparent reporting</li>
    <li>Experienced industry professionals</li>
    <li>Expertise in all digital channels</li>
    <li>Competitive and flexible pricing</li>
    <li>Omnichannel personalization approach</li>
    '.$vcProfile['add-pointers'].'
    </ul>';
  }
  else{
    $whContent .=  '<ul>
    <li>India\'s Top 1% Software Talent</li>
    <li>Trusted by Startups to Fortune 500</li>
    <li>Idea to Deployment, We Handle All</li>
    <li>Time-Zone Friendly: Global Presence</li>
    <li>Top-tier Data Security Protocols</li>
    <li>On-time Delivery, No Surprises</li>
    '.$vcProfile['add-pointers'].'
    </ul>';  
  }
  get_template_part( 'include/why', 'hirev4.0', ['content' => $whContent] );   
  } 
endif; 

$grwTitle = (isset($vcBtn['title-3']) && !empty($vcBtn['title-3'])) ? $vcBtn['title-3'] : "Unlock Your Growth Potential!";
$grwBody  = (isset($vcBtn['text-3']) && !empty($vcBtn['text-3'])) ? $vcBtn['text-3'] : "Let's break down complex IT issues into actionable solutions you can understand.";
?>

<section class="counter-column-section bg-blue-linear padding-t-70 padding-b-70" id="unlock-growth-cta">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-sec">
        <div class="head-txt">
          <h2><?php echo $grwTitle; ?></h2>
          <p><?php echo $grwBody; ?></p>
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
              <span class="display">20+</span>
              <span class="paragraph">Years Experience</span>
              <svg viewBox="0 0 100 100" class="animate-spin-slow wheel-sc">
                <path id=":R8pm9lb:" fill="none" d="M0,50a50,50 0 1,1 100,0a50,50 0 1,1 -100,0"></path>
                <text class="origin-center">
                  <textPath class="fill-text" textLength="292" href="#:R8pm9lb:">Years Of Experience in this field</textPath>
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
  $tailTech = get_field( 'tailored_tech' );
  if( $tailTech['is_enable'] == 'yes' ) :
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
          <?php 
            if( $tailTech['cards'] ){
            foreach( $tailTech['cards'] as $card ){
              echo '<div class="flex-3">
              <div class="box-3" style="background-image:url('.$card['image'].');">
            <h3>'.$card['title'].'</h3>
            <div class="overlay-text">
            <div class="over-img">
            <img class="icon" alt="'.$card['title'].'" src="'.$card['icon'].'">
            </div>
            '.$card['content'].'
            </div>
            
            
              </div>
              </div>';
              }  
            }
            ?>
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
<?php 
  $techSol = get_field('tech-solutions');
  if( isset( $techSol['is_enabled'] ) && ($techSol['is_enabled'] == "yes") ) :
  ?>
<section class="tools-developer tech-stack-list padding-t-120 padding-b-120 bg-dark-theme">
  <div class="container">
    <div class="heading text-center">
      <?php echo $techSol['content']; ?>
    </div>
    <div class="dis-flex margin-t-80 row">
      <?php 
        if( $techSol['options'] ){
          foreach( $techSol['options'] as $tech){
          echo '<div class="flex-3 '.vcHasAnchor( $tech['content'] ).'">
          <div class="card no-bg"><div class="box-3">'.$tech['content'].'</div></div>
          </div>';
          }
        }
        ?>      
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
$eTwoHeading  = (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : "Got a Project in Mind? Tell Us More";
$eTwoBody     = (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : "Drop us a line and we'll get back to you immediately to schedule a call and discuss your needs personally.";
$eTwolt = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : 
"Talk To Our Experts"; 

$eCtatwo = '<h2>'.$eTwoHeading.'</h2>';
$eCtatwo .= '<p>'.$eTwoBody.'</p>';
if( !is_page( [17422,17425,16003,16004,16062,16066,17235,17236,17239,16065,3725] ) ){
echo expert_talk_cta( $eCtatwo, $eTwolt, 'one', 'padding-t-70 padding-b-70 hide-cta' );
}

$sfMethod = get_field('sf-meth');
if( $sfMethod !== "no" )  :
$psMethod = get_field('ps-methodology');
$sdmethod = [];
if( isset($psMethod['sec-type']) && ($psMethod['sec-type'] == "ps") ){
$sdmethod['content']  = $psMethod['content'];
$sdmethod['cards']    = $psMethod['cards'];
}else{
$sdmethod = get_field('sd-method','option');   
}
?>
<section id="sd-metho" class="develop-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $sdmethod['content']; ?></div>
    <div class="dev-cards margin-t-80">
    <?php 
    if($sdmethod['cards']){
    $ic = 0;  
    foreach( $sdmethod['cards'] as $card){ $ic++;
    $isActive = ( $ic === 1 ) ? ' active' : '';  
    $thumbnail = ( $card['thumbnail'] ) ? valueGetPtag( $card['thumbnail'] ) : '';  
    echo '<div class="card '.$isActive.'">
      '.$thumbnail.'
      <div class="card-info">'.$card['content'].'</div>
      <span class="card-heading">'.$card['title'].'</span>
    </div>';
    }  
    }
    ?>
    </div>
  </div>
</section>
<?php 
endif;

$ourProcess = get_field( 'our-process' );
if( $ourProcess['is_enable'] == 'yes' ) :
$psProcess = ( isset($ourProcess['sec-type']) && ($ourProcess['sec-type'] == "ps") ) ? true : false;  
?>
<section class="development-phase padding-t-120 padding-b-120 bg-dark-theme">
  <div class="container">
    <div class="head-txt text-center">
      <?php 
      if( $psProcess ){
      echo $ourProcess['content'];
      }else{
      echo '<h2>Our Process</h2>
      <p>We specialize in engineering custom software that\'s both stable and secure, using a variety of tech tools.</p>';
      }
      ?>      
    </div>
    <div class="dis-flex col-box-outer margin-t-100">
      <?php 
      if( ($psProcess === true) && $ourProcess['process'] ){
        foreach( $ourProcess['process'] as $pro ){
        echo '<div class="flex-6"><div class="box">';
        echo $pro['content'];
        echo '</div></div>';
        }
      }else{ ?>
      <div class="flex-6">
        <div class="box">
          <h4>Software Kick-off</h4>
          <p>Dive into bi-weekly sprints and rollouts aligned with project timelines.</p>
        </div>
      </div>
      <div class="flex-6">
        <div class="box">
          <h4>Task Execution &<br> Development</h4>
          <p>Combined team tackles tasks, fulfilling user stories and sprint goals.</p>
        </div>
      </div>
      <div class="flex-6">
        <div class="box">
          <h4>Daily<br> Stand-ups</h4>
          <p>Daily check-ins led by the Scrum Master to discuss progress and tackle challenges.</p>
        </div>
      </div>
      <div class="flex-6">
        <div class="box">
          <h4>Feature Quality<br> Check</h4>
          <p>Quality Engineers rigorously test new features, ensuring seamless integration.</p>
        </div>
      </div>
      <div class="flex-6">
        <div class="box">
          <h4>Backlog <br>Updates</h4>
          <p>Our team keeps the sprint backlog updated, staying on track to meet objectives.</p>
        </div>
      </div>
      <div class="flex-6">
        <div class="box">
          <h4>Sprint <br>Reflections</h4>
          <p>Post-sprint reflections to refine strategies and enhance future sprints.</p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
  $inTechnologies = get_field('lt-integration');
  if( isset( $inTechnologies['is_enabled'] ) && ($inTechnologies['is_enabled'] == "yes") ) :
  ?>
<section class="tech-stacks padding-t-120 padding-b-120">
  <div class="container">
    <div class="heading text-center"><?php echo $inTechnologies['content']; ?></div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php 
        if( $inTechnologies['cards'] ){
          foreach( $inTechnologies['cards'] as $row ){
          echo '<div class="flex-3 col-box"><div class="inner-box">'.$row['content'].'</div></div>';
          }
        }
        ?>    
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
if( !is_page( 13436 ) ) {
  getCmnIndustriesv4(); 
}
?>
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
  $guideTopics 	= get_field('guide-topics');
  $gtEnabled 		= $guideTopics['is_enabled'];
  if( $gtEnabled == 'yes' ) :
  ?>
<section id="has-ug" class="tab-scroll-section padding-t-120 padding-b-120  <?php echo $guideTopics['sc_background']; ?>">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $guideTopics['content']; ?>
    </div>
    <?php 
      $topics = $guideTopics['topics'];
      if( $topics ) :
      ?>
    <div id="scroll-box" class="dis-flex margin-t-80 tab-contents">
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
<?php 
  $faqs 		= get_field('faq-group');
  $faqEnable 	= $faqs['is_enabled'];
  if( $faqEnable == "yes" ) :
  ?>
<section class="faq-section padding-t-120 padding-b-120 bg-dark-theme" data-nosnippet>
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
<?php get_template_part('include/testimonials', 'v4.0'); ?>
<?php get_footer(); ?>