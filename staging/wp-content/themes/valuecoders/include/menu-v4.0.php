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
?>
<header class="header-two">
  <div class="container">
    <div class="wrapper">
      <div class="header-item-left">
        <a href="https://www.valuecoders.com/staging/" class="brand">
          <div class="large">
            <img class="light" loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/logo-light.svg" alt="Valuecoders" width="400" height="88">
            <img class="dark" loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/logo-dark.svg" alt="Valuecoders" width="400" height="88">
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
            <li class="menu-item-has-children">
              <a href="<?php echo $site_url; ?>">Services</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="menu-serv" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link is-active">Software Development</li>
                          <li class="tab-link">Application Development</li>
                          <li class="tab-link">Dedicated Software Teams</li>
                          <li class="tab-link">eCommerce</li>
                          <li class="tab-link">QA & Testing</li>
                          <li class="tab-link">Cloud Services</li>
                          <li class="tab-link">Data Engineering</li>
                          <li class="tab-link">Artificial Intelligence</li>
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content is-active">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                              <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Software Development</span>Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4">
                                <span class="head">Development</span>
                                <a href="<?php echo $site_url; ?>web-application-development"><span class="title">Web App Development</span>
                                Innovative browser applications</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Large-Scale Software</span>
                                Choose the right technology</a>
                                <a href="<?php echo $site_url; ?>mvp-app-development-company"><span class="title">MVP Development</span>
                                Assistance from product conception</a>
                                <a href="<?php echo $site_url; ?>application-development"><span class="title">Application Development</span>
                                Validate your idea and ensure</a>
                                <a href="<?php echo $site_url; ?>" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Consulting</span>
                                <a href="<?php echo $site_url; ?>software-consulting"><span class="title">Software Consulting</span>
                                Lead your business</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">SOA Consulting</span>
                                Update your web & Mobile</a>
                                <a href="<?php echo $site_url; ?>agile-consulting"><span class="title">Agile Consulting</span>
                                Effortless maintenance</a>
                                <a href="<?php echo $site_url; ?>cloud-services/devops-consulting"><span class="title">DevOps Consulting</span>
                                Validate your idea and ensure</a>
                                <a href="<?php echo $site_url; ?>" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Maintenance & Support</span>
                                <a href="<?php echo $site_url; ?>"><span class="title">Software Maintenance</span>
                                Lead your business into digital</a>
                                <a href="<?php echo $site_url; ?>application-maintenance"><span class="title">Application Maintenance</span>
                                Update your web and mobile</a>
                                <a href="<?php echo $site_url; ?>application-modernization"><span class="title">Application Modernization</span>
                                Effortless maintenance</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Code Review</span>
                                Consult experts for big data</a>
                                <a href="<?php echo $site_url; ?>" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Delivery Models</span>
                                <a href="<?php echo $site_url; ?>software-outsourcing-services-company"><span class="title">Software Outsourcing</span>
                                Lead your business into digital</a>
                                <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><span class="title">IT Staff Augmentation</span>
                                Update your web and mobile</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Nearshore Staff Augmentation</span>
                                Effortless maintenance</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Offshore Developers for Hire</span>
                                Consult experts for big data</a>
                                <a href="<?php echo $site_url; ?>" class="view-more">View More</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Development</span>
                              Skilled developers, transparent billing</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>web-application-development"><span class="title">Web App Development</span>
                                Innovative browser applications</a>
                                <a href="<?php echo $site_url; ?>backend-development-services"><span class="title">Backend Development</span>
                                Robust server/client expertise</a>
                                <a href="<?php echo $site_url; ?>top-website-development-company"><span class="title">Website & Portal Development</span>
                                Secure, user-centric solutions</a>
                                <a href="<?php echo $site_url; ?>frontend-development-services"><span class="title">Frontend Development</span>
                                Flawless UI/UX creation</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>mobile-application-development"><span class="title">Mobile App Development</span>
                                Seamless mobile experiences</a>
                                <a href="<?php echo $site_url; ?>cross-platform-app-development-services"><span class="title">Cross-Platform App Development</span>
                                Unified multi-platform solutions</a>
                                <a href="<?php echo $site_url; ?>api-development-services"><span class="title">API Development</span>
                                Efficient API management</a>
                                <a href="<?php echo $site_url; ?>full-stack-development"><span class="title">Full Stack Development</span>
                                Secure scalable applications</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                              Comprehensive support solutions</a>
                              <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                              Update your applications</a>
                              <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                              Monetize your content</a>
                              <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                              Cloud-based software solutions</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>dedicated-development-teams"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-03.svg" class="menuicon" alt="menuicon"><span class="title">Dedicated Software Teams </span>
                              Comprehensive QA & Testing solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <span class="head">Solutions</span>
                                <a href="<?php echo $site_url; ?>offshore-software-development-center-india"><span class="title">Offshore Development Center</span>
                                Unleash the power of offshore development</a>
                                <a href="<?php echo $site_url; ?>offshore-software-development-services-company"><span class="title">Offshore Software Development</span>
                                Leverage talent, cost-effectiveness</a>
                                <a href="<?php echo $site_url; ?>nearshore-software-development-services"><span class="title">Nearshore Software Development</span>
                                Technical expertise, shared time zone</a>
                              </div>
                              <div class="flex-2">
                                <span class="head">Solutions</span>
                                <a href="<?php echo $site_url; ?>it-staff-augmentation-services"><span class="title">Staff Augmentation</span>
                                Access top technical resources on-demand</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-software-developers-india"><span class="title">Hire Software Developers</span>
                                Work with skilled & dedicated developers</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>ecommerce-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-04.svg" class="menuicon" alt="menuicon"><span class="title">eCommerce</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <span class="head">EXPERTISE</span>
                                <a href="<?php echo $site_url; ?>ecommerce-consulting-services"><span class="title">eCommerce Consulting</span>
                                Innovative, future-proof software solutions</a>
                                <a href="<?php echo $site_url; ?>ecommerce-web-design"><span class="title">eCommerce Web Design</span>
                                Skilled developers, transparent billing</a>
                                <a href="<?php echo $site_url; ?>ecommerce/maintenance-support"><span class="title">eCommerce Maintenance & Support</span>
                                Elevate every experience</a>
                                <a href="<?php echo $site_url; ?>ecommerce/implementation-services"><span class="title">eCommerce Implementation</span>
                                Make flawless apps for improved performance</a>
                              </div>
                              <div class="flex-2">
                                <span class="head">TECHNOLOGY</span>
                                <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india"><span class="title">Magento</span>
                                Testing experts for every stage </a>
                                <a href="<?php echo $site_url; ?>shopify-development-services"><span class="title">Shopify</span>
                                Next-level solutions for B2B & B2C</a>
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india"><span class="title">WooCommerce</span>
                                Build foundations with data</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">OpenCart</span>
                                Drive technological innovation</a>    
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Solutions</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>b2c-ecommerce"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">B2C eCommerce</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>b2b-ecommerce"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">B2B eCommerce</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>ecommerce-web-portal"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">Web Portals</span>
                              Expand with white-label services</a>
                              <a href="<?php echo $site_url; ?>supply-chain-automation"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Supply Chain Automation</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>software-quality-assurance-testing-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-05.svg" class="menuicon" alt="menuicon"><span class="title">QA & Testing</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>qa-consulting-services"><span class="title">QA Consulting</span>
                                Define policies, audit compliance, monitor quality</a>
                                <a href="<?php echo $site_url; ?>application-testing-services"><span class="title">Application Testing</span>
                                Ensure quality, performance, & functionality</a>
                                <a href="<?php echo $site_url; ?>mobile-app-testing-services"><span class="title">Mobile App Testing</span>
                                Validate mobile apps for optimal performance</a>
                                <a href="<?php echo $site_url; ?>web-application-testing-services"><span class="title">Web App Testing</span>
                                Make flawless apps for improved performance</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>software-testing-teams"><span class="title">Testing Teams</span>
                                Testing experts for every stage </a>
                                <a href="<?php echo $site_url; ?>hire-developers/software-qa-testers-india"><span class="title">Hire Software QA</span>
                                Plan, build, & ship quality products</a>
                                <a href="<?php echo $site_url; ?>qa-outsourcing-services"><span class="title">QA Outsourcing</span>
                                Hire experts for flawless performance</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions </a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>cloud-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-06.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Services</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>cloud-services/strategy-consulting"><span class="title">Cloud Strategy & Consulting</span>
                                Strategic Cloud Guidance</a>
                                <a href="<?php echo $site_url; ?>cloud-services/devops-automation"><span class="title">DevOps as a Service</span>
                                Effortless DevOps Integration</a>
                                <a href="<?php echo $site_url; ?>cloud-services/cloud-managed-services"><span class="title">24x7 Managed Services</span>
                                Round-the-Clock Seamless Service</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>cloud-services/cloud-finops-service"><span class="title">Cloud FinOps Services</span>
                                Cloud Savings Made Simple</a>
                                <a href="<?php echo $site_url; ?>cloud-services/cloud-migration"><span class="title">Cloud Migration</span>
                                Seamless, Swift Cloud Transition
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions </a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>data-engineering"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-07.svg" class="menuicon" alt="menuicon"><span class="title">Data Engineering</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
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
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions </a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>ai"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-07.svg" class="menuicon" alt="menuicon"><span class="title">Artificial Intelligence</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4">
                                <span class="head">Artificial Intelligence</span>
                                <a href="<?php echo $site_url; ?>ai/application-development-company"><span class="title">AI Development</span>
                                Crafting future with AI</a>
                                <a href="<?php echo $site_url; ?>ai/consulting-services-company"><span class="title">AI Consulting</span>
                                Choose the right technology</a>
                                <a href="<?php echo $site_url; ?>chatbot-development-company"><span class="title">AI Chatbot Development</span>
                                Transform communication </a>
                                <a href="<?php echo $site_url; ?>ai/mobile-app-development"><span class="title">AI-Powered App Development</span>
                                Innovative AI mobile apps</a>
                                <a href="<?php echo $site_url; ?>ai" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">ML & Advanced Analytics</span>
                                <a href="<?php echo $site_url; ?>machine-learning/development"><span class="title">ML Development</span>
                                Learning today, leading</a>
                                <a href="<?php echo $site_url; ?>machine-learning/computer-vision-software-development"><span class="title">Computer Vision Solutions</span>
                                Seeing beyond with AI</a>
                                <a href="<?php echo $site_url; ?>machine-learning/mlops-consulting-services"><span class="title">MLOps Consulting</span>
                                Optimizing ML, maximizing </a>
                                <a href="<?php echo $site_url; ?>machine-learning/rpa-development-services-company"><span class="title">RPA Services</span>
                                Efficient RPA automation</a>
                                <a href="<?php echo $site_url; ?>machine-learning" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Generative AI</span>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-development"><span class="title">Generative AI Development</span>
                                Creating with AI innovation</a>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-integration-service"><span class="title">Generative AI Integration</span>
                                Integrating creativity with AI</a>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-consulting-company"><span class="title">Generative AI Consultings</span>
                                Guided generative growth </a>
                                <a href="<?php echo $site_url; ?>ai/stable-diffusion-development-services"><span class="title">Stable Diffusion Development</span>
                                Stable AI, peak performance</a>
                                <a href="<?php echo $site_url; ?>ai/generative-ai-services" class="view-more">View More</a>
                              </div>
                              <div class="flex-4">
                                <span class="head">Expertise</span>
                                <a href="<?php echo $site_url; ?>ai/large-language-model"><span class="title">LLM Services</span>
                                Advanced language model solutions</a>
                                <a href="<?php echo $site_url; ?>ai/adaptive-ai-development"><span class="title">Adaptive AI Development</span>
                                Custom, adaptive AI solutions</a>
                                <a href="<?php echo $site_url; ?>chatgpt-solutions"><span class="title">Custom GPT Solutions</span>
                                Personalized GPT technologies </a>
                                <a href="<?php echo $site_url; ?>ai/transformer-model-development-services"><span class="title">Transformer Model Development</span>
                                Cutting-edge transformer tech</a>
                                <a href="<?php echo $site_url; ?>" class="view-more">View More</a>
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
            <li class="menu-item-has-children">
   <a href="<?php echo $site_url; ?>">Hire</a> <span class="arrow-btn"></span>
   <div class="menu-mega">
      <div class="container">
         <div class="dis-flex tab-menu">
            <div id="mnu-hire" class="dis-flex tab-contents">
               <div class="left-tabs">
                  <ul class="tab-nav">
                     <li class="tab-link is-active">Backend</li>
                     <li class="tab-link">Frontend</li>
                     <li class="tab-link">CMS</li>
                     <li class="tab-link">Mobile</li>
                     <li class="tab-link">eCommerce</li>
                     <li class="tab-link">DevOps</li>
                     <li class="tab-link">Full Stack</li>
                     <li class="tab-link">Blockchain</li>
                     <li class="tab-link">Digital Marketing</li>
                     <li class="tab-link">AI/ML</li>
                     <li class="tab-link">Low - Code</li>
                  </ul>
               </div>
               <div class="right-tabs">
                  <div class="tab-content is-active">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>                              
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>

                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>

                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>
                <div class="tab-content">
                     <div class="three-column">
                        <div class="tab-title"><a href="<?php echo $site_url; ?>software-development-services-company">
                           <img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-01.svg" 
                              class="menuicon" alt="menuicon"><span class="title">Backend</span>Innovative, future-proof software solutions</a>
                        </div>
                        <div class="dis-flex menu-column">
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           <div class="flex-2">                                
                              <a href="<?php echo $site_url; ?>"><span class="title">.NET</span></a>
                              <a href="<?php echo $site_url; ?>"><span class="title"></span></a>
                           </div>
                           </div>
                           </div>
                           <div class="other-menu">
                              <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Other Services</span>
                                 Innovative, future-proof software solutions</a>
                              </div>
                              <div class="flex-1 menu-column">
                                 <a href="<?php echo $site_url; ?>application-maintenance"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">App Maintainance & Support</span>
                                 Comprehensive support solutions</a>
                                 <a href="<?php echo $site_url; ?>application-modernization"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">Application Modernization</span>
                                 Update your applications</a>
                                 <a href="<?php echo $site_url; ?>ott-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">OTT App Development</span>
                                 Monetize your content</a>
                                 <a href="<?php echo $site_url; ?>cloud-application-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-04.svg" class="menuicon" alt="menuicon"><span class="title">Cloud Application Development</span>
                                 Cloud-based software solutions</a>
                              </div>
                           </div>
                </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</li>
            <li class="menu-item-has-children">
              <a href="<?php echo $site_url; ?>">Solutions</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="mnu-sol" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link is-active">Solutions</li>
                          <li class="tab-link">Industries</li>
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content is-active">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/ind-01.svg" class="menuicon" alt="menuicon"><span class="title">Solutions</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>digital-financial-management"><span class="title">Financial Management</span>
                                Strategic consulting for growth</a>
                                <a href="<?php echo $site_url; ?>workforce-management-solutions"><span class="title">Workforce Management</span>
                                Streamline workforce operations</a>
                                <a href="<?php echo $site_url; ?>hr-software-solutions"><span class="title">Human Resource Management</span>
                                Optimize HR processes</a>
                                <a href="<?php echo $site_url; ?>elearning-solutions"><span class="title">eLearning</span>
                                Digitalize your learning journey</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>supply-chain-management"><span class="title">Supply Chain Management</span>
                                Improve supply chain efficiency</a>
                                <a href="<?php echo $site_url; ?>fleet-management"><span class="title">Fleet Management</span>
                                Enhance fleet efficiency</a>
                                <a href="<?php echo $site_url; ?>crm"><span class="title">CRM</span>
                                Strengthen customer relationships</a>
                                <a href="<?php echo $site_url; ?>operations-management-solutions"><span class="title">Operations Management</span>
                                Optimize operational processes</a>
                              </div>
                              <div class="flex-4">
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
                        <div class="tab-content">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-02.svg" class="menuicon" alt="menuicon"><span class="title">Industries</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services"><span class="title">Healthcare</span>
                                Innovative digital solutions</a>
                                <a href="<?php echo $site_url; ?>industries/isv-software-development-services"><span class="title">ISV</span>
                                End-to-end software products</a>
                                <a href="<?php echo $site_url; ?>industries/automotive-companies-software-development-services"><span class="title">Automotive</span>
                                Result-driven automotive software</a>
                                <a href="<?php echo $site_url; ?>industries/fintech-software-development-company"><span class="title">Fintech</span>
                                Build end-to-end, robust solutions</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development"><span class="title">Retail & eCommerce</span>
                                Feature-rich eCommerce solutions</a>
                                <a href="<?php echo $site_url; ?>industries/manufacturing-software-development"><span class="title">Manufacturing</span>
                                Next-gen manufacturing mastery</a>
                                <a href="<?php echo $site_url; ?>industries/telecommunications"><span class="title">Telecommunications</span>
                                Connect digital dimensions</a>
                                <a href="<?php echo $site_url; ?>industries/education-elearning-software-development"><span class="title">Education & eLearning</span>
                                Custom and platform-based LMS</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development"><span class="title">Retail & eCommerce</span>
                                Feature-rich eCommerce solutions</a>
                                <a href="<?php echo $site_url; ?>industries/manufacturing-software-development"><span class="title">Manufacturing</span>
                                Next-gen manufacturing mastery</a>
                                <a href="<?php echo $site_url; ?>industries/telecommunications"><span class="title">Telecommunications</span>
                                Connect digital dimensions</a>
                                <a href="<?php echo $site_url; ?>industries/education-elearning-software-development"><span class="title">Education & eLearning</span>
                                Custom and platform-based LMS</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>industries/professional-services-software-development"><span class="title">Professional Services</span>Craft client success</a>
                                <a href="<?php echo $site_url; ?>industries/oil-gas"><span class="title">Oil & Gas</span>Innovate energy engagements</a>
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

            <li class="menu-item-has-children">
              <a href="<?php echo $site_url; ?>">Who We Serve</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="menu-inds" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link is-active">Industries</li>
                          <li class="tab-link">Enterprises</li>
                          <li class="tab-link">Product Companies</li>
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content is-active">
                          <div class="four-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/ind-01.svg" class="menuicon" alt="menuicon"><span class="title">Industries</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>"><span class="title">Financial Services</span>
                                Expert advice on technology</a>
                                <a href="<?php echo $site_url; ?>industries/banking-financial-services"><span class="title">Banking</span>
                                Choose the right technology</a>
                                <a href="<?php echo $site_url; ?>insurance"><span class="title">Insurance</span>
                                Assistance from product conception</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Lending</span>
                                Validate your idea and ensure</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>"><span class="title">Investment</span>
                                Lead your business</a>
                                <a href="<?php echo $site_url; ?>industries/fintech-software-development-company"><span class="title">FinTech</span>
                                Update your web & Mobile</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Payments</span>
                                Effortless maintenance</a>
                                <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development"><span class="title">Retail</span>
                                Consult experts for big</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services"><span class="title">Healthcare</span>
                                Lead your business into digital</a>
                                <a href="<?php echo $site_url; ?>industries/manufacturing-software-development"><span class="title">Manufacturing</span>
                                Update your web and mobile</a>
                                <a href="<?php echo $site_url; ?>industries/professional-services-software-development"><span class="title">Professional Services</span>
                                Effortless maintenance</a>
                                <a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development"><span class="title">Transportation & Logistics</span>
                                Consult experts for big data</a>
                              </div>
                              <div class="flex-4">
                                <a href="<?php echo $site_url; ?>industries/telecommunications"><span class="title">Telecommunications</span>
                                Lead your business into digital</a>
                                <a href="<?php echo $site_url; ?>industries/oil-gas"><span class="title">Oil & Gas</span>
                                Update your web and mobile</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Construction</span>
                                Effortless maintenance</a>
                                <a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services"><span class="title">Travel & Hospitality</span>
                                Consult experts for big data</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-02.svg" class="menuicon" alt="menuicon"><span class="title">Enterprises</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>enterprise-software-development-services"><span class="title">Enterprise Software Development</span>
                                Define policies, audit compliance, monitor quality</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Specialized Enterprise Solutions</span>
                                Ensure quality, performance, & functionality</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Enterprise Digital Transformation</span>
                                Validate mobile apps for optimal performance</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Business Process Management</span>
                                Make flawless apps for improved performance</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>"><span class="title">Business Automation</span>
                                Testing experts for every stage </a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Crisis Management</span>
                                Plan, build, & ship quality products</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/ind-03.svg" class="menuicon" alt="menuicon"><span class="title">Software Startups & Product Companies</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>"><span class="title">Startup Consulting</span>
                                Define policies, audit compliance, monitor quality</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">Startup Software Development</span>
                                Ensure quality, performance, & functionality</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">How to Launch a Software Startup</span>
                                Validate mobile apps for optimal performance</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">How to Start a SaaS Startup</span>
                                Make flawless apps for improved performance</a>
                              </div>
                              <div class="flex-2">
                                <a href="<?php echo $site_url; ?>"><span class="title">How to Hire Startup Developers</span>
                                Testing experts for every stage  </a>
                                <a href="<?php echo $site_url; ?>outsource-software-product-development-services"><span class="title">Software Product Development</span>
                                Plan, build, & ship quality products</a>
                                <a href="<?php echo $site_url; ?>"><span class="title">SaaS Consulting</span>
                                Plan, build, & ship quality products</a>
                                <a href="<?php echo $site_url; ?>saas-consulting-development-services"><span class="title">SaaS Development</span>
                                Plan, build, & ship quality products</a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
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
            <li class="menu-item-has-children">
              <a href="<?php echo $site_url; ?>">Technologies</a> <span class="arrow-btn"></span>
              <div class="menu-mega">
                <div class="container">
                  <div class="dis-flex tab-menu">
                    <div id="mnu-tech" class="dis-flex tab-contents">
                      <div class="left-tabs">
                        <ul class="tab-nav">
                          <li class="tab-link is-active">Programming</li>
                          <li class="tab-link">Trending</li>
                          <li class="tab-link">Platforms</li>                          
                        </ul>
                      </div>
                      <div class="right-tabs">
                        <div class="tab-content is-active">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-03.svg" class="menuicon" alt="menuicon"><span class="title">Programming </span>Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>android-app-development-company-india"><span class="title">Android</span></a>
                                <a href="<?php echo $site_url; ?>angular-js-development-company-india"><span class="title">Angular</span></a>
                                <a href="<?php echo $site_url; ?>top-drupal-development-services-company-india"><span class="title">Drupal</span></a>
                                <a href="<?php echo $site_url; ?>flutter-app-development-company"><span class="title">Flutter</span></a>
                                <a href="<?php echo $site_url; ?>ios-application-development-company-india"><span class="title">iOs / iPhone</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>java-web-application-development-company"><span class="title">Java</span></a>
                                <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india"><span class="title">Lavavel</span></a>
                                <a href="<?php echo $site_url; ?>net-maui-app-development"><span class="title">.NET MAUI</span></a>
                                <a href="<?php echo $site_url; ?>aspdotnet-development-company-india"><span class="title">.NET</span></a>
                                <a href="<?php echo $site_url; ?>node-js-development-company-india"><span class="title">Node</span></a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>

                        <div class="tab-content is-active">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-03.svg" class="menuicon" alt="menuicon"><span class="title">Trending</span>Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>iot-development-company"><span class="title">Internet of Things</span></a>
                                <a href="<?php echo $site_url; ?>big-data-application-development-services-company"><span class="title">Big Data</span></a>
                                <a href="<?php echo $site_url; ?>data-engineering/data-science-consulting-services"><span class="title">Data Science</span></a>
                                <a href="<?php echo $site_url; ?>data-analytics"><span class="title">Data Analytics</span></a>
                                <a href="<?php echo $site_url; ?>ai"><span class="title">AI & Machine Learning</span></a>
                                <a href="<?php echo $site_url; ?>blockchain-development-company"><span class="title">Blockchain</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>ar-vr-development-company"><span class="title">AR/ VR</span></a>
                                <a href="<?php echo $site_url; ?>machine-learning/computer-vision-software-development"><span class="title">Computer Vision</span></a>
                                <a href="<?php echo $site_url; ?>ott-development"><span class="title">OTT</span></a>
                                <a href="<?php echo $site_url; ?>machine-learning/rpa-development-services-company"><span class="title">RPA</span></a>
                                <a href="<?php echo $site_url; ?>serverless-development"><span class="title">Serverless</span></a>
                                <a href="<?php echo $site_url; ?>chatbot-development-company"><span class="title">Chatbot</span></a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu mob-hide">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
                              <a href="<?php echo $site_url; ?>agencies-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-03.svg" class="menuicon" alt="menuicon"><span class="title">For Agencies</span>
                              Expand with white-label services</a>
                            </div>
                          </div>
                        </div>

                        <div class="tab-content is-active">
                          <div class="three-column">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/serv-03.svg" class="menuicon" alt="menuicon"><span class="title">Platforms </span>Innovative, future-proof software solutions</a>
                            </div>
                            <div class="dis-flex menu-column">
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>salesforce"><span class="title">Salesforce</span></a>
                                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company"><span class="title">Microsoft Power BI</span></a>
                                <a href="<?php echo $site_url; ?>cloud-services/amazon-cloud"><span class="title">Amazon Web Services</span></a>
                                <a href="<?php echo $site_url; ?>microsoft-power-platform"><span class="title">Microsoft Power Platforms</span></a>
                                <a href="<?php echo $site_url; ?>microsoft-dynamics"><span class="title">Microsoft Dynamics</span></a>
                              </div>
                              <div class="flex-2">                                
                                <a href="<?php echo $site_url; ?>microsoft-powerapp-development"><span class="title">PowerApps</span></a>
                                <a href="<?php echo $site_url; ?>sharepoint-application-development-services-company"><span class="title">SharePoint</span></a>
                                <a href="<?php echo $site_url; ?>cloud-services/azure-cloud"><span class="title">Azure</span></a>
                                <a href="<?php echo $site_url; ?>odoo-development-services"><span class="title">Odoo</span></a>
                              </div>
                            </div>
                          </div>
                          <div class="other-menu">
                            <div class="tab-title"><a href="<?php echo $site_url; ?>"><span class="title">Client Type</span>
                              Innovative, future-proof software solutions</a>
                            </div>
                            <div class="flex-1 menu-column">
                              <a href="<?php echo $site_url; ?>startup-product-development"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-01.svg" class="menuicon" alt="menuicon"><span class="title">For Startups</span>
                              Custom software for business goals</a>
                              <a href="<?php echo $site_url; ?>enterprise-software-development-services"><img loading="lazy" src="<?php echo $site_url; ?>wp-content/themes/valuecoders/v4.0/header-images/os-02.svg" class="menuicon" alt="menuicon"><span class="title">For Enterprises</span>
                              End-to-end automation solutions</a>
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
            <li class="menu-item-has-children"><a href="<?php echo $site_url; ?>">Case Studies</a></li>
            <li class="menu-item-has-children">
              <a href="<?php echo $site_url; ?>">Company</a> <span class="arrow-btn"></span>
              <div class="menu-mega small-menu">
                <a href="<?php echo $site_url; ?>about"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-01.svg" class="menuicon" alt="menuicon">Overview</a>
                <a href="<?php echo $site_url; ?>in-media"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-02.svg" class="menuicon" alt="menuicon">In Media</a>
                <a href="<?php echo $site_url; ?>testimonials"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-03.svg" class="menuicon" alt="menuicon">Clients & Testimonials</a>
                <a href="<?php echo $site_url; ?>careers"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-04.svg" class="menuicon" alt="menuicon">Careers</a>
                <a href="https://www.valuecoders.com/blog/" target="_blank"><img loading="lazy" src="<?php echo $tpl_url; ?>/v4.0/header-images/comp-05.svg" class="menuicon" alt="menuicon">Blog</a>
              </div>
            </li>
            <li class="cta-wrap small-reso">
          <div class="btn-sec">
            <a href="https://www.valuecoders.com/staging/contact" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
         </li>
          </ul>
        </nav>
        <div class="cta-wrap large-reso">
          <div class="btn-sec">
            <a href="https://www.valuecoders.com/staging/contact" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</header>
