<?php 
/*
Template Name: Home Page V4.0 Template
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
<?php 
get_template_part('inc/cmn', 'startups');
//vcTrustedStartups(); ?>

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
				$moreLink 	= '';
				if( isset( $row['link'] ) && !empty($row['link']) ){
				$moreLink 	= '<div class="exbtn margin-t-50"><a class="explore-btn" href="'.vc_siteurl($row['link']).'">Know More</a></div>';	
				}
        $hasAnchor 	= (isset($row['link']) && !empty($row['link'])) ? 'has-link' : '';
				echo '<div class="accordionItem '.$ai_active.'">
			    <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$row['title'].'</span>'.$title.'</h3>
			    <div class="accordion-content">'.$row['description'].$moreLink.'</div>
			  	</div>';
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

<?php
$vSolutions = get_field('solutions-v4');
if( isset( $vSolutions['is_enable'] ) && ($vSolutions['is_enable'] == "yes") ) : ?>
<section class="img-column-section <?php echo $bg; ?> padding-t-120" id="v4-solutions">
<div class="container">
	<div class="dis-flex items-center top-content">
      <div class="flex-2"><?php echo $vSolutions['content']; ?></div>
      <div class="flex-2 text-right">
        <!--<a class="explore-btn" href="<?php echo $vSolutions['link']; ?>">Explore all Solutions</a>-->
      </div>
  </div>
	<div class="dis-flex margin-t-80">
	<?php 
	if( $vSolutions['cards'] ){
	foreach( $vSolutions['cards'] as $card ) {
	echo '<div class="flex-3 col-box">
  <div class="img-box img1 vlazy" style="background-image:url('.$card['image']['url'].');">
  <h3>'.$card['title'].'</h3>
  <p>'.$card['text'].'</p>';
	echo ($card['link'])	? '<a href="'.$card['link'].'" class="learn-more clr-white">Learn More<i class="round-arrow-icon"></i></a>' : '';		
  echo	'</div></div>';		
	}	
	}
	?>
	</div>
</div>
</section>
<?php 
endif;
?>

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
              <span class="display">25,000+</span>
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

<section class="animated-tech padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center">
    <?php the_field('section_tech_stacks_head'); ?>
  </div>
</div>
<div class="tech-section margin-t-80">
<?php 
$techStacks = get_field('tech_stacks_cards');
if( $techStacks ){
$ts = 0;	
foreach( $techStacks as $mrow ){ $ts++;
$animate = ( ($ts % 2) === 0 ) ? 'animate-slide-to-right' : 'animate-slide-to-left';
echo '<div class="tech-row"><div class="tech-stack '.$animate.' hover:pause">';
echo '<ul>';
	foreach( $mrow['tech_icon'] as $row ){
		if( $row['tech_icon_link'] ){
			echo '<li><a href="'.vc_siteurl($row['tech_icon_link']).'">'.$row['tech_text_list'].'</a></li>';
		}else{
			echo '<li>'.$row['tech_text_list'].'</li>';	
		}	  			
	}
echo '</ul>';
echo '</div></div>';
}
}
?>
</div>	
<div class="explore-sc text-center margin-t-80"><a class="explore-btn" href="/hire-developers">Explore all Technologies</a></div>
</section>

<section class="lets-discuss-cta bg-blue-linear padding-t-70 padding-b-70">
<div class="container">
  <div class="dis-flex justify-sb">
    <div class="left-sec">
      <div class="head-txt">
        <h2>Transform Your Business Today</h2>
        <p>Discover bespoke IT solutions for unparalleled business growth.
        </p>
      </div>
      <div class="btn-sec margin-t-50">
        <a href="<?php echo site_url('/contact'); ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
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

<?php getCmnIndustriesv4(); ?>

<?php 
$solEnable = get_field('sol_is_enabled');
if( $solEnable == "yes" ) :
$htContent 	= get_field('sol-content');
//$headText 	= fnextractHeadins('h2', $htContent );
?>
<section class="solution bg-light padding-t-120 padding-b-120">
  <div class="container">
		<div class="head-txt text-center"><?php echo $htContent; ?></div>
    <div class="dis-flex col-box-outer margin-t-80">
	<?php 
	$splLoop = get_field('sol-loop');
	if( $splLoop ){
	foreach($splLoop as $row){
	?>
	<div class="flex-3 box-3">
		<div class="box">
			<?php 
			echo $row['content']; 
			if( $row['link'] ){
				echo '<div class="exbtn"><a class="explore-btn" href="'.vc_siteurl($row['link']).'">Explore More</a></div>';
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
<?php getPageCaseStudiesV3( $thisPostID, true ); ?>
<?php //cmnTestimonials_v3( $thisPostID ); ?>
<?php get_template_part('include/testimonials', 'v4.0'); ?>
<?php get_footer(); ?>