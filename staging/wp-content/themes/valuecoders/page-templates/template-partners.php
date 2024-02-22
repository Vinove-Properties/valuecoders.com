<?php
/*
Template Name: Partner page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/partner-banner.png);">
	<div class="container">
		<div class="content-wrap">
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php //dynamic_sidebar('vc-profile'); ?>
		<div class="count-box-outer dis-flex">
      <div class="count-box">
        <h2>18+</h2>
        <p>Years Experience</p>
      </div>
      <div class="count-box">
        <h2>650+</h2>
        <p>In-house Software Developers</p>
      </div>
      <div class="count-box">
        <h2>2000+</h2>
        <p>Man Years Experience</p>
      </div>
      <div class="count-box">
        <h2>2500+</h2>
        <p>Satisfied Customers</p>
      </div>
    </div>
		</div>
	</div>
</section>
<?php get_template_part('inc/cmn', 'startups'); ?>

<?php 
$threeSteps = get_field('three-steps');
if( $threeSteps['is_enabled'] == "yes" ) :
$htContent 	= $threeSteps['top_content'];
$headText 	= fnextractHeadins('h2', $htContent );	
?>
<section class="three-column-icon-section padding-t-120 padding-b-120">
<div class="container">
<div class="dis-flex top-content">
  <div class="flex-2">
    <?php echo $headText; ?>
  </div>
  <div class="flex-2">
    <?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
  </div>
</div>
<div class="dis-flex col-box-outer margin-t-50">
	<?php 
	$blocks = $threeSteps['content_block'];
	if( $blocks ){
		foreach ($blocks as $text){
		echo '<div class="flex-3 box-3">
    	<div class="box">'.$text['text'].'</div>
  		</div>';		
		}
	}
	?>
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
<section class="accordion-section bg-blue-linear padding-t-120">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $specifications['content']; ?></div>
	  <div class="image-wrap">
      <picture class="soft-img">
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/partner-image.png">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/partner-image.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/partner-image.png" width="674" height="530" 
        alt="valuecoders">
      </picture>
     </div>
    </div>
    <div class="col-right padding-b-120">
    	<?php 
			if( $specifications['options'] ){
				$sp = 0;
				foreach( $specifications['options'] as $row ){ $sp++;
				$isActive = ( $sp === 1 ) ? " active" : "";
				echo '<div class="accordionItem'.$isActive.'">      	
				      <h3 class="accordion-toggle">'.$row['title'].'</h3>
				      <div class="accordion-content"><p>'.$row['text'].'</p></div>
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
$htContent 	= $whyChoos['content'];
$headText 	= fnextractHeadins('h2', $htContent );		
?>
 <section class="four-columns padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
		<div class="flex-2">
			<?php echo $headText; ?>
		</div>
		<div class="flex-2">
			<?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
		</div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
		<?php foreach( $whyChoos['options'] as $row ){ ?>	
		<div class="flex-3 box-3">
		<div class="box">
		<?php 
		if( $row['icon'] ){
			echo vc_pictureElm($row['icon'], 'ValueCoders', 'icon-box');
		}
		?>	
		<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $row['text']; ?></p>
		</div>
		</div>
		<?php } ?>      
    </div>
  </div>
</section>
<?php 
}
endif; 
?>

<?php 
/*
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );
?>
<section class="client-video-section bg-light padding-t-120 padding-b-120">
	<div class="container">
		<div class="head-txt text-center"><?php echo $testimonailsContent; ?></div>
		<?php 
		if( $testimonailsList ) : 
		?>
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
						<?php 
						if( $row['client-fd'] ){
							echo '<p>'.$row['client-fd'].'</p>';
						}else{
							echo '<p>"We have worked with ValueCoders for more than a year, and their skilled team has allowed us to scale up during certain projects."</p>';
						}
						?>						
						<i class="star-rating"></i>
						<h3><?php echo $row['client-name']; ?></h3>
                		<span class="detail"><?php echo $row['Comment']; ?></span>
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
<?php */ ?>
<?php get_footer(); ?>