<?php

namespace WP_Post_Blocks;

/**
 * Post Block 4 - title only
 *
 * This is the post title!
 * Post meta
 *
 * This is the post title!
 * Post meta
 *
 * This is the post title!
 * Post meta
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_4') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_4 extends Block_Base{
		static $id 			= 'pbs-4';
		static $react = 'post_block_4';
		static $class 		= 'pbs pbs-4';
		static $name 		= 'Post block 4';

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
			Plugin::get_template('template_text', $settings, $misc );
		}
	}
}