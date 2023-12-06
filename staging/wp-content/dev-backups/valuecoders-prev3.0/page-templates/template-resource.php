<?php
/*
Template Name: Resource Page Template
*/ 
global $post;
get_header();
?>
<section class="hero-section for-resources-banner">
	<div class="container">
		<h1>Resources</h1>
		<p>We provide resources in the form of in-depth content, such as articles, whitepapers, videos, and infographics, to support and empower you to make your business a success.</p>
	</div>
</section>

<section class="three-column-icon-section with-border-box bg-light-theme padding-t-150 padding-b-150" data-nosnippet="">
	<div class="container">
		<div class="dis-flex col-box-outer">
		    <!--
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-1.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-1.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-1.png" 
						alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>Upwork vs Toptal vs ValueCoders</h3>
						<p>A comparison of three popular websites, Toptal, Upwork, and ValueCoders, shows why it is advisable to choose ValueCoders for software development and consulting opportunities.</p>
						<a href="<?php bloginfo('url') ?>/valuecoders-vs-toptal-vs-upwork" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
					</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-2.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-2.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-2.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>Rentacoder vs Freelancer vs ValueCoders</h3>
						<p>Comparison of three prominent websites, Rentacoder, Freelancer, and ValueCoders, to check their services and find out how outsourcing with ValueCoders makes the best option for software development.</p>
						<a href="<?php bloginfo('url') ?>/rentacoder-vs-freelancer-vs-valuecoder" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
					</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-3.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-3.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-3.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>ValueCoders vs Remore vs Deel</h3>
						<p>A comparison of ValueCoders with Remote and Deel has been presented, highlighting how ValueCoders beats out its competitors in various categories and aspects. ValueCoders do provide many additional perks and peace of mind.</p>
						<a href="<?php bloginfo('url') ?>/valuecoders-vs-remote-vs-deel" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
					</div>
				</div>
			</div>
			-->
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-4.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-4.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-4.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>Software Development To India</h3>
						<p>India stands out as the premier destination when it comes to outsourcing. It offers the lowest rates anywhere in the world and includes some of the best quality software developers. Find out why India is number one when it comes to outsourcing!</p>
					<a href="<?php bloginfo('url') ?>/why-india" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
				</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-5.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-5.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-5.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>Hire Indian Developers</h3>
						<p>ValueCoders offers software developers/programmers for hire hourly, part-time or monthly. We are your go-to partners if you want to work with the best programming talent to be part of your software development team.</p>
						<a href="<?php bloginfo('url') ?>/hire-developers" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
					</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-6.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-6.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-6.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>Hiring Remote Developers</h3>
						<p>Tap into a global pool of highly skilled professionals by hiring remote developers from ValueCoders. We give you access to the best talent, whether you need someone with experience in a specific coding language or who can work on a tight deadline.</p>
					<a href="<?php bloginfo('url') ?>/benefits-of-hiring-remote-developers" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
				</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-7.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-7.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-7.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>How To Hire Software Developers For StartUps</h3>
						<p>Hire expert developers for your startup to grow while saving money, optimizing code, and eradicating inefficiencies in the development process. Consult with ValueCoders and choose the right developer from 650+ pre-vetted in-house developers.</p>
					<a href="<?php bloginfo('url') ?>/hire-startup-developers" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
				</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box">
					<picture>
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-8.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/resources-img-8.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/resources-img-8.png" alt="Valuecoders" width="527" height="249"> 
					</picture>
					<div class="content-box">
						<h3>IT Outsourcing</h3>
						<p>Opt for ValueCoders IT outsourcing services to access services like application development, digital process optimization, software support & maintenance, and other areas of IT expertise.</p>
						<a href="<?php bloginfo('url') ?>/it-outsourcing-services" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>