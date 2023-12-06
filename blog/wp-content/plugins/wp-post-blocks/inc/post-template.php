<?php

namespace WP_Post_Blocks;

/**
 * Base Class for post templates (Post Module default)
 * @since 1.0
 * 
 * :–––––––––––––––––––––––––––––––––––: 
 * |                                   |  
 * |                                   |
 * |                                   |
 * |                                   |
 * |                                   |
 * |                                   |
 * :–––––––––––––––––––––––––––––––––––:
 * This is the post title!
 * Post meta
 */
if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Post_Template') ){

	class Post_Template{
		static $thumb_size = 'post-thumbnail';
		static $uid			= 'pbs-module-default';
		/**
		 * Constructor
		 */
		function __construct(){

		}
		/**
		 * Custom post class
		 */
		static function post_class( $class = ''){
			global $post;
			// $classes = array();
			/*$classes[] = 'post-' . $post->ID;
			// Post Format
			if ( post_type_supports( $post->post_type, 'post-formats' ) ) {
			        $post_format = get_post_format( $post->ID );

			        if ( $post_format && !is_wp_error($post_format) )
			                $classes[] = 'format-' . sanitize_html_class( $post_format );
			        else
			                $classes[] = 'format-standard';
			}*/
			$classes = get_post_class();
			// hentry for hAtom compliance
			$classes[] = 'hentry';
			$classes[] = 'pbs-module';
			if( $ex_class = trim( $class ) )
				$classes[] = $ex_class;

			$classes = apply_filters( 'wp_post_blocks/post_class', $classes );

			echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';

		}
		/**
		 * Render the block
		 */
		static function render( $settings = array(), $misc = array() ){
			$template_class = static::$uid;
			$template_class .= !empty( $settings['template_class'] ) ? ' ' . $settings['template_class'] : '';
		?>
		<article <?php self::post_class( $template_class );?>>
			<header class="entry-header pbs_e-h">
				<?php 

				if( has_post_thumbnail() ): 

					
					?>
					<div class="post-thumbnail pbs_e-p-t<?php echo esc_attr( ($settings['thumb_style'] ? ' ' . $settings['thumb_style'] : '') );?>">
						<a href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php
							$thumb_size = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : self::$thumb_size;
							$thumb_size = apply_filters( 'wp_post_blocks/post_thumbnail_size', $thumb_size, self::$uid );
							include( Plugin::locate_template('parts/post-thumbnail') );
						?>
						</a>

						<?php echo self::get_format_icon( get_post_format() );?>
						
						<?php
						
							if( !empty( $settings['thumb_cat'] ) ){
								self::post_meta( 'cats-alt', 'other' );
							}
						?>
					</div>
					<?php
					
				endif;
				/**
				 * Above meta info
				 */
				if( !empty( $settings['info_above'] )): ?>
				<div class="entry-meta pbs_e-m above">
					<?php self::post_meta( $settings['info_above'] );?>
				</div><!-- .entry-meta -->
				<?php endif;?>
				<?php 
					$title_class = !empty( $settings['title_class'] ) ? ' ' . trim( $settings['title_class'] ) : '';
					the_title( wp_sprintf( '<h4 class="entry-title pbs_e-t %2$s"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ), esc_attr(  $title_class  ) ), '</a>' . self::get_edit_post_link() . '</h4>' );
				?>
			
				<?php 
				/**
				 * Below meta info
				 */
				if( !empty( $settings['info'] )): ?>
				<div class="entry-meta pbs_e-m below">
					<?php self::post_meta( $settings['info'], 'below' );?>
				</div><!-- .entry-meta -->
				<?php endif;?>

			</header><!-- .entry-header -->
			
			<?php if( !empty( $settings['excerpt'] )): ?>
			<div class="entry-summary pbs_e-s">
			<?php
				global $excerpt_length;
				$bk_excerpt_length = $excerpt_length;

				if( !empty( $settings['excerpt_length'] ) && absint( $settings['excerpt_length'] ) ){
					$excerpt_length = absint( $settings['excerpt_length'] );
				}

				echo wp_trim_words( get_the_excerpt(), $excerpt_length );

				$excerpt_length = $bk_excerpt_length;

			?>
			</div><!-- .entry-summary -->
			<?php endif;?>
		</article>
		<?php

		}
		/**
		 * Edit post link
		 */
		static function get_edit_post_link(){
			if( $edit_url = get_edit_post_link() )
				return wp_sprintf( '<small class="post-edit-link"> - <a href="%s">' . _x( 'Edit', 'edit post link', 'wp-post-blocks' ) . '</a></small>', $edit_url );
			return '';
		}
		/**
		 * Post format icon
		 */
		static function get_format_icon( $format ){

			if( false === $format )
				$format = 'standard';

			$i = apply_filters( 'wp_post_blocks/format_icon', '', $format );

			echo '<span class="format-icon ' . esc_attr( $format ) . '">' . $i . '</span>';
					
		}
		/**
		 * Post Meta information
		 */
		static function post_meta( $args = array(), $pos = 'default' ){

			if( !is_array( $args ) && strpos( $args,',') !== false ){
				$args = explode( ',', $args );
				$args = array_unique ( array_filter( array_map( 'trim', $args ) ) );
			}

			$args = ( array ) $args;

			do_action( 'wp_post_blocks/entry_meta_start', $pos );

			foreach ($args as $key => $meta) {

				switch ( $meta ) {
					
					case 'cats':
					
						if ( 'post' == get_post_type() ) {
							$categories = get_the_category();
							$categories_list = '';
							if($categories){

								foreach($categories as $cat) {
									
									$categories_list .= wp_sprintf( '<a href="%s" title="%s" class="cat-link color-by-cat %s">'.$cat->cat_name.'</a>',
										esc_url( get_category_link( $cat->term_id ) ), 
										esc_attr( wp_sprintf( _x( "View all posts in %s", 'entry-meta: post cat(s) title attribute', 'wp-post-blocks' ), $cat->name ) ),
										$cat->slug,
										esc_html( $cat->cat_name )
									);
								}
								// echo '<span class="cat-links meta-info">' . wp_sprintf( esc_html_x( 'in %s', 'entry-meta: category', 'wp-post-blocks' ), $categories_list ) . '</span>';
								echo wp_sprintf( '<span class="cat-links meta-info">%s</span>', $categories_list );
							}
						}
					break;

					case 'cats-alt':
						if ( 'post' == get_post_type() ) {
							$categories = get_the_category();
							$categories_list = '';
							if($categories){

								foreach($categories as $cat) {
									
									$categories_list .= wp_sprintf( '<a href="%s" title="%s" class="cat-tag bg-by-cat %s"><span>' . $cat->cat_name . '</span></a>',
										esc_url( get_category_link( $cat->term_id ) ), 
										esc_attr( wp_sprintf( _x( "View all posts in %s", 'entry-meta: post cat(s) title attribute', 'wp-post-blocks' ), $cat->name ) ),
										$cat->slug,
										esc_html( $cat->cat_name )
									);
								}
								echo wp_sprintf( '<span class="cat-links meta-info">%s</span>', $categories_list );
							}
						}
					break;

					case 'byline':
						//get_avatar( get_the_author_meta( 'ID' ), 24 )
						$byline = wp_sprintf(
							esc_html_x( 'by %s', 'entry-meta: post author', 'wp-post-blocks' ),
								'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'

						);

						// Author
						echo wp_sprintf( '<span class="byline meta-info">%s</span>', $byline );
					break;

					case 'byline-av':
						//get_avatar( get_the_author_meta( 'ID' ), 24 )
						$url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						$byline = '<span class="author vcard"><a href="' 
							. esc_url( $url ) . '">' 
							. get_avatar( get_the_author_meta( 'ID' ), 32 ) . '</a>'
							. '</span>';

						// Author
						echo wp_sprintf( '<span class="author-av meta-info">%s</span>', $byline );
					break;

					case 'byline-alt':
						//get_avatar( get_the_author_meta( 'ID' ), 24 )
						$url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						$byline = '<span class="author vcard"><a href="' 
							. esc_url( $url ) . '">' 
							. get_avatar( get_the_author_meta( 'ID' ), 32 ) . '</a>'

							. wp_sprintf( esc_html_x( 'by %s', 'entry-meta: post author', 'wp-post-blocks' ), '<a class="url fn n" href="' . esc_url( $url ) . '">' . esc_html( get_the_author() ) . '</a>' )
							. '</span>';

						// Author
						echo wp_sprintf( '<span class="byline alt meta-info">%s</span>', $byline );
					break;

					case 'byline-big':
						//get_avatar( get_the_author_meta( 'ID' ), 24 )
						$url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						$byline = '<span class="author vcard"><a href="' 
							. esc_url( $url ) . '">' 
							. get_avatar( get_the_author_meta( 'ID' ), 56 ) . '</a>'

							. wp_sprintf( esc_html_x( 'by %s', 'entry-meta: post author', 'wp-post-blocks' ), '<a class="url fn n" href="' . esc_url( $url ) . '">' . esc_html( get_the_author() ) . '</a>' )
							. '</span>';

						// Author
						echo wp_sprintf( '<span class="byline big meta-info">%s</span>', $byline );
					break;

					case 'byline-twitter':
						$user_links = array();
						if( $user_twitter = get_the_author_meta( 'twitter' ) )
							$user_links[] = '<a href="//twitter.com/' . esc_attr( $user_twitter ) . '" target="_blank" title="' . esc_attr_x( 'Follow ' . $user_twitter, 'entry-meta: post author twitter title attribute', 'wp-post-blocks' ) . '">' . apply_filters( 'wp_post_blocks/block_icon', '', 'meta_twitter' ) . " @{$user_twitter}"  . '</a>';

						if( !empty( $user_links ) )
							echo wp_sprintf( '<span class="byline twitter meta-info">%s</span>', join(' ', $user_links) );

					break;

					case 'date':
						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
						}

						$time_string = wp_sprintf( $time_string,
							esc_attr( get_the_date( 'c' ) ),
							esc_html( apply_filters( 'wp_post_blocks/entry_meta_date', get_the_date() ) ),
							esc_attr( get_the_modified_date( 'c' ) ),
							esc_html( get_the_modified_date() )
						);
							
						$posted_on = $time_string;
						// Post datetime
						echo wp_sprintf( '<span class="posted-on meta-info">%s</span>', $posted_on ); // WPCS: XSS OK

					break;

					case 'datetime':

						$datetime_string = get_the_date() . esc_html_x( ' / ', 'entry-meta: post date time separator', 'wp-post-blocks' ) . get_the_time();
						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
						
						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
						}
						
						$time_string = wp_sprintf( $time_string,
							esc_attr( get_the_date( 'c' ) ),
							esc_html( apply_filters( 'wp_post_blocks/entry_meta_datetime', $datetime_string ) ),
							esc_attr( get_the_modified_date( 'c' ) ),
							esc_html( get_the_modified_date() )
						);
							
						$posted_on = $time_string;
						// Post datetime
						echo wp_sprintf( '<span class="posted-on meta-info">%s</span>', $posted_on ); // WPCS: XSS OK

					break;

					case 'datetime-updated':

						$datetime_sep = esc_html_x( ' / ', 'entry-meta: post date time separator', 'wp-post-blocks' );
						$datetime_lastupdate_title = esc_html_x( 'Last updated: ', 'entry-meta: post date time last updated title', 'wp-post-blocks' );
						$datetime_string = get_the_date() . $datetime_sep . get_the_time();

						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
							$datetime_string .= $datetime_sep . $datetime_lastupdate_title . get_the_modified_date();
						}

						$time_string = wp_sprintf( $time_string,
							esc_attr( get_the_date( 'c' ) ),
							esc_html( apply_filters( 'wp_post_blocks/entry_meta_datetime-updated', $datetime_string ) ),
							esc_attr( get_the_modified_date( 'c' ) ),
							esc_html( get_the_modified_date() )
						);
							
						$posted_on = $time_string;
						// Post datetime
						echo wp_sprintf( '<span class="posted-on meta-info">%s</span>', $posted_on ); // WPCS: XSS OK

					break;

					case 'time':

						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
						}

						$time_string = wp_sprintf( $time_string,
							esc_attr( get_the_date( 'c' ) ),
							esc_html( get_the_time() ),
							esc_attr( get_the_modified_date( 'c' ) ),
							esc_html( get_the_modified_time() )
						);

						$posted_on = wp_sprintf(
							esc_html_x( 'on %s', 'entry-meta: post date', 'wp-post-blocks' ),
							'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
						);	

						// Post datetime
						echo wp_sprintf( '<span class="posted-on meta-info">%s</span>', $posted_on ); // WPCS: XSS OK
					break;

					case 'views':
						// If Post Views Counter is activated, get views from their data.
						if( function_exists( 'pvc_get_post_views' ) ){
							$post_id = (int) ( empty( $post_id ) ? get_the_ID() : $post_id );
							$views = pvc_get_post_views( $post_id );	
						}else{
							// Support WP-PostViews
							$meta_key = function_exists( 'the_views' ) ? 'views' : '_post_views';
							$meta_key = apply_filters( 'wp_post_blocks/post_meta_info_post_view_key', $meta_key );
							$views = (int) get_post_meta( get_the_ID(), $meta_key, true );
						}
						$icon = apply_filters( 'wp_post_blocks/block_icon', '', 'meta_views' );
						echo wp_sprintf('<span class="post-views meta-info">%s</span>', ( $icon ? $icon . ' ' : '' ) . '<span>' . number_format_i18n( $views ) . '</span>' ); 
						
					break;

					case 'views_private':
						// allow author role and up
						if( current_user_can( 'edit_posts') ){
							if( function_exists( 'pvc_get_post_views' ) ){
								$post_id = (int) ( empty( $post_id ) ? get_the_ID() : $post_id );
								$views = pvc_get_post_views( $post_id );	
							}else{
								// Support WP-PostViews
								$meta_key = function_exists( 'the_views' ) ? 'views' : '_post_views';
								$meta_key = apply_filters( 'wp_post_blocks/post_meta_info_post_view_key', $meta_key );
								$views = (int) get_post_meta( get_the_ID(), $meta_key, true );
							}
							$icon = apply_filters( 'wp_post_blocks/block_icon', '', 'meta_views' );
							echo wp_sprintf('<span class="post-views meta-info">%s</span>', ( $icon ? $icon . ' ' : '' ) . '<span>' . number_format_i18n( $views ) . '</span>' ); 
						}
					break;

					case 'tags':
						if ( 'post' == get_post_type() ) {
				
							/* translators: used between list items, there is a space after the comma */
							$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'entry tags separator', 'wp-post-blocks' ) );
							// $tags_list = get_the_tag_list( '' );
							$tag_title = esc_html_x( 'Tagged', 'entry-meta: tags', 'wp-post-blocks' );
							if ( $tags_list ) {
								echo '<span class="tags-links meta-info">' . "$tag_title " . $tags_list . '</span>'; // WPCS: XSS OK
							}
						}
					break;

					case 'fb-comments':

						if ( ! post_password_required() && comments_open() ) {
							echo '<span class="comments-link meta-info">';
							echo '<span class="fb-comments-count" data-href="' . esc_attr(get_permalink() ) . '"></span>';
							echo '</span>';
						}
					break;

					case 'fb-shares':

						echo '<span class="fb-shares shares-counter meta-info">';
						$icon = apply_filters( 'wp_post_blocks/block_icon', '', 'meta_fb-shares' );
						echo ( $icon ? $icon . ' ' : '' ) . '<span class="shares-count" data-service="facebook" data-url="' . esc_attr( apply_filters( 'wp_post_blocks/share_counter_url', get_permalink(), 'facebook' ) ) . '">0</span> <span class="share-text" data-singular="' . esc_attr_x( 'Share', 'singular', 'wp-post-blocks') . '">' . esc_html__('Shares', 'wp-post-blocks') . '</span>';
						echo '</span>';
						
					break;

					case 'pin-shares':
						echo '<span class="pin-shares shares-counter meta-info">';
						echo '<span class="shares-count" data-service="pinterest" data-url="' . esc_attr( apply_filters( 'wp_post_blocks/share_counter_url', get_permalink(), 'pinterest' ) ) . '"></span> <span class="share-text" data-singular="' . esc_attr_x( 'Share', 'singular', 'wp-post-blocks') . '">' . esc_html__('Shares', 'wp-post-blocks') . '</span>';
						echo '</span>';
						
					break;
					
					case 'comments':
						if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
							// echo '<span class="comments-link">';
							// comments_popup_link( esc_html_x( 'Leave a comment', 'entry-meta: comments', 'wp-post-blocks' ), esc_html_x( '1 Comment', 'entry-meta: comment count - singular', 'wp-post-blocks' ), esc_html_x( '% Comments', 'entry-meta: comment count - plural', 'wp-post-blocks' ) );
							// echo '</span>';

							echo '<span class="comments-link meta-info" data-post-id="' . esc_attr( get_the_ID() ) . '">';
							$icon = apply_filters( 'wp_post_blocks/block_icon', '', 'meta_comments' );
							comments_popup_link( ( $icon ? $icon . ' ' : '' ) . esc_html_x( '0', 'entry-meta: no comment', 'wp-post-blocks' ), ( $icon ? $icon . ' ' : '' ) . esc_html_x( '1', 'entry-meta: comment count - singular', 'wp-post-blocks' ), ( $icon ? $icon . ' ' : '' ) . esc_html_x( '%', 'entry-meta: comment count - plural', 'wp-post-blocks' ) );
							// comments_popup_link( esc_html_x( 'Leave a comment', 'entry-meta: comments', 'wp-post-blocks' ), esc_html_x( '1 Comment', 'entry-meta: comment count - singular', 'wp-post-blocks' ), esc_html_x( '% Comments', 'entry-meta: comment count - plural', 'wp-post-blocks' ) );
							echo '</span>';
						}
					break;

					// Plugins
					case 'reading-time':
						if( shortcode_exists( 'rt_reading_time' ) ){
							echo '<span class="reading-time meta-info">';
							echo do_shortcode( '[rt_reading_time label="" postfix="' . esc_html_x( 'min read', 'reading time postfix', 'wp-post-blocks' ) . '" postfix_singular="' . esc_html_x( 'min read', 'reading time post fix singular', 'wp-post-blocks' ) . '"]' );
							echo '</span>';
						}else{
							echo '<a href="https://wordpress.org/plugins/reading-time-wp/">Reading Time WP</a> is not installed/activated.';
						}
					break;

					case 'edit':
						// Edit Post links
						edit_post_link( esc_html_x( 'Edit', 'entry-meta: edit link', 'wp-post-blocks' ), '<span class="edit-link meta-info">', '</span>' );
					break;

					default:
						do_action( 'wp_post_blocks/entry_meta', $meta );
					break;
				}
			}
			do_action( 'wp_post_blocks/entry_meta_end', $pos );
		}
	}
}