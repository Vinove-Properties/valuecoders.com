<?php
/*
 * Plugin Name: WP Social Counter
 * Plugin URI: http://wpthms.com/plugins/wp-social-counter
 * Description: Display the number of fans/subscribers/followers from Facebook, Google+, Twitter, Youtube and other social media networks.
 * Author: wpthms
 * Version: 1.0.3
 * Author URI: http://wpthms.com/
 * Text domain: wp-social-counter
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WP_SOCIAL_COUNTER_VERSION', '1.0.3' );
define( 'WP_SOCIAL_COUNTER_OPTION', 'wp_social_counter' );

if( !class_exists( 'WP_Social_Counter' ) ):

    /**
     * class WP_Social_Counter
     */
    final class WP_Social_Counter {
        /**
         * Constructor
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        public function __construct() {

            add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
            add_action( 'after_setup_theme', array( $this, 'hooks' ) );

            add_action( 'wp_ajax_wpsc-init-cache', array( $this, 'ajax_load_cache') );
            add_action( 'wp_ajax_nopriv_wpsc-init-cache', array( $this, 'ajax_load_cache') );
        }

        /**
         * Include admin files
         *
         * These functions are included on admin pages only.
         *
         * @return    void
         *
         * @access    private
         * @since     1.0
         */
        private function admin_includes() {
          
            /* exit early if we're not on an admin page */
            if ( ! is_admin() )
                return false;

        }
        /**
         * Fire on plugins_loaded
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        public function plugins_loaded(){

            load_plugin_textdomain( 'wp-social-counter', false, self::get_dirname() . '/langs/' ); 
        }

        /**
         * Execute the Hooks
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        public function hooks() {

            add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 16 );

        }
        /**
         * Load cache via ajax
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        public function ajax_load_cache(){

            $nonce_key = 'wpsc-init-cache-nonce';

            check_ajax_referer( $nonce_key, 'security' );


            $response = array(
                'success' => true
            );

            if( !class_exists( 'WP_Social_Counter_Generator' ) ){

                include_once WP_Social_Counter::get_dir() . 'inc/public/generator.php';

                $response['data'] = WP_Social_Counter_Generator::refresh();
            }

            wp_send_json( $response );

            wp_die(1);

        }

        /**
         * JS and CSS
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        public function wp_enqueue_scripts(){
            $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
            wp_enqueue_style( 'wp-social-counter', WP_Social_Counter::get_url() . 'css/style.css', array(), '1.0' );
            wp_register_script( 'wp-social-counter', WP_Social_Counter::get_url() . 'js/script' . $suffix . '.js', array('jquery'), '1.0' );
            wp_localize_script( 'wp-social-counter', 'wpSocialCounterVars', array(
                'nonce'     => esc_js( wp_create_nonce( 'wpsc-init-cache-nonce' ) ),    
                'ajaxurl'   => admin_url( 'admin-ajax.php' )
            ) );
            
        }
        /**
         * Helpers
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        static function get_url() {
            return plugin_dir_url( __FILE__ );
        }

        static function get_dir() {
            return plugin_dir_path( __FILE__ );
        }

        static function plugin_basename() {
            return plugin_basename( __FILE__ );
        }
        
        static function get_dirname( $path = '' ) {
            return dirname( plugin_basename( __FILE__ ) );
        }

    }

    require_once( 'inc/public/options.php' );

    if( is_admin() ){
        require_once( 'inc/admin/settings.php' );
    }
    require_once( 'inc/public/frontend.php' );
    
    require_once( 'inc/public/widget.php' );

endif;

// Kickstart it
$GLOBALS['wp_social_counter'] = new WP_Social_Counter;