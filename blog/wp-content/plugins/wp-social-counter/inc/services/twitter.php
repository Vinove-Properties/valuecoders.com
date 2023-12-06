<?php
/**
 * Class Twitter subscriber getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Twitter_Getter extends WP_Social_Counter_Getter{

	public $service = 'twitter';
	/**
	 * API URL.
	 */
	public $api_url = 'https://api.twitter.com/1.1/users/show.json';
	/**
	 * Get facebook page likes
	 * 
	 * @param array $args
	 */
	public function get_total( $args = array() ){

		$args = wp_parse_args( $args, array(
			'username'            => '',
			'access_token'        => '',
			'access_token_secret' => '',
			'consumer_key'        => '',
			'consumer_secret'     => ''
		) );


		if( empty( $args['username'] ) 
			|| empty( $args['access_token'] )
			|| empty( $args['access_token_secret'] )
			|| empty( $args['consumer_key'] )
			|| empty( $args['consumer_secret'] ) ){
			return false;
		}

		if( !class_exists( 'TwitterAPIExchange' ) ){
			include_once WP_Social_Counter::get_dir() . 'inc/classes/class.twitter-api-exchange.php';
		}

		$settings = array(
			'oauth_access_token'        => $args['access_token'],
			'oauth_access_token_secret' => $args['access_token_secret'],
			'consumer_key'				=> $args['consumer_key'],
			'consumer_secret'			=> $args['consumer_secret'],
		);

		$exchanger = new TwitterAPIExchange( $settings );
	
		if( is_wp_error( $exchanger ) )
			return false;
		
		$getfield = '?screen_name=' . $args['username'];
		$requestMethod = 'GET';
		
		$response_data = $exchanger->setGetfield( $getfield )
					 ->buildOauth( $this->api_url, $requestMethod )
					 ->performRequest(); 
		$count = 0;

		if( !empty( $response_data ) ){
			$response_data = json_decode( $response_data, true );
			if( !empty( $response_data['followers_count'] ) )
				$count = $response_data['followers_count'];

		}

		return absint( $count );
	}
}