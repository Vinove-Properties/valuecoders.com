<?php
require_once( 'wp-load.php' );
global $wpdb;
//$postmeta_rows = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `meta_key` LIKE '%guide-topics_topics%'");
$postmeta_rows = $wpdb->get_results(
"SELECT * FROM `wp_postmeta` WHERE `meta_key` IN (
'guide-topics_topics_1_text', 'guide-topics_topics_2_text', 'guide-topics_topics_3_text', 'guide-topics_topics_4_text', 
'guide-topics_topics_5_text', 'guide-topics_topics_6_text', 'guide-topics_topics_7_text', 'guide-topics_topics_8_text', 
'guide-topics_topics_9_text', 'guide-topics_topics_10_text')"
);

$postmeta_rows = $wpdb->get_results("SELECT *  FROM `wp_postmeta` WHERE `meta_key` LIKE '%guide-topics_topics%' AND `meta_value` 
LIKE '%/wp-content/uploads/%';");
$i = 0;
foreach( $postmeta_rows as $row ){ $i++;
    $post_id    = $row->post_id;
    $meta_id    = $row->meta_id;
    $meta_value = $row->meta_value;

    if(is_serialized($meta_value)){
        $meta_data = maybe_unserialize($meta_value);
    }else{
        $meta_data = $meta_value;
    }
    
    $updated = false;
    if( is_string($meta_data) ){
        $meta_data = replace_image_src_with_webp( $meta_data, $updated );
    }
    if( $updated ){
        echo $post_id."====>>>>>>>>>>>>>";
    }
    if($updated){
        $updated_meta_value = is_array($meta_data) ? maybe_serialize($meta_data) : $meta_data;
        echo '<pre>'; print_r( $updated_meta_value );
        $wpdb->update(
            $wpdb->postmeta,
            ['meta_value' => $updated_meta_value],
            ['meta_id' => $meta_id],
            ['%s'],
            ['%d']
        );
       echo "Updated meta_id $meta_id.\n";
    }    
    //if( $i == 10 ) die("bingooo100");
}

function replace_image_src_with_webp( $content, &$updated ){    
    $updated        = false;
    $uploads_dir    = wp_get_upload_dir();
    $base_url       = $uploads_dir['baseurl'];
    $base_path      = $uploads_dir['basedir'];
    $pattern        = '/<img[^>]+src=["\']([^"\']+)["\']/i';
    //$updated_content = preg_replace_callback($pattern, function ($matches) use ($base_url, $base_path) {
    $updated_content = preg_replace_callback($pattern, function ($matches) use ($base_url, $base_path, &$updated) {
    $original_url = $matches[1];
    if( (strpos($original_url, $base_url) !== false) && preg_match('/\.(jpg|jpeg|png)$/i', $original_url) ){ 
        $webp_url   = preg_replace('/\.(jpg|jpeg|png)$/i', '.$1.webp', $original_url );            
        $webp_path  = str_replace( $base_url, $base_path, $webp_url );
        if( file_exists($webp_path) ){ 
            $updated = true;
            return str_replace($original_url, $webp_url, $matches[0]);
        }
    }
    return $matches[0];
    }, $content);
    return $updated_content;
}