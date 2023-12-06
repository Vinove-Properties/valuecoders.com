<?php

namespace WP_Post_Blocks;

/**
 * Post Block Dual v4
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Dual_v4') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Dual_v4 extends Block_Base{
		static $id 			= 'pbs-dual-v4';
		static $react = 'post_block_dual_v4';
		static $class 		= 'pbs pbs-dual-v4';
		static $name 		= 'Dual v4'; 

		// static $restrict_ppp = false;
		static $min_ppp = 2;
		static $posts_per_page = 2;
		static $ppp_steps = true;

		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array( 'thumb_size', 'excerpt', 'show_rating' );
		}

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			if( $misc['ppp_flag'] && $misc['ppp_flag']%2 == 1 ){
				$this->start_row( 'row');
			}
			$this->start_col( 'col__md-1_2' );

				global $excerpt_length;
				$bk_length = $excerpt_length;
				
				$excerpt_length = 15;
				$settings['thumb_size'] = 'thumbnail';
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_counter_thumb', $settings, $misc );

				$excerpt_length = $bk_length;
			
			$this->end_col();

			// Open column left
			if( $misc['ppp_flag'] && $misc['ppp_flag']%2 == 0 ){
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
			if ($misc['ppp_flag'] && $misc['ppp_flag']%2 != 0){
				$this->end_row();
			}
		}
	}
}