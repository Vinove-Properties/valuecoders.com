<?php
global $post;
get_header();
$TocDisable   = get_post_meta( $post->ID, '_ez-toc-disabled', true);
$isTocDisable = ( isset( $TocDisable ) && ($TocDisable == "1") ) ? true : false;
$exPostId = [29846];
if( in_array($post->ID, $exPostId) ){
$isTocDisable = true;    
}
$author_id    = $post->post_author; 
?>
<div class="container archive-container">
    <div class="second-row" id="stickytoc">
        <div class="buyers-guide">                        
        <?php if( $isTocDisable === false ) : ?>
      <div class="vcb-col-left" id="vcb-col-left">
        <div class="tocsec">
          <h3>Table of Contents</h3>
          <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
        <?php 
        $rbanner = get_field('rt-banner');
        if( isset( $rbanner['enable'] ) && ($rbanner['enable'] == "yes") ) :
        ?>
        <div class="rightcustom margin-40">
          <h2><?php echo $rbanner['text']; ?></h2>
          <div class="text-center btn-container">
            <a href="<?php echo $rbanner['cta-link']; ?>" class="banner-btn"><?php echo $rbanner['cta-text']; ?><i class="cusarrow-icon"></i></a>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
        <div class="vcb-col-right <?php echo ( $isTocDisable === true ) ? ' no-toc-row' : ''; ?>" id="vcb-col-right">
            <article id="post-<?php echo esc_attr( get_the_ID() ); ?>" class="nv-single-post-wrap">
                <?php             
                Postpdf();
                if( have_posts() ) :
                while( have_posts() ) : the_post();
                    the_content();
                endwhile;
                if( comments_open() || get_comments_number() ){
                    //comments_template();
                }
                endif;
                ?>
            </article>
        </div>    
        </div>
    </div>
</div>
<?php 
get_template_part('inc/file', 'pdownload');
get_footer();?>