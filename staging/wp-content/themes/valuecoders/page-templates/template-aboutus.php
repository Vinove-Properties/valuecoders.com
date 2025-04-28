<?php
/*
Template Name: About Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section for-about-section">
  <div class="container">
    <div class="dis-flex items-center">
      <div class="flex-2 header-left-content">
        <div class="for-client-logo-box  dis-flex">
          <div class="logo-box logo1"></div>
          <div class="logo-box logo2"></div>
          <div class="logo-box logo3"></div>
          <div class="logo-box logo4"></div>
        </div>
        <?php 
        while( have_posts() ) : the_post();
        	the_content();
        endwhile; 
        ?>
      </div>
      <div class="flex-2 header-right-image">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/about-img.png">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/about-img.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/about-img.png" alt="Valuecoders" 
          width="780" height="528">
        </picture>
      </div>
    </div>
  </div>
</section>
<!--<?php vcTrustedStartups(); ?>-->

<section class="our-mission padding-t-120 padding-b-120">
	<div class="container">
		<div class="dis-flex">
		  <div class="flex-2 left-box">
		    <h2>Our mission</h2>
		    <p>We drive business success through innovative digital solutions, enhancing efficiency, fostering growth, and providing a competitive edge for businesses of all sizes, everywhere.</p>
		  </div>
		  <div class="flex-2 right-box">
		    <div class="our-mission-text">
		      <p>We help businesses unveil and satisfy demand for digital transformation by providing engineering and consulting services that foster competitiveness and innovation.</p>
		      <div class="mission-person dis-flex">
		        <div class="pesron-image">
		          <picture>
		            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/our-mission-person.svg" 
		            width="115" height="108" alt="Our mission">
		          </picture>
		        </div>
		        <div class="pesron-info">
		          <h3>Parvesh Aggarwal</h3>
		          <p>CEO, ValueCoders</p>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</section>

<section class="core-values bg-light">
  <div class="dis-flex">
    <div class="flex-2 left-box">
      <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-values.png">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-values.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/core-values.png" width="853" 
        height="1002" alt="core values">
      </picture>
    </div>
    <div class="flex-2 right-box padding-t-100  padding-b-100">
      <h2>Our Core Values</h2>
      <p>At ValueCoders, we embrace a well-established set of cultural and professional values which represent our highestaspirations for how we engage as colleagues, fellows, alumni, partners, and board members</p>
      <div class="dis-flex items-center core-outer">
        <div class="flex-2">
          <div class="box">
            <picture class="icon-box">
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon01.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon01.png" 
              alt="valuecoders" width="67" height="45">
            </picture>
            <h3>Respect</h3>
            <p>Set trends for your peers and the industry in general to follow.</p>
          </div>
        </div>
        <div class="flex-2">
          <div class="box">
            <picture class="icon-box">
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon02.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon02.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon02.png" alt="valuecoders" 
              width="55" height="46">
            </picture>
            <h3>Exceptional value</h3>
            <p>Understand and exceed customer's expectations all the time.</p>
          </div>
        </div>
        <div class="flex-2">
          <div class="box">
            <picture class="icon-box">
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon03.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon03.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon03.png" alt="valuecoders" width="43" height="50">
            </picture>
            <h3>Authenticity</h3>
            <p>Be sincere, honest, and open in dealings to ensure trustworthiness.</p>
          </div>
        </div>
        <div class="flex-2">
          <div class="box">
            <picture class="icon-box">
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon02.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon02.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/core-icon02.png" alt="valuecoders" width="55" height="46">
            </picture>
            <h3>Leadership</h3>
            <p>Lead by example, drive innovation, and create positive change across teams.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="proud-existence-section padding-t-120 padding-b-120">
	<div class="container">
	<div class="dis-flex top-content">
	  <div class="flex-2">
	    <h2>20+ years of Proud Existence</h2>
	  </div>
	  <div class="flex-2">
	    <p>ValueCoders set its first stone down in 2007 and has been thriving ever since. The company takes great pride in announcing that they've managed to provide top-notch IT service to their clients for 20 years.
	    </p>
	  </div>
	</div>
	<div class="proud-existance-img margin-t-100 text-center">
	  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/about-proud-exist-img.png" alt="about-exp-img" 
	  width="1340" height="403">
	</div>
	</div>
</section>

<section class="key-clients bg-light padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex clients-outer justify-sb items-center">
      <div class="flex-2 left-box">
        <div class="dis-flex items-center">
          <h2><a href="/testimonials">Our Key Clients</a></h2>
          <a class="title-link" href="/testimonials"></a>
        </div>
        <p>We deliver exceptional technology solutions for world-class businesses in every business industry from dynamic startups and SMBs to Fortune 500 companies.</p>
      </div>
      <div class="flex-2 right-box">
      </div>
    </div>
  </div>
</section>

<section class="awards bg-blue-linear padding-t-120 padding-b-120">
<div class="container">
<div class="dis-flex clients-outer justify-sb items-center">
  <div class="flex-2 left-box">
  </div>
  <div class="flex-2 right-box">
    <div class="dis-flex items-center">
      <h2>Awards & Recognitions</h2>
      <a class="title-link" href="/in-media"></a>
    </div>
    <p>In the last 20 years, we have been acknowledged by prestigious organizations and awarded for our work.</p>
  </div>
</div>
</div>
</section>
<section class="key-clients partnership bg-light padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex clients-outer justify-sb items-center">
      <div class="flex-2 left-box">
        <div class="dis-flex items-center">
          <h2><a href="/testimonials">Partnerships</a></h2>
          <a class="title-link" href="/testimonials"></a>
        </div>
        <p>Several valuable partnerships were forged along this journey, and our research has been published on different websites.</p>
      </div>
      <div class="flex-2 right-box">
      </div>
    </div>
  </div>
</section>

<?php
$whyhire = get_field('why-vc');
if( $whyhire ) :
$iswEnabled = $whyhire['is_enable'];
if( $iswEnabled == "yes" ){	
?>
<section class="icon-with-img-section <?php echo $whyhire['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2">
				<div class="head-txt">
					<?php echo $whyhire['content']; ?>
				</div>
				<?php if( $whyhire['options'] ) : ?>
				<div class="dis-flex hire-php-icon icon-box-outer">
				<?php 
		    	$whcount = 0;
		    	foreach( $whyhire['options'] as $row ) : $whcount++; ?>
					<div class="flex-2 margin-t-50">
						<div class="flex-3 box-3">
							<div class="dis-flex items-center">
								<?php 
								$wyicon 	= $row['icon'];
								$wyiconWp 	= $row['icon-wp'];
								if( $wyicon && $wyiconWp ){
								echo '<picture>
								<source type="'.$wyiconWp['mime_type'].'" srcset="'.$wyiconWp['url'].'">
								<source type="'.$wyicon['mime_type'].'" srcset="'.$wyicon['url'].'">
								<img loading="lazy" src="'.$wyicon['url'].'" alt="Valuecoders" width="'.$wyicon['width'].'" height="'.$wyicon['height'].'"> 
								</picture>';
								}else{
									echo '<span class="icon icon'.$whcount.'"></span>';
								}
								?>
								<span class="icon-txt">
									<?php echo $row['title']; ?>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="flex-2 text-right right-box">
				<?php if(!wp_is_mobile()) : ?>
				<picture>
					<source type="<?php echo $whyhire['section_image_webp_format']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['section_image_webp_format']['url']; ?>">
					<source type="<?php echo $whyhire['image']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['image']['url']; ?>">
					<img loading="lazy" src="<?php echo $whyhire['image']['url']; ?>" alt="Valuecoders" 
					width="<?php echo $whyhire['image']['width']; ?>" height="<?php echo $whyhire['image']['height']; ?>">
				</picture>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php 
}
endif; ?>
<!-- WHy Hire Developer From VC -->

<?php 
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
$dtImage 		= $clientele['image'];
$dtImageWebp	= $clientele['image-webp'];

$ltImage 		= $clientele['image-lt'];
$ltImageWebp	= $clientele['image-lt-webp'];
?>
<section class="client-img-section padding-b-150 <?php echo $clientele['sc_background']; ?>">
	<div class="container">
		<div class="dis-flex col-box-outer items-center">
		<?php if( !wp_is_mobile() ) : ?>
			<div class="flex-2 left-box">
				<?php 
				if( $dtImage && $dtImageWebp ) {
					echo '<picture class="dark-theme-img">
					<source type="'.$dtImageWebp['mime_type'].'" srcset="'.$dtImageWebp['url'].'">
					<source type="'.$dtImage['mime_type'].'" srcset="'.$dtImage['url'].'">
					<img loading="lazy" src="'.$dtImage['url'].'" alt="Valuecoders" width="'.$dtImage['width'].'" height="'.$dtImage['height'].'"> 
				</picture>';	
				}

				if( $ltImage && $ltImageWebp ) {
					echo '<picture class="lighter-theme-img">
					<source type="'.$ltImageWebp['mime_type'].'" srcset="'.$ltImageWebp['url'].'">
					<source type="'.$ltImage['mime_type'].'" srcset="'.$ltImage['url'].'">
					<img loading="lazy" src="'.$ltImage['url'].'" alt="Valuecoders" width="'.$ltImage['width'].'" 
					height="'.$ltImage['height'].'"> 
				</picture>';	
				}

				?>
			</div>
			<?php endif; ?>
			<div class="flex-2 right-box tick-icon-list"><?php echo $clientele['content']; ?></div>
		</div>
		
	</div>
</section>
<?php endif; ?>
<!-- ValueCoder clientele #Ends Here -->

<!-- 
<section class="valuecoders-in-media-section padding-t-150 padding-b-150 bg-dark-theme">
	<div class="container">
		<div class="head-txt text-center">
			<?php the_field('in-media'); ?>			
		</div>
		<div class="margin-t-100">
		<picture class="lighter-theme-img">
		<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media01.webp">
		<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media01.png">
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/valuecoders-media01.png" alt="Valuecoders" width="1605" height="71"> 
		</picture>
		<picture class="lighter-theme-img margin-t-60">
		<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media02.webp">
		<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media02.png">
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/valuecoders-media02.png" alt="Valuecoders" width="1618" height="43"> 
		</picture>
		<picture class="lighter-theme-img margin-t-60">
		<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media03.webp">
		<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media03.png">
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/valuecoders-media03.png" alt="Valuecoders" width="1624" height="50"> 
		</picture>
		<picture class="lighter-theme-img margin-t-60">
		<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media04.webp">
		<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/valuecoders-media04.png">
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/valuecoders-media04.png" alt="Valuecoders" width="1095" height="103"> 
		</picture>
		</div>
		</div>
	</div>
</section> 

<section class="experts-talk-first-section bg-blue-linear padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Let’s Discuss Your Project</h2>
      <p>Get free consultation and let us know your project idea to turn it into an amazing digital product.</p>
    </div>
    <div class="text-center margin-t-50">
      <a class="green-btn" href="<?php echo site_url('/contact'); ?>">Talk To Our Experts <i class="arrow-icon"></i></a>
    </div>
  </div>
</section> 
-->

<?php 
$mates = get_field( 'team-listings' );
if( $mates['is_enable'] == 'yes' ) : ?>
<section class="valuecoders-our-team-section padding-t-150 padding-b-150 bg-dark-theme">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $mates['content']; ?>
		</div>
		<?php 
		$tmembers = $mates['options']; 
		if( $tmembers ){
			echo '<div class="dis-flex">';
			foreach ( $tmembers as $mem ){
				echo '<div class="flex-4">
				<div class="profile-box">';
				$proImg 	= $mem['image'];
				$proImgwp 	= $mem['image-webp'];
				if( $proImg && $proImgwp ){
					echo '<picture>
					<source type="'.$proImgwp['mime_type'].'" srcset="'.$proImgwp['url'].'">
					<source type="'.$proImg['mime_type'].'" srcset="'.$proImg['url'].'">
					<img loading="lazy" src="'.$proImg['url'].'" alt="Valuecoders" width="'.$proImg['width'].'" 
					height="'.$proImg['height'].'"> 
				</picture>';	
				}
				echo '<div class="profile-text">
						<h3>'.$mem['name'].'</h3>
						<h5>'.$mem['designation'].'</h5>
						<p>'.$mem['description'].'</p>
					</div>
				</div>
			</div>';
			}
			echo '</div>';
		}
		?>
	</div>
</section>
<?php endif; ?>

<?php 
$teamVc = get_field( 'team-vc' );
if( $teamVc['is_enabled'] == 'yes' ) :
$teamImage 		= $teamVc['image'];
$teamImageWebp	= $teamVc['image-webp'];
?>
<section class="team-valuecoders-section padding-b-120">
<?php 
if( $teamImage && $teamImageWebp ) {
	echo '<picture>
	<source type="'.$teamImageWebp['mime_type'].'" srcset="'.$teamImageWebp['url'].'">
	<source type="'.$teamImage['mime_type'].'" srcset="'.$teamImage['url'].'">
	<img loading="lazy" src="'.$teamImage['url'].'" alt="Valuecoders" width="'.$teamImage['width'].'" height="'.$teamImage['height'].'"> 
</picture>';	
}
?>
</section>
<?php endif; ?>

<section class="client-video-section bg-light padding-t-120 padding-b-120">
	<div class="container">
		<div class="head-txt text-center">
		<h2>What Our Clients Have to Say About Us</h2>
		<p>We are grateful for our clients’ trust in us, and we take great pride in delivering quality solutions that exceed their expectations. Here is what some of them have to say about us:</p>
		</div>		
		<div class="glider-contain client-testimonial-slider">
			<div class="glider">
				<div class="client-videos shadow-box">
					<div class="client-description bg-white">
						<p>The Project managers took a lot of time to understand project. They knew what quality & output we expected. It's reassuring, and that's why we chose ValueCoders.</p>
						<i class="star-rating"></i>
						<h3>James Kelly</h3>
            <span class="detail">Co-founder, Miracle Choice</span>
					</div>
				</div>				

				<div class="client-videos shadow-box">
					<div class="client-description bg-white">
						<p>ValueCoders has technical expertise in front-end and back-end development. Account management was friendly and always available. I would give ValueCoders ten out of ten!</p>
						<i class="star-rating"></i>
						<h3>Kris</h3>
            <span class="detail">Director, Storloft</span>
					</div>
				</div>

				<div class="client-videos shadow-box">
					<div class="client-description bg-white">
						<p>Huge thank you to ValueCoders, they have been a massive help in enabling us to start developing our project within a few weeks. I have already recommended it to one of my friends.</p>
						<i class="star-rating"></i>
						<h3>Mirza</h3>
            <span class="detail">Director, LOCALMASTERCHEFS LTD</span>
					</div>
				</div>

				<div class="client-videos shadow-box">
					<div class="client-description bg-white">
						<p>We got an awesome product! I would highly recommend ValueCoders to anyone for their professional attitude & customer care. Hope success to them!</p>
						<i class="star-rating"></i>
						<h3>Savarni</h3>
            <span class="detail">Founder- sbspco.com</span>
					</div>
				</div>
				
				<div class="client-videos shadow-box">
					<div class="client-description bg-white">
						<p>ValueCoders provided us with exceptional services in creating a one-of-a-kind portal. Impressed with how efficient and quick the team was in coming up with ideas.</p>
						<i class="star-rating"></i>
						<h3>Judith</h3>
            <span class="detail">Executive Director, Mueller Health Foundation</span>
					</div>
				</div>

				<div class="client-videos shadow-box">
					<div class="client-description bg-white">
						<p>We outsourced our website development to ValueCoders, and we are super happy with their services. Highly recommend them.</p>
						<i class="star-rating"></i>
						<h3>Jame Thompson</h3>
            <span class="detail">edinstitute.com.au</span>
					</div>
				</div>

			</div>
			<button aria-label="Previous" class="glider-prev vlazy"></button>
			<button aria-label="Next" class="glider-next vlazy"></button>
			<div role="tablist" class="dots"></div>
		</div>
	</div>
</section>
<?php get_footer(); ?>