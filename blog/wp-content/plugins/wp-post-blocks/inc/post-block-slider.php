<?php

namespace WP_Post_Blocks;

/**
 * Post Block Slider
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Slider') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Slider extends Block_Base{

		static $id 			= 'pbs-slider';
		static $react 		= 'post_block_slider';
		static $class 		= 'pbs pbs-slider';
		static $group 		= 'Post Slider';
		static $name 		= 'Post Block - Slider';

		static $restrict_ppp = false;
		static $min_ppp = 5;
		static $posts_per_page = 5;
		/**
		 * Extra shortcode params
		 */
		public static function extra_shortcode_params(){
			return array(
				'slider_animation' 	=> 'slide',
				'slider_autoplay' 	=> '',
				'slider_nav'		=> 'direction_nav',
				// 'thumb_style'		=> 'default'
			);

		}
		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array( 'excerpt', 'navigation' );
		}
		/**
		 * VC - shortcode parameters
		 *
		 * @return (array)
		 */
		public static function extra_fields(){

			return array(
				'slider_animation'	=> array(
					'type' 			=> 'select',
					'title' 		=> esc_html__( 'Slider Animation', 'wp-post-blocks' ),
					'desc' 			=> '',
					'id' 			=> 'slider_animation',
					// 'group'			=> '',
					'save_always' 	=> true,
					'options' 		=> array( 
						'slide'			=> esc_html__( 'Default (slide)', 'wp-post-blocks' ),
						'fade'			=> esc_html__( 'Fade', 'wp-post-blocks' )
					),
					// 'admin_label' => true
				),
				'slider_autoplay'	=> array(
					'type' 			=> 'checkbox',
					'title' 		=> esc_html__( 'Slider Autoplay', 'wp-post-blocks' ),
					'desc' 			=> '',
					'id' 			=> 'slider_autoplay',
					// 'group'			=> '',
					'save_always' 	=> true
				),
				'slider_nav'	=> array(
					'title' 		=> esc_html__( 'Slider Navigation', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id' 			=> 'slider_nav',
					'std'			=> 'direction_nav',
					'desc' 			=> '',
					'options' 		=> array( 
						 'direction_nav'	=> esc_html__( 'Default (Direction nav)', 'wp-post-blocks' ),
						 'control_nav'		=> esc_html__( 'Control Nav (Dots)', 'wp-post-blocks' ),
						 'both'				=> esc_html__( 'Direction nav + Control Nav', 'wp-post-blocks' ),
						 // 'custom_nav'		=> esc_html__( 'Custom Nav (Prev/Next + Dots)', 'wp-post-blocks' ),
					),
					// 'group'			=> '',
					'save_always' 	=> true,
					// 'admin_label' => true
				)

			);
		}

		/**
		 * Before template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_start( $settings = array(), $misc = array() ){	
			$classes = array();
			// $classes[] = !empty( $settings['bricks_sm'] ) ? "sm-{$settings['bricks_sm']}" : 'sm-default';
			$args = apply_filters( 'wp_post_blocks/slider_settings', array(
				'animation' 	=> $settings['slider_animation'],
				'slideshow'		=> !empty( $settings['slider_autoplay'] ) ? true : false
				// 'controlNav'	=> 'thumbnails',
				// 'controlNav' => false,
				// 'directionNav' => false
				
			), 'pbs_slider' );

			if( 'control_nav' == $settings['slider_nav'] ){
				$args['controlNav'] = true;
				$args['directionNav'] = false;
			}elseif( 'both' == $settings['slider_nav'] ){
				$args['directionNav'] = true;
				$args['controlNav'] = true;
			}
			else{
				$args['directionNav'] = true;
				$args['controlNav'] = false;
			}
			
			?>

			<div class="flexslider pbs-slider slider <?php echo esc_attr( join(' ', $classes ) );?>" data-settings="<?php echo esc_attr( @wp_json_encode( $args ) );?>">
				<ul class="slides">
			<?php

		}
		/**
		 * After template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_end( $settings = array(), $misc = array() ){

			?>
				</ul>
			</div>
			
			<?php
		}
		
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			$class = '';
			// $settings['thumb_style'] = empty( $settings['thumb_style'] ) 
			$class .= !empty( $settings['thumb_style'] ) ? 'brick-' . $settings['thumb_style'] : $settings['thumb_style'];
			
			$class .= ' brick-lg col__full';
			$thumb_id = get_post_thumbnail_id( get_the_ID() );
			$thumb = wp_get_attachment_image_url( $thumb_id, 'post-thumbnail' );
			$settings['title_class'] = 'xs__h6 sm__h3 md__h1';
			?>
			<li data-thumb="<?php echo esc_attr( wp_get_attachment_thumb_url( $thumb_id ) );?>">
				<div class="pbs-bricks bricks-o-w pbs-bricks-single no-gaps">
					<div class="bricks-i-w">
						<div class="brick brick-o <?php echo esc_attr( $class );?>">
							<div class="brick-i">
								<?php
								Plugin::get_template('template_brick', $settings, $misc );
								?>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php
		}
	}
}