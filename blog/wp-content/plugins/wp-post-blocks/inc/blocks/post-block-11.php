<?php

namespace WP_Post_Blocks;

/**
 * Post Block 11
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

if( !class_exists( 'Block_11') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_11 extends Block_Base{

		static $id 			= 'pbs-11';
		static $react = 'post_block_11';
		static $class 		= 'pbs pbs-11';
		static $name 		= 'Post block 11';
		static $posts_per_page = 4;
		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array( 'excerpt' );
		}

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			if( 1== $misc['ppp_flag'] ){
				$settings['excerpt'] = true;
				$settings['thumb_size'] = 'thumbnail';
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_thumb_alt_left', $settings, $misc );
			}else{
				$settings['excerpt'] = false;
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_text_list', $settings, $misc );
			}
		}
	}
}