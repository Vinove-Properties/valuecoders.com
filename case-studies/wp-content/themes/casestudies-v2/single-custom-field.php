<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */
get_header(); ?>

<section>
  <?php
  $postid = get_the_ID();
  $post_meta = get_post_meta($postid);
  //echo "<pre>";
  //print_r($post_meta);

  $yellow_title = $post_meta['headingText'][0];
  $white_title = $post_meta['subheadingText'][0];
  if(!empty($yellow_title) && !empty($white_title) ){
        $custom_title = $yellow_title."-".$white_title;
  }else{
        $custom_title = get_the_title();
  }
  $content = get_the_content();

  echo $custom_title;
  echo "<br>{$content}";
  $term_list = get_the_terms($postid, 'location');
  $name ='';
  foreach($term_list as $term_single) {
     $name .= ucfirst($term_single->slug).', ';
  }
  $location = rtrim($name, ', ');
  echo "<br>{$location}";

  $term_list = get_the_terms($postid, 'service');
  $name ='';
  foreach($term_list as $term_single) {
     $name .= ucfirst($term_single->slug).', ';
  }
  $service = rtrim($name, ', ');
  echo "<br>{$service}";

  $term_list = get_the_terms($postid, 'industry');
  $name ='';
  foreach($term_list as $term_single) {
     $name .= ucfirst($term_single->slug).', ';
  }
  $industry = rtrim($name, ', ');
  echo "<br>{$industry}";
?>
</section>
<section>
    <h1>Client Requirement</h1>
    <?php
    $client_requirement = $post_meta['client_requirement'][0];
    echo $client_requirement;
    ?>
</section>

<section>
    <h1>Task Overview</h1>
    <?php
    $task_overview = $post_meta['task_overview'][0];
    echo "<br>{$task_overview}";
    $task_problem = $post_meta['problem'][0];
    echo "<br>{$task_problem}";
    ?>
</section>

<section>
    <h1>Our Approach</h1>
    <?php
    $our_approach = $post_meta['our_approach'][0];
    echo "<br>{$our_approach}";
    // $task_problem = $post_meta['problem'][0];
    // echo "<br>{$task_problem}";
    ?>
</section>

<section>
    <h1>UX Development & Testing Details</h1>
    <?php
    $ux_development_and_testing = $post_meta['ux_development_and_testing'][0];
    echo "<br>{$ux_development_and_testing}";
    // $task_problem = $post_meta['problem'][0];
    // echo "<br>{$task_problem}";
    ?>
</section>

<section>
    <h1>Final Result</h1>
    <?php
    $final_result = $post_meta['final_result'][0];
    echo "<br>{$final_result}";
    // $task_problem = $post_meta['problem'][0];
    // echo "<br>{$task_problem}";
    ?>
</section>

<?php 
get_footer();
