<?php 
/* 
Template Name: Hire Page Template 
*/ 
global $post;
$thisPostID = $post->ID;
get_header(); 
$vcBtn = get_field('vc-cta', $thisPostID);
?>
<section class="second-level-section">
	<div class="container">
		<div class="breadcrumbs">
		<?php 
		$hasTechnology 	= get_field('vc-technology',$thisPostID);
		$thispTitle 	= ($hasTechnology && !empty($hasTechnology)) ? $hasTechnology :  get_the_title();
		if( is_page('hire-developers') ){
		echo '<a href="'.get_bloginfo('url').'">Home</a> Hire Software Developers';
		}else{
		echo '<a href="'.get_bloginfo('url').'">Home</a> <a href="'.site_url('/hire-developers').'">Hire Software Developers</a> '.$thispTitle; 
		}
		?>
		</div>
		<?php 
		$headingTxt = get_field( 'htop-area' ); 
		$bannerSec 	= get_field( 'banner_sec' );
		?>
		<div class="dis-flex">
        <div class="left-box flex-2 tick-icon-list">
            <div class="for-client-logo-box">
					<i></i>
					<i></i>
					<i></i>
					<i></i>
				</div>
			<h1><?php echo $headingTxt['top-heading']; ?></h1>
			<h2><?php echo $headingTxt['second-heading']; ?></h2>
			<?php 
	    	while( have_posts() ) : the_post();
				the_content();
		   	endwhile;
			?>
			
			</div>
			
			<div class="flex-2">
				
				<?php 
				$hasTrialClass 	= "";
				$isFreeTrial 	= get_field('hire_php_developers');
				$ftEnabled 		= $isFreeTrial['is_enabled'];
				if( $ftEnabled == "yes" ){
					$pocessType = ( isset( $isFreeTrial['hprocess-type'] ) && !empty( $isFreeTrial['hprocess-type'] ) ) ? 
					$isFreeTrial['hprocess-type'] : '';
					//$hasTrialClass = ( $pocessType == "free-trial" ) ? ' has-free-trial' : '';	
					if( $pocessType == "free-trial" ){
						//echo '<a href="#" class="has-free-trial"></a>';		
					}
				}
				?>
				<div class="form-right-box">
					<div class="head">
						<h3>Build Your Team</h3>
						<p>Guaranteed response within 8 business hours.</p>
						<!--
						<p>Request a quote or take a 2 week risk free trial<span class="open-free-trial"></span><br>
						Guaranteed response within 8 business hours.</p>
						-->
					</div>
					<div class="top-right-form-box">						
						<?php 
						$hireTech 	= get_field( 'vc-technology', $thisPostID );
						$btntxt 	= str_replace( 'Developers', 'Developer', $hireTech );
						if( $btntxt ){
							$hirebText = "Hire ".$btntxt;
						}else{
							$hirebText = "Hire Software Developers";
						}
						get_template_part( 'inc/hire', 'form', ['tpl' => 'hire', 'btn-text' => $hirebText ]); 
						?>
					</div>
				</div>				
			</div>
		</div>
	</div>		
</section>
<?php vcTrustedStartups(); ?>
<?php 
if(is_page('hire-developers')){
get_template_part('include/why','hire');
} 
?>

<?php  
$specifications = get_field('tech-spec');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
			<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
				echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
				<div class="box bg-blue-opacity-light">
					<span class="dot-icon dot-md"></span>
					<h3>'.$row['title'].'</h3>
					<p>'.$row['text'].'</p>
				</div>
				</div>';		
				}
			} 
			?>
		</div>
	</div>
</section>
<?php 
}
endif; ?>


<?php 
if( is_page('hire-developers') ) :
$tsection = get_field('tech-competency');
?>
<section id="load-tech-stack" class="technology-tab-section bg-dark-theme padding-t-150 padding-b-150">
<div class="container">	
	<div id="head-hptechnology" class="head-txt text-center is-active"><?php echo $tsection['content']; ?></div>
	<div id="head-hprole" class="head-txt text-center">
	<h2>Hire Indian Software Programmers For Your Requirements</h2>
	<p>Our remote Indian programmers excel in a wide range of technology solutions. Agencies, companies, ISVs, and SMEs prefer us to get dedicated software developers.</p>		
	</div>
	<div class="tab-contents no-js margin-t-100">
		<div class="tab-nav">
			<a href="javascript:void(0);" id="hptechnology" onclick="swapTabTechnology('hptechnology', 'hprole')" class="tab-link is-active">Technology</a>
			<a href="javascript:void(0);" id="hprole" onclick="swapTabTechnology('hprole', 'hptechnology')" class="tab-link">By Role</a>
		</div>
		<div id="content-hptechnology" class="tab-content is-active">
		<div id="tech-stack-bx" class="tech-stack-updated-section for-tech-icons">
		</div>
		</div>

		<div id="content-hprole" class="tab-content">
		<div class="three-column-icon-section">
					<div class="dis-flex col-box-outer">
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3>
								<a href="/software-consulting">Hire IT Consultants</a>
								</h3>
								<p>Hire IT consultants and engineers who help you overcome technical challenges and streamline project workflow better.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3>
								<a href="/hire-developers/hire-web-app-developers">Hire Web App Developers</a>
								</h3>
								<p>Hire software developers from us who excel in building robust, scalable, and secure web apps for your business.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/hire-developers/hire-app-developers">Hire App Developers</a></h3>
								<p>Hire Indian programmers from ValueCoders and build tailored native and hybrid mobile applications for your niche.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/hire-developers/hire-power-bi-developer-consultants">Hire BI Consultants</a></h3>
								<p>Hire an expert who can help analyze your business data to get valuable insights and display outputs on dashboards.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/hire-developers/hire-devops-developers">Hire Cloud Developers</a></h3>
								<p>Hire programmers online from us and build secure, scalable, and interactive cloud-based web and mobile applications.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/application-maintenance">Hire Maintenance Engineers</a></h3>
								<p>Our offshore software developers in India help you fully support and maintain your current software and keep it up to date.</p>
							</div>
						</div>


						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/big-data-application-development-services-company">Hire Big Data Experts</a></h3>
								<p>Hire a programmer who can use the latest technologies like Hadoop, Power BI, etc., to analyze & extract helpful information to develop different types of business solutions.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
							<span class="dot-icon dot-md"></span>
							<h3><a href="/hire-developers/hire-machine-learning-experts">Hire AI/ML Experts</a></h3>
							<p>Hire Indian developers to build AI-based software solutions and data-driven products for your business.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
							<span class="dot-icon dot-md"></span>
							<h3><a href="/hire-developers/hire-augmented-reality-developers">Hire AR/VR Expert</a></h3>
							<p>Hire software developers from ValueCoders and build AR/VR apps to enhance customer experience.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/hire-developers/hire-api-developers">Hire API Developers</a></h3>
								<p>Hire Indian software developers from us and get a skilled team of coders who can build secure and scalable APIs for your web and mobile applications.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/hire-developers/hire-ecommerce-developers">Hire eCommerce Developers</a></h3>
								<p>Hire software developers and programmers from us who have expertise in eCommerce technologies such as Magento, Opencart, Shopify, etc.</p>
							</div>
						</div>
						<div class="flex-3 box-3">
							<div class="box bg-blue-opacity-light">
								<span class="dot-icon dot-md"></span>
								<h3><a href="/hire-developers/hire-cms-developers">Hire CMS Developers</a></h3>
								<p>Hire software developers and programmers from us and get advanced and real-time web applications built on CMS platforms like WordPress, Drupal, etc.</p>
							</div>
						</div>
					</div>
				</div>	
		</div>
		

</div>
</div>
</section>
<?php endif; ?>	

<?php  
$expframeworks = get_field('php_frame_work_section');
if( $expframeworks ) :
$isfrEnable = $expframeworks['is_enable'];
if( $isfrEnable == "yes" ) {
$sectionType = $expframeworks['section_type'];
if( $sectionType == "framework" ) {	
?>
<section id="load-tech-stack" class="link-three-column-section <?php echo $expframeworks['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $expframeworks['content']; ?>
		</div>
		<div id="tech-stack-bx" class="dis-flex col-box-outer php-frameworks-icons"></div>
	</div>
</section>
<?php 
}else{ 
$techno = $expframeworks['techno'];
if( $techno ) : ?>
<section id="load-tech-stack" class="technologies-right-logo-section <?php echo $expframeworks['sc_background']; ?> padding-t-150 padding-b-150 no-icon-updated">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $expframeworks['content']; ?>
		</div>
		<div id="tech-stack-bx-NA" class="margin-t-80">
			<?php 
			$rowCount = 0;
			foreach( $techno as $mrow ){
			echo '<div class="dis-flex tech-box-outer items-center">';
			echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
			if( $mrow ){
			$rowCount++;
			$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
			echo '<div class="right-box for-max-six-icon dis-flex '.$isFirst.'">';
			//echo '<span class="tech-box">';
			echo $mrow['tech-listing'];
			//echo '</span>';
			/*
			foreach( $mrow['in_technologies'] as $row ){
			echo '<span class="tech-box">';
			echo '<span class="tech-txt">'.$row['title'].'</span></span>';	
			}
			*/
			echo '</div>';
			}
			echo '</div>';	
			}
			?>
		</div>
	</div>
</section>
<?php endif;
}

} 
endif; 
?>
<!--Technology / Framework Section Ends Here-->

<section class="experts-talk-first-section bg-blue-linear padding-t-150 padding-b-150">
    <div class="container">
        <div class="head-txt text-center">
			<h2>
			<?php 
			echo (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : 
			"Let's Discuss Your Project"; ?>
			</h2>
			<p>
			<?php 
			echo (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : 
			"Get free consultation and let us know your project idea to turn it into an amazing digital product."; ?></p>
		</div>
		<div class="text-center margin-t-50">
        <a class="green-btn" href="<?php echo site_url('/contact'); ?>">
        <?php 
		echo (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
			"Talk To Our Experts"; 
		?><i class="arrow-icon"></i>
		</a>
        </div>
	</div>
</section>
<?php  
$whyChoos = get_field('why-choose');
if( $whyChoos ) :
$isWhyEnable = $whyChoos['is_enable'];
if( $isWhyEnable == "yes" ) {
?>
<section class="three-column-icon-section <?php echo $whyChoos['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $whyChoos['content']; ?>
		</div>
		<?php if( $whyChoos['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $whyChoos['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3 <?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
				<div class="box bg-blue-opacity-light">
					<?php 
					$wicon 	= $row['icon'];
					$wiconwp = $row['icon-webp'];
					if( $wicon && $wiconwp ){
					echo '<picture class="dark-theme-img">
					<source type="image/webp" srcset="'.$wiconwp['url'].'">
					<source type="'.$wicon['mime_type'].'" srcset="'.$wicon['url'].'">
					<img loading="lazy" src="'.$wicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wicon['width'].'" 
					height="'.$wicon['height'].'"> 
					</picture>';
					}


					$wlicon 	= $row['icon-lt'];
					$wliconwp 	= $row['icon-lt-webp'];
					if( $wlicon && $wliconwp ){
					echo '<picture class="lighter-theme-img">
					<source type="image/webp" srcset="'.$wlicon['url'].'">
					<source type="'.$wlicon['mime_type'].'" srcset="'.$wlicon['url'].'">
					<img loading="lazy" src="'.$wlicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wlicon['width'].'" height="'.$wlicon['height'].'"> 
					</picture>';
					}
					?>
					<h3><?php echo $row['title']; ?></h3>
					<p><?php echo $row['text']; ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<!-- 
		<div class="text-center margin-t-100">
			<?php //vc_cta(); ?>
		</div> 
		-->
	</div>
</section>
<?php 
}
endif; ?>
<!-- Why Opt. technology -->

<?php
if( !is_page( 'hire-developers' ) ) :
$whyhire = get_field('why_hire_section_php');
if( $whyhire ) :
$iswEnabled = $whyhire['is_enable'];
if( $iswEnabled == "yes" ){	
?>
<section class="icon-with-img-section with-top-head <?php echo $whyhire['sc_background']; ?> padding-t-150 padding-b-150" 
	id="why-hire-sec">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $whyhire['content']; ?>
		</div>
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-2">
				
				<?php if( $whyhire['options'] ) : ?>
				<div class="dis-flex hire-php-icon icon-box-outer">
					<div class="flex-2 margin-t-50">
						<div class="flex-3 box-3">
							<div class="dis-flex items-center" style="margin-left:5px;">
								
								<picture style="margin-right:20px;">
								<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/why-wsicon.webp">
								<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/dev-img/why-wsicon.png">
								<img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/why-wsicon.png" alt="Workstatus" width="58" height="59">
								</picture>
								<span class="icon-txt">Validated Timesheet Proof on <a href="https://www.workstatus.io/" style="color:#656565;	">Workstatus<sup>TM</sup></a></span>
								
							</div>
						</div>
					</div>
				<?php 
		    	$whcount = 0;
		    	foreach( $whyhire['options'] as $row ) : $whcount++; ?>
					<div class="flex-2 margin-t-50">
						<div class="flex-3 box-3<?php echo vcHasAnchor($row['title']); ?>">
							<div class="dis-flex items-center">
								<?php 
								$wyicon 	= $row['icon'];
								$wyiconWp 	= $row['icon-wp'];
								if( $wyicon && $wyiconWp ){
								echo '<picture>
								<source type="'.$wyiconWp['mime_type'].'" srcset="'.$wyiconWp['url'].'">
								<source type="'.$wyicon['mime_type'].'" srcset="'.$wyicon['url'].'">
								<img loading="lazy" src="'.$wyicon['url'].'" alt="Valuecoders" width="'.$wyicon['width'].'" height="'.$wyicon['height'].'"> 
								</picture>';
								}else{
									echo '<span class="icon icon'.$whcount.'"></span>';
								}
								?>
								<span class="icon-txt">
									<?php echo $row['title']; ?>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php dynamic_sidebar('vc-profile'); ?>
				<?php endif; ?>
			</div>
			<div class="flex-2 text-right right-box od-row">
				<?php //if(!wp_is_mobile()) : ?>
				<picture>
					<source type="<?php echo $whyhire['section_image_webp_format']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['section_image_webp_format']['url']; ?>">
					<source type="<?php echo $whyhire['image']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['image']['url']; ?>">
					<img loading="lazy" src="<?php echo $whyhire['image']['url']; ?>" alt="Valuecoders" 
					width="<?php echo $whyhire['image']['width']; ?>" height="<?php echo $whyhire['image']['height']; ?>">
				</picture>
				<?php //endif; ?>
			</div>
		</div>
	</div>
</section>
<?php 
}
endif; 
endif; 
?>
<!-- WHy Hire Developer From VC -->

<?php 
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
$dtImage 		= $clientele['image'];
$dtImageWebp	= $clientele['image-webp'];

$ltImage 		= $clientele['image-lt'];
$ltImageWebp	= $clientele['image-lt-webp'];
?>
<section class="client-img-section padding-b-150 <?php echo $clientele['sc_background']; ?>">
	<div class="container">
		<div class="dis-flex col-box-outer items-center od-row">
		<?php if( !wp_is_mobile() ) : ?>
			<div class="flex-2 left-box">
				<?php 
				if( $dtImage && $dtImageWebp ) {
					echo '<picture class="dark-theme-img">
					<source type="'.$dtImageWebp['mime_type'].'" srcset="'.$dtImageWebp['url'].'">
					<source type="'.$dtImage['mime_type'].'" srcset="'.$dtImage['url'].'">
					<img loading="lazy" src="'.$dtImage['url'].'" alt="Valuecoders" width="'.$dtImage['width'].'" height="'.$dtImage['height'].'"> 
				</picture>';	
				}

				if( $ltImage && $ltImageWebp ) {
					echo '<picture class="lighter-theme-img">
					<source type="'.$ltImageWebp['mime_type'].'" srcset="'.$ltImageWebp['url'].'">
					<source type="'.$ltImage['mime_type'].'" srcset="'.$ltImage['url'].'">
					<img loading="lazy" src="'.$ltImage['url'].'" alt="Valuecoders" width="'.$ltImage['width'].'" 
					height="'.$ltImage['height'].'"> 
				</picture>';	
				}

				?>
			</div>
			<?php endif; ?>
			<div class="flex-2 right-box tick-icon-list"><?php echo $clientele['content']; ?></div>
		</div>
		<!-- 
		<div class="text-center margin-t-100">
			<?php //vc_cta(); ?>
		</div> 
		-->
	</div>
</section>
<?php endif; ?>
<!-- ValueCoder clientele #Ends Here -->

<?php 
$compAnalysis 	= get_field( 'comparative_analysis_section' );
$compSecEnable 	= $compAnalysis['is_enabled'];
if( $compSecEnable == "yes" ) :
?>
<section class="table-list-section <?php echo $compAnalysis['sc_background']; ?> padding-t-150 padding-b-150">
<?php if( have_rows('comparative_analysis_section') ): ?>
	<?php 
	while( have_rows('comparative_analysis_section') ): the_row(); 
	$tablesectitle 	= get_sub_field('section_title_comparative_analysis');
	$tablesecdes 	= get_sub_field('section_description_comparative_analysis');
	?>
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $tablesectitle; ?></h2>
			<p><?php echo $tablesecdes; ?></p>
		</div>
		<?php if( have_rows('table_section_comparative_analysis') ): ?>
		<div class="dis-flex col-box-outer margin-t-100">
		<?php 
		$a = 1; 
		while( have_rows('table_section_comparative_analysis') ): the_row();  ?>
		<div <?php if ($a == 2) {?> class="flex-4 table-list bg-row-yellow"<?php } else { ?> class="flex-4 table-list"<?php } ?>> 
		<?php if( have_rows('table_item_comparative_analysis') ):   ?>
		<ul>
		<?php $i = 0; while( have_rows('table_item_comparative_analysis') ): the_row();   ?>
		<li class=" <?php echo ( ($i == 0) && ( $a !== 2 )) ? " title clr-white" : ""; ?> <?php echo ( ($i == 0) && ( $a !== 1 )) ? " title" : ""; ?>">
		<?php the_sub_field('sub_item_text_comparative_analysis'); ?></li>
		<?php $i++; endwhile;  ?>
		</ul>
		<?php endif; ?>
				
			</div>
			<?php $a++; endwhile; ?>

		</div>
		<?php endif; ?>
	</div>
	<?php endwhile; ?>
<?php endif; ?>
</section>
<?php endif; ?>
<!-- Comparison Table Ends Here -->

<?php 
/*
$hireProcessSec = get_field('hire_php_developers');
$hpEnabled 		= $hireProcessSec['is_enabled'];
if( $hpEnabled == "yes" ) :
?>
<section class="step-icon-img-section <?php echo $hireProcessSec['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<?php 
		if( have_rows('hire_php_developers') ): 
		while( have_rows('hire_php_developers') ): the_row(); 
		$txttitle = get_sub_field('title');
		$txtcontents = get_sub_field('content');
        ?>
		<div class="head-txt text-center">
			<h2><?php echo $txttitle; ?></h2>
			<p><?php echo $txtcontents; ?></p>
		</div>
		<?php 
		endwhile;
		endif;

		$hireingProcess = get_field( 'hiring_process_steps', 'option' );
		if( $hireingProcess ) : ?>
		<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
			<?php 
			$c = 1; 
			foreach( $hireingProcess as $row ) :
        	?>
			<div class="flex-5 icon-box <?php if($c == 5) { echo 'final-step'; } ?> ">
				<i class="icon icon<?php echo $c; ?>"></i>
				<h3><?php echo $row['step_title']; ?></h3>
				<p><?php echo $row['step_description']; ?></p>
			</div>
			<?php $c++; ?>
			<?php endforeach;  ?>
		</div>
		<?php endif; ?>

		<?php 
		$hpImageDark 		= get_field('hiring_process_image__dark_theme_', 'option');
		$hpImageDarkWebp 	= get_field('hiring_process_image_dark_theme_webp', 'option'); 

		$hpImageLight 		= get_field('hiring_process_image__light_theme', 'option');
		$hpImageLightWebp 	= get_field('hiring_process_image_light_theme_webp', 'option'); 
		if( $hpImageDark && $hpImageDarkWebp ) :
		?>
		<picture class="dark-theme-img">
			<source type="<?php echo $hpImageDarkWebp['mime_type']; ?>" srcset="<?php echo $hpImageDarkWebp['url']; ?>">
			<source type="<?php echo $hpImageDark['mime_type']; ?>" srcset="<?php echo $hpImageDark['url']; ?>">
			<img loading="lazy" src="<?php echo $hpImageDark['url']; ?>" alt="Valuecoders"
			width="<?php echo $hpImageDark['width']; ?>" height="<?php echo $hpImageDark['height']; ?>">
		</picture>
		<?php endif;

		if( $hpImageLight && $hpImageLightWebp ) : ?>
		<picture class="lighter-theme-img">
			<source type="<?php echo $hpImageLightWebp['mime_type']; ?>" srcset="<?php echo $hpImageLightWebp['url']; ?>">
			<source type="<?php echo $hpImageLight['mime_type']; ?>" srcset="<?php echo $hpImageLight['url']; ?>">
			<img loading="lazy" src="<?php echo $hpImageLight['url']; ?>" alt="Valuecoders"
			width="<?php echo $hpImageLight['width']; ?>" height="<?php echo $hpImageLight['height']; ?>">
		</picture>
		<?php endif; ?>

		<div class="dis-flex justify-center hiring-step-sprite">
			<?php 
			$hireFinalStep = get_field( 'hiring_process_final_step', 'option' );
			if( $hireFinalStep ) :
			?>
			<div class="flex-4 icon-box text-center not-step">
			<i class="icon icon6"></i>
			<h3><?php echo $hireFinalStep['step_title']; ?></h3>
			<p><?php echo $hireFinalStep['step_description']; ?></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; 
*/
?>
<!-- #Hire Process Ends Here -->

<?php 
/*
$hireProcessSec = get_field('hire_php_developers');
$hpEnabled 		= $hireProcessSec['is_enabled'];
if( $hpEnabled == "yes" ) :
$pocessType = ( isset( $hireProcessSec['hprocess-type'] ) && !empty( $hireProcessSec['hprocess-type'] ) ) ? $hireProcessSec['hprocess-type'] : '';
?>
<section class="step-icon-img-section <?php echo $hireProcessSec['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<!-- 
		<div class="head-txt text-center">
			<h2><?php //echo $hireProcessSec['title']; ?></h2>
			<p><?php //echo $hireProcessSec['content']; ?></p>
		</div> 
		-->

		<?php if( $pocessType == "free-trial" ){ ?>
		<div class="head-txt text-center">
		<h2>How Does Our 2-Week Trial Work? <span class="open-free-trial"></span></h2>
		<p>We offer a 2 week no-obligation trial   to try the engineer(s) and ensure mutual fitment before adding to your team. If you like the services, you can pay for the time and continue on! Simple and transparent, isn't it?</p>
		</div>
		<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
			<div class="flex-4 icon-box">
				<i class="icon icon1"></i>
				<h3>Inquiry</h3>
				<p>We get on a call to understand your requirements and evaluate mutual fitment</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon2"></i>
				<h3>Align engineer(s)</h3>
				<p>We align engineer(s) and initiate the development process</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon4"></i>
				<h3>Trial Phase</h3>
				<p>The engineer(s) work on your project and we seek ongoing feedback</p>
			</div>
			<div class="flex-4 icon-box final-step">
				<i class="icon icon5"></i>
				<h3>Add engineer(s) to your team</h3>
				<p>Based on the trial phase, you add the engineer(s) to your team</p>
			</div>
		</div>
		<?php if( !wp_is_mobile() ) : ?>		
		<picture class="dark-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img2.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img2.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img2.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<picture class="lighter-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter2.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter2.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter2.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<?php endif; ?>
		<div class="dis-flex justify-center hiring-step-sprite">
			<div class="flex-4 icon-box text-center not-step">
				<i class="icon icon6"></i>
				<h3>Not Satisfied</h3>
				<p>If you are not satisfied with the engineer, we are happy to understand the gap(s) and replace the engineer(s)</p>
			</div>
		</div>
		<?php }else{ ?>
		<div class="head-txt text-center">
			<h2>Our Hiring Process</h2>
			<p>We believe in 100% transparency and customer delight. You may choose to screen the candidates or take a no obligation 2-week trial before hiring PHP developers with us. </p>
		</div>
		<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
			<div class="flex-4 icon-box">
				<i class="icon icon1"></i>
				<h3>Inquiry</h3>
				<p>Tell us in brief about your ideas and needs. Don't worry it's secure and confidential</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon2"></i>
				<h3>Select CV</h3>
				<p>Shortlist candidates which best fit in your needs by viewing their CVs</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon3"></i>
				<h3>Assessment</h3>
				<p>Optionally, assess candidates over a phone or video call</p>
			</div>
			<div class="flex-4 icon-box final-step">
				<i class="icon icon5"></i>
				<h3>Add resource in your team</h3>
				<p>If you like the resource(s), pay for the trial time and onboard resource(s)</p>
			</div>
		</div>
		<?php if( !wp_is_mobile() ) : ?>
		<picture class="dark-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<picture class="lighter-theme-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/our-hiring-process-img-for-lighter.png" alt="Valuecoders" width="1620" height="315"> 
		</picture>
		<?php endif; ?>
		<div class="dis-flex justify-center hiring-step-sprite">
			<div class="flex-4 icon-box text-center not-step">
				<i class="icon icon6"></i>
				<h3>Not Satisfied</h3>
				<p>If you are not satisfied with the resource, restart the process with new resources</p>
			</div>
		</div>	
		<?php } ?>
		<div class="text-center margin-t-70">
			<?php vc_cta(); ?>
		</div>
	</div>
</section>
<?php endif; 
*/
?>

<section class="experts-talk-second-section bg-blue-linear padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
			<h2>
			<?php 
			echo (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : 
			"Have any questions?"; ?>				
			</h2>
			<p>
			<?php 
			echo (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : 
			"Our managers will consult you about choosing a web-based solution for your needs."; 
			?>
			</p>
			</div>
			<div class="text-center margin-t-50">
            <a class="green-btn" href="<?php echo site_url('/contact'); ?>">
			<?php 
			echo (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : 
			"Talk To Our Experts"; 
			?> <i class="arrow-icon"></i>
			</a>
            </div>
		</div>
</section>

<?php 
$hireProcessSec = get_field('hire_php_developers');
$hpEnabled 		= $hireProcessSec['is_enabled'];
if( $hpEnabled == "yes" ) :
$pocessType = ( isset( $hireProcessSec['hprocess-type'] ) && !empty( $hireProcessSec['hprocess-type'] ) ) ? $hireProcessSec['hprocess-type'] : '';

/*$hpTitle = (isset($hireProcessSec['title']) && !empty($hireProcessSec['title'])) ? $hireProcessSec['title'] : 'How does our 2-week trial work?';
$hpText = (isset($hireProcessSec['content']) && !empty($hireProcessSec['content'])) ? $hireProcessSec['content'] : 'We offer a 2 week no-obligation trial to try the engineer(s) and ensure mutual fitment before adding to your team. If you like the services, you can pay for the time and continue on! Simple and transparent, isn\'t it?';
*/

$hpTitle 	= "Our Hiring Process";
$hpText 	= "Take a look at our simple and straightforward process to hire software developers from ValueCoders.";

$devText 	= get_field( 'vc-technology', $thisPostID );
//$hBody  	= 'We align developer(s) and initiate the process.';
$hBody  	= 'Hire best software developers from our in-house tech pool. Interview & shortlist candidates to quickly find the perfect fit for your team.';
if( $devText ){
$devText 	= $devText;
/*
if( $thisPostID == 6431 ){
$hBody 		= 'Hire best '.$btntxt.' from our in-house tech pool. Interview & shortlist candidates to quickly find the perfect fit for your team.';
}else{
$hBody 		= 'We give you access to 100+ skilled '.$btntxt.'. Take personal interviews and select the best candidate for your team.';
}
*/
if( $thisPostID == 6431 ){
$hBody = "Hire best software developers from our in-house tech pool. Interview & shortlist candidates to quickly find the perfect fit for your team.";
}else{
$hBody 		= 'Hire best '.$devText.' from our in-house tech pool. Interview & shortlist candidates to quickly find the perfect fit for your team.';	
}

}else{
	$devText = "Software Developers";
}
?>
<section id="vc-hprocess" class="four-step-with-icon-section <?php echo $hireProcessSec['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $hpTitle; ?></h2>
			<p><?php echo $hpText; ?></p>
		</div>
		<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
			<div class="flex-4 icon-box">
				<i class="icon icon1 vlazy"></i>
				<h3>Inquiry</h3>
				<p>We get on a call to understand your requirements and evaluate mutual fitment.</p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon2 vlazy"></i>
				<h3><?php echo "Select ".$devText; ?></h3>
				<p><?php echo $hBody; ?></p>
			</div>
			<div class="flex-4 icon-box">
				<i class="icon icon4 vlazy"></i>
				<h3>Team Integration</h3>
				<p>Our developers are now a part of your team. Assign tasks and receive daily updates for seamless collaboration and accountability.</p>
			</div>
			<div class="flex-4 icon-box final-step">
				<i class="icon icon5 vlazy"></i>
				<h3>Team Scaling</h3>
				<p>We give you the flexibility to scale your team, be expanding or reducing team size.</p>
			</div>
		</div>

	</div>
</section>
<?php endif; ?>

<?php 
/*
$developers = get_field('developers-group');
$devEnabled = $developers['is_enabled'];
if( $devEnabled == 'yes' ) :
?>
<section class="blog-column-section padding-t-150 <?php echo $developers['sc_background']; ?> padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $developers['content']; ?>
		</div>
		<div class="dis-flex margin-t-100 php-brains-sprite">
			<?php 
			if($developers['developers-profile']) : 
			$p = 0;	
			foreach( $developers['developers-profile'] as $row ) : $p++;
			?>
			<div class="flex-3 profile-blok-outer">
				<div class="profile-blocks bg-light-theme">
					<div class="profile-blocks-inner">
						<span class="bg-blue">
							<?php echo $row['profile']; ?>
						</span>
						<div class="profile-des-outer dis-flex">
							<i class="pofile-pic profile<?php echo $p; ?>"></i>
							<div class="profile-des">
								<h3><?php echo $row['name']; ?></h3>
								<span class="exp"><i class="icon icon1"></i>
								<?php echo $row['experience']; ?>
								</span>
								<span class="loc"><i class="icon icon2"></i>
								<?php echo $row['location']; ?>
								</span>
								<span class="project"><i class="icon icon3"></i>
								<?php echo $row['projects']; ?>
								</span>
							</div>
						</div>
						<p>
							<?php echo $row['description']; ?>
						</p>
						<?php 
						if( $row['tags'] ){
							echo '<div class="tags-outer">';
							$tags = explode(",", $row['tags']);
							foreach($tags as $tag){
								echo '<a href="#">'.$tag.'</a>';
							}
							echo '</div>';
						} 
						?>
					</div>
				</div>
			</div>
			<?php 
			endforeach;
			endif; 
			?>
		</div>
		<div class="text-center margin-t-100">
			<a class="green-btn" href="<?php echo vc_calendly_link( $thisPostID ); ?>">Book an Appointment <i class="arrow-icon"></i></a>
			<span class="form-link-outer">
				Or, <button onclick="focusFunction()" class="form-link clr-white">Use this form to share your
					requirements.</button> <span class="block">Get guaranteed response within 8 Hrs</span>
			</span>
		</div>
	</div>
</section>
<?php endif; */ ?>
<!-- Developer Sections Ends Here -->

<?php
$developers = get_field('developers-group');
$devEnabled = $developers['is_enabled'];
if( ($devEnabled == 'yes') && ( !is_page('hire-developers') ) ) :
?>
<section class="sample-profile-no-img-section padding-t-150 padding-b-150 <?php echo $developers['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $developers['content']; ?>
		</div>
		<div class="dis-flex justify-center sample-block-outer">
			<?php 
			if($developers['developers-profile']) : 
			$p = 0;	
			$inTech = get_field('vc-technology',$thisPostID);
			foreach( $developers['developers-profile'] as $row ) : 
			$p++;			
			?>
			<div class="flex-3">
				<div class="sample-block bg-voilet">
					<?php 
					if( $p == 1 ){
						echo '<h3>Junior '.str_replace( 'Developers', 'Developer', $inTech ).'</h3>';
					}
					if( $p == 2 ){
						echo '<h3>Mid Level '.str_replace( 'Developers', 'Developer', $inTech ).'</h3>';
					}
					if( $p == 3 ){
						echo '<h3>Senior  Level '.str_replace( 'Developers', 'Developer', $inTech ).'</h3>';
					}

					if( $row['pricing'] ){
						echo '<h4 class="clr-white">'.$row['pricing'].'</h4>';
					}
					
					if( $row['experience'] ){
						echo '<h5 class="clr-white">'.$row['experience'].'</h5>';
					} 
					?>
				</div>
			</div>
			<?php /* ?>
			<div class="flex-3 profile-blok-outer">
				<div class="profile-blocks bg-light-theme">
					<div class="profile-des-outer dis-flex">
					<picture>
					<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/sample-profile-<?php echo $p; ?>.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/sample-profile-<?php echo $p; ?>.png">
					<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/sample-profile-<?php echo $p; ?>.png" alt="Valuecoders" width="82" height="82">
					</picture>
						<div class="profile-title">
							<h3>Sample Profile</h3>
							<span class="bg-blue"><?php echo $row['profile']; ?></span>
						</div>
					</div>
					<div class="profile-des">
						<ul>
							<li>Experience: <?php echo $row['experience']; ?></li>
							<li>Location: India<?php //echo $row['location']; ?></li>
							<li>Cost: <?php echo $row['Cost']; ?></li>
						</ul>
					</div>
					<a href="#" class="view-sample">View Sample Profile</a>
				</div>
			</div><?php */ ?>
			<?php 
			
			endforeach; 
			endif;
			?>
		</div>
		<!-- 
		<div class="text-center margin-t-100">
			<?php //vc_cta(); ?>
		</div> 
		-->
	</div>
</section>
<?php endif;  ?>



<?php 
$guideTopics 	= get_field('guide-topics');
$gtEnabled 		= $guideTopics['is_enabled'];
if( $gtEnabled == 'yes' ) :
?>
<section id="has-ug" class="tab-scroll-section padding-t-150 padding-b-150 <?php echo $guideTopics['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $guideTopics['content']; ?>
		</div>
		<?php 
		$topics = $guideTopics['topics'];
		if( $topics ) :
		?>
		<div id="scroll-box" class="dis-flex margin-t-100 tab-contents">
			<div class="left-tabs" id="left-scroll">
				<div class="sticky-tab">
				<span class="tab-head clr-white">Guide Topics</span>
				<div class="tab-nav">
					<?php 
					$tn = 0;
					foreach( $topics as $topicNav ){
						$tn++;
						$isActive = "";
						if( $tn == 1 ){
							$isActive = "is-active";
						}
						echo '<a href="#ug'.$tn.'" class="tab-link">'.$topicNav['title'].'</a>';
					} 
					?>
				</div>
				</div>
			</div>
			<div class="right-tabs" id="right-scroll">
				<?php 
				$tn = 0;
				foreach( $topics as $topicText ){
					$tn++;
					$isActive = "";
					if( $tn == 1 ){
						$isActive = "is-active";
					}
					echo '<div class="tab-content" id="ug'.$tn.'">'.$topicText['text'].'</div>';
				} 
				?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php 
if(is_page(14230)) : ?>
<section class="steps-of-hiring-shadow-specialist-section padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
                <h2>Steps Of Hiring Shadow Specialists In India</h2>
                <p>We follow a simple hiring process for shadow development specialists, as mentioned here:</p>
            </div>

            <div class="dis-flex col-box-outer margin-t-100">
                <div class="flex-2 left-box">
                    <div class="list-box-outer">
                        <div class="head-box bg-voilet">
                            <h3>Our resource management team identifies suitable engineers based on
                                project technology and domain identification. </h3>
                        </div>
                        <div class="list-box">
                            <p>We deploy Shadow engineer(s) for a project, first as a standby option, and later on, we
                                include them in the project as per the need to scale or if a core engineer steps out for
                                any reason. We do this at no additional cost to you and ensure to familiarize our shadow
                                engineers with:</p>
                            <ul>
                                <li>Poor Project Management</li>
                                <li>Longer Turnaround For Onboarding</li>
                                <li>Difference In Timezone</li>
                                <li>Nightmarish Coordination</li>
                                <li>Miscommunication Due To Language And Cultural Barriers</li>
                                <li>Delayed Delivery</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flex-2 last-box">
                    <div class="list-box-outer image-box">
                        <div class="head-box bg-voilet">
                            <h3>The project lead/tech manager/developer identifies the modules where the shadow engineer
                                can be aligned.</h3>
                        </div>
                        <div class="list-box">
                            <div class="right-box-outer">
                                <div class="col-box-outer">
                                    <div class="number-box">1</div>
                                    <div class="text-box"><p>The project objectives.</p>
                                    </div>
                                </div>
                                <div class="col-box-outer">
                                    <div class="number-box">2</div>
                                    <div class="text-box"><p>The coding standards technologies being used.</p>
                                    </div>
                                </div>
                                <div class="col-box-outer">
                                    <div class="number-box">3</div>
                                    <div class="text-box"><p>The tasks assigned &amp; the status of ongoing tasks.</p>
                                    </div>
                                </div>
                                <div class="col-box-outer">
                                    <div class="number-box">4</div>
                                    <div class="text-box"><p>The milestones targeted, and the delivery schedule.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>
<?php endif; ?>
<?php 
$blogSec = get_field('bposts');
if( $blogSec ){
	if( isset( $blogSec['is_enabled'] ) && ($blogSec['is_enabled'] == "yes") ){
		$bTheme = ( isset($blogSec['sc_background']) && !empty( $blogSec['sc_background'] ) ) ? $blogSec['sc_background'] 
		: 'bg-dark-theme';
		$tagSlug = ( isset($blogSec['tag-pslug']) && !empty( $blogSec['tag-pslug'] ) ) ? $blogSec['tag-pslug'] : '';
		vcShowLatestPosts($bTheme, $tagSlug );
	}
} 
?>

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

<?php 
$ctOptions = get_field('client-testimo');
if( $ctOptions['is_enabled'] == 'yes' ) :
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );
?>
<section class="client-video-section padding-t-150 padding-b-150 <?php //echo $ctOptions['sc_background']; ?>">
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
<?php endif; ?>
<!-- Testimonail Section Ends Here -->
<div class="free-trail-pop-up">
	<div class="pop-up-inner">
		<span class="pop-close"></span>
		<div class="pop-up-box">
			<h2>2 Weeks Risk-Free Trial</h2>
			<p>We offer a 2 weeks risk-free trial for you to try out the resource(s) before onboarding. After 2 weeks, if you like the resource(s), you pay for the time and continue on. Else, we replace the aligned resource(s) or cancel the trial as per your wish.</p>
			<p>Simple, transparent and easy - isn't it?</p>
			<a class="green-btn" href="<?php echo site_url('/contact'); ?>">Start my 2 week risk-free trial now!</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>
