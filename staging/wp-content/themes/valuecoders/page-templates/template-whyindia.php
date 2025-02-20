<?php
/*
Template Name: Why India Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section text-center" style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/why-india-banner.png);">
	<div class="container">
		<div class="content-wrap">
		<?php 
		while( have_posts() ) : the_post();
		the_content();
		endwhile;	
		?>
		<?php cmnCTA_v3( "Contact Us" ); ?>
		</div>
	</div>
</section>

<?php 
$twColumn = get_field('tw-column');
if( isset( $twColumn['is_enabled'] ) && ($twColumn['is_enabled'] == "yes") ){
?>
<section class="accordion-section padding-t-120 <?php echo $twColumn['sc_background']; ?>">
 <div class="dis-flex accordian-row">
    <div class="col-left">
       <div class="head-txt"><?php echo $twColumn['content-left']; ?></div>
	   <div class="image-wrap">
		<?php 
		if( $twColumn['image'] ){
		echo vc_pictureElm( $twColumn['image'], 'ValueCoders', 'soft-img' );
		}
		?> 
		</div>            
    </div>
    <div class="col-right padding-b-120 tick-icon-list w-100"><?php echo $twColumn['content-right']; ?></div>
 </div>
</section>
<?php 
} 

$specifications = get_field('tech-spec');
if( isset( $specifications['is_enabled'] ) && ( $specifications['is_enabled'] == "yes" ) ){ 
$htContent 	= $specifications['content'];
$headText 	= fnextractHeadins('h2', $htContent ); 	
?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $specifications['sc_background']; ?>">	
	<div class="container">
		<div class="dis-flex top-content">
			<div class="flex-2"><?php echo $headText; ?></div>
			<div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
	    </div>
		<div class="dis-flex col-box-outer margin-t-50">
			<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
				echo '<div class="flex-3 box-3">
				<div class="box">
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
?>

<?php  
$ibox = get_field('ibox-cards');
if( $ibox ) :
$iBoxEnable = $ibox['is_enabled'];
if( $iBoxEnable == "yes" ) {
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="accordion-section bg-blue-linear padding-t-120">
 <div class="dis-flex accordian-row">
    <div class="col-left">
       <div class="head-txt"><?php echo $ibox['content']; ?></div>
       <?php 
		if( $ibox['image'] ){
			echo vc_pictureElm( $ibox['image'], 'ValueCoders', 'soft-img' );
		}
		?>       
    </div>
    <div class="col-right padding-b-120">
	<?php 
	if( $ibox['options'] ){
		$wcount = 0;
		foreach( $ibox['options'] as $row ){ $wcount++;
			$isActive = ( $wcount === 1 ) ? ' active' : '';
			echo '<div class="accordionItem '.$isActive.'">
			<h3 class="accordion-toggle">'.$row['title'].'</h3>
			<div class="accordion-content">
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

<section class="why-india-timeline-section bg-blue-linear padding-t-120 padding-b-120">
 <div class="container">
    <div class="dis-flex top-content">
       <div class="flex-2">
          <h2>Indian Government Outsourcing Friendly Policies:</h2>
       </div>
    </div>
 </div>
 <div class="timline-image margin-t-50">
    <div class="container">
       <picture>
          <img class="time-desktop" loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/policy-image.svg" width="1395" height="706" alt="valuecoders">
          <img class="time-mobile" loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/policy-image.svg" width="" height="" alt="valuecoders">
       </picture>
    </div>
 </div>
</section>

<?php
/*
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
<?php endif; 
*/
?>

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
$iswEnabled = $whyChoose['is_enable'];
if( isset( $whyChoose['is_enable'] ) && ( $whyChoose['is_enable'] == "yes" ) ){
	get_template_part( 'include/why', 'hirev4.0', ['content' => $whyChoose['content']] );
}
?>


<?php 
/*
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
?>
<section class="global-companies padding-b-120 <?php //echo $clientele['sc_background']; ?>">
<div class="container">
<div class="dis-flex justify-sb items-center">
   <div class="flex-2 image-box">
      <picture>
         <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
         <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
         <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png" width="647" height="411" alt="valuecoders">
      </picture>
   </div>
   <div class="flex-2 content-box top-content">
      <?php echo $clientele['content']; ?>
   </div>
</div>
</div>
</section>
<!-- ValueCoder clientele #Ends Here -->
<?php endif; 
*/
?>


<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enable'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-150 padding-b-150 <?php echo $faqs['sc_background']; ?> bg-light">
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