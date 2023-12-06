<?php
/**
 * Class Registered users getter
 * 
 * @version 1.0
 */
class WP_Social_Counter_Users_Getter extends WP_Social_Counter_Getter{
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

        $usercount = count_users();

        $count = $usercount['total_users'];

        return absint( $count );
    }
}