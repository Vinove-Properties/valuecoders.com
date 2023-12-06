<?php
/**
 * Class Googleplus subscriber getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Googleplus_Getter extends WP_Social_Counter_Getter{

    public $service = 'googleplus';
    /**
     * API URL.
     */
    public $api_url = 'https://www.googleapis.com/plus/v1/people/';
    /**
     * Get facebook page likes
     * 
     * @param array $args
     */
    public function get_total( $args = array() ){

        $args = wp_parse_args( $args, array(
            'id'            => '',
            'api_key'        => ''
        ) );

        if( empty( $args['id'] ) || empty( $args['api_key'] ) ){
            return false;
        }

        // Request Data
        $response_url = add_query_arg( array(
            'key'   => $args['api_key']
        ), $this->api_url . $args['id'] );
        
        $response = wp_remote_get( $response_url, array( 'timeout' => 120, 'sslverify' => false ) );
        $count = 0;

        if ( is_wp_error( $response ) ) {
            return false;
        }else{
            $response = json_decode( wp_remote_retrieve_body( $response ), true );
            
            if( !empty( $response['circledByCount'] ) )
                $count = $response['circledByCount'];
        }

        return absint( $count );
    }
}