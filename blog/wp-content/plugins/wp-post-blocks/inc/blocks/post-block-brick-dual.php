<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick Dual
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Dual') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Dual extends Block_Brick{

		static $id 			= 'pbs-brick-dual';
		static $react = 'post_block_brick_dual';
		static $class 		= 'pbs pbs-brick pbs-brick-dual';
		static $name 		= 'Bricks - Dual';

		static $restrict_ppp = false;
		static $min_ppp = 2;
		static $posts_per_page = 2;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			$class = 'brick-lg col__md-1_2';

			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium_large' : $settings['thumb_size'];
					$settings['title_class'] = 'xs__h4 sm__h2';
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}