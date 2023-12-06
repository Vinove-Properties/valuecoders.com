<?php 
/*
Template Name: Home Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section">
<video class="row-lg vd-lazy" id="background-video" preload="yes"  loop autoplay loop muted playsinline>
    <source src="<?php bloginfo('template_url'); ?>/video/home-video.mp4" type="video/mp4" type="video/mp4">
</video>
	<div class="container">
		<div class="dis-flex">
			<div class="left-box">
				<?php 
				while( have_posts() ) : the_post(); 
				the_content();
				endwhile;
				?>
				<div class="margin-t-70">
					<a class="green-btn" href="<?php echo site_url('/contact'); ?>">Book A Free Consultation <i class="arrow-icon"></i></a>
            	</div>
			</div>

			<div class="right-box">
            <div class="img-box lighter-theme-img"
                data-src="<?php bloginfo('template_url'); ?>/images/logo-right.webp"
                style="background-image: url(<?php bloginfo('template_url'); ?>/images/logo-right.webp)">
            </div>
            </div>
		</div>
	</div>
</section>

<?php vcTrustedStartups(); ?>

<?php 
/*
$devSecEnabled = get_field('dev_is_enabled');
if( isset( $devSecEnabled ) && ($devSecEnabled == "yes") ) :
?>
<section class="three-column-icon-section bg-light-theme padding-t-150 padding-b-150">
<div class="container">
    <div class="head-txt text-center">
    	<?php the_field('section_services_head'); ?>    		
    </div>
    <?php 
    $cards = get_field('services_feature_cards');
    if( $cards ) :
    ?>
    <div class="dis-flex col-box-outer php-usage-sprite">
    	<?php 
    	foreach( $cards as $card ){
    	$icon 		= $card['icon'];
    	$iconwp 	= $card['icon_wp'];
    	$link 		= $card['card_button'];
    	//print_r($iconwp);
		echo '<div class="flex-2 box-3">
		<div class="box bg-blue-opacity-light">';
		if($icon && $iconwp){
			echo vcGetPtag($icon, $iconwp, $card['card_title'], 'lighter-theme-img' );
		}
		echo '<h3>'.$card['card_title'].'</h3>
		<p>'.$card['card_description'].'</p>';
		echo ( !empty($link) ) ? '<a href="'.$link.'" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>':'';
		echo '</div> </div>';
    	}
    	?>
                       
    </div>
	<?php endif; ?>
</div>
</section>
<?php endif; 
*/
?>
<section class="left-right-imagetext-home-section padding-t-150 padding-b-150">
    <div class="container">
        <div class="head-txt text-center">
            <h2>Software Development & Engineering Services</h2>
            <p>We deliver robust, scalable, and reliable software product solutions to clients across the globe
                driven by the top 1% of software engineering talent in India</p>
        </div>
        <div class="dis-flex col-box-outer">
            <div class="flex-2 content-bx">
                <div class="box-text for-box-effects">
                    <h3>Smart Teams</h3>
                    <p>You can extend or build a new software development team ground-up with top-notch software development experts from ValueCoders! We offer dedicated experts for front-end, back-end, UI/UX.....</p>
                    <a href="<?php echo site_url('/dedicated-development-teams'); ?>" class="learn-more clr-white">Learn
                        More<i class="round-arrow-icon"></i></a>
                </div>
                <div class="box-text for-box-effects">
                    <h3>Software Engineering</h3>
                    <p>We offer end-to-end software outsourcing services from initial consulting to development & deployment. Our expertise helps businesses launch new products faster, modernize existing....</p>
                    <a href="<?php echo site_url('/custom-software-development-services-company'); ?>" class="learn-more clr-white">Learn
                        More<i class="round-arrow-icon"></i></a>
                </div>
            </div>
            <div class="flex-2">
                <div class="img-box">
                    <picture>
                        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img1.webp">
                        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img1.png">
                        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img1.png" alt="Valuecoders" width="830" height="668">
                    </picture>
                </div>
            </div>

            <div class="flex-2">
                <div class="img-box">
                    <picture>
                        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img2.webp">
                        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img2.png">
                        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img2.png" alt="Valuecoders" width="701" height="591">
                    </picture>
                </div>
            </div>
            <div class="flex-2 content-bx">
                <div class="box-text for-box-effects">
                    <h3>Smart Automation</h3>
                    <p>You can save invaluable human resources, accelerate your business and maximize throughput with our smart automation services. We leverage cutting edge technologies like BlockChain, RPA, Machine Learning ....</p>
                    <a href="<?php echo site_url('/digital-transformation-services'); ?>" class="learn-more clr-white">Learn
                        More<i class="round-arrow-icon"></i></a>
                </div>
                <div class="box-text for-box-effects">
                    <h3>QA & Testing</h3>
                    <p>We are a top-rated software quality assurance & testing company leveraging our potential to profound expertise in delivering quality tested applications to businesses.</p>
                    <a href="<?php echo site_url('/software-quality-assurance-testing-services'); ?>" class="learn-more clr-white">Learn
                        More<i class="round-arrow-icon"></i></a>
                </div>
            </div>

            <div class="flex-2 content-bx">
                <div class="box-text for-box-effects">
                    <h3>eCommerce</h3>
                    <p>We provide user-friendly & full-featured eCommerce solutions that will help you sell more products and increase revenue from your eCommerce business.</p>
                    <a href="<?php echo site_url('/ecommerce-development-services'); ?>" class="learn-more clr-white">Learn
                        More<i class="round-arrow-icon"></i></a>
                </div>
                <div class="box-text for-box-effects">
                    <h3>Analytics & DevOps</h3>
                    <p>As part of our Business Intelligence Consulting Services, we help businesses bridge data gaps, gain unprecedented insight into operations, and facilitate imperative data-driven...</p>
                    <a href="<?php echo site_url('/devops-consulting-engineering-services-company'); ?>" class="learn-more clr-white">Learn
                        More<i class="round-arrow-icon"></i></a>
                </div>
            </div>
            <div class="flex-2">
                <div class="img-box">
                    <picture>
                        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img3.webp">
                        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img3.png">
                        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/soft-engg-service-img3.png" alt="Valuecoders" width="703" height="402">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="experts-talk-first-section bg-blue-linear padding-t-150 padding-b-150">
    <div class="container">
        <div class="head-txt text-center">
            <h2>Let's Discuss Your Project</h2>
            <p>Get free consultation and let us know your project idea to turn it into an amazing digital product.
            </p>
        </div>
        <div class="text-center margin-t-50">
        <a class="green-btn" href="<?php echo site_url('/contact'); ?>">
        Talk To Our Experts <i class="arrow-icon"></i>
        </a>
        </div>
    </div>
</section>


<section class="icon-with-img-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2">
				<div class="head-txt">
					
					<h2>Outsourcing Software Development To ValueCoders<sup><small>TM</small></sup></h2>
					<p>When you outsource your software development to ValueCoders you get peace of mind by entrusting us your all or part of development responsibilities. We stay on schedule, ensure product quality and scale the teams as needed. You get full flexibility & control over the project just like your in-house team.</p>
					<p>Our business domain knowledge, technology expertise & proven methodologies yield high quality solutions that add value to businesses make us one of India's best software outsourcing companies.</p>
					<p>From startups to enterprises, product companies to digital agencies, SMEs to governments, we have provided best-in-class software development services to them all.</p>
				</div>
				<div class="dis-flex hire-php-icon icon-box-outer">
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-1.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-1.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-1.png" alt="Valuecoders" width="52" height="52"> 
			</picture>
			<span class="icon-txt">100% own staff, No<br> freelancers</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-2.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-2.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-2.png" alt="Valuecoders" width="53" height="52"> 
			</picture>
			<span class="icon-txt">Cost-effective</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-3.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-3.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-3.png" alt="Valuecoders" width="52" height="52">
			</picture>
			<span class="icon-txt">India's top software<br> engineers</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-4.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-4.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-4.png" alt="Valuecoders" width="52" height="52"> 
			</picture>
			<span class="icon-txt">Flexible engagement <br>options</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-5.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-5.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-5.png" alt="Valuecoders" width="43" height="52"> 
			</picture>
			<span class="icon-txt">Easy communication</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-6.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-6.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-6.png" alt="Valuecoders" width="52" height="52"> 
			</picture>
			<span class="icon-txt">Ethical & honest<br> approach</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-7.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-7.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-7.png" alt="Valuecoders" width="52" height="52"> 
			</picture>
			<span class="icon-txt">Reduced TTM<br> (Time to Market)</span>
		</div>
	</div>
	<div class="flex-2 margin-t-50">
		<div class="dis-flex items-center">
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-8.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-8.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/home-vc-icon-icon-8.png" alt="Valuecoders" width="36" height="52"> 
			</picture>
			<span class="icon-txt">Well defined <br>SLAs</span>
		</div>
	</div>
</div>
			</div>
			<div class="flex-2 text-right right-box od-row">
				<?php //if( !wp_is_mobile() ) : ?>
				<picture>
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/vc-img-pattrn.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/vc-img-pattrn.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/vc-img-pattrn.png" alt="Valuecoders" width="800" height="871"> 
				</picture>
				<?php //endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="home-award-slider-section">
	<div class="container">
		<div class="dis-flex home-award-slider-outer">
			<div class="flex-2">
				<div class="head-txt">
					<h2>Awards & Recognitions</h2>
					<p>Take a glance at our Awards & Recognitions. This is how we made success stories for over 18+ years with our market-leading digitally advanced software solutions.</p>
				</div>
			</div>
			<div class="flex-2">
			<div id="hasHome-award-slider" class="glider-contain home-award-slider">
  <div class="glider">
    <div class="slide-item">
      <div class="dis-flex">
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/cmmi-l3.png"
              alt="Valuecoders" width="112" height="80">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-9.png"
              alt="Valuecoders" width="69" height="69">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-2.png"
              alt="Valuecoders" width="124" height="67">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-1.png"
              alt="Valuecoders" width="166" height="69">
          </div>
        </div>
        <div class="flex-3">
      <div class="logo-box bg-light-theme">
        <img loading="lazy" class="lighter-theme-img" src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-13.png" alt="Valuecoders" width="52" height="87">
      </div>
    </div>
	
	<div class="flex-3">
	<div class="logo-box bg-light-theme">
	<img loading="lazy" class="lighter-theme-img" src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-12.png" alt="Valuecoders" width="60" height="78">
	</div>
	</div>        
    </div>
</div>
	<div class="slide-item">
      <div class="dis-flex">
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light8.png"
              alt="Valuecoders" width="105" height="89">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-14.png"
              alt="Valuecoders" width="126" height="81">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-15.png"
              alt="Valuecoders" width="126" height="81">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-16.png"
              alt="Valuecoders" width="126" height="81">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/home-award-for-light-17.png"
              alt="Valuecoders" width="126" height="81">
          </div>
        </div>
        <div class="flex-3">
          <div class="logo-box bg-light-theme">
            <img loading="lazy" class="lighter-theme-img"
              src="<?php bloginfo('template_url'); ?>/images/life-hacker.png"
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
	</div>
</section>

<?php
$wwOptions = get_field('work-with-opt');
if( $wwOptions['is_enabled'] == 'yes' ) {
$workwithimagedarkwebp 	= get_field('section_image_dark_theme_we_work_with_webp','option'); 
$workwithimagelightwebp = get_field('section_image_light_theme_we_work_with_webp','option'); 
$workwithimagedark 		= get_field('section_image_dark_theme_we_work_with','option');
$workwithimagelight 	= get_field('section_image_light_theme_we_work_with','option');
?>
<section class="client-img-section padding-t-150 padding-b-150 <?php echo $wwOptions['sc_background']; ?>">
	<div class="container">
		<div class="dis-flex col-box-outer items-center">
			<div class="flex-2 left-box">
				<picture class="dark-theme-img">
				<source type="<?php echo $workwithimagedarkwebp['mime_type']; ?>" srcset="<?php echo $workwithimagedarkwebp['url']; ?>">
					<source type="<?php echo $workwithimagedark['mime_type']; ?>" srcset="<?php echo $workwithimagedark['url']; ?>">
					<img loading="lazy" src="<?php echo $workwithimagedark['url']; ?>"
					alt="<?php echo $workwithimagedarkwebp['alt']; ?>" width="<?php echo $workwithimagedarkwebp['width']; ?>" height="<?php echo $workwithimagedarkwebp['height']; ?>">
				</picture>
				<picture class="lighter-theme-img">
				<source type="<?php echo $workwithimagelightwebp['mime_type']; ?>" srcset="<?php echo $workwithimagelightwebp['url']; ?>">
					<source type="<?php echo $workwithimagelight['mime_type']; ?>" srcset="<?php echo $workwithimagelight['url']; ?>">
					<img loading="lazy" src="<?php echo $workwithimagelight['url']; ?>"
					alt="<?php echo $workwithimagelightwebp['alt']; ?>" width="<?php echo $workwithimagelightwebp['width']; ?>" height="<?php echo $workwithimagelightwebp['height']; ?>">
				</picture>
			</div>
			<div class="flex-2 right-box tick-icon-list">
				<div class="head-txt">
					<h2>
						<?php the_field('section_title_we_work_with', 'option') ?>
					</h2>
					<p>
						<?php the_field('section_content_we_work_with','option'); ?>
					</p>
				</div>
				<?php if( have_rows('section_list_content_we_work_with', 'option') ): ?>
				<ul>
					<?php while( have_rows('section_list_content_we_work_with', 'option') ): the_row(); ?>
					<li>
						<?php the_sub_field('list_item_we_work','option'); ?>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php 
} 

$gtSecEnabled 	= get_field('gt_is_enabled');
$gtSecBg 		= get_field('gt_sc_background');
if( $gtSecEnabled == "yes" ) : ?>
<section class="counter-column-section padding-b-100 padding-t-100">
        <div class="container for-pattern-img">
            <div class="dis-flex counter-column-outer">
                <div class="left-box">
	                <?php the_field('heading_content_get_started'); ?>
	                <a class="green-btn" href="<?php echo site_url('/contact'); ?>">Contact Us <i class="arrow-icon"></i></a>
                </div>
                <div class="counter-icons">
                    <div class="dis-flex justify-sb">
                        <div class="flex-2 counter-box">
                            <span class="icon icon1 vlazy"></span>
                            <span class="icon-txt">
                                <span class="large-txt clr-white">4,200+</span>
                                Projects Launched </span>
                        </div>
                        <div class="flex-2 counter-box">
                            <span class="icon icon2 vlazy"></span>
                            <span class="icon-txt">
                                <span class="large-txt">18+</span>
                                Years Experience </span>
                        </div>
                        <div class="flex-2 counter-box">
                            <span class="icon icon3 vlazy"></span>
                            <span class="icon-txt">
                                <span class="large-txt">2,500+</span>
                                Satisfied Customers </span>
                        </div>
                        <div class="flex-2 counter-box">
                            <span class="icon icon4 vlazy"></span>
                            <span class="icon-txt">
                                <span class="large-txt">97%+</span>
                                Client Retention </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php endif; ?>
<?php
/*
$gtSecEnabled 	= get_field('gt_is_enabled');
$gtSecBg 		= get_field('gt_sc_background');
if( $gtSecEnabled == "yes" ) : 
?>
<section class="counter-column-section <?php echo $gtSecBg; ?> padding-b-150 padding-t-150">
	<div class="container for-pattern-img">
		<div class="dis-flex bg-dark-theme counter-column-outer">
			<div class="left-box">
        		<?php the_field('heading_content_get_started'); ?>
				<?php vc_cta(); ?>
			</div>
			<div class="counter-icons">
			<?php if( have_rows('section_list_get_started') ): ?>
				<div class="dis-flex justify-sb">
				<?php $inc = 1 ; ?>
				<?php while( have_rows('section_list_get_started') ): the_row(); ?>
					<div class="flex-2 counter-box">
						<span class="icon icon<?php echo $inc; ?> vlazy"></span>
						<span class="icon-txt">
							<span class="large-txt clr-white"><?php the_sub_field('list_item_title')?></span>
							<?php the_sub_field('list_item_sub_title')?>
						</span>
					</div>
					<?php $inc++; ?>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; 
*/
?>

<?php 
$tecSecEnabled 	= get_field('tec_is_enabled');
$tecSecBg 		= get_field('tec_sc_background');
if( $tecSecEnabled == "yes" ) : 
?>
<section id="load-tech-stack" class="tech-stack-section <?php echo $tecSecBg; ?> padding-t-150 padding-b-150">
<div id="tech-stack-bx" class="container">
	<div class="head-txt text-center"><?php the_field('section_tech_stacks_head', 265); ?></div>
</div>	
</section>
<?php 
endif; 

$indOptions = get_field('industry-opt');
if( $indOptions['is_enabled'] == 'yes' ) :
?>
<section class="img-column-section <?php echo $indOptions['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php the_field('section_content_industry','option'); ?>
		</div>
		<?php if( have_rows('industry_cards','option') ): ?>
		<div class="dis-flex margin-t-80">
		<?php while( have_rows('industry_cards','option') ): the_row(); ?>
			<div class="flex-3 col-box">
				<div class="img-box img1" data-src="<?php echo the_sub_field('card_image','option'); ?>">
					<h3><?php the_sub_field('card_title','option'); ?></h3>
					<p><?php the_sub_field('card_excerpt','option'); ?></p>
					<?php 
					$cardlink = get_sub_field('card_link','option');
					if(  $cardlink  ): 
					?>
					<a href="<?php echo vc_siteurl( $cardlink ); ?>" class="learn-more clr-white">Learn More<i class="round-arrow-icon"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php
$otSecEnabled 	= get_field('ot_is_enabled');
$otSecBg 		= get_field('ot_sc_background');
if( $otSecEnabled == "yes" ) : 

$section_image_out = get_field('section_image_out');  
$section_image_outwebp = get_field('section_image_out_webp');
if(count($section_image_out)>0 && count($section_image_outwebp)>0){
?>
<section class="valuecoders-img-section padding-t-150 <?php echo $otSecBg; ?> padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
		 <?php the_field('section_heading_content_out');  ?>
		</div>
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-2 left-box">
				<picture>
				<source type="<?php echo $section_image_outwebp['mime_type']; ?>" srcset="<?php echo $section_image_outwebp['url']; ?>">
				<source type="<?php echo $section_image_out['mime_type']; ?>" srcset="<?php echo $section_image_out['url']; ?>">
					<img loading="lazy" src="<?php echo $section_image_out['url']; ?>"
					alt="<?php echo $section_image_out['alt']; ?>" width="<?php echo $section_image_out['width']; ?>" height="<?php echo $section_image_out['height']; ?>">
				</picture>
			</div>
			<div class="flex-2 right-box">
			<?php the_field('section_main_content_out');  ?>
			
			  	<?php if( have_rows('outsourcing_icon_cards') ): ?>
				<div class="icon-box-outer dis-flex margin-t-50">
				<?php $j = 1 ?>
				<?php while( have_rows('outsourcing_icon_cards') ): the_row(); ?>
					<div class="icon-box">
						<span class="icon icon<?php echo $j; ?>"></span>
					    <?php the_sub_field('card_list_item');?>
					</div>
					<?php $j++; ?>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php } 
endif; ?>

<?php
/*
$gtSecEnabled 	= get_field('gt_is_enabled');
$gtSecBg 		= get_field('gt_sc_background');
if( $gtSecEnabled == "yes" ) : 
?>
<section class="counter-column-section <?php echo $gtSecBg; ?> padding-b-150 padding-t-150">
	<div class="container for-pattern-img">
		<div class="dis-flex bg-dark-theme counter-column-outer">
			<div class="left-box">
        		<?php the_field('heading_content_get_started'); ?>
				<?php vc_cta(); ?>
			</div>
			<div class="counter-icons">
			<?php if( have_rows('section_list_get_started') ): ?>
				<div class="dis-flex justify-sb">
					<?php $inc = 1 ; ?>
				<?php while( have_rows('section_list_get_started') ): the_row(); ?>
					<div class="flex-2 counter-box">
						<span class="icon icon<?php echo $inc; ?>"></span>
						<span class="icon-txt">
							<span class="large-txt clr-white"><?php the_sub_field('list_item_title')?></span>
							<?php the_sub_field('list_item_sub_title')?>
						</span>
					</div>
					<?php $inc++; ?>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; 
*/
?>

<?php getPageCaseStudies( $thisPostID ); ?>

<?php 
$guideTopics = get_field('guide-topics');
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
<?php endif; 
$ctOptions 				= get_field('client-testimo');
if( $ctOptions['is_enabled'] == 'yes' ) :
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );
?>
<section class="client-video-section padding-t-150 padding-b-150 <?php echo $ctOptions['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $testimonailsContent; ?>
		</div>
		<?php if( $testimonailsList ) : ?>
		<div class="glider-contain client-testimonial-slider">
			<div class="glider">
				<?php foreach( $testimonailsList as $row ) : ?>
				<div class="client-videos shadow-box">
					<div class="client-video-box">
						<iframe width="483" height="312" src="<?php echo $row['yt-video']; ?>"
							srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background:url(<?php echo $row['client_thumbnail']; ?>) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=<?php echo $row['yt-video']; ?>><span class='iframe-bg'></span></a>"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen
							title="Testimonial Image"></iframe>
					</div>
					<div class="client-description bg-white">
						<span class="client-name">
							<?php echo $row['client-name']; ?>
						</span>
						<span class="client-quote">
							<?php echo $row['Comment']; ?>
						</span>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<button aria-label="Previous" class="glider-prev vlazy"></button>
			<button aria-label="Next" class="glider-next vlazy"></button>
			<div role="tablist" class="dots"></div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php 
endif;
?>
<?php get_footer(); ?>