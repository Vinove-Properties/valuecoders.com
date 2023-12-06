<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The Class.
 */
class WP_Real_Review_Metabox {

    private $data;
    private $option_key = 'wp_real_review';
    private $meta_key = 'wp_real_review';
 
    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {

        $this->data = get_option( $this->option_key );

        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save_meta_box' ) );

        add_action( 'admin_head',      array( $this, 'admin_head' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
    }

    /**
     * Extra css
     */
    public function admin_head(){
        global $_wp_admin_css_colors;
        $color_scheme = get_user_option( 'admin_color' );
        $theme_color = $_wp_admin_css_colors[$color_scheme];

        if( !empty( $theme_color->colors[2] ) ){
            printf('<style>.wprr-nav li:before{ border-color: %1$s;} .wprr-score-info{ color: %1$s}</style>', $theme_color->colors[2] );
        }
                    
    }

    /**
     * Admin Scripts
     */
    public function admin_enqueue_scripts(){
        
        wp_enqueue_style( 'wp-real-review-admin', WP_Real_Review::get_url() . 'css/admin-style.css', array(), '1.0' );
        wp_enqueue_script( 'wp-real-review-admin', WP_Real_Review::get_url() . 'js/admin-script.js', array('jquery', 'jquery-ui-sortable'), '1.0', true );
        
        wp_localize_script( 'wp-real-review-admin', 'wprr_vars', array(
            'mediaUploadTitle'  => esc_js( __( 'Select Review Thumbnail', 'wp-real-review') ),
            'mediaBtnText'      => esc_js( __( 'Choose Image', 'wp-real-review') )
        ) );

    }
 
    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        $support_posttypes = array();
        if( empty( $this->data['support_posttypes'] ) ){
            return;
        }else{
            $support_posttypes = $this->data['support_posttypes'];
        }
 
        if ( in_array( $post_type, $support_posttypes ) ) {

            add_meta_box(
                'wp_real_review',
                __( 'WP Real Review Settings', 'wp-real-review' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
                'high'
            );
        }
    }
 
    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save_meta_box( $post_id ) {
 
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
 
        // Check if our nonce is set.
        if ( ! isset( $_POST['wp_real_review_nonce'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['wp_real_review_nonce'];
 
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'wp_real_review' ) ) {
            return $post_id;
        }
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
 
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
 
        /* OK, it's safe for us to save the data now. */
        
        $meta_value = !empty( $_POST[$this->meta_key] ) ? stripslashes( $_POST[$this->meta_key] ) : '';

        $new_meta_value = json_decode( $meta_value, true );


        if( !isset( $new_meta_value['type'] ) )
            return $post_id;


        // If type == none, remove all data
        if( 'none' == $new_meta_value['type'] ){

            $new_meta_value = array( 'type' => 'none' );

            update_post_meta( $post_id, $this->meta_key, $new_meta_value );

        }
        // Update data
        else{
        
            // Sanitize the user input.
            if( $title = trim( $new_meta_value['title'] ) )
                $new_meta_value['title'] = sanitize_text_field( $title );

            if( $description = trim( $new_meta_value['desc'] ) )
                $new_meta_value['desc'] = wp_kses_post( $description );

            if( $pros = trim( $new_meta_value['pros'] ) )
                $new_meta_value['pros'] = wp_kses_post( $pros );

            if( $cons = trim( $new_meta_value['cons'] ) )
                $new_meta_value['cons'] = wp_kses_post( $cons );

            if( !empty( $new_meta_value['features'] ) ){
                foreach ( $new_meta_value['features'] as $key => $value) {
                    $new_meta_value['features'][$key]['name'] = sanitize_text_field( $value['name'] );
                    $new_meta_value['features'][$key]['point'] = sanitize_text_field( $value['point'] );
                }
            }

            if( $thumb = trim( $new_meta_value['thumb'] ) )
                $new_meta_value['thumb'] = intval( $thumb );

            if( !empty( $new_meta_value['info'] ) ){
                foreach ( $new_meta_value['info'] as $key => $value) {
                    $new_meta_value['info'][$key]['name'] = sanitize_text_field( $value['name'] );
                    $new_meta_value['info'][$key]['value'] = sanitize_text_field( $value['value'] );
                    $new_meta_value['info'][$key]['url'] = sanitize_text_field( $value['url'] );
                }
            }

            update_post_meta( $post_id, $this->meta_key, $new_meta_value );

        }
        
    }
    /**
     * Prepare data
     *
     * @param $post_id int
     * @param $meta_key string
     */
    public function prepare( $post_id, $meta_key ){
        return WP_Real_Review::get_post_meta( $post_id, $meta_key );
    }
 
    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'wp_real_review', 'wp_real_review_nonce' );

        $meta_key = $this->meta_key;

        // delete_post_meta( $post->ID, $meta_key );

        $review_data = $this->prepare( $post->ID, $meta_key );

        // Display the form, using the current value.
        ?>
        <div class="wprr-wrapper" data-wprr="true">
            <textarea data-wprr-data="true" name="<?php echo esc_attr( $meta_key );?>" id="<?php echo esc_attr( $meta_key );?>" class="widefat" style="display:none !important;"><?php echo esc_textarea( wp_json_encode( $review_data ) );?></textarea>
        	<div class="wprr-nav">
        		<ul>
        			<li data-tab="general" class="active"><a href="javascript:void(0)"><?php esc_html_e( 'General', 'wp-real-review' );?></a></li>
                    <li data-tab="info"><a href="javascript:void(0)"><?php esc_html_e( 'Info', 'wp-real-review' );?></a></li>
        			<li data-tab="features"><a href="javascript:void(0)"><?php esc_html_e( 'Features', 'wp-real-review' );?></a></li>
                    <li data-tab="procon"><a href="javascript:void(0)"><?php esc_html_e( 'Pro/Con', 'wp-real-review' );?></a></li>
                    <li data-tab="desc"><a href="javascript:void(0)"><?php esc_html_e( 'Summary', 'wp-real-review' );?></a></li>
        		</ul>
        	</div>

            <div class="wprr-content" data-wprr-fields>
                
                <div class="wprr-tab active" data-tab="general">

                    <!-- Type -->
                    <div class="wprr-row">

                        <div class="wprr-th">
                            <label for="<?php echo esc_attr( $meta_key . '[type]' );?>"><?php _e( 'Type', 'wp-real-review' ); ?></label>
                        </div>

                        <div class="wprr-td">

                            <select class="wprr-types-select" name="type" id="<?php echo esc_attr( $meta_key . '[type]' );?>">
                            <?php
                            $scale_options = array(
                                'none' => esc_html__( 'No Review', 'wp-real-review' ),
                                'star' => esc_html__( 'Star (5-point scale)', 'wp-real-review' ),
                                'point' => esc_html__( 'Point (10-point scale)', 'wp-real-review' ),
                                'percentage' => esc_html__( 'Percentage (100-point scale)', 'wp-real-review' )
                            );

                            $max = array(
                                'none' => '',
                                'star' => '5',
                                'point' => '10',
                                'percentage' => '100'
                            );

                            foreach ($scale_options as $key => $value) {
                                printf( '<option value="%s" %s data-max="%s">%s</option>', esc_attr( $key ), selected( $review_data['type'], $key , false ), $max[$key], $value );    
                            }
                            ?>
                            </select>
                            
                            <p class="description"><?php _e( 'Select review type', 'wp-real-review' ); ?></p>
                        </div>
                    </div>

                    <!-- Review Name -->
                    <div class="wprr-row widefat">
                        <div class="wprr-th">
                            <label for="<?php echo esc_attr( $meta_key . '[title]' );?>">
                                <?php _e( 'Heading title', 'wp-real-review' ); ?>
                            </label>
                        </div>
                        <div class="wprr-td">
                            <input type="text" id="<?php echo esc_attr( $meta_key . '[title]' );?>" name="title" value="<?php echo esc_attr( $review_data['title'] ); ?> ">
                            <p class="description"><?php _e( 'Name of Review item', 'wp-real-review' ); ?></p>
                        </div>
                    </div>

                    <!-- Review Thumbnail -->
                    <div class="wprr-row">
                        <div class="wprr-th">
                            <label for=""><?php _e('Thumbnail (optional)', 'wp-real-review');?></label>
                        </div>
                        <div class="wprr-td">
                            <div class="wprr-thumb-preview">
                                <?php echo !empty( $review_data['thumb'] ) ? wp_get_attachment_image( $review_data['thumb'], 'medium' ) : '';?>
                            </div>
                            <div class="wprr-thumb-fields">
                                <input class="wprr-thumb" type="hidden" name="thumb" value="<?php echo esc_attr( $review_data['thumb'] );?>" />
                                <input class="wprr-thumb-upload button" type="button" value="<?php esc_attr_e( 'Upload', 'wp-real-review' );?>" />
                                <input class="wprr-thumb-remove button<?php echo empty( $review_data['thumb'] ) ? ' hidden' : '';?>" type="button" value="<?php esc_attr_e( 'Remove', 'wp-real-review' );?>" />
                            </div>
                        </div>
                    </div>
    
                    <!-- Review Location -->
                    <div class="wprr-row">
                        <div class="wprr-th">
                            <label for="<?php echo esc_attr( $meta_key . '[location]' );?>"><?php _e( 'Output Location', 'wp-real-review' ); ?></label>
                        </div>
                        <div class="wprr-td">

                            <select name="location" id="<?php echo esc_attr( $meta_key . '[location]' );?>">
                            <?php

                            $options = array(
                                'default' => esc_html__( 'Default (Before Content)', 'wp-real-review' ),
                                'after_content' => esc_html__( 'After content', 'wp-real-review' ),
                                'custom' => esc_html__( 'Custom (place shortcode manually)', 'wp-real-review' )
                            );

                            foreach ($options as $key => $value) {
                                printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), selected( $review_data['location'], $key , false ), $value );    
                            }
                            ?>
                            </select>
                            
                            <p class="description"><?php _e( 'Automatically inherited from default setting.', 'wp-real-review' ); ?></p>
                        </div>
                    </div>

                </div>

                <!-- tab: Info -->
                <div class="wprr-tab" data-tab="info">
                    <div class="wprr-row widefat">
                        <div class="wprr-td widefat">
                            <div class="wprr-info">
                               
                                
                            </div>
                            
                            <div class="wprr-rptbl">

                                <?php
                                    $rpt_template = '<div class="wprr-rptbl-field wprr-rptbl-name"><input class="widefat" type="text" name="' . esc_attr( 'info[__x__][name]' ) . '" data-name="' . esc_attr( 'info[__x__][name]' ) . '" placeholder="' . esc_attr__( 'Info Name', 'wp-real-review' ) . '" value="%s"/></div>
                                    <div class="wprr-rptbl-field wprr-rptbl-value"><input class="widefat" type="text" name="' . esc_attr( 'info[__x__][value]' ) . '" data-name="' . esc_attr( 'info[__x__][value]' ) . '" placeholder="' . esc_attr__( 'Value', 'wp-real-review' ) . '" value="%s"/></div>
                                    <div class="wprr-rptbl-field wprr-rptbl-url"><input class="widefat" type="text" name="' . esc_attr( 'info[__x__][url]' ) . '" data-name="' . esc_attr( 'info[__x__][url]' ) . '" placeholder="' . esc_attr__( 'Url', 'wp-real-review' ) . '" value="%s"/></div>
                                    <div class="wprr-rptbl-controls">
                                        <a href="javascript:void(0)" data-role="move" title="' . esc_attr__( 'Move', 'wp-real-review' ) . '"><i class="dashicons dashicons-menu"></i></a>
                                        <a href="javascript:void(0)" data-role="delete" title="' . esc_attr__( 'Delete', 'wp-real-review' ) . '"><i class="dashicons dashicons-no-alt"></i></a>
                                    </div>';
                                ?>
    
                                <ul class="wprr-rptbl-list wprr-features-list">
                                    <?php
                                        if( empty( $review_data['info'] ) ){
                                            printf( '<li>%s</li>', sprintf( $rpt_template, '', '', '' ) );
                                        }else{
                                            foreach ( (array) $review_data['info'] as $rpt) {
                                                if( !empty( $rpt['name'] ) && !empty( $rpt['value'] ) )
                                                    printf( '<li>%s</li>', sprintf( $rpt_template, esc_attr( $rpt['name'] ), esc_attr( $rpt['value'] ), esc_url( $rpt['url'] ) ) );  
                                            }
                                        }   
                                    ?>
                                </ul>

                                <a href="javascript:void(0);" class="button wprr-rptbl-more" data-template="<?php echo esc_attr( sprintf( $rpt_template, '', '', '' ) );?>"><i class="dashicons dashicons-plus"></i> <?php echo esc_html__( 'Add item', 'wp-real-review' );?></a>
                            </div>
                        </div>
                    </div>                    
                   
                </div>
                    
                <!-- tab: Features -->
                <div class="wprr-tab" data-tab="features">

                    <div class="wprr-row widefat">
                        <div class="wprr-td widefat">
                            <div class="wprr-info">
                                <?php printf( '<strong>%s</strong>', esc_html__( 'Review scale: ', 'wp-real-review' ) );?> <span class="wprr-scale-info"><?php echo esc_html( $scale_options[$review_data['type']] );?></span>
                                <br/>
                                <?php printf( '<strong>%s</strong>', esc_html__( 'Score: ', 'wp-real-review' ) );?> <span class="wprr-score-info"><?php echo esc_html( $review_data['score'] );?></span>
                                <input class="wprr-score" type="hidden"  name="score" value="<?php echo esc_attr( $review_data['score'] );?>">
                            </div>
                            
                            <div class="wprr-rptbl wprr-features"<?php echo 'none' === $review_data['type'] ? ' style="display: none;"' : ''; ?>>

                                <?php
                                    $feature_template = '<div class="wprr-rptbl-field wprr-rptbl-name wprr-feature-name"><input class="widefat" type="text" name="' . esc_attr( 'features[__x__][name]' ) . '" data-name="' . esc_attr( 'features[__x__][name]' ) . '" placeholder="' . esc_attr__( 'Feature Name', 'wp-real-review' ) . '" value="%s"/></div>
                                    <div class="wprr-rptbl-field wprr-rptbl-value wprr-feature-point"><input class="widefat" type="text" name="' . esc_attr( 'features[__x__][point]' ) . '" data-name="' . esc_attr( 'features[__x__][point]' ) . '" placeholder="' . esc_attr__( 'Grade', 'wp-real-review' ) . '" value="%s"/></div>
                                    <div class="wprr-rptbl-controls wprr-feature-controls">
                                        <a href="javascript:void(0)" data-role="move" title="' . esc_attr__( 'Move', 'wp-real-review' ) . '"><i class="dashicons dashicons-menu"></i></a>
                                        <a href="javascript:void(0)" data-role="delete" title="' . esc_attr__( 'Delete', 'wp-real-review' ) . '"><i class="dashicons dashicons-no-alt"></i></a>
                                    </div>';
                                ?>
    
                                <ul class="wprr-rptbl-list wprr-features-list">
                                    <?php
                                        if( empty( $review_data['features'] ) ){
                                            printf( '<li>%s</li>', sprintf( $feature_template, '', '' ) );
                                        }else{
                                            foreach ( (array) $review_data['features'] as $feature) {
                                                if( !empty( $feature['name'] ) && !empty( $feature['point'] ) )
                                                    printf( '<li>%s</li>', sprintf( $feature_template, esc_attr( $feature['name'] ), esc_attr( $feature['point'] ) ) );  
                                            }
                                        }   
                                    ?>
                                </ul>

                                <a href="javascript:void(0);" class="button wprr-rptbl-more" data-template="<?php echo esc_attr( sprintf( $feature_template, '', '' ) );?>"><i class="dashicons dashicons-plus"></i> <?php echo esc_html__( 'Add item', 'wp-real-review' );?></a>


                                
                            </div>
                        </div>
                    </div>                    
                   
                </div>
        
                <!-- tab: Pros/Cons -->
                <div class="wprr-tab" data-tab="procon">
                    
                    <div class="wprr-row">
                        <!-- Pros -->
                        <div class="wprr-td alt">
                            <label for="<?php echo esc_attr( $meta_key . '[pros]' );?>"><?php _e( 'Pros', 'wp-real-review' ); ?></label>
                            <textarea class="widefat" rows="8" id="<?php echo esc_attr( $meta_key . '[pros]' );?>" name="pros"><?php echo esc_textarea(  $review_data['pros'] ); ?></textarea>
                            <p class="description"><?php _e( 'Use line breaks to make new list items.', 'wp-real-review' ); ?></p>
                        </div>
                        <!-- Cond -->
                        <div class="wprr-td alt">
                            <label for="<?php echo esc_attr( $meta_key . '[cons]' );?>"><?php _e( 'Cons', 'wp-real-review' ); ?></label>
                            <textarea class="widefat" rows="8" id="<?php echo esc_attr( $meta_key . '[cons]' );?>" name="cons"><?php echo esc_textarea(  $review_data['cons'] ); ?></textarea>
                            <p class="description"><?php _e( 'Use line breaks to make new list items.', 'wp-real-review' ); ?></p>
                        </div>
                    </div>
                </div>

                <!-- tab: Summary -->
                <div class="wprr-tab" data-tab="desc">

                    <!-- Description -->
                    <div class="wprr-row widefat">
                        <div class="wprr-th">
                            <label for="<?php echo esc_attr( $meta_key . '[desc]' );?>">
                                <?php _e( 'Summary', 'wp-real-review' ); ?>
                            </label>
                        </div>

                        <div class="wprr-td">

                            <?php
                                /* Display wp editor field. */
                                wp_editor( 
                                    $review_data['desc'],
                                    'desc',
                                    array(
                                        'tinymce'       => false,
                                        'quicktags'     => true,
                                        'media_buttons' => false,
                                        'textarea_rows' => 10 
                                    ) 
                                );
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
       
        <?php
    }
}

/**
 * Calls the class on the post edit screen.
 */
function wp_real_review_init() {
    new WP_Real_Review_Metabox();
}
 
if ( is_admin() ) {
    add_action( 'load-post.php',     'wp_real_review_init' );
    add_action( 'load-post-new.php', 'wp_real_review_init' );
}