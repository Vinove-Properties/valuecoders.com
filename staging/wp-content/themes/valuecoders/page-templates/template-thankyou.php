<?php
/*
Template Name: Thank you page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="thank-you-box-icon">
    <div class="container">
        <div class="wrap-80 bg-voilet text-center">
          <div class=icon_text>
        <div class="thank-you-icon">
        <picture>
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/thumb_thankyou_icon.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/thumb_thankyou_icon.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/thumb_thankyou_icon.png" alt="Valuecoders" width="166" height="166">
		</picture>
        </div>
        <?php while( have_posts() ) : the_post(); ?>
        <div class="thank-you-text">
            <?php the_content(); ?>
        </div>
    	<?php endwhile; ?>
    </div>
	
	<div class="social-con">
        <div class="dark-theme-img">
	<ul class="dis-flex">
	
	<li><a href="https://www.facebook.com/ValueCoders" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/facebookicon.png"></a></li>
	<li><a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/instagramicon.png"></a></li>
	<li style="margin-top:5px;"><a href="https://twitter.com/ValueCoders" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/Twitter.svg"></a></li>
	<li><a href="https://www.linkedin.com/company/valuecoders" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/linkedinicon.png"></a></li>
	</ul>
</div>
<div class="lighter-theme-img">
    <ul class="dis-flex">
	
	<li><a href="https://www.facebook.com/ValueCoders"><img src="<?php bloginfo('template_url'); ?>/images/facebook_light_ icon.png"></a></li>
	<li><a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee"><img src="<?php bloginfo('template_url'); ?>/images/instagram_light_ icon.png"></a></li>
	<li><a href="https://twitter.com/ValueCoders"><img src="<?php bloginfo('template_url'); ?>/images/twitter_light_ icon.png"></a></li>
	<li><a href="https://www.linkedin.com/company/valuecoders"><img src="<?php bloginfo('template_url'); ?>/images/linkedin_light_icon.png"></a></li>
	</ul>   
    </div>
	</div>
    <div class="para-txt"><p>Copyright &copy; <?php echo date('Y'); ?> ValueCoders. All rights reserved.</p></div>
 </div>
</div>
</section>
<?php get_footer(); ?>