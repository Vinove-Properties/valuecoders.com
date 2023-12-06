<?php 
require_once __DIR__ . '/wp-load.php';
get_header(); ?>
<section class="not-found-section nb-updated">
	<div class="container">
		<div class="dis-flex items-center">
			<div class="flex-2">
				<h2>This Page Does Not Exist.</h2>
				<span class="suggest">Lost? We Suggest....</span>
				<ul>
					<li>Please check the web address for typos, else</li>
					<li>Visit the <a href="<?php bloginfo('url'); ?>">home page</a></li>
					<li>Connect with us using our <a href="<?php echo site_url('/contact'); ?>" title="Contact Us">contact form</a></li>
				</ul>
			</div>
			<div class="flex-2">
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/not-found-banner.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/not-found-banner.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/not-found-banner.png" alt="Valuecoders" width="832" height="513"> 
				</picture>
				<!--<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/not-found-banner-light.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/not-found-banner-light.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/not-found-banner-light.png" alt="Valuecoders" width="832" height="513"> 
				</picture>-->
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>