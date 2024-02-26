<?php
  function vc_is_mobile() {
      if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
          $is_mobile = false;
      } elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // Many mobile devices (all iPhone, iPad, etc.)
          || strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
          || strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
          || strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
          || strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
          || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
          || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
              $is_mobile = true;
      } else {
          $is_mobile = false;
      }
      return $is_mobile;
  }
  $is_staging = ( isset( $_SERVER['PHP_SELF'] ) && (strpos( $_SERVER['PHP_SELF'], 'v2wp' ) !== false) )  ?  true : false;
  if( $is_staging ){
  $site_url   = 'https://www.valuecoders.com/v2wp/';
  }else{
  $site_url   = 'https://www.valuecoders.com/';
  }  
  if( isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost") ){
    $site_url   = 'http://localhost/valuecoders.com/staging/';
  }
  $tpl_url    = $site_url.'wp-content/themes/valuecoders';
  $mcat       = (isset( $args['pcat']) && !empty($args['pcat']) ) ? $args['pcat'] : 'master';
  //$mcat       = 'ai-ml';
  /*
  Main MenuCategories >>>
  engineering : Product Engineering
  app-development : Application Development
  demand-teams : On Demand Teams
  ecommerce : eCommerce
  qa-testing : QA & Testing
  devops : Analytics & DevOps
  startups : For Startups
  enterprises : For Enterprises
  agencies : For Agencies
  */
  //$mcat     = 'devops';
  $pcatArray = [
    'engineering'     => ['name' => 'Product Engineering', 'slug' => 'outsource-software-product-development-services', 
    'icon' => 'company_icon1.svg'],
    'app-development' => ['name' => 'Application Development', 'slug' => 'application-development', 'icon' => 'company_icon2.svg'],
    'demand-teams'    => ['name' => 'Dedicated Software Teams', 'slug' => 'dedicated-development-teams', 'icon' => 'company_icon3.svg'],
    'ecommerce'       => ['name' => 'eCommerce', 'slug' => 'ecommerce-development-services', 'icon' => 'service_icon5.svg'],
    'qa-testing'      => ['name' => 'QA & Testing', 'slug' => 'software-quality-assurance-testing-services', 'icon' => 'company_icon4.svg'  ],
    'devops'          => ['name' => 'Cloud Services', 'slug' => 'cloud-services', 
    'icon' => 'cs-main-icon.svg'],
    'data-science'    => ['name' => 'Data Engineering', 'slug' => 'data-engineering', 'icon' => 'data-science.svg'],
    'ai-ml'           => ['name' => 'Artificial Intelligence', 'slug' => 'ai', 'icon' => 'ai_ml.svg']
  ];
  
  $psubcatArray = [
    'startups'      => ['name' => 'For Startups', 'slug' => 'startup-product-development', 'icon' => 'startup-icon.svg' ],
    'enterprises'   => ['name' => 'For Enterprises', 'slug' => 'enterprise-software-development-services', 'icon' => 'enterprise-icon.svg'],
    'agencies'      => ['name' => 'For Agencies', 'slug' => 'industries/agencies-software-development-services', 'icon' => 'agencies-icon.svg']
  ];
  $mainServiceLink = '<a href="'.$site_url.'software-development-services-company">Services</a>';
  if( $mcat !== "master" ){
    $combArray = array_merge( $pcatArray, $psubcatArray );
    //$mainServiceLink = '<a href="'.$site_url.$combArray[$mcat]['slug'].'">'.$combArray[$mcat]['name'].'</a>';
    /*
    if( $mcat === "devops" ){
      $mainServiceLink = '<a href="'.$site_url.$combArray[$mcat]['slug'].'">Technologies</a>';  
    }else{
      $mainServiceLink = '<a href="'.$site_url.$combArray[$mcat]['slug'].'">Services</a>';  
    }
    */

    $mainServiceLink = '<a href="'.$site_url.$combArray[$mcat]['slug'].'">Services</a>';  
  }
  ?>
<?php //if( !vc_is_mobile() ) : ?>
<header class="header-two">
  <div class="container">
    <div class="wrapper">
      <div class="header-item-left">
        <a href="<?php echo $site_url; ?>" class="brand">
          <div class="large">
            <!-- <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-v2.svg" alt="Valuecoders" class="dark-theme-logo" width="277" height="49"> -->
            <img loading="lazy" src="<?php echo $tpl_url; ?>/dev-img/logo-light.svg" alt="Valuecoders" class="dark-theme-logo" width="400" height="88">
          </div>
          <div class="small">
            <!-- <img loading="lazy" src="<?php echo $tpl_url; ?>/images/vc-logo-dark.png" alt="Valuecoders" 
              class="dark-theme-logo sm" width="66" height="66"> -->
              <img loading="lazy" src="<?php echo $tpl_url; ?>/dev-img/logo-small.svg" alt="Valuecoders" class="dark-theme-logo sm" width="80" height="80">
          </div>
        </a>

        <?php 
        if( in_array( $mcat, array_keys( $pcatArray ) ) ) :
        ?>
        <div class="menu">
          <ul>
            <li class="menu-item-has-children small-menu for-product">
              <!--<a href="<?php echo $site_url; ?>software-development-services-company">Services</a>-->
                <a href="<?php echo $site_url.$pcatArray[$mcat]['slug']; ?>"><?php echo $pcatArray[$mcat]['name']; ?></a>
              <span class="arrow-btn"></span>
              <div class="small-menu-inner menu-mega">
                <?php 
                  foreach( $pcatArray as $key => $value) {
                    if( $key != $mcat ){
                      echo '<a href="'.$site_url.$value['slug'].'"><img loading="lazy" src="'.$tpl_url.'/menu-images/'.$value['icon'].'" class="menuicon vm-'.$value['slug'].'" alt="menuicon">'.$value['name'].'</a>';  
                    }                  
                  }
                  ?>                
              </div>
            </li>
          </ul>
        </div>
        <?php 
        endif; 
          
        if( in_array( $mcat, array_keys( $psubcatArray ) ) ) :
        ?>
        <div class="menu">
          <ul>
            <li class="menu-item-has-children small-menu for-product">
              <!-- 
                <a href="<?php echo $site_url.$psubcatArray[$mcat]['slug']; ?>"><?php echo $psubcatArray[$mcat]['name']; ?></a> 
                -->
              <a href="<?php echo $site_url; ?>software-development-services-company">Services</a>
              <span class="arrow-btn"></span>
              <div class="small-menu-inner menu-mega">
                <?php 
                  foreach( $psubcatArray as $key => $value) {
                    if( $key != $mcat ){
                      echo '<a href="'.$site_url.$value['slug'].'"><img loading="lazy" src="'.$tpl_url.'/menu-images/'.$value['icon'].'" class="menuicon" alt="menuicon">'.$value['name'].'</a>';  
                    }                  
                  }
                  ?>                
              </div>
            </li>
          </ul>
        </div>
        <?php endif; ?>
        <div class="hamberger-menu">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </div>

      <!-- Navbar Section -->
      <?php if( !isset( $_GET['l'] ) ) : ?>
      <div class="header-item-center">
        <nav class="menu mob-nav" id="menu">
          <a href="<?php echo $site_url; ?>" class="brand">
          <!-- 
            <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-v2.svg" alt="Valuecoders" class="dark-theme-logo" width="260" height="46"> 
          -->
          <img loading="lazy" src="<?php echo $tpl_url; ?>/dev-img/logo-light.svg" alt="Valuecoders" class="dark-theme-logo" width="400" height="88">
          </a>
          <ul>
            <li class="menu-item-has-children">
              <?php echo $mainServiceLink; ?> <span class="arrow-btn"></span>
              <div class="menu-mega container">
                <?php 
                if( $mcat == "master" ){
                ?>
                <div class="container landing-menu" id="landing-menu">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <span class="head">by TEAM Expertise</span>
                      <a href="<?php echo $site_url; ?>outsource-software-product-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon1.svg" class="menuicon" alt="menuicon"><span class="title">Software Product Engineering</span>
                      Innovative, future-proof software solutions</a>
                      <a href="<?php echo $site_url; ?>dedicated-development-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon2.svg" class="menuicon" alt="menuicon"><span class="title">Dedicated Software Teams</span>
                      Skilled developers, transparent billing</a>
                      <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon3.svg" class="menuicon" alt="menuicon"><span class="title">QA & Testing</span>Comprehensive QA & Testing solutions</a>
                      <a href="<?php echo $site_url; ?>cloud-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/cs-main-icon.svg" class="menuicon" alt="menuicon">
                      <span class="title">Cloud Services</span>
                      Seamless, secure, superior cloud services</a>
                      <!-- 
                        <a href="<?php echo $site_url; ?>ai-ml-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/aiml-icon.svg" class="menuicon" alt="menuicon"><span class="title">AI/ML</span>
                        Innovate, optimize, and scale with AI and ML Solutions</a> 
                        -->
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon4.svg" class="menuicon" alt="menuicon"><span class="title">Application Development</span>
                      End-to-end app development</a>
                      <a href="<?php echo $site_url; ?>ecommerce-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon5.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce</span>Next-level solutions for B2B & B2C</a>
                      <!-- 
                        <a href="<?php echo $site_url; ?>business-intelligence-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon6.svg" class="menuicon" alt="menuicon"><span class="title">Analytics</span>
                        Business Intelligence, custom dashboard</a> 
                        -->
                        <a href="<?php echo $site_url; ?>data-engineering"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/data-science.svg" class="menuicon" alt="menuicon"><span class="title">Data Engineering</span>
                        Accelerate growth with data science</a>
                        <a href="<?php echo $site_url; ?>ai"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/chat-gpt.svg" class="menuicon" alt="menuicon"><span class="title">AI & ML
                        </span>
                        Drive technological innovation</a>
                    </div>
                    <div class="flex-3">
                      <span class="head">BY CLIENT TYPE</span>
                      <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon7.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                      Custom software for business goals</a>
                      <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon8.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                      End-to-end automation solutions</a>
                      <a href="<?php echo $site_url; ?>industries/agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon9.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                      Expand with white-label services</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "engineering"){ ?>
                <div class="container w-14 prod-eng" id="m-product-engineering">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>startup-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon1.svg" class="menuicon" alt="menuicon"><span class="title">Product Consulting</span>
                      Expert advice on technology, process & more</a>
                      <a href="<?php echo $site_url; ?>product-ui-ux-design"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Product UI/UX Design</span>
                      Choose the right technology and process</a>
                      <a href="<?php echo $site_url; ?>outsource-software-product-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon3.svg" class="menuicon" alt="menuicon"><span class="title">Software Product Development</span>
                      Assistance from product conception to release</a>
                    </div>
                    <div class="flex-3">  
                      <a href="<?php echo $site_url; ?>mvp-app-development-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon4.svg" class="menuicon" alt="menuicon"><span class="title">MVP Development </span>
                      Validate your idea and ensure its success</a>
                      <a href="<?php echo $site_url; ?>saas-consulting-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon5.svg" class="menuicon" alt="menuicon"><span class="title">SaaS Development </span>
                      Scalable SaaS solutions for business growth</a>
                      <a href="<?php echo $site_url; ?>digital-transformation-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon6.svg" class="menuicon" alt="menuicon"><span class="title">Digital Transformation </span>
                      Lead your business into the digital era</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon7.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization </span>
                      Update your web and mobile applications</a>
                      <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon8.svg" class="menuicon" alt="menuicon"><span class="title">Application Maintenance</span>
                      Effortless maintenance for your applications</a>
                      <a href="<?php echo $site_url; ?>cloud-services/devops-consulting"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon9.svg" class="menuicon" alt="menuicon"><span class="title">Analytics & DevOps</span>
                      Consult experts for big data and DevOps</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "app-development"){ ?>
                <div class=" container w-14 landing-menu app-development" id="m-app-development">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <span class="head">Our Expertise</span>
                      <a href="<?php echo $site_url; ?>web-application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon1.svg" class="menuicon" alt="menuicon"><span class="title">Web App Development</span>
                      Innovative browser applications</a>
                      <a href="<?php echo $site_url; ?>backend-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Backend Development</span>
                      Robust server/client expertise</a>
                      <a href="<?php echo $site_url; ?>top-website-development-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon3.svg" class="menuicon" alt="menuicon"><span class="title">Website & Portal Development</span>
                      Secure, user-centric solutions</a>
                      <a href="<?php echo $site_url; ?>frontend-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon4.svg"class="menuicon" alt="menuicon"><span class="title">Frontend Development</span>Flawless UI/UX creation</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>mobile-application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon5.svg" class="menuicon" alt="menuicon"><span class="title">Mobile App Development</span>
                      Seamless mobile experiences</a>
                      <a href="<?php echo $site_url; ?>cross-platform-app-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon6.svg" class="menuicon" alt="menuicon"><span class="title">Cross-Platform App Development</span>Unified multi-platform solutions</a>
                      <a href="<?php echo $site_url; ?>api-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon7.svg" class="menuicon" alt="menuicon"><span class="title">API Development</span>
                      Efficient API management</a>
                      <a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon8.svg" class="menuicon" alt="menuicon"><span class="title">Full Stack Development</span>
                      Secure scalable applications</a>
                    </div>
                    <div class="flex-3">
                      <span class="head">OTHER services</span>
                      <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon9.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>Comprehensive support solutions</a>
                      <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon10.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>Update your applications</a>
                      <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon11.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>Monetize your content</a>
                      <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/application-dev-icon12.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>Cloud-based software solutions</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "startups"){ ?>        
                <div class="container w-14 startups" id="m-startups">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>discovery-phase-process"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-startups-icon3.svg" class="menuicon" alt="menuicon"><span class="title">Discovery Phase</span>
                      Blueprinting your vision strategically</a>
                      <a href="<?php echo $site_url; ?>mvp-app-development-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon4.svg" class="menuicon" alt="menuicon"><span class="title">MVP Development & Consulting</span>
                      Minimize risk, maximize success</a>
                      <a href="<?php echo $site_url; ?>saas-consulting-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-startups-icon2.svg" class="menuicon" alt="menuicon"><span class="title">SaaS Consulting & Development</span>
                      Empower your growth through SaaS</a>
                    </div>
                    <div class="flex-3">  
                      <a href="<?php echo $site_url; ?>startup-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/prod-engg-icon1.svg" class="menuicon" alt="menuicon"><span class="title">Product Consulting</span>
                      Guiding from creation to launch</a>
                      <a href="<?php echo $site_url; ?>product-ui-ux-design"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-startups-icon4.svg" class="menuicon" alt="menuicon"><span class="title">Product UI/UX Design  </span>
                      Choose the right technology and process</a>
                      <a href="<?php echo $site_url; ?>dedicated-development-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-startups-icon5.svg" class="menuicon" alt="menuicon"><span class="title">Dedicated Development Teams</span>
                      Hire dedicated technical resources</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-startups-icon7.svg" class="menuicon" alt="menuicon"><span class="title">QA & Testing </span>
                      Comprehensive QA & Testing solutions</a>
                      <a href="<?php echo $site_url; ?>cto-as-a-service"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon2.svg" class="menuicon" alt="menuicon"><span class="title">CTO as a Service</span>
                      Strategic team & project management</a>
                      <a href="<?php echo $site_url; ?>business-intelligence-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-startups-icon9.svg" class="menuicon" alt="menuicon"><span class="title">Analytics & DevOps</span>
                      Hire big data & DevOps consultants</a>
                    </div>
                  </div>
                </div>
                <!-- // For Startups  Ends  -->
                <?php }elseif( $mcat == "demand-teams"){ ?>                
                <div class="container w-900 demand-teams" id="m-demand-team">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <span class="head">Expertise</span>
                      <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/on-demands-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Staff Augmentation</span>
                      Access top technical resources on-demand</a>
                      <a href="<?php echo $site_url; ?>hire-developers"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon2.svg" class="menuicon" alt="menuicon"><span class="title">Hire Developers</span>
                      Work with skilled & dedicated developers</a>
                    </div>
                    <div class="flex-3 bg-light">
                        <span class="head">Solutions</span>
                      <a href="<?php echo $site_url; ?>offshore-software-development-center-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon7.svg" class="menuicon" alt="menuicon"><span class="title">Offshore Development Center</span>
                      Unleash the power of offshore development</a>
                      <a href="<?php echo $site_url; ?>offshore-software-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon8.svg" class="menuicon" alt="menuicon"><span class="title">Offshore Software Development</span>
                      Leverage talent, cost-effectiveness, and quality</a>
                      <a href="<?php echo $site_url; ?>nearshore-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/service_icon9.svg" class="menuicon" alt="menuicon"><span class="title">Nearshore Software Development</span>
                      Technical expertise, shared time zone</a>
                    </div>
                  </div>
                </div>
                <!-- //On Demand Teams Ends -->
                <?php }elseif( $mcat == "ecommerce"){ ?>
                <div class=" container w-14 landing-menu ecom" id="m-ecommerce">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <span class="head">our expertise</span>
                      <a href="<?php echo $site_url; ?>ecommerce-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon2.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce Consulting</span>
                      Your store, our success strategy</a>
                      
                      <a href="<?php echo $site_url; ?>ecommerce-web-design"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon4.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce Web Design</span>
                      Designing conversion pathways</a>

                      <a href="<?php echo $site_url; ?>ecommerce/maintenance-support"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecom-icon3.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce Maintenance & Support</span>
                      Elevate every eExperience</a>

                      <a href="<?php echo $site_url; ?>ecommerce/implementation-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecom-icon4.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce Implementation</span>
                      Bring digital storefronts to life</a>
                    </div>
                    <div class="flex-3">
                      <span class="head">Technology</span>
                      <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon5.svg" class="menuicon" alt="menuicon"><span class="title">Magento</span>
                      Work with certified Magento developers</a>
                      <a href="<?php echo $site_url; ?>shopify-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon6.svg" class="menuicon" alt="menuicon"><span class="title">Shopify</span>
                      Create top-quality eCommerce services</a>
                      <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon7.svg" class="menuicon" alt="menuicon"><span class="title">WooCommerce</span>
                      Make eCommerce site more responsive</a>
                      <a href="#"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon8.svg" class="menuicon" alt="menuicon"><span class="title">OpenCart</span>
                      Build flawless cart with latest technologies</a>
                    </div>
                    <div class="flex-3">
                      <span class="head">Solutions</span>
                      <a href="<?php echo $site_url; ?>b2c-ecommerce"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon9.svg" class="menuicon" alt="menuicon"><span class="title">B2C eCommerce</span>
                      Gain more customers with B2C solutions</a>
                      <a href="<?php echo $site_url; ?>b2b-ecommerce"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon10.svg" class="menuicon" alt="menuicon"><span class="title">B2B eCommerce</span>
                      Create digital business solutions with B2B</a>
                      <a href="<?php echo $site_url; ?>ecommerce-web-portal"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon11.svg" class="menuicon" alt="menuicon"><span class="title">Web Portals</span>
                      Build user-friendly, feature-rich store</a>
                      <a href="<?php echo $site_url; ?>supply-chain-automation"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ecommerce-icon12.svg" class="menuicon" alt="menuicon"><span class="title">Supply Chain Automation</span>
                      Streamline, optimize, automate supply chain</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "qa-testing"){ ?>
                <!-- QA Testing Menu Here -->
                <div class="container w-900 qaconsult" id="m-qaconsult">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>qa-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon1.svg" class="menuicon" alt="menuicon"><span class="title">QA Consulting</span>
                      Define policies, audit compliance, monitor quality</a>
                      <a href="<?php echo $site_url; ?>application-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Application Testing</span>
                      Ensure quality, performance, and functionality</a>
                      <a href="<?php echo $site_url; ?>mobile-app-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon3.svg" class="menuicon" alt="menuicon"><span class="title">Mobile App Testing</span>
                      Validate mobile apps for optimal performance</a>
                      <a href="<?php echo $site_url; ?>web-application-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon4.svg" class="menuicon" alt="menuicon"><span class="title">Web App Testing</span>
                      Make flawless apps for improved performance</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>software-testing-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon5.svg" class="menuicon" alt="menuicon"><span class="title">Testing Teams</span>
                      Testing experts for every stage & environment</a>
                      <a href="<?php echo $site_url; ?>hire-developers/software-qa-testers-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon6.svg" class="menuicon" alt="menuicon"><span class="title">Hire Software QA</span>
                      Plan, build, & ship quality products</a>
                      <a href="<?php echo $site_url; ?>qa-outsourcing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qa-consult-icon7.svg" class="menuicon" alt="menuicon"><span class="title">QA Outsourcing</span>
                      Hire experts for flawless performance</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "devops"){ ?>
                <!-- DevOps Menu Here -->
               <!-- 
               <div class=" container w-14 landing-menu analytics" id="m-analytics-old-na">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <span class="head">Dashboards & Analytics</span>
                      <a href="<?php echo $site_url; ?>big-data-application-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon1.svg" class="menuicon" alt="menuicon"><span class="title">Big Data Consulting</span>
                      Precisely analyze large data sets</a>
                      <a href="<?php echo $site_url; ?>business-intelligence-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon2.svg" class="menuicon" alt="menuicon"><span class="title">BI Consulting Services</span>
                      Enhance business decision making</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>bi-implementation"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon3.svg" class="menuicon" alt="menuicon"><span class="title">BI Implementation</span>
                      BI consulting, data management, & reporting</a>
                      <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon4.svg" class="menuicon" alt="menuicon"><span class="title">Microsoft Power BI</span>
                      Custom reports and dashboards for clients</a>
                    </div>
                    <div class="flex-3">
                      <span class="head">DevOps</span>
                      <a href="<?php echo $site_url; ?>cloud-services/devops-consulting"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon5.svg" class="menuicon" alt="menuicon"><span class="title">DevOps Consulting</span>
                      Leverage collaboration, monitoring, & cloud adoption, etc</a>
                      <a href="<?php echo $site_url; ?>amazon-aws-partner-company-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon6.svg" class="menuicon" style="left:-5px" alt="menuicon"><span class="title">Amazon AWS</span>
                      Seamless development and deployment of AWS cloud applications</a>
                    </div>
                  </div>
                </div>
                -->

                <div class="container landing-menu devops single-row-ico" id="m-analytics">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>cloud-services/devops-consulting"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/cs-icon-1.svg" class="menuicon" alt="menuicon"><span class="title">DevOps Consulting </span>
                      Tech-tuned operational excellence</a>

                      <a href="<?php echo $site_url; ?>cloud-services/it-infrastructure-automation"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/cs-icon-2.svg" class="menuicon" alt="menuicon"><span class="title">Infrastructure Automation </span>
                      Automate, advance, achieve</a>

                      <a href="<?php echo $site_url; ?>cloud-services/continuous-integration-continous-delivery"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/cs-icon-3.svg" class="menuicon" alt="menuicon"><span class="title">CI/CD </span>
                      Seamless code, swift deliveries</a>

                      <a href="<?php echo $site_url; ?>cloud-services/microservices-and-containerization"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/cs-icon-4.svg" class="menuicon" alt="menuicon"><span class="title">Microservices & Containerization </span>
                      Crafting agile, efficient systems</a>

                      <a href="<?php echo $site_url; ?>cloud-services/devops-monitoring-logging"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/cs-icon-5.svg" class="menuicon" alt="menuicon"><span class="title">DevOps Monitoring & Logging </span>
                      Capture every component, deliver better</a>
                    </div>
                  </div>
                </div>
                <!-- //Analytics Ends -->
                <?php }elseif( $mcat == "enterprises"){ ?>
                <!-- Enterprises Menu Here -->
                <div class="container w-14 enterprises" id="m-enterprises">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>digital-transformation-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon1.svg" class="menuicon" alt="menuicon"><span class="title">Digital Transformation</span>
                      Bring your business to the digital forefront</a>
                      <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                      Update existing web and mobile apps</a>
                      <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon3.svg" class="menuicon" alt="menuicon"><span class="title">Application Maintenance & Support</span>
                      Ensure seamless functionality and security</a>
                      <a href="<?php echo $site_url; ?>business-intelligence-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon4.svg" class="menuicon" alt="menuicon"><span class="title"> Analytics & DevOps</span>
                      Faster software delivery with DevOps</a>
                    </div>
                    <div class="flex-3">  
                      <a href="<?php echo $site_url; ?>software-consulting"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon5.svg" class="menuicon" alt="menuicon"><span class="title">Software Consulting </span>
                      Utilizing software at its best</a>
                      <a href="<?php echo $site_url; ?>custom-software-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon6.svg" class="menuicon" alt="menuicon"><span class="title">Custom Software Development </span>
                      Custom applications for your business</a>
                      <a href="<?php echo $site_url; ?>web-application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon7.svg" class="menuicon" alt="menuicon"><span class="title">Web App Development </span>
                      End to end custom web app development</a>
                      <a href="<?php echo $site_url; ?>mobile-application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon8.svg" class="menuicon" alt="menuicon"><span class="title">Mobile App Development </span>
                      Flawless applications for mobile devices</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>dedicated-development-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/on-demands-icon1.svg" class="menuicon" alt="menuicon"><span class="title">Dedicated Teams</span>
                      Highly skilled developers at reasonable prices</a>
                      <a href="<?php echo $site_url; ?>it-outsourcing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon10.svg" class="menuicon" alt="menuicon"><span class="title">Software Outsourcing services</span>
                      Hand over software development to experts</a>
                      <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon11.svg" class="menuicon" alt="menuicon"><span class="title">QA & Testing</span>
                      QA consulting, testing, hiring, and much more</a>
                      <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-enterprise-icon12.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                      Software applications for cloud computing</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "agencies"){ ?>  
                <div class="container w-14 agencies" id="m-agencies">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>white-label-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon1.svg" class="menuicon" alt="menuicon"><span class="title">White Label Service</span>Reliable white label solutions</a>
                      <a href="<?php echo $site_url; ?>frontend-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Frontend Development</span>
                      Build flawless front-end</a>
                      <a href="<?php echo $site_url; ?>backend-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon3.svg" class="menuicon" alt="menuicon"><span class="title">Backend Development</span>
                      Robust back-end solutions</a>
                    </div>
                    <div class="flex-3">  
                      <a href="<?php echo $site_url; ?>software-consulting"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon4.svg" class="menuicon" alt="menuicon"><span class="title">Software Consulting </span>Maximize software potential</a>
                      <a href="<?php echo $site_url; ?>custom-software-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon5.svg" class="menuicon" alt="menuicon"><span class="title">Custom Software Development </span>Future-proof custom development</a>
                      <a href="<?php echo $site_url; ?>application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon6.svg" class="menuicon" alt="menuicon"><span class="title">Application Development</span>Seamless web/mobile app development</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon7.svg" class="menuicon" alt="menuicon"><span class="title">QA & Testing </span>Comprehensive testing solutions</a>
                      <a href="<?php echo $site_url; ?>software-outsourcing-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/for-agencies-icon8.svg" class="menuicon" alt="menuicon"><span class="title">Software Outsourcing services</span>Accelerate growth with outsourcing</a>
                      <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/on-demands-icon2.svg" class="menuicon" alt="menuicon"><span class="title">Staff Augmentation</span>Hire dedicated technical resources</a>
                    </div>
                  </div>
                </div>
                <?php }elseif( $mcat == "data-science"){ ?>
                <div class="container w-900 demand-teams" id="m-data-science">
                <div class="dis-flex">
                <div class="flex-3">
                <span class="head">Business Intelligence (BI)</span>
                <a href="<?php echo $site_url; ?>business-intelligence-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-07.svg" class="menuicon" alt="menuicon"><span class="title">BI Consulting</span>
                Guiding success with BI insights</a>
                <a href="<?php echo $site_url; ?>bi-implementation"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-08.svg" class="menuicon" alt="menuicon"><span class="title">BI Implementation</span>
                Implementing BI, driving growth</a>
                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-09.svg" class="menuicon" alt="menuicon"><span class="title">Microsoft Power BI</span>Powering decisions with Microsoft BI</a>
                <a href="<?php echo $site_url; ?>data-engineering/bi-reporting-dashboard"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-10.svg" class="menuicon" alt="menuicon"><span class="title">BI Reporting & Dashboard</span>
                Visualizing success with BI</a>
                <a href="<?php echo $site_url; ?>data-engineering/bi-support-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-11.svg" class="menuicon" alt="menuicon"><span class="title">BI Support and Maintenance</span>
                Maintaining success with BI</a>
                </div>
                <div class="flex-3 bg-light">
                <span class="head">Data Science & Analytics</span>
                <a href="<?php echo $site_url; ?>data-engineering/data-science-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-01.svg" class="menuicon" alt="menuicon"><span class="title">Data Science Consulting</span>
                Transforming data into insights</a>
                <a href="<?php echo $site_url; ?>hire-developers/hire-data-scientists"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-02.svg" class="menuicon" alt="menuicon"><span class="title">Hire Expert Data Scientists</span>
                Hire brilliance, harness data power</a>
                <a href="<?php echo $site_url; ?>big-data-application-development-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-03.svg" class="menuicon" alt="menuicon"><span class="title">Big Data Solutions</span>
                Harnessing power of big data</a>
                <a href="<?php echo $site_url; ?>data-engineering/data-analytics-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-04.svg" class="menuicon" alt="menuicon"><span class="title">Data Analytics Consulting</span>
                Transforming data into action</a>
                <a href="<?php echo $site_url; ?>data-analytics"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-05.svg" class="menuicon" alt="menuicon"><span class="title">Predictive Analytics Solutions</span>
                Forecasting success with data</a>
                <a href="<?php echo $site_url; ?>data-engineering/data-visualization-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/de-06.svg" class="menuicon" alt="menuicon"><span class="title">Data Visualization</span>
                Visualizing data, simplifying decisions</a>
                </div>
                
                </div>
                </div>
                <?php }elseif( $mcat == "ai-ml"){ ?>
                  <div class=" container w-100 landing-menu artificial-intell" id="artificial-intelligence">
         <div class="dis-flex">
            <div class="flex-4">
               <span class="head">Artificial Intelligence (AI)</span>
               <a href="<?php echo $site_url; ?>ai/application-development-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon01.svg" class="menuicon" alt="menuicon"><span class="title">AI Development</span>
               Advancing intelligent solutions</a>
               <a href="<?php echo $site_url; ?>ai/consulting-services-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon02.svg" class="menuicon" alt="menuicon"><span class="title">AI Consulting</span>
               Navigating AI's future</a>
               <a href="<?php echo $site_url; ?>chatbot-development-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon03.svg" class="menuicon" alt="menuicon"><span class="title">AI Chatbot Development</span>
               Future-ready chatbots</a>
               <a href="<?php echo $site_url; ?>hire-developers/hire-ai-engineers"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon04.svg" class="menuicon" alt="menuicon"><span class="title">Hire AI Engineers</span>
               AI talent, on-demand</a>
               <a href="<?php echo $site_url; ?>ai" class="view-more">View More</a>
            </div>
            <div class="flex-4">
               <span class="head">ML &amp; Advanced Analytics</span>
               <a href="<?php echo $site_url; ?>machine-learning-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon05.svg" class="menuicon" alt="menuicon"><span class="title">ML Development</span>
               Harnessing Data Power</a>
               <a href="<?php echo $site_url; ?>machine-learning/embeddings-as-a-service"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon06.svg" class="menuicon" alt="menuicon"><span class="title">Embeddings as a Service</span>
               Embed, enhance, excel</a>
               <a href="<?php echo $site_url; ?>computer-vision-software-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon07.svg" class="menuicon" alt="menuicon"><span class="title">Computer Vision Solutions</span>
               Transforming visual data</a>
               <a href="<?php echo $site_url; ?>machine-learning/mlops-consulting-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon08.svg" class="menuicon" alt="menuicon"><span class="title">MLOps Consulting</span>
               ML operations optimized</a>
               <a href="<?php echo $site_url; ?>machine-learning-solutions" class="view-more">View More</a>
            </div>
            <div class="flex-4">
               <span class="head">Generative AI</span>
               <a href="<?php echo $site_url; ?>ai/generative-ai-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon09.svg" class="menuicon" alt="menuicon"><span class="title">Generative AI Development</span>
               Creating AI possibilities</a>
               <a href="<?php echo $site_url; ?>ai/generative-ai-integration-service"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon10.svg" class="menuicon" alt="menuicon"><span class="title">Generative AI Integration</span>
               Elevate with generative AI</a>
               <a href="<?php echo $site_url; ?>ai/generative-ai-consulting-company"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon11.svg" class="menuicon" alt="menuicon"><span class="title">Generative AI Consulting</span>
               Guided generative growth</a>
               <a href="<?php echo $site_url; ?>ai/adaptive-ai-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon12.svg" class="menuicon" alt="menuicon"><span class="title">Adaptive AI Development</span>
               Innovate, adapt, advance</a>
               <a href="<?php echo $site_url; ?>ai/generative-ai-services" class="view-more">View More</a>
            </div>
            <div class="flex-4">
               <span class="head">ChatGPT Solutions</span>
               <a href="<?php echo $site_url; ?>ai/chatgpt-solutions/finance"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon13.svg" class="menuicon" alt="menuicon"><span class="title">ChatGPT for Finance</span>
               AI-Driven financial insights</a>
               <a href="<?php echo $site_url; ?>ai/chatgpt-solutions/manufacturing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon14.svg" class="menuicon" alt="menuicon"><span class="title">ChatGPT for Manufacturing</span>
               Optimize and grow with AI</a>
               <a href="<?php echo $site_url; ?>ai/chatgpt-solutions/automotive"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon15.svg" class="menuicon" alt="menuicon"><span class="title">ChatGPT for Automotive</span>
               Leverage AI for excellence</a>
               <a href="<?php echo $site_url; ?>ai/chatgpt-solutions/hospitality"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/ai-icon16.svg" class="menuicon" alt="menuicon"><span class="title">ChatGPT for Hospitality</span>
               Enhance customer experience</a>
               <a href="<?php echo $site_url; ?>chatgpt-solutions" class="view-more">View More</a>
            </div>
         </div>
      </div>
                <?php } ?>  
              </div>
              <!-- //Mega-Menu -->
            </li>

            <?php if( $mcat === 'ai-ml' ) : ?>
            <li class="menu-item-has-children small-menu for-company" id="ai-ml-technologies">
              <a href="javascript:void(0)">Expertise</a> <span class="arrow-btn"></span>
              <div class="small-menu-inner menu-mega ai-techmenu">
                <div class="dis-flex">
                  <div class="width-100 for-padding hiremenu header-menu active" id="b0-aiml">
                    <div class="dis-flex last-list">
                      <div class="width-100 last-list">                        
                        <a href="<?php echo $site_url; ?>hire-developers/hire-action-transformer-developers">Action Transformer</a>
                        <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers">Robotic Process Automation</a>
                        <a href="<?php echo $site_url; ?>ai/midjourney-development-services">Midjourney</a>
                        <a href="<?php echo $site_url; ?>hire-developers/hire-prompt-engineers">Prompt Engineers</a>
                        <a href="<?php echo $site_url; ?>ai/transformer-model-development-services">Transformer Model</a>
                        <a href="<?php echo $site_url; ?>ai/large-language-model-development">Large Language Model</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php endif; ?>

            <?php if( $mcat === "devops" ) : ?>
            <li class="menu-item-has-children">
            <a href="https://www.valuecoders.com/cloud-services/devops-consulting">Technologies</a> <span class="arrow-btn"></span>
            <div class="menu-mega container">


            <div class="container landing-menu devops" id="m-cloud_services">
            <div class="dis-flex">
            <div class="flex-3">
            <a href="<?php echo $site_url; ?>amazon-aws-partner-company-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon6.svg" class="menuicon" alt="menuicon" style="left:-5px"><span class="title">Amazon AWS</span>
            </a>
            <a href="<?php echo $site_url; ?>microsoft-azure-partner-company-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/devops-02.svg" class="menuicon" alt="menuicon"><span class="title">Azure</span>
            </a>
            </div>
            </div>
            </div>
            </div>
            </li>
            <?php endif; ?>

            <?php if( $mcat === "demand-teams" ) : ?>
            <!-- Section Added By Nitin Baluni -->
            <li class="menu-item-has-children">
              <a href="<?php echo $site_url; ?>hire-developers">Technologies</a> <span class="arrow-btn"></span>
              <div class="menu-mega container">
                <div class="container">
                  <div class="dis-flex">
                    <div class="width-100 for-padding hiremenu header-menu active" id="b0">
                      <div class="dis-flex last-list" id="active_Current_Tabs0">
                        <div class="width-20 last-list">
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-backend-developers" class="title">Backend</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-dotnet-developers" title=".NET">.NET</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-c-developers" title="C/C++">C/C++</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-c-sharp-developers" title="C#">C#</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-django-developers" title="Django">Django</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-firebase-developers" title="Firebase">Firebase</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-golang-web-developers" title="Golang">Golang</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-graphql-developers" title="GraphQL">GraphQL</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-java-developers" title="Java">Java</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-laravel-developers" title="Laravel">Laravel</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-nodejs-developers" title="Node.Js">Node</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-php-developers" title="PHP">PHP</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-python-developers" title="Python">Python</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-ror-developers" title="Ruby on Rails">Ruby on Rails</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-symfony-developers" title="Symfony">Symfony</a>
                          </div>
                        </div>
                        <div class="width-20 last-list">
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers" class="title">Frontend</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-angularjs-developers" title="Angular">Angular</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-html-developers" title="HTML/CSS">HTML/CSS</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-javascript-developers" title="JavaScript">JavaScript</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-power-bi-developer-consultants" title="PowerBI">PowerBI</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-reactjs-developers" title="React">React</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-typescript-developers" title="TypeScript">TypeScript</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-vuejs-developers" title="Vue.JS">Vue.JS</a>
                          </div>
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers" class="margin-t-40 title">CMS</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal">Drupal</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-kentico-developers" title="kentico">Kentico</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-sitecore-developers" title="Sitecore">Sitecore</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-sitefinity-developers" title="Sitefinity">Sitefinity</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-umbraco-developers" title="Umbraco">Umbraco</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-wordpress-developers" title="Wordpress">Wordpress</a>
                          </div>
                        </div>
                        <div class="width-20 last-list">
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-mobile-app-developers" class="title">Mobile</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-android-developers" title="Android">Android</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-flutter-developers" title="Flutter">Flutter</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-ionic-developers" title="Ionic">Ionic</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-ios-developers" title="IOS">iOS</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-kotlin-developers" title="Kotlin">Kotlin</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-react-native-developers" title="React Native">React Native</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-swift-developers" title="Swift">Swift</a>
                          </div>
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers" class="margin-t-40 title">eCommerce</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-magento-developers" title="Magento">Magento</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-shopify-developers" title="Shopify">Shopify</a>
                          </div>
                        </div>
                        <div class="width-20 last-list">
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers" class="title">Full Stack</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-mean-stack-developers" title="MEAN">MEAN</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-mern-stack-developers" title="MERN">MERN</a>
                          </div>
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers" class="margin-t-40 title">Blockchain</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <!-- <a href="<?php echo $site_url; ?>hire-developers/hire-cryptocurrency-app-developers" title="Cryptocurrency">Cryptocurrency</a> -->
                            <a href="<?php echo $site_url; ?>hire-developers/hire-ethereum-developer" title="Ethereum">Ethereum</a>
                            <!-- <a href="<?php echo $site_url; ?>hire-developers/hire-ico-developers" title="ICO">ICO</a> -->
                            <a href="<?php echo $site_url; ?>hire-developers/hire-smartcontract-developers" title="Smart Contract">Smart Contract</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-solidity-developers" title="Solidity">Solidity</a>
                            <!-- <a href="<?php echo $site_url; ?>hire-developers/hire-nft-marketplace-developers" title="NFT">NFT</a> -->
                          </div>
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers" class="margin-t-40 title">DevOps</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-azure-developers" title="Azure">Azure</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-aws-developers" title="AWS">AWS</a>
                          </div>
                        </div>
                        <div class="width-20 last-list">
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-machine-learning-experts" class="title">ML</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-chatbot-developers" title="Chatbot">Chatbot</a>
                            <a href="<?php echo $site_url; ?>hire-developers/dialog-flow-development-services-company" title="Dialogflow"> Dialogflow</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers" title="RPA">RPA</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-tensorflow-developers" title="Tensorflow">TensorFlow</a>
                          </div>
                          <div class="hr-list-item">
                            <a href="<?php echo $site_url; ?>low-code-no-code-services" class="margin-t-40 title">Low-Code</a>
                            <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-appian-developers" title="Appian">Appian</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-outsystems-developers" title="Outsystems">Outsystems</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-mendix-developers" title="Mendix">Mendix</a>
                            <a href="<?php echo $site_url; ?>pega-development-services" title="Pega">Pega</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- // Section Added By Nitin Baluni ENDS -->
            <?php endif; ?>

            <?php 
            // Hide Solution Menu Is Page Catrgoty is : eCommerce
            if( !in_array( $mcat, ['ecommerce', 'demand-teams', 'agencies', 'startups', 'devops', 'data-science', 'ai-ml'] ) ) :
            ?>
            <!-- Solutions -->
            <li class="menu-item-has-children">
              <a href="javascript:void(0)">Solutions</a> <span class="arrow-btn"></span>
              <div class="menu-mega container">
                <?php if( $mcat == "qa-testing" ){ ?>
                <div class="container w-14 ecom" id="qasolution">
                  <div class="dis-flex">
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>functional-software-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol1.svg" class="menuicon" alt="menuicon"><span class="title">Functional Testing</span>
                      API, interface, smoke, and integration testing</a>
                      <a href="<?php echo $site_url; ?>usability-software-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol2.svg" class="menuicon" alt="menuicon"><span class="title">Usability Testing</span>
                      Expert solutions for UX audits and research</a>
                      <a href="<?php echo $site_url; ?>vulnerability-assessment"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol3.svg" class="menuicon" alt="menuicon"><span class="title">Vulnerability Assessment</span>
                      Server, cloud, and IoT security testing</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>software-performance-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol4.svg" class="menuicon" alt="menuicon"><span class="title">Performance Testing</span>
                      PLoad, stress, and stability testing</a>
                      <a href="<?php echo $site_url; ?>software-testing-automation"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol5.svg" class="menuicon" alt="menuicon"><span class="title">Automated Testing</span>
                      Planning, tools selection, and environment setup</a>
                      <a href="<?php echo $site_url; ?>integration-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol6.svg" class="menuicon" alt="menuicon"><span class="title">Integration Testing</span>
                      Agile SDLC and incremental testing</a>
                    </div>
                    <div class="flex-3">
                      <a href="<?php echo $site_url; ?>security-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol7.svg" class="menuicon" alt="menuicon"><span class="title">Security Testing</span>
                      Code review, infrastructure audit, and more</a>
                      <a href="<?php echo $site_url; ?>penetration-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol8.svg" class="menuicon" alt="menuicon"><span class="title">Penetration Testing</span>
                      Web, API, mobile, internal, and external pentest</a>
                      <a href="<?php echo $site_url; ?>regression-testing"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/qasol9.svg" class="menuicon" alt="menuicon"><span class="title">Regression Testing</span>
                      Consulting for continuous or one-time testing</a>
                    </div>
                  </div>
                </div>
                <?php }else{ ?>  
                <div class="container">
                  <div class="dis-flex">
                    
                    <div class="width-55 detail-list without-icon">
                      <span class="head">Solutions</span>
                      <div class="dis-flex">
                        <div class="flex-2">
                          <a href="<?php echo $site_url; ?>digital-financial-management"><span class="title">Financial Management</span>
                          Strategic consulting for growth</a>
                          <a href="<?php echo $site_url; ?>workforce-management-solutions"><span class="title">Workforce Management</span>
                          Streamline workforce operations</a>
                          <a href="<?php echo $site_url; ?>hr-software-solutions"><span class="title">Human Resource Management</span>
                          Optimize HR processes</a>
                          <a href="<?php echo $site_url; ?>elearning-solutions"><span class="title">eLearning</span>
                          Digitalize your learning journey</a>
                          <a href="<?php echo $site_url; ?>supply-chain-management"><span class="title">Supply Chain Management</span>
                          Improve supply chain efficiency</a>
                          <a href="<?php echo $site_url; ?>fleet-management"><span class="title">Fleet Management</span>
                          Enhance fleet efficiency</a>
                          <a href="<?php echo $site_url; ?>crm"><span class="title">CRM</span>
                          Strengthen customer relationships</a>
                        </div>
                        <div class="flex-2">
                          <a href="<?php echo $site_url; ?>operations-management-solutions"><span class="title">Operations Management</span>
                          Optimize operational processes</a>
                          <a href="<?php echo $site_url; ?>asset-management"><span class="title">Asset Management</span>
                          Improve asset optimization</a>
                          <a href="<?php echo $site_url; ?>web-portal-development"><span class="title">Web Portals</span>
                          Transform web experiences</a>
                          <a href="<?php echo $site_url; ?>cms-development"><span class="title">Content Management System</span>
                          Cost-effective content management</a>
                          <a href="<?php echo $site_url; ?>erp"><span class="title">Enterprise Resource Planning</span>Enhance enterprise efficiency</a>
                          <a href="<?php echo $site_url; ?>document-management-services"><span class="title">Document Management</span>
                          Digitize documents seamlessly</a>

                          <a href="<?php echo $site_url; ?>rpa-development-services-company"><span class="title">Robotic Process Automation</span>
                          Automate, Simplify, Excel</a>
                        </div>
                      </div>
                    </div>
                    <div class="width-45 detail-list without-icon">
                      <span class="head">Industries</span>
                      <div class="dis-flex">
                        <div class="flex-2">
                          <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services"><span class="title">Healthcare</span>
                          Innovative digital solutions</a>
                          <a href="<?php echo $site_url; ?>industries/isv-software-development-services"><span class="title">ISV</span>
                          End-to-end software products</a>
                          <a href="<?php echo $site_url; ?>industries/automotive-companies-software-development-services"><span class="title">Automotive</span>
                          Result-driven automotive software</a>
                          <a href="<?php echo $site_url; ?>industries/fintech-software-development-company"><span class="title">Fintech</span>
                          Build end-to-end, robust solutions</a>
                          <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development"><span class="title">Retail & eCommerce</span>
                          Feature-rich eCommerce solutions</a>
                          <a href="<?php echo $site_url; ?>industries/manufacturing-software-development"><span class="title">Manufacturing</span>
                          Next-gen manufacturing mastery</a>
                          <a href="<?php echo $site_url; ?>industries/telecommunications"><span class="title">Telecommunications</span>
                          Connect digital dimensions</a>
                          
                        </div>
                        <div class="flex-2">
                          <a href="<?php echo $site_url; ?>industries/education-elearning-software-development"><span class="title">Education & eLearning</span>
                          Custom and platform-based LMS</a>
                          <a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services"><span class="title">Travel & Tourism</span>
                          Technology-driven mobility solutions</a>
                          <a href="<?php echo $site_url; ?>industries/banking-financial-services"><span class="title">BFSI</span>
                          Enhance agility & efficiency</a>
                          <a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development"><span class="title">Logistics & Transportation</span>
                          Efficient logistics & fleet management</a>
                          <a href="<?php echo $site_url; ?>industries/media-software-development-services"><span class="title">Media & Entertainment</span>Media & OTT apps, ERP, & more</a>

                          <a href="<?php echo $site_url; ?>industries/professional-services-software-development"><span class="title">Professional Services</span>Craft client success</a>

                          <a href="<?php echo $site_url; ?>industries/oil-gas"><span class="title">Oil & Gas</span>Innovate energy engagements</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </li>

            

            <?php 
            if( !in_array($mcat, ['devops', 'demand-teams', 'qa-testing', 'enterprises', 'data-science', 'ai-ml']) ) : ?>
            <!-- Technology -->
            <li class="menu-item-has-children">
              <a href="javascript:void(0)">Technologies</a> <span class="arrow-btn"></span>
              <div class="menu-mega width-menu">
                <div class="container">
                  <div class="dis-flex" id="active_Current_Tabs8">
                    <div class="width-100 header-menu active for-padding">
                      <div class="dis-flex" id="active_Current_Tabs8a">
                        <div class="width-40 last-list">
                          <div class="hr-list-item">
                            <span class="head">Programming</span> <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="dis-flex two-col hr-menu-mega">
                            <div class="width-50">
                              <a href="<?php echo $site_url; ?>android-app-development-company-india">Android</a>
                              <a href="<?php echo $site_url; ?>angular-js-development-company-india">Angular</a>
                              <a href="<?php echo $site_url; ?>top-drupal-development-services-company-india">Drupal</a>
                              <a href="<?php echo $site_url; ?>flutter-app-development-company">Flutter</a>
                              <a href="<?php echo $site_url; ?>ios-application-development-company-india">iOS / iPhone</a>
                              <a href="<?php echo $site_url; ?>java-web-application-development-company">Java</a>
                              <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india">Laravel</a>
                              <a href="<?php echo $site_url; ?>net-maui-app-development">.NET MAUI</a>
                            </div>
                            <div class="width-50 padding-l-40">
                              <a href="<?php echo $site_url; ?>aspdotnet-development-company-india">.NET</a>
                              <a href="<?php echo $site_url; ?>node-js-development-company-india">Node</a>
                              <a href="<?php echo $site_url; ?>php-development-services-company">PHP</a>
                              <a href="<?php echo $site_url; ?>python-web-development-services-company">Python</a>
                              <a href="<?php echo $site_url; ?>react-js-development-services-company">React</a>
                              <a href="<?php echo $site_url; ?>best-react-native-development-services-company-india">React Native</a>
                              <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">Wordpress</a>
                            </div>
                          </div>
                        </div>
                        <div class="width-35 last-list for-platform">
                          <div class="hr-list-item">
                            <span class="head">Trending</span> <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>iot-development-company">Internet of Things</a>
                            <a href="<?php echo $site_url; ?>big-data-application-development-services-company">Big Data</a>
                            <a href="<?php echo $site_url; ?>data-engineering/data-science-consulting-services">Data Science</a>
                            <a href="<?php echo $site_url; ?>data-analytics">Data Analytics</a>
                            <a href="<?php echo $site_url; ?>ai">AI & Machine Learning</a>
                            <a href="<?php echo $site_url; ?>blockchain-development-company">Blockchain</a>
                            <a href="<?php echo $site_url; ?>ar-vr-development-company">AR/ VR</a>
                            <a href="<?php echo $site_url; ?>computer-vision-software-development">Computer Vision</a>
                            <a href="<?php echo $site_url; ?>ott-development">OTT</a>
                            <a href="<?php echo $site_url; ?>rpa-development-services-company">RPA</a>
                            <a href="<?php echo $site_url; ?>serverless-development">Serverless</a> 
                            <a href="<?php echo $site_url; ?>chatbot-development-company">Chatbot</a>                             
                          </div>
                        </div>
                        <div class="width-25 last-list">
                          <div class="hr-list-item">
                            <span class="head">Platforms</span> <span class="hr-arrow-btn"></span>
                          </div>
                          <div class="hr-menu-mega">
                            <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Microsoft Power BI</a>
                            <a href="<?php echo $site_url; ?>salesforce-development">Salesforce</a>
                            <a href="<?php echo $site_url; ?>sharepoint-application-development-services-company">SharePoint</a>
                            <a href="<?php echo $site_url; ?>microsoft-dynamics">Microsoft Dynamics</a>
                            <a href="<?php echo $site_url; ?>microsoft-power-platform">Microsoft Power Platforms</a>
                            <a href="<?php echo $site_url; ?>microsoft-powerapp-development">PowerApps</a>
                            <a href="<?php echo $site_url; ?>microsoft-azure-partner-company-india">Azure</a>
                            <a href="<?php echo $site_url; ?>amazon-aws-partner-company-india">Amazon Web Services</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php endif; ?>
            <?php endif; //endif; ecommerce condition ?>
            <?php if( !in_array( $mcat, ['demand-teams', 'qa-testing'] ) ) : ?>
            <li class="menu-item-has-children for-case">
              <a href="https://www.valuecoders.com/case-studies/" target="_blank">Case Studies</a>
            </li>
            <?php endif; ?>
            <?php             
              if( in_array( $mcat, ['demand-teams'] ) ) :
              ?>
            <li class="menu-item-has-children small-menu for-company">
              <a href="<?php echo $site_url; ?>resources">Resources</a> <span class="arrow-btn"></span>
              <div class="small-menu-inner menu-mega">
                <a href="<?php echo $site_url; ?>hire-developers/hire-software-developers-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/resources-icon1.svg" class="menuicon" alt="menuicon">Hire Indian Developers </a>
                <a href="<?php echo $site_url; ?>it-outsourcing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/resources-icon2.svg" class="menuicon" alt="menuicon">IT Outsourcing</a>
                <a href="<?php echo $site_url; ?>how-it-works"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/resources-icon3.svg" class="menuicon" alt="menuicon">How It Works</a>
                <a href="<?php echo $site_url; ?>benefits-of-hiring-remote-developers"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/resources-icon4.svg" class="menuicon" alt="menuicon">Hiring Remote Developers</a>
                <a href="<?php echo $site_url; ?>why-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/resources-icon5.svg" class="menuicon" alt="menuicon">Software Development in India</a>
                <a href="<?php echo $site_url; ?>faq"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/resources-icon6.svg" class="menuicon" alt="menuicon">FAQs</a>
                <a href="<?php echo $site_url; ?>ratecard"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/on-demands-icon2.svg" class="menuicon" alt="menuicon">Ratecard</a>
              </div>
            </li>
            <?php endif; ?>
            <?php 
              // Hide Company Menu Is Page Catrgoty is : App Development
              if( $mcat !== "app-development" ) :
              ?>
            <li class="menu-item-has-children small-menu for-company">
              <a href="<?php echo $site_url; ?>about">Company</a><span class="arrow-btn"></span>
              <div class="small-menu-inner menu-mega">
                <a href="<?php echo $site_url; ?>about"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/company_icon1.svg" class="menuicon" alt="menuicon">Overview</a>
                <a href="<?php echo $site_url; ?>in-media"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/company_icon2.svg" class="menuicon" alt="menuicon">In Media</a>
                <a href="<?php echo $site_url; ?>testimonials"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/company_icon3.svg" class="menuicon" alt="menuicon">Clients & Testimonials</a>
                <!--<a href="<?php //echo $site_url; ?>why-agencies-choose-us"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/company_icon4.svg" class="menuicon" alt="menuicon">Why Agencies Choose Us</a>-->
                <a href="<?php echo $site_url; ?>careers"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/company_icon5.svg" class="menuicon" alt="menuicon">Careers</a>
                <a href="https://www.valuecoders.com/blog/" target="_blank"><img loading="lazy" src="<?php echo $tpl_url; ?>/menu-images/company_icon6.svg" class="menuicon" alt="menuicon">Blog</a>
              </div>
            </li>
            <?php endif; ?>
            <li class="cta-wrap">
              <div class="cta-btn">
                <a href="<?php echo $site_url; ?>contact" id="cta">
                Contact Us
                <span class="arrow-wrap">
                <span class="arrow primera"></span>
                <span class="arrow segunda next"></span>
                <span class="arrow last"></span>
                </span>
                </a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
      <?php endif; ?>
    </div>
  </div>
</header>
<?php //endif; ?>