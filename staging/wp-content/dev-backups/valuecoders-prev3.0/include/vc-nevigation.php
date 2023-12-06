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
            <?php if( !isset( $_GET['l'] ) ) : 
            if( !is_page_template( 'page-templates/template-contact.php' ) ) :
            ?>
            <div class="header-item-center">
                <nav class="menu" id="menu">
                    <ul>
                        <li class="menu-item-has-children">
                            <a href="<?php echo $site_url; ?>outsource-software-development-services">Services</a>
                            <div class="menu-mega">
                                <div class="container">
                                    <div class="dis-flex" id="active_Current_Tabs1">
                                        <div class="width-25 left-list">
                                            <a href="#" class="text-column active" id="a1" data-section="active_Current_Tabs1" data-mrow="1">Smart Teams</a>
                                            <a href="#" class="text-column" id="a2" data-section="active_Current_Tabs1" 
                                            data-mrow="2">Engineering Services</a>
                                            <a href="#" class="text-column" id="a3" data-section="active_Current_Tabs1" 
                                            data-mrow="3">Smart Automation</a>
                                            <a href="#" class="text-column" id="a4" data-section="active_Current_Tabs1" 
                                            data-mrow="4">Technology Advisory</a>
                                            <!-- <a href="#" class="text-column" id="a5" data-section="active_Current_Tabs1" 
                                            data-mrow="5">Industries</a> -->
                                        </div>

                                        <!-- 1 -->
                                        <div class="width-75 header-menu active" id="b1">
                                            <div class="dis-flex" id="active_Current_Tabs2">
                                                <div class="width-40 middle-list">
                                                    <a href="#" class="text-column active title" id="a20" data-section="active_Current_Tabs2"></a>
                                                    <a href="<?php echo $site_url; ?>dedicated-development-teams" class="text-column" id="a21" data-section="active_Current_Tabs2">Dedicated Software Teams</a>
                                                    <a href="<?php echo $site_url; ?>it-staff-augmentation-services" class="text-column" id="a22" data-section="active_Current_Tabs2">IT Staff Augmentation</a>
                                                    <a href="<?php echo $site_url; ?>offshore-software-development-center-india" class="text-column" id="a23" data-section="active_Current_Tabs2">Offshore Development Center (ODC)</a>
                                                    <a href="<?php echo $site_url; ?>how-it-works" class="text-column" id="a25" data-section="active_Current_Tabs2">How it Works</a>
                                                    <a href="<?php echo $site_url; ?>why-india" class="text-column" id="a26" data-section="active_Current_Tabs2">Why India</a>
                                                    <a href="<?php echo $site_url; ?>benefits-of-hiring-remote-developers" class="text-column" id="a27" data-section="active_Current_Tabs2">Hiring Locally</a>
                                                    <!-- <a href="#" class="text-column" id="a28" data-section="active_Current_Tabs2">Rate Card</a> -->
                                                    <a href="<?php echo $site_url; ?>faq" class="text-column" id="a29" data-section="active_Current_Tabs2">FAQs</a>
                                                </div>
                                                <div class="width-60 last-list">
                                                    <div class="header-menu active mrow mrow-1" id="b20">
                                                        <p><strong>What are Smart Teams?</strong>
                                                            ValueCoders’ dedicated software development teams provide extended team support for your projects on-site, off-site or offshore with complete control over your project. You can create teams of Front-end Engineers, Back-end Engineers, QA Engineers, UX / UI Designers, DevOps Engineers, Business Analysts, and Project Managers.</p>
                                                    </div>
                                                    <div class="header-menu" id="b21">
                                                        <p><strong>Onshore & Offshore Dedicated Software Teams </strong>
                                                        Build scalable, secure, and robust software solutions with our experienced, skilled, reliable, & professional software development teams.</p>
                                                    </div>
                                                    <div class="header-menu" id="b22">
                                                        <p><strong>IT Staff Augmentation Services In India</strong>
                                                        We bridge the gap between demand and supply for skilled development teams through an innovative and best-in-class recruiting model backed by a dedicated client-centric software development team.</p>
                                                    </div>
                                                    <div class="header-menu" id="b23">
                                                        <p><strong>Dedicated Offshore Development Center In India</strong>
                                                        Ramp up your software development and scale up quickly. With 17+ years of expertise in the software industry.</p>
                                                    </div>
                                                    <div class="header-menu" id="b25">
                                                        <p><strong>How Does It work?</strong>
                                                        ValueCoders was founded in 2004 with the goal of providing the highest quality software services available on the market today.</p>
                                                    </div>
                                                    <div class="header-menu" id="b26">
                                                        <p><strong>Why Outsource Software Development Services in India</strong>
                                                        India has always been a preferred destination for businesses across the globe to outsource their software projects. Here are some recent stats related to software outsourcing in India:</p>
                                                    </div>
                                                    <div class="header-menu" id="b27">
                                                        <p><strong>Facing The Talent Crunch?</strong>
                                                        A recent study shows that 69% of global companies report a talent crunch and difficulty in hiring.</p>
                                                    </div>
                                                    <!-- <div class="header-menu" id="b28">
                                                        <p><strong>Rate Card</strong>
                                                        ValueCoders is a reputed IT company based in India with an impressive track record of success.</p>
                                                    </div> -->
                                                    <div class="header-menu" id="b29">
                                                        <p><strong>Frequently Asked Questions</strong>
                                                        Build scalable, secure, and robust software solutions with our experienced, skilled, reliable, & professional software development teams.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 2 -->
                                        <div class="width-75 header-menu" id="b2">
                                            <div class="dis-flex" id="active_Current_Tabs3">
                                                <div class="width-40 middle-list">
                                                    <a href="#" class="text-column active title" id="a50" data-section="active_Current_Tabs3"></a>
                                                    <a href="<?php echo $site_url; ?>it-strategy-consulting-firms" class="text-column" id="a51" data-section="active_Current_Tabs3">Technology Consulting</a>
                                                    <a href="<?php echo $site_url; ?>custom-software-development-services-company" class="text-column" id="a52" data-section="active_Current_Tabs3">Software Development</a>
                                                    <a href="<?php echo $site_url; ?>outsource-software-product-development-services" class="text-column" id="a53" data-section="active_Current_Tabs3">Product Engineering</a>
                                                    <a href="<?php echo $site_url; ?>application-development" class="text-column" id="a54" data-section="active_Current_Tabs3">App Development</a>
                                                    <a href="<?php echo $site_url; ?>web-application-development" class="text-column" id="a55" data-section="active_Current_Tabs3">Web Development</a>
                                                    <a href="<?php echo $site_url; ?>mobile-application-development" class="text-column" id="a56" data-section="active_Current_Tabs3">Mobile App Development</a>
                                                    <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services-company" class="text-column" id="a57" data-section="active_Current_Tabs3">QA & Testing</a>
                                                    <a href="<?php echo $site_url; ?>devops-consulting-engineering-services-company" class="text-column" id="a58" data-section="active_Current_Tabs3">DevOps</a>
                                                    <a href="<?php echo $site_url; ?>application-maintenance" class="text-column" id="a59" data-section="active_Current_Tabs3">Support & Maintenance</a>
                                                    <a href="<?php echo $site_url; ?>application-modernization" class="text-column" id="a60" data-section="active_Current_Tabs3">Application Modernization</a>
                                                    <a href="<?php echo $site_url; ?>white-label-services" class="text-column" id="a61" data-section="active_Current_Tabs3">Whitelabel Solutions</a>
                                                </div>
                                                <div class="width-60 last-list">
                                                    <div class="header-menu active mrow mrow-2" id="b50">
                                                        <p><strong>What are Engineering Services?</strong>
                                                        We provide end-to-end product engineering services. From initial consulting to final delivery and deployment & after sales support, we cover all aspects of software engineering services. We have an expert team of app planners, programmers, and designers offering innovative features alongside high-quality service.</p> 
                                                    </div>
                                                    <div class="header-menu" id="b51">
                                                        <p><strong>Information Technology Consulting company In India</strong>
                                                        Looking for a reliable IT Technology consulting company? Harness our software consulting across key business domains to automate workflows, refine customer service, and increase overall productivity.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b52">
                                                        <p><strong>Custom Software Development Company In India</strong>
                                                        We build enterprise-grade custom software solutions that enable businesses to unlock innovation and leverage digital transformation.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b53">
                                                        <p><strong>Software Product Development Company In India</strong>
                                                        We transform your ideas into market-ready software products, taking scalability, robustness, and customizability into account.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b54">
                                                        <p><strong>Top Application Development Company In India</strong>
                                                        ValueCoders is a leading custom application development company with 17+ years of experience, offering end-to-end custom application development services.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b55">
                                                        <p><strong>Custom Web Development Company In India</strong>
                                                        ValueCoders is India's top-rated custom web app development company with over 17+ years of experience building world-class B2B & B2C applications. 
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b56">
                                                        <p><strong>Custom Mobile Application Development Company</strong>
                                                        ValueCoders, an enterprise mobile application development company with 17+ years of experience, provides full-stack mobile application development services.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b57">
                                                        <p><strong>Best Software QA & Testing Services Company In India</strong>
                                                        We are a top-rated software quality assurance & testing company leveraging our potential to profound expertise in delivering quality tested applications to businesses. 
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b58">
                                                        <p><strong>DevOps Consulting & Engineering Services In India</strong>
                                                        Our DevOps as a service offering leverages collaboration, monitoring, tool-chain pipelines, automation, and cloud adoption to achieve higher efficiency, faster time to market, and better quality of software builds.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b59">
                                                        <p><strong>Software Application Maintenance Services Company</strong>
                                                        The increasing complexities of applications have led us to opt for automated software maintenance methods, regular bug tracking, and on-demand support options.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b60">
                                                        <p><strong>Application Modernization & Migration Services In India</strong>
                                                        ValueCoders is a leading application migration & modernization services company providing app transformations as per global standards, newer technologies & latest trends.</p>
                                                    </div>
                                                    <div class="header-menu" id="b61">
                                                        <p><strong>Whitelabel Solutions</strong>
                                                        We aim at leveraging our expertise for providing white label services to our clients worldwide. We believe in 100% transparency and build high-quality B2B and B2C software engineering and consulting services with honesty and integrity.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 3 -->
                                        <div class="width-75 header-menu" id="b3">
                                            <div class="dis-flex" id="active_Current_Tabs4">
                                                <div class="width-40 middle-list">
                                                    <a href="#" class="text-column active title" id="a80" data-section="active_Current_Tabs4"></a>
                                                    <a href="<?php echo $site_url; ?>digital-transformation-development-services" class="text-column" id="a81" data-section="active_Current_Tabs4">Digital Transformation</a>
                                                    <a href="<?php echo $site_url; ?>ecommerce-development-services-company" class="text-column" id="a82" data-section="active_Current_Tabs4">Digital Commerce</a>
                                                    <a href="<?php echo $site_url; ?>blockchain-development-company" class="text-column" id="a83" data-section="active_Current_Tabs4">BlockChain</a>
                                                    <a href="<?php echo $site_url; ?>chatbot-development-company" class="text-column" id="a84" data-section="active_Current_Tabs4">Chatbots</a>
                                                    <a href="<?php echo $site_url; ?>iot-development-company" class="text-column" id="a85" data-section="active_Current_Tabs4">Internet of Things</a>
                                                    <a href="<?php echo $site_url; ?>ai-ml-development-services-company" class="text-column" id="a86" data-section="active_Current_Tabs4">Machine Learning</a>
                                                    <a href="<?php echo $site_url; ?>business-intelligence-consulting-services" class="text-column" id="a87" data-section="active_Current_Tabs4">Dashboards & Analytics</a>
                                                    <a href="<?php echo $site_url; ?>rpa-development-services-company" class="text-column" id="a88" data-section="active_Current_Tabs4">RPA</a>
                                                    <a href="<?php echo $site_url; ?>ar-vr-development-company" class="text-column" id="a89" data-section="active_Current_Tabs4">AR & VR</a>
                                                </div>
                                                <div class="width-60 last-list">
                                                    <div class="header-menu active mrow mrow-3" id="b80">
                                                        <p><strong>What is Smart Automation?</strong>
                                                            Smart automation, sometimes also called cognitive automation, is the use of automation technologies – artificial intelligence (AI), IoT, business process management (BPM), and robotic process automation (RPA) – to streamline and scale decision-making across organizations.</p>
                                                    </div>
                                                    <div class="header-menu" id="b81">
                                                        <p><strong>Digital Transformation</strong>
                                                        The emergence of digital technologies has transformed the way people think. Now is the time to bring your business to the digital forefront by outsourcing digital transformation services to ValueCoders. We offer you to hire digital transformation consultants from us who help you fulfill all your requirements whether you’re looking to build a new app or improve the existing setup.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b82">
                                                        <p><strong>Digital Commerce</strong>
                                                        Build an interactive, robust, and user-friendly e-commerce store for your retail business. Sell products worldwide and increase revenue up to 10 times with your e-commerce marketplace. Our dedicated team of eCommerce experts supports businesses to build customer-centric eStores and enhance user experience with the help of advanced technologies, advanced features, and their years of domain experience.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b83">
                                                        <p><strong>BlockChain</strong>
                                                        We build high-quality & scalable decentralized applications that ensure security for large-scale enterprises, agencies, and startups. Our team holds expertise in building Blockchain solutions such as Smart Contracts, Crypto wallets, Mining software, ICO initialization, etc. Our team has hands-on experience in creating hundreds of blockchain solutions for clients across the globe.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b84">
                                                        <p><strong>Chatbots</strong>
                                                        We build interactive & customized chatbots which are AI-powered & Machine Learning coded. You can hire Chatbot developers from us on an hourly or full-time (dedicated monthly) basis. Our remote chatbot developers with 5+ years of average experience build bots with knowledge of presentation, conversational & self-learning abilities, personality traits, and context-sensitivity.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b85">
                                                        <p><strong>Internet Of Things</strong>
                                                        We build smart solutions that can connect your smartphones with remote devices. As an offshore IoT application development company, we provide on-time and comprehensive Internet-of-things solutions at affordable prices. We build next-generation IoT apps that bring value to your business with improved efficiency, accuracy, and reduced software development costs.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b86">
                                                        <p><strong>Machine Learning</strong>
                                                        Accelerate your digital transformation with our AI development services like media workflow automation, computer vision systems, video processing tools, and more. Our AI & ML team builds world-class AI solutions for startups, agencies, & enterprises catering to different industry verticals, like healthcare, Adtech, eCommerce, etc.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b87">
                                                        <p><strong>Dashboards & Analytics</strong>
                                                        As part of our business intelligence consulting services, we help businesses bridge data gaps, gain unprecedented insight into operations, and facilitate imperative data-driven workflows by developing BI strategies, designs, and optimizing BI architectures. Enhance business performance, accelerate decision-making, minimize risks, and effective cost optimization with our advanced dashboard & analytics solutions.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b88">
                                                        <p><strong>RPA</strong>
                                                        Do you want to build a Robotic Process Automation (RPA) system but don’t know where to start? Look no further! ValueCoders has the best RPA developers in India. Harness the power of Robotic Process Automation in your business to reduce workload, streamline repetitive processes and optimize resource utilization.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b89">
                                                        <p><strong>AR & VR</strong>
                                                        Build smart AR/VR solutions that can enhance the experience of smartphone users. We have years of experience in building AR/VR applications, and our AR/VR experts develop versatile AR/VR solutions at an affordable price while optimizing time. We build next-generation virtual and augmented reality apps to bring value to your business with improved efficiency and accuracy.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 4 -->
                                        <div class="width-75 header-menu" id="b4">
                                            <div class="dis-flex" id="active_Current_Tabs5">
                                                <div class="width-40 middle-list">
                                                    <a href="#" class="text-column active title" id="a100" data-section="active_Current_Tabs5"></a>

                                                    <div class="dis-flex">
                                                        <div class="flex-2">
                                                            <a href="<?php echo $site_url; ?>aspdotnet-development-company-india" class="text-column" id="a101" data-section="active_Current_Tabs5">.NET</a>
                                                            <a href="<?php echo $site_url; ?>angular-js-development-company-india" class="text-column" id="a102" data-section="active_Current_Tabs5">Angular</a>
                                                            <a href="<?php echo $site_url; ?>flutter-app-development-company" class="text-column" id="a103" data-section="active_Current_Tabs5">Flutter</a>
                                                            <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india" class="text-column" id="a104" data-section="active_Current_Tabs5">Laravel</a>
                                                            <a href="<?php echo $site_url; ?>ios-application-development-company-india" class="text-column" id="a105" data-section="active_Current_Tabs5">iOS</a>
                                                            <a href="<?php echo $site_url; ?>php-development-services-company" class="text-column" id="a106" data-section="active_Current_Tabs5">PHP</a>
                                                            <a href="<?php echo $site_url; ?>react-js-development-services-company" class="text-column" id="a107" data-section="active_Current_Tabs5">React</a>
                                                            <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india" class="text-column" id="a108" data-section="active_Current_Tabs5">WordPress</a>
                                                        </div>
                                                        <div class="flex-2">
                                                            <a href="<?php echo $site_url; ?>android-app-development-company-india" class="text-column" id="a109" data-section="active_Current_Tabs5">Android</a>
                                                            <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" class="text-column" id="a110" data-section="active_Current_Tabs5">Drupal</a>
                                                            <a href="<?php echo $site_url; ?>java-web-application-development-company" class="text-column" id="a111" data-section="active_Current_Tabs5">Java</a>
                                                            <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india" class="text-column" id="a112" data-section="active_Current_Tabs5">Magento</a>
                                                            <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company" class="text-column" id="a113" data-section="active_Current_Tabs5">Power BI</a>
                                                            <a href="<?php echo $site_url; ?>python-web-development-services-company" class="text-column" id="a114" data-section="active_Current_Tabs5">Python</a>
                                                            <a href="<?php echo $site_url; ?>best-react-native-development-services-company-india" class="text-column" id="a115" data-section="active_Current_Tabs5">React Native</a>
                                                            <a href="<?php echo $site_url; ?>ott-development" class="text-column" id="a116" data-section="active_Current_Tabs5">OTT</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="width-60 last-list">
                                                    <div class="header-menu active mrow mrow-4" id="b100">
                                                        <p><strong>What is Technology Advisory?</strong>
                                                            Technology consultants from ValueCoders can help business clients accelerate growth, cut costs, mitigate risk, attract and develop talent, and streamline important processes. Our Technology Strategy & Advisory practice helps architect and realize exceptional business value from technology.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b101">
                                                        <p><strong>ASP.NET Development Services Company India</strong>
                                                        With a team of certified and experienced 650+ developers, techies, and thinkers, we offer optimum .NET web development solutions to start-ups, entrepreneurs, and enterprises.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b102">
                                                        <p><strong>Angular Development Services Company India</strong>
                                                        We offer secure, scalable, feature-rich, and customised angular development solutions to start-ups, enterprises, and entrepreneurs that enhance functionalities of their web apps and enrich user experience.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b103">
                                                        <p><strong>Flutter App Development Services Company</strong>
                                                        ValueCoders is a leading Flutter app development company that helps enterprises and start-ups to streamline their business with next-gen mobile applications deploying Google’s revolutionary framework.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b104">
                                                        <p><strong>Laravel Development Services Company India</strong>
                                                        ValueCoders is a leading Laravel development company with 17+ years of experience and expertise in building scalable, secure & feature-rich web or CMS applications.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b105">
                                                        <p><strong>iPhone App Development Services Company</strong>
                                                        ValueCoders is a top-notch iOS app development company in India that offers iPhone app development services to emerging enterprises, businesses, and start-ups.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b106">
                                                        <p><strong>Custom PHP Development Services Company India</strong>
                                                        ValueCoders is a leading PHP development company that focuses on building robust, secure & scalable web applications for start-ups, enterprises, and entrepreneurs.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b107">
                                                        <p><strong>React Development Services Company</strong>
                                                        ValueCoders is a top-notch react development company that offers best-in-class web and mobile applications (Android and iOS) development services to start-ups, enterprises, and entrepreneurs at an affordable price.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b108">
                                                        <p><strong>Top WordPress Development Services Company India</strong>
                                                        We are a leading WordPress web development company that focuses on yielding high quality, feature-rich, secure and robust web solutions for startups, SMEs, and large enterprises.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b109">
                                                        <p><strong>Android Application Development Services Company India</strong>
                                                        With 17+ years of experience, ValueCoders offers offshore Android app development services to start-ups and enterprises to build customised and superior-quality native Android applications.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b110">
                                                        <p><strong>Hire Best Drupal Developers in India</strong>
                                                        Want to hire top and cost-effective Drupal developers? We offer dedicated Drupal developers who are experienced in Drupal CMS development,
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b111">
                                                        <p><strong>Java Web Application Development Company India</strong>
                                                        ValueCoders is India's top-rated custom Java web development company with over 17 years of experience building world-class B2B & B2C applications.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b112">
                                                        <p><strong>Magento eCommerce Development Services Company</strong>
                                                        ValueCoders is a leading Magento eCommerce development company in India who offers technology-driven and customized Magento eCommerce development services,
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b113">
                                                        <p><strong>Microsoft Power BI development company</strong>
                                                        As a Microsoft BI development company, we aim at transforming businesses’ critical data into rich visuals and interactive dashboards.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b114">
                                                        <p><strong>Python Development Services Company India</strong>
                                                        ValueCoders is a leading Python web development company that helps start-ups, SMEs, and enterprises bolster profit by offering intuitive, secure, and scalable Python-based applications.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b115">
                                                        <p><strong>React Native App Development Company India</strong>
                                                        ValueCoders is a top-notch React Native development company in India that builds stunning mobile applications that work smoothly on iOS, Windows, and Android platforms.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b116">
                                                        <p><strong>OTT App Development Services Company</strong>
                                                        We provide a full suite of services to help you manage, deliver, and monetize your OTT content by providing an omnichannel experience to your viewers across different streaming media devices.
                                                        </p>
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
                                    <div class="dis-flex" id="active_Current_Tabs1">

                                        <!-- hire tech -->
                                        <div class="width-100 header-menu active" id="b0">
                                            <div class="dis-flex last-list" id="active_Current_Tabs0">
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-backend-developers"><strong>Backend</strong></a>
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
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers"><strong>Frontend</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-angularjs-developers" title="Angular">Angular</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-html-developers" title="HTML/CSS">HTML/CSS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-power-bi-developer-consultants" title="PowerBI">PowerBI</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-reactjs-developers" title="React">React</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-vuejs-developers" title="Vue.JS">Vue.JS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers" class="margin-t-40"><strong>CMS</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal">Drupal</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-kentico-developers" title="kentico">Kentico</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-sitecore-developers" title="Sitecore">Sitecore</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-sitefinity-developers" title="Sitefinity">Sitefinity</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-umbraco-developers" title="Umbraco">Umbraco</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-wordpress-developers" title="Wordpress">Wordpress</a>
                                                </div>
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mobile-app-developers"><strong>Mobile</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-android-developers" title="Android">Android</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-flutter-developers" title="Flutter">Flutter</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ionic-developers" title="Ionic">Ionic</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ios-developers" title="IOS">iOS</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-kotlin-developers" title="Kotlin">Kotlin</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-react-native-developers" title="React Native">React Native</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-swift-developers" title="Swift">Swift</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-xamarin-developers" title="Xamarin">Xamarin</a>

                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers" class="margin-t-40"><strong>E-commerce</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-magento-developers" title="Magento">Magento</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-shopify-developers" title="Shopify">Shopify</a>

                                                </div>
                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers"><strong>Full Stack</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mean-stack-developers" title="MEAN">MEAN</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mern-stack-developers" title="MERN">MERN</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers" class="margin-t-40"><strong>Blockchain</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-cryptocurrency-app-developers" title="Cryptocurrency">Cryptocurrency</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ethereum-developer" title="Ethereum">Ethereum</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ico-developers" title="ICO">ICO</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-smartcontract-developers" title="Smart Contract">Smart Contract</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-solidity-developers" title="Solidity">Solidity</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers" class="margin-t-40"><strong>DevOps</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-azure-developers" title="Azure">Azure</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-aws-developers" title="AWS">AWS</a>

                                                </div>

                                                <div class="width-20 last-list">
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-machine-learning-experts"><strong>ML</strong></a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-chatbot-developers" title="Chatbot">Chatbot</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/dialog-flow-development-services-company" title="Dialogflow"> Dialogflow</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers" title="RPA">RPA</a>
                                                    <a href="<?php echo $site_url; ?>hire-developers/hire-tensorflow-developers" title="Tensorflow">Tensorflow</a>
                                                    <a href="<?php echo $site_url; ?>low-code-no-code-services" class="margin-t-40"><strong>Low-Code</strong></a>
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

                        <!-- Industries -->
                        <li class="menu-item-has-children">
                            <a href="#">Industries</a>
                            <div class="menu-mega">
                                <div class="container">
                                    <div class="dis-flex" id="active_Current_Tabs1">

                                        <div class="width-100 header-menu active">
                                            <div class="dis-flex" id="active_Current_Tabs6">
                                                <div class="width-40 middle-list">
                                                    <a href="#" class="text-column active title" id="a150" data-section="active_Current_Tabs6"></a>
                                                    <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services" class="text-column" id="a151" data-section="active_Current_Tabs6">Healthcare</a>
                                                    <a href="<?php echo $site_url; ?>industries/isv-software-development-services" class="text-column" id="a152" data-section="active_Current_Tabs6">ISVs & Software Product Companies</a>
                                                    <a href="<?php echo $site_url; ?>industries/automotive-companies-software-development-services" class="text-column" id="a153" data-section="active_Current_Tabs6">Automotive</a>
                                                    <a href="<?php echo $site_url; ?>fintech-software-development-company" class="text-column" id="a154" data-section="active_Current_Tabs6">Fintech</a>
                                                    <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development" class="text-column" id="a155" data-section="active_Current_Tabs6">Retail & eCommerce</a>
                                                    <a href="<?php echo $site_url; ?>industries/education-elearning-software-development" class="text-column" id="a156" data-section="active_Current_Tabs6">Education & E-Learning</a>
                                                    <a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services" class="text-column" id="a157" data-section="active_Current_Tabs6">Travel</a>
                                                    <a href="<?php echo $site_url; ?>industries/banking-financial-services" class="text-column" id="a158" data-section="active_Current_Tabs6">Banking & Finance</a>
                                                    <a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development" class="text-column" id="a159" data-section="active_Current_Tabs6">Logistics & Transportation</a>
                                                    <a href="<?php echo $site_url; ?>industries/media-software-development-services" class="text-column" id="a160" data-section="active_Current_Tabs6">Media & Entertainment</a>
                                                    <a href="<?php echo $site_url; ?>industries/agencies-software-development-services" class="text-column" id="a161" data-section="active_Current_Tabs6">Digital Agency</a>
                                                </div>
                                                <div class="width-60 last-list">
                                                    <div class="header-menu active mrow mrow-5" id="b150">
                                                        <p><strong>Why Custom Software Solutions for Industries?</strong>
                                                    Every industry needs specific software solutions customized as per their unique challenges and needs. ValueCoders, having 17+ years experience and deep expertise in delivering custom software solutions catering to the specific requirements, gets you industry specific developers having in-depth knowledge of industry laws and guidelines.</p>
                                                    </div>
                                                    <div class="header-menu" id="b151">
                                                        <p><strong>Healthcare</strong>
                                                        Transit to digital healthcare and achieve better outcomes with our digitally smart healthcare solutions. We leverage the web, mobile, and medical devices to enable the next-gen quality of healthcare software solutions.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b152">
                                                        <p><strong>ISVs & Software Product Companies</strong>
                                                        We help businesses & ISVs (Independent Software Vendors) create successful software by delivering full-cycle end-to-end application development services that are tailored for small, medium-sized, or enterprise-grade organizations.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b153">
                                                        <p><strong>Automotive</strong>
                                                        We offer innovative, customized, reliable, and technology-driven solutions to its clients across the globe. We deliver result-driven automotive software development services tailored to your business requirements.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b154">
                                                        <p><strong>Fintech</strong>
                                                        We aim at leveraging our expertise to build FinTech app solutions such as payment gateways, digital wallets, banking portals, Robo advisors, and more. With 17+ years of experience, 650+ development team, and being the top FinTech software development company, we ensure to boost data security and optimize ROI for our clients.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b155">
                                                        <p><strong>Retail & ECommerce</strong>
                                                        Our retail & eCommerce development team builds next-gen, feature-rich, and scalable eCommerce solutions to empower B2B & B2C businesses effectively reach customers and improve sales numbers.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b156">
                                                        <p><strong>Education & E-Learning</strong>
                                                        We have expertise in building custom and platform-based LMS for end-to-end education process support for both educators and learners. We also provide easy-to-use education mobile apps, omnichannel consumption, eLearning portals, and multi-level analytics tools.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b157">
                                                        <p><strong>Travel</strong>
                                                        We are a top-notch travel application development company in India that offers technology-driven mobility solutions to enrich your tour and travel business. We understand the terms of the travel & tourism industry and give you a real-time traveling experience like never before.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b158">
                                                        <p><strong>Banking & Finance</strong>
                                                        A leading banking & financial software development company in India, ValueCoders offers result-oriented solutions to businesses that increase their agility, cost leadership, and operational efficiency.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b159">
                                                        <p><strong>Logistics & Transportation</strong>
                                                        ValueCoders is a leading logistics & transportation software development company in India. We offer the best logistic solutions, such as cloud computing, route analyzing & location tracking software to both start-ups and large enterprises.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b160">
                                                        <p><strong>Media & Entertainment</strong>
                                                        We have a team of 650+ dedicated developers who are capable of crafting software solutions, such as media apps, OTT apps, digital SCM, ERP/CRM, and entertainment apps to cater to your business needs.
                                                        </p>
                                                    </div>
                                                    <div class="header-menu" id="b161">
                                                        <p><strong>Digital Agency</strong>
                                                        We provide best-in-domain design, development, and marketing solutions to agencies all over the globe. From initial conceptualization to final delivery and marketing, we provide end-to-end solutions. As a result, any agency, no matter small or large, can use our services to ensure the success of their business.
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- <li class="menu-item-has-children small-menu"><a href="#">Pricing</a>
                            <div class="small-menu-inner">
                                <a href="#">Smart Teams</a>
                                <a href="#">Per Project</a>
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
            <?php 
            endif;
                endif; ?>
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

        <?php if( !isset( $_GET['l'] ) ) : 
            if( !is_page_template( 'page-templates/template-contact.php' ) ) : ?>
        <nav class="mob-nav">
            <div class="menu-list first" id="dropdownmwrap1">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo.png" alt="Logo" class="logo dark-theme-logo" width="301" 
                height="52">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-blue.png" alt="Logo" class="logo day-theme-logo" width="301" height="52">
                <ul>
                    <li><a href="<?php echo $site_url; ?>outsource-software-development-services">Services</a> <span class="arrow-btn" onclick="submenu()"></span></li>
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
                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-front-end-developers">Frontend</a> <span class="arrow-btn" onclick="innermenu(this, 'main02')"></span>

                                <div class="hire-inner" id="main02">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-angularjs-developers" title="Angular">Angular</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-html-developers" title="HTML/CSS">HTML/CSS</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-power-bi-developer-consultants" title="PowerBI">PowerBI</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-reactjs-developers" title="React">React</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-vuejs-developers" title="Vue.JS">Vue.JS</a>
                                </div>
                            </div>

                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-cms-developers" class="margin-t-40">CMS</a> <span class="arrow-btn" onclick="innermenu(this, 'main05')"></span>
                                <div class="hire-inner" id="main05">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal">Drupal</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-kentico-developers" title="kentico">Kentico</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-sitecore-developers" title="Sitecore">Sitecore</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-sitefinity-developers" title="Sitefinity">Sitefinity</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-umbraco-developers" title="Umbraco">Umbraco</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-wordpress-developers" title="Wordpress">Wordpress</a>
                                </div>
                            </div>
                            <div>
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
                            </div>
                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-full-stack-developers">Full Stack</a> <span class="arrow-btn" onclick="innermenu(this, 'main06')"></span>
                                <div class="hire-inner" id="main06">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mean-stack-developers" title="MEAN">MEAN</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mern-stack-developers" title="MERN">MERN</a>
                                </div>
                            </div>
                            
                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-blockchain-developers">Blockchain</a> <span class="arrow-btn" onclick="innermenu(this, 'main04')"></span>
                                <div class="hire-inner" id="main04">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-cryptocurrency-app-developers" title="Cryptocurrency">Cryptocurrency</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ethereum-developer" title="Ethereum">Ethereum</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-ico-developers" title="ICO">ICO</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-smartcontract-developers" title="Smart Contract">Smart Contract</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-solidity-developers" title="Solidity">Solidity</a>
                                </div>
                            </div>
                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-ecommerce-developers" class="margin-t-40">E-commerce</a> <span class="arrow-btn" onclick="innermenu(this, 'main07')"></span>
                                <div class="hire-inner" id="main07">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-magento-developers" title="Magento">Magento</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-shopify-developers" title="Shopify">Shopify</a>
                                </div>
                            </div>
                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-machine-learning-experts" class="margin-t-40">ML</a> <span class="arrow-btn" onclick="innermenu(this, 'main08')"></span>
                                <div class="hire-inner" id="main08">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-chatbot-developers" title="Chatbot">Chatbot</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/dialog-flow-development-services-company" title="Dialogflow"> Dialogflow</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-rpa-developers" title="RPA">RPA</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-tensorflow-developers" title="Tensorflow">Tensorflow</a>
                                </div>
                            </div>
                            <div>
                                <a href="<?php echo $site_url; ?>hire-developers/hire-devops-developers" class="margin-t-40">DevOps</a> <span class="arrow-btn" onclick="innermenu(this, 'main09')"></span>
                                <div class="hire-inner" id="main09">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-azure-developers" title="Azure">Azure</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-aws-developers" title="AWS">AWS</a>
                                </div>
                            </div>
                            <div>
                                <a href="<?php echo $site_url; ?>low-code-no-code-services" class="margin-t-40">Low-Code</a> <span class="arrow-btn" onclick="innermenu(this, 'main10')"></span>
                                <div class="hire-inner" id="main10">
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-appian-developers" title="Appian">Appian</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-outsystems-developers" title="Outsystems">Outsystems</a>
                                    <a href="<?php echo $site_url; ?>hire-developers/hire-mendix-developers" title="Mendix">Mendix</a>
                                </div>
                            </div>

                        </div>  
                    </li>
                    
                    <li><a href="#">Industries</a> <span class="arrow-btn" onclick="innermenu(this, 'inner5')"></span>
                        <div class="inner-list" id="inner5">
                            <a href="<?php echo $site_url; ?>industries/healthcare-software-development-services">Healthcare</a>
                            <a href="<?php echo $site_url; ?>industries/isv-software-development-services">ISVs &amp; Software Product Companies</a>
                            <a href="<?php echo $site_url; ?>industries/automotive-companies-software-development-services">Automotive</a>
                            <a href="<?php echo $site_url; ?>fintech-software-development-company">Fintech</a>
                            <a href="<?php echo $site_url; ?>industries/retail-ecommerce-software-development">Retail &amp; eCommerce</a>
                            <a href="<?php echo $site_url; ?>industries/education-elearning-software-development">Education &amp; E-Learning</a>
                            <a href="<?php echo $site_url; ?>industries/travel-tourism-software-development-services">Travel</a>
                            <a href="<?php echo $site_url; ?>industries/banking-financial-services">Banking &amp; Finance</a>
                            <a href="<?php echo $site_url; ?>industries/logistics-transportation-software-development">Logistics &amp; Transportation</a>
                            <a href="<?php echo $site_url; ?>industries/media-software-development-services">Media &amp; Entertainment</a>
                            <a href="<?php echo $site_url; ?>industries/agencies-software-development-services">Digital Agency</a>

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
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo.png" alt="Logo" class="logo dark-theme-logo" width="301" 
                height="52">
                <img loading="lazy" src="<?php echo $tpl_url; ?>/images/logo-blue.png" alt="Logo" class="logo day-theme-logo" width="301" height="52">
                <span class="back-btn" onclick="submenuback()">Back</span>
                <ul>
                    <li><a href="#">Smart Teams</a> <span class="arrow-btn" onclick="innermenu(this, 'inner1')"></span>
                        <div class="inner-list" id="inner1">
                            <a href="<?php echo $site_url; ?>dedicated-development-teams">Dedicated Software Teams</a>
                            <a href="<?php echo $site_url; ?>it-staff-augmentation-services">IT Staff Augmentation</a>
                            <a href="<?php echo $site_url; ?>offshore-software-development-center-india">Offshore Development Center (ODC)</a>
                            <a href="<?php echo $site_url; ?>hire-developers">Hire Software Developers</a>
                            <a href="<?php echo $site_url; ?>how-it-works">How it Works</a>
                            <a href="<?php echo $site_url; ?>why-india">Why India</a>
                            <a href="<?php echo $site_url; ?>benefits-of-hiring-remote-developers">Hiring Locally</a>
                            <!--<a href="#">Rate Card</a> -->
                            <a href="<?php echo $site_url; ?>faq">FAQs</a>
                        </div>          
                    </li>
                    <li><a href="#">Engineering Services</a> <span class="arrow-btn" onclick="innermenu(this, 'inner2')"></span>
                        <div class="inner-list" id="inner2">
                            <a href="<?php echo $site_url; ?>it-strategy-consulting-firms" title="It Strategy Consulting Firms">Technology Consulting</a>
                            <a href="<?php echo $site_url; ?>custom-software-development-services-company" title="Software Services">Software Development</a>
                            <a href="<?php echo $site_url; ?>outsource-software-product-development-services" title="Product Engineering">Product Engineering</a>
                            <a href="<?php echo $site_url; ?>application-development" title="App Development">App Development</a>
                            <a href="<?php echo $site_url; ?>web-application-development" title="Web Application">Web Development</a>
                            <a href="<?php echo $site_url; ?>mobile-application-development" title="Mobile App">Mobile App Development</a>
                            <a href="<?php echo $site_url; ?>software-quality-assurance-testing-services-company" title="QA & Testing">QA & Testing</a>
                            <a href="<?php echo $site_url; ?>devops-consulting-engineering-services-company" title="DevOps">DevOps</a>
                            <a href="<?php echo $site_url; ?>application-maintenance" title="Support & Maintenance">Support & Maintenance</a>
                            <a href="<?php echo $site_url; ?>application-modernization" title="Application Modernization">Application Modernization</a>
                            <a href="<?php echo $site_url; ?>white-label-services" title="Whitelabel Solutions">Whitelabel Solutions</a>
                        </div>
                    </li>
                    <li><a href="#">Smart Automation</a> <span class="arrow-btn" onclick="innermenu(this, 'inner3')"></span>
                        <div class="inner-list" id="inner3">
                            <a href="<?php echo $site_url; ?>digital-transformation-development-services" title="Digital Transformation">Digital Transformation</a>
                            <a href="<?php echo $site_url; ?>ecommerce-development-services-company" title="eCommerce Development">Digital Commerce</a>
                            <a href="<?php echo $site_url; ?>blockchain-development-company" title="BlockChain">BlockChain</a>
                            <a href="<?php echo $site_url; ?>chatbot-development-company" title="Chatbot">Chatbots</a>
                            <a href="<?php echo $site_url; ?>iot-development-company" title="IoT">Internet of Things</a>
                            <a href="<?php echo $site_url; ?>ai-ml-development-services-company" title="AI/ML">Machine Learning</a>
                            <a href="<?php echo $site_url; ?>business-intelligence-consulting-services" title="Dashboards & Analytics">Dashboards & Analytics</a>
                            <a href="<?php echo $site_url; ?>rpa-development-services-company" title="RPA">RPA</a>
                            <a href="<?php echo $site_url; ?>ar-vr-development-company" title="AR & VR">AR & VR</a>
                        </div>
                    </li>
                    <li><a href="#">Technology Advisory</a> <span class="arrow-btn" onclick="innermenu(this, 'inner4')"></span>
                        <div class="inner-list" id="inner4">
                            <a href="<?php echo $site_url; ?>aspdotnet-development-company-india" title=".NET">.NET</a>
                            <a href="<?php echo $site_url; ?>android-app-development-company-india" title="Android">Android</a>
                            <a href="<?php echo $site_url; ?>angular-js-development-company-india" title="Angular">Angular</a>
                            <a href="<?php echo $site_url; ?>hire-developers/hire-drupal-developers" title="Drupal">Drupal</a>
                            <a href="<?php echo $site_url; ?>flutter-app-development-company" title="Flutter">Flutter</a>
                            <a href="<?php echo $site_url; ?>java-web-application-development-company" title="Java">Java</a>
                            <a href="<?php echo $site_url; ?>top-laravel-development-services-company-india" title="Laravel">Laravel</a>
                            <a href="<?php echo $site_url; ?>best-magento-ecommerce-development-services-company-india" title="Magento">Magento</a>
                            <a href="<?php echo $site_url; ?>ios-application-development-company-india" title="IOS">iOS</a>
                            <a href="<?php echo $site_url; ?>microsoft-power-bi-development-services-company" title="PowerBI">PowerBI</a>
                            <a href="<?php echo $site_url; ?>php-development-services-company" title="PHP">PHP</a>
                            <a href="<?php echo $site_url; ?>python-web-development-services-company" title="Python">Python</a>
                            <a href="<?php echo $site_url; ?>react-js-development-services-company" title="React">React</a>
                            <a href="<?php echo $site_url; ?>best-react-native-development-services-company-india" title="React Native">React Native</a>
                            <a href="<?php echo $site_url; ?>top-wordpress-development-services-company-india" title="WordPress">WordPress</a>
                            <a href="<?php echo $site_url; ?>ott-development" title="OTT">OTT</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <?php 
        endif;
        endif; ?>
    </div>
</header>