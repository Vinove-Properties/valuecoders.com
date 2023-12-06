<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

ob_start();
session_start();
require_once('common/config/config.inc.php');

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

function smtpEmailFunction( $emailTo, $subject, $body, $type, $userEmail, $emailCC = [], $emailBCC = [], $attachments = [], 
    $cname = null, $spam = false ){
    $spamEmails = getSpamEmailsListings("/home/vc-leads/spamemails.json");
    if( in_array( $emailTo, $spamEmails ) || in_array( $userEmail, $spamEmails ) ){
        header('location:thanks.php');
        die;
    }

    if( $type == "lead" ){
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
        if (!$smtp->connect('smtp.gmail.com', 587)) {
            print_r($smtp->getError());
            throw new Exception('Connect failed!');
        }  
        $mail->isSMTP();
        $mail->Host         = "legolas.vinove.com"; // SMTP server
        $mail->SMTPSecure   = 'tls';
        $mail->Port         = 25;
        $mail->SMTPAuth     = true;
        $mail->Username     = 'sales@valuecoders.com';
        $mail->Password     = 'dZ.RNp&$~D;;';//'Q5viPQQ,sap+';
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

//zohocrm api v2 update --23-Dec-2019
function zohoCrmUpdate_v2($argArrData,$leadSource='')
{
    $varEmail = $argArrData['Email'];
    $varLastName = $argArrData['Last Name'];
    $varFirstName = $argArrData['First Name'];
    $varPhoneNo = $argArrData['Phone'];
    $varLeadStatus = $argArrData['Lead Status'];
    $varLeadSource = $argArrData['Lead Source'];
    $varUTMSource = $argArrData['UTM Source'];
    $varProperty = $argArrData['Property'];
    $varIPAddress = $argArrData['IP Address'];
    $varDescription = $argArrData['Description'];
    $user_country = (isset($_POST['user-country']) && $_POST['user-country'])?$_POST['user-country']:"";
    $user_country_arr = @explode("(",$user_country);
    if(isset($user_country_arr[0]) && $user_country_arr[0])
    $user_country =  trim($user_country_arr[0]);
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
        $body .= " Client Details:".print_r($varEmail.$varLastName.$varFirstName,1)."<br>";
            
      //@mail("marketing@vinove.com", "VC : Website", $body, $headers);
      smtpEmailFunction( "marketing@vinove.com", "VC : Website", $body, "lead", $varEmail );
    } else {
        $curl = curl_init();
        $postLeadData = "{\n    \"data\": [\n        {\n            \"Last_Name\": \"$varLastName\",\n            \"First_Name\": \"$varFirstName\",\n            \"Email\": \"$varEmail\",\n            \"Country1\": \"$user_country\",\n            \"Phone\": \"$varPhoneNo\",\n            \"Lead_Source\": \"$varLeadSource\",\n            \"Lead_Status\": \"$varLeadStatus\",\n  \"Owner\":\"658520861\",\n            \"Description\": \"Url: $varURL                    File Uploaded: $varUploadedFiles                    Requirements: $varRequirements\"  ,\n            \"UTM_Source\":  \"$varUTMSource\",\n        \t\"Property\": \"$varProperty\",\n            \"IP_Address1\": \"$varIPAddress\",\n            \"Ref_Url\": \"$varRefURL\"\n        }\n        \n    ],\n    \"trigger\": [\n        \"approval\",\n        \"workflow\",\n        \"blueprint\"\n    ]\n}";
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

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $body1 = '';
            $response = json_decode($response);
            $body1 .= "Details are:".print_r($response,1)."<br>";

            //@mail("marketing@vinove.com", "VC : Website", $body1, $headers);
            smtpEmailFunction( "marketing@vinove.com", "VC : Website", $body1, "lead", $varEmail );
        }

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

if(trim($_POST['form-type']) == "solution-page") {     
    //$uploaded_files_names = $_POST['Uploadedfilename'];
    //print_r($_POST); exit();
    sendmail_function($_POST);
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

function sendmail_function($arrPostParams){
    global $arrEmail;
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
    $uploaded_files_names = ""; //set Empty

    
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

    
    $varConMailTo = ADMIN_EMAIL;
    
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
                $body .= 'Uploaded File : ' . SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . $varDeliminator;
                $Mailbody .= 'Uploaded File : ' . SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . $bodyBr;
                $uploaded_file_path .= SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue . '   ';
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
            header('location:thanks.php');
            die();
        }
    }
    */

    array_shift( $arrEmail );
    $bccEmails = ['parvesh@vinove.com'];
    
    if(!$isSpam) {
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
                'Phone' => $user_phone,
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
            smtpEmailFunction( "ankur@valuecoders.com", "Inquiry with ValueCoders", $Mailbody, "lead", $user_email, $arrEmail, 
            $bccEmails, [], $user_name );
            zohoCrmUpdate_v2($arrZoho_v2, $utm_source);            
            
        //}
        //else{
            //$subject = $subject. "CAPTCHA FAIL";
           // @mail("marketing@vinove.com", $subject, $body);
           // header('location:thanks.php');
           // die;
        //}
    }else{        
        smtpEmailFunction( "marketing@vinove.com", "Inquiry with ValueCoders", $Mailbody, "lead", $user_email, $arrEmail, $bccEmails,[],$user_name, true );
    }
    header('location:thanks.php');
    die;
}
?>