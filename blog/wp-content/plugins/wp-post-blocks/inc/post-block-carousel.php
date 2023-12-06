<?php

namespace WP_Post_Blocks;

/**
 * Post Block Slider
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Carousel') ){

	if( !class_exists( 'Block_Slider' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-slider.php';
	}

	class Block_Carousel extends Block_Slider{

		static $id 			= 'pbs-carousel';
		static $react 		= 'post_block_carousel';
		static $class 		= 'pbs pbs-carousel';
		static $group 		= 'Post Slider';
		static $name 		= 'Post Block - Carousel'; 

		static $restrict_ppp = false;
		static $min_ppp = 6;
		static $posts_per_page = 6;
		/**
		 * Extra shortcode params
		 *
		 * @return void
		 */
		public static function extra_shortcode_params(){

			return array(
				'slider_animation' 	=> 'slide',
				'slider_autoplay' 	=> '',
				'slider_nav'		=> 'direction_nav',
				'thumb_style'		=> 'default',
				'carousel_items' => 3,
				'responsiveTo'		=> 'viewport'
			);

		}

		public static function exclude_fields(){
			return array( 'excerpt', 'show_rating', 'navigation', 'slider_animation' );
		}
		/**
		 * extra
		 *
		 * @since 1.0
		 * @return (array)
		 */
		public static function extra_fields(){
			
			return array_merge( parent::extra_fields(), array(
				'carousel_items' => array(
					'type' 			=> 'select',
					'title' 		=> esc_html__( 'Number of items per slide', 'wp-post-blocks' ),
					'desc' 			=> esc_html__( 'This block will show number of items depend on container width.', 'wp-post-blocks' ),
					'id' 			=> 'carousel_items',
					'std'			=> 2,
					// 'group'			=> '',
					'options' 		=> array( 
						'2'	=> esc_html__( '2 items', 'wp-post-blocks' ),
						'3'	=> esc_html__( '3 items', 'wp-post-blocks' ),
						'4'	=> esc_html__( '4 items', 'wp-post-blocks' ),
						'5'	=> esc_html__( '5 items', 'wp-post-blocks' ),

					),
					'save_always' 	=> true,
					// 'admin_label' => true
				)
			) );
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
			$args = array(
				'animation' 	=> 'slide',
				'slideshow'		=> !empty( $settings['slider_autoplay'] ) ? true : false,
				// 'controlNav'	=> 'thumbnails',
				'controlNav' => false,
				'directionNav' => false,
				// 'itemWidth'		=> 1, 
				'animationLoop' => true,
                'itemMargin'	=> 0,
                'itemWidth'		=> 150,
                'minItems'		=> 1, // use function to pull in initial value
                // 'maxItems'		=> 2, // use function to pull in initial value
				'responsive' 	=> array(

                    
                    559 => array( 
                    	'minItems' => 1,
                        'itemWidth'=> 150, 
                    ),
                    560 => array( 
                    	'minItems' => 2,
                        'maxItems' => 2,
                        'itemWidth'=> 1, 
                    ),
                    768 => array( 
                    	'minItems' => 3,
                        'maxItems' => 3,
                        'itemWidth'=> 1, 
                    ),
                    900 => array( 
                    	'minItems' => intval( $settings['carousel_items'] ),
                        'maxItems' => intval( $settings['carousel_items'] ),
                        'itemWidth'=> 1, 
                    )
                ),
                'responsiveTo' => !empty( $settings['responsiveTo'] ) ? 'container' :'viewport'
				
			);
	

			$c_items = intval( $settings['carousel_items'] );

			if( $c_items > 2 ){
				$args['responsive']['768'] = array( 
                	'minItems' => 3,
                    'maxItems' => 3,
                    'itemWidth'=> 1, 
                );
				$args['responsive']['992'] = array( 
                	'minItems' => intval( $settings['carousel_items'] ),
                    'maxItems' => intval( $settings['carousel_items'] ),
                    'itemWidth'=> 1, 
                );
			}

			if( 'control_nav' == $settings['slider_nav'] ){
				$args['controlNav'] = true;
				$args['directionNav'] = false;
			}elseif( 'both' == $settings['slider_nav'] ){
				$args['directionNav'] = true;
				$args['controlNav'] = true;
			}
			elseif( 'custom_nav' == $settings['slider_nav'] ){
				
				$args['controlNav'] = true;
				$args['directionNav'] = true;
				$args['customNav'] = true;
				$args['controlsContainer'] = "#{$this->uid}-controls-container";
				$args['customDirectionNav'] = "#{$this->uid}-direction-navigation a";
			}else{
				$args['directionNav'] = true;
				$args['controlNav'] = false;
			}

			$args = apply_filters( 'wp_post_blocks/carousel_settings', $args, 'pbs_carousel' );


			?>

			<div class="flexslider pbs-carousel carousel <?php echo esc_attr( join(' ', $classes ) );?>" data-settings="<?php echo esc_attr( @wp_json_encode( $args ) );?>">
				<ul class="slides">
			<?php

		}
		
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			$class = 'brick-uwide brick-lg col__full';
			// $settings['thumb_style'] = 'default';

			?>
			<li>
				<div class="slide-inner">
				<?php
				
					// if( !empty( $settings['thumb_size'] ) ){
						if( !empty( $settings['carousel_items'] ) && in_array( $settings['carousel_items'], array( '2', '3' ) ) ){
							$settings['thumb_size'] = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : 'post-thumbnail';
							$settings['title_class'] = 'xs__h6 sm__h4';
						}else{
							$settings['thumb_size'] = !empty( $settings['thumb_size'] ) ? $settings['thumb_size'] : 'medium';
							$settings['title_class'] = 'xs__h6 sm__h6';
						}
					// }
					Plugin::get_template('template_base', $settings, $misc );
				?>
				</div>
			</li>
			<?php
		}
	}
}