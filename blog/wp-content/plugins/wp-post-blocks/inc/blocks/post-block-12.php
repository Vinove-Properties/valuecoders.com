<?php

namespace WP_Post_Blocks;

/**
 * Post Block 12
 * 
 * :–––––––––––––––:                         
 * |               |  This is the post title!
 * |               |  Post meta                
 * |               |                           
 * :–––––––––––––––:  Sed ut perspiciatis unde 
 * omnis iste natus error sit voluptatem 
 * accusantium doloremque laudantium .
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

if( !class_exists( 'Block_12') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_12 extends Block_Base{

		static $id 			= 'pbs-12';
		static $react = 'post_block_12';
		static $class 		= 'pbs pbs-12';
		static $name 		= 'Post block 12';
		static $posts_per_page = 4;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			if( 1== $misc['ppp_flag'] ){
				$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_base', $settings, $misc );
			}else{
				$settings['excerpt'] = false;
				$settings['info'] = false;
				$settings['info_above'] = false;
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_text_list', $settings, $misc );
			}
		}
	}
}