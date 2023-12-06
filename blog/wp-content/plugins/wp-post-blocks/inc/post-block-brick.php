<?php

namespace WP_Post_Blocks;

/**
 * Post Block Brick 1x4
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Brick') ){

	if( !class_exists( 'Block_Base' ) ){
		require_once Plugin::get_dir() . 'inc/post-block-base.php';
	}

	class Block_Brick extends Block_Base{

		static $id 			= 'pbs-brick-default';
		static $react 		= 'post_block_brick';
		static $class 		= 'pbs pbs-brick pbs-brick-default';
		static $group 		= 'Post Bricks';
		static $name 		= 'Bricks - 1x4';

		static $restrict_ppp = false;
		static $min_ppp = 5;
		static $posts_per_page = 5;
		// Applying post per page option
		static $ppp_steps = true;

		/**
		 * Extra shortcode params
		 */
		public static function extra_shortcode_params(){

			return array(
				'bricks_sm' 	=> 'default',
				'bricks_gap'	=> 0,
				'first_number'	=> 0,
				'title_bg'		=> '',
			);

		}
		/**
		 * Exclude fields
		 */
		public static function exclude_fields(){
			return array( 'thumb_style', 'thumb_cat' );
		}
		/**
		 * Extra fields
		 */
		public static function extra_fields(){
			
			return array(
				'bricks_gap' => array(
					'title' 		=> esc_html__( 'Bricks Gap', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id' 			=> 'bricks_gap',
					// 'admin_label' => true
					'options' 		=> array( 
						'default'		=> esc_html__( 'Default', 'wp-post-blocks' ),
						'xsmall-gaps'	=> esc_html__( 'x-Small Gaps', 'wp-post-blocks' ),
						'small-gaps'	=> esc_html__( 'Small Gaps', 'wp-post-blocks' ),
						'medium-gaps'	=> esc_html__( 'Medium Gaps', 'wp-post-blocks' ),
						'big-gaps'		=> esc_html__( 'Big Gaps', 'wp-post-blocks' ),
						'no-gaps'		=> esc_html__( 'No Gaps', 'wp-post-blocks' ),
					),
					'save_always' 	=> true,
				),
				'bricks_sm' => array(
					'title' 		=> esc_html__( 'Bricks on small screen sizes', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id' 			=> 'bricks_sm',
					'desc' 			=> esc_html__( 'How do you want to display bricks on small screen sizes?', 'wp-post-blocks' ),
					'options' 		=> array( 
						'default'	=> esc_html__( 'Default (list)', 'wp-post-blocks' ),
						'inline'	=> esc_html__( 'Inline bricks', 'wp-post-blocks' )
					),
					// 'group'			=> '',
					'save_always' 	=> true,
					// 'admin_label' => true
				),
				'first_number' => array(
					'title' 		=> esc_html__( 'Special number', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id' 			=> 'first_number',
					'std' 			=> 0,
					'desc' 			=> esc_html__( 'If the very first word is a numeric number, make it prominent (larger than usual)', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					// 'admin_label' 	=> true
				),
				'title_top' => array(
					'title' 		=> esc_html__( 'Set Vertical text content alignment to top. ?', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id' 			=> 'title_top',
					// 'admin_label' => true
					'std' 			=> 0,
					'save_always' 	=> true,
				),
				'title_bg' => array(
					'title' 		=> esc_html__( 'Bricks title background', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id' 			=> 'title_bg',
					// 'admin_label' => true
					'options' 		=> array( 
						''		=> esc_html__( 'No, Thanks', 'wp-post-blocks' ),
						'wbbt'	=> esc_html__( 'White bg - Black Text', 'wp-post-blocks' ),
						'bbwt'	=> esc_html__( 'Black bg - White Text', 'wp-post-blocks' )
					)
				),
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
			$classes[] = !empty( $settings['bricks_sm'] ) ? "sm-{$settings['bricks_sm']}" : 'sm-default';

			if( !empty( $settings['bricks_gap'] ) && in_array( $settings['bricks_gap'], array( 'xsmall-gaps', 'small-gaps', 'medium-gaps', 'big-gaps', 'no-gaps' ) ) )
				$classes[] = $settings['bricks_gap'];

			if( !empty( $settings['title_top'] ) ){
				$classes[] = 'vtext-top';
			}

			?>
			<div class="pbs-bricks bricks-o-w <?php echo esc_attr( join(' ', $classes ) );?>">
				<div class="bricks-i-w">
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

			if( 1 == $misc['flag'] ){
				$class = 'brick-lg brick-h-80 col__md-1_2';
				$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium_large' : $settings['thumb_size'];
				$settings['title_class'] = 'xs__h4 sm__h2';
			}else{
				$class = 'brick-sm brick-h-80 col__sm-1_2 col__md-1_4';
				$settings['excerpt'] = false;
				$settings['thumb_size'] = empty( $settings['thumb_size'] ) ? 'medium' : $settings['thumb_size'];
				$settings['title_class'] = 'xs__h4 sm__h5';
			}
			?><div class="brick brick-o <?php echo esc_attr( $class );?>">
				<div class="brick-i">
					<?php
					Plugin::get_template('template_brick', $settings, $misc );
					?>
				</div>
			</div><?php

		}
	}
}