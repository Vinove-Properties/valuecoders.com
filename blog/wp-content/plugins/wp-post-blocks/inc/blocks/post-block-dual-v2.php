<?php

namespace WP_Post_Blocks;

/**
 * Post Block Dual v2
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Dual_v2') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Dual_v2 extends Block_Base{
		static $id 			= 'pbs-dual-v2';
		static $react = 'post_block_dual_v2';
		static $class 		= 'pbs pbs-dual-v2';
		static $name 		= 'Dual v2';

		static $restrict_ppp = false;
		static $min_ppp = 2;
		static $posts_per_page = 2;
		static $ppp_steps = true;

		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			if( $misc['ppp_flag'] && $misc['ppp_flag']%2 == 1 ){
				
				$this->start_row( 'row' );
			}

			$this->start_col( 'col__md-1_2 mb__xs-2 mb__md-0' );

			$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'thumbnail' : $settings['thumb_size'];
			$settings['title_class'] = 'xs__h6';
			Plugin::get_template('template_thumb_left', $settings, $misc );
			
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