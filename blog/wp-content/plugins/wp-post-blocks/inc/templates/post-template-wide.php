<?php

namespace WP_Post_Blocks;

/**
 * Wide Template
 * @since 1.0  
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Post_Template_Wide') ){

	if( !class_exists( 'Post_Template' ) ){
		require_once Plugin::get_dir() . 'inc/post-template.php';
	}

	class Post_Template_Wide extends Post_Template{
		static $thumb_size = 'post-thumbnail';
		static $uid			= 'pbs-module-wide';
	}
}