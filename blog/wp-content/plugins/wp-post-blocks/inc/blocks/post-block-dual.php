<?php

namespace WP_Post_Blocks;

/**
 * Post Block Dual
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Dual') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Dual extends Block_Base{
		static $id 			= 'pbs-dual';
		static $react = 'post_block_dual';
		static $class 		= 'pbs pbs-dual';
		static $name 		= 'Dual v1';

		// static $restrict_ppp = false;
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
				$ex_class = !$misc['is_paged'] && $misc['order'] > 1 || $misc['is_paged'] && $misc['flag'] > 1 ? ' mt__xs-2' : '';
				$this->start_row( 'row' . $ex_class );
			}
			$this->start_col( 'col__xs-1_2' );
			$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
			$settings['title_class'] = 'xs__h6 sm__h5';
			Plugin::get_template('template_base', $settings, $misc );
			
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