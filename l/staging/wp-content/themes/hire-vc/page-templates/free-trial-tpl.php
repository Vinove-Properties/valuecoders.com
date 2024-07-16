<?php 
/*
Template Name: Free Trial Template
*/
get_header();
global $post;
$page_id    = $post->ID;
?>
<section class="bannersec">
    <div class="hire-container">
        <div class="row">
           <div class="col-sm-12 col-lg-7">
              <div class="bannertext">
              	<?php 
              	while ( have_posts() ) : the_post(); 
              		the_content();
              	endwhile;
              	?>
              	<div class="yearRow">
              		<span><strong>17+</strong> Years Experience</span>
              		<span><strong>500+</strong> Fulltime Developers</span>
              		<span><strong>2000+</strong> Man Years Exp</span>
              		<span><strong>2500+</strong> Satisfied Customers</span>
              	</div>
              </div>
           </div>
           <div class="col-sm-12 col-lg-5">
           <?php get_template_part( 'template-parts/form', 'top' );  ?>
           </div>
        </div>
    </div>
</section>

<section class="servicesRow">
	 <div class="hire-container">
	    <div class="row">
	       <div class="col-lg-12 headingRow"><?php echo get_post_meta($page_id,'main-services-content', true) ?></div>
	       <?php 
	       $services = get_field('our_services', $page_id);
	       if( $services ) :
	       ?>
	       <div class="col-lg-12 text-center">
	          <ul class="<?php echo get_post_meta($page_id, 'services_css_class', true) ?>">
	          	<?php 
	          	$s = 0;
	          	foreach( $services as $service ){
	          		$s++;
	          		echo '<li><i class="icon'.$s.'"></i><h3>'.$service['title'].'</h3>'.$service['description'].'</li>';
	          	}
	          	?>
	          </ul>
	          <a href="<?php //echo $hire_block['cta_link'];?>#footForm" title="<?php echo $hire_block['cta_text']; ?>" class="button-yel">Request 2 Weeks Trial</a>
	       	</div>
	   		<?php endif; ?>
	    </div>
	 </div>
</section>

<?php 
$techstack = get_field('tech_stack', $page_id);
if( $techstack && !empty($techstack['title']) ) :
?>
<section class="technoSec">
	<div class="hire-container">
		<div class="row">
			<div class="col-lg-12 headingRow">
				<h2><?php echo $techstack['title']; ?></h2>
			</div>
			<?php echo $techstack['content']; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php 
if(!wp_is_mobile()) : 
$tecnoCon = get_post_meta($page_id,'technology-content', true);
if( $tecnoCon ){
?>
<section class="related-techno">
	<div class="hire-container">
		<div class="row">
		   <div class="col-lg-12 headingRow"><?php echo get_post_meta($page_id,'technology-content', true); ?></div>
		</div>
		<div class="row techno <?php echo get_post_meta($page_id, 'technology_css_class', true) ?>">
			<?php 
			$technologies = get_field('technologies_list_carousel', $page_id);
			if( $technologies ){
				$t = 0;
				foreach($technologies as $technology){ $t++;
					echo '<div class="col-lg-12"><div class="technobox"><i class="icon'.$t.'"></i>'.$technology['technology'].'</div></div>';
				}
			}
			?>
		</div>
	</div>
</section>
<?php }
endif; ?>
<?php $whyHire = get_field('why-hire', $page_id); ?>
<section class="whyhireRow pb-0">
	 <div class="hire-container">
	    <div class="row justify-content-center">
	       <div class="col-lg-12 headingRow">
	          <h2><?php echo $whyHire['title']; ?></h2>
	          <p><?php echo $whyHire['content']; ?></p>
	       </div>
	       <div class="col-sm-6 col-md-4 col-lg-4 col-xl-6">
	          <picture class="dsk-show d-none d-md-block">
	             <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/common/images-2/tourimg.webp" width="751" height="820">
	             <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/common/images-2/tourimg.png" width="751" height="820">
	             <img src="<?php bloginfo('template_url'); ?>/common/images-2/tourimg.png" alt="Valuecoders" width="751" height="820">
	          </picture>
	       </div>
	       <div class="col-sm-12 col-md-8 col-lg-8 col-xl-6">
	       	<?php 
	       	$values = $whyHire['values'];
	       	if($values){
	       		echo '<ul>';
	       		$v = 0;
	       		foreach ($values as $value ){
	       			$v++;
					echo '<li><i class="icon'.$v.'"></i><h3>'.$value['title'].'</h3></li>';
	       		}
	       		echo '</ul>';
	       	}
	       	?>
	       </div>
	    </div>
	 </div>
</section>
<?php 
/*
$whyTechno = get_field('whyt-technology', $page_id);
if( $whyTechno ) :
?>
<section class="choosearea">
	<div class="hire-container">
	    <div class="row">
			<div class="col-lg-12 headingRow"><?php echo $whyTechno['content']; ?></div>
	    </div>
	    <div class="row justify-content-center">
			<div class="col-sm-12 col-md-4 col-lg-5 text-center">
				<?php 
				if( $whyTechno['image'] && $whyTechno['image_webp'] ){
					echo '<picture>
					<source type="image/webp" srcset="'.$whyTechno['image_webp']['url'].'" width="'.$whyTechno['image']['width'].'" height="'.$whyTechno['image']['height'].'">
					<source type="'.$whyTechno['image']['mime_type'].'" srcset="'.$whyTechno['image']['url'].'" 
					width="'.$whyTechno['image']['width'].'" height="'.$whyTechno['image']['height'].'">
					<img src="'.$whyTechno['image']['url'].'" alt="'.$whyTechno['image']['title'].'" 
					width="'.$whyTechno['image']['width'].'" height="'.$whyTechno['image']['height'].'">
					</picture>';
				} 
				?>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-7"><?php echo $whyTechno['listing']; ?></div>
	    </div>
	</div>
</section>
<?php endif; 
*/
?>

<?php 
$hire_block = get_field('hire_block', $page_id);
if( $hire_block ) :
?>
<!-- <section class="do-knowRow">
	<div class="hire-container">
		<div class="row justify-content-between align-items-center">
		   <div class="col-lg-12 headingRow">
		      <h2><i class="icon1"></i> <?php echo $hire_block['title']; ?></h2>
		      <p><?php echo $hire_block['description']; ?></p>
		   </div>
		   <div class="col-lg-12 text-center">
		   	<a href="<?php //echo $hire_block['cta_link'];?>#footForm" title="<?php echo $hire_block['cta_text']; ?>" class="button-yel"><?php echo $hire_block['cta_text']; ?></a>
		   </div>
		</div>
	</div>
</section> -->
<?php endif; ?>

<section class="amazing-compaines"><!-- Common Section -->
         <div class="custom-container">
            <div class="row">
               <div class="col-lg-12 headingRow">
                  <h2>We Have Worked With Some Amazing <br> Companies Around The World</h2>
                  <p>Served more than 2500 clients globally and retained 97% of them. After providing software development services to 1/3rd of the nationalities, here's what we have gained</p>
               </div>
            </div>
            <div class="row justify-content-sm-center">
      <?php if(!wp_is_mobile()){ ?>
         <div class="col-lg-12">
            <div class="company-box">
               <h3>North America</h3>
               <div class="comList">
                  <i class="company1"></i>
                  <i class="company2"></i>
                  <i class="company3"></i>
                  <i class="company4"></i>
                  <i class="company5"></i>
               </div>
            </div>
            <div class="company-box">
               <h3>Asia Pacific Region</h3>
               <div class="comList">
                  <i class="company10"></i>
                  <i class="company11"></i>
                  <i class="company12"></i>
                  <i class="company13"></i>
                  <i class="company14"></i>
               </div>
            </div>
            <div class="company-box">
               <h3>Europe</h3>
               <div class="comList">
                  <i class="company16"></i>
                  <i class="company17"></i>
                  <i class="company18"></i>
                  <i class="company19"></i>
                  <i class="company20"></i>
               </div>
            </div>
            <div class="company-box">
               <h3>Middle East & Africa</h3>
               <div class="comList">
                  <i class="company23"></i>
                  <i class="company24"></i>
                  <i class="company25"></i>
                  <i class="company26"></i>
                  <i class="company27"></i>
               </div>
            </div>
            <div class="company-box">
               <h3>India</h3>
               <div class="comList border-0">
                  <i class="company28"></i>
                  <i class="company29"></i>
                  <i class="company30"></i>
                  <i class="company31"></i>
                  <i class="company32"></i>
               </div>
            </div>  
         </div>
      <?php } else { ?>
         <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/common/images-2/MobClients.webp" width="320" height="220">
            <source type="image/jpeg" srcset="<?php bloginfo('template_url'); ?>/common/images-2/MobClients.jpg" width="320" height="220">
            <img src="<?php bloginfo('template_url'); ?>/common/images-2/MobClients.jpg" alt="Hire MERN Stack programmers India" width="320" height="220"> 
         </picture>
      <?php } ?>
      </div>
   </div>
</section>

<?php
/*
if( !wp_is_mobile() ){
$industry_block = get_field('industry_block', $page_id);
if( $industry_block ) :
?>
<section class="industryHome">
<div class="hire-container">
    <div class="row">
       <div class="col-lg-12 headingRow">
          <h2><?php echo $industry_block['title']; ?></h2>
          <p><?php echo $industry_block['description']; ?></p>
       </div>
    </div>
    <?php 
    $itabs = get_field('industry', 'option');
    ?>
    <div class="row">
       <div class="verticalsRow">
       	<?php 
       	if( $itabs ){
       		echo '<div class="nav">';
       		$nav = 0;
       		foreach( $itabs as $tab){
       		$nav++;
       		$isActive = ( $nav === 1 )?" active":"";
       		echo '<a class="icon'.$nav.' '.$isActive.'" id="v-pills-home-tab" data-toggle="pill" 
       		href="#industry'.$nav.'" role="tab" aria-controls="v-pills-home" aria-selected="true">'.$tab['title'].'</a>';
       		}
          	echo '</div>';
       	} 
       	?>
      	<?php 
      	if( $itabs  ) :
      	?>
          <div class="tab-content" id="v-pills-tabContent">
          	<?php 
          	$con = 0; 
          	foreach( $itabs as $content ){
          		$con++;
          		$iscActive = ( $con === 1 ) ? ' active':'';
          		echo '<div class="textbox '.$iscActive.'" id="industry'.$con.'" role="tabpanel" aria-labelledby="healthcare">';
          		if( $content['image'] && $content['image_webp'] ){
          		echo '<picture class="d-none d-md-block">
                   <source type="image/webp" srcset="'.$content['image_webp']['url'].'" width="'.$content['image']['width'].'" height="'.$content['image']['height'].'">
                   <source type="'.$content['image']['mime_type'].'" srcset="'.$content['image']['url'].'" width="'.$content['image']['width'].'" height="'.$content['image']['height'].'">
                   <img src="'.$content['image']['url'].'" alt="'.$content['title'].'" width="'.$content['image']['width'].'" height="'.$content['image']['height'].'">
                </picture>';
          		}
                echo '<i class="icon'.$con.'"></i>'.$content['content'];
             	echo '</div>';
          	} 
          	?>
          </div>
      <?php endif; ?>
       </div>
    </div>
</div>
</section>
<?php endif; 
}
*/
?>

<?php 
$experience = get_field('experience', $page_id);
if($experience) :
?>
<section class="experienceRow">
         <div class="hire-container">
            <div class="row align-items-center">
               <!-- <div class="col-sm-12 col-md-6 col-lg-6 yearcol">
               	<?php // dynamic_sidebar( 'vc-experience' ); ?>
               </div> -->
               <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="headingRow"><?php echo $experience['content']; ?></div>
               </div>
            </div>
         </div>
</section>
<?php endif; ?>

<?php 
$analysis = get_field('analysis', $page_id); 
if( $analysis ) :
?>
<!-- <section class="comparativeRow">
<div class="hire-container">
<div class="row">
	<div class="col-lg-12 headingRow">
	<h2><?php echo $analysis['title'];  ?></h2>
	<p><?php echo $analysis['description'];  ?></p>
	</div>
	<div class="col-lg-12"><?php echo $analysis['table'];  ?></div>
</div>
</div>
</section> -->
<?php endif; ?>

<?php
$hire_steps = get_post_meta($page_id,'hire_steps', true); 
if( $hire_steps ) :
?>
<section class="easy-steps hiring-process-section">
	<div class="hire-container">
		<div class="headingRow">
			<?php echo $hire_steps; ?>
		</div>
		<div class="dis-flex col-box-outer hiring-step-sprite">
			<div class="flex-5 icon-box">
				<i class="icon icon1"></i>
				<h3>Inquiry</h3>
				<p>Tell us in brief about your ideas and needs. Don't worry it's secure and confidential.</p>
			</div>
			<div class="flex-5 icon-box">
				<i class="icon icon2"></i>
				<h3>Select CV</h3>
				<p>Shortlist candidates which best fit in your needs by viewing their CVs.</p>
			</div>
			<div class="flex-5 icon-box">
				<i class="icon icon3"></i>
				<h3>Assessment</h3>
				<p>Optionally, assess candidates over a phone or video call.</p>
			</div>
			<div class="flex-5 icon-box">
				<i class="icon icon4"></i>
				<h3>Trial Run</h3>
				<p>Take a 2-week trial.</p>
			</div>
			<div class="flex-5 icon-box final-step">
				<i class="icon icon5"></i>
				<h3>Add resource in your team</h3>
				<p>If you like the resource(s), pay for the trial time and onboard resource(s).</p>
			</div>
		</div>
		<picture class="lighter-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<div class="dis-flex justify-center hiring-step-sprite">
			<div class="flex-4 icon-box text-center not-step">
				<i class="icon icon6"></i>
				<h3>Add resource in your team</h3>
				<p>If you like the resource(s), pay for the trial time and onboard resource(s).</p>
			</div>
		</div>
	</div>
</section>
<?php 
endif;
?>


<?php 
/*
$hire_steps = get_post_meta($page_id,'hire_steps', true); 
if( $hire_steps ) :
?>
<section class="easy-steps">
	<div class="hire-container">
	<div class="row">
	<div class="col-lg-12 headingRow"><?php echo $hire_steps; ?></div>
	<div class="col-md-6 col-lg-3 text-center">
		<div class="stepBox">
			<strong>01</strong>
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-1.webp">
				<source type="image/jpeg" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-1.jpg">
				<img src="<?php bloginfo('template_url') ?>/common/images-2/step-1.jpg" alt="Valuecoders">
			</picture>
			<h3>
			<?php 
			if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
			echo 'We Get On A Call To Understand Your Requirements';
			} else {
			echo 'Send us your detailed project requirements';
			} 
			?>
			</h3>
		</div>
	</div>
	<div class="col-md-6 col-lg-3 text-center">
		<div class="stepBox">
			<strong>02</strong>
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-2.webp">
				<source type="image/jpeg" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-2.jpg">
				<img src="<?php bloginfo('template_url') ?>/common/images-2/step-2.jpg" alt="Valuecoders">
			</picture>
			<h3>
			<?php 
			if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
			echo 'We Align Developer(s) & Initiate The Development Process';
			} else {
			echo 'Select candidates for screening process';
			} 
			?></h3>
		</div>
	</div>
	<div class="col-md-6 col-lg-3 text-center">
		<div class="stepBox">
			<strong>03</strong>
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-3.webp">
				<source type="image/jpeg" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-3.jpg">
				<img src="<?php bloginfo('template_url') ?>/common/images-2/step-3.jpg" alt="Valuecoders">
			</picture>
			<h3><?php 
			if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
			echo 'In Trial Phase - The Developer(s) Work on Your Project & We Seek Ongoing Feedback';
			} else {
			echo 'Take interview of selected candidates';
			} 
			?></h3>
		</div>
	</div>
	<div class="col-md-6 col-lg-3 text-center last-clmn">
		<div class="stepBox">
			<strong>04</strong>
			<picture>
				<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-4.webp">
				<source type="image/jpeg" srcset="<?php bloginfo('template_url') ?>/common/images-2/step-4.jpg">
				<img src="<?php bloginfo('template_url') ?>/common/images-2/step-4.jpg" alt="Valuecoders">
			</picture>
			<h3><?php 
			if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
			echo 'Based On The Trial Phase, You Add The Developer(s) To Your Team';
			} else {
			echo 'Initiate Project On-Boarding & Assign Tasks';
			} 
			?></h3>


		</div>
	</div>
	<!-- <div class="col-lg-12 position-relative">
		<div class="step-img">
		  <?php if( !wp_is_mobile() ){ ?>  
			<picture>
			<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/common/images-2/easy-steps.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url') ?>/common/images-2/easy-steps.png">
			<img src="<?php bloginfo('template_url') ?>/common/images-2/easy-steps.png" alt="Valuecoders">
			</picture>
		  <?php } ?>
		</div>
		<div class="step"><strong>01</strong><h3>Send us <span>your detailed</span> project requirements</h3></div>
		<div class="step n2"><strong>02</strong><h3>Select <span>candidates</span> for screening process</h3></div>
		<div class="step n3"><strong>03</strong><h3>Take <span>interview</span> of selected candidates</h3></div>
		<div class="step n4"><strong>04</strong><h3>Initiate project on-boarding &amp; <span>assign tasks</span></h3></div>
	</div> -->
	</div>
	</div>
</section>
<?php endif; 
*/
?>

<?php 
if( !wp_is_mobile() ){
$hiring_models = get_post_meta($page_id,'hiring_models', true); 
if( $hiring_models ) :
?>
<section class="hiringRow">
	<div class="hire-container">
		<div class="row">
		  <div class="col-lg-12 headingRow"><?php echo $hiring_models; ?></div>
		</div>
    <?php dynamic_sidebar( 'hiring-model' ); ?>
	</div>
</section>
<?php 
endif;
} 
?>

<section class="awardsRow cpageBg ">
   <div class="custom-container">
      <div class="row">
         <div class="col-lg-12 headingRow">
            <h2 class="text-white">Partners, Awards, Accolades, Recognition <br>Gained By <span class="yelcolor">ValueCoders</span></h2>
         </div>
         <div class="col-lg-12 pr-0 pl-0">
            <ul>
               <li><i class="icon1"></i></li>
               <li><i class="icon2"></i></li>
               <li><i class="icon3"></i></li>
               <li><i class="icon4"></i></li>
               <li><i class="icon5"></i></li>
               <li><i class="icon6"></i></li>
               <li><i class="icon7"></i></li>
               <li><i class="icon8"></i></li>
               <li><i class="icon9"></i></li>
               <li><i class="icon10"></i></li>
               <li><i class="icon11"></i></li>
               <li><i class="icon12"></i></li>
               <li><i class="icon13"></i></li>
               <li><i class="icon14"></i></li>
               <li><i class="icon15"></i></li>
               <li><i class="icon17"></i></li>
               <li><i class="icon18"></i></li>
               <li><i class="icon19"></i></li>
            </ul>
         </div>
      </div>
      <?php if(!wp_is_mobile()){ ?>
      <div class="related-techno partnersec pb-0">
         <div class="row partner">
            <div class="col-lg-12">
               <div class="technobox">
                  <i class="icon1"></i>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="technobox">
                  <i class="icon2"></i>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="technobox">
                  <i class="icon3"></i>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="technobox">
                  <i class="icon4"></i>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="technobox">
                  <i class="icon5"></i>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="technobox">
                  <i class="icon6"></i>
               </div>
            </div>
         </div>
      </div>
      <?php }?>
   </div>
</section>
<section class="graybg pt-0 pb-0" id="footForm">
   	<div class="row">
      	<div class="col-lg-12 d-flex justify-content-between flex-wrap">
<?php if(!wp_is_mobile()){ ?>
<div class="company-review">
  <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="reviewtext">
            <span class="dpsec dp13"></span>
            <h4>Adam Watts</h4>
            <small>President & COO, Fintex Advisors</small>
            <p>We have worked with ValueCoders for more than a year, and their skilled team has allowed us to scale up during certain projects thereby allowing our full time team to focus on core platform functionality. Recommended.</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp12"></span>
            <h4>Andrew North </h4>
            <small>Managing Director, BlueLane Holdings Ltd.</small>
            <p>The team at ValueCoders has been a fantastic asset within our startup business. The senior management provide great support, guidance and advice to get you up and running with your team. They provided flexible services with both fully retained staff members to join our team, and also really flexible resources that we pull in at short notice to help out on specific skills/projects. We had the option to interview all of the people working on our business and get to know them before they joined the team. It gave us great confidence that the people joining had already been part of ValueCoders for some time and their capabilities were known. The development team are attentive, talented, and very adaptable to the changing circumstances of a startup business.</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp5"></span>
            <h4>Gerald van Kooten </h4>
            <small>Partner at Anders Invest B.V.</small>
            <p>ValueCoders is very professional development team. I used their expertise in the building of an online comparison tool. We defined a clear scope and the team designed mock-ups first. With the help of online project tools and Skype Q&A sessions you can really work together despite the great geographical distance. I would highly recommend the services of ValueCoders as they go the extra mile to deliver a good product.</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp6"></span>
            <h4>Dave Jefferson </h4>
            <small>Founder JEMs Software</small>
            <p>I engaged ValueCoders in January of this year to provide software development expertise for our 20/20 B.E.S.T Safety Software and the results have been fantastic! Not only is the dedicated software team knowledgeable & helpful but ValueCoders also provided a liaison & an HR representative to answer any questions I might have & also keep me informed on my dedicated team of developers. Their professionalism & willingness to “go the extra mile” for their customers has not gone unnoticed...</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp7"></span>
            <h4>Michelle Fno</h4>
            <small>CEO, Miscato Limited</small>
            <p>ValueCoders is our go-to partner to help us realize our software needs; they are supportive, friendly and always ready to help us when we face difficulties in the project. 10/10 would recommend.</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp8"></span>
            <h4>Gerald Lindhorst</h4>
            <small>Director Gleichklang Limited </small>
            <p>VC has been able to establish the continuity of the development process . On balance, we can say that it was the right decision to outsource the development to India and that VC was the right choice.The cooperation with VC allowed us to develop our application at a higher speed with the same quality as before in Germany. For our company this has been an important achievement</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp3"></span>
            <h4>Benoît D'heygere </h4>
            <small>Founder at Refuge</small>
            <p>A great team of problem solvers. At ValueCoders, they have a great culture. We worked as a team, not as a client and developers. They stay connected and report on a regular basis. In the end all culminated in an awesome product.</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
      <div class="carousel-item">
        <div class="reviewtext">
            <span class="dpsec dp4"></span>
            <h4>Antonio Santos</h4>
            <small>Head of Web Technology at Candor Renting SA</small>
            <p>ValueCoders is a remarkable offshore IT company with highly skilled developers. They have provided me expected outcomes for every project they undertook. I highly recommend ValueCoders to others.</p>
            <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
         </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
      <i class="fa fa-angle-right" aria-hidden="true"></i>
    </a>
  </div>
</div>
<?php }?>
<?php if(!wp_is_mobile()){ ?>
<div class="fromsec">
   <div class="headingRow">
      <h2>Get In Touch</h2>
      <?php 
      if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
         echo '<p>Request 2 weeks trial and start your project risk-free</p>';
      } else {
         echo '<p>Request a free consultation and get a no obligation quote for your project within 8 Business hours</p>';
      } 
      ?>
   </div>
    <div class="row">
      <form id="footer-form" action="https://www.valuecoders.com/sendmail-l7.php" enctype="multipart/form-data" method="POST">
        <div class="inpBox"><input type="text" name="user-name" id="user-name" onblur="validate_name()" onfocus="botclearvalidation()" placeholder="Your Name"></div>
<div class="inpBox"><input type="text" name="user-phone" id="user-phone" onblur="validate_phone();" onfocus="botclearvalidationPhone()" placeholder="Contact Number" onkeypress="return isNumberKey(event);"></div>
<div class="inpBox"><input type="email" placeholder="Your Work E-mail" name="user-email" id="user-email" onblur="validate_email();" onfocus="botclearvalidationEmail()">
<?php echo hiddenBoatField("input"); ?></div>
        <div class="autocomplete">
          <input id="myInput2" type="text" name="user-country" placeholder="Country" onblur="validate_country();" onfocus="botclearvalidationCountry()">
        </div>
        <div class="textArea"><textarea placeholder="Your Requirements" name="user-req" id="user-req" onblur="validate_req();" onfocus="botclearvalidationReq()"></textarea></div>
        <div class="row">
          <div class="col-6 col-sm-6 col-md-12 col-lg-6">
            <div class="browseRow">
              <div id="uploadedfilelist"></div>
              <div class="dropzone-previews" id="prv-show-footer"></div>
              <div class="filesrow123 upload-sec123 dropzone" id="myAwesomeDropzone"></div>
              <input type="hidden" id="g-recaptcha-response" name="recaptcha">
              <input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="" />
              <input type="hidden" name="type" value="footer-form" />
              <input type="hidden" name="frmqueryString" id="frmqueryString" value="<?php echo utnHeaderString(); ?>" />
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-12 col-lg-6 text-right text-md-left text-lg-right">
            <button type="button" id="submitF">Send Your Request</button>
          </div>
          <div class="col-lg-12">
            <p class="ptext"><strong>Note:</strong> We Respect Your Privacy! Your details will never be shared with anyone for marketing purposes.</p>
          </div>
        </div>
      </form>
    </div>
    <?php } else { ?>
      <div class="fromsec">
        <div class="headingRow">
            <h2>Get In Touch</h2>
				<?php 
				if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
				echo '<p>Request 2 weeks trial and start your project risk-free</p>';
				} else {
				echo '<p>Request a free consultation and get a no obligation quote for your project within 8 Business hours</p>';
				} 
				?>
         </div>
          <div class="row">
            <form id="footer-form" action="https://www.valuecoders.com/sendmail-l7.php" enctype="multipart/form-data" method="POST">
              <div class="inpBox"><input type="text" name="user-name" id="user-name" onblur="validate_name()" onfocus="botclearvalidation()" placeholder="Your Name"></div>
              <div class="inpBox"><input type="text" name="user-phone" id="user-phone" onblur="validate_phone();" onfocus="botclearvalidationPhone()" placeholder="Contact Number" onkeypress="return isNumberKey(event);"></div>
              <div class="inpBox"><input type="email" placeholder="Your Work E-mail" name="user-email" id="user-email" onblur="validate_email();" onfocus="botclearvalidationEmail()">
              <?php echo hiddenBoatField("input"); ?></div>
              <!--<div class="inpBox"><input type="text" id="myInput2" name="user-country" placeholder="Country" onblur="validate_country();" onfocus="botclearvalidationCountry()"></div>-->
              <div class="textArea"><textarea placeholder="Your Requirements" name="user-req" id="user-req" onblur="validate_req();" onfocus="botclearvalidationReq()"></textarea></div>
              <div class="row justify-content-center">
                <div class="col-6 col-sm-6 col-md-12 col-lg-6 text-right text-md-left text-lg-right">
                	<input type="hidden" name="type" value="footer-form" />
                	<input type="hidden" name="frmqueryString" id="frmqueryString" value="<?php echo utnHeaderString(); ?>" />
                  <button type="button" id="submitF">Send Your Request</button>
                </div>
                <div class="col-lg-12">
                  <p class="ptext"><strong>Note:</strong> We Respect Your Privacy! Your details will never be shared with anyone for marketing purposes.</p>
                </div>
              </div>
            </form>
          </div>
    <?php } ?>
    <div class="numberRow">
      <ul>
        <li><h5 class="icon1">INDIA</h5>+91 704 202 0782</li>
        <li><h5 class="icon2">UK</h5>+44 20 3239 2299</li>
        <li><h5 class="icon3">USA</h5>+1 415 230 0123</li>
        <li><h5 class="icon4">AUS</h5>+61 2 8005 8080</li>
      </ul>
    </div>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>