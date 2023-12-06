<?php
/*
Template Name: Calendly Form - Template
*/ 
global $post;
$thisPostID = $post->ID;
$clName 	= (isset($_GET['uname']) && !empty($_GET['uname']) ) ? $_GET['uname'] : '';
$clEmail 	= (isset($_GET['email']) && !empty($_GET['email']) ) ? $_GET['email'] : '';
$clDesc 	= (isset($_GET['req']) && !empty($_GET['req']) ) ? $_GET['req'] : '';
$clPhone 	= (isset($_GET['phone']) && !empty($_GET['phone']) ) ? $_GET['phone'] : '';
if( is_page('call-thanks') ){
//$calendlyLink = 'https://calendly.com/valuecoders/consultation-call?name='.$clName.'&email='.$clEmail.'&a2='.$clDesc;
$calendlyLink = 'https://www.calendly.com/valuecoders/7-day-trial?name='.$clName.'&email='.$clEmail.'&a1='.$clDesc.'&phone_number='.$clPhone;
}else{
$calendlyLink = 'https://www.calendly.com/valuecoders/7-day-trial?name='.$clName.'&email='.$clEmail.'&a1='.$clDesc.'&phone_number='.$clPhone;
}

get_header();
?>
<section class="thank-you-box-icon">
    <div class="container">
        <div class="wrap-80 bg-voilet text-center">
        <div class=icon_text>
        <div class="thank-you-icon">
        <?php if( !is_page('call-thanks') ){ ?>	        
        <picture>
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/calendar-thanks.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/dev-img/calendar-thanks.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/calendar-thanks.png" alt="Valuecoders" width="166" height="166">
		</picture> 
		<?php } ?>
        </div>
        <?php while( have_posts() ) : the_post(); ?>
        <div class="thank-you-text">
            <?php the_content(); ?>
        </div>
    	<?php endwhile; ?>
    	<div id="cal-iframe" class="calendly-inline-widget" data-url="<?php echo $calendlyLink; ?>"></div>
    	<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
    	</div>
	
	<div class="social-con">
    <div class="dark-theme-img">
	<ul class="dis-flex">	
	<li><a href="https://www.facebook.com/ValueCoders"><img src="<?php bloginfo('template_url'); ?>/images/facebookicon.png"></a></li>
	<li><a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee"><img src="<?php bloginfo('template_url'); ?>/images/instagramicon.png"></a></li>
	<li><a href="https://twitter.com/ValueCoders"><img src="<?php bloginfo('template_url'); ?>/images/Twitter.png"></a></li>
	<li><a href="https://www.linkedin.com/company/valuecoders"><img src="<?php bloginfo('template_url'); ?>/images/linkedinicon.png"></a></li>
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