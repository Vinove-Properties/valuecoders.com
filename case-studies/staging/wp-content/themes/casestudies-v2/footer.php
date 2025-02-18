<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.2
 */

// get_template_part( 'template-parts/footer/wpinstance-form', 'custom' );

get_template_part( 'template-parts/footer/footer', 'custom' );
?>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/glider.min.js"></script>
<script type="text/javascript">
	var $j = jQuery.noConflict();

    $j(window).scroll(function(){$j(window).scrollTop()>80?$j("header").addClass("headact"):$j("header").removeClass("headact")}),$j(document).ready(function(){$j("#navtab").click(function(){$j(this).toggleClass("act"),$j("#mobshow").toggle()}),$j(".subnav").click(function(){$j(this).parent().find(".mega").slideDown(200),$j(this).parent().siblings().find(".mega").slideUp(200),$j(".subnav.act2").removeClass("act2"),$j(this).addClass("act2")})});
<?php if(is_front_page()) : ?>
	//$j('.nav-tabs a[href="#services"]').tab('show');
	$j('.nav-tabs a:first').tab('show')
	$j('[data-toggle="tabajax"]').click(function(e) {
    $j('.loading-overlay').show();
    $j('#already_post_count').val(8);
    $j(".listing").remove(); 
    var $this = $j(this),
    loadurl = $this.attr('href'),
    targ = $this.attr('data-target');
    data_tag = $this.attr('data-id');
    $j('#current_tag_selected').val(data_tag);
    var ajaxurl = my_ajax_object.ajax_url;
    $j.ajax({
          type:"POST",
          url: ajaxurl,
          //data:{ action: 'casestudy_'+data_tag, tab: data_tag },
          data:{ action: 'casestudy_global', tab: data_tag },
          beforeSend:function(response){
            $j('.loading-overlay').show();
          },
          success:function(response){
            $j('.loading-overlay').hide();
            $j(targ).html(response);
                $this.tab('show');
                $j("#load_more_post").show();
                return false;
    //         setTimeout(function() {
    // //$(".frame").load(self.href);
            
    //         },100) ; 
      
          }
        });
    // $j.post(loadurl, function(data) {                  
    // $j(targ).html(data);
    // });
    
});


    $j(".home").on("click",".taxonomy_filter", function(){
        $j(".taxonomy_filter").removeClass("active");
        var $this = $j(this),
        child_tag = $this.attr('data-id');
        $this.addClass("active");
        var posts = parseInt(jQuery('#already_post_count').val(8));
        var data_tag = jQuery('#current_tag_selected').val();
        $j('.loading-overlay').show();
        $j("#load_more_post").hide();
        $j('#already_post_count').val(8);  
        var ajaxurl = my_ajax_object.ajax_url;

        $j.ajax({
          type:"POST",
          url:ajaxurl,
          data:{action: 'casestudy_child_filter', tag:data_tag, term_id: child_tag },
          beforeSend:function(response){
            $j('.loading-overlay').show();
          },
          success:function(response){
                  $j('.loading-overlay').hide();               
                  $j(".casebox").remove();                  
                  $j(".in-container").empty().html(response);

          }
        }); 
    });
    
// Load more section js starts
$j("#load_more_post").click(function(e){
    //e.preventDefault();
    $j("#loaderImg").show();
    var posts = parseInt(jQuery('#already_post_count').val());
    var data_tag = jQuery('#current_tag_selected').val();
    var ajaxurl = my_ajax_object.ajax_url;
    $j.ajax({
      type:"POST",
      url:ajaxurl,
      data:{fetched_post: posts, action: 'casestudy_load_more_posts', tag:data_tag},
      beforeSend:function(response){
            $j('.loading-overlay').show();
      },
      success:function(response){
		      if(response == 1){
			  $j('.nopost').text('There are no more posts to show');
			  $j('.loading-overlay').hide(); 
              $j("#loaderImg").hide(); 
			  $j('.hidepost').css('display','none');
             // $j(".in-container").append(response).show().fadeIn(4000);  
			  }else{
			  $j('.loading-overlay').hide(); 
              $j("#loaderImg").hide(); 
              $j(".in-container").append(response).show().fadeIn(4000);
              $j('#already_post_count').val(posts + 8);
			  }	  
             
      }
    });    
  });
<?php endif; ?>
/*Lazy Loading BG Image*/
  document.addEventListener("DOMContentLoaded", 
  function(){
    var lazyloadImages;    
    if("IntersectionObserver" in window){
    lazyloadImages = document.querySelectorAll(".vlazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.classList.remove("vlazy");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
    }else{
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".vlazy");
    function lazyload(){
        if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
        }    

        lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('vlazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
        }, 20);
    }
    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
    }
  })
</script>
</body>
</html>
