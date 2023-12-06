<?php

namespace WP_Post_Blocks;

/**
 * Post Block 2
 * 
 *                          :––––––––: 
 * This is the post title!  |        |  
 * Post meta                |        |
 *                          :––––––––:
 * 
 *                          :––––––––: 
 * This is the post title!  |        |  
 * Post meta                |        |
 *                          :––––––––:
 * 
 *                          :––––––––: 
 * This is the post title!  |        |  
 * Post meta                |        |
 *                          :––––––––:
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_3') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_3 extends Block_Base{
		static $id 			= 'pbs-3';
		static $react = 'post_block_3';
		static $class 		= 'pbs pbs-3';
		static $name 		= 'Post block 3';

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			$settings['thumb_size'] = 'thumbnail';
			$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
			Plugin::get_template('template_thumb_right', $settings, $misc );
		}
	}
}