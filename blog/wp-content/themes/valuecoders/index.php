 <?php get_header(); ?>
<div class="container archive-container">
	<div class="blog-div ">	    
		<?php
		if ( have_posts() ){
		if ( is_home() && ! is_front_page() ) :
		?>
		<header>
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
		<?php
		endif;

		echo '<div class="blog-wrap">';
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
		echo '</div>';

		echo '<div class="pagination cta-wrap"><div class="nav-links">';
		the_posts_navigation(['prev_text' => 'Older posts <span class="arrow-wrap"> <span class="arrow primera"></span> <span class="arrow segunda next"></span> <span class="arrow last"></span> </span>', 
		'next_text' => 'Newer posts <span class="arrow-wrap"> <span class="arrow primera"></span> <span class="arrow segunda next"></span> <span class="arrow last"></span> </span>' ] );
		echo '</div></div>';

		}else{
			echo "<h3>No Post found</h3>";
		}
		?>	    	    
	</div>
</div>
<?php get_footer(); ?>