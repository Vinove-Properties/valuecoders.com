<?php

namespace WP_Post_Blocks;

/**
 * Post Block Quad
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Quad') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Quad extends Block_Base{
		static $id 			= 'pbs-quad';
		static $react = 'post_block_quad';
		static $class 		= 'pbs pbs-quad';
		static $name 		= 'Quad v1';

		// static $restrict_ppp = false;
		static $min_ppp = 4;
		static $posts_per_page = 4;
		static $ppp_steps = true;
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $settings
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			if( $misc['ppp_flag'] && $misc['ppp_flag']%4 == 1 ){
				$ex_class = !$misc['is_paged'] && $misc['order'] > 1 || $misc['is_paged'] && $misc['flag'] > 1 ? ' mt__md-2' : '';
				$this->start_row( 'row' . $ex_class );
			}
			$this->start_col( 'col__xs-1_2 col__md-1_4 mb__xs-2 mb__md-0' . ($misc['ppp_flag']%2 === 1 ? ' c__xs-l c__md-n' : '' ) );
			// print_r( $misc );
			$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
			$settings['title_class'] = 'xs__h6 sm__h5';
			Plugin::get_template('template_base', $settings, $misc );
			
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