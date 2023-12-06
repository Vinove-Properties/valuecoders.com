<?php
  /**
  * Author:          Andrei Baicus <andrei@themeisle.com>
  * Created on:      28/08/2018
  *
  * @package Neve
  */
  global $post;
  $container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );  
  get_header();
  $TocDisable   = get_post_meta( $post->ID, '_ez-toc-disabled', true);
  $isTocDisable = ( isset( $TocDisable ) && ($TocDisable == "1") ) ? true : false;
  $author_id    = $post->post_author; 
  ?>


<div class="<?php echo esc_attr( $container_class ); ?> single-post-container">
<div class="row inner left_sidebar">
  <div class="single-wrap">
    <?php do_action( 'neve_do_sidebar', 'single-post', 'left' ); ?>
    <div class="top-row">
    <div class="entry-header">
	<?php  $is_enabled    = get_field( 'date_enabled'); ?>
    <?php if($is_enabled == 'yes'){ ?>
    <h1 class="title entry-title "><?php the_title(); ?> In <?php echo date("F Y"); ?></h1>
    <?php }else{ ?>
    <h1 class="title entry-title "><?php the_title(); ?></h1>
    <?php }?>
        <div class="meta-list">
          <ul class="nv-meta-list">
            <li class="meta author vcard">
              <span class="author-name fn">Posted By 
              <a href="<?php echo get_author_posts_url( $author_id ) ?>" title="Posts by <?php the_author_meta( 'user_nicename' , $author_id ); ?>" rel="author">
                <?php the_author_meta( 'user_nicename' , $author_id ); ?>
              </a></span>
            </li>
            <!--<li class="meta date posted-on"><?php //the_time('F j, Y') ?></li>-->
            <li class="meta post-views">27 Views</li>
          </ul>
          <ul class="nv-meta-list">
          <li class="comments">
            <?php echo get_comments_number($post->ID);?>
          </li>
          </li>
        </div>
        <div class="blog-image">
        <?php 
        $feturedImgDisable = get_post_meta( $post->ID, 'neve_meta_disable_featured_image', true );
        if( $feturedImgDisable !== "on" ) :
        ?>    
        <div class="blog-thumb"><?php the_post_thumbnail( 'single-post-thumbnail', ['alt' => esc_html ( get_the_title() )] ); ?></div>
        <?php endif; ?>
          <ul class="category">
            <?php $category_detail=get_the_category($post->ID);//post category
              foreach($category_detail as $cd){?>
            <li><a href="<?php echo get_category_link($cd->term_id); ?>"> <?php echo $cd->cat_name;?></a></li>
            <?php  }?> 
          </ul>
        </div>
      </div>
    </div>
      <div class="second-row" id="stickytoc">
        <div class="buyers-guide">
          <?php if( $isTocDisable === false ) : ?>
          <div class="vcb-col-left" id="vcb-col-left"><?php dynamic_sidebar('shop-sidebar'); ?></div>
          <?php endif; ?>
          <div class="vcb-col-right <?php echo ( $isTocDisable === true ) ? ' no-toc-row' : ''; ?>" id="vcb-col-right">
            <article id="post-<?php echo esc_attr( get_the_ID() ); ?>"
              class="<?php echo esc_attr( join( ' ', get_post_class( 'nv-single-post-wrap col' ) ) ); ?>">
                <?php Postpdf(); ?>
              <?php
                do_action( 'neve_before_post_content' );
                  
                if ( have_posts() ) {
                  while ( have_posts() ) {
                    the_post();
                    the_content();?>
<!-- Trigger/Open The Modal -->
                            <?php //$pdflink = get_field('vc-post-pdf');
                            //$pdf = get_field('post_pdf');
                            //$url = site_url();
                            ?>
                            <?php  $guidename = get_post_meta($post->ID,'guide_name',true);?>
                            <div  class="modal <?php if(isset($_GET['ep-action']) && !empty($_GET['ep-action'])){ echo 'show-modal epaction'; } ?>">
                                <section class="pop-up-section">
                                    <span class="close-button">×</span>
                                    <div class="container" id="formid">
                                        <h2>Download Your FREE e-Guide NOW!</h2>
                                        <p>Discover What, Why & How of "<?php echo $guidename;?>" with this FREE
                                            e-Guide!
                                        </p>

                                        <div class="left-right-box">
										<div class="afterverify">
    <?php if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $emails = $_GET['email']; // Set email variable
    $hashval = $_GET['hash']; // Set hash variable
    $result = $wpdb->get_results("SELECT * FROM `wp_ebookdata` where hashcode = '".$hashval."' AND email = '".$emails."'");
    if (count($result) > 0){
    foreach($result as $results){
    ?>
                                       <h3>Thank you for verifying your email id. Please click on Download button to download your e-guide</h3>
                                            <?php $pdflink = get_field('vc-post-pdf');
                                             $pdf = get_post_meta($post->ID,'post_pdf',true);
                                                    //$pdf = get_field('post_pdf');
                                                    $url = site_url();
                                                    if(!empty($pdf)){
                                                   
                                                    ?>
                                                    
                                                    <button> <a href="<?php echo  wp_get_attachment_url( $pdf ); ?>" download>Download Now</a></button>
                                                     
                                                     <?php }else{ 
                                                    
                                                     ?>
                                                     
                                                      <button><a href="<?php echo $url.'/wp-content/uploads/post-pdf/'.$pdflink.'.pdf'; ?>" download>Download Now</a></button>
                                                     <?php  } ?>
												
                                            <?php }
											} 
											}
											
											else {?>
											</div>
											<div class="rightnew">
                                            <div class="left-img">
                                                <picture>
                                                    <source type="image/webp"
                                                        srcset="https://www.valuecoders.com/blog/wp-content/uploads/2022/08/pop_img-new.webp">
                                                    <source type="image/png"
                                                        srcset="https://www.valuecoders.com/blog/wp-content/uploads/2022/08/pop_img-new.png">
                                                    <img loading="lazy"
                                                        src="https://www.valuecoders.com/blog/wp-content/uploads/2022/08/pop_img-new.png"
                                                        alt="Valuecoders" width="245" height="472">
                                                </picture>

                                            </div>
                                            <div class="right-img">
                                              
                                                <p id="responce" style="color:#fff;"></p>
                                                <form method="post" id="vc-lead-form" class="orderform">
												  <p>Fill out the form below to download the e-Guide now.</p>
                                                    <div class="">
                                                        <input type="text" maxlength="50" name="firstName"
                                                            id="first_name" placeholder="Enter your full name"
                                                            class="input-field"
                                                            onkeypress="return ValidateName(event,'lblError_firstname','firstName');"
                                                            value="">
                                                        <small class="error-msg-section"
                                                            id="lblError_firstname"></small>
                                                    </div>
                                                    <div class="">
                                                        <input type="email" placeholder="Enter your Email Address"
                                                            pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$"
                                                            maxlength="50" id="txtEmail" class="input-field" value=""
                                                            name="email">
                                                        <small class="error-msg-section" id="lblError_email"></small>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" placeholder="Enter your Country"
                                                            maxlength="25" class="input-field" value="" name="country"
                                                            id="country" onkeypress="return ValidateName(event,'lblError_country','country');" required>
                                                        <small class="error-msg-section" id="lblError_country"></small>
                                                    </div>
                                                    <div class="">
                                                        <input type="tel" placeholder="Enter your Phone Number"
                                                            class="input-field" value="" name="phone" id="phone_no"
                                                            maxlength="10">
                                                        <small class="error-msg-section" id="lblError_phone"></small>
                                                    </div>
                                                   <!-- <input type="hidden" value="<?php //echo $pdf;?>" name="pdflink"
                                                        id="pdflink">-->
                                                    <input type="hidden" value="<?php echo $post->ID;?>" name="postid"
                                                        id="postid">
                                                    <input type="hidden" value="<?php echo $post->post_name;?>"
                                                        name="posttitle" id="posttitle">
                                                    <input type="button" value="Download Our e-Guide"
                                                        onclick="ValidationEvent(this.id)">


                                                </form>
                                            </div>
											</div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </section>
                            </div>
                            <!-- Modal -->

  
                    <?php if ( comments_open() || get_comments_number() ) {
                  comments_template();
                }
                    //get_template_part( 'template-parts/content', 'single' );
                  }
                }else{
                  get_template_part( 'template-parts/content', 'none' );
                }      
                do_action( 'neve_after_post_content' );        
                ?>
          </div>
          </article>
          <?php //do_action( 'neve_do_sidebar', 'single-post', 'right' ); ?>
          <?php ?>
			
        </div>
      </div>
    </div>
  </div>
</div>
</script>
<?php get_footer();?>
