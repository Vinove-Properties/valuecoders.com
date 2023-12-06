<?php
/**
 * Class WP_Social_Counter_Widget
 *
 * @since 1.0.0
 */
class WP_Social_Counter_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_wpsc',
			'description' => esc_html__('Display the number of fans/subscribers/followers from Facebook, Google+, Twitter, Youtube and other social media networks.', 'wp-social-counter' ),
		);

		parent::__construct( 'WP_Social_Counter_Widget', esc_html__( 'WP Social Counter', 'wp-social-counter' ), $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if( class_exists( 'WP_Social_Counter_Frontend' ) ){
			echo WP_Social_Counter_Frontend::get_html( $instance );
		}

		if ( ! empty( $instance['desc'] ) ) {
			echo wp_sprintf( '<div class="wpsc-description">%s</div>', do_shortcode( $instance['desc'] ) );
		}
		
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		// Set up some default widget settings
		$defaults = array(
			'title' => esc_html__( 'Follow Us', 'wp-social-counter' ),
			'layout' => 'default',
			'design' => 'default',
			'shape' => 'default',
			'style' => 'default',
			'number_format' => 'default',
			'hide_count' => '',
			'inline' => '',
			'desc'	=> ''
		);
		$hide_count = isset( $instance['hide_count'] ) ? $instance['hide_count'] : 0;
		$inline = isset( $instance['inline'] ) ? $instance['inline'] : 0;
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'wpthms') ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
	    <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e('Layout:','wp-social-counter')?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
				<?php
					$options = array(
						'default'   => esc_html__( 'Default', 'wp-social-counter' ),
						'2_col'     => esc_html__( '2 Columns', 'wp-social-counter' ),
						'3_col'     => esc_html__( '3 Columns', 'wp-social-counter' )
					);
					foreach ($options as $key => $value) {
						echo wp_sprintf( '<option value="%s" %s>%s</option>', $key, selected( $instance['layout'], $key, false ), $value );
					}
				?>
	        </select>
		</p>
		<p><input id="<?php echo $this->get_field_id('inline'); ?>" name="<?php echo $this->get_field_name('inline'); ?>" type="checkbox"<?php checked( $inline ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('inline'); ?>"><?php esc_html_e( 'Show as Flexible Inline list for large screen', 'wp-social-counter'); ?></label></p>
	    <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'design' ) ); ?>"><?php esc_html_e('Design:','wp-social-counter')?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('design') ); ?>" name="<?php echo esc_attr( $this->get_field_name('design') ); ?>">
				<?php
					$options = array(
						'default'   => esc_html__( 'Default', 'wp-social-counter' ),
						'alt'     => esc_html__( 'Alt', 'wp-social-counter' ),
						'plain'     => esc_html__( 'Plain', 'wp-social-counter' )
					);
					foreach ($options as $key => $value) {
						echo wp_sprintf( '<option value="%s" %s>%s</option>', $key, selected( $instance['design'], $key, false ), $value );
					}
				?>
	        </select>
		</p>
	    <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shape' ) ); ?>"><?php esc_html_e('Shape:','wp-social-counter')?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('shape') ); ?>" name="<?php echo esc_attr( $this->get_field_name('shape') ); ?>">
				<?php
					$options = array(
						'default'   => esc_html__( 'Square', 'wp-social-counter' ),
						'round'       => esc_html__( 'Rounded Square', 'wp-social-counter' ),
						'circle'      => esc_html__( 'Circular', 'wp-social-counter' )
					);
					foreach ($options as $key => $value) {
						echo wp_sprintf( '<option value="%s" %s>%s</option>', $key, selected( $instance['shape'], $key, false ), $value );
					}
				?>
	        </select>
		</p>

	    <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e('Style:','wp-social-counter')?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('style') ); ?>">
				<?php
					$options = array(
						'default'   => esc_html__( 'Default - Color', 'wp-social-counter' ),
						'black'      => esc_html__( 'Black', 'wp-social-counter' ),
						'white'      => esc_html__( 'White', 'wp-social-counter' ),
						'inherit'      => esc_html__( 'Inherit', 'wp-social-counter' )
					);
					foreach ($options as $key => $value) {
						echo wp_sprintf( '<option value="%s" %s>%s</option>', $key, selected( $instance['style'], $key, false ), $value );
					}
				?>
	        </select>
	        <p class="description">option <strong>inherit</strong> only apply to plain design.</p>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_format' ) ); ?>"><?php esc_html_e('Number Format:','wp-social-counter')?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('number_format') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number_format') ); ?>">
				<?php
					$options = array(
						'default'   => esc_html__( 'Default - 15332', 'wp-social-counter' ),
						'group'       => esc_html__( 'Grouped of thousands - 15,332', 'wp-social-counter' ),
						'short'      => esc_html__( 'Shortened - 15.3k', 'wp-social-counter' )
					);
					foreach ($options as $key => $value) {
						echo wp_sprintf( '<option value="%s" %s>%s</option>', $key, selected( $instance['number_format'], $key, false ), $value );
					}
				?>
	        </select>
		</p>
		<p><input id="<?php echo $this->get_field_id('hide_count'); ?>" name="<?php echo $this->get_field_name('hide_count'); ?>" type="checkbox"<?php checked( $hide_count ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('hide_count'); ?>"><?php esc_html_e( 'Hide Counters', 'wp-social-counter'); ?></label></p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Description:', 'wpthms') ?></label>
			<textarea rows="5" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $instance['desc'] ); ?></textarea>
		</p>

			<?php
				$shortcode = '';
				$shortcode_array = $defaults;
				unset($shortcode_array['title']);
				foreach ($instance as $key => $value) {
					if( isset($shortcode_array[$key]))
						$shortcode .= " {$key}=\"{$value}\"";
				}

				$shortcode = "[wp_social_counter $shortcode]";

				if( !empty( $shortcode ) ){
					?>
					<p>
					<label><?php esc_html_e('Shortcode:', 'wpthms') ?></label>
					<textarea rows="5" class="widefat" readonly><?php echo esc_textarea( $shortcode ); ?></textarea>
					</p>
					<?php
				}
			?>
		
		
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';
		$instance['design'] = ( ! empty( $new_instance['design'] ) ) ? strip_tags( $new_instance['design'] ) : '';
		$instance['shape'] = ( ! empty( $new_instance['shape'] ) ) ? strip_tags( $new_instance['shape'] ) : '';
		$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
		$instance['number_format'] = ( ! empty( $new_instance['number_format'] ) ) ? strip_tags( $new_instance['number_format'] ) : '';
		$instance['hide_count'] = ( ! empty( $new_instance['hide_count'] ) ) ? 1 : 0;
		$instance['inline'] = ( ! empty( $new_instance['inline'] ) ) ? 1 : 0;
		
		return $instance;
	}
}

if( !function_exists( 'wpsc_register_wpsc_widget') ){
	function wpsc_register_wpsc_widget() {
	    register_widget( 'WP_Social_Counter_Widget' );
	}
}

add_action( 'widgets_init', 'wpsc_register_wpsc_widget' );
