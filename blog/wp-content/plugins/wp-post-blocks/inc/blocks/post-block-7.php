<?php

namespace WP_Post_Blocks;

/**
 * Post Block 7
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_7') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_7 extends Block_Base{
		static $id 			= 'pbs-7';
		static $react = 'post_block_7';
		static $class 		= 'pbs pbs-7';
		static $name 		= 'Post block 7';

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
			$settings['title_class'] = 'xs__h6';
			Plugin::get_template('template_overlay', $settings, $misc );
		}
	}
}