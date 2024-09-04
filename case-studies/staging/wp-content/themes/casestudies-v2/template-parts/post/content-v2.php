<?php
$counter =  ( isset( $args['counter'] ) ) ? $args['counter'] : 0; 
$featured_img_url   = get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); 
$big_image      = get_field('full_size_image');
if( $big_image ){
$featured_img_url = $big_image['url'];
}
$shortdesc  = get_field('short_description','',false);
$disc       = wp_trim_words( $shortdesc, 20, '...' ); 
$tags = get_the_tags(get_the_ID());
$ctags = '';
$smallCol = [1, 4, 5, 8, 9, 12, 13, 16, 17, 20];
foreach( $tags as $tag ) {
$ctags .= $tag->name.", ";                      
}
if( in_array( $counter, $smallCol ) ){
echo '<div class="flex-2 col-box block-id-'.$counter.' small-image">
<div class="dis-flex">
<div class="flex-2">
<div class="img-box lazy-background" style="background-image:url(\''.$featured_img_url.'\')">
</div>
</div>
<div class="flex-2 bg-light-theme content-box">
<h3>'.get_the_title().'</h3>
<p>'.$disc.'</p>
<div class="dis-flex other-details">
<div class="flex-2 clr-white">Core tech</div>
<div class="flex-2">'.rtrim($ctags, " ,").'</div>
</div>
<a href="'.get_permalink().'" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
</div>
</div>
</div>';
}else{
echo '<div class="flex-2 col-box block-id-'.$counter.' full-image">
<div class="img-box img2" style="background-image:url(\''.$featured_img_url.'\')">

<div class="content-box">
<h3>'.get_the_title().'</h3>
<p>'.$disc.'</p>
<div class="dis-flex other-details">
<div class="flex-2 clr-white">Core tech</div>
<div class="flex-2">'.rtrim($ctags, " ,").'</div>
</div>
<a href="'.get_permalink().'" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
</div>
</div>
</div>';  
}
if( $counter % 2 === 0 ){
  echo '</div><div class="flex-row">';
}
?>