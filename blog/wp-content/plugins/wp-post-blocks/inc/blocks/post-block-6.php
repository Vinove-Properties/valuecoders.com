<?php

namespace WP_Post_Blocks;

/**
 * Post Block 6 - with counter
 *
 * 1. This is the post title!
 *    Post meta
 *
 * 2. This is the post title!
 *    Post meta
 *
 * 3. This is the post title!
 *    Post meta
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_6') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_6 extends Block_Base{
		static $id 			= 'pbs-6';
		static $react = 'post_block_6';
		static $class 		= 'pbs pbs-6';
		static $name 		= 'Post block 6';

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			$settings['thumb_size'] = 'thumbnail';
			$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
			Plugin::get_template('template_counter_thumb', $settings, $misc );
		}
	}
}
