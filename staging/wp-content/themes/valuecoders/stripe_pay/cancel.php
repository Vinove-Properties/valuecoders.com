<?php
/*
Template Name: Payment cancel Page
*/ 
//get_header();
$url = site_url();
require_once get_template_directory() .'/include/menu-v3.php'; 
?>
<link rel='preload stylesheet' as='style'  id='vc-services-css'  href='https://www.valuecoders.com/v2wp/wp-content/themes/valuecoders/css/thankyou.min.css?ver=6.0.1' media='all' />
<section class="thank-you-box-icon">
    <div class="container">
        <div class="wrap-80 bg-voilet text-center">
          <div class=icon_text>   
        <div class="thank-you-text">
           Your transaction was canceled!
			<div class="wrapper">

		<a href="<?php echo $url;?>/ratecard#order" class="btn-link">Back to Product Page</a>
	       </div>
        </div>  	
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
<?php //get_footer(); ?>
