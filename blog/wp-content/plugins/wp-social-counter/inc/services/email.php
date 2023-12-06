<?php
/**
 * Class Email getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Email_Getter extends WP_Social_Counter_Getter{

    public $service = 'email';
    /**
     * API URL.
     */
    public $api_url = '';
    /**
     * Get facebook page likes
     * 
     * @param array $args
     */
    public function get_total( $args = array() ){

        $args = wp_parse_args( $args, array(
            'email_address'       => ''        
        ) );

        if( empty( $args['email_address'] ) ){
            return false;
        }

        // Request Data
        $response_url = add_query_arg( array(
            'access_token'  => $args['access_token']
        ), $this->api_url . $args['user_id'] );

        $response = wp_remote_get( $response_url, array( 'timeout' => 120, 'sslverify' => false ) );
        $count = 0;

        if ( is_wp_error( $response ) ) {
            return false;
        }else{
            $response = json_decode( wp_remote_retrieve_body( $response ), true );
            if (!empty( $response['meta']['code'] ) && 200 == $response['meta']['code'] && !empty( $response['data']['counts']['followed_by'] ) ) {
                $count = $response['data']['counts']['followed_by'];
            }
        }

        return absint( $count );
    }
}