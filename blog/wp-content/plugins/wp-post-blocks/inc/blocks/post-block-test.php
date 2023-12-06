<?php

namespace WP_Post_Blocks;

/**
 * Post Block 2
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

if( !class_exists( 'Block_test') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_test extends Block_Base{
		static $id 			= 'pbs-test';
		static $react = 'post_block_test';
		static $class 		= 'pbs pbs-test';
		static $name = 'Post block test';

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $instance = array(), $misc = array() ){

			if( 1==$misc['count'] ){
				Plugin::get_template('template_base', $instance, $misc );
			}else{
				$class = "Post_Template_{$misc['count']}";

				if( class_exists( $class ) )
					call_user_func_array( "{$class}::render", array( $instance, $misc ) );
				else
					Plugin::get_template('template_thumb_left', $instance, $misc );
				
			}

		}
	}
}