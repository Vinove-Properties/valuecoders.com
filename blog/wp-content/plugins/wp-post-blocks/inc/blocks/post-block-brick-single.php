<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick 1x4
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Single') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Single extends Block_Brick{

		static $id 			= 'pbs-brick-single';
		static $react 		= 'post_block_brick_single';
		static $class 		= 'pbs pbs-brick pbs-brick-single';
		static $name 		= 'Brick - Single';

		static $restrict_ppp = false;
		static $min_ppp = 1;
		static $posts_per_page = 1;

		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array_merge( parent::exclude_fields(), array( 'thumb_style', 'bricks_sm' ) );
		}

		/**
		 * Before template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_start( $settings = array(), $misc = array() ){	
			$classes = array();
			if( !empty( $settings['bricks_gap'] ) && in_array( $settings['bricks_gap'], array( 'xsmall-gaps', 'small-gaps', 'medium-gaps', 'big-gaps', 'no-gaps' ) ) )
				$classes[] = $settings['bricks_gap'];
			
			$classes[] = 'sm-default';
			
			?>
			<div class="pbs-bricks bricks-o-w <?php echo esc_attr( join(' ', $classes ) );?>">
				<div class="bricks-i-w">
			<?php

		}

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			if( 1 == $misc['flag'] ){
				$class = 'brick-lg col__full';
			}
			
			?><div class="brick brick-o brick-uwide <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'large' : $settings['thumb_size'];
					$settings['title_class'] = 'xs__h4 sm__h2 lg__h1';
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}