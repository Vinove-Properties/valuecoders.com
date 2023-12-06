<?php
/*
Template Name: Partner page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>

<section class="hero-section for-partner-banner">
	<div class="container">
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php dynamic_sidebar('vc-profile'); ?>
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

<?php 
$threeSteps = get_field('three-steps');
if( $threeSteps['is_enabled'] == "yes" ) :
?>
<section class="two-column-right-box-section <?php echo $threeSteps['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer for-counter">
			<div class="flex-2 left-box">
				<div class="head-txt"><?php echo $threeSteps['top_content'] ?></div>
				<?php 
				if( !wp_is_mobile() ) : 
					$fdthumb 	= $threeSteps['image'];
					$fdthumbnwp = $threeSteps['image-webp'];
					if( $fdthumb && $fdthumbnwp ){
					echo '<picture>
					<source type="image/webp" srcset="'.$fdthumbnwp['url'].'">
					<source type="'.$fdthumb['mime_type'].'" srcset="'.$fdthumb['url'].'">
					<img loading="lazy" src="'.$fdthumb['url'].'" alt="'.$fdthumb['title'].'" width="'.$fdthumb['width'].'" height="'.$fdthumb['height'].'"> 
					</picture>';
					}
				?>
				<?php endif; ?>
			</div>
			<div class="flex-2 right-box">
				<?php 
				$blocks = $threeSteps['content_block'];
				if( $blocks ){
					foreach ($blocks as $text){
					echo '<div class="box for-box-effect">'.$text['text'].'</div>';		
					}
				}
				?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php  	
$specifications = get_field('benefits');
if( $specifications ) :
$isEnable = $specifications['is_enable'];
if( $isEnable == "yes" ){ 
?>
<section class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
			<?php 
			if( $specifications['options'] ){
				foreach( $specifications['options'] as $row ){
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
endif;


$whyChoos = get_field('pmodels');
if( $whyChoos ) :
$isWhyEnable = $whyChoos['is_enable'];
if( $isWhyEnable == "yes" ){
?>
<section class="three-column-icon-section <?php echo $whyChoos['sc_background']; ?> padding-t-150 padding-b-150 margin-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $whyChoos['content']; ?>
		</div>
		<?php if( $whyChoos['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $whyChoos['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3">
				<div class="box bg-blue-opacity-light">
					<?php 
					$wicon 		= $row['icon'];
					$wiconwp 	= $row['icon-webp'];
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
						<img loading="lazy" src="'.$wlicon['url'].'" alt="'.vcparseanchor($row['title']).'" 
						width="'.$wlicon['width'].'" height="'.$wlicon['height'].'"> 
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

<?php get_footer(); ?>