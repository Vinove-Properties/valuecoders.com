<?php
/**
 * Class WP_Social_Counter_Frontend
 *
 * @since 1.0.0
 */
final class WP_Social_Counter_Frontend{
	/**
     * Constructor
     *
     * @since 1.0.0
     */
	public function __construct(){
		
	}
	/**
     * Renderer
     *
     * @since 1.0.0
     */
	public static function render( $args = array() ){
		echo self::get_html( $args );
	}
	/**
     * Number Shortener
     *
     * @since 1.0.0
     */
	public static function shorten_number( $n, $precision = 1 ){
		$n_format = $n;
	    if ($n >= "1e9"){ 
			$n_format = number_format( ($n / "1e9"), $precision, ",", "") . "B";
		}elseif ($n >= "1e6"){
			$n_format = number_format( ($n / "1e6"), $precision, ",", "") . "M";
		} else if ($n >= "1e3"){ 
			$n_format = number_format( ($n / "1e3"), $precision, ",", "") . "k";
		}

	    return $n_format;
	}
	/**
     * Output
     *
     * @since 1.0.0
     */
	public static function get_html( $args = array() ){

		$data = WP_Social_Counter_Options::get_options();

		$args = wp_parse_args( $args, $data['settings'] );

		$services_args = apply_filters( 'wpsc_main_output_args', array(
			'facebook' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__facebook"></i>',
				'title' 	=> esc_html__('Facebook', 'wp-social-counter'),
				'text' 		=> esc_html__('Fans', 'wp-social-counter'),
				'show' 		=> $data['services']['facebook'],
				'url'		=> "//facebook.com/{$data['services']['facebook_id']}"
			),
			'twitter' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__twitter"></i>',
				'title' 	=> esc_html__('Twitter', 'wp-social-counter'),
				'text' 		=> esc_html__('Followers', 'wp-social-counter'),
				'show' 		=> $data['services']['twitter'],
				'url'		=> "//twitter.com/{$data['services']['twitter_username']}"
			),
			'youtube' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__youtube"></i>',
				'title' 	=> esc_html__('Youtube', 'wp-social-counter'),
				'text' 		=> esc_html__('Subscribers', 'wp-social-counter'),
				'show' 		=> $data['services']['youtube'],
				'url'		=> $data['services']['youtube_url']
			),
			'instagram' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__instagram"></i>',
				'title' 	=> esc_html__('Instagram', 'wp-social-counter'),
				'text' 		=> esc_html__('Followers', 'wp-social-counter'),
				'show' 		=> $data['services']['instagram'],
				'url'		=> "//instagram.com/{$data['services']['instagram_username']}"
			),
			'pinterest' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__pinterest"></i>',
				'title' 	=> esc_html__('Pinterest', 'wp-social-counter'),
				'text' 		=> esc_html__('Followers', 'wp-social-counter'),
				'show' 		=> $data['services']['pinterest'],
				'url'		=> "//pinterest.com/{$data['services']['pinterest_username']}"
			),
			
			'mailchimp' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__mailchimp"></i>',
				'title' 	=> esc_html__('Readers', 'wp-social-counter'),
				'text' 		=> esc_html__('Readers', 'wp-social-counter'),
				'show' 		=> $data['services']['mailchimp'],
				'url'		=> ''
			),
			'users' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__users"></i>',
				'title' 	=> esc_html__('Members', 'wp-social-counter'),
				'text' 		=> esc_html__('Members', 'wp-social-counter'),
				'show' 		=> $data['services']['users'],
				'url'		=> ''
			),

			'comments' => array(
				'icon' 	=> '<i class="wpsc-i wpsci__comments"></i>',
				'title' 	=> esc_html__('Comments', 'wp-social-counter'),
				'text' 		=> esc_html__('Comments', 'wp-social-counter'),
				'show' 		=> $data['services']['comments'],
				'url'		=> ''
			),
			/*'email' => array(
				'icon' 	=> '<i class="wpsc-i wpsc-email"></i>',
				'title' 	=> esc_html__('Email', 'wp-social-counter'),
				'text' 		=> esc_html__('Email', 'wp-social-counter'),
				'show' 		=> true,
				'url'		=> "//pinterest.com/{$data['services']['email_address']}"
			),*/

			/*'rss' => array(
				'icon' 	=> '<i class="wpsc-i wpsc-rss"></i>',
				'title' 	=> esc_html__('Rss', 'wp-social-counter'),
				'text' 		=> esc_html__('Rss', 'wp-social-counter'),
				'show' 		=> true,
				'url'		=> ''
			),*/
		) );
		
		$services_data = array();
		$has_counter = empty( $args['hide_count'] ) ? true : false;
		$cached = false;
		if( $has_counter ){

			if( !class_exists( 'WP_Social_Counter_Generator' ) ){

				include_once WP_Social_Counter::get_dir() . 'inc/public/generator.php';
			}
			if( WP_Social_Counter_Generator::get_cache() ){
				$services_data = WP_Social_Counter_Generator::get_data();
				$cached = true;
			}else{
				$services_data = array();
				wp_enqueue_script( 'wp-social-counter' );
			}
		}
		/*if( empty( $services_data ) )
			return false;*/
		$counter = $has_counter ? 'has-counter' : 'no-counter';
		$inline = !empty( $args['inline'] ) ? " inline-flex" : '';
		$class = "layout-{$args['layout']} shape-{$args['shape']} style-{$args['style']} design-{$args['design']} {$counter}{$inline}";
		// Start
		$html_before = '<div class="wpsc-wrapper ' . esc_attr( $class ) . '" data-cached="' . esc_attr( $cached ? 'true' : 'false' ) . '"><ul class="wpsc-list">';
		$html = '';
		$html_after = '</ul></div>';
		/**
		 * Service wrapper template
		 */
		$link_template 		= '<div class="wpsc-service-w"><a href="%2$s" class="wpsc-service-i" target="_blank"><span class="wpsc-service">%1$s</span></a></div>';
		$static_template 	= '<div class="wpsc-service-w"><div class="wpsc-service-i"><span class="wpsc-service">%1$s</span></div></div>';
		/**
		 * Content template
		 */
		$content = '<span class="wpsc-service-icon">%4$s</span>';
		$content .= '<span class="wpsc-service-content">';
			$content .= '<span class="wpsc-service-title">%1$s</span>';

			if( $has_counter ){
				$content .= '<span class="wpsc-service-count">%2$s</span>';
				$content .= '<span class="wpsc-service-text">%3$s</span>';
			}
			
		$content .= '</span>';

		// This allows filtering to change the order of services :D
		$services = apply_filters( 'wpsc_supported_services', array( 
			'facebook', 
			'twitter', 
			'youtube', 
			'instagram', 
			'pinterest', 
			'mailchimp', 
			'users', 
			'comments' ) 
		);

		foreach ( $services as $service ) {

			if( empty( $services_args[$service]['show'] ) ){
				continue;
			}

			$template = !empty( $services_args[$service]['url'] ) ? $link_template : $static_template;

			$count_number = 0;

			if( $has_counter ){
				$count_number = $unfiltered = !empty( $services_data[$service] ) ? $services_data[$service] : 0;
				/**
				 * Format Number
				 */
				if( 'short' === $args['number_format'] ){
					$count_number = self::shorten_number( $count_number );
				}else if( 'group' === $args['number_format'] ){
					$count_number = number_format( $count_number );
				}
				/**
				 * Allow filtering number
				 */
				$count_number = apply_filters( 'wpsc_service_count_number', $count_number, $unfiltered );
			}

			$html .= wp_sprintf( '<li class="%s">%s</li>',
				// Class
				esc_attr( $service ),
				// Template
				wp_sprintf( $template, 
					// content
					wp_sprintf( $content,
						// title
						esc_html( $services_args[$service]['title'] ),
						// Count
						esc_html( $count_number ),
						// text
						esc_html( $services_args[$service]['text'] ),

						$services_args[$service]['icon']
					),
					// URL
					esc_url( $services_args[$service]['url'] )
				)
			);

		}
		// end

		if( empty( $html )  ){
			return wp_sprintf( 'You have to input Services URL and necessary information in <strong><a href="%s">Settings -> WP Social Counter.</a></strong>', admin_url( 'options-general.php?page=wp-social-counter' ) );
		}

		return $html_before . $html . $html_after;

	}
	/**
     * Shortcode
     *
     * @since 1.0.0
     */
	public static function shortcode( $atts ){

		return self::get_html( $atts );
	}
	
}

add_shortcode( 'wp_social_counter', array( 'WP_Social_Counter_Frontend', 'shortcode' ) );
/**
 * Public Display function
 *
 * @since 1.0.0
 */
function wp_social_counter_display( $args ){
	WP_Social_Counter_Frontend::render( $args );
}