<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package valuecoders
 */

get_header();
?>
<main id="primary" class="site-main">
   <section class="error-page not-found">
      <div class="container">
         <header class="page-header">
            <picture class="lighter-theme-img">
               <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/404-image-lighter.webp">
               <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/404-image-lighter.png">
               <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/404-image-lighter.png" alt="Error" width="59" height="79">
            </picture>
            <h1>Sorry! No Result Found:</h1>
            <p>We can't find any result for your search term.</p>
         </header>
         <!-- .page-header -->
         <div class="archive-container">
            <div class="row">
               <div class="nv-index-posts blog col">
                  <div class="col-12 nv-content-none-wrap">
                     <p>It seems we can’t find what you’re looking for. Perhaps searching can help.</p>
                     <div class="nv-seach-form-wrap">
                        <form role="search" method="get" class="search-form" action="<?php bloginfo('url'); ?>">
                           <label>
                           <span class="screen-reader-text">Search for:</span>
                           <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                           </label>
                           <input type="submit" class="search-submit" value="Search">
                           <div class="nv-search-icon-wrap">
                              <div class="nv-icon nv-search">
                                 <svg width="15" height="15" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1216 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"></path>
                                 </svg>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="w-100"></div>
               </div>
            </div>
         </div>
         <div class="buttons">
            <a href="<?php bloginfo('url'); ?>" class="button outline" data-wpel-link="internal"><i class="arrow-icon">
            </i> Go back to home</a>
         </div>
      </div>
      <!-- .container -->      
   </section>
   <!-- .error-404 -->
</main>
<!-- #main -->
<?php get_footer(); ?>