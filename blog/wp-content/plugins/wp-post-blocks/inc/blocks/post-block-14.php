<?php

namespace WP_Post_Blocks;

/**
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_14') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_14 extends Block_Base{

		static $id 			= 'pbs-14';
		static $react 		= 'post_block_14';
		static $class 		= 'pbs pbs-14';
		static $name 		= 'Post Block 14';

		static $restrict_ppp = true;
		static $min_ppp = 4;
		static $posts_per_page = 4;
		static $ppp_steps = true;
		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array_merge( parent::exclude_fields(), array( 'posts_per_page', 'navigation', 'show_rating' ) );
		}
		/**
		 * Before template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_start( $settings = array(), $misc = array() ){	
			
			$classes = array( 'sm-default' );

			$cats = !empty( $this->block_instance['args']['cat'] ) ? $this->block_instance['args']['cat'] : ( !empty( $this->block_instance['args']['category__in'] ) ? $this->block_instance['args']['category__in'] : '' );
			
			if( !empty( $cats ) ){
				$tax = 'category';
				$ids = $cats;
			}else{
				$tax = 'post_tag';
				$ids = !empty( $this->block_instance['args']['tag_id'] ) ? $this->block_instance['args']['tag_id'] : '';
			}

			$settings['thumb_size'] = 'medium';
			// print_r( $ids );

			if( empty( $ids ) ){
				if( current_user_can( 'publish_pages' ) ){
					echo wp_sprintf( '<h4>%s</h4>', esc_html__( 'No Category/Tag Specified!', 'wp-post-blocks' ) );
				}
				return;
			}
				
			?>
			<div class="pbs-bricks bricks-o-w <?php echo esc_attr( join(' ', $classes ) );?>">
				<?php 
					$first_id = '';

					if( !is_array( $ids ) ){
						if( strpos( $ids,',') !== false ){
							$ids = explode( ',', $ids );
							$ids = array_unique ( array_filter( array_map( 'trim', $ids ) ) );
						}else{
							$ids = (array) $ids;
						}

					}

					$first_id = $ids[0];
					$thumb_style = !empty( $settings['thumb_style'] ) ? " brick-{$settings['thumb_style']}" : '';
				?>
				<div class="bricks-i-w">
					<div class="brick brick-o brick-sm<?php echo esc_attr( $thumb_style );?> col__full">
						<div class="brick-i">
							<div class="brick-c">
								<?php
									do_action( 'wp_post_blocks/post_template_brick_start' );
								?>
								<?php
									$term = get_term( $first_id, $tax );
									
									$term_image_id = get_term_meta( $term->term_id, 'image', true );
									$term_color = get_term_meta( $term->term_id, 'color', true );
								?>
								<div class="brick-c-i">
									<div class="brick-e-h">
										<h2 class="brick-e-t"><?php echo wp_sprintf( '<a href="%s" title="%s">%s</a>', esc_url( get_term_link( $term ) ), esc_attr( wp_sprintf( __('View all posts in %s', 'wp-post-blocks'), $term->name ) ), esc_attr( $term->name ) );?></h2>				
									</div>
								</div>

								<div class="brick-bg post-thumbnail pbs_e-p-t">
									<?php //echo '<div class="brick-bg-color bg-by-cat ' . echo esc_attr( $term->slug ) . '"></div>';?>
									<?php
									if( apply_filters( 'wp_post_blocks/use_background_image', false ) ){
										// Support wp-term-colors, wp-term-images
										
										$thumbnail = wp_get_attachment_image_url( $term_image_id , $settings['thumb_size'] );
										

										// Support Lazyload plugin
										if ( class_exists( 'LazyLoad_Images' ) ) {
															
											$template = '<div class="thumb-w"><div class="thumb-i" data-lazy-src="%s"></div></div>';

										}else{
											$template = '<div class="thumb-w"><div class="thumb-i" style="background-image:url(%s);"></div></div>';
										}

										// bg image
										echo !empty( $thumbnail ) ? wp_sprintf( $template, esc_attr( $thumbnail ) ) : '<div class="thumb-w"></div>' ;


									}else{
										
										echo wp_sprintf( '<div class="thumb-w">%s</div>', wp_get_attachment_image( $term_image_id, $settings['thumb_size'] ) );
									}

									?>
								</div>
								<?php
									do_action( 'wp_post_blocks/post_template_brick_end' );
								?>
							</div>
						</div>
					</div>
				</div>
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
			
			$settings['excerpt'] = false;
			$settings['thumb_size'] = 'thumbnail';
			$settings['title_class'] = 'xs__h6 sm__h6 md__h6';
			Plugin::get_template('template_text', $settings, $misc );

		}
	}
}