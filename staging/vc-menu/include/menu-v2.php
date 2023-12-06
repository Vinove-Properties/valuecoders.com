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

$tpl_url    = 'https://www.valuecoders.com/wp-content/themes/valuecoders';
?>
<?php //if( !vc_is_mobile() ) : ?>
    <header class="header-two" data-nosnippet>
    <div class="container">
        <div class="wrapper">
            <div class="header-item-left">
                <a href="<?php echo $site_url; ?>" class="brand">
                    <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo.png" alt="Logo" class="dark-theme-logo" width="301" height="52">
                    <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-blue.png" alt="Logo" 
                    class="day-theme-logo" width="301" height="52">
               </a>
            </div>
            <!-- Navbar Section -->
            <?php if( !isset( $_GET['l'] ) ) : ?>
            <div class="header-item-center">
                <nav class="menu" id="menu">
                    <ul>
                        <li class="menu-item-has-children"><a href="<?php echo $site_url; ?>software-development-services-company">Services</a>
                            <div class="menu-mega">
                                <div class="container">
                                    <div class="dis-flex" id="active_Current_Tabs1">
                                        <div class="width-25 for-padding left-list">
                                            <a href="<?php echo $site_url; ?>software-development-services-company" class="text-column active" id="a1" data-section="active_Current_Tabs1" data-mrow="1">Software Development</a>
                                            <a href="<?php echo $site_url; ?>application-development" class="text-column" id="a2" data-section="active_Current_Tabs1" data-mrow="2">Application Development</a>
                                            <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services" class="text-column" id="a3" data-section="active_Current_Tabs1" data-mrow="3">QA & Testing</a>
                                            <a  href="<?php echo $site_url; ?>ecommerce-development-services" class="text-column" id="a5" data-section="active_Current_Tabs1" data-mrow="5">eCommerce</a>
                                            <a href="javascript:void(0)" class="text-column" id="a4" data-section="active_Current_Tabs1" data-mrow="4">Analytics & DevOps</a>
                                        </div>

                                        <!-- 1 -->
                                        <div class="width-75 for-padding header-menu active" id="b1">
                                            <div class="dis-flex" id="active_Current_Tabs2">
                                                <div class="width-33 middle-list">
                                                    <a href="<?php echo $site_url; ?>outsource-software-product-development-services" class="title">Software Product Development</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>mvp-app-development-company">MVP Development & Consulting</a>
														<a href="<?php echo $site_url; ?>saas-consulting-development-services">SaaS Consulting & Development</a>
														<a href="<?php echo $site_url; ?>startup-consulting-services-company">Startup Consulting</a>
														<a href="<?php echo $site_url; ?>startup-product-development">Product Development for Startups</a>
														<a href="<?php echo $site_url; ?>product-ui-ux-design">Product UI/UX Design</a>
													</div>

                                                    <a href="<?php echo $site_url; ?>custom-software-development-services-company" class="title">Custom Software Development</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>enterprise-software-development-services">Enterprise Software Development</a> 
														<a href="<?php echo $site_url; ?>nearshore-software-development-services">NearShore Software Development</a>
													</div>
    												</div>

                                                <div class="width-33 middle-list">
													<a href="<?php echo $site_url; ?>software-outsourcing-services-company" class="title">Software Outsourcing services</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>dedicated-development-teams">Dedicated Development Teams</a>
														<a href="<?php echo $site_url; ?>it-staff-augmentation-services">Staff Augmentation Services</a>
														<a href="<?php echo $site_url; ?>offshore-software-development-services-company">Offshore Software Development</a>
														<a href="<?php echo $site_url; ?>offshore-software-development-center-india">Offshore Development Center (ODC)</a>
                                                        <a href="<?php echo $site_url; ?>white-label-services">White-Label Development Services</a>
														<a href="<?php echo $site_url; ?>how-it-works">How It Works</a>
														<a href="<?php echo $site_url; ?>faq">FAQs</a>
													</div>
												</div>
                                                <div class="width-33 middle-list">
                                                    <a href="<?php echo $site_url; ?>it-strategy-consulting-firms" class="title">IT Consulting</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>software-consulting">Software Consulting</a>
														<!-- <a href="<?php echo $site_url; ?>new_page">Agile Consulting</a>
														<a href="<?php echo $site_url; ?>new_page">CRM Consulting</a>
														<a href="<?php echo $site_url; ?>new_page">Data Analytics Consulting</a> -->
													</div>

													<a href="<?php echo $site_url; ?>digital-transformation-services" class="title">Digital Transformation</a>
													<div class="sub-child">
														<!-- <a href="<?php echo $site_url; ?>new_page">Consulting</a> -->
													</div>
												</div>

                                            </div>
                                        </div>

                                        <!-- 2 -->
                                        <div class="width-75 for-padding header-menu" id="b2">
                                            <div class="dis-flex" id="active_Current_Tabs3">
												<div class="width-33 middle-list">
                                                    <a href="<?php echo $site_url; ?>mobile-application-development" class="title">Mobile App Development</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>cross-platform-app-development-services">Cross Platform App Development</a>
														<a href="<?php echo $site_url; ?>flutter-app-development-company">Flutter App Development</a>
														<a href="<?php echo $site_url; ?>ios-application-development-company-india">iOS / iPhone App Development</a>
														<a href="<?php echo $site_url; ?>android-app-development-company-india">Andoid App Development</a>
														<a href="<?php echo $site_url; ?>best-react-native-development-services-company-india">React Native App Development</a>
														<a href="<?php echo $site_url; ?>best-xamarin-development-services-company-india">Xamarin App Development</a>
													</div>

                                                    <a href="<?php echo $site_url; ?>web-application-development" class="title">Web App Development</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>top-website-development-company">Website & Portal Development</a>
													</div>

													<a href="<?php echo $site_url; ?>cloud-application-development-services" class="title">Cloud Application Development</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>serverless-development">Serverless</a>
													</div>

                                                </div>

                                                <div class="width-33 middle-list">
													<a href="<?php echo $site_url; ?>backend-development-services" class="title">Backend Development Services</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>aspdotnet-development-company-india">.NET Development Services</a>
														<a href="<?php echo $site_url; ?>top-laravel-development-services-company-india">Laravel Development Services</a>
														<a href="<?php echo $site_url; ?>php-development-services-company">PHP Development Services</a>
														<a href="<?php echo $site_url; ?>node-js-development-company-india">Node Development Services</a>
														<a href="<?php echo $site_url; ?>java-web-application-development-company">Java Development Services</a>
														<a href="<?php echo $site_url; ?>python-web-development-services-company">Python Development Services</a>
														<a href="<?php echo $site_url; ?>sharepoint-application-development-services-company">SharePoint Development Services</a>
														<a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">Wordpress Development Services</a>
														<a href="<?php echo $site_url; ?>top-drupal-development-services-company-india">Drupal Development Services</a>
                                                        <a href="<?php echo $site_url; ?>api-development-services">API Development Services</a>
													</div>

												</div>

												<div class="width-33 middle-list title-list">

                                                    <a href="<?php echo $site_url; ?>frontend-development-services" class="title">Frontend Development Services</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>angular-js-development-company-india">Angular Development Services</a>
														<a href="<?php echo $site_url; ?>react-js-development-services-company">React Development Services</a>
														<a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Power BI Development Services</a>
													</div>
													<span class="title">Full Stack Development</span>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>top-mean-stack-development-services-company-india">MEAN Stack Development Services</a>
														<a href="<?php echo $site_url; ?>top-mern-stack-development-services-company-india">MERN Stack Development Services</a>
													</div>

													<a href="<?php echo $site_url; ?>application-maintenance" class="title">Application Maintainance & Support</a>
													<a href="<?php echo $site_url; ?>application-modernization" class="title">Application Modernization</a>
													<a href="<?php echo $site_url; ?>ott-development" class="title">OTT App Development Services</a>
												</div>

                                            </div>
                                        </div>

                                        <!-- 3 -->

                                        <div class="width-75 header-menu" id="b3">
                                            <div class="dis-flex" id="active_Current_Tabs4">
												<div class="width-25 for-padding middle-list">
                                                    <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services" class="title">Services</a>
                                                    <div class="sub-child">
                                                        <a href="<?php echo $site_url; ?>qa-consulting-services">QA Consulting</a>
                                                        <a href="<?php echo $site_url; ?>application-testing-services">Application Testing</a>
                                                        <a href="<?php echo $site_url; ?>mobile-app-testing-services">Mobile App Testing</a>
                                                        <a href="<?php echo $site_url; ?>web-application-testing-services">Web App Testing</a>
                                                        <a href="<?php echo $site_url; ?>qa-outsourcing-services">QA Outsourcing</a>
                                                        <a href="<?php echo $site_url; ?>software-testing-teams">Testing Teams</a>
                                                        <a href="<?php echo $site_url; ?>hire-developers/software-qa-testers-india">Hire Software QA</a>
                                                    </div>
												</div>
                                                <div class="middle-list for-padding">
                                                    <span class="title">Solutions</span>
                                                    <div class="sub-child">
                                                        <a href="<?php echo $site_url; ?>functional-software-testing">Functional Testing</a>
                                                        <a href="<?php echo $site_url; ?>usability-software-testing">Usability Testing</a>
                                                        <a href="<?php echo $site_url; ?>software-performance-testing">Performance Testing</a>
                                                        <a href="<?php echo $site_url; ?>software-testing-automation">Automated Testing</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 4 -->
                                        <div class="width-75 for-padding header-menu" id="b5">
                                            <div class="dis-flex" id="active_Current_Tabs5">

                                                <div class="width-33 middle-list">
                                                    <a href="<?php echo $site_url; ?>ecommerce-development-services" class="title">Services</a>
                                                    <div class="sub-child">
                                                        <a href="<?php echo $site_url; ?>ecommerce-consulting-services">eCommerce Consulting</a>
                                                        <!-- <a href="<?php echo $site_url; ?>ecommerce-implementation">eCommerce Implementation</a> -->
                                                        <a href="<?php echo $site_url; ?>digital-consulting-services">Digital Consulting</a>
                                                        <a href="<?php echo $site_url; ?>ecommerce-web-design">eCommerce Web Design</a>
                                                    </div>
                                                </div>
                                                <div class="width-33 middle-list">
                                                    <span class="title">Technologies</span>
                                                    <div class="sub-child">
                                                        <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india">Magento</a>
                                                        <a href="<?php echo $site_url; ?>shopify-development-services">Shopify</a>
                                                        <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">WooCommerce</a> 
                                                    </div>
                                                </div>
                                                <div class="width-33 middle-list">
                                                    <span class="title">Solutions</span>
                                                    <div class="sub-child">
                                                        <a href="<?php echo $site_url; ?>b2c-ecommerce">B2C eCommerce</a>
                                                        <a href="<?php echo $site_url; ?>b2b-ecommerce">B2B eCommerce</a>
                                                        <a href="<?php echo $site_url; ?>ecommerce-web-portal">Web Portal</a>
                                                        <a href="<?php echo $site_url; ?>supply-chain-automation">Supply Chain Automation</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- 5 -->
                                        <div class="width-75 for-padding header-menu" id="b4">
                                            <div class="dis-flex" id="active_Current_Tabs6">
                                                <div class="width-33 middle-list">
													<a href="<?php echo $site_url; ?>business-intelligence-consulting-services" class="title">Dashboards & Analytics</a>
													<div class="sub-child">
														<!-- <a href="<?php echo $site_url; ?>big-data-application-development-services-company">Data Analytics Consulting & Management</a> -->
														<a href="<?php echo $site_url; ?>big-data-application-development-services-company">Big Data Consulting & Management</a>
														<a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Microsoft Power BI</a>
													</div>
												</div>

												<div class="width-33 middle-list">
                                                    <a href="<?php echo $site_url; ?>devops-consulting-engineering-services-company" class="title">DevOps</a>
													<div class="sub-child">
														<a href="<?php echo $site_url; ?>devops-consulting-engineering-services-company">DevOps Consulting</a>
														<a href="<?php echo $site_url; ?>amazon-aws-partner-company-india">Amazon AWS</a>
														<a href="<?php echo $site_url; ?>microsoft-azure-partner-company-india">Azure</a>
													</div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- Hire Developers -->
                        <li class="menu-item-has-children">
                            <a href="<?php echo $site_url; ?>hire-developers">Hire Developers</a>
                            <div class="menu-mega">
                                <div class="container">
                                    <div class="dis-flex" id="active_Current_Tabs7">

                                        <!-- hire tech -->
                                        <div class="width-100 for-padding header-menu active" id="b0">
                                            <div class="dis-flex last-list" id="active_Current_Tabs0">
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-backend-developers" class="title">Backend</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-dotnet-developers" title=".NET">.NET</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-c-developers" title="C/C++">C/C++</a>
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
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers" class="title">Frontend</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-angularjs-developers" title="Angular">Angular</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-html-developers" title="HTML/CSS">HTML/CSS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-power-bi-developer-consultants" title="PowerBI">PowerBI</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-reactjs-developers" title="React">React</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-vuejs-developers" title="Vue.JS">Vue.JS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers" class="margin-t-40 title">CMS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal">Drupal</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-kentico-developers" title="kentico">Kentico</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-sitecore-developers" title="Sitecore">Sitecore</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-sitefinity-developers" title="Sitefinity">Sitefinity</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-umbraco-developers" title="Umbraco">Umbraco</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-wordpress-developers" title="Wordpress">Wordpress</a>
                                                </div>
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mobile-app-developers" class="title">Mobile</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-android-developers" title="Android">Android</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-flutter-developers" title="Flutter">Flutter</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ionic-developers" title="Ionic">Ionic</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ios-developers" title="IOS">iOS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-kotlin-developers" title="Kotlin">Kotlin</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-react-native-developers" title="React Native">React Native</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-swift-developers" title="Swift">Swift</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-xamarin-developers" title="Xamarin">Xamarin</a>

                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers" class="margin-t-40 title">eCommerce</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-magento-developers" title="Magento">Magento</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-shopify-developers" title="Shopify">Shopify</a>

                                                </div>
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers" class="title">Full Stack</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mean-stack-developers" title="MEAN">MEAN</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mern-stack-developers" title="MERN">MERN</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers" class="margin-t-40 title">Blockchain</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-cryptocurrency-app-developers" title="Cryptocurrency">Cryptocurrency</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ethereum-developer" title="Ethereum">Ethereum</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ico-developers" title="ICO">ICO</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-smartcontract-developers" title="Smart Contract">Smart Contract</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-solidity-developers" title="Solidity">Solidity</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers" class="margin-t-40 title">DevOps</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-azure-developers" title="Azure">Azure</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-aws-developers" title="AWS">AWS</a>

                                                </div>

                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-machine-learning-experts" class="title">ML</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-chatbot-developers" title="Chatbot">Chatbot</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/dialog-flow-development-services-company" title="Dialogflow"> Dialogflow</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers" title="RPA">RPA</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-tensorflow-developers" title="Tensorflow">Tensorflow</a>
                                                    <a href="<?php echo $site_url; ?>low-code-no-code-services" class="margin-t-40 title">Low-Code</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-appian-developers" title="Appian">Appian</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-outsystems-developers" title="Outsystems">Outsystems</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mendix-developers" title="Mendix">Mendix</a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- Technology -->
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Technologies</a>
                            <div class="menu-mega width-menu">
                                <div class="container">
                                    <div class="dis-flex" id="active_Current_Tabs8">

                                        <div class="width-100 header-menu active for-padding">
                                            <div class="dis-flex" id="active_Current_Tabs8a">

												<div class="width-25 last-list">
                                                    <span class="title">Trending</span>
													<a href="<?php echo $site_url; ?>serverless-development">Serverless</a>
													<a href="<?php echo $site_url; ?>iot-development-company">Internet of Things</a>
													<!-- <a href="<?php echo $site_url; ?>new_page">Big Data</a> -->
													<a href="<?php echo $site_url; ?>ai-ml-development-services-company">Machine Learning</a>
													<a href="<?php echo $site_url; ?>blockchain-development-company">Blockchain</a>
													<a href="<?php echo $site_url; ?>ar-vr-development-company">AR/ VR</a>
													<a href="<?php echo $site_url; ?>ott-development">OTT</a>
													<a href="<?php echo $site_url; ?>rpa-development-services-company">RPA</a>
												</div>

												<div class="width-35 last-list">
                                                    <span class="title">Platforms</span>
													<a href="<?php echo $site_url; ?>sharepoint-application-development-services-company">SharePoint</a>
													<a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Microsoft Power BI</a>
													<!-- <a href="<?php echo $site_url; ?>new_page">Microsoft Azure</a> -->
													<!-- <a href="<?php echo $site_url; ?>new_page">Amazon Web Services</a> -->
                                                    <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">Wordpress</a>
												</div>

												<div class="width-40 last-list">
                                                    <span class="title">Programming</span>

													<div class="dis-flex two-col">
														<div class="width-50">
															<a href="<?php echo $site_url; ?>ios-application-development-company-india">iOS / iPhone</a>
															<a href="<?php echo $site_url; ?>android-app-development-company-india">Andoid</a>
															<a href="<?php echo $site_url; ?>best-react-native-development-services-company-india">React Native</a>
															<!-- <a href="<?php echo $site_url; ?>new_page">Xamarin</a> -->
															<a href="<?php echo $site_url; ?>aspdotnet-development-company-india">.NET</a>
															<a href="<?php echo $site_url; ?>top-laravel-development-services-company-india">Laravel</a>
															<a href="<?php echo $site_url; ?>php-development-services-company">PHP</a>
														</div>
														<div class="width-50 padding-l-40">
															<a href="<?php echo $site_url; ?>node-js-development-company-india">Node</a>
															<a href="<?php echo $site_url; ?>java-web-application-development-company">Java</a>
															<a href="<?php echo $site_url; ?>python-web-development-services-company">Python</a>
															<a href="<?php echo $site_url; ?>top-drupal-development-services-company-india">Drupal</a>
															<a href="<?php echo $site_url; ?>angular-js-development-company-india">Angular</a>
															<a href="<?php echo $site_url; ?>react-js-development-services-company">React</a>
															<a href="<?php echo $site_url; ?>flutter-app-development-company">Flutter</a>
														</div>

													</div>
												</div>

                                            </div>
                                        </div>

										<!-- <div class="width-25 last-list for-padding bg-gray">
											<span class="title with-border">Technologies</span>
											<p>We have expertise in all major technologies and platforms, crafting innovative software solutions for you.</p>
											<span class="title margin-t-60">Don't know how to start?</span>
											<a href="<?php echo $site_url; ?>contact" class="menu-btn">Talk to Us</a>
										</div> -->

                                    </div>
                                </div>
                            </div>
                        </li>

						<!-- Solutions -->
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Solutions</a>
                            <div class="menu-mega width-menu">
                                <div class="container">
                                    <div class="dis-flex" id="active_Current_Tabs9">

                                        <div class="width-100 header-menu active for-padding">
                                            <div class="dis-flex" id="active_Current_Tabs9a">

												<div class="width-25 last-list">
													<span class="title">Industries</span>
													<a href="<?php echo $site_url; ?>industries/healthcare-software-development-services">Healthcare</a>
													<a href="<?php echo $site_url; ?>industries/isv-software-development-services">ISV</a>
													<a href="<?php echo $site_url; ?>industries/automotive-companies-software-development-services">Automative</a>
													<a href="<?php echo $site_url; ?>fintech-software-development-company">Fintech</a>
													<a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development">Retail & eCommerce</a>
                                                </div>
												<div class="width-40 last-list">
                                                    <br>
                                                    <a href="<?php echo $site_url; ?>industries/education-elearning-software-development">Education & Elearning</a>
													<a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services">Travel & Tourism</a>
													<a href="<?php echo $site_url; ?>industries/banking-financial-services">Banking & Financial Services</a>
													<a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development">Logistic & Transportation</a>
													<a href="<?php echo $site_url; ?>industries/media-software-development-services">Media & Entertaintainment</a>
												</div>

												<div class="width-35 last-list">
                                                    <span class="title">Solutions</span>
                                                    <a href="<?php echo $site_url; ?>digital-financial-management-consulting-services">Financial Management</a>
                                                    <!-- <a href="<?php echo $site_url; ?>ecommerce-development-services">eCommerce</a> -->
                                                    <a href="<?php echo $site_url; ?>workforce-management-solutions">Workforce Management</a>
                                                    
                                                </div>


												<!-- <div class="width-66 dis-flex">
													<div class="width-50 last-list">
														<a href="javascript:void(0)" class="title">Solutions</a>
														<a href="<?php echo $site_url; ?>new_page">CRM</a>
														<a href="<?php echo $site_url; ?>new_page">Marketing & Advertising</a>
														<a href="<?php echo $site_url; ?>new_page">Human Resources</a>
														<a href="<?php echo $site_url; ?>new_page">eLearning</a>
														<a href="<?php echo $site_url; ?>new_page">Document Management</a>
														<a href="<?php echo $site_url; ?>new_page">Supply Chain Management</a>
														<a href="<?php echo $site_url; ?>new_page">Fleet Management</a>
														<a href="<?php echo $site_url; ?>new_page">Kiosk Software</a>
														<a href="<?php echo $site_url; ?>new_page">ERP</a>
														<a href="<?php echo $site_url; ?>new_page">Operations Management</a>
													</div>

													<div class="width-50 last-list">
                                                        <a href="javascript:void(0)" class="title">Solutions</a>
														<a href="<?php echo $site_url; ?>digital-financial-management-consulting-services">Financial Management</a>
														<a href="<?php echo $site_url; ?>new_page">Asset Management</a>
														<a href="<?php echo $site_url; ?>new_page">Project Management</a>
														<a href="<?php echo $site_url; ?>new_page">Data Analytics</a>
														<a href="<?php echo $site_url; ?>ecommerce-app-development-services-company">eCommerce</a>
														<a href="<?php echo $site_url; ?>new_page">Web Portals</a>
														<a href="<?php echo $site_url; ?>new_page">CMS</a>
														<a href="<?php echo $site_url; ?>workforce-management-solutions">Workforce Management</a>
													</div>

												</div> -->

											</div>
                                        </div>

										<!-- <div class="width-25 last-list for-padding bg-gray">
											<span class="title with-border">Solutions</span>
											<p>We design and build innovative technology solutions using our expertise & deep understanding in IT domain.</p>
											<span class="title margin-t-60">Don't know how to start?</span>
											<a href="<?php echo $site_url; ?>contact" class="menu-btn">Talk to Us</a>
										</div> -->

                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- <li class="menu-item-has-children small-menu"><a href="</?php echo $site_url; ?>new_page">Pricing</a>
                            <div class="small-menu-inner">
                                <a href="</?php echo $site_url; ?>new_page">Smart Teams</a>
                                <a href="</?php echo $site_url; ?>new_page">Per Project</a>
                            </div>
                        </li> -->

                        <li class="menu-item-has-children small-menu"><a href="<?php echo $site_url; ?>about">Company</a>
                            <div class="small-menu-inner">
                                <a href="<?php echo $site_url; ?>about">Overview</a>
                                <a href="https://www.valuecoders.com/case-studies/" target="_blank">Case Studies</a>
                                <a href="<?php echo $site_url; ?>in-media">In Media</a>
                                <a href="<?php echo $site_url; ?>testimonials">Clients & Testimonials</a>
                                <a href="<?php echo $site_url; ?>careers">Careers</a>
                                <a href="https://www.valuecoders.com/blog/" target="_blank">Blog</a>
                            </div>
                        </li>
                        <li class="contact-nav"><a href="<?php echo $site_url; ?>contact">Contact Us <i class="arrow-icon"></i></a></li>
                    </ul>
                </nav>
            </div>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php //endif; ?>

<?php //if( vc_is_mobile() ) : ?>
<header class="header-mobile header-two <?php echo ( vc_is_mobile() ) ? ' vc-mob-menu' : ''; ?>">
    <div class="container">
        <div class="header-top">
            <a href="<?php echo $site_url; ?>" class="mobile-logo">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo.png" alt="Logo" class="logo dark-theme-logo" width="301" height="52">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-blue.png" alt="Logo" class="logo day-theme-logo" width="301" height="52">
            </a>
            <?php if( !isset( $_GET['l'] ) ) : ?>
            <div class="hamberger-menu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <?php endif; ?>
        </div>

        <?php if( !isset( $_GET['l'] ) ) : ?>
        <nav class="mob-nav">
            <div class="menu-list first" id="dropdownmwrap1">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo.png" alt="Logo" class="logo dark-theme-logo" width="301" 
                height="52">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-blue.png" alt="Logo" class="logo day-theme-logo" width="301" height="52">
                <ul>
                    <li><a href="<?php echo $site_url; ?>software-development-services-company">Services</a> <span class="arrow-btn" onclick="submenu()"></span></li>
                    <!-- <li><a href="#">Pricing</a> <span class="arrow-btn" onclick="innermenu('main1')"></span>
                        <div class="first-inner" id="main1">
                            <a href="#">Smart Teams</a>
                            <a href="#">Per Project</a>
                        </div>
                    </li> -->

                    <li><a href="<?php echo $site_url; ?>hire-developers">Hire Developers</a> <span class="arrow-btn" onclick="innermenu(this, 'main0')"></span>
                        <div class="first-inner hire-title" id="main0">
                            <a href="<?php echo $site_url; ?>hire-developers/hire-backend-developers">Backend</a> <span class="arrow-btn" onclick="innermenu(this, 'main01')"></span>
                            <div class="hire-inner" id="main01">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-dotnet-developers" title=".NET">.NET</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-c-developers" title="C/C++">C/C++</a>
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

                            <a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers">Frontend</a> <span class="arrow-btn" onclick="innermenu(this, 'main02')"></span>
                            <div class="hire-inner" id="main02">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-angularjs-developers" title="Angular">Angular</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-html-developers" title="HTML/CSS">HTML/CSS</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-power-bi-developer-consultants" title="PowerBI">PowerBI</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-reactjs-developers" title="React">React</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-vuejs-developers" title="Vue.JS">Vue.JS</a>
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers" class="margin-t-40">CMS</a> <span class="arrow-btn" onclick="innermenu(this, 'main05')"></span>
                            <div class="hire-inner" id="main05">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal">Drupal</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-kentico-developers" title="kentico">Kentico</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-sitecore-developers" title="Sitecore">Sitecore</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-sitefinity-developers" title="Sitefinity">Sitefinity</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-umbraco-developers" title="Umbraco">Umbraco</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-wordpress-developers" title="Wordpress">Wordpress</a>
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-mobile-app-developers" class="margin-t-40">Mobile</a> <span class="arrow-btn" onclick="innermenu(this, 'main03')"></span>
                            <div class="hire-inner" id="main03">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-android-developers" title="Android">Android</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-flutter-developers" title="Flutter">Flutter</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ionic-developers" title="Ionic">Ionic</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ios-developers" title="IOS">iOS</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-kotlin-developers" title="Kotlin">Kotlin</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-react-native-developers" title="React Native">React Native</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-swift-developers" title="Swift">Swift</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-xamarin-developers" title="Xamarin">Xamarin</a>
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers" class="margin-t-40">eCommerce</a> <span class="arrow-btn" onclick="innermenu(this, 'main07')"></span>
                            <div class="hire-inner" id="main07">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-magento-developers" title="Magento">Magento</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-shopify-developers" title="Shopify">Shopify</a>
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">WooCommerce</a> 
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers">Full Stack</a> <span class="arrow-btn" onclick="innermenu(this, 'main06')"></span>
                            <div class="hire-inner" id="main06">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-mean-stack-developers" title="MEAN">MEAN</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-mern-stack-developers" title="MERN">MERN</a>
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers">Blockchain</a> <span class="arrow-btn" onclick="innermenu(this, 'main04')"></span>
                            <div class="hire-inner" id="main04">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-cryptocurrency-app-developers" title="Cryptocurrency">Cryptocurrency</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ethereum-developer" title="Ethereum">Ethereum</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ico-developers" title="ICO">ICO</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-smartcontract-developers" title="Smart Contract">Smart Contract</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-solidity-developers" title="Solidity">Solidity</a>
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers" class="margin-t-40">DevOps</a> <span class="arrow-btn" onclick="innermenu(this, 'main09')"></span>
                            <div class="hire-inner" id="main09">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-azure-developers" title="Azure">Azure</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-aws-developers" title="AWS">AWS</a>
                            </div>

                            <a href="<?php echo $site_url; ?>hire-developers/hire-machine-learning-experts" class="margin-t-40">ML</a> <span class="arrow-btn" onclick="innermenu(this, 'main08')"></span>
                            <div class="hire-inner" id="main08">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-chatbot-developers" title="Chatbot">Chatbot</a>
                                <a href="<?php echo $site_url; ?>hire-developers/dialog-flow-development-services-company" title="Dialogflow"> Dialogflow</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers" title="RPA">RPA</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-tensorflow-developers" title="Tensorflow">Tensorflow</a>
                            </div>

                            <a href="<?php echo $site_url; ?>low-code-no-code-services" class="margin-t-40">Low-Code</a> <span class="arrow-btn" onclick="innermenu(this, 'main10')"></span>
                            <div class="hire-inner" id="main10">
                                <a href="<?php echo $site_url; ?>hire-developers/hire-appian-developers" title="Appian">Appian</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-outsystems-developers" title="Outsystems">Outsystems</a>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-mendix-developers" title="Mendix">Mendix</a>
                            </div>

                        </div>
                    </li>

                    <li><a href="javascript:void(0)">Technologies</a> <span class="arrow-btn" onclick="innermenu(this, 'inner5')"></span>
                        <div class="first-inner hire-title" id="inner5">

                            <a href="javascript:void(0)" class="margin-t-40">Trending</a> <span class="arrow-btn" onclick="innermenu(this, 'techsub1')"></span>
                            <div class="hire-inner" id="techsub1">
                                <a href="<?php echo $site_url; ?>serverless-development">Serverless</a>
                                <a href="<?php echo $site_url; ?>iot-development-company">Internet of Things</a>
                                <!-- <a href="<?php echo $site_url; ?>new_page">Big Data</a> -->
                                <a href="<?php echo $site_url; ?>ai-ml-development-services-company">Machine Learning</a>
                                <a href="<?php echo $site_url; ?>blockchain-development-company">Blockchain</a>
                                <a href="<?php echo $site_url; ?>ar-vr-development-company">AR/ VR</a>
                                <a href="<?php echo $site_url; ?>ott-development">OTT</a>
                                <a href="<?php echo $site_url; ?>rpa-development-services-company">RPA</a>
                            </div>

                            <a href="javascript:void(0)" class="margin-t-40">Platforms</a> <span class="arrow-btn" onclick="innermenu(this, 'techsub2')"></span>
                            <div class="hire-inner" id="techsub2">
                                <a href="<?php echo $site_url; ?>sharepoint-application-development-services-company">SharePoint</a>
                                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Microsoft Power BI</a>
                                <!-- <a href="<?php echo $site_url; ?>new_page">Microsoft Azure</a> -->
                                <!-- <a href="<?php echo $site_url; ?>new_page">Amazon Web Services</a> -->
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">Wordpress</a>
                            </div>

                            <a href="javascript:void(0)" class="margin-t-40">Programming</a> <span class="arrow-btn" onclick="innermenu(this, 'techsub3')"></span>
                            <div class="hire-inner" id="techsub3">
                                <a href="<?php echo $site_url; ?>ios-application-development-company-india">iOS / iPhone</a>
                                <a href="<?php echo $site_url; ?>android-app-development-company-india">Andoid</a>
                                <a href="<?php echo $site_url; ?>best-react-native-development-services-company-india">React Native</a>
                                <!-- <a href="<?php echo $site_url; ?>new_page">Xamarin</a> -->
                                <a href="<?php echo $site_url; ?>aspdotnet-development-company-india">.NET</a>
                                <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india">Laravel</a>
                                <a href="<?php echo $site_url; ?>php-development-services-company">PHP</a>
                                <a href="<?php echo $site_url; ?>node-js-development-company-india">Node</a>
                                <a href="<?php echo $site_url; ?>java-web-application-development-company">Java</a>
                                <a href="<?php echo $site_url; ?>python-web-development-services-company">Python</a>
                                <a href="<?php echo $site_url; ?>top-drupal-development-services-company-india">Drupal</a>
                                <a href="<?php echo $site_url; ?>angular-js-development-company-india">Angular</a>
                                <a href="<?php echo $site_url; ?>react-js-development-services-company">React</a>
                                <a href="<?php echo $site_url; ?>flutter-app-development-company">Flutter</a>
                            </div>

                        </div>
                    </li>

                    <li><a href="javascript:void(0)">Solutions</a> <span class="arrow-btn" onclick="innermenu(this, 'inner6')"></span>
                        <div class="inner-list" id="inner6">
                            <!-- <a href="javascript:void(0)"><strong>Industries</strong></a> -->
                            <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services">Healthcare</a>
                            <a href="<?php echo $site_url; ?>industries/isv-software-development-services">ISV</a>
                            <a href="<?php echo $site_url; ?>industries/automotive-companies-software-development-services">Automative</a>
                            <a href="<?php echo $site_url; ?>fintech-software-development-company">Fintech</a>
                            <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development">Retail & eCommerce</a>
                            <a href="<?php echo $site_url; ?>industries/education-elearning-software-development">Education & Elearning</a>
                            <a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services">Travel & Tourism</a>
                            <a href="<?php echo $site_url; ?>industries/banking-financial-services">Banking & Financial Services</a>
                            <a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development">Logistic & Transportation</a>
                            <a href="<?php echo $site_url; ?>industries/media-software-development-services">Media & Entertaintainment</a>
                            <!-- <a href="javascript:void(0)"><strong>Solutions</strong></a> -->
                            <!-- <a href="<?php echo $site_url; ?>new_page">CRM</a>
                            <a href="<?php echo $site_url; ?>new_page">Marketing & Advertising</a>
                            <a href="<?php echo $site_url; ?>new_page">Human Resources</a>
                            <a href="<?php echo $site_url; ?>new_page">eLearning</a>
                            <a href="<?php echo $site_url; ?>new_page">Document Management</a>
                            <a href="<?php echo $site_url; ?>new_page">Supply Chain Management</a>
                            <a href="<?php echo $site_url; ?>new_page">Fleet Management</a>
                            <a href="<?php echo $site_url; ?>new_page">Kiosk Software</a>
                            <a href="<?php echo $site_url; ?>new_page">ERP</a>
                            <a href="<?php echo $site_url; ?>new_page">Operations Management</a>
                            <a href="<?php echo $site_url; ?>new_page"></a> -->
                            <a href="<?php echo $site_url; ?>digital-financial-management-consulting-services">Financial Management</a>
                            <!-- <a href="<?php echo $site_url; ?>ecommerce-development-services">eCommerce</a> -->
                            <!-- <a href="<?php echo $site_url; ?>new_page">Asset Management</a> -->
                            <!-- <a href="<?php echo $site_url; ?>new_page">Project Management</a> -->
                            <!-- <a href="<?php echo $site_url; ?>new_page">Data Analytics</a> -->
                            <!-- <a href="<?php echo $site_url; ?>new_page">Web Portals</a> -->
                            <!-- <a href="<?php echo $site_url; ?>new_page">CMS</a> -->
                            <a href="<?php echo $site_url; ?>workforce-management-solutions">Workforce Management</a>
                        </div>
                    </li>
                
                    <li><a href="<?php echo $site_url; ?>about">Company</a> <span class="arrow-btn" onclick="innermenu(this,'main2')"></span>
                        <div class="first-inner" id="main2">
                            <a href="<?php echo $site_url; ?>about">Overview</a>
                            <a href="https://www.valuecoders.com/case-studies/" target="_blank">Case Studies</a>
                            <a href="<?php echo $site_url; ?>in-media">In Media</a>
                            <a href="<?php echo $site_url; ?>testimonials">Clients & Testimonials</a>
                            <a href="<?php echo $site_url; ?>careers">Careers</a>
                            <a href="https://www.valuecoders.com/blog/" target="_blank">Blog</a>
                        </div>
                    </li>
                    <li><a href="<?php echo $site_url; ?>contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="menu-list second" id="dropdownmwrap">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo.png" alt="Logo" class="logo dark-theme-logo" width="301" height="52">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-blue.png" alt="Logo" class="logo day-theme-logo" width="301" height="52">
                <span class="back-btn" onclick="submenuback()">Back</span>
                <ul>
                    <li><a href="<?php echo $site_url; ?>software-development-services-company">Software Development</a> <span class="arrow-btn" onclick="innermenu(this, 'inner0')"></span>
                        <div class="first-inner service-title" id="inner0">

                            <a href="<?php echo $site_url; ?>outsource-software-product-development-services">Software Product Development</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner4')"></span>
                            <div class="inner-list service-inner" id="subInner4">
                                <a href="<?php echo $site_url; ?>mvp-app-development-company">MVP Development & Consulting</a>
                                <a href="<?php echo $site_url; ?>saas-consulting-development-services">SaaS Consulting & Development</a>
                                <a href="<?php echo $site_url; ?>startup-consulting-services-company">Startup Consulting</a>
                                <a href="<?php echo $site_url; ?>startup-product-development">Product Development for Startups</a>
                                <a href="<?php echo $site_url; ?>product-ui-ux-design">Product UI/UX Design</a>
                            </div>

                            <a href="<?php echo $site_url; ?>custom-software-development-services-company">Custom Software Development</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner1')"></span>
                            <div class="inner-list service-inner" id="subInner1">
                                <a href="<?php echo $site_url; ?>enterprise-software-development-services">Enterprise Software Development</a> 
                                <a href="<?php echo $site_url; ?>nearshore-software-development-services">NearShore Software Development</a>
                            </div>

                            <a href="<?php echo $site_url; ?>software-outsourcing-services-company">Software Outsourcing services</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner3')"></span>
                            <div class="inner-list service-inner" id="subInner3">
                                <a href="<?php echo $site_url; ?>dedicated-development-teams">Dedicated Development Teams</a>
                                <a href="<?php echo $site_url; ?>it-staff-augmentation-services">Staff Augmentation Services</a>
                                <a href="<?php echo $site_url; ?>offshore-software-development-services-company">Offshore Software Development</a>
                                <a href="<?php echo $site_url; ?>offshore-software-development-center-india">Offshore Development Center (ODC)</a>
                                <a href="<?php echo $site_url; ?>white-label-services">White-Label Development Services</a>
                                <a href="<?php echo $site_url; ?>how-it-works">How It Works</a>
                                <a href="<?php echo $site_url; ?>faq">FAQs</a>
                            </div>

                            <a href="<?php echo $site_url; ?>it-strategy-consulting-firms">IT Consulting</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner2')"></span>
                            <div class="inner-list service-inner" id="subInner2">
                                <a href="<?php echo $site_url; ?>software-consulting">Software Consulting</a>
                                <!-- <a href="<?php echo $site_url; ?>new_page">Agile Consulting</a>
                                <a href="<?php echo $site_url; ?>new_page">CRM Consulting</a>
                                <a href="<?php echo $site_url; ?>new_page">Data Analytics Consulting</a> -->
                            </div>

                            <a href="<?php echo $site_url; ?>digital-transformation-services">Digital Transformation</a>
                            <!-- <div class="inner-list service-inner" id="subInner5">
                                <a href="<?php echo $site_url; ?>new_page">Consulting</a>
                            </div> -->
                            
                        </div>

                    </li>

                    <li><a href="<?php echo $site_url; ?>application-development">Application Development</a> <span class="arrow-btn" onclick="innermenu(this, 'inner1')"></span>
                        <div class="first-inner service-title" id="inner1">
                            <a href="<?php echo $site_url; ?>mobile-application-development">Mobile App Development</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner10')"></span>
                            <div class="inner-list service-inner" id="subInner10">
                                <a href="<?php echo $site_url; ?>cross-platform-app-development-services">Cross Platform App Development</a>
                                <a href="<?php echo $site_url; ?>flutter-app-development-company">Flutter App Development</a>
                                <a href="<?php echo $site_url; ?>ios-application-development-company-india">iOS / iPhone App Development</a>
                                <a href="<?php echo $site_url; ?>android-app-development-company-india">Andoid App Development</a>
                                <a href="<?php echo $site_url; ?>best-react-native-development-services-company-india">React Native App Development</a>
                                <a href="<?php echo $site_url; ?>best-xamarin-development-services-company-india">Xamarin App Development</a>
                            </div>

                            <a href="<?php echo $site_url; ?>web-application-development">Web App Development</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner14')"></span>
                            <div class="inner-list service-inner" id="subInner14">
                                <a href="<?php echo $site_url; ?>top-website-development-company">Website & Portal Development</a>
                            </div>

                            <a href="<?php echo $site_url; ?>cloud-application-development-services">Cloud Application Development</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner15')"></span>
                            <div class="inner-list service-inner" id="subInner15">
                                <a href="<?php echo $site_url; ?>serverless-development">Serverless</a>
                            </div>

                            <a href="<?php echo $site_url; ?>backend-development-services">Backend Development Services</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner13')"></span>
                            <div class="inner-list service-inner" id="subInner13">
                                <a href="<?php echo $site_url; ?>aspdotnet-development-company-india">.NET Development Services</a>
                                <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india">Laravel Development Services</a>
                                <a href="<?php echo $site_url; ?>php-development-services-company">PHP Development Services</a>
                                <a href="<?php echo $site_url; ?>node-js-development-company-india">Node Development Services</a>
                                <a href="<?php echo $site_url; ?>java-web-application-development-company">Java Development Services</a>
                                <a href="<?php echo $site_url; ?>python-web-development-services-company">Python Development Services</a>
                                <a href="<?php echo $site_url; ?>sharepoint-application-development-services-company">SharePoint Development Services</a>
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">Wordpress Development Services</a>
                                <a href="<?php echo $site_url; ?>top-drupal-development-services-company-india">Drupal Development Services</a>
                                <a href="<?php echo $site_url; ?>api-development-services">API Development Services</a>
                            </div>

                            <a href="<?php echo $site_url; ?>frontend-development-services">Frontend Development Services</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner11')"></span>
                            <div class="inner-list service-inner" id="subInner11">
                                <a href="<?php echo $site_url; ?>angular-js-development-company-india">Angular Development Services</a>
                                <a href="<?php echo $site_url; ?>react-js-development-services-company">React Development Services</a>
                                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Power BI Development Services</a>
                            </div>

                            <a href="javascript:void(0)">Full Stack Development</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner12')"></span>
                            <div class="inner-list service-inner" id="subInner12">
                                <a href="<?php echo $site_url; ?>top-mean-stack-development-services-company-india">MEAN Stack Development Services</a>
                                <a href="<?php echo $site_url; ?>top-mern-stack-development-services-company-india">MERN Stack Development Services</a>
                            </div>

                            <!-- list titles -->
                            <a href="<?php echo $site_url; ?>application-maintenance">Application Maintainance & Support</a>
                            <a href="<?php echo $site_url; ?>application-modernization">Application Modernization</a>
							<a href="<?php echo $site_url; ?>ott-development" class="title">OTT App Development Services</a>

                        </div>
                    </li>

                    <li><a href="<?php echo $site_url; ?>software-quality-assurance-testing-services">QA & Testing</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner21')"></span>
                        <div class="first-inner service-title" id="subInner21">
                            <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services">Services</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner21a')"></span>
                            <div class="inner-list service-inner" id="subInner21a">
                                <a href="<?php echo $site_url; ?>qa-consulting-services">QA Consulting</a>
                                <a href="<?php echo $site_url; ?>application-testing-services">Application Testing</a>
                                <a href="<?php echo $site_url; ?>mobile-app-testing-services">Mobile App Testing</a>
                                <a href="<?php echo $site_url; ?>web-application-testing-services">Web App Testing</a>
                                <a href="<?php echo $site_url; ?>qa-outsourcing-services">QA Outsourcing</a>
                                <a href="<?php echo $site_url; ?>software-testing-teams">Testing Teams</a>
                                <a href="<?php echo $site_url; ?>hire-developers/software-qa-testers-india">Hire Software QA</a>
                            </div>

                            <a href="javascript:void(0)">Solutions</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner21b')"></span>
                            <div class="inner-list service-inner" id="subInner21b">
                                <a href="<?php echo $site_url; ?>functional-software-testing">Functional Testing</a>
                                <a href="<?php echo $site_url; ?>usability-software-testing">Usability Testing</a>
                                <a href="<?php echo $site_url; ?>software-performance-testing">Performance Testing</a>
                                <a href="<?php echo $site_url; ?>software-testing-automation">Automated Testing</a>
                            </div>

                        </div>
                    </li>

                    <li><a href="<?php echo $site_url; ?>ecommerce-development-services">eCommerce</a> <span class="arrow-btn" onclick="innermenu(this, 'inner2')"></span>
                        <div class="first-inner service-title" id="inner2">
                            <a href="<?php echo $site_url; ?>ecommerce-development-services">Services</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner25')"></span>
                            <div class="inner-list service-inner" id="subInner25">
                                <a href="<?php echo $site_url; ?>ecommerce-consulting-services">eCommerce Consulting</a>
                                <!-- <a href="<?php echo $site_url; ?>ecommerce-implementation">eCommerce Implementation</a> -->
                                <a href="<?php echo $site_url; ?>digital-consulting-services">Digital Consulting</a>
                                <a href="<?php echo $site_url; ?>ecommerce-web-design">eCommerce Web Design</a>
                            </div>

                            <a href="javascript:void(0)">Technologies</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner25a')"></span>
                            <div class="inner-list service-inner" id="subInner25a">
                                <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india">Magento</a>
                                <a href="<?php echo $site_url; ?>shopify-development-services">Shopify</a>
                                <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india">WooCommerce</a> 
                            </div>

                            <a href="javascript:void(0)">Solutions</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner25b')"></span>
                            <div class="inner-list service-inner" id="subInner25b">
                                <a href="<?php echo $site_url; ?>b2c-ecommerce">B2C eCommerce</a>
                                <a href="<?php echo $site_url; ?>b2b-ecommerce">B2B eCommerce</a>
                                <a href="<?php echo $site_url; ?>ecommerce-web-portal">Web Portal</a>
                                <a href="<?php echo $site_url; ?>supply-chain-automation">Supply Chain Automation</a>
                            </div>

                        </div>
                    </li>

                    <li><a href="javascript:void(0)">Analytics & DevOps</a> <span class="arrow-btn" onclick="innermenu(this, 'inner3')"></span>
                        <div class="first-inner service-title" id="inner3">
                            <a href="<?php echo $site_url; ?>business-intelligence-consulting-services">Dashboards & Analytics</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner40')"></span>
                            <div class="inner-list service-inner" id="subInner40">
                                <!-- <a href="<?php echo $site_url; ?>big-data-application-development-services-company">Data Analytics Consulting & Management</a> -->
                                <a href="<?php echo $site_url; ?>big-data-application-development-services-company">Big Data Consulting & Management</a>
                                <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company">Microsoft Power BI</a>
                            </div>
                            <a href="<?php echo $site_url; ?>devops-consulting-engineering-services-company">DevOps</a> <span class="arrow-btn" onclick="innermenu(this, 'subInner41')"></span>
                            <div class="inner-list service-inner" id="subInner41">
                                <a href="<?php echo $site_url; ?>devops-consulting-engineering-services-company">DevOps Consulting</a>
                                <a href="<?php echo $site_url; ?>amazon-aws-partner-company-india">Amazon AWS</a>
                                <a href="<?php echo $site_url; ?>microsoft-azure-partner-company-india">Azure</a>
                            </div>
                            <!-- <a href="<?php echo $site_url; ?>ecommerce-development-services">eCommerce Development Services</a> -->
                            <!-- <div class="inner-list service-inner" id="subInner24">
                                <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india">Magento</a>
                                <a href="<?php echo $site_url; ?>shopify-development-services">Shopify</a>
                            </div> -->

                            <!-- <a href="<?php echo $site_url; ?>ott-development">OTT App Development Services</a> -->

                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <?php endif; ?>
    </div>
</header>
<?php //endif; ?>