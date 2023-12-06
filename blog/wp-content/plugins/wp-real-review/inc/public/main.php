<?php

/**
 * Get WP Real Review option
 * @access public
 */
function wp_real_review_get_option( $key = ''){

	$option = get_option( 'wp_real_review' );

	if( $key && isset( $option[$key] ) ){
		return $option[$key];
	}

	return $option;
}

/**
 * Get WP Real Review meta data
 * @access public
 */
function wp_real_review_get_data( $post_id ){
	return WP_Real_Review::get_post_meta( $post_id, 'wp_real_review' );
}

/**
 * Get template
 * @access public
 */
function wp_real_review_get_template_part( $name = '' ){
	$template = WP_Real_Review::locate_template( $name );

	if( $template )
		include( $template );
}

/**
 * Get WP Real Review review type
 * @access public
 */
function wp_real_review_get_type( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['type'];
}

/**
 * Get WP Real Review review Location
 * @access public
 */
function wp_real_review_get_location( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['location'];
}

/**
 * Get WP Real Review review template
 * @access public
 */
function wp_real_review_get_template( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['template'];
}

/**
 * Get WP Real Review review score
 * @access public
 */
function wp_real_review_get_score( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['score'];
}

/**
 * Get WP Real Review review features
 * @access public
 */
function wp_real_review_get_features( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['features'];
}

/**
 * Get WP Real Review review pros
 * @access public
 */
function wp_real_review_get_pros( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['pros'];
}

/**
 * Get WP Real Review review cons
 * @access public
 */
function wp_real_review_get_cons( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['cons'];
}

/**
 * Get WP Real Review review desc
 * @access public
 */
function wp_real_review_get_desc( $post_id ){
	$data = wp_real_review_get_data( $post_id );
	return $data['desc'];
}

/**
 * Get WP Real Review schema type
 * @access public
 */
function wp_real_review_get_schema_type(){
	return apply_filters( 'wp_real_review_get_schema_type', 'Thing' );
}

// add_action( 'wp_head', 'wp_real_review_rs_jsonld' ); 
/**
 * Get WP Real Review JSON-LD
 * @access public
 */
function wp_real_review_rs_jsonld(){

	if( !is_singular() )
		return;

	global $post;

	$wprr = wp_real_review_get_data( $post->ID );

	if( !in_array( $wprr['type'], array( 'star', 'point', 'percentage' ) ) )
    	return;

    $best_rating = 5;

    if( 'point' == $wprr['type'] ){
        $best_rating = 10;

    }else if( 'percentage' == $wprr['type'] ){
        $best_rating = 100;
    }
    
    $rv_name = $wprr['title'] ? $wprr['title'] : get_the_title( $post );
    $rv_image = $wprr['thumb'] ? wp_get_attachment_url( $wprr['thumb'] ) : wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
 
	$rs = array(
		'@context'		=> 'http://schema.org/',
		// '@id'			=> get_permalink( $post->ID ),
		'@type'			=> 'Review',
		'itemReviewed'	=> array(
			'@type'			=> wp_real_review_get_schema_type(),
			'name'			=> $rv_name
		),
		'image'			=> esc_url( $rv_image), 
		'description'	=> $wprr['desc'],
		'reviewRating'	=> array(
			'@type'			=> 'Rating',
			'ratingValue'	=> esc_js( $wprr['score'] ),
			'bestRating'	=> esc_js( $best_rating )
		),
		'author'		=> array(
			'@type'			=> 'Person',
			'name'			=> get_the_author()
		),
		'publisher'		=> array(
			'@type'			=> 'Organization',
			'name'			=> get_bloginfo( 'name' )
		)
	);

?>
<script type="application/ld+json">
	<?php echo wp_json_encode($rs);?>
</script>
<?php

}
function wp_real_review_generate_stars( $percentage = 0 ){
	$output = '<div class="wprr-stars-rating">';
    	$output .= '<div class="wprr-stars-base">';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	    $output .= '</div>';
	    $output .= '<div class="wprr-stars-value" style="width: ' . esc_attr( $percentage ) . '%;">';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	        $output .= '<i class="wprr-icon-star" aria-hidden="true"></i>';
	    $output .= '</div>';
	$output .= '</div>';

	return $output;
}
/**
 * Get rating output
 * @access public
 */
function wp_real_review_get_rating_output( $post_id = 0 ){

	if( empty( $post_id ) ){
		global $post;

		if( !empty( $post->ID ) ){
			$post_id = $post->ID;
		}
		
	}

	if( empty( $post_id ) ){
		return;	
	}
	
	$wprr = wp_real_review_get_data( $post_id );
	// Percentage
	if( 'percentage' == $wprr['type'] ){
        $best_rating = 100;
        $rating_percentage = $wprr['score'];
        $output = '<div class="wprr-percentage-rating">' . $rating_percentage . '</div>';
    }
    // Star
    else if( 'star' == $wprr['type'] ){
        $best_rating = 5;
        $rating_percentage = ( (float) $wprr['score'] * 2 ) * 10;
        $output = wp_real_review_generate_stars( $rating_percentage );
    }
    // Point
    else{
        
        $rating_percentage = (float) $wprr['score'] * 10;
        $output = '<div class="wprr-percentage-rating">' . esc_html__( $wprr['score'] ) . '</div>';
    }
	
	return $output;
}

function wp_real_review_get_posts(){

}


add_filter( 'the_content', 'wp_real_review_the_content_filter', 50 );
/**
 * Get WP Real Review Output
 * @access public
 */
function wp_real_review_the_content_filter( $content ){

	global $post;

	if( empty($post)){
		return $content;
	}

	$wprr = wp_real_review_get_data( $post->ID );

	if( 'none' === $wprr['type'] 
		|| 'custom' === $wprr['type'] 
		|| !( is_main_query() && is_singular() && in_the_loop() )
	){
		return $content;
	}

	$template = apply_filters( 'wp_real_review_output_template', 'default', $wprr );

	ob_start();

	wp_real_review_get_template_part( $template );

	$wprr_content = ob_get_clean();

	if( 'default' === $wprr['location'] )	{
		$content = $wprr_content . $content;
	}else if( 'after_content' === $wprr['location'] )	{
		$content = $content . $wprr_content;
	}

	return $content;
}



