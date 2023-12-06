<?php
/**
 * Class Linkedin Follower getter
 * Unofficial
 * 
 * @version 1.0
 */
class WP_Social_Counter_Linkedin_Getter extends WP_Social_Counter_Getter{

    public $service = 'instagram';
    /**
     * API URL.
     */
    public $api_url = 'https://api.linkedin.com/v1/companies/%s/num-followers?format=json';
    /**
     * Get facebook page likes
     * 
     * @param array $args
     */
    public function get_total( $args = array() ){

        $args = wp_parse_args( $args, array(
            'id'       => '',
            'access_token'  => ''
        ) );

        if( empty( $args['id'] ) || empty( $args['access_token'] ) ){
            return false;
        }

        $params = array(
            'timeout'   => 120,
            'sslverify' => false,
            'headers'   => array(
                'Authorization' => 'Bearer ' . sanitize_text_field( $settings['linkedin_access_token'] )
            )
        );

        $response_url = wp_sprintf( $this->api_url, sanitize_text_field( $args['id'] ) );
        // Request Data
        $response = wp_remote_get( , $params );
        $count = 0;
        
        if ( is_wp_error( $response ) || 200 != $response['response']['code'] ) {
            return false;
        } else {
            $count = wp_remote_retrieve_body( $response );
        }

        return absint( $count );
    }
}