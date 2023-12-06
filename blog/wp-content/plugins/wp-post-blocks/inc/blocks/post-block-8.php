<?php

namespace WP_Post_Blocks;

/**
 * Post Block 8
 *
 * :–––––––––––––––––––––––––––––––––––: 
 * |                                   |  
 * |                                   |
 * |                                   |
 * |                                   |
 * |                                   |
 * |                                   |
 * :–––––––––––––––––––––––––––––––––––:
 * This is the post title!
 * Post meta
 * 
 * .––––––––.  
 * |        |  This is the post title!
 * |        |  Post meta
 * .––––––––.
 * 
 * .––––––––.  
 * |        |  This is the post title!
 * |        |  Post meta
 * .––––––––.
 * 
 * .––––––––.  
 * |        |  This is the post title!
 * |        |  Post meta
 * .––––––––.
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_8') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_8 extends Block_Base{
		static $id 			= 'pbs-8';
		static $react = 'post_block_8';
		static $class 		= 'pbs pbs-8';
		static $name 		= 'Post block 8';
		static $posts_per_page = 4;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			if( 1== $misc['ppp_flag'] ){
				$settings['thumb_style'] = empty( $settings['thumb_style'] ) ? 'wide' : $settings['thumb_style'];
				$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
				$settings['title_class'] = 'xs__h4 sm__h3 md__h4';
				Plugin::get_template('template_wide', $settings, $misc );
			}else{
				$settings['excerpt'] = false;
				$settings['thumb_size'] = 'thumbnail';
				$settings['thumb_style'] = 'square';
				$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
				Plugin::get_template('template_thumb_left', $settings, $misc );
			}
		}
	}
}