<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js" async></script>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>

   
<body <?php ampforwp_body_class('single-post design_1_wrapper');?>>
	<?php do_action('ampforwp_body_beginning', $this); ?>
	<?php $this->load_parts( array( 'header-bar' ) ); ?>
	<?php do_action( 'below_the_header_design_1', $this ); ?>
	<?php 
	global $redux_builder_amp, $post; 
	$post_id = $this->get( 'post_id' );
	?>
	<article class="amp-wp-article">
		<header class="amp-wp-article-header ampforwp-title">
			<h1 class="amp-wp-title"><?php echo get_the_title($post_id); ?></h1>
		</header>
		<?php do_action('ampforwp_post_before_design_elements') ?>
		<?php $this->load_parts( apply_filters( 'ampforwp_design_elements', array( 'empty-filter' ) ) ); ?>

		<?php do_action('ampforwp_post_after_design_elements') ?>
	</article>

	<style amp-custom>
      /* any custom styles go here. */
      .form-container{
      	border: 2px solid #ddd;
      	padding: 20px 40px;
      }
      .user-req{width: 100%}
      .send_message{
      	text-transform: uppercase;
      	padding: 5px 5px;
      }
    </style>

	<article class="amp-wp-article">
	<h2>Get In Touch</h2>
<p>Request a free consultation and get a no obligation quote for your project within 8 Business hours</p>
	<form target="_top" action-xhr="<?php echo admin_url('admin-ajax.php?action=amp_form_submition') ?>" method="post" name="contact-us-form" custom-validation-reporting="show-all-on-submit">
     <div class="form-container">
      <div class="form-input">
        <span>Name:</span>
        <input type="text"
          name="user-name"
          id="name5"
          required
          pattern="\w+\s\w+">
        <span visible-when-invalid="valueMissing"
          validation-for="name5"></span>
        <span visible-when-invalid="patternMismatch"
          validation-for="name5">
          Please enter your first and last name (e.g. Jane Miller)
        </span>
      </div>

      <div class="form-input">
        <span>Email:</span>
        <input type="email"
          name="user-email"
          id="email5"
          required>
        <span visible-when-invalid="valueMissing"
          validation-for="email5"></span>
        <span visible-when-invalid="typeMismatch"
          validation-for="email5"></span>
      </div>

      <div class="form-input">
        <span>Contact No:</span>
        <input type="number"
          name="user-phone"
          id="user-phone"
          required>
        <span visible-when-invalid="valueMissing"
          validation-for="user-phone"></span>
        <span visible-when-invalid="typeMismatch"
          validation-for="user-phone"></span>
      </div>
 
      <div class="form-input">
        <span>User Requiremnt:</span>
      	<br>
        <textarea class="user-req" name="user-req" cols="10" rows="4"></textarea>
      </div>

      <input class="send_message" type="submit"
        value="Send Message">
    
        <div submit-success>
    <template type="amp-mustache">
      {{message}}
    </template>
  </div>
  <div submit-error>
    <template type="amp-mustache">
      {{message}}
    </template>
  </div>
  </div>
    </form>
	</article>
	
	<?php do_action( 'amp_post_template_above_footer', $this ); ?>
	<?php $this->load_parts( array( 'footer' ) ); ?>
	<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>

