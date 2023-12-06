<?php
namespace WP_Post_Blocks;

class Options{

	public static $option_key = 'wp_post_blocks';
    public static $defaults = array(
        'exclude_blocks'    => array()
    );

    static function get_options(){
        
        $data = get_option( self::$option_key, self::$defaults );

        return $data;
    }
    /**
     * Get option helper
     */
    static function get_option( $key ){

        if( empty( $key ) )
            return false;

        $data = self::get_options();
        
        if( $key && isset( $data[$key] ) )
            return $data[$key];
    }

    static function update_option( $key, $value ){

        if( empty( $key ) )
            return false;

        $data = self::get_options();

        // if is string, just trim it
        $data[$key] = is_string( $value ) ? trim( $value ) : $value;

        /*if( !empty( $value ) ){
            $data[$key] = trim( $value );    
        }else{
            unset( $data[$key] );
        }*/
        
        update_option( self::$option_key, $data );

    }
	
}