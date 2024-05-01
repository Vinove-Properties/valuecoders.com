<?php
/* 
Template Name: formdata
*/
global $wpdb;
if(isset($_POST['fname'], $_POST['email'], $_POST['phoneno'], $_POST['country'], $_POST['postid'])){
//print_r($_POST); die;
$fname      = ucwords($_POST['fname']);
$email      = $_POST['email'];
$phoneno    = $_POST['phoneno'];
$country    = $_POST['country'];
$postid     = $_POST['postid'];
//$pdflink = $_POST['pdflink'];
$posttitle  = $_POST['posttitle'];
$hash       = md5( rand(0,1000) ); 
$date       = date("Y/m/d H:i:s");

$category_detail = get_the_category($postid);
foreach($category_detail as $cd){
    $slug = $cd->slug;
}
$table = 'wp_ebookdata';
    $result = $wpdb->insert($table, [
        "fname"     => $fname,
        "email"     => $email,
        "phone"     => $phoneno,
        "country"   => $country,
        "postid"    => $postid,
        //"pdflink" => $pdflink,
        "hashcode"  => $hash,
        "formdate"  => $date
    ]);
$link       =  get_permalink($postid).'?ep-action=show&email='.$email.'&hash='.$hash;   
$guidename  = get_post_meta($postid,'guide_name',true);
$to      = $email; // Send email to our user
$subject = 'Email Verification'; // Give the email a subject 
$message = '<html><body>';
$message .= '<p>Hi '.$fname.',</p>';
$message .= '<p>Thank you for opting for the downloaded version of our e-guide on "'.$guidename.'".</p>';
$message .= '<p>Please click the link below to verify your email address & initiate the download</p>';
$message .= '<p><a href="'.$link.'">'.$link.'</a></p>';
$message .= '<p>You may also wish to connect with us for more queries on outsourcing your software development projects - "<a href="https://www.valuecoders.com/?utm_source=blog&utm_medium=email&utm_campaign=eguide">Contact Us</a>"</p>';
$message .= '<p>Regards,<br>
Ved Raj<br>
Customer Delight Officer<br>
Valuecoders.com<br>
marketing@valuecoders.com<br>
</p>';
$message .= '</body></html>';
$headers    = array('Content-Type: text/html; charset=UTF-8');

$mail       = wp_mail( $to, $subject, $message, $headers );
if($mail){ 
?>
Thank you! We have sent you the email verification link via email. Please check your mail. <br><br>
P.S. - E-mail may take few minutes to arrive.
<?php 
}else{
    echo "Email Not Sent !!";
}
}
?>
<?php  //get_footer(); ?>