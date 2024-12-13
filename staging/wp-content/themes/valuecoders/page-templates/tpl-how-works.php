<?php
/*
Template Name: How it works Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/service-banner.png);">
	<div class="container">
		<div class="content-wrap">
          <div class="dis-flex">
            <div class="left-box">
				<?php while( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php cmnCTA_v3('Contact Us', false); ?>
			</div>
		</div>
		</div>		
	</div>
</section>
<?php
get_template_part('inc/cmn', 'startups');
?>

<?php 
$wprocess = get_field('working-process');
if( $wprocess ) :
?>
<section id="vc-hprocess" class="three-column-icon-section four-step-with-icon-section padding-t-120 padding-b-120 bg-light-theme">
	<div class="container">
   <div class="dis-flex top-content">
          <div class="flex-2">
            <h2>Our Hiring Process</h2>
          </div>
          <div class="flex-2">
          <p>Take a look at our simple and straightforward process to hire software developers from ValueCoders.</p>
          </div>
        </div>
		<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
			<div class="flex-4 icon-box">
				<i class="icon icon1"></i>
				<h3>Inquiry</h3>
				<p>We get on a call to understand your requirements and evaluate mutual fitment.</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon2"></i>
				<h3>Select Software Developers</h3>
				<p>Hire best software developers from our in-house tech pool. Interview &amp; shortlist candidates to quickly find the perfect fit for your team.</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon5"></i>
				<h3>Team Integration</h3>
				<p>Our developers are now a part of your team. Assign tasks and receive daily updates for seamless collaboration and accountability.</p>
			</div>
			<div class="flex-4 icon-box final-step">
				<i class="icon icon4"></i>
				<h3>Team Scaling</h3>
				<p>We give you the flexibility to scale your team, be expanding or reducing team size.</p>
			</div>
		</div>

	</div>
</section>
<!-- 
<section class="step-icon-img-section bg-light padding-t-120 padding-b-120">
	<div class="container">
		<?php the_field('working-process'); ?>		
		<?php if( !wp_is_mobile() ) : ?>
		<picture class="dark-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<picture class="lighter-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png" 
			alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<?php endif; ?>
		<div class="dis-flex justify-center hiring-step-sprite">
			<div class="flex-4 icon-box text-center not-step">
				<i class="icon icon6"></i>
				<h3>Add resource in your team</h3>
				<p>If all goes well, our team gets together for a quick onboarding session and training period before getting started on your project!</p>
			</div>
		</div>	
	</div>
</section> 
-->
<?php endif; ?>
<section class="three-column-icon-section bg-light padding-t-120 padding-b-120">
      <div class="container">
        <div class="dis-flex top-content">
          <div class="flex-2">
            <h2>Your Top Questions Answered</h2>
          </div>
          <div class="flex-2">
            <p>Navigate through the most commonly asked questions with our helpful FAQ section.</p>
          </div>
        </div>
        <div class="dis-flex col-box-outer margin-t-50">
          <div class="flex-2 box-3">
            <div class="box">
              <h3>Are there any costs associated with the trial?</h3>
              <p>We do not expect you to pay upfront. But if you are satisfied with the engineer(s) during the trial and would like to add the engineer(s) to your team, we expect to be paid for the time. If not, we will not bill you anything.</p>
            </div>
          </div>
          <div class="flex-2 box-3">
            <div class="box">
              <h3>Why are you offering a trial? What is the fine print? Is there a catch?</h3>
              <p>We are offering trials to ensure a transparent and honest process aimed to ensure we align the best-fit engineer(s) for your team. There is absolutely NO catch or fine print - it is a genuine attempt at finding a win-win scenario and establishing long term work relationships with our clients.</p>
            </div>
          </div>
          <div class="flex-2 box-3">
            <div class="box">
              <h3>Will the developer work on my server?</h3>
              <p>During the trial phase, the engineer(s) will work on their local machine or test server, demonstrate code and engage in code walk-through if required. The developer(s) can work on your server after a successful trial. In case of an unsuccessful trial, we will simply delete all work done at no cost to you.</p>
            </div>
          </div>
          <div class="flex-2 box-3">
            <div class="box">
              <h3>What if I like the engineer(s) during the trial but am not satisfied later?</h3>
              <p>In the rare circumstance that you’re dissatisfied with engineer(s) after the trial, you can always ask for a replacement. We will try and find you a replacement as early as possible (mostly within 2-3 weeks).</p>
            </div>
          </div>
        </div>
      </div>
    </section>
		<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
      <div class="container">
        <div class="head-txt text-center">
          <h2>Let's Discuss Your Project</h2>
          <p>Get free consultation and let us know your project idea to turn it into an amazing digital product.
          </p>
        </div>
        <div class="cta-wrap margin-t-50 justify-center">
          <div class="cta-btn">
            <a href="<?php echo site_url('/contact'); ?>" id="cta-bfc">Contact Us
            <span class="arrow-wrap">
            <span class="arrow primera"></span>
            <span class="arrow segunda next"></span>
            <span class="arrow last"></span>
            </span>
            </a>
          </div>
        </div>
      </div>
    </section>    
<!-- Hiring Model Section needs to add... -->
<?php 
$hireModel = get_field('hiring_models');
$hireModelEnable = $hireModel['is_enabled'];
if( $hireModelEnable == 'yes' ) :
?>
<section class="hiring-models padding-t-120 padding-b-120 <?php echo $hireModel['sc_background']; ?>">	
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $hireModel['t-content']; ?>
		</div>
	  	<?php 
	  	$hCards = $hireModel['hiring_cards'];
	  	if( $hCards ) : ?>
		<div class="dis-flex col-box-outer asp-net-usage-sprite">
		<?php 
		$h = 1; 
		foreach( $hCards as $row ) {
		?>
		<div class="flex-3 box-3">
			<div class="box bg-blue-opacity-light">
			<?php 
			$dtIcon = $row['icon-dt'];
			$dtIconwp = $row['icon-dt-webp'];
			if( $dtIcon && $dtIconwp ){
			echo '<picture class="dark-theme-img">
			<source type="image/webp" srcset="'.$dtIconwp['url'].'">
			<source type="'.$dtIcon['mime_type'].'" srcset="'.$dtIcon['url'].'">
			<img loading="lazy" src="'.$dtIcon['url'].'" alt="'.vcparseanchor($row['card_title']).'" width="'.$dtIcon['width'].'" 
			height="'.$dtIcon['height'].'"> 
			</picture>';
			}

			$ltIcon = $row['icon-lt'];
			$ltIconwp = $row['icon-lt-webp'];
			if( $ltIcon && $ltIconwp ){
			echo '<picture class="lighter-theme-img">
			<source type="image/webp" srcset="'.$ltIconwp['url'].'">
			<source type="'.$ltIcon['mime_type'].'" srcset="'.$ltIcon['url'].'">
			<img loading="lazy" src="'.$ltIcon['url'].'" alt="'.vcparseanchor($row['card_title']).'" width="'.$ltIcon['width'].'" 
			height="'.$ltIcon['height'].'"> 
			</picture>';
			}
			?>
			<h3><?php echo $row['card_title']; ?></h3>
			<?php echo $row['card_description']; ?>
			</div>
		</div>
		<?php $h++; 
		} 
		?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>
<!-- Hiring Model Section needs to add... -->


<?php 
/*
$vcTimeline = get_field('vc-timeline');
$vcTimelineEnable = $vcTimeline['is_enabled'];
if( $vcTimelineEnable == 'yes' ) :
$topts = ( isset( $vcTimeline['timelines-content'] ) )	? $vcTimeline['timelines-content'] : [];
?>
<section class="process-timeline-section <?php echo $vcTimeline['sc_background']; ?> text-center padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
		<?php echo $vcTimeline['top-content']; ?>
		</div>
		<?php 
		if( $topts ){
			echo '<div class="timeline"><ul>';
			foreach( $topts as $row ){
				echo '<li><div class="content">'.$row['content'].'</div></li>';
			}
			echo '</div></ul>';
		} 
		?>
	</div>
</section>
<?php endif; */ ?>

<section class="get-app development-process how-process bg-blue-linear padding-t-120 padding-b-120">
      <div class="container">
        <div class="dis-flex justify-sb">
          <div class="flex-2 left-box">
            <div class="inner-box">
              <h2>Our Vetting Process</h2>
            </div>
          </div>
          <div class="flex-2 right-box ">
            <p>ValueCoders employs a five-stage talent vetting process to ensure we have the right staff in place to provide the highest level of service to our clients. By using this vetting process, we have been able to identify the best candidates and bring them into the team successfully.</p>
          </div>
        </div>
        <div class="app-dprocess  dis-flex margin-t-80 justify-sb">
          <div class="process-item">
            <div class="pro-title">
              <div class="nocount">Step</div>
              <h3>Profile Screening &amp; Shortlisting</h3>
            </div>
            <div class="process-circle"></div>
            <p>Our experts carefully screen and review thousands of applications against the minimum criteria. We take into account every aspect including professional history and holistic background check before deciding if a candidate is a good fit.</p>
          </div>
          <div class="process-item">
            <div class="pro-title">
              <div class="nocount">Step</div>
              <h3>Language Proficiency</h3>
            </div>
            <div class="process-circle"></div>
            <p>The AI-powered communication assessment tests your writing, reading, pronunciation, and language clarity. It also measures how quickly the candidate speaks any language to determine if it is a good fit for the position or not!</p>
          </div>
          <div class="process-item">
            <div class="pro-title">
              <div class="nocount">Step</div>
              <h3>Aptitude Evaluation</h3>
            </div>
            <div class="process-circle"></div>
            <p>The scientifically designed aptitude test will measure the reasoning and problem-solving abilities of the candidates.</p>
          </div>
          <div class="process-item">
            <div class="pro-title">
              <div class="nocount">Step</div>
              <h3>Technical Assessment</h3>
            </div>
            <div class="process-circle"></div>
            <p>We have a stringent technical assessment that will test the candidate’s knowledge on different topics in technology so we can find out who is the most competent!</p>
          </div>
          <div class="process-item">
            <div class="pro-title">
              <div class="nocount">Step</div>
              <h3>One-on-One Panel Interview</h3>
            </div>
            <div class="process-circle"></div>
            <p>We have a team of experts who conduct the final video interview, making sure to understand your preferences and expectations.</p>
          </div>
        </div>
      </div>
    </section>

<?php 
$hdifferent = get_field('hw-different');
$hdifferentEnable = $hdifferent['is_enabled'];
if( $hdifferentEnable == 'yes' ) :
?>
<section class="three-column-icon-section we-differ padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2">
        <h2><?php echo $hdifferent['title']; ?></h2>
      </div>
      <div class="flex-2">
        <p><?php echo $hdifferent['content']; ?></p>
      </div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
      <div class="flex-2 box-3">
        <div class="box">
          <h3><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/how-01.png" alt="Traditional Hiring">Traditional Hiring</h3>
          <?php echo $hdifferent['traditional-hiring']; ?>
        </div>
      </div>
      <div class="flex-2 box-3">
        <div class="box">
          <h3><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/how-02.png" alt="Modern Hiring">Modern Hiring</h3>
          <?php echo $hdifferent['modern-hiring']; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
      <div class="container">
        <div class="head-txt text-center">
          <h2>Let's Discuss Your Project</h2>
          <p>Get free consultation and let us know your project idea to turn it into an amazing digital product.
          </p>
        </div>
        <div class="cta-wrap margin-t-50 justify-center">
          <div class="cta-btn">
            <a href="<?php echo site_url('/contact'); ?>" id="cta-09999">Contact Us
            <span class="arrow-wrap">
            <span class="arrow primera"></span>
            <span class="arrow segunda next"></span>
            <span class="arrow last"></span>
            </span>
            </a>
          </div>
        </div>
      </div>
    </section>

<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enabled'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-150 padding-b-150 <?php echo $faqs['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center"><?php echo $faqs['content']; ?></div>
		<?php 
		if( $faqs['faq'] ){
			echo '<div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">';
			$faqCount = 0;
			foreach ($faqs['faq'] as $row){ $faqCount++;
				$isActive = "";
				if( $faqCount <= 3 ){
					$isActive = "active";
				}
				echo '<div class="faq-accordion-item-outer '.$isActive.'" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<h3 class="faq-accordion-toggle" itemprop="name">'.$row['title'].'</h3>
					<div class="faq-accordion-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">'.$row['text'].'</div></div>
				</div>';
			}
			echo '</div>';
		} 
		?>
	</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>