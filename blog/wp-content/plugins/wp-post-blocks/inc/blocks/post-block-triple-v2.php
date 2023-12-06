<?php

namespace WP_Post_Blocks;

/**
 * Post Block Triple v2
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Triple_v2') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Triple_v2 extends Block_Base{
		static $id 			= 'pbs-triple-v2';
		static $react = 'post_block_triple_v2';
		static $class 		= 'pbs pbs-triple-v2';
		static $name = 'Post block - Triple v2';

		// static $restrict_ppp = false;
		static $min_ppp = 3;
		static $posts_per_page = 3;
		static $ppp_steps = true;
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			// Open column left
			if( $misc['ppp_flag'] && $misc['ppp_flag']%3 == 1 ){
				$this->start_row( 'pbs-row row');
			}

			$this->start_col( 'col__sm-1_3 mb__xs-2 mb__md-0' );
			$settings['thumb_size'] = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : 'thumbnail';
			$settings['title_class'] = 'xs__h6';
			Plugin::get_template('template_thumb_left', $settings, $misc );
			
			$this->end_col();

			// Open column left
			if( $misc['ppp_flag'] && $misc['ppp_flag']%3 == 0 ){
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
			if ($misc['ppp_flag'] && $misc['ppp_flag']%3 != 0){
				$this->end_row();
			}
		}
	}
}