<?php
/**
 * Class Instagram Follower getter
 * 
 * @version 1.1
 */
class WP_Social_Counter_Instagram_Getter extends WP_Social_Counter_Getter{

    public $service = 'instagram';
    /**
     * API URL.
     */
    public $api_url = 'https://api.instagram.com/v1/users/';
    /**
     * Get facebook page likes
     * 
     * @param array $args
     */
    public function get_total( $args = array() ){

        $args = wp_parse_args( $args, array(
            'username'       => ''
        ) );

        if( empty( $args['username'] ) )
            return 0;

        $res = wp_remote_get( 'https://www.instagram.com/' . sanitize_text_field( $args['username'] ) . '/' );
        $html = wp_remote_retrieve_body( $res );

        $dom  = new DOMDocument();
        libxml_use_internal_errors( 1 );
        $dom->loadHTML( $html );
        $xpath = new DOMXpath( $dom );

        $json_scripts = $xpath->query( '//script[@type="application/ld+json"]' );
        $json = trim( $json_scripts->item(0)->nodeValue );

        $data = json_decode( $json );

        if( !empty( $data->mainEntityofPage->interactionStatistic->userInteractionCount ) ){
            $count = $data->mainEntityofPage->interactionStatistic->userInteractionCount;
        }

        return absint( $count );
    }
}