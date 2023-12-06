<?php

namespace WP_Post_Blocks;

/**
 * Post Block - Quad v2
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Quad_v2') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Quad_v2 extends Block_Base{
		static $id 			= 'pbs-quad-v2';
		static $react = 'post_block_quad_v2';
		static $class 		= 'pbs pbs-quad-v2';
		static $name 		= 'Quad v2';

		// static $restrict_ppp = false;
		static $min_ppp = 4;
		static $posts_per_page = 4;
		static $ppp_steps = true;
		
		public static function exclude_fields(){
			return array( 'thumb_style', 'excerpt', 'show_rating', 'thumb_cat' );
		}
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			if( $misc['ppp_flag'] && $misc['ppp_flag']%4 == 1 ){
				$this->start_row( 'row');
			}
			$this->start_col( 'col__sm-1_4 mb__xs-2 mb__md-0' );

				global $excerpt_length;
				$bk_length = $excerpt_length;
				
				$excerpt_length = 15;
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_text', $settings, $misc );

				$excerpt_length = $bk_length;
			
			$this->end_col();

			// Open column left
			if( $misc['ppp_flag'] && $misc['ppp_flag']%4 == 0 ){
				$this->end_row();
			}
		}
		/**
		 * after template
		 * Handling output by rewrite this template
		 *
		 * @param array $settings
		 * @param array $misc
		 * @return void
		 */
		public function render_template_loop_end( $settings = array(), $misc = array() ){
			if ($misc['ppp_flag'] && $misc['ppp_flag']%4 != 0){
				$this->end_row();
			}
		}
	}
}