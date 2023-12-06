<?php
/**
 * Class MailChimp Subscribers getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_MailChimp_Getter extends WP_Social_Counter_Getter{

    public $service = 'instagram';
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
            'api_key'       => '',
            'list'          => ''
        ) );

        if( empty( $args['api_key'] ) || empty( $args['list'] ) )
            return false;

        if( !class_exists( 'WP_Social_Counter_API_Helper') ){
            include_once WP_Social_Counter::get_dir() . 'inc/classes/class.wpsc-api-helper.php';
        }

        $response = WP_Social_Counter_API_Helper::get_mailchimp_data( array( 
            'api_key'   => $args['api_key'],
            'method'    => "lists/{$args['list']}",
            'fields'    => 'stats.member_count'
        ) );

        $count = 0;

        if( !empty( $response->stats->member_count )){
            $count = $response->stats->member_count;
        }


        return absint( $count );
    }
}