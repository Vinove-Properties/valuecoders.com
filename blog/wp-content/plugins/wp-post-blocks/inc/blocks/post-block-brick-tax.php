<?php

namespace WP_Post_Blocks;

/**
 * Post Block Category
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Taxonomy') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Taxonomy extends Block_Brick{

		static $id 			= 'pbs-brick-tax';
		static $react = 'post_block_brick_tax';
		static $class 		= 'pbs pbs-brick pbs-brick-tax';
		static $name 		= 'Taxonomy Bricks';

		static $restrict_ppp = false;
		static $min_ppp = 4;
		static $posts_per_page = 4;


		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array(
				'thumb_cat',
				'info_above', 
				'info',
				'excerpt',
				'show_rating',
				'navigation',
				'small_title',
				// 'category__in',
				'posts_per_page',
				'offset',
				'order',
				'orderby',
				'advanced_orderby',
				'time_period',
				// 'title_top'
			);
		}
		
		/**
		 * The loop_end
		 *
		 * @param 	$instance
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 * @return 	array
		 */
		public function the_loop(){

			$args = $this->block_instance['args'];
			$settings = $this->block_instance['settings'];
			$misc = array();
			$cats = !empty( $this->block_instance['args']['category__in'] ) ? $this->block_instance['args']['category__in'] : false;
			$cats = empty( $cats ) && !empty( $this->block_instance['args']['cat'] ) ? $this->block_instance['args']['cat'] : $cats;

			if( !empty( $cats ) ){
				$tax = 'category';
				$ids = $cats;
			}else{
				$tax = 'post_tag';
				$ids = !empty( $this->block_instance['args']['tag_id'] ) ? $this->block_instance['args']['tag_id'] : '';
			}
			
			if( is_string( $ids ) ){
				$ids = explode( ',', $ids );
				$ids = array_unique ( array_filter( array_map( 'trim', $ids ) ) );
			}
			if( !empty( $ids ) ){

				$terms = get_terms(
					array(
						'include'	=> $ids,
						'orderby'	=> 'include',
						'taxonomy'	=> $tax
					)
				);

				$this->render_template_loop_start( $settings, $misc );
				$thumb_size = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];

				foreach ( (array) $terms as $key => $term ) {
					$cat_image_id = get_term_meta( $term->term_id, 'image', true );
					$cat_color = get_term_meta( $term->term_id, 'color', true );

					?>
					<div class="brick brick-o brick-sm<?php echo esc_attr( " brick-{$settings['thumb_style']}" );?> col__md-1_4 brick-tax">
						<div class="brick-i">
							<div class="brick-c">
								<?php
									do_action( 'wp_post_blocks/post_template_brick_start' );
								?>
								<?php
									// if( strpos(haystack, needle))
									$cat_image_id = get_term_meta( $term->term_id, 'image', true );
									$cat_color = get_term_meta( $term->term_id, 'color', true );
								?>
								<div class="brick-c-i">
									<div class="brick-e-h">
										<h4 class="brick-e-t"><?php echo esc_html( $term->name )?></h4>				
									</div>
								</div>
							
								<div class="brick-bg post-thumbnail pbs_e-p-t">
									<?php //echo '<div class="brick-bg-color bg-by-cat ' . echo esc_attr( $term->slug ) . '"></div>';?>
									<?php
									if( apply_filters( 'wp_post_blocks/use_background_image', false ) ){
										// Support wp-term-colors, wp-term-images
										
										$thumbnail = wp_get_attachment_image_url( $cat_image_id , $thumb_size );

										// Support Lazyload plugin
										if ( class_exists( 'LazyLoad_Images' ) ) {
															
											$template = '<div class="thumb-w"><div class="thumb-i" data-lazy-src="%s"></div></div>';

										}else{
											$template = '<div class="thumb-w"><div class="thumb-i" style="background-image:url(%s);"></div></div>';
										}

										// bg image
										echo !empty( $thumbnail ) ? wp_sprintf( $template, esc_attr( $thumbnail ) ) : '<div class="thumb-w"></div>' ;


									}else{
										
										echo wp_sprintf( '<div class="thumb-w">%s</div>', wp_get_attachment_image( $cat_image_id, $thumb_size ) );
									}
									?>
								</div>

								<a class="brick-url" href="<?php echo esc_url( get_term_link( $term ) );?>" rel="bookmark">
									<span class="screen-reader-text"><?php echo esc_html($term->name); ?></span>
								</a>
								<?php
									do_action( 'wp_post_blocks/post_template_brick_end' );
								?>
							</div>
						</div>
					</div>

					
				<?php
				}

				$this->render_template_loop_end( $settings, $misc );
			}else{
				if( current_user_can( 'publish_pages' ) ){
					echo wp_sprintf( '<h4>%s</h4>', esc_html__( 'No Category/Tag Specified!', 'wp-post-blocks' ) );
				}
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
	}
}