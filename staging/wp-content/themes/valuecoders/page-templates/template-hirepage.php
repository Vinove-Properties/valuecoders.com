<?php 
  /* 
  Template Name: Hire Page Template 
  */ 
  global $post;
  $thisPostID = $post->ID;
  get_header(); 
  $vcBtn    = get_field('vc-cta', $thisPostID);
  $dmCTA    = get_field('dm-hcta');
  $hasDMCta = (isset($dmCTA['required']) && ($dmCTA['required'] === "yes")) ? true : false;

  if( $bcCategory === "custom" ){
  //bc-custitle //bc-cuslink
  $cuTitle  = get_field('bc-custitle');
  $cuLink   = get_field('bc-cuslink');
  $bCat     = '<a class="no-after" href="'.vc_siteurl($cuLink).'">'.$cuTitle.'</a>';
}

  ?>
<section class="second-level-section vlazy" style="background-image:url(<?php bloginfo('template_url'); ?>/v4.0/images/hire-banner.webp);">
  <div class="container">
    <div class="breadcrumbs">
      <?php 
      $hasTechnology  = get_field('vc-technology',$thisPostID);
      $thispTitle 	  = ($hasTechnology && !empty($hasTechnology)) ? $hasTechnology :  get_the_title();
      $bcTitle        = get_field( 'bc-title', $thisPostID );
      if( $bcTitle ){
      $thispTitle = $bcTitle;
      }

      if( is_page('hire-developers') ){
      echo '<a href="'.get_bloginfo('url').'">Home</a> Hire Software Developers';
      }else{
        $bcCategory   = get_field('bc-vcategory');
        if( !empty( $bcCategory ) && ($bcCategory === "custom") ){
          $cuTitle  = get_field('bc-custitle');
          $cuLink   = get_field('bc-cuslink');
          $bCat     = '<a class="no-after" href="'.vc_siteurl($cuLink).'">'.$cuTitle.'</a> ';
          if( $cuTitle && $cuLink ){
            echo '<a href="'.get_bloginfo('url').'">Home</a> '.$bCat.$thispTitle;  
          }else{
            echo '<a href="'.get_bloginfo('url').'">Home</a> '.$thispTitle; 
          }
        }else{
          $seoBC        = get_field('seo-breadcrumb');
          echo '<a href="'.get_bloginfo('url').'">Home</a> ';
          if( $seoBC != "yes" ){
          echo '<a href="'.site_url('/hire-developers').'">Hire Software Developers</a> ';  
          }  
          echo $thispTitle; 
        } 
      }
      ?>
    </div>
    <?php 
      $headingTxt = get_field( 'htop-area' ); 
      $bannerSec 	= get_field( 'banner_sec' );
      ?>
    <div class="dis-flex justify-sb">
      <div class="left-box flex-2">
        <?php 
        $bdgLogoType = get_field('bdglogo');
        if( $bdgLogoType == "yes" ){
        echo '<div class="three-logo dis-flex">
        <div class="logo-box logo1"></div>
        <div class="logo-box logo2"></div>
        <div class="logo-box logo3"></div>
        </div>';          
        }else{
        echo '<div class="for-client-logo-box dis-flex">
        <div class="logo-box logo1"></div>
        <div class="logo-box logo2"></div>
        <div class="logo-box logo3"></div>
        <div class="logo-box logo4"></div>
        </div>';
        }
        ?>
        <h1><?php echo $headingTxt['top-heading']; ?></h1>
        <h2><?php echo $headingTxt['second-heading']; ?></h2>
        <?php 
          while( have_posts() ) : the_post();
          $pointerOpt = get_field('thecon-pointers');
          if( $pointerOpt === "yes" ){
            the_content();
          }else{
          $li = 'Proof of Work based timesheets (Powered by <a href="https://www.workstatus.io/" class="a-dotted" 
          target="_blank">Workstatus<sup>TM</sup></a>)';
          $getContent = get_the_content();
          echo vcNolistingContent( wpautop($getContent) );
          echo '<ul>
          <li>'.$li.'</li>
          <li>IP Rights & NDA (Non-disclosure Agreement) protection</li>
          <li>Flexible contracts, transparent pricing</li>
          <li>Free Trial, Zero Overheads, Quick Setup</li>
          </ul>';  
          }  
          
          endwhile;
          ?>
        <div class="button-section margin-t-50">
          <div class="btn-div">
            <div class="btn-sec">
              <a class="btn rounded" href="<?php echo site_url('/contact'); ?>"><span class="text-white">Get Started Now</span></a>
            </div>            
            <!--/?cta=free-trial
            <div class="info-wrap">
              Free Trial, Zero Overheads, Quick Setup
              <div class="info">
                <div class="info-content">
                  <h4>What happens after you contact us? </h4>
                  <p>Our solution experts will answer your questions in a secure online meeting.</p>
                  <a class="kmore" href="https://www.valuecoders.com/hire-developers/7-day-trial">Know More</a>
                </div>
              </div>
            </div>
             -->
          </div>
          
          <span class="devide">OR</span>
          <div class="free-con">
          <a href="javascript:void(0);" onclick="consultCTA_cb();" target="_self">Book A Call</a>
          </div> 
        </div>
      </div>
      <div class="flex-2 right-box">
        <?php 
        $conImage = get_field('banner_image');
        if( $conImage && is_array($conImage) ){
        echo vc_pictureElm( $conImage, 'ValueCoders', 'soft-img' );
        }else{
          
        $ranpool  = ['hire-banner01','hire-banner02','hire-banner03','hire-banner04','hire-banner05'];
        $bImg = $ranpool[array_rand($ranpool)];
        ?>
        <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/<?php echo $bImg; ?>.webp">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/<?php echo $bImg; ?>.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/<?php echo $bImg; ?>.png" alt="Valuecoders" width="689" height="477"> 
        </picture>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<div class="slide-logo  dis-flex items-center justify-sb">
  <div class="container">
    <div class="dis-flex">
      <div class="logo-heading">
        <h4><span>Trusted by startups and Fortune <strong>500</strong>    companies</span></h4>
      </div>
      <div class="logo-section">
        <div class="logoslide" id="home-tpl-logoslide">
          <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
              <div class="glide__slide">
                <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/banner-client-logo.svg" alt="valuecoders">
                </picture>
              </div>
              <div class="glide__slide">
                <picture>
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/banner-client-logo-2.png" alt="valuecoders">
                </picture>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php //vcTrustedStartups(); ?>
<?php 
if(is_page('hire-developers')){
	get_template_part('include/why','hire3.0');
} 
?>

<?php  
  $specifications = get_field('tech-spec');
  if( $specifications ) :
  $isEnable = $specifications['is_enabled'];
  if( $isEnable == "yes" ){
  $htContent 	= $specifications['content'];
  $headText 	= fnextractHeadins('h2', $htContent );
  
  $sectionType = (isset($specifications['specifications']) && (count($specifications['specifications']) > 6)) ? 'accordian' : 'grid';
  
  if( isset( $specifications['sec-layout'] ) && ($specifications['sec-layout'] == "grid") ){
  $sectionType = 'grid';
  }

  if( $sectionType === 'grid' ){ 
  ?>
<section id="acf-tech-spec-grid" class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $specifications['sc_background']; ?>">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php 
        if( $specifications['specifications'] ){
        	foreach( $specifications['specifications'] as $row ){
        		$vcHasAnchor = vcHasAnchor($row['title'], $row['text']);
        		echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
        		<div class="box bg-blue-opacity-light">
        		<h3>'.$row['title'].'</h3>
        		<p>'.$row['text'].'</p>';
        		echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
        		echo '</div></div>';
        	}
        } 
        ?>
    </div>
  </div>
</section>
<?php }else{ ?>
<section class="accordion-section padding-t-120" id="acf-tech-spec-accordian">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $specifications['content']; ?></div>
      <div class="image-wrap">
        <?php 
          if( $specifications['image'] ){
          	echo vc_pictureElm($specifications['image'], 'ValueCoders', 'soft-img');
          }else{
          ?>
        <picture class="soft-img">
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png" width="861" height="455" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
    <div class="col-right padding-b-120">
      <?php 
        $idx = 0;
        if( $specifications['specifications'] ){
        	foreach( $specifications['specifications'] as $row ){
        	$hasAnchor 	= (vcHasAnchor( $row['title'] ) !== false ) ? ' has-link' : '';	
        	$blnkTitle 	= ( !empty($hasAnchor) ) ? strip_tags($row['title']) : $row['title'];
        	$aTitle 		=	(vcHasAnchor( $row['title'] ) !== false ) ? $row['title'] : '';
        
        	$idx++;
        	$isActive = ( $idx === 1 ) ? " active" : "";
        	echo '<div class="accordionItem'.$isActive.'">
        		<h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$blnkTitle.'</span>'.$aTitle.'</h3>
        		<div class="accordion-content"><p>'.$row['text'].'</p></div>
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
endif;
?>

<?php 
$disOne = (isset($dmCTA['dis-1']) && ($dmCTA['dis-1'] == "yes")) ? true : false;
if( $disOne === false ) :
?>
<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
  <div class="container">
    <div class="head-txt text-center">
      <?php 
      if( isset($dmCTA['required']) && ($dmCTA['required'] == "yes") ){
      echo '<h2>'.$dmCTA['title-one'].'</h2>';
      echo '<p>'.$dmCTA['body-one'].'</p>';
      }else{
      echo '<h2>Try Before, Commit Later</h2>';
      echo '<p>Start your 7-day trial today and discover the perfect fit for your project needs.</p>';
      }
      ?>      
    </div>
    <?php
      $ctaTxt_one = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
      "Talk To Our Experts";
      //cmnCTA_v3($ctaTxt_one); 
      echo hireCmn_cta();
      ?>
  </div>
</section>
<?php endif; ?>

<?php 
  if( !is_page('hire-developers') ){
  $whyChoos = get_field('why-choose');
  if( isset( $whyChoos['is_enable'] ) && ($whyChoos['is_enable'] == "yes") ){
  $htContent 	= $whyChoos['content'];
  $headText 	= fnextractHeadins('h2', $htContent );
  ?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $whyChoos['sc_background']; ?>" id="acf-why-choose">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2">
        <?php echo $headText; ?>
      </div>
      <div class="flex-2">
        <?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
      </div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php 
        if( $whyChoos['options'] ){
        	foreach( $whyChoos['options'] as $row ){
        		$vcHasAnchor = vcHasAnchor($row['title'], $row['text']);
        		echo '<div class="flex-3 box-3'.$vcHasAnchor.'">
        		<div class="box bg-blue-opacity-light">
        		<h3>'.$row['title'].'</h3>
        		<p>'.$row['text'].'</p>';
        		echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
        		echo '</div></div>';
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
<?php 
  if( is_page('hire-developers') ) :
  $tsection = get_field('tech-competency');
  ?>
<section class="technology-tab-section  padding-t-120 padding-b-120 bg-light">
  <div class="container">
    <div id="head-hptechnology" class="head-txt text-center is-active"><?php echo $tsection['content']; ?></div>
    <div id="head-hprole" class="head-txt text-center" style="display:none;">
      <h2>Hire Indian Software Programmers For Your Requirements</h2>
      <p>Our remote Indian programmers excel in a wide range of technology solutions. Agencies, companies, ISVs, and SMEs prefer us to get dedicated software developers.</p>
    </div>
    <div class="tab-contents no-js margin-t-100">
      <div class="tab-nav">
        <a href="javascript:void(0);" id="hptechnology" onclick="swapTabTechnology('hptechnology', 'hprole')" class="tab-link is-active">Technology</a>
        <a href="javascript:void(0);" id="hprole" onclick="swapTabTechnology('hprole', 'hptechnology')" class="tab-link">By Role</a>
      </div>
      <div id="content-hptechnology" class="tab-content is-active">
        <!-- <div id="tech-stack-bx" class="tech-stack-updated-section for-tech-icons"></div> -->		
        <div class="tech-stacks">
          <?php 
            $techStacks = get_field('tech_stacks_cards', 265);
            if( $techStacks ){
              $elmClass = ( $techStacks && (count($techStacks) === 2) ) ? "flex-2" : "flex-3";              
            	echo '<div class="dis-flex col-box-outer margin-t-50">';
            	foreach( $techStacks as $row ){
            		echo '<div class="'.$elmClass.' col-box"><div class="inner-box">
                          <h3><a href="'.vc_siteurl($row['card_link']).'">'.$row['card_title'].'</a></h3>';
                          if( $row['tech_icon'] ){
                          echo '<ul>';
                          foreach( $row['tech_icon'] as $inrow ){
                          	echo '<li><a href="'.vc_siteurl($inrow['tech_icon_link']).'">'.$inrow['tech_text_list'].'</a></li>';
                          }
                          echo '</ul>';
                          }
                          echo '</div></div>';
            	}
            	echo '</div>'; 
            }
            ?>	
        </div>
      </div>
      <div id="content-hprole" class="tab-content">
        <div class="three-column-icon-section">
          <div class="dis-flex col-box-outer">
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire IT Consultants</h3>
                <p>Hire IT consultants and engineers who help you overcome technical challenges and streamline project workflow better.</p>
                <a class="box-anchor" href="<?php echo site_url('/software-consulting'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire Web App Developers</h3>
                <p>Hire software developers from us who proficient in building powerful, scalable, and secure web apps for your business.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-web-app-developers'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire App Developers</h3>
                <p>Hire Indian programmers from ValueCoders and build tailored native and hybrid mobile applications for your niche.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-app-developers'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire BI Consultants</h3>
                <p>Hire an expert who can help analyze your business data to get valuable insights and display outputs on dashboards.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-power-bi-developer-consultants'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire Cloud Developers</h3>
                <p>Hire programmers online from us and build secure, scalable, and interactive cloud-based web and mobile applications.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-devops-developers'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire Maintenance Engineers</h3>
                <p>Our offshore software developers in India help you fully support and maintain your current software and keep it up to date.</p>
                <a class="box-anchor" href="<?php echo site_url('/application-maintenance'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire Big Data Experts</h3>
                <p>Hire a programmer who can use the latest technologies like Hadoop, Power BI, etc., to analyze & extract helpful information to develop different types of business solutions.</p>
                <a class="box-anchor" href="<?php echo site_url('/big-data-application-development-services-company'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire AI/ML Experts</h3>
                <p>Hire Indian developers to build AI-based software solutions and data-driven products for your business.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-machine-learning-experts'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire AR/VR Expert</h3>
                <p>Hire software developers from ValueCoders and build AR/VR apps to enhance customer experience.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-augmented-reality-developers'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire API Developers</h3>
                <p>Hire Indian software developers from ValueCoders. Our experts are skilled in building secure and scalable APIs for your web and mobile applications.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-api-developers'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire eCommerce Developers</h3>
                <p>Hire eCommerce developers from us who have expertise in eCommerce technologies like Magento, Opencart, Shopify, etc.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-ecommerce-developers'); ?>"></a>
              </div>
            </div>
            <div class="flex-3 box-3 has-anchor">
              <div class="box">
                <h3>Hire CMS Developers</h3>
                <p>Hire software developers and programmers from us and get advanced and real-time web applications built on CMS platforms like WordPress, Drupal, etc.</p>
                <a class="box-anchor" href="<?php echo site_url('/hire-developers/hire-cms-developers'); ?>"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>	
<?php  
  $expframeworks = get_field('php_frame_work_section');
  if( $expframeworks ) :
  $isfrEnable = $expframeworks['is_enable'];
  if( $isfrEnable == "yes" ) {
  $sectionType = $expframeworks['section_type'];
  if( $sectionType == "framework" ) {
  ?>
<section class="technology-section <?php echo $expframeworks['sc_background']; ?>">
  <div class="dis-flex">
    <div class="left-box  padding-t-120 padding-b-120">
      <?php 
        echo $expframeworks['content']; 
        if( $expframeworks ){
        echo '<ul>';
        foreach($expframeworks['options'] as $row  ){
        if( $row['link'] ){
        echo '<li><a href="'.vc_siteurl( $row['link'] ).'">'.$row['title'].'</a></li>';	
        }else{
        echo '<li>'.$row['title'].'</li>';
        }	
        }
        echo '</ul>';
        }
        ?>          
    </div>
    <div class="right-box">
      <?php 
        if( $expframeworks['image'] ){
        echo vc_pictureElm( $expframeworks['image'], 'ValueCoders' );
        }else{ ?>    	
      <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-app.png">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-app.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/technology-app.png" width="695" 
          height="607" alt="valuecoders">
      </picture>
      <?php } ?>
    </div>
  </div>
</section>
<?php 
  }else{ 
  $techno = $expframeworks['techno'];
  if( $techno ) : 
  $dtype = (isset($expframeworks['dtype']) && !empty($expframeworks['dtype'])) ? $expframeworks['dtype'] : '';
  if( $dtype == "accordian" ){
  ?>
<section class="accordion-section padding-t-120 <?php echo $expframeworks['sc_background']; ?>" id="acf-techno-accordian">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $expframeworks['content']; ?></div>
      <div class="image-wrap">
        <?php 
          if( $expframeworks['image'] ){
          	echo vc_pictureElm( $expframeworks['image'], 'ValueCoders', 'soft-img' );
          }else{ ?>
        <picture class="soft-img">
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/hire-detail-image.png">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/hire-detail-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/hire-detail-image.png" width="668" 
            height="978" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
    <div class="col-right content-col padding-b-120">
      <?php 
        $rowCount = 0;
        foreach( $techno as $mrow ){ 
        	echo '<div class="inner-box">
        	<h3>'.$mrow['cat-name'].'</h3>';
        	echo $mrow['tech-listing'];
        	echo '</div>';
        }
        ?>	
    </div>
  </div>
</section>
<?php }else{ ?>
<section class="tech-stacks padding-t-120 padding-b-120 <?php echo $expframeworks['sc_background']; ?>" 
  id="acf-techno-grid">
  <div class="container">
    <div class="head-txt text-center"><?php echo $expframeworks['content']; ?></div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php
        if( $techno ){
        	$flexCount = 'flex-3';
        	if( count($techno) === 1 ){
        		$flexCount = "flex-1";
        	}elseif( count($techno) === 2 ){
        		$flexCount = "flex-2";
        	}else{
        		$flexCount = "flex-3";
        	}
        	foreach( $techno as $trow ){
        		echo '<div class="'.$flexCount.' col-box"><div class="inner-box">';
        		echo '<h3>'.$trow['cat-name'].'</h3>';
        		echo $trow['tech-listing'];	  		
        		echo '</div></div>';
        	}
        }
        ?>          
    </div>
  </div>
</section>
<?php }
  endif;
  }
  } 
  endif; 
  ?>
<!--Technology / Framework Section Ends Here-->

<?php 
$disTwo = (isset($dmCTA['dis-2']) && ($dmCTA['dis-2'] == "yes")) ? true : false;
if( $disTwo === false ) :
?>
<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
  <div class="container">
    <div class="head-txt text-center">
      <?php       
      if( isset($dmCTA['required']) && ($dmCTA['required'] == "yes") ){
        echo '<h2>'.$dmCTA['title-two'].'</h2>';
        echo '<p>'.$dmCTA['body-two'].'</p>';
      }else{
      echo '<h2>Need Top-tier Software Development? </h2>';
      echo '<p>Hire our skilled developers and lead the way to innovation.</p>';  
      }
      ?>            
    </div>
    <?php
      $ctaTxt_two = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : "Talk To Our Experts";
      //cmnCTA_v3( $ctaTxt_two ); 
      echo hireCmn_cta();
      ?>
  </div>
</section>
<?php endif; ?>

<?php 
$gViewSection = get_field('gview-section');
if( isset( $gViewSection['is_enabled'] ) && ($gViewSection['is_enabled'] == "yes") ) :
$htContent  = $gViewSection['content'];
$headText   = fnextractHeadins('h2', $htContent );  
?>
<section id="acf-gview-section" class="three-column-icon-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php 
        if( $gViewSection['specifications'] ){
          foreach( $gViewSection['specifications'] as $row ){
            $vcHasAnchor = vcHasAnchor($row['title'], $row['text']);
            echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
            <div class="box bg-blue-opacity-light">
            <h3>'.$row['title'].'</h3>
            <p>'.$row['text'].'</p>';
            echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
            echo '</div></div>';
          }
        } 
        ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$codeSec = get_field('cq-accord'); 
if( isset( $codeSec['is_enable'] ) && ($codeSec['is_enable'] != "hide") ){
if( $codeSec['is_enable'] != "no" ):
if( isset( $codeSec['tpl-content'] ) && ($codeSec['tpl-content'] == "no") ){  
?>
<section class="accordion-section list-full padding-t-120" id="acf-code-quality-accordian-dynamic">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $codeSec['content']; ?></div>
      <div class="image-wrap">
        <?php 
          if( $codeSec['image'] ){
          echo vc_pictureElm($codeSec['image'], 'ValueCoders', 'soft-img');
          }else{
          ?>
        <picture class="soft-img">
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png" width="861" height="455" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
    <div class="col-right padding-b-120">
      <?php 
        $idx = 0;
        if( $codeSec['specifications'] ){
          foreach( $codeSec['specifications'] as $row ){
          $hasAnchor  = (vcHasAnchor( $row['title'] ) !== false ) ? ' has-link' : ''; 
          $blnkTitle  = ( !empty($hasAnchor) ) ? strip_tags($row['title']) : $row['title'];
          $aTitle     = (vcHasAnchor( $row['title'] ) !== false ) ? $row['title'] : '';
        
          $idx++;
          $isActive = ( $idx === 1 ) ? " active" : "";
          echo '<div class="accordionItem'.$isActive.'">
            <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$blnkTitle.'</span>'.$aTitle.'</h3>
            <div class="accordion-content">'.$row['text'].'</div>
          </div>';
          }
        } 
        ?>
    </div>
  </div>
</section>
<?php }else{ ?>
<section class="accordion-section list-full padding-t-120" id="acf-code-quality-accordian-static">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt">
        <h2>How We Ensure Code Quality</h2>
        <p>At the core of our development process, we prioritize code quality, implementing stringent testing, detailed reviews, and industry-best practices to deliver software that excels in both functionality and longevity.</p>
      </div>
      <div class="image-wrap">
        <?php 
        $ranpool  = ['code-quality-image01', 'code-quality-image02'];
        $bImg = $ranpool[array_rand($ranpool)];
        ?>  
        <picture class="soft-img">
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/<?php echo $bImg; ?>.webp">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/<?php echo $bImg; ?>.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/<?php echo $bImg; ?>.png" width="666" height="536" alt="valuecoders">
        </picture>
      </div>
    </div>
    <div class="col-right padding-b-120">
      <div class="accordionItem active">
        <h3 class="accordion-toggle"><span>Upholding Coding Best Practices</span></h3>
        <div class="accordion-content">
          <ul>
            
            <li>Using descriptive variable names and in-code comments for better readability and maintainability.</li>
            <li>Comprehensive documentation for every codebase, ensuring clarity and ease of future updates.</li>
                        
          </ul>
        </div>
      </div>
      <div class="accordionItem">
        <h3 class="accordion-toggle"><span>Unit Testing</span></h3>
        <div class="accordion-content">
          <ul>
            <li>Integrating continuous integration tools to automatically run unit tests on new code submissions, ensuring immediate feedback on code integrity.</li>
            <li>Utilizing test-driven development (TDD) practices to encourage the creation of tests before writing code, leading to more robust and error-free components.</li>
          </ul>
        </div>
      </div>
      <div class="accordionItem">
        <h3 class="accordion-toggle"><span>Code Review Practices</span></h3>
        <div class="accordion-content">
        <ul>
        <li>Incorporating automated code scanning tools to detect vulnerabilities and code smells before manual review, streamlining the review process.</li>          
        <li>Establishing a peer review culture where developers are encouraged to provide constructive feedback, promoting knowledge sharing and collaborative improvement.</li>
        </ul>
        </div>
      </div>
      <div class="accordionItem">
        <h3 class="accordion-toggle"><span>Code Quality Metrics</span></h3>
        <div class="accordion-content">
          <ul>
            <li>Adopting complexity metrics to identify overly complex code that may be harder to maintain and test, aiming for simplicity and readability.</li>            
            <li>Tracking technical debt metrics to quantify the cost of rework associated with quick fixes versus proper solutions, guiding towards long-term code health.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }
endif; 
}
?>

<?php  
  $whyChoos = get_field('why-choose');
  if( isset( $whyChoos['is_enable'] ) && ($whyChoos['is_enable'] == "yes") ){
  if( is_page('hire-developers') ){	
  ?>
<section class="accordion-section padding-t-120 <?php echo $whyChoos['sc_background']; ?>">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $whyChoos['content']; ?></div>
      <div class="image-wrap">
        <picture class="soft-img">
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/hire-accor-banner.png">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/hire-accor-banner.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/hire-accor-banner.png" width="861" height="496" alt="valuecoders">
        </picture>
      </div>
    </div>
    <?php     
      if( $whyChoos['options'] ){	
      	echo '<div class="col-right padding-b-120">';
      	$wcount = 0;
      	foreach( $whyChoos['options'] as $row ){ $wcount++;
      		$isActive = ( $wcount === 1 ) ? ' active' : '';
      		echo '<div class="accordionItem '.$isActive.'">
      <h3 class="accordion-toggle">'.$row['title'].'</h3>
      <div class="accordion-content">
      	<p>'.$row['text'].'</p>
      </div>
      </div>';
      	}
      	echo '</div>'; 
      } 
      ?>
  </div>
</section>
<?php
  } 
  }
  ?>
<!-- Why Opt. technology -->
<?php 
  $whyhire = get_field('why_hire_section_php');
  if(is_page(8024)){ // Master  
    if( isset( $whyhire['is_enable'] ) && ($whyhire['is_enable'] == "yes") ){	
    ?>
<section class="client-img-section dark-client-section padding-t-120 padding-b-120">
  <div class="container">
  <div class="dis-flex justify-sb items-center">
  <div class="flex-2 left-box">
    <div class="head-txt">
      <?php echo $whyhire['content']; ?>
      <ul>
        <li><a href="https://www.workstatus.io/" target="_blank" class="a-dotted">Workstatus<sup>TM</sup></a> powered Proof of Work</li>
        <li>Top 1% developers, rigorously vetted</li>
        <li>Dedicated project manager</li>
        <li>Flexible contracts, transparent pricing</li>
        <li>Zero hiring fee, quick onboarding</li>
        <li>Comprehensive code documentation</li>
        <li>Adherence to data security practices</li>
        <li>Language/time-zone compatible staff</li>
      </ul>
    </div>
  </div>
  <div class="flex-2 right-box"><?php get_template_part('include/clientele', 'v4.0'); ?></div>
  </div>
</div>
</section>
<?php 
  }
  }else{ ?>
<section class="client-img-section dark-client-section padding-t-120 padding-b-120">
  <div class="container">
  <div class="dis-flex justify-sb items-center">
  <div class="flex-2 left-box">
    <div class="head-txt">
      <?php 
      if( isset($whyhire['con-point']) && ($whyhire['con-point'] === "yes") ){
      echo $whyhire['content'];   
      }else{
      echo $whyhire['content'];
      ?>
      <ul>
        <li><a href="https://www.workstatus.io/" target="_blank" class="a-dotted">Workstatus<sup>TM</sup></a> powered Proof of Work</li>
        <li>Top 1% developers, rigorously vetted</li>
        <li>Dedicated project manager</li>
        <li>Flexible contracts, transparent pricing</li>
        <li>Zero hiring fee, quick onboarding</li>
        <li>Comprehensive code documentation</li>
        <li>Adherence to data security practices</li>
        <li>Language/time-zone compatible staff</li>
      </ul>
      <?php } ?>
    </div>
  </div>
  <div class="flex-2 right-box"><?php get_template_part('include/clientele', 'v4.0'); ?></div>
</div>
</div>
</section>
<?php } ?>
<!-- WHy Hire Developer From VC -->
<?php 
  /*
  //Hide 22.11.23 // version 4.0
  $clientele = get_field( 'vc-clients' );
  if( $clientele['is_enabled'] == 'yes' ) :
  ?>
<section class="client-img-section dark-client-section padding-t-120 padding-b-120">
  <div class="container">
  <div class="dis-flex justify-sb items-center">
  <div class="flex-2 left-box">
    <div class="head-txt">
      <?php 
        echo removeUlTags_v4( $clientele['content'] );
        ?>
      <ul>
        <li><a href="https://www.workstatus.io/" target="_blank" class="a-dotted">Workstatus<sup>TM</sup></a> powered Proof of Work</li>
        <li>Top 1% developers, rigorously vetted</li>
        <li>Dedicated project manager</li>
        <li>Flexible contracts, transparent pricing</li>
        <li>Zero hiring fee, quick onboarding</li>
        <li>Comprehensive code documentation</li>
        <li>Adherence to data security practices</li>
        <li>Language/time-zone compatible staff</li>
      </ul>
    </div>
  </div>
  <div class="flex-2 right-box"><?php get_template_part('include/clientele', 'v4.0'); ?></div>
</section>
<?php endif; 
  */
  ?>
<!-- ValueCoder clientele #Ends Here -->
<?php 
$disThree = (isset($dmCTA['dis-3']) && ($dmCTA['dis-3'] == "yes")) ? true : false;
if( $disThree === false ) :
$ctaTheme = ( isset($dmCTA['style']) && $dmCTA['style'] == "light" ) ? "bg-light" : "";   
$ctaWhite = ( isset($dmCTA['style']) && $dmCTA['style'] == "light-white" ) ? "bg-light bg-white" : "";   
?>
<section class="counter-column-section bg-blue-linear <?php echo $ctaTheme.$ctaWhite; ?> bg-dark padding-t-70 padding-b-70">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-sec">
        <div class="head-txt">
          <?php 
          
          if( isset($dmCTA['required']) && ($dmCTA['required'] == "yes") ){
            echo '<h2>'.$dmCTA['title-three'].'</h2>';
            echo '<p>'.$dmCTA['body-three'].'</p>';
          }else{
          ?>
          <h2>
            <?php 
              //echo (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : 
              //"Build Smarter with Top Talent"; ?>
            Build Smarter with Top Talent
          </h2>
          <p>
            <?php 
              //echo (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : 
              //"Ready to elevate your software projects? Hire our expert developers and experience unparalleled innovation and efficiency.
              //"; ?> 
            Ready to elevate your software projects? Hire our expert developers and experience unparalleled innovation and efficiency.
          </p>
          <?php } ?>
        </div>
        <div class="btn-sec margin-t-50">
          <a href="<?php echo site_url('/contact'); ?>" class="btn rounded"><span class="text-white">Book A Free Consultation</span></a>
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
<?php endif; ?>
<!--
  <section class="accordion-section how-process  padding-t-120">
    <div class="dis-flex accordian-row">
      <div class="col-left">
        <div class="head-txt">
          <h2>How Does the Process Work?</h2>
          <p>Take advantage of 7-day trial to assess the performance of our recommended professionals and determine if they align with your project requirements.</p>
        </div>
        <div class="image-wrap">
          <picture class="soft-img">
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/process-image.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/process-image.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/process-image.png" width="774" height="774" alt="valuecoders">
          </picture>
        </div>
      </div>
      <div class="col-right padding-b-120 content-col">
        <div class="process-step">
          <div class="step-sec dis-flex">
            <div class="step-icon">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon01.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon01.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon01.png" width="40" height="40" alt="valuecoders">
              </picture>
            </div>
            <div class="step-desc">
              <span class="step-no">STEP 1</span>
              <h4>Initial Consultation</h4>
              <ul>
                <li>Discuss your project requirements, scope, and objectives with our team.</li>
                <li>Understand the skills and expertise needed for your project.</li>
              </ul>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-icon">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/step-icon06.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/dev-img/step-icon06.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/step-icon06.png" width="40" height="40" alt="valuecoders">
              </picture>
            </div>
            <div class="step-desc">
              <span class="step-no">STEP 2</span>
              <h4>Paperwork and Standard Agreement</h4>
              <ul>
                <li>Review and sign the necessary paperwork and agreements to proceed with the trial.</li>
              </ul>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-icon">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon02.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon02.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon02.png" width="40" height="40" alt="valuecoders">
              </picture>
            </div>
            <div class="step-desc">
              <span class="step-no">STEP 3</span>
              <h4>Selection & Onboarding</h4>
              <ul>
                <li>Based on the consultation, we'll recommend professionals that best fit your needs.</li>
                <li>Begin the 7-day trial to evaluate their performance firsthand.</li>
              </ul>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-icon">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon03.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon03.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon03.png" width="40" height="40" alt="valuecoders">
              </picture>
            </div>
            <div class="step-desc">
              <span class="step-no">STEP 4</span>
              <h4>Transparent Tracking with Workstatus™</h4>
              <ul>
                <li>Once onboarded, track progress, hours, and tasks in real time.</li>
                <li>Ensure every hour is productive and aligns with your project goals.</li>
              </ul>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-icon">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon04.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon04.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon04.png" width="40" height="40" alt="valuecoders">
              </picture>
            </div>
            <div class="step-desc">
              <span class="step-no">STEP 5</span>
              <h4>Feedback & Iteration</h4>
              <ul>
                <li>Regular check-ins to discuss progress, challenges, and feedback.</li>
                <li>Continuous improvement based on your feedback and project evolution.</li>
              </ul>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-icon">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon05.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon05.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/step-icon05.png" width="40" height="40" alt="valuecoders">
              </picture>
            </div>
            <div class="step-desc">
              <span class="step-no">STEP 6</span>
              <h4>Seamless Transition</h4>
              <ul>
                <li>If satisfied after the trial, seamlessly transition into a full-time engagement.</li>
                <li>If you choose not to continue, there's no obligation.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
<!-- Comparison Table Ends Here -->

<?php 
  $compAnalysis 	= get_field( 'comparative_analysis_section' );
  $compSecEnable 	= $compAnalysis['is_enabled'];
  if( $compSecEnable == "yes" ) :
  ?>
<section id="vhire-tbl-elm" class="table-list-section <?php echo $compAnalysis['sc_background']; ?> padding-t-150 padding-b-150">
  <?php if( have_rows('comparative_analysis_section') ): ?>
  <?php 
    while( have_rows('comparative_analysis_section') ): the_row(); 
    $tablesectitle 	= get_sub_field('section_title_comparative_analysis');
    $tablesecdes 	= get_sub_field('section_description_comparative_analysis');
    ?>
  <div class="container">
    <div class="head-txt text-center">
      <h2><?php echo $tablesectitle; ?></h2>
      <p><?php echo $tablesecdes; ?></p>
    </div>
    <!--
      <?php if( have_rows('table_section_comparative_analysis') ): ?>
      <div class="dis-flex col-box-outer margin-t-100">
        <?php 
        $a = 1; 
        while( have_rows('table_section_comparative_analysis') ): the_row();  ?>
        <div <?php if ($a == 2) {?> class="flex-4 table-list bg-row-yellow"<?php } else { ?> class="flex-4 table-list"<?php } ?>>
          <?php if( have_rows('table_item_comparative_analysis') ):   ?>
          <ul>
            <?php $i = 0; while( have_rows('table_item_comparative_analysis') ): the_row();   ?>
            <li class=" <?php echo ( ($i == 0) && ( $a !== 2 )) ? " title clr-white" : ""; ?> <?php echo ( ($i == 0) && ( $a !== 1 )) ? " title" : ""; ?>">
              <?php the_sub_field('sub_item_text_comparative_analysis'); ?>
            </li>
            <?php $i++; endwhile;  ?>
          </ul>
          <?php endif; ?>
        </div>
        <?php $a++; endwhile; ?>
      </div>
      <?php endif; ?>-->
    <div class="dis-flex col-box-outer margin-t-100">
      <div class="flex-4 table-list">
        <ul>
          <li class="  title clr-white ">
            Factor          
          </li>
          <li class="  ">
            Time to get right developers          
          </li>
          <li class="  ">
            Time to start a project          
          </li>
          <li class="  ">
            Recurring cost of training &amp; benefits          
          </li>
          <li class="  ">
            Time to scale size of the team          
          </li>
          <li class="  ">
            Pricing (weekly average)          
          </li>
          <li class="  ">
            Project failure risk          
          </li>
          <li class="  ">
            Developers backed by delivery team          
          </li>
          <li class="  ">
            Dedicated resources           
          </li>
          <li class="  ">
            Quality guarantee          
          </li>
          <li class="  ">
            Tools and professional enviroment          
          </li>
          <li class="  ">
            Agile development methodology           
          </li>
          <li class="  ">
            Impact due to turnover          
          </li>
          <li class="  ">
            Structured training programs            
          </li>
          <li class="  ">
            Communications          
          </li>
          <li class="  ">
            Termination costs          
          </li>
          <li class="  ">
            Assured work rigor          
          </li>
        </ul>
      </div>
      <div class="flex-4 table-list bg-row-yellow">
        <ul>
          <li class="   title">
            ValueCoders          
          </li>
          <li class="  ">
            1 day - 2 weeks          
          </li>
          <li class="  ">
            1 day - 2 weeks          
          </li>
          <li class="  ">
            0          
          </li>
          <li class="  ">
            48 hours - 1 week          
          </li>
          <li class="  ">
            1.5X          
          </li>
          <li class="  ">
            Extremely low, we have a 98% success ratio          
          </li>
          <li class="  ">
            Yes          
          </li>
          <li class="  ">
            Yes          
          </li>
          <li class="  ">
            High          
          </li>
          <li class="  ">
            Yes          
          </li>
          <li class="  ">
            Yes          
          </li>
          <li class="  ">
            None          
          </li>
          <li class="  ">
            Yes          
          </li>
          <li class="  ">
            Seamless          
          </li>
          <li class="  ">
            None          
          </li>
          <li class="  ">
            40hrs / week          
          </li>
        </ul>
      </div>
      <div class="flex-4 table-list">
        <ul>
          <li class="  title clr-white  title">
            In-house          
          </li>
          <li class="  ">
            4 - 12 weeks          
          </li>
          <li class="  ">
            2 - 10 weeks          
          </li>
          <li class="  ">
            $10,000 -$30,000          
          </li>
          <li class="  ">
            4 - 16 weeks          
          </li>
          <li class="  ">
            2X          
          </li>
          <li class="  ">
            Low          
          </li>
          <li class="  ">
            Some          
          </li>
          <li class="  ">Yes
          </li>
          <li class="  ">
            High          
          </li>
          <li class="  ">
            Yes          
          </li>
          <li class="  ">
            Some          
          </li>
          <li class="  ">
            High          
          </li>
          <li class="  ">
            Some          
          </li>
          <li class="  ">
            Seamless          
          </li>
          <li class="  ">
            High          
          </li>
          <li class="  ">
            40hrs / week          
          </li>
        </ul>
      </div>
      <div class="flex-4 table-list">
        <ul>
          <li class="  title clr-white  title">
            Freelancer          
          </li>
          <li class="  ">
            1 - 12 weeks          
          </li>
          <li class="  ">
            1 - 10 weeks          
          </li>
          <li class="  ">
            0          
          </li>
          <li class="  ">
            1 - 12 weeks          
          </li>
          <li class="  ">
            1X          
          </li>
          <li class="  ">
            Very High          
          </li>
          <li class="  ">
            No          
          </li>
          <li class="  ">
            Some          
          </li>
          <li class="  ">
          Uncertain          
          </li>
          <li class="  ">
            Uncertain          
          </li>
          <li class="  ">
            No          
          </li>
          <li class="  ">
            High          
          </li>
          <li class="  ">
            No          
          </li>
          <li class="  ">
            Uncertain          
          </li>
          <li class="  ">
            None          
          </li>
          <li class="  ">
            40hrs / week          
          </li>
        </ul>
      </div>
    </div>
    <div class="view-more margin-t-50 text-center"><a href="javascript:void(0);" onclick="hireTbl_showMore(this);">View More</a></div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</section>
<?php endif; ?>

<?php 
$processReq = get_field('pws-needed');
if( $processReq !== "no" ) :
?>
<section class="process-work padding-t-150 padding-b-150">
  <div class="container">
    <div class="dis-flex accordian-row justify-sb">
      <div class="flex-2 col-left">
        <div class="head-txt text-center">
          <h2>How We Hire Developers?</h2>
          <p>With a five-step hiring process in place, we are committed to onboarding<br> exceptionally productive engineers.</p>
        </div>
        <div class="image-wrap">
          <picture class="soft-img">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro-image.svg"  width="621" height="468" alt="valuecoders">
          </picture>
        </div>
      </div>
      <div class="flex-2 col-right">
        <div class="head-txt text-center">
          <h2>Hire Developers from ValueCoders</h2>
          <p>Take a look at the simple and straightforward process to hire software developers from ValueCoders.</p>
        </div>
        <div class="process-step">
          <div class="step-sec dis-flex">
            <div class="step-wrap">
              <div class="step-icon">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro01.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro01.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro01.png" alt="Valuecoders" width="89" height="100">
                </picture>
              </div>
              <div class="step-desc">
                <span class="step-no">STEP 1</span>
                <h4>Inquiry</h4>
                <p>We assess project alignment for potential collaboration.</p>
              </div>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-wrap">
              <div class="step-icon">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro02.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro02.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro02.png" alt="Valuecoders" width="89" height="100">
                </picture>
              </div>
              <div class="step-desc">
                <span class="step-no">STEP 2</span>
                <h4>Developer Selection</h4>
                <p>We select developers from our tech pool as per project needs.</p>
              </div>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-wrap">
              <div class="step-icon">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro03.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro03.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro03.png" alt="Valuecoders" width="89" height="100">
                </picture>
              </div>
              <div class="step-desc">
                <span class="step-no">STEP 3</span>
                <h4>Integration</h4>
                <p>Upon ETA approval, developers start with direct task assignment.</p>
              </div>
            </div>
          </div>
          <div class="step-sec dis-flex">
            <div class="step-wrap">
              <div class="step-icon">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro04.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro04.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/hire-pro04.png" alt="Valuecoders" width="89" height="100">
                </picture>
              </div>
              <div class="step-desc">
                <span class="step-no">STEP 4</span>
                <h4>Scaling</h4>
                <p>Modify team size as needed, aided by an account manager.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
  $developers = get_field('developers-group');
  $devEnabled = $developers['is_enabled'];
  if( ($devEnabled == 'yes') && ( !is_page('hire-developers') ) ) :
  ?>
<section class="sample-profile-no-img-section padding-t-150 padding-b-150 <?php echo $developers['sc_background']; ?>">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $developers['content']; ?>
    </div>
    <div class="dis-flex justify-center sample-block-outer">
      <?php 
        if($developers['developers-profile']) : 
        $p = 0;	
        $inTech = get_field('vc-technology',$thisPostID);
        foreach( $developers['developers-profile'] as $row ) : 
        $p++;			
        ?>
      <div class="flex-3">
        <div class="sample-block bg-voilet">
          <?php 
            if( $p == 1 ){
            	echo '<h3>Junior '.str_replace( 'Developers', 'Developer', $inTech ).'</h3>';
            }
            if( $p == 2 ){
            	echo '<h3>Mid Level '.str_replace( 'Developers', 'Developer', $inTech ).'</h3>';
            }
            if( $p == 3 ){
            	echo '<h3>Senior  Level '.str_replace( 'Developers', 'Developer', $inTech ).'</h3>';
            }
            
            if( $row['pricing'] ){
            	echo '<h4 class="clr-white">'.$row['pricing'].'</h4>';
            }
            
            if( $row['experience'] ){
            	echo '<h5 class="clr-white">'.$row['experience'].'</h5>';
            } 
            ?>
        </div>
      </div>
      <?php /* ?>
      <div class="flex-3 profile-blok-outer">
        <div class="profile-blocks bg-light-theme">
          <div class="profile-des-outer dis-flex">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/sample-profile-<?php echo $p; ?>.webp">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/sample-profile-<?php echo $p; ?>.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/sample-profile-<?php echo $p; ?>.png" alt="Valuecoders" width="82" height="82">
            </picture>
            <div class="profile-title">
              <h3>Sample Profile</h3>
              <span class="bg-blue"><?php echo $row['profile']; ?></span>
            </div>
          </div>
          <div class="profile-des">
            <ul>
              <li>Experience: <?php echo $row['experience']; ?></li>
              <li>Location: India<?php //echo $row['location']; ?></li>
              <li>Cost: <?php echo $row['Cost']; ?></li>
            </ul>
          </div>
          <a href="#" class="view-sample">View Sample Profile</a>
        </div>
      </div>
      <?php */ ?>
      <?php 
        endforeach; 
        endif;
        ?>
    </div>
    <!-- 
      <div class="text-center margin-t-100">
      	<?php //vc_cta(); ?>
      </div> 
      -->
  </div>
</section>
<?php endif; ?>

<?php 
if( $hasDMCta === false ) :
?>
<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70" id="dif--exp">
  <div class="container">
    <div class="head-txt text-center">
      <?php /* ?>	
      <h2>
        <?php 
          echo (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : 
          "Have any questions?"; ?>				
      </h2>
      <p>
        <?php 
          echo (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : 
          "Our managers will consult you about choosing a web-based solution for your needs."; 
          ?>
      </p>
      <?php */ ?>
      <h2>Ready to Experience the Difference?</h2>
      <p>Start your 7-day trial today and discover the perfect fit for your project needs.</p>
    </div>
    <?php
      $ctaTxt_two = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : "Talk To Our Experts";
      //cmnCTA_v3( $ctaTxt_two ); 
      echo hireCmn_cta();
      ?>
  </div>
</section>
<?php endif; ?>

<?php 
  /*
  $hireProcessSec = get_field('hire_php_developers');
  $hpEnabled 		= $hireProcessSec['is_enabled'];
  if( $hpEnabled == "yes" ) :
  $pocessType = ( isset( $hireProcessSec['hprocess-type'] ) && !empty( $hireProcessSec['hprocess-type'] ) ) ? $hireProcessSec['hprocess-type'] : '';
  $hpTitle 	= "Our Hiring Process";
  $hpText 	= "Take a look at our simple and straightforward process to hire software developers from ValueCoders.";
  
  $devText 	= get_field( 'vc-technology', $thisPostID );
  $hBody  	= 'Hire best software developers from our in-house tech pool. Interview & shortlist candidates to quickly find the perfect fit for your team.';
  if( $devText ){
  $devText 	= $devText;
  if( $thisPostID == 6431 ){
  $hBody = "Hire best software developers from our in-house tech pool. Interview & shortlist candidates to quickly find the perfect fit for your team.";
  }else{
  $hBody 		= 'Based on your requirement, we select the best developers from our tech pool as per project needs.';
  }
  
  }else{
  	$devText = "Software Developers";
  }
  ?>
<section id="vc-hprocess" class="four-step-with-icon-section padding-t-120 padding-b-120 <?php echo $hireProcessSec['sc_background'] ?>">
  <div class="container">
    <div class="head-txt text-center">
      <h2><?php echo $hpTitle; ?></h2>
      <p><?php echo $hpText; ?></p>
    </div>
    <div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
      <div class="flex-4 icon-box">
        <i class="icon icon1 vlazy"></i>
        <h3>Inquiry</h3>
        <p>We get on a call to understand your requirements and evaluate mutual fitment.</p>
      </div>
      <div class="flex-4 icon-box">
        <i class="icon icon2 vlazy"></i>
        <h3><?php echo "Select ".$devText; ?></h3>
        <p><?php echo $hBody; ?></p>
      </div>
      <div class="flex-4 icon-box">
        <i class="icon icon4 vlazy"></i>
        <h3>Team Integration</h3>
        <p>Our developers are now a part of your team. Assign tasks and get daily updates for smooth collaboration.</p>
      </div>
      <div class="flex-4 icon-box final-step">
        <i class="icon icon5 vlazy"></i>
        <h3>Team Scaling</h3>
        <p>We give you the flexibility to scale your team, be expanding or reducing team size.</p>
      </div>
    </div>
  </div>
</section>
<?php endif; */ ?>
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
<?php 
  if(is_page(14230)) : ?>
<section class="steps-of-hiring-shadow-specialist-section padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Steps Of Hiring Shadow Specialists In India</h2>
      <p>We follow a simple hiring process for shadow development specialists, as mentioned here:</p>
    </div>
    <div class="dis-flex col-box-outer margin-t-100">
      <div class="flex-2 left-box">
        <div class="list-box-outer">
          <div class="head-box bg-voilet">
            <h3>Our resource management team identifies suitable engineers based on
              project technology and domain identification. 
            </h3>
          </div>
          <div class="list-box">
            <p>We deploy Shadow engineer(s) for a project, first as a standby option, and later on, we
              include them in the project as per the need to scale or if a core engineer steps out for
              any reason. We do this at no additional cost to you and ensure to familiarize our shadow
              engineers with:
            </p>
            <ul>
              <li>Poor Project Management</li>
              <li>Longer Turnaround For Onboarding</li>
              <li>Difference In Timezone</li>
              <li>Nightmarish Coordination</li>
              <li>Miscommunication Due To Language And Cultural Barriers</li>
              <li>Delayed Delivery</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex-2 last-box">
        <div class="list-box-outer image-box">
          <div class="head-box bg-voilet">
            <h3>The project lead/tech manager/developer identifies the modules where the shadow engineer
              can be aligned.
            </h3>
          </div>
          <div class="list-box">
            <div class="right-box-outer">
              <div class="col-box-outer">
                <div class="number-box">1</div>
                <div class="text-box">
                  <p>The project objectives.</p>
                </div>
              </div>
              <div class="col-box-outer">
                <div class="number-box">2</div>
                <div class="text-box">
                  <p>The coding standards technologies being used.</p>
                </div>
              </div>
              <div class="col-box-outer">
                <div class="number-box">3</div>
                <div class="text-box">
                  <p>The tasks assigned &amp; the status of ongoing tasks.</p>
                </div>
              </div>
              <div class="col-box-outer">
                <div class="number-box">4</div>
                <div class="text-box">
                  <p>The milestones targeted, and the delivery schedule.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
  /*
  #section removed in version 3.0
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
<section class="faq-section padding-t-150 padding-b-150 <?php echo $faqs['sc_background']; ?>">
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

<?php 
$hpTestimonails = get_field('hp-ctestimonials');
if( $hpTestimonails !== "no" ){
  get_template_part('include/testimonials', 'v4.0');   
}
?>
<!-- Testimonail Section Ends Here -->
<div class="free-trail-pop-up">
  <div class="pop-up-inner">
    <span class="pop-close"></span>
    <div class="pop-up-box">
      <h2>2 Weeks Risk-Free Trial</h2>
      <p>We offer a 2 weeks risk-free trial for you to try out the resource(s) before onboarding. After 2 weeks, if you like the resource(s), you pay for the time and continue on. Else, we replace the aligned resource(s) or cancel the trial as per your wish.</p>
      <p>Simple, transparent and easy - isn't it?</p>
      <a class="green-btn" href="<?php echo site_url('/contact'); ?>">Start my 2 week risk-free trial now!</a>
    </div>
  </div>
</div>
<?php get_footer(); ?>