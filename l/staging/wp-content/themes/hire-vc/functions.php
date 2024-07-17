<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '78.78.78' );
}

define('STRIPE_API_KEY', 'sk_test_51Mt4aUSB8zDjzgImRCeo3CTCBR1qbEuZJm2INaffVWiakEtpuKE9eYfYjCY6eNRkN20mij37ZurQ7QBaDzYEJRgF00hVPE3WLF'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51Mt4aUSB8zDjzgImsN3Eihh0ib6e8bUuJFu5vVHShXSHPYwXb7a3b5jQCGQMut0qj9GDtEXTQfMkb9dYnDXkmRQl00zNnoUGrn'); 

if ( ! function_exists( 'vc_l7_setup' ) ) :
	function vc_l7_setup() {
		load_theme_textdomain( 'vc_l7', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array( 'menu-1' => esc_html__( 'Primary', 'vc_l7' ))
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'vc_l7_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'vc_l7_setup' );

function vc_l7_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vc_l7_content_width', 640 );
}
add_action( 'after_setup_theme', 'vc_l7_content_width', 0 );

function vc_l7_widgets_init(){
	register_sidebar(
		array(
			'name'          => esc_html__( 'Valuecoders experience', 'vc_l7' ),
			'id'            => 'vc-experience',
			'description'   => esc_html__( 'Add widgets here.', 'vc_l7' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title" style="display:none;">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hiring Models', 'vc_l7' ),
			'id'            => 'hiring-model',
			'description'   => esc_html__( 'Add widgets here.', 'vc_l7' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title" style="display:none;">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vc_l7_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vc_l7_scripts(){
	global $post;
	if ( is_singular() && comments_open() && get_option('thread_comments') ){
	//wp_enqueue_script( 'comment-reply' );
	}
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    if( is_page_template( 'page-templates/tpl-version2.0.php' ) ) {
    	wp_enqueue_style( 'vc-style-v2', get_stylesheet_directory_uri().'/assets-v2/css/index.min.css', array(), _S_VERSION );
    	wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri() . '/assets-v2/js/glider.min.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v2-script', get_stylesheet_directory_uri() . '/assets-v2/js/script.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v2-validation', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v2-validation-pop', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation-pop.js', array(), _S_VERSION, true );
    }
    elseif( is_page_template( 'page-templates/tpl-version4.0.php' ) ){
    	$tplVar = get_post_meta( $post->ID, 'layout-v7', true );		
		if( $tplVar && ($tplVar == "yes") ){
		wp_enqueue_style('vc-style-v7', get_stylesheet_directory_uri().'/assets-v2/css/version.min-6.0.css', array(), _S_VERSION);	
		}else{
		wp_enqueue_style('vc-style-v4', get_stylesheet_directory_uri().'/assets-v2/css/version.min-2.0.css', array(), _S_VERSION);
		}

    	wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri() . '/assets-v2/js/glider.min.js', array(), _S_VERSION, 
    	true );
    	wp_enqueue_script( 'v4-script', get_stylesheet_directory_uri() . '/assets-v2/js/script-v4.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v2-validation', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation.js', array(), _S_VERSION, 
    	true );
    	wp_enqueue_script( 'v2-validation-pop', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation-pop.js', array(), _S_VERSION, true );    	
    }
    elseif( is_page_template( 'page-templates/tpl-version4.12.php' ) ){
    	wp_enqueue_style( 'vc-style-v4.12', get_stylesheet_directory_uri().'/assets-v2/css/version.min-3.0.css', array(), _S_VERSION );
    	wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri() . '/assets-v2/js/glider.min.js', array(), _S_VERSION, true );
    	
    	wp_enqueue_script( 'v412-script', get_stylesheet_directory_uri() . '/assets-v2/js/script-v4.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v2-validation-pop', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation-pop.js', array(), _S_VERSION, true );
    }
    elseif( is_page_template( 'page-templates/tpl-ppcmanagement.php' ) ){
    	wp_enqueue_style( 'ppc-mgt', get_stylesheet_directory_uri().'/assets-v2/css/version.min-4.0.css', array(), _S_VERSION );
    	wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri().'/assets-v2/js/glider.min.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'ppc-mgt', get_stylesheet_directory_uri().'/js/ppc-mgt.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'ppc-validation', get_stylesheet_directory_uri().'/js/ppc-validation.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v2-validation-pop', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation-pop.js', array(), _S_VERSION, true );
    }
    elseif( is_page_template( 'page-templates/tpl-version6.0.php' ) ){
    	wp_enqueue_style( 'v6-style', get_stylesheet_directory_uri().'/assets-v2/css/version.min-5.0.css', array(),_S_VERSION );
    	wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri().'/assets-v2/js/glider.min.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v6-script', get_stylesheet_directory_uri().'/assets-v2/js/script-v4.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v6-validation', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v6-validation-pop', get_stylesheet_directory_uri() . '/assets-v2/js/v2-validation-pop.js', array(), _S_VERSION, true );
    }
    elseif( is_page_template( 'page-templates/tpl-version8.0.php' ) ){
    	wp_enqueue_style( 'v8-style', get_bloginfo('template_url').'/assets-v2/css/version.min-8.0.css', array(),_S_VERSION );    	
    	wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri().'/assets-v2/js/glider.min.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v8-script', get_stylesheet_directory_uri().'/js/script-v8.js', array(), _S_VERSION, true );
    	wp_enqueue_script( 'v8-validation', get_stylesheet_directory_uri().'/js/validation-v8.js', array(), _S_VERSION, true );
    }
    else{	
	if( !wp_is_mobile() ){
		wp_enqueue_style( 'vc_l7-custom', get_stylesheet_directory_uri().'/common/css/bootstrap-4/cmnCssHire.css', array(), _S_VERSION );
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'vc-modernizr', get_stylesheet_directory_uri() . '/js/modernizr-custom.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'vc-slick-slider', get_stylesheet_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'vc-dropzone', get_stylesheet_directory_uri() . '/js/dropzone.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'vc-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );
	}else{
		wp_deregister_script( 'wp-embed' );
		wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/scripts-mob.js', array(), _S_VERSION, true );
		wp_enqueue_style( 'vc_l7-custom', get_stylesheet_directory_uri().'/common/css/bootstrap-4/cmnCssHire1.css', array(), _S_VERSION );
	}
	}

	/*
	wp_dequeue_script('jquery');
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    
	wp_enqueue_script( 'vc_l7-jsLib', get_stylesheet_directory_uri() . '/common/js/jsLib.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'vc_l7-slick', get_stylesheet_directory_uri() . '/common/js/slick.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'vc_l7-cmnjs', get_stylesheet_directory_uri() . '/common/js/cmnJs.min3.js', array(), _S_VERSION, false );
	*/
}
add_action( 'wp_enqueue_scripts', 'vc_l7_scripts' );


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function dd( $array ){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/*Optoins Page Optoins Here*/
if( function_exists('acf_add_options_page') ) { 
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts	',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Page Common Section',
		'menu_title'	=> 'Valuecoders Page',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Client Reviews',
		'menu_title'	=> 'Client Reviews - V2',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Client Reviews Version 4',
		'menu_title'	=> 'Client Reviews - V4',
		'parent_slug'	=> 'theme-general-settings',
	));
}

/*
add_action('wp_enqueue_scripts', function(){
	$script = 'jQuery.event.special.touchstart={
	setup:function(_,ns,handle){this.addEventListener("touchstart",handle,{passive:true});}
    };';
	wp_add_inline_script( 'jquery', $script, 'after' );
});
*/
add_filter('mime_types', function($existing_mimes){
	$existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;	
});

add_action('wp_footer',function(){ ?>
<style type="text/css">.hiring-model-widget,.hiring-model-widget .textwidget.custom-html-widget{display:inherit!important;}</style>
<?php 
}, 99999999999);

function disable_emoji_feature() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji');
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji');
	remove_filter( 'embed_head', 'print_emoji_detection_script' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'option_use_smilies', '__return_false' );
}

function disable_emojis_tinymce( $plugins ) {
	if( is_array($plugins) ) {
		$plugins = array_diff( $plugins, array( 'wpemoji' ) );
	}
	return $plugins;
}

add_action('init', 'disable_emoji_feature');


function utnHeaderString(){
	$parse            = parse_url($_SERVER['PHP_SELF']);
	$varPath          = dirname($parse['path']);
	$arrPath          = explode('/', $varPath);
	$LandingPageName  = end($arrPath);
	$deviceType       = (wp_is_mobile())?'phone':'computer';
	$queryString      = $_SERVER['QUERY_STRING'];
	$xForwarded  	  = (isset($_SERVER['X-Forwarded-For']) && !empty($_SERVER['X-Forwarded-For'])) ? $_SERVER['X-Forwarded-For'] : '';
	$frmqueryString   = $queryString.'&amp;PageName='.$LandingPageName.'&amp;xForwordFor='.$xForwarded.'&amp;deviceID='.$deviceType;
	return $frmqueryString;
}

add_action( 'wp_head', function(){
	global $post;
	if ( is_page() ) {
		$keyMeta = get_post_meta( $post->ID, 'vcmeta_keywords', true );
		if( $keyMeta ){
			echo '<meta name="keywords" content="'.$keyMeta.'"/>';
		} 
	}	
}, 2 );

function hiddenBoatField( $type = "list" ){
    $botFields = [
        'first_name',
        'last_name',
        'email_user',
        'user_dob',
        'user_age',
        'user_gender',
        'user_phone',
        'user_location',
        'user_address',
        'middle_name',
        'nationality',
        'city',
        'state',
        'zip',
        'landmark',
        'department',
        'postal_code',
        'hobbies',
        'job_title',
        'company'
    ];
    $randKey = array_rand($botFields,1);
    if( $type == "list" )
        return $botFields;
    else
        return '<input type="text" class="ht-input-field" name="'.$botFields[$randKey].'" value="" style="display:none;">';
}

add_action('after_setup_theme', function(){
	show_admin_bar(false);	
});


function getPxlWebpURL( $mid ){
	$webpDir 	= WP_CONTENT_DIR.'/uploads-webpc/uploads/';
	$webpUrl 	= content_url().'/uploads-webpc/uploads/';
	$icMeta 	= get_post_meta( $mid, '_wp_attached_file', true );
	//$icWebp 	= false;
	$webpimg 	= '';
	if( $icMeta ){
		$icwebpDir 	= $webpDir.$icMeta.".webp";
		if( file_exists( $icwebpDir ) ){
			$icWebp 	= $webpUrl.$icMeta.".webp";
			$webpimg 	= '<source type="image/webp" srcset="'.$icWebp.'">';	
		}	
	}
	return $webpimg;
}

function pxlGetPtag( $marray, $class = "", $title = "" ){
	if( !is_array( $marray ) ) return;
	$hasClass = ( !empty($class) ) ? ' class="'.$class.'"' : '';
	
	return '<picture '.$hasClass.'>
	'.getPxlWebpURL($marray['ID']).'
	<source type="'.$marray['mime_type'].'" srcset="'.$marray['url'].'">
	<img loading="lazy" src="'.$marray['url'].'" alt="'.$marray['title'].'" width="'.$marray['width'].'" height="'.$marray['height'].'">
	</picture>';
}

add_filter( 'body_class', function( $classes ){
	global $post;
	$isMetmp = get_field('isme-tpl', $post->ID);
	if( isset( $isMetmp ) && ($isMetmp == "yes") ){
		$classes[] = "mideast";	
	}
	$phoneOpt = get_field( 'frm-phone-fld', $post->ID );
	if( isset( $phoneOpt ) && ($phoneOpt == "no") ){
		$classes[] = "opt-pfld";	
	}
	
	return $classes;
});

function updateVcTransationStatus( $session_id, $txn_id, $status ){
	global $wpdb;
	$wpdb->update(
		'transactions', 
		['txn_id' => $txn_id, 'payment_status' => $status, 'modified' => date('Y-m-d H:i:s'), 'is_updated' => 1 ], 
		['session_id' => $session_id, 'is_updated' => 0]  
	);
}

function getTplPageURL($TEMPLATE_NAME){
    $url 	= null;
    $pages 	= get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $TEMPLATE_NAME
    ));
    if(isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}

function parsePlanText( $txt ){
	if( $txt == "@ok@" ){
		return '<i class="chkicon"></i>';
	}elseif( $txt == "@cross@" ){
		return '<i class="crossicon"></i>';
	}else{
		return $txt;
	}
}


//[country_tip label="38+ Countries", heading="Countries We're Serving Currently"]
function vlCountryToolTip_cb( $atts ) {
	$a = shortcode_atts( array(
		'label' 	=> '38+ Countries',
		'heading' 	=> 'Countries We\'re Serving Currently',
	), $atts );
	$markup = '<span class="country-list">'.$a['label'].'
	<div class="info">
	<div class="country-outer">
	<h2>'.$a['heading'].'</h2>
	<picture>
	<img loading="lazy" src="'.get_bloginfo('template_url').'/assets-v2/images/country-flag-image.svg" 
	alt="Valuecoders" width="959" height="340">
	</picture>
	</div>
	</div>
	</span>';
	return $markup;
}
add_shortcode( 'country_tip', 'vlCountryToolTip_cb' );