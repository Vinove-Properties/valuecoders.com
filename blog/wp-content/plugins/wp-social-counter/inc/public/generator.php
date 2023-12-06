<?php
/**
 * Class WP_Social_Counter_Generator
 *
 * @since 1.0.0
 */
final class WP_Social_Counter_Generator{

	public static $transient_key = 'wp_social_counter';
	public static $instance = null;
	/**
     * Get class instance
     *
     * @since 1.0
     */
	public static function get_instance(){

		if ( is_null( self::$instance ) ){
			self::$instance = new self();
		}

		return self::$instance;
	}
	/**
     * Constructor
     *
     * @since 1.0.0
     */

	
	public function __construct(){

	}
	/**
     * Refresh data
     *
     * @since 1.0.0
     */
	public static function refresh(){
		self::flush_cache();
		$data = self::get_data();

		return $data;
	}
	/**
     * Get from cache
     *
     * @since 1.0.0
     */
	public static function get_data(){
		
		$data = self::get_cache();

		if ( false === $data ) {
			$data = self::get_instance()->get_all();
			set_transient( self::$transient_key, $data, apply_filters( 'wpsc_count_data_cache_time', 60 * 60 * 24 ) );
		}

		return $data;
	}
	/**
     * Clear cache
     *
     * @since 1.0.0
     */
	public static function flush_cache(){
		delete_transient( self::$transient_key );
	}
	/**
     * Get cache
     *
     * @since 1.0.0
     */
	public static function get_cache(){
		$cache = apply_filters( 'wpsc_count_cache_data', get_transient( self::$transient_key ) );

		return $cache;
	}
	/**
     * Gell all
     *
     * @since 1.0.0
     */
	public function get_all(){

		$data = WP_Social_Counter_Options::get_options();
		$dir = WP_Social_Counter::get_dir();

		$services = apply_filters( 'wpsc_generator_services_args', array(
			'facebook'	=> array(
				'enable'	=> $data['services']['facebook'],
				'class'		=> 'WP_Social_Counter_Facebook_Getter',
				'file'		=> $dir . 'inc/services/facebook.php',
				'args'		=> array(
					'id'			=> $data['services']['facebook_id']
				),
			),
			'twitter'	=> array(
				'enable'	=> $data['services']['twitter'],
				'class'		=> 'WP_Social_Counter_Twitter_Getter',
				'file'		=> $dir . 'inc/services/twitter.php',
				'args'		=> array(
					'username'			=> $data['services']['twitter_username'],
					'consumer_key'		=> $data['services']['twitter_consumer_key'],
					'consumer_secret'	=> $data['services']['twitter_consumer_secret'],
					'access_token'		=> $data['services']['twitter_access_token'],
					'access_token_secret'=> $data['services']['twitter_access_token_secret'],
				)
			),
			'youtube'	=> array(
				'enable'	=> $data['services']['youtube'],
				'class'		=> 'WP_Social_Counter_Youtube_Getter',
				'file'		=> $dir . 'inc/services/youtube.php',
				'args'		=> array(
					'id'			=> $data['services']['youtube_id'],
					'api_key'		=> $data['services']['youtube_api_key']
				)
			),
			'instagram'	=> array(
				'enable'	=> $data['services']['instagram'],
				'class'		=> 'WP_Social_Counter_Instagram_Getter',
				'file'		=> $dir . 'inc/services/instagram.php',
				'args'		=> array(
					'username'		=> $data['services']['instagram_username']
				)
			),
			'pinterest'	=> array(
				'enable'	=> $data['services']['pinterest'],
				'class'		=> 'WP_Social_Counter_Pinterest_Getter',
				'file'		=> $dir . 'inc/services/pinterest.php',
				'args'		=> array(
					'username'			=> $data['services']['pinterest_username']
				)
			),
			'mailchimp'	=> array(
				'enable'	=> $data['services']['mailchimp'],
				'class'		=> 'WP_Social_Counter_Mailchimp_Getter',
				'file'		=> $dir . 'inc/services/mailchimp.php',
				'args'		=> array(
					'api_key'		=> $data['services']['mailchimp_api_key'],
					'list'			=> $data['services']['mailchimp_list']
				)
			),

			'email'	=> array(
				'enable'	=> $data['services']['email'],
				'class'		=> 'WP_Social_Counter_Email_Getter',
				'file'		=> $dir . 'inc/services/email.php',
				'args'		=> array(
					'email_address'	=> $data['services']['email_address'],
				)
			),

			'users'	=> array(
				'enable'	=> $data['services']['users'],
				'class'		=> 'WP_Social_Counter_Users_Getter',
				'file'		=> $dir . 'inc/services/users.php',
				'args'		=> array()
			),
			'comments'	=> array(
				'enable'	=> $data['services']['comments'],
				'class'		=> 'WP_Social_Counter_Comments_Getter',
				'file'		=> $dir . 'inc/services/comments.php',
				'args'		=> array()
			),
			
		) );
		
		if( !class_exists( 'WP_Social_Counter_Getter') ){
			include_once $dir . 'inc/class.social-counter-getter.php';
		}

		$all = array();

		foreach ( $services as $service_key => $service ) {

			if( !$service['enable'] )
				continue;

			if( !class_exists( $service['class'] ) && $service['file'] ){
				include_once $service['file'];
			}

			if( class_exists( $service['class'] ) ){
				$service_instance = new $service['class'];
				$count = $service_instance->get_total( $service['args'] );
				if( !$count ){
					$count = 0;
				}

				$all[$service_key] = $count;

			}
		}

		return $all;
		
	}
}