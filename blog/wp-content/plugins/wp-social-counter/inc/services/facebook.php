<?php
/**
 * Class Facebook Page likes getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Facebook_Getter extends WP_Social_Counter_Getter{

    public $service = 'facebook';
    /**
     * API URL.
     */
    public $api_url = 'https://graph.facebook.com';
    /**
     * Get facebook page likes
     * 
     * @param array $args
     */
    public function get_total( $args = array() ){

        $args = wp_parse_args( $args, array(
            'id'            => ''
        ) );

        if( empty( $args['id'] ) ){
            return false;
        }

        $url = 'https://www.facebook.com/plugins/fan.php';

        $url = add_query_arg( array(
            'connections' => '100',
            'id'    => sanitize_text_field( $args['id'] )
        ), $url );

        $res = wp_remote_get( $url, array( 'timeout' => 60, 'sslverify' => false ) );
        $count = 0;
        
        if ( is_wp_error( $res ) ) {
            return 0;
        }else{
            $content = wp_remote_retrieve_body( $res );
            $regex = '/<div[^>]+class="_1drq"[^>]*>[^>]*<\/div>/';
            $regex = '/<div[^>]+class="_1drq"[^>]*>(.*?)<\/div>/';
            preg_match( $regex, $content, $matches );
            if( isset($matches[1])){
                $count = intval( str_replace(',', '', str_replace('.', '', $matches[1] ) ) );
            }
        }

        return $count;
    }

    public function get_total_old( $args = array() ){

        $args = wp_parse_args( $args, array(
            'id'            => '',
            'app_id'        => '',
            'app_secret'    => '',
            ''
        ) );

        if( empty( $args['id'] ) || empty( $args['app_id'] ) || empty( $args['app_secret'] ) ){
            return false;
        }

        // Get Access Token first.
        $login_url = add_query_arg( array(
            'client_id'     => $args['app_id'],
            'client_secret' => $args['app_secret'],
            'grant_type'    => 'client_credentials'
        ), "{$this->api_url}/oauth/access_token" );

        $access_token_response = wp_remote_get( $login_url, array( 'timeout' => 120, 'sslverify' => false ) );
        $access_token = '';

        if ( is_wp_error( $access_token_response ) ) {
            return false;
        }else{
            $access_token = wp_remote_retrieve_body( $access_token_response );
        }

        if( empty( $access_token ) )
            return false;

        // Main Request
        $response_url = "{$this->api_url}/{$args['id']}?fields=fan_count&access_token={$access_token}";

        $response = wp_remote_get( $response_url, array( 'timeout' => 120, 'sslverify' => false ) );
        $count = 0;

        if ( is_wp_error( $response ) ) {
            return false;
        }else{
            $response = json_decode( wp_remote_retrieve_body( $response ), true );
            if( !empty( $response['fan_count'] ) )
                $count = $response['fan_count'];
        }

        return absint( $count );
    }
}