<?php
//print_r($_POST); die;
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'vc-mailto.php';

define('IH_LOGFILE', '/home/valuecoders-com/public_html/log/crm.log');

ob_start();
session_start();
//require_once('common/config/config.inc.php');
//$varRefererURL = $_SESSION["queryString"];     //$_SERVER[HTTP_REFERER];
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

function generateTicketID() {
    $alphabeticChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $ticketID = '';

    // Generate 3 random uppercase alphabetic characters
    for ($i = 0; $i < 3; $i++) {
        $ticketID .= $alphabeticChars[rand(0, strlen($alphabeticChars) - 1)];
    }

    // Append a hyphen (optional, can be removed if you prefer ABC1234 format)
    $ticketID .= '-';

    // Generate 4 random digits
    for( $i = 0; $i < 4; $i++ ){
        $ticketID .= rand(0, 9);
    }
    return $ticketID;
}

function getSpamEmailsListings( $jsonFile ){
    if( !file_exists( $jsonFile ) ){
        return [];
    }
    $data = file_get_contents($jsonFile);
    $data = json_decode($data, true);
    return $data;
}
//zoho crm api keys
define('CLIENT_ID','1000.BMJ414JAF95SXHD4YKRK0FJ3JC57VH');
define('CLIENT_SECRET','e9a796ffde50de7a3198d63f134196d125bae343d0');
define('ACESS_TOKEN','1000.cae698c21d5f8adc4f5f8e1ae60a3c39.6008000ac10c5df23ebf773f63194b81');
define('REFRESH_TOKEN','1000.b4d2d568df487f80bc73675a27101c45.d7cc4b483d0157d16f672e86dc354d62');

function smtpEmailFunction( $emailTo, $subject, $body, $type, $userEmail, $emailCC = [], $emailBCC = [], $attachments = [], 
    $cname = null,  $spam = false  ){
    $spamEmails = getSpamEmailsListings("/home/vc-leads/spamemails.json");
    if( in_array( $emailTo, $spamEmails ) || in_array( $userEmail, $spamEmails ) ){
        header('location:https://www.valuecoders.com/l/thanks/');
        die;
    }

    if( $type == "lead"){
        $fbody = $body;
        $fbody = "\n\n".date("F j, Y, g:i a")."\n".$fbody;
        $fbody = str_replace("<br>","\n",$fbody);
        /*$file = fopen("/home/vc-leads/landing","a");
        fwrite($file,$fbody);
        fclose($file);*/
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
        if (!$smtp->connect('smtp.gmail.com', 587)) {
            print_r($smtp->getError());
            throw new Exception('Connect failed!');
        }  
        $mail->isSMTP();
        /*
        $mail->Host         = "hub.vinove.com"; // SMTP server
        $mail->SMTPSecure   = 'tls';
        $mail->Port         = 25;
        $mail->SMTPAuth     = true;
        $mail->Username     = 'sales@valuecoders.com';
        $mail->Password     = 'dZ.RNp&$~D;;';//'Q5viPQQ,sap+';
        */
        
        $mail->Host         = "smtp.gmail.com"; // SMTP server
        $mail->SMTPSecure   = 'ssl';
        $mail->Port         = 465;
        $mail->SMTPAuth     = true;
        $mail->Username     = 'do-not-reply@valuecoders.com';
        $mail->Password     = 'pdtnweysvgovhemg';
        //Recipients
        //= "" $emailFrom = "sales@valuecoders.com", $replyTo = "do-not-reply@mail.valuecoders.com",
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
        //echo 'Message has been sent'; die();
    }catch(Exception $e) {
       //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; die();
    }
}
$varIPAdd = get_client_ip_user(); 
//$varIPAdd = $_SERVER['REMOTE_ADDR'];
$varBrowserInfo = $_SERVER['HTTP_USER_AGENT'];
$varDateAdded = date('Y-m-d H:i:s');

function ppcdupLeadNote( $varAccessToken, $lead_id, $requirement ){
    date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST
    $currentDateTime = new DateTime();
    $formattedDate = $currentDateTime->format('jS F Y \a\t g:i A');
    $notesRequest = 'https://www.zohoapis.com/crm/v2/Leads/'.$lead_id.'/Notes';
    $notes_data = [
    'Note_Content'  => 'New Inquiry Received from ValueCoders on '.$formattedDate.'. Content below:'."\n ".$requirement,
    'se_module'     => 'Leads'
    ];
    $nJSON  = json_encode( $notes_data );
    $nJSON  = str_replace('{','[{',$nJSON);
    $nJSON  = str_replace('}','}]',$nJSON);
    $postNotesData = '{"data":' . $nJSON . '}';

    $curl   = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $notesRequest,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST   => "POST",
    CURLOPT_POSTFIELDS      => $postNotesData,
    CURLOPT_HTTPHEADER      => array( "authorization: Zoho-oauthtoken $varAccessToken", "cache-control: no-cache",
    "content-type: application/json"),
    ));

    $response   = curl_exec( $curl );
    $err        = curl_error( $curl );
    if( !$err ){
        $response   = json_decode( $response );
        $file       = fopen( IH_LOGFILE, "a" );
        fwrite( $file, PHP_EOL."Duplicate Lead Notes Landing Page : ".print_r( $response, 1 ) );
        fclose( $file );
    }else{
        $file       = fopen( IH_LOGFILE, "a" );
        fwrite( $file, "Error Notes : ".$err );
        fclose( $file );
    }
    curl_close( $curl );
}

//zohocrm api v2 update --23-Dec-2019
function zohoCrmUpdate_v2($argArrData, $leadSource='', $owner_id = 658520861){
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
    $user_country   = (isset($_POST['user-country']) && $_POST['user-country'])?$_POST['user-country']:"";
    $user_country_arr = @explode("(",$user_country);
    
    if(isset($user_country_arr[0]) && $user_country_arr[0])
    $user_country   = trim($user_country_arr[0]);

    $varURL             = $argArrData['URL'];
    $varUploadedFiles   = $argArrData['File Uploaded'];
    $varRequirements    = $argArrData['Requirements'];
    $varRefURL          = $argArrData['refurl'];
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
        CURLOPT_POSTFIELDS => $postData
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

    if( !$err ){
        $zo_requirement = "Url: ".$varURL. "File Uploaded: ".$varUploadedFiles." Requirements:" .$varRequirements;
        $QfLead = "Yes";        
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
        'Sales_Qualified_Lead' => "Yes",
        'Is_Duplicate'  => "No",
        'UTM_Source'    => $varUTMSource,
        'Property'      => $varProperty,
        'IP_Address1'   => $varIPAddress,
        'Ref_Url'       => $varRefURL
        );

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
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postLeadData,
            CURLOPT_HTTPHEADER => array(
                "authorization: Zoho-oauthtoken $varAccessToken",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if(!$err){
            $body1      = '';
            $response   = json_decode($response);
            if( isset( $response->data[0] ) &&  ($response->data[0]->code == "DUPLICATE_DATA") ){
            $lead_id = ( isset( $response->data[0] ) ) ? $response->data[0]->details->id : 0;
            if( $lead_id !== 0 ){
                $zoho_data = array(
                'id'                    => $lead_id,
                'Lead_Status'           => "Not Contacted Yet",
                'Owner'                 => 720093253,
                'Sales_Qualified_Lead'  => "Yes",
                'Is_Duplicate'          => "Yes"
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

                $crmException   = $response;
                $response       = json_decode( $response );
                
                $file       = fopen(IH_LOGFILE,"a");
                $zlead      = PHP_EOL.print_r( $response, 1 );
                fwrite( $file, $zlead );
                fclose( $file );

                $rspCode    = ['DUPLICATE_DATA', 'SUCCESS'];
                $statusCode = (isset($response->data[0]) && !empty($response->data[0]->code)) ? $response->data[0]->code : '';
            
                if( !empty( $statusCode ) && !in_array($statusCode, $rspCode) ){
                $user_name = $varFirstName.' '.$varLastName;
                smtpEmailFunction( "web@vinove.com", "Zoho CRM error - ValueCoders LP", $crmException, "lead", 
                $varEmail, [], [], [], $user_name );
                }
                ppcdupLeadNote( $varAccessToken, $lead_id, $varDescription );
            }
            }else{
                $file       = fopen(IH_LOGFILE,"a");
                $zlead      = PHP_EOL.$varEmail.":".print_r($response,1);
                fwrite( $file, $zlead );
                fclose( $file );    
                $user_name = $varFirstName.' '.$varLastName;
                smtpEmailFunction( "nitin.baluni@mail.vinove.com", "Zoho CRM error - ValueCoders LP", $response, "lead", 
                $varEmail, [], [], [], $user_name );
            }
        }else{
            $user_name = $varFirstName.' '.$varLastName;
            smtpEmailFunction( "nitin.baluni@mail.vinove.com", "Zoho CRM error - ValueCoders LP", $response, "lead", 
            $varEmail, [], [], [], $user_name );
            $file       = fopen(IH_LOGFILE,"a");
            $zlead      = PHP_EOL.$varEmail.":".print_r($err,1);
            fwrite( $file, $zlead );
            fclose( $file );
        }
    }else{
        $file       = fopen(IH_LOGFILE,"a");
        $zlead      = PHP_EOL.$varEmail.":".print_r($err,1);
        fwrite( $file, $zlead );
        fclose( $file );
    }
    return true;
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
/*
 * ================contact us form new date 1/11/2018
 */

if(trim($_POST['type']) == "contact-us-form") {
    $token = trim($_POST['g-recaptcha-response']);
    $uploaded_files_names = $_POST['Uploadedfilename'];
        sendmail_function($_POST,$uploaded_files_names,$token);
}

/*
 * ============footer form
 */
if(trim($_POST['type']) == "footer-form") {

    $token = trim($_POST['recaptcha']);
    $uploaded_files_names = $_POST['Uploadedfilename'];
        sendmail_function($_POST, $uploaded_files_names,$token);

}
/*sidebar form*/
if($_POST['frmSidebar']=='sidebar'){
//    print_r($_POST);die();
    $token = trim($_POST['g-recaptcha']);
    $uploaded_files_names = $_POST['frmSidebarFileUploadedfilename'];
       sendmail_function($_POST, $uploaded_files_names,$token);
}

if( isset( $_POST['type'] ) && ($_POST['type'] == "ppc-lead" ) ){
//echo '<pre>';print_r($_POST);
sendmail_function($_POST, '','');
}

if( isset($_POST['form-action']) && ($_POST['form-action'] == "lp") ){
    $token      = "";
    $uploads    = isset($_POST['Uploadedfilename']) && !empty($_POST['Uploadedfilename']) ? $_POST['Uploadedfilename'] :'';
    sendmail_function( $_POST, $uploads, $token );
}


    function checkCaptcha($token)
    {

        $secretKey = "6LeY5-AZAAAAAG4BWNOrlE0u2xXcwrZuVggG3Lc8";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"secret\"\r\n\r\n$secretKey\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"response\"\r\n\r\n$token\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);


        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $responseKeys = json_decode($response, true);

            if ($responseKeys["success"]) {
                return true;
            } else {
                return false;
            }
        }
    }
function sendmail_function($arrPostParams, $uploaded_files_names_param, $token){
    //$time_start = microtime(true);
    global $arrEmail;
    $ticketID   = generateTicketID();
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
    $user_email = $arrPostParams['user-email'];
    $user_phone = $arrPostParams['user-phone'];
    $user_country = $arrPostParams['user-country'];
    $requirement = $arrPostParams['user-req'];
    //$allocated_budget = $arrPostParams['user-budget']!= ''?$arrPostParams['user-budget']:'';
    $uploaded_files_names = $uploaded_files_names_param;
    $isDmTpl        = (isset($arrPostParams['is-dmtpl']) && ($arrPostParams['is-dmtpl'] == "true")) ? true : false;
    
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

    
    $varConMailTo = "nitin.baluni@mail.vinove.com";
    
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
    $body .= "Name : ".$user_name.$varDeliminator;
    $body .= "Email : ".$user_email.$varDeliminator;
    $body .= "Contact No. : ".$user_phone.$varDeliminator;
    $body .= "Country : ".$user_country.$varDeliminator;
    // if($allocated_budget != ''){
    // $body .= "Allocated Budget :".$allocated_budget.$varDeliminator;
    // }
    $body .= "IP Address. : ".$ip_addr.$varDeliminator;
    $body .= "Requirements: ".$requirement.$varDeliminator;
    $body .= "Referer URL: ".$pageRefererURL.$varDeliminator;

    $Mailbody = "";
    $bodyBr = "<br>";
    $Mailbody .= "=========================".$bodyBr;
    $Mailbody .= "Name : ".$user_name.$bodyBr;
    $Mailbody .= "Email : ".$user_email.$bodyBr;
    $Mailbody .= "Contact No. : ".$user_phone.$bodyBr;
    $Mailbody .= "Country : ".$user_country.$bodyBr;
    $Mailbody .= "IP Address. : ".$ip_addr.$bodyBr;
    $Mailbody .= "Requirements: ".$requirement.$bodyBr;
    $Mailbody .= "Referer URL: ".$pageRefererURL.$bodyBr;
    
    if( isset($_POST['user-budget']) && !empty( $_POST['user-budget'] ) ){
    $Mailbody .= "Budget: ".$_POST['user-budget'].$bodyBr;    
    }

    if ($uploaded_files_names != "") {

        $arrFileNameArr = explode(',', $uploaded_files_names,-1);

    } else {
        $arrFileNameArr = array();
    }


    // if (count($arrFileNameArr) > 0) {
    //     $uploaded_file_path = "";
    //     foreach ($arrFileNameArr as $fileKey => $fileValue) {
    //         if(strstr($fileValue,".com")) {
    //             $body.='Custom URL:' . $fileValue. $varDeliminator;
    //             $Mailbody.='Custom URL:' . $fileValue. $bodyBr;
    //         } else {
    //             $body .= 'Uploaded File : ' . SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . $varDeliminator;
    //             $Mailbody .= 'Uploaded File : ' . SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . $bodyBr;
    //             $uploaded_file_path .= SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . '   ';
    //         }
    //     } //end foreach loop
    // }

    if (count($arrFileNameArr) > 0) {
        $uploaded_file_path = "";
        foreach ($arrFileNameArr as $fileKey => $fileValue) {
            if(strstr($fileValue,".com")) {
                $body.='Custom URL:' . $fileValue. $varDeliminator;
                $Mailbody.='Custom URL:' . $fileValue. $bodyBr;
            } else {
                // $body .= 'Uploaded File : ' . SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . $varDeliminator;

                $Mailbody .= 'Uploaded File : https://www.pixelcrayons.com/uploads/'.$fileValue . $bodyBr;
                $uploaded_file_path .= 'https://www.pixelcrayons.com/uploads/' . $fileValue . '   ';
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
    // for($i=0;$i<count($arrEmail);$i++){
    //     $headers .= "BCC: $arrEmail[$i]\r\n";
    // }
    // $body = nl2br($body);    
    $utm_source = "";
    
    $utm_source = $arrQueryString['utm_source'];
    if( 
        !isset( $arrQueryString['utm_source'] ) && 
        empty( $arrQueryString['utm_source'] ) 
    ) {
        $arrQueryString['utm_source'] = $arrQueryString['amp;xForwordFor'];
        $utm_source = $arrQueryString['utm_source'];
    }
    $utm_source = str_replace("&", "@", $utm_source);


    if(strstr($arrQueryString['utm_source'],"adwords")/* || $arrQueryString['gclid']!=""*/)  {
        $lead_source = "Advertisement: Adwords";
    }
    elseif(strstr($arrQueryString['utm_source'],"gglads")){
        $lead_source = "Advertisement: Google";
    } 
    elseif(strstr($arrQueryString['utm_source'],"bingads")){
        $lead_source = "Advertisement: Bing";
    }
    elseif(strstr($arrQueryString['utm_source'],"bing")){
        $lead_source = "Advertisement: Bing";
    }
    elseif(strstr($arrQueryString['utm_source'],"quorapaid")){
        $lead_source = "Advertisement: Quora";
    } 
    else{
        $lead_source = "Advertisement: Adroll";
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
    
    //$lastn = $firstn;
    $requirement = str_replace("+", " ", $requirement);
    $requirement = str_replace("&", " and ", $requirement);
    $requirement= preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', " ", $requirement);
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
            header('location:https://www.valuecoders.com/l/thanks/');
            die();
        }
    }
    */

    //array_shift( $arrEmail );
    $bccEmails = ['parvesh@vinove.com', 'nitin.baluni@mail.vinove.com'];
    //$bccEmails = ['parvesh@vinove.com'];
    
    if(!$isSpam){
        $varRefererURL = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : "";
        //$result = checkCaptcha($token);
        //if($result) {
            //@mail("ankur@valuecoders.com", $subject, $body, $headers);
            $varDesc = "Url:" . $customUrlLink . "    
            File Uploaded :" . $uploaded_file_path . "        
            Requirements: " . $requirement;

            $arrZoho_v2 = array('Email' => $user_email,
                'First Name' => $firstn,
                'Last Name' => $lastn,
                'Phone' => !empty( $user_phone ) ? $user_phone : 9900000000,
                // 'Country' => '',
                'Lead Status' => 'Not Contacted Yet',
                'Lead Source' => $lead_source,
                'UTM Source' => $utm_source,
                'Property' => 'ValueCoders',
                'IP Address' => $ip_addr,
                'Description' => $varDesc,
                'URL' => $customUrlLink,
                'File Uploaded' => $uploaded_file_path,
                'Requirements' => $requirement,
                'refurl' => $varRefererURL);
                
            //@mail('nitin.valuecoders@gmail.com','Post data',print_r($arrZoho_v2,1));
            smtpEmailFunction( $user_email, "ValueCoders - We've received your request", $autoEmailBody, "auto", $user_email );

            /*
            //Working
            $eSender = splEmailData( $user_country );
            if( isset( $eSender['mail_to'] ) ){
            smtpEmailFunction( 
                $eSender['mail_to'], 
                "Inquiry with ValueCoders", 
                $Mailbody, 
                "lead", 
                $user_email, 
                $eSender['mail_cc'], 
                $bccEmails, 
                [], 
                $user_name, 
                false 
            );    
            zohoCrmUpdate_v2( $arrZoho_v2, $utm_source, $eSender['lead_to'] );
            header('location:l/thanks/');
            die;
            }
            */

            if( $isDmTpl === true ){
                $EmailSubject = "Inquiry with ValueCoders - Digital Marketing [".$ticketID."]";
                smtpEmailFunction(
                "parvesh@vinove.com", 
                $EmailSubject, 
                $Mailbody,
                "lead",
                $user_email,
                [],
                ["nitin.baluni@mail.vinove.com"],
                [],
                $user_name,
                false
                );
            }else{
                $eSender = splEmailData( $user_country );
                $EmailSubject = "Inquiry with ValueCoders [".$ticketID."]";
                if( isset( $eSender['mail_to'] ) ){
                    smtpEmailFunction(
                    $eSender['mail_to'], 
                    $EmailSubject, 
                    $Mailbody, 
                    "lead", 
                    $user_email, 
                    $eSender['mail_cc'], 
                    $bccEmails, 
                    [], 
                    $user_name, 
                    false
                    );
                }
                zohoCrmUpdate_v2( $arrZoho_v2, $utm_source, $eSender['lead_to'] );            
            }

            if( isset( $arrPostParams['is-bookcall'] ) && ($arrPostParams['is-bookcall'] == 1) ){
                $user_name      = $arrPostParams['user-name'];
                $user_email     = $arrPostParams['user-email'];
                $requirement    = $arrPostParams['user-req'];
                //echo 'location:https://www.valuecoders.com/call-thanks?uname='.$user_name.'&email='.$user_email.'&req='.$requirement;
                header('location:https://www.valuecoders.com/call-thanks?uname='.$user_name.'&email='.$user_email.'&req='.$requirement.'&phone='.$user_phone);
                die;
            }            
            header('location:l/thanks/');
            die;
    }else{        
        smtpEmailFunction( "marketing@vinove.com", "Inquiry with ValueCoders", $Mailbody, "lead", $user_email, $arrEmail, $bccEmails,[],$user_name, true );
    }
    

    header('location:l/thanks');
    die;
}
?>