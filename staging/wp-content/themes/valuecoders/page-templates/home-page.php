<?php 
/*
Template Name: Home Page Template
*/ 
global $post;
$thisPostID = $post->ID;
$vcBtn 			= get_field('vc-cta', $thisPostID);
get_header();
?>
<section class="hero-section">
  <video class="row-lg vd-lazy" id="background-video" loop autoplay muted playsinline>
    <source src="<?php bloginfo('template_url'); ?>/video/home-video.mp4" type="video/mp4">
  </video>
  <div class="container">
    <div class="for-client-logo-box  dis-flex">
      <div class="logo-box logo1 vlazy"></div>
      <div class="logo-box logo2 vlazy"></div>
      <div class="logo-box logo3 vlazy"></div>
      <div class="logo-box logo4 vlazy"></div>
    </div>
    <div class="dis-flex">
      <div class="left-box">
        <?php 
		while( have_posts() ) : the_post(); 
		the_content();
		endwhile;
		?>
      </div>
    </div>
  </div>
</section>
<?php vcTrustedStartups(); ?>

<?php 
$devColumn = get_field('dev_is_enabled');
if( $devColumn == "yes" ) :
?>
<section class="accordion-section  padding-t-120">
	<div class="dis-flex accordian-row">
	<div class="col-left">
	  <div class="head-txt">
	    <?php the_field('dev-lcontent'); ?>
	  </div>
	  <div class="image-wrap">
		<?php 
		$devPicture = get_field('dev-simage');
		if( $devPicture ){
		echo vc_pictureElm( $devPicture, 'ValueCoders', 'soft-img' );
		}
		?>
     </div>
	</div>
	<div class="col-right padding-b-120">
		<?php 
		$devLoop = get_field('dev-vservices');
		if( $devLoop ){
			$lp = 0;
			foreach( $devLoop as $row ){
				$lp++;
				$ai_active = ( $lp == 1 ) ? ' active' : '';	
				$title    	= ($row['link']) ? '<a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a>' : '';
        $hasAnchor 	= (isset($row['link']) && !empty($row['link'])) ? 'has-link' : '';
				echo '<div class="accordionItem '.$ai_active.'">
			    <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$row['title'].'</span>'.$title.'</h3>
			    <div class="accordion-content">'.$row['description'].'</div>
			  	</div>';
			}
		}
		?>		  
	</div>
	</div>
</section>
<?php endif; ?>
<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
  <div class="container">
    <div class="head-txt text-center">
		<h2>
		<?php 
		echo (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : 
		"Let's Discuss Your Project"; ?>
		</h2>
		<p>
		<?php 
		echo (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : 
		"Get free consultation and let us know your project idea to turn it into an amazing digital product."; 
		?></p>
    </div>
		<?php 
		$ctaOne = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
		"Book a Free Consultation"; 
		cmnCTA_v3($ctaOne); 
		?>
  </div>
</section>

<?php 
$osSection = get_field('ot_is_enabled');
if( $osSection == "yes" ) :
?>
<section class="outsource-software bg-light padding-t-120 padding-b-120">
      <div class="container">
        <div class="dis-flex">
          	<div class="flex-2 content-box">
            <?php the_field('ot_content'); ?>
            <div class="dis-flex icon-box-outer">
			<?php 
			$pointLoop = get_field('ot_points'); 
			if( $pointLoop ){
				foreach ($pointLoop as $row ){
					$icon = ( isset( $row['icon'] ) && !empty( $row['icon'] ) ) ? vc_pictureElm( $row['icon'] ) : '';
					echo '<div class="flex-2 margin-t-30">
					<div class="dis-flex items-center">
					'.$icon.'
					<span>'.$row['text'].'</span>
					</div>
					</div>';		
				}
			}	
			?>
            </div>
          	</div>
          <div class="flex-2 image-box">
			<?php 
			$osImage = get_field('ot_image');
			if( $osImage ){
				echo vc_pictureElm( $osImage, 'ValueCoders', 'soft-img' );
			}
			?>                    
          </div>
        </div>
      </div>
</section>
<?php endif; ?>
<section class="award-recognition padding-b-120 padding-t-120">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2">
        <h2>
          Awards & Recognitions
        </h2>
      </div>
      <div class="flex-2">
        <p>
          Take a glance at our Awards & Recognitions. This is how we made success stories for over 20+ years with our market-leading digitally advanced software solutions.
        </p>
      </div>
    </div>
    <div class="dis-flex awardrow margin-t-80">
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo01.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo01.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo01.png" alt="Valuecoders" width="145" height="104" >
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo02.png">
            <source type="image/png" srcset="award-logo02.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo02.png" alt="Valuecoders" width="171" height="109">
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo03.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo03.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo03.png" alt="Valuecoders" width="203" height="85">
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo04.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo04.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo04.png"  alt="Valuecoders" width="101" height="101">
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo05.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo05.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo05.png"  alt="Valuecoders" width="120" height="42">
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo06.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo06.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo06.png" alt="Valuecoders" width="120" height="101">
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo07.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo07.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo07.png" alt="Valuecoders" width="90" height="154">
          </picture>
        </div>
      </div>
      <div class="flex-4">
        <div class="card bg-light">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/award-logo08.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/ward-logo08.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/ward-logo08.png" alt="Valuecoders" width="120" height="81">
          </picture>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
$clSection = get_field('cl_is_enabled');
if( $clSection == "yes" ) :
?>
<section class="client-img-section padding-b-120">
	<div class="container">
		<div class="dis-flex items-center">
		  <div class="flex-2 left-box">
		    <div class="head-txt">
		      <?php the_field('cl-content'); ?>
		    </div>
		    <?php 
		    $clPointers = get_field('cl-point');
		    if( $clPointers ){
		    	echo '<ul>';
		    	foreach( $clPointers as $row ){
		    		$icon = ( isset( $row['icon'] ) && !empty( $row['icon'] ) ) ? vc_pictureElm( $row['icon'] ) : '';
		    		echo '<li>'.$icon.$row['text'].'</li>';
		    	}
		    	echo '</ul>';
		    }
		    ?>
		  </div>
		  <div class="flex-2 right-box">
			<?php 
			$clImage = get_field('cl-image');
			if( $clImage ){
			echo vc_pictureElm( $clImage, 'ValueCoders', 'soft-img' );
			}
			?>            
		  </div>
		</div>
	</div>
</section>
<?php endif; ?>
<section class="counter-column-section bg-blue-linear padding-b-70 padding-t-70">
	<div class="container for-pattern-img">
	<div class="dis-flex items-center  justify-sb counter-column-outer">
	  <div class="left-box">
	    <h2>Ready To Get Started?</h2>
	    <p>Consistently recognized as one of India’s best software development companies with the proven success of over 20+ years with thousands of customers globally. You can entrust us with your software development and outsourcing needs.</p>
	    
	    <div class="cta-wrap margin-t-50">
      <div class="cta-btn">
        <a href="<?php echo site_url('/contact'); ?>">
        Contact Us
        <span class="arrow-wrap">
        <span class="arrow primera"></span>
        <span class="arrow segunda next"></span>
        <span class="arrow last"></span>
        </span>
        </a>
      </div>
    </div>
	  </div>
	  <div class="counter-icons">
	    <div class="dis-flex justify-sb">
	      <div class="flex-3 counter-box">
	        <span class="icon icon1 vlazy"></span>
	        <span class="icon-txt">
	        <span class="large-txt clr-white">20+</span>
	        Years Experience</span>
	      </div>
	      <div class="flex-3 counter-box">
	        <span class="icon icon2 vlazy"></span>
	        <span class="icon-txt">
	        <span class="large-txt">2,500+</span>
	        Satisfied Customers</span>
	      </div>
	      <div class="flex-3 counter-box">
	        <span class="icon icon3 vlazy"></span>
	        <span class="icon-txt">
	        <span class="large-txt">97%+</span>
	        Client Retention</span>
	      </div>
	    </div>
	  </div>
	</div>
	</div>
</section>

<section class="tech-stacks bg-light padding-t-120 padding-b-120">
	<div class="container">
	  <div class="head-txt text-center">
	  	<?php the_field('section_tech_stacks_head'); ?>
	  </div>
	  <?php 
	  $techStacks = get_field('tech_stacks_cards');
	  if( $techStacks ){
	  echo '<div class="dis-flex col-box-outer margin-t-50">';
	  foreach( $techStacks as $mrow ){
	  	if( $mrow['card_link'] ){
	  		$hlink = '<a href="'.vc_siteurl($mrow['card_link']).'">'.$mrow['card_title'].'</a>';
	  	}else{
				$hlink = $mrow['card_title'];
	  	}
	  	echo '<div class="flex-3 col-box"><div class="inner-box"><h3>'.$hlink.'</h3>';
	  	if( $mrow['tech_icon'] ){
	  		echo '<ul>';
	  		foreach( $mrow['tech_icon'] as $row ){
	  			if( $row['tech_icon_link'] ){
	  				echo '<li><a href="'.vc_siteurl($row['tech_icon_link']).'">'.$row['tech_text_list'].'</a></li>';
	  			}else{
	  				echo '<li>'.$row['tech_text_list'].'</li>';	
	  			}
	  			
	  		}
	  		echo '</ul>';
	  	}
			echo '</div></div>';
	  }
	  echo '</div>';	
	  }
	  ?>
	</div>
</section>

<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
  <div class="container">
    <div class="head-txt text-center">
      <h2>
			<?php 
			echo (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : 
			"Got a Project in Mind? Tell Us More"; ?>
			</h2>
      <p>
			<?php 
			echo (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : 
			"Drop us a line and we'll get back to you immediately to schedule a call and discuss your needs personally."; ?></p>
    </div>
    <?php 
    $ctaTwo = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : 
      "Talk To Our Experts"; 
    cmnCTA_v3( $ctaTwo );
    ?>
  </div>
</section>

<?php
$indOptions = get_field('industry-opt');
	if( isset( $indOptions['is_enabled'] ) && ($indOptions['is_enabled'] == "yes") ){
		$indBG = ( isset( $indOptions['sc_background'] ) ) ? $indOptions['sc_background'] : '';	
		$indContent =  get_field('section_content_industry','option');
		getCmnIndustries( $indBG, $indContent );	
	}
?>

<?php 
$solEnable = get_field('sol_is_enabled');
if( $solEnable == "yes" ) :
$htContent 	= get_field('sol-content');
$headText 	= fnextractHeadins('h2', $htContent );
?>
<section class="three-column-icon-section bg-light padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">    	
	<?php 
	$splLoop = get_field('sol-loop');
	if( $splLoop ){
	foreach($splLoop as $row){
	?>
	<div class="flex-3 box-3 has-anchor">
		<div class="box">
			<?php 
			echo $row['content']; 
			if( $row['link'] ){
				echo '<a class="box-anchor" href="'.vc_siteurl($row['link']).'"></a>';
			}
			?>
		</div>
	</div>
	<?php } 
	} 
	?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php getPageCaseStudiesV3( $thisPostID, true ); ?>
<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enabled'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-150 padding-b-150 <?php echo $faqs['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center"><?php echo $faqs['content'];  ?></div>
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

<?php cmnTestimonials_v3( $thisPostID ); ?>

<?php get_footer(); ?>