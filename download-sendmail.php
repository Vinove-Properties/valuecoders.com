<?php
if( !isset( $_POST['issubmitted'] ) ){
   header('Location: https://www.valuecoders.com/');
   exit;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

sendmail_function( $_POST );

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
        $mail->Host         = "legolas.vinove.com"; // SMTP server
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

   
function sendmail_function($arrPostParams){
//$isContact = (isset($arrPostParams['vform-type']) && ($arrPostParams['vform-type'] == "contact")) ? true : false;
$user_name      = ucwords($arrPostParams['fname']);
$user_email     = $arrPostParams['email'];
$user_phone     = $arrPostParams['phoneno'];
$requirement    = $arrPostParams['fuserreq'];
$budget         = $arrPostParams['budget'];

$servername = "localhost";
$username = "valuecoc_wpsite";
$password = "W@89Uz*3J!gp6>dA";
$dbname = "valuecoc_wpsite";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error){
//die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `ratecard_download`(`name`, `email`, `phone`, `budget`, `requirment`)
VALUES ('$user_name', '$user_email', '$user_phone', '$budget', '$requirement')";
$conn->close();   

$url = 'https://www.valuecoders.com/v2wp/wp-content/themes/valuecoders/images/VC-RATE-CARD.pdf';    
$message = '<html><body>';
$message .= '<p>Hey '.$user_name.',</p>';
/*
$message .= '<p>Our team would like to appreciate your interest in the Rate Card. Here&#39;s your downloadable copy- "<a href="https://www.valuecoders.com/v2wp/wp-content/themes/valuecoders/dev-img/VC-RATE-CARD.pdf">Click here</a>"</p>';
*/
$message .= '<p>Our team would like to appreciate your interest in the Rate Card.</p>';
$message .= '<p>We know how important getting the right people in your business is.</p>';
$message .= '<p> If could offer any advice, let&#39;s chat about your goals with this particular hire- do they involve more clients coming through or better engagement rates?</p>';
//$message .= '<p></p>';
$message .= '<p>In case you have any questions, please do not hesitate to reply to this email</p>';
$message .= '<p>Cheers,<br>
Team Valuecoders <br>
sales@valuecoders.com<br>
</p>';
$message .= '</body></html>';

$message1 = '<html><body>';
$message1 .= '<p>Name: '.$user_name.'</p>';
$message1 .= '<p>Email: '.$user_email.'</p>';
$message1 .= '<p>Phone No.: '.$user_phone.'</p>';
$message1 .= '<p>Requirement:  '.$requirement.'</p>';
$message1 .= '<p>Budget : '.$budget.'</p>';
$message1 .= '</body></html>';
//$bccEmails = ['nitin.baluni@mail.vinove.com'];
$bccEmails = ['nitin.baluni@mail.vinove.com'];
smtpEmailFunction($user_email, "Rate card - Download PDF", $message, "auto", $user_email, [], [], ['/home/valuecoc/leads/vc-ratecard.pdf']);
smtpEmailFunction("sales@valuecoders.com", "Rate Card Inquiry", $message1, "lead", $user_email, [],$bccEmails,[], $user_name);
//header('location:thanks');
//die;
}
?>