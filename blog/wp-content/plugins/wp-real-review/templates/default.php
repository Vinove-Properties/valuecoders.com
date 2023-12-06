<?php
/*
 * Default template
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
$wprr = wp_real_review_get_data( $post->ID );

if( !in_array( $wprr['type'], array( 'star', 'point', 'percentage' ) ) )
    return;

$wprr_class = array();

$wprr_class[] = "wprr-type-{$wprr['type']}";
$wprr_class[] = sprintf( 'wprr-template-%s', !empty( $wprr['template'] ) ? $wprr['template'] : 'default' );
$wprr_class[] = "wprr-location-{$wprr['location']}";
// Heat
$heat = round( $wprr['score'] );

if( 'percentage' === $wprr['type'] ){
    $heat = round( $wprr['score'], -1 )/10;
}else if( 'star' === $wprr['type'] ){
    $heat = round( $wprr['score'] * 2 );
}

$wprr_class[] = 'heat-' . $heat;

?>

<div class="wprr-wrapper <?php echo esc_attr( join(' ', $wprr_class ) );?>" data-wprr-id="<?php echo esc_attr( $post->ID );?>" itemscope itemtype="http://schema.org/Review" itemid="<?php echo esc_url( get_permalink( $post->ID ) );?>">
    <?php
        // If has custom heading
        if( !empty( $wprr['title'] ) ){
            ?>
            <h2 class="wprr-heading" itemprop="itemReviewed" itemscope itemtype="http://schema.org/<?php echo esc_attr( wp_real_review_get_schema_type() );?>">
                <span itemprop="name"><?php echo esc_html__( $wprr['title'] );?></span>
            </h2>
            <?php

        }else{
            ?>
            <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/<?php echo esc_attr( wp_real_review_get_schema_type() );?>">
                <meta itemprop="name" content="<?php echo esc_attr__( get_the_title() );?>">
            </span>
            <?php
        }

    ?>

    <?php if( $wprr['info'] || $wprr['thumb'] ): ?>
    <!-- The Info -->
    <div class="wprr-sec wprr-sec-info">
        
        <?php
            if( !empty( $wprr['info_title'] ) ){
                printf( '<h4 class="wprr-sec-title">%s</h4>', esc_html( $wprr['info_title'] ) );
            }
        ?>
        <div class="wprr-sec-ct">
            <div class="wprr-info">
                <?php if( $wprr['thumb'] ): ?>
                <div class="wprr-thumbnail">
                    <?php
                        echo wp_get_attachment_image( $wprr['thumb'], 'post-thumbnail' );
                    ?>
                </div>
                <?php
                    $schema_image = $wprr['thumb'];
                else:
                    $schema_image = get_post_thumbnail_id( $post->ID );
                endif;

                // We don't use image attribute for schema:image cause if lazyload is activated, parser will get wrong image.
                ?>
                <!-- schema:image -->
                <meta itemprop="image" content="<?php echo esc_url( wp_get_attachment_url( $schema_image ) );?>">
                
                <!-- schema:reviewRating -->
                <div class="wprr-review-score" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                    <span itemprop="ratingValue" ><?php echo esc_html__( $wprr['score'] ); ?></span>

                    <?php
                        
                        if( 'percentage' == $wprr['type'] ){
                            $best_rating = 100;
                            $rating_percentage = $wprr['score'];
                        }else if( 'star' == $wprr['type'] ){
                            $best_rating = 5;
                            $rating_percentage = ( (float) $wprr['score'] * 2 ) * 10;
                        }else{
                            $best_rating = 10;
                            $rating_percentage = (float) $wprr['score'] * 10;
                        }
                    ?>
                    <meta itemprop="bestRating" content="<?php echo esc_html__( $best_rating );?>">
                </div>

                <ul class="wprr-info-list">
                    <?php
                    foreach ($wprr['info'] as $key => $v) {
                        $template = !empty( $v['url'] ) ? '<a class="info-url" href="%2$s" target="_blank">%1$s</a>' : '<span class="info-value">%1$s</span>';
                        $title = !empty( $v['name'] ) ? '<span class="info-title">' . esc_html( $v['name'] ) . '</span>' : '';
                        printf( '<li class="wprr-info %s">%s</li>', esc_attr( sanitize_html_class( strtolower( $v['name'] ) ) ),  $title . ' ' . sprintf( $template, esc_html( $v['value'] ), esc_url( $v['url'] )  ) );

                    }
                    ?>
                </ul>

                <!-- schema:author -->
                <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <meta itemprop="name" content="<?php echo esc_attr( get_the_author() );?>">
                </span>

                <!-- schema:publisher -->
                <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                    <meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name' ) );?>">
                </span>
            </div>
        </div>
    </div>
    <?php endif;?>

    <!-- Pros/Cons -->
    <div class="wprr-sec wprr-sec-procon">

        <div class="wprr-sec-ct">
            
            <?php if( !empty( $wprr['pros'] ) ): ?>
            <!-- Pros -->
            <div class="wprr-pros">

                <?php
                    if( !empty( $wprr['pros_title'] ) ){
                        printf( '<h4 class="wprr-sec-title">%s</h4>', esc_html( $wprr['pros_title'] ) );
                    }
                ?>
               
                <ul>
                    <?php
                        $pros = explode("\n", $wprr['pros']);
                        foreach ( $pros as $line ) {
                            echo sprintf( '<li>%s</li>', trim( $line ) );
                        }
                    ?>
                </ul>
            </div>
            <?php
                endif;
            ?>
            
            <?php if( !empty( $wprr['cons'] ) ): ?>
            <!-- Cons -->
            <div class="wprr-cons">

                <?php
                    if( !empty( $wprr['cons_title'] ) ){
                        printf( '<h4 class="wprr-sec-title">%s</h4>', esc_html( $wprr['cons_title'] ) );
                    }
                ?>
                <ul>
                    <?php
                        $cons = explode("\n", $wprr['cons']);
                        foreach ( $cons as $line ) {
                            echo sprintf( '<li>%s</li>', trim( $line ) );
                        }
                    ?>
                </ul>
            </div>
            <?php
                endif;
            ?>
        </div>
    </div>
        
    <?php if( !empty( $wprr['features'] ) ): ?>
    <!-- The Breakdown -->
    <div class="wprr-sec wprr-sec-features">
        
        <?php
            if( !empty( $wprr['features_title'] ) ){
                printf( '<h4 class="wprr-sec-title">%s</h4>', esc_html( $wprr['features_title'] ) );
            }
        ?>
        <div class="wprr-sec-ct">
            <ul class="wprr-features">
            <?php
                foreach ( $wprr['features'] as $key => $feature ) {
                    
                    if( !empty( $feature['name'] ) && !empty( $feature['point'] ) ){

                        if( 'percentage' === $wprr['type'] ){
                            $feature_heat = round( $feature['point'], -1 )/10;
                            $bar_width = $feature['point']; 
                        }else if( 'star' === $wprr['type'] ){
                            $feature_heat = round( $feature['point'] * 2 );
                            $bar_width = ( $feature['point'] * 2 ) * 10;
                        }else{
                            $feature_heat = $feature['point'];
                            $bar_width = $feature['point'] * 10;
                        }

                        ?>
                        <li class="wprr-feature <?php echo esc_attr( 'heat-' . round($feature_heat) );?>">
                            <span class="wprr-feature-name"><?php echo esc_html( $feature['name'] );?></span>
                            <?php
                                if( 'star' !== $wprr['type'] ){
                            ?>
                            <span class="wprr-feature-score"><?php echo esc_html( $feature['point'] );?></span>
                            <div class="wprr-feature-bar"><div class="wprr-feature-bar-c" style="width:<?php echo esc_attr( $bar_width );?>%;"></div>
                            <?php
                                }else{
                                    ?>
                                    <span class="wprr-feature-star"><?php echo wp_real_review_generate_stars( $bar_width );?></span>
                                    <?php
                                }
                            ?>
                        </li>
                        <?php
                    }
                }
            ?>
                <!-- overall rating -->
                <li class="wprr-feature overall">
                    <span class="wprr-feature-name"><?php echo esc_html( apply_filters( 'wp_real_review_overall_rating_title', esc_html__( 'Overall', 'wp-real-review' ) ) );?></span>
                    <?php
                        if( 'star' !== $wprr['type'] ){
                    ?>
                    <span class="wprr-feature-score"><?php echo esc_html( $wprr['score'] );?></span>
                    <div class="wprr-feature-bar"><div class="wprr-feature-bar-c" style="width:<?php echo esc_attr( $rating_percentage );?>%;"></div>
                    <?php
                        }else{
                            ?>
                            <span class="wprr-feature-star"><?php echo esc_html( $wprr['score'] );?></span>
                            <?php
                        }
                    ?>
                </li>
            </ul>

        </div>
    </div>
    <?php endif; ?>
    
    <?php if( !empty( $wprr['desc'] ) ): ?>
    <!-- The Summary -->
    <div class="wprr-sec wprr-sec-desc">
        <?php
            if( !empty( $wprr['desc_title'] ) ){
                printf( '<h4 class="wprr-sec-title">%s</h4>', esc_html( $wprr['desc_title'] ) );
            }
        ?>

        <div class="wprr-sec-ct" itemprop="description">
            <?php echo wpautop( $wprr['desc'] );?>
        </div>

    </div>
    <?php endif;?>
</div>