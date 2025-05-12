<?php
  /* 
  Template Name: Industry Page V6.0 Template
  */
  global $post;
  $thisPostID = $post->ID;
  get_header();
  $bannerImage = get_field("tb-image");
  $bannerStyle = "";
  if ($bannerImage) {
      $banImage = getVcWebpSrcURL($bannerImage);
      $bannerStyle = ' style="background-image:url(' . $banImage . ');"';
  }
  
  $bcTitle = get_field("bc-title");
  $bcCategory = get_field("bc-vcategory");
  $bCat = $bcCategory === "services" ? "Services" : "Industries";
  if ($bcTitle) {
      $bct = $bcTitle;
  } else {
      $bct = get_the_title();
  }
  
  if ($bcCategory === "custom") {
      //bc-custitle //bc-cuslink
      $cuTitle = get_field("bc-custitle");
      $cuLink = get_field("bc-cuslink");
      $bCat =
          '<a class="no-after" href="' .
          vc_siteurl($cuLink) .
          '">' .
          $cuTitle .
          "</a>";
  }
  
  $vcBtn = get_field("vc-cta", $thisPostID);
  ?>
<section class="hero-section vlazy" style="background-image:url(<?php echo $bannerStyle; ?>);">
  <div class="container">
    <div class="dis-flex">
      <div class="left-box">
        <div class="breadcrumbs">
          <a href="<?php bloginfo(
            "url"
            ); ?>">Home</a> <span><?php echo $bCat; ?></span> <?php echo $bct; ?>
        </div>
        <?php the_content(); ?>
      </div>
    </div>
    <a class="scroll-next" href="#serv"><span class="scroll-downicon">scroll down</span></a>
  </div>
</section>
<?php get_template_part("inc/cmn", "startups"); ?>
<?php get_template_part("inc/scale", "business"); ?>
<section class="tab-with-slide padding-t-120 padding-b-120" id="ind-tabslider">
  <div class="container">
    <div class="top-section b-100">
      <h2>Solutions We Deliver</h2>
      <p>We specialize in creating secure and user-friendly healthcare infrastructure, connecting the back office to  the physician’s office. Explore our healthcare application development services:</p>
    </div>
    <div class="tabs-container">
      <div class="tabs tabs-slider">
        <div class="tab-scroll glider-contain">
          <div class="glider" id="glider">
            <div class="tab active" data-target="sol1">Healthcare Organization Management</div>
            <div class="tab" data-target="sol2">Telemedicine Software Solutions</div>
            <div  class="tab" data-target="sol3">Clinical & Health Management</div>
            <div  class="tab" data-target="sol4">Healthcare Organization Management</div>
            <div  class="tab" data-target="sol5">Clinical & Health Management</div>
          </div>
          <div role="tablist" class="dots glider-dots"><button data-index="0" aria-label="Page 1" role="tab" class="glider-dot active"></button><button data-index="1" aria-label="Page 2" role="tab" class="glider-dot "></button></div>
          <div class="prev-next-btn">
            <button class="glider-prev" aria-disabled="false">
            </button>
            <button class="glider-next" aria-disabled="false">
            </button>
          </div>
        </div>
      </div>
      <div class="tab-content">
        <div class="content active" id="sol1">
          <div class="dis-flex">
            <div class="flex-2 img-div">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/sol-01.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/sol-01.png"width="403" height="346">
              </picture>
            </div>
            <div class="flex-2 content-div">
              <h3>Healthcare Organization Management Software</h3>
              <p>Streamline operations and enhance efficiency with tailored management solutions for healthcare organizations.</p>
              <ul>
                <li>Medical inventory software</li>
                <li>Medical inventory software</li>
                <li>Medical inventory software</li>
                <li>Medical inventory software</li>
                <li>Medical inventory software</li>
              </ul>
              <a href="#" class="is-arrow">Learn More</a>
            </div>
          </div>
        </div>
        <div class="content" id="sol2">
          <div class="dis-flex">
            <div class="flex-2 img-div">
              <picture>
                <source type="image/webp" srcset="images/home-images/technology-01.png">
                <img loading="lazy" src="images/home-images/technology-01.png"width="484" height="282">
              </picture>
            </div>
            <div class="flex-2 content-div">
              <h3>Clinical & Health Management</h3>
              <p>Telemedicine Software Solutions</p>
              <ul>
                <li>MVP & SaaS Development</li>
                <li>CTO as a Service </li>
                <li>Data Analytics & DevOps</li>
                <li>Technology Consulting</li>
              </ul>
              <a href="#" class="is-arrow">Find Out More</a>
            </div>
          </div>
        </div>
        <div class="content" id="sol3">
          <div class="dis-flex">
            <div class="flex-2 img-div">
              <picture>
                <source type="image/webp" srcset="images/home-images/technology-01.png">
                <img loading="lazy" src="images/home-images/technology-01.png"width="484" height="282">
              </picture>
            </div>
            <div class="flex-2 content-div">
              <h3>Computer Vision</h3>
              <p>Our design team creates user-centric experiences that captivate audiences.</p>
              <ul>
                <li>MVP & SaaS Development</li>
                <li>CTO as a Service </li>
                <li>Data Analytics & DevOps</li>
                <li>Technology Consulting</li>
              </ul>
              <a href="#" class="is-arrow">Find Out More</a>
            </div>
          </div>
        </div>
        <div class="content" id="sol4">
          <div class="dis-flex">
            <div class="flex-2 img-div">
              <picture>
                <source type="image/webp" srcset="images/home-images/technology-01.png">
                <img loading="lazy" src="images/home-images/technology-01.png"width="484" height="282">
              </picture>
            </div>
            <div class="flex-2 content-div">
              <h3>Internet of Things</h3>
              <p>Our design team creates user-centric experiences that captivate audiences.</p>
              <ul>
                <li>MVP & SaaS Development</li>
                <li>CTO as a Service </li>
                <li>Data Analytics & DevOps</li>
                <li>Technology Consulting</li>
              </ul>
              <a href="#" class="is-arrow">Find Out More</a>
            </div>
          </div>
        </div>
        <div class="content" id="sol5">
          <div class="dis-flex">
            <div class="flex-2 img-div">
              <picture>
                <source type="image/webp" srcset="images/home-images/technology-01.png">
                <img loading="lazy" src="images/home-images/technology-01.png"width="484" height="282">
              </picture>
            </div>
            <div class="flex-2 content-div">
              <h3>Mixed Reality</h3>
              <p>Our design team creates user-centric experiences that captivate audiences.</p>
              <ul>
                <li>MVP & SaaS Development</li>
                <li>CTO as a Service </li>
                <li>Data Analytics & DevOps</li>
                <li>Technology Consulting</li>
              </ul>
              <a href="#" class="is-arrow">Find Out More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<section class="data-drivetab padding-t-120 padding-b-120" id="solution-tab">
  <div class="container">
    <div class="top-section b-100">
      <h2>Solutions We Deliver</h2>
      <p>We specialize in creating secure and user-friendly healthcare infrastructure, connecting the back office to  the physician’s office. Explore our healthcare application development services:</p>
    </div>
    <div class="data-driving">
      <div class="left-panel">
        <div class="accordion">
          <div class="home-accordion-item">
            <h3 class="home-accordion-title"><i class="normal"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>
              <i class="hover"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>Online Invoicing
            </h3>
          </div>
          <div class="home-accordion-item">
            <h3 class="home-accordion-title"><i class="normal"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>
              <i class="hover"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>Financial Management
            </h3>
          </div>
          <div class="home-accordion-item">
            <h3 class="home-accordion-title"><i class="normal"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>
              <i class="hover"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>Business Operations
            </h3>
          </div>
          <div class="home-accordion-item">
            <h3 class="home-accordion-title"><i class="normal"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>
              <i class="hover"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>Customization &amp; Integration
            </h3>
          </div>
          <div class="home-accordion-item active">
            <h3 class="home-accordion-title"><i class="normal"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>
              <i class="hover"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/tab-01.svg" alt="Invoicera" width="26" height="26"></i>Client &amp; Vendor Management
            </h3>
          </div>
        </div>
        <a href="#" class="is-arrow">Explore all Features</a>
      </div>
      <div class="right-panel">
        <div class="acr-panel" id="acr-panel-1">
          <h3><a href="#">Online Invoicing</a></h3>
          <p>Effortlessly create, send, and manage professional invoices online. Streamline your invoicing process today.</p>
          <ul>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
          </ul>
          <a href="#" class="is-arrow">Explore all Features</a>    
        </div>
        <div class="acr-panel" id="acr-panel-2">
          <h3><a href="#">Financial Management</a></h3>
          <p>Gain a clearer picture of your business's financial health with tools for expense tracking, project budgeting, and insightful reporting.</p>
          <ul>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
          </ul>
          <a href="#" class="is-arrow">Explore all Features</a>       
        </div>
        <div class="acr-panel" id="acr-panel-3">
          <h3><a href="#">Business Operations</a></h3>
          <p>Enhance operational efficiency by centralizing multiple businesses, online payments, and projects.</p>
          <ul>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
          </ul>
          <a href="#" class="is-arrow">Explore all Features</a>       
        </div>
        <div class="acr-panel" id="acr-panel-4">
          <h3><a href="#">Customization &amp; Integration</a></h3>
          <p>Customize invoice templates, automate workflows, and seamlessly integrate with popular payment gateways, accounting software, and CRM systems.</p>
          <ul>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
          </ul>
          <a href="#" class="is-arrow">Explore all Features</a>        
        </div>
        <div class="acr-panel active" id="acr-panel-5">
          <h3>Client &amp; Vendor Management</h3>
          <p>Keep organized records and build strong relationships with the client portal. Track interactions and streamline communication.</p>
          <ul>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
            <li>Medical inventory software</li>
          </ul>
          <a href="#" class="is-arrow">Explore all Features</a>         
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $ctaOne = get_field('blockcta-1');
  if( isset($ctaOne['required']) && ($ctaOne['required'] == "yes") ) :
  ?>
<section class="cta-section">
  <div class="container">
    <div class="cta-wrap">
      <div class="left-sec">
        <div class="top-section"><?php echo $ctaOne['content']; ?></div>
      </div>
      <div class="right-sec">
        <?php 
          if( $ctaOne['thumb'] ){
            echo vc_pictureElm( $ctaOne['thumb'] );
          }else{
          ?>
        <picture>
          <source type="image/webp" srcset="<?php _vers_six('images/home-images/cta-image.png'); ?>">
          <img loading="lazy" src="<?php _vers_six('images/home-images/cta-image.png'); ?>" width="420" height="394" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="services-three-column-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="top-section b-100">
      <h2>Empowering Healthcare Navigation with Digital Solutions</h2>
      <p>Businesses often struggle to integrate effective digital solutions while facing the complexities of the healthcare sector. As a leading healthcare software development company, ValueCoders specializes in developing medical web apps and solutions that address these challenges.</p>
    </div>
    <div class="dis-flex justify-sb twobox">
      <div class="flex-2 img-box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images/service-image.png.webp">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/industry-images.png.webp" alt="service-image" width="429" height="628">
        </picture>
      </div>
      <div class="flex-2 content-box">
        <div class="dis-flex threebox">
          <div class="flex-2 has-anchor">
            <div class="box-3">
              <h3>Modular Microservices-Based Solutions</h3>
              <p>Whether you’re just starting out or transitioning from another platform, we can build the perfect solution for you.</p>
              <ul>
                <li>Test  </li>
              </ul>
              <a href="#" class="is-arrow">Learn More</a>
            </div>
          </div>
          <div class="flex-2 has-anchor">
            <div class="box-3">
              <h3>Market Entry Consultation</h3>
              <p>From measuring market size to competitors’ analysis to identifying growth opportunities, we do it all for you.</p>
              <a href="#" class="is-arrow">Learn More</a>
            </div>
          </div>
          <div class="flex-2 has-anchor">
            <div class="box-3">
              <h3>Technology Consultation</h3>
              <p>We help you recognize your business and technology requirements, assess growth perspectives, and calculate the implementation cost and time.</p>
            </div>
          </div>
          <div class="flex-2 has-anchor">
            <div class="box-3">
              <h3>Operational Consultation</h3>
              <p>We will review and strengthen your supply chain, production, order management and supply, data management, and analytics.</p>
            </div>
          </div>
          <div class="flex-2 has-anchor">
            <div class="box-3">
              <h3>Business Consultation</h3>
              <p>Let us review your business strategy, technology aspects, mobile presence, and more to create an action plan that positively impacts the bottom line.</p>
            </div>
          </div>
          <div class="flex-2 has-anchor">
            <div class="box-3">
              <h3>Platform-based eCommerce Solutions</h3>
              <p>We design and develop beautiful, highly customized, and scalable websites using <a href="https://www.valuecoders.com/services/ecommerce/magento-development">Adobe Commerce (Magento) platform</a>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="service-scroller padding-t-120 padding-b-120" id="serv">
  <div class="container">
    <div class="service-wrap">
      <div class="left-panel">
        <div class="top-section">
          <h6>What we serve</h6>
          <h2>Software Development & Engineering Services</h2>
          <p>Driven by the top 1% of software engineering talent in India, we deliver robust, scalable.</p>
        </div>
        <div class="ser-button">
          <i><img src="images/home-images/vc-fav.svg" width="40" height="40"></i>
          <h2>Fuel your <strong>Digital-First</strong> Idea</h2>
          <p>With 1600+ Transformation Experts</p>
          <div class="btn-container">
            <a href="#" class="cta-button yellow">
            GET STARTED
            </a>
          </div>
        </div>
      </div>
      <div class="right-panel">
        <div class="content-box">
          <div class="img-sec">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-01.png"width="40" height="40">
            </picture>
          </div>
          <div class="text-box">
            <h3>Software Product Engineering</h3>
            <p>We offer end-to-end software outsourcing services from initial consulting to development & deployment.</p>
            <ul>
              <li>MVP Development</li>
              <li>Digital Transformation</li>
              <li>SaaS Development</li>
              <li>Application Modernization</li>
            </ul>
          </div>
          <a class="move" href="#"></a>
        </div>
        <div class="content-box">
          <div class="img-sec">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-02.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-02.png"width="40" height="40">
            </picture>
          </div>
          <div class="text-box">
            <h3>Software Product Engineering</h3>
            <p>We offer end-to-end software outsourcing services from initial consulting to development & deployment.</p>
            <ul>
              <li>MVP Development</li>
              <li>Digital Transformation</li>
              <li>SaaS Development</li>
              <li>Application Modernization</li>
            </ul>
          </div>
          <a class="move" href="#"></a>
        </div>
        <div class="content-box">
          <div class="img-sec">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-01.png"width="40" height="40">
            </picture>
          </div>
          <div class="text-box">
            <h3>Software Product Engineering</h3>
            <p>We offer end-to-end software outsourcing services from initial consulting to development & deployment.</p>
            <ul>
              <li>MVP Development</li>
              <li>Digital Transformation</li>
              <li>SaaS Development</li>
              <li>Application Modernization</li>
            </ul>
          </div>
          <a class="move" href="#"></a>
        </div>
        <div class="content-box">
          <div class="img-sec">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-02.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/sericon-02.png"width="40" height="40">
            </picture>
          </div>
          <div class="text-box">
            <h3>Software Product Engineering</h3>
            <p>We offer end-to-end software outsourcing services from initial consulting to development & deployment.</p>
            <ul>
              <li>MVP Development</li>
              <li>Digital Transformation</li>
              <li>SaaS Development</li>
              <li>Application Modernization</li>
            </ul>
          </div>
          <a class="move" href="#"></a>
        </div>
      </div>
      <!--//.right-panel-->
    </div>
  </div>
</section>
<?php get_template_part('inc/client', 'industry'); ?>
<?php 
  $ctaTwo = get_field('blockcta-2');
  if( isset($ctaTwo['required']) && ($ctaTwo['required'] == "yes") ) :
  ?>
<section class="bg-blue-linear  padding-t-70 padding-b-70 ">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-sec">
        <div class="head-txt">
          <?php echo $ctaTwo['content']; ?>
        </div>
        <div class="btn-sec margin-t-50 ">
          <a href="https://www.valuecoders.com/staging/contact" class="btn rounded">
          <span class="text-white">Get Free Consulation</span>
          </a>
        </div>
      </div>
      <div class="right-sec">
        <?php 
          if( $ctaTwo['thumb'] ){
            echo vc_pictureElm( $ctaTwo['thumb'] );
          }else{
          ?>
        <picture>
          <source type="image/webp" srcset="<?php _vers_six('images/industry-images/cta-image01.png'); ?>">
          <img loading="lazy" src="<?php _vers_six('images/industry-images/cta-image01.png'); ?>" width="538" height="430" alt="valuecoders">
        </picture>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


 <section class="tabs-section technologies-tabs padding-t-120 padding-b-120" id="tabs-section-3">
      <div class="container">
        <div class="top-section b-100">
          <h2>We Have Expertise In</h2>
          <p>Backed by 675+ digital experts, PixelCrayons is committed to deliver scalable, robust, and advanced solutions that meet specific needs of clients.</p>
        </div>
        <div class="tab-flex">
          <div class="tabs-container">
            <ul class="tabs">
              <li class="tab active" data-target="telm-1">
                <img src="images/industry-images/tech-01.svg" class="normal" alt="Digital Marketing">
                <img src="images/industry-images/tech-01.svg" class="hover" alt="Digital Marketing"> Digital Marketing
              </li>
              <li class="tab " data-target="telm-2">
                <img src="images/industry-images/tech-01.svg" class="normal" alt="Full Stack &amp; Frameworks">
                <img src="images/industry-images/tech-01.svg" class="hover" alt="Full Stack &amp; Frameworks"> Full Stack &amp; Frameworks
              </li>
              <li class="tab " data-target="telm-3">
            </ul>
            <div class="tab-content">
              <div class="content active" id="telm-1">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="#">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="images/industry-images/tech-01.svg">
                            <img loading="lazy" src="images/industry-images/tech-01.svg" alt="Content Writer" width="0" height="0">
                          </picture>
                        </i>
                        Content Writer
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="#">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="images/industry-images/tech-01.svg">
                            <img loading="lazy" src="images/industry-images/tech-01.svg" alt="PPC Expert" width="0" height="0">
                          </picture>
                        </i>
                        PPC Experts
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="#">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="images/industry-images/tech-01.svg">
                            <img loading="lazy" src="images/industry-images/tech-01.svg" alt="PPC Expert" width="0" height="0">
                          </picture>
                        </i>
                        PPC Experts
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="#">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="images/industry-images/tech-01.svg">
                            <img loading="lazy" src="images/industry-images/tech-01.svg" alt="PPC Expert" width="0" height="0">
                          </picture>
                        </i>
                        PPC Experts
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content " id="telm-2">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/dot-net-core-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-01.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-01.svg" alt="biggd-01" width="0" height="0">
                          </picture>
                        </i>
                        .NET Core
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/django-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-02.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-02.svg" alt="biggd-02" width="0" height="0">
                          </picture>
                        </i>
                        Django
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/mean-stack-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-03.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-03.svg" alt="biggd-03" width="0" height="0">
                          </picture>
                        </i>
                        MEAN
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/mern-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-04.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/biggd-04.svg" alt="biggd-04" width="0" height="0">
                          </picture>
                        </i>
                        MERN
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content " id="telm-3">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/dot-net-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-01.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-01.svg" alt="bk-01" width="0" height="0">
                          </picture>
                        </i>
                        .NET
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/python-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-02.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-02.svg" alt="bk-02" width="0" height="0">
                          </picture>
                        </i>
                        Python
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/blockchain-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-03.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-03.svg" alt="bk-03" width="0" height="0">
                          </picture>
                        </i>
                        Blockchain
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/golang-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-04.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-04.svg" alt="bk-04" width="0" height="0">
                          </picture>
                        </i>
                        Golang
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/java-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-05.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-05.svg" alt="bk-05" width="0" height="0">
                          </picture>
                        </i>
                        Java
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/laravel-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-06.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-06.svg" alt="bk-06" width="0" height="0">
                          </picture>
                        </i>
                        Laravel
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/next-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-07.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-07.svg" alt="bk-07" width="0" height="0">
                          </picture>
                        </i>
                        Next
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/angular-js-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-08.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-08.svg" alt="bk-08" width="0" height="0">
                          </picture>
                        </i>
                        Angular
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/typescript-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-09.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/bk-09.svg" alt="bk-09" width="0" height="0">
                          </picture>
                        </i>
                        TypeScript
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content " id="telm-4">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/magento-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-01.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-01.svg" alt="ecom-01" width="0" height="0">
                          </picture>
                        </i>
                        Adobe Commerce
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/opencart-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-02.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-02.svg" alt="ecom-02" width="0" height="0">
                          </picture>
                        </i>
                        Opencart
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/woocommerce-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-03.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-03.svg" alt="ecom-03" width="0" height="0">
                          </picture>
                        </i>
                        WooCommerce
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/drupal-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-04.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-04.svg" alt="ecom-04" width="0" height="0">
                          </picture>
                        </i>
                        Drupal
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/wordpress-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-05.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-05.svg" alt="ecom-05" width="0" height="0">
                          </picture>
                        </i>
                        WordPress
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/services/strapi-development">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-06.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-06.svg" alt="ecom-06" width="0" height="0">
                          </picture>
                        </i>
                        Strapi
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/shopify-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-07.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/ecom-07.svg" alt="ecom-07" width="0" height="0">
                          </picture>
                        </i>
                        Shopify
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content " id="telm-5">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/android-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-01.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-01.svg" alt="mo-01" width="0" height="0">
                          </picture>
                        </i>
                        Android
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/flutter-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-02.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-02.svg" alt="mo-02" width="0" height="0">
                          </picture>
                        </i>
                        Flutter
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/iphone-app-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-03.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-03.svg" alt="mo-03" width="0" height="0">
                          </picture>
                        </i>
                        iOS
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/kotlin-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-04.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-04.svg" alt="mo-04" width="0" height="0">
                          </picture>
                        </i>
                        Kotlin
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/react-native-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-05.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/mo-05.svg" alt="mo-05" width="0" height="0">
                          </picture>
                        </i>
                        React Native
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content " id="telm-6">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/azure-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/aws.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/aws.svg" alt="aws" width="0" height="0">
                          </picture>
                        </i>
                        Azure
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/aws-developers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/azure.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/azure.svg" alt="azure" width="0" height="0">
                          </picture>
                        </i>
                        AWS
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content " id="telm-7">
                <div class="dis-flex">
                  <div class="flex-1 content-div">
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/automation-testers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/automation.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/automation.svg" alt="automation" width="0" height="0">
                          </picture>
                        </i>
                        Automation QA
                      </a>
                    </div>
                    <div class="cont-col">
                      <a href="https://www.pixelcrayons.com/staging/hire/manual-testers">
                        <i>
                          <picture>
                            <source type="image/svg+xml" srcset="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/manual.svg">
                            <img loading="lazy" src="https://www.pixelcrayons.com/staging/wp-content/uploads/2025/02/manual.svg" alt="manual" width="0" height="0">
                          </picture>
                        </i>
                        Manual QA
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



<?php 
  $trendElm = get_field('tech-trends');
  if( isset($trendElm['required']) && ($trendElm['required'] == "yes") ) :
  ?>
<section class="tabs-section techno-tabs padding-t-120 padding-b-120" id="tabs-section-2">
  <div class="container">
    <div class="top-section b-100"><?php echo $trendElm['content']; ?></div>
    <div class="tab-flex">
      <?php 
        if( $trendElm['tabs'] ){
        ?>
      <div class="tabs-container">
        <ul class="tabs">
          <?php 
            $i = 0;
            foreach( $trendElm['tabs'] as $tab ) { 
                $i++;
                $active   = ($i === 1) ? 'active' : '';  
                $imgUrl   = !empty($tab['icon']['url']) ? $tab['icon']['url'] : 'placeholder.jpg';
                $himgUrl  = !empty($tab['hicon']['url']) ? $tab['hicon']['url'] : 'placeholder.jpg';
                echo '<li class="tab '.$active.'" data-target="telm-'.$i.'">
                <img src="'.$imgUrl.'" class="normal" alt="'.$tab['title'].'"><img src="'.$himgUrl.'" class="hover" alt="'.$tab['title'].'"> '.$tab['title'].'</li>';
            }
            ?>        
        </ul>
        <div class="tab-content">
          <?php 
            $i = 0;
            foreach( $trendElm['tabs'] as $tab ){ $i++;
            $active = ( $i === 1 ) ? 'active' : '';  
            echo '<div class="content '.$active.'" id="telm-'.$i.'">
              <div class="dis-flex">
                <div class="flex-2 img-div">'.vc_pictureElm($tab['image']).'</div>
                <div class="flex-2 content-div">'.$tab['text'].'<a href="'.vc_siteurl($tab['link']).'" class="is-arrow">Find Out More</a></div>
              </div>
            </div>';
            } 
            ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="hire-model-tab  padding-t-120 padding-b-120" id="hire-model">
  <div class="container">
    <div class="heading text-center">
      <h2>Our Custom Hiring Models</h2>
      <div class="head-txt text-center">
        <p>Choose from our flexible hiring models designed to fit your needs and budget.</p>
      </div>
    </div>
    <div class="hire-tabs-section margin-t-50">
      <div class="tab-row">
        <nav id="hiring-models" class="tab-nav">
          <div class="tab-scroll">
            <div class="tablist active" data-tab="#tab01"><a href="javascript:void(0);">Fixed Price Model</a></div>
            <div class="tablist" data-tab="#tab02"><a href="javascript:void(0);">Dedicated Hiring Model</a></div>
            <div class="tablist" data-tab="#tab03"><a href="javascript:void(0);">Time & Material Model</a></div>
          </div>
        </nav>
        <div class="bcontents">
          <div id="tab01" class="tab-contents active">
            <div class="dis-flex">
              <div class="content-box">
                <h3>Fixed Price Model</h3>
                <p>For businesses with well-defined project scope and requirements.</p>
                <ul>
                  <li>Simplified process</li>
                  <li>Higher predictability</li>
                  <li>Greater transparency</li>
                  <li>Reduced risk</li>
                  <li>Low management efforts</li>
                </ul>
              </div>
              <div class="image-box">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/hm-1.webp">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/hm-1.webp" alt="hiring-model01" width="665" height="366">
                </picture>
              </div>
            </div>
          </div>
          <div id="tab02" class="tab-contents">
            <div class="dis-flex">
              <div class="content-box">
                <h3>Dedicated Hiring Model</h3>
                <p>For businesses with long-term project requirements or complex development process. They get more control of the process.</p>
                <ul>
                  <li>Complete control</li>
                  <li>More flexibility</li>
                  <li>Focused and dedicated approach</li>
                  <li>Faster time to market</li>
                </ul>
              </div>
              <div class="image-box">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/hm-2.webp">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/hm-2.webp" alt="hiring-model01" width="665" height="366">
                </picture>
              </div>
            </div>
          </div>
          <div id="tab03" class="tab-contents">
            <div class="dis-flex">
              <div class="content-box">
                <h3>Time & Material Model</h3>
                <p>For businesses looking to pay for completed project instead of committing to fixed project cost.</p>
                <ul>
                  <li>Faster project start</li>
                  <li>Flexibility to adapt as per changing needs</li>
                  <li>Pay as you go model</li>
                </ul>
              </div>
              <div class="image-box">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/hm-3.webp">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/hm-3.webp" alt="hiring-model01" width="665" height="366">
                </picture>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $guideTopics 	= get_field('guide-topics');
  $gtEnabled 		= $guideTopics['is_enabled'];
  if( $gtEnabled == 'yes' ) :
  ?>
<section id="has-ug" class="tab-scroll-section padding-t-150 padding-b-150 <?php echo $guideTopics['sc_background']; ?>">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $guideTopics['content']; ?>
    </div>
    <?php 
      $topics = $guideTopics['topics'];
      if( $topics ) :
      ?>
    <div id="scroll-box" class="dis-flex margin-t-100 tab-contents">
      <div class="left-tabs" id="left-scroll">
        <div class="sticky-tab">
          <span class="tab-head clr-white">Guide Topics</span>
          <div class="tab-nav">
            <?php 
              $tn = 0;
              foreach( $topics as $topicNav ){
              	$tn++;
              	$isActive = "";
              	if( $tn == 1 ){
              		$isActive = "is-active";
              	}
              	echo '<a href="#ug'.$tn.'" class="tab-link">'.$topicNav['title'].'</a>';
              } 
              ?>
          </div>
        </div>
      </div>
      <div class="right-tabs" id="right-scroll">
        <?php 
          $tn = 0;
          foreach( $topics as $topicText ){
          	$tn++;
          	$isActive = "";
          	if( $tn == 1 ){
          		$isActive = "is-active";
          	}
          	echo '<div class="tab-content" id="ug'.$tn.'">'.$topicText['text'].'</div>';
          } 
          ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<?php getPageCaseStudiesV3( $thisPostID, true ); ?>
<?php 
  $faqs 		= get_field('faq-group');
  $faqEnable 	= $faqs['is_enabled'];
  if( $faqEnable == "yes" ) :
  ?>
<section class="faq-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="top-section b-100"><?php echo $faqs['content']; ?></div>
    <?php 
      if( $faqs['faq'] ){
      	echo '<div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">';
      	$faqCount = 0;
      	foreach ($faqs['faq'] as $row){ $faqCount++;
      		$isActive = "";
      		if( $faqCount <= 3 ){
      			$isActive = "active";
      		}
      		echo '<div class="faq-accordion-item-outer '.$isActive.'" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
      			<h3 class="faq-accordion-toggle" itemprop="name">'.$row['title'].'</h3>
      			<div class="faq-accordion-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">'.$row['text'].'</div></div>
      		</div>';
      	}
      	echo '</div>';
      } 
      ?>
  </div>
</section>
<?php endif; ?>
<?php getPageCaseStudiesV3( $thisPostID ); ?>
<?php get_template_part('include/testimonials', 'v4.0'); ?>
<?php get_footer(); ?>