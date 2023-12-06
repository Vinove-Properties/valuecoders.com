<?php 
if( isset($args['call-book']) && ($args['call-book'] == true) ) : 
$bacSec = get_field( 'bac-sec' );
?>
<div class="flex-2 consult-form text-center">
    <div class="form-wrap">
        <div class="top-sec">
        <h3><?php echo $bacSec['title']; ?></h3>
        <div class="btn-center">
        <a class="yellow-btn bk-call pop-up" href="javascript:void(0);" onclick="showPopFormOp(true);">
        <?php echo $bacSec['cta-text']; ?>
        </a>
        </div>
        <a class="use-form" href="#contact-sec">Or, Use this form to tell us about your needs</a>
        <div class="frm-list dis-flex justify-center">
            <div class="listd">100% confidential</div><div class="listd">We sign NDA</div>
        </div>
        </div>
    <div class="bottom-sec"><?php echo $bacSec['content']; ?></div>
    </div>
</div>
<?php endif; ?>


<div id="vc-fxdform" class="flex-2 banner-form <?php echo ( isset($args['call-book']) && ($args['call-book'] == true) ) ? ' bac-form ' : ''; ?>">
    <div class="form-center">
    <div id="vc-frm-outer" class="form-box-outer">                        
    <div class="head-txt text-center">    
    <div id="fh-cmn">
    <?php 
    if( isset( $args['frm-heading'] ) && !empty($args['frm-heading']) ){
        echo $args['frm-heading'];
    }else{
        echo '<h2>Connect with Us</h2><p>Get No Obligation Free Quote!</p>';
    }
    ?>
    </div>

    <div class="top-text text-center" id="fh-bookdemo" style="display:none;">
    <?php 
    if( isset( $args['non-frm-heading'] ) && !empty($args['non-frm-heading']) ){
        echo $args['non-frm-heading'];
    }else{
        if( is_page_template( 'page-templates/tpl-version6.0.php' ) ){
            if( isset( $args['frm-heading'] ) && !empty($args['frm-heading']) ){
            echo '<h2>'.$args['frm-heading'].'</h2>';
            }else{
            echo '<h2>Connect with Us</h2>';    
            }            
        }else{
            echo '<h2>Connect with Us</h2><p>Get No Obligation Free Quote!</p>';    
        }        
    }
    ?>
    </div>    
    </div>
    
    <div class="form-wrap">
    <div class="form-content">
    <?php 
    if( is_page_template( 'page-templates/tpl-version6.0.php' ) ){
        echo get_field('pform-content');
    }else{
    ?>    
    <h3>We Excel in Future-Ready <strong>Software <br>Development & Staff Augmentation Services</strong></h3>
    <div class="text-field"><span class="clrtext">Quality-Focused</span><span class="clrtext">Innovative</span><span class="clrtext">Secure</span></div>
    <ul>
    <li>Access High-quality, Pre-vetted Talent</li>
    <li>Flexible Engagement Options</li>
    <li>Well Defined SLAs, No Hidden Costs </li>
    <li>Global Quality Standards</li>
    <li>Trusted by Startups & Fortune 500 Companies</li>
    </ul>
    <?php } ?>
    <picture>
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/form-companylogo.svg" alt="Valuecoders" width="528" height="56">
    </picture>

    </div>

    <div id="vc-fxdform" class="form-section">
        <form action="https://www.valuecoders.com/sendmail-l7.php" onsubmit="return vcPopFormValidation();" 
        enctype="multipart/form-data" id="cmn-pop-form" method="POST">
            <div class="form-inner dis-flex" id="pop-form">
                <div class="form-text-cont">
                    <div class="user-input">
                        <input type="text" id="pop-name" placeholder="Full Name" class="input-field"
                            value="" name="user-name">
                    </div>
                    <small></small>
                </div>
                <div class="form-text-cont">
                    <div class="user-input">
                        <input type="text" id="pop-email" placeholder="Email Address"
                            class="input-field" value="" name="user-email">
                    </div>
                    <small></small>
                </div>
                <div class="form-text-cont">
                    <div class="user-input">
                        <?php 
                        global $post;
                        $phoneOpt = get_field( 'frm-phone-fld', $post->ID );
                        ?>
                        <input type="tel" maxlength="15" id="pop-phone" class="input-field" 
                        placeholder="<?php echo (isset($phoneOpt) && ($phoneOpt == "no")) ? 'Phone Number (optional)':'Phone Number' ?>" value="" name="user-phone">
                    </div>
                    <small></small>
                </div>
                <div class="form-text-cont">
                    <div class="user-input">
                        <input class="input-field input-skype" id="pop-country" type="text"
                            placeholder="Country" value="" name="user-country">
                    </div>
                    <small></small>
                </div>
                <div class="form-text-cont width-full">
                    <div class="user-input">
                        <textarea class="input-field comment-input" id="pop-requirement"
                            placeholder="Your Requirements" name="user-req"></textarea>
                    </div>
                    <small></small>
                </div>
            </div>
            <div class="user-input checkout">
                <input type="hidden" name="frmqueryString" id="frmqueryString-pop" value="<?php echo utnHeaderString(); ?>">
                <input type="hidden" name="frmSidebar" value="sidebar">
                <input type="hidden" name="is-dmtpl" 
                value="<?php echo (isset($args['dm_page']) && !empty($args['dm_page'])) ? "true" : "false"; ?>">
                <input type="hidden" id="bookcall-frm" name="is-bookcall" value="">
                <input type="submit" id="submitButton-pop" class="checkout-submit ch111" value="<?php echo $args['btn_text']; ?>">
            </div>
            <span class="privc"><i></i>100% Privacy Guaranteed</span>
        </form>
        </div>
        </div>
    </div>
    </div>
</div>