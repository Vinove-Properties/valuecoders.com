<article id="post-<?php the_ID(); ?>" <?php post_class('vc-bcard'); ?>>
	<div class="blog-thumb">
		<a href="<?php the_permalink(); ?>">
			<?php valuecoders_post_thumbnail(); ?>			
		</a>
	</div>
	<div class="blog-outer">
		<div class="blog-content">
			<div class="entry-meta">
				<div class="author-mid-row">
				<?php valuecoders_posted_by(); ?>
				<?php valuecoders_posted_on(); ?>
				</div>
			</div>
			<header class="entry-header">
			<?php 
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			</header>
			<div class="entry-content">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="blog-learn-more">Learn More</a>
			</div><!-- .entry-content -->

		</div>
		<div class="article">
			<p>Article</p>
		</div>
	</div>
</article>