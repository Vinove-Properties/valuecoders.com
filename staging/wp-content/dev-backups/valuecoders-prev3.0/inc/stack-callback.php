<?php
add_action( 'wp_ajax_cmn-stacks', 'cmn_techstacks_cb' );
add_action( 'wp_ajax_nopriv_cmn-stacks', 'cmn_techstacks_cb' );
function cmn_techstacks_cb(){
$tpl 	= ( isset( $_GET['tpl'] ) && !empty( $_GET['tpl'] ) ) ? $_GET['tpl'] : 0;
if( $tpl == "home-page.php" ){
	get_template_part( 'inc/home', 'techstacks' );
}else{
if( have_rows('tech_stacks_cards', 265) ) : 
?>
<div class="dis-flex col-box-outer for-tech-stack-icon">
<?php
$icon = 0;
while( have_rows('tech_stacks_cards', 265) ) :
the_row(); ?>
	<div class="flex-2 col-box <?php //echo "icon-row-".($icon *3); ?>">
		<div class="logo-box for-box-effect">
			<div class="content-box">
			<h3>
			<?php
			$cardslink = get_sub_field('card_link');
			if( $cardslink ){
				echo '<a href="'.vc_siteurl( $cardslink ).'">'.get_sub_field('card_title').'</a>';
			}else{
				echo get_sub_field('card_title');
			}
			?>
			</h3>

			<?php 
			if( isset( $_GET['tpl'] ) && ($_GET['tpl'] !== "home-page.php") ){
				echo get_sub_field('description'); 
			}			
			?>
			</div>
			<div class="logo-list-box bg-dark-theme">
			<div class="dis-flex">				
			<?php 
			if (have_rows('tech_icon')): ?>
			
			<?php
    $g = 1;
    while (have_rows('tech_icon')): the_row(); 
	if( get_sub_field('tech_icon_link') ){
		echo '<a href="'.vc_siteurl(get_sub_field('tech_icon_link')).'" class="icon-box">';
	}else{
		echo '<span class="icon-box">';
	}
	$tecIconLt 	= get_sub_field('icon-lt');
	$tecIconLtwp 	= get_sub_field('icon-ltwp');
	if( $tecIconLt && $tecIconLtwp ){
	echo '<picture class="lighter-theme-img">
	<source type="image/webp" srcset="'.$tecIconLtwp['url'].'">
	<source type="'.$tecIconLt['mime_type'].'" srcset="'.$tecIconLt['url'].'">
	<img src="'.$tecIconLt['url'].'" alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
	width="'.$tecIconLt['width'].'" height="'.$tecIconLt['height'].'"> 
	</picture>';
	}

	$techIcon 		= get_sub_field('icon-hover');
	$techIconwp 	= get_sub_field('icon-hoverwp');
	if( $techIcon && $techIconwp ){
	echo '<picture class="hover">
	<source type="image/webp" srcset="'.$techIconwp['url'].'">
	<source type="'.$techIcon['mime_type'].'" srcset="'.$techIcon['url'].'">
	<img src="'.$techIcon['url'].'" alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
	width="'.$techIcon['width'].'" height="'.$techIcon['height'].'"> 
	</picture>';
	}

	?>	
	<span class="text"><?php the_sub_field('tech_text_list'); ?></span>
	<?php 
	if( get_sub_field('tech_icon_link') ){
		echo '</a>';
	}else{
		echo '</span>';
	}
	$g++; endwhile; 
	endif; 
	?>
	</div>
	</div>
	</div>
	</div>
	<?php 
	$icon ++;
	endwhile; endif; ?>
	</div>
	<?php 
	}
	die;
}

add_action( 'wp_ajax_cmn-technologies', 'cmn_technologies_cb' );
add_action( 'wp_ajax_nopriv_cmn-technologies', 'cmn_technologies_cb' );
function cmn_technologies_cb(){
$pageID = ( isset( $_GET['page_id'] ) && !empty( $_GET['page_id'] ) ) ? $_GET['page_id'] : 0;
$rowCount = 0;
$expframeworks = get_field('php_frame_work_section', $pageID);

$sectionType = $expframeworks['section_type'];
if( $sectionType == "framework" ){ ?>
	<div class="dis-flex col-box-outer php-frameworks-icons">
			<?php 
			$framecount = 0;
			foreach( $expframeworks['options'] as $row ) : $framecount++; ?>
			<div class="flex-3 box-3">
				<h3>
					<?php 
					if( $row['link'] && ($row['link'] != "#") ){
						echo '<a href="'.vc_siteurl( $row['link'] ).'" class="link-box">';
					}else{
						echo '<span class="link-box">';
					}
					
					$fdicon 	= $row['dark_mode_png_image'];
					$fdiconwp 	= $row['dark_mode_webp_Image'];
					if( $fdicon && $fdiconwp ){
					echo '<picture class="dark-theme-img">
					<source type="image/webp" srcset="'.$fdiconwp['url'].'">
					<source type="'.$fdicon['mime_type'].'" srcset="'.$fdicon['url'].'">
					<img src="'.$fdicon['url'].'" alt="'.vcparseanchor($row['title']).'" 
					width="'.$fdicon['width'].'" height="'.$fdicon['height'].'"> 
					</picture>';
					}
					
					$flicon 	= $row['light_mode_png_image'];
					$fliconwp 	= $row['light_mode_webp_image'];
					if( $flicon && $fliconwp ){
					echo '<picture class="lighter-theme-img">
					<source type="image/webp" srcset="'.tempIconDir($fliconwp['url']).'">
					<source type="'.$flicon['mime_type'].'" srcset="'.tempIconDir($flicon['url']).'">
					<img src="'.tempIconDir($flicon['url']).'" alt="'.vcparseanchor($row['title']).'" 
					width="'.$flicon['width'].'" height="'.$flicon['height'].'"> 
					</picture>';
					}
					?>
					<span class="text-middle"><?php echo $row['title']; ?></span> <i class="circle-arrow-icon"></i>
					<?php 
					if( $row['link'] && ($row['link'] != "#") ){
						echo '</a>';
					}else{
						echo '</span>';
					}
					?>
				</h3>
			</div>
			<?php endforeach; ?>

		</div>	
<?php }else{
	$techno = $expframeworks['techno'];
	foreach( $techno as $mrow ){
	echo '<div class="dis-flex tech-box-outer items-center">';
	echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
	if( $mrow ){
		$rowCount++;
		$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
		echo '<div class="right-box dis-flex '.$isFirst.'">';
		//debug_dd( $mrow['in_technologies'] ); die;
		if( $mrow['in_technologies'] ) :
		foreach( $mrow['in_technologies'] as $row ){
			//debug_dd( $row['icon'] ); die;
			echo '<span class="tech-box">';
			/*$ticon 		= $row['icon'];
			$ticonwp 	= $row['icon-webp'];
			if( $ticon && $ticonwp ){
				echo '<picture class="dark-theme-img img-tech-logo">
				<source type="image/webp" srcset="'.$ticonwp['url'].'">
				<source type="'.$ticon['mime_type'].'" srcset="'.$ticon['url'].'">
				<img src="'.$ticon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$ticon['width'].'" 
				height="'.$ticon['height'].'"> 
				</picture>';
			}*/

			$tiltcon 		= $row['icon-lt'];
			$tiltconwp 		= $row['icon-lt-webp'];
			if( $tiltcon && $tiltconwp ){
				echo '<picture class="lighter-theme-img img-tech-logo">
				<source type="image/webp" srcset="'.tempIconDir($tiltconwp['url']).'">
				<source type="'.$tiltcon['mime_type'].'" srcset="'.tempIconDir($tiltcon['url']).'">
				<img src="'.tempIconDir($tiltcon['url']).'" alt="'.vcparseanchor($row['title']).'" width="'.$tiltcon['width'].'" 
				height="'.$tiltcon['height'].'"></picture>';
			}
			echo '<span class="tech-txt">'.$row['title'].'</span></span>';	
		}
		endif;
		echo '</div>';
	}
	echo '</div>';	
	}	
}	

die;
}

add_action( 'wp_ajax_cmn-servtechstacks', 'loadSercivesTechStackCB' );
add_action( 'wp_ajax_nopriv_cmn-servtechstacks', 'loadSercivesTechStackCB' );
function loadSercivesTechStackCB(){
	$pageID 		= ( isset( $_GET['page_id'] ) && !empty( $_GET['page_id'] ) ) ? $_GET['page_id'] : 0;
	$expframeworks 	= get_field('php_frame_work_section', $pageID);
	$isBlockChain 	= get_field('bc_specific', $pageID);
	$isBcContent  	= false;
	if( isset($isBlockChain['is-enable']) && ($isBlockChain['is-enable'] == "yes") ){
	if( $isBlockChain['main-bc'] ){
		$isBcContent = ( $expframeworks ) ? $expframeworks['content'] : '';
		$expframeworks = get_field( 'php_frame_work_section', $isBlockChain['main-bc'] );	
	}	
	}

	if( $expframeworks ) :
	$isfrEnable = $expframeworks['is_enable'];
	if( $isfrEnable == "yes" ) {
	$sectionType 	= $expframeworks['section_type']; 
	$techno 		= $expframeworks['techno'];
	if( ($sectionType == "technology") && $techno ){
	$maxClass 		= ( isset($expframeworks['show-cat-lc']) && ($expframeworks['show-cat-lc'] == "no") ) ? "" : " for-max-six-icon ";
	$rowCount 		= 0;

	foreach( $techno as $mrow ){
	echo '<div class="dis-flex tech-box-outer items-center">';
	echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
	if( $mrow ){
		$rowCount++;
		$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
		echo '<div class="right-box dis-flex '.$maxClass.' '.$isFirst.'">';
		foreach( $mrow['in_technologies'] as $row ){
			//debug_dd( $row['icon'] ); die;
			echo '<span class="tech-box">';
			echo ( $row['link'] ) ? '<a href="'.vc_siteurl($row['link']).'">': '';
			/*
			$ticon 		= $row['icon'];
			$ticonwp 	= $row['icon-webp'];
			if( $ticon && $ticonwp ){
				echo '<picture class="dark-theme-img img-tech-logo">
				<source type="image/webp" srcset="'.$ticonwp['url'].'">
				<source type="'.$ticon['mime_type'].'" srcset="'.$ticon['url'].'">
				<img src="'.$ticon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$ticon['width'].'" 
				height="'.$ticon['height'].'"> 
				</picture>';
			}
			*/

			$tiltcon 		= $row['icon-lt'];
			$tiltconwp 		= $row['icon-lt-webp'];
			if( $tiltcon && $tiltconwp ){
				echo '<picture class="lighter-theme-img img-tech-logo">
				<source type="image/webp" srcset="'.tempIconDir($tiltconwp['url']).'">
				<source type="'.$tiltcon['mime_type'].'" srcset="'.tempIconDir($tiltcon['url']).'">
				<img src="'.tempIconDir($tiltcon['url']).'" alt="'.vcparseanchor($row['title']).'" width="'.$tiltcon['width'].'" 
				height="'.$tiltcon['height'].'"></picture>';
			}
			echo '<span class="tech-txt">'.$row['title'].'</span>';
			echo ( $row['link'] ) ? '</a>': '';
			echo '</span>';	
		}
		echo '</div>';
	}
	echo '</div>';	
	}
	/*
	echo '<div class="text-center margin-t-100">';
	vc_cta();
	echo '</div>';
	*/
	}
	}
	endif;
	die;
}

add_action( 'wp_ajax_cmn-technologies265', 'cmnTechnologies265CB' );
add_action( 'wp_ajax_nopriv_cmn-technologies265', 'cmnTechnologies265CB' );
function cmnTechnologies265CB(){
	$debug_row = get_field( 'tech_stacks_cards', 265 );
		if (have_rows('tech_stacks_cards', 265)): ?>
		<div class="dis-flex col-box-outer for-tech-stack-icon">
		<?php
    	$icon = 0;
    	while( have_rows( 'tech_stacks_cards', 265 ) ) :
        the_row(); ?>
			<div class="flex-2 col-box">
				<div class="logo-box for-box-effect">
					<div class="content-box">
					<h3>
					<?php
					$cardslink 	= get_sub_field( 'card_link' );
					if( $cardslink ){
						echo '<a href="'.vc_siteurl( $cardslink ).'">'.get_sub_field('card_title').'</a>';
					}else{
						echo get_sub_field('card_title');
					}
					?>
					</h3>
					</div>
					<div class="logo-list-box bg-dark-theme">
					<div class="dis-flex">
					<?php if (have_rows('tech_icon')): 
		            $g = 1;
		            while (have_rows('tech_icon')):
                	the_row(); 
						if( get_sub_field('tech_icon_link') ){
							echo '<a href="'.vc_siteurl(get_sub_field('tech_icon_link')).'" class="icon-box">';
						}else{
							echo '<span class="icon-box">';
						}
						/*$tecIcon 	= get_sub_field('icon');
						$tecIconwp 	= get_sub_field('icon-webp');
						if( $tecIcon && $tecIconwp ){
						echo '<picture class="dark-theme-img">
						<source type="image/webp" srcset="'.$tecIconwp['url'].'">
						<source type="'.$tecIcon['mime_type'].'" srcset="'.$tecIcon['url'].'">
						<img src="'.$tecIcon['url'].'" alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
						width="'.$tecIcon['width'].'" height="'.$tecIcon['height'].'"> 
						</picture>';
						}*/

						$tecIconLt 	= get_sub_field('icon-lt');
						$tecIconLtwp 	= get_sub_field('icon-ltwp');
						if( $tecIconLt && $tecIconLtwp ){
						echo '<picture class="lighter-theme-img">
						<source type="image/webp" srcset="'.$tecIconLtwp['url'].'">
						<source type="'.$tecIconLt['mime_type'].'" srcset="'.$tecIconLt['url'].'">
						<img src="'.$tecIconLt['url'].'" 
						alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
						width="'.$tecIconLt['width'].'" height="'.$tecIconLt['height'].'"> 
						</picture>';
						}

						$techIcon 		= get_sub_field('icon-hover');
						$techIconwp 	= get_sub_field('icon-hoverwp');
						if( $techIcon && $techIconwp ){
						echo '<picture class="hover">
						<source type="image/webp" srcset="'.$techIconwp['url'].'">
						<source type="'.$techIcon['mime_type'].'" srcset="'.$techIcon['url'].'">
						<img src="'.$techIcon['url'].'" 
						alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
						width="'.$techIcon['width'].'" height="'.$techIcon['height'].'"> 
						</picture>';
						}

						?>	
						<span class="text"><?php echo get_sub_field('tech_text_list'); ?></span>
						<?php 
						if( get_sub_field('tech_icon_link') ){
							echo '</a>';
						}else{
							echo '</span>';
						}
						$g++; 
						endwhile; 
						endif; 
						?>
					</div>
					</div>
				</div>
	
			</div>
			<?php 
			$icon ++;
    		endwhile; ?>
		</div>
		<!-- <div class="text-center margin-t-70"><?php //vc_cta(); ?></div> -->
		<?php endif;
		die;
}


add_action( 'wp_ajax_cmn-hiretechstacks', 'cmnHireTechStackCB' );
add_action( 'wp_ajax_nopriv_cmn-hiretechstacks', 'cmnHireTechStackCB' );
function cmnHireTechStackCB(){
$pageID 		= ( isset( $_GET['page_id'] ) && !empty( $_GET['page_id'] ) ) ? $_GET['page_id'] : 0;
$expframeworks 	= get_field('php_frame_work_section', $pageID);	
if( $expframeworks ):
$sectionType = $expframeworks['section_type'];
if( $sectionType == "framework" ){
	$framecount = 0;
	foreach( $expframeworks['options'] as $row ) : $framecount++; ?>
	<div class="flex-3 box-3">
		<h3>
			<?php 
			if( $row['link'] ){
				echo '<a href="'.vc_siteurl($row['link']).'" class="link-box">';
			}else{
				echo '<span class="link-box">';
			}
			?>					
			<?php 
			
			$fdicon 	= $row['dark_mode_png_image'];
			$fdiconwp 	= $row['dark_mode_webp_Image'];
			if( $fdicon && $fdiconwp ){
			echo '<picture class="dark-theme-img">
			<source type="image/webp" srcset="'.$fdiconwp['url'].'">
			<source type="'.$fdicon['mime_type'].'" srcset="'.$fdicon['url'].'">
			<img loading="lazy" src="'.$fdicon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$fdicon['width'].'" height="'.$fdicon['height'].'"> 
			</picture>';	
			}
			
			$flicon 	= $row['light_mode_png_image'];
			$fliconwp 	= $row['light_mode_webp_image'];
			if( $flicon && $fliconwp ){
			echo '<picture class="lighter-theme-img">
			<source type="image/webp" srcset="'.tempIconDir($fliconwp['url']).'">
			<source type="'.$flicon['mime_type'].'" srcset="'.tempIconDir($flicon['url']).'">
			<img loading="lazy" src="'.tempIconDir($flicon['url']).'" alt="'.vcparseanchor($row['title']).'" width="'.$flicon['width'].'" height="'.$flicon['height'].'"> 
			</picture>';	
			}
			?>
			<span class="text-middle"><?php echo $row['title']; ?></span> <i class="circle-arrow-icon vlazy"></i>
			<?php 
			if( $row['link'] ){
				echo '</a>';
			}else{
				echo '</span>';
			}
			?>
		</h3>
	</div>
	<?php endforeach;
}else{
	$techno = $expframeworks['techno'];
	$rowCount = 0;
	foreach( $techno as $mrow ){
	echo '<div class="dis-flex tech-box-outer items-center">';
	echo '<div class="left-box"><h3>'.$mrow['cat-name'].'</h3></div>';
	if( $mrow ){
		$rowCount++;
		$isFirst = ( $rowCount === 1 ) ? " no-border" : "";
		echo '<div class="right-box for-max-six-icon dis-flex '.$isFirst.'">';
		foreach( $mrow['in_technologies'] as $row ){
			echo '<span class="tech-box">';
			/*
			$ticon 		= $row['icon'];
			$ticonwp 	= $row['icon-webp'];
			if( $ticon && $ticonwp ){
				echo '<picture class="dark-theme-img img-tech-logo">
				<source type="image/webp" srcset="'.$ticonwp['url'].'">
				<source type="'.$ticon['mime_type'].'" srcset="'.$ticon['url'].'">
				<img loading="lazy" src="'.$ticon['url'].'" alt="'.vcparseanchor($row['title']).'" width="'.$ticon['width'].'" 
				height="'.$ticon['height'].'"> 
				</picture>';
			}
			*/
			/*
			$tiltcon 		= $row['icon-lt'];
			$tiltconwp 		= $row['icon-lt-webp'];
			if( $tiltcon && $tiltconwp ){
				echo '<picture class="lighter-theme-img img-tech-logo">
				<source type="image/webp" srcset="'.tempIconDir($tiltconwp['url']).'">
				<source type="'.$tiltcon['mime_type'].'" srcset="'.tempIconDir($tiltcon['url']).'">
				<img loading="lazy" src="'.tempIconDir($tiltcon['url']).'" alt="'.vcparseanchor($row['title']).'" width="'.$tiltcon['width'].'" 
				height="'.$tiltcon['height'].'"></picture>';
			}
			*/
			echo '<span class="tech-txt">'.$row['title'].'</span></span>';	
		}
		echo '</div>';
	}
	echo '</div>';	
	}
	/*
	echo '<div class="text-center margin-t-100">';
	vc_cta();
	echo '</div>';
	*/

}	
endif;
die;
}