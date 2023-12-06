<?php

namespace WP_Post_Blocks;

/**
 * Post Block default
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
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_1') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_1 extends Block_Base{
		/**
		 * Post block id base
		 * @var string 	$id_base 
		 */
		static $id_base = 'pbs';

		static $id = 'pbs-default';
		
		static $name = 'Post block';

		static $react = 'post_block_1';

		static $posts_per_page = 5;
		
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 *
		 * @param array $settings
		 * @param array $misc
		 * @return void
		 */
		public function render_template( $settings = array(), $misc = array() ){

			$settings['thumb_size'] = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : 'medium';
			$settings['title_class'] = 'xs__h6';
			Plugin::get_template('template_base', $settings, $misc );
		}

		
	}
}