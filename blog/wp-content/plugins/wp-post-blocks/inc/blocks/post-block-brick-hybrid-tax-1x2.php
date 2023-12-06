<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick 1x4
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick_Hybrid_Tax_1x2') ){

	if( !class_exists( 'Block_Brick' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-brick.php';
	}

	class Block_Brick_Hybrid_Tax_1x2 extends Block_Brick{

		static $id 			= 'pbs-brick-hybrid-tax-1x2';
		static $react 		= 'post_block_brick_hybrid_tax_1x2';
		static $class 		= 'pbs pbs-brick pbs-brick-hybrid-tax-1x2';
		static $name 		= 'Bricks - Hybrid Taxonomy - 1x2';

		static $restrict_ppp = true;
		static $min_ppp = 2;
		static $posts_per_page = 2;
		static $ppp_steps = true;
		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array_merge( parent::exclude_fields(), array( 'posts_per_page', 'navigation', 'small_title' ) );
		}
		/**
		 * Before template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template_loop_start( $settings = array(), $misc = array() ){	
			$classes = array();
			$classes[] = !empty( $settings['bricks_sm'] ) ? "sm-{$settings['bricks_sm']}" : 'sm-default';

			if( !empty( $settings['bricks_gap'] ) && in_array( $settings['bricks_gap'], array( 'xsmall-gaps', 'small-gaps', 'medium-gaps', 'big-gaps', 'no-gaps' ) ) )
				$classes[] = $settings['bricks_gap'];

			$cats = !empty( $this->block_instance['args']['category__in'] ) ? $this->block_instance['args']['category__in'] : false;
			$cats = empty( $cats ) && !empty( $this->block_instance['args']['cat'] ) ? $this->block_instance['args']['cat'] : $cats;

			if( !empty( $cats ) ){
				$tax = 'category';
				$ids = $cats;
			}else{
				$tax = 'post_tag';
				$ids = !empty( $this->block_instance['args']['tag_id'] ) ? $this->block_instance['args']['tag_id'] : '';
			}

			?>
			<div class="pbs-bricks bricks-o-w <?php echo esc_attr( join(' ', $classes ) );?>">
				<div class="bricks-i-w">
					<?php if( !empty( $ids ) ){
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
					?>
					<div class="brick brick-o brick-lg col__md-1_2 brick-tax vtext-top">
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
										<h2 class="brick-e-t xs__h4 sm__h3 md__h2 lg__h1"><?php echo wp_sprintf( '<a href="%s" title="%s">%s</a>', esc_url( get_term_link( $term ) ), esc_attr( wp_sprintf( __('View all posts in %s', 'wp-post-blocks'), $term->name ) ), esc_attr( $term->name ) );?></h2>				
									</div>
									<?php if( !empty( $term->description ) ){
										echo wp_sprintf( '<div class="brick-e-s">%s</div>', wp_kses_post( $term->description ) );
										}
									?>
									
									<?php if( 'category' === $tax ){ ?>
									<div class="brick-e-f">
										<?php
											$args 	= array(
												'hierarchical' => 0,
												'child_of' => $term->term_id,
												'title_li' => '',
												'show_option_none' => ''
											);
											$children = get_categories( array( 'child_of' => $term->term_id,'hide_empty' => 0 ) );
											if ( count( $children ) ){
												?>
												<ul class="brick-tax-list">
												<?php
													wp_list_categories( $args );
												?>
												</ul>
												<?php
											}
										?>
									</div>
									<?php }?>
								</div>

								<div class="brick-bg post-thumbnail pbs_e-p-t">
									<?php //echo '<div class="brick-bg-color bg-by-cat ' . echo esc_attr( $term->slug ) . '"></div>';?>
									<?php
									if( apply_filters( 'wp_post_blocks/use_background_image', false ) ){
										// Support wp-term-colors, wp-term-images
										
										$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium_large' : $settings['thumb_size'];
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
					<?php }else{

						if( current_user_can( 'publish_pages' ) ){
							echo wp_sprintf( '<h4>%s</h4>', esc_html__( 'No Category/Tag Specified!', 'wp-post-blocks' ) );
						}
					}?>
			<?php

		}
		/**
		 * Post template
		 * Handling output layout by rewrite this template
		 * @param $instance
		 * @param $misc
		 */
		public function render_template( $settings = array(), $misc = array() ){
			
			$class = 'brick-sm brick-h-double col__sm-1_2 col__md-1_4';
			$settings['excerpt'] = false;
			$settings['title_class'] = 'xs__h4 sm__h3 md__h5 lg__h4';
		
			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}