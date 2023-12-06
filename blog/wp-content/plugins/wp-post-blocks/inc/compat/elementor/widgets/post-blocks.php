<?php
namespace WP_Post_Blocks;

use Elementor\Widget_Base as E_Widget_Base;
use Elementor\Controls_Manager as E_Controls_Manager;

// if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Base extends E_Widget_Base {

	/**
	 * @var string
	 */
	private $__block_id = null;
	private $__block_data = null;

	public function __construct( $data = [], $args = null ) {
		
		if( !empty( $args['block_id'] ) && !empty( $args['block_id'] ) ){
			$this->__block_id = $args['block_id'];
			$this->__block_data = $args['block_data'];
		}
	
		parent::__construct( $data, $args );
	}

	public function get_name() {
		return 'pbs-' . $this->__block_id;
	}

	public function get_title() {
		return $this->__block_data['name'];
	}

	public function get_icon() {
		return 'icon-pbs pbsi-' . $this->__block_id;
	}

	public function get_categories() {
		return array( Plugin::$slug );
	}

	public function is_reload_preview_required() {
		return false;
	}

	/**
	 * Overwrite _register_controls
	 * @return void
	 */
	protected function _register_controls() {

		$params = Plugin::get_block_instance( $this->__block_id )::get_params();
		// print_r( $params ); die;

		$groups = array();

		foreach ( $params as $key => $value){
			$group = !empty( $value['group'] ) ? $value['group'] : 'General';
			$groups[$group][] = $value;
			unset($params[$key]);
		}

		unset( $params );

		// All term lists will be stored here
		$terms = array();

		foreach ($groups as $group => $group_fields) {
			// Start Section
			$this->start_controls_section(

				'section_' . sanitize_key( $group ) ,
				[
					'label' => $group,
				]
			);

			for ($i=0; $i < count( $group_fields ) ; $i++) { 


				// Insert options for select 2
				if( 'tag_search' === $group_fields[$i]['type'] && !empty( $group_fields[$i]['settings']['tax'] ) ){
					
					if( !isset( $terms[$group_fields[$i]['settings']['tax']] ) ){
						$terms[$group_fields[$i]['settings']['tax']] = self::__get_term_ids( $group_fields[$i]['settings']['tax'] );
					}

					if( isset( $terms[$group_fields[$i]['settings']['tax']] ) ){
						$group_fields[$i]['options'] = $terms[$group_fields[$i]['settings']['tax']];
					}
					
				}

				if( 'color' === $group_fields[$i]['type'] ){
					// print_r( self::__translate_param( $group_fields[$i] ) );
				}

				// Make sure we add prefix for control id to prevent conflict with elementor
				$this->add_control(
					$group_fields[$i]['id'],
					self::__translate_param( $group_fields[$i] )
				);
			}

			// Add Section
			$this->end_controls_section();
		}

	}
	
	protected function render() {
		Plugin::get_block_instance( $this->__block_id )->render_block( $this->get_settings() );
	}

	protected function content_template() {}

	// public function render_plain_content( $instance = [] ) {}

	/**
	 * Helper: get term id for tag_search
	 * @return object
	 */
	public static function __get_term_ids( $tax = '' ){

		$tax = !empty( $tax ) ? $tax : 'category';

		$terms = get_terms( $tax, array(
		    'hide_empty' 	=> false,
		    'fields' 		=> 'id=>name'
		) );

		return $terms;
	}
	/**
	 * Helper: args Translator
	 * Convert wp pbs control args into elementor args
	 * @return array
	 */
	public static function __translate_param( $args ){
		
		$translate_args = array(
			'title'	=> 'label',
			'std'	=> 'default',
			'desc'	=> 'description'
		);

		// Rename block control elementor control key
		foreach ($translate_args as $key => $value) {
			if( isset( $args[$key]) ){
				$args[$value] = $args[$key];
				unset( $args[$key] );
			}
		}

		// Control types migration
		$supported_types = array(
			'text' 		=> array(
				'type'	=> E_Controls_Manager::TEXT,
			),
			'textarea'	=> array(
				'type'	=> E_Controls_Manager::TEXTAREA
			),
			'number'	=> array(
				'type'	=> E_Controls_Manager::NUMBER
			),
			'color' 		=> array(
				'type'	=> E_Controls_Manager::COLOR,
			),
			'select' 		=> array(
				'type'	=> E_Controls_Manager::SELECT,
			),
			'checkbox' 		=> array(
				'type'	=> E_Controls_Manager::SWITCHER,
			),
			'html' 		=> array(
				'type'	=> E_Controls_Manager::RAW_HTML
			),
			'multicheck' 		=> array(
				'type'	=> E_Controls_Manager::SELECT2,
				'multiple'	=> true
			),
			'tag_search' 		=> array(
				'type'	=> E_Controls_Manager::SELECT2,
				'multiple'	=> true
			)
		);

		if( isset( $supported_types[$args['type']] ) ){
			
			$args = wp_parse_args( $supported_types[$args['type']], $args );

		}else{

			$args['type'] = 'text';

		}

		// Change control dependency
		if( isset( $args['dependency'] ) ){

			// If value === 1, convert checkbox value to switcher value
			if( !empty( $args['dependency']['value'] ) && 1 === $args['dependency']['value'] ){
				$args['dependency']['value'] = 'yes';
			}

			$args['condition'] = array(
				$args['dependency']['element'] => $args['dependency']['value']
			);
			$args['render_type']	= 'ui';
			unset( $args['dependency'] );

		}

		if( empty( $args['group'] ) ){
			$args['group'] = 'General';
		}

		// Unset unecessary field
		unset( $args['settings'] );
		unset( $args['save_always']);

		return $args;
	}
	
}
