<?php

namespace WP_Post_Blocks;

/**
 * Post Block Triple
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Triple') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Triple extends Block_Base{
		static $id 			= 'pbs-triple';
		static $react		= 'post_block_triple';
		static $class 		= 'pbs pbs-triple';
		static $name 		= 'Post block - Triple';

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

			// Open Row
			if( $misc['ppp_flag'] && $misc['ppp_flag']%3 == 1 ){
				$this->start_row( 'row');
			}

			$this->start_col( 'pbs-col-lg col__sm-1_3 mb__xs-2 mb__md-0' );

			$settings['thumb_size'] = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : 'medium';
			$settings['title_class'] = 'xs__h4 sm__h5 md__h4';
			Plugin::get_template('template_base', $settings, $misc );

			$this->end_col('end-col');

			// End Row
			if( $misc['ppp_flag'] && $misc['ppp_flag']%3 == 0 ){
				$this->end_row('end row');
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
				$this->end_row('end row');
			}
		}
	}
}