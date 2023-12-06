<?php
/*
Template Name: Why India Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section text-center">
	<div class="container">
		<?php 
		while( have_posts() ) : the_post();
			the_content();
		endwhile;	
		?>		
		<div class="margin-t-70"><?php vc_cta(); ?></div>
	</div>
</section>

<?php 
$twColumn = get_field('tw-column');
if( $twColumn ) :
	if( $twColumn['is_enabled'] == "yes" ){
?>
<section class="img-two-column-section <?php echo $twColumn['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex">
			<div class="flex-2 content-box tick-icon-list">
				<?php echo $twColumn['content']; ?>
			</div>
			<div class="flex-2 img-box">
				<?php 
				$fdthumb 	= $twColumn['image'];
				$fdthumbnwp = $twColumn['image-wp'];
				if( $fdthumb && $fdthumbnwp ){
				echo '<picture>
				<source type="image/webp" srcset="'.$fdthumbnwp['url'].'">
				<source type="'.$fdthumb['mime_type'].'" srcset="'.$fdthumb['url'].'">
				<img loading="lazy" src="'.$fdthumb['url'].'" alt="'.$fdthumb['title'].'" width="'.$fdthumb['width'].'" height="'.$fdthumb['height'].'"> 
				</picture>';
				} 
				?>
			</div>
		</div>
	</div>
</section>
<?php } 
endif; ?>

<?php  
$specifications = get_field('tech-spec');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
			<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
				echo '<div class="flex-3 box-3">
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
endif; ?>

<?php  
$ibox = get_field('ibox-cards');
if( $ibox ) :
$iBoxEnable = $ibox['is_enabled'];
if( $iBoxEnable == "yes" ) {
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="three-column-icon-section <?php echo $ibox['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $ibox['content']; ?>
		</div>
		<?php if( $ibox['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $ibox['options'] as $row ) : $wcount++; ?>
			<div class="flex-<?php echo $gridType; ?> box-<?php echo $gridType; ?>">
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
					<img loading="lazy" src="'.$wlicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wlicon['width'].'" 
					height="'.$wlicon['height'].'"> 
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
endif; 
?>

<?php
$policies 		= get_field('policies');
$policiesEnable = $policies['is_enabled'];
if( $policiesEnable == "yes" ) :
?>
<section class="why-india-timeline-section <?php echo $policies['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">

		<div class="head-txt text-center">
			<h2><?php echo $policies['title']; ?></h2>
		</div>
		<?php 
		if( $policies['policy'] ){
			echo '<div class="timeline-outer"><ul>';
			foreach( $policies['policy'] as $row ){
				echo '<li>
					<div class="content-box">
						<h3>'.$row['title'].'</h3>
						<p>'.$row['text'].'</p>
					</div>
				</li>';
			}
			echo '</div></ul>';
		}
		?>		
	</div>
</section>
<?php endif; ?>

<?php  
$osIndia = get_field('outsource-india');
$isEnable = $osIndia['is_enable'];
if( $isEnable == "yes" ):
?>
<section class="valuecoders-img-section padding-t-150 padding-b-150 <?php echo $osIndia['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $osIndia['content-top']; ?>
		</div>
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-2 left-box">
			<?php 
			if( !wp_is_mobile() ) : 
				$osImage 	= $osIndia['image'];
				$osImagewp 	= $osIndia['image-webp'];
				if( $osImage && $osImagewp ){
				echo '<picture>
				<source type="'.$osImagewp['mime_type'].'" srcset="'.$osImagewp['url'].'">
				<source type="'.$osImage['mime_type'].'" srcset="'.$osImage['url'].'">
				<img loading="lazy" src="'.$osImage['url'].'" alt="Valuecoders" width="'.$osImage['width'].'" height="'.$osImage['height'].'"> 
				</picture>';
				}
			endif; ?>
			</div>
			<div class="flex-2 right-box">
				<?php echo $osIndia['content-main']; ?>
				<div class="icon-box-outer dis-flex margin-t-50">
					<div class="icon-box"><span class="icon icon1"></span>100% client satisfaction</div>
					<div class="icon-box"><span class="icon icon2"></span>No box <br> approach</div>
					<div class="icon-box"><span class="icon icon3"></span>Shorter time to market</div>
				</div>
			</div>
		</div>
		<div class="text-center margin-t-100">
			<?php vc_cta(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php 
$techStacks = get_field('vc-technologies');
if( $techStacks && ($techStacks['is_enable'] == "yes") ) :
?>
<section class="technologies-right-logo-section <?php echo $techStacks['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center"><?php echo $techStacks['content']; ?></div>
		<?php 
		$rowCount 	= 0;
		$techno 	= $techStacks['techno'];
		foreach( $techno as $mrow ){
		echo '<div class="dis-flex tech-box-outer items-center">';
		echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
		if( $mrow ){
			$rowCount++;
			$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
			echo '<div class="right-box dis-flex for-max-six-icon '.$isFirst.'">';
			foreach( $mrow['in_technologies'] as $row ){
				echo '<span class="tech-box">';
				echo '<a href="'.$row['link'].'">';
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
					<source type="image/webp" srcset="'.$tiltconwp['url'].'">
					<source type="'.$tiltcon['mime_type'].'" srcset="'.$tiltcon['url'].'">
					<img loading="lazy" src="'.$tiltcon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$tiltcon['width'].'" 
					height="'.$tiltcon['height'].'"></picture>';
				}
				echo '<span class="tech-txt">'.$row['title'].'</span></a></span>';	
			}
			echo '</div>';
		}
		echo '</div>';	
		}
		?>
	</div>
</section>
<?php endif; ?>

<?php
$whyChoose = get_field('why-choose');
if( $whyChoose ) :
$iswEnabled = $whyChoose['is_enable'];
if( $iswEnabled == "yes" ){	
?>
<section class="icon-with-img-section <?php echo $whyChoose['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2">
				<div class="head-txt">
					<?php echo $whyChoose['content']; ?>
				</div>
				<?php if( $whyChoose['options'] ) : ?>
				<div class="dis-flex hire-php-icon icon-box-outer">
				<?php 
		    	$whcount = 0;
		    	foreach( $whyChoose['options'] as $row ) : $whcount++; ?>
					<div class="flex-2 margin-t-50">
						<div class="flex-3 box-3">
							<div class="dis-flex items-center">
								<?php 
								$wyicon 	= $row['icon'];
								$wyiconWp 	= $row['icon-webp'];
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
									<?php echo $row['text']; ?>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="flex-2 text-right right-box">
			<?php 
			if(!wp_is_mobile()) : 
			$wyImage 	= $whyChoose['image'];
			$wyImagewp 	= $whyChoose['image-webp'];
			if( $wyImage && $wyImagewp ){
			echo '<picture>
			<source type="'.$wyImagewp['mime_type'].'" srcset="'.$wyImagewp['url'].'">
			<source type="'.$wyImage['mime_type'].'" srcset="'.$wyImage['url'].'">
			<img loading="lazy" src="'.$wyImage['url'].'" alt="Valuecoders" width="'.$wyImage['width'].'" 
			height="'.$wyImage['height'].'"> 
			</picture>';
			}	
			endif; 
			?>
			</div>
		</div>
	</div>
</section>
<?php 
}
endif; 
?>


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
		<div class="text-center margin-t-100">
			<?php vc_cta(); ?>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- ValueCoder clientele #Ends Here -->

<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enable'];
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