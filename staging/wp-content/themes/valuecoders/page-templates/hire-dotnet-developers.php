<?php 
/*
Template Name: Technology Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
$vcBtn = get_field('vc-cta', $thisPostID);

$cmnBanner 			= get_field('sbg-thumbnail');
$bannerImageSrc = get_bloginfo('template_url').'/v3.0/images/service-banner.png';
if( is_array( $cmnBanner ) ){
			$bannerImageSrc = getVcWebpSrcURL( $cmnBanner );
}
?>
<section class="hero-section" style="background-image:url(<?php echo $bannerImageSrc; ?>);">
  <div class="container">
    <div class="content-wrap">
			<div class="breadcrumbs">
			<?php 
			$bcTitle = get_field('bc-title');
			if( $bcTitle ){
			$bct = $bcTitle;
			}		
			else{
			$bct = get_the_title();	
			} 
			echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Technology</span> '.$bct; 
			?>
			</div>
      <div class="dis-flex">
        <div class="left-box">
					<?php 
					$headingTxt = get_field( 'htop-area' ); 
					$bannerSec 	= get_field( 'banner_sec' );
					if( $headingTxt['second-heading'] ){
						echo '<h2>'.$headingTxt['second-heading'].'</h2>';
					}
					echo '<h1>'.$headingTxt['top-heading'].'</h1>';
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
<?php vcTrustedStartups( $thisPostID ); ?>

<?php  
$specifications = get_field('tech-spec');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){
$htContent 	= $specifications['content'];
$headText 	= fnextractHeadins('h2', $htContent );

$sectionType = (isset($specifications['specifications']) && (count($specifications['specifications']) > 6)) ? 'accordian' : 'grid';

if( $sectionType === 'grid' ){ 
?>
<section id="acf-tech-spec-grid" class="three-column-icon-section padding-t-120 padding-b-120">
	<div class="container">
		<div class="dis-flex top-content">
          <div class="flex-2"><?php echo $headText; ?></div>
          <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
        </div>
		<div class="dis-flex col-box-outer margin-t-50">
		<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
					$vcHasAnchor = vcHasAnchor($row['title'], $row['text']);

					echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
					<div class="box bg-blue-opacity-light">
					<h3>'.$row['title'].'</h3>
					<p>'.$row['text'].'</p>';
					echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
					echo '</div></div>';
				}
			} 
			?>
		</div>
	</div>
</section>
<?php }else{ ?>
<section class="accordion-section padding-t-120" id="acf-tech-spec-accordian">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $specifications['content']; ?></div>
	  
      <?php 
      if( $specifications['image'] ){
      	echo vc_pictureElm($specifications['image'], 'ValueCoders', 'soft-img');
      }else{
      ?>
	  <div class="image-wrap">
			<picture class="soft-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/pro-one.webp">
			<source type="image/jpg" srcset="<?php bloginfo('template_url'); ?>/dev-img/pro-one.jpg">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/pro-one.jpg" width="1280" height="1000" alt="valuecoders">
			</picture> 
			</div>         
			<?php } ?>
	 
    </div>
    <div class="col-right padding-b-120">
		<?php 
		$idx = 0;
		if( $specifications['specifications'] ){
			foreach( $specifications['specifications'] as $row ){
			$hasAnchor 	= (vcHasAnchor( $row['title'] ) !== false ) ? ' has-link' : '';	
			$blnkTitle 	= ( !empty($hasAnchor) ) ? strip_tags($row['title']) : $row['title'];
			$aTitle 		=	(vcHasAnchor( $row['title'] ) !== false ) ? $row['title'] : '';

			$idx++;
			$isActive = ( $idx === 1 ) ? " active" : "";
			echo '<div class="accordionItem'.$isActive.$hasAnchor.'">
				<h3 class="accordion-toggle"><span>'.$blnkTitle.'</span>'.$aTitle.'</h3>
				<div class="accordion-content"><p>'.$row['text'].'</p></div>
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
endif;
?>


<?php
$dev_process = get_field('v3-devprocess');
if( isset( $dev_process['is_enabled'] ) && ($dev_process['is_enabled'] == "yes") ){
$htContent 	= $dev_process['content'];
$headText 	= fnextractHeadins('h2', $htContent ); 
?>
<section class="get-app development-process bg-blue-linear padding-t-120 padding-b-120">
	 <div class="container">
	    <div class="dis-flex justify-sb">
				<div class="flex-2 left-box">
				<div class="inner-box"><?php echo $headText; ?></div>
				</div>
				<div class="flex-2 right-box "><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
	    </div>
	    <?php 
	    if( $dev_process['process'] ){
	    	echo '<div class="app-dprocess dis-flex margin-t-80 justify-sb">';
	    	foreach( $dev_process['process'] as $row ){
	    		echo '<div class="process-item">
		            <div class="pro-title">
		               <div class="nocount"></div>
		               <h3>'.$row['title'].'</h3>
		            </div>
		            <div class="process-circle"></div>
		            <p>'.$row['text'].'</p>
		         </div>';
	    	}
	    	echo '</div>';
	    }
	    ?>
	 </div>
</section>
<?php } ?>

<!--Technology / Framework Section Ends Here-->
<section class="experts-talk-first-section bg-blue-linear padding-t-70 padding-b-70">
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

		<?php
		$ctaTxt_one = (isset($vcBtn['link-one']) && !empty($vcBtn['link-one'])) ? $vcBtn['link-one'] : "Talk To Our Experts";  
		cmnCTA_v3($ctaTxt_one); 
		?>		
	</div>
</section>

<?php  
$specifications = get_field('hp-three-col');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){
$htContent 	= $specifications['content'];
$headText 	= fnextractHeadins('h2', $htContent );  
?>
<section id="tpl-hp-three-col" class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-120 padding-b-120">
	<div class="container">
		<div class="dis-flex top-content">
          <div class="flex-2"><?php echo $headText; ?></div>
          <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
        </div>
		<div class="dis-flex col-box-outer margin-t-50">
		<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
				echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
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
?>

<?php 
$dservice = get_field('v3-dservice');
if( isset( $dservice['is_enabled'] ) && ($dservice['is_enabled'] == "yes") ){
?>
<section class="technology-section tech-section bg-light ">
<div class="dis-flex">
  <div class="left-box  padding-t-120 padding-b-120"><?php echo $dservice['content']; ?></div>
  <div class="right-box">
  	<?php 
		if( $dservice['image'] ){
			echo vc_pictureElm( $dservice['image'], 'ValueCoders' );
		}
		?>     
  </div>
</div>
</section>
<?php } ?>

<?php  
$expframeworks = get_field('php_frame_work_section');
if( $expframeworks ) :
$isfrEnable = $expframeworks['is_enable'];
if( $isfrEnable == "yes" ){
$sectionType = $expframeworks['section_type'];
if( $sectionType == "framework" ){
?>
<section class="technology-section bg-light" id="acf-framework-sec">
  <div class="dis-flex">
    <div class="left-box padding-t-120 padding-b-120">
      <?php 
      echo $expframeworks['content']; 
      if( $expframeworks ){
      	echo '<ul>';
      	foreach($expframeworks['options'] as $row  ){
      		if( $row['link'] ){
      			echo '<li><a href="'.vc_siteurl( $row['link'] ).'">'.$row['title'].'</a></li>';	
      		}else{
      			echo '<li>'.$row['title'].'</li>';	
      		}
      		
      	}
      	echo '</ul>';
      }
      ?>
    </div>
    <div class="right-box">
		<?php 
		if( $expframeworks['image'] ){
			echo vc_pictureElm($expframeworks['image']);
		}else{
		?>
		<picture>
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/pro-two.webp">
			<source type="image/jpg" srcset="<?php bloginfo('template_url'); ?>/dev-img/pro-two.jpg">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/pro-two.jpg" width="1280" height="1000" alt="valuecoders">
		</picture>
		<?php } ?>
    </div>
  </div>  
</section>
<?php 
}else{ 
$techno = $expframeworks['techno'];
$dtype 	= (isset($expframeworks['dtype']) && !empty($expframeworks['dtype'])) ? $expframeworks['dtype'] : 'accordian';
if( $techno ) : 
if( $dtype == "accordian"){	


if( $thisPostID === 190 ){
?>
<section class="technology-section-ser bg-light ">
  <div class="dis-flex">
    <div class="left-box  padding-t-120 padding-b-120">
      <?php echo $expframeworks['content']; ?>
      <?php 
			$rowCount = 0;
			foreach( $techno as $mrow ){ 
				echo '<h3>'.$mrow['cat-name'].'</h3>';
				echo $mrow['tech-listing'];
			}
			?>      
    </div>
    <div class="right-box">
		<?php 
		if( $expframeworks['image'] ){
		echo vc_pictureElm( $expframeworks['image'], 'ValueCoders', 'soft-img' );
		} 
		?>
    </div>
  </div>
</section>
<?php 
}else{ 
?>
<section class="accordion-section padding-t-120" id="sec-techno-accordion">
	<div class="dis-flex accordian-row">
	<div class="col-left">
	  <div class="head-txt">
	  	<?php echo $expframeworks['content']; ?>
	  </div>	  
		<?php 
		if( $expframeworks['image'] ){
			echo vc_pictureElm( $expframeworks['image'], 'ValueCoders', 'soft-img' );
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
	foreach( $techno as $mrow ){ 
		echo '<div class="inner-box">
		<h3>'.$mrow['cat-name'].'</h3>';
		echo $mrow['tech-listing'];
		echo '</div>';
	}
	?>	
	</div>
	</div>
</section>
<?php 
}
}else{
// Grid Design render here 
?>
<section class="tech-stacks padding-t-120 padding-b-120 <?php echo $expframeworks['sc_background']; ?>" id="serv-technology-grid">
  <div class="container">
    <div class="head-txt text-center"><?php echo $expframeworks['content']; ?></div>
    <div class="dis-flex col-box-outer margin-t-50">
    <?php
    if( $techno ){
    	$flexCount = ( count($techno) === 1 ) ? 'flex-1' : 'flex-3';
    	foreach( $techno as $trow ){
    		echo '<div class="'.$flexCount.' col-box"><div class="inner-box">';
    		echo '<h3>'.$trow['cat-name'].'</h3>';
    		echo $trow['tech-listing'];
    		
    		/*if( $trow['tech-listing'] ){
    			echo '<ul>';
    			foreach( $trow['tech-listing'] as $row ){
    				if( $row['link'] ){
    					echo '<li><a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a></li>';
    				}else{
    					echo '<li>'.$row['title'].'</li>';	
    				}    				
    			}
    			echo '</ul>';
    		}*/
    		echo '</div></div>';
    	}
    }
    ?>          
    </div>
  </div>
</section>
<?php 
}
endif;
}
 
} 
endif; ?>

<?php  
$specifications = get_field('types-three-col');
if( $specifications ) :
$isEnable = $specifications['is_enabled'];
if( $isEnable == "yes" ){ 
?>
<section id="tpl-type-three-col" class="three-column-icon-section <?php echo $specifications['sc_background']; ?> padding-t-120 padding-b-120">
	<div class="container">
		<div class="head-txt text-center">
	  		<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer margin-t-50">
			<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
				echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
				<div class="box">
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
?>

<?php  
$whyChoos = get_field('why-choose');
if( $whyChoos ) :
$isWhyEnable = $whyChoos['is_enable'];
if( $isWhyEnable == "yes" ){
$sectionType = (isset($whyChoos['options']) && (count($whyChoos['options']) > 6))	? 'accordian' : 'grid';
if( $sectionType == "accordian" ){
?>
<section class="accordion-section padding-t-120" id="sec-whychoose-accordian">
  <div class="dis-flex accordian-row">
    <div class="col-left">
      <div class="head-txt"><?php echo $whyChoos['content']; ?></div>
      <?php 
      if( $whyChoos['image'] ){
      	echo vc_pictureElm($whyChoos['image'], 'ValueCoders', 'soft-img');
      }else{
      ?>
	   <div class="image-wrap">
			<picture class="soft-img">
			<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png">
			<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png">
			<img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png" width="861" height="455" alt="valuecoders">
			</picture> 
			</div>         
			<?php } ?>
    </div>
    <div class="col-right padding-b-120">
		<?php 
		$idx = 0;
		if( $whyChoos['options'] ){
			foreach( $whyChoos['options'] as $row ){
			$idx++;
			$isActive = ( $idx === 1 ) ? " active" : "";
			echo '<div class="accordionItem'.$isActive.'">
				<h3 class="accordion-toggle">'.$row['title'].'</h3>
				<div class="accordion-content"><p>'.$row['text'].'</p></div>
			</div>';
			}
		} 
		//
		?>
    </div>
  </div>
</section>
<?php }else{ 
$htContent 	= $whyChoos['content'];
$headText 	= fnextractHeadins('h2', $htContent );	
?>
<section id="sec-whychoose-grid" class="three-column-icon-section padding-t-120 padding-b-120">
<div class="container">
	<div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
    </div>
	<div class="dis-flex col-box-outer margin-t-50">
	<?php 
		if( $whyChoos['options'] ){
			foreach( $whyChoos['options'] as $row ){
				$vcHasAnchor = vcHasAnchor($row['title'], $row['text']);
				echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
				<div class="box bg-blue-opacity-light">
				<h3>'.$row['title'].'</h3>
				<p>'.$row['text'].'</p>';
				echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
				echo '</div></div>';
			}
		} 
		?>
	</div>
</div>
</section>
<?php }
}
endif; 
?>

<!--Technology / Framework Section Ends Here-->
<section class="experts-talk-first-section none bg-blue-linear padding-t-70 padding-b-70">
    <div class="container">
		<div class="head-txt text-center">
		<h2>
		<?php 
		echo (isset($vcBtn['title-two']) && !empty($vcBtn['title-two'])) ? $vcBtn['title-two'] : 
		"Let's Discuss Your Project"; ?>
		</h2>
		<p>
		<?php 
		echo (isset($vcBtn['text-two']) && !empty($vcBtn['text-two'])) ? $vcBtn['text-two'] : 
		"Get free consultation and let us know your project idea to turn it into an amazing digital product."; ?></p>
		</div>

		<?php
		$ctaTxt_one = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : "Talk To Our Experts";  
		cmnCTA_v3($ctaTxt_one); 
		?>		
	</div>
</section>

<?php
$whyThis = get_field('v3-whythis');
if( isset( $whyThis['is_enabled'] ) && ($whyThis['is_enabled'] == "yes") ){
$htContent 	= $whyThis['content'];
$headText 	= fnextractHeadins('h2', $htContent ); 
?>
<section id="tpl-tech-stack-v3" class="three-column-icon-section padding-t-120 padding-b-120">
	<div class="container">
		<div class="dis-flex top-content">
      <div class="flex-2"><?php echo $headText; ?></div>
      <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
	  </div>
		<div class="dis-flex col-box-outer">
		<?php 
		if( $whyThis['specifications'] ){
			foreach( $whyThis['specifications'] as $row ){
				$vcHasAnchor = vcHasAnchor($row['title'], $row['text']);
				echo '<div class="flex-3 box-3'.vcHasAnchor($row['title'], $row['text']).'">
				<div class="box bg-blue-opacity-light">
				<h3>'.$row['title'].'</h3>
				<p>'.$row['text'].'</p>';
				echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
				echo '</div></div>';
			}
		} 
		?>
		</div>
	</div>
</section>
<?php 
}
?>

<?php  
$gcDev = get_field('v3-gc-development');
if( $gcDev ) :
//$isgcDev = $gcDev['is_enable'];
if( isset( $gcDev['is_enable'] ) && ($gcDev['is_enable'] == "yes") ) {
?>
<section class="get-app bg-blue-linear padding-t-120 padding-b-120">
	<div class="container dis-flex justify-sb">
		<div class="flex-2 left-box">
		  <div class="inner-box">
		    <h2><?php echo $gcDev['heading']; ?></h2>
		  </div>
		  <?php 
		  if( $gcDev['link'] ){
		  	echo '<a class="title-link" href="'.vc_siteurl($gcDev['link']).'"></a>';
		  }
		  ?>		  
		</div>
		<div class="flex-2 right-box tick-icon-list ">
		  <?php echo $gcDev['content']; ?>
		</div>
	</div>
</section>
<?php 
}
endif; 
?>

<?php 
/*
$twoSec 				= get_field('two_column_layout_page_section');
$twoSecEnable 	= $twoSec['is_enabled'];
if( $twoSecEnable == 'yes' ): 
while( have_rows('two_column_layout_page_section') ): the_row(); 
$twocontent = get_sub_field('section_content_two_col') ;
$twoimg 		= get_sub_field('two_col_section_image') ;
$twoimgwebp = get_sub_field('two_col_section_image_webp') ;
if(count($twoimg)>0){	
?>
<section class="img-two-column-section padding-t-70 padding-b-70">
	<div class="container">
		<div class="dis-flex">
			<div class="flex-2 left-box">
				<picture>
					<source type="<?php echo $twoimgwebp['mime_type'];  ?>" srcset="<?php echo $twoimgwebp['url'];  ?>">
					<source type="<?php echo $twoimg['mime_type'];  ?>" srcset="<?php echo $twoimg['url']; ?>">
					<img loading="lazy" src="<?php echo $twoimg['url'];  ?>" alt="<?php echo get_the_title($thisPostID); ?>" width="<?php echo $twoimgwebp['width'];  ?>" height="<?php echo $twoimgwebp['height'];  ?>"> 
				</picture>
			</div>
			<div class="flex-2 right-box">
				<?php echo $twocontent;  ?>
			</div>
		</div>
	</div>
</section>
<?php } endwhile; ?>
<?php endif; 
*/ 

$twoSec = get_field('two_column_layout_page_section');
if( isset( $twoSec['is_enabled'] ) && $twoSec['is_enabled'] == "yes" ){ 
$htContent 	= $twoSec['section_content_two_col'];
$headText 	= fnextractHeadins('h2', $htContent );	
?>
<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $twoSec['sc_background']; ?>">
  <div class="container">
    <div class="dis-flex top-content half-list">
      <div class="flex-2">
      	<?php echo $headText; ?>
      </div>
      <div class="flex-2">
      	<?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?>            
      </div>
    </div>
  </div>
</section>
<?php 
}
?>


<?php 
/*
//Section Remove in v3.0 
if( !is_page(14118) ) : ?>
<section class="experts-talk-second-section bg-blue-linear padding-t-120 padding-b-120">
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
			<?php
			$ctaTxt_two = (isset($vcBtn['link-two']) && !empty($vcBtn['link-two'])) ? $vcBtn['link-two'] : "Talk To Our Experts";
			cmnCTA_v3( $ctaTxt_two ); 
			?>	
			
		</div>
</section>
<?php endif;
*/
?>

<?php 
$industryServ = get_field('serve-industry');
if( isset( $industryServ['is_enabled'] ) && ($industryServ['is_enabled'] == "yes") ){
	$indBG = (isset($industryServ['sc_background'])) ? $industryServ['sc_background'] : '';	
	getCmnIndustries( $indBG, $industryServ['content'] );		
}
?>

<?php 
$hireModel = get_field('hiring_models');
$hireModelEnable = $hireModel['is_enabled'];
if( $hireModelEnable == 'yes' ) :
?>
<section class="hiring-models padding-t-120 padding-b-120 <?php echo $hireModel['sc_background'] ?>">
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


<?php
$whyhire = get_field('why_hire_section_php');
if( $whyhire ) :
$iswEnabled = $whyhire['is_enable'];
if( $iswEnabled == "yes" ){	
?>
<section class="global-counter padding-t-120 <?php echo $whyhire['sc_background']; ?>">
<div class="container">
<div class="dis-flex justify-sb items-center">
  <div class="flex-2 content-box tick-icon-list">
    <!--
    <small>We Are India’s</small>
    -->
    <?php 
    echo $whyhire['content']; 
    if( $whyhire['options'] ){
    	echo '<ul class="exm-br">';
    	foreach( $whyhire['options'] as $row ){
    		echo '<li>'.$row['title'].'</li>';
    	}	
    	echo '</ul>';
    }
    
    ?>

    <h4>Awards &amp; Certifications -</h4>
    <div class="award-logo dis-flex">
      <div class="logo-box logo1 vlazy"></div>
      <div class="logo-box logo2 vlazy"></div>
      <div class="logo-box logo3 vlazy"></div>
      <div class="logo-box logo4 vlazy"></div>
      <div class="logo-box logo5 vlazy"></div>
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
endif; ?>


<?php 
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
$dtImage 		= $clientele['image'];
$dtImageWebp	= $clientele['image-webp'];

$ltImage 		= $clientele['image-lt'];
$ltImageWebp	= $clientele['image-lt-webp'];
$customClass 	= ( isset( $clientele['custom_class'] ) ) ? $clientele['custom_class'] : "";
?>
<section class="global-companies padding-t-120 padding-b-120 <?php echo $clientele['sc_background']; ?>">
<div class="container">
<div class="dis-flex justify-sb items-center">
  <div class="flex-2 image-box">
    <picture>
      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/global-companies.png" width="861" height="455" alt="valuecoders">
    </picture>
  </div>
  <div class="flex-2 content-box">
  <?php echo $clientele['content']; ?>
  </div>

</div>
</div>
</section>
<?php endif; ?>

<?php getPageCaseStudiesV3( $thisPostID ); ?>

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

<?php 
//Section Removed in v3.0
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
 

$faqs 		= get_field('faq-group');
$faqEnable 	= $faqs['is_enabled'];
if( $faqEnable == "yes" ) :
?>
<section class="faq-section padding-t-120 padding-b-120 <?php echo $faqs['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center"><?php echo $faqs['content'];  ?></div>
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
<div class="free-trail-pop-up" style="display:none;">
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