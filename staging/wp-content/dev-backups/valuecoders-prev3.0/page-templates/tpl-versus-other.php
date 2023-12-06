<?php
/*
Template Name: Versus Other Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section text-center">
	<div class="container">
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<div class="margin-t-70"><?php vc_cta(); ?></div>
	</div>
</section>

<?php  	
$profiles = get_field('three-steps');
$iprofilesEnable = $profiles['is_enabled'];
if( $iprofilesEnable == "yes" ) :
?>
<section class="three-column-logo-box-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2><?php echo $profiles['title']; ?></h2>
		</div>
		<?php 
		if( $profiles['content_block'] ){
			echo '<div class="dis-flex col-box-outer margin-t-100">';
			foreach( $profiles['content_block'] as $row ) {
				echo '<div class="flex-3">
				<div class="list-box-outer">
					<div class="head-box clr-white bg-voilet">';
						$tdarklg 	= $row['logo-dark'];
						$tdarklgwp 	= $row['logo-dark-wp'];
						if( $tdarklg && $tdarklgwp ){
						echo '<picture class="dark-theme-img">
						<source type="image/webp" srcset="'.$tdarklgwp['url'].'">
						<source type="'.$tdarklg['mime_type'].'" srcset="'.$tdarklg['url'].'">
						<img loading="lazy" src="'.$tdarklg['url'].'" alt="ValueCoders" width="'.$tdarklg['width'].'" 
						height="'.$tdarklg['height'].'"> 
						</picture>';
						}

						$tlightlg 		= $row['logo-light'];
						$tlightlgwp 	= $row['logo-light-wp'];
						if( $tlightlg && $tlightlgwp ){
						echo '<picture class="lighter-theme-img">
						<source type="image/webp" srcset="'.$tlightlgwp['url'].'">
						<source type="'.$tlightlg['mime_type'].'" srcset="'.$tlightlg['url'].'">
						<img loading="lazy" src="'.$tlightlg['url'].'" alt="ValueCoders" width="'.$tlightlg['width'].'" 
						height="'.$tlightlg['height'].'"> 
						</picture>';
						}
					echo '</div>
					<div class="list-box">'.$row['content'].'</div>
				</div>
			</div>';
			}
			echo '</div>';
		}
		?>
	</div>
</section>
<?php endif; ?>

<?php  
$ibox = get_field('ibox-cards');
if( $ibox ) :
$iBoxEnable = $ibox['is_enable'];
if( $iBoxEnable == "yes" ) {
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="three-column-icon-section <?php echo $ibox['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $ibox['content']; ?>
		</div>
		<?php if( $ibox['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $ibox['options'] as $row ) : $wcount++; ?>
			<div class="flex-<?php echo $gridType; ?> box-3">
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
	</div>
</section>
<?php 
}
endif; ?>

<?php  
$ibox = get_field('ibox-cards-alternet');
if( $ibox ) :
$iBoxEnable = $ibox['is_enable'];
if( $iBoxEnable == "yes" ) {
$gridType = ( isset($ibox['grid-column']) && !empty($ibox['grid-column']) ) ? $ibox['grid-column'] : 3;
?>
<section class="three-column-icon-section <?php echo $ibox['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $ibox['content']; ?>
		</div>
		<?php if( $ibox['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $ibox['options'] as $row ) : $wcount++; ?>			
			<div class="flex-2 box-3">
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
	</div>
</section>
<?php 
}
endif; ?>

<section class="table-list-section for-yellow-head bg-dark-theme padding-t-150 padding-b-150">
	<div class="container">
		
		<?php if( is_page( 10652 ) ){ ?>
		<div class="head-txt text-center">
			<h2>Comparative Analysis: ValueCoders vs Toptal vs Upwork</h2>
		</div>	
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Factor</li>
					<li>Rates of Developers</li>
					<li>Risk free Trial</li>
					<li>Time to get right developers</li>
					<li>Time to start a project</li>
					<li>Time to scale size of the team</li>
					<li>Project failure risk</li>
					<li>Dedicated resources</li>
					<li>Quality guarantee</li>
					<li>Agile Development Methodology</li>
					<li>Structured Training </li>
					<li>Communications</li>
					<li>Money Back Guarantee</li>
					<li>IPR Protection</li>
					<li>Complementary Development Manager</li>
				</ul>
			</div>
			<div class="flex-4 table-list bg-row-yellow">
				<ul>
					<li class="title">ValueCoders</li>					
					<li>$15-$30</li>
					<li>15 Days</li>
					<li>1 day - 2 weeks</li>
					<li>1 day - 2 weeks</li>
					<li>48 hours - 1 week</li>
					<li>Extremely low, we have a <br>98% success ratio</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Seamless</li>
					<li>100% money-back guarantee</li>
					<li>Strict NDA with both client <br> and employee</li>
					<li>Yes</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Toptal</li>
					<li>Starting at $3 per hour</li>
					<li>No </li>
					<li>1 - 12 weeks</li>
					<li>2 - 10 weeks</li>
					<li>1 - 12 weeks</li>
					<li>High</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>No </li>
					<li>No </li>
					<li>No</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Upwork</li>
					<li>$60-$150 per hour</li>
					<li>No</li>
					<li>1 - 12 weeks</li>
					<li>1 - 10 weeks</li>
					<li>1 - 12 weeks</li>
					<li>High</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>No</li>
					<li>No</li>
				</ul>
			</div>
		</div>
		<?php }elseif( is_page(11922) ){ ?>
		<div class="head-txt text-center">
			<h2>Comparative Analysis: ValueCoders vs Remote vs Deel</h2>
		</div>
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Factor</li>
					<li>Rates of Developers</li>
					<li>Risk free Trial</li>
					<li>Time to get right developers</li>
					<li>Time to start a project</li>
					<li>Time to scale size of the team</li>
					<li>Project failure risk</li>
					<li>Dedicated resources</li>
					<li>Quality guarantee</li>
					<li>Agile Development Methodology</li>
					<li>Structured Training </li>
					<li>Communications</li>
					<li>Money Back Guarantee</li>
					<li>IPR Protection</li>
					<li>Complementary Development Manager</li>
				</ul>
			</div>
			<div class="flex-4 table-list bg-row-yellow">
				<ul>
					<li class="title">ValueCoders</li>					
					<li>$15-$30</li>
					<li>15 Days</li>
					<li>1 day - 2 weeks</li>
					<li>1 day - 2 weeks</li>
					<li>48 hours - 1 week</li>
					<li>Extremely low, we have a <br>98% success ratio</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Seamless</li>
					<li>100% money-back guarantee</li>
					<li>Strict NDA with both client <br> and employee</li>
					<li>Yes</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Remote</li>
					<li>$60-$90 per hour</li>
					<li>No </li>
					<li>1 - 12 weeks</li>
					<li>2 - 10 weeks</li>
					<li>1 - 12 weeks</li>
					<li>High</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>No </li>
					<li>No </li>
					<li>No</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Deel</li>
					<li>$40-$150 per hour</li>
					<li>No</li>
					<li>1 - 12 weeks</li>
					<li>1 - 10 weeks</li>
					<li>1 - 12 weeks</li>
					<li>Moderate</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>No</li>
					<li>No</li>
				</ul>
			</div>
		</div>	
		<?php }else{ ?>
		<div class="head-txt text-center">
			<h2>Comparative Analysis: ValueCoders vs Freelancer vs RentaCoder</h2>
		</div>	
		<div class="dis-flex col-box-outer margin-t-100">
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Factor</li>
					<li>Rates of Developers</li>
					<li>Risk free Trial</li>
					<li>Time to get right developers</li>
					<li>Time to start a project</li>
					<li>Time to scale size of the team</li>
					<li>Project failure risk</li>
					<li>Dedicated resources</li>
					<li>Quality guarantee</li>
					<li>Agile Development Methodology</li>
					<li>Structured Training </li>
					<li>Communications</li>
					<li>Money Back Guarantee</li>
					<li>IPR Protection</li>
					<li>Complementary Development Manager</li>
				</ul>
			</div>
			<div class="flex-4 table-list bg-row-yellow">
				<ul>
					<li class="title">ValueCoders</li>					
					<li>$15-$30</li>
					<li>15 Days</li>
					<li>1 day - 2 weeks</li>
					<li>1 day - 2 weeks</li>
					<li>48 hours - 1 week</li>
					<li>Extremely low, we have a <br>98% success ratio</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Yes</li>
					<li>Seamless</li>
					<li>100% money-back guarantee</li>
					<li>Strict NDA with both client <br> and employee</li>
					<li>Yes</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">Freelancer</li>
					<li>Starting at $5 per hour</li>
					<li>No </li>
					<li>1 - 12 weeks</li>
					<li>2 - 10 weeks</li>
					<li>1 - 12 weeks</li>
					<li>High</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>No </li>
					<li>No </li>
					<li>No</li>
				</ul>
			</div>
			<div class="flex-4 table-list">
				<ul>
					<li class="title clr-white">RentaCoder</li>
					<li>Starting at $60 per hour</li>
					<li>No</li>
					<li>1 - 12 weeks</li>
					<li>1 - 10 weeks</li>
					<li>1 - 12 weeks</li>
					<li>High</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>Uncertain</li>
					<li>No</li>
					<li>No</li>
					<li>No</li>
				</ul>
			</div>
		</div>	
		<?php } ?>
		<div class="text-center margin-t-100"><?php vc_cta(); ?></div>
	</div>
</section>
<?php get_footer(); ?>