<?php

namespace WP_Post_Blocks;

/**
 * Post Module 7 - with counter
 * @since 1.0
 * 
 *  This is the post title! - Post time  
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Post_Template_Text_List') ){

	if( !class_exists( 'Post_Template_Text' ) ){
		require_once Plugin::get_dir() . 'inc/templates/post-template-text.php';
	}

	class Post_Template_Text_List extends Post_Template_Text{
		static $thumb_size = 'medium';
		static $uid			= 'pbs-module-text-list';
		/**
		 * Render the block
		 */
		static function render( $settings = array(), $misc = array() ){
			$template_class = static::$uid;
			$template_class .= ' pbs-module-text';
			$template_class .= !empty( $settings['template_class'] ) ? ' ' . $settings['template_class'] : '';
		?>
		<article <?php self::post_class( $template_class );?>>
			<header class="entry-header pbs_e-h">
						
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

			</header><!-- .entry-header -->
		</article>
		<?php
		}
		
	}
}