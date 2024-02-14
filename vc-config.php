<?php 
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

function nbHasData( $array, $key ){
    return (isset($array[$key]) && !empty($array[$key])) ? $array[$key] : '';
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
    $form_data['ip_addr'] = get_client_ip_user();
    
    $data = serialize( $form_data );
    $sql = "INSERT INTO spam_leads ( data, created_at ) 
    VALUES (
    '{$data}',     
    '{$created_at}'
    )";
    $conn->query( $sql );
    $conn->close();    
}

function validatereCaptchaResponse( $captcha, $formdata ){
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfpW60nAAAAAOlG7J8lk1cOIk2x0O00Uqr9tErV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);
    if($response->success === false){
        logSpamException( $formdata, 'Invalid Google reCaptcha Response' );
        temp_logSpamEmails( $formdata );
        return false;
    }
    if( ($response->success == true) && ($response->score <= 0.5) ){
        logSpamException( $formdata, 'Invalid Google reCaptcha score' );
        temp_logSpamEmails( $formdata );
        return false;
    }
    return true;
}

function storeLeadsData( $data ){
    if( ($_SERVER['SERVER_NAME']=='www.valuecoders.com') || ($_SERVER['SERVER_NAME'] == 'valuecoders.com')  ){
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