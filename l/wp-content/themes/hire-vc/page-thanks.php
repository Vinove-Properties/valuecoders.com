<?php
/**
 * The template for displaying all single posts
* Template Name: Thanks Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vc_l7
 */
<?php 
get_header();
global $post;
$page_id    = $post->ID;
?>
<section class="thanks-sec">
    <div class="hire-container">
         <div class="row">
            <div class="thanks-box">
              	<?php 
              	while ( have_posts() ) : the_post(); 
              		the_content();
              	endwhile;
              	?>
            </div>
         </div>
   </div>
</section>
<?php get_footer(); ?>