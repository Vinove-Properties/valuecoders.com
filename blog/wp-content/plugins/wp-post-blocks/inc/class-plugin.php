<?php

namespace WP_Post_Blocks;

class Plugin {
	/**
	 * @var Plugin The singleton instance.
	 */
	private static $instance;
	/**
	 * Always return the same instance of this plugin.
	 *
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private static $post_templates = array();
    private static $post_blocks = array();
    private static $post_block_shortcodes = array();
    public static $slug = 'wp-post-blocks';
	/**
     * Where we store block instance
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
	private static $block_instances = array();
    /**
     * PHP5 constructor method.
     *
     * This method loads other methods of the class.
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    private function __construct() {
    	
    	require_once( self::get_dir() . 'inc/public/options.php' );
	

	    if( is_admin() ){
	        require_once( self::get_dir() . 'inc/admin/settings.php' );
	    }

	    // Support Elementor Plugin
	    if( defined( 'ELEMENTOR_VERSION') ){
	    	require_once( self::get_dir() . 'inc/compat/elementor.php' );
	    }

	    if( defined( 'WPB_VC_VERSION') ){
	    	require_once( self::get_dir() . 'inc/compat/js_composer.php' );	
	    }
	    
		/** 
		 * Load languages 
		 */
  		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );

		/* Init */
		add_action( 'after_setup_theme', 	array( $this, 'after_setup_theme' ), 2 );
		add_action( 'init', 	array( $this, 'init' ), 2 );
		add_action( 'wp', 					array( $this, 'ajax_handler' ) );

		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) , 9999 );
      
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

  		load_plugin_textdomain( 'wp-post-blocks', false, self::get_dir() . 'langs/' ); 

  	}
  	/**
     * after_setup_theme
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
  	public function after_setup_theme(){

    	/* 
    	 * Include the required admin files 
    	 */
		self::admin_hooks();
		/* 
    	 * Setup Page builder
    	 */
		/**
		 * Setup post templates
		 */
		self::setup_templates();
		/**
		 * Setup post blocks
		 */
		self::setup_blocks();

    }
    /** 
     * Init on the 'after_setup_theme' action. Then filters will 
     * be availble to the theme, and not only when in Theme Mode.
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public function init() {
		/**
		 * Setup shortcode
		 */
		self::setup_stuff();
		/**
		 * Hooks
		 */
		self::hooks();
      
    }
    /**
	 * Setup post templates
	 */
    public function setup_templates(){

    	self::$post_templates = array(

    		'template_base' => array(
          'name'  => 'Template Base',
          'class' => 'WP_Post_Blocks\Post_Template',
          'file'  => self::locate_template( 'post-template' )
        ),
        'template_wide' => array(
          'name'  => 'Template Wide',
          'class' => 'WP_Post_Blocks\Post_Template_Wide',
          'file'  => self::locate_template( 'templates/post-template-wide' )
        ),
  			'template_hybrid'	=> array(
      			'name'	=> 'Template Hybrid',
      			'class'	=> 'WP_Post_Blocks\Post_Template_Hybrid',
      			'file'	=> self::locate_template( 'templates/post-template-hybrid' )
  			),
        'template_brick'  => array(
            'name'  => 'Template brick',
            'class' => 'WP_Post_Blocks\Post_Template_Brick',
            'file'  => self::locate_template( 'templates/post-template-brick' )
        ),
        'template_thumb_left' => array(
            'name'  => 'Post_Template_Thumb_Left',
            'class' => 'WP_Post_Blocks\Post_Template_Thumb_Left',
            'file'  => self::locate_template( 'templates/post-template-thumb-left' )
        ),
        'template_thumb_right'  => array(
            'name'  => 'Post_Template_Thumb_Right',
            'class' => 'WP_Post_Blocks\Post_Template_Thumb_Right',
            'file'  => self::locate_template( 'templates/post-template-thumb-right' )
        ),
        'template_thumb_alt_left' => array(
            'name'  => 'Post_Template_Thumb_Alt_Left',
            'class' => 'WP_Post_Blocks\Post_Template_Thumb_Alt_Left',
            'file'  => self::locate_template( 'templates/post-template-thumb-alt-left' )
        ),
        'template_thumb_alt_right'  => array(
            'name'  => 'Post_Template_Thumb_Alt_Right',
            'class' => 'WP_Post_Blocks\Post_Template_Thumb_Alt_Right',
            'file'  => self::locate_template( 'templates/post-template-thumb-alt-right' )
        ),
        'template_counter_text'  => array(
            'name'  => 'Post_Template_Counter_Text',
            'class' => 'WP_Post_Blocks\Post_Template_Counter_Text',
            'file'  => self::locate_template( 'templates/post-template-counter-text' )
        ),
        'template_counter_thumb'  => array(
            'name'  => 'Post_Template_Counter_Thumb',
            'class' => 'WP_Post_Blocks\Post_Template_Counter_Thumb',
            'file'  => self::locate_template( 'templates/post-template-counter-thumb' )
        ),
        'template_counter_overlay'  => array(
            'name'  => 'Post_Template_Counter_Overlay',
            'class' => 'WP_Post_Blocks\Post_Template_Counter_Overlay',
            'file'  => self::locate_template( 'templates/post-template-counter-overlay' )
        ),

        'template_text'  => array(
            'name'  => 'Post_Template_Text',
            'class' => 'WP_Post_Blocks\Post_Template_Text',
            'file'  => self::locate_template( 'templates/post-template-text' )
        ),
        'template_text_list'  => array(
            'name'  => 'Post_Template_Text_List',
            'class' => 'WP_Post_Blocks\Post_Template_Text_List',
            'file'  => self::locate_template( 'templates/post-template-text-list' )
        ),

        'template_overlay'  => array(
            'name'  => 'Post_Template_Overlay',
            'class' => 'WP_Post_Blocks\Post_Template_Overlay',
            'file'  => self::locate_template( 'templates/post-template-overlay' )
        ),

  			'template_thumb_lg_left' => array(
            'name'  => 'Post_Template_Thumb_Lg_Left',
            'class' => 'WP_Post_Blocks\Post_Template_Thumb_Lg_Left',
            'file'  => self::locate_template( 'templates/post-template-thumb-lg-left' )
        ),
        'template_thumb_lg_right'  => array(
            'name'  => 'Post_Template_Thumb_Lg_Right',
            'class' => 'WP_Post_Blocks\Post_Template_Thumb_Lg_Right',
            'file'  => self::locate_template( 'templates/post-template-thumb-lg-right' )
        )
    	);


		do_action( 'wp_post_blocks/setup_templates' );
    }
    
    /** 
     * Setup Blocks var
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function setup_blocks(){

    	self::$post_blocks = array(

    		/*'post_block_brick_hybrid'	=> array(
    			'name'		=> esc_html__( 'Bricks - hybrid', 'wp-post-blocks' ),
    			'class'		=> 'Block_Brick_Hybrid',
				'file'		=> self::locate_template( 'post-block-brick-hybrid' )
			),*/
            'post_block_basic_break'   => array(
                'break'     => true,
                'name'      => 'Basic Blocks'
            ),

            'post_block_section_heading'    => array(
                'name'      => esc_html__( 'Post Block Section Heading', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Section_Heading',
                'file'      => self::locate_template( 'post-block-section-heading' )
            ),
            

    		'post_block_1'	=> array(
    			'name'		=> esc_html__( 'Post Block 1', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_1',
				'file'		=> self::locate_template( 'blocks/post-block-1' )
			),
			'post_block_2'	=> array(
    			'name'		=> esc_html__( 'Post Block 2', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_2',
				'file'		=> self::locate_template( 'blocks/post-block-2' )
			),
			'post_block_3'	=> array(
    			'name'		=> esc_html__( 'Post Block 3', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_3',
				'file'		=> self::locate_template( 'blocks/post-block-3' )
			),
			'post_block_4'	=> array(
    			'name'		=> esc_html__( 'Post Block 4', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_4',
				'file'		=> self::locate_template( 'blocks/post-block-4' )
			),
			'post_block_5'	=> array(
    			'name'		=> esc_html__( 'Post Block 5', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_5',
				'file'		=> self::locate_template( 'blocks/post-block-5' )
			),
			'post_block_6'	=> array(
    			'name'		=> esc_html__( 'Post Block 6', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_6',
				'file'		=> self::locate_template( 'blocks/post-block-6' )
			),
			'post_block_7'	=> array(
    			'name'		=> esc_html__( 'Post Block 7', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_7',
				'file'		=> self::locate_template( 'blocks/post-block-7' )
			),
			'post_block_8'	=> array(
    			'name'		=> esc_html__( 'Post Block 8', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_8',
				'file'		=> self::locate_template( 'blocks/post-block-8' )
			),
			'post_block_9'	=> array(
    			'name'		=> esc_html__( 'Post Block 9', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_9',
				'file'		=> self::locate_template( 'blocks/post-block-9' )
			),
			'post_block_10'	=> array(
    			'name'		=> esc_html__( 'Post Block 10', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_10',
				'file'		=> self::locate_template( 'blocks/post-block-10' )
			),
			'post_block_11'	=> array(
    			'name'		=> esc_html__( 'Post Block 11', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_11',
				'file'		=> self::locate_template( 'blocks/post-block-11' )
			),
			'post_block_12'	=> array(
    			'name'		=> esc_html__( 'Post Block 12', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_12',
				'file'		=> self::locate_template( 'blocks/post-block-12' )
			),
			'post_block_13'	=> array(
    			'name'		=> esc_html__( 'Post Block 13', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_13',
				'file'		=> self::locate_template( 'blocks/post-block-13' )
			),
			/**
			 * 2 cols
			 */
			'post_block_dual'	=> array(
    			'name'		=> esc_html__( 'Post Block Dual', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Dual',
				'file'		=> self::locate_template( 'blocks/post-block-dual' )
			),
			'post_block_dual_v2'	=> array(
    			'name'		=> esc_html__( 'Post Block Dual v2', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Dual_v2',
				'file'		=> self::locate_template( 'blocks/post-block-dual-v2' )
			),
      'post_block_dual_v3'  => array(
          'name'    => esc_html__( 'Post Block Dual v3', 'wp-post-blocks' ),
          'class'   => 'WP_Post_Blocks\Block_Dual_v3',
        'file'    => self::locate_template( 'blocks/post-block-dual-v3' )
      ),
      'post_block_dual_v4'  => array(
          'name'    => esc_html__( 'Post Block Dual v4', 'wp-post-blocks' ),
          'class'   => 'WP_Post_Blocks\Block_Dual_v4',
        'file'    => self::locate_template( 'blocks/post-block-dual-v4' )
      ),
			/**
			 * 3 cols
			 */
			'post_block_triple'	=> array(
    			'name'		=> esc_html__( 'Post Block Triple', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Triple',
				'file'		=> self::locate_template( 'blocks/post-block-triple' )
			),
			'post_block_triple_v2'	=> array(
    			'name'		=> esc_html__( 'Post Block Triple v2', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Triple_v2',
				'file'		=> self::locate_template( 'blocks/post-block-triple-v2' )
			),
			'post_block_triple_v3'	=> array(
    			'name'		=> esc_html__( 'Post Block Triple v3', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Triple_v3',
				'file'		=> self::locate_template( 'blocks/post-block-triple-v3' )
			),
			/**
			 * 4 cols
			 */
			'post_block_quad'	=> array(
    			'name'		=> esc_html__( 'Post Block Quad', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Quad',
				'file'		=> self::locate_template( 'blocks/post-block-quad' )
			),
			'post_block_quad_v2'	=> array(
    			'name'		=> esc_html__( 'Post Block Quad v2', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Quad_v2',
				'file'		=> self::locate_template( 'blocks/post-block-quad-v2' )
			),
			/**
			 * 5 cols
			 */
			'post_block_quint'	=> array(
    			'name'		=> esc_html__( 'Post Block Quint', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Quint',
				'file'		=> self::locate_template( 'blocks/post-block-quint' )
			),
			'post_block_quint_v2'	=> array(
    			'name'		=> esc_html__( 'Post Block Quint v2', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Quint_v2',
				'file'		=> self::locate_template( 'blocks/post-block-quint-v2' )
			),
			

            'post_block_tax_break'   => array(
                'break'     => true,
                'name'      => 'Taxonomy Blocks'
            ),

            'post_block_14' => array(
                'name'      => esc_html__( 'Post Block 14', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_14',
                'file'      => self::locate_template( 'blocks/post-block-14' )
            ),

            'post_block_brick_tax'  => array(
                'name'      => esc_html__( 'Bricks Taxonomies', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Brick_Taxonomy',
                'file'      => self::locate_template( 'blocks/post-block-brick-tax' )
            ),
            'post_block_brick_hybrid_tax'   => array(
                'name'      => esc_html__( 'Bricks - Hybrid Taxonomy', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Brick_Hybrid_Tax',
                'file'      => self::locate_template( 'blocks/post-block-brick-hybrid-tax' )
            ),
            'post_block_brick_hybrid_tax_1x2'   => array(
                'name'      => esc_html__( 'Bricks - Hybrid Taxonomy - 1x2', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Brick_Hybrid_Tax_1x2',
                'file'      => self::locate_template( 'blocks/post-block-brick-hybrid-tax-1x2' )
            ),
            /**
             * Carousel & slider
             */
            'post_block_slider_carousel_break'   => array(
                'break'     => true,
                'name'      => 'Slider & Carousel'
            ),
            'post_block_slider' => array(
                'name'      => esc_html__( 'Post Block Slider', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Slider',
                'file'      => self::locate_template( 'post-block-slider' )
            ),
            'post_block_carousel'   => array(
                'name'      => esc_html__( 'Post Block Carousel', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Carousel',
                'file'      => self::locate_template( 'post-block-carousel' )
            ),
    		/**
    		 * Bricks
    		 */

            'post_block_bricks_break'   => array(
                'break'     => true,
                'name'      => 'Bricks'
            ),
    		'post_block_brick'	=> array(
    			'name'		=> esc_html__( 'Bricks - 1x4', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick',
				'file'		=> self::locate_template( 'post-block-brick' )
			),
			'post_block_brick_single'	=> array(
    			'name'		=> esc_html__( 'Brick - Single', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Single',
				'file'		=> self::locate_template( 'blocks/post-block-brick-single' )
			),
			'post_block_brick_dual'	=> array(
    			'name'		=> esc_html__( 'Bricks - Dual', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Dual',
				'file'		=> self::locate_template( 'blocks/post-block-brick-dual' )
			),
			'post_block_brick_triple'	=> array(
    			'name'		=> esc_html__( 'Bricks - Triple', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Triple',
				'file'		=> self::locate_template( 'blocks/post-block-brick-triple' )
			),
			'post_block_brick_quad'	=> array(
    			'name'		=> esc_html__( 'Bricks - Quad', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Quad',
				'file'		=> self::locate_template( 'blocks/post-block-brick-quad' )
			),
			'post_block_brick_quint'	=> array(
    			'name'		=> esc_html__( 'Bricks - Quint', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Quint',
				'file'		=> self::locate_template( 'blocks/post-block-brick-quint' )
			),
			/**
			 * Grid 4
			 */
			'post_block_brick_grid4'	=> array(
    			'name'		=> esc_html__( 'Bricks - Grid 4', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Grid4',
				'file'		=> self::locate_template( 'blocks/post-block-brick-grid4' )
			),
			
            'post_block_brick_grid6'    => array(
                'name'      => esc_html__( 'Bricks - Grid 6', 'wp-post-blocks' ),
                'class'     => 'WP_Post_Blocks\Block_Brick_Grid6',
                'file'      => self::locate_template( 'blocks/post-block-brick-grid6' )
            ),

			// Canceled
			/*'post_block_brick_carousel'	=> array(
    			'name'		=> esc_html__( 'Bricks - carousel', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Brick_Carousel',
				'file'		=> self::locate_template( 'blocks/post-block-brick-carousel' )
			),*/
			
    		/**
    		 * Theme - The Loop
    		 */
			/*'post_block_theme_loop'	=> array(
    			'name'		=> esc_html__( 'Block - theme loop', 'wp-post-blocks' ),
    			'class'		=> 'WP_Post_Blocks\Block_Theme_The_Loop',
				'file'		=> self::locate_template( 'blocks/post-block-theme-loop' )
			)*/

    	);

		do_action( 'wp_post_blocks/setup_blocks' );
    }

    /** 
     * Get template helper
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    
    public static function get_template(){

        $args = func_get_args();

        $tp_key = $args[0];

        if( empty( $tp_key ) )
            $tp_key = 'template_base';

        if( !isset( self::$post_templates[$tp_key] ) )
            return false;

        $class = !empty( self::$post_templates[$tp_key]['class'] ) ? self::$post_templates[$tp_key]['class'] : '';
        $file = !empty( self::$post_templates[$tp_key]['file'] ) ? self::$post_templates[$tp_key]['file'] : '';

        if( !class_exists( $class ) && $file && file_exists( $file ) ){
            require_once $file;
        }

        if( class_exists( $class ) ){
            
            unset($args[0]);

            call_user_func_array( array( $class , 'render' ), array_values( $args ) );

        }else{
            return false;
        }
    }
    /** 
     * Get avalable blocks
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    static function get_available_blocks(){

    	$excludes = (array) Options::get_option('exclude_blocks');

		$available_blocks = self::$post_blocks;	    	

		if( $excludes ){
			foreach ( $excludes as $block) {
				if( isset( $available_blocks[$block]) )
					unset( $available_blocks[$block] );
			}
		}
        // Remove Block Break
        foreach ( $available_blocks as $block_id => $block_args ) {
            if( !empty( $block_args['break'] ) ){
                unset( $available_blocks[$block_id] );
            }
        }

    	return $available_blocks;

    }
    /** 
     * Get Registered blocks
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    static function get_registered_blocks(){

    	return self::$post_blocks;

    }

    /** 
     * Setup stuff
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function setup_stuff(){

    	$blocks = self::get_available_blocks();

    	if( !is_admin() ){

    		foreach ( $blocks as $block_id => $block_data ) {

	    		if( $block_id && !in_array( $block_id, self::$post_block_shortcodes) && is_callable( array( __CLASS__, 'block_shortcode' ) ) ){
		    		add_shortcode( $block_id, array( __CLASS__, 'block_shortcode' ) );
		    	}
	    	}
	    	
    	}
    }
    /** 
     * Block shortcode handler
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function block_shortcode( $atts, $content, $tag ){
    	
    	if( empty( $tag ) )
    		return '';

    	if( is_admin() )
    		return '';

    	$block_instance = self::get_block_instance( $tag );

    	if( empty( $block_instance ) )
    		return '';

    	if( !method_exists( $block_instance, 'render_block' ) )
    		return '';

    	ob_start();

    	$block_instance->render_block( $atts );

    	return ob_get_clean();
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
    static function admin_hooks() {
      
		/* exit early if we're not on an admin page */
		if ( ! is_admin() )
			return false;

		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_enqueue_scripts') );

	}

	static function admin_enqueue_scripts( $hook ) {
		
		
	    if ( 'post.php' != $hook ) {
	        return;
	    }

	    wp_enqueue_style( 'wp-post-blocks-admin', self::get_url() . 'css/admin-style.css' );
	    wp_enqueue_style( 'wp-post-blocks-icon', self::get_url() . 'css/pbs-icons.css' );
	    wp_enqueue_script( 'wp-post-blocks-admin', self::get_url() . 'js/admin-script.js', array( 'jquery-ui-core', 'jquery-ui-selectable'), '1.0' );
	    
	}
    /**
     * Helper register template
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function register_template( $id, $args = array() ){

    	if ( ! did_action( 'wp_post_blocks/setup_templates' ) ) {
			_doing_it_wrong( __FUNCTION__, 'register_template should not be called inside wp_post_blocks/setup_templates action.', '1.0' );
		}

    	if( isset( self::$post_templates[$id] ) || empty( $id ) || empty( $args ) )
    		return;

    	$args = wp_parse_args( $args, array(
			'name' => '',
			'class'	=> '',
			'file'	=> '',
    	) );

    	self::$post_templates[$id] = $args;

    }
    /**
     * Helper register block
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function register_block( $id, $args = array() ){

    	if ( ! did_action( 'wp_post_blocks/setup_blocks' ) ) {
			_doing_it_wrong( __FUNCTION__, 'register_block should not be called inside wp_post_blocks/setup_blocks action.', '1.0' );
		}

    	if( isset( self::$post_blocks[$id] ) || empty( $id ) || empty( $args ) )
    		return;

    	$args = wp_parse_args( $args, array(
			'name' => '',
			'class'	=> '',
			'file'	=> '',
    	) );

    	self::$post_blocks[$id] = $args;
    }
    /**
	 * Excerpt Length
	 *
	 * @since 1.0
	 * @return int
	 */
	public function excerpt_length( $length ) {
    
		if( !empty( $GLOBALS['in_pbs_loop'] ) ){
			if( !empty($GLOBALS['excerpt_length'] ) )
				return (int) $GLOBALS['excerpt_length'];
			else
				return apply_filters( 'wp_post_blocks/excerpt_length', 30 );

		}
			
		return $length;
	}
  	/**
     * Execute the Hooks
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function hooks() {

  		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wp_enqueue_scripts' ), 16 );
  		add_action( "wp_post_blocks/ajax_wp_post_blocks/get_block_data", array( __CLASS__, 'ajax_response' ) );
  		add_action( "wp_post_blocks/ajax_nopriv_wp_post_blocks/get_block_data", array( __CLASS__, 'ajax_response' ) );
  		
    }

    /**
     * JS and CSS
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    public static function wp_enqueue_scripts(){


    	
    	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

    	wp_enqueue_style( 'flexslider', 		self::get_url() . "css/flexslider$suffix.css", array(), '2.6.0' );
    	wp_enqueue_script( 'flexslider', 		self::get_url() . "js/jquery.flexslider$suffix.js", array('jquery'), '2.6.0', true );

    	wp_enqueue_style( 'wp-post-blocks', 	self::get_url() . 'css/style.css', array(), '11012015' );
    	wp_enqueue_script( 'wp-post-blocks', 	self::get_url() . "js/script{$suffix}.js", array( 'jquery' ), '11012015', true );
    	
    	$base_url = set_url_scheme( home_url( '/' ) );
		$ajaxurl = add_query_arg( array( 'wp_pbs_ajaxify' => 1 ), $base_url );

    	wp_localize_script( 'wp-post-blocks', 'wp_post_blocks_vars', apply_filters( 'wp_post_blocks/script_locale', array(
			'ajaxurl' => esc_url_raw( $ajaxurl ),
			'a_value' => '10'
		) ) );

    }
    /**
	 * Block Ajax Responder
	 *
	 * @version 1.0
	 * @since 	1.0
	 * @return 	object
	 */
    public static function ajax_response(){
					
		if( empty( $_REQUEST['args'] ) || empty( $_REQUEST['settings'] ) )
			return '';

		check_ajax_referer( "wp-pbs-get-{$_REQUEST['settings']['uid']}-ajax-nonce", 'security' );

		$args = 	stripslashes_deep( $_REQUEST['args'] );
		$settings = stripslashes_deep( $_REQUEST['settings'] );
		$react_id = $settings['react'];
		$react_instance = null;
		
		$react_instance = self::get_block_instance( $react_id );

		$instance = array(
			'args'		=> $args,
			'settings' => $settings
		);
		// remove offset param
		unset($args['offset']);
		$no_more_posts = 0;

		ob_start();
			$react_instance->prepare_instance( $instance );
			$react_instance->prepare_posts();
			$no_more_posts = $react_instance->the_loop();
		$output = ob_get_clean();

		$response = array(
			'success' 		=> true,
			'html'			=> $output,
			'msg'			=> _x( 'No more posts.', 'Message after all posts loaded', 'wp-post-blocks' ),
			
			'all_loaded' 	=> count( $no_more_posts ) < intval( $args['posts_per_page'] ) ? true : false,
			'ids' 			=> $react_instance->listed_posts,
			'args'			=> $args
		);

		// Return data
		wp_send_json( $response );

		die('1');
	
    }
    /**
	 * Load a file
	 *
	 * @return    void
	 *
	 * @access    public
	 * @since     1.0
	 */
    static function load_file( $file, $once = false ){
    	$include = self::locate_template( $file );

    	if( empty( $include ) )
    		return;

    	if( $once )
    		include_once( $include );
    	else
    		include( $include );

    }

	/**
	 * Better Ajax Handler
	 * Our own Ajax response, avoiding calling admin-ajax
	 *
	 * @since 1.0
	 */
	public function ajax_handler() {
		if( empty( $_REQUEST['wp_pbs_ajaxify'] ) )
			return;

		if( empty( $_REQUEST['action'] ) )
			return;

		define( 'DOING_AJAX', true );

		@header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );
		@header( 'X-Robots-Tag: noindex' );

		send_nosniff_header();
		nocache_headers();

		if ( is_user_logged_in() ) {
			// If no action is registered, return a Bad Request response.
			if ( ! has_action( 'wp_post_blocks/ajax_' . $_REQUEST['action'] ) ) {
				wp_die( '0', 400 );
			}
			/**
			 * Fires authenticated AJAX actions for logged-in users.
			 */
			do_action( 'wp_post_blocks/ajax_' . $_REQUEST['action'] );
		} else {
			// If no action is registered, return a Bad Request response.
			if ( ! has_action( 'wp_post_blocks/ajax_nopriv_' . $_REQUEST['action'] ) ) {
				wp_die( '0', 400 );
			}
			/**0....
			 * Fires non-authenticated AJAX actions for logged-out users.
			 */
			do_action( 'wp_post_blocks/ajax_nopriv_' . $_REQUEST['action'] );
		}
		
		die( '0' );
	}
	/**
	 * Load template
	 *
	 * @return    void
	 *
	 * @access    public
	 * @since     1.0
	 */
	static function locate_template( $name ){

		$template = false;


		if ( $overridden_template = locate_template( self::$slug . "/{$name}.php" ) ) {
			// locate_template() returns path to file
			// if either the child theme or the parent theme have overridden the template
			$template = $overridden_template;

		} else {
			// If neither the child nor parent theme have overridden the template,
			// we load the template from the 'templates' sub-directory of the directory this file is in
			$file = self::get_dir() . "inc/{$name}.php";

			if( file_exists( $file ) )
				$template = $file;
				
		}

		return $template;
	}
	/**
	 * Translate column
	 *
	 * @return    void
	 *
	 * @access    public
	 * @since     1.0
	 */
	static function translate_col( $width ) {
		preg_match( '/(\d+)\/(\d+)/', $width, $matches );
		$w = $width;
		if ( ! empty( $matches ) ) {
			$part_x = (int) $matches[1];
			$part_y = (int) $matches[2];
			if ( $part_x > 0 && $part_y > 0 ) {
				$value = ceil( $part_x / $part_y * 12 );
				if ( $value > 0 && $value <= 12 ) {
					$w = $value;
				}
			}
		}

		return $w;
	}
	/**
	 * Get related tags
	 *
	 * @return    array
	 *
	 * @access    public
	 * @since     1.0
	 */
	static function related_tags( $post_id ) {
		if( empty( $post_id ) ){
			global $post;
			$post_id = !empty( $post->ID ) ? $post->ID : 0;
		}

		if ( empty( $post_id ))
			return array();
		

	    $tags 		= wp_get_post_tags( $post_id );
	    $tag_ids 	= array();  

		if ( !empty( $tags ) ){
			foreach( $tags as $tag ){
		        $tag_ids[] = $tag->term_id;
		    }
		}
		return ( array ) $tag_ids;
	}
	/**
	 * Get related categories
	 *
	 * @return    array
	 *
	 * @access    public
	 * @since     1.0
	 */
	static function related_cats( $post_id ) {
		if( empty( $post_id ) ){
			global $post;
			$post_id = !empty( $post->ID ) ? $post->ID : 0;
		}

		if ( empty( $post_id ))
			return array();
		
		$cats 		= get_the_category( $post_id );
		$cat_ids 	= array();

		if( !empty( $cats )){
			foreach ( $cats as $cat) {
				$cat_ids[] = $cat->cat_ID;
			}
		}
		return ( array ) $cat_ids;
	}
	/**
	 * Get posts Jetpack stats
	 * @param string
	 * @param array 
	 * @since 1.0.0
	 */
	static function jp_stats_get_post( $table = 'postviews', $_args = array() ){

		if( !defined( 'STATS_VERSION' ) && !function_exists( 'stats_get_csv') )
			return array();

		if( empty( $table ) )
			return array();

		$args = wp_parse_args( $_args, array(
			'count'	=> 5, // number of posts, this will set to limit
			'range'	=> 7, // set the day period for query
			'end_date'	=> date( 'Y-m-d', current_time( 'timestamp' ) )
		) );

		//date( 'Y-m-d', strtotime('-5 days',current_time('timestamp') ) );

		// return the right number of posts
		$args['count'] = $args['count'] + 1;

		$post_ids = array();
		$csv_args = array( 'top' => "&limit={$args['count']}&end={$args['end_date']}" );

		foreach ( $top_posts = stats_get_csv( $table, "days=$args[range]$csv_args[top]" ) as $i => $post ) {
			if ( $post['post_id'] == 0 ) {
				unset( $top_posts[$i] );
				continue;
			}
			$post_ids[] = $post['post_id'];
		}
		if ( empty( $post_ids ) )
			return array();

		return (array) $post_ids;
	}

	/**
	 * Helper to convert string to array
	 * @param mixed $str
	 */
	static function str_to_array( $str ){
		$arr = array();
		if( empty( $str ) )
			return $arr;

		if( is_string($str) ){
			if( strpos( $str,',') !== false ){
				$arr = explode( ',', $str );
				$arr = array_unique ( array_filter( array_map( 'trim', $arr ) ) );
			}else{
				$arr = (array) $str;
			}
		}

		return $arr;
	}
	/**
     * Get instance by react id
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
	public static function get_block_instance( $react ) {

		if( empty( $react ) )
			return false;


        
        if (! array_key_exists( $react, self::$block_instances ) ) {

        	$class = !empty( self::$post_blocks[$react]['class'] ) ? self::$post_blocks[$react]['class'] : '';
        	$file = !empty( self::$post_blocks[$react]['file'] ) ? self::$post_blocks[$react]['file'] : '';
        	
        	if( !class_exists( $class ) && $file && file_exists( $file ) ){

        		require_once $file;

        	}

        	if( class_exists( $class ) ){

        		self::$block_instances[$react] = new $class();


        	}
        }

        if( isset( self::$block_instances[$react] ) ){
        	return self::$block_instances[$react];
        }else{
        	return false;
        }
    }
	/**
     * Sanitize Hex Color
     *
     * @since 1.0
     */
	public static function sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}
	}
	

	/**
     * Helpers
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    static function get_constant(){
		return constant( __NAMESPACE__ . '\PLUGIN_FILE' );
	}
    static function get_url() {
        return plugin_dir_url( self::get_constant() );
    }

    static function get_dir() {
        return plugin_dir_path( self::get_constant() );
    }

	static function plugin_basename() {
	    return plugin_basename( self::get_constant() );
	}

	static function get_dirname( $path = '' ) {
	    return dirname( plugin_basename( self::get_constant() ) );
	}
	

}