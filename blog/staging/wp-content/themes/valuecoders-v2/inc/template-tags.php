<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package valuecoders
 */

if ( ! function_exists( 'valuecoders_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function valuecoders_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'valuecoders' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'valuecoders_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function valuecoders_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'valuecoders' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">By ' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo $byline;

	}
endif;

if ( ! function_exists( 'valuecoders_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function valuecoders_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'valuecoders' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'valuecoders' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'valuecoders' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'valuecoders' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'valuecoders' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'valuecoders' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

add_action( 'after_setup_theme', function(){
	add_image_size( 'plist-thumbnail', 432, 225, true );
});


if ( ! function_exists( 'valuecoders_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function valuecoders_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) : ?>
		<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>				
		</div><!-- .post-thumbnail -->
		<?php 
		else : 
		$post_id = get_the_ID();
		$thePostImage = get_the_post_thumbnail( $post_id, 'vweb-blog', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );	
		
		if( function_exists('get_field') ){
			$listThubnail = get_field( 'pl-thumbnail', $post_id );
			if( $listThubnail && is_array( $listThubnail ) ){
				//print_r($listThubnail); die;
				if( isset( $listThubnail['sizes']['plist-thumbnail'] ) &&  !empty( $listThubnail['sizes']['plist-thumbnail'] ) ){
				$thePostImage = '<img loading="lazy" src="'.$listThubnail['sizes']['plist-thumbnail'].'" 
				alt="'.$listThubnail['title'].'" width="'.$listThubnail['sizes']['plist-thumbnail-width'].'" 
				height="'.$listThubnail['sizes']['plist-thumbnail-height'].'">';	
				}else{
				$thePostImage = '<img loading="lazy" src="'.$listThubnail['url'].'" alt="'.$listThubnail['title'].'" width="'.$listThubnail['width'].'" height="'.$listThubnail['height'].'">';	
				}				
			}
		}
		?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php echo $thePostImage; ?>				
		</a>
		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


function pxlCardThumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
	return;
	}

	if ( is_singular() ) : ?>
	<div class="post-thumbnail">
	<?php the_post_thumbnail(); ?>				
	</div><!-- .post-thumbnail -->
	<?php 
	else : 
	$post_id = get_the_ID();
	$thePostImage = get_the_post_thumbnail( $post_id, 'medium', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );	

	if( function_exists('get_field') ){
		$listThubnail = get_field( 'pl-thumbnail', $post_id );
		if( $listThubnail && is_array( $listThubnail ) ){
			if( isset( $listThubnail['sizes']['plist-thumbnail'] ) &&  !empty( $listThubnail['sizes']['plist-thumbnail'] ) ){
			$thePostImage = '<img loading="lazy" src="'.$listThubnail['sizes']['plist-thumbnail'].'" 
			alt="'.$listThubnail['title'].'" width="'.$listThubnail['sizes']['plist-thumbnail-width'].'" 
			height="'.$listThubnail['sizes']['plist-thumbnail-height'].'">';	
			}else{
			$thePostImage = '<img loading="lazy" src="'.$listThubnail['url'].'" alt="'.$listThubnail['title'].'" width="'.$listThubnail['width'].'" height="'.$listThubnail['height'].'">';	
			}				
		}
	}
	?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
	<?php echo $thePostImage; ?>			
	</a>
	<?php
	endif; // End is_singular().
}