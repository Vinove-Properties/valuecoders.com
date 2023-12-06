<?php
/**
 * Class WP_Social_Counter_Getter
 *
 * @since 1.0.0
 */
abstract class WP_Social_Counter_Getter{

    protected $service = '';
    /**
     * API URL.
     *
     * @var string
     */
    protected $api_url = '';

    protected function get_total( $args = array() ){

        $count;

        return (int) $count;
    }
}