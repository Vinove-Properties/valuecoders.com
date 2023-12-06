<?php
/**
 * Class Comments getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Comments_Getter extends WP_Social_Counter_Getter{
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

        $count = 0;
        $comments = wp_count_comments();
        if( !empty( $comments->approved ) ){
            $count = $comments->approved;
        }

        return absint( $count );
    }
}