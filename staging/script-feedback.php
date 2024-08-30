<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if( ($_SERVER['REQUEST_METHOD'] == 'GET') && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ){
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die("HEY BOAT.. Go Away");
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'countries-array.php';
require 'vc-mailto.php';


function __issetEmpty( $array, $key ){
    return (isset($array[$key]) && !empty($array[$key])) ? $array[$key] : '';
}

function get_client_ip_user(){
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
        $mail->SMTPSecure   = 'ssl';
        $mail->Port         = 465;
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

$emailTO = ['parvesh@vinove.com', 'akhil@valuecoders.com', 'sanjiv@valuecoders.com'];

if( isset($_POST['frm-type']) &&  ($_POST['frm-type'] == "feedback") ){
$name       = __issetEmpty( $_POST, 'user-name' );
$email      = __issetEmpty( $_POST, 'user-email' );
$rating     = __issetEmpty( $_POST, 'rating' );
$resText    = __issetEmpty( $_POST, 'reason-text' );
$reason     = ( is_array($_POST['rt-reson']) && (count($_POST['rt-reson']) > 0) ) ? implode(", ", $_POST['rt-reson']) : false;

$Mailbody = "";
$bodyBr = "<br>";
//$Mailbody .= "=========================".$bodyBr;
$Mailbody .= "Name: ".$name.$bodyBr;
$Mailbody .= "Email: ".$email.$bodyBr;
$Mailbody .= "Rating: ".$rating.$bodyBr;
$Mailbody .= "Reason: ".$reason.$bodyBr;
if( $resText ){
$Mailbody .= "Other Reason : ".$resText.$bodyBr;    
}
$Mailbody .= "IP Address : ".get_client_ip_user();

$autoEmailBody = 'Dear '.$name.', <br><br>
Thank you for sharing your feedback with us. We value your input and appreciate you taking the time to help us improve our services.<br><br>
If you have any additional thoughts or concerns, please don\'t hesitate to reach out. We\'re here to ensure your experience with ValueCoders is the best it can be.
<br><br>
Best regards<br>
Team ValueCoders';
smtpEmailFunction($email, "Thank You for Your Feedback!", $autoEmailBody, "auto", $email,[],[],[]);

foreach( $emailTO as $mailTO ){
    $ccEMail = [];
    if( $mailTO == "sanjiv@valuecoders.com" ){
    $ccEMail = ['neha.raina@valuecoders.com', 'nitin.baluni@mail.vinove.com'];
    }
    smtpEmailFunction( $mailTO, "New Feedback Form Submission Received - ValueCoders", $Mailbody, "lead", $email, $ccEMail, 
    [], [], $name );
}
header('location: https://www.valuecoders.com/staging/thanks');
die;
}


if( isset($_POST['frm-type']) &&  ($_POST['frm-type'] == "paperwork") ){
$name       = __issetEmpty( $_POST, 'user-name' );
$email      = __issetEmpty( $_POST, 'user-email' );
$phone      = __issetEmpty( $_POST, 'user-phone' );
$company    = __issetEmpty( $_POST, 'user-company' );
$address    = __issetEmpty( $_POST, 'address' );
$authority  = __issetEmpty( $_POST, 'authority' );
$position   = __issetEmpty( $_POST, 'position' );
$expTime    = __issetEmpty( $_POST, 'expected-time' );
$uReq       = __issetEmpty( $_POST, 'requirement' );

$Mailbody = "";
$bodyBr = "<br>";
$Mailbody .= "Name: ".$name.$bodyBr;
$Mailbody .= "Email: ".$email.$bodyBr;
if( $phone ){
$Mailbody .= "Phone: ".$phone.$bodyBr;    
}
$Mailbody .= "Company Name: ".$company.$bodyBr;
$Mailbody .= "Company Address: ".$address.$bodyBr;
$Mailbody .= "Name of Signing Authority: ".$authority.$bodyBr;
$Mailbody .= "Title/Position: ".$position.$bodyBr;
$Mailbody .= "Expected Turnaround Time: ".$expTime.$bodyBr;
if( $uReq ){
$Mailbody .= "Expected Turnaround - Comment: ".$uReq.$bodyBr;
}
$Mailbody .= "IP Address : ".get_client_ip_user();
$autoEmailBody = 'Dear '.$name.', <br><br>
Thank you for filling out your details to start your project with ValueCoders. We\'re excited to work with you!<br><br>
We\'ll send the formal paperwork and agreement shortly. If you have any questions in the meantime, 
feel free to reach out.<br><br>
Looking forward to a great collaboration!<br><br>    
Best regards<br>
Team ValueCoders';
smtpEmailFunction($email, "Thank You for Trusting ValueCoders - Next Steps Await", $autoEmailBody, "auto", $email,[],[],[]);

foreach( $emailTO as $mailTO ){
    $ccEMail = [];
    if( $mailTO == "sanjiv@valuecoders.com" ){
    $ccEMail = ['neha.raina@valuecoders.com', 'nitin.baluni@mail.vinove.com'];
    }
    smtpEmailFunction( $mailTO, "Paperwork Details Form Data Received - ValueCoders", $Mailbody, "lead", $email, $ccEMail, 
    [], [], $name );
}

header('location: https://www.valuecoders.com/staging/thanks');
die;
}