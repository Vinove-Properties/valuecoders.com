<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="errordiv">
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
			<picture class="darkimage">
          <source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404-image.webp">
          <source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404-image.png">
          <img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404-image.png" alt="Error" width="59" height="79">
         </picture>

		 <picture class="lightimage">
          <source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404-image-light.webp">
          <source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404-image-light.png">
          <img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404-image-light.png" alt="Error" width="59" height="79">
         </picture>
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyseventeen' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div>
<?php
get_footer();
