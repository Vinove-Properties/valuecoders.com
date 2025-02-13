<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function nbHasData( $array, $key ){
    return (isset($array[$key]) && !empty($array[$key])) ? $array[$key] : '';
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

        $mail->Host         = "smtp.gmail.com"; // SMTP server
        $mail->SMTPSecure   = 'tsl';
        $mail->Port         = 587;
        $mail->SMTPAuth     = true;
        $mail->Username     = 'do-not-reply@valuecoders.com';
        $mail->Password     = 'pdtnweysvgovhemg';

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
        /*
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;    
        $mail->send();
        return true;
        */
    }catch(Exception $e) {
        return false;
    }
}


define('CL_LOGFILE', '/home/valuecoders-com/public_html/log/crm.log');
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
    if( isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost") ){
      $servername = "localhost";
      $username   = "phpmyadmin";
      $password   = "root";
      $dbname     = "valuecoders-wp";
    }else{
      $servername = "localhost";
      $username   = "valuecoders-com-crm-prod-db-user";
      $password   = "5CxYSHEaVglFgCA";
      $dbname     = "valuecoders-com-crm-prod-db";
    }
    $created_at     = date('Y-m-d H:i:s');

    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
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
    if( isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost") ){
      $servername = "localhost";
      $username   = "phpmyadmin";
      $password   = "root";
      $dbname     = "valuecoders-wp";
    }else{
      $servername = "localhost";
      $username   = "valuecoders-com-crm-prod-db-user";
      $password   = "5CxYSHEaVglFgCA";
      $dbname     = "valuecoders-com-crm-prod-db";
    }
    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
        // if( ($response->success == true) && ($response->score <= 0.5) ){
        //     logSpamException( $formdata, 'Invalid Google reCaptcha score' );
        //     temp_logSpamEmails( $formdata );
        //     return false;
        // }
    }else{
        logSpamException( $formdata, 'Empty Google reCaptcha Response' );
        temp_logSpamEmails( $formdata );
        return false;
    }    
    return true;
}

function storeLeadsData( $data ){
    if( ($_SERVER['SERVER_NAME']=='www.valuecoders.com') || ($_SERVER['SERVER_NAME'] == 'valuecoders.com') ){
        $servername = "localhost";
        $username   = "valuecoders-com-crm-prod-db-user";
        $password   = "5CxYSHEaVglFgCA";
        $dbname     = "valuecoders-com-crm-prod-db";
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