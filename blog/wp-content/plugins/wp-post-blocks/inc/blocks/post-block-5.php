<?php

namespace WP_Post_Blocks;

/**
 * Post Block 5 - with counter
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

if( !class_exists( 'Block_5') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_5 extends Block_Base{
		static $id 			= 'pbs-5';
		static $react = 'post_block_5';
		static $class 		= 'pbs pbs-5';
		static $name 		= 'Post block 5';
		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array( 'thumb_cat', 'thumb_style', 'excerpt', 'show_rating' );
		}

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
			Plugin::get_template('template_counter_text', $settings, $misc );
		}
	}
}