<?php

namespace WP_Post_Blocks;

/**
 * Post Block Slider
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Carousel') ){

	if( !class_exists( 'Block_Carousel' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-carousel.php';
	}

	class Block_Brick_Carousel extends Block_Carousel{

		static $id 			= 'pbs-brick-carousel';
		static $react = 'post_block_brick_carousel';
		static $class 		= 'pbs pbs-brick-carousel';
		static $tab 		= 'Post Bricks';
		static $name 		= 'Post Block - Brick Carousel';

		static $restrict_ppp = false;
		static $min_ppp = 6;
		static $posts_per_page = 6;

		public static function exclude_fields(){
			return array( 'excerpt', 'show_rating', 'navigation', 'thumb_style', 'slider_animation' );
		}
		
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){

			$class = 'brick-sm';
			$thumb_id = get_post_thumbnail_id( get_the_ID() );
			$thumb = wp_get_attachment_image_url( $thumb_id, 'post-thumbnail' );
			$settings['thumb_style'] = 'default';

			?>
			<li>
				<div class="slide-inner">
					<div class="pbs-bricks bricks-o-w no-gaps">
						<div class="bricks-i-w">
							<div class="brick brick-o <?php echo esc_attr( $class );?>">
								<div class="brick-i">
									<?php
									if( !empty( $settings['carousel_items'] ) && in_array( $settings['carousel_items'], array( '2', '3' ) ) ){
										$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'post-thumbnail' : $settings['thumb_size'];
									}else{
										$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
									}
									Plugin::get_template('template_brick', $settings, $misc );
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php
		}
	}
}