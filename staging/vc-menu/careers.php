<?php require_once 'common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ValueCoders Careers | Learn, Grow & Ace your career - @ValueCoders</title>
	<meta name="description" content="Build your career with ValueCoders - entry-level or experienced professionals. We offer a friendly work environment with growth and learning opportunities that shape your career." />
	<meta name="keywords" content="software outsourcing company, software development outsourcing, software engineering company in india, software outsourcing company India, offshore software development, software outsourcing services" />
	<meta property="og:title" content="ValueCoders Careers | Learn, Grow & Ace your career - @ValueCoders" />

	<?php require_once 'include/header-files.php'; ?>
	<link rel="preload stylesheet" type="text/css" href="css/company.min.css" defer/>
</head>
<body id="themeAdd">
<?php require_once 'include/menu.php'; ?>

<section class="hero-section">
	<div class="container">
		<h1>Build Your Career With Us</h1>
		<p>ValueCoders is regularly recognized as a world leader in innovation, engineering, and business transformation, and that wouldn’t be possible without our employees. That’s why ensuring the professional development of our employees is a top priority.</p>
		<div class="count-box-outer dis-flex">
			<div class="count-box flex-4">
				<span class="count-box-big clr-white">17+</span>
				<span class="count-box-small">Years Experience</span>
			</div>
			<div class="count-box flex-4">
				<span class="count-box-big clr-white">650+</span>
				<span class="count-box-small">Fulltime Developers</span>
			</div>
			<div class="count-box flex-4">
				<span class="count-box-big clr-white">2000+</span>
				<span class="count-box-small">Man Years Exp</span>
			</div>
			<div class="count-box flex-4">
				<span class="count-box-big clr-white">2500+</span>
				<span class="count-box-small">Satisfied Customers</span>
			</div>
		</div>
	</div>
</section>

<section class="icon-with-img-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2">
				<div class="head-txt">
					<h2>Why Choose ValueCoders?</h2>
					<p>ValueCoders has 17+years of experience in delivering satisfactory & best-in-class mobile and web app development services with a proactive approach to clients accross the globe.</p>
				</div>
				<div class="dis-flex hire-php-icon icon-box-outer">
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon"></span>
							<span class="icon-txt">5+ Years Of<br>
							Average Experience</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon2"></span>
							<span class="icon-txt">Integrity &<br>
							Transparency</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon3"></span>
							<span class="icon-txt">Free No<br>
							Obligation Quote
							</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon4"></span>
							<span class="icon-txt">Hassle-free<br>
							Project Management</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon5"></span>
							<span class="icon-txt">Transparency<br>
							Is Guaranteed
							</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon6"></span>
							<span class="icon-txt">Flexible <br>
							Engagement Models</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon7"></span>
							<span class="icon-txt">Self-Learning<br>
							KRA
							</span>
						</div>
					</div>
					<div class="flex-2 margin-t-50">
						<div class="dis-flex items-center">
							<span class="icon icon8"></span>
							<span class="icon-txt">Technology Training<br>
							And Library</span>
						</div>
					</div>
				</div>
			</div>
			<div class="flex-2 text-right right-box">
				<?php if( !isMobile() ) : ?>
				<picture>
					<source type="image/webp" srcset="<?=HOST_URL?>images/valuecoders-img.webp">
					<source type="image/png" srcset="<?=HOST_URL?>images/valuecoders-img.png">
					<img loading="lazy" src="<?=HOST_URL?>images/valuecoders-img.png" alt="Valuecoders" width="674" height="755"> 
				</picture>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="client-img-section padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer items-center">
		<?php if( !isMobile() ) : ?>
			<div class="flex-2 left-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="images/our-clients.webp">
					<source type="image/png" srcset="images/our-clients.png">
					<img loading="lazy" src="images/our-clients.png" alt="Valuecoders" width="674" height="755"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="images/our-clients-for-lighter.webp">
					<source type="image/png" srcset="images/our-clients-for-lighter.png">
					<img loading="lazy" src="images/our-clients-for-lighter.png" alt="Valuecoders" width="674" height="755"> 
				</picture>
			</div>
			<?php endif; ?>
			<div class="flex-2 right-box tick-icon-list">
				<h2>We work with the best <br>compaines in the world</h2>
				<p>We deliver exceptional technology solutions for world class business in every business industry. from dyamic startup and SMB to Fortune 500 companies.</p>
				<ul>
					<li>91.2% Average Customer Satisfaction</li>
					<li>70.3 Net Promoter Score (90th percentile)</li>
					<li>174 active world-class clients</li>
					<li>Amet minim mollit non.</li>
					<li>91.2% Average Customer Satisfaction</li>
					<li>70.3 Net Promoter Score (90th percentile)</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="team-valuecoders-section padding-t-150 padding-b-150 bg-dark-theme">
	<div class="container">
		<div class="head-txt text-center">
			<h2>Team Valuecoders</h2>
			<p>At ValueCoders, we have a friendly, enthusiastic, and funloving yet professional environment. We love our work and growing very fast.</p>
		</div>
	</div>
	<div class="margin-t-100">
		<picture>
			<source type="image/webp" srcset="images/team-value-img.webp">
			<source type="image/png" srcset="images/team-value-img.png">
			<img loading="lazy" src="images/team-value-img.png" alt="Valuecoders" width="1920" height="707"> 
		</picture>
	</div>
</section>

<section class="keka-iframe-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2>Let’s Work Together!</h2>
		</div>
		<div class="keka-iframe">
			<iframe src="https://vinove.kekahire.com/api/embedjobs/efdbfe8f-0c89-43a7-b197-ff60d832994a" width="100%" height="1400px" frameborder="0"></iframe>
		</div>
	</div>
</section>

<section class="contact-us-section padding-t-150 padding-b-150">
	<?php require_once 'include/contact-form.php'; ?>
</section>
<?php require_once 'include/footer.php'; ?>

</body>
</html>

