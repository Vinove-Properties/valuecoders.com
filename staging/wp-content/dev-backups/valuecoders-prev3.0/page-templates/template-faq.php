<?php
/*
Template Name: FAQ Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section">
	<div class="container">
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php dynamic_sidebar('vc-profile'); ?>
	</div>
</section>
<?php  
$faqs = get_field('faq-listing');
if( $faqs ) :
?>
<section class="faq-section faq-for-company padding-t-150 padding-b-150 bg-dark-theme">
	<div class="container">
		<div class="faq-outer dis-flex" itemscope itemtype="https://schema.org/FAQPage">
			<?php 
			foreach ($faqs as $faq) {
			echo '<div class="flex-2" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
				<div class="faq-accordion-item-outer">
					<h3 class="faq-accordion-toggle"  itemprop="name">'.$faq['question'].'</h3>
					<div class="faq-accordion-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">'.$faq['answer'].'</div></div>
				</div>
			</div>';	
			} 
			?>			
		</div>	
	</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>