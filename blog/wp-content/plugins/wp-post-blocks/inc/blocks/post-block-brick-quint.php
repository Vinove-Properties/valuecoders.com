<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick Quint
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Quint') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Quint extends Block_Brick{

		static $id 				= 'pbs-brick-quint';
		static $react 	= 'post_block_brick_quint';
		static $class 			= 'pbs pbs-brick pbs-brick-quint';
		static $name 			= 'Bricks - Quint';

		static $restrict_ppp 	= false;
		static $min_ppp 		= 5;
		static $posts_per_page 	= 5;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			
			$class = 'col__md-1_5 brick-h-130';

			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium_large' : $settings['thumb_size'];
					$settings['title_class'] = 'xs__h4 md__h6';
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}