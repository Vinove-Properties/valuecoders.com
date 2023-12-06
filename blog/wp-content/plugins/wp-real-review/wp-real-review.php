<?php
/*
 * Plugin Name: WP Real Review
 * Plugin URI: http://wpthms.com/
 * Description: The Real Review plugin with rich snippet supported. Period.
 * Author: wpthms
 * Version: 1.0.1
 * Author URI: http://wpthms.com/
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WP_REAL_REVIEW_VERSION', '1.0.1' );
define( 'WP_REAL_REVIEW_OPTION', 'wp_real_review' );

if( !class_exists( 'WP_Real_Review' ) ):

    class WP_Real_Review {

        function __construct(){

            add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
            add_action( 'after_setup_theme', array( $this, 'hooks' ) );
        }

        function includes(){

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
         * @access    private
         * @since     1.0
         */
        public function plugins_loaded(){

            load_plugin_textdomain( 'wp-real-review', false, self::get_dirname() . '/langs/' ); 
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
         * JS and CSS
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        public function wp_enqueue_scripts(){
            
            if( apply_filters( 'wp_real_review_default_style', true ) )
                wp_enqueue_style( 'wp-real-review', self::get_url() . 'css/style.css' , array(), '1.0' );
            // wp_enqueue_script( 'wp-real-review', self::get_url() . 'js/script.js' , array( 'jquery'), '1.0', true );
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
        /**
         * Helper get post meta
         *
         * @return    array
         *
         * @access    public
         * @since     1.0
         */
        static function get_post_meta( $post_id, $meta_key ){

            $meta_data      = get_post_meta( $post_id );
            $wp_review_type = get_post_meta( $post_id, 'wp_review_type', true );
            $data           = get_option( 'wp_real_review' );
            $review_data    = array();
            // Not isset, get data from existing fields
            if( !isset( $meta_data[$meta_key] ) && $wp_review_type && $data['compat']){

                $wp_review_features = get_post_meta( $post_id, 'wp_review_item', true );

                $features = array();

                foreach ($wp_review_features as $key => $value) {
                    $features[$key]['name'] = $value['wp_review_item_title'];
                    $features[$key]['point'] = $value['wp_review_item_star'];
                }

                $wp_review_location = get_post_meta( $post_id, 'wp_review_location', true );

                $location = 'default';

                if( 'bottom' === $wp_review_location )
                    $location = 'after_content';
                else if( 'custom' === $wp_review_location )
                    $location = 'custom';

                $review_data = array(
                    'type'      => $wp_review_type,
                    'title'     => get_post_meta( $post_id, 'wp_review_heading', true ),
                    'location'  => $location,
                    'template'  => 'default',


                    'thumb'     => '',
                    'info'      => array(),
                    'info_title' => isset( $data['info_title'] ) ? $data['info_title'] : '',

                    'features_title' => isset( $data['features_title'] ) ? $data['features_title'] : '',
                    'features'  => $features,
                    'score'     => get_post_meta( $post_id, 'wp_review_total', true ),

                    'desc_title'=> get_post_meta( $post_id, 'wp_review_desc_title', true ),
                    'desc'      => get_post_meta( $post_id, 'wp_review_desc', true ),

                    'pros_title'=> isset( $data['pros_title'] ) ? $data['pros_title'] : '',
                    'pros'      => get_post_meta( $post_id, 'wp_review_pros', true ),

                    'cons_title'=> isset( $data['cons_title'] ) ? $data['cons_title'] : '',
                    'cons'      => get_post_meta( $post_id, 'wp_review_cons', true )  
                );

            }else{

                $meta_data = get_post_meta( $post_id, $meta_key, true );

                $review_data = array(
                    'type'          => isset( $meta_data['type'] ) ? $meta_data['type'] : 'none',
                    'title'         => isset( $meta_data['title'] ) ? $meta_data['title'] : '',
                    'location'      => isset( $meta_data['location'] ) ? $meta_data['location'] : '',
                    'template'      => isset( $meta_data['template'] ) ? $meta_data['template'] : '',

                    'thumb'         => isset( $meta_data['thumb'] ) ? intval( $meta_data['thumb'] ) : '',
                    'info'          => isset( $meta_data['info'] ) ? $meta_data['info'] : array(),
                    'info_title'    => isset( $meta_data['info_title'] ) ? $meta_data['info_title'] : ( isset( $data['info_title'] ) ? $data['info_title'] : '' ),

                    'features_title'=> isset( $meta_data['features_title'] ) ? $meta_data['features_title'] : ( isset( $data['features_title'] ) ? $data['features_title'] : '' ),
                    'features'      => isset( $meta_data['features'] ) ? $meta_data['features'] : array(),
                    'score'         => isset( $meta_data['score'] ) ? $meta_data['score'] : '',

                    'desc_title'    => isset( $meta_data['desc_title'] ) ? $meta_data['desc_title'] : ( isset( $data['desc_title'] ) ? $data['desc_title'] : '' ),
                    'desc'          => isset( $meta_data['desc'] ) ? $meta_data['desc'] : '',

                    'pros_title'    => isset( $meta_data['pros_title'] ) ? $meta_data['pros_title'] : ( isset( $data['pros_title'] ) ? $data['pros_title'] : '' ),
                    'pros'          => isset( $meta_data['pros'] ) ? $meta_data['pros'] : '',

                    'cons_title'    => isset( $meta_data['cons_title'] ) ? $meta_data['cons_title'] : (isset( $data['cons_title'] ) ? $data['cons_title'] : ''),
                    'cons'          => isset( $meta_data['cons'] ) ? $meta_data['cons'] : '',
                );
            }

            return apply_filters( 'wp_real_review_get_post_meta_data', $review_data, $post_id );

        }
        /**
         * Helper locate template
         *
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        static function locate_template( $name ){

            $template = false;


            if ( $overridden_template = locate_template( self::get_dirname() . "/{$name}.php" ) ) {
                // locate_template() returns path to file
                // if either the child theme or the parent theme have overridden the template
                $template = $overridden_template;

            } else {
                // If neither the child nor parent theme have overridden the template,
                // we load the template from the 'templates' sub-directory of the directory this file is in
                $file = self::get_dir() . "templates/{$name}.php";

                if( file_exists( $file ) )
                    $template = $file ;
                    
            }

            return $template;
        }
    
    }

    if( is_admin() ){
        require_once( 'inc/admin/settings.php' );
        require_once( 'inc/admin/metabox.php' );
    }

    require_once( 'inc/public/main.php' );
    require_once( 'inc/public/widgets.php' );

endif;

// Kickstart it
$GLOBALS['wp_real_review'] = new WP_Real_Review;