<?php 
$is_staging = ( isset( $_SERVER['PHP_SELF'] ) && (strpos( $_SERVER['PHP_SELF'], 'staging' ) !== false) )  ?  true : false;
if( $is_staging ){
$site_url   = 'https://www.valuecoders.com/staging/';
}else{
$site_url   = 'https://www.valuecoders.com/';
}  

if( isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost") ){
  $site_url   = trailingslashit(get_bloginfo('url'));
}

$tpl_url    = $site_url.'wp-content/themes/valuecoders';
$mcat       = (isset( $args['pcat']) && !empty($args['pcat']) ) ? $args['pcat'] : 'master';
$hireElm    = (isset($args['pid']) && get_post_meta($args['pid'],'hp-mcategory', true) ) ? 
get_post_meta($args['pid'],'hp-mcategory', true) : false;

//echo '<pre>'; echo $hireElm; echo '</pre>';

function isActiveMenu( $menu, $cat ){
  if( is_array( $menu ) ){
    return in_array( $cat, $menu ) ? "is-active" : '';
  }else{
    return ( $menu === $cat ) ? "is-active" : '';  
  }  
}

function defActiveMenu( $cat = "master" ){
  $catList = ['app-development', 'demand-teams', 'ecommerce', 'qa-testing', 'devops', 'data-science', 'ai-ml'];
  return ( !in_array( $cat, $catList ) ) ? "is-active" : '';
}

function defActiveHire( $hirePage, $exCat ){
  if( in_array( $exCat, ['ai-ml'] ) ){
    return "";
  }else{
    return ( ($hirePage == "backend") || ($hirePage === false) ) ? "is-active" : '';
  }
}
?>
<header class="header-two">
  <div class="container">
    <div class="wrapper">
      <div class="header-item-left">
        <a href="<?php bloginfo('url'); ?>" class="brand">
          <div class="large">
            <img class="light" loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/logo-light.svg" 
              alt="Valuecoders" width="400" height="88">
            <img class="dark" loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/logo-dark.svg" 
              alt="Valuecoders" width="400" height="88">
          </div>
          <div class="small">
            <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/logo-small.svg" alt="Valuecoders" width="80" height="80">
          </div>
        </a>
        <div class="hamberger-menu">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </div>
      <div class="header-item-right">
        <nav class="menu mob-nav" id="menu">
          <ul>
            <!-- Services Menu Starts -->
            <li class="menu-item-has-children">
              <a class="mst-link" href="<?php echo $site_url; ?>software-development-services-company">Services</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="menu-serv" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link <?php echo defActiveMenu($mcat); ?>">
                            <a href="<?php echo $site_url; ?>software-development-services-company">Software Development</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("app-development", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>application-development">Application Development</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("demand-teams", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>dedicated-development-teams">Dedicated Software Teams</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("ecommerce", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>ecommerce-development-services">eCommerce</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("qa-testing", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services">QA & Testing</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("devops", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>cloud-services">Cloud Services</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("data-science", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>data-engineering">Data Engineering</a>
                          </li>
                          <li class="tab-link <?php echo isActiveMenu("ai-ml", $mcat); ?>">
                            <a href="<?php echo $site_url; ?>ai">Artificial Intelligence</a>
                          </li>
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content <?php echo defActiveMenu($mcat); ?>">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Software Development</span>Innovative, future-proof software solutions</a>
                              <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-4">
                                <span class="head">Development</span>
                                <a href="<?php echo $site_url; ?>custom-software-development-services-company"><span class="title">Custom Software</span>
                                Tailored solutions for excellence</a>
                                <a href="<?php echo $site_url; ?>enterprise-software-development-services"><span class="title">Enterprise Software </span>
                                Powering enterprise growth</a>
                                <a href="<?php echo $site_url; ?>outsource-software-product-development-services"><span class="title">Software Product Engineering</span>
                                Building market-ready software</a>
                                <a href="<?php echo $site_url; ?>application-development"><span class="title">Application Development</span>
                                Transform ideas into powerful apps</a>
                                <a href="<?php echo $site_url; ?>software-development-services-company" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Consulting</span>
                                <a href="<?php echo $site_url; ?>software-consulting"><span class="title">Software Consulting</span>
                                Expert advice on tech</a>
                                <a href="<?php echo $site_url; ?>it-strategy-consulting-firms"><span class="title">IT Consulting</span>
                                Expert IT solutions, delivered</a>
                                <a href="<?php echo $site_url; ?>agile-consulting"><span class="title">Agile Consulting</span>
                                Agile expertise, faster results</a>
                                <a href="<?php echo $site_url; ?>crm-consulting"><span class="title">CRM Consulting</span>
                                Optimizing customer relations</a>
                                <a href="<?php echo $site_url; ?>software-consulting" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Maintenance & Support</span>
                                <!--<a href="<?php echo $site_url; ?>"><span class="title">Software Maintenance</span>
                                  Lead your business into digital</a>-->
                                <a href="<?php echo $site_url; ?>application-maintenance"><span class="title">Application Maintenance</span>
                                Effortless app maintenance</a>
                                <a href="<?php echo $site_url; ?>application-modernization"><span class="title">Application Modernization</span>
                                Update your applications</a>
                                <!--<a href="<?php echo $site_url; ?>"><span class="title">Code Review</span>
                                  Consult experts for big data</a>-->
                                <!--<a href="<?php echo $site_url; ?>" class="view-more">View More</a>-->
                              </div>
                              <div class="flex-4">
                                <span class="head">Delivery Models</span>                                
                                <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><span class="title">IT Staff Augmentation</span>
                                On-demand top resources</a>
                                <a href="<?php echo $site_url; ?>dedicated-development-teams"><span class="title">Dedicated Development Team</span>
                                Your expert dev team</a>
                                <a href="<?php echo $site_url; ?>software-outsourcing-services-company"><span class="title">Software Development Outsourcing</span>
                                Outsource, excel, succeed</a>
                                <a href="<?php echo $site_url; ?>nearshore-software-development-services"><span class="title">Nearshore Software Development</span>
                                Nearshore excellence, always</a>
                                <a href="<?php echo $site_url; ?>software-outsourcing-services-company" class="view-more">View More</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("app-development", $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>application-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Development</span>
                              End-to-end app development</a>   <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>web-application-development"><span class="title">Web App Development</span>
                                Innovative browser applications</a>
                                <a href="<?php echo $site_url; ?>mobile-application-development"><span class="title">Mobile App Development</span>
                                Seamless mobile experiences</a>
                                <a href="<?php echo $site_url; ?>api-development-services"><span class="title">API Development</span>
                                Efficient API management</a>
                                <a href="<?php echo $site_url; ?>top-website-development-company"><span class="title">Website & Portal Development</span>
                                Secure, user-centric solutions</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>frontend-development-services"><span class="title">Frontend Development</span>
                                Flawless UI/UX creation</a>
                                <a href="<?php echo $site_url; ?>backend-development-services"><span class="title">Backend Development</span>
                                Robust server/client expertise</a>
                                <a href="<?php echo $site_url; ?>cross-platform-app-development-services"><span class="title">Cross-Platform App Development</span>
                                Unified multi-platform solutions</a>
                                <a href="<?php echo $site_url; ?>full-stack-development"><span class="title">Full Stack Development</span>
                                Secure scalable applications</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Other Services</span>
                              Explore our diverse services</a> <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column sub-service">                              
                              <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                              Update your applications</a>
                              <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                              Monetize your content</a>
                              <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                              Comprehensive support solutions</a>
                              <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                              Cloud-based software solutions</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("demand-teams", $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>dedicated-development-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-03.svg" class="menuicon" alt="menuicon"><span class="title">Dedicated Software Teams </span>
                              Skilled developers, transparent billing</a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-2">
                                <span class="head">Expertise</span>
                                <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><span class="title">Staff Augmentation</span>
                                Access top technical resources on-demand</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-software-developers-india"><span class="title">Hire Software Developers</span>
                                Work with skilled & dedicated developers</a>
                                <a href="<?php echo $site_url; ?>it-outsourcing-services"><span class="title">IT Outsourcing</span>
                                Technical expertise, shared time zone</a>
                              </div>
                              <div class="flex-2">
                                <span class="head">Solutions</span>
                                <a href="<?php echo $site_url; ?>offshore-software-development-center-india"><span class="title">Offshore Development Center</span>
                                Unleash the power of offshore development</a>
                                <a href="<?php echo $site_url; ?>offshore-software-development-services-company"><span class="title">Offshore Software Development</span>
                                Leverage talent, cost-effectiveness</a>
                                <a href="<?php echo $site_url; ?>nearshore-software-development-services"><span class="title">Nearshore Software Development</span>
                                Technical expertise, shared time zone</a>
                                <a href="<?php echo $site_url; ?>why-india"><span class="title">Software Development in India</span>
                                Technical expertise, shared time zone</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Client Type</span>
                              Tailored solutions for all businesses</a> <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column sub-service">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("ecommerce", $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>ecommerce-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-04.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce</span>
                              Next-level solutions for B2B & B2C</a> <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-2">
                                <span class="head">EXPERTISE</span>
                                <a href="<?php echo $site_url; ?>ecommerce-consulting-services"><span class="title">eCommerce Consulting</span>
                                Your store, our success strategy</a>
                                <a href="<?php echo $site_url; ?>ecommerce-web-design"><span class="title">eCommerce Web Design</span>
                                Designing conversion pathways</a>
                                <a href="<?php echo $site_url; ?>ecommerce/maintenance-support"><span class="title">eCommerce Maintenance & Support</span>
                                Elevate every eExperience</a>
                                <a href="<?php echo $site_url; ?>ecommerce/implementation-services"><span class="title">eCommerce Implementation</span>
                                Bring digital storefronts to life</a>
                              </div>
                              <div class="flex-2">
                                <span class="head">TECHNOLOGY</span>
                                <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india"><span class="title">Magento</span>
                                Work with certified Magento developers </a>
                                <a href="<?php echo $site_url; ?>shopify-development-services"><span class="title">Shopify</span>
                                Create top-quality eCommerce services</a>
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india"><span class="title">WooCommerce</span>
                                Make eCommerce site more responsive</a>
                                <!--<a href="<?php echo $site_url; ?>"><span class="title">OpenCart</span>
                                  Drive technological innovation</a>-->
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Solutions</span>
                              Boost sales with smart eCommerce</a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column sub-service">
                              <a href="<?php echo $site_url; ?>b2c-ecommerce"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">B2C eCommerce</span>
                              Gain more customers with B2C solutions</a>
                              <a href="<?php echo $site_url; ?>b2b-ecommerce"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">B2B eCommerce</span>
                              Create digital business solutions with B2B</a>
                              <a href="<?php echo $site_url; ?>ecommerce-web-portal"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">Web Portals</span>
                              Build user-friendly, feature-rice store</a>
                              <a href="<?php echo $site_url; ?>supply-chain-automation"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Supply Chain Automation</span>
                              Streamline, optimize, automate supply chain</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("qa-testing", $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>software-quality-assurance-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-05.svg" class="menuicon" alt="menuicon"><span class="title">QA & Testing</span>
                              Comprehensive QA & testing solutions</a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>qa-consulting-services"><span class="title">QA Consulting</span>
                                Define policies, audit compliance, monitor quality</a>
                                <a href="<?php echo $site_url; ?>application-testing-services"><span class="title">Application Testing</span>
                                Ensure quality, performance, functionality</a>
                                <a href="<?php echo $site_url; ?>mobile-app-testing-services"><span class="title">Mobile App Testing</span>
                                Validate mobile apps for optimal performance</a>
                                <a href="<?php echo $site_url; ?>web-application-testing-services"><span class="title">Web App Testing</span>
                                Make flawless apps for improved performance</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>software-testing-teams"><span class="title">Testing Teams</span>
                                Testing experts for every stage & environment </a>
                                <a href="<?php echo $site_url; ?>hire-developers/software-qa-testers-india"><span class="title">Hire Software QA</span>
                                Plan, build, deliver quality products</a>
                                <a href="<?php echo $site_url; ?>qa-outsourcing-services"><span class="title">QA Outsourcing</span>
                                Hire experts for flawless performance</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Client Type</span>
                              Tailored solutions for all businesses</a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column sub-service">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("devops", $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>cloud-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-06.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Services</span>
                              Seamless, secure, superior cloud services</a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>cloud-services/strategy-consulting"><span class="title">Cloud Strategy & Consulting</span>
                                Strategic cloud guidance</a>
                                <a href="<?php echo $site_url; ?>cloud-services/devops-automation"><span class="title">DevOps as a Service</span>
                                Effortless DevOps integration</a>
                                <a href="<?php echo $site_url; ?>cloud-services/cloud-managed-services"><span class="title">24x7 Managed Services</span>
                                Round-the-clock seamless service</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>cloud-services/cloud-finops-service"><span class="title">Cloud FinOps Services</span>
                                Cloud savings made simple</a>
                                <a href="<?php echo $site_url; ?>cloud-services/cloud-migration"><span class="title">Cloud Migration</span>
                                Seamless, swift cloud transition
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Technologies</span>
                              Innovating the future </a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column sub-service">
                              <a href="<?php echo $site_url; ?>cloud-services/amazon-cloud"><img loading="lazy" 
                              src="<?php echo $tpl_url; ?>/menu-images/devop-analyt-icon6.svg" width="40" class="menuicon" 
                              alt="menuicon"><span class="title">Amazon AWS</span>Build, scale, innovate on AWS</a>

                              <a href="<?php echo $site_url; ?>cloud-services/azure-cloud"><img loading="lazy" 
                              src="<?php echo $tpl_url; ?>/menu-images/devops-02.svg" class="menuicon" 
                              alt="menuicon"><span class="title">Azure</span>Infinite possibilities, one cloud</a>

                              <a href="<?php echo $site_url; ?>cloud-services/google-cloud"><img loading="lazy" 
                              src="<?php echo $tpl_url; ?>/menu-images/gcloud.svg" class="menuicon" 
                              alt="menuicon"><span class="title">Google Cloud</span>Explore limitless potential with Google</a>
                              
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("data-science", $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>data-engineering"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-07.svg" class="menuicon" alt="menuicon"><span class="title">Data Engineering</span>
                              Accelerate growth with data science</a> <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-2">
                                <span class="head">Business Intelligence (BI)</span>
                                <a href="<?php echo $site_url; ?>business-intelligence-consulting-services"><span class="title">BI Consulting</span>
                                Guiding success with BI insights</a>
                                <a href="<?php echo $site_url; ?>bi-implementation"><span class="title">BI Implementation</span>
                                Implementing BI, driving growth</a>
                                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company"><span class="title">Microsoft Power BI</span>
                                Powering decisions with Microsoft BI</a>
                                <a href="<?php echo $site_url; ?>data-engineering/bi-reporting-dashboard"><span class="title">BI Reporting & Dashboard</span>
                                Visualizing success with BI</a>
                                <a href="<?php echo $site_url; ?>data-engineering/business-intelligence" class="view-more">View More</a>
                              </div>
                              <div class="flex-2">
                                <span class="head">DATA SCIENCE & ANALYTICS</span>
                                <a href="<?php echo $site_url; ?>data-engineering/data-science-consulting-services"><span class="title">Data Science Consulting</span>
                                Transforming data into insights</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-data-scientists"><span class="title">Hire Expert Data Scientists</span>
                                Hire brilliance, harness data power
                                </a>
                                <a href="<?php echo $site_url; ?>big-data-application-development-services-company"><span class="title">Big Data Solutions</span>
                                Harnessing power of big data
                                </a>
                                <a href="<?php echo $site_url; ?>data-engineering/data-analytics-consulting-services"><span class="title">Data Analytics Consulting</span>
                                Transforming data into action
                                </a>
                                <a href="<?php echo $site_url; ?>data-analytics" class="view-more">View More</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Client Type</span>
                              Tailored solutions for all businesses</a><span class="ser-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column sub-service">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("ai-ml", $mcat); ?>">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>ai"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-07.svg" class="menuicon" alt="menuicon"><span class="title">Artificial Intelligence</span>
                              Drive technological innovation</a> <span class="ser-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-service">
                              <div class="flex-4">
                                <span class="head">Artificial Intelligence</span>
                                <a href="<?php echo $site_url; ?>ai/application-development-company"><span class="title">AI Development</span>
                                Advancing intelligent solutions</a>
                                <a href="<?php echo $site_url; ?>ai/consulting-services-company"><span class="title">AI Consulting</span>
                                Navigating AI's future</a>
                                <a href="<?php echo $site_url; ?>chatbot-development-company"><span class="title">AI Chatbot Development</span>
                                Future-ready chatbots </a>
                                <a href="<?php echo $site_url; ?>ai/mobile-app-development"><span class="title">AI-Powered App Development</span>
                                Innovative AI mobile apps</a>
                                <a href="<?php echo $site_url; ?>ai" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">ML & Advanced Analytics</span>
                                <a href="<?php echo $site_url; ?>machine-learning/development"><span class="title">ML Development</span>
                                Harnessing data power</a>
                                <a href="<?php echo $site_url; ?>machine-learning/computer-vision-software-development"><span class="title">Computer Vision Solutions</span>
                                Transforming visual data</a>
                                <a href="<?php echo $site_url; ?>machine-learning/mlops-consulting-services"><span class="title">MLOps Consulting</span>
                                ML operations optimized </a>
                                <a href="<?php echo $site_url; ?>machine-learning/rpa-development-services-company"><span class="title">RPA Services</span>
                                Efficient RPA automation</a>
                                <a href="<?php echo $site_url; ?>machine-learning" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Generative AI</span>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-development"><span class="title">Generative AI Development</span>
                                Creating AI possibilities</a>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-integration-service"><span class="title">Generative AI Integration</span>
                                Elevate with generative AI</a>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-consulting-company"><span class="title">Generative AI Consultings</span>
                                Guided generative growth </a>
                                <a href="<?php echo $site_url; ?>ai/stable-diffusion-development-services"><span class="title">Stable Diffusion Development</span>
                                Stable AI, peak performance</a>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-services" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Expertise</span>
                                <a href="<?php echo $site_url; ?>ai/large-language-model"><span class="title">LLM Services</span>
                                Advanced LLM services</a>
                                <a href="<?php echo $site_url; ?>ai/adaptive-ai-development"><span class="title">Adaptive AI Development</span>
                                Custom, adaptive AI solutions</a>
                                <a href="<?php echo $site_url; ?>chatgpt-solutions"><span class="title">Custom GPT Solutions</span>
                                Personalized GPT tech </a>
                                <a href="<?php echo $site_url; ?>ai/transformer-model-development-services"><span class="title">Transformer Model Development</span>
                                Cutting-edge transformer tech</a>
                                <!-- <a href="<?php echo $site_url; ?>" class="view-more">View More</a> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- //Services Menu Ends -->
            <?php //if( $mcat === "demand-teams" ) : ?>
            <!-- Hire Menu Starts -->
            <li class="menu-item-has-children">
              <a class="mst-link" href="<?php echo $site_url; ?>hire-developers">Hire</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="mnu-hire" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link <?php echo defActiveHire($hireElm, $mcat); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-backend-developers">Backend</a></li>
                          <li class="tab-link <?php echo isActiveMenu("frontend", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers">Frontend</a></li>
                          <li class="tab-link <?php echo isActiveMenu([$hireElm,$mcat] ,"ai-ml"); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-ai-engineers">AI/ML</a></li>
                          <li class="tab-link <?php echo isActiveMenu("dm", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire/digital-marketing-experts">Digital Marketing</a></li>
                          <li class="tab-link <?php echo isActiveMenu("mobile", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-mobile-app-developers">Mobile</a></li>
                          <li class="tab-link <?php echo isActiveMenu("full-stack", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers">Full Stack</a></li>
                          <li class="tab-link <?php echo isActiveMenu("devops", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers">DevOps</a></li>
                          <li class="tab-link <?php echo isActiveMenu("cms", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers">CMS</a></li>
                          <li class="tab-link <?php echo isActiveMenu("ecom", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers">eCommerce</a></li>
                          <li class="tab-link <?php echo isActiveMenu("bc", $hireElm); ?>"><a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers">Blockchain</a></li>
                          <li class="tab-link <?php echo isActiveMenu("lc", $hireElm); ?>"><a href="<?php echo $site_url; ?>services/low-code-no-code">Low - Code</a></li>
                        </ul>
                      </div>
                      <div class="right-tabs hire-tabs">
                        <div class="tab-content <?php echo defActiveHire($hireElm, $mcat); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-backend-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-01.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Backend</span>Build robust backend</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-dotnet-developers"><span class="title">.NET</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-c-developers"><span class="title">C/C++</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-c-sharp-developers"><span class="title">C#</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-django-developers"><span class="title">Django</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-firebase-developers"><span class="title">Firebase</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-golang-web-developers"><span class="title">Golang</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-graphql-developers"><span class="title">GraphQL</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-nodejs-developers"><span class="title">Node</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-php-developers"><span class="title">PHP</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-python-developers"><span class="title">Python</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ror-developers"><span class="title">Ruby on Rails</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-symfony-developers"><span class="title">Symfony</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-assembly-developers"><span class="title">Assembly</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-java-developers"><span class="title">Java</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-laravel-developers"><span class="title">Laravel</span></a>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="tab-content <?php echo isActiveMenu("frontend", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-02.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Frontend</span>Improve your frontend design</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-angularjs-developers" title="Angular"><span class="title">Angular</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-html-developers" title="HTML/CSS"><span class="title">HTML/CSS</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-javascript-developers" title="JavaScript"><span class="title">JavaScript</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-power-bi-developer-consultants" title="PowerBI"><span class="title">PowerBI</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-reactjs-developers" title="React"><span class="title">React</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-typescript-developers" title="TypeScript"><span class="title">TypeScript</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-vuejs-developers" title="Vue.JS"><span class="title">Vue.JS</span></a>
                              </div>
                            </div>
                          </div>
                        </div>


                         <div class="tab-content <?php echo isActiveMenu([$hireElm,$mcat] ,"ai-ml"); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-ai-engineers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-03.svg" 
                                class="menuicon" alt="menuicon"><span class="title">AI/ML</span>Transform with AI/ML experts</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ai-engineers" title="Chatbot"><span class="title">AI Engineers</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-llm-engineers" title="LLM"><span class="title">LLM Engineers</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-gpt-expert" title="GPT Experts"><span class="title">GPT Experts</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-data-scientists" title="Data Scientists"><span class="title">Data Scientists</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ml-engineers" title="ML Engineers"><span class="title">ML Engineers</span>
                                </a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-chatbot-developers" title="Chatbot"><span class="title">Chatbot</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/dialogflow-developers" title="Dialogflow"><span class="title">Dialogflow</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-tensorflow-developers" title="Tensorflow"><span class="title">TensorFlow</span>
                                </a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers" title="RPA"><span class="title">RPA</span>
                                </a>
                              </div>
                            </div>
                          </div>
                         
                        </div>

                         <div class="tab-content <?php echo isActiveMenu("dm", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire/digital-marketing-experts">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-04.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Digital Marketing</span>Boost your brand digitally</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire/seo-experts" title="SEO"><span class="title">SEO</span></a>
                                <a href="<?php echo $site_url; ?>hire/ppc-experts" title="PPC"><span class="title">PPC</span></a>
                                <a href="<?php echo $site_url; ?>hire/smo-experts" title="SMO"><span class="title">SMO</span></a>
                                <a href="<?php echo $site_url; ?>hire/content-writers" title="Content Writer"><span class="title">Content Writer</span></a>
                              </div>
                              <div class="flex-2">                                
                              </div>
                            </div>
                          </div>
                         
                        </div>

                        <div class="tab-content <?php echo isActiveMenu("mobile", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-mobile-app-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-05.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Mobile</span>Hire skilled mobile developers</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-android-developers" title="Android"><span class="title">Android</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-flutter-developers" title="Flutter"><span class="title">Flutter</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ionic-developers" title="Ionic"><span class="title">Ionic</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ios-developers" title="IOS"><span class="title">iOS</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-kotlin-developers" title="Kotlin"><span class="title">Kotlin</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-react-native-developers" title="React Native"><span class="title">React Native</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-swift-developers" title="Swift"><span class="title">Swift</span></a>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                         <div class="tab-content <?php echo isActiveMenu("full-stack", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-06.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Full Stack</span>Fullstack developers for hire</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-mean-stack-developers" title="MEAN"><span class="title">MEAN</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-mern-stack-developers" title="MERN"><span class="title">MERN</span></a>
                              </div>
                              <div class="flex-2">                                
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="tab-content <?php echo isActiveMenu("devops", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-07.svg" 
                                class="menuicon" alt="menuicon"><span class="title">DevOps</span>Streamline with DevOps pros</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-azure-developers" title="Azure"><span class="title">Azure</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-aws-developers" title="AWS"><span class="title">AWS</span></a>
                              </div>
                              <div class="flex-2">                                
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="tab-content <?php echo isActiveMenu("cms", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-08.svg" 
                                class="menuicon" alt="menuicon"><span class="title">CMS</span>Build powerful CMS solutions</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal"><span class="title">Drupal</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-kentico-developers" title="kentico"><span class="title">Kentico</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-sitecore-developers" title="Sitecore"><span class="title">Sitecore</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-sitefinity-developers" title="Sitefinity"><span class="title">Sitefinity</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-umbraco-developers" title="Umbraco"><span class="title">Umbraco</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-wordpress-developers" title="Wordpress"><span class="title">Wordpress</span></a>
                              </div>
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="tab-content <?php echo isActiveMenu("ecom", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-09.svg" 
                                class="menuicon" alt="menuicon"><span class="title">eCommerce</span>Expert eCommerce developers for hire</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-magento-developers" title="Magento"><span class="title">Magento</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-shopify-developers" title="Shopify"><span class="title">Shopify</span></a>
                              </div>
                              <div class="flex-2">                                
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="tab-content <?php echo isActiveMenu("bc", $hireElm); ?>">
                          <div class="three-column mob-hide">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-10.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Blockchain</span>Unlock blockchain potential</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ethereum-developer" title="Ethereum"><span class="title">Ethereum</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-smartcontract-developers" title="Smart Contract"><span class="title">Smart Contract</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-solidity-developers" title="Solidity"><span class="title">Solidity</span></a>
                              </div>
                              <div class="flex-2">                                
                              </div>
                            </div>
                          </div>
                         
                        </div>                       
                        <div class="tab-content <?php echo isActiveMenu("lc", $hireElm); ?>">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>services/low-code-no-code">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/hire-11.svg" 
                                class="menuicon" alt="menuicon"><span class="title">Low - Code</span>Hire low-code experts</a>
                                <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column hr-submenu">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>hire-developers/hire-appian-developers" title="Appian"><span class="title">Appian</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-outsystems-developers" title="Outsystems"><span class="title">Outsystems</span></a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-mendix-developers" title="Mendix"><span class="title">Mendix</span></a>
                                <a href="<?php echo $site_url; ?>pega-development-services" title="Pega"><span class="title">Pega</span></a>
                              </div>
                              <div class="flex-2">                                
                              </div>
                            </div>
                          </div>
                         
                        </div>
                         <div class="tab-content other-menu mob-hide">
                            <div class="tab-title">
                              <a href="<?php echo $site_url; ?>hire-developers">
                              <span class="title">Hire Dedicated Developers</span>Build faster with on-demand team
                              </a>
                              <span class="hr-arrow-btn"></span>
                            </div>
                            <div class="flex-1 menu-column hr-submenu">
                            <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/dhire-01.svg" class="menuicon" alt="menuicon"><span class="title">Staff Augmentation</span>Access top technical resources on-demand</a>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-software-developers-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/dhire-02.svg" class="menuicon" alt="menuicon"><span class="title">Hire Software Developers</span>Work with skilled & dedicated developers</a>

                            <a href="<?php echo $site_url; ?>dedicated-development-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/dhire-03.svg" class="menuicon" alt="menuicon"><span class="title">Dedicated Software Teams</span>Hire Dedicated Developers</a>
                            </div>
                            <a href="<?php echo $site_url; ?>hire-developers" class="view-more">View More</a>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- //Hire Menu Ends -->
            <?php //endif; ?>
            <li class="menu-item-has-children">
              <a class="mst-link" href="javascript:void(0);">Who We Serve</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="menu-inds" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="no-link tab-link is-active"><a href="javascript:void(0);">Startup & Product Companies</a></li>
                          <li class="no-link tab-link"><a href="javascript:void(0);">Industries</a></li>
                          <!-- <li class="tab-link">Enterprises</li> -->
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content is-active">
                          <div class="three-column">
                            <div class="tab-title"><a href="javascript:void(0);"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/ind-03.svg" class="menuicon" alt="menuicon"><span class="title">Software Startups & Product Companies</span>Your vision, our expertise</a>
                            </div>
                            <div class="dis-flex menu-column">                              
                              <div class="flex-2">
                                <span class="head">Product</span>
                                <a href="<?php echo $site_url; ?>outsource-software-product-development-services"><span class="title">Software Product Development</span>
                                Innovate with expert developers</a>
                                <!-- <a href="<?php //echo $site_url; ?>"><span class="title">SaaS Consulting</span>
                                SaaS success starts here</a> -->
                                <a href="<?php echo $site_url; ?>saas-consulting-development-services"><span class="title">SaaS Development</span>
                                Build scalable SaaS products</a>
                                <a href="<?php echo $site_url; ?>mvp-app-development-company"><span class="title">MVP Development</span>
                                Launch your MVP faster</a>
                                <a href="<?php echo $site_url; ?>product-ui-ux-design"><span class="title">Product UI/UX Design</span>
                                Designs that captivate users</a>
                              </div>

                              <div class="flex-2">
                                <span class="head">Startups</span>
                                <a href="<?php echo $site_url; ?>startup-consulting-services"><span class="title">Startup Consulting</span>
                                Guidance for startup success</a>
                                <a href="<?php echo $site_url; ?>discovery-phase-process"><span class="title">Product Discovery Phase</span>
                                Refine ideas into solutions</a>
                                <a href="<?php echo $site_url; ?>startup-product-development"><span class="title">Startup Product Development</span>
                                Develop your startup vision</a>
                                <a href="<?php echo $site_url; ?>cto-as-a-service"><span class="title">CTO as a Service</span>
                                Strategic tech leadership</a>
                                <!--<a href="<?php echo $site_url; ?>"><span class="title">How to Hire Startup Developers</span>Testing experts for every stage  </a>-->
                              </div>

                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Client Type</span>
                              Tailored solutions for all businesses</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Empowering startup growth</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              Enterprise-grade solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Partner with development pros</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="four-column">
                            <div class="tab-title"><a href="javascript:void(0);"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/indust.svg" class="menuicon" alt="menuicon"><span class="title">Industries</span>
                              Expertise across sectors</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4 margin-0">
                                <!--
                                  <a href="<?php echo $site_url; ?>"><span class="title">Financial Services</span>
                                  Expert advice on technology</a>
                                  <a href="<?php echo $site_url; ?>"><span class="title">Lending</span>
                                  Validate your idea and ensure</a>
                                  -->
                                <a href="<?php echo $site_url; ?>industries/banking-financial-services"><span class="title">Banking</span>
                                Banking on innovation</a>
                                <a href="<?php echo $site_url; ?>insurance"><span class="title">Insurance</span>
                                Secure insurance solutions</a>
                                <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services"><span class="title">Healthcare</span>
                                Advancing healthcare tech</a>
                                <a href="<?php echo $site_url; ?>industries/education-elearning-software-development"><span class="title">Education & eLearning</span>
                                Transforming learning experiences</a>                                
                              </div>
                              <div class="flex-4 margin-0">
                                <a href="<?php echo $site_url; ?>industries/manufacturing-software-development"><span class="title">Manufacturing</span>
                                Driving smart manufacturing</a>
                                <a href="<?php echo $site_url; ?>industries/professional-services-software-development"><span class="title">Professional Services</span>
                                Streamline professional workflows</a>
                                <a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development"><span class="title">Transportation & Logistics</span>
                                Optimizing supply chains</a>
                                <a href="<?php echo $site_url; ?>industries/banking-financial-services"><span class="title">BFSI</span>Comprehensive BFSI solutions</a>
                                <!-- <a href="<?php echo $site_url; ?>"><span class="title">Investment</span>
                                  Lead your business</a>
                                  <a href="<?php echo $site_url; ?>industries/fintech-software-development-company"><span class="title">FinTech</span>
                                  Update your web & Mobile</a>
                                  <a href="<?php echo $site_url; ?>"><span class="title">Payments</span>
                                  Effortless maintenance</a>
                                  -->
                              </div>
                              <div class="flex-4 margin-0">
                                <a href="<?php echo $site_url; ?>industries/telecommunications"><span class="title">Telecommunications</span>
                                Connecting the future</a>
                                <a href="<?php echo $site_url; ?>industries/oil-gas"><span class="title">Oil & Gas</span>
                                Fueling digital transformation</a>
                                <a href="<?php echo $site_url; ?>industries/media-software-development-services"><span class="title">Media & Entertainment</span>
                                Engage with media tech</a>
                                <a href="<?php echo $site_url; ?>industries/fintech-software-development-company"><span class="title">Fintech</span>Revolutionizing financial services</a>
                              </div>
                              <div class="flex-4 margin-0">
                                <!-- <a href="<?php echo $site_url; ?>"><span class="title">Construction</span>
                                  Effortless maintenance</a> -->
                                <a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services"><span class="title">Travel & Hospitality</span>
                                Enhancing travel experiences</a>
                                <a href="<?php echo $site_url; ?>industries/isv-software-development-services"><span class="title">ISV</span>Custom software for ISVs</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <?php 
            //if( !in_array($mcat, ['devops', 'demand-teams', 'qa-testing', 'enterprises', 'data-science', 'ai-ml']) ) : 
            ?>
            <!-- Technologies Menus Starts -->
            <li class="menu-item-has-children">
              <a class="mst-link" href="javascript:void(0);">Technologies</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="mnu-tech" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link is-active"><a href="javascript:void(0);">Trending & Platforms</a></li>
                          <li class="tab-link"><a href="javascript:void(0);">Programming</a></li>
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content is-active">
                          <div class="four-column">
                            <div class="tab-title"><a href="javascript:void(0);"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/trend.svg" class="menuicon" alt="menuicon"><span class="title">Trending & Platforms</span>Leading-edge tech solutions</a>
                            <span class="tech-arrow-btn"></span>
                            </div>
                            <div class="dis-flex menu-column sub-tech">
                              <div class="flex-4 margin-0">
                                <span class="head">Trending</span>
                                <a href="<?php echo $site_url; ?>ai"><span class="title">Artificial Intelligence</span></a>
                                <a href="<?php echo $site_url; ?>machine-learning"><span class="title">Machine Learning</span></a>
                                <a href="<?php echo $site_url; ?>data-engineering/data-science-consulting-services"><span class="title">Data Science</span></a>
                                <a href="<?php echo $site_url; ?>data-analytics"><span class="title">Data Analytics</span></a>
                                <a href="<?php echo $site_url; ?>machine-learning/computer-vision-software-development"><span class="title">Computer Vision</span></a>
                                <a href="<?php echo $site_url; ?>machine-learning/rpa-development-services-company"><span class="title">RPA</span></a>
                                <a href="<?php echo $site_url; ?>ar-vr-development-company"><span class="title">AR/ VR</span></a>                                
                              </div>
                              <div class="flex-4 margin-0">  
                                <span class="head opacity-0">Trending</span>                              
                                <a href="<?php echo $site_url; ?>chatbot-development-company"><span class="title">Chatbot</span></a>
                                <a href="<?php echo $site_url; ?>big-data-application-development-services-company"><span class="title">Big Data</span></a>
                                <a href="<?php echo $site_url; ?>blockchain-development-company"><span class="title">Blockchain</span></a>
                                <a href="<?php echo $site_url; ?>iot-development-company"><span class="title">Internet of Things</span></a>
                                <a href="<?php echo $site_url; ?>serverless-development"><span class="title">Serverless</span></a>
                                <a href="<?php echo $site_url; ?>ott-development"><span class="title">OTT</span></a>
                              </div>

                              <div class="flex-4 margin-0">
                                <span class="head">Platforms</span>                                
                                <a href="<?php echo $site_url; ?>salesforce"><span class="title">Salesforce</span></a>
                                <a href="<?php echo $site_url; ?>microsoft-dynamics"><span class="title">Microsoft Dynamics</span></a>
                                <a href="<?php echo $site_url; ?>sharepoint-application-development-services-company"><span class="title">SharePoint</span></a>
                                <a href="<?php echo $site_url; ?>odoo-development-services"><span class="title">Odoo</span></a>
                                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company"><span class="title">Microsoft Power BI</span></a>
                              </div>
                              <div class="flex-4">    
                                <span class="head opacity-0">Platforms</span>                             
                                <a href="<?php echo $site_url; ?>microsoft-power-platform"><span class="title">Microsoft Power Platforms</span></a>
                                <a href="<?php echo $site_url; ?>microsoft-powerapp-development"><span class="title">PowerApps</span></a>
                                <a href="<?php echo $site_url; ?>cloud-services/amazon-cloud"><span class="title">Amazon Web Services</span></a>
                                <a href="<?php echo $site_url; ?>cloud-services/azure-cloud"><span class="title">Azure</span></a>
                                <a href="<?php echo $site_url; ?>cloud-services/google-cloud"><span class="title">Google Cloud</span></a>                                
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="javascript:void(0);"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/prog.svg" class="menuicon" alt="menuicon"><span class="title">Programming </span>Mastery in key languages</a>
                            <span class="tech-arrow-btn"></span>
                          </div>
                            <div class="dis-flex menu-column sub-tech">
                              <div class="flex-2 margin-0">
                                <a href="<?php echo $site_url; ?>python-web-development-services-company"><span class="title">Python</span></a>
                                <a href="<?php echo $site_url; ?>aspdotnet-development-company-india"><span class="title">.NET</span></a>
                                <a href="<?php echo $site_url; ?>java-web-application-development-company"><span class="title">Java</span></a>
                                <a href="<?php echo $site_url; ?>flutter-app-development-company"><span class="title">Flutter</span></a>
                                <a href="<?php echo $site_url; ?>angular-js-development-company-india"><span class="title">Angular</span></a>
                                <a href="<?php echo $site_url; ?>android-app-development-company-india"><span class="title">Android</span></a>
                                <a href="<?php echo $site_url; ?>ios-application-development-company-india"><span class="title">iOs / iPhone</span></a>
                                <a href="<?php echo $site_url; ?>react-js-development-services-company"><span class="title">React</span></a>                                
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india"><span class="title">Lavavel</span></a>
                                <a href="<?php echo $site_url; ?>net-maui-app-development"><span class="title">.NET MAUI</span></a>
                                <a href="<?php echo $site_url; ?>node-js-development-company-india"><span class="title">Node</span></a>
                                <a href="<?php echo $site_url; ?>best-react-native-development-services-company-india"><span class="title">React Native</span></a>
                                <a href="<?php echo $site_url; ?>php-development-services-company"><span class="title">PHP</span></a>
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india"><span class="title">Wordpress</span></a>
                                <a href="<?php echo $site_url; ?>strapi-development-services"><span class="title">Strapi</span></a>
                                <a href="<?php echo $site_url; ?>top-drupal-development-services-company-india"><span class="title">Drupal</span></a>  
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="javascript:void(0);"><span class="title">Client Type</span>
                              Empowering businesses of all sizes</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for growing businesses</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end solutions for maximum impact</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- //Technologies Menus Ends -->
            <?php //endif; ?>
            
            <?php if( $mcat == "demand-teams") : ?>
            <li class="menu-item-has-children">
              <a class="mst-link" href="<?php echo $site_url; ?>resources">Resources</a><span class="arrow-btn"></span>
              <div class="menu-mega small-menu">
              <a href="<?php echo $site_url; ?>hire-developers/hire-software-developers-india">
              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-01.svg" class="menuicon" alt="menuicon">Hire Indian Developers </a>
              <a href="<?php echo $site_url; ?>it-outsourcing-services">
              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-02.svg" class="menuicon" alt="menuicon">IT Outsourcing</a>
              <a href="<?php echo $site_url; ?>how-it-works">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-03.svg" class="menuicon" 
                alt="menuicon">How It Works</a>
              <a href="<?php echo $site_url; ?>benefits-of-hiring-remote-developers">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-04.svg" class="menuicon" alt="menuicon">Hiring Remote Developers</a>
              <a href="<?php echo $site_url; ?>why-india"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-05.svg" class="menuicon" alt="menuicon">Software Development in India</a>
              <a href="<?php echo $site_url; ?>faq"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-06.svg" class="menuicon" alt="menuicon">FAQs</a>
              <a href="<?php echo $site_url; ?>ratecard">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/res-07.svg" class="menuicon" alt="menuicon">Ratecard</a>
              </div>
            </li>
            <?php endif; ?>
            <?php 
            // Hide Solution Menu Is Page Catrgoty is : eCommerce
            //if(!in_array($mcat,['ecommerce','demand-teams','agencies','startups','devops','data-science','ai-ml'])) :
            if( !in_array($mcat,['demand-teams']) ) :
            ?>
            <!-- Solution Menu Starts -->
            <li class="menu-item-has-children">
              <a class="mst-link" href="javascript:void(0);">Solutions</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div class="dis-flex tab-contents">
                      <div class="right-tabs flex-full">
                        <div class="tab-content is-active">
                          <div class="four-column">
                            <div class="tab-title"><a href="javascript:void(0);"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/ind-01.svg" class="menuicon" alt="menuicon"><span class="title">Solutions</span>Growth-driven solutions for diverse industries</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4 margin-0">
                                <a href="<?php echo $site_url; ?>digital-financial-management"><span class="title">Financial Management</span>
                                Strategic consulting for growth</a>
                                <a href="<?php echo $site_url; ?>workforce-management-solutions"><span class="title">Workforce Management</span>
                                Streamline workforce operations</a>
                                <a href="<?php echo $site_url; ?>hr-software-solutions"><span class="title">Human Resource Management</span>
                                Optimize HR processes</a>
                                <a href="<?php echo $site_url; ?>elearning-solutions"><span class="title">eLearning</span>
                                Digitalize your learning journey</a>
                              </div>
                              <div class="flex-4 margin-0">
                                <a href="<?php echo $site_url; ?>supply-chain-management"><span class="title">Supply Chain Management</span>
                                Improve supply chain efficiency</a>
                                <a href="<?php echo $site_url; ?>fleet-management"><span class="title">Fleet Management</span>
                                Enhance fleet efficiency</a>
                                <a href="<?php echo $site_url; ?>crm"><span class="title">CRM</span>
                                Strengthen customer relationships</a>
                                <a href="<?php echo $site_url; ?>operations-management-solutions"><span class="title">Operations Management</span>
                                Optimize operational processes</a>
                              </div>
                              <div class="flex-4 margin-0">
                                <a href="<?php echo $site_url; ?>asset-management"><span class="title">Asset Management</span>
                                Improve asset optimization</a>
                                <a href="<?php echo $site_url; ?>web-portal-development"><span class="title">Web Portals</span>
                                Transform web experiences</a>
                                <a href="<?php echo $site_url; ?>cms-development"><span class="title">Content Management System</span>
                                Cost-effective content management</a>
                                <a href="<?php echo $site_url; ?>erp"><span class="title">Enterprise Resource Planning</span>Enhance enterprise efficiency</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>document-management-services"><span class="title">Document Management</span>
                                Digitize documents seamlessly</a>
                                <a href="<?php echo $site_url; ?>rpa-development-services-company">
                                <span class="title">Robotic Process Automation</span>
                                Automate, Simplify, Excel</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- //Solution Menu Ends -->
            <?php endif; ?>
            <?php //if( !in_array( $mcat, ['demand-teams', 'qa-testing'] ) ) : ?>
            <li class="menu-item-has-children"><a class="mst-link" href="<?php echo $site_url; ?>case-studies/">Case Studies</a></li>
            <?php //endif; ?>
            <li class="menu-item-has-children">
              <a class="mst-link" href="<?php echo $site_url; ?>about">Company</a> <span class="arrow-btn"></span>
              <div class="menu-mega small-menu company-menu">
                <a href="<?php echo $site_url; ?>about"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-01.svg" class="menuicon" alt="menuicon">Overview</a>
                <a href="<?php echo $site_url; ?>in-media"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-02.svg" class="menuicon" alt="menuicon">In Media</a>
                <a href="<?php echo $site_url; ?>testimonials"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-03.svg" class="menuicon" alt="menuicon">Clients & Testimonials</a>
                <a href="<?php echo $site_url; ?>careers"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-04.svg" class="menuicon" alt="menuicon">Careers</a>
                <a href="https://www.valuecoders.com/blog/" target="_blank"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-05.svg" class="menuicon" alt="menuicon">Blog</a>
              </div>
            </li>
            <li class="cta-wrap small-reso">
              <div class="btn-sec">
                <a href="<?php echo $site_url; ?>contact" class="btn rounded"><span class="text-white">Get Started</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="cta-wrap large-reso">
          <div class="btn-sec">
            <a href="<?php echo $site_url; ?>contact" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
