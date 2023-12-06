<?php
/**
 * Class Pinterest follower getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Pinterest_Getter extends WP_Social_Counter_Getter{

    public $service = 'pinterest';
    /**
     * API URL.
     */
    public $api_url = 'http://pinterest.com/';
    /**
     * Get facebook page likes
     * 
     * @param array $args
     */
    public function get_total( $args = array() ){

        $args = wp_parse_args( $args, array(
            'username'            => ''
        ) );

        if( empty( $args['username'] ) ){
            return false;
        }

        // Request Data
        $response_url = $this->api_url . $args['username'];

        $count = 0;
        $metas = get_meta_tags( $response_url );

        if( !empty( $metas['pinterestapp:followers'] ) ){
            $count = $metas['pinterestapp:followers'];
        }

        return absint( $count );
    }
}