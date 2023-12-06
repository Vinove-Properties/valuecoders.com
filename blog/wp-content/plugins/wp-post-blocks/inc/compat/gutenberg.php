<?php
// if ( ! defined( 'ABSPATH' ) ) exit; 

namespace WP_Post_Blocks;



// Class name: Addon_{plugin-slug}
class Addon_Gutenberg{
	/**
	 * @var Plugin The singleton instance.
	 */
	private static $instance;
	/**
	 * Always return the same instance of this plugin.
	 *
	 */
	public static function get_instance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Constructor
	 */
	private function __construct(){

		add_action( 'init', array( $this, 'init' ) );
		// add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'styles' ) );      
		// add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_blocks' ) );

		// add_action( 'elementor/controls/controls_registered', array( $this, 'register_controls' ) );

		// add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}
	/**
	 * Register our block and shortcode.
	 */
	public function init(){
		
		wp_register_script(
			'php-block',
			Plugin::get_url() . 'inc/compat/gutenberg/js/php-block.js' ,
			array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' )
		);

		// Register our block, and explicitly define the attributes we accept.
		register_block_type( 'pento/php-block', array(
			'attributes'      => array(
				'foo' => array(
					'type' => 'string',
				),
			),
			'editor_script'   => 'php-block', // The script name we gave in the wp_register_script() call.
			'render_callback' => array( $this, 'block_render' ),
		) );
	}
	/**
	 * Our combined block and shortcode renderer.
	 *
	 * For more complex shortcodes, this would naturally be a much bigger function, but
	 * I've kept it brief for the sake of focussing on how to use it for block rendering.
	 *
	 * @param array $attributes The attributes that were set on the block or shortcode.
	 */
	public function block_render( $attributes ) {
		return '<pre>' . print_r( $attributes, true ) . '</pre>';
	}

	/**
	 * Style
	 */
	public function styles(){

		wp_enqueue_style( 'wp-post-blocks-icon', Plugin::get_url() . 'css/pbs-icons.css' );
	
	}
	/**
	 * Register Category
	 */
	public function register_category() {

		Elementor_Plugin::$instance->elements_manager->add_category( 
			Plugin::$slug,
			[
				'title' => esc_html__( 'WP Post Blocks', 'wp-post-blocks' ),
				'icon' => 'icon-pbs pbsi-default', //default icon
			],
			2 // position
		);

	}
	/**
	 * Register Elements
	 */
	public function register_blocks( $widgets_manager ) {

		$available_blocks = Plugin::get_available_blocks();

		include_once( Plugin::get_dir() . 'inc/compat/elementor/widgets/post-blocks.php' );

		foreach ( $available_blocks as $block_id => $block_data ) {

			$wp_post_block_class = 'WP_Post_Blocks\Elementor_Widget_Base';

			$widgets_manager->register_widget_type( new $wp_post_block_class( array(), array(
				'block_id' 	=> $block_id, 
				'block_data' => $block_data
			) ) );
		}
	}	
	/**
	 * Register Controls
	 */
	public function register_controls( $controls_manager ){

		// return;

		// require( Plugin::get_dir() . 'inc/compat/elementor/controls/multiselect.php' );
		// $class_name = 'Elementor\Control_PBS_Multiselect';
		// $controls_manager->register_control( 'pbs_multiselect', new $class_name() );

	}
	/**
	 * Scripts
	 */
	public function enqueue_scripts(){

		wp_enqueue_script( 'wp-pbs-elementor', Plugin::get_url() . 'inc/compat/elementor/js/elementor.js', array('jquery'), '', true );
	
	}
}

// endif;

// Kickstart it
Addon_Elementor::get_instance();