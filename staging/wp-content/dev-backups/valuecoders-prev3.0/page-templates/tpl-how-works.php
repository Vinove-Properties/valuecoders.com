<?php
/*
Template Name: How it works Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section text-center">
	<div class="container">
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>		
		<div class="margin-t-70"><?php vc_cta(); ?></div>
	</div>
</section>

<?php 
$wprocess = get_field('working-process');
if( $wprocess ) :
?>
<section class="step-icon-img-section bg-dark-theme padding-t-150 padding-b-150">
	<div class="container">
		<?php the_field('working-process'); ?>		
		<?php if( !wp_is_mobile() ) : ?>
		<picture class="dark-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<picture class="lighter-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png" 
			alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<?php endif; ?>
		<div class="dis-flex justify-center hiring-step-sprite">
			<div class="flex-4 icon-box text-center not-step">
				<i class="icon icon6"></i>
				<h3>Add resource in your team</h3>
				<p>If all goes well, our team gets together for a quick onboarding session and training period before getting started on your project!</p>
			</div>
		</div>	
	</div>
</section>
<?php endif; ?>
<section class="ques-ans-section bg-dark-theme padding-b-150">
	<div class="container">
		<div class="dis-flex">
			<div class="flex-2">
				<h3>Are there any costs associated with the trial?</h3>
				<div class="content-box">
					<p>We do not expect you to pay upfront. But if you are satisfied with the engineer(s) during the trial and would like to add the engineer(s) to your team, we expect to be paid for the time. If not, we will not bill you anything.</p>
				</div>
			</div>
			<div class="flex-2">
				<h3>Why are you offering a trial? What is the fine print? Is there a catch?</h3>
				<div class="content-box">
					<p>We are offering trials to ensure a transparent and honest process aimed to ensure we align the best-fit engineer(s) for your team. There is absolutely NO catch or fine print - it is a genuine attempt at finding a win-win scenario and establishing long term work relationships with our clients. </p>
				</div>
			</div>
			<div class="flex-2">
				<h3>Will the developer work on my server?</h3>
				<div class="content-box">
					<p>During the trial phase, the engineer(s) will work on their local machine or test server, demonstrate code and engage in code walk-through if required. The developer(s) can work on your server after a successful trial. In case of an unsuccessful trial, we will simply delete all work done at no cost to you. </p>
				</div>
			</div>
			<div class="flex-2">
				<h3>What if I like the engineer(s) during the trial but am not satisfied later?</h3>
				<div class="content-box">
					<p>In the rare circumstance that you’re dissatisfied with engineer(s) after the trial, you can always ask for a replacement. We will try and find you a replacement as early as possible (mostly within 2-3 weeks). </p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Hiring Model Section needs to add... -->
<?php 
$hireModel = get_field('hiring_models');
$hireModelEnable = $hireModel['is_enabled'];
if( $hireModelEnable == 'yes' ) :
?>
<section class="three-column-icon-section padding-t-150 padding-b-150 <?php echo $hireModel['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $hireModel['t-content']; ?>
		</div>
	  	<?php 
	  	$hCards = $hireModel['hiring_cards'];
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
		<div class="text-center margin-t-100">
			<?php vc_cta(); ?>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- Hiring Model Section needs to add... -->


<?php 
$vcTimeline = get_field('vc-timeline');
$vcTimelineEnable = $vcTimeline['is_enabled'];
if( $vcTimelineEnable == 'yes' ) :
$topts = ( isset( $vcTimeline['timelines-content'] ) )	? $vcTimeline['timelines-content'] : [];
?>
<section class="process-timeline-section <?php echo $vcTimeline['sc_background']; ?> text-center padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
		<?php echo $vcTimeline['top-content']; ?>
		</div>
		<?php 
		if( $topts ){
			echo '<div class="timeline"><ul>';
			foreach( $topts as $row ){
				echo '<li><div class="content">'.$row['content'].'</div></li>';
			}
			echo '</div></ul>';
		} 
		?>
	</div>
</section>
<?php endif; ?>

<?php 
$hdifferent = get_field('hw-different');
$hdifferentEnable = $hdifferent['is_enabled'];
if( $hdifferentEnable == 'yes' ) :
?>
<section class="how-are-we-different-section <?php echo $hdifferent['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $hdifferent['title']; ?></h2>
		</div>
		<div class="dotsdull margin-t-100 tick-icon-list">
			<div class="bluebgs dis-flex desktoponly">
				<div class="leftblue flex-2">
					<h3>Traditional Hiring</h3>
				</div>
				<div class="leftblue flex-5">
					<div class="vresus">
						<h4>v/s</h4>
					</div>
				</div>
				<div class="leftblue flex-4">
					<h3>Modern Hiring</h3>
				</div>
			</div>
			<div class="bluebottom dis-flex">
				<div class="leftbluebottom flex-2">
					<div class="bluebgs mobileonly">
						<div class="leftblue"><h3>Traditional Hiring</h3></div>
					</div>
					<?php echo $hdifferent['traditional-hiring']; ?>
				</div>
				<div class="vresus mobile"><h4>v/s</h4></div>
				<div class="leftbluebottom flex-2">
					<div class="bluebgs mobileonly">
						<div class="leftblue"><h3>Modern Hiring</h3></div>
					</div>
					<?php echo $hdifferent['modern-hiring']; ?>					
				</div>
			</div>
		</div>
		<div class="text-center margin-t-100"><?php vc_cta(); ?></div>
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