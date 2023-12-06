<?php

namespace WP_Post_Blocks;

/**
 * Post Block 13
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_13') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_13 extends Block_Base{
		static $id 			= 'pbs-13';
		static $react = 'post_block_13';
		static $class 		= 'pbs pbs-13';
		static $name 		= 'Post block 13';

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			
			if( 1==$misc['ppp_flag'] ){
				$settings['thumb_style'] = 'default';
				$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
				$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
				Plugin::get_template('template_counter_overlay', $settings, $misc );
			}else{
				$settings['excerpt'] = false;
				$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
				Plugin::get_template('template_counter_text', $settings, $misc );
			}
		}
	}
}