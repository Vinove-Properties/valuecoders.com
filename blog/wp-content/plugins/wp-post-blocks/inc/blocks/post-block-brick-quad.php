<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick Quad
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Quad') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Quad extends Block_Brick{

		static $id 			= 'pbs-brick-quad';
		static $react = 'post_block_brick_quad';
		static $class 		= 'pbs pbs-brick pbs-brick-quad';
		static $name 		= 'Bricks - Quad';

		static $restrict_ppp = false;
		static $min_ppp = 4;
		static $posts_per_page = 4;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			$class = 'col__sm-1_2 brick-h-130 col__md-1_4';

			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium_large' : $settings['thumb_size'];
					$settings['title_class'] = 'xs__h4 lg__h3';
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}