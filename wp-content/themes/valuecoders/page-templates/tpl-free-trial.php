<?php 
/* 
Template Name: 7 Day's Free Trail template
*/ 
global $post;
$thisPostID = $post->ID;
$sectionFT = get_field('ft-sections');
get_header();
?>
<section class="hero-section" 
style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/trial-banner.png);">
      <div class="container">
        <div class="content-wrap">
          <div class="dis-flex">
            <div class="left-box">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="slide-logo  bg-light dis-flex items-center justify-sb">
      <div class="container">
        <div class="dis-flex">
          <div class="logo-heading">
            <h4>Trusted by startups and Fortune <strong>500</strong> companies</h4>
          </div>
          <div class="logo-section">
            <div class="glide" id="marquee-comp">
              <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
                  <div class="glide__slide">
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/banner-client-logo.svg" width="1107" height="61" alt="valuecoders">
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="seven-days-trial padding-b-120">
      <div class="container">
        <div class="trial-wrap" id="trial-section">
          <div class="trial-sticky">
            <div class="left-bar" id="trial-question">
              <h3>Table of Contents</h3>
              <div class="bor-line">                
				<?php 
				if( $sectionFT ){
				echo '<ul class="question-list">';	
				$i = 0;	
				foreach( $sectionFT as $row ){ $i++;
				$isActive = ( $i === 1 ) ? 'class="active"' : '';	
				echo '<li><a href="#trial-'.$i.'" '.$isActive.'>'.$row['title'].'</a></li>';		
				}
				echo '</ul>';
				}
				?>               
              </div>
            </div>
            
            <div class="right-bar" id="trial-answer-part">
			<?php 
			$ians = 0;	
			if( $sectionFT ){ 
			//echo '<pre>'; print_r( $sectionFT ); echo '</pre>';	 die;
			foreach ($sectionFT as $row ){ $ians++;
			$type = ( isset( $row['type'] ) && !empty( $row['type'] ) ) ? $row['type'] : false;	
			?>
              <div class="trial-answer" id="trial-<?php echo $ians; ?>">
                <?php 
                echo $row['content']; 
                if( $type == 'process' ){
                $pros = $row['process'];
                if( $pros ){
                	echo '<div class="process-step">';
                	$i = 0;
                	foreach ($pros as $pro) { $i++;
                		$picture = vc_pictureElm( $pro['icon'], "ValueCoders");
                		echo '<div class="step-sec dis-flex">
						<div class="step-icon">
						'.$picture.'
						</div>
						<div class="step-desc">
						<span class="step-no">STEP '.$i.'</span>
						'.$pro['content'].'
						</div>
						</div>';
                	}
                	echo '</div>';
                }	                	
                }elseif( $type == 'grid' ){
                $box = $row['grid'];
                if( $box ){
                	echo '<div class="trial-row dis-flex">';
                	foreach( $box as $row ){
  					echo '<div class="trial-col"><div class="box">';
  					if( $row['icon'] ){
  						echo vc_pictureElm( $row['icon'], "ValueCoders");	
  						echo $row['content'];
  					}      				
    				echo '</div></div>';              		
                	}
				echo '</div>';
                }
                }elseif( $type == 'accordian' ){
                $accr = $row['accordian'];
                if( $accr ){
                	echo '<section class="trial-faq-section">';
                	$i = 0;
                	foreach( $accr as $frow){ $i++;
                	$active = ( $i === 1 ) ? ' active' : '';	
                	echo '<div class="trial-faq-outer">';
                	echo '<div class="trial-accordion-item-outer'.$active.'">
                      <h3 class="trial-accordion-toggle">'.$frow['title'].'</h3>
                      <div class="trial-accordion-content">'.$frow['content'].'</div></div>';
                	echo '</div>';	
                	}
                	echo '</section>';
                }                	
                }
                ?>
              </div>
            <?php } } ?>  
            </div>
          </div>
        </div>
      </div>
    </section>
<?php cmnTestimonials_v3( $thisPostID ); ?>    

<?php 
$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enabled'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-120 padding-b-120">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $faqs['content']; ?>				
		</div>
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