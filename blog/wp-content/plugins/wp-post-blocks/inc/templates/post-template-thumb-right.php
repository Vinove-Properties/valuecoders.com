<?php

namespace WP_Post_Blocks;

/**
 * Post thumbnail is on the right
 * @since 1.0
 * 
 *                          :––––––––: 
 * This is the post title!  |        |  
 * Post meta                |        |
 *                          :––––––––:
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Post_Template_Thumb_Right') ){

	if( !class_exists( 'Post_Template_Thumb_Left' ) ){
		require_once Plugin::get_dir() . 'inc/templates/post-template-thumb-left.php';
	}

	class Post_Template_Thumb_Right extends Post_Template_Thumb_Left{
		static $thumb_size = 'thumbnail';
		static $uid			= 'pbs-module-thumb-right';
	}
}