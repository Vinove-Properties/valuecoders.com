<?php

namespace WP_Post_Blocks;

/**
 * Post Block Quint
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Quint') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Quint extends Block_Base{
		static $id 			= 'pbs-quint';
		static $react = 'post_block_quint';
		static $class 		= 'pbs pbs-quint';
		static $name 		= 'Quint v1';

		// static $restrict_ppp = false;
		static $min_ppp = 5;
		static $posts_per_page = 5;
		static $ppp_steps = true;
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			// Open column left
			if( $misc['ppp_flag'] && $misc['ppp_flag']%5 == 1 ){
				$this->start_row( 'row');
			}
			
			$this->start_col( 'col__md-1_5 mb__xs-2 mb__md-0' );
			$settings['thumb_size'] = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : 'medium';
			$settings['title_class'] = 'xs__h4 sm__h5 md__h6';
			Plugin::get_template('template_wide', $settings, $misc );
			
			$this->end_col();

			// Open column left
			if( $misc['ppp_flag'] && $misc['ppp_flag']%5 == 0 ){
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
			if ($misc['ppp_flag'] && $misc['ppp_flag']%5 != 0){
				$this->end_row();
			}
		}
	}
}