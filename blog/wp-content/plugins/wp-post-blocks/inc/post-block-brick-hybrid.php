<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick hybrid
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Hybrid') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Hybrid extends Block_Brick{

		static $id 			= 'pbs-brick-hybrid';
		static $react 		= 'post_block_brick_hybrid';
		static $class 		= 'pbs pbs-brick pbs-brick-hybrid';
		static $name 		= 'Bricks - hybrid';

		static $restrict_ppp = true;
		static $min_ppp = 3;
		static $posts_per_page = 3;
		/**
		 * Exclude fields
		 *
		 * @return void
		 */
		public static function exclude_fields(){
			return array_merge( parent::exclude_fields(), array('thumb_style') );
		}

		/**
		 * Before template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_start( $settings = array(), $misc = array() ){	
			

		}
		/**
		 * After template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_end( $settings = array(), $misc = array() ){

			
		}

		public function render_template( $settings = array(), $misc = array() ){
			
		}
	}
}