<?php
/* 
Template Name: Industry Page V6.0 Template
*/
global $post;
$thisPostID = $post->ID;
get_header();
$bannerImage = get_field("tb-image");
$bannerStyle = "";
if( $bannerImage ){
  $banImage     = getVcWebpSrcURL( $bannerImage );
  $bannerStyle  = ' style="background-image:url(' . $banImage . ');"';
}

$bcTitle = get_field("bc-title");
$bcCategory = get_field("bc-vcategory");
$bCat = $bcCategory === "services" ? "Services" : "Industries";
if( $bcTitle ){
    $bct = $bcTitle;
}else{
    $bct = get_the_title();
}

if( $bcCategory === "custom" ){
    $cuTitle = get_field("bc-custitle");
    $cuLink = get_field("bc-cuslink");
    $bCat ='<a class="no-after" href="'.vc_siteurl($cuLink).'">' .$cuTitle ."</a>";
}

$vcBtn = get_field("vc-cta", $thisPostID);
?>
<section class="hero-section vlazy" style="background-image:url(<?php echo $bannerStyle; ?>);">
  <div class="container">
    <div class="dis-flex">
      <div class="left-box">
        <div class="breadcrumbs">
        <a href="<?php bloginfo("url"); ?>">Home</a> <span><?php echo $bCat; ?></span> <?php echo $bct; ?>
        </div>
        <?php the_content(); ?>
      </div>
    </div>
    <a class="scroll-next" href="#serv"><span class="scroll-downicon">scroll down</span></a>
  </div>
</section>
<?php get_template_part("inc/cmn", "startups"); ?>
<?php get_template_part("inc/scale", "business"); ?>

<?php 
$sdTab   = get_field('tab_section'); 
if( isset($sdTab['is_enabled']) && $sdTab['is_enabled'] === "yes" ) :
if( isset($sdTab['tab-display']) && $sdTab['tab-display'] == "horizontal" ){
  echo '<section class="tab-with-slide padding-t-120 padding-b-120" id="ind-tabslider"><div class="container">';
  echo '<div class="top-section b-100">'.$sdTab['content'].'</div>';

  if( isset($sdTab['tab-loop']) && $sdTab['tab-loop'] ){
    echo '<div class="tab-flex"><div class="tabs-container">';
    echo '<div class="tabs tabs-slider"><div class="tab-scroll glider-contain">';
    echo '<div class="glider" id="glider">';
    $i = 0;
    foreach( $sdTab['tab-loop'] as $tab ){ 
    $i++;
    $isActive = ( $i === 1 )  ? 'active' : '';
    echo '<div class="tab '.$isActive.'" data-target="sol'.$i.'">'.$tab['title'].'</div>';
    }  
    echo '</div>';
    echo '<div role="tablist" class="dots glider-dots">
    <button data-index="0" aria-label="Page 1" role="tab" class="glider-dot active"></button>
    <button data-index="1" aria-label="Page 2" role="tab" class="glider-dot "></button></div>  
    <div class="prev-next-btn">
    <button class="glider-prev" aria-disabled="false"></button><button class="glider-next" aria-disabled="false"></button>
    </div>
    </div>
    </div>

    <div class="tab-content">';
    $i = 0;
    foreach( $sdTab['tab-loop'] as $tab ){ 
    $i++;
    $isActive = ( $i === 1 )  ? 'active' : '';
    echo '<div class="content '.$isActive.'" id="sol'.$i.'">
    <div class="dis-flex">
      <div class="flex-2 img-div">'.vc_pictureElm($tab['image']).'</div>
      <div class="flex-2 content-div">'.$tab['content'].'<a href="#" class="is-arrow">Learn More</a></div>
    </div>
    </div>';
    }  
    echo '</div>';
    echo '</div></div><!--//tabs-container-->';  
  }
  echo '</div><!--//container--></section>';  
}else{
  echo '<section class="data-drivetab padding-t-120 padding-b-120" id="solution-tab"><div class="container">';
  echo '<div class="top-section b-100">'.$sdTab['content'].'</div>';
  echo '<div class="data-driving">';
  echo '<div class="left-panel"><div class="accordion">';
  $i = 0;
  foreach( $sdTab['tab-loop'] as $tab ){ 
  $i++;
  $isActive = ( $i === 1 )  ? 'active' : '';
  echo '<div class="home-accordion-item '.$isActive.'"><h3 class="home-accordion-title">'.$tab['title'].'</h3></div>';
  }
  echo '</div><a href="#" class="is-arrow">Explore all Features</a></div>';

  echo '<div class="right-panel">';
  $i = 0;
  foreach( $sdTab['tab-loop'] as $tab ){ 
  $i++;
  $isActive = ( $i === 1 )  ? 'active' : '';
  echo '<div class="acr-panel '.$isActive.'" id="acr-panel-'.$i.'">'.$tab['content'].'<a href="#" class="is-arrow">Explore all Features</a></div>';
  }
  echo '</div>';
  echo '</div><!--//.data-driving-->';
  echo '</div></section>';
}
endif; 

?>
<?php 
$ctaOne = get_field('blockcta-1');
if( isset($ctaOne['required']) && ($ctaOne['required'] == "yes") ) :
?>
<section class="cta-section">
  <div class="container">
    <div class="cta-wrap">
      <div class="left-sec">
        <div class="top-section"><?php echo $ctaOne['content']; ?></div>
      </div>
      <div class="right-sec">
        <?php 
          if( $ctaOne['thumb'] ){
            echo vc_pictureElm( $ctaOne['thumb'] );
          }else{
          ?>
        <picture>
          <source type="image/webp" srcset="<?php _vers_six('images/home-images/cta-image.png'); ?>">
          <img loading="lazy" src="<?php _vers_six('images/home-images/cta-image.png'); ?>" width="420" height="394" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
$solGrid = get_field('solutions');
if( isset($solGrid['is_enabled']) && ($solGrid['is_enabled'] == "yes") ) :
  if( isset($solGrid['type']) &&  ($solGrid['type'] === "grid") ){
    echo '<section class="services-three-column-section padding-t-120 padding-b-120"><div class="container">';
    echo '<div class="top-section b-100">'.$solGrid['content'].'</div>';
    echo '<div class="dis-flex justify-sb twobox">';
    echo '<div class="flex-2 img-box">
    <picture>
    <source type="image/webp" srcset="'.get_bloginfo('template_url').'/v6.0/images/industry-images/service-image.png.webp">
    <img loading="lazy" src="'.get_bloginfo('template_url').'/v6.0/images/industry-images.png.webp" alt="service-image" width="429" height="628">
    </picture>
    </div>';
    echo '<div class="flex-2 content-box"><div class="dis-flex threebox">';
    if( $solGrid['loop'] ){
      foreach( $solGrid['loop'] as $row ){
      echo '<div class="flex-2 has-anchor">
      <div class="box-3">
      <h3>'.$row['title'].'</h3>
      <p>'.$row['text'].'</p>
      <a href="#" class="is-arrow">Learn More</a>
      </div></div>';    
      }
    }
    echo '</div></div>';
    echo '</div>';
    echo '</div></section>';
  }else{
    echo '<section class="service-scroller padding-t-120 padding-b-120" id="serv"><div class="container"><div class="service-wrap">';
    echo '<div class="left-panel">
        <div class="top-section">
          <h6>What we serve</h6>
          <h2>Software Development & Engineering Services</h2>
          <p>Driven by the top 1% of software engineering talent in India, we deliver robust, scalable.</p>
        </div>
        <div class="ser-button">
          <i><img src="'.get_bloginfo('template_url').'/images/home-images/vc-fav.svg" width="40" height="40"></i>
          <h2>Fuel your <strong>Digital-First</strong> Idea</h2>
          <p>With 1600+ Transformation Experts</p>
          <div class="btn-container"><a href="#" class="cta-button yellow">GET STARTED</a></div>
        </div>
      </div><!--//.left-panel-->';

      if( $solGrid['rows'] ){
      echo '<div class="right-panel">';
      foreach( $solGrid['rows'] as $row ){
      //echo '<pre>'; print_r($row); echo '</pre>';  
      $icon = ( isset($row['icon']) && is_array($row['icon']) ) ? vc_pictureElm( $row['icon'] ) : '';
      $link = ( isset($row['link']) && !empty($row['link']) ) ? '<a class="move" href="'.vc_siteurl($row['link']).'"></a>' : '';
      echo '<div class="content-box">
      <div class="img-sec">'.$icon.'</div>
      <div class="text-box">'.$row['content'].'</div>
      '.$link.'
      </div>';
      }
      echo '</div>';
      }
    echo '</div></div></section>';
  }
endif;  
?>
<?php 
$ind_wvc = get_field('ind-wvc');
if( isset( $ind_wvc['required'] ) && ($ind_wvc['required'] === "yes") ){
  get_template_part('inc/client', 'industry', ['content' => $ind_wvc['content']]);   
}
?>

<?php 
  $ctaTwo = get_field('blockcta-2');
  if( isset($ctaTwo['required']) && ($ctaTwo['required'] == "yes") ) :
  ?>
<section class="bg-blue-linear  padding-t-70 padding-b-70 ">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-sec">
        <div class="head-txt">
          <?php echo $ctaTwo['content']; ?>
        </div>
        <div class="btn-sec margin-t-50 ">
          <a href="https://www.valuecoders.com/staging/contact" class="btn rounded">
          <span class="text-white">Get Free Consulation</span>
          </a>
        </div>
      </div>
      <div class="right-sec">
        <?php 
          if( $ctaTwo['thumb'] ){
            echo vc_pictureElm( $ctaTwo['thumb'] );
          }else{
          ?>
        <picture>
          <source type="image/webp" srcset="<?php _vers_six('images/industry-images/cta-image01.png'); ?>">
          <img loading="lazy" src="<?php _vers_six('images/industry-images/cta-image01.png'); ?>" width="538" height="430" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$expertiseElm = get_field('tech-expertise');
if( isset($expertiseElm['required']) && ($expertiseElm['required'] == "yes") ) :
?>
<section class="tabs-section technologies-tabs padding-t-120 padding-b-120" id="tabs-section-3">
  <div class="container">
    <div class="top-section b-100"><?php echo $expertiseElm['content']; ?></div>
    <div class="tab-flex">
      <?php 
        if( $expertiseElm['tabs'] ){
      ?>
      <div class="tabs-container">
        <ul class="tabs">
          <?php  
            $i = 0;
            foreach( $expertiseElm['tabs'] as $tab ) { 
                $i++;
                $active   = ($i === 1) ? 'active' : '';  
                $imgUrl   = !empty($tab['icon']['url']) ? '<img src="'.$tab['icon']['url'].'" class="normal" alt="'.$tab['title'].'">' : '';
                $himgUrl  = !empty($tab['hicon']['url']) ? '<img src="'.$tab['hicon']['url'].'" class="hover" alt="'.$tab['title'].'">' : '';
                echo '<li class="tab '.$active.'" data-target="telm-'.$i.'">
                '.$imgUrl.$himgUrl.' '.$tab['title'].'</li>';
            }
          ?>        
        </ul>
        <div class="tab-content">
          <?php 
            $i = 0;
            foreach( $expertiseElm['tabs'] as $tab ){ 
              $i++;
              $active = ( $i === 1 ) ? 'active' : '';  
              echo '<div class="content '.$active.'" id="telm-'.$i.'"><div class="dis-flex"><div class="flex-1 content-div">';
                if( $tab['inner'] ){
                  foreach($tab['inner'] as $row ){
                    echo '<div class="cont-col">
                    <a href="'.vc_siteurl($row['link']).'"><i>'.vc_pictureElm($row['icon']).'</i>'.$row['title'].'</a>
                    </div>';
                  }  
                }                
                echo '</div></div></div>';
            } 
          ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
  $trendElm = get_field('tech-trends');
  if( isset($trendElm['required']) && ($trendElm['required'] == "yes") ) :
  ?>
<section class="tabs-section techno-tabs padding-t-120 padding-b-120" id="tabs-section-2">
  <div class="container">
    <div class="top-section b-100"><?php echo $trendElm['content']; ?></div>
    <div class="tab-flex">
      <?php 
        if( $trendElm['tabs'] ){
        ?>
      <div class="tabs-container">
        <ul class="tabs">
          <?php 
            $i = 0;
            foreach( $trendElm['tabs'] as $tab ) { 
                $i++;
                $active   = ($i === 1) ? 'active' : '';  
                $imgUrl   = !empty($tab['icon']['url']) ? $tab['icon']['url'] : 'placeholder.jpg';
                $himgUrl  = !empty($tab['hicon']['url']) ? $tab['hicon']['url'] : 'placeholder.jpg';
                echo '<li class="tab '.$active.'" data-target="telm-'.$i.'">
                <img src="'.$imgUrl.'" class="normal" alt="'.$tab['title'].'"><img src="'.$himgUrl.'" class="hover" alt="'.$tab['title'].'"> '.$tab['title'].'</li>';
            }
            ?>        
        </ul>
        <div class="tab-content">
          <?php 
            $i = 0;
            foreach( $trendElm['tabs'] as $tab ){ $i++;
            $active = ( $i === 1 ) ? 'active' : '';  
            echo '<div class="content '.$active.'" id="telm-'.$i.'">
              <div class="dis-flex">
                <div class="flex-2 img-div">'.vc_pictureElm($tab['image']).'</div>
                <div class="flex-2 content-div">'.$tab['text'].'<a href="'.vc_siteurl($tab['link']).'" class="is-arrow">Find Out More</a></div>
              </div>
            </div>';
            } 
            ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="hire-model-tab  padding-t-120 padding-b-120" id="hire-model">
  <div class="container">
    <div class="heading text-center">
      <h2>Our Custom Hiring Models</h2>
        <p>Choose from our flexible hiring models designed to fit your needs and budget.</p>
    </div>
    <div class="hire-tabs-section margin-t-50">
      <div class="tab-row">
        <nav id="hiring-models" class="tab-nav">
          <div class="tab-scroll">
            <div class="tablist active" data-tab="#tab01"><a href="javascript:void(0);">Fixed Price Model</a></div>
            <div class="tablist" data-tab="#tab02"><a href="javascript:void(0);">Dedicated Hiring Model</a></div>
            <div class="tablist" data-tab="#tab03"><a href="javascript:void(0);">Time & Material Model</a></div>
          </div>
        </nav>
        <div class="bcontents">
          <div id="tab01" class="tab-contents active">
            <div class="dis-flex">
              <div class="content-box">
                <h3>Fixed Price Model</h3>
                <p>For businesses with well-defined project scope and requirements.</p>
                <ul>
                  <li>Simplified process</li>
                  <li>Higher predictability</li>
                  <li>Greater transparency</li>
                  <li>Reduced risk</li>
                  <li>Low management efforts</li>
                </ul>
              </div>
              <div class="image-box">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/hm-1.webp">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/hm-1.webp" alt="hiring-model01" width="665" height="366">
                </picture>
              </div>
            </div>
          </div>
          <div id="tab02" class="tab-contents">
            <div class="dis-flex">
              <div class="content-box">
                <h3>Dedicated Hiring Model</h3>
                <p>For businesses with long-term project requirements or complex development process. They get more control of the process.</p>
                <ul>
                  <li>Complete control</li>
                  <li>More flexibility</li>
                  <li>Focused and dedicated approach</li>
                  <li>Faster time to market</li>
                </ul>
              </div>
              <div class="image-box">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/hm-2.webp">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/hm-2.webp" alt="hiring-model01" width="665" height="366">
                </picture>
              </div>
            </div>
          </div>
          <div id="tab03" class="tab-contents">
            <div class="dis-flex">
              <div class="content-box">
                <h3>Time & Material Model</h3>
                <p>For businesses looking to pay for completed project instead of committing to fixed project cost.</p>
                <ul>
                  <li>Faster project start</li>
                  <li>Flexibility to adapt as per changing needs</li>
                  <li>Pay as you go model</li>
                </ul>
              </div>
              <div class="image-box">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/hm-3.webp">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/hm-3.webp" alt="hiring-model01" width="665" height="366">
                </picture>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $guideTopics 	= get_field('guide-topics');
  $gtEnabled 		= $guideTopics['is_enabled'];
  if( $gtEnabled == 'yes' ) :
  ?>
<section id="has-ug" class="tab-scroll-section padding-t-150 padding-b-150 <?php echo $guideTopics['sc_background']; ?>">
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
<?php getPageCaseStudiesV3( $thisPostID, true ); ?>
<?php 
  $faqs 		= get_field('faq-group');
  $faqEnable 	= $faqs['is_enabled'];
  if( $faqEnable == "yes" ) :
  ?>
<section class="faq-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="top-section b-100"><?php echo $faqs['content']; ?></div>
    <?php 
      if( $faqs['faq'] ){
      	echo '<div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">';
      	$faqCount = 0;
      	foreach ($faqs['faq'] as $row){ $faqCount++;
      		$isActive = "";
      		if( $faqCount <= 3 ){
      			$isActive = "active";
      		}
          echo '<div class="faq-accordion-item-outer '.$isActive.'" itemscope itemprop="mainEntity" 
          itemtype="https://schema.org/Question">
          <h3 class="faq-accordion-toggle" itemprop="name">'.$row['title'].'</h3>
          <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <div itemprop="text">'.$row['text'].'</div></div>
          </div>';
      	}
      	echo '</div>';
      } 
      ?>
  </div>
</section>
<?php endif; ?>
<?php getPageCaseStudiesV3( $thisPostID ); ?>
<?php get_template_part('include/testimonials', 'v4.0'); ?>
<?php get_footer(); ?>