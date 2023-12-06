<?php
/**
 * WP_Social_Counter_API_Helper
 * 
 * @author wpthms.com
 */
class WP_Social_Counter_API_Helper{
    /**
     * Get MailChimp Data
     */
    public function get_mailchimp_data( $args = array() ){
        
        $args = wp_parse_args( $args, array(
            'api_key'   => '',
            'method'    => 'lists',
            'fields'    => 'lists.name,lists.id' //lists.name,lists.id,lists.stats.member_count

        ) );
        if( empty( $args['api_key'] ) ) 
            return false;

        $api_dc = substr($args['api_key'],strpos($args['api_key'],'-')+1);
        $api_endpoint = "https://{$api_dc}.api.mailchimp.com/3.0";
        $url = $api_endpoint . '/' . $args['method'];

        $url_args = array(
            'headers'    => array(
                'content-type'  => 'application/json',
                'Authorization' => 'Basic ' . base64_encode( 'user:'. $args['api_key'] )
            ),
            'timeout'   => 100,
            'sslverify' => false,

        );

        if( !empty( $args['fields'] ) ){
            $url = add_query_arg( array(
                'fields'    => $args['fields']
            ), $url );
        }
        
        // get list
        $response = wp_remote_get( $url, $url_args );

        $result = false;

        if( !is_wp_error( $response ) ){
            $result = wp_remote_retrieve_body( $response );
        }

        return !empty( $result ) ? json_decode( $result ) : false;
    }
    
}