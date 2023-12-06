<?php
namespace WP_Post_Blocks;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

final class Settings{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $data;
    private static $slug = 'wp-post-blocks';
    /**
     * Start up
     *
     * @since 1.0.0
     */
    public function __construct(){

        $this->hooks();

    }
    /**
     * Hooks
     *
     * @since 1.0.0
     */
    public function hooks(){
        
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_enqueue_scripts' ) );
        add_filter( 'plugin_action_links_' . Plugin::plugin_basename(), array( $this, 'add_action_links' ) );

    }
    
    public static function admin_enqueue_scripts( $hook ) {


        wp_enqueue_style( 'wp-post-blocks-admin', Plugin::get_url() . 'css/admin-style.css', array(), '1.0' );
        wp_enqueue_style( 'wp-post-blocks-icon', Plugin::get_url() . 'css/pbs-icons.css' );
        
        if (strpos( $hook, self::$slug) !== false) {
            wp_enqueue_script( 'wp-post-blocks-admin', Plugin::get_url() . 'js/admin-script.js', array( 'jquery-ui-core', 'jquery-ui-selectable'), '1.0' );
        }
        
    }
    /**
     * Setting url
     *
     * @since 1.0.0
     */
    public function add_action_links( $links ) {

        $mylinks = array(
            wp_sprintf( '<a href="%s">%s</a>', esc_url( admin_url( 'options-general.php?page=' . self::$slug ) ), esc_html__('Settings', 'wp-post-blocks') )
        );

        return array_merge( $links, $mylinks );
    }
    /**
     * Add theme menu
     *
     * @since 1.0.0
     */
    public function admin_menu(){

        // add admin page to Appearance
        $hook = add_options_page( 
            'WP Post Blocks',
            'WP Post Blocks',
            'manage_options',
            self::$slug,
            array( $this, 'create_admin_page')
        );

        // Adding help tab
        add_action( "load-$hook", array( $this, 'help_tabs' ) );

    }
    /**
     * Options page callback
     *
     * @since 1.0.0
     */
    public function create_admin_page() {

        // Set class property
        $this->data = Options::get_options();
        ?>
        <div class="wrap" id="wp-pbs-wrap">
            <h2>WP Post Blocks</h2>
            <?php settings_errors(); ?>
            <?php 
                $this->general_settings_page();
            ?>
        </div>
        <?php
    }
    /**
     * Settings Page
     *
     * @since 1.0.0
     */
    public function general_settings_page(){
        ?>
        <form method="post" action="options.php">
        <?php
            // This prints out all hidden setting fields
            settings_fields( Options::$option_key . '_settings' );   
            do_settings_sections( self::$slug );
            submit_button(); 
        ?>
        </form>
        <?php
    }
    
    /**
     * Help Screen
     *
     * @since 1.0.0
     */
    public function help_tabs() {
        $screen = get_current_screen();
        $msg = esc_html__('Q: I want to place some post blocks elsewhere rather than wordpress editor, how could i do it?', 'wp-post-blocks' );
        $msg .= '<br><br>';
        $msg .= '<em>';
        $msg .= esc_html__('A: Create a page with WP Bakery Page Builder, add a post block, after done configurating your block, save and close edit popup window, then just double-click to current block and you will be able to copy block shortcode ;)', 'wp-post-blocks' );
        $msg .= '</em>';
        
        $screen->add_help_tab( array(
            'id'    => 'wp_post_blocks_help',
            'title' => esc_html__( 'FAQs', 'wp-post-blocks' ),
            'content'   => wpautop( $msg ) ,
        ) );
    }
    /**
     * Register and add settings
     *
     * @since 1.0.0
     */
    public function page_init() {

        register_setting(
            Options::$option_key . "_settings", // Option group
            Options::$option_key, // Option name
            array( $this, '_sanitize' ) // Sanitize
        );

        // General Settings
        add_settings_section(
            'general_settings_section', // ID
            esc_html__( 'General Settings', 'wp-post-blocks' ), // Title
            '__return_empty_string', // Callback
            self::$slug // Page
        );

        add_settings_field(
            'exclude_blocks', // ID
            esc_html__( 'Deregister blocks', 'wp-post-blocks' ), // Title 
            array( $this, '_field_exclude_blocks' ), // Callback
            self::$slug, // Page
            'general_settings_section' // Section           
        ); 
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     * @since 1.0.0
     */
    public function _sanitize( $input ){

        $new_input = array();
        if( isset( $input['exclude_blocks'] ) )
            $new_input['exclude_blocks'] = $input['exclude_blocks'];
        

        return $new_input;
    }
    /** 
     * Field post types
     *
     * @since 1.0.0
     */
    public function _field_exclude_blocks(){

        $blocks = Plugin::get_registered_blocks();
        ?>
        <div class="wp-pbs-blocks">
        <?php
        foreach ( $blocks as $block_id => $data) {
            if( !empty( $data['break'] ) ){
                echo wp_sprintf( '<div class="wp-pbs-block-break" style="clear:both;"><strong>%s</strong></div>', esc_html( $data['name'] ) );
            }else{
                printf(
                    '<div class="wp-pbs-block %6$s ui-state-default"><label><input type="checkbox" name="%1$s" value="%2$s" %3$s/><i class="%5$s"></i><span>%4$s</span></label></div>',
                    esc_attr( Options::$option_key . '[exclude_blocks][]' ),
                    esc_html( $block_id ),
                    isset( $this->data['exclude_blocks'] ) && in_array( $block_id , (array) $this->data['exclude_blocks'] ) ? ' checked' : '',
                    esc_html( $data['name'] ),
                    "icon-pbs pbsi-$block_id",
                    isset( $this->data['exclude_blocks'] ) && in_array( $block_id , (array) $this->data['exclude_blocks'] ) ? ' excluded' : ''

                );
            }
                
        }
        ?>
        </div>
        <?php

        printf(
            '<p class="description">%s</p>',
            esc_html__( 'Excluding unneeded blocks make your site faster!!! Selected blocks will be deregistered in visual composer/Elementor as well as in shortcodes. Click to register/deregister blocks.', 'wp-post-blocks' )
        );
        
    }

}
// Kickstart
if( is_admin() )
    $wp_post_blocks_settings = new Settings();