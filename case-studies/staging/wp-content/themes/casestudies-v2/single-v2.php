<?php 
/**
* Template Name: Version - 2 Case Study Template
* Template Post Type: post
*/
$postid = get_the_ID();
get_header();
$term_list = get_the_terms($postid, 'post_tag'); //technology
$technology_list ='<ul>';
foreach($term_list as $term_single) {
$technology_list .= '<li class="'.$term_single->slug.'" title="'.$term_single->name.'">'.$term_single->name.'</li>';
}
$technology_list .='</ul>';
$bg_css = 'background-image: url("'.get_bloginfo('template_url').'/dev-img/cs-default-banner.jpg")';
?>
<section class="hero-section vlazy" style='<?php echo $bg_css; ?>'>
<div class="container">
  <h1><?php the_title(); ?></h1>
  <p>ValueCoders designed a user-friendly Figma prototype for an event management company's website and mobile app, incorporating intuitive navigation, appealing layouts, and essential features like vendor search, booking, payment gateways, and user accounts.</p>
  <div class="tech-use">
  	<p></p>
    <span>Technology Used:</span>
    <?php echo $technology_list; ?>
  </div>
</div>
</section>
<section class="case-section padding-t-120 padding-b-120">
	<div class="container">
		<div class="case-wrap" id="case-study">
			<div class="case-sticky">
				<div class="left-bar" id="case-question">
		        <div class="bor-line">
		          	<div class="tocsec"><?php dynamic_sidebar('toc-sidebar'); ?></div>
		          <div class="share">
		            <button id="shareDiv" class="searchBtn" onClick="fun()"><i></i>Share</button>
		            <div id="myDIV"><div class="social-share"><?php echo do_shortcode('[addtoany]'); ?></div></div>
		          </div>
		      </div>
		      <div class="rightcustom margin-40">
		        <h2>Simplify and scale<br> your processes<br> with ValueCoders</h2>
		        <div class="text-center btn-container">
		          <a href="https://www.valuecoders.com/contact" class="banner-btn" data-wpel-link="internal">Talk To Our Experts<i class="cusarrow-icon"></i></a>
		        </div>
		      </div>
            </div>
            <div class="right-bar" id="case-answer-part">
            	<div class="elm-wp-editor"><?php the_content(); ?></div>
            </div>
			</div>
		</div>
	</div>
</section>	
<?php get_footer(); ?>