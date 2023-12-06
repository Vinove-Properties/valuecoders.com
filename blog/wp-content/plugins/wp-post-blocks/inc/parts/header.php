<?php
/**
 * Header
 */
?>
<div class="<?php echo esc_attr( self::$id_base . '-header' ); ?>">
	<?php 
	// Title
	echo wp_sprintf( '<h3 class="' . esc_attr( self::$id_base . '-title' ) . '"><span>%s</span></h3>', $this->block_instance['settings']['title'] );
	// Subtitle
	// echo !empty( $instance['settings']['subtitle'] ) ? wp_sprintf( '<span class="' . esc_attr( self::$id_base . '-subtitle widget-subtitle' ) . '">%s</span>', $instance['settings']['subtitle'] ) : '';

	if( 'prev_next_top' === $this->block_instance['settings']['navigation'] ){
		
	}else{
		// Filter Nav
		$this->block_filter(  $this->block_instance );
	}
	?>
	
</div>