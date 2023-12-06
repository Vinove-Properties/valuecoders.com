<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Class WP_Social_Counter_Settings
 *
 * @since 1.0.0
 */
final class WP_Social_Counter_Settings{
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $data;
	private $slug = 'wp-social-counter';
	private $tabs = array();

	/**
	 * Start up
	 *
	 * @since 1.0.0
	 */
	public function __construct(){

		$uri = WP_Social_Counter::get_url();

		$this->tabs = array(
			// Settings
			'settings'  => array(
				'title' => esc_html__( 'General Settings', 'wp-social-counter' ),
				'sanitize_callback'	=> array( $this, 'validate_options' ),
				'fields'    => array(
					array(
						'id'    => 'general_settings_section',
						'title' => esc_html__( 'General Settings', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					// array(
					//     'id'    => 'show_total',
					//     'title' => esc_html__( 'Show total', 'wp-social-counter' ),
					//     'desc' => esc_html__( 'Show total followers/fans/subscriber', 'wp-social-counter' ),
					//     'type'  => 'checkbox',
					//     'sanitize'  => '',
					// ),
					
					array(
						'id'    => 'layout',
						'title' => esc_html__( 'Layout', 'wp-social-counter' ),
						'desc' => esc_html__( 'Select default design. You can also override design using shortcode/widget. From left to right: default, 2_col, 3_col.', 'wp-social-counter' ),
						'type'  => 'images',
						'options' => array(
							'default'   => $uri . 'images/admin/layout-default.jpg',
							// 'alt'       => $uri . 'images/admin/layout-alt.jpg',
							// 'grid'      => $uri . 'images/admin/layout-grid.jpg',
							'2_col'     => $uri . 'images/admin/layout-2_col.jpg',
							'3_col'     => $uri . 'images/admin/layout-3_col.jpg'
						),
						'settings'  => array(
							'width' => '250px',
							'height' => '200px',
						),
						'sanitize'  => '',
					),

					array(
						'id'    => 'inline',
						'title' => esc_html__( 'Display as a inline list for large screen', 'wp-social-counter' ),
						'desc' => esc_html__( 'This option only applies to layout 3 columns :)', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					array(
						'id'    => 'design',
						'title' => esc_html__( 'Design style', 'wp-social-counter' ),
						'desc' => esc_html__( 'Select style design. From left to right: default, alt, plain.', 'wp-social-counter' ),
						'type'  => 'images',
						'options' => array(
							'default'   => $uri . 'images/admin/design-default.jpg',
							'alt'       => $uri . 'images/admin/design-alt.jpg',
							'plain'       => $uri . 'images/admin/design-plain.jpg',
						),
						'settings'  => array(
							'width' => '250px',
							'height' => '200px',
						),
						'sanitize'  => '',
					),
					array(
						'id'    => 'shape',
						'title' => esc_html__( 'Shape', 'wp-social-counter' ),
						'desc' => esc_html__( 'This option only applies to default design style', 'wp-social-counter' ),
						'type'  => 'select',
						'options' => array(
							'default'   => esc_html__( 'Square', 'wp-social-counter' ),
							'round'       => esc_html__( 'Round', 'wp-social-counter' ),
							'circle'      => esc_html__( 'Cirle', 'wp-social-counter' )
						),
					),
					array(
						'id'    => 'style',
						'title' => esc_html__( 'Color Style', 'wp-social-counter' ),
						'desc' => esc_html__( 'Select color style', 'wp-social-counter' ),
						'type'  => 'select',
						'options' => array(
							'default'   => esc_html__( 'Default - Color', 'wp-social-counter' ),
							'black'      => esc_html__( 'Black', 'wp-social-counter' ),
							'white'      => esc_html__( 'White', 'wp-social-counter' ),
							'inherit'      => esc_html__( 'Inherit', 'wp-social-counter' ),
							
						),
					),
					/*array(
						'id'    => 'hide_count',
						'title' => esc_html__( 'Hide count', 'wp-social-counter' ),
						'desc' => esc_html__( 'Hide number of followers/fans... and replace with service name', 'wp-social-counter' ),
						'type'  => 'checkbox',
						'sanitize'  => '',
					),*/
					array(
						'id'    => 'number_format',
						'title' => esc_html__( 'Number format', 'wp-social-counter' ),
						'desc' => esc_html__( 'Select number format', 'wp-social-counter' ),
						'type'  => 'select',
						'options' => array(
							'default'   => esc_html__( 'Default - 15332', 'wp-social-counter' ),
							'group'       => esc_html__( 'Grouped of thousands - 15,332', 'wp-social-counter' ),
							'short'      => esc_html__( 'Shortened - 15.3k', 'wp-social-counter' )
						),
					),
					array(
						'id'    => 'hide_count',
						'title' => esc_html__( 'Hide Followers Count', 'wp-social-counter' ),
						'desc' => esc_html__( 'Hide all Followers/Likes/Subscribers Numers.', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					array(
						'id'    => 'preload_cache',
						'title' => esc_html__( 'Preload Cache', 'wp-social-counter' ),
						'desc' => esc_html__( 'Preload data for the first initialization or generate new data. You should use this action when you enable/disable services as well.', 'wp-social-counter' ) . '<br>' . esc_html__( 'By default, new data will be automatically refreshed in 24 hours.', 'wp-social-counter' ),
						'type'  => 'generate_cache',
						'sanitize'  => '',
					)

				)
			),
			// Services
			'services'  => array(
				'title' => esc_html__( 'Services', 'wp-social-counter' ),
				'sanitize_callback'	=> array( $this, 'validate_services_options' ),
				'fields'    => array(
					// Section: Comments
					array(
						'id'    => 'comments_section',
						'title' => esc_html__( 'Comments', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					/*array(
						'id'    => 'comments',
						'title' => esc_html__( 'Comments count', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox',
						'sanitize'  => '',
					),
					array(
						'id'    => 'comments_url',
						'title' => esc_html__( 'Comments URL', 'wp-social-counter' ),
						'type'  => 'text',
					),*/
					// Section: Facebook
					array(
						'id'    => 'facebook_section',
						'title' => esc_html__( 'Facebook', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'facebook',
						'title' => esc_html__( 'Facebook', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox',
					),
					array(
						'id'    => 'facebook_id',
						'title' => esc_html__( 'Facebook Page ID', 'wp-social-counter' ),
						'type'  => 'text',
						'desc'	=> esc_html__( 'Your Facebook page ID, numeric ID or your custom page slug address.', 'wp-social-counter' )
					),
							
					// Section: Twitter
					array(
						'id'    => 'twitter_section',
						'title' => esc_html__( 'Twitter', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'twitter',
						'title' => esc_html__( 'Twitter', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					array(
						'id'    => 'twitter_username',
						'title' => esc_html__( 'Twitter Username', 'wp-social-counter' ),
						'type'  => 'text',
						'src' => esc_html__( 'Your username, for example: Google', 'wp-social-counter' ),
					),
					array(
						'id'    => 'twitter_consumer_key',
						'title' => esc_html__( 'Twitter Consumer key', 'wp-social-counter' ),
						'type'  => 'text',
						'desc' => esc_html__( 'Create an App on Twitter Application Management and get these keys.', 'wp-social-counter' ) . ' <a href="//apps.twitter.com/" target="_blank">click here</a>',
					),
					array(
						'id'    => 'twitter_consumer_secret',
						'title' => esc_html__( 'Twitter Consumer secret', 'wp-social-counter' ),
						'type'  => 'text'
					),
					array(
						'id'    => 'twitter_access_token',
						'title' => esc_html__( 'Twitter Access Token', 'wp-social-counter' ),
						'type'  => 'text'
					),
					array(
						'id'    => 'twitter_access_token_secret',
						'title' => esc_html__( 'Twitter Access Token Secret', 'wp-social-counter' ),
						'type'  => 'text'
					),	
					// Section: Youtube
					array(
						'id'    => 'youtube_section',
						'title' => esc_html__( 'Youtube', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'youtube',
						'title' => esc_html__( 'Youtube', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					array(
						'id'    => 'youtube_id',
						'title' => esc_html__( 'Youtube Channel ID', 'wp-social-counter' ),
						'type'  => 'text',
						'desc'	=> esc_html__( 'How to find your channel ID?', 'wp-social-counter' ) . ' <a href="//support.google.com/youtube/answer/3250431?hl=en" target="_blank">click here</a>',
					),
					array(
						'id'    => 'youtube_url',
						'title' => esc_html__( 'Youtube Channel URL', 'wp-social-counter' ),
						'type'  => 'text',
						'desc'	=> esc_html__( 'for example: https://www.youtube.com/Google', 'wp-social-counter' )
					),
					array(
						'id'    => 'youtube_api_key',
						'title' => esc_html__( 'Youtube API key', 'wp-social-counter' ),
						'type'  => 'text',
						'desc' => wp_kses( __( 'How can i get Google API key? <br>Step 1: You need to create a project in <a href="https://console.developers.google.com/project" target="_blank">Google APIs</a> <br>Step 2: Go to <a href="//console.developers.google.com/apis">API Manager</a> -> Library -> select YouTube Data API -> Enable. <br>Step 3: Go to <a href="//console.developers.google.com/apis/credentials" target="_blank">Credentials</a> -> Create credentials -> API key.', 'wp-social-counter' ), array( 'a' => array( 'href' => array(), 'target' => array() ), 'br' => array()) ),
						
					),
					// Section: Instagram
					array(
						'id'    => 'instagram_section',
						'title' => esc_html__( 'Instagram', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'instagram',
						'title' => esc_html__( 'Instagram', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					array(
						'id'    => 'instagram_username',
						'title' => esc_html__( 'Instagram Username', 'wp-social-counter' ),
						'type'  => 'text',
					),
					
					// Section: Pinterest
					array(
						'id'    => 'pinterest_section',
						'title' => esc_html__( 'Pinterest', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'pinterest',
						'title' => esc_html__( 'Pinterest', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),

					array(
						'id'    => 'pinterest_username',
						'title' => esc_html__( 'Pinterest Username', 'wp-social-counter' ),
						'type'  => 'text',
						'desc'  => esc_html__( 'For example: pinterest', 'wp-social-counter' ),
					),
							
					// Section: Linkedin
					/*array(
						'id'    => 'linkedin_section',
						'title' => esc_html__( 'Linkedin', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'linkedin',
						'title' => esc_html__( 'Linkedin', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					array(
						'id'    => 'linkedin_id',
						'title' => esc_html__( 'Linkedin ID', 'wp-social-counter' ),
						'type'  => 'text'
					),
					array(
						'id'    => 'linkedin_access_token',
						'title' => esc_html__( 'Linkedin Access Token', 'wp-social-counter' ),
						'type'  => 'text'
					),*/
					// Section: Mailchimp
					array(
						'id'    => 'reader_section',
						'title' => esc_html__( 'Mailchimp Subscribers', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'mailchimp',
						'title' => esc_html__( 'Mailchimp', 'wp-social-counter' ),
						'desc'  => esc_html__( 'Enable', 'wp-social-counter' ),
						'type'  => 'checkbox'
					),
					
					array(
						'id'    => 'mailchimp_api_key',
						'title' => esc_html__( 'Mailchimp API key', 'wp-social-counter' ),
						'desc'  => '<a href="//admin.mailchimp.com/account/api-key-popup" target="_blank">' . esc_html__( 'Get your API key!', 'wp-social-counter' ) . '</a>',
						'type'  => 'text'
					),
					array(
						'id'    => 'mailchimp_list',
						'title' => esc_html__( 'Mailchimp list', 'wp-social-counter' ),
						'desc'  => '',
						'type'  => 'mailchimp_list'
					),

					

					array(
						'id'    => 'more_section',
						'title' => esc_html__( 'Extra', 'wp-social-counter' ),
						'type'  => 'section',
						'callback'  => '__return_empty_string'
					),
					array(
						'id'    => 'users',
						'title' => esc_html__( 'Registered users', 'wp-social-counter' ),
						'desc' => esc_html__( 'Show number of registered users', 'wp-social-counter' ),
						'type'  => 'checkbox',
						'sanitize'  => '',
					),
					array(
						'id'    => 'comments',
						'title' => esc_html__( 'Approved Comments', 'wp-social-counter' ),
						'desc' => esc_html__( 'Show number of approved comments on your site', 'wp-social-counter' ),
						'type'  => 'checkbox',
						'sanitize'  => '',
					),
				)
			),
			'system'  => array(
				'title' => esc_html__( 'System Info.', 'wp-social-counter' ),
			)
		);

		$this->hooks();

	}

	/**
	 * Hooks
	 *
	 * @since 1.0.0
	 */
	public function hooks(){
		
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		add_filter( 'plugin_action_links_' . WP_Social_Counter::plugin_basename(), array( $this, 'add_action_links' ) );
		add_action( 'wp_ajax_wp-social-counter-generate-cache', array( $this, 'ajax_cache_generator' ) );

	   
	}

	/**
	 * Setting url
	 *
	 * @since 1.0.0
	 */
	public function add_action_links ( $links ) {

		$mylinks = array(
			wp_sprintf( '<a href="%s">%s</a>', esc_url( admin_url( "options-general.php?page={$this->slug}" ) ), esc_html__('Settings', 'wp-social-counter') )
		);

		return array_merge( $links, $mylinks );
	}
	/**
	 * Add options page
	 *
	 * @since 1.0.0
	 */
	public function admin_menu(){

		// add admin page to Appearance
		$hook = add_options_page( 
			esc_html__( 'WP Social Counter', 'wp-social-counter' ),
			esc_html__( 'WP Social Counter', 'wp-social-counter' ),
			'manage_options',
			$this->slug,
			array( $this, 'create_admin_page')
		);

		// Adding help tab
		add_action( "load-$hook", array( $this, 'help_tabs' ) );

	}
	/**
	 * Options page callback
	 *
	 * @since 1.0.0
	 */
	public function create_admin_page() {
		$active_tab = !empty( $_GET['tab'] ) && isset( $this->tabs[$_GET['tab']] ) ? $_GET['tab'] : 'settings';
		?>
		<div class="wrap">
			<h2><?php echo esc_html__( 'WP Social Counter', 'wp-social-counter' );?></h2>
			<?php settings_errors(); ?>
			<h2 class="nav-tab-wrapper">
				<?php
					foreach ($this->tabs as $tab => $tab_settings ) {
						?>
						<a href="<?php echo esc_url( admin_url( "options-general.php?page={$this->slug}&tab={$tab}" ) );?>" class="nav-tab<?php echo esc_attr( $active_tab == $tab ? ' nav-tab-active' : '' );?>"><?php echo esc_html( $tab_settings['title'] );?></a>
						<?php
					}
				?>
			</h2>
			<?php
				$method = "render_{$active_tab}_page";

				if( method_exists( $this, $method )){
					$this->$method();
				}
			?>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 *
	 * @since 1.0.0
	 */
	public function page_init() {

		$this->data = WP_Social_Counter_Options::get_options();

		foreach ( $this->tabs as $tab => $tab_settings ) {

			if( empty( $tab_settings['fields'] ) )
				continue;

			$sanitize_callback = !empty( $tab_settings['sanitize_callback'] ) ? $tab_settings['sanitize_callback'] : array( $this, 'validate_options' );

			register_setting(
				WP_Social_Counter_Options::$option_key . "_{$tab}", // Option group
				WP_Social_Counter_Options::$option_key . "_{$tab}", // Option name
				$sanitize_callback
			);

			$tab_fields = $tab_settings['fields'];

			foreach ( $tab_fields as $field_args ) {

				$args = wp_parse_args( $field_args, array( 
					'id'    => '',
					'title' => '',
					'desc'  => '',
					'callback' => '',
					'type'      => '',
					'options'   => array(),
					'settings'  => array()
				) );

				$callback = $args['callback'];

				if( empty( $args['callback'] ) && method_exists( $this, "_field_type_{$args['type']}" ) ){
					$callback = array( $this, "_field_type_{$args['type']}" );
				}

				if( 'section' === $args['type'] ){
									
					$section = $args['id'];

					add_settings_section(
						$args['id'],
						$args['title'],
						$callback,
						"{$this->slug}_{$tab}"
					);
					

				}else{
					
					// Skip if no callback found
					if( empty( $callback ) )
						continue;

					add_settings_field(
						$args['id'],
						$args['title'],
						$callback,
						"{$this->slug}_{$tab}",
						$section,
						array(
							'id'        =>  $args['id'],
							'title'     =>  $args['title'],
							'desc'      =>  $args['desc'],
							'options'   =>  $args['options'],
							'key'       => WP_Social_Counter_Options::$option_key . "_{$tab}",
							'value'     => !empty( $this->data[$tab][$args['id']] ) ? $this->data[$tab][$args['id']] : '',
							'settings'  =>  $args['settings']

						)
					);


				}

			}
			
		}   
	}
	/**
	 * Settings Page
	 * render_{$tab}_page
	 *
	 * @since 1.0.0
	 */
	public function render_settings_page(){
		?>
		<form method="post" action="options.php">
		<?php
			// This prints out all hidden setting fields
			settings_fields( WP_Social_Counter_Options::$option_key . '_settings' );   
			do_settings_sections( $this->slug . '_settings' );
			submit_button(); 
		?>
		</form>
		<?php
	}
	/**
	 * Services Page
	 * render_{$tab}_page
	 *
	 * @since 1.0.0
	 */
	public function render_services_page(){
		?>
		<form method="post" action="options.php">
		<?php
			// This prints out all hidden setting fields
			settings_fields( WP_Social_Counter_Options::$option_key . '_services' );   
			do_settings_sections( $this->slug . '_services' );
			submit_button(); 
		?>
		</form>
		<?php
	}

	/**
	 * System Page
	 * render_{$tab}_page
	 *
	 * @since 1.0.0
	 */
	public function render_system_page(){
		include_once( 'view/system-info.php' );
	}
	/**
	 * Sidebar Generator page
	 *
	 * @since 1.0.0
	 */
	public function sidebar_generator_page(){

	}
	/**
	 * Admin Scripts
	 * @since 1.0
	 */
	public function admin_enqueue_scripts( $hook ){

		if( "settings_page_{$this->slug}" !== $hook )
			return false;

		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
		
		wp_enqueue_style( 'wp-social-counter-admin', WP_Social_Counter::get_url() . 'css/admin-style.css', array(), '1.0' );
		wp_enqueue_script( 'wp-social-counter-admin', WP_Social_Counter::get_url() . "js/admin-script$suffix.js", array('jquery', 'jquery-ui-sortable'), '1.0', true );
		
		wp_localize_script( 'wp-social-counter-admin', 'wpSocialCounterVars', array(
			'workingMsg'     => esc_html__( 'New cache is generating, please be patient!', 'wp-social-counter' ),
			'confirmGenerateMsg' => esc_html__( 'This action will generate new cache for services, are you sure you want to do this? Note that you must keep this window open during the process.', 'wp-social-counter' ),
		) );

	}

	/**
	 * Help Screen
	 *
	 * @since 1.0.0
	 */
	public function help_tabs() {
		$screen = get_current_screen();
		$msg = '';
		$msg .= '<h3>';
		$msg .= esc_html__( 'I want to place social counter elsewhere, how can i do it?', 'wp-social-counter' );
		$msg .= '</h3>';
		$msg .= "\n" . "\n" . esc_html__( 'If you want to place WP Social Counter manually, you can use shortcode or use php function like following:', 'wp-social-counter' );

		// SHortcode
		$msg .= "\n" . "\n" . wp_sprintf( '<h3>%s</h3>', esc_html__( 'Shortcode:', 'wp-social-counter' ) );
		$msg .= '<code>';
		$msg .= '[wp_social_counter]';
		$msg .= '</code>';
		$msg .= "\n" . "\n" . '<strong>-Params:</strong>';
		$msg .= '<pre>';
		$msg .= "\n" . 'layout: default, 2_col, 3_col';
		$msg .= "\n" . 'inline: 1, 0. ';
		
		$msg .= "\n" . 'design: default, alt, plain';
		$msg .= "\n" . 'shape: default, round, circle';
		$msg .= "\n" . 'style: default, black, white';
		$msg .= "\n" . 'number_format: default, group, short';
		$msg .= "\n" . 'hide_count: 1, 0. Set 1 to hide.';
		
		$msg .= '</pre>';

		$msg .= '<strong>-Example:</strong>';
		$msg .= "\n" . "\n" . '<code>[wp_social_counter layout="3_col" design="plain" number_format="short"]</code>';

		// PHP
		$msg .= wp_sprintf( '<h3>%s</h3>', esc_html__( 'PHP function:', 'wp-social-counter' ) );
		$msg .= '<code>';
		$msg .= esc_html("<?php if( function_exists( 'wp_social_counter' ) ){ wp_social_counter(); } ?>");
		$msg .= '</code>';
		
		$msg .= "\n" . "\n" . '<strong>-Params: same as shortcode params</strong>';

		$msg .= "\n" . "\n" . '<strong>-Example:</strong>';
		$msg .= "\n" . '<pre>';
		$msg .= 'wp_social_counter( array(';
		$msg .= "\n" . "\t" . "'layout' => '3_col',";
		$msg .= "\n" . "\t" . "'design' => 'plain',";
		$msg .= "\n" . "\t" . "'number_format' => 'short'";
		$msg .= "\n" . "\t" . "'hide_count' => '1'";
		
		$msg .= "\n" . ' ));';
		$msg .= '</pre>';
		
		$msg .= esc_html__( 'Step 3: Go edit page/post, then look for WP Social Counter setting box, and overriding sidebars.', 'wp-social-counter' );

		// Add my_help_tab if current screen is My Admin Page
		$screen->add_help_tab( array(
			'id'    => 'wp_social_counter_help',
			'title' => esc_html__('How to use?'),
			'content'   => wpautop(  $msg ) ,
		) );
	}
	/**
	 * Custom Sanitizer for services
	 *
	 * @param array $input Contains all settings fields as array keys
	 * @since 1.0.0
	 */
	public function validate_services_options( $input ){
		
		if( empty( $input['mailchimp_api_key'] ) ){

			self::flush_mailchimp_lists_cache();
		}

		return $this->validate_options( $input );
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 * @since 1.0.0
	 */
	public function validate_options( $input ){
		// print_r( $input ); die();
		$new_input = array();
		
		foreach ( $input as $key => $value) {
			$new_input[$key] = sanitize_text_field( $value );
		}

		return $new_input;
	}
	/**
	 * Ajax cache generator
	 *
	 * @param array $input Contains all settings fields as array keys
	 * @since 1.0.0
	 */
	public function ajax_cache_generator(){

		$nonce_key = 'generate-data-nonce';

		check_admin_referer( $nonce_key, 'security' );

		if( !class_exists( 'WP_Social_Counter_Generator' ) ){

			include_once WP_Social_Counter::get_dir() . 'inc/public/generator.php';
		}
		$data = WP_Social_Counter_Generator::refresh();
		// print_r( $data ); 

		wp_die(1);

	}
	/** 
	 * Cache field
	 *
	 * @since 1.0.0
	 */
	public function _field_type_generate_cache( $args ){
		?>
		<a href="#generate-new-data" id="wpsc-generate-data" data-nonce="<?php echo esc_attr( wp_create_nonce( 'generate-data-nonce' ) );?>">Preload/Generate <i class="dashicons dashicons-yes"></i><div class="spinner"></div></a>
		<?php
		if( !empty( $args['desc'] ) ){
			echo wp_sprintf( '<p class="description">%s</p>', $args['desc'] );
		}
	}

	/** 
	 * mailchimp list field
	 *
	 * @since 1.0.0
	 */
	public function _field_type_mailchimp_list( $args ){

		if( empty( $this->data['services']['mailchimp_api_key'] ) ){
			echo wp_sprintf( '<p class="description">%s</p>', esc_html__( 'You need to enter api key then save to update this field.', 'wp-social-counter' ) );
			return;
		}

		$transient = 'wpsc_mailchimp_list';
		$lists = get_transient( $transient );
		// $lists = false;

		if( false === $lists ){

			if( !class_exists( 'WP_Social_Counter_API_Helper') ){
				include_once WP_Social_Counter::get_dir() . 'inc/classes/class.wpsc-api-helper.php';
			}

			$response = WP_Social_Counter_API_Helper::get_mailchimp_data( array( 
				'api_key' 	=> $this->data['services']['mailchimp_api_key'],
				'fields'	=> 'lists.name,lists.id,lists.stats.member_count'
			) );
			
			$lists = array();
			if( !empty( $response->lists )){
				foreach ( $response->lists as $list ) {
					$lists[$list->id] = $list->name . ' - ' . $list->stats->member_count;
				}
			}
			// we have a transient return/assign the results
			// transient cache 1 day
			// To flus this cache immediately, just remove api, save and re-enter api key :D
			set_transient( $transient, $lists, 60*60*24 );
		}
		

		if( empty( $lists ) ){
			echo wp_sprintf( '<p class="description">%s</p>', esc_html__( 'No List found', 'wp-social-counter' ) );
		}else{
			$args['options']	= array_merge( array( '' => ''), $lists );
			$args['desc'] 		= esc_html__( 'Select list you wish to retrieve number of subscriber', 'wp-social-counter' );
		}

		$this->_field_type_select( $args );
	}

	public static function flush_mailchimp_lists_cache(){
		delete_transient( 'wpsc_mailchimp_list' );
	}
	/** 
	 * Field Normalizer
	 *
	 * @since 1.0.0
	 */
	public static function normalize_field( $args = array() ){

		return wp_parse_args( $args, array(
			'id'        => '',
			'title'     => '',
			'desc'      => '',
			'options'   => '',
			'value'     => ''
		) );
	}
	/** 
	 * Select
	 *
	 * @since 1.0.0
	 */
	public function _field_type_select( $args ){
		
		$args = self::normalize_field( $args );

		if( !empty( $args['options'] )){
			
			echo '<div class="field-type-select ' . esc_attr( $args['id'] ) . '">';

			echo wp_sprintf( '<select id="%s" name="%s">',
				esc_attr( $args['key'] . "_{$args['id']}" ),
				esc_attr( $args['key'] . "[{$args['id']}]" )
			);

			foreach ( (array) $args['options'] as $key => $value) {
				echo wp_sprintf( '<option value="%s" %s>%s</option>', 
					esc_attr( $key ),
					selected( $args['value'], $key, false ),
					esc_html( $value )
				);
			}

			echo '</select>';
		}

		echo '</div>';

		if( !empty( $args['desc'] ) ){
			echo wp_sprintf( '<p class="description">%s</p>', $args['desc'] );
		}
	}

	public function _field_type_images( $args ){
		
		$args = self::normalize_field( $args );

		if( !empty( $args['options'] )){
			echo '<div class="field-type-images ' . esc_attr( $args['id'] ) . '">';
			$width = !empty( $args['settings']['width'] ) ? $args['settings']['width'] : '80px';
			$height = !empty( $args['settings']['height'] ) ? $args['settings']['height'] : '80px';

			foreach ( (array) $args['options'] as $key => $value) {
				echo wp_sprintf( '<label><input type="radio" name="%s" value="%s" %s><img src="%s" style="%s"/></label>', 
					esc_attr( $args['key'] . "[{$args['id']}]" ),
					esc_attr( $key ),
					checked( $args['value'], $key, false ),
					esc_url( $value ),
					esc_attr( 'width: ' . $width . '; height: ' . $height . ';' )
				);
			}
			echo '</div>';

		}

		if( !empty( $args['desc'] ) ){
			echo wp_sprintf( '<p class="description">%s</p>', $args['desc'] );
		}
	}
	/** 
	 * Checkbox
	 *
	 * @since 1.0.0
	 */
	public function _field_type_checkbox( $args ){
		
		$args = self::normalize_field( $args );

		echo '<div class="field-type-checkbox ' . esc_attr( $args['id'] ) . '">';

		echo '<label>';

		
		echo wp_sprintf( '<input type="checkbox" id="%s" name="%s" value="1" %s/>',
			esc_attr( $args['key'] . "_{$args['id']}" ),
			esc_attr( $args['key'] . "[{$args['id']}]" ),
			checked( 1, (bool) $args['value'], false )
		);

		if( !empty( $args['desc'] ) ){
			echo wp_sprintf( '<span>%s</span>', $args['desc'] );
		}
		echo '</label>';

		echo '</div>';
	}
	/** 
	 * text
	 *
	 * @since 1.0.0
	 */
	public function _field_type_text( $args ){

		$args = self::normalize_field( $args );

		echo '<div class="field-type-text ' . esc_attr( $args['id'] ) . '">';

		echo wp_sprintf(
			'<input type="text" class="regular-text code" id="%s" name="%s" value="%s" />',
			esc_attr( $args['key'] . "_{$args['id']}" ),
			esc_attr( $args['key'] . "[{$args['id']}]" ),
			esc_attr( $args['value'] )
		);

		echo '</div>';

		if( !empty( $args['desc'] ) ){
			echo wp_sprintf( '<p class="description">%s</p>', $args['desc'] );
		}
	}

}
// Kickstart
if( is_admin() )
	$wp_social_counter_settings = new WP_Social_Counter_Settings();