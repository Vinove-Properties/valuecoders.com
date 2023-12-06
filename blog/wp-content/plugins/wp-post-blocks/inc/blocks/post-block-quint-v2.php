<?php

namespace WP_Post_Blocks;

/**
 * Post Block - Quint v2
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Quint_v2') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Quint_v2 extends Block_Base{
		static $id 			= 'pbs-quint-v2';
		static $react = 'post_block_quint_v2';
		static $class 		= 'pbs pbs-quint-v2';
		static $name 		= 'Quint v2';

		// static $restrict_ppp = false;
		static $min_ppp = 5;
		static $posts_per_page = 5;
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
			
			if( $misc['ppp_flag'] && $misc['ppp_flag']%5 == 1 ){
				$this->start_row( 'row');
			}
			
			$this->start_col( 'col__md-1_5 mb__xs-2 mb__md-0' );

				global $excerpt_length;
				$bk_length = $excerpt_length;
				
				$excerpt_length = 15;
				$settings['title_class'] = 'xs__h6';
				Plugin::get_template('template_text', $settings, $misc );

				$excerpt_length = $bk_length;

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