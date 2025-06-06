<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if( ($_SERVER['REQUEST_METHOD'] == 'GET') && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ){
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die("HEY BOAT.. Go Away");
}

require 'countries-array.php';
require 'vc-config.php';
require 'vc-mailto.php';

$is_staging = ( isset( $_SERVER['PHP_SELF'] ) && (strpos( $_SERVER['PHP_SELF'], 'staging' ) !== false) )  ?  true : false;
$ajxData    = json_decode(file_get_contents("php://input"), true);
//$isAjay     = ( isset( $ajxData['_doing_ajax'] ) && ($ajxData['_doing_ajax'] === true) ) ? true : false;
$isAjay     = false;

$thisUrl = "https://www.valuecoders.com/";
if( $is_staging ){
$thisUrl   = 'https://www.valuecoders.com/staging/';
}
define( 'SITE_ROOT_URL', $thisUrl );


$spamIpAddr = ['141.95.234.1', '89.22.225.45','94.156.64.107'];
$thisIPAddr = get_client_ip_user();
if( in_array($thisIPAddr, $spamIpAddr) ){
    header('location:thanks');
    die;
}

if( validateSpamAttacker( $_POST['user-email'], $thisIPAddr ) === false ){
    header( 'location:thanks?spam-attacker=block' );
    die;
}

function logSpamException( $arrPostParams, $note = '' ){ 
    $user_name      = nbHasData($arrPostParams, 'user-name');
    $user_email     = nbHasData($arrPostParams, 'user-email');
    $user_phone     = nbHasData($arrPostParams, 'user-phone');
    $requirement    = nbHasData($arrPostParams, 'user-req');
    $user_country   = nbHasData($arrPostParams, 'user-country');
    

    $pageRefererURL = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : "";        
    $ip_addr        = get_client_ip_user();

    $Mailbody = "";
    $bodyBr    = "<br>";
    $Mailbody .= "=================================".$bodyBr;
    $Mailbody .= "Name : ".$user_name.$bodyBr;
    $Mailbody .= "Email : ".$user_email.$bodyBr;
    $Mailbody .= "Contact No. : ".$user_phone.$bodyBr;
    $Mailbody .= "Country : ".$user_country.$bodyBr;
    $Mailbody .= "Requirements: ".$requirement.$bodyBr;
    $Mailbody .= "Referer URL : ".$pageRefererURL.$bodyBr;
    $Mailbody .= "IP Address : ".$ip_addr.$bodyBr;

    $uploaded_files_names = nbHasData($arrPostParams, 'Uploadedfilename');
    if( $uploaded_files_names != "") {
        $arrFileNameArr = explode(',', $uploaded_files_names,-1);
    }else{
        $arrFileNameArr = array();
    }

    if (count($arrFileNameArr) > 0) {
        $uploaded_file_path = "";
        foreach ($arrFileNameArr as $fileKey => $fileValue) {            
            $Mailbody .= 'Uploaded File : ' . SITE_ROOT_URL . 'uploads/' . $fileValue . $bodyBr;
        }
    }   

    /*Conditional Fields */
    if( isset($arrPostParams['we-help']) && !empty($arrPostParams['we-help']) ){
        $Mailbody .= "How can we help? ".$arrPostParams['we-help'].$bodyBr;
        $zohoDescription .= "How can we help? --".$arrPostParams['we-help'].$varDeliminator;
        if( $arrPostParams['we-help'] == "Team Extension" ){
            if( isset($arrPostParams['count-resources']) && !empty($arrPostParams['count-resources']) ){
            $Mailbody .= "How many engineers would you like to add? ".$arrPostParams['count-resources'].$bodyBr;
            $zohoDescription .= "How many engineers would you like to add -- ".$arrPostParams['count-resources'].$varDeliminator;
            }
            if( isset($arrPostParams['howlong']) && !empty($arrPostParams['howlong']) ){
            $Mailbody .= "For how long will you need these engineers? ".$arrPostParams['howlong'].$bodyBr;    
            $zohoDescription .= "For how long will you need these engineers --  ".$arrPostParams['howlong'].$varDeliminator;
            }        
        }
    }

    if( isset($arrPostParams['expected-date']) && !empty( $arrPostParams['expected-date'] ) ){
        if( $arrPostParams['expected-date'] == "Specify a date" ){
            if( isset($arrPostParams['expected-month']) && !empty($arrPostParams['expected-month']) ){
            $Mailbody .= "What is the expected start date? ".$arrPostParams['expected-month'].$bodyBr;
            $zohoDescription .= "What is the expected start date -- ".$arrPostParams['expected-month'].$varDeliminator;
            }
        }else{
            $Mailbody .= "What is the expected start date? ".$arrPostParams['expected-date'].$bodyBr;        
            $zohoDescription .= "What is the expected start date -- ".$arrPostParams['expected-date'].$varDeliminator;
        }
    }

    if( isset( $_POST['nda'] ) ){
        $Mailbody .= "NDA Requested:  Yes".$bodyBr;
    }else{
        $Mailbody .= "NDA Requested:  No".$bodyBr;    
    }

    if( !empty( $note ) ){
        $Mailbody .= "Error Note : ".$note;
    }
    
    
    //Live
    smtpEmailFunction( "web@vinove.com", "Inquiry with ValueCoders - Spam Exception", $Mailbody, "lead", 
    $user_email, [], [], [], $user_name );
    
    //Test
    /*smtpEmailFunction("nitin.baluni@mail.vinove.com", "Inquiry with ValueCoders - Spam Exception", $Mailbody, "lead", 
    $user_email, [], [], [], $user_name);*/
}

if( $isAjay === false ){ 
    //$array_ifields = ['user-name', 'user-email', 'user-country', 'user-phone'];
    $array_ifields = ['user-name', 'user-email', 'user-country'];
    foreach( $array_ifields as $field ){
        if( !isset( $_POST[$field] ) || empty( $_POST[$field] )  ){
            header('location:thanks');
            die;
        }
    }
}

if( isset( $_SERVER['HTTP_REFERER'] ) && strpos($_SERVER['HTTP_REFERER'], "sendmail1.php") !== false ){ 
    header('location:thanks');
    die;
}

function vcvalidateinput( $value, $isEmail = false, $lenght = -1 ){
    $slenght = strlen( $value );
    if( ($slenght > $lenght) && ($lenght != -1) ){
        return false;
    }

    if( !isset( $value ) || empty( $value ) ){
        return false;
    }elseif( $isEmail === true ){
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            return false;
        }else{
            return true;
        }
    }else{
        return true;
    }
}

function vcGetName($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
    return array($first_name, $last_name);
}

if( $isAjay === false ){
    if( vcvalidateinput( $_POST['user-name'], false, 50 ) === false ){ 
        header('location:thanks');
        die;
    }
}

$arrEmail = array('parvesh@vinove.com', 'akhil@valuecoders.com');
$deny_ips = array( '146.185.253.167', '146.185.253.165' );

$spamEmailManual = ['MerinoBart@o2.pl', 'ericjonesmyemail@gmail.com'];
$spamNameManual = ['CrytoPenPen'];

if( isset( $_POST['user-email'] ) && in_array($_POST['user-email'], $spamEmailManual) ){
    header( 'location:thanks.php' );
    die;
}

if( isset( $_POST['user-name'] ) && in_array($_POST['user-name'], $spamNameManual) ){
    header( 'location:thanks.php' );
    die;
}



if( $isAjay === false ){
$captcha = (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) ? $_POST['g-recaptcha-response'] : 
false;
    if( $captcha !== false ){
        $isSmap = validatereCaptchaResponse( $captcha, $_POST );
        if( $isSmap === false ){
            header('location:thanks?recaptcha-spam=true');
            die;
        }
    }else{
        temp_logSpamEmails( $_POST );
        header('location:thanks?check=recaptcha-missing');
        die;
    }
}

$ip = get_client_ip_user();
if( (array_search($ip, $deny_ips))!== FALSE ) {
    die("locked IP");
}

if( !isset($_SERVER['HTTP_REFERER']) || empty($_SERVER['HTTP_REFERER']) ){
    
    $psData = "<pre>POST Data:\n".print_r($_POST, true)."</pre>";
    $psData .= "<pre>SERVER Data:\n".print_r($_SERVER, true)."</pre>";
    smtpEmailFunction( "nitin.baluni@mail.vinove.com", "ValueCoders Form Script : Dev", $psData, "lead",  
    $_POST['user-email'], [], [], [], $_POST['user-name'] );

    logSpamException( $_POST, "Empty Or Not Set HTTP_REFERER" );
    header('location:thanks?empty-referer=true');
    die;
}


function getSpamEmailsListings( $jsonFile ){
    if( !file_exists( $jsonFile ) ){
        return [];
    }
    $data = file_get_contents($jsonFile);
    $data = json_decode($data, true);
    return $data;
}

ob_start();
session_start();
if( isset( $_SESSION["queryString"] ) && !empty( $_SESSION["queryString"] ) ){ 
    $varRefererURL = $_SESSION["queryString"];     //$_SERVER[HTTP_REFERER];
}else{
    $varRefererURL = $_SERVER['HTTP_REFERER'];
}

function checkSpamEmail($email) {
    $emailDomain = explode(".",$email);
    $arrSpamEmailList = array("ru");
    if(in_array(end($emailDomain),$arrSpamEmailList)) {
        return true;
    } else {
        return false;
    }
}
$uploaded_files_names = $_POST['Uploadedfilename'];

if( $isAjay === true ){
    if( isset($_SERVER['SERVER_NAME']) && ($_SERVER['SERVER_NAME'] == "localhost") ){
        //echo json_encode( array( 'success' => true ) ); die;
    }

    $captcha = (isset($ajxData['grecaptcha']) && !empty($ajxData['grecaptcha'])) ? $ajxData['grecaptcha'] : false;
    if( $captcha !== false ){
        $isSmap = validatereCaptchaResponse( $captcha, $ajxData );
        if( $isSmap === false ){
            echo json_encode( 
                array( 
                    'success' => false, 
                    'data' => $ajxData, 
                    'thank_url' => 'https://www.valuecoders.com/thanks?spam=true' 
                ) 
            );
        }
    }

    $user_country   = $ajxData['country'];
    $varIPAdd       = get_client_ip_user();    
    if( isset($_SESSION["queryString"]) && !empty($_SESSION["queryString"]) ){
        parse_str($_SESSION["queryString"], $arrQueryString);    
    }else{
        if( isset($_POST['frmqueryString']) && !empty( $_POST['frmqueryString'] ) ){
        parse_str( $_POST['frmqueryString'], $arrQueryString );    
        }
    }
    $utm_source = "";
    
    $utm_source = $arrQueryString['utm_source'];
    if($arrQueryString['utm_source'] == '') {
        $arrQueryString['utm_source'] = $arrQueryString['amp;xForwordFor'];
        $utm_source = $arrQueryString['utm_source'];
    }
    $utm_source = str_replace("&", "@", $utm_source);
    $varRefererURL = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : "";

    if(strstr($arrQueryString['utm_source'],"adwords")/* || $arrQueryString['gclid']!=""*/)  {
        $lead_source = "Advertisement: Adwords";
    } else if(strstr($arrQueryString['utm_source'],"gglads"))  {
        $lead_source = "Advertisement: Google";
    } else if(strstr($arrQueryString['utm_source'],"social"))  {
        $lead_source = "Social Media: Organic";
    } else{
        $lead_source = "Website";
    }

    $partName   = vcGetName( $ajxData['name'] );
    $firstn     = $partName[0];
    $lastn      = ( !empty($partName[1]) ) ? $partName[1] : 'N/A';

    $Mailbody = "";
    $bodyBr = "<br>";
    $Mailbody .= "=========================".$bodyBr;
    $Mailbody .= "Name: ".$ajxData['name'].$bodyBr;
    $Mailbody .= "Email: ".$ajxData['email'].$bodyBr;
    $Mailbody .= "Phone: ".$ajxData['phone'].$bodyBr;
    $Mailbody .= "Country: ".$user_country.$bodyBr;
    $Mailbody .= "How Can We Help?: ".$ajxData['how_can'].$bodyBr;
    $Mailbody .= "IP Address: ".$varIPAdd.$bodyBr;
    
    //Looking For Job login No CRM No Email
    if( isset($ajxData['how_can']) && ($ajxData['how_can'] == "career") ){
    echo json_encode( array('success' => true, 'lead_id' => 0, 'is_job' => true ) );
    die;
    } 
    
    $eSender = splEmailData( $user_country );
    $ajxTicketID   = generateTicketID();
    if( isset( $eSender['mail_to'] ) ){
    smtpEmailFunction( $eSender['mail_to'], "Inquiry with ValueCoders [".$ajxTicketID."]", $Mailbody, "lead", 
    $ajxData['email'], [], ["parvesh@vinove.com", "nitin.baluni@mail.vinove.com"], [], $ajxData['name'] );
    }

    $leadReq = "How Can We Help : ".$ajxData['how_can'];
    if( isset( $ajxData['lead_id'] ) && ($ajxData['lead_id'] != 0) ){
    echo json_encode(
        array( 
            'success' => true, 
            'mail_data' => $Mailbody, 
            'lead_id' => $ajxData['lead_id'], 
            'ticket_id' => $ajxTicketID 
        ) 
    );
    die;
    }

    $arrZoho_v2 = array(
    'Email' => $ajxData['email'],
    'First Name' => $firstn,
    'Last Name' => $lastn,
    'Phone' => $ajxData['phone'],
    'Country' => $user_country,
    'Lead Status' => 'Not Contacted Yet',
    'Lead Source' => $lead_source,
    'UTM Source' => $utm_source,
    'Property' => 'ValueCoders',
    'IP Address' => $varIPAdd,
    'Description' => $leadReq,
    'URL' => "",
    'File Uploaded' => "",
    'Requirements' => $leadReq,
    'refurl' => $varRefererURL
    );
    //$eSender = splEmailData( $user_country );
    $lead_id = zohoCrmUpdate_v2( $arrZoho_v2, $utm_source, $eSender['lead_to'], false );
    echo json_encode( 
        array( 
        'success' => true, 
        'mail_data' => $Mailbody, 
        'zoho_data' => $arrZoho_v2, 
        'lead_id' => $lead_id,
        'ticket_id' => $ajxTicketID
        ) 
    );
    
    /*
    if( $mailSent === true ){
    }else{
    echo json_encode( array( 'success' => false, 'mail_data' => $Mailbody, 
    'thank_url' => 'https://www.valuecoders.com/thanks?email-error=true' ) );
    }
    */
    die;
}else{
    if( isset( $_POST['vform-type'] ) && $_POST['vform-type'] == "contact" ){
       if( !isset( $_POST['we-help'] ) || empty( $_POST['we-help'] ) ){
            smtpEmailFunction(
            "nitin.baluni@mail.vinove.com", 
            "Inquiry with ValueCoders - spam", print_r($_POST, true), "lead", $_POST['user-email'], [], [], [], 
            $_POST['user-name'], false  
            );
            header('location:thanks');
            die;
       } 
    }
    sendmail_function($_POST,$uploaded_files_names);    
}


function sendmail_function($arrPostParams, $uploaded_files_names_param){
    global $arrEmail;
    $ticketID = (isset($arrPostParams['e-ticket-id']) && !empty($arrPostParams['e-ticket-id'])) ? $arrPostParams['e-ticket-id'] :  generateTicketID();

    /*$isContact = (isset($arrPostParams['vform-type']) && ($arrPostParams['vform-type'] == "contact")) ? true : false;*/
    $isContact      = false;
    $vcUserCountry  = ($isContact === true) ? vcGetCountryByCode( $arrPostParams['user-country'] ) : 
    $arrPostParams['user-country'];
    $hasPext        = (isset($arrPostParams['user-extension']) && !empty($arrPostParams['user-extension'])) ? " (".$arrPostParams['user-extension'].")" :  "";

    $phoneCode = (isset($arrPostParams['cprefix']) && !empty($arrPostParams['cprefix'])) ? $arrPostParams['cprefix'] : '';

    $autoEmailBody = 'Greetings! <br><br>
    Thank you for contacting us here at ValueCoders.<br><br>
    This auto-reply is just to let you know that we have received your email and will get back to you with a (human) response as soon as possible.<br><br>
    If you have any additional information that you think will help us to assist you, please feel free to reply to this email.<br><br>
    We look forward to chatting soon!<br><br>
    Regards<br>
    ValueCoders Team';
     if(!empty($arrPostParams['user-name'])){
        $user_name = $arrPostParams['user-name'];
    }else{
        header('location:contact.php');
        exit;
    }

    //$user_name = $arrPostParams['user-name'];
    $user_email     = $arrPostParams['user-email'];
    //$user_phone     = $phoneCode.$arrPostParams['user-phone'].$hasPext;
    $user_phone     = $arrPostParams['user-phone'];
    $zoho_user_phone = $arrPostParams['user-phone'];
    $user_country   = $vcUserCountry;
    $requirement    = $arrPostParams['user-req'];
    $uploaded_files_names = $uploaded_files_names_param;
    $page_url       = $arrPostParams['page_url'];
    
    $ip_addr = get_client_ip_user();
    //parse_str($_SESSION["queryString"], $arrQueryString);
    
    if( isset($_SESSION["queryString"]) && !empty($_SESSION["queryString"]) ){
        parse_str($_SESSION["queryString"], $arrQueryString);    
    }else{
        if( isset($_POST['frmqueryString']) && !empty( $_POST['frmqueryString'] ) ){
        parse_str( $_POST['frmqueryString'], $arrQueryString );    
        }
    }
    $utm_source = "";
    
    $utm_source = $arrQueryString['utm_source'];
    if($arrQueryString['utm_source'] == '') {
        $arrQueryString['utm_source'] = $arrQueryString['amp;xForwordFor'];
        $utm_source = $arrQueryString['utm_source'];
    }
    $utm_source = str_replace("&", "@", $utm_source);

    $uploaded_file_path = "Not Uploaded";

    
    //$varConMailTo = ADMIN_EMAIL;
    
    $pageRefererURL = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : "";
    
    if($mailSubject){
        $subject  =$mailSubject;
    }else{
        //$subject = 'Get in touch with our experts';
        $subject = "Inquiry with ValueCoders";
    }
    $body = "";
    $varDeliminator = "\n";
    $body = "";
    $body .= "=========================".$varDeliminator;
    $body .= "Name: ".$user_name.$varDeliminator;
    $body .= "Email: ".$user_email.$varDeliminator;
    $body .= "Phone: ".$user_phone.$varDeliminator;
    $body .= "Country: ".$user_country.$varDeliminator;
    if( $isContact === true ){
    //$body .= "Company: ".$arrPostParams['user-company'].$varDeliminator;    
    }
    // if($allocated_budget != ''){
    // $body .= "Allocated Budget :".$allocated_budget.$varDeliminator;
    // }
    $body .= "IP Address: ".$ip_addr.$varDeliminator;
    $body .= "Requirements: ".$requirement.$varDeliminator;
    $body .= "Referer URL: ".$pageRefererURL.$varDeliminator;

    $Mailbody = "";
    $bodyBr = "<br>";
    $Mailbody .= "=========================".$bodyBr;
    $Mailbody .= "Name: ".$user_name.$bodyBr;
    $Mailbody .= "Email: ".$user_email.$bodyBr;
    $Mailbody .= "Phone: ".$user_phone.$bodyBr;
    $Mailbody .= "Country: ".$user_country.$bodyBr;
    if( $isContact === true ){
    //$Mailbody .= "Company: ".$arrPostParams['user-company'].$bodyBr;    
    }
    
    $zohoDescription    = 'Other Requirements --'.$varDeliminator;
    /*Conditional Fields */
    if( isset($arrPostParams['we-help']) && !empty($arrPostParams['we-help']) ){
        $Mailbody .= "How can we help? ".$arrPostParams['we-help'].$bodyBr;
        $zohoDescription .= "How can we help? --".$arrPostParams['we-help'].$varDeliminator;
        if( $arrPostParams['we-help'] == "Team Extension" ){
            if( isset($arrPostParams['count-resources']) && !empty($arrPostParams['count-resources']) ){
            $Mailbody .= "How many engineers would you like to add? ".$arrPostParams['count-resources'].$bodyBr;
            $zohoDescription .= "How many engineers would you like to add -- ".$arrPostParams['count-resources'].$varDeliminator;
            }
            if( isset($arrPostParams['howlong']) && !empty($arrPostParams['howlong']) ){
            $Mailbody .= "For how long will you need these engineers? ".$arrPostParams['howlong'].$bodyBr;    
            $zohoDescription .= "For how long will you need these engineers --  ".$arrPostParams['howlong'].$varDeliminator;
            }        
        }
    }

    if( isset($arrPostParams['expected-date']) && !empty( $arrPostParams['expected-date'] ) ){
        if( $arrPostParams['expected-date'] == "Specify a date" ){
            if( isset($arrPostParams['expected-month']) && !empty($arrPostParams['expected-month']) ){
            $Mailbody .= "What is the expected start date? ".$arrPostParams['expected-month'].$bodyBr;
            $zohoDescription .= "What is the expected start date -- ".$arrPostParams['expected-month'].$varDeliminator;
            }
        }else{
            $Mailbody .= "What is the expected start date? ".$arrPostParams['expected-date'].$bodyBr;        
            $zohoDescription .= "What is the expected start date -- ".$arrPostParams['expected-date'].$varDeliminator;
        }
    }
    if( isset( $_POST['nda'] ) ){
    $Mailbody .= "NDA Requested:  Yes".$bodyBr;
    }else{
    $Mailbody .= "NDA Requested:  No".$bodyBr;    
    }
    
    if( isset( $_POST['career-int'] ) && !empty($_POST['career-int']) ){
    $Mailbody .= "Position of Interest: ".$_POST['career-int'].$bodyBr;    
    }

    $Mailbody .= "Requirements : ".$requirement.$bodyBr;
    $Mailbody .= "Referer URL : ".$pageRefererURL.$bodyBr;
    $Mailbody .= "IP Address : ".$ip_addr.$bodyBr;
    
    if ($uploaded_files_names != "") {

        $arrFileNameArr = explode(',', $uploaded_files_names,-1);

    } else {
        $arrFileNameArr = array();
    }


    if (count($arrFileNameArr) > 0) {
        $uploaded_file_path = "";
        foreach ($arrFileNameArr as $fileKey => $fileValue) {
            if(strstr($fileValue,".com")) {
                $body.='Custom URL:' . $fileValue. $varDeliminator;
                $Mailbody.='Custom URL:' . $fileValue. $bodyBr;
            } else {
                $body .= 'Uploaded File : ' . SITE_ROOT_URL . 'uploads/' . $fileValue . $varDeliminator;
                $Mailbody .= 'Uploaded File : ' . SITE_ROOT_URL . 'uploads/' . $fileValue . $bodyBr;
                $uploaded_file_path .= SITE_ROOT_URL . 'uploads/' . $fileValue . '   ';
            }
        } //end foreach loop
    }

    $body .= "=========================".$varDeliminator;
    $Mailbody .= "=========================".$bodyBr;

    $headers = "MIME-Version: 1.0";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From: " . $_POST["user-email"] . " <" . $_POST["user-email"] . ">" . "\r\n";
    $headers .= "Reply-To: " . $_POST["user-email"] . "\r\n";
    //$headers .= "BCC: parvesh@vinove.com\r\n";
    for($i=0;$i<count($arrEmail);$i++){
        $headers .= "BCC: $arrEmail[$i]\r\n";
    }
    // $body = nl2br($body);    

    if(strstr($arrQueryString['utm_source'],"adwords")/* || $arrQueryString['gclid']!=""*/)  {
        $lead_source = "Advertisement: Adwords";
    } else if(strstr($arrQueryString['utm_source'],"gglads"))  {
        $lead_source = "Advertisement: Google";
    } else if(strstr($arrQueryString['utm_source'],"social"))  {
        $lead_source = "Social Media: Organic";
    } else{
        $lead_source = "Website";
    }

    $getUTM_source = (isset($_COOKIE['utm_source']) && !empty($_COOKIE['utm_source'])) ? $_COOKIE['utm_source'] : '';
    $getUTM_medium = (isset($_COOKIE['utm_medium']) && !empty($_COOKIE['utm_medium'])) ? $_COOKIE['utm_medium'] : '';

    /*
    gglads =  Advertisement: Google
    bingads =  Advertisement: Bing
    facebookpaid = Advertisement: FaceBook
    quorapaid = Advertisement: Quora
    linkedinads  = Advertisement: LinkedIN
    adroll  = Advertisement: Adroll
    */
    $inSource = "";
    if( $getUTM_source == "gglads" ){
        $inSource = "Advertisement: Google";
    }elseif( $getUTM_source == "bingads" ){
        $inSource = "Advertisement: Bing";
    }elseif( $getUTM_source == "facebookpaid" ){
        $inSource = "Advertisement: FaceBook";
    }elseif( $getUTM_source == "quorapaid" ){
        $inSource = "Advertisement: Quora";
    }elseif( $getUTM_source == "linkedinads" ){
        $inSource = "Advertisement: LinkedIN";
    }elseif( $getUTM_source == "adroll" ){
        $inSource = "Advertisement: Adroll";
    }else{
        $inSource = "Website";
    }

    $partName   = vcGetName( $user_name );
    $firstn     = $partName[0];
    $lastn      = ( !empty($partName[1]) ) ? $partName[1] : 'N/A';

    
    $requirement = str_replace("+", " ", $requirement);
    $requirement = str_replace("&", " and ", $requirement);
    $requirement = preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', " ", $requirement);
    $requirement = strip_tags(nl2br($requirement));

    $arrUnwantedContent = array("Find Women","Looking For Sex","Dating Sites","sex","Sexy girls","Casual Dating", "Invest 5000","passive income","Tinder for Adults","How to invest in bitcoins","Sexy women","SEX","FAST Fast Money","Porn Games","Earn Bitcoins","Invest in cryptocurrency","invest in Bitcoin","Earn Free Bitcoin","chogoon.com","Busy Budgeter","Earnings on the Bitcoin","Invest 5000", "Mass Money Maker","Paid Surveys","make more money","Make Extra Money" ,"PROFIT in under 60","Invest in cryptocurrency","invest in Bitcoin","Earn Free Bitcoin","chogoon.com","Busy Budgeter","Earnings on the Bitcoin","Invest 5000", "Mass Money Maker","Paid Surveys","make more money","Make Extra Money" ,"PROFIT in under 60","Best Dating Apps","Asian ladies for men","Top 5 sites","lifelove24.com","10 meilleurs sites", "mewkid.net", "Sexy women","Best CA Dating","tonpremsacen.tk", "erkeisnowob.tk","bitcoin millionaire","sex,Hookup Sites","meilleurs sites","Buy Essays Online","Buying Essays","Buy an Essay","Sex", "Adult Dating", "Casual Dating", "Hookup Sites", "Free Dating","Bitcoin","blogspot","Cryptocurrency","lookweb");

    //$requirement = html_entity_decode($requirement);
    //$isSpam = checkSpamEmail($user_email);  //Temp Remove #3
    $isSpam = false;
    /*
    //Temp Remove #4
    foreach ($arrUnwantedContent as $unwanted_content) {
        if(stripos($requirement, $unwanted_content) !== FALSE) { 
        //die("spam");            
        }
    }
    */

    array_shift( $arrEmail );
    //$bccEmails      = ['parvesh@vinove.com', 'nitin.baluni@mail.vinove.com'];
    $bccEmails    = ['parvesh@vinove.com'];
    $sampledata = [
    'name'          => $user_name,
    'email'         => $user_email,
    'phone'         => $user_phone,
    'country'       => $user_country,
    'message'       => $requirement,
    'attachments'   => $uploaded_file_path,
    'ip'            => get_client_ip_user(),
    'source'        => $page_url
    ];
    storeLeadsData( $sampledata );
    //die;

    if(!$isSpam) {
        $varRefererURL = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : "";
        //$result = checkCaptcha($token);
        //if($result) {
            $varDesc = "File Uploaded :" . $uploaded_file_path . " Requirements: " . $requirement;

            $arrZoho_v2 = array(
            'Email'         => $user_email,
            'First Name'    => $firstn,
            'Last Name'     => $lastn,
            'Phone'         => $user_phone,
            //'Phone'       => $zoho_user_phone,
            'Country'       => $user_country,
            'Lead Status'   => 'Not Contacted Yet',
            'Lead Source'   => $inSource,
            'UTM Source'    => $inSource,
            'UTM Medium'    => $getUTM_medium,
            'Property'      => 'ValueCoders',
            'IP Address'    => $ip_addr,
            'Description'   => $varDesc,
            'URL'           => $customUrlLink,
            'File Uploaded' => $uploaded_file_path,
            'Requirements'  => $requirement,
            'refurl'        => $varRefererURL
            );

            $attachmentDoc = [];
            if( isset( $_POST['nda'] ) ){
            $attachmentDoc = ['/home/valuecoders-com/public_html/download-pdf/ValueCoders-NDA.pdf'];    
            }

            if( $arrPostParams['we-help'] == "career" ){
            smtpEmailFunction( "careers@vinove.com", "Job Application - ValueCoders", $Mailbody, "lead", $user_email, 
            ['parvesh@vinove.com','karma@vinove.com'], [], [], $user_name );
            header('location:thanks');
            die;
            }
            
            smtpEmailFunction( $user_email, "ValueCoders - We've received your request", $autoEmailBody, "auto", $user_email, [], [], $attachmentDoc );
            $eSender = splEmailData( $user_country );
            
            if( isset( $eSender['mail_to'] ) ){
            $tempEmailSubject = "Inquiry with ValueCoders [".$ticketID."]";
            if( isset($arrPostParams['is_free_trial']) && ($arrPostParams['is_free_trial'] == "true") ){
            $tempEmailSubject = "Request for 7-Day Trial [".$ticketID."]";    
            }
            if( $eSender['mail_to'] == "pa" ){
            smtpEmailFunction( "parvesh@vinove.com", $tempEmailSubject, $Mailbody, "lead", $user_email, $eSender['mail_cc'], [], [], $user_name, false );    
            }else{
            smtpEmailFunction( $eSender['mail_to'], $tempEmailSubject, $Mailbody, "lead", $user_email, $eSender['mail_cc'], $bccEmails, [], $user_name, false );        
            }
            
            $emailBBB =  $Mailbody.$bodyBr.print_r( $_COOKIE, 1 );
            smtpEmailFunction( "nitin.baluni@mail.vinove.com", "ValueCoders Contact Us - DEV", $emailBBB, "lead", $user_email, [], [], [], $user_name );
            
            $insType = (isset($arrPostParams['z-leadid']) && !empty($arrPostParams['z-leadid'])) ? $arrPostParams['z-leadid'] : false;
            zohoCrmUpdate_v2( $arrZoho_v2, $utm_source, $eSender['lead_to'], $insType );
            }
    }

    if( isset( $arrPostParams['is_free_trial'] ) && ($arrPostParams['is_free_trial'] == "true") ){
        $iLink='https://calendly.com/valuecoders/7-day-trial?name='.$user_name.'&email='.$user_email.'&a1='.$requirement;
        header('location:'.$iLink);
        die;
    }
    if( isset( $arrPostParams['vc-form-type'] ) && ($arrPostParams['vc-form-type'] == "case-studies") ){
        header('location:thanks?utmsource=case-studies');
        die;
    }
    if( isset( $arrPostParams['vc-form-type'] ) && ($arrPostParams['vc-form-type'] == "blog") ){
        header('location:thanks?utmsource=blog');
        die;
    }
    header('location:thanks');
    die;
}
?>