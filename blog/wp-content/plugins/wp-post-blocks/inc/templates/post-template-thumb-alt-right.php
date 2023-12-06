<?php

namespace WP_Post_Blocks;

/**
 * Post thumbnail is on the right under post title and next to post content,
 * width is 35%
 * @since 1.0
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Post_Template_Thumb_Alt_Right') ){

	if( !class_exists( 'Post_Template_Thumb_Alt_Left' ) ){
		require_once Plugin::get_dir() . 'inc/templates/post-template-thumb-alt-left.php';
	}

	class Post_Template_Thumb_Alt_Right extends Post_Template_Thumb_Alt_Left{
		static $thumb_size = 'medium';
		static $uid			= 'pbs-module-thumb-alt-right';
	}
}