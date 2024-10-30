<?php
/*
Template Name: Service V5.0 Template 
*/ 
global $post;
$thisPostID = $post->ID;
$vcBtn 			= get_field('vc-cta', $thisPostID);
get_header();
$template_assets  = get_bloginfo('template_url').'/v5.0/';
$mainServicePage  = 11941;
$cmnBanner        = get_field('sbg-thumbnail');
$bannerImageSrc   = $template_assets.'images/service-banner.png';
if( is_array( $cmnBanner ) ){
$bannerImageSrc = getVcWebpSrcURL( $cmnBanner );
}
?>
<section class="hero-section" style="background-image:url(<?php echo $bannerImageSrc; ?>);">
<div class="container">
  <div class="content-wrap">
    <div class="dis-flex justify-sb">
      <div class="left-box">
        <div class="breadcrumbs">
          <?php 
          $bcCategory = get_field('bc-vcategory');
          $bcTitle    = get_field('bc-title');
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
        <?php the_content(); ?>
        <div class="btn-sec margin-t-50 ">
          <a href="https://www.valuecoders.com/v2wp/contact" class="btn rounded">
          <span class="text-white">Get Free Consulation</span>
          </a>
        </div>
      </div>
      <div class="right-box">
        <div class="card-box">
          <div class="card-top">
            <picture>
              <img loading="lazy" src="<?php echo $template_assets; ?>images/card-image.png" width="" height="" alt="valuecoders">
            </picture>
            <p><strong>Valuecoders'</strong> digital marketing services have been a game-changer for our business, significantly boosting our online.</p>
          </div>
          <div class="ratings">
            <div class="rating">
              <img loading="lazy" src="<?php echo $template_assets; ?>images/5-star.svg" alt="Clutch icon">
              <span>Rated 4.8/5 stars on <strong>G2</strong></span>
            </div>
            <div class="rating">
              <img loading="lazy" src="<?php echo $template_assets; ?>images/5-star.svg" alt="Clutch icon"><span>Rated 4.9/5 stars on <strong>Clutch</strong></span>
            </div>
          </div>
        </div>
        <div class="se-logo-box dis-flex">
          <div class="logo-box logo1"></div>
          <div class="logo-box logo2"></div>
          <div class="logo-box logo3"></div>
          <div class="logo-box logo4"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php get_template_part('inc/cmn', 'startups'); ?>
<section class="fixfull-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="entire-sticky">
      <div class="left-column">
      <?php 
      $specifications = get_field('tech-spec');
      if( isset( $specifications['is_enabled'] ) && ($specifications['is_enabled'] == "yes") ){
      echo '<div class="service-section" id="our-services">';
      echo '<div class="heading">';
      echo $specifications['content'];
      echo '</div>';        
      if( $specifications['specifications'] ){
        echo '<div class="dis-flex margin-t-50 ser-row">';
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

            echo '<div class="flex-2 '.$hasLink.'">
            <div class="card no-bg">
              <div class="box-3">
              <h3>'.$title.'</h3>
              '.$row['content'].'
              '.$learnLink.'
              </div>
            </div>
            </div>';          
          }
        echo '</div>';
      }
      echo '</div>';  
      }
      ?>
      <?php 
      $eOneHeading  = (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : "Let's Discuss Your Project";
      $eOneBody     = (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : "Get free consultation and let us know your project idea to turn it into an amazing digital product.";
      $eOnelt = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : "Book a Free Consultation"; 
      $eCtaOne = '<h2>'.$eOneHeading.'</h2>';
      $eCtaOne .= '<p>'.$eOneBody.'</p>';
      echo expert_talk_cta_v5( $eCtaOne, $eOnelt );
      ?> 

      <?php 
      $sfRow = get_field('sf-type');
      if( isset( $sfRow['is_enabled'] ) && ($sfRow['is_enabled'] == "yes") ){
      echo '<div class="software-work padding-t-70" id="industry">';
      echo '<div class="heading">'.$sfRow['content'].'</div>';
      if( $sfRow['category'] ){
        foreach( $sfRow['category'] as $row ){
        echo '<div class="soft-wrap padding-t-50"><span class="sf-title">'.$row['title'].'</span>
        <div class="dis-flex soft-row">';
          if( $row['in-cards'] ){
              foreach( $row['in-cards'] as $inrow ){
              echo '<div class="flex-2">
                <div class="soft-card">
                <div class="card-header">'.$inrow['content'].'
                <a href="javascript:void(0);" onclick="_expandListing(this);" class="see-more-btn">See More</a>  
                </div>
                </div>
                </div>'; 
              }  
          }
        echo '</div></div>';
        }
      }
      echo '</div>';  
      }  
      ?>
      </div><!--//.left-column-->
      <div class="right-column active" id="valc-toc" style="right: 0px;">
            <div class="toc-sec">
              <h4>Table of Contents</h4>
              <div class="toc-wrap">
                <p><a href="#our-services">Our Services</a></p>
                <p><a href="#portfolio">Portfolio</a></p>
                <p><a href="#about">Why Us</a></p>
                <p><a href="#industry">Industries Served</a></p>
                <p><a href="#techstacks">Tech Stacks</a></p>
                <p><a href="#dev-cost">Development Cost</a> </p>
                <p><a href="#process">Our Process</a></p>
                <p><a href="#hiremodels">Hiring Models</a></p>
                <p><a href="#guide">Guide Topics</a></p>
                <p><a href="#faq">FAQs</a></p>
              </div>
            </div>
            <div class="sticky-button">
              <div class="sticky-cta">
                <p>Have pressing questions about your project?</p>
                <a class="gtexprt" href="#">Get Expert Advice</a>
              </div>
            </div>
          </div>
    </div>
  </div>
</section>
<!-- //END OF TOC Section -->
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
  $whContent .=  '<ul>
  <li>India\'s Top 1% Software Talent</li>
  <li>Trusted by Startups to Fortune 500</li>
  <li>Idea to Deployment, We Handle All</li>
  <li>Time-Zone Friendly: Global Presence</li>
  <li>Top-tier Data Security Protocols</li>
  <li>On-time Delivery, No Surprises</li>
  '.$vcProfile['add-pointers'].'
  </ul>';
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
<section class="indcater-section padding-t-120 padding-b-120">
      <div class="container">
        <div class="head-txt text-center">
          <h2>Industries We Cater To</h2>
          <p>The cost of software development depends on various factors such as service scope, sourcing model.</p>
        </div>
        <div class="dis-flex glider-contain indcater-slider" id="induscater-glider">
          <div class="glider">

            <div class="flex-3 ind-box">
              <div class="ind-column">
                <div class="ind-image">
                  <img loading="lazy" src="<?php echo $template_assets; ?>images/healthcare-ind.png" width="427" height="480" alt="valuecoders">
                  <h3>Healthcare</h3>
                </div>
                <div class="service-content">
                  <h3>Travel & Tourism</h3>
                  <p>Our travel application development team understands the terms...</p>
                  <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                </div>
              </div>
            </div>
            <div class="flex-3 ind-box">
              <div class="ind-column">
                <div class="ind-image small-img">
                  <img loading="lazy" src="<?php echo $template_assets; ?>images/ind-sm01.png" width="426" height="234" alt="valuecoders">
                  <h3>Travel & Tourism</h3>
                </div>
                <div class="service-content">
                  <h3>Travel & Tourism</h3>
                  <p>Our travel application development team understands the terms...</p>
                  <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                </div>
              </div>
              <div class="ind-flex">
                <div class="ind-column w-50">
                  <div class="ind-image small-img">
                    <img loading="lazy" src="<?php echo $template_assets; ?>images/ind-sm02.png" width="203" height="234" alt="valuecoders">
                    <h3>Travel & Tourism</h3>
                  </div>
                  <div class="service-content">
                    <h3>Travel & Tourism</h3>
                    <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                  </div>
                </div>
                <div class="ind-column w-50">
                  <div class="ind-image small-img">
                    <img loading="lazy" src="<?php echo $template_assets; ?>images/ind-sm02.png" width="203" height="234" alt="valuecoders">
                    <h3>Travel & Tourism</h3>
                  </div>
                  <div class="service-content">
                    <h3>Travel & Tourism</h3>
                    <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex-3  ind-box">
              <div class="ind-column">
                <div class="ind-image">
                  <img loading="lazy" src="<?php echo $template_assets; ?>images/healthcare-ind.png" width="427" height="480" alt="valuecoders">
                  <h3>Healthcare</h3>
                </div>
                <div class="service-content">
                  <h3>Travel & Tourism</h3>
                  <p>Our travel application development team understands the terms...</p>
                  <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                </div>
              </div>
            </div>
            <div class="flex-3  ind-box">
              <div class="ind-column">
                <div class="ind-image">
                  <img loading="lazy" src="<?php echo $template_assets; ?>images/healthcare-ind.png" width="427" height="480" alt="valuecoders">
                  <h3>Healthcare</h3>
                </div>
                <div class="service-content">
                  <h3>Travel & Tourism</h3>
                  <p>Our travel application development team understands the terms...</p>
                  <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                </div>
              </div>
            </div>
            <div class="flex-3  ind-box">
              <div class="ind-column">
                <div class="ind-image small-img">
                  <img loading="lazy" src="<?php echo $template_assets; ?>images/ind-sm01.png" width="426" height="234" alt="valuecoders">
                  <h3>Travel & Tourism</h3>
                </div>
                <div class="service-content">
                  <h3>Travel & Tourism</h3>
                  <p>Our travel application development team understands the terms...</p>
                  <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                </div>
              </div>
              <div class="ind-flex">
                <div class="ind-column w-50">
                  <div class="ind-image small-img">
                    <img loading="lazy" src="<?php echo $template_assets; ?>images/ind-sm02.png" width="203" height="234" alt="valuecoders">
                    <h3>Travel & Tourism</h3>
                  </div>
                  <div class="service-content">
                    <h3>Travel & Tourism</h3>
                    <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                  </div>
                </div>
                <div class="ind-column w-50">
                  <div class="ind-image small-img">
                    <img loading="lazy" src="<?php echo $template_assets; ?>images/ind-sm02.png" width="203" height="234" alt="valuecoders">
                    <h3>Travel & Tourism</h3>
                  </div>
                  <div class="service-content">
                    <h3>Travel & Tourism</h3>
                    <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex-3  ind-box">
              <div class="ind-column">
                <div class="ind-image">
                  <img loading="lazy" src="<?php echo $template_assets; ?>images/healthcare-ind.png" width="427" height="480" alt="valuecoders">
                  <h3>Healthcare</h3>
                </div>
                <div class="service-content">
                  <h3>Travel & Tourism</h3>
                  <p>Our travel application development team understands the terms...</p>
                  <div class="cta-box"><a class="stretched-link" href="https://www.valuecoders.com/staging/industries/healthcare-software-development-services">Learn more</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="arrow-btn" id="ind-movers">
            <button aria-label="Previous" class="ind-prev">«</button>
            <button aria-label="Next" class="ind-next">»</button>
          </div>
          <div role="tablist" class="dots"></div>
        </div>
      </div>
    </section>
<?php
$techStacks = get_field('tech-stacks');
if( isset($techStacks['is_enabled']) && ($techStacks['is_enabled'] == "yes") ) :
?>
<section class="tech-stack-section bg-light padding-t-120 padding-b-120" id="techstacks-v5">
  <div class="container">
    <div class="head-txt text-center"><?php echo $techStacks['content']; ?></div>
    <?php 
    if( $techStacks['blocks'] ){
    echo '<div class="dis-flex glider-contain technology-slider" id="technology-glider"><div class="glider">';
    foreach( $techStacks['blocks'] as $row ){
    echo '<div class="flex-3 col-box"><div class="inner-box">'.$row['content'].'</div></div>';
    }
    echo '</div>';
    echo '<button aria-label="Previous" class="tech-prev">«</button>
      <button aria-label="Next" class="tech-next">»</button>
      <div role="tablist" class="dots"></div>';
    echo '</div>';        
    }
    ?>
  </div>
</section>
<?php endif; ?>    

<?php 
$devCost = get_field('dev-cost');
if( isset($devCost['is_enabled']) && ($devCost['is_enabled'] == "yes") ) :
?>
<section class="software-costing padding-t-120 padding-b-120" id="dev-cost">
<div class="container">
<div class="head-txt text-center"><?php echo $devCost['content']; ?> </div>
<?php 
if( $devCost['cards'] ){
echo '<div class="dis-flex costing-outer margin-t-80">';
foreach( $devCost['cards'] as $row ){
echo '<div class="flex-3 col-box">
    <div class="cost-card">
      <div class="normal-content">
        '.vc_pictureElm($row['icon'], $row['title'], 'soft-img').'
        <h3>'.$row['budget'].'</h3>
        <p>'.$row['title'].'</p>
      </div>
      <div class="hover-content bg-royal-linear">
        '.$row['content'].'
        <div class="btn-sec">
        <a href="'.$row['cta'].'" class="btn rounded"><span class="text-white">'.$row['cta-text'].'</span></a>
        </div>
      </div>
    </div>
  </div>';
}
echo '</div>';  
}
?>
</sdiv>
</section>
<?php endif; ?>

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
                </div></div></div>';
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
/*
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
<?php endif; 
*/
?>
<?php 
/*
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
*/

$ourProcess = get_field( 'our-process' );
if( $ourProcess['is_enable'] == 'yes' ) :
$psProcess = ( isset($ourProcess['sec-type']) && ($ourProcess['sec-type'] == "ps") ) ? true : false;  
?>
<section class="development-phase padding-t-120 padding-b-120">
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
$hireModel = get_field('hiring_models');
if( isset($hireModel['is_enabled']) && $hireModel['is_enabled'] == "yes" ) :
?>
<section class="hire-model-tab bg-light padding-t-120 padding-b-120" id="hiremodels">
      <div class="container">
        <div class="heading text-center"><?php echo $hireModel['content']; ?></div>
        <?php 
        if( $hireModel['hiring_cards'] ){
        echo '<div class="hire-tabs-section margin-t-50"><div class="tab-row">';
        echo '<nav id="hiring-models" class="tab-nav"><div class="tab-scroll">';
        $t = 0;
        foreach( $hireModel['hiring_cards'] as $tab){ $t++;
        $active = ( $t === 1 ) ? "active" : ""; 
        echo '<div class="tablist '.$active.'" data-tab="#tab0'.$t.'"><a href="#tab0'.$t.'">'.$tab['title'].'</a></div>';
        }        
        echo '</div></nav>';
        echo '<div class="bcontents">';
        $t = 0;
        foreach( $hireModel['hiring_cards'] as $tab){ $t++;
        //print_r($tab['image']);
        $active = ( $t === 1 ) ? "active" : ""; 
        echo '<div id="tab0'.$t.'" class="tab-contents '.$active.'">
                <div class="dis-flex">
                  <div class="content-box">'.$tab['content'].'</div>
                  <div class="image-box">'.vc_pictureElm($tab['image']).'</div>
                </div>
              </div>';
        }
        echo '</div>';
        echo '</div></div>';
        }
        ?>        
      </div>
    </section>
<?php endif; ?>
<?php 
/*
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
<?php endif; 
*/
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
            // if( $dtIcon && $dtIconwp ){
            // echo '<picture class="dark-theme-img">
            // <source type="image/webp" srcset="'.$dtIconwp['url'].'">
            // <source type="'.$dtIcon['mime_type'].'" srcset="'.$dtIcon['url'].'">
            // <img loading="lazy" src="'.$dtIcon['url'].'" alt="'.$dtIcon['title'].'" width="'.$dtIcon['width'].'" 
            // height="'.$dtIcon['height'].'"> 
            // </picture>';
            // }            
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