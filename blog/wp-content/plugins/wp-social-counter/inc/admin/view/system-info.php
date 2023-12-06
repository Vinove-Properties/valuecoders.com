<h4>WordPress Info.</h4>
<table class="table widefat">
    <tbody>
        <tr>
            <td width="20%">WordPress</td>
            <td><?php echo esc_html( get_bloginfo('version') );?></td>
        </tr>
        
        <?php

            if( defined( 'WP_DEBUG') && WP_DEBUG ){
        ?>
        <tr>
            <td>WP_DEBUG</td>
            <td><?php echo WP_DEBUG ? 'on' : 'off';?></td>
        </tr>
        <?php
            }

            if( defined( 'WP_DEBUG') && WP_DEBUG ){
        ?>
        <tr>
            <td>SCRIPT_DEBUG</td>
            <td><?php echo SCRIPT_DEBUG ? 'on' : 'off';?></td>
        </tr>
        <?php
            }

            if( defined( 'WP_MEMORY_LIMIT') && WP_MEMORY_LIMIT ){
        ?>
        <tr>
            <td>WP_MEMORY_LIMIT</td>
            <td><?php echo WP_MEMORY_LIMIT;?></td>
        </tr>
        <?php
            }

            if( defined( 'WP_MAX_MEMORY_LIMIT') && WP_MAX_MEMORY_LIMIT ){
        ?>
        <tr>
            <td>WP_MAX_MEMORY_LIMIT</td>
            <td><?php echo WP_MAX_MEMORY_LIMIT;?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<h4>Server info.</h4>
<?php
// print_r( gd_info() );
// print_r( phpinfo() );
?>
<table class="table widefat">
    <tbody>
        <?php if(function_exists( 'phpversion' ) ):?>
        <tr>
            <td width="20%">PHP version</td>
            <td><?php echo esc_html( phpversion() );?></td>
        </tr>
        <?php endif;?>
        <tr>
            <td>allow_url_fopen</td>
            <td><?php echo esc_html( ini_get('allow_url_fopen') ? 'on' : 'off' );?></td>
        </tr>
        <tr>
            <td>max_execution_time</td>
            <td><?php echo esc_html( ini_get('max_execution_time') );?></td>
        </tr>
        <tr>
            <td>max_file_uploads</td>
            <td><?php echo esc_html( ini_get('max_file_uploads') );?></td>
        </tr>
        <tr>
            <td>max_input_time</td>
            <td><?php echo esc_html( ini_get('max_input_time') );?></td>
        </tr>
        <tr>
            <td>max_input_vars</td>
            <td><?php echo esc_html( ini_get('max_input_vars') );?></td>
        </tr>
        <tr>
            <td>memory_limit</td>
            <td><?php echo esc_html( ini_get('memory_limit') );?></td>
        </tr>
        <tr>
            <td>post_max_size</td>
            <td><?php echo esc_html( ini_get('post_max_size') );?></td>
        </tr>
        <tr>
            <td>upload_max_filesize</td>
            <td><?php echo esc_html( ini_get('upload_max_filesize') );?></td>
        </tr>
        <tr>
            <td>GD Library</td>
            <td><?php echo esc_html( ( extension_loaded('gd') && function_exists('gd_info') ? 'installed' : 'uninstalled' ) );?></td>
        </tr>
        <tr>
            <?php
                $remote_status = 'error';
                $remote_note   = 'wp_remote_get() failed. This may not work with your server.';
                $response      = wp_remote_get( 'https://httpbin.org', array( 'timeout' => 60, 'sslverify' => false ) );

                if ( ! is_wp_error( $response ) && $response['response']['code'] >= 200 && $response['response']['code'] < 300 ) {
                    $remote_status = 'yes';
                    $remote_note   = 'Works!';
                } elseif ( is_wp_error( $response ) ) {
                    $remote_note = 'Failed! This plugin won\'t work properly with your server. Please Contact your hosting provider. Error:' . ' ' . $response->get_error_message();
                }
            ?>
            <td>WP Remote Get:</td>
            <td>
                <mark class="<?php echo $remote_status; ?>">
                    <?php echo $remote_note; ?>
                </mark>
            </td>
        </tr>
    </tbody>
</table>