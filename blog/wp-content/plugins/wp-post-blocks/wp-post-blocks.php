<?php
/**
 * Plugin Name: WP Post Blocks
 * Description: Post Blocks for Elementor & WPBakery Page Builder
 * Version:     1.0.3
 * Author:      wpthms.com
 * Author URI:  http://wpthms.com/
 * License:     GPLv2 or later
 *
 */
namespace WP_Post_Blocks;

// Store the root plugin file for usage with functions which use the plugin basename
define( __NAMESPACE__ . '\PLUGIN_FILE', __FILE__ );

// Includes
include( dirname( __FILE__ ) . '/inc/class-plugin.php' );

// Instantiate the Plugin
Plugin::get_instance();
