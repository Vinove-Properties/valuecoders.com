<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class WP_Real_Review_Settings{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $data;
    private $option_key = 'wp_real_review';
    private $slug = 'wp-real-review';

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_filter( 'plugin_action_links_' . WP_Real_Review::plugin_basename(), array( $this, 'add_action_links' ) );
    }
    /**
     * Setting url
     */
    public function add_action_links ( $links ) {

        $mylinks = array(
            wp_sprintf( '<a href="%s">%s</a>', esc_url( admin_url( "options-general.php?page={$this->slug}" ) ), esc_html__('Settings', 'wp-real-review') )
        );

        return array_merge( $links, $mylinks );
    }

    /**
     * Add options page
     */
    public function add_plugin_page() {
        // This page will be under "Settings"
        add_options_page(
            __('WP Real Review', 'wp-real-review'), 
            __('WP Real Review', 'wp-real-review'),
            'manage_options', 
            $this->slug, 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page() {
        
        // Set class property
        $this->data = get_option( $this->option_key );
        ?>
        <div class="wrap">
            <h2><?php echo esc_html__( 'WP Real Review', 'wp-real-review' );?></h2>

            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( $this->option_key . '_settings' );   
                do_settings_sections( $this->slug );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {

        register_setting(
            "{$this->option_key}_settings", // Option group
            $this->option_key, // Option name
            array( $this, '_sanitize' ) // Sanitize
        );

        // General Settings
        add_settings_section(
            'general_settings_section', // ID
            esc_html__( 'General Settings', 'wp-real-review' ), // Title
            '__return_empty_string', // Callback
            $this->slug // Page
        ); 

        add_settings_field(
            'support_posttypes', // ID
            esc_html__( 'Post types', 'wp-real-review' ), // Title 
            array( $this, '_field_support_posttypes' ), // Callback
            $this->slug, // Page
            'general_settings_section' // Section           
        );      

        add_settings_field(
            'location', 
            esc_html__( 'Default Location', 'wp-real-review' ), // Title
            array( $this, '_field_default_location' ), 
            $this->slug, 
            'general_settings_section'
        );  

        add_settings_field(
            'compat', 
            esc_html__( 'Compatibility', 'wp-real-review' ), // Title
            array( $this, '_field_compat' ), 
            $this->slug, 
            'general_settings_section'
        );

        // Strings Translation

        add_settings_section(
            'translation_settings_section', // ID
            esc_html__( 'Strings Translation', 'wp-real-review' ), // Title
            '__return_empty_string', // Callback
            $this->slug // Page
        );

        add_settings_field(
            'info_title', 
            esc_html__( 'Info title', 'wp-real-review' ), // Title
            array( $this, '_field_info_title' ), 
            $this->slug, 
            'translation_settings_section'
        );

        add_settings_field(
            'features_title', 
            esc_html__( 'Features title', 'wp-real-review' ), // Title
            array( $this, '_field_features_title' ), 
            $this->slug, 
            'translation_settings_section'
        );

        add_settings_field(
            'desc_title', 
            esc_html__( 'Description title', 'wp-real-review' ), // Title
            array( $this, '_field_desc_title' ), 
            $this->slug, 
            'translation_settings_section'
        );

        add_settings_field(
            'pros_title', 
            esc_html__( 'Pros title', 'wp-real-review' ), // Title
            array( $this, '_field_pros_title' ), 
            $this->slug, 
            'translation_settings_section'
        );

        add_settings_field(
            'cons_title', 
            esc_html__( 'Cons title', 'wp-real-review' ), // Title
            array( $this, '_field_cons_title' ), 
            $this->slug, 
            'translation_settings_section'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function _sanitize( $input ){

        $new_input = array();
        if( isset( $input['support_posttypes'] ) )
            $new_input['support_posttypes'] = $input['support_posttypes'];

        if( isset( $input['template'] ) )
            $new_input['template'] = sanitize_text_field( $input['template'] );

        if( isset( $input['location'] ) )
            $new_input['location'] = sanitize_text_field( $input['location'] );

        if( isset( $input['compat'] ) )
            $new_input['compat'] = sanitize_text_field( $input['compat'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        if( isset( $input['features_title'] ) )
            $new_input['features_title'] = sanitize_text_field( $input['features_title'] );

        if( isset( $input['desc_title'] ) )
            $new_input['desc_title'] = sanitize_text_field( $input['desc_title'] );

        if( isset( $input['pros_title'] ) )
            $new_input['pros_title'] = sanitize_text_field( $input['pros_title'] );

        if( isset( $input['cons_title'] ) )
            $new_input['cons_title'] = sanitize_text_field( $input['cons_title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info(){
        
    }

    /** 
     * Field post types
     */
    public function _field_support_posttypes(){

        $post_types = get_post_types( array( 'public' => true ), 'names' );

        // if( NULL == $this->data['support_posttypes'] ){
        //     $this->data['support_posttypes'] = array('post');
        // }

        foreach ( $post_types as $key => $value) {

            if( 'media' === $key )
                continue;

            printf(
                '<div><label><input type="checkbox" name="%1$s" value="%2$s" %3$s/> %4$s</label></div>',
                esc_attr( $this->option_key . '[support_posttypes][]' ),
                esc_html( $key ),
                isset( $this->data['support_posttypes'] ) && in_array( $key , (array) $this->data['support_posttypes'] ) ? ' checked' : '',
                esc_html( $value )
            );
        }

        printf(
            '<p class="description">%s</p>',
            esc_html__( 'Select post types you wish to enable WP Real Review. By default, WP Real Review is available for posts only.', 'wp-real-review' )
        );
        
    }
    /** 
     * Field Location
     */
    public function _field_default_location(){

        if( !isset( $this->data['location'] ) )
            $this->data['location'] = 'default';

        $options = array(
            'default' => esc_html__( 'Default (Before Content)', 'wp-real-review' ),
            'after_content' => esc_html__( 'After content', 'wp-real-review' ),
            'custom' => esc_html__( 'Custom (place shortcode manually)', 'wp-real-review' )
        );
        ?>
        <select name="<?php echo esc_attr( $this->option_key . '[location]' );?>" id="location">
            
            <?php
            foreach ($options as $key => $value) {
                printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), selected( $this->data['location'], $key , false ), $value );    
            }
            ?>
        </select>
        <?php

        printf(
            '<p class="description">%s</p>',
            esc_html__( 'How do you want to output review results?', 'wp-real-review' )
        );
        
    }
    /** 
     * Field Template
     */
    public function _field_layout_template(){
        if( !isset( $this->data['template'] ) )
            $this->data['template'] = 'default';

        $options = array(
            'default' => esc_html__( 'Default' ),
            'alt' => esc_html__( 'Alt' )
        );
        ?>
        <select name="<?php echo esc_attr( $this->option_key . '[template]' );?>" id="template">
            
            <?php
            foreach ($options as $key => $value) {
                printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), selected( $this->data['template'], $key , false ), $value );    
            }
            ?>
        </select>
        <?php

        printf(
            '<p class="description">%s</p>',
            esc_html__( 'Choose layout template for output.', 'wp-real-review' )
        );
    }


    /** 
     * Plugin Compat
     */
    public function _field_compat() {
        if( !isset( $this->data['compat'] ) )
            $this->data['compat'] = false;
        ?>
        <input type="checkbox" name="<?php echo esc_attr( $this->option_key . '[compat]' );?>" value="on" <?php checked( 'on', $this->data['compat'], true );?>/>
        <p class="description">
            <?php printf(__( 'If you migrated to WP Real Review from %s, tick this option to allow WP Real Review read saved Data.', 'wp-real-review' ), sprintf( '<a href="%s" target="_blank">%s</a>', esc_url( '//wordpress.org/plugins/wp-review/' ), 'WP Review' ) );?>    
        </p>
        <?php
    }

    /** 
     * Titles
     */
    
    public function _field_info_title(){
        if( !isset( $this->data['info_title'] ) )
            $this->data['info_title'] = __('Info', 'wp-real-review');
        printf(
            '<input type="text" id="info_title" name="' . $this->option_key . '[info_title]" value="%s" />',
            isset( $this->data['info_title'] ) ? esc_attr( $this->data['info_title']) : ''
        );
    }
    public function _field_features_title(){
        if( !isset( $this->data['features_title'] ) )
            $this->data['features_title'] = __('Our Rating', 'wp-real-review');
        printf(
            '<input type="text" id="features_title" name="' . $this->option_key . '[features_title]" value="%s" />',
            isset( $this->data['features_title'] ) ? esc_attr( $this->data['features_title']) : ''
        );
    }
    public function _field_heading_title(){
        if( !isset( $this->data['title'] ) )
            $this->data['title'] = __('Result', 'wp-real-review');
        printf(
            '<input type="text" id="title" name="' . $this->option_key . '[title]" value="%s" />',
            isset( $this->data['title'] ) ? esc_attr( $this->data['title']) : ''
        );
    }
    public function _field_desc_title(){
        if( !isset( $this->data['desc_title'] ) )
            $this->data['desc_title'] = __('Summary', 'wp-real-review');
        printf(
            '<input type="text" id="desc_title" name="' . $this->option_key . '[desc_title]" value="%s" />',
            isset( $this->data['desc_title'] ) ? esc_attr( $this->data['desc_title']) : ''
        );
    }
    public function _field_pros_title(){
        if( !isset( $this->data['pros_title'] ) )
            $this->data['pros_title'] = __('Pros', 'wp-real-review');
        printf(
            '<input type="text" id="pros_title" name="' . $this->option_key . '[pros_title]" value="%s" />',
            isset( $this->data['pros_title'] ) ? esc_attr( $this->data['pros_title']) : ''
        );
    }
    public function _field_cons_title(){
        if( !isset( $this->data['cons_title'] ) )
            $this->data['cons_title'] = __('Cons', 'wp-real-review');
        printf(
            '<input type="text" id="cons_title" name="' . $this->option_key . '[cons_title]" value="%s" />',
            isset( $this->data['cons_title'] ) ? esc_attr( $this->data['cons_title']) : ''
        );
    }


}
if( is_admin() )
    $wp_real_review_settings = new WP_Real_Review_Settings();