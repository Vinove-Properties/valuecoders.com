<article id="post-<?php the_ID(); ?>" <?php post_class('vc-bcard'); ?>>
	<div class="blog-thumb"><?php valuecoders_post_thumbnail(); ?></div>
	<div class="blog-outer">
		<div class="blog-content">
			<?php if( !is_author() ) : ?>	
			<div class="entry-meta">
				<div class="author-mid-row">
				<?php valuecoders_posted_by(); ?>
				<?php valuecoders_posted_on(); ?>
				</div>
			</div>
			<?php endif; ?>	

			<header class="entry-header">
			<?php 
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			</header>
			<?php if( !is_author() ) : ?>
			<div class="entry-content">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="blog-learn-more">Learn More</a>
			</div>
			<?php endif; ?>
		</div>
		<?php if( !is_author() ) : ?>
		<div class="article">
		    <?php 
		    $getCategory = get_the_category( get_the_ID() ); 
		    if( $getCategory ){
		        echo '<p>'.$getCategory[0]->cat_name.'</p>';
		    }
		    ?>
		</div>
		<?php endif; ?>
	</div>
</article>