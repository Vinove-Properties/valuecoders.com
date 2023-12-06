<?php
/**
 * Post Thubmnail
 * Part for post template
 */
// allow using php include
$thumb_size = !empty( $thumb_size ) ? $thumb_size : 'post-thumbnail';

if( apply_filters( 'wp_post_blocks/use_background_image', false ) ){

	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb_size );

	// Support Lazyload plugin
	if ( class_exists( 'LazyLoad_Images' ) ) {
						
		$template = '<div class="thumb-w"><div class="thumb-i" data-lazy-src="%s"></div></div>';

	}else{
		$template = '<div class="thumb-w"><div class="thumb-i" style="background-image:url(%s);"></div></div>';
	}

	// bg image
	echo !empty( $thumbnail[0] ) ? wp_sprintf( $template, esc_attr( $thumbnail[0] ) ) : '<div class="thumb-w"></div>' ;


}else{
	
	echo wp_sprintf( '<div class="thumb-w">%s</div>', get_the_post_thumbnail( null, $thumb_size ) );
}

do_action( 'wp-post-blocks/template/post-thumbnail' );