<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick Grid 6
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Grid6') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Grid6 extends Block_Brick{

		static $id 			= 'pbs-brick-grid6';
		static $react = 'post_block_brick_grid6';
		static $class 		= 'pbs pbs-brick pbs-brick-grid6';
		static $name 		= 'Bricks - Grid 6';

		static $restrict_ppp = false;
		static $min_ppp = 6;
		static $posts_per_page = 6;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			
			$class = 'brick-sm col__sm-1_2 col__md-1_3';

			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
					$settings['title_class'] = 'xs__h4';
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}