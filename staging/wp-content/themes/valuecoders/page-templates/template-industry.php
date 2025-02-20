<?php 
/* 
Template Name: Industry Page Template 
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
$bannerImage = get_field('tb-image');
$bannerStyle = '';
if( $bannerImage ){
	$banImage 		= getVcWebpSrcURL( $bannerImage );
	$bannerStyle 	= ' style="background-image:url('.$banImage.');"';
}

$bcTitle 			= get_field('bc-title');
$bcCategory 	= get_field('bc-vcategory');
$bCat 				= ( $bcCategory === "services" ) ? "Services" : "Industries";
if( $bcTitle ){
	$bct = $bcTitle;
}else{
	$bct = get_the_title();	
}

if( $bcCategory === "custom" ){
	//bc-custitle //bc-cuslink
	$cuTitle 	= get_field('bc-custitle');
	$cuLink 	= get_field('bc-cuslink');
	$bCat 		= '<a class="no-after" href="'.vc_siteurl($cuLink).'">'.$cuTitle.'</a>';
}

$vcBtn = get_field('vc-cta', $thisPostID);
?>
<section class="hero-img-section vlazy" <?php echo $bannerStyle; ?>>
	<div class="container">
		<div class="content-wrap">
		<div class="breadcrumbs">
			<a href="<?php bloginfo('url'); ?>">Home</a> <span><?php echo $bCat; ?></span> <?php echo $bct; ?>
		</div>	
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="for-client-logo-box dis-flex">
		  <div class="logo-box logo1 vlazy"></div>
		  <div class="logo-box logo2 vlazy"></div>
		  <div class="logo-box logo3 vlazy"></div>
		  <div class="logo-box logo4 vlazy"></div>
		</div>
	</div>
</section>

<?php get_template_part('inc/cmn', 'startups'); ?>

<?php if( is_page(1087) ){ //ISV page 
/*
?>
<section class="three-column-icon-section padding-t-120 padding-b-120" id="acf-isvpage">
  <div class="container">
    <div class="dis-flex top-content half-list">
		<?php 
		while( have_posts() ) : the_post();
		the_content();
		endwhile;
		?>
    </div>
  </div>
</section>
<?php 
*/
}else{
$tabSec 	= get_field('tab_section');	
$tabType 	= ( isset( $tabSec['tab-display'] ) && ($tabSec['tab-display'] == "grid") )	? 'grid' : 'accordion';

if( $tabType == "accordion" ) {
?>
<section class="accordion-section padding-t-120" id="acf-tab-section">
	<div class="dis-flex accordian-row">
	<div class="col-left">
	  <div class="head-txt">
	    <?php 
		while( have_posts() ) : the_post();
			the_content();
		endwhile;
		?>
	  </div>
	  <div class="image-wrap">
		<?php 
		$conImage = get_field('con-image');
		if( $conImage && is_array($conImage) ){
		echo vc_pictureElm( $conImage, 'ValueCoders', 'soft-img' );
		}else{ 
		?>
		<picture class="soft-img">
		<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/industry-image.webp">
		<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/industry-image.png">
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/industry-image.png" width="674" 
		height="585" alt="valuecoders">
		</picture>
		
		<?php } ?>
		</div>

	</div>
	<div class="col-right padding-b-120">
	<?php 
	if( $tabSec['is_enabled'] == "yes" ) :
	$tabLoop 	= $tabSec['tab-loop'];
	$p = 0;
	foreach( $tabLoop as $loop ){ $p++;
	$hasAnchor 	= (isset($loop['link']) && !empty($loop['link']) && ($loop['link'] !== "#")) ? 'has-link' : '';	
	$title    	= (isset($loop['link']) && !empty($loop['link']) && ($loop['link'] !== "#")) ? '<a href="'.vc_siteurl($loop['link']).'">'.$loop['title'].'</a>' : '';
	?>  
	<div class="accordionItem <?php echo ( $p == 1 ) ? 'active' : ''; ?>">
	<h3 class="accordion-toggle <?php echo $hasAnchor; ?>">
	<span><?php echo $loop['title']; ?></span><?php echo $title; ?>
	</h3>
	<div class="accordion-content">
		<?php //echo $loop['content']; ?>			
		<?php echo preg_replace("/<h([1-3]{1})>.*?<\/h\\1>/si", '', $loop['content']); ?>
	</div>
	</div>
	<?php 
	}
	endif; ?>
	</div>
	</div>
</section>
<?php 
}else{ 
$htContent 	= $tabSec['content'];
$headText 	= fnextractHeadins('h2', $htContent );
$tabLoop 		= $tabSec['tab-loop'];		
?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $tabSec['sc_background']; ?>" id="acf-tab-grid">
	<div class="container">
		<div class="dis-flex top-content">
          <div class="flex-2"><?php echo $headText; ?></div>
          <div class="flex-2">
            <?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
          </div>
        </div>
		<div class="dis-flex col-box-outer margin-t-50">
			<?php 
			if( $tabLoop ){
				foreach( $tabLoop as $row ){
				$haslink = ( isset($row['link']) && !empty($row['link']) ) ? ' has-vlink' : '';	
				$title = ( isset($row['link']) && !empty($row['link']) ) ? '<h3><a href="'.$row['link'].'">'.$row['title'].'</a></h3>' : 
				'<h3>'.$row['title'].'</h3>';
				
				echo '<div class="flex-3 box-3 '.$haslink.'">
				<div class="box bg-blue-opacity-light">'.$title.$row['content'].'</div>
			</div>';		
			}
			} 
			?>
		</div>
	</div>
</section>
<?php } 
}
?>
<?php 
if( !is_page(1087) ){ 
$eOneHeading  = (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : "Let's Discuss Your Project";
$eOneBody     = (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : "Get free consultation and let us know your project idea to turn it into an amazing digital product.";
$eOnelt = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
"Book a Free Consultation"; 
$eCtaOne = '<h2>'.$eOneHeading.'</h2>';
$eCtaOne .= '<p>'.$eOneBody.'</p>';
echo expert_talk_cta( $eCtaOne, $eOnelt );	
} 
?>

<?php  
$solutions = get_field('solutions');
if( $solutions ) :
$isEnable = $solutions['is_enabled'];
if( $isEnable == "yes" ){
$htContent 	= $solutions['content'];
$headText 	= fnextractHeadins('h2', $htContent );
//print_r( $solutions );	
?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $solutions['sc_background']; ?>" id="acf-solutionp">
	<div class="container">
		<div class="dis-flex top-content">
          <div class="flex-2">
            <?php echo $headText; ?>
          </div>
          <div class="flex-2">
            <?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
          </div>
        </div>
		<div class="dis-flex col-box-outer margin-t-50">
			<?php 
			$grid = ( isset( $solutions['grid-type'] ) && !is_array( $solutions['grid-type'] ) ) ? $solutions['grid-type'] : 3;
			if( $solutions['loop'] ){
				foreach( $solutions['loop'] as $row ){
				echo '<div class="flex-'.$grid.' box-3'.vcHasAnchor($row['title'], $row['text']).'">
				<div class="box bg-blue-opacity-light">
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
endif;


$specialties = get_field('specialties');
//echo '<pre>'; print_r($specialties); echo '</pre>';
if( $specialties ) :
$isWhyEnable = $specialties['is_enable'];
if( $isWhyEnable == "yes" ) {
$htContent 	= $specialties['content'];
$headText 	= fnextractHeadins('h2', $htContent );	
?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $specialties['sc_background']; ?>" 
	id="three-specialties">
	<div class="container">
		<div class="dis-flex top-content">
          <div class="flex-2">
            <?php echo $headText; ?>
          </div>
          <div class="flex-2">
            <?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
          </div>
        </div>
		<?php if( $specialties['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite margin-t-50">
			<?php 
			$wcount = 0;
			$grid = ( isset( $specialties['grid-type'] ) && !is_array( $specialties['grid-type'] ) ) ? $specialties['grid-type'] : 3;
			foreach( $specialties['options'] as $row ) : 
				
			$wcount++;
			$vcHasAnchor = vcHasAnchor( $row['title'] );
			$title 	= ( !empty($vcHasAnchor) ) ? strip_tags($row['title']) : $row['title'];

			if( $vcHasAnchor !== false ){
			$href 	= getStrHrefValue( $row['title'] );
			$title 	= '<a href="'.site_url($href).'">'.$title.'</a>';
			}
			
			?>
			<div class="flex-<?php echo $grid; ?> box-3 <?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
				<div class="box bg-blue-opacity-light">
					<h3><?php echo $title; ?></h3>
					<?php 
					if( vcHasHTML( $row['text'] ) ){
						echo $row['text'];
					}else{
						echo '<p>'.$row['text'].'</p>';
					}
					echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$title.'</span>' : ''; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php 
}
endif;

$vtech = get_field('vc-smart-tech');
if( $vtech ) :
$isvtech = $vtech['is_enable'];
if( $isvtech == "yes" ) {
cmnTecStack_V3( $vtech['content'] );
}
endif;

$techStacks = get_field( 'inv-tstacks' );
if( isset( $techStacks['is_enable'] ) && ($techStacks['is_enable'] == "yes") ) :
$dtype 	= (isset($techStacks['dtype']) && ($techStacks['dtype'] == "grid")) ? 'grid' : 'accordian';
if($dtype == "grid"){ 
?>
<section data-layout="<?php echo $dtype; ?>" class="tech-stacks padding-t-120 padding-b-120 <?php echo $techStacks['sc_background']; ?>" id="serv-technology-grid">
  <div class="container">
    <div class="head-txt text-center"><?php echo $techStacks['content']; ?></div>
    <div class="dis-flex col-box-outer margin-t-50">
    <?php
    $techno = $techStacks['inv-tech'];
    if( $techno ){
    	$flexCount = ( count($techno) === 1 ) ? 'flex-1' : 'flex-3';
    	foreach( $techno as $trow ){
    		echo '<div class="'.$flexCount.' col-box"><div class="inner-box">';
    		echo $trow['tech-block'];
    		echo '</div></div>';
    	}
    }
    ?>          
    </div>
  </div>
</section>
<?php }else{ ?>
<section data-layout="<?php echo $dtype; ?>" class="accordion-section padding-t-120" id="ind-techstacks-accordion">
		<div class="dis-flex accordian-row">
		<div class="col-left">
		  <div class="head-txt">
		  	<?php echo $techStacks['content']; ?>
		  </div>	  
			<?php 
			if( $techStacks['image'] ){
				echo vc_pictureElm( $techStacks['image'], 'ValueCoders', 'soft-img' );
			}else{
			?>
			<div class="image-wrap">
			<picture class="soft-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/hire-detail-image.webp">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/hire-detail-image.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/hire-detail-image.png" width="668" 
			height="978" alt="valuecoders">
			</picture>
			</div>
			<?php } ?>
		</div>
		<div class="col-right content-col padding-b-120">
		<?php 
		$rowCount = 0;
		foreach( $techStacks['inv-tech'] as $mrow ){ 
			echo '<div class="inner-box">'.$mrow['tech-block'].'</div>';
		}
		?>	
		</div>
		</div>
	</section>
<?php } 
endif;
?>


<?php
$whyhire = get_field('why-valuecoders');
if( isset( $whyhire['is_enabled'] ) && ($whyhire['is_enabled'] == "yes") ){	
$whContent = $whyhire['content']; 
if( $whyhire['options'] ){
	$whContent .= '<ul>';
	foreach( $whyhire['options'] as $row ){
	$whContent .= '<li>'.$row['title'].'</li>';
	}
	$whContent .= '</ul>';
}
get_template_part( 'include/why', 'hirev4.0', ['content' => $whContent] );   	
}
?>


<?php 
//Section Hide in version 4.0
/*
$clientele 		= get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :  
?>
<section class="global-companies padding-b-120 <?php echo $clientele['sc_background']; ?>">
  <div class="container">
    <div class="dis-flex justify-sb items-center">
      <div class="flex-2 image-box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png" width="647" 
          height="411" alt="valuecoders">
        </picture>
      </div>
      <div class="flex-2 content-box">
        <?php echo $clientele['content']; ?>
      </div>
    </div>
  </div>
</section>
<!-- ValueCoder clientele #Ends Here -->
<?php endif; 
*/
?>


<?php 
$eTwoHeading  = (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : "Got a Project in Mind? Tell Us More";
$eTwoBody     = (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : "Drop us a line and we'll get back to you immediately to schedule a call and discuss your needs personally.";
$eTwolt = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : 
"Talk To Our Experts"; 

$eCtatwo = '<h2>'.$eTwoHeading.'</h2>';
$eCtatwo .= '<p>'.$eTwoBody.'</p>';
echo expert_talk_cta( $eCtatwo, $eTwolt );
?>

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
<?php getPageCaseStudiesV3( $thisPostID, true ); ?>
<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enabled'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-120 padding-b-120">
	<div class="container">
		<div class="top-section b-100"><?php echo $faqs['content']; ?></div>
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

<?php cmnTestimonials_v3( $thisPostID ); ?>
<?php //getPageCaseStudies( $thisPostID ); ?>
<?php 
/*
$blogSec = get_field('bposts');
if( $blogSec ){
	if( isset( $blogSec['is_enabled'] ) && ($blogSec['is_enabled'] == "yes") ){
		$bTheme = ( isset($blogSec['sc_background']) && !empty( $blogSec['sc_background'] ) ) ? $blogSec['sc_background'] 
		: 'bg-dark-theme';
		$tagSlug = ( isset($blogSec['tag-pslug']) && !empty( $blogSec['tag-pslug'] ) ) ? $blogSec['tag-pslug'] : '';
		vcShowLatestPosts($bTheme, $tagSlug );
	}
}
*/ 
?>
<?php get_footer(); ?>