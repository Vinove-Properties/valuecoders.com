<?php

namespace WP_Post_Blocks;

/**
 * Post Block 10
 *
 * :–––––––––––––––––––––––––––––––––––: 
 * |                                   |  
 * |                                   |
 * |                                   |
 * |                                   |
 * |  This is the post title!          |
 * |  Post meta                        |
 * :–––––––––––––––––––––––––––––––––––:
 *
 * :–––––––––––––––:   :–––––––––––––––:
 * |               |   |               |
 * |               |   |               |
 * |               |   |               |
 * :–––––––––––––––:   :–––––––––––––––:
 * The post title!     The post title!
 * Post meta           Post meta
 *
 * :–––––––––––––––:   :–––––––––––––––:
 * |               |   |               |
 * |               |   |               |
 * |               |   |               |
 * :–––––––––––––––:   :–––––––––––––––:
 * The post title!     The post title!
 * Post meta           Post meta
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_10') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_10 extends Block_Base{
		static $id 			= 'pbs-10';
		static $react = 'post_block_10';
		static $class 		= 'pbs pbs-10';
		static $name 		= 'Post block 10';
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
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_overlay', $settings, $misc );
			}else{
				$settings['excerpt'] = false;
				$settings['thumb_size'] = 'thumbnail';
				$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
				Plugin::get_template('template_thumb_left', $settings, $misc );
			}
		}
	}
}