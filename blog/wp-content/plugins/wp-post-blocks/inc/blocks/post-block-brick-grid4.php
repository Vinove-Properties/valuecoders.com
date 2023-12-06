<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick grid4
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Grid4') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Grid4 extends Block_Brick{

		static $id 			= 'pbs-brick-grid4';
		static $react 		= 'post_block_brick_grid4';
		static $class 		= 'pbs pbs-brick pbs-brick-grid4';
		static $name 		= 'Bricks - Grid 4';

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

			$class = 'brick-lg col__md-1_2';

			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium_large' : $settings['thumb_size'];
					$settings['title_class'] = 'xs__h4 lg__h2';
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}