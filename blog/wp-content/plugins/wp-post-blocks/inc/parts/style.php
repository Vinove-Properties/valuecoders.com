<?php
namespace WP_Post_Blocks;
/**
 * Navigation
 */

if( empty( $this->block_instance['settings']['custom_style'] ) ){
	return;
}

$accent_color = !empty( $this->block_instance['settings']['accent_color'] ) ? $this->block_instance['settings']['accent_color'] : apply_filters( 'wp_post_blocks/block_accent_color', '', $this->block_instance );

if( empty( $accent_color ) ){
	return;
}

$this->block_instance['settings']['accent_color'] = $accent_color;

$accent_color = Plugin::sanitize_hex_color( $accent_color );
$custom_style = apply_filters( 'wp_post_blocks/block_inline_style', '', $this->block_instance );

echo "<style scoped>
	#{$this->block_instance['settings']['block_id']} .pbs-related li:before, #{$this->block_instance['settings']['block_id']} .pbs-module-text-list:before{
		border-color: {$accent_color};	
	}
	#{$this->block_instance['settings']['block_id']} a:hover,
	#{$this->block_instance['settings']['block_id']} .pbs-filter ul li.more > a:before{
		color: {$accent_color};	
	}

	$custom_style
	
</style>";