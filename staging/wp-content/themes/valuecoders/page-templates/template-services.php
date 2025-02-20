<?php
/* 
Template Name: Service Page Template 
*/ 
global $post;
$thisPostID = $post->ID;
$pageID     = $post->ID;
$vcBtn 			= get_field('vc-cta', $thisPostID);
get_header();
/*
Development Notes :
Main service Page ID is : 11941
*/
$mainServicePage  = 11941;
$cmnBanner        = get_field('sbg-thumbnail');
$bannerImageSrc   = get_bloginfo('template_url').'/v3.0/images/service-banner.png';
if( is_array( $cmnBanner ) ){
$bannerImageSrc = getVcWebpSrcURL( $cmnBanner );
}
?>
<section class="hero-section vlazy" style="background-image:url(<?php echo $bannerImageSrc; ?>);">
  <div class="container">
    <div class="content-wrap">
			<div class="breadcrumbs">
			<?php 
			$bcCategory = get_field('bc-vcategory');
			$bcTitle 		= get_field('bc-title');
			if( $bcTitle ){
			$bct = $bcTitle;
			}else{
			$bct = get_the_title();
			}

			if( isset( $bcCategory ) && ($bcCategory == "solutions") ){
			echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Solutions</span> '.$bct;		
			}elseif( isset( $bcCategory ) && ($bcCategory == "industries") ){
      echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Industries</span> '.$bct;   
      }
      else{
			echo '<a href="'.get_bloginfo('url').'">Home</a> 
      <a href="'.site_url('/software-development-services-company').'">Services</a> '.$bct;
			}
			?>
			</div>
      <div class="dis-flex">
        <div class="left-box">
        	<?php 
        	while( have_posts() ) : the_post();
        		the_content();
        	endwhile;	
        	?>
          <?php cmnCTA_v3('Book a Free Consultation', false); ?>          
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
get_template_part('inc/cmn', 'startups');
//vcTrustedStartups($thisPostID); 
?>

<?php 
$achv = get_field('v3-achievements');
if( isset( $achv['is_enabled'] ) && ($achv['is_enabled'] == "yes") ) :
$htContent 	= $achv['content'];
$headText 	= fnextractHeadins('h2', $htContent ); 	
?>
<section class="four-columns bg-light padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
    		<div class="flex-2"><?php echo $headText; ?></div>
        <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
    	<?php 
    	if( $achv['cards'] ){
    		foreach( $achv['cards'] as $row ){ ?>
			<div class="flex-4 box-3">
			<div class="box">
				<?php 
				if( $row['icon'] ){
					echo vc_pictureElm( $row['icon'], 'Valuecoders', 'icon-box' );
				} 
				echo $row['text'];
				?>
			</div>
			</div>
    	<?php }
    	}
    	?>
    </div>
  </div>
</section>
<?php endif;

$ctoSection = get_field('cto-services-col');
if( isset( $ctoSection['is_enabled'] ) && ($ctoSection['is_enabled'] == "yes") ) :
?>
<!-- 
<section class="three-column-icon-section bg-light-theme padding-t-120 padding-b-120" id="cto-services-col">
<div class="container">
  <div class="head-txt text-center">
    <?php echo $ctoSection['content-top']; ?>
  </div>
  <div class="dis-flex col-box-outer cto-service">
    <div class="flex-2 box-3">
      <div class="box bg-blue-opacity-light">
        <div class="headtext"><?php echo $ctoSection['title-left']; ?></div>
        <div class="inner-text"><?php echo $ctoSection['content-left']; ?></div>
      </div>
    </div>
    <div class="flex-2 box-3">
      <div class="box bg-blue-opacity-light">
        <div class="headtext"><?php echo $ctoSection['title-right']; ?></div>
        <div class="inner-text"><?php echo $ctoSection['content-right']; ?></div>
      </div>
    </div>
  </div>
</div>
</section> 
-->
<section class="cto-services padding-t-120 padding-b-120">
      <div class="container">
        <div class="dis-flex top-content">
          <div class="flex-2">
            <h2>How Our CTO Services Can Help Your Business Grow?</h2>
          </div>
          <div class="flex-2">
            <p>Companies often hire Chief Technology Officers when they require high-level technical professionals to oversee their software design and development process. We provide the following CTO as a service option for startups and enterprises.</p>
          </div>
        </div>
        <div class="dis-flex col-box-outer margin-t-80">
          <div class="flex-2 box-wrap">
            <div class="top-text">
              <h3>For Startups</h3>
              <p>Our CTO services help startups design their product, create the required infrastructure, and maintain the culture.</p>
            </div>
            <div class="dis-flex cto-row tick-icon-list">
              <div class="flex-2 box-3">
                <picture class="icon-box">
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-01.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-01.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/cto-01.png" width="" height="" alt="valuecoders">
                </picture>
                <h3>Design The Product</h3>
                <ul>
                  <li>Architecture consulting</li>
                  <li>Cloud systems development</li>
                  <li>App refactoring</li>
                  <li>QA &amp; control</li>
                </ul>
              </div>
              <div class="flex-2 box-3">
                <picture class="icon-box">
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-02.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-02.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/cto-02.png" width="" height="" alt="valuecoders">
                </picture>
                <h3>Build Infrastructure</h3>
                <ul>
                  <li>Planning &amp; prototyping</li>
                  <li>Agile methodology implementation</li>
                  <li>Strategic resource management</li>
                  <li>System failure prevention</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="flex-2 box-wrap">
            <div class="top-text">
              <h3>For Enterprises</h3>
              <p>Our CTO services help enterprises to enhance their product, improve infrastructure, and enhance their culture.</p>
            </div>
            <div class="dis-flex cto-row tick-icon-list">
              <div class="flex-2 box-3">
                <picture class="icon-box">
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-03.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-03.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/cto-03.png" width="" height="" alt="valuecoders">
                </picture>
                <h3>Consulting Services</h3>
                <ul>
                  <li>Deliver architecture suggestions</li>
                  <li>Software performance analysis</li>
                  <li>Cost optimization consulting</li>
                  <li>GDPR, PCI DSS, HIPAA compliance consulting</li>
                </ul>
              </div>
              <div class="flex-2 box-3">
                <picture class="icon-box">
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-04.png">
                  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/cto-04.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/cto-04.png" width="" height="" alt="valuecoders">
                </picture>
                <h3>Cloud services</h3>
                <ul>
                  <li>Cloud architecture audit</li>
                  <li>Cloud migration</li>
                  <li>Secure cloud infrastructure</li>
                  <li>Develop error-free cloud 
                    architecture
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--CTO Page Section Ends-->
<?php endif;

if(is_page(14198)) :   
echo expert_talk_cta('<h2>Looking for an expert CTO?</h2><p>Most experienced CTOs will start working on your project as soon as possible.<br> Contact our managers to describe your requirements.</p>', 'Book a Free Consultation');  
endif;

if( is_page( 'application-maintenance' ) ) : 
	dynamic_sidebar('app-maintenance');
endif; 

//-section only managed in application-maintenance page added statically

$threeSteps = get_field('three-steps');
if( isset( $threeSteps['is_enabled'] ) && ($threeSteps['is_enabled'] == "yes") ) :
$htContent 	= $threeSteps['top_content'];
$headText 	= fnextractHeadins('h2', $htContent ); 
?>
<section class="three-column-icon-section padding-t-120 padding-b-120" id="v3-three-steps">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
    	<div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">          
			<?php 
			if( $threeSteps['content_block'] ){
				foreach( $threeSteps['content_block'] as $row ){
					echo '<div class="flex-3 box-3"><div class="box">'.$row['text'].'</div></div>';		
				}
			}
			?>          
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$benefits = get_field('benefits');
if( $benefits['is_enabled'] == "yes" ) :
?>
<section id="v3-benefits" class="accordion-section bg-blue-section  padding-t-120">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt">
        <?php echo $benefits['heading']; ?>
      </div>
      <div class="image-wrap">
			<?php 
			if( $benefits['image'] ){
				echo vc_pictureElm( $benefits['image'], 'ValueCoders', 'soft-img' );
			}
			?> 
            </div>
    </div>
    <div class="col-right padding-b-120">
      <?php echo $benefits['content']; ?>
    </div>
  </div>
</section>
<!--
<section id="v3-benefits" class="column-list-section <?php echo $benefits['sc_background']; ?> padding-t-120 padding-t-120" data-nosnippet>
<div class="container">
<div class="head-txt text-center">
<?php echo $benefits['heading']; ?>
</div>
<div class="tick-icon-list"><?php echo $benefits['content']; ?><div>
</div>
</section> 
-->
<?php endif; ?>

<?php  	
// tech Specification in accordian format.
$specifications = get_field('tech-spec');
if( isset( $specifications['is_enabled'] ) && ($specifications['is_enabled'] == "yes") ){ 
$htContent 		= $specifications['content'];
$headText 		= fnextractHeadins('h2', $htContent );
$sectionType 	= (isset($specifications['specifications']) && (count($specifications['specifications']) > 6)) ? 'accordian' : 'grid';

if( is_page(3521) ){
$sectionType = 'accordian';
}

if( $sectionType == "grid" ){
?>
<section class="three-column-icon-section padding-t-120 padding-b-120" id="v3-tech-spec">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
    	<div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">          
			<?php 
			if( $specifications['specifications'] ){
			$g = 0;
      $flexGrid = (isset($specifications['grid']) && !empty($specifications['grid'])) ? "flex-".$specifications['grid'] : 'flex-3';
			foreach( $specifications['specifications'] as $row ){ $g++;
			$vcHasAnchor 	= vcHasAnchor($row['title'], $row['text']);
			$hasAnchor 		= ( $vcHasAnchor !== false ) ? ' has-vlink' : '';	

			$boxLink 	= (isset( $row['link'] ) && !empty($row['link']))	? '<span class="box-link"><a href="'.vc_siteurl($row['link']).'"></a></span>' : '';
      if( !empty($boxLink) ){
      $hasAnchor = ' has-vlink';
      }
			//$isActive = ( $i == 1 ) ? " active" : "";
			echo '<div class="'.$flexGrid.' box-3'.$hasAnchor.'"><div class="box">
			<h3>'.$row['title'].'</h3>
			<p>'.$row['text'].'</p>
			'.$boxLink.'
			</div></div>';		
			}
			}
			?>          
    </div>
  </div>
</section>
<?php 
}else{ 
?>
<section class="accordion-section padding-t-120" id="vc-tech-spec">
<div class="dis-flex accordian-row">
  <div class="col-left">
    <div class="head-txt"><?php echo $specifications['content']; ?></div>
	<div class="image-wrap">
    <?php 
    if( $specifications['image'] ){
      echo vc_pictureElm( $specifications['image'], 'ValueCoders', 'soft-img' );
    }else{ 
    ?>
    <picture class="soft-img">
      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/services-main.webp">
      <source type="image/jpg" srcset="<?php bloginfo('template_url'); ?>/dev-img/services-main.jpg">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/services-main.jpg" width="1200" 
      height="1250" alt="valuecoders">
    </picture>
	
    <?php } ?>
    </div>
  </div>
  <div class="col-right padding-b-120">
  	<?php 
    if( $specifications['specifications'] ){
      $g = 0;
      foreach( $specifications['specifications'] as $row ){ 
        $g++;
        $isActive = ( $g == 1 ) ? " active" : "";
        $title    = ($row['link']) ? '<a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a>' : '';
        $hasAnchor = (isset($row['link']) && !empty($row['link'])) ? 'has-link' : '';
        echo '<div class="accordionItem'.$isActive.'">
        <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$row['title'].'</span>'.$title.'</h3>
        <div class="accordion-content">
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
}
?>

<?php 
$eOneHeading  = (isset($vcBtn['title-one']) && !empty($vcBtn['title-one'])) ? $vcBtn['title-one'] : "Let's Discuss Your Project";
$eOneBody     = (isset($vcBtn['text-one']) && !empty($vcBtn['text-one'])) ? $vcBtn['text-one'] : "Get free consultation and let us know your project idea to turn it into an amazing digital product.";
$eOnelt = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : 
"Book a Free Consultation"; 
$eCtaOne = '<h2>'.$eOneHeading.'</h2>';
$eCtaOne .= '<p>'.$eOneBody.'</p>';
echo expert_talk_cta( $eCtaOne, $eOnelt );
?>

<?php
if( is_page( [15820,15827] ) ){
  colServiceWhyChoose( $thisPostID );
}
?>

<?php 
$keyApps = get_field( 'v3-keyapps' );
if( isset($keyApps['is_enabled']) && ($keyApps['is_enabled'] == "yes") ) :
$htContent  = $keyApps['content'];
$headText   = fnextractHeadins('h2', $htContent );   
?>
<section id="col-delivery-process" class="three-column-icon-section key-areas bg-dark-theme padding-t-120 padding-b-120">
   <div class="container">
      <div class="dis-flex top-content">
        <div class="flex-2"><?php echo $headText; ?></div>
        <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
      </div>
      <?php 
      if( $keyApps['Tabs'] ) :
      ?>
      <div class="prod-tabs dis-flex justify-sb margin-t-100">
         <nav id="tabs">
          <?php 
          if( $keyApps['Tabs'] ){
            echo '<ul>';
            $t = 0;
            foreach( $keyApps['Tabs'] as $row ){ $t++;
              $isActive = ( $t === 1 ) ? 'active' : '';
              echo '<li class="'.$isActive.'"><a href="#tab'.$t.'">'.$row['title'].'</a></li>';
            }
            echo '</ul>';
          }
          ?>            
         </nav>
         <div id="tab-contents">
          <?php 
          //echo '<pre>'; print_r($keyApps['Tabs']); echo '</pre>'; 
          $t = 0;
          foreach( $keyApps['Tabs'] as $row ){ 
            $t++;
            $isActive = ( $t === 1 ) ? 'active' : '';
            echo '<div id="tab'.$t.'" class="tab-contents '.$isActive.'">
            <div class="top-content has-vlink">'.$row['content-top'].'</div>
            <div class="dis-flex col-box-outer">'.str_replace( '</div></div></p>', '</div></div>', $row['content-box'] ).'</div>
            </div>';
          }
          ?>                
         </div><!-- #tab-contents -->
      </div>
      <?php endif; ?>
   </div>
</section>
<?php endif; ?>

<?php 
$ucSolutions = get_field('v3-ucsolutions', $pageID);
if( isset( $ucSolutions['is_enabled'] ) && ($ucSolutions['is_enabled'] == "yes") ) :
echo expert_talk_cta( '<h2>Ready to unlock the power of machine learning?</h2><p>Discover how our state-of-the-art solutions can drive innovation and transform your business.</p>', 'Talk To Our Experts' );
?>

<section class="accordion-section padding-t-120 <?php echo $blueBG; ?>" id="acf-v3-ucsolutions">
<div class="dis-flex accordian-row">
  <div class="col-left">
  <div class="head-txt"><?php echo $ucSolutions['content']; ?></div>
  <div class="image-wrap">
    <?php 
    if( isset($ucSolutions['image']) && !empty($ucSolutions['image']) ){
    echo vc_pictureElm( $ucSolutions['image'], 'ValueCoders', 'soft-img' );
    }
    ?>
    </div>
  </div>

  <div class="col-right padding-b-120">
    <?php 
    if( $ucSolutions['cards'] ){
      $g = 0;
      foreach( $ucSolutions['cards'] as $row ){ 
        $g++;
        $hasAnchor  = (vcHasAnchor( $row['title'] ) !== false ) ? ' has-link' : ''; 
        $blnkTitle  = ( !empty($hasAnchor) ) ? strip_tags($row['title']) : $row['title'];
        $aTitle     = (vcHasAnchor( $row['title'] ) !== false ) ? $row['title'] : '';
        $isActive = ( $g == 1 ) ? " active" : "";
        echo '<div class="accordionItem'.$isActive.'">
        <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$blnkTitle.'</span>'.$aTitle.'</h3>
        <div class="accordion-content">'.$row['content'].'</div>
        </div>';    
      }
    }
    ?>
  </div>
</div>
</section>
<?php endif; ?>

<?php if( is_page(15156) ) : ?>
<section class="three-column-icon-section padding-t-120 padding-b-120" id="leverage-widget">
	<div class="container">
	<div class="dis-flex top-content">
	  <div class="flex-2">
	    <h2>Leverage the Technical Expertise Of Our Computer Vision Software Developers</h2>
	  </div>

	  <div class="flex-2">
	    <p>Our developers possess extensive technical expertise in the field, allowing us to provide cutting-edge solutions. They have a deep understanding of the complex algorithms, frameworks, and technologies required to build high-performing computer vision applications, enabling us to deliver solutions that meet your expectations and drive business growth.</p>
	  </div>
	  <div class="image-sec margin-t-80">
	    <picture>
	      <img class="desktop" loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/vision-image.svg" width="1282" height="266" alt="valuecoders">
	    </picture>
	  </div>
	</div>
	</div>
</section>
<?php endif; ?>

<?php 
$v3hwork = get_field('v3-how-work');
if( isset( $v3hwork['is_enabled'] ) && ($v3hwork['is_enabled'] == "yes") ) :
$htContent 	= $v3hwork['content'];
$headText 	= fnextractHeadins('h2', $htContent ); 
?>
<section class="work-section  padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
		<div class="flex-2"><?php echo $headText; ?></div>
		<div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="margin-t-100">
    	<?php 
			if( $v3hwork['image'] ){
				echo vc_pictureElm( $v3hwork['image'], 'Valuecoders' );
			}
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

	<?php 
	$delProcess = get_field('col-process-delivery');
	if( isset($delProcess['is_enabled']) && ($delProcess['is_enabled'] == "yes") ) :
	?>
	<section id="col-delivery-process" class="three-column-icon-section bg-dark-theme padding-t-120 padding-b-120">
	<div class="container">
	<div class="head-txt text-center">
	<?php echo $delProcess['top_content']; ?>
	</div>
	<div class="prod-tabs margin-t-80">
	  <nav id="tabs">
	  <ul>
	    <li class="active"><a href="#tab1">Preparation Phase</a></li>
	    <li><a href="#tab2">Requirement Analysis</a></li>
	    <li><a href="#tab3">Solution Creation</a></li>
	  </ul>	  
	  </nav>
	  <div id="tab-contents" class="margin-t-80">
	    <div id="tab1" class="tab-contents active">
	    	<?php echo $delProcess['tcontent-one']; ?>
	      <div class="dis-flex col-box-outer">
	      <?php echo $delProcess['icontent-one']; ?>
	      </div>
	    </div>
	    <div id="tab2" class="tab-contents">
	      <?php echo $delProcess['tcontent-two']; ?>
	      <div class="dis-flex col-box-outer">
	      <?php echo $delProcess['icontent-two']; ?>
	      </div>
	    </div>
	    <div id="tab3" class="tab-contents">
	      <?php echo $delProcess['tcontent-three']; ?>
	      <div class="dis-flex col-box-outer">
	      <?php echo $delProcess['icontent-three']; ?>
	      </div>
	    </div>
	  </div>
	</div>
	</div>
	</section>
	<?php endif; ?>
	
	

<?php 
$iboxDiscovery = get_field('ibox-discovery');
if( isset($iboxDiscovery['is_enable']) && ($iboxDiscovery['is_enable'] == "yes") ) :
?>
<section class="three-column-icon-section <?php echo $iboxDiscovery['sc_background']; ?> padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $iboxDiscovery['content']; ?></div>
    <?php 
    if( $iboxDiscovery['options'] ){
    echo '<div class="dis-flex col-box-outer">';
    foreach( $iboxDiscovery['options'] as $row ){
    	echo '<div class="flex-4 box-4">
        <div class="box bg-blue-opacity-light">
        '.$row['content'];
        if( $row['link'] ){
					echo '<a href="'.$row['link'].'" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>';
        }
        echo '</div></div>';
    }
    echo '</div>';	
    }
    ?>
  </div>
</section>
<?php 
endif;

if( is_page( 10239 ) ) : ?>
<section class="three-column-icon-section bg-blue-linear two-difference-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2">
        <h2>Common Challenges Vs. How ValueCoders Gets You Covered</h2>
      </div>
      <div class="flex-2">
        <p>There are a few common challenges when it comes to Offshore Development Centers (ODCs) in India.</p>
      </div>
    </div>
    <div class="dis-flex justify-sb col-box-outer margin-t-50">
      <div class="flex-2 left-box">
        <div class="list-box-outer">
          <div class="head-box">
            <h3>Challenges</h3>
          </div>
          <div class="list-box">
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
        <div class="list-box-outer">
          <div class="head-box">
            <h3>Expect The Best With ValueCoders</h3>
          </div>
          <div class="list-box">
            <ul>
              <li>Project management tools and best practices like sprint planning, scrum of scrums, joint retrospective with stake holders, agile software development process together provide you great project control.</li>
              <li>We have hundreds of pre-vetted professionals with well-defined recruitment and training processes that help in a fast turnaround.</li>
              <li>Our experts can work as per your timezone to effectively coordinate with you for project progress.</li>
              <li>We work with advanced project management tools, and our professionals have excellent communication skills that give you flawless coordination.</li>
              <li>Our pre-vetted professionals have good communication skills. You won’t face any cultural misfit too.</li>
              <li>You get timely delivery from your ODC team with Valuecoders because all team members are highly skilled &amp; experienced and work under strict guidelines.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>	
<?php 
endif; 

if( is_page('it-strategy-consulting-firms') ) {
  cmnTecStack_V3("<h3>Our IT Consulting Expertise</h3>");
}

$twColumn = get_field('tw-column');
//echo '<pre>'; print_r($twColumn);
if( isset( $twColumn['is_enabled'] ) && ($twColumn['is_enabled'] == "yes") ){
$htContent 	= $twColumn['content'];
$headText 	= fnextractHeadins('h2', $htContent );
?>
<section class="three-column-icon-section <?php echo $twColumn['sc_background']; ?> padding-t-120 padding-b-120" id="acf-tw-column">
	<div class="container">
	  <div class="dis-flex top-content half-list">
	  	<div class="flex-2">
      <div class="head-txt">
      <?php echo $headText;  ?>
      </div>
      <?php 
      if( $twColumn['image'] ){
        //echo vc_pictureElm( $twColumn['image'], 'Valuecoders' );
      }
      ?>
      </div>
	    <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
	  </div>
	</div>
</section>
<?php } ?>

<?php 
$cmnChallenge = get_field('cmn-challenges');
if( $cmnChallenge ) :
if( $cmnChallenge['is_enabled'] == "yes" ){
$htContent 	= $cmnChallenge['content-top'];
$headText 	= fnextractHeadins('h2', $htContent );	
?>
<section class="three-column-icon-section bg-blue-linear two-difference-section padding-t-120 padding-b-120 
<?php //echo $cmnChallenge['sc_background']; ?>">
	<div class="container">
	<div class="dis-flex top-content">
		<div class="flex-2"><?php echo $headText; ?></div>
	  <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
	</div>
	<div class="dis-flex justify-sb col-box-outer margin-t-50">
		<div class="flex-2 left-box">
			<div class="list-box-outer">
				<div class="head-box"><?php echo $cmnChallenge['title-left']; ?></div>
				<div class="list-box"><?php echo $cmnChallenge['content-left']; ?></div>
			</div>
		</div>
		<div class="flex-2 last-box">
			<div class="list-box-outer">
				<div class="head-box"><?php echo $cmnChallenge['title-right']; ?></div>
				<div class="list-box"><?php echo $cmnChallenge['content-right']; ?></div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php } endif; ?>

<?php
$ibox = get_field('ibox-cards');
$iBoxEnable = $ibox['is_enable'];
if( (isset( $ibox['is_enable'] ) && ($ibox['is_enable'] == "yes")) ){
$sectionType 	= (isset($ibox['options']) && (count($ibox['options']) > 6)) ? 'accordian' : 'grid';

$sectionType  = ( isset($ibox['dis-type']) && !empty($ibox['dis-type']) ) ? $ibox['dis-type'] : $sectionType;

if( $sectionType == "grid" ){	
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="three-column-icon-section <?php echo $ibox['sc_background']; ?> padding-t-120 padding-b-120" 
id="vc-ibox-cards">
	<div class="container">
		<?php 
    if( is_page( 15820 ) ){
    $htContent  = $ibox['content'];
    $headText   = fnextractHeadins('h2', $htContent );
    echo '<div class="dis-flex top-content">
      <div class="flex-2">'.$headText.'</div>
      <div class="flex-2">'.preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent).'</div>
    </div>';
    }else{
    echo '<div class="head-txt text-center">'.$ibox['content'].'</div>'  ;
    }
    ?>
    
		<?php if( $ibox['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite margin-t-50">
			<?php 
			$wcount = 0;
			foreach( $ibox['options'] as $row ) : $wcount++; ?>
			<div class="flex-<?php echo $gridType; ?> box-3 <?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
				<div class="box bg-blue-opacity-light">
					<h3><?php echo $row['title']; ?></h3>
					<?php 
          if( is_page( 15820 ) ){
            echo $row['text']; 
          }else{
            echo '<p>'.$row['text'].'</p>';
          }
          ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>	
	</div>
</section>
<?php }else{ ?>
<section class="accordion-section padding-t-120" id="vc-tech-spec-accr333">
<div class="dis-flex accordian-row">
  <div class="col-left">
    <div class="head-txt"><?php echo $ibox['content']; ?></div>
	<div class="image-wrap">
    <?php 
		if( isset($ibox['image']) && !empty( $ibox['image'] ) ){
			echo vc_pictureElm( $ibox['image'], 'ValueCoders', 'soft-img' );
		}
		?>   
   </div>
  </div>
  <div class="col-right padding-b-120">
	<?php 
	if( $ibox['options'] ){
		$g = 0;
		foreach( $ibox['options'] as $row ){ 
			$g++;
			$isActive = ( $g == 1 ) ? " active" : "";
      $hasAnchor  = (vcHasAnchor( $row['title'] ) !== false ) ? ' has-link' : ''; 
      $blnkTitle  = ( !empty($hasAnchor) ) ? strip_tags($row['title']) : $row['title'];
      $aTitle     = (vcHasAnchor( $row['title'] ) !== false ) ? $row['title'] : '';
			echo '<div class="accordionItem'.$isActive.'">
      <h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$blnkTitle.'</span>'.$aTitle.'</h3>
			<div class="accordion-content">
			<p>'.$row['text'].'</p>
			</div>
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

<?php get_template_part( 'inc/pricing', 'table', ['page_id' => $thisPostID] ); ?>

<?php 
if( !is_page([15820,15827]) ){
  getServicesPageTechnologies( $thisPostID );   
}
?>

<?php 
$proSteps = get_field('v3-prostep');
if( isset($proSteps['is_enabled']) && ($proSteps['is_enabled'] == "yes") ) :
$htContent  = $proSteps['content'];
$headText   = fnextractHeadins('h2', $htContent );    
?>
<section class="get-app development-process bg-blue-linear padding-t-120 padding-b-120">
<div class="container">
  <div class="dis-flex justify-sb">        
    <div class="flex-2 left-box">
      <div class="inner-box">
        <?php echo $headText; ?>
      </div>
    </div>
    <div class="flex-2 right-box ">
      <?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>
    </div>
  </div>
  <?php 
  if( $proSteps['steps'] ) :
  ?>
  <div class="app-dprocess dis-flex margin-t-80 justify-sb">    
    <?php 
    foreach( $proSteps['steps'] as $row ){
      echo '<div class="process-item">
      <div class="pro-title">
        <div class="nocount">Step</div>
        <h3>'.$row['title'].'</h3>
      </div>
      <div class="process-circle"></div>
      <p>'.$row['text'].'</p>
    </div>';
    }
    ?>
  </div>
  <?php endif; ?>
</div>
</section>
<?php 
endif;
?>

<?php 
if( is_page( $mainServicePage ) ){
$tsheading = "<h2>Tech Stacks</h2>
<p>We work with various technologies and platforms to lend flexibility to your software development and outsourcing needs. We also keep our team abreast with the latest versions of these technologies.</p>";
cmnTecStackUpdated( $tsheading ); 
hireModelCmn('bg-dark-theme');
} 
?>

<?php 
$hasTS = get_field('vc-show-ts');
if( isset( $hasTS['is_enabled'] ) && !empty( $hasTS['is_enabled'] ) && ($hasTS['is_enabled'] == "yes") ){
	$tsheading = $hasTS['content'];
	cmnTecStackUpdated( $tsheading );
}
?>

<?php  
$ibox = get_field('ibox-cards-devcycle');
if( $ibox ) :
$iBoxEnable = $ibox['is_enable'];
if( $iBoxEnable == "yes" ) {
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="numbering-box-section three-column-icon-section padding-t-120 padding-b-120" id="vc-ibox-cards-devcycle">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $ibox['content']; ?>
		</div>
		<?php if( $ibox['options'] ) : ?>
		<div class="dis-flex col-box-outer margin-t-50">
			<?php 
			$wcount = 0;
			foreach( $ibox['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3<?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
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
					<img loading="lazy" src="'.$wlicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$wlicon['width'].'" 
					height="'.$wlicon['height'].'"> 
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
		<!-- <div class="text-center margin-t-100"><?php //vc_cta(); ?></div>-->
	</div>
</section>
<?php 
}
endif; 
?>

<?php 
if( is_page( [16008] ) ){ 
echo expert_talk_cta( '<h2>Elevate Your Brand with Midjourney Solutions!</h2><p>Enhance Your Brand with Customized AI-Generated Visuals by Midjourney Solutions.</p>', 'Book a Free Consultation' );
} 
?> 

<?php 
if( !is_page( [15820,15827] ) ){
  colServiceWhyChoose( $thisPostID );   
}
?>

<?php 
if( is_page( [16006] ) ){
echo expert_talk_cta('<h2>Elevate Your Brand with Midjourney Solutions!</h2><p>Enhance Your Brand with Customized AI-Generated Visuals by Midjourney Solutions.</p>', 'Book a Free Consultation');  
} 
?> 


<?php if( is_page('dedicated-development-teams') ) : ?>
<section class="three-column-icon-section bg-blue-linear table-section padding-t-120 padding-b-120">
      <div class="container">
        <div class="dis-flex top-content">
          <div class="flex-2">
            <h2>Dedicated Team Model vs. Time and Materials vs. Fixed Price Model</h2>
          </div>
          <div class="flex-2">
            <p>When outsourcing your software development, you will have to decide on an engagement model that defines the basis of the collaboration between you and ValueCoders.</p>
          </div>
        </div>
        <div class="dis-flex col-box-outer margin-t-50">
          <div class="flex-3 table-list">
            <h3>Dedicated Team</h3>
            <ul>
              <li>Mostly used for long-term projects with unclear requirements and potential changes in scope</li>
              <li>It’s also common when the client doesn’t have the necessary skills to tackle the project at hand.</li>
              <li>More affordable option than hiring an in-house team.</li>
              <li>Team dedicated exclusively to the project at hand.</li>
              <li>Continuous development and delivery for improved flexibility and scalability.</li>
              <li>Faster workflow when compared to more strictly planned models.</li>
            </ul>
          </div>
          <div class="flex-3 table-list">
            <h3>Time and Materials model</h3>
            <ul>
              <li>Here you only pay for the time and effort the developers spend on your project working on predefined features and functionality.</li>
              <li>You only pay for actual work performed on a specific timeframe</li>
              <li>Flexible approach to development that gives room for changing requirements.</li>
              <li>Highly scalable and rapidly adaptable to new needs.</li>
              <li>Tight time management that ensures a faster development.</li>
              <li>Increased cost control and budget flexibility.</li>
            </ul>
          </div>
          <div class="flex-3 table-list">
            <h3>Fixed Price Model</h3>
            <ul>
              <li>It takes place when the client and the development company agree on a fixed cost for the entire project.</li>
              <li>You’ll pay only that predefined sum regardless of the amount of time or resources</li>
              <li>No surprise costs and minimal client involvement as the final price is agreed before development starts</li>
              <li>The workflow is predefined and agreed by both parties, meaning that there shouldn’t be any issues in delivering the project on time.</li>
              <li></li>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>


<?php 
$twColSection = get_field('v3-tcright');
if( isset( $twColSection['is_enabled'] ) && ($twColSection['is_enabled'] == "yes") ) :
?>
<section class="technology-section bg-blue-linear">
      <div class="dis-flex">
        <div class="left-box  padding-t-120 padding-b-120">
          <?php echo $twColSection['content']; ?>
        </div>
        <div class="right-box">
				<?php 
				if( $twColSection['image'] ){
					echo vc_pictureElm( $twColSection['image'], 'ValueCoders' );
				}
				?>                
        </div>
      </div>
</section>
<?php endif; ?>


<?php  
$ibox = get_field('ibox-cards-techstack');
$iBoxEnable = $ibox['is_enable'];
if( isset( $ibox['is_enable'] ) && ($ibox['is_enable'] == "yes") ){
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="three-column-icon-section <?php echo $ibox['sc_background']; ?> padding-t-120 padding-t-120" id="vc-ibox-cards-techstack">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $ibox['content']; ?>
		</div>
		<?php if( $ibox['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $ibox['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3 <?php echo vcHasAnchor( $row['title'], $row['text'] ); ?>">
				<div class="box bg-blue-opacity-light">
					<h3><?php echo $row['title']; ?></h3>
					<p><?php echo $row['text']; ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>	
	</div>
</section>
<?php 
}
?>

<?php 
if( is_page(9328) ){
dynamic_sidebar('lc-comparative-analysis');	
}

if( is_page(10158) ){
//cmnTecStackUpdated( '<h2>Our White Label Services</h2>' );
}
  
// if( is_page(10213) ){
// cmnTecStack_V3( '<h2>Our Technologies</h2><p>Here are some software development technologies on which we have proficiency:</p>' );
// }
?>

<?php 
$clientFocus					= get_field('client-focus');
$clientFocusEnable 		= isset($clientFocus['is_enabled']) ? $clientFocus['is_enabled'] : '';
if( $clientFocusEnable == 'yes' ) :
?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $clientFocus['sc_background']; ?>" 
	id="vc-client-focus">
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $clientFocus['section_title_hiring_model']; ?></h2>
			<p><?php echo $clientFocus['section_description_hiring_model']; ?></p>
		</div>
	  	<?php 
	  	$hCards = $clientFocus['hiring_cards'];
	  	//debug_dd( $hCards ); die;
	  	if( $hCards ) : ?>
		<div class="dis-flex col-box-outer asp-net-usage-sprite">
		<?php 
		$h = 1; 
		foreach( $hCards as $row ) {
		?>
		<div class="flex-3 box-3 <?php echo vcHasAnchor( $row['content'] ); ?>">
			<div class="box bg-blue-opacity-light">			
			<?php echo $row['content']; ?>
			</div>
		</div>
		<?php $h++; 
		} 
		?>
		</div>
		<?php endif; ?>
		<!--<div class="text-center margin-t-100"><?php //vc_cta(); ?></div> -->
	</div>
</section>
<?php endif; ?>

<!-- Section Used For Tech Stack -->
<?php  
$techStack = get_field('tech-stack');
if( $techStack ) : 
$tsEnable = $techStack['is_enabled'];
if( $tsEnable == "yes" ) {
?>
<section class="tech-stack-icon-list-section <?php echo $techStack['sc_background']; ?> tick-icon-list padding-t-120 padding-t-120">
	<div class="container">
		<div class="head-txt text-center"><?php echo $techStack['content']; ?></div>
		<?php 
		$tsBoxes = $techStack['cards'];
		if( $tsBoxes ){
		?>
		<div class="dis-flex col-box-outer for-tech-stack-icon">
			<?php 
			foreach( $tsBoxes as $box ){
				echo '<div class="flex-2 col-box">
				<div class="logo-box for-box-effect">
					<div class="content-box">'.$box['content'].'</div>';
					if( $box['tech'] ){
						echo '<div class="dis-flex justify-sb items-center logo-list-box bg-dark-theme">
						<div class="tech-stack-link">
						<div class="dis-flex">';
						foreach( $box['tech'] as $tech ){
							$tsicon 	= $tech['icon-dt'];
							$tsiconwp 	= $tech['icon-dt-wp'];

							$tslcon 	= $tech['icon-lt'];
							$tslconwp 	= $tech['icon-lt-wp'];

							echo '<a href="'.vc_siteurl($tech['link']).'" class="icon-box">';
							if( $tsicon && $tsiconwp ){
							echo '<picture>
							<source type="image/webp" srcset="'.$ticonwp['url'].'">
							<source type="'.$tsicon['mime_type'].'" srcset="'.$tsicon['url'].'">
							<img loading="lazy" src="'.$tsicon['url'].'" alt="'.vcparseanchor($tech['title']).'" width="'.$tsicon['width'].'" 
							height="'.$tsicon['height'].'"> 
							</picture>';
							}
							echo '<span class="text">'.$tech['title'].'</span></a>';
						}
						echo '</div></div>
						<div class="learn-more-btn text-right">
							<a href="'.vc_siteurl($box['link']).'" class="learn-more">Learn More <i class="round-arrow-icon"></i></a>
						</div></div>';
					}
				echo '</div></div>';
			} 
			?>
		</div>
		<?php } ?>
		<!-- <div class="text-center margin-t-100"><?php //vc_cta(); ?></div> -->
	</div>
</section>
<?php } endif; ?>
<!-- Tech Stack #ends Here -->

<?php 
$serv_opts = get_field('v3-soptions');
if( isset( $serv_opts['is_enabled'] ) && ($serv_opts['is_enabled'] == "yes") ) :
$htContent 	= $serv_opts['content'];
$headText 	= fnextractHeadins('h2', $htContent ); 	
$flexGrid 	= (isset($serv_opts['grid_column']) && !empty($serv_opts['grid_column'])) ? 'flex-'.$serv_opts['grid_column'] : 'flex-2';
?>
<section class="three-column-icon-section padding-t-120 padding-b-120" id="v3-soptions">
  <div class="container">
    <div class="dis-flex top-content">
			<div class="flex-2"><?php echo $headText; ?></div>
			<div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
    	<?php
    	if( $serv_opts['cards'] ){
    		foreach( $serv_opts['cards'] as $row ){
					echo '<div class="'.$flexGrid.' box-3 has-anchor">
					<div class="box">'.$row['text'].'</div>
					</div>';
    		}
    	}
    	?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php //get_template_part('include/why', 'hirev4.0'); ?>

<?php  
$vcProfile = get_field('vc-profile');
if( $vcProfile ) :
$vcProfileEnable = $vcProfile['is_enable'];
if( $vcProfileEnable == "yes" ) { 

$whContent        =  $vcProfile['top-content']; 
$profileContent   = $vcProfile['content']; 
$proText          = vCodeRemoveUlTags( $profileContent );
$whContent .=  $proText;
$whContent .=  '<ul>
<li>India\'s Top 1% Software Talent</li>
<li>Trusted by Startups to Fortune 500</li>
<li>Idea to Deployment, We Handle All</li>
<li>Time-Zone Friendly: Global Presence</li>
<li>Top-tier Data Security Protocols</li>
<li>On-time Delivery, No Surprises</li>
'.$vcProfile['add-pointers'].'
</ul>';
get_template_part( 'include/why', 'hirev4.0', ['content' => $whContent] );   
} endif; ?>

<?php
$whyhire = get_field('vprofile-icons');
if( $whyhire ) :
$iswEnabled = $whyhire['is_enable'];
if( $iswEnabled == "yes" ){	
?>
<section class="global-counter padding-t-120 padding-b-120 <?php echo $whyhire['sc_background']; ?>" id="acf-vprofile-icons">
  <div class="container">
    <div class="dis-flex justify-sb items-center">
      <div class="flex-2 content-box tick-icon-list">
      	<?php 
      	echo $whyhire['content']; 
      	if( $whyhire['options'] ){
      		echo '<ul>';
      		foreach( $whyhire['options'] as $row ){
      			echo '<li>'.$row['title'].'</li>';
      		}
      		echo '</ul>';
      	}
      	?>
        <h4>Awards &amp; Certifications -</h4>
        <div class="award-logo dis-flex">
          <div class="logo-box logo1"></div>
          <div class="logo-box logo2"></div>
          <div class="logo-box logo3"></div>
          <div class="logo-box logo4"></div>
          <div class="logo-box logo5"></div>
        </div>
      </div>
      <div class="flex-2 image-box">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/counter-image.svg" width="543" height="500" alt="valuecoders">
        </picture>
      </div>
    </div>
  </div>
</section>
<?php 
}
endif; 
?>


<?php
$peaceMind = get_field('vc-peace-mind');
if( $peaceMind ) :
$iswEnabled = isset($peaceMind['is_enable']) ? $peaceMind['is_enable'] : '';
if( $iswEnabled == "yes" ){
$secType = isset($peaceMind['img-align']) ? $peaceMind['img-align'] : '';
if( $secType == 'left' ){ ?>
<section class="valuecoders-img-section <?php echo ( !is_page(10213) ) ? ' padding-t-120' : ''; ?>  padding-t-120" 
  id="acf-vc-peace-mind">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $peaceMind['content-top']; ?>
		</div>
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-2 left-box">
			<?php 		
			$dtImage 		= $peaceMind['image'];
			$dtImageWebp 	= $peaceMind['section_image_webp_format'];
			if( $dtImage && $dtImageWebp ) {
			echo '<picture>
			<source type="'.$dtImageWebp['mime_type'].'" srcset="'.$dtImageWebp['url'].'">
			<source type="'.$dtImage['mime_type'].'" srcset="'.$dtImage['url'].'">
			<img loading="lazy" src="'.$dtImage['url'].'" alt="Valuecoders" width="'.$dtImage['width'].'" height="'.$dtImage['height'].'"> 
			</picture>';	
			}	
			?>
			</div>
			<div class="flex-2 right-box">
				<?php echo $peaceMind['content']; ?>
				<div class="icon-box-outer dis-flex margin-t-50">
					<div class="icon-box"><span class="icon icon1"></span>100% client satisfaction</div>
					<div class="icon-box"><span class="icon icon2"></span>No box <br> approach</div>
					<div class="icon-box"><span class="icon icon3"></span>Shorter time to market</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="counter-column-section">
	<div class="container for-pattern-img">
		<div class="dis-flex bg-dark-theme counter-column-outer">
			<div class="left-box">
				<h2>Ready To Contact Us?</h2>
				<p>Consistently recognized as one of India's best software development companies and proven success over 17+ years with thousands of customers globally, you can entrust us with your software development and outsourcing needs.</p>
				<a class="green-btn" href="<?php echo site_url('/contact'); ?>">Contact Us <i class="arrow-icon"></i></a>
			</div>
			<div class="counter-icons">
				<div class="dis-flex justify-sb">
					<div class="flex-2 counter-box">
						<span class="icon icon1"></span>
						<span class="icon-txt"><span class="large-txt clr-white">4,200+</span>Projects Launched</span>
					</div>
					<div class="flex-2 counter-box">
						<span class="icon icon2"></span>
						<span class="icon-txt"><span class="large-txt clr-white">16+</span>Years Experience</span>
					</div>
					<div class="flex-2 counter-box">
						<span class="icon icon3"></span>
						<span class="icon-txt"><span class="large-txt clr-white">2,500+</span>Satisfied Customers</span>
					</div>
					<div class="flex-2 counter-box">
						<span class="icon icon4"></span>
						<span class="icon-txt"><span class="large-txt clr-white">97%+</span>Client Retention</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }else{ ?>
<section class="valuecoders-img-section for-revese-value-section <?php echo $peaceMind['sc_background']; ?> padding-t-120 padding-t-120">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2 right-box">
				<?php echo $peaceMind['content']; ?>
				<div class="icon-box-outer dis-flex margin-t-50">
					<div class="icon-box"><span class="icon icon1"></span>100% client satisfaction</div>
					<div class="icon-box"><span class="icon icon2"></span>No box <br> approach</div>
					<div class="icon-box"><span class="icon icon3"></span>Shorter time to market</div>
				</div>
			</div>
			<div class="flex-2 left-box">
				<?php 
				//if( !wp_is_mobile() ) : 
				$dtImage 		= $peaceMind['image'];
				$dtImageWebp 	= $peaceMind['section_image_webp_format'];
				if( $dtImage && $dtImageWebp ) {
				echo '<picture>
				<source type="'.$dtImageWebp['mime_type'].'" srcset="'.$dtImageWebp['url'].'">
				<source type="'.$dtImage['mime_type'].'" srcset="'.$dtImage['url'].'">
				<img loading="lazy" src="'.$dtImage['url'].'" alt="Valuecoders" width="'.$dtImage['width'].'" height="'.$dtImage['height'].'"> 
				</picture>';	
				}	
				//endif; 
				?>
			</div>
		</div>
	</div>
</section>
<?php }
} // 
endif;
?>

<?php 
//Section Removed in Common Section Update Version 4.0
/*
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
?>
<section class="global-companies padding-b-120 padding-t-120 <?php echo $clientele['sc_background']; ?>" id="acf-vc-clients">
  <div class="container">
    <div class="dis-flex justify-sb items-center">
	<div class="flex-2 image-box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png" width="647" height="411" alt="valuecoders">
        </picture>
      </div>  
      <div class="flex-2 content-box top-content">
      <?php 
      $clContent  = $clientele['content']; 
      $cltext     = vCodeRemoveUlTags( $clContent );
      echo $cltext;
      echo '<ul>
      <li>20+ Yrs of Tech Mastery</li>
      <li>Transparent Communication</li>
      <li>Agile & Adaptive Approach</li>
      <li>Secure IP-Rights Protection</li>
      <li>Efficient Process & Workflow Design</li>
      <li>Continuous Quality Enhancement</li>
      </ul>';    
      ?>
      </div>
    </div>
  </div>
</section>
<?php endif; 
*/
?>
<!-- ValueCoder clientele #Ends Here -->

<?php 
$oModels = get_field('v3-models');
if( isset( $oModels['is_enabled'] ) && ($oModels['is_enabled'] == "yes") ) :
$htContent  = $oModels['content'];
$headText   = fnextractHeadins('h2', $htContent );  
?>
<section class="three-column-icon-section padding-t-120 padding-b-120" id="v3-soptions">
  <div class="container">
    <div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
    <div class="dis-flex col-box-outer margin-t-50">
      <?php
      if( $oModels['cards'] ){
        foreach( $oModels['cards'] as $row ){
          echo '<div class="flex-2 box-3 has-anchor">
          <div class="box">'.$row['text'].'</div>
          </div>';
        }
      }
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$eTwoHeading  = (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : "Got a Project in Mind? Tell Us More";
$eTwoBody     = (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : "Drop us a line and we'll get back to you immediately to schedule a call and discuss your needs personally.";
$eTwolt = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : 
"Talk To Our Experts"; 

$eCtatwo = '<h2>'.$eTwoHeading.'</h2>';
$eCtatwo .= '<p>'.$eTwoBody.'</p>';
if( !is_page( [17422,17425,16003,16004,16062,16066,17235,17236,17239,16065] ) ){
  echo expert_talk_cta( $eCtatwo, $eTwolt );  
}
?>

<?php 
$uga_content = get_field('v3-concolumn');
//print_r($uga_content); 
if( isset( $uga_content['is_enabled'] ) && ($uga_content['is_enabled'] == "yes") ) :
?>
<section class="accordion-section padding-t-120" id="acf-v3-concolumn">
<div class="dis-flex accordian-row">
	<div class="col-left">
		<div class="head-txt"><?php echo $uga_content['top-content']; ?></div>
		<div class="image-wrap">
		<?php 
		if( $uga_content['image'] ){
		echo vc_pictureElm( $uga_content['image'], 'ValueCoders', 'soft-img' );
		}
		?>
     </div>
	</div>
	<div class="col-right content-col w-100 padding-b-120"><?php echo $uga_content['right-content']; ?>	</div>
</div>
</section>
<?php endif; ?>

<?php 
if( is_page([15820,15827]) ){
  getServicesPageTechnologies( $thisPostID );   
}
?>

<?php
$guideTopics 	= get_field('guide-topics');
$gtEnabled 		= $guideTopics['is_enabled'];
if( $gtEnabled == 'yes' ) :
?>
<section id="has-ug" class="tab-scroll-section padding-t-120 padding-b-120 <?php echo $guideTopics['sc_background']; ?>">
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


<!-- Hire Model #Starts Here -->
<?php 
$hireModel 			  = get_field('hiring_models');
$hireModelEnable 	= $hireModel['is_enabled'];
$secTheme         = (isset($hireModel['sc_background']) && !empty($hireModel['sc_background'])) ? $hireModel['sc_background'] : '';
if( ($hireModelEnable == 'yes') && !is_page( $mainServicePage ) ) : 
if( is_page( 10158 ) ) {
?>
<section class="hiring-models padding-t-120 padding-b-120 <?php echo $secTheme; ?>" id="vc-hiring_models" id="vc-hiring_models">
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $hireModel['section_title_hiring_model']; ?></h2>
			<p><?php echo $hireModel['section_description_hiring_model']; ?></p>
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
			<img loading="lazy" src="'.$dtIcon['url'].'" alt="'.$dtIcon['title'].'" width="'.$dtIcon['width'].'" 
			height="'.$dtIcon['height'].'"> 
			</picture>';
			}

			$ltIcon = $row['icon-lt'];
			$ltIconwp = $row['icon-lt-webp'];
			if( $ltIcon && $ltIconwp ){
			echo '<picture class="lighter-theme-img">
			<source type="image/webp" srcset="'.$ltIconwp['url'].'">
			<source type="'.$ltIcon['mime_type'].'" srcset="'.$ltIcon['url'].'">
			<img loading="lazy" src="'.$ltIcon['url'].'" alt="'.$ltIcon['title'].'" width="'.$ltIcon['width'].'" 
			height="'.$ltIcon['height'].'"> 
			</picture>';
			}
			?>
			<?php echo $row['content']; ?>
			</div>
		</div>
		<?php $h++; 
		} 
		?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php 
}else{
	hireModelCmn( $secTheme );
} 
endif; 
?>


<?php getPageCaseStudiesV3( $thisPostID ); ?>
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

<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enabled'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-120 padding-b-120" data-nosnippet>
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

<?php if( is_page( 11149 ) ){ ?>
<section class="table-list-section bg-light padding-t-120 padding-b-120">
	<div class="container">
		<div class="head-txt text-center">
			<h2>Comparative Analysis : In-House, Freelancers Or ValueCoders</h2>
			<p>There are many options available for hiring your IT talent. Some of these options are hiring an in-house talent, working with freelancers, or get offshore experts with us. Let’s do a comparative analysis of these options:</p>
		</div>
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Factor</li>
					<li>Time to get right developers</li>
					<li>Time to start a project</li>
					<li>Recurring cost of training & benefits</li>
					<li>Time to scale size of the team</li>
					<li>Pricing (weekly average)</li>
					<li>Project failure risk</li>
				</ul>
			</div>
			<div class="flex-4 table-list bg-row-yellow">
				<ul>
					<li class="title">ValueCoders</li>					
					<li>1 day - 2 weeks</li>
					<li>1 day - 2 weeks</li>
					<li>0</li>
					<li>1 day - 2 weeks</li>
					<li>1.5X</li>
					<li>Extremely low, we have a 98% success rate</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">In - House</li>
					<li>4 - 12 weeks</li>
					<li>2 - 10 weeks</li>
					<li>$10,000 -$30,000</li>
					<li>4 - 16 weeks</li>
					<li>2X</li>
					<li>Low</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Freelance</li>
					<li>1 - 12 weeks</li>
					<li>1 - 10 weeks</li>
					<li>0</li>
					<li>1 - 12 weeks</li>
					<li>1X</li>
					<li>Very High</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php cmnTestimonials_v3( $thisPostID ); ?>
<?php get_footer(); ?>