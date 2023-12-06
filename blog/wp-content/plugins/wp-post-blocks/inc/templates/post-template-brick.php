<?php

namespace WP_Post_Blocks;

/**
 * Post Module Brick - Text on image
 * @since 1.0
 * 
 * :–––––––––––––––––––––––––––––––––––: 
 * |                                   |  
 * |                                   |
 * |                                   |
 * |                                   |
 * |  This is the post title!          |
 * |  Post meta                        |
 * :–––––––––––––––––––––––––––––––––––:
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Post_Template_Brick') ){

	if( !class_exists( 'Post_Template' ) ){
		require_once Plugin::get_dir() . 'inc/post-template.php';
	}

	class Post_Template_Brick extends Post_Template{
		
		static $thumb_size 	= 'post-thumbnail';
		static $uid			= 'pbs-module-brick brick-c';
		/**
		 * Render the block
		 */
		static function render( $settings = array(), $misc = array() ){
			
		?>
		<article <?php self::post_class( self::$uid );?>>
			<?php
				// print_r($settings);
				/*$categories = get_the_category();
				$cat_slugs = wp_list_pluck( $categories, 'slug' );*/
			?>
			<div class="brick-c-i <?php echo !empty( $settings['brick_overlay'] ) ? esc_attr( $settings['brick_overlay'] ) : '';?>">
				<?php
					do_action( 'wp_post_blocks/post_template_brick_start' );
				?>
				<header class="entry-header brick-e-h">
					<?php 
					/**
					 * Above meta info
					 */
					if( !empty( $settings['info_above'] )): ?>
					<div class="entry-meta brick-e-m above">
						<?php self::post_meta( $settings['info_above'] );?>
					</div><!-- .entry-meta -->
					<?php endif;?>

					<?php
					$original_title = get_the_title();
					$first_number = '';
					$output_title = '';
					$temp_title = '';
					$title = $original_title;
					$title_bg = false;

					if ( strlen($original_title) != 0 ){
						// exact first number 
						if( !empty($settings['first_number'] ) && (strpbrk( $original_title, '0123456789') ) ){
							$temp_title = explode( ' ', $original_title );
							if( is_numeric( ( $first = intval( $temp_title[0] ) ) ) && $first > 0 ){
								unset( $temp_title[0] );
								$first_number = '<strong class="first-num">' . $first . '</strong>';
								$title = join( ' ', $temp_title );
							}
						}

						// Wrap background
						if( !empty( $settings['title_bg'] ) ){
							$title = wp_sprintf( '<span class="brick-e-t-i %s">%s</span>', esc_attr( $settings['title_bg'] ), $title );
							$title_bg = true;
						}

						$output_title = $first_number . ' ' . $title . self::get_edit_post_link();
						$title_class = '';
						$title_class .= $title_bg ? ' title-bg' : '';
						$title_class .= !empty( $settings['title_class'] ) ? ' ' . trim( $settings['title_class'] ) : '';
						echo wp_sprintf( '<h2 class="entry-title brick-e-t' . esc_attr(  $title_class ) . '">%s</h2>', $output_title ); 

					}

					/**
					 * Below meta info
					 */
					if( !empty( $settings['info'] )): ?>
					<div class="entry-meta brick-e-m below">
						<?php self::post_meta( $settings['info'], 'below' );?>
					</div><!-- .entry-meta -->
					<?php endif;?>

				</header><!-- .entry-header -->
				
				<?php if( !empty( $settings['excerpt'] )): ?>
				<div class="entry-summary brick-e-s">
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

			</div>

			<div class="brick-bg post-thumbnail pbs_e-p-t">
				<?php
					$thumb_size = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : self::$thumb_size;
					$thumb_size = apply_filters( 'wp_post_blocks/post_thumbnail_size', $thumb_size, self::$uid );

					include( Plugin::locate_template('parts/post-thumbnail') );
				?>

				<?php echo self::get_format_icon( get_post_format() );?>
			</div>

			<a class="brick-url" href="<?php echo esc_url( get_permalink() );?>" rel="bookmark">
				<?php the_title( '<span class="screen-reader-text">', '</span>' ); ?>
			</a>

			<?php
				do_action( 'wp_post_blocks/post_template_brick_end' );
			?>

		</article>
		<?php

		}
	}
}