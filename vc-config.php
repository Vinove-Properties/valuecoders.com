<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if( ($_SERVER['REQUEST_METHOD'] == 'GET') && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']) ){
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die("HEY BOAT.. Go Away");
}
require_once __DIR__ . '/envloader.php';
loadEnv();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

define('CLIENT_ID',getenv('ZOHO_CLIENT_ID'));
define('CLIENT_SECRET',getenv('ZOHO_CLIENT_SECRET'));
define('REFRESH_TOKEN',getenv('ZOHO_REFRESH_TOKEN'));
define('CL_LOGFILE', '/home/valuecoders-com/public_html/log/crm.log');

function nbHasData( $array, $key ){
    return (isset($array[$key]) && !empty($array[$key])) ? $array[$key] : '';
}

function _ConfigDBConnection(){
    if( isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost") ){
        $servername = "localhost";
        $username   = "phpmyadmin";
        $password   = "root";
        $dbname     = "crm.valuecoders";
    }else{
        $servername = getenv('CRM_DB_HOST');
        $username   = getenv('CRM_DB_USER');
        $password   = getenv('CRM_DB_PASS');
        $dbname     = getenv('CRM_DB_NAME');
    }
    $conn = new mysqli( $servername, $username, $password, $dbname );
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

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

function validateZohoPhone($phone) {
    $phone = trim($phone);
    $phone = str_replace([' ', '-', '(', ')'], '', $phone);
    if (preg_match('/^\+?[0-9]{5,20}$/', $phone)) {
        return $phone;
    }
    return null;
}


function smtpEmailFunction( $emailTo, $subject, $body, $type, $userEmail, $emailCC = [], $emailBCC = [], $attachments = [], 
    $cname = null, $spam = false ){

    $mail = new PHPMailer(true);
    $smtp = new SMTP;
    try{
        if(!$smtp->connect('smtp.gmail.com', 587)){
            print_r( $smtp->getError() );
            throw new Exception('Connect failed!');
        }  
        $mail->isSMTP();
        $mail->Host         = getenv('SMTP_HOST');
        $mail->SMTPSecure   = getenv('SMTP_SECURE');
        $mail->Port         = getenv('SMTP_PORT');
        $mail->SMTPAuth     = getenv('SMTP_AUTH');
        $mail->Username     = getenv('SMTP_USERNAME');
        $mail->Password     = getenv('SMTP_PASSWORD');

        if( $type == "lead" ){
            $mail->setFrom( "do-not-reply@valuecoders.com", $cname );
        }else{
            $mail->setFrom( "do-not-reply@valuecoders.com", 'ValueCoders');
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
        $body = mb_convert_encoding($body, 'UTF-8', mb_detect_encoding($body, 'UTF-8, ISO-8859-1, Windows-1252', 
        true));
        $body = html_entity_decode($body, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $mail->isHTML(true);
        $mail->CharSet  = 'UTF-8';
        $mail->Encoding = '8bit';
        $mail->Subject  = $subject;
        $mail->Body     = $body;
        $mail->send();
        return true; 
    }catch(Exception $e) {
        return false;
    }
}

//zohocrm api v2 update --23-Dec-2019
function zohoCrmUpdate_v2( $argArrData, $leadSource='', $owner_id = 658520861, $is_update = false ){
    $lead_id        = 0;
    $varEmail       = $argArrData['Email'];
    $varLastName    = $argArrData['Last Name'];
    $varFirstName   = $argArrData['First Name'];
    $varPhoneNo     = $argArrData['Phone'];
    $varLeadStatus  = $argArrData['Lead Status'];
    $varLeadSource  = $argArrData['Lead Source'];

    $varUTMSource   = $argArrData['UTM Source'];
    $varUTMMedium   = $argArrData['UTM Medium'];

    $varProperty    = $argArrData['Property'];
    $varIPAddress   = $argArrData['IP Address'];
    $varDescription = $argArrData['Description'];

    $user_country   = $argArrData['Country'];
    $varURL         = $argArrData['URL'];
    $varUploadedFiles = $argArrData['File Uploaded'];
    $varRequirements = $argArrData['Requirements'];
    $varRefURL       = $argArrData['refurl'];
    $postData = 'refresh_token='. REFRESH_TOKEN.'&client_id='.CLIENT_ID.'&client_secret='.CLIENT_SECRET.'&grant_type='.'refresh_token';
    $curl           = curl_init();

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
    curl_close( $curl );
    if(!$err){
        $zo_requirement = [];
        if (!empty($varURL)) {
            $zo_requirement[] = "URL: " . $varURL;
        }

        if (!empty($varUploadedFiles)) {
            $zo_requirement[] = "File Uploaded: " . $varUploadedFiles;
        }

        if (!empty($varRequirements)) {
            $zo_requirement[] = "Requirements: " . $varRequirements;
        }

        if (!empty($varPhoneNo)) {
            $zo_requirement[] = "Phone Number: " . $varPhoneNo;
        }
        $zo_requirement_string = implode("\n", $zo_requirement);
        $zo_requirement_string = trim($zo_requirement_string);

        $zoho_data = array(
        'First_Name'    => $varFirstName,
        'Last_Name'     => $varLastName,
        'Email'         => $varEmail,
        'Country1'      => $user_country,
        'Phone'         => validateZohoPhone( $varPhoneNo ),
        'Lead_Source'   => $varLeadSource,
        'Lead_Status'   => $varLeadStatus,
        'Owner'         => $owner_id,
        'Description'   => $zo_requirement_string,
        'Sales_Qualified_Lead' => "Yes",
        'Is_Duplicate'  => "No",
        'UTM_Source'    => $varUTMSource,
        'UTM_Medium'    => $varUTMMedium,
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
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => ($is_update !== false) ? "PUT" : "POST",
            CURLOPT_POSTFIELDS      => $postLeadData,
            CURLOPT_HTTPHEADER      => array(
                "authorization: Zoho-oauthtoken $varAccessToken",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response  = curl_exec($curl);
        $err       = curl_error($curl);
        curl_close($curl);
        if( !$err ){
            $body1          = '';
            $crmException   = $response;
            $response       = json_decode( $response );
            
            $rspCode    = ['DUPLICATE_DATA', 'SUCCESS'];
            $statusCode = (isset($response->data[0]) && !empty($response->data[0]->code)) ? $response->data[0]->code : '';
            
            if( !empty( $statusCode ) && !in_array($statusCode, $rspCode) ){
            $user_name = $varFirstName.' '.$varLastName;
            smtpEmailFunction( "web@vinove.com", "Zoho CRM error - ValueCoders", $crmException, "lead", 
            $varEmail, [], [], [], $user_name );
            }

            //Duplicate Lead Check.. 09.02.2023 NITIN BALUNI
            if( isset( $response->data[0] ) &&  ($response->data[0]->code == "DUPLICATE_DATA") ) :
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
                    $response   = json_decode( $response );
                    if( $is_update === false ){
                        dupLeadNote( $varAccessToken, $lead_id, $zo_requirement_string );
                    }                    
                    return $lead_id;
                }           
            endif;
            $lead_id = ( isset( $response->data[0] ) ) ? $response->data[0]->details->id : 0;            
        }
    }
    return $lead_id;
}

function hiddenBoatField( $type = "list" ){
    $botFields = [ 'first_name', 'last_name', 'email_user', 'user_dob', 'user_age', 'user_gender', 'user_phone', 'user_location', 
    'user_address', 'middle_name', 'nationality', 'city', 'state', 'zip', 'landmark', 'department', 'postal_code', 'hobbies', 
    'job_title', 'company' ];
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

function __notifySpam( $formData ){
    $ip                 = get_client_ip_user();
    $user_name          = nbHasData( $formData, 'user-name' );
    $user_email         = nbHasData( $formData, 'user-email' );
    $user_phone         = nbHasData( $formData, 'user-phone' );
    $user_country       = nbHasData( $formData, 'user-country' );
    $requirement        = nbHasData( $formData, 'user-req' );

    $emailBody = "Dear Admin,<br><br>We have detected a spam email originating from the following IP address, which has been automatically blocked to prevent further misuse. Below are the details of the incident, including the full content of the email and associated form data:<br><br>
    IP Address: ".$ip."<br>
    Email Address: ".$user_email."<br><br>Email Content:<br>";    

    $varDeliminator = "<br>";
    $body = "Name: ".$user_name.$varDeliminator;
    $body .= "Email: ".$user_email.$varDeliminator;
    $body .= "Phone: ".$user_phone.$varDeliminator;
    $body .= "Country: ".$user_country.$varDeliminator;
    $body .= "Requirements: ".$requirement.$varDeliminator;
    $uniqueId   = time().'_'.mt_rand(1000, 9999);
    $unlockURL  = "https://www.valuecoders.com/staging/?spam-unlock=".base64_encode($user_email)."&uid=".$uniqueId;    
    $body .= '<br><br><a href="'.$unlockURL.'">Click Here to unblock</a>';    
    smtpEmailFunction( "nitin.baluni@mail.vinove.com", "Spam Email Detected and IP Blocked", $emailBody.$body, "lead", $user_email, ['parvesh@vinove.com', 'vivek.avasthi@mail.vinove.com'], [], $user_name );
}

function dupLeadNote( $varAccessToken, $lead_id, $requirement ){
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
        $file       = fopen( CL_LOGFILE, "a" );
        fwrite( $file, PHP_EOL."Duplicate Lead Notes : ".print_r( $response, 1 ) );
        fclose( $file );
    }else{
        $file       = fopen( CL_LOGFILE, "a" );
        fwrite( $file, "Error Notes : ".$err );
        fclose( $file );
    }
    curl_close( $curl );
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
    for ($i = 0; $i < 4; $i++) {
        $ticketID .= rand(0, 9);
    }
    return $ticketID;
}

function temp_logSpamEmails( $formData ){
    $conn = _ConfigDBConnection();
    
    unset( $formData['g-recaptcha-response'] );
    $form_data   = [];
    $bl   = array('\"',"\'",'/','\\','"',"'");
    $wl   = array('&quot;','&#039;','&#047;', '&#092;','&quot;','&#039;');    
    
    foreach( $formData as $key => $value ){
        $tmpD = $value;
        if( ( $key == "user-req" ) ){
            $tmpD = str_replace($bl, $wl, $tmpD );
        }
        $form_data[$key] = $tmpD;
    }
    $userIP     = get_client_ip_user();
    $userEmail  = (isset($formData['user-email']) && !empty($formData['user-email'])) ? $formData['user-email'] : '';
    $form_data['ip_addr'] = $userIP;
    
    /*Added Spam Attacker Logs*/
    $stmt = $conn->prepare("SELECT COUNT(*) AS lead_count FROM spam_leads WHERE email = ? AND ip = ? AND TIMESTAMPDIFF(SECOND, created_at, NOW()) <= 120");

    $stmt->bind_param("ss", $userEmail, $userIP);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $row    = $result->fetch_assoc();
    $lead_count = $row['lead_count'];
    $stmt->close();

    if($lead_count >= 10){
        $insert_stmt = $conn->prepare( "INSERT INTO spam_attack (email, ip, created_at) VALUES (?, ?, NOW())" );
        $insert_stmt->bind_param("ss", $userEmail, $userIP);
        $insert_stmt->execute();
        $insert_stmt->close();
        __notifySpam( $formData );
    }
    /*Added Spam Attacker Logs : Close*/

    $data = serialize( $form_data );
    $sql = "INSERT INTO spam_leads ( data, email, ip, created_at ) VALUES ('{$data}', '{$userEmail}', '{$userIP}', NOW())";
    $conn->query( $sql );
    $conn->close(); 
}

function validateSpamAttacker( $email, $ip ){
    $conn = _ConfigDBConnection();

    $stmt = $conn->prepare("SELECT * FROM spam_attack WHERE (email = ? AND ip = ?) ORDER BY created_at DESC LIMIT 1;");
    $stmt->bind_param("ss", $email, $ip);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        return false;        
    }else{
        return true;
    }
    $conn->close();
}

function validatereCaptchaResponse( $captcha, $formdata ){
    if( preg_match('/\s/', $captcha) ){
        logSpamException( $formdata, 'Marked Spam Invalid reCaptcha Response Token ' );
        temp_logSpamEmails( $formdata );
        return false;
    }
    
    $response   = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfpW60nAAAAAOlG7J8lk1cOIk2x0O00Uqr9tErV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    if( ($response !== false) && (!empty($response)) ){
        $response = json_decode($response);        
        if($response->success === false){
            logSpamException( $formdata, 'Invalid Google reCaptcha Response' );
            temp_logSpamEmails( $formdata );
            return false;
        }else{
            return true;
        }
    }else{
        logSpamException( $formdata, 'Empty Google reCaptcha Response' );
        temp_logSpamEmails( $formdata );
        return false;
    }    
    return true;
}

function storeLeadsData( $data ){
    $conn       = _ConfigDBConnection();
    $created_at = date('Y-m-d H:i:s');

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
