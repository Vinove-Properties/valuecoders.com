<?php
/**
 * Navigation
 */

/*if( 'prev_next_top' === $this->block_instance['settings']['navigation'] )
	return;*/ 
?>
<div class="<?php echo esc_attr( self::$id_base . '-nav' . " {$this->block_instance['settings']['navigation']}" );?>" data-role="navigation" data-nav="<?php echo esc_attr( $this->block_instance['settings']['navigation'] );?>" data-uid="<?php echo esc_attr( $this->uid );?>">
<?php

switch ( $this->block_instance['settings']['navigation'] ) {

	case 'prev_next':
	case 'prev_next_top':

		?>
		<a href="javascript:void(0)" class="prev" data-role="prev" rel="nofollow"><?php echo apply_filters( 'wp_post_blocks/icon', '', 'nav_prev'); ?><span><?php echo esc_html_x( 'Prev', 'block navigation', 'wp-post-blocks');?></span></a>
		<a href="javascript:void(0)" class="next" data-role="next" rel="nofollow"><span><?php echo esc_html_x( 'Next', 'block navigation', 'wp-post-blocks');?></span><?php echo apply_filters( 'wp_post_blocks/icon', '', 'nav_next'); ?></a>
		<?php
	break;

	case 'load_more':
		?>
		<a href="javascript:void(0)" class="load-more" data-role="load-more" rel="nofollow" data-loading="<?php echo esc_attr_x( 'Load More', 'block navigation', 'wp-post-blocks');?>"><span><?php echo esc_html_x( 'More', 'block navigation', 'wp-post-blocks');?></span><?php echo apply_filters( 'wp_post_blocks/icon', '', 'nav_more'); ?></a>
		<?php
	break;
	
	case 'infinite_scroll':
		?>
		<div class="infinite-scroll" data-role="infinite-scroll"></div>
		<?php
	break;
	
	default:

	break;

}

$this->block_preloader();

?>
</div>