<?php get_header(); ?>
<div class="container archive-container author-articles">
	<div class="blog-div ">
	    <?php 
	    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	    echo '<h2 class="top-title">Blog Posts Written by '.get_the_author_meta('display_name', $curauth->ID).'</h2>';    
	    ?>   
		<?php
		if ( have_posts() ){
			echo '<div class="blog-wrap" id="auth-posts">';
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			echo '</div>';
		}else{
			echo "<h3>No Post found</h3>";
		}
		?>	    	    
		<div class="cta-wrap  justify-center">
          <div class="cta-btn">
            <a href="javascript:void(0);" data-ajax-url="<?php echo admin_url('admin-ajax.php'); ?>" data-counter="1" onclick="load_author_posts(this, <?php echo $curauth->ID; ?>);">
            <div id="showmoreposts">Show More Posts</div>
            <span class="arrow-wrap">
            <span class="arrow primera"></span>
            <span class="arrow segunda next"></span>
            <span class="arrow last"></span>
            </span>
            </a>
          </div>
        </div>
	</div>
</div>
<?php get_footer(); ?>