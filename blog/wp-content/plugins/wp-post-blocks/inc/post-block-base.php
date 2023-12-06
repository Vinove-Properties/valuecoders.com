<?php
/**
 * Base class
 */
namespace WP_Post_Blocks;

if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists( 'Block_Base') ){

	abstract class Block_Base{

		/**
		 * Post block id base
		 * @var string 	$id_base 
		 */
		static 		$id_base 			= 'pbs';
		/**
		 * Post block id
		 * @var string 	$id 
		 */
		public 		$uid 				= '';

		static 		$id 				= 'pbs-base';

		/**
		 * Post block name
		 * @var string 	$name 	
		 */
		static 		$name 				= '';
		/**
		 * Post block tab
		 * @var string 	$group 	
		 */
		static 		$group 				= 'Post Blocks';
		
		/**
		 * Post block shortcode
		 * @var string 	$react 
		 */
		static 		$react 	= 'post_block_base';

		/**
		 * Post block shortcode description
		 * @var string 	$shortcode_desc
		 */
		static 		$shortcode_desc 	= '';

		/**
		 * Post block icon class/urldecode(str)
		 * @var string 	$icon
		 */
		static 		$icon 				= '';

		/**
		 * Post block posts object
		 * @var object 	$posts 	
		 */
		protected 	$posts 				= array();

		/**
		 * Listed posts
		 * @var array 	$listed_posts 	
		 */
		public 		$listed_posts 		= array();
		
		/**
		 * Default
		 * @var int 	$posts_per_page 
		 */
		static 		$posts_per_page 	= 5;

		static 		$ppp_steps 			= false;

		/**
		 * Minimum posts per page
		 * @var bool 	$min_ppp 
		 */
		static 		$min_ppp 			= false;

		/**
		 * if restrict is true, return default posts_per_page
		 * @var bool 	$restrict_ppp 
		 */
		static 		$restrict_ppp 		= false;

		public 		$min_column 		= false;

		protected 	$shortcode 			= true;

		static 		$pagebuilder 		= true;
		/**
		 * Block instance data
		 */
		public 		$block_instance 	= array();
		/**
		 * class instance
		 */
		private static $instance = null;

		/**
		 * Constructor
		 *
		 * @since 1.0
		 * @return void
		 */
		public function __construct(){}
		/**
		 * Generate Unique ID
		 */
		static function block_uid(){
			return self::$id_base . '-' . uniqid();
		}
		/**
		 * Helper to convert string to array
		 * @param mixed $str
		 */
		static function str_to_array( $str ){
			$arr = array();
			if( empty( $str ) )
				return $arr;

			if( is_string($str) ){
				if( strpos( $str,',') !== false ){
					$arr = explode( ',', $str );
					$arr = array_unique ( array_filter( array_map( 'trim', $arr ) ) );
				}else{
					$arr = (array) $str;
				}
			}

			return $arr;
		}
		/**
		 * Helper to rearrange instance
		 * @param array $instance
		 */
		static function rearrange_instance( $instance = array(), $defaults = array() ){

			$new_instance = array();
			// Push the variables to specific arrays
			foreach ( (array) $instance as $key => $value) {
				// String to array

				$old_val = $new_val = $value;
				// Args arrays
				if( in_array( $key, array( 'args', 'settings' ) ) ){
					
					$new_instance[$key] = $value;

				}elseif( in_array( $key, array( 

					// 'post_type',
					'post_status',

					'category__and',
					'category__in',
					'category__not_in', 

					'tag__and',
					'tag__in',
					'tag__not_in',
					'tag_slug__and',
					'tag_slug__in',

					'post__in',
					'post__not_in',
					'post_name__in',
					
					'author__in',
					'author__not_in',
				) ) ){

					if( is_string($value) && strpos( $value,',') !== false ){
						$new_val = explode( ',', $value );
						$new_val = array_unique ( array_filter( array_map( 'trim', $new_val ) ) );
					}

					if( !isset( $new_instance['args'] ) )
						$new_instance['args'] = array();

					if( $new_val )
						$new_instance['args'][$key] = (array) $new_val;
					
				// Args non-arrays
				}elseif( in_array( $key, array( 
					'p',
					'name',
					'page_id',
					'pagename',
					'include',

					'cat',
					'category_name',

					'tag',
					'tag_id',

					'author',
					'author_name',

					'year',
					'monthnum',
					'w',
					'day',
					'hour',
					'minute',

					'nopaging',
					'posts_per_page',
					'offset',
					'ignore_sticky_posts',

					'order',
					'orderby',
				) ) ){


					if( !isset( $new_instance['args'] ) )
						$new_instance['args'] = array();

					if( is_array($value) ){
						$value = implode(',', $value);
					}
					$new_instance['args'][$key] = $value;
				// Settings
				}elseif( in_array( $key, array( 'posts' ) ) ){
					// Do not change 'posts'
					$new_instance['settings'][$key] = $value;

				}else{

					if( !isset( $new_instance['settings'] ) )
						$new_instance['settings'] = array();

					// Only allow registered params
					if( isset( $defaults[$key] ) ){
						if( is_array( $value ) ){
							$value = implode(',', $value);
						}

						$new_instance['settings'][$key] = $value;
					}
				}
				
			}
			return $new_instance;
		}
		/**
		 * Prepare instance
		 * @param $instance
		 */
		public function prepare_instance( $instance = array() ){

			$this->listed_posts = array();
			$_args = $this->_get_args();
			$_settings = $this->_get_settings();


			// Extra		
			$extras = static::extra_shortcode_params();

			if( $extras ){

				// Push extra settings to array
				foreach ( $extras as $extra_key => $extra_val) {
					if( !isset( $_settings[$extra_key] ) ){
						$_settings[$extra_key] = $extra_val;
					}
				}
			}

			// Merge all param
			$all_params = array_merge( $_args, $_settings );

			// Make instance
			$instance = self::rearrange_instance( $instance, $all_params );

			if( empty( $instance['settings'] ) )
				$instance['settings'] = array();
			else{
				$instance['settings'] = wp_parse_args( $instance['settings'], $_settings );

				// Remove empty key
				// $instance['settings'] = array_filter($instance['settings']);
			}
			
			$instance['settings']['uid'] = $this->uid = self::block_uid();
			$instance['settings']['react'] = static::$react;
			
			// Keep the original post ID on single post to correct post order output
			if( is_singular( 'post' ) && !(defined( 'DOING_AJAX' ) && DOING_AJAX) ){
				global $post;
				$instance['settings']['post_id'] = $post->ID;
			}

			$instance['settings']['nonce'] = wp_create_nonce( "wp-pbs-get-{$this->uid}-ajax-nonce" );	
			$instance['settings']['wrapper'] = !empty( $instance['settings']['wrapper'] ) && in_array($instance['settings']['wrapper'], array('section', 'div')) ? $instance['settings']['wrapper'] : 'section';

			if( !empty( $instance['settings']['class'] ) ){
				$instance['settings']['class'] = self::block_class() . ' ' . $instance['settings']['class'];
			}else{
				$instance['settings']['class'] = self::block_class();
			}

			// Reset Excluding field
			$excludes = static::exclude_fields();
			if( $excludes ){
				foreach ( (array) $excludes as $field) {
					
					if( isset( $all_params[$field] ) ){
						$instance['settings'][$field] = $all_params[$field];
					}
				}
			}

			if( empty( $instance['settings']['block_id'] ) ){
				$instance['settings']['block_id'] = $this->uid;
			}

			/**
			 * Prepare args
			 */
			if( empty( $instance['args'] ) ){
				$instance['args'] = array();
			}else{
				
				$instance['args'] = wp_parse_args( $instance['args'], $_args );

				// Remove empty key
				$instance['args'] = array_filter($instance['args']);
				
			}

			if( static::$restrict_ppp || empty( $instance['args']['posts_per_page'] ) )
				$instance['args']['posts_per_page'] = intval( static::$posts_per_page );


			if( !empty( static::$min_ppp ) && intval( $instance['args']['posts_per_page'] ) < intval( static::$min_ppp ) ){
				$instance['args']['posts_per_page'] = static::$min_ppp;
			}

			$instance['args']['tax_query'] = array();

			// Include Formats
			if( !empty( $instance['settings']['format_in'] ) ){
				$formats = self::str_to_array( $instance['settings']['format_in'] );
				$formats = array_map( create_function( '$format', '$format = "post-format-{$format}"; return $format;'), $formats );
				// print_r( $formats );
				$instance['args']['tax_query'][] = array(
		            'taxonomy' => 'post_format',
		            'field' => 'slug',
		            'terms' => $formats
		        );
			}
			// Exclude formats
			if( !empty( $instance['settings']['format_not_in'] ) ){
				$formats = self::str_to_array( $instance['settings']['format_not_in'] );
				$formats = array_map( create_function( '$format', '$format = "post-format-{$format}"; return $format;'), $formats );
				// print_r( $formats );
				$instance['args']['tax_query'][] = array(
		            'taxonomy' => 'post_format',
		            'field' => 'slug',
		            'terms' => $formats,
		            'operator' => 'NOT IN',
		        );
			}
			// For single post only
			if( is_single() ){
				if( !empty( $instance['args']['post__not_in'] ) ){
					$instance['args']['post__not_in'] = array_merge( $instance['args']['post__not_in'], array( $GLOBALS['post']->ID ) );
				}else{
					$instance['args']['post__not_in'] = array( $GLOBALS['post']->ID );
				}
				$instance['args']['post__not_in'] = array_unique( $instance['args']['post__not_in'] );

				/** 
				 * Related posts for single article - private use only
				 */
				if( isset( $instance['settings']['related_by'] ) && ( $related_by = $instance['settings']['related_by'] ) && in_array( $related_by , array( 'cats', 'tags', 'author' ) ) ){
					// by categories
					if( 'cats' == $related_by ){
						$related_cats = Plugin::related_cats( $GLOBALS['post']->ID );
						if( !empty( $instance['args']['category__in'] ) ){
							$instance['args']['category__in'] = array_merge( $instance['args']['category__in'], $related_cats );
						}else{
							$instance['args']['category__in'] = $related_cats;
						}
					// by tags
					}elseif( 'tags' == $related_by ){
						$related_tags = Plugin::related_tags( $GLOBALS['post']->ID );
						if( !empty( $instance['args']['tag__in'] ) ){
							$instance['args']['tag__in'] = array_merge( $instance['args']['tag__in'], $related_tags );
						}else{
							$instance['args']['tag__in'] = $related_tags;
						}
					// by author
					}elseif( 'author' == $related_by ){
						$author = get_the_author_meta('ID');

						if( !empty( $author ) ){
							$instance['args']['author'] = $author;
						}
					}
				}
			}

			// Date Parameters
			if( !empty( $instance['settings']['time_period'] ) && 'default' !== $instance['settings']['time_period'] ){
				
				$this_year = date('Y');
				$this_month = date('m');
				$this_week = date('W');

				// This week
				if( 'this_week' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'year' => $this_year,
							'week' => $this_week,
						),
					);
				// Last week
				}elseif( 'last_week' == $instance['settings']['time_period'] ){

					if ( $this_week != 1 )
						$lastweek = $this_week - 1;
					else
						$lastweek = 52;

					if ($lastweek == 52)
						$this_year = $this_year - 1;

					$instance['args']['date_query'] = array(
						array(
							'year' => $this_year,
							'week' => $lastweek,
						),
					);
				// This month
				}elseif( 'this_month' == $instance['settings']['time_period'] ){

					$instance['args']['date_query'] = array(
						array(
							'year' => $this_year,
							'month' => $this_month,
						),
					);
				// Last month
				}elseif( 'last_month' == $instance['settings']['time_period'] ){
					if ( $this_month != 1 )
						$this_month = $this_month - 1;
					else
						$this_month = 12;

					if ($this_month == 12)
						$this_year = $this_year - 1;

					$instance['args']['date_query'] = array(
						array(
							'year' => $this_year,
							'month' => $this_month,
						),
					);
					// 'last_24hours'	=>__( 'Last 24 hours', 'wp-post-blocks' ),
				// Last 7 days
				}elseif( 'last_24hours' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '24 hours ago',
							'inclusive' => true,
						),
					);
				// Last 15 days
				}elseif( 'last_7days' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '7 days ago',
							'inclusive' => true,
						),
					);
				// Last 15 days
				}elseif( 'last_15days' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '15 days ago',
							'inclusive' => true,
						),
					);
				// Last 30 days
				}elseif( 'last_30days' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '30 days ago',
							'inclusive' => true,
						),
					);
				// Last 45 days
				}elseif( 'last_45days' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '45 days ago',
							'inclusive' => true,
						),
					);
				// Last 60 days
				}elseif( 'last_60days' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '60 days ago',
							'inclusive' => true,
						),
					);
				// Last 90 days
				}elseif( 'last_90days' == $instance['settings']['time_period'] ){
					$instance['args']['date_query'] = array(
						array(
							'after'     => '90 days ago',
							'inclusive' => true,
						),
					);
				}
			}

			// Advanced Orderby
			if( !empty( $instance['settings']['advanced_orderby'] ) ){

				$advanced_orderby = $instance['settings']['advanced_orderby'];
				// list post using meta key _post_view
				if( 'meta_post_views' == $advanced_orderby ){
					// Support Post Views Counter
					if( function_exists( 'pvc_get_post_views' ) ){
						$instance['args']['orderby'] = 'post_views';
					}else{
						// Support WP-PostViews
						$meta_key = function_exists( 'the_views' ) ? 'views' : '_post_views';
						$meta_key = apply_filters( 'wp_post_blocks/post_views_meta_key', $meta_key );
						// Overwrite Query order by
						$instance['args']['orderby'] = "meta_value_num {$instance['args']['orderby']}";
						$instance['args']['meta_query'] = array(
							array(
								'key'     	=> $meta_key,
								'value'   	=> apply_filters( 'wp_post_blocks/post_views_at_least_value', 10 ),
				    			'type' 		=> 'NUMERIC',
								'compare' 	=> '>',
							)
						);
						
					}
				}
			}
			$this->block_instance = apply_filters( 'wp_post_blocks/block_instance', $instance, static::$react );
		}

		/**
		 * Block class
		 *
		 * @return string
		 */
		static function block_class(){

			$classes = array(
				static::$id_base,
				static::$id,
				sanitize_key( sanitize_title( static::$group ) )
			);
			
			return join( ' ', $classes );
		}
		/**
		 * Before template
		 * Handling output by rewrite this template
		 *
		 * @param array $settings
		 * @param array $misc
		 * @return void
		 */
		public function render_template_loop_start( $settings = array(), $misc = array() ){

		}

		public function render_template_before( $settings = array(), $misc = array() ){

		}
			/**
			 * Post template
			 * Handling output layout by rewrite this template
			 *
			 * @param array $settings
			 * @param array $misc
			 * @return void
			 */
			abstract public function render_template( $settings = array(), $misc = array() );


		public function render_template_after( $settings = array(), $misc = array() ){

		}
		/**
		 * after template
		 * Handling output by rewrite this template
		 *
		 * @param array $settings
		 * @param array $misc
		 * @return void
		 */
		public function render_template_loop_end( $settings = array(), $misc = array() ){

		}

		/**
		 * Get posts
		 *
		 * @param array $instance
		 * @return void
		 */
		public function query_posts(){

			$args = $this->block_instance['args'];
			$settings = $this->block_instance['settings'];

			// Test
			// $args['posts_per_page'] = 2;
			// Jetpack posts
			if( !empty( $settings['advanced_orderby'] ) 
				&& 'jetpack_post_views' == $settings['advanced_orderby'] ){
				
				$range = 7;
				if( 'last_7days' == $settings['time_period'] ){
					$range = 7;
				// Last 15 days
				}elseif( 'last_15days' == $settings['time_period'] ){
					$range = 15;
				// Last 30 days
				}elseif( 'last_30days' == $settings['time_period'] ){
					$range = 30;
				// Last 45 days
				}elseif( 'last_45days' == $settings['time_period'] ){
					$range = 45;
				// Last 60 days
				}elseif( 'last_60days' == $settings['time_period'] ){
					$range = 60;
				// Last 90 days
				}elseif( 'last_90days' == $settings['time_period'] ){
					$range = 90;
				}

				$mv_post_args = array(
					'count'		=> intval( $args['posts_per_page'] ), // number of posts, this will set to limit
					'range'		=> $range, // last 7 days
					'end_date'	=> date( 'Y-m-d', current_time( 'timestamp' ) )
				);

				$post_ids = Plugin::jp_stats_get_post( 'postviews', $mv_post_args );

				$posts = get_posts( array(
					'orderby'			=> 'none',
					'include'        	=> join( ',', $post_ids ),
					'posts_per_page' 	=> intval( count( $post_ids ) ),
					'post__not_in'		=> !empty( $args['post__not_in'] ) ? $args['post__not_in'] : array()
				) );
			// Default posts
			}else{
				// Allow filtering.
				$args['suppress_filters'] = false;

				// Unique Posts
				if( !empty( $settings['unique_posts'] ) && !empty( $GLOBALS['wp_post_blocks_listed_posts'] ) ){
					if( !empty( $args['post__not_in'] ) ){
						$args['post__not_in'] = array_merge( $args['post__not_in'], $GLOBALS['wp_post_blocks_listed_posts'] );
					}else{
						$args['post__not_in'] = $GLOBALS['wp_post_blocks_listed_posts'];
					}
				}
				
				$posts = get_posts( $args );


			}

			// print_r( $args );

			if( !empty( $posts ) ){
				return $posts;
			}

			return false;
		}
		/**
		 * Get posts: return property $posts
		 *
		 * @return object|array
		 */
		public function get_posts(){
			return $this->posts;
		}

		/**
		 * Set the property $posts
		 *
		 * @return void
		 */
		public function set_posts( $posts ){
			$this->posts = $posts;
		}

		/**
		 * cleal property $posts
		 *
		 * @return void
		 */
		public function clean_posts(){
			$this->set_posts( array() );
		}
		/**
		 * Prepare posts: Assign post results to property posts 
		 *
		 * @return void
		 */
		public function prepare_posts(){

			if( !empty( $this->block_instance['settings']['posts'] ) ){
				$this->set_posts( $this->block_instance['settings']['posts'] );
				return;
			}

			// Clean post before getting new query
			$this->clean_posts();

			$posts = $this->query_posts();

			if( !empty( $posts ) ){
				$this->set_posts( $posts );

				return true;
			}
		}
		/**
		 * Check if have posts
		 *
		 * @return bool
		 */
		public function have_posts(){
			if( !empty( $this->posts ) )
				return true;
			return false;
		}
		/**
		 * Post Query
		 *
		 * @param 	$instance
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 * @return 	array
		 */
		public function the_loop(){

			$args = $this->block_instance['args'];
			$settings = $this->block_instance['settings'];

			if( !isset( $GLOBALS['wp_post_blocks_listed_posts'] ) )
				$GLOBALS['wp_post_blocks_listed_posts'] = array();

			$posts = $this->get_posts();

			if( empty( $posts ))
				return $this->listed_posts;

			// Backup global post
			global $post, $pbs_block;

			$pbs_block = static::$react;
			$temp_post = $post;
			$count = $flag = 0;

			// Misc settings for template()
			$misc = array(
				'count'			=> 0, // total posts count per batch
				'flag'			=> 0, // increment counter, reset on batch
				'ppp_flag'		=> 0, // increment counter, reset on every static::$posts_per_page
				'order'			=> 0, // increment counter for paged, won't be reset
				'is_paged'	=> false,
			);

			if( !empty( $this->block_instance['args']['post__not_in'] ) && defined( 'DOING_AJAX' ) && DOING_AJAX ){
				$misc['order'] = count( $this->block_instance['args']['post__not_in'] );

				// If current viewing single post in the list, minus by 1
				if( !empty( $this->block_instance['settings']['post_id'] ) 
					&& in_array( $this->block_instance['settings']['post_id'], $this->block_instance['args']['post__not_in'] ) ){
					
					$misc['order'] = $misc['order'] - 1;					
				}
			}

			$misc['total'] 	= intval( count($posts) );
			// limit total if we have more posts than $args['posts_per_page']
			if( $misc['total'] > $args['posts_per_page'] )
				$misc['total'] = intval( $args['posts_per_page'] );

			$in_the_loop = $GLOBALS['wp_query']->in_the_loop;

			if( $in_the_loop )
				$GLOBALS['wp_query']->in_the_loop = false;

			// Push queried ids for nested queries to avoid duplicated posts
			$queried_ids 	= wp_list_pluck( $posts, 'ID' );
			$misc['ids']	= $queried_ids;

			do_action( 'wp_post_blocks/render_template_loop_start', $settings, $misc );

			$this->render_template_loop_start( $settings, $misc );

			foreach ( $posts as $post ) : setup_postdata( $post );
			
				// This is for jetpack
				if( !empty( $settings['unique_posts'] ) && $post->ID == $temp_post->ID )
					continue;
			
				$GLOBALS['in_pbs_loop'] = true;

				$misc['count']++;
				$misc['flag']++;
				$misc['ppp_flag']++;
				$misc['order']++;

				if( in_array( $this->block_instance['settings']['navigation'], array( 'prev_next', 'prev_next_top' ) ) 
					&& intval( $misc['order'] ) > intval( $misc['total'] ) ){
					$misc['is_paged'] = true;
				}

				do_action( 'wp_post_blocks/before_render_template', $settings, $misc );
				
				$this->render_template_before( $settings, $misc );
				// Render post template
				$this->render_template( $settings, $misc );

				$this->render_template_after( $settings, $misc );

				do_action( 'wp_post_blocks/after_render_template', $settings, $misc );

				// Push listed posts to array.
				if( !empty( $post->ID ) && !in_array( $post->ID, $this->listed_posts ) ){
					$this->listed_posts[] = $post->ID;
				}
				if( !empty( $post->ID ) && !in_array( $post->ID, $GLOBALS['wp_post_blocks_listed_posts']) )
					$GLOBALS['wp_post_blocks_listed_posts'][] = $post->ID;

				if( static::$posts_per_page == $misc['ppp_flag']){
					$misc['ppp_flag'] = 0;
				}
				// reset flag
				if( $args['posts_per_page'] == $misc['flag']){
					$misc['flag'] = 0;

					// Break the page if reached flag, for anonymous post!
					break;
				}

			endforeach;

			$this->render_template_loop_end( $settings, $misc );

			do_action( 'wp_post_blocks/render_template_loop_end', $settings, $misc );
			
			$GLOBALS['in_pbs_loop'] = false;

			wp_reset_postdata();

			if( $in_the_loop )
				$GLOBALS['wp_query']->in_the_loop = true;

			// Restore global post
			$post = $temp_post;

			// Return listed_posts
			return $this->listed_posts;
		}
		/**
		 * Start column
		 *
		 * @param 	string
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function start_col( $ex_class = '', $append = true  ){
			$classes = $append ? 'pbs-col' : '';
			$classes .= $ex_class = trim( $ex_class ) ? " {$ex_class}" : '';
			$classes = trim( $classes );

			echo '<div class="' . esc_attr( $classes ) . '">';
		}
		/**
		 * End column
		 *
		 * @param 	string
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function end_col( $ex_class = '' ){
			echo '</div>';
			if( $ex_class )
				echo "<!--/{$ex_class}-->";
		}

		/**
		 * Start row
		 *
		 * @param 	string
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function start_row( $ex_class = '', $append = true ){
			$classes = $append ? 'pbs-row' : '';
			$classes .= $ex_class = trim( $ex_class ) ? " {$ex_class}" : '';
			$classes = trim( $classes );
			
			echo '<div class="' . esc_attr( $classes ) . '">';
		}
		/**
		 * End row
		 *
		 * @param 	string
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function end_row( $ex_class = '' ){
			echo '</div>';
			if( $ex_class )
				echo "<!--/{$ex_class}-->";
		}

		public function block_style(){

			// Remove Navigation if has custom posts
			include( Plugin::locate_template('parts/style') );
		}

		/**
		 * Start the block
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return string
		 */
		public function start_block(){

			$this->block_style();
			
			$col_w = false;
			
			if( empty( $col_w ) && !empty( $this->block_instance['settings']['col_w'] ) )
				$col_w = $this->block_instance['settings']['col_w'];

			$classes = $this->block_instance['settings']['class'];
			
			// Small Title
			$classes .= !empty( $this->block_instance['settings']['small_title'] ) ? ' small-title' : '';

			// Text alignment
			if( !empty( $this->block_instance['settings']['text_align'] ) && in_array( $this->block_instance['settings']['text_align'], array( 'center', 'right' ) ) ){
				$classes .= " text-{$this->block_instance['settings']['text_align']}";
			}
			// Start section
			echo wp_sprintf( '<%s id="%s" class="first-page %s" data-role="wrapper" data-uid="%s" data-width="%s">',
				esc_html( $this->block_instance['settings']['wrapper'] ),
				esc_attr( sanitize_key( $this->block_instance['settings']['block_id'] ) ),
				esc_attr( trim( $classes ) ),
				esc_attr( $this->uid ),
				esc_attr( apply_filters( 'wp_post_blocks/column_width', $col_w, $this->block_instance ) )

			);
			
			echo wp_sprintf( '<div class="%s" data-role="inner">', esc_attr( self::$id_base . '-inner' ) );
		}

		/**
		 * End the block
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return string
		 */
		public function end_block(){

			echo '</div>';
			// End section
			echo wp_sprintf( '</%s>', esc_html( $this->block_instance['settings']['wrapper'] ) );?><!--/<?php echo esc_html( $this->block_instance['settings']['uid'] );?>-->
			<?php
		}

		/**
		 * Block Navigation using ajax method
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return string
		 */
		public function block_navigation(){

			// Remove Navigation if has custom posts
			if( !empty( $this->block_instance['settings']['posts'] ) ){
				// unset( $instance['settings']['posts'] );
				return;
			}

			include( Plugin::locate_template('parts/nav') );
		}

		public function block_preloader(){

			// Remove Navigation if has custom posts
			if( !empty( $this->block_instance['settings']['posts'] ) ){
				// unset( $instance['settings']['posts'] );
				return;
			}

			include( Plugin::locate_template('parts/preloader') );
		}

		/**
		 * Block header
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return string
		 */
		public function block_header(){
			$html = '';

			if( empty( $this->block_instance['settings']['hide_title'] ) && !empty( $this->block_instance['settings']['title'] ) ){

				include( Plugin::locate_template('parts/header') );
			}

		}
		/**
		 * Block filter
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function block_filter(){

			if( empty( $this->block_instance['settings']['filter_by'] ))
				return;

			// Filter Nav
			if( 'none' !== ($filter_by = $this->block_instance['settings']['filter_by'] ) ){
				$key = 'filter_cats';
				$tax = 'category';

				if( 'tags' === $filter_by ){
					$key = 'filter_tags';
					$tax = 'post_tag';
				}

				if( !empty( $this->block_instance['settings'][$key] ) ){
					$ids = $this->block_instance['settings'][$key];
					
				}else{
					
					if( 'tags' === $filter_by ){
						$ids = !empty( $this->block_instance['args']['tag_id'] ) ? $this->block_instance['args']['tag_id'] : '';
					}elseif( 'categories' === $filter_by ){

						$ids = !empty( $this->block_instance['args']['category__in'] ) ? $this->block_instance['args']['category__in'] : ( !empty( $this->block_instance['args']['cat'] ) ? $this->block_instance['args']['cat'] : '' );
						
					}
					

				}

				if( empty( $ids ) )
					return;

				if( !is_array( $ids ) ){

					if( strpos( $ids,',') !== false ){
						$ids = explode( ',', $ids );
						$ids = array_unique ( array_filter( array_map( 'trim', $ids ) ) );	
					}else{
						if( $ids ){
							$ids = (array) $ids;
						}
					}
					
				}
				
				if( !empty( $ids ) ){
					$filter_style = $this->block_instance['settings']['filter_style'];
					$filter_items = array();
					$single_url = '';
					$count = 0;

					foreach ( $ids as $term_id ) {

						$term = get_term( $term_id, $tax );
						if ( $term && !is_wp_error( $term ) ){
							$count++;

							if( $key == 'filter_tags' ){
								$args = array( 'tag__in' => $term->term_id );
							}elseif( $key == 'filter_cats' ){
								$args = array( 'category__in' => $term->term_id );
							}
							
							$filter_items[] = wp_sprintf( '<li data-id="%s"><a href="%s" title="%s" data-role="filter" data-args="%s">%s</a></li>',
								esc_attr( $term->term_id ),
								esc_url( get_term_link( $term->term_id ) ),
								esc_attr( $term->name ),
								esc_attr( @wp_json_encode( $args ) ),
								$term->name
							);

							if( 1 == $count ){
								$single_url = wp_sprintf( '<a href="%s" title="%s" >%s</a>',
									esc_url( get_term_link( $term->term_id ) ),
									esc_attr( $term->name ),
									!empty( $this->block_instance['settings']['filter_style_url_text'] ) ? $this->block_instance['settings']['filter_style_url_text'] : wp_sprintf( _x( 'More in %s', 'more url - filter nav', 'wp-post-blocks' ), $term->name )
								);
							}

						}
					}
					echo '<div class="pbs-filter" data-type="' . esc_attr( $filter_by ) . '">';

						if( ( 'single_url' === $filter_style && !empty( $single_url ) )
							|| ( count( $filter_items ) === 1 )
						){
							print( $single_url );
						}else if( !empty( $filter_items ) && 'single_url' !== $filter_style && count( $filter_items ) > 1 ){
							echo '<ul class="' . esc_attr( $filter_style ) . '-filter">';

								// Inline filter
								if( 'inline' == $filter_style ){
									echo join( '', $filter_items );
								}
								// Dropdown filter
								echo wp_sprintf( '<li data-id="%s" class="more"><a href="%s" title="%s" rel="nofollow">%s</a><ul class="dropdown-filter">%s</ul></li>',
									esc_attr( 'more' ),
									'javascript:void(0)',
									esc_attr__('More', 'wp-post-blocks' ),
									esc_html__('More', 'wp-post-blocks' ),
									'inline' !== $filter_style ? join( '', $filter_items ) : ''
								);
							echo '</ul>';
						}
						
					echo '</div>';
				}
			}
		}

		/**
		 * Block footer
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return string
		 */
		public function block_footer(){

			return '';
			
			if( !empty( $this->block_instance['title'] ) ){
				echo wp_sprintf( '<div class="%s">', esc_attr( self::$id_base . '-footer' ) );
				
				echo '</div>';
			}

		}

		/**
		 * Before block content
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function before_block_content(){

		}

		/**
		 * Block content
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function block_content(){

			$this->before_block_content();
			$class = self::$id_base . '-content';
			$class .= !empty( $this->block_instance['settings']['content_class'] ) ? " {$this->block_instance['settings']['content_class']}" : '';
			?>
			<div class="<?php echo esc_attr( $class );?>" data-role="content">
				<?php
				$this->the_loop();
				?>
			</div>
			<?php
			$this->after_block_content();
			
		}

		/**
		 * After block content
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function after_block_content(){
			
		}
		/**
		 * Render block
		 *
		 * @param 	array
		 * @version 1.0
		 * @since 	1.0
		 * @return 	void
		 */
		public function render_block( $args = array() ){

			$this->prepare_instance( $args );

			$this->prepare_posts();

			if( !$this->have_posts() )
				return $this->listed_posts;

			global $pbs_block;

			$pbs_block = static::$react;

			echo !empty( $args['before'] ) ? $args['before'] : '';

			// Start the block
			$this->start_block();

				// Block header
				$this->block_header();

				// Block content
				$this->block_content();

				// Block footer
				$this->block_footer();

				// Block navigation
				if( ( !empty( $this->block_instance['settings']['navigation'] ) && 'none' !== $this->block_instance['settings']['navigation'] )  ){

					// Check if this is the only batch
					if( intval( $this->block_instance['args']['posts_per_page'] ) <= count( $this->listed_posts ) ){
						if( empty( $this->block_instance['args']['post__not_in'] ) )
							$this->block_instance['args']['post__not_in']  = array();

						$this->block_instance['args']['post__not_in'] = array_merge( ( array ) $this->block_instance['args']['post__not_in'], ( array ) $this->listed_posts );
						
						$this->block_navigation();

						?>
						<div class="pbs-vars hidden" data-current-page="1" data-args="<?php echo esc_attr( wp_json_encode( array_filter( $this->block_instance['args'] ) ) );?>" data-settings="<?php echo esc_attr( wp_json_encode( array_filter( $this->block_instance['settings'] ) ) );?>">
						</div>
						<?php

					}
					
				}

			// End the block
			$this->end_block();

			echo !empty( $args['after'] ) ? $args['after'] : '';

			// Return listed_posts
			return $this->listed_posts;
		}
		
		private function _get_settings(){
			return array(
				'block_id'		=> false,
				'post_id'		=> false,
				'title' 		=> false,
				'hide_title'	=> false,
				'subtitle' 		=> false,
				'class' 		=> false,
				'atts'			=> false,
				'info'			=> false,
				'info_above'	=> false,
				'thumb_cat'		=> false,
				'show_rating'	=> false,
				'excerpt'		=> false,
				'excerpt_length'=> '30',
				'small_title'	=> false,
				'text_align'	=> false,
				'navigation' 	=> false,
				'thumb_style'	=> false,
				'thumb_size'	=> false,
				'wrapper'		=> 'section',
				'format_in'		=> false, //video, status
				'format_not_in'	=> false,
				'time_period'	=> false,
				'related_by'	=> false, //cats, tags, author - automatically get related posts using id
				'unique_posts'	=> false,
				'advanced_orderby'	=> false, // advanced_orderby will overwrite args, support meta_post_views, jetpack_post_views

				'filter_by'		=> false,
				'filter_cats'	=> false,
				'filter_tags'	=> false,
				'filter_style'	=> false,
				'filter_style_url_text'	=> false,

				'custom_style'	=> false,
				'accent_color'	=> false,

				// 'is_ajax_filter'=> 0,
				'template'		=> false,
				'content_class' => false,
				
				// Dev only
				'posts'			=> false
			);
		}

		private function _get_args(){
			return array(
				/**
				 * Category: args
				 */ 
				'post_type'		=> 'post',
				'post_status'	=> false,

				// Post & Page Parameters
				'p'				=> false,
				'name'			=> false,
				'page_id'		=> false,
				'pagename'		=> false,
				'include'		=> false,
				'post__in'		=> false,
				'post__not_in'	=> false,
				'post_name__in'	=> false,

				// Category Parameters
				'cat'			=> false,
				'category_name'	=> false,
				'category__and'	=> false,
				'category__in'	=> false,
				'category__not_in'	=> false,

				'tag'			=> false,
				'tag_id'		=> false,
				'tag__and'		=> false,
				'tag__in'		=> false,
				'tag__not_in'	=> false,
				'tag_slug__and'	=> false,
				'tag_slug__in'	=> false,


				// Author Parameters
				'author'		=> false,
				'author_name'	=> false,
				'author__in'	=> false,
				'author__not_in'	=> false,

				// Date Parameters
				'year'			=> false,
				'monthnum'		=> false,
				'w'				=> false,
				'day'			=> false,
				'hour'			=> false,
				'minute'		=> false,

				// Pagination Parameters
				'nopaging'		=> false,
				'posts_per_page'=> static::$posts_per_page,
				'offset'		=> false,
				'ignore_sticky_posts'	=> false,

				// Order & Orderby Parameters
				'order'			=> 'DESC',
				'orderby'		=> 'date',

				// Taxonomies
				'taxonomies'	=> false,
			);
		}

		
		
		public static function extra_shortcode_params(){

		}
		/**
		 * Exclude fields
		 *
		 */
		public static function exclude_fields(){
			return array();
		}
		/**
		 * Extra fields
		 *
		 */
		public static function extra_fields(){
			return array();
		}
		/**
		 * shortcode parameters
		 *
		 * @since 1.0
		 * @return (array)
		 */
		public static function get_params(){
			// Return faky array of field to reduce admin load			
			$params = array(
				
                'title' => array(
					'title' 	=> esc_html__('Title', 'wp-post-blocks'),
					'type' 		=> 'text',
					'id' 		=> 'title',
					'std' 		=> '',
					'desc' 		=> esc_html__('Title for block (Optional)', 'wp-post-blocks'),

					'admin_label' => true
				),
				'hide_title' => array(
					'title' 	=> esc_html__('Hide title', 'wp-post-blocks'),
					'type' 		=> 'checkbox',
					'id' 		=> 'hide_title',
					'std' 		=> '',
					'desc' 		=> esc_html__('Check to hide title', 'wp-post-blocks'),

				),
				
                /*'subtitle' => array(
                	'title'		=> esc_html__('Subtitle (Optional)', 'wp-post-blocks'),
					'type' 		=> 'text',
					'id' 		=> 'subtitle',
					'std' 		=> '',
					'desc' 		=> ''
				),*/
                'block_id' => array(
					'title' 	=> esc_html__('ID (Optional)', 'wp-post-blocks'),
					'type' 		=> 'text',
					'id' 		=> 'block_id',
					'std' 		=> '',
					'desc' 		=> esc_html__('Unique ID for this block, just in case you want to apply custom css style. (Allow alphanumeric characters, dash and underscore.)', 'wp-post-blocks'),
				),
				'thumb_style' => array(
					'title' 	=> esc_html__( 'Thumbnail style', 'wp-post-blocks' ),
					'type' 		=> 'select',
					'id' 		=> 'thumb_style',
					'std'		=> 'default',
					'options' 	=> array(
						'default' 		=> esc_html__( 'Default 4:3', 'wp-post-blocks' ),
						'square'		=> esc_html__( 'Square - 1:1', 'wp-post-blocks' ),
						'portrait'		=> esc_html__( 'Portrait - 3:4', 'wp-post-blocks' ),
						'wide'			=> esc_html__( 'Wide 16:9', 'wp-post-blocks' ),
						'uwide'			=> esc_html__( 'Ultra Wide - 21:9', 'wp-post-blocks' ),
						'xwide'			=> esc_html__( 'Extreme Wide - 21:7', 'wp-post-blocks' )
					),
					'desc' 	=> esc_html__( 'Note that thumbs of block might be overwritten programmatically by block.', 'wp-post-blocks' ),
					'save_always' 	=> true,
				),

				'thumb_size' => array(
					'title' 	=> esc_html__( 'Thumbnail Size', 'wp-post-blocks' ),
					'type' 		=> 'select',
					'id' 		=> 'thumb_size',
					'std'		=> '',
					'options' 	=> array(
						''	=> esc_html__( 'Default', 'wp-post-blocks'),
						'thumbnail' => esc_html__( 'Thumbnail', 'wp-post-blocks'),
						'medium'    => esc_html__( 'Medium', 'wp-post-blocks'),
						'large'     => esc_html__( 'Large', 'wp-post-blocks'),
						'full'      => esc_html__( 'Full Size', 'wp-post-blocks' )
					),
					'save_always' 	=> true,
				),
				
				'info_above' => array(
					'title' 	=> esc_html__( 'Post Info. (above)', 'wp-post-blocks' ),
					'type' 		=> 'multicheck',
					'id'	 	=> 'info_above',
					'desc'	 		=> esc_html__( 'This will be displayed above the post title.', 'wp-post-blocks' ),
					'options' 	=> array(

						'cats' 			=> esc_html__( 'Category', 'wp-post-blocks' ),
						'cats-alt'		=> esc_html__( 'Category tag', 'wp-post-blocks' ),
						
						'byline'		=> esc_html__( 'Byline', 'wp-post-blocks' ),
						'byline-alt'	=> esc_html__( 'Byline with avatar ', 'wp-post-blocks' ),
						'byline-twitter'=> esc_html__( 'Byline - @twitter_username ', 'wp-post-blocks' ),
						
						'date'			=> esc_html__( 'Date', 'wp-post-blocks' ),
						'datetime'			=> esc_html__( 'Date with time', 'wp-post-blocks' ),
						'datetime-updated'	=> esc_html__( 'Datetime with last updated', 'wp-post-blocks' ),

						'views'			=> esc_html__( 'Post Views', 'wp-post-blocks' ),
						'comments'		=> esc_html__( 'Comments', 'wp-post-blocks' ),
						// 'fb-comments'	=> esc_html__( 'Facebook comments', 'wp-post-blocks' ),
						'fb-shares'		=> esc_html__( 'Facebook shares', 'wp-post-blocks' ),
						'reading-time'		=> 'Reading time',
					),

					'save_always' 	=> true,
				),
				'info' => array(
					'title' 		=> esc_html__( 'Post Info. (below)', 'wp-post-blocks' ),
					'type' 			=> 'multicheck',
					'id'	 		=> 'info',
					'desc'	 		=> esc_html__( 'This will be displayed above the post title.', 'wp-post-blocks' ),
					'options' 		=> array(

						'cats' 			=> esc_html__( 'Category', 'wp-post-blocks' ),
						'cats-alt'		=> esc_html__( 'Category tag', 'wp-post-blocks' ),
						
						'byline'		=> esc_html__( 'Byline', 'wp-post-blocks' ),
						'byline-alt'	=> esc_html__( 'Byline with avatar ', 'wp-post-blocks' ),
						'byline-twitter'=> esc_html__( 'Byline - @twitter_username ', 'wp-post-blocks' ),
						
						'date'			=> esc_html__( 'Date', 'wp-post-blocks' ),
						'datetime'			=> esc_html__( 'Date with time', 'wp-post-blocks' ),
						'datetime-updated'	=> esc_html__( 'Datetime with last updated', 'wp-post-blocks' ),
						
						'views'			=> esc_html__( 'Post Views', 'wp-post-blocks' ),
						'comments'		=> esc_html__( 'Comments', 'wp-post-blocks' ),
						// 'fb-comments'	=> esc_html__( 'Facebook comments', 'wp-post-blocks' ),
						'fb-shares'		=> esc_html__( 'Facebook shares', 'wp-post-blocks' ),
						'reading-time'		=> 'Reading time',			
					),
					'save_always' 	=> true,
				),
				'info_msg' => array(
					'title' 		=> '',
					'type' 			=> 'html',
					'id'	 		=> 'info_msg',
					'desc'			=> 'Reading Time relies on <a href="https://wordpress.org/plugins/reading-time-wp/" target="_blank">Reading Time WP</a>, make sure you had it installed and activated.'
				),
				
				'thumb_cat' => array(
					'title' 		=> esc_html__( 'Show cat tag on thumbnail', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id'	 		=> 'thumb_cat',
					'std' 			=> 0,
					'save_always' 	=> true,
				),
				'excerpt' => array(
					'title' 		=> esc_html__( 'Excerpt Content', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id'	 		=> 'excerpt',
					'std' 			=> 0,
					'save_always' 	=> true,
					'desc' 		=> esc_html__( 'Excerpt might be overwritten by blocks.', 'wp-post-blocks' ),
				),
				
				'excerpt_length' => array(
					'title' 		=> esc_html__( 'Excerpt Length', 'wp-post-blocks' ),
					'type' 			=> 'number',
					'id'	 		=> 'excerpt_length',
					'std' 			=> '',
					'desc' 			=> esc_html__( 'Define your custom excerpt length. Excerpt length might be defined by block. Default length: 30 characters.', 'wp-post-blocks' ),
				),
				
				'show_rating' => array(
					'title' 		=> esc_html__( 'Show Review result', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id'	 		=> 'show_rating',
					'desc'	 		=> wp_sprintf(esc_html__( 'This option requires %s installed and activated.', 'wp-post-blocks' ), '<a href="https://wordpress.org/plugins/wp-review/" target="blank">WP-Review</a> or <a href="https://wordpress.org/plugins/wp-real-review/" target="blank">WP Real Review</a>' ),
					'std' 			=> 0,
					'save_always' 	=> true,
				),
				'text_align' => array(
					'title' 		=> esc_html__( 'Text Content Alignment', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id' 			=> 'text_align',
					'desc' 			=> '',
					'options' 		=> array( 
						''			=> esc_html__( 'Default - Left', 'wp-post-blocks' ),
						'center'	=> esc_html__( 'Center', 'wp-post-blocks' ),
						'right'		=> esc_html__( 'Right', 'wp-post-blocks' ),
					)
				),
				'small_title' => array(
					'title' 		=> esc_html__( 'Small Article Heading title', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id' 			=> 'small_title',
					'std' 			=> 0,
					'desc' 			=> esc_html__( 'Force entry titles to display the same size (1.6rem ~ 16px for regular articles and 1.8rem ~ 18px for brick articles)', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					// 'admin_label' 	=> true
				),
				'navigation' => array(
					'title' 		=> esc_html__( 'Pagination Nav', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'	 		=> 'navigation',
					'desc'	 		=> esc_html__( 'Load more posts using ajax techniques. Note that Next/Previous links (Top) will not show if Category/Tags Filter is enabled', 'wp-post-blocks' ),
					'std'			=> 'none',
					'options' 		=> array(
						'none'				=> esc_html__( 'None', 'wp-post-blocks' ),
						'prev_next'			=> esc_html__( 'Next/Previous links', 'wp-post-blocks' ),
						'prev_next_top'		=> esc_html__( 'Next/Previous links (Top)', 'wp-post-blocks' ),
						'load_more'			=> esc_html__( 'Load more', 'wp-post-blocks' ),
						'infinite_scroll'	=> esc_html__( 'Scroll infinitely', 'wp-post-blocks' ),
					),
					'save_always' 	=> true,
				),
                'class' => array(
                	'title' 		=> esc_html__('Extra Class (Optional)', 'wp-post-blocks'),
					'type' 			=> 'text',
                	'id'	 		=> 'class',
					'std' 			=> '',
					'desc'	 		=> esc_html__('Extra Class for this post block', 'wp-post-blocks'),
					//'admin_label' => true
				),
				/**
				 * Query Settings
				 */
				'cat' => array(
					'title' 		=> esc_html__( 'Categories', 'wp-post-blocks' ),
					'id'	 		=> 'cat',
					'type'			=> 'tag_search',
					'desc'	 		=> esc_html__( 'Specify categories you wish to retrieve posts. Keep typing and you will be suggested. Note that this option will show posts from any children of specified categories. If you wish to show 1 level of specified categories, please use option __Categories in__ below.', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' ),
					'settings' 		=> array(
						'multiple' 		=> true,
						'sortable' 		=> true,
						'tax'			=> 'category'
					)
				),
				'category__in' => array(
					'title' 		=> esc_html__( 'Categories in', 'wp-post-blocks' ),
					'id'	 		=> 'category__in',
					'type' 			=> 'tag_search',
					'desc'	 		=> esc_html__( 'Specify categories you wish to retrieve posts from. Keep typing and you will be suggested. This DOES NOT SHOW posts from any children of specified categories.', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' ),
					'settings' 		=> array(
						'multiple' 		=> true,
						'sortable' 		=> true,
						'tax'			=> 'category'
					)
				),
				'category__not_in' => array(
					'title' 		=> esc_html__( 'Categories not in', 'wp-post-blocks' ),
					'id'	 		=> 'category__not_in',
					'type' 			=> 'tag_search',
					'desc'	 		=> esc_html__( 'Specify categories you wish to exclude posts from. Keep typing and you will be suggested. ', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' ),
					'settings' 		=> array(
						'multiple' 		=> true,
						'sortable' 		=> true,
						'tax'			=> 'category'
					)
				),
				
				'tag_id' => array(
					'title' 		=> esc_html__( 'Tags', 'wp-post-blocks' ),
					'id'	 		=> 'tag_id',
					'type'			=> 'tag_search',
					'desc'	 		=> esc_html__( 'Specify tags you wish to retrieve posts from. Keep typing and you will be suggested', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' ),
					'settings' 		=> array(
						'multiple' 		=> true,
						'sortable' 		=> true,
						'tax'			=> 'post_tag'
					)
				),
				'tag__not_in' => array(
					'title' 		=> esc_html__( 'Tags not in', 'wp-post-blocks' ),
					'id'	 		=> 'tag__not_in',
					'type' 			=> 'tag_search',
					'desc'	 		=> esc_html__( 'Specify categories you wish to exclude posts from. Keep typing and you will be suggested. ', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' ),
					'settings' 		=> array(
						'multiple' 		=> true,
						'sortable' 		=> true,
						'tax'			=> 'post_tag'
					)
				),

                'posts_per_page' => array(
					'title' 		=> esc_html__('Number of posts', 'wp-post-blocks'),
					'type' 			=> 'number',
					'id'	 		=> 'posts_per_page',
					'desc'	 		=> wp_sprintf( esc_html__('Number of Posts. Default %s. Note that default value will be overridden by specific post blocks.', 'wp-post-blocks'), static::$posts_per_page ) . ( !empty( static::$min_ppp ) ? '<br />' . wp_sprintf(esc_html__( 'Minimum posts for this block: %s', 'wp-post-blocks' ), static::$min_ppp ) : '' ),
					'std' 			=> static::$posts_per_page,
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' ),
				),
                'offset' => array(
					'title' 		=> esc_html__('Offset', 'wp-post-blocks'),
					'type' 			=> 'text',
					'id'	 		=> 'offset',
					'desc'	 		=> esc_html__('Number of posts to displace or pass over. The "offset" parameter is ignored when Number of posts (posts_per_page) = -1', 'wp-post-blocks'),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' )
					//'admin_label' => true
				),
				'order' => array(
					'title' 		=> esc_html__( 'Order', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'	 		=> 'order',
					'std'			=> 'DESC',
					'options' 		=> array(
						'DESC' 			=> esc_html__( 'Descending', 'wp-post-blocks' ),
						'ASC'			=> esc_html__( 'Ascending', 'wp-post-blocks' ),
					),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' )
					// 'admin_label' => true
				),
				'orderby' => array(
					'title' 		=> esc_html__( 'Order by', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'			=> 'orderby',
					'desc'	 		=> esc_html__( 'Sort retrieved posts by parameter. Defaults to "date" (post_date).', 'wp-post-blocks' ),
					'std'			=> 'date',
					'options' 		=> array(
						'date'			=> esc_html__( 'Date', 'wp-post-blocks' ),
						'title'			=> esc_html__( 'Title', 'wp-post-blocks' ),
						 'name'			=> esc_html__( 'Post slug', 'wp-post-blocks' ),
						 'author'		=> esc_html__( 'Author	', 'wp-post-blocks' ),
						 'comment_count'=> esc_html__( 'Number of comments', 'wp-post-blocks' ),
						 'modified'		=> esc_html__( 'Last modified date', 'wp-post-blocks' ),
						 'rand'			=> esc_html__( 'Random order', 'wp-post-blocks' ),
						 'none'			=> esc_html__( 'None', 'wp-post-blocks' ),
					),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' )
					// 'admin_label' => true
				),
				'advanced_orderby' => array(
					'title' 		=> esc_html__( 'Advanced Order by', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'			=> 'advanced_orderby',
					'desc'	 		=> wp_kses_post(__( 'This option will overwrite some of your settings.<br>- Most viewed (using metakey): Requires <a href="//wordpress.org/plugins/wp-postviews/" target="_blank">WP-PostViews</a> to be installed and activated.<br>- Most viewed (using Jetpack stats) requires Jetpack Stats module activated, and only takes params: Time Period & Number of post', 'wp-post-blocks' ) ),
					'std'			=> 'default',
					'options' 		=> array(
						'default'			=> esc_html__( 'Default', 'wp-post-blocks' ),
						'meta_post_views' 	=> esc_html__( 'Most viewed (using metakey)', 'wp-post-blocks' ),
						'jetpack_post_views'=> esc_html__( 'Most viewed (using Jetpack stats)', 'wp-post-blocks' ),
					),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' )
					// 'admin_label' => true
				),
				'time_period' => array(
					'title' 		=> esc_html__( 'Time Period', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'	 		=> 'time_period',
					'std'			=> 'default',
					'options' 		=> array(
						 'default'		=> esc_html__( 'Default', 'wp-post-blocks' ),

						 // 'this_week'	=> esc_html__( 'This week', 'wp-post-blocks' ),
						 // 'last_week'	=> esc_html__( 'Last week', 'wp-post-blocks' ),
						 // 'this_month'	=> esc_html__( 'This Month', 'wp-post-blocks' ),
						 // 'last_month'	=> esc_html__( 'Last Month', 'wp-post-blocks' ),
						
						 'last_7days'	=> esc_html__( 'Last 7 days', 'wp-post-blocks' ),
						 'last_15days'	=> esc_html__( 'Last 15 days', 'wp-post-blocks' ),
						 'last_30days'	=> esc_html__( 'Last 30 days', 'wp-post-blocks' ),
						 'last_45days'	=> esc_html__( 'Last 45 days', 'wp-post-blocks' ),
						 'last_60days'	=> esc_html__( 'Last 60 days', 'wp-post-blocks' ),
						 'last_90days'	=> esc_html__( 'Last 90 days', 'wp-post-blocks' ),
					),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Query Settings', 'wp-post-blocks' )
				),

				/*'unique_posts' => array(
					'title' 		=> esc_html__( 'Prevent Duplicate posts', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'desc'	 		=> '',
					'id'	 		=> 'unique_posts',
					'std' 			=> 0,
					'save_always' 	=> true,
					// 'admin_label' => true
				),*/
				/**
				 * Filter
				 */

				'filter_by' => array(
					'title' 		=> esc_html__( 'Filter by', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'	 		=> 'filter_by',
					'desc'	 		=> esc_html__( 'Select criteria for filter. Note that if No categories/tags below specified, selected categories/tags from Query Settings will be used.', 'wp-post-blocks' ),
					'std'			=> 'none',
					'options' 		=> array(
						'none'			=> esc_html__( 'None', 'wp-post-blocks' ),
						'tags'			=> esc_html__( 'Tags', 'wp-post-blocks' ),
						'categories'	=> esc_html__( 'Categories', 'wp-post-blocks' ),
						// 'authors'		=> esc_html__( 'Authors', 'wp-post-blocks' ),
					),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Filter', 'wp-post-blocks' )
				),
				'filter_style' => array(
					'title' 		=> esc_html__( 'Filter style', 'wp-post-blocks' ),
					'type' 			=> 'select',
					'id'	 		=> 'filter_style',
					'desc'	 		=> wp_kses_post(__( 'When block header doesn\'t have enough space, items in Inline list will be automatically moved to dropdown list.<br>Please specify only 1 category/tag when you use single url.', 'wp-post-blocks' ) ),
					'std'			=> 'inline',
					'options' 		=> array(
						'inline'		=> esc_html__( 'Inline List', 'wp-post-blocks' ),
						'dropdown'		=> esc_html__( 'Dropdown List', 'wp-post-blocks' ),
						'single_url'	=> esc_html__( 'Single Url', 'wp-post-blocks' ),
					),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Filter', 'wp-post-blocks' ),
					'dependency' 	=> array(
						'element' 		=> 'filter_by',
						'value' 		=> array( 'tags', 'categories', 'authors' ),
					),
				),

				'filter_style_url_text' => array(

					'title' 		=> esc_html__( 'Single url text', 'wp-post-blocks' ),
					'type' 			=> 'text',
					'id'	 		=> 'filter_style_url_text',
					'desc'	 		=> esc_html__( 'Default: More in {categories/tag}', 'wp-post-blocks' ),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Filter', 'wp-post-blocks' ),
					'dependency' 	=> array(
						'element' 		=> 'filter_style',
						'value' 		=> array( 'single_url' ),
					),
				),
				'filter_cats' => array(
					'title' 		=> esc_html__( 'Categories', 'wp-post-blocks' ),
					'type' 			=> 'tag_search',
					'id'	 		=> 'filter_cats',

					'desc'	 		=> esc_html__( 'Specify categories you wish to show on menu filter. Keep typing and you will be suggested.', 'wp-post-blocks' ),

					'settings' 		=> array(
						'multiple' 	=> true,
						'sortable' 	=> true,
						'tax'		=> 'category'
					),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Filter', 'wp-post-blocks' ),
					'dependency' 	=> array(
						'element' 		=> 'filter_by',
						'value' 		=> array( 'categories' ),
					),
				),
				'filter_tags' => array(
					'title' 		=> esc_html__( 'Tags', 'wp-post-blocks' ),
					'type' 			=> 'tag_search',
					'id'	 		=> 'filter_tags',

					'desc'	 		=> esc_html__( 'Specify tags you wish to show on menu filter. Keep typing and you will be suggested.', 'wp-post-blocks' ),
					
					'save_always' 	=> true,
					'group' 		=> esc_html__('Filter', 'wp-post-blocks' ),
					'settings' 		=> array(
						'multiple' 	=> true,
						'sortable' 	=> true,
						'tax'		=> 'post_tag'
					),
					'dependency' 	=> array(
						'element' 		=> 'filter_by',
						'value' 		=> array( 'tags' ),
					),
				),
				// Canceled
				/*'is_ajax_filter' => array(
					'type' 			=> 'checkbox',
					'title' 		=> esc_html__( 'Is ajax filter ?', 'wp-post-blocks' ),
					'id'	 	=> 'is_ajax_filter',
					'save_always' 	=> true,
					'value' 		=> 0,
					// 'admin_label' 	=> true

					'group' 		=> esc_html__('Filter', 'wp-post-blocks' ),
					'dependency' 	=> array(
						'element' 		=> 'filter_by',
						'value' 		=> array( 'tags', 'categories', 'authors' ),
					),
				),
				array(
					'type' 		=> 'sorted_list',
					'title' 	=> esc_html__( 'Teaser layout', 'js_composer' ),
					'id'	 => 'layout',
					'desc'	 => esc_html__( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', 'js_composer' ),
					'value' => 'title,image,text',
					'options' => array(
						array( 'image', esc_html__( 'Thumbnail', 'js_composer' ), '' ),
						array( 'title', esc_html__( 'Title', 'js_composer' ), '' ),
						array(
							'text',
							esc_html__( 'Text', 'js_composer' ),
							array(
								array( 'excerpt', esc_html__( 'Teaser/Excerpt', 'js_composer' ) ),
								array( 'text', esc_html__( 'Full content', 'js_composer' ) )
							)
						),
						array( 'link', esc_html__( 'Read more link', 'js_composer' ) )
					)
				),*/
				'custom_style' => array(
					'title' 		=> esc_html__( 'Generate Accent Color style for this block', 'wp-post-blocks' ),
					'type' 			=> 'checkbox',
					'id'	 		=> 'custom_style',
					'std' 			=> 0,

					'save_always' 	=> true,
					'group' 		=> esc_html__('Styling', 'wp-post-blocks' )
				),
				'accent_color' => array(
					'title' 		=> esc_html__( 'Pick custom accent color', 'wp-post-blocks' ),
					'type' 			=> 'color',
					'id'	 		=> 'accent_color',
					'desc'	 		=> esc_html__('If no color accent specified, this color will be overwritten by theme using category accent color (if available and supported)', 'wp-post-blocks' ),

					'save_always' 	=> true,
					'group' 		=> esc_html__('Styling', 'wp-post-blocks' ),
					'dependency' 	=> array(
						'element' 		=> 'custom_style',
						'value' 		=> 1,
					),
				)
            );
			if( !empty( static::$ppp_steps ) ){

				$ppp_options = array();

				for ($i=1; $i < 11; $i++) { 
					
					$p_count = 0;	
					$p_count = static::$posts_per_page * $i;
					$ppp_options[$p_count] = $p_count;
				}

				// Convert posts_per_page to select
				$params['posts_per_page']['type'] = 'select';
				$params['posts_per_page']['options'] = $ppp_options;

			}
			// Push message - canceled
			// if( $msg = static::vc_message_field() )
				// $params = array_merge( $msg, $params  );

			$extra_fields = static::extra_fields();

			if( $extra_fields ){
				$params = array_merge( $params, $extra_fields );
			}

			$exclude_fields = static::exclude_fields();

			if( $exclude_fields ){

				foreach ( (array) $exclude_fields as $field) {
					if( isset( $params[$field] ) ){
						unset( $params[$field] );
					}
				}
			}

			// class should be at the end.
			$class = $params['class'];
			unset( $params['class'] );

			return $params;
		}
	}
}