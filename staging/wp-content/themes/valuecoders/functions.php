<?php
function isStaggingVersion(){
	return ( isset( $_SERVER['PHP_SELF'] ) && (strpos( $_SERVER['PHP_SELF'], 'staging' ) !== false) )  ?  true : false;
}

if( isset($_SERVER['HTTP_HOST']) && ( $_SERVER['HTTP_HOST']  !== "localhost" ) ){
    require_once '/home/valuecoders-com/public_html/envloader.php';
    loadEnv();
    add_action( 'phpmailer_init', function( $phpmailer ){
        $phpmailer->isSMTP();
        $phpmailer->Host         = getenv('SMTP_HOST');
        $phpmailer->SMTPSecure   = getenv('SMTP_SECURE');
        $phpmailer->Port         = getenv('SMTP_PORT');
        $phpmailer->SMTPAuth     = getenv('SMTP_AUTH');
        $phpmailer->Username     = getenv('SMTP_USERNAME');
        $phpmailer->Password     = getenv('SMTP_PASSWORD');
        $phpmailer->From          = "do-not-reply@valuecoders.com";
        $phpmailer->FromName      = "ValueCoders";
    });    
    define('CRM_DB_USER', getenv('CRM_DB_USER'));
    define('CRM_DB_PASSWORD', getenv('CRM_DB_PASS'));
    define('CRM_DB', getenv('CRM_DB_NAME'));
    define('CRM_HOST', getenv('CRM_DB_HOST'));
}else{
	define('CRM_DB_USER', 'phpmyadmin');
    define('CRM_DB_PASSWORD', 'root');
    define('CRM_DB', 'crm.valuecoders');
    define('CRM_HOST', 'localhost');
}

add_filter('xmlrpc_enabled', '__return_false');

if( ! defined( '_S_VERSION' ) ) {
	if( isStaggingVersion() ){
		define( '_S_VERSION', time() );
		define( 'RES_VERSION', 'v6.0' );	
	}else{
		define( '_S_VERSION', '4.01.23' );
		define( 'RES_VERSION', 'v6.0' );	
	}
}

function _vers_six($src){
	echo get_bloginfo('template_url').'/v6.0/'.$src;
}

function _getvers_six($src){
	return get_bloginfo('template_url').'/v6.0/'.$src;
}

add_filter('upload_mimes', function($mime_types){
    $mime_types = [];
    $mime_types['webp'] = 'image/webp';
    $mime_types['pdf'] = 'application/pdf';
    return $mime_types;
});

/*
add_filter( 'wp_authenticate_user', function( $user ){
    if(is_wp_error($user)){return $user;}
    if( is_object( $user ) && isset( $user->ID ) && ($user->user_email !== "nitin.baluni@mail.vinove.com") ){
        return new WP_Error( 'locked', 'Your account is locked!' );
    }else{
        return $user;
    }
});
add_action( 'init', function(){
    if (is_admin() && is_user_logged_in()) {
        $current_user = wp_get_current_user();
        if ($current_user->user_email !== "nitin.baluni@mail.vinove.com") {
            wp_die('Your account is locked!');
        }
    }
});
*/


function valuecoders_setup(){
	load_theme_textdomain( 'valuecoders', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array( 'menu-1' => esc_html__( 'Primary', 'valuecoders' ) ) );
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

	add_theme_support(
		'custom-background',
		apply_filters(
			'valuecoders_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
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
add_action( 'after_setup_theme', 'valuecoders_setup' );

function valuecoders_widgets_init(){
	register_sidebar(
		array(
			'name'          => esc_html__( 'Valuecoders - Profile', 'valuecoders' ),
			'id'            => 'vc-profile',
			'description'   => esc_html__( 'Add widgets here.', 'valuecoders' ),
			'before_widget' => '<div class="count-box-outer dis-flex">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Valuecoders - Contacts', 'valuecoders' ),
			'id'            => 'vc-contacts',
			'description'   => esc_html__( 'Add widgets here.', 'valuecoders' ),
			'before_widget' => '<div class="form-footer dis-flex">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Our Software Application Maintenance Forms', 'valuecoders' ),
			'id'            => 'app-maintenance',
			'description'   => esc_html__( 'Add widgets here.', 'valuecoders' ),
			'before_widget' => '<section class="three-column-icon-section padding-t-120 padding-b-120"><div class="container">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Low-Code/ No-Code Services - Comparative Analysis', 'valuecoders' ),
			'id'            => 'lc-comparative-analysis',
			'description'   => esc_html__( 'Add widgets here.', 'valuecoders' ),
			'before_widget' => '<section class="three-column-icon-section bg-blue-linear table-section tb-02 padding-t-120 padding-b-120"><div class="container">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
        array(
            'name'          => esc_html__( 'Single Page - Table of content', 'valuecoders' ),
            'id'            => 'vcr-toc',
            'description'   => esc_html__( 'Add widgets here.', 'valuecoders' ),
            'before_widget' => '<div class="toc-widget-con">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="toc-widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'valuecoders_widgets_init' );

function defer_parsing_of_js( $url ){
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


add_action( 'wp_enqueue_scripts', 'valuecoders_scripts' );
function valuecoders_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_deregister_script( 'wp-embed' );

    if( !is_page_template(['page-templates/tpl-feedback.php']) ){
	wp_enqueue_script('pe-fixer', get_stylesheet_directory_uri().'/js/pe-fixer.js', array(), _S_VERSION, true);	
	if( !is_page_template(['page-templates/template-contact-v9.php']) ){
	wp_enqueue_script('vc-glider', get_stylesheet_directory_uri().'/js/glider.min-v2.js', array(), _S_VERSION, true);	
	}
    wp_enqueue_script('vc-glide', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.1/glide.min.js', [], _S_VERSION, true);
    wp_enqueue_style('vc-glide.core', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.1/css/glide.core.css', [],
    _S_VERSION);
    
	wp_enqueue_script('vc-script', get_stylesheet_directory_uri() . '/js/script.js', array(), _S_VERSION, true);
	wp_localize_script( 'vc-script', 'vcObj', 
		array(
			'tpl_url' 		=> get_bloginfo( 'template_url' ),
			'web_url' 		=> get_bloginfo( 'url' ),
			'admin_ajax' 	=> admin_url( 'admin-ajax.php' ),
			'page_tpl' 	 	=> basename( get_page_template() ),
			'is_mobile' 	=> ( wp_is_mobile() ) ? "true" : "false",
			'_env' 			=> ( isStaggingVersion() ) ? 'staging' : 'production'
		) 
	);
	}
	
	if( is_front_page() || is_home() || is_404() ){
		wp_enqueue_style( 'vc-index', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/index.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/tpl-homev6.0.php' ) ){
		wp_enqueue_style( 'vc-index', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/index.css', [], _S_VERSION );
	}	
	elseif( is_page_template( 'page-templates/template-hirepage.php' ) ){
		wp_enqueue_style( 'vc-hirev3', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/hirepage.min.css', [], _S_VERSION );		
		wp_enqueue_script( 'vc-hire-frm', get_stylesheet_directory_uri(). '/js/hire-form-validation.js', array(), 
		_S_VERSION, true );
	}
	elseif( is_page_template( 'page-templates/hire-dotnet-developers.php' ) ){
		wp_enqueue_style( 'vc-technologies', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/technologies.min.css', [], _S_VERSION );
		/*
		wp_enqueue_script( 'vc-hire-frm', get_stylesheet_directory_uri(). '/js/hire-form-validation.js', array(), 
		_S_VERSION, true );
		*/
	}
	elseif( is_page_template( 'page-templates/template-industry.php' ) ){
		wp_enqueue_style( 'vc-technologies', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/industries.min.css', [], _S_VERSION );
	}

	elseif( is_page_template( 'page-templates/template-industry-v6.php' ) ){
		wp_enqueue_style( 'vc-technologies', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/industries.min.css', [], _S_VERSION );
		wp_enqueue_style( 'vc-industry', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/industries-page.css', [], _S_VERSION );
		
	}
	elseif(
		is_page_template( 'page-templates/template-services.php' ) ||
		is_page_template( 'page-templates/tpl-versus-other.php' ) ||		
		is_page_template( 'page-templates/tpl-how-works.php' )
	){
		wp_enqueue_style( 'vc-services', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/services.min.css', [], _S_VERSION );		
	}
	elseif( is_page_template( 'page-templates/template-services-v2.php' ) ){
		wp_enqueue_style( 'vc-service-v2', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/service-updated.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/tpl-services-v5.0.php' ) ){
		wp_enqueue_style( 'vc-service-v5', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/services.min.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/template-contact.php' ) ){
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css', [], _S_VERSION );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation.js', array(), 
		_S_VERSION, true );
	}	
	elseif( is_page_template( 'page-templates/template-contact-v3.php' ) ){
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css' );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v3.js', array(), 
		_S_VERSION, true );
	}
	elseif( is_page_template( 'page-templates/template-contact-v4.php' ) ){
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css' );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v4.js', array(), 
		_S_VERSION, true );
	}
	elseif( is_page_template( 'page-templates/template-contact-v5.php' ) ){
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css' );
		wp_enqueue_style( 'vc-flagst', get_stylesheet_directory_uri().'/css/form-county.css' );
		wp_enqueue_script( 'vc-flagsc', get_stylesheet_directory_uri(). '/js/intlTelInput.js', array(), 
		_S_VERSION, true );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v5.js', array(), 
		_S_VERSION, true );
	}
	elseif( is_page_template( 'page-templates/template-contact-v6.php' ) ){
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css' );
		wp_enqueue_style( 'vc-flagst', get_stylesheet_directory_uri().'/css/form-county.css' );
		wp_enqueue_script( 'vc-flagsc', get_stylesheet_directory_uri(). '/js/intlTelInput.js', array(), 
		_S_VERSION, true );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v6.js', array(), 
		_S_VERSION, true );
	}
	elseif( is_page_template( 'page-templates/template-contact-v7.php' ) ){
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css' );
		wp_enqueue_style( 'vc-select2', get_stylesheet_directory_uri().'/css/nice-select2.css' );
		wp_enqueue_style( 'vc-flagst', get_stylesheet_directory_uri().'/css/form-county.css' );
		wp_enqueue_script( 'vc-flagsc', get_stylesheet_directory_uri(). '/js/intlTelInput.js', array(), 
		_S_VERSION, true );
		wp_enqueue_script( 'select-bx', get_stylesheet_directory_uri(). '/js/select-bx.js', array(), 
		_S_VERSION, true );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v7.js', array(), 
		time(), true );
	}	
	elseif( is_page_template( 'page-templates/template-contact-v8.php' ) ){
		//wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form.min.css' );		
		/*
		wp_enqueue_style( 'vc-flagst', get_stylesheet_directory_uri().'/css/form-county.css' );
		wp_enqueue_script( 'vc-flagsc', get_stylesheet_directory_uri(). '/js/intlTelInput.js', array(), 
		_S_VERSION, true );
		*/
		//wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/css/contact-form-2.0.min.css' );

		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/contact-min.css' );
		wp_enqueue_style( 'vc-nselect', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/nice-select2.css' );
		wp_enqueue_script( 'select-bx', get_stylesheet_directory_uri(). '/js/select-bx.js', array(), 
		_S_VERSION, true );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v8.js', array(), 
		time(), true );
	}
	elseif( is_page_template('page-templates/template-contact-v9.php') ){
		wp_enqueue_script( 'select-bx', get_stylesheet_directory_uri(). '/js/select-bx.js', array(), 
		_S_VERSION, true );
		wp_enqueue_script( 'vc-cfscript', get_stylesheet_directory_uri(). '/js/form-validation-v9.js', [], [], true );
		wp_enqueue_style( 'vc-contact', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/contact-usv9.css' );
		wp_enqueue_style( 'vc-nselect', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/nice-select2.css' );		
	}
	elseif( is_page_template('page-templates/tpl-feedback.php') ){
		wp_enqueue_style( 'vc-consult', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/consult-page.css' );
		wp_enqueue_style( 'vc-select2', get_stylesheet_directory_uri().'/css/nice-select2.css' );
		wp_enqueue_script( 'select-bx', get_stylesheet_directory_uri(). '/js/select-bx.js', array(), 
		_S_VERSION, true );

		wp_enqueue_script( 'vc-feedback', get_stylesheet_directory_uri(). '/js/form-feedback.js', [], [], true );
	}
	elseif(
		is_page_template([
		'page-templates/template-careers.php',
		'page-templates/template-aboutus.php',
		'page-templates/template-resource.php',
		'page-templates/template-testimonials.php'
		])
	){
		wp_enqueue_style( 'vc-company', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/company.min.css', [], _S_VERSION );		
	}
	elseif( is_page_template(['page-templates/tpl-inmedia.php']) ){
		wp_enqueue_style( 'vc-company', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/inmedia-min.css', [], _S_VERSION );		
	}
	elseif(
		is_page_template(['page-templates/template-partners.php','page-templates/template-faq.php'])
	){
		wp_enqueue_style( 'vc-partners', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/partner.min.css', [], _S_VERSION );		
	}
	elseif(
		is_page_template([
		'page-templates/template-thankyou.php',
		'page-templates/template-landing-thankyou.php',
		'page-templates/calendly-thankyou.php'
		]) 
	){
		wp_enqueue_style( 'vc-services', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/thankyou.min.css', [], _S_VERSION );
	}
	elseif( 
		is_page_template( 'page-templates/template-terms.php' ) ||
		is_page_template( 'page-templates/template-disclaimer.php' ) ||
		is_page_template( 'page-templates/template-policy.php' ) ||		
		is_page_template( 'page-templates/template-gdpr.php' )
	){
		wp_enqueue_style( 'vc-terms', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/policy-disclaimer.min.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/template-whyindia.php' ) ){
		wp_enqueue_style( 'vc-partners', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/why-india-min.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/tpl-resource-listing.php' ) ){
		wp_enqueue_style( 'vc-resources', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/resource.min.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/tpl-free-trial.php' ) ){
		wp_enqueue_style( 'vc-trial', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/trial-days.css', [], _S_VERSION );
	}
	elseif( is_page_template( 'page-templates/tpl-se-process.php' ) ){
		wp_enqueue_style( 'se-process', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/software-services.css', [], _S_VERSION );
	}
	elseif( is_single() ){
		wp_enqueue_style( 'vc-resource-detail', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/resource-detail.min.css', [], _S_VERSION );
	}
	elseif(is_page_template('page-templates/tpl-costcalculators.php') ){
	$json 		= get_post_meta(get_the_ID(), 'calc-json', true);
	$formJson 	= json_decode($json, true);	
	wp_enqueue_style('cost-calc', get_bloginfo('template_url').'/'.RES_VERSION.'/css/company.min.css', [], _S_VERSION);
	wp_enqueue_style('cost-style', get_bloginfo('template_url').'/cost-style.css', [], _S_VERSION);
	wp_enqueue_script('cost-calc', get_bloginfo('template_url'). '/js/cost-calculator.min.js', [], _S_VERSION, true );
	wp_localize_script('cost-calc', 'calcObj', 
		[
			'tpl_url' 		=> get_bloginfo( 'template_url' ),
			'web_url' 		=> get_bloginfo( 'url' ),
			'admin_ajax' 	=> admin_url( 'admin-ajax.php' ),
			'json_data' 	=> $formJson
		] 
	);
	}
	else{
		if( isset( $_SERVER['REQUEST_URI'] ) && ($_SERVER['REQUEST_URI'] == '/404.php') ){
		wp_enqueue_style( 'vc-index', get_stylesheet_directory_uri().'/'.RES_VERSION.'/css/index.css', [], _S_VERSION );
		}else{
		//wp_enqueue_style( 'vc-style', get_stylesheet_directory_uri().'/css/style.css' );
		// wp_enqueue_style( 'vc-style-tech', get_stylesheet_directory_uri().'/css/technologies.min.css', [], _S_VERSION);
		// wp_enqueue_style( 'vc-menu', get_stylesheet_directory_uri().'/css/menu.css', [], _S_VERSION );
		// wp_enqueue_style( 'ws-glider', get_stylesheet_directory_uri().'/css/glider.min.css', [], _S_VERSION );	
		}		
	}	
	if( is_page_template('page-templates/template-services.php') ){
		if( is_page('13435') ){
		wp_enqueue_script('vc-hire-frm', get_stylesheet_directory_uri(). '/js/hire-form-validation.js', array(), 
		_S_VERSION, true);
		}
	}
	
	wp_enqueue_script('cookie-consent', get_bloginfo('template_url').'/cookie-consent/silktide-consent-manager.js', array(), _S_VERSION, true );
	wp_enqueue_style('cookie-consent', get_bloginfo('template_url').'/cookie-consent/silktide-consent-manager.css', [], _S_VERSION);
	$inline_script = <<<JS
	(function(){
	silktideCookieBannerManager.updateCookieBannerConfig({
	  background:{showBackground: true},
	  cookieIcon:{position: "bottomLeft"},	 
	  text: {
	    banner: {
	      description: "<p>We use cookies on our site to enhance your user experience, provide personalized content, and analyze our traffic. <a href=\"https://www.valuecoders.com/privacy-policy\" target=\"_blank\">Cookie Policy.</a></p>",
	      acceptAllButtonText: "Accept all",
	      acceptAllButtonAccessibleLabel: "Accept all cookies",
	      rejectNonEssentialButtonText: "Reject non-essential",
	      rejectNonEssentialButtonAccessibleLabel: "Reject non-essential",
	      preferencesButtonText: "Preferences",
	      preferencesButtonAccessibleLabel: "Toggle preferences"
	    },
	    preferences: {
	      title: "Customize your cookie preferences",
	      description: "<p>We respect your right to privacy. You can choose not to allow some types of cookies. Your cookie preferences will apply across our website.</p>",
	      creditLinkText: "",
	      creditLinkAccessibleLabel: ""
	    }
	  },
	  position: {
	    banner: "bottomLeft"
	  }
	});
	silktideCookieBannerManager.initCookieBanner();
	});
	JS;
	wp_add_inline_script('cookie-consent', $inline_script);	
	
}

add_filter( 'style_loader_tag',  'vc_preload_filter', 10, 2 );
function vc_preload_filter( $html, $handle ){
	//if (strcmp($handle, 'vc-services') == 0){	
	$html = str_replace("rel='stylesheet'", "rel='preload stylesheet' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $html);
    //}
    return $html;
}

function debug_dd($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/*Optoins Page Optoins Here*/
if( function_exists('acf_add_options_page') ){ 
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts	',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Our Clients',
		'menu_title'	=> 'Our Clients',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Hiring Process',
		'menu_title'	=> 'Hiring Process',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Latest Posts',
		'menu_title'	=> 'Latest Posts',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Industries We Serve In',
		'menu_title'	=> 'Industries We Serve In',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Industries - V4.0',
		'menu_title'	=> 'Industries - V4.0',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Case Study',
		'menu_title'	=> 'Case Study',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Smart Teams - Manage All Technologies Listing',
		'menu_title'	=> 'Smart Teams',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Services - CMN Section',
		'menu_title'	=> 'SE - CMN Section',
		'parent_slug'	=> 'theme-general-settings',
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Common - Tech Stacks',
	// 	'menu_title'	=> 'Tech Stacks',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/stack-callback.php';
require get_template_directory() . '/inc/customizer.php';
if( defined( 'JETPACK__VERSION' ) ){
	require get_template_directory() . '/inc/jetpack.php';
}



function vcShowLatestPosts( $theme_mode = "", $tag_slug = "" ){
	if( empty($tag_slug) ) return;
	//$response = wp_remote_get( 'https://valuecoders.com/blog/wp-json/bposts/v1/posts' );
	//https://valuecoders.com/blog/wp-json/bposts/v1/cat-posts/indian-software-outsourcing-company
	$response = wp_remote_get( 'https://www.valuecoders.com/blog/wp-json/bposts/v1/cat-posts/'.preg_replace('/\s+/', '',$tag_slug).'?var='.time() );
	/*
	echo 'https://www.valuecoders.com/blog/wp-json/bposts/v1/cat-posts/'.$tag_slug;
	print_r( $response );
	die;
	*/
	if(
		is_array( $response ) && 
		!is_wp_error( $response )
	){
	    $loop	= json_decode($response['body']);
	    if( $loop ){ ?>
			<section class="latest-article-post-section padding-t-150 padding-b-150 <?php echo $theme_mode; ?>">
			<div class="container">
			<div class="head-txt text-center">
			<h2><?php the_field('section_title_latest_posts','option'); ?></h2>
			<p><?php the_field('section_description_latest_posts','option'); ?></p>
			</div>
			<div class="dis-flex margin-t-100">
			<?php 
			//debug_dd( $loop ); die;
			$pcount = 0;
			foreach( $loop as $row ) :
			$pcount++;	
			//$thumbnail = getimagesize( $row->thumbnail );
			//debug_dd( $thumbnail ); die;
			?>
			<div class="flex-3 col-box">
			<div class="img-box">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/images/blog-icon-1.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url') ?>/images/blog-icon-1.png">
					<img loading="lazy" src="<?php bloginfo('template_url') ?>/images/blog-icon-1.png" alt="Valuecoders" width="56" height="56"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?php bloginfo('template_url') ?>/images/blog-icon-light1.webp">
					<source type="image/png" srcset="<?php bloginfo('template_url') ?>/images/blog-icon-light1.png">
					<img loading="lazy" src="<?php bloginfo('template_url') ?>/images/blog-icon-light1.png" alt="Valuecoders" width="56" height="56"> 
				</picture>
			</div>				
			<?php 
			/*
			if( $row->thumbnail ){
				$thumbnail = getimagesize( $row->thumbnail );
				echo '<picture>
				<source type="'.$thumbnail['mime'].'" 
				srcset="'.$row->thumbnail.'">
				<source type="'.$thumbnail['mime'].'" 
				srcset="'.$row->thumbnail.'">
				<img loading="lazy" src="'.$row->thumbnail.'" alt="'.$row->title.'" width="'.$thumbnail[0].'" 
				height="'.$thumbnail[1].'">
				</picture>';
			}
			*/
			?>	
			<div class="content-box">
				<?php /* ?>
				<div class="blog-detail dis-flex items-center">
				<i class="profile-icon"></i>
				<?php echo $row->author; ?>
				<i class="calender-icon"></i>
				<?php echo $row->created_at; ?>
				</div>
				<a href="<?php echo $row->permalink; ?>" class="learn-more clr-white">Learn More <i class="round-arrow-icon"></i></a>
				<?php */ ?>
				<div class="blog-content">
					<h3><a href="<?php echo $row->permalink; ?>"><?php echo $row->title; ?></a></h3>
					<p><?php echo wp_trim_words($row->experpt, 20); ?></p>
				</div>
			</div>
			</div>
			<?php 
			if( $pcount === 3 ) break;
			endforeach; ?>
			</div>
			</div>
			</section>
	    <?php }
	}
}

//vcShowLatestPosts(); die;
function getPageCaseStudies( $page_id ){
$csOpts = get_field('csp_is_enabled', $page_id);
if( isset( $csOpts ) && ( $csOpts == "yes" ) ) :
$csp_bg 			= get_field('csp_sc_background', $page_id);	
$post_cs_content 	= get_field('case_study_content', $page_id);
$post_cs_cards 		= get_field('case_study_cards', $page_id);
$pageTpl 			= basename( get_page_template_slug($page_id) );
//$pbtm 			= ($pageTpl !== "template-services.php") ? " padding-b-150" : "";
$pbtm 				= "";
?>
<section class="full-width-two-column padding-t-150 padding-b-150 <?php echo $pbtm.' '.$csp_bg; ?>">
	<div class="container">
		<div class="head-txt text-center">
		   <?php echo $post_cs_content; ?>
		</div>
	</div>
	<?php 
	$count = 1;
	if( $post_cs_cards ) : ?>
	<div class="dis-flex margin-t-100">
	<?php 
	//while( have_rows('case_study_cards', 'option') ): the_row();
	foreach( $post_cs_cards as $card ) :
	$csLink = ltrim($card['link'], "/");
	$csLink = trailingslashit("https://www.valuecoders.com/".$csLink);
	?>
	   <?php if(($count == 1 || $count == 4  )): ?>
		<div class="flex-2 col-box">
			<div class="dis-flex">
				<?php //if( !wp_is_mobile() ){ ?>
				<div class="flex-2 od-row">					
				<div class="img-box img1 vlazy" <?php echo ' style="background-image:url('.$card['card_image'].')"'; ?>></div>
				</div>
				<?php //} ?>
				<div class="flex-2 bg-light-theme content-box">
					<h3><?php echo $card['card_title']; ?></h3>
					<p><?php 
					echo wp_trim_words( $card['card_description'], 20, '...' );
					//echo $card['card_description']; 
					?></p>
					<div class="dis-flex other-details">						
					<?php 
					/*
					if( isset( $card['country'] ) && !empty( $card['country'] ) ) : ?>
					<div class="flex-2 clr-white">Country</div>
					<div class="flex-2"><?php echo $card['country']; ?></div>
					<?php endif; 
					*/
					?>
					<?php if( isset( $card['core_tech'] ) && !empty( $card['core_tech'] ) ) : ?>
					<div class="flex-2 clr-white">Core tech</div>
					<div class="flex-2"><?php echo $card['core_tech']; ?></div>
					<?php endif; ?>
					</div>
					<?php if( $card['link'] ) : ?>
					<a href="<?php echo $csLink; ?>" title="<?php echo $card['card_title']; ?>" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="flex-2 col-box">
			<div class="img-box img2 vlazy" 
			<?php 
			if( !wp_is_mobile() ){
				echo ' style="background-image:url('.$card['card_image'].')"';
			}  
			?>
			>
				<div class="content-box">
			  		<h3><?php echo $card['card_title']; ?></h3>
					<p><?php echo $card['card_description']; ?></p>
					<div class="dis-flex other-details">						
						<!--
						<div class="flex-2 clr-white">Country</div>
						<div class="flex-2"><?php //echo $card['country']; ?></div>
						-->
						<div class="flex-2 clr-white">Core tech</div>
						<div class="flex-2"><?php echo $card['core_tech']; ?></div>
					</div>
					<?php  if( $card['link'] ) : ?>
					<a href="<?php echo $csLink; ?>" title="<?php echo $card['card_title']; ?>" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
					<?php endif; ?>
				</div>
			</div>

		</div>
		<?php 
		endif;
		$count++;
		endforeach;  ?>
	</div>
	<?php endif; ?>
	<?php /* ?><div class="text-center margin-t-100"><?php vc_cta(); ?></div><?php */ ?>
</section>
<?php endif; ?>
<?php 
}



function getPageCaseStudiesV3( $page_id ){
$csOpts = get_field('csp_is_enabled', $page_id);
if( isset( $csOpts ) && ( $csOpts == "yes" ) ) :
$csp_bg 			= get_field('csp_sc_background', $page_id);	
$post_cs_content 	= get_field('case_study_content', $page_id);
$post_cs_cards 		= get_field('case_study_cards', $page_id);

/*echo '<pre>'; print_r( $post_cs_cards ); echo '</pre>'; die;*/

$pageTpl 			= basename( get_page_template_slug($page_id) );
$pbtm 				= "";

$loop 	= [
(object) array(
'thumbnail' => 'https://www.valuecoders.com/blog/wp-content/uploads/2022/05/android-app-with-kotlin.jpg.webp',
'title' => 'Guide to Android App Development: Tips, Tricks, and Strategies for Building Successful Apps',
'permalink' => 'https://www.valuecoders.com/blog/technology-and-apps/guide-to-android-app-development-tips-tricks-and-strategies-for-building-successful-apps/',
'experpt' => 'Android app development is booming, and it doesn’t seem to be slowing down anytime soon. With an estimated 133 million'
),
(object) array(
'thumbnail' => 'https://www.valuecoders.com/blog/wp-content/uploads/2017/02/future-of-mobile-application-development.png.webp',
'title' => 'An Overlook to the Future of Mobile Application Development',
'permalink' => 'https://www.valuecoders.com/blog/technology-and-apps/future-of-mobile-application-development/',
'experpt' => 'Are you a startup, an Entrepreneur, or an enterprise?  Or a mobile app developer who wants to know about the'
)
];

$blogSec 			= get_field('bposts', $page_id);
$tagSlug 			= ( $blogSec && isset($blogSec['tag-pslug']) && !empty($blogSec['tag-pslug']) ) ? $blogSec['tag-pslug'] : false;

if( $tagSlug !== false ){
$reapUrl = 'https://www.valuecoders.com/blog/wp-json/bposts/v1/cat-posts/'.preg_replace('/\s+/', '',$tagSlug).'?var='.time();

//echo '<h5>'.$reapUrl.'</h5><br>';
$response = wp_remote_get( $reapUrl );
if(is_array( $response ) && !is_wp_error( $response )){
	$data 	= json_decode($response['body']);
	if( is_array( $data ) && (count( $data ) > 1) ){
		$loop	= json_decode($response['body']);	
	}
}	
}
?>
<section class="full-width-two-column padding-b-150">
<?php 
$count = 1;
if( $post_cs_cards ) : ?>	
  	<div class="dis-flex">
  	<?php 
	foreach( $post_cs_cards as $card ) :
	$csLink = ltrim($card['link'], "/");
	$csLink = trailingslashit( "https://www.valuecoders.com/".$csLink );
	?>
	<?php if(($count == 1 || $count == 4  )): 
	$indx = ( $count === 1 ) ? 0 : 1;	
	?>
    <div class="flex-2 col-box">
      <div class="dis-flex">
        <div class="flex-2 od-row">
          <div class="img-box img1 vlazy" <?php echo ' style="background-image:url('.$loop[$indx]->thumbnail.')"'; ?>>
          </div>
        </div>
        <div class="flex-2 bg-light-theme content-box">
		<a href="https://www.valuecoders.com/blog/" class="caseStudy">Blog</a>
		<h3><?php echo $loop[$indx]->title; ?></h3>
		<p><?php echo wp_trim_words( $loop[$indx]->experpt, 20, '...' ); ?></p>		
		<a href="<?php echo $loop[$indx]->permalink; ?>" title="<?php echo $loop[$indx]->title; ?>" 
		class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
        </div>
      </div>
    </div>
    <?php else: ?>
    <div class="flex-2 col-box">
      <div class="img-box img2 vlazy"<?php 
		if(!wp_is_mobile()){
			echo ' style="background-image:url('.$card['card_image'].')"';
		}  
		?>>
		<div class="content-box">
		<a href="https://www.valuecoders.com/case-studies/" class="caseStudy">Case Study</a>
		<h3><?php echo $card['card_title']; ?></h3>
		<p><?php echo $card['card_description']; ?></p>
		<?php if( isset( $card['core_tech'] ) && !empty( $card['core_tech'] ) ) : ?>
		<div class="dis-flex other-details">
		<div class="flex-2 clr-white">Core tech</div>
		<div class="flex-2"><?php echo $card['core_tech']; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $card['link'] ) : ?>
		<a href="<?php echo $csLink; ?>" title="<?php echo $card['card_title']; ?>" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
		<?php endif; ?>
		</div>
      </div>
    </div>
    <?php 
	endif;
	$count++;
	endforeach;  
	?>

	<?php 
	/*echo '<pre>';
	print_r( $loop );*/

	if( count( $loop ) > 3 ) :
	?>
	<div class="flex-2 col-box post-idx-3">
	  <div class="dis-flex">
	    <div class="flex-2 od-row">
	      <div class="img-box img1 vlazy" <?php echo ' style="background-image:url('.$loop[2]->thumbnail.')"'; ?>>
	      </div>
	    </div>
	    <div class="flex-2 bg-light-theme content-box">
		<a href="https://www.valuecoders.com/blog/" class="caseStudy">Blog</a>
		<h3><?php echo $loop[2]->title; ?></h3>
		<p><?php echo wp_trim_words( $loop[2]->experpt, 20, '...' ); ?></p>		
		<a href="<?php echo $loop[2]->permalink; ?>" title="<?php echo $loop[2]->title; ?>" 
		class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
	    </div>
	  </div>
	</div>

	<div class="flex-2 col-box post-idx-4">
		<div class="img-box img2 vlazy"<?php 
		if( !wp_is_mobile() ){
			echo ' style="background-image:url('.$loop[3]->thumbnail.')"';
		}
		?>>
		<div class="content-box">
		<a href="https://www.valuecoders.com/blog/" class="caseStudy">Blog</a>
		<h3><?php echo $loop[3]->title; ?></h3>
		<p><?php echo wp_trim_words( $loop[3]->experpt, 20, '...' ); ?></p>
		<a href="<?php echo $loop[3]->permalink; ?>" title="<?php echo $loop[3]->title; ?>" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
		</div>
		</div>
	</div>
	<?php endif; ?>
	</div>
  	<?php endif; ?>  
</section>
<?php 
endif;
}

//remove_filter('the_content', 'wpautop');
//add_filter('the_content', 'wpautop', 12);
add_shortcode( 'vc_column', 'cvColumn_shortcode' );
function cvColumn_shortcode( $atts, $content = null ) {
	$toFix = array(
		'<p>['    => '[', 
		']</p>'   => ']', 
		']<br />' => ']'
    );
	return '<div class="flex-2">'.strtr( $content, $toFix ).'</div>';
}

add_shortcode( 'cmn_cta', 'cmn_cta_cb' );
function cmn_cta_cb() {
	return '<div class="btn-container"><a href="'.site_url('/contact').'" class="cta-button">CONTACT US</a></div>';
}

add_shortcode( 'cmn_indcta', 'cmn_cta_ind' );
function cmn_cta_ind() {
	return '<div class="btn-container"><a href="'.site_url('/contact').'" class="cta-button">REQUEST A FREE COUNSLTATION</a></div>';
}

add_shortcode( 'vc_column_three', 'colum_three_scode_cb' );
function colum_three_scode_cb( $atts, $content = null ){
	$toFix = array(
		'</p>' 		=> '',
		'<p>' 		=> '',
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
    );
	return '<div class="flex-3 box-3"><div class="box">'.strtr($content, $toFix).'</div></div>';
}

add_shortcode( 'vc_flex_2', 'colFlexTwo_cb' );
function colFlexTwo_cb( $atts, $content = null ){
	$toFix = array(
		'<p></p>'    => '',
		'<p>['    => '[',
        ']</p>'   => ']', 
        ']<br />' => ']'
    );
	$html = '<div class="flex-2 box-2"><div class="box">'.$content.'</div></div>';

	$html = str_replace( '<div class="flex-2 box-2"><div class="box"></p>', '<div class="flex-2 box-2"><div class="box">', $html );

	return str_replace( '<p></div></div>', '</div></div>', $html );
}



add_shortcode( 'vc_bannercta', 'guidetopic_sc_cb' );
function guidetopic_sc_cb( $atts ) {
    $atts = shortcode_atts( array(
    'title'     => 'Empower your business with machine learning', 
    'body'      => 'Reach out to us and seize the opportunity.',
    'cta_text'  => 'CONTACT US',
    'cta_link'  => 'https://www.valuecoders.com/contact',
    ), $atts, 'bartag' );
    $div = '<div class="custom-banner">
    <div class="dis-flex">
    <div class="colleft">
    <div class="pb-heading">'.$atts['title'].'</div>
    <p>'.$atts['body'].'</p>
    </div>
    <div class="colrit">
    <div class="text-center btn-container">
    <a href="'.$atts['cta_link'].'" class="banner-btn" data-wpel-link="external" target="_self">'.$atts['cta_text'].'<i class="cusarrow-icon"></i></a>
    </div>
    </div>
    </div>
    </div>';
    return $div;
}
/*
[vc_bannercta title="Empower your business with machine learning" body="Reach out to us and seize the opportunity." cta_text="CONTACT US"]
*/

add_shortcode( 'rp_bannercta', 'resource_post_str_cb' );
function resource_post_str_cb( $atts ) {
	$toFix = array(
		'<p></p>'    => '',
		'<p>['    => '[',
        ']</p>'   => ']', 
        ']<br />' => ']'
    );

    $atts = shortcode_atts( array(
    'title'     => 'Revolutionize your financial services', 
    'body'      => 'Embrace the future with our Fintech solutions',
    'cta_text'  => 'CONTACT US',
    'cta_link'  => 'https://www.valuecoders.com/contact',
    ), $atts, 'bartag' );

    $div = '<div class="cust-secton1">
	<div class="dis-flex justify-sb items-center">
	<div class="colleft">
	<div class="pb-heading">'.$atts['title'].'</div>
	<p>'.$atts['body'].'</p>
	</div>
	<div class="colrit">
	<a href="'.$atts['cta_link'].'" class="banner-btn" data-wpel-link="external" target="_self">'.$atts['cta_text'].'<i class="cusarrow-icon"></i></a>
	</div>
	</div>
	</div>';

	$html = str_replace( '<p></p>', '', $div );
    return strtr($html, $toFix);
}

/*
[rp_bannercta title="Revolutionize your financial services" body="Embrace the future with our Fintech solutions" cta_text="CONTACT US"]
*/

//add_action('init', 'getVcBlogCategory');
function getVcBlogCategory(){
	$response = wp_remote_get( 'http://valuecoders.com/blog/wp-json/wp/v2/categories' );
	if ( is_array( $response ) && ! is_wp_error( $response ) ) {
		$catData = [];
	    $loop    = json_decode( $response['body'] );
	    foreach( $loop as $row ){
			$catData[] = array( 'id' => $row->id, 'cat' => $row->name );
	    }
	    echo '<pre>';
	    print_r($catData); 
	    die;
	}    
}


add_filter( 'body_class', function( $classes ){
	global $post;   
	$pageCategory = get_post_meta( $post->ID, 'vc-mcategory', true);
	if( $pageCategory ){
		$classes[] 	= "velm-".$pageCategory;
	}
	// if( isset( $_GET['theme'] ) &&  ($_GET['theme'] == "light") ){
	// 	$classes[] 	= "day";
	// }	
	return $classes;
});


function hasGetElm( $array, $parm ){
	return ( isset($array[$parm]) && !empty($array[$parm]) ) ? $array[$parm] : false;
}

// add_action('init', function(){
// 	if (!is_admin()) {
// 	    $utm_parameters = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];        
// 	    foreach ($utm_parameters as $param) {
// 	        if(isset($_GET[$param])) {
// 	        setcookie($param, sanitize_text_field($_GET[$param]), time() + (86400 * 30), "/", "", true, true);
// 	        }
// 	    }
// 	}    
// });

add_action( 'wp_head', function(){
	global $post;
	if ( is_page() ) {
		$keyMeta = get_post_meta( $post->ID, 'page-mkeywords', true );
		if( $keyMeta ){
			echo '<meta name="keywords" content="'.$keyMeta.'"/>';
		} 
	}	
}, 2 );

function vcGetUserIP(){
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR']       = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP']    = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    return $ip;
}

function vc_calendly_link( $page_id ){
	$formLink   = "https://calendly.com/valuecoders?utm_source=";
	$pageURL 	= get_permalink( $page_id );
	return $formLink.$pageURL.'!!'.vcGetUserIP();
}

function vc_siteurl( $url ){
	if( $url == "#" ) return $url;

	if (filter_var($url, FILTER_VALIDATE_URL) === true) {
    	return $url;
	}else{
		return site_url( $url );
	}
}


function vc_cta( $btn_class = "green-btn" ){
	if( $btn_class !== "green-btn" ){
		echo '<a class="'.$btn_class.'" href="'.site_url('/contact').'">CONTACT US <i class="arrow-icon green"></i></a>';
	}else{
		echo '<a class="'.$btn_class.'" href="'.site_url('/contact').'">CONTACT US <i class="arrow-icon"></i></a>';
	}
}

add_filter( 'wpseo_title', function( $title ){
	return $title." | ValueCoders&trade;";
});

function vcparseanchor( $str ){
	return strip_tags($str);
	/*
	return preg_replace("/<\/?a( [^>]*)?>/i", "", $str);
	*/
}

add_action('after_setup_theme', function(){
	show_admin_bar(false);	
});

function cmnTechStacks( $content = '' ){ 
	$tecSecEnabled 	= get_field('tec_is_enabled', 265);
	$tecSecBg 		= get_field('tec_sc_background', 265);
	if( $tecSecEnabled == "yes" ) : 
	?>
	<section class="tech-stack-section <?php echo $tecSecBg; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="head-txt text-center">
		<?php 
		if( $content ){
			echo $content;
		}else{
			the_field('section_tech_stacks_head', 265); 	
		}		
		?>
		</div>
		<?php 
		//$get
		if (have_rows('tech_stacks_cards', 265)): ?>
		<div class="dis-flex col-box-outer for-tech-stack-icon">
		<?php
    $icon = 0;
    while (have_rows('tech_stacks_cards', 265)): the_row(); ?>
			<div class="flex-2 col-box <?php echo "icon-row-".($icon *3); ?>">
				<div class="logo-box bg-dark-theme for-box-effect">
					<h3><?php the_sub_field('card_title'); ?></h3>
					<div class="dis-flex justify-sb item-end">
						<div class="tech-stack-link">
						<?php if (have_rows('tech_icon')): ?>
						<div class="dis-flex">
						<?php
            $g = 1;
            while (have_rows('tech_icon', 265)):
                the_row(); ?>						
						<a href="<?php echo vc_siteurl( get_sub_field('tech_icon_link') ); ?>" class="icon-box">
						<?php 
						$tecIcon 	= get_sub_field('icon');
						$tecIconwp 	= get_sub_field('icon-webp');
						if( $tecIcon && $tecIconwp ){
						echo '<picture class="dark-theme-img">
						<source type="image/webp" srcset="'.$tecIconwp['url'].'">
						<source type="'.$tecIcon['mime_type'].'" srcset="'.$tecIcon['url'].'">
						<img loading="lazy" src="'.$tecIcon['url'].'" alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
						width="'.$tecIcon['width'].'" height="'.$tecIcon['height'].'"> 
						</picture>';
						}

						$tecIconLt 		= get_sub_field('icon-lt');
						$tecIconLtwp 	= get_sub_field('icon-ltwp');
						if( $tecIconLt && $tecIconLtwp ){
						echo '<picture class="lighter-theme-img">
						<source type="image/webp" srcset="'.$tecIconLtwp['url'].'">
						<source type="'.$tecIconLt['mime_type'].'" srcset="'.$tecIconLt['url'].'">
						<img loading="lazy" src="'.$tecIconLt['url'].'" alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
						width="'.$tecIconLt['width'].'" height="'.$tecIconLt['height'].'"> 
						</picture>';
						}

						$techIcon 		= get_sub_field('icon-hover');
						$techIconwp 	= get_sub_field('icon-hoverwp');
						if( $techIcon && $techIconwp ){
						echo '<picture class="hover">
						<source type="image/webp" srcset="'.$techIconwp['url'].'">
						<source type="'.$techIcon['mime_type'].'" srcset="'.$techIcon['url'].'">
						<img src="'.$techIcon['url'].'" alt="'.vcparseanchor(get_sub_field('tech_text_list')).'" 
						width="'.$techIcon['width'].'" height="'.$techIcon['height'].'"> 
						</picture>';
						}

						?>
						<span class="text"><?php the_sub_field('tech_text_list'); ?></span>
						</a>
						<?php $g++; endwhile; ?>
						</div>
						<?php endif; ?>
						</div>
						<div class="learn-more-btn text-right">
						<?php 
						$cardslink = get_sub_field('card_link'); 
						if( $cardslink ){
							echo '<a href="'.vc_siteurl($cardslink).'" class="learn-more">Learn More<i class="round-arrow-icon"></i></a>';
						}
						?>						
						
						</div>
					</div>
				
				</div>
	
			</div>
			<?php 
			$icon ++;
    		endwhile; ?>
		</div>
		<div class="text-center margin-t-100">
		<?php vc_cta(); ?>
		</div>
		<?php endif; ?>
</section>
<?php 
endif;
} 

function cmnTecStackUpdated( $content = "" ){
?>
<section id="glob-techstacks" class="tech-stack-updated-section padding-t-150 padding-b-150 for-tech-icons">
	<div id="glob-tech-stack-bx" class="container">
	<div class="head-txt text-center">
		<?php echo $content; ?>
	</div>
	</div>
</section>
<?php 
}

function cmnTecStack_V3( $content = "" ){
?>
<section class="tech-stacks padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $content; ?></div>
    <div class="dis-flex col-box-outer margin-t-50">
    <?php 
    $debug_row = get_field( 'tech_stacks_cards', 265 );
    //print_r( $debug_row ); die;
    if( $debug_row ){
    	foreach( $debug_row as $trow ){
			echo '<div class="flex-3 col-box"><div class="inner-box">';
			echo '<h3><a href="'.vc_siteurl( $trow['card_link'] ).'">'.$trow['card_title'].'</a></h3>';
			if( $trow['tech_icon'] ){
				echo '<ul>';
				foreach( $trow['tech_icon'] as $row ){
					if( $row['tech_icon_link'] ){
						echo '<li><a href="'.vc_siteurl($row['tech_icon_link']).'">'.$row['tech_text_list'].'</a></li>';
					}else{
						echo '<li>'.$row['tech_text_list'].'</li>';	
					}
					
				}
				echo '</ul>';
			}
			echo '</div></div>';
    	}
    }
    ?>          
    </div>
  </div>
</section>
<?php 
}

function hireModelCmn( $theme = '' ){
?>
<section class="hiring-models padding-t-120 padding-b-120 bg-light <?php echo $theme; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<h2>Choose From Our Hiring Models</h2>
			<p>With us, you can choose from multiple hiring models that best suit your needs</p>
		</div>
		<div class="dis-flex col-box-outer asp-net-usage-sprite">
			<div class="flex-3 box-3">
				<div class="box bg-blue-opacity-light">
					<picture class="dark-theme-img">
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-1.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-1.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-1.png" alt="Valuecoders" width="64" height="61"> 
					</picture>
					<picture class="lighter-theme-img">
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-1.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-1.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-1.png" alt="Valuecoders" width="64" height="61">
					</picture>
					<h3>Dedicated Team</h3>
					<span class="model-txt clr-white">(also known as product engineering teams)</span>
					<div class="content-box">
					<p>It is an expert autonomous team comprising of different roles (e.g. project manager, software engineers, QA engineers, and other roles) capable of delivering technology solutions rapidly and efficiently. The roles are defined for each specific project and management is conducted jointly by a Scrum Master and the client's product owner.</p>
					<ul>
						<li>Agile processes</li>
						<li>Transparent pricing</li>
						<li>Monthly billing</li>
						<li>Maximum flexibility</li>
						<li>Suitable for startups, MVPs and software/product companies</li>
					</ul>
					</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box bg-blue-opacity-light">
					<picture class="dark-theme-img">
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-2.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-2.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-2.png" alt="Valuecoders" width="64" height="61"> 
					</picture>
					<picture class="lighter-theme-img">
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-2.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-2.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-2.png" alt="Valuecoders" width="64" height="61">
					</picture>
					<h3>Team Augmentation</h3>
					<span class="model-txt clr-white">(also known as team extension or staff augmentation)</span>
					<div class="content-box">
						<p>Suitable for every scale of business and project, team augmentation helps add required talent to you team to fill the talent gap. The augmented team members work as part of your local or distributed team, attending your regular daily meetings and reporting directly to your managers. This helps businesses scale immediately and on-demand.</p>
						<ul>
							<li>Scale on-demand</li>
							<li>Quick & cost-effective</li>
							<li>Monthly billing</li>
							<li>Avoid hiring hassles</li>
							<li>Transparent pricing</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="flex-3 box-3">
				<div class="box bg-blue-opacity-light">
					<picture class="dark-theme-img">
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-3.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-3.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/tech/dot-net-modal-icon-3.png" alt="Valuecoders" width="64" height="61"> 
					</picture>
					<picture class="lighter-theme-img">
						<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-3.webp">
						<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-3.png">
						<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/tech/light-dot-net-modal-icon-3.png" alt="Valuecoders" width="64" height="61">
					</picture>
					<h3>Project Based</h3>
					<span class="model-txt clr-white">(best suited for small-mid scale projects)</span>
					<div class="content-box">
						<span class="content-head clr-white">Fixed Price Model:</span>
						<p>When project specifications, scope, deliverables and acceptance criteria are clearly defined, we can evaluate and offer a fixed quote for the project. This is mostly suitable for small-mid scale projects with well documented specifications.</p>
						<span class="content-head clr-white">Time & Material Model:</span>
						<p>Suitable for projects that have undefined or dynamic scope requirements or complicated business requirements due to which the cost estimation is not possible. Therefore, developers can be hired per their time.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
}

function tempIconDir( $url ){
	return $url;
}

add_action( 'wp_head', function(){
	if( isset($_SERVER['SCRIPT_FILENAME']) && (strpos($_SERVER['SCRIPT_FILENAME'], "404.php") !== false ) ){
	echo '<meta property="og:title" content="404 Error / Page Not Found / ValueCoders" />';
	echo '<meta property="og:description" content="The page that you tried to access was not found - you would be re-directed to the home page shortly." />';
	}
});

add_filter( 'wpseo_robots', function( $string ){
	//$string = "";
    if( isset($_SERVER['SCRIPT_FILENAME']) &&  ( strpos($_SERVER['SCRIPT_FILENAME'], "404.php") !== false ) ){
		$string = "noindex, nofollow";	
    }elseif( is_category() || is_archive() || is_page(10027) ){
    	$string = 'noindex, nofollow';
    }
    return $string;
}, 999 );

function vcTrustedStartups( $pageID = false ){
	$bgOpt = '';
	if( $pageID !== false ){
	$bgfld = get_field( 'trusted-bg' );
	$bgOpt = (!empty($bgfld) && ($bgfld == "dark")) ? " bg-dark-theme" : "";
	}
	echo '<div id="has-tpa" class="client-logo-box-section dis-flex items-center justify-sb'.$bgOpt.'">
	<div class="container">
		<div class="dis-flex">
			<div class="logo-heading"><h4>Trusted by startups<br> and Fortune 500 companies</h4></div>
			<div class="logo-box-outer dis-flex vlazy"></div>
		</div>
	</div>
	</div>';
}

function vcHasHTML($string){
return $string != strip_tags($string) ? true:false;
}

function vcGetPtag(array $marray, array $wparray, $title = "", $class = "" ){
	$image = '<picture class="'.$class.'">';
	if( $wparray ){
	$image .= '<source type="image/webp" srcset="'.$wparray['url'].'">';	
	}
	$image .= '<source type="'.$marray['mime_type'].'" srcset="'.$marray['url'].'">
	<img loading="lazy" src="'.$marray['url'].'" alt="'.$title.'" width="'.$marray['width'].'" height="'.$marray['height'].'">
	</picture>';
	return $image;
}

function vcHasAnchor( $str1, $str2 = '' ){	
	if( stripos($str1,"<a") !== false ){
		return " has-vlink";
	}elseif( !empty($str2) && ( stripos($str2,"<a") !== false ) ){
		return " has-vlink";
	}else{
		return false;
	}
}


add_action('init', function(){
	if( isset( $_GET['do_action'] ) && ( $_GET['do_action'] == "nb-query" ) ){
		$pages = get_pages();
		echo '<h3>All Pages Links :'.count($pages).'</h3>';
		foreach( $pages as $page ){
			echo '<a href="'.get_page_link( $page->ID ).'">'.get_page_link( $page->ID ).'</a><br>';
		}
		echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
		global $wpdb;
		$results = $wpdb->get_results( "SELECT post_id FROM `wp_postmeta` WHERE `meta_key` LIKE '_wp_page_template' AND `meta_value` = 'page-templates/template-services.php' ", ARRAY_A );
		$post_ID = [];
		echo '<h3>Services / Solutions Pages Links :'.count($results).'</h3>';
		foreach( $results as $row ){
			if( get_post_status( $row['post_id'] ) === "publish" ){
				echo '<a href="'.get_page_link( $page->ID ).'">'.get_permalink( $row['post_id'] ).'</a><br>';	
			}
		}	
		die;
	}
});

function getVcWebpURL( $mid ){
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

function getVcWebpSrcURL( array $marray ){
	if( !is_array( $marray ) ) return;

	$mid 		= $marray['ID'];
	$webpDir 	= WP_CONTENT_DIR.'/uploads-webpc/uploads/';
	$webpUrl 	= content_url().'/uploads-webpc/uploads/';
	$icMeta 	= get_post_meta( $mid, '_wp_attached_file', true );
	$icWebp 	= $marray['url'];
	if( $icMeta ){
		$icwebpDir 	= $webpDir.$icMeta.".webp";
		if( file_exists( $icwebpDir ) ){
			$icWebp 	= $webpUrl.$icMeta.".webp";
		}	
	}
	return $icWebp;
}

function vc_pictureElm($marray, $title = "", $class = '' ){
	if( !is_array( $marray ) ) return;

	return '<picture class="'.$class.'">
	'.getVcWebpURL($marray['ID']).'
	<source type="'.$marray['mime_type'].'" srcset="'.$marray['url'].'">
	<img loading="lazy" src="'.$marray['url'].'" alt="'.$marray['title'].'" width="'.$marray['width'].'" 
	height="'.$marray['height'].'">
	</picture>';
}

function fnextractHeadins($headingtag, $html){
	$headingText = '';
	preg_match_all( '|<'.$headingtag.'>(.*)</'.$headingtag.'>|iU', $html, $headings );
	foreach($headings[0] as $headh2val)
	{
		$headingText.=$headh2val;
	}
	return $headingText;
}

function getStrHrefValue( $string ){
	preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $string, $result);
	return (!empty($result) && isset($result['href'][0]) ) ? $result['href'][0] : false;
}


function cmnTestimonials_v3( $page_id ){
$ctOptions 				= get_field('client-testimo', $page_id );
if( $ctOptions['is_enabled'] == 'yes' ) :
$testimonailsContent 	= get_field( 'testimonial-content', 'option' );
$testimonailsList 		= get_field( 'testimonials', 'option' );

$inTestimonials = [
	"null",
	"Working with ValueCoders has been a rewarding experience. Their software solutions are a perfect blend of innovation and functionality.",
	"ValueCoders provided us with a robust and scalable software solution. Their team's proficiency is commendable.",
	"ValueCoders delivered a software solution that perfectly aligns with our business needs. They've been instrumental in our project's success.",
	"ValueCoders' commitment to delivering high-quality software solutions has made them our go-to partner for all our software needs.",
	"Working with ValueCoders has been a rewarding experience. Their team's expertise is impressive.",
	"ValueCoders' innovative approach to software engineering has significantly improved our business operations."
]
?>
<section class="client-video-section padding-t-120 padding-b-120 <?php echo $ctOptions['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center"><?php echo $testimonailsContent; ?></div>
		<?php 
		if( $testimonailsList ) : 
		?>
		<div class="glider-contain client-testimonial-slider">
			<div class="glider">
				<?php 
				$y = 0;
				foreach( $testimonailsList as $row ) : 
				$y++;
				?>
				<div class="client-videos shadow-box" id="cvbox-<?php echo $y; ?>">
					<div class="client-video-box">
						<iframe class="yt-player" id="ytiframe-<?php echo $y; ?>" style="display:none;"></iframe>
						<a class="frame-mask" href="javascript:void(0);" 
						onclick="playTetiVideo(<?php echo $y; ?>, '<?php echo $row['yt-video']; ?>', this)">
						<picture>
						<source type="image/png" srcset="<?php echo $row['client_thumbnail']; ?>">
						<img loading="lazy" src="<?php echo $row['client_thumbnail']; ?>" alt="Valuecoders" 
						width="351" height="175">
						</picture>
						</a>
					</div>
					<div class="client-description bg-white">
						<?php 
						/*
						if( $row['client-fd'] ){
							echo '<p>'.$row['client-fd'].'</p>';
						}else{
							echo '<p>"We have worked with ValueCoders for more than a year, and their skilled team has allowed us to scale up during certain projects."</p>';
						}
						*/
						echo '<p>'.$inTestimonials[$y].'</p>';
						?>						
						<i class="star-rating"></i>
						<h3><?php echo $row['client-name']; ?></h3>
                		<span class="detail"><?php echo $row['Comment']; ?></span>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<button aria-label="Previous" class="glider-prev vlazy"></button>
			<button aria-label="Next" class="glider-next vlazy"></button>
			<div role="tablist" class="dots"></div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php 
endif;
}

function cmnCTA_v3( $cta_text, $is_center = true ){
	$isCenter = ( $is_center === true ) ? " justify-center" : "";
	echo '<div class="btn-sec margin-t-50 '.$isCenter.'">
	<a href="'.site_url('/contact').'" class="btn rounded">
	<span class="text-white">CONTACT US</span>
	</a>
	</div>';
}

function get_cmnCTA_v3( $cta_text, $is_center = true ){
	$isCenter = ( $is_center === true ) ? " justify-center" : "";
	return '<div class="btn-sec margin-t-50 '.$isCenter.'">
	<a href="'.site_url('/contact').'" class="btn rounded">
	<span class="text-white">'.$cta_text.'</span>
	</a>
	</div>';
}

function hireCmn_cta(){
	return '<div class="button-section margin-t-50 ustify-center">
	<div class="btn-div">
	<div class="btn-sec">
	  <a href="'.site_url('/contact/?cta=free-trial').'" class="btn rounded">
	  <span class="text-white">CONTACT US</span>
	  </a>
	</div>
	<!--
	<div class="info-wrap">
	  Learn How Trial Works
	  <div class="info">
	    <div class="info-content">
	      <h4>What happens after you CONTACT US? </h4>
	      <p>Our solution experts will answer your questions in a secure online meeting.</p>
	      <a class="kmore" href="'.site_url('/hire-developers/7-day-trial').'">Know More</a>
	    </div>
	  </div>
	</div>
	-->
	</div>	
	<span class="devide">OR</span>
	<div class="free-con">
	<a href="javascript:void(0);" onclick="consultCTA_cb();" target="_self">Book A Call</a>
	</div>	
	</div>';
}


function getCmnIndustries( $bg, $content ){ ?>
<section class="img-column-section <?php echo $bg; ?> padding-t-120 padding-b-120">
<div class="container">
	<div class="head-txt text-center"><?php echo $content; ?></div>
	<div class="dis-flex margin-t-80">
	<?php 
	$industries = get_field('industry_cards', 'option');
	if( $industries ){
		foreach ($industries as $row ) : 
		$ind_thumbnail = getVcWebpSrcURL( $row['card_image'] );
		$cardlink = $row['card_link'];
		?>
		<div class="flex-3 col-box">
			<div class="img-box img1 vlazy" style="background-image:url(<?php echo $ind_thumbnail; ?>);">
				<h3><a href="<?php echo vc_siteurl( $cardlink ); ?>"><?php echo $row['card_title']; ?></a></h3>
				<p><?php echo $row['card_excerpt']; ?></p>
				<?php 				
				if( $cardlink ): 
				?>
				<a href="<?php echo vc_siteurl( $cardlink ); ?>" class="learn-more clr-white">Learn More<i class="round-arrow-icon"></i></a>
				<?php endif; ?>
			</div>
		</div>	
		<?php 
		endforeach;
	}
	?>
	</div>
</div>
</section>
<?php   
}

function getCmnIndustriesv4(){
	echo '<section class="industry-section">
	<div class="container">
	<div class="ind-title">Industries</div>
	</div>
	<div class="changingTileWrap">        
	<div class="tileFloat industry-slider glider-contain">
	<div class="glider" id="htpl-glider">';
	$defbanner = get_bloginfo('template_url').'/v4.0/images/homeindus-01.png';
	$vcIndus = get_field('vc-indv4', 'option');
	if( $vcIndus ){
	$indx = 0;	
	foreach( $vcIndus as $row ){ $indx++;
	if( $indx === 1 ){
	$defbanner = $row['image']['url'];
	}
	$ind_thumbnail = getVcWebpSrcURL( $row['image'] );	
	echo '<div class="tile-box ind-box" id="tile-'.$indx.'" data-img-hover="'.$ind_thumbnail.'">
	  <div class="tile-box-in">
	    <div class="tileHeadMain">'.$row['title'].'</div>
	    <div class="floatingTileInfo">
	      <div class="tileHead">'.$row['title'].'</div>
	      <p>'.$row['description'].'</p>
	      <div class="cta-box"><a class="stretched-link" href="'.vc_siteurl($row['link']).'">Learn more</a></div>
	    </div>
	  </div>
	</div>';	
		}
	}

	echo '</div>
	<button aria-label="Previous" class="glider-prev">«</button>
	<button aria-label="Next" class="glider-next">»</button>
	</div>
	<img loading="lazy" class="bannerIMG" src="'.$defbanner.'" alt="Tile">
	</div>
	</section>';
}

// Pre Load Required Images.
add_action( 'wp_head', function(){
global $post;
$nr = "\r\n";
echo '<link rel="preload" as="image" href="'.get_bloginfo('template_url').'/v3.0/images/home-partner-logo.svg" />'.$nr;
echo '<link rel="preload" as="image" href="'.get_bloginfo('template_url').'/v3.0/images/header-client-logo-sprite-for-light.svg" />'.$nr;
if( is_page_template( 'page-templates/template-industry.php' ) ){
	$indBanner = get_field('tb-image', $post->ID);
	if( $indBanner ){
	echo '<link rel="preload" as="image" href="'.$indBanner['url'].'" />'.$nr;
	}
}elseif( is_page_template( 'page-templates/template-services.php' ) ){
	$cmnBanner 			= get_field('sbg-thumbnail', $post->ID);
	$bannerImageSrc 	= get_bloginfo('template_url').'/v3.0/images/service-banner.png';
	if( $cmnBanner && is_array( $cmnBanner ) ){
	$bannerImageSrc = getVcWebpSrcURL( $cmnBanner );
	}
	echo '<link rel="preload" as="image" href="'.$bannerImageSrc.'" />'.$nr;
}

});

add_action( 'wp_print_scripts', 'wra_filter_scripts', 100000 );
add_action( 'wp_print_footer_scripts', 'wra_filter_scripts', 100000 );
function wra_filter_scripts(){
	if( !is_single() ) {
		wp_dequeue_script( 'jquery');
    	wp_deregister_script( 'jquery');
	}
}

add_action( 'wp_print_styles', 'wra_filter_styles', 100000 );
add_action( 'wp_print_footer_scripts', 'wra_filter_styles', 100000 );
function wra_filter_styles(){
	if( !is_single() ){
		wp_dequeue_style( 'ez-toc' );
	}
}

function vCodeRemoveUlTags($inputString) {
    $pattern = '/<ul\b[^>]*>(.*?)<\/ul>/is'; // The "s" flag allows matching across newlines
    $replacement = ''; // Empty string to remove the tag and its content
    $outputString = preg_replace($pattern, $replacement, $inputString);
    return $outputString;
}

function appendLiToFirstUl($inputString, $liContent) {
    $pattern = '/<ul\b[^>]*>/i'; // Match the opening <ul> tag
    $replacement = '$0<li>' . $liContent . '</li>'; // Append the new <li> element

    $outputString = preg_replace($pattern, $replacement, $inputString, 1); // Perform replacement only once

    return $outputString;
}

function vcNolistingContent( $inputString ){ 	
	$dom = new DOMDocument();
	$dom->loadHTML($inputString, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

	$ulElements = $dom->getElementsByTagName('ul');
	foreach ($ulElements as $ulElement) {
	$ulElement->parentNode->removeChild($ulElement);
	}
	$liElements = $dom->getElementsByTagName('li');
	foreach ($liElements as $liElement) {
	$liElement->parentNode->removeChild($liElement);
	}
	$cleanedString = $dom->saveHTML();
	return $cleanedString;
}

function removeUlTags_v4($inputString) {
    $cleanedString = preg_replace('/<ul\b[^>]*>(.*?)<\/ul>/is', '', $inputString);
    $cleanedString = preg_replace('/<ul\b[^>]*>[\s]*<\/ul>/', '', $cleanedString);
    return $cleanedString;
}


function valueGetPtag( array $marray, $title = "", $class = "" ){
	if( !is_array( $marray ) ) return;
	$imgClass = ( !empty( $class ) ) ? 'class="'.$class.'"' : '';
	return '<picture '.$imgClass.'>
	'.getvcWebpURL($marray['ID']).'
	<source type="'.$marray['mime_type'].'" srcset="'.$marray['url'].'">
	<img loading="lazy" src="'.$marray['url'].'" alt="'.$marray['title'].'" width="'.$marray['width'].'" 
	height="'.$marray['height'].'">
	</picture>';
}

function __pxl_pricing($string) {
    $pattern = '/{{local="([^"]*)" int="([^"]*)"}}/';
    preg_match($pattern, $string, $matches);
    if(count($matches) == 3){
	    $data = array(
	        'local' => $matches[1],
	        'int' => $matches[2]
	    );
	    $prsData = '';
	    if( isset( $data['local'] ) && !empty( $data['local'] ) ){
	    	$prsData .= '<span class="sp-local">'.$data['local'].'</span>';
	    }
	    if( isset( $data['int'] ) && !empty( $data['int'] ) ){
	    	$prsData .= '<span class="sp-int">'.$data['int'].'</span>';
	    }
	    return $prsData;
    }else{
        return $string;
    }    
}

function __pxl_int_block( $str ){
	return false;
}

function vcGetThisPageUrl(){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";    
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $current_url = $protocol . $host . $request_uri;    
    return $current_url;
}

// add_filter( 'wpseo_robots', function( $string = '' ){
// 	if( is_category() ){
// 		$string = 'noindex';
// 	}
// 	return $string;
// }, 999 );

function GetTocTitle( $fld, $elmID ){
	if( isset( $fld['is_enabled'] ) && ($fld['is_enabled'] == "yes") ){
	return (isset($fld['toc-title']) && !empty($fld['toc-title'])) ? '<p><a href="#'.$elmID.'">'.$fld['toc-title'].'</a></p>' : '';
	}
}

function _hasliCheckMoreTwo($string) {
    if (stripos($string, '<ul') !== false && stripos($string, '<li') !== false) {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($string, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $ulTags = $dom->getElementsByTagName('ul');
        foreach ($ulTags as $ul) {
            $liCount = 0;
            foreach ($ul->getElementsByTagName('li') as $li) {
                $liCount++;
            }
            if ($liCount > 2) {
                return true;
            }
        }
    }
    return false;
}

add_action('init', function(){
	if( isset($_GET['spam-unlock']) && (!empty($_GET['spam-unlock'])) ){
		$email 	= base64_decode( $_GET['spam-unlock'] ); 
		$spdb 	= new wpdb( CRM_DB_USER, CRM_DB_PASSWORD, CRM_DB, CRM_HOST );
		$receivedUid = $_GET['uid'];
		list($timestamp, $randomPart) = explode('_', $receivedUid);
		if( is_numeric($timestamp) && is_numeric($randomPart) ){
			if( $spdb->delete( 'spam_attack', ['email' => $email] ) ){
				echo "Record unblocked Successfully.";
			}else{
				echo "Invalid Request. Please try again.";
			}
		}else{
			echo "Invalid Request. Please try again.";
		}
		die;
	}
});


add_filter('wp_get_attachment_image_attributes', function($attr, $attachment, $size){
	if(isset($attr['width']) && $attr['width'] === 'auto'){
		unset($attr['width']);
	}
	if(isset($attr['height']) && $attr['height'] === 'auto'){
		unset($attr['height']);
	}
	return $attr;
}, 10, 3);

add_action('template_redirect', function(){
	ob_start('fixIMAGE_size_ob');
});
function fixIMAGE_size_ob($html) {
	 return preg_replace(
        ['/\s*frameborder=["\']?\d["\']?/i','/sizes=["\']\s*auto,\s*/i'],
        ['', 'sizes="'],
        $html
    );
}


function getCmnTechExperties(){
$techs = get_field('tech-experties', 8024);
$elm = '';
if( isset($techs['required']) && ($techs['required'] == "yes") ){
	$elm .= '<section class="tabs-section technologies-tabs padding-t-120 padding-b-120" id="tabs-section-3">';
	$elm .= '<div class="container">';
	$elm .= '<div class="top-section b-100">'.$techs['content'].'</div>';
	if(isset($techs['tech-block']) && is_array($techs['tech-block']) && (count($techs['tech-block']) > 0) ){
	$elm .= '<div class="tab-flex"><div class="tabs-container">';
	$elm .= '<ul class="tabs">';
		$i = 0;
		foreach($techs['tech-block'] as $tab){ $i++;
		$isActive = ( $i === 1 ) ? 'active' : '';  
		$elm .= '<li class="tab '.$isActive.'" data-target="tech-exp'.$i.'">'.$tab['title'].'</li>';
		}
	$elm .= '</ul>';	
	$elm .= '<div class="tab-content">';	
	$i = 0;
	  foreach($techs['tech-block'] as $tab){ $i++;
	  $isActive = ( $i === 1 ) ? 'active' : '';   
	  $elm .= '<div class="content '.$isActive.'" id="tech-exp'.$i.'">
	  <div class="dis-flex"><div class="flex-1 content-div">'.$tab['listing'].'</div></div>
	  </div>';
	  }
	$elm .= '</div>';	

	$elm .= '</div></div>';
	}
	$elm .= '</div>';
	$elm .= '</section>';
}
return $elm;
}
/*
CREATE TABLE calculator_leads (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  company VARCHAR(255),
  phone VARCHAR(50),
  communication VARCHAR(20),
  ip_address VARCHAR(100),
  form_data LONGTEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/

add_action('wp_ajax_handlecosting', '_calcReqHandlerCB');
add_action('wp_ajax_nopriv_handlecosting', '_calcReqHandlerCB');
function _calcReqHandlerCB(){
	// $jString 	= file_get_contents(__DIR__ . '/json-fields/data-analytics-bi-calculator-formatted.json'); 
	// $jsonFl  	= json_decode($jString, true);
	$input 		= file_get_contents( "php://input" );
	$data 		= json_decode( $input, true );
	
	$json 		= get_post_meta($data['post_id'], 'calc-json', true);
	$jsonFl  	= json_decode($json, true);

	$title_ar = [];
	if( $data ){
		foreach($data as $key => $value) { 
			$index = explode("_question", $key);
			
			if( (strpos($index[1], "other") === false) && (strpos($index[0], "key-") !== false) ){
				$indKey = str_replace(['_input', '_other'], '', $index[1]);
				$qst = $jsonFl[$index[0]]['questions'][$indKey]['title'];

				if( $value === "Other"){
				$title_ar[$qst] = $data[$key.'_other'];
				}else{					
					if( is_array($value) ){					
						$optStr = implode(', ', $value);
						if( in_array("Other", $value) ){
						$inKey 	= str_replace( "Other", $data[$key.'_other'], $optStr);	
						$title_ar[$qst] = $inKey;	
						}else{
						$title_ar[$qst] = $optStr;		
						}
					}else{
						$title_ar[$qst] = $value;		
					}				
				}				
			}			
		}
	}

	$markup = '<strong>Name : </strong>'.($data['uname']) ??$data['uname'];
	$markup .= '<br><strong>Company : </strong>'.($data['company']) ??$data['company'];
	$markup .= '<br><strong>Email : </strong>'.($data['email']) ??$data['email'];
	$markup .= '<br><strong>Phone : </strong>'.($data['phone']) ??$data['phone'];
	$markup .= '<br><strong>Preferred way of communication : </strong>'.($data['communication']) ??$data['communication'];
	$elmForms = "";
	foreach($title_ar as $key => $value) {
		$markup .= '<br><strong>'.$key.' : </strong>'.$value.'<br>';
		$elmForms .= '<strong>'.$key.' : </strong>'.$value.'<br>';
	}
	global $wpdb;
	$crmDB 			= new wpdb(CRM_DB_USER, CRM_DB_PASSWORD, CRM_DB,CRM_HOST);

	$name           = sanitize_text_field($data['uname'] ?? '');
	$email          = sanitize_email($data['email'] ?? '');
	$company        = sanitize_text_field($data['company'] ?? '');
	$phone          = sanitize_text_field($data['phone'] ?? '');
	$communication  = sanitize_text_field($data['communication'] ?? '');
	$ip_address     = $_SERVER['REMOTE_ADDR'] ?? '';
	
	$serialized_form_data = maybe_serialize($elmForms);

	$query = $wpdb->prepare( "INSERT INTO calculator_leads (name, email, company, phone, communication, ip_address, form_data, created_at) 
	VALUES (%s, %s, %s, %s, %s, %s, %s, NOW())", $name, $email, $company, $phone, $communication, $ip_address, $serialized_form_data );
	$result = $crmDB->query($query);	
	if( $result !== false ){
		wp_send_json(['file_data' => $jsonFl, 'form_input' => $data, 'form_data' => $title_ar, 'markup' => $markup]);
	}else{
		wp_send_json(['file_data' => $jsonFl, 'form_input' => $data, 'form_data' => $title_ar, 'markup' => $markup]);
	}
	die;
}

add_filter('acf/validate_value/name=calc-json', function($valid, $value, $field, $input_name) {
    if (!empty($value)) {
        $value = html_entity_decode(trim($value));
        if (is_string($value)) {
            $value = stripslashes($value);
        }
        json_decode($value);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $valid = 'Invalid JSON: ' . json_last_error_msg();
        }
    }
    return $valid;
}, 10, 4);

function ensureParagraphTag($string) {
    // Check if string already contains a <p> tag
    if (stripos($string, '<p>') === false) {
        return '<p>' . $string . '</p>';
    }
    return $string;
}

function hasPGTag($string) {
    if (stripos($string, '<p>') === false) {
        return '<p>' . $string . '</p>';
    }
    return $string;
}

function wrapNonHtmlTextWithP($string) {
    $string = trim($string);
    $pattern = '/(<(?:ul|ol|div|table|section|article|aside|nav|header|footer|figure|blockquote|pre|form|p)[^>]*>.*?<\/\s*\w+>)/is';

    $parts = preg_split($pattern, $string, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    $result = '';
    foreach ($parts as $part) {
        $trimmed = trim($part);
        if ($trimmed === '' || $trimmed === "\n" || $trimmed === "\r") {
            continue;
        }
        if (preg_match('/^<\s*\w+[^>]*>.*<\/\s*\w+>$/is', $trimmed)) {
            $result .= $trimmed;
        } else {
            // Otherwise wrap it in <p>
            $result .= '<p>' . $trimmed . '</p>';
        }
    }
    return $result;
}

function str_hasAnchorTag( $string ){
    return preg_match('/<a\s[^>]*href=["\']?[^"\'>]+["\']?[^>]*>/i', $string) === 1;
}

function vcGetCustomBC( $postid, $defcat = "services", $title = false ){
	$bcCategory = get_field('bc-vcategory', $postid);
	$bcTitle    = get_field('bc-title', $postid);	
	if( $bcTitle ){
	$bct = $bcTitle;
	}else{
	$bct = get_the_title($postid);
	}
	if( $title !== false ){
		$bct = $title;
	}

	if( $bcCategory === "multiple" ){
		echo '<a href="'.get_bloginfo('url').'">Home</a>'.get_field('bmh-fld', $postid).' '.$bct;   
	}else{
		if( isset( $bcCategory ) && ($bcCategory == "solutions") ){
			echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Solutions</span> '.$bct;   
		}
		elseif( isset( $bcCategory ) && ($bcCategory == "industries") ){
			echo '<a href="'.get_bloginfo('url').'">Home</a> <span>Industries</span> '.$bct;   
		}
		elseif(!empty( $bcCategory ) && ($bcCategory === "custom")){
			$cuTitle  = get_field('bc-custitle', $postid);
			$cuLink   = get_field('bc-cuslink', $postid);
			$bCat     = '<a class="no-after" href="'.vc_siteurl($cuLink).'">'.$cuTitle.'</a> ';
			if( $cuTitle && $cuLink ){
			  echo '<a href="'.get_bloginfo('url').'">Home</a> '.$bCat.$bcTitle;  
			}else{
			  echo '<a href="'.get_bloginfo('url').'">Home</a> '.$bcTitle; 
			}
		}else{
			$midBC = "";
			if( $defcat === "services" ){
				$midBC = '<a href="'.site_url('/software-development-services-company').'">Services</a>';
			}elseif( !empty($defcat) ){
				$midBC = (str_hasAnchorTag($defcat)) ? $defcat : '<span>'.$defcat.'</span>';
			}
			echo '<a href="'.get_bloginfo('url').'">Home</a> '.$midBC.' '.$bct;
		}	
	}
}