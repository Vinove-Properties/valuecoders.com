<?php get_header(); ?>
<section class="error-page">
  <div class="container">
    <picture class="dark-theme-img">
      <source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image.webp">
      <source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image.png">
      <img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image.png" alt="Error" width="59" height="79"> 
    </picture>
    <picture class="lighter-theme-img">
      <source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image-lighter.webp">
      <source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image-lighter.png">
      <img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image-lighter.png" alt="Error" width="59" height="79"> 
    </picture>
    <h1>Sorry! No Result Found:(</h1>
    <p>We can't find any result for your search term.</p>
    <?php do_action( 'neve_do_404' );?>
    <div class="buttons">
      <a href="<?php echo home_url('/'); ?>" class="button outline"><i class="arrow-icon">
      </i> <?php esc_html_e("Go back to home"); ?></a>
    </div>
  </div>
</section>
<?php get_footer(); ?>