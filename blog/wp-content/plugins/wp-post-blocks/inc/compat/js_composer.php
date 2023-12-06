<?php
// if ( ! defined( 'ABSPATH' ) ) exit; 

namespace WP_Post_Blocks;

// Class name: Addon_{plugin-slug}
class Addon_JS_Composer{
	/**
	 * @var Plugin The singleton instance.
	 */
	private static $instance;

	private static $priority = 11;
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
		add_action( 'init', array( __CLASS__, 'vc_setup' ), self::$priority );

	}
	/**
	 * VC Setup
	 */
    public static function vc_setup(){

    	// global $pagenow;

    	if( defined( 'WPB_VC_VERSION' ) 
    		&& ( 
    			( is_admin() 
	    			// && in_array( $pagenow, array( 'post.php', 'post-new.php') )
	    			&& function_exists( 'vc_mode') 
	    			&& 'admin_page' === vc_mode() ) 
		    	|| (function_exists( 'vc_is_page_editable') 
		    		&& vc_is_page_editable()) 
		    	|| (function_exists('vc_is_frontend_editor') 
		    		&& vc_is_frontend_editor() )
	    	)
		){
			// do something for thes page here	
    	}else{
    		// load nothing
    		return;
    	}
    	
    	$blocks = Plugin::get_available_blocks();
    	

    	foreach ( $blocks as $block_id => $block_data ) {

    		$instance = Plugin::get_block_instance( $block_id );
    		
    		if( empty( $instance ) )
    			continue;
    		
    		self::vc_map( array(
    			'name'			=> $instance::$name,
    			'description'	=> $instance::$shortcode_desc,
    			'base'			=> $instance::$react,
    			'controls'		=> 'full',
    			'class'			=> $instance::$react,
    			'icon'			=> 'icon-pbs pbsi-' . $instance::$react,
    			'category'		=> $instance::$group,
    			'params'		=> self::translate_params( $instance::get_params() )
    		) );
    	}

    	self::setup_pagebuilder();

    }
	/**
	 * Setup page builder
	 *
	 * @since 1.0
	 * @return classes
	 */
    public static function setup_pagebuilder(){
    	if( !is_admin() ){
    		add_filter( 'shortcode_atts_vc_column', 		array( __CLASS__, 'vc_col_setter' ), 15, 4 );
			add_filter( 'shortcode_atts_vc_column_inner', 	array( __CLASS__, 'vc_col_setter' ), 15, 4 );
			if( function_exists( 'vc_add_shortcode_param' ) )
				vc_add_shortcode_param( 'pbs_html', array( __CLASS__, 'vc_html_param' ) );
	    }
    		
    }
    /**
	 * VC - Map the shortcode
	 * must be hooked in init action to be able to detect page context
	 *
	 * @since 1.0
	 * @return void
	 */
    public static function vc_map( $args ){

		vc_map( self::vc_params( $args ) );

		// Bait it, only call when DOING_AJAX is working
		if( !( defined( 'DOING_AJAX' ) && DOING_AJAX ) )
			return;

		// return;

		//Filters For autocomplete param:
		//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
		// Render exact category by id. Must return an array (label,value)

		$types = array();
		// $types = array(
		// 	'category'	=> array( 'cat', 'category__in', 'category__not_in', 'filter_cats' ),
		// 	'post_tag'		=> array( 'tag_id', 'tag__not_in', 'filter_tags' )
		// );

		foreach ( $args['params'] as $param_args ) {
			if( isset( $param_args['type'] ) 
				&& 'autocomplete' === $param_args['type'] 
				&& !empty( $param_args['settings']['tax'] ) ){

				$types[$param_args['settings']['tax']][] = $param_args['param_name'];
			}else{
				continue;
			}
		}
		
		if( empty( $types ) )
			return;

		foreach( $types as $tax => $type_params ){

			foreach ( $type_params as $param ) {
			
				add_filter( 'vc_autocomplete_' . $args['base'] . "_{$param}_callback", array(
					__CLASS__, "vc_{$tax}AutocompleteSuggester"
				), 10, 1 );
				add_filter( 'vc_autocomplete_' . $args['base'] . "_{$param}_render", array(
					__CLASS__, "vc_{$tax}RenderByIdExact"
				), 10, 1 );
			}
		}

    }
    /**
	 * VC - params to register
	 *
	 * @since 1.0
	 * @return array
	 */
	public static function vc_params( $args ){

		return array(
            'name' 			=> $args['name'],
            'description' 	=> $args['description'],
            'base' 			=> $args['base'],
            'controls' 		=> $args['controls'],
            'class' 		=> $args['class'],
            'icon' 			=> $args['icon'],
            'category' 		=> $args['category'],
            'params' 		=> $args['params']
        );

	}
    /**
	 * VC - Hack: Assign current column to global variable via filter
	 *
	 * @since 1.0
	 * @return string
	 */
	public static function vc_col_setter( $out, $pairs, $atts, $shortcode ){

		if( isset( $out['width'] ) && in_array( $shortcode, array( 'vc_column', 'vc_column_inner' ) ) )
			$GLOBALS['wp_pbs_col'] = $out['width'];

		return $out;
	}
	/**
	 * VC - Custom html param output
	 *
	 * @since 1.0
	 * @return string
	 */
	public static function vc_html_param( $settings, $value ) {
	   return '<div class="wp-pbs-html">' . $settings['description'] . '</div>';
	}
	/**
	 * VC - Compat
	 *
	 * @since 1.0
	 * @return void
	 */
	public function vc_compat(){
		return;

		if( !defined( 'WPB_VC_VERSION' ) )
			return;

		add_action( 'init', array( $this, 'vc_map' ), 10 );
	}

	public function vc_col_getter( $classes, $base, $atts ){
		// Check if is column or column inner, push column size to global var
		if( in_array( $base, array( 'vc_column', 'vc_column_inner' ) ) )
			$GLOBALS['wp_pbs_col'] = $atts['width'];

		return $classes;
	}
	/**
	 * VC - Helper: Get column size through global variable
	 *
	 * @since 1.0
	 * @return string
	 */
	public static function vc_get_col(){
		if( !empty( $GLOBALS['wp_pbs_col'] ) ){
			return $GLOBALS['wp_pbs_col'];
		}
		return false;
	}
	/**
	 * VC - shortcode parameters
	 *
	 * @since 1.0
	 * @return (array)
	 */
	public static function translate_params( $params ){
		
		$new_params = array();

		foreach ( $params as $key => $value) {

			$args = array(
				'heading'		=> !empty( $value['title'] ) ? $value['title'] : '',
				'type'			=> !empty( $value['type'] ) ? $value['type'] : '',
				'param_name'	=> !empty( $value['id'] ) ? $value['id'] : '',
				'value'			=> !empty( $value['std'] ) ? $value['std'] : '',
				'description'	=> !empty( $value['desc'] ) ? $value['desc'] : '',
				'group'			=> !empty( $value['group'] ) ? $value['group'] : '',
				'admin_label'	=> !empty( $value['admin_label'] ) ? $value['admin_label'] : false,
				'save_always'	=> !empty( $value['save_always'] ) ? $value['save_always'] : false,
				'settings'		=> !empty( $value['settings'] ) ? $value['settings'] : array(),
				'dependency'	=> !empty( $value['dependency'] ) ? $value['dependency'] : array(),
			);

			// Overwrite type 
			if( 'text' === $value['type'] ){
				$args['type'] = 'textfield';
				$args['value'] = !empty( $value['std'] ) ? $value['std'] : '';
			}elseif( 'textarea' === $value['type'] ){
				
			}elseif( 'color' === $value['type'] ){
				$args['type'] = 'colorpicker';
				$args['value'] = !empty( $value['std'] ) ? $value['std'] : '';
			}elseif( 'select' === $value['type'] ){
				$args['type'] = 'dropdown';
				$args['value'] = !empty( $value['options'] ) && is_array( $value['options'] ) ? array_flip( $value['options'] ) : array();
			}elseif( 'multicheck' === $value['type'] ){
				$args['type'] = 'checkbox';
				$args['value'] = !empty( $value['options'] ) && is_array( $value['options'] ) ? array_flip( $value['options'] ) : array();
			}elseif( 'tag_search' === $value['type'] ){
				$args['type'] = 'autocomplete';
			}elseif( 'number' === $value['type'] ){
				$args['type'] = 'textfield';
			}elseif( 'html' === $value['type'] ){
				
				$args['type'] = 'pbs_html';
			}

			if( !empty( $args['dependency']['value'] ) && 1 === $args['dependency']['value']  ){
				$args['dependency']['value'] = 'true';
			}

			$new_params[] = $args;
		}

		return $new_params;

	}

	/********************************************************
	 * Visual composer autocomplete fields helper
	 ********************************************************
	 *
	 * VC - category autocomplete
	 *
	 * @since 1.0
	 * @return void
	 */
	static function vc_categoryAutocompleteSuggester( $query, $slug = false ) {
		$terms = get_terms( 'category', array( 'name__like' => $query, 'fields' => 'id=>name', 'hide_empty' => false ) );

		$result = array();

		if( !empty( $terms )){
			foreach ($terms as $key => $value) {
				$result[] = array(
					'value' => $key,
					'label' => $value
				);
			}
		}

		return $result;
	}

	static function vc_categoryRenderByIdExact( $query ) {
		global $wpdb;
		$query = $query['value'];
		$query = trim( $query );
		$term = get_term_by( 'id', $query, 'category' );

		return self::vc_postTermOutput( $term );
	}

	/**
	 * VC - tag autocomplete
	 *
	 * @since 1.0
	 * @return void
	 */
		static function vc_post_tagAutocompleteSuggester( $query, $slug = false ) {
		$terms = get_terms( 'post_tag', array( 'name__like' => $query, 'fields' => 'id=>name', 'hide_empty' => false ) );

		$result = array();

		if( !empty( $terms )){
			foreach ($terms as $key => $value) {
				$result[] = array(
					'value' => $key,
					'label' => $value
				);
			}
		}

		return $result;
	}

	static function vc_post_tagRenderByIdExact( $query ) {
		global $wpdb;
		$query = $query['value'];
		$query = trim( $query );
		$term = get_term_by( 'id', $query, 'post_tag' );

		return self::vc_postTermOutput( $term );
	}

	/**
	 * Return product category value|label array
	 *
	 * @param $term
	 *
	 * @since 1.0
	 * @return array|bool
	 */
	static function vc_postTermOutput( $term ) {
		$term_title = $term->name;
		$term_id = $term->term_id;

		$term_title_display =$term_id . ' - ' . $term_title;

		$data = array();
		$data['value'] = $term_id;
		$data['label'] = $term_title_display;

		return ! empty( $data ) ? $data : false;
	}

}

// endif;

// Kickstart it
Addon_JS_Composer::get_instance();