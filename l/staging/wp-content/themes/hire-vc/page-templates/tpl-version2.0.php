<?php 
/*
Template Name: Template V1 - New Design
*/
get_header();
global $post;
$webpDir = WP_CONTENT_DIR.'/uploads-webpc/uploads/';
$webpUrl = content_url().'/uploads-webpc/uploads/';
?>
<section class="landing-hero-section">
		<div class="container">
			<div class="two-box">
				<?php while( have_posts()) : the_post(); ?>
				<div class="flex-2">
				<?php 
				$pTitle = get_field('primary_title');
				if($pTitle){
					echo '<p class="pTitle">'.$pTitle.'</p>';
				}
				?>					
				<?php the_content(); ?>
				<?php 
				$bnrCta = get_field('banner-cta');
				if( $bnrCta ) :
				?>
				<div class="margin-t-50">
				<a class="yellow-btn pop-up" onclick="showPopForm();" href="javascript:void(0);"><?php echo $bnrCta; ?> <i class="arrow-icon"></i></a>
				</div>
					<?php endif; ?>					
				</div>
				<?php endwhile; ?>
				<div class="flex-2">
					<?php 
					$pType = get_field('epage-type');
					if( $pType == 'type1' ){ 
						$clReviews = get_field('client-reviews', 'option');
						if( $clReviews ) :
						/*if( isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] == "59.144.164.252") ){
						    echo '<pre>';
						    print_r($clReviews);
						    echo '</pre>';
						}*/    
						?>
						<div class="glider-contain client-testimonial-slider">
						<div class="glider" id="glider">
							<?php foreach( $clReviews as $review ){ ?>
							<div class="slide-item">
								<div class="dis-flex">									
									<div class="profile-pic">
										<?php if($review['thumbnail']){
											echo '<img loading="lazy" src="'.$review['thumbnail']['url'].'" 
											alt="'.$review['client_name'].'" width="90" height="90" style="border-radius: 50%;">';
										} 
										?>
									</div>
									<div class="profile-head">
										<h3><?php echo $review['client_name']; ?></h3>
										<h4><?php echo $review['designation']; ?></h4>
										<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/stars.png" alt="ValueCoders" width="105" height="17">
									</div>
								</div>
								<p><?php echo $review['content']; ?></p>
							</div>
							<?php } ?>
						</div>
						<div role="tablist" class="dots"></div>
					</div>
					<?php endif; }else{ ?>
						<div class="img-box">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/logo-right.png" alt="Valuecoders" width="684" height="442">
						</div>	
					<?php } ?>
				</div>
			</div>

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
		</div>
</section>
<section class="count-box-section bg-cream padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2>What Makes ValueCoders Different</h2>
		</div>
		<div class="count-box-outer dis-flex margin-t-80">
			<div class="count-box flex-4">
				<span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">18</span>+</span>
				<span class="count-box-small">Years in Business</span>
			</div>
			<div class="count-box flex-4">
				<span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">650</span>+</span>
				<span class="count-box-small">Software Developers</span>
			</div>
			<div class="count-box flex-4">
				<span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2000</span>+</span>
				<span class="count-box-small">Man Years Experience</span>
			</div>
			<div class="count-box flex-4">
				<span class="count-box-big"><span class="scroll-counter" data-counter-time="1000">2500</span>+</span>
				<span class="count-box-small">Satisfied Customers</span>
			</div>
		</div>
	</div>
</section>
<?php 
$hireNeeds = get_field('hire-needs');
if( isset($hireNeeds['is_enable']) && $hireNeeds['is_enable'] == "yes" ) :
?>
<section class="col-three-icon-section bg-white padding-t-150 padding-b-150">
		<div class="container">
			<div class="head-txt text-center">
				<h2><?php echo $hireNeeds['section_heading']; ?></h2>
			</div>
			<?php 
			echo '<div class="dis-flex icon-box-outer">';
			foreach( $hireNeeds['cards'] as $card ){
			echo '<div class="flex-3">
					<div class="icon-box">';
					$icMeta 	= get_post_meta( $card['icon']['ID'], '_wp_attached_file', true );					
					$icwebpDir 	= $webpDir.$icMeta.".webp";
					$webpimg 	= $webImg = "";
					if( file_exists($icwebpDir) ){
					$icWebp 	= $webpUrl.$icMeta.".webp";	
					$webpimg 	= '<source type="image/webp" srcset="'.$icWebp.'">';
					}
					echo '<picture>
					'.$webpimg.'
					<source type="'.$card['icon']['mime_type'].'" srcset="'.$card['icon']['url'].'">
					<img loading="lazy" src="'.$card['icon']['url'].'" alt="Valuecoders" width="'.$card['icon']['width'].'" height="'.$card['icon']['height'].'">
					</picture>';

					echo '<h3>'.$card['title'].'</h3>
					<p>'.$card['text'].'</p>
					</div></div>';	
			}
			echo '</div>';
			?>
		<div class="margin-t-50 text-center">
			<a class="yellow-btn pop-up" onclick="showPopForm();" href="javascript:void(0);"><?php echo $hireNeeds['cta-text']; ?></a>
		</div>	
		</div>
</section>
<?php endif; ?>

<?php 
$techStacks = get_field('tech-stacks');
if( isset($techStacks['is_enable']) && $techStacks['is_enable'] == "yes" ) :
?>
	<section class="tech-stack-landing-section bg-cream padding-t-150 padding-b-150">
		<div class="container">
			<div class="head-txt text-center">
				<?php echo $techStacks['top_content'] ?>
			</div>
			<?php 
			if( $techStacks['cards'] ){
				foreach( $techStacks['cards'] as $tech ){
				echo '<div class="dis-flex items-center logo-box-outer">
				<div class="head-left">
					<h3>'.$tech['category_label'].'</h3>
				</div>
				<div class="logo-right dis-flex">';
				if( $tech['technologies'] ){
					foreach( $tech['technologies'] as $techIcons ){
						echo '<div class="logo-box">
						<div class="img-box"><img loading="lazy" src="'.$techIcons['icon']['url'].'" alt="Valuecoders" width="70" height="80">
						</div>
						<span>'.$techIcons['title'].'</span>
					</div>';	
					}
				}					
				echo '</div></div>';		
				}
			}
			?>
		</div>
</section>
<?php endif; ?>

	<?php 
	$whyHire = get_field('why-hire');
	if( isset($whyHire['is_enable']) && $whyHire['is_enable'] == "yes" ) :
	?>
	<section class="icon-with-img-section bg-dark-theme padding-t-150 padding-b-150">
		<div class="container">
			<div class="dis-flex col-box-outer">
				<div class="flex-2">
					<div class="head-txt">
						<h2><?php echo $whyHire['title']; ?></h2>
					</div>
					<?php 
					if( $whyHire['pointers'] ){
					echo '<div class="dis-flex hire-php-icon icon-box-outer">';
					foreach( $whyHire['pointers'] as $point ){
						echo '<div class="flex-2 margin-t-50">
							<div class="dis-flex items-center">
								<span class="icon"><img loading="lazy" src="'.$point['icon']['url'].'" alt="Valuecoders" width="59" height="52"></span>
								<span class="icon-txt">'.$point['title'].'</span>
							</div>
						</div>';
					}
					echo '</div>';	
					}
					?>					
				</div>
				<div class="flex-2 text-right right-box">
					<?php 
					//if( !wp_is_mobile() ) : 
					$vcofc = $whyHire['sec-image'];
					//print_r($vcofc); die;
					$icMeta 	= get_post_meta( $vcofc['ID'], '_wp_attached_file', true );
					$icwebpDir 	= $webpDir.$icMeta.".webp";
					$webImg = "";
					if( file_exists($icwebpDir) ){
					$icWebp 	= $webpUrl.$icMeta.".webp";	
					$webpimg 	= '<source type="image/webp" srcset="'.$icWebp.'">';
					}
					echo '<picture>
						'.$webpimg.'
						<source type="'.$vcofc['mime_type'].'" srcset="'.$vcofc['url'].'">
						<img loading="lazy" src="'.$vcofc['url'].'" alt="Valuecoders" width="'.$vcofc['width'].'" 
						height="'.$vcofc['height'].'"> 
					</picture>';
					//endif; 
					?>
				</div>
			</div>
			<div class="margin-t-50 text-center">
				<a class="yellow-btn pop-up" onclick="showPopForm();" href="javascript:void(0)"><?php echo $whyHire['cta-text']; ?></a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php 
	$csSlider = get_field('work-sample');
	if( isset($csSlider['is_enable']) && $csSlider['is_enable'] == "yes" ) :
	?>
	<section class="image-slider-section bg-cream padding-t-150 padding-b-150">
		<div class="container">
			<div class="head-txt text-center">
				<?php echo $csSlider['title']; ?>
			</div>
			<?php 
			if( $csSlider['slides'] ){
			echo '<div class="slider-outer">
			<div class="glider-contain">
			<div class="glider" id="glider">';
			foreach( $csSlider['slides'] as $slide ){
			echo '<div class="slide-item">
							<img loading="lazy" src="'.$slide['thumbnail']['url'].'" alt="ValueCoders" width="'.$slide['thumbnail']['width'].'" height="'.$slide['thumbnail']['height'].'">
							<div class="content-box">'.$slide['title'].'</div>
						</div>';	
			}
			echo '</div>';			
			echo '<button aria-label="Previous" class="glider-prev"></button>
			<button aria-label="Next" class="glider-next"></button>
			<div role="tablist" class="dots"></div>';
			echo '</div></div>';
			}
			?>
		</div>
	</section>
	<?php endif; ?>
	<?php 
	$hireSetps = get_field('col-hirestep');
	if( isset($hireSetps['is_enable']) && $hireSetps['is_enable'] == "yes" ) :
	?>
	<section class="step-icon-img-section bg-white padding-t-150 padding-b-150">
		<div class="container">
			<div class="head-txt text-center">
				<?php echo $hireSetps['content']; ?>
			</div>
			<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
				<div class="flex-4 icon-box">
					<i class="icon icon1"></i>
					<h3>Inquiry</h3>
					<p>We get on a call to understand your requirements and evaluate mutual fitment.</p>
				</div>
				<div class="flex-4 icon-box">
					<i class="icon icon2"></i>
					<h3>Align engineer(s)</h3>
					<p>We align engineer(s) and initiate the development process.</p>
				</div>
				<div class="flex-4 icon-box">
					<i class="icon icon4"></i>
					<h3>Trial Phase</h3>
					<p>The engineer(s) work on your project and we seek ongoing feedback.</p>
				</div>
				<div class="flex-4 icon-box final-step">
					<i class="icon icon5"></i>
					<h3>Add engineer(s) to your team</h3>
					<p>Based on the trial phase, you add the engineer(s) to your team.</p>
				</div>
			</div>
			<?php if( !wp_is_mobile() ) : ?>
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/our-hiring-process-img-for-lighter2.webp">
				<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/our-hiring-process-img-for-lighter2.png">
				<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/our-hiring-process-img-for-lighter2.png" alt="Valuecoders" width="1620" height="315"> 
			</picture>
			<?php endif; ?>
			<div class="dis-flex justify-center hiring-step-sprite">
				<div class="flex-4 icon-box text-center not-step">
					<i class="icon icon6"></i>
					<h3>Not Satisfied</h3>
					<p>If you are not satisfied with the engineer, we are happy to understand the gap(s) and replace the engineer(s).</p>
				</div>
			</div>
			<div class="margin-t-50 text-center">
				<a class="yellow-btn" onclick="showPopForm();" href="javascript:">Hire experts now <i class="arrow-icon"></i></a>
			</div>

		</div>
	</section>
	<?php endif; ?>

	<section class="three-column-icon-section bg-cream padding-t-150 padding-b-150">
		<div class="container">
			<div class="head-txt text-center">
				<h2>Choose From Our Hiring Models</h2>
				<p>With us, you can choose from multiple hiring models that best suit your needs.</p>
			</div>
			<div class="dis-flex col-box-outer">
				<div class="flex-3 box-3">
					<div class="box bg-blue-opacity-light">
						<picture>
							<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.webp">
							<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png">
							<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png" alt="Valuecoders" width="64" height="61">
						</picture>
						<h3>Dedicated Team</h3>
						<div class="content-box">
							<p>It is an expert autonomous team comprising of different roles (e.g. project manager, software engineers, QA engineers, and other roles) capable of delivering technology solutions rapidly and efficiently. The roles are defined for each specific project and management is conducted jointly by a Scrum Master and the client's product owner.</p>
							<ul>
								<li>Agile processes</li>
								<li>Transparent pricing</li>
								<li>Monthly billing</li>
								<li>Maximum flexibility</li>
								<li>Suitable for startups, MVPs and software </li>
								<li>product companies</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="flex-3 box-3">
					<div class="box bg-blue-opacity-light">
						<picture>
							<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.webp">
							<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png">
							<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png" alt="Valuecoders" width="64" height="61">
						</picture>
						<h3>Team Augmentation</h3>
						<div class="content-box">
							<p>Suitable for every scale of business and project, team augmentation helps add required talent to you team to fill the talent gap. The augmented team members work as part of your local or distributed team, attending your regular daily meetings and reporting directly to your managers. This helps businesses scale immediately and on-demand.</p>
							<ul>
								<li>Scale on-demand</li>
								<li>Quick & cost-effective</li>
								<li>Monthly billing</li>
								<li>Avoid hiring hassles</li>
								<li>Transparent pricing</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="flex-3 box-3">
					<div class="box bg-blue-opacity-light">
						<picture>
							<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.webp">
							<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png">
							<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png" alt="Valuecoders" width="64" height="61">
						</picture>
						<h3>Project Based</h3>
						<div class="content-box">
							<span class="content-head">Fixed Price Model:</span>
							<p>When project specifications, scope, deliverables and acceptance criteria are clearly defined, we can evaluate and offer a fixed quote for the project. This is mostly suitable for small-mid scale projects with well documented specifications.</p>
							<span class="content-head">Time & Material Model:</span>
							<p>Suitable for projects that have undefined or dynamic scope requirements or complicated business requirements due to which the cost estimation is not possible. Therefore, developers can be hired per their time.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<div class="form-pop-up-box">
		<div class="container">
			<div class="form-box-outer">
				<span class="pop-close"></span>
				<div class="head-txt text-center">
					<h2>Get in Touch</h2>
					<p>Guaranteed response within one business day!</p>
				</div>
				<form action="https://www.valuecoders.com/sendmail-l7.php" onsubmit="return vcPopFormValidation();" enctype="multipart/form-data" id="cmn-pop-form" method="POST">
					<div class="form-inner dis-flex" id="pop-form">
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" id="pop-name" placeholder="Full Name" class="input-field" value="" name="user-name" />
							</div>
							<small></small>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" id="pop-email" placeholder="Email Address" class="input-field" value="" 
								name="user-email" />
							</div>
							<small></small>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input type="tel" maxlength="15" id="pop-phone" class="input-field" placeholder="Phone Number" value="" name="user-phone" />
							</div>
							<small></small>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input class="input-field input-skype" id="pop-country" type="text" placeholder="Country" value="" name="user-country" />
							</div>
							<small></small>
						</div>
						<div class="form-text-cont width-full">
							<div class="user-input">
								<textarea class="input-field comment-input"  id="pop-requirement" placeholder="Your Requirement" name="user-req"></textarea>
							</div>
							<small></small>
						</div>
					</div>

					<div class="user-input checkout">
						<input type="hidden" name="frmqueryString" id="frmqueryString-pop" value="<?php echo utnHeaderString(); ?>" />
						<input type="hidden" name="frmSidebar" value="sidebar" />
						<input type="submit" id="submitButton-pop" class="checkout-submit" value="Send your request" />
					</div>
				</form>
			</div>
		</div>
	</div>
<?php get_footer(); ?>