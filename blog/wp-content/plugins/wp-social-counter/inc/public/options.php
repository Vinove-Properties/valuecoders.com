<?php
/**
 * WP_Social_Counter_Options
 *
 * @since 1.0.0
 */
final class WP_Social_Counter_Options{

	public static $option_key = 'wp_social_counter';
	
	public static $defaults = array(
		'settings'  => array(
			'layout'        => 'default',
			'design'        => 'default',
			'shape'         => 'default',
			'style'   		=> 'default',
			'number_format' => 'default',
			'hide_count'    => false,
			'inline'		=> false
		),
		'services'  => array(
			'facebook'              => false,
			'facebook_id'           => '',

			'twitter'               		=> false,
			'twitter_username'    			=> '',
			'twitter_consumer_key'    		=> '',
			'twitter_consumer_secret' 		=> '',
			'twitter_access_token'    		=> '',
			'twitter_access_token_secret'   => '',

			'youtube'				=> false,
			'youtube_id'			=> '',
			'youtube_url'			=> '',
			'youtube_api_key'		=> '',

			'instagram'             => false,
			'instagram_username'    => '',

			'pinterest'				=> false,
			'pinterest_username'	=> '',

			// 'linkedin'              => '',
			// 'linkedin_id'           => '',
			// 'linkedin_api_key'      => '',

			'mailchimp'           	=> '',
			'mailchimp_api_key'     => '',
			'mailchimp_list'     	=> '',

			'email'              	=> '',
			'email_address'         => '',

			'users'					=> '',
			'comments'				=> '',

		)
	);
	/**
	 * Get all options
	 */
	static function get_options(){
		
		return array(
			'settings'   => array_merge( self::$defaults['settings'], get_option( self::$option_key . '_settings', self::$defaults['settings'] ) ),
			'services'   => array_merge( self::$defaults['services'], get_option( self::$option_key . '_services', self::$defaults['services'] ) )
		);
	}
	/**
	 * Get option helper
	 */
	static function get_option( $key ){

		if( empty( $key ) )
			return false;

		$data = self::get_options();
		
		if( $key && isset( $data[$key] ) )
			return $data[$key];
	}
	
}