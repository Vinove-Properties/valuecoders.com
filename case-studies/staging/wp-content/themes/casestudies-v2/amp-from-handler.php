<?php
if(!empty($_POST))
{
    /*/ this is the email we get from visitors*/
    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    //$redirect_url = 'http://localhost/amp/thank-you.html';
    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: *");
    header("AMP-Access-Control-Allow-Source-Origin: ".$domain_url);
    /*/--Assuming all validations are good here--*/
    if( empty($redirect_url))
    {
        header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
        echo json_encode(array('message'=>$_POST['name'].'My success message. [It will be displayed shortly(!) if with redirect]'));
    }
    else
    {
        header("AMP-Redirect-To: ".$redirect_url);
        header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
        echo json_encode(array('message'=>$_POST['name'].'My success message. [It will be displayed shortly(!) if with redirect]'));        
    }        
    die();
}?>