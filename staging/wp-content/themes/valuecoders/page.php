<?php get_header(); ?>

<section class="second-level-section">
	<div class="container">

		<div class="dis-flex">
			<?php if( have_rows('hire_page_hero_section') ): ?>
			<?php while( have_rows('hire_page_hero_section') ): the_row(); 

        // Get sub field values.
        $primetitle = get_sub_field('hire_php_dev_hero_primary_title');
        $sectitle = get_sub_field('hire_php_dev_hero_secondary_title');
				$heroimage = get_sub_field('hire_php_dev_hero_image');
				$heromobimage = get_sub_field('hire_php_dev_mobile_hero_image');
				$heroquestion = get_sub_field('hero_question_content');
				$herocta = get_sub_field('hore_hero_hero_cta');
				$bottomtxt = get_sub_field('hire_hero_bottom_text')

        ?>
			<div class="left-box flex-2 tick-icon-list">
				<h1><span class="head-small clr-white">
						<?php echo $primetitle; ?>
					</span>
					<?php echo $sectitle; ?>
				</h1>
				<?php 
		    	while( have_posts() ) : the_post(); 
					the_content();
			   	endwhile;
				?>
				<?php dynamic_sidebar('vc-profile'); ?>
			</div>
			<div class="flex-2">
				<div class="right-box bg-blue-opacity">
					<div class="text-center">
						<i class="php-banner-icon"></i>
					</div>
					<div class="hire-services-head clr-white">
						<?php echo $heroquestion;  ?>

					</div>
					<?php
					if( $herocta ): 
          $link_url = $herocta['url'];
          $link_title = $herocta['title'];
          ?>
					<a class="green-btn" href="<?php echo esc_url( $link_url ); ?>">
						<?php echo esc_html( $link_title ); ?> <i class="arrow-icon"></i>
					</a>
					<?php endif; ?>
					<span class="form-link-outer">
						<?php echo $bottomtxt; ?>
					</span>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>

	</div>
</section>

<?php  
$specifications = get_field('tech-spec');
//debug_dd( $specifications ); die;
if( $specifications ) :
?>
<section class="three-column-icon-section bg-dark-theme padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $specifications['content']; ?>
		</div>
		<div class="dis-flex col-box-outer">
			<?php 
			if( $specifications['specifications'] ){
				foreach( $specifications['specifications'] as $row ){
				echo '<div class="flex-3 box-3">
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
<?php endif; ?>



<?php  
$expframeworks = get_field('php_frame_work_section');
if( $expframeworks ) :
?>
<section class="link-three-column-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $expframeworks['content']; ?>
		</div>
		<div class="dis-flex col-box-outer php-frameworks-icons">
			<?php 
			$framecount = 0;
			foreach( $expframeworks['options'] as $row ) : $framecount++; ?>
			<div class="flex-3 box-3">
				<h3>
					<a href="<?php echo $row['link']; ?>" class="link-box">
						<i class="icon icon<?php echo $framecount; ?>"></i><span class="text-middle">
							<?php echo $row['title']; ?>
						</span> <i class="circle-arrow-icon"></i>
					</a>
				</h3>
			</div>
			<?php endforeach; ?>

		</div>

	</div>
</section>
<?php endif; ?>

<?php  
$whyChoos = get_field('why-choose');
if( $whyChoos ) :
?>
<section class="three-column-icon-section bg-dark-theme padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $whyChoos['content']; ?>
		</div>
		<?php if( $whyChoos['options'] ) : ?>
		<div class="dis-flex col-box-outer php-usage-sprite">
			<?php 
			$wcount = 0;
			foreach( $whyChoos['options'] as $row ) : $wcount++; ?>
			<div class="flex-3 box-3">
				<div class="box bg-blue-opacity-light">
					<span class="icon-box icon<?php echo $wcount; ?>"></span>
					<h3>
						<?php echo $row['title']; ?>
					</h3>
					<p>
						<?php echo $row['text']; ?>
					</p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="text-center margin-t-100">
			<a class="green-btn" href="https://www.valuecoders.com/contact">Book an Appointment <i class="arrow-icon"></i></a>
			<span class="form-link-outer">
				Or, <button onclick="focusFunction()" class="form-link clr-white">Use this form to share your
					requirements.</button> <span class="block">Get guaranteed response within 8 Hrs.</span>
			</span>
		</div>
	</div>
</section>
<?php endif; ?>


<?php  
$whyhire = get_field('why_hire_section_php');
if( $whyhire ) :
?>
<section class="icon-with-img-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2">
				<div class="head-txt">
					<?php echo $whyhire['content']; ?>
				</div>
				<?php if( $whyhire['options'] ) : ?>
				<div class="dis-flex hire-php-icon icon-box-outer">
					<?php 
		    	$whcount = 0;
		    	foreach( $whyhire['options'] as $row ) : $whcount++; ?>
					<div class="flex-2 margin-t-50">
						<div class="flex-3 box-3">
							<div class="dis-flex items-center">
								<span class="icon icon<?php echo $whcount; ?>"></span>
								<span class="icon-txt">
									<?php echo $row['title']; ?>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>


			<div class="flex-2 text-right right-box">
				<?php if(!wp_is_mobile()) : ?>
				<picture>
					<source type="image/png" srcset="<?php echo $whyhire['image']; ?>">
					<source type="image/png" srcset="<?php echo $whyhire['image']; ?>">
					<img loading="lazy" src="<?php echo $whyhire['image']; ?>" alt="Valuecoders" width="674" height="755">
				</picture>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
$ourclientimagewebp = get_field('section_image_light_theme_webp','option'); 
$ourclientimagedarkwebp = get_field('section_image_dark_theme_webp','option'); 
if(count($ourclientimagedarkwebp)>0 || count($ourclientimagewebp)>0){
?>
<section class="client-img-section padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer items-center">
			<div class="flex-2 left-box">
			<?php
				if($ourclientimagedarkwebp['url']!=''){
?>
				<picture class="dark-theme-img">
					<source type="<?php echo $ourclientimagedarkwebp['mime_type']; ?>" srcset="<?php echo $ourclientimagedarkwebp['url']; ?>">
					<source type="image/png" srcset="<?php the_field('section_image_dark_theme_we_work_with','option'); ?>">
					<img loading="lazy" src="<?php the_field('section_image_dark_theme_we_work_with','option'); ?>"
						alt="<?php echo $ourclientimagedarkwebp['alt']; ?>" width="<?php echo $ourclientimagedarkwebp['width']; ?>" height="<?php echo $ourclientimagedarkwebp['height']; ?>">
				</picture>
				<?php } ?>
				<?php
				if($ourclientimagewebp['url']!=''){
?>
				<picture class="lighter-theme-img">
				<source type="<?php echo $ourclientimagewebp['mime_type']; ?>" srcset="<?php echo $ourclientimagewebp['url']; ?>">
					<source type="image/png" srcset="<?php the_field('section_image_light_theme_we_work_with','option'); ?>">
					<img loading="lazy" src="<?php the_field('section_image_light_theme_we_work_with','option'); ?>"
						alt="<?php echo $ourclientimagewebp['alt']; ?>" width="<?php echo $ourclientimagewebp['width']; ?>" height="<?php echo $ourclientimagewebp['height']; ?>">
				</picture>
				<?php } ?>
			</div>
			<div class="flex-2 right-box tick-icon-list">
				<div class="head-txt">
					<h2>
						<?php the_field('section_title_we_work_with', 'option') ?>
					</h2>
					<p>
						<?php the_field('section_content_we_work_with','option'); ?>
					</p>
				</div>
				<?php if( have_rows('section_list_content_we_work_with', 'option') ): ?>
				<ul>
					<?php while( have_rows('section_list_content_we_work_with', 'option') ): the_row(); ?>
					<li>
						<?php the_sub_field('list_item_we_work','option'); ?>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="text-center margin-t-100">
			<a class="green-btn" href="https://www.valuecoders.com/contact">Book an Appointment <i class="arrow-icon"></i></a>
			<span class="form-link-outer">
				Or, <button onclick="focusFunction()" class="form-link clr-white">Use this form to share your
					requirements.</button> <span class="block">Get guaranteed response within 8 Hrs.</span>
			</span>
		</div>
	</div>
</section>
<?php
}
?>
<section class="table-list-section bg-dark-theme padding-t-150 padding-b-150">
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

<section class="step-icon-img-section padding-t-150 padding-b-150">

	<div class="container">
		<?php if( have_rows('hire_php_developers') ): ?>
		<?php while( have_rows('hire_php_developers') ): the_row(); 
				$txttitle = get_sub_field('title');
				$txtcontents = get_sub_field('content');
        ?>
		<div class="head-txt text-center">
			<h2>
				<?php echo $txttitle; ?>
			</h2>
			<p>
				<?php echo $txtcontents; ?>
			</p>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php if( have_rows('hiring_process_steps', 'option') ): ?>
		<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
			<?php $c = 1; ?>
			<?php if($c == 5) ?>
			<?php while( have_rows('hiring_process_steps', 'option') ): the_row(); 
        $hiretitle = get_sub_field('step_title', 'option');
				$hiredescription = get_sub_field('step_description','option');
        ?>
			<div class="flex-5 icon-box <?php if($c == 5) { echo 'final-step'; } ?> ">
				<i class="icon icon<?php echo $c; ?>"></i>
				<h3>
					<?php echo $hiretitle;  ?>
				</h3>
				<p>
					<?php echo $hiredescription; ?>
				</p>
			</div>
			<?php $c++; ?>
			<?php endwhile;  ?>
		</div>
		<?php endif; ?>

		<picture class="dark-theme-img">
			<source type="image/webp" srcset="<?php the_field('hiring_process_image__dark_theme_','option'); ?>">
			<source type="image/png" srcset="<?php the_field('hiring_process_image__dark_theme_','option'); ?>">
			<img loading="lazy" src="<?php the_field('hiring_process_image__dark_theme_','option'); ?>" alt="Valuecoders"
				width="1620" height="315">
		</picture>
		<picture class="lighter-theme-img">
			<source type="image/webp" srcset="<?php the_field('hiring_process_image__light_theme','option'); ?>">
			<source type="image/png" srcset="<?php the_field('hiring_process_image__light_theme','option'); ?>">
			<img loading="lazy" src="<?php the_field('hiring_process_image__light_theme','option'); ?>" alt="Valuecoders"
				width="1620" height="315">
		</picture>

		<div class="dis-flex justify-center hiring-step-sprite">
			<?php if( have_rows('hiring_process_final_step', 'option') ): ?>
			<?php while( have_rows('hiring_process_final_step', 'option') ): the_row(); 
      $fsteptitle = get_sub_field('step_title' , 'option');
			$fstepdescription = get_sub_field('step_description' , 'option')
		?>
			<div class="flex-4 icon-box text-center not-step">
				<i class="icon icon6"></i>
				<h3>
					<?php echo $fsteptitle ;  ?>
				</h3>
				<p>
					<?php echo $fstepdescription ;  ?>
				</p>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php 
$developers = get_field('developers-group');
if( $developers ) :
?>
<section class="blog-column-section padding-t-150 padding-b-150 bg-dark-theme">
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
								<h3>
									<?php echo $row['name']; ?>
								</h3>
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
			endif; ?>
		</div>
		<div class="text-center margin-t-100">
			<a class="green-btn" href="https://www.valuecoders.com/contact">Book an Appointment <i class="arrow-icon"></i></a>
			<span class="form-link-outer">
				Or, <button onclick="focusFunction()" class="form-link clr-white">Use this form to share your
					requirements.</button> <span class="block">Get guaranteed response within 8 Hrs.</span>
			</span>
		</div>
	</div>
</section>
<?php endif; ?>

<?php 
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );
if( $testimonailsList ) :
?>
<section class="client-video-section padding-t-150 padding-b-150">
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
			<div role="tablist" class="dots"></div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php 
$guideTopics = get_field('guide-topics');
if( $guideTopics ) :
?>
<section class="tab-scroll-section padding-t-150 padding-b-150 bg-dark-theme">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $guideTopics['content']; ?>
		</div>
		<?php 
		$topics = $guideTopics['topics'];
		if( $topics ) :
		?>
		<div id="tabs1" class="dis-flex margin-t-100 tab-contents no-js">
			<div class="left-tabs">
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
						echo '<a href="#" class="tab-link '.$isActive.'">'.$topicNav['title'].'</a>';
					} 
					?>
				</div>
			</div>
			<div class="right-tabs">
				<?php 
				$tn = 0;
				foreach( $topics as $topicText ){
					$tn++;
					$isActive = "";
					if( $tn == 1 ){
						$isActive = "is-active";
					}
					echo '<div class="tab-content '.$isActive.'">'.$topicText['text'].'</div>';
				} 
				?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>



<section class="latest-article-post-section padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
			<h2>
				<?php the_field('section_title_latest_posts','option'); ?>
			</h2>
			<p>
				<?php the_field('section_description_latest_posts','option'); ?>
			</p>
		</div>
		<div class="dis-flex margin-t-100">
			<?php
$args = array( 'numberposts' => 3 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
			<div class="flex-3 col-box">
				<picture>
					<?php  echo the_post_thumbnail();?>
				</picture>
				<div class="content-box">
					<div class="blog-detail dis-flex items-center">
						<i class="profile-icon"></i>
						<?php echo get_the_author(); ?>
						<i class="calender-icon"></i>
						<?php echo get_the_date(); ?>
					</div>
					<div class="blog-content">
						<h3>
							<?php the_title(); ?>
						</h3>
						<p>
							<?php the_excerpt(); ?>
						</p>
						<a href="<?php the_permalink(); ?>" class="learn-more clr-white">Learn More <i
								class="round-arrow-icon"></i></a>
					</div>
				</div>
			</div>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<?php 
$faqs = get_field('faq-group');
if( $faqs ) :
?>
<section class="faq-section padding-t-150 padding-b-150 bg-dark-theme">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $faqs['content'];  ?>
		</div>
		<?php 
		if( $faqs['faq'] ){
			echo '<div class="faq-outer">';
			$faqCount = 0;
			foreach ($faqs['faq'] as $row){ $faqCount++;
				$isActive = "";
				if( $faqCount === 1 ){
					$isActive = "active";
				}
				echo '<div class="faq-accordion-item-outer '.$isActive.'">
				<h3 class="faq-accordion-toggle">'.$row['title'].'</h3>
				<div class="faq-accordion-content">'.$row['text'].'</div>
			</div>';	
			}
			echo '</div>';
		} 
		?>
	</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>