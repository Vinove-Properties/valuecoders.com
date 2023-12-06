<?php
/*
Template Name: In Media Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section for-media-banner-section">
      <div class="container text-center">
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
        <div class="media-img-box">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/inmedia-header-img.svg" alt="about-exp-img" width="1397" height="209">
        </div>
      </div>
</section>
<?php vcTrustedStartups(); ?>
<section class="award-partner-section  padding-t-150">
<div class="container">
<div class="head-txt text-center">
  <h2>Our Awards & Partnerships</h2>
  <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim Exercitation veniam consequat sunt nostrud amet.</p>
</div>
<div class="award-img-box margin-t-100">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/awards-partnership-img.svg" alt="about-exp-img" width="1734"
            height="521">
</div>
</div>
</section>

<!-- 
<section class="award-partner-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2>Our Awards & Partnerships</h2>
		</div>

		<div class="dis-flex margin-t-100">
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/pn-logo-cmmi.png" alt="Valuecoders" width="133" height="95">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/pn-logo-iso.png" alt="Valuecoders" width="86" height="86">
				</div>
			</div>

			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-1.png" alt="Valuecoders" width="207" height="86">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-2.png" alt="Valuecoders" width="177" height="94">
				</div>
			</div>			
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-4.png" alt="Valuecoders" width="230" height="35">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-6.png" alt="Valuecoders" width="182" height="52">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-7.png" alt="Valuecoders" width="111" height="105">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-8.png" alt="Valuecoders" width="148" height="98">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-9.png" alt="Valuecoders" width="156" height="99">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-10.png" alt="Valuecoders" width="252" height="39">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-3.png" alt="Valuecoders" width="92" height="120">
				</div>
			</div>

			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-11.png" alt="Valuecoders" width="194" height="80">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-12.png" alt="Valuecoders" width="121" height="121">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-13.png" alt="Valuecoders" width="142" height="119">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-14.png" alt="Valuecoders" width="123" height="41">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-15.png" alt="Valuecoders" width="189" height="48">
				</div>
			</div>

			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-16.png" alt="Valuecoders" width="187" height="46">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-17.png" alt="Valuecoders" width="226" height="51">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-18.png" alt="Valuecoders" width="266" height="40">
				</div>
			</div>
			<div class="flex-5">
				<div class="logo-box">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/award-partner-logo-19.png" alt="Valuecoders" width="228" height="42">
				</div>
			</div>


		</div>
	</div>
</section> 


<section class="media-award-section bg-dark-theme">
	<div class="container">
		<div class="dis-flex">
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-1.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-1.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-1.png" alt="Valuecoders" width="138" height="181"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-light-1.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-light-1.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-light-1.png" alt="Valuecoders" width="138" height="181"> 
				</picture>
			</div>
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-2.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-2.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-2.png" alt="Valuecoders" width="176" height="181"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-2.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-2.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-2.png" alt="Valuecoders" width="176" height="181"> 
				</picture>
			</div>
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-3.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-3.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-3.png" alt="Valuecoders" width="181" height="181"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-3.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-3.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-3.png" alt="Valuecoders" width="181" height="181"> 
				</picture>
			</div>
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-4.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-4.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-4.png" alt="Valuecoders" width="181" height="181"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-4.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-4.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-4.png" alt="Valuecoders" width="181" height="181"> 
				</picture>
			</div>
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-5.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-5.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-5.png" alt="Valuecoders" width="250" height="181"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-5.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-5.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-5.png" alt="Valuecoders" width="250" height="181"> 
				</picture>
			</div>
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-6.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-6.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-6.png" alt="Valuecoders" width="250" height="181"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/media-award-6.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/media-award-6.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/media-award-6.png" alt="Valuecoders" width="250" height="181"> 
				</picture>
			</div>


		</div>
	</div>
</section>
-->

<?php 
$inMedia = get_field('in-media');
$inMediaEnable = $inMedia['is_enabled'];
if( $inMediaEnable == 'yes' ) :
?>
<section class="three-column-media-section padding-t-150">
	<div class="container">
		<div class="head-txt text-center">
		<?php echo $inMedia['top-content']; ?>
		</div>
		<?php 
		if( $inMedia['cards'] ){
			echo '<div class="dis-flex col-box-outer margin-t-80">';
			$ct = 0;
			foreach( $inMedia['cards'] as $row ){ $ct++;
				$defName = ( $row['pro-name'] ) ? $row['pro-name'] : "Test Name - ".$ct;
				echo '<div class="flex-3">
				<div class="media-box">';
				$tlightlg 		= $row['logo-light'];
				$tlightlgwp 	= $row['logo-light-wp'];
				if( $tlightlg && $tlightlgwp ){
				echo '<picture>
				<source type="image/webp" srcset="'.$tlightlgwp['url'].'">
				<source type="'.$tlightlg['mime_type'].'" srcset="'.$tlightlg['url'].'">
				<img loading="lazy" src="'.$tlightlg['url'].'" alt="ValueCoders" width="'.$tlightlg['width'].'" 
				height="'.$tlightlg['height'].'"> 
				</picture>';
				}
				echo '<div class="content-box">
				<p>'.$row['content'].'</p>
				</div>
				<div class="text-date-box">
				<span class="logo-name"><a href="'.$row['link'].'" target="_blank">'.$defName.'</a></span>
				<span class="date">'.$row['date'].'</span>
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
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );
?>
<section class="client-video-section padding-t-150 padding-b-150">
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
							srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background:url(<?php echo $row['client_thumbnail']; ?>) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=<?php echo $row['yt-video']; ?>g><span class='iframe-bg'></span></a>"
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

<?php get_footer(); ?>