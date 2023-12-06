<?php 
/*
Template Name: Technology Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
$vcBtn = get_field('vc-cta', $thisPostID);
?>
<section class="second-level-section">
	<div class="container">
		<div class="breadcrumbs">
		<?php 
		$bcTitle = get_field('bc-title');
		if( $bcTitle ){
		$bct = $bcTitle;
		}		
		else{
		$bct = get_the_title();	
		} 
		echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Technology</span> '.$bct; 
		?>
		</div>
		<?php 
		$headingTxt = get_field( 'htop-area' ); 
		$bannerSec 	= get_field( 'banner_sec' );
		?>
		<div class="dis-flex">
        <div class="left-box flex-2 tick-icon-list">
			<div class="for-client-logo-box">
				<i></i>
				<i></i>
				<i></i>
				<i></i>
			</div>
			<h1><?php echo $headingTxt['top-heading']; ?></h1>
			<?php 
			if( $headingTxt['second-heading'] ){
				echo '<h2>'.$headingTxt['second-heading'].'</h2>';
			}
	    	while( have_posts() ) : the_post();
			the_content();
		   	endwhile;
			?>
			<?php dynamic_sidebar('vc-profile'); ?>
			</div>
			<div class="flex-2">				
				<div class="form-right-box">
					<div class="head">
						<h3>Build Your Remote Team</h3>
						<p>Request a quote or take a 2 week risk free trial<span class="open-free-trial"></span><br>
						Guaranteed response within 8 business hours.</p>
					</div>
					<div class="top-right-form-box">
						<?php get_template_part('inc/hire','form'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php vcTrustedStartups(); ?>
<?php  
$specifications = get_field('tech-spec');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section id="tpl-tech-stack" class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
	  	<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
		<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
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
?>

<?php  
$specifications = get_field('hp-three-col');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section id="tpl-hp-three-col" class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
	  	<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
		<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
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
?>


<?php  
$expframeworks = get_field('php_frame_work_section');
if( $expframeworks ) :
$isfrEnable = $expframeworks['is_enable'];
if( $isfrEnable == "yes" ) {
$sectionType = $expframeworks['section_type'];
if( $sectionType == "framework" ) {	
?>
<section id="load-tech-stack" class="link-three-column-section <?php echo $expframeworks['sc_background']; ?> padding-t-150 padding-b-150">
	<div  id="tech-stack-bx" class="container">
		<div class="head-txt text-center"><?php echo $expframeworks['content']; ?></div>
	</div>
</section>
<?php 
}else{ 
$techno = $expframeworks['techno'];
if( $techno ) : ?>
<section id="load-tech-stack" class="technologies-right-logo-section <?php echo $expframeworks['sc_background']; ?> padding-t-150 padding-b-150 no-icon-updated">
	<!-- 
	<div id="tech-stack-bx" class="container">
		<div class="head-txt text-center"><?php echo $expframeworks['content']; ?></div>
	</div> 
	-->
	<div id="tech-stack-bx-NA" class="container">
			<div class="head-txt text-center"><?php echo $expframeworks['content']; ?></div>
			<div class="margin-t-80">
			<?php 
			$rowCount = 0;
			foreach( $techno as $mrow ){
			$noListing = ( empty( $mrow['tech-listing'] ) ) ? "no-tech-heading" : "";	
			echo '<div class="dis-flex tech-box-outer items-center '.$noListing.'">';

			echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
			if( $mrow ){
				$rowCount++;
				$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
				echo '<div class="right-box for-max-six-icon dis-flex '.$isFirst.'">';
				//echo '<span class="tech-box">';
				echo $mrow['tech-listing'];
				//echo '</span>';
				/*
				foreach( $mrow['in_technologies'] as $row ){
					echo '<span class="tech-box">';
					echo '<span class="tech-txt">'.$row['title'].'</span></span>';
				}
				*/
				echo '</div>';
			}
			echo '</div>';	
			}
			?>
			</div>
	</div>
</section>
<?php endif;
}
 
} 
endif; ?>

<!--Technology / Framework Section Ends Here-->
<section class="experts-talk-first-section bg-blue-linear padding-t-150 padding-b-150">
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
			"Get free consultation and let us know your project idea to turn it into an amazing digital product."; ?></p>
		</div>
		<div class="text-center margin-t-50">
        <a class="green-btn" href="<?php echo site_url('/contact'); ?>">
        <?php 
		echo (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
			"Talk To Our Experts"; 
		?><i class="arrow-icon"></i>
		</a>
        </div>
	</div>
</section>

<?php  
$specifications = get_field('types-three-col');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section id="tpl-type-three-col" class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
	  		<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
			<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
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
?>

<?php  
$whyChoos = get_field('why-choose');
if( $whyChoos ) :
$isWhyEnable = $whyChoos['is_enable'];
if( $isWhyEnable == "yes" ) {
?>
<section class="three-column-icon-section <?php echo $whyChoos['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $whyChoos['content']; ?>
		</div>
		<?php if( $whyChoos['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $whyChoos['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3<?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
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
		<!-- 
		<div class="text-center margin-t-100">
			<?php //vc_cta(); ?>
		</div> 
		-->
	</div>
</section>
<?php 
}
endif; ?>

<?php 
$twoSec 		= get_field('two_column_layout_page_section');
$twoSecEnable 	= $twoSec['is_enabled'];
if( $twoSecEnable == 'yes' ): 
while( have_rows('two_column_layout_page_section') ): the_row(); 
$twocontent = get_sub_field('section_content_two_col') ;
$twoimg 	= get_sub_field('two_col_section_image') ;
$twoimgwebp = get_sub_field('two_col_section_image_webp') ;
if(count($twoimg)>0){	
?>
<section class="img-two-column-section padding-t-150 padding-b-150 <?php echo $twoSec['sc_background']; ?>">
	<div class="container">
		<div class="dis-flex">
			<div class="flex-2 left-box">
				<picture>
					<source type="<?php echo $twoimgwebp['mime_type'];  ?>" srcset="<?php echo $twoimgwebp['url'];  ?>">
					<source type="<?php echo $twoimg['mime_type'];  ?>" srcset="<?php echo $twoimg['url']; ?>">
					<img loading="lazy" src="<?php echo $twoimg['url'];  ?>" alt="<?php echo get_the_title($thisPostID); ?>" width="<?php echo $twoimgwebp['width'];  ?>" height="<?php echo $twoimgwebp['height'];  ?>"> 
				</picture>
			</div>
			<div class="flex-2 right-box">
				<?php echo $twocontent;  ?>
			</div>
		</div>
	</div>
</section>
<?php } endwhile; ?>
<?php endif; ?>

<?php if( !is_page(14118) ) : //removed from Pega Page ?>
<section class="experts-talk-second-section bg-blue-linear padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
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
			</div>
			<div class="text-center margin-t-50">
            <a class="green-btn" href="<?php echo site_url('/contact'); ?>">
			<?php 
			echo (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : 
			"Talk To Our Experts"; 
			?> <i class="arrow-icon"></i>
			</a>
            </div>
		</div>
</section>
<?php endif; ?>

<?php 
$industryServ = get_field('serve-industry');
if( $industryServ['is_enabled'] == "yes" ) :
?>
<section class="img-column-section <?php echo $industryServ['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center"><?php echo $industryServ['content']; ?></div>
		<?php if( have_rows('industry_cards','option') ): ?>
		<div class="dis-flex margin-t-80">
		<?php while( have_rows('industry_cards','option') ): the_row(); ?>
			<div class="flex-3 col-box">
				<div class="img-box img1" style="background-image:url(<?php echo the_sub_field('card_image','option'); ?>);">
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
$hireModel = get_field('hiring_models');
$hireModelEnable = $hireModel['is_enabled'];
if( $hireModelEnable == 'yes' ) :
?>
<section class="three-column-icon-section padding-t-150 padding-b-150 <?php echo $hireModel['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $hireModel['section_title_hiring_model']; ?></h2>
			<p><?php echo $hireModel['section_description_hiring_model']; ?></p>
		</div>
	  	<?php 
	  	$hCards = $hireModel['hiring_cards'];
	  	//debug_dd( $hCards ); die;
	  	if( $hCards ) : ?>
		<div class="dis-flex col-box-outer asp-net-usage-sprite tick-icon-list">
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
			<img loading="lazy" src="'.$dtIcon['url'].'" alt="'.vcparseanchor($row['card_title']).'" width="'.$dtIcon['width'].'" 
			height="'.$dtIcon['height'].'"> 
			</picture>';
			}

			$ltIcon = $row['icon-lt'];
			$ltIconwp = $row['icon-lt-webp'];
			if( $ltIcon && $ltIconwp ){
			echo '<picture class="lighter-theme-img">
			<source type="image/webp" srcset="'.$ltIconwp['url'].'">
			<source type="'.$ltIcon['mime_type'].'" srcset="'.$ltIcon['url'].'">
			<img loading="lazy" src="'.$ltIcon['url'].'" alt="'.vcparseanchor($row['card_title']).'" width="'.$ltIcon['width'].'" 
			height="'.$ltIcon['height'].'"> 
			</picture>';
			}
			?>
			<h3><?php echo $row['card_title']; ?></h3>
			<?php echo $row['card_description']; ?>
			</div>
		</div>
		<?php $h++; 
		} 
		?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php
$whyhire = get_field('why_hire_section_php');
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


<?php 
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
$dtImage 		= $clientele['image'];
$dtImageWebp	= $clientele['image-webp'];

$ltImage 		= $clientele['image-lt'];
$ltImageWebp	= $clientele['image-lt-webp'];
$customClass 	= ( isset( $clientele['custom_class'] ) ) ? $clientele['custom_class'] : "";
?>
<section class="client-img-section padding-b-150 <?php echo $clientele['sc_background']; ?> padding-b-150 
	<?php echo $customClass; ?>">
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
		<!-- 
		<div class="text-center margin-t-100">
			<?php //vc_cta(); ?>
		</div> 
		-->
	</div>
</section>
<?php endif; ?>

<?php getPageCaseStudies( $thisPostID ); ?>

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

<?php 
$ctOptions = get_field('client-testimo');
if( $ctOptions['is_enabled'] == 'yes' ) :
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );
?>
<section class="client-video-section padding-t-150 padding-b-150 <?php echo $ctOptions['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center"><?php echo $testimonailsContent; ?></div>
		<?php if( $testimonailsList ) : ?>
		<div class="glider-contain client-testimonial-slider">
			<div class="glider">
				<?php foreach( $testimonailsList as $row ) : ?>
				<div class="client-videos shadow-box">
					<div class="client-video-box">
						<iframe width="483" height="312" src="<?php echo $row['yt-video']; ?>"
							srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background:url(<?php echo $row['client_thumbnail']; ?>) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=<?php echo $row['yt-video']; ?>g><span class='iframe-bg'></span></a>"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen
							title="Testimonial Image"></iframe>
					</div>
					<div class="client-description bg-white">
						<span class="client-name"><?php echo $row['client-name']; ?></span>
						<span class="client-quote"><?php echo $row['Comment']; ?></span>
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