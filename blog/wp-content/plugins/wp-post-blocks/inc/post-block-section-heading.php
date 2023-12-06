<?php

namespace WP_Post_Blocks;

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Section_Heading') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Section_Heading extends Block_Base{

		static $id 			= 'pbs-section-heading';
		static $react 		= 'post_block_section_heading';
		static $class 		= 'pbs pbs-section-heading';
		static $name 		= 'Post Block Section Heading';

		public function render_block( $args = array() ){

			$args = wp_parse_args( $args, array(
				'title'	=> '',
				'desc'	=> ''
			) );

			if( empty( $args['title'] ) ){
				$args['title'] = 'Block Heading title';
				$args['desc'] = 'This is a line of description';
				$args['align_center'] = 1;
			}
			$html = !empty( $args['title'] ) ? wp_sprintf( '<h2 class="pbs-section-title">%s</h2>', wp_kses_post( $args['title'] ) ) : '';
			$html .= !empty( $args['title'] ) && !empty( $args['desc'] ) ? wp_sprintf( '<div class="pbs-section-desc">%s</div>', wp_kses_post( $args['desc'] ) ) : '';

			if( !empty( $html ) ){
				echo wp_sprintf( '<div class="pbs-section-heading' . (!empty( $args['align_center'] ) ? ' align-center' : '' ) . '">%s</div>', $html );
			}
		}
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

		}

		public static function get_params(){
			$params = array(
                'title' => array(
					'title' 	=> esc_html__('Title', 'wp-post-blocks'),
					'type' 		=> 'text',
					'id' 		=> 'title',
					'std' 		=> '',
					'desc' 		=> esc_html__('Required', 'wp-post-blocks'),

					'admin_label' => true
				),
                'desc' => array(
                	'title'		=> esc_html__('Description', 'wp-post-blocks'),
					'type' 		=> 'textarea',
					'id' 		=> 'desc',
					'std' 		=> '',
					'desc' 		=> ''
				),
				'align_center' => array(
                	'title'		=> esc_html__('Align Center', 'wp-post-blocks'),
					'type' 		=> 'checkbox',
					'id' 		=> 'align_center',
					'std' 		=> 0,
					'desc' 		=> ''
				),
            );

            return $params;
		}

	}
	
}