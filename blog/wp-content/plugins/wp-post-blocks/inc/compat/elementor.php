<?php
// if ( ! defined( 'ABSPATH' ) ) exit; 

namespace WP_Post_Blocks;
use Elementor\Plugin as Elementor_Plugin;

// Class name: Addon_{plugin-slug}
class Addon_Elementor{
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

		add_action( 'elementor/init', array( $this, 'register_category' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'styles' ) );      
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_elements' ) );

		add_action( 'elementor/controls/controls_registered', array( $this, 'register_controls' ) );

		// add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
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
	public function register_elements( $widgets_manager ) {

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