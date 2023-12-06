<?php

namespace WP_Post_Blocks;

/**
 * Post Module Counter x Overlay
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

if( !class_exists( 'Post_Template_Counter_Overlay') ){

	if( !class_exists( 'Post_Template' ) ){
		require_once Plugin::get_dir() . 'inc/post-template.php';
	}

	class Post_Template_Counter_Overlay extends Post_Template{
		static $thumb_size = 'medium';
		static $uid			= 'pbs-module-counter-overlay';
		/**
		 * Render the block
		 */
		static function render( $settings = array(), $misc = array() ){
			$template_class = static::$uid;
			$template_class .= ' ' . 'pbs-module-counter pbs-module-overlay';
			$template_class .= !empty( $settings['template_class'] ) ? ' ' . $settings['template_class'] : '';
		?>
		<article <?php self::post_class( $template_class );?>>
			<header class="entry-header pbs_e-h">
					
				<a class="post-thumbnail pbs_e-p-t<?php echo esc_attr( ($settings['thumb_style'] ? ' ' . $settings['thumb_style'] : '') );?>" href="<?php the_permalink(); ?>" aria-hidden="true">
					
					<?php
						$thumb_size = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : self::$thumb_size;
						$thumb_size = apply_filters( 'wp_post_blocks/post_thumbnail_size', $thumb_size, self::$uid );
						include( Plugin::locate_template('parts/post-thumbnail') );
					?>

					<?php echo self::get_format_icon( get_post_format() );?>
				</a>

				<div class="pbs_overlay-w">
					<span class="pbs_pcount"><?php echo esc_html( $misc['order'] );?></span>
					<div class="pbs_overlay-c">
						<?php 
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
					</div>
				</div>
			</header><!-- .entry-header -->
		</article>
		<?php
		}
	}
}