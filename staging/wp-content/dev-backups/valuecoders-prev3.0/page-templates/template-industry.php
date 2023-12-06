<?php 
/* 
Template Name: Industry Page Template 
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
$bannerImage = get_field('tb-image');
$bannerStyle = '';
if( $bannerImage ){
$bannerStyle = ' style="background-image:url('.$bannerImage['url'].');"';
}
?>

<section class="hero-img-section text-center" <?php echo $bannerStyle; ?>>
	<div class="container">
		<div class="ind-head">		
		<div class="breadcrumbs">
		<a href="<?php bloginfo('url'); ?>">Home</a> <span>Industries</span> <?php the_title(); ?>
		</div>	
		<h1><?php the_title(); ?></h1>
		</div>
	</div>	
</section>
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

<section class="two-column-content-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex overview-top">
		<?php 
		while( have_posts() ) : the_post();
		the_content();
		endwhile;	
		?>
		</div>	
	</div>
</section>
<?php 
$tabSec 	= get_field('tab_section');
if( $tabSec['is_enabled'] == "yes" ) :
$tabLoop 	= $tabSec['tab-loop'];
?>
<section class="tab-list-section bg-dark-theme padding-t-150 padding-b-150">
	<div class="container">
		<div id="tabs1" class="dis-flex tab-contents no-js">
			<div class="left-tabs">
				<?php 
				echo $tabSec['content']; 
				if( $tabLoop ){
					echo '<div class="tab-nav margin-t-100">';
					$t = 0;
					foreach( $tabLoop as $row ){ $t++;
						$isActive = ($t === 1) ? 'is-active' : '';
						echo '<a href="#" class="tab-link '.$isActive.'">'.$row['title'].'</a>';
					}
					echo '</div>';
				}
				?>
			</div>
			<?php if( $tabLoop ){ 
				echo '<div class="right-tabs list-two">';
				$c = 0;
				foreach( $tabLoop as $row ){ $c++;
					$isActive = ($c === 1) ? 'is-active' : '';
					echo '<div class="tab-content '.$isActive.'">';
					$thumb 		= $row['image'];
					$thumbWp 	= $row['image-webp'];
					if( $thumb && $thumbWp ){
						echo '<picture>
						<source type="'.$thumbWp['mime_type'].'" srcset="'.$thumbWp['url'].'">
						<source type="'.$thumb['mime_type'].'" srcset="'.$thumb['url'].'">
						<img loading="lazy" src="'.$thumb['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$thumb['width'].'" 
						height="'.$thumb['height'].'"> 
						</picture>';		
					}
					echo $row['content'];
					if( !empty($row['link']) && ($row['link'] !== "#") ){
					echo '<a href="'.vc_siteurl($row['link']).'" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>';	
					}
					echo '</div>';
					}	
				echo '</div>';
			}	
			?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="experts-talk-first-section bg-blue-linear padding-t-150 padding-b-150">
    <div class="container">
    <div class="head-txt text-center">
		<h2>Get these benefits with ValueCoders’s guidance</h2>
		<p>Get free consultation and let us know your project idea to turn it into an amazing digital product.</p>
	</div>
	<div class="text-center margin-t-50">
    	<a class="green-btn" href="<?php echo site_url('/contact'); ?>">Talk To Our Experts <i class="arrow-icon"></i></a>
    </div>
	</div>
</section>

<?php  
$solutions = get_field('solutions');
if( $solutions ) :
$isEnable = $solutions['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section class="three-column-icon-section <?php echo $solutions['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $solutions['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
			<?php 
			if( $solutions['loop'] ){
				foreach( $solutions['loop'] as $row ){
				echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
				<div class="box bg-blue-opacity-light">
					<span class="dot-icon dot-md"></span>
					<h3>'.$row['title'].'</h3>
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
endif;


$specialties = get_field('specialties');
if( $specialties ) :
$isWhyEnable = $specialties['is_enable'];
if( $isWhyEnable == "yes" ) {
?>
<section class="three-column-icon-section <?php echo $specialties['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $specialties['content']; ?>
		</div>
		<?php if( $specialties['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $specialties['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3 <?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
				<div class="box bg-blue-opacity-light">
					<?php 
					$wicon 	= $row['icon'];
					$wiconwp = $row['icon-webp'];
					if( $wicon && $wiconwp ){
					echo '<picture class="dark-theme-img">
					<source type="image/webp" srcset="'.$wiconwp['url'].'">
					<source type="'.$wicon['mime_type'].'" srcset="'.$wicon['url'].'">
					<img loading="lazy" src="'.$wicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wicon['width'].'" 
					height="'.$wicon['height'].'"> 
					</picture>';
					}else{
						echo '<span class="dot-icon dot-md"></span>';
					}


					$wlicon 	= $row['icon-lt'];
					$wliconwp 	= $row['icon-lt-webp'];
					if( $wlicon && $wliconwp ){
					echo '<picture class="lighter-theme-img">
					<source type="image/webp" srcset="'.$wlicon['url'].'">
					<source type="'.$wlicon['mime_type'].'" srcset="'.$wlicon['url'].'">
					<img loading="lazy" src="'.$wlicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wlicon['width'].'" height="'.$wlicon['height'].'"> 
					</picture>';
					}
					?>
					<h3><?php echo $row['title']; ?></h3>
					<p><?php echo $row['text']; ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php 
}
endif; ?>

<?php
$vtech = get_field('vc-smart-tech');
if( $vtech ) :
$isvtech = $vtech['is_enable'];
if( $isvtech == "yes" ) {
$vcTechnologies 	= get_field( 'vc-atechnologies', 'option' );	
$techno 			= $vcTechnologies['techno'];
if( $techno ){
?>
<section class="technologies-right-logo-section <?php echo $vtech['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center"><?php echo $vtech['content']; ?></div>
		<?php 
		$rowCount = 0;
		foreach( $techno as $mrow ){			
		echo '<div class="dis-flex tech-box-outer items-center">';
		echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
		if( $mrow ){
			$rowCount++;
			$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
			echo '<div class="right-box dis-flex for-max-six-icon '.$isFirst.'">';
			foreach( $mrow['in_technologies'] as $row ){
				//debug_dd( $row['icon'] ); die;
				echo '<span class="tech-box">';
				echo ( $row['link'] ) ? '<a href="'.vc_siteurl($row['link']).'">': '';
				$ticon 		= $row['icon'];
				$ticonwp 	= $row['icon-webp'];
				if( $ticon && $ticonwp ){
					echo '<picture class="dark-theme-img img-tech-logo">
					<source type="image/webp" srcset="'.$ticonwp['url'].'">
					<source type="'.$ticon['mime_type'].'" srcset="'.$ticon['url'].'">
					<img loading="lazy" src="'.$ticon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$ticon['width'].'" 
					height="'.$ticon['height'].'"> 
					</picture>';
				}

				$tiltcon 		= $row['icon-lt'];
				$tiltconwp 		= $row['icon-lt-webp'];
				if( $tiltcon && $tiltconwp ){
					echo '<picture class="lighter-theme-img img-tech-logo">
					<source type="image/webp" srcset="'.tempIconDir($tiltconwp['url']).'">
					<source type="'.$tiltcon['mime_type'].'" srcset="'.tempIconDir($tiltcon['url']).'">
					<img loading="lazy" src="'.tempIconDir($tiltcon['url']).'" alt="'.vcparseanchor($row['title']).'" width="'.$tiltcon['width'].'" 
					height="'.$tiltcon['height'].'"></picture>';
				}
				echo '<span class="tech-txt">'.$row['title'].'</span>';
				echo ( $row['link'] ) ? '</a>': '';
				echo '</span>';	
			}
			echo '</div>';
		}
		echo '</div>';	
		}
		?>
		<div class="text-center margin-t-100">
		<?php vc_cta(); ?>
		</div>
	</div>
</section>
<?php }
}
endif;
?>


<?php
$whyhire = get_field('why-valuecoders');
if( $whyhire ) :
$iswEnabled = $whyhire['is_enabled'];
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
								<img loading="lazy" src="'.$wyicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wyicon['width'].'" height="'.$wyicon['height'].'"> 
								</picture>';
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
				<?php //if(!wp_is_mobile()) : ?>
				<picture>
					<?php 
					if( $whyhire['section_image_webp_format'] ){
					echo '<source type="'.$whyhire['section_image_webp_format']['mime_type'].'>" 
					srcset="'.$whyhire['section_image_webp_format']['url'].'">';	
					}
					?>					
					<source type="<?php echo $whyhire['image']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['image']['url']; ?>">
					<img loading="lazy" src="<?php echo $whyhire['image']['url']; ?>" alt="Valuecoders" 
					width="<?php echo $whyhire['image']['width']; ?>" height="<?php echo $whyhire['image']['height']; ?>">
				</picture>
				<?php //endif; ?>
			</div>
		</div>
	</div>
</section>
<?php 
}
endif; ?>
<!-- WHy Hire Developer From VC -->

<?php 
$clientele 		= get_field( 'vc-clients' );
//debug_dd( $clientele ); die; 
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
		<div class="text-center margin-t-100">
			<?php vc_cta(); ?>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- ValueCoder clientele #Ends Here -->


<?php 
$ctOptions = get_field('client-testimo');
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
							srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background:url(<?php echo $row['client_thumbnail']; ?>) top center no-repeat;background-size:cover;width:100%;height:100%;}</style>
							<a href=<?php echo $row['yt-video']; ?>><span class='iframe-bg'></span></a>"
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
			<button aria-label="Previous" class="glider-prev"></button>
			<button aria-label="Next" class="glider-next"></button>
			<div role="tablist" class="dots"></div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>
<!-- Testimonail Section Ends Here -->

<?php getPageCaseStudies( $thisPostID ); ?>

<section class="experts-talk-second-section bg-blue-linear padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
				<h2>Have any questions?</h2>
				<p>Our managers will consult you about choosing a web-based solution for your needs.</p>
			</div>
			<div class="text-center margin-t-50">
                <a class="green-btn" href="<?php echo site_url('/contact'); ?>">Talk To Our Experts <i class="arrow-icon"></i></a>
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

<?php 
$blogSec = get_field('bposts');
if( $blogSec ){
	if( isset( $blogSec['is_enabled'] ) && ($blogSec['is_enabled'] == "yes") ){
		$bTheme = ( isset($blogSec['sc_background']) && !empty( $blogSec['sc_background'] ) ) ? $blogSec['sc_background'] 
		: 'bg-dark-theme';
		$tagSlug = ( isset($blogSec['tag-pslug']) && !empty( $blogSec['tag-pslug'] ) ) ? $blogSec['tag-pslug'] : '';
		vcShowLatestPosts($bTheme, $tagSlug );
	}
} 
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
<?php get_footer(); ?>