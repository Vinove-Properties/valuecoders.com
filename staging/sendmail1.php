<?php
if( ($_SERVER['REQUEST_METHOD'] == 'GET') && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ){
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die("HEY BOAT.. Go Away");
}

function validatereCaptchaResponse( $captcha ){
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfpW60nAAAAAOlG7J8lk1cOIk2x0O00Uqr9tErV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);
    if($response->success === false){
        return false;
    }
    if( ($response->success == true) && ($response->score <= 0.5) ){
        return false;
    }
    return true;
}

$is_staging = ( isset( $_SERVER['PHP_SELF'] ) && (strpos( $_SERVER['PHP_SELF'], 'v2wp' ) !== false) )  ?  true : false;
$ajxData    = json_decode(file_get_contents("php://input"), true);
$isAjay     = ( isset( $ajxData['_doing_ajax'] ) && ($ajxData['_doing_ajax'] === true) ) ? true : false;

if( $isAjay === false ){ 
    $array_ifields = ['user-name', 'user-email', 'user-country', 'user-phone'];
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

if( $isAjay === false ){
    if( vcvalidateinput( $_POST['user-name'], false, 50 ) === false ){ 
        header('location:thanks');
        die;
    }
}
define('CLIENT_ID','1000.BMJ414JAF95SXHD4YKRK0FJ3JC57VH');
define('CLIENT_SECRET','e9a796ffde50de7a3198d63f134196d125bae343d0');
define('ACESS_TOKEN','1000.cae698c21d5f8adc4f5f8e1ae60a3c39.6008000ac10c5df23ebf773f63194b81');
define('REFRESH_TOKEN','1000.b4d2d568df487f80bc73675a27101c45.d7cc4b483d0157d16f672e86dc354d62');

$thisUrl = "https://www.valuecoders.com/";
if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
    $thisUrl = "http://localhost/valuecoders-v2/wp/"; 
}elseif( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "https://beta.vinove.com/valuecoders-wp") ){
    $thisUrl = "https://beta.vinove.com/valuecoders-wp/";
}elseif( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "beta.vinove.com") ){
    $thisUrl = "https://beta.vinove.com/valuecoders-wp/";
}elseif( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "www.valuecoders.com") ){
    $thisUrl = "https://www.valuecoders.com/";
}


if( $is_staging ){
$thisUrl   = 'https://www.valuecoders.com/v2wp/';
}
define( 'SITE_ROOT_URL', $thisUrl );

$arrEmail = array('parvesh@vinove.com', 'akhil@valuecoders.com', 'avi@valuecoders.com', 'atul.srivastava@valuecoders.com');
$deny_ips = array( '146.185.253.167', '146.185.253.165' );
function get_client_ip_user() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) { $ip = $client; }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) { $ip = $forward; }
    else { $ip = $remote; }

    return $ip;
}

$spamEmailManual = ['MerinoBart@o2.pl'];
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
        $isSmap = validatereCaptchaResponse( $captcha );
        if( $isSmap === false ){
            header('location:thanks?recaptcha-spam=true');
            die;
        }
    }
}

function storeLeadsData( $data ){
    if($_SERVER['SERVER_NAME']=='beta.vinove.com'){
        $servername = "localhost";
        $username   = "betavinc_vcwp";
        $password   = "e-l#OWI-BO78";
        $dbname     = "betavinc_vcwp";
    }elseif( ($_SERVER['SERVER_NAME']=='www.valuecoders.com') || ($_SERVER['SERVER_NAME'] == 'valuecoders.com')  ){
        $servername = "localhost";
        $username   = "valuecoc_wpsite";
        $password   = "W@89Uz*3J!gp6>dA";
        $dbname     = "valuecoc_vclive0606";
    }else{
        $servername = "localhost";
        $username   = "phpmyadmin";
        $password   = "root";
        $dbname     = "valuecoders-wp";
    }
   
    $created_at     = date('Y-m-d H:i:s');

    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO wp_webleads ( name, email, phone, country, message, attachments, IP, source, created_at ) 
    VALUES (
    '{$data['name']}', 
    '{$data['email']}',  
    '{$data['phone']}', 
    '{$data['country']}', 
    '{$data['message']}', 
    '{$data['attachments']}', 
    '{$data['ip']}', 
    '{$data['source']}', 
    '{$created_at}'
    )";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    }else{
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

$ip = get_client_ip_user();
if( (array_search($ip, $deny_ips))!== FALSE ) {
    die("locked IP");
}
function hiddenBoatField( $type = "list" ){
    $botFields = [
        'first_name',
        'last_name',
        'email_user',
        'user_dob',
        'user_age',
        'user_gender',
        'user_phone',
        'user_location',
        'user_address',
        'middle_name',
        'nationality',
        'city',
        'state',
        'zip',
        'landmark',
        'department',
        'postal_code',
        'hobbies',
        'job_title',
        'company'
    ];
    $randKey = array_rand($botFields,1);
    if( $type == "list" )
        return $botFields;
    else
        //return '<input type="text" class="ht-input-field" name="'.$botFields[$randKey].'" value="" style="display:none;">';
        return '<style>.iemail-input{opacity:0;position:absolute;top:0;left:0;height:0;width:0;z-index:-1;}</style>
        <label class="iemail-input" for="'.$botFields[$randKey].'"></label><input type="text" 
        class="ht-input-field iemail-input" autocomplete="off" placeholder="Your '.$botFields[$randKey].' here" 
        name="'.$botFields[$randKey].'" value="" id="'.$botFields[$randKey].'">';
}

function getSpamEmailsListings( $jsonFile ){
    if( !file_exists( $jsonFile ) ){
        return [];
    }
    $data = file_get_contents($jsonFile);
    $data = json_decode($data, true);
    return $data;
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'countries-array.php';
require 'vc-mailto.php';

ob_start();
session_start();

if( isset( $_SESSION["queryString"] ) && !empty( $_SESSION["queryString"] ) ){ 
    $varRefererURL = $_SESSION["queryString"];     //$_SERVER[HTTP_REFERER];
}else{
    $varRefererURL = $_SERVER['HTTP_REFERER'];
}
/*
$spamReferer    = ['so5ni.com'];
if( $varRefererURL ){
    foreach( $spamReferer as $spam ){
        if( strpos( $varRefererURL, $spam ) || (strpos( $varRefererURL, $spam ) === 0) ){
            header( 'location:thanks.php' );
            die;
        }
    }
}
*/

/*
//Temp Remove #1
$htFields = hiddenBoatField('list');
foreach( $_POST as $key => $fields ){
    if( in_array( $key, $htFields ) && ($_POST[$key] != "") ){
        header('location:thanks.php');
        die;
    }
}
*/

function smtpEmailFunction( $emailTo, $subject, $body, $type, $userEmail, $emailCC = [], $emailBCC = [], $attachments = [], 
    $cname = null, $spam = false ){
    $spamEmails = getSpamEmailsListings("/home/vc-leads/spamemails.json");
    if( in_array( $emailTo, $spamEmails ) || in_array( $userEmail, $spamEmails ) ){
        header('location:thanks.php');
        die;
    }

    if($emailTo == "ankur@valuecoders.com" ){
        $fbody = $body;
        $fbody = "\n\n".date("F j, Y, g:i a")."\n".$fbody;
        $fbody = str_replace("<br>","\n",$fbody);
        $file = fopen("/home/vc-leads/site","a");
        //$file = fopen("/var/www/html/EditBackups/vcmail","a");
        fwrite($file,$fbody);
        fclose($file);
    }
    /*
    //Temp Remove #2
    $httpRef = ( isset( $_SERVER['HTTP_REFERER'] ) && !empty( $_SERVER['HTTP_REFERER'] ) ) ? $_SERVER['HTTP_REFERER'] : '';
    if( $httpRef && ( strpos( $httpRef, "valuecoders.com" ) === false ) ){
    header( 'location:thanks.php?spam=123' );
    die;
    }
    */
    
    $mail = new PHPMailer(true);
    $smtp = new SMTP;
    try{
        if(!$smtp->connect('smtp.gmail.com', 587)){
            print_r( $smtp->getError() );
            throw new Exception('Connect failed!');
        }  

        $mail->isSMTP();
        $mail->Host         = "hub.vinove.com"; // SMTP server
        $mail->SMTPSecure   = 'tls';
        $mail->Port         = 25;
        $mail->SMTPAuth     = true;
        $mail->Username     = 'sales@valuecoders.com';
        $mail->Password     = 'dZ.RNp&$~D;;';//'Q5viPQQ,sap+';

        if( $type == "lead" ){
            $mail->setFrom( $userEmail, $cname );
        }else{
            $mail->setFrom( "sales@valuecoders.com", 'ValueCoders');
        }
        $mail->addAddress($emailTo);
        if( $emailCC ){
            foreach( $emailCC as $emailC ){
                $mail->addCC( $emailC );        
            }
        }
        if( $emailBCC ){
            foreach( $emailBCC as $emailBC ){
                $mail->addBCC( $emailBC );        
            }
        }
        if( $type == "lead" ){
            $mail->addReplyTo( $userEmail );
        }else{
            $mail->addReplyTo( 'sales@valuecoders.com' );
        }
        
        if( $attachments ){
            foreach( $attachments as $attachment ){
                $mail->addAttachment( $attachment );
            }
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;    
        $mail->send();
        return true;
    }catch(Exception $e) {
        return false;
    }
}

$varIPAdd = get_client_ip_user(); 
//$varIPAdd = $_SERVER['REMOTE_ADDR'];
$varBrowserInfo = $_SERVER['HTTP_USER_AGENT'];
$varDateAdded = date('Y-m-d H:i:s');

//zohocrm api v2 update --23-Dec-2019
function zohoCrmUpdate_v2( $argArrData, $leadSource='', $owner_id = 658520861, $is_update = false ){

    $lead_id    = 0;
    $email      = $argArrData['Email'];
    if( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        $domain = array_pop(explode('@', $email));
        if( $domain !== "mail.zk.com" ){
            return 0;
        }
    }
    $varEmail       = $argArrData['Email'];
    $varLastName    = $argArrData['Last Name'];
    $varFirstName   = $argArrData['First Name'];
    $varPhoneNo     = $argArrData['Phone'];
    $varLeadStatus  = $argArrData['Lead Status'];
    $varLeadSource  = $argArrData['Lead Source'];
    $varUTMSource   = $argArrData['UTM Source'];
    $varProperty    = $argArrData['Property'];
    $varIPAddress   = $argArrData['IP Address'];
    $varDescription = $argArrData['Description'];
    
    /*
    $user_country = (isset($_POST['user-country']) && $_POST['user-country'])?$_POST['user-country']:"";
    $user_country_arr = @explode("(",$user_country);
    if(isset($user_country_arr[0]) && $user_country_arr[0])
    $user_country =  trim($user_country_arr[0]);
    */

    $user_country = $argArrData['Country'];
    $varURL = $argArrData['URL'];
    $varUploadedFiles = $argArrData['File Uploaded'];
    $varRequirements = $argArrData['Requirements'];
    $varRefURL = $argArrData['refurl'];
    $postData = 'refresh_token='. REFRESH_TOKEN.'&client_id='.CLIENT_ID.'&client_secret='.CLIENT_SECRET.'&grant_type='.'refresh_token';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://accounts.zoho.com/oauth/v2/token",//US DC .com, IN DC .in
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData,

    ));
    $response = curl_exec($curl);
    $arrRefreshTokResponse =json_decode($response,true);
    $varAccessToken = $arrRefreshTokResponse['access_token'];
    $err = curl_error($curl);
    $headers = "MIME-Version: 1.0";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From: vkavasthi@gmail.com <vkavasthi@gmail.com>" . "\r\n";
    $headers .= "Reply-To: vkavasthi@gmail.com\r\n";
    curl_close( $curl );
    if ($err) {
        $body = "";
        $body .= "Dear Admin,"."<br>".$curl;
        $body .= "error"."==".curl_errno($curl)."<br/>";
        $response2 = curl_getinfo($curl, CURLINFO_HTTP_CODE);


        $body .= "error response"."==".$response2."<br/>";
        $body .= "error "."==".$err."<br/>";
        $body .= "erro1r "."==".print_r($err,1)."<br/>";
        $body .= " RESPONSE Details are:".print_r($response2,1)."<br>";
        $body .= " Client Details:".$varEmail.'Last-name'.$varLastName.'First Name'.$varFirstName."<br>";
        $body .= " Client Details:".print_r($varEmail.$varLastName.$varFirstName,1);
        
        $file = fopen("/home/valuecoc/leads/v2wp-zoho.txt","a");
        $zlead = PHP_EOL.$varEmail.":".$body;
        fwrite($file, $zlead);
        fclose($file);
    }else{
        $zo_requirement = "";
        
        if( $varURL ){
        $zo_requirement .= "Url: ".$varURL;
        }
        
        if( $varUploadedFiles ){
        $zo_requirement .= " File Uploaded: ".$varUploadedFiles;    
        }

        if( $varRequirements ){
        $zo_requirement .= " Requirements: ".$varRequirements;
        }

        $zoho_data = array(
        'First_Name'    => $varFirstName,
        'Last_Name'     => $varLastName,
        'Email'         => $varEmail,
        'Country1'      => $user_country,
        'Phone'         => $varPhoneNo,
        'Lead_Source'   => $varLeadSource,
        'Lead_Status'   => $varLeadStatus,
        'Owner'         => $owner_id,
        'Description'   => $zo_requirement,
        'UTM_Source'    => $utm_src,
        'Property'      => $varProperty,
        'IP_Address1'   => $varIPAddress,
        'Ref_Url'       => $varRefURL
        );
        
        if( $is_update !== false  ){
            $zoho_data['id'] = $is_update;
        }

        $curl   = curl_init();        
        $sJSON  = json_encode( $zoho_data );
        $sJSON  = str_replace('{','[{',$sJSON);
        $sJSON  = str_replace('}','}]',$sJSON);
        $postLeadData = '{"data":' . $sJSON . '}';
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.zohoapis.com/crm/v2/Leads",//US DC .com, IN DC .in
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => ($is_update !== false) ? "PUT" : "POST",
            CURLOPT_POSTFIELDS => $postLeadData,
            CURLOPT_HTTPHEADER => array(
                "authorization: Zoho-oauthtoken $varAccessToken",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response  = curl_exec($curl);
        $err       = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $body1 = '';
            $response = json_decode($response);
            //Duplicate Lead Check.. 09.02.2023 NITIN BALUNI
            if( isset( $response->data[0] ) &&  ($response->data[0]->code == "DUPLICATE_DATA") ) :
                $lead_id = ( isset( $response->data[0] ) ) ? $response->data[0]->details->id : 0;
                if( $lead_id !== 0 ){
                    $zoho_data = array(
                    'id'                    => $lead_id,
                    'Lead_Status'           => "Not Contacted Yet",
                    'Owner'                 => 658520861,
                    'Sales_Qualified_Lead'  => "Yes" 
                    );

                    $curl   = curl_init();        
                    $sJSON  = json_encode( $zoho_data );
                    $sJSON  = str_replace('{','[{',$sJSON);
                    $sJSON  = str_replace('}','}]',$sJSON);
                    $postLeadData = '{"data":' . $sJSON . '}';
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.zohoapis.com/crm/v2/Leads",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST   => "PUT",
                    CURLOPT_POSTFIELDS      => $postLeadData,
                    CURLOPT_HTTPHEADER      => array(
                    "authorization: Zoho-oauthtoken $varAccessToken",
                    "cache-control: no-cache",
                    "content-type: application/json"
                    ),
                    ));

                    $response  = curl_exec($curl);
                    curl_close( $curl );
                    $response   = json_decode( $response );
                    $file = fopen("/home/valuecoc/leads/v2wp-zoho.txt","a");
                    $zlead      = PHP_EOL.$varEmail.":".$body1;
                    fwrite( $file, $zlead );
                    fclose( $file );                    
                    return $lead_id;
                }           
            endif;
            
            $body1 .= "Details are:".print_r($response,1);
            $lead_id = ( isset( $response->data[0] ) ) ? $response->data[0]->details->id : 0;
            
            $file = fopen("/home/valuecoc/leads/v2wp-zoho.txt","a");
            $zlead = PHP_EOL.$varEmail.":".$body1;
            fwrite( $file, $zlead );
            fclose($file);
        }

    }
    return $lead_id;
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
        echo json_encode( array( 'success' => true ) );
        die;
    }
    
    $captcha = (isset($ajxData['grecaptcha']) && !empty($ajxData['grecaptcha'])) ? $ajxData['grecaptcha'] : false;
    if( $captcha !== false ){
        $isSmap = validatereCaptchaResponse( $captcha );
        if( $isSmap === false ){
            echo json_encode( array( 'success' => false , 'data' => $ajxData ) );
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

    $parts = explode(" ", $ajxData['name']);
    if(count($parts) > 1) {
        $firstn = array_pop($parts);
        $lastn = implode(" ", $parts);
    }
    else
    {
        $firstn = "";
        $lastn = $user_name;
    }

    if( empty( $lastn ) ){
        $lastn = $user_name;
    }

    $Mailbody = "";
    $bodyBr = "<br>";
    $Mailbody .= "=========================".$bodyBr;
    $Mailbody .= "Name: ".$ajxData['name'].$bodyBr;
    $Mailbody .= "Email: ".$ajxData['email'].$bodyBr;
    $Mailbody .= "Phone: ".$ajxData['phone'].$bodyBr;
    $Mailbody .= "Country: ".$user_country.$bodyBr;
    $Mailbody .= "How Can We Help?: ".$ajxData['how_can'].$bodyBr;
    $Mailbody .= "IP Address: ".$varIPAdd.$bodyBr;
    
    //Looking For Job login No CRM Email to careers@vinove.com
    if( isset($ajxData['how_can']) && ($ajxData['how_can'] == "career") ){
    /*
    smtpEmailFunction("careers@vinove.com", "Career Email - ValueCoders", $Mailbody, "lead", 
    $ajxData['email'], [], ["nitin.baluni@mail.vinove.com"], [], $ajxData['name']);
    */
    echo json_encode( array('success' => true, 'mail_data' => $Mailbody, 'lead_id' => 0, 'is_job' => true ) );
    die;
    }    
    
    $mailSent = smtpEmailFunction( "nitin.baluni@mail.vinove.com", "ValueCoders Contact Us - {v2wp Step - 1}", $Mailbody, "lead", 
    $ajxData['email'], [], ['zeba.khan@mail.vinove.com'], [], $ajxData['name'] );
    $leadReq = "How Can We Help : ".$ajxData['how_can'];

    if( $mailSent === true ){
        if( isset( $ajxData['lead_id'] ) && ($ajxData['lead_id'] != 0) ){
            echo json_encode( array( 'success' => true, 'mail_data' => $Mailbody, 'lead_id' => $ajxData['lead_id'] ) );
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
        $eSender = splEmailData( $user_country );
        $lead_id = zohoCrmUpdate_v2( $arrZoho_v2, $utm_source, $eSender['lead_to'], false );
        echo json_encode( array( 'success' => true, 'mail_data' => $Mailbody, 'zoho_data' => $arrZoho_v2, 
        'lead_id' => $lead_id ) );
    }else{
        echo json_encode( array( 'success' => false, 'mail_data' => $Mailbody ) );
    }
    die;
}else{
    if( isset( $_POST['we-help'] ) && ( $_POST['we-help'] == "jobs") ) {
        $cvDov = "";
        /*echo '<pre>';
        print_r($_FILES['career']);
        print_r($_POST); 
        die;*/
        $arrFileExtension = array( 'png','txt','jpg','xls','xlsx','jpeg','gif','zip','psd','PSD','PNG','JPG','JPEG','GIF',
        'AI','ai','ZIP','RAR','rar','pdf','PDF','doc','DOC','docx','DOCX' );
        $file_name  = $_FILES['career']['name'];
        $ext        = pathinfo($file_name, PATHINFO_EXTENSION);
        
        if( in_array($ext, $arrFileExtension) ){
            $fileSize = $_FILES['career']['size'] / 1024 / 1024;
            if( $fileSize > 5 ){
                echo json_encode( 
                    array( 
                    'status'    => false, 
                    'message'   => "ERROR Uploaded document exceeds the maximum size limit of 5 MB"
                    ) 
                ); 
                die;
            }
            $name_of_file = substr($file_name, 0, strrpos($file_name, '.'));
            $name_of_file = str_replace(' ', '-', $name_of_file);
            $name_of_file = preg_replace('/[^A-Za-z0-9\-]/', '', $name_of_file);
            $name_of_file = preg_replace('/-+/', '-', $name_of_file);
            $updated_name = time().'_'.$name_of_file.".".$ext;      
            $datastr = $datastr.$updated_name;
            if( move_uploaded_file( $_FILES['career']['tmp_name'], 'uploads/'.$updated_name ) ){
                $cvDov = $datastr;
            }else{
                echo json_encode( array( 'status' => false, 'message' => "Error in file uploading." ) ); die;
            }
        }else{
            echo json_encode( array( 'status' => false, 'message' => "Invalid File type." ) ); die;
        }
        $Mailbody = "";
        $bodyBr = "<br>";
        $Mailbody .= "Name: ".$_POST['user-name'].$bodyBr;
        $Mailbody .= "Email: ".$_POST['user-email'].$bodyBr;
        $Mailbody .= "Phone: ".$_POST['user-phone'].$bodyBr;
        $Mailbody .= "Country: ".$_POST['user-country'].$bodyBr;
        $Mailbody .= "Attachment: ".SITE_ROOT_URL.'uploads/'.$cvDov;
        //echo $Mailbody; die;
        smtpEmailFunction( 
        "nitin.baluni@mail.valuecoders.com", 
        "Career Related Inquiry with ValueCoders", 
        $Mailbody, 
        "lead", 
        $_POST['user-email'], 
        [], 
        [], 
        [], 
        $_POST['user-name'], 
        false 
        );
        header('location:thanks');
        die;
    }
    sendmail_function($_POST,$uploaded_files_names);    
}


function sendmail_function($arrPostParams, $uploaded_files_names_param){
    global $arrEmail;
    //$isContact = (isset($arrPostParams['vform-type']) && ($arrPostParams['vform-type'] == "contact")) ? true : false;
    $isContact = false;
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
        $subject  = $mailSubject;
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
    
    $Mailbody .= "Requirements: ".$requirement.$bodyBr;
    $Mailbody .= "Referer URL: ".$pageRefererURL.$bodyBr;
    $Mailbody .= "IP Address. : ".$ip_addr.$bodyBr;
    
    if( isset($arrPostParams['is_free_trial']) && ($arrPostParams['is_free_trial'] == "true") ){
    //$Mailbody .= "7 days Free Trial : True".$bodyBr;
    }
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

    // $stpos = strpos($user_name," ");
    // if($stpos===false) {
    //     $firstn = "";
    //     $lastn = $user_name;
    // } else {
    //     $firstn = substr($user_name, 0,$stpos);
    //     $lastn = substr($user_name,($stpos+1));
    // }
    $parts = explode(" ", $user_name);

    
    if(count($parts) > 1) {
        $firstn = array_pop($parts);
        $lastn = implode(" ", $parts);
    }
    else
    {
        $firstn = "";
        $lastn = $user_name;
    }

    if( empty( $lastn ) ){
        $lastn = $user_name;
    }
    

    /*
    if(count($parts) > 1) {
        $firstn = $parts[0];
        $lastn  = $parts[1];
    }else{
        $firstn = "";
        $lastn = $ajxData['name'];
    }
    if( empty( $lastn ) ){
        $lastn = $ajxData['name'];
    }
    */
    
    //$requirement = $zohoDescription.$requirement;
    //$lastn = $firstn;
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
        if (stripos($requirement, $unwanted_content) !== FALSE) { 
            //die("spam");
            $add_headers = "MIME-Version: 1.0";
            $add_headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
            $add_headers .= "From: vkavasthi@gmail.com <vkavasthi@gmail.com>" . "\r\n";
            $add_headers .= "Reply-To: vkavasthi@gmail.com\r\n";
            $subject = $subject."UNWANTED Content";
            //@mail("marketing@vinove.com", $subject, $body, $add_headers);
            //smtpEmailFunction( "marketing@vinove.com", $subject, $body, "lead", $user_email,[],[],[],$user_name );
            smtpEmailFunction( 'marketing@vinove.com', $subject." UN", $body, "lead", $user_email,[],[],[],$user_name, true );
            header('location:thanks.php');
            die();
        }
    }
    */

    array_shift( $arrEmail );
    $bccEmails = ['parvesh@vinove.com'];
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
            //@mail("ankur@valuecoders.com", $subject, $body, $headers);

            $varDesc = "File Uploaded :" . $uploaded_file_path . "        
            Requirements: " . $requirement;

            $arrZoho_v2 = array(
                'Email' => $user_email,
                'First Name' => $firstn,
                'Last Name' => $lastn,
                'Phone' => $user_phone,
                //'Phone' => $zoho_user_phone,
                'Country' => $user_country,
                'Lead Status' => 'Not Contacted Yet',
                'Lead Source' => $lead_source,
                'UTM Source' => $utm_source,
                'Property' => 'ValueCoders',
                'IP Address' => $ip_addr,
                'Description' => $varDesc,
                'URL' => $customUrlLink,
                'File Uploaded' => $uploaded_file_path,
                'Requirements' => $requirement,
                'refurl' => $varRefererURL
            );
            /*
            echo '<pre>';
            print_r( $arrZoho_v2 );
            die;
            */
            $attachmentDoc = [];
            if( isset( $_POST['nda'] ) ){
            $attachmentDoc = ['/home/valuecoc/public_html/common/download-pdf/ValueCoders-NDA.pdf'];    
            }
            //
            if( $arrPostParams['we-help'] == "career" ){
                if( isset( $_POST['career-int'] ) && !empty($_POST['career-int']) ){
                $Mailbody .= "Position of Interest: ".$_POST['career-int'].$bodyBr;    
                }
                smtpEmailFunction( "nitin.baluni@mail.vinove.com", "Job Application - ValueCoders", $Mailbody, "lead", $user_email, 
                [], [], [], $user_name );
            header('location:thanks');
            die;
            }
            
            smtpEmailFunction( $user_email, "ValueCoders - We've received your request", $autoEmailBody, "auto", $user_email, [], [], $attachmentDoc );
            $eSender = splEmailData( $user_country );
            if( isset( $eSender['mail_to'] ) ){
            /*
            smtpEmailFunction( 
                $eSender['mail_to'], 
                "Inquiry with ValueCoders - v2wp(QA check)", 
                $Mailbody, 
                "lead", 
                $user_email, 
                $eSender['mail_cc'], 
                $bccEmails, 
                [], 
                $user_name, 
                false 
            );
            */
            $tempEmailSubject = "Inquiry with ValueCoders - {V2WP}";
            if( isset($arrPostParams['is_free_trial']) && ($arrPostParams['is_free_trial'] == "true") ){
            $tempEmailSubject = "Inquiry with ValueCoders - 7 Days Trial";    
            }
            $emailBBB =  $Mailbody.$bodyBr.json_encode($eSender); //die;
            smtpEmailFunction( "nitin.baluni@mail.vinove.com", $tempEmailSubject, $emailBBB, "lead", $user_email, [], 
            [], [], $user_name );
            $insType = (isset($arrPostParams['z-leadid']) && !empty($arrPostParams['z-leadid'])) ? $arrPostParams['z-leadid'] : false;
            zohoCrmUpdate_v2( $arrZoho_v2, $utm_source, $eSender['lead_to'], $insType );
            }
    }else{        
        /*
        smtpEmailFunction( "marketing@vinove.com", "Inquiry with ValueCoders", $Mailbody, "lead", $user_email, $arrEmail, $bccEmails,[],$user_name, true );
        */
    }
    if( isset( $arrPostParams['is_free_trial'] ) && ($arrPostParams['is_free_trial'] == "true") ){
        // $iLink = "?uname=".$user_name."&email=".$user_email."&req=".$requirement;
        // header('location:7-days-trial-thank-you'.$iLink);
        $iLink='https://calendly.com/valuecoders/7-day-trial?name='.$user_name.'&email='.$user_email.'&a1='.$requirement;
        header('location:'.$iLink);
        die;
    }
    header('location:thanks');
    die;
}
?>