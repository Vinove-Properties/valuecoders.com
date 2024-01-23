<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting( E_ALL );

$data = file_get_contents('php://input');
$json = json_decode($data, true);

define('CL_LOGFILE', '/home/valuecoders-com/public_html/log/crm.log');
$file = fopen(CL_LOGFILE,"a");
fwrite( $file, PHP_EOL."ADMIN API REQ - updated : ".time().print_r($json,true) );
fclose( $file );

if( isset( $json['event'] ) && ($json['event'] == "invitee.created") ) :
    $event_url  = $json['payload']['event'];
    $ecurl      = curl_init();
    curl_setopt_array( $ecurl, [
    CURLOPT_URL => $event_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJraWQiOiIxY2UxZTEzNjE3ZGNmNzY2YjNjZWJjY2Y4ZGM1YmFmYThhNjVlNjg0MDIzZjdjMzJiZTgzNDliMjM4MDEzNWI0IiwidHlwIjoiUEFUIiwiYWxnIjoiRVMyNTYifQ.eyJpc3MiOiJodHRwczovL2F1dGguY2FsZW5kbHkuY29tIiwiaWF0IjoxNjYyMDE2Mzg2LCJqdGkiOiI2YTQ4MDBjZC0xMzRiLTQ3ODUtOTkzMS0zMDMxMDZkZjZiNjkiLCJ1c2VyX3V1aWQiOiIzOTc3YmU2MC1jMWVmLTRkODItOWQ3ZS1jYjQ0MjEyZWQ3ZDUifQ.mXXcSySm2Lgjp6z_C_MOsmETsQYHB_r8kTD8qO7nU0hzo2FlVt968Ubkeaic7lZjGHfc4kTaAfohYevIfZXHfQ",
    "Content-Type: application/json"
    ],
    ]);
    $eventResp      = curl_exec( $ecurl );
    $err            = curl_error( $ceurl );
    curl_close($ceurl);
    $eDate = "000-00-00";
    $eTime = "00:00:00";
    
    if( $err ){
        $file = fopen("/home/valuecoc/calendly-log/sanjeev-cld.txt","a");
        fwrite( $file, print_r($err,1) );
        fwrite( $file, print_r($err,1) );
        fclose($file);
    }
    else{
        $eventJson  = json_decode($eventResp, true);
        $file = fopen("/home/valuecoc/calendly-log/sanjeev-cld.txt","a");
        fwrite( $file, print_r($eventJson,1) );
        fwrite( $file, print_r($json,1) );
        fclose($file);

        $eventdate    = $eventJson['resource']['start_time'];

        $datetime   = new DateTime( $eventdate );
        $eDate      = $datetime->format('Y-m-d');
        $la_time    = new DateTimeZone('Asia/Calcutta');
        $datetime->setTimezone($la_time);
        $eTime      = $datetime->format('H:i:s');

        $varFirstName = $varLastName = "";
        if( isset( $json['payload']['name'] ) ){
            $name           = $json['payload']['name'];
            $nameArray      = explode( " ", $name );
            $varFirstName   = $nameArray[0];
            $varLastName    = $nameArray[1];
        }
        $varEmail       = $json['payload']['email'];

        $flds           = $json['payload']['questions_and_answers'];
        $varPhoneNo     = $flds[0]['answer'];
        $company        = $flds[1]['answer'];
        $requirement    = $flds[2]['answer'];
        

        $CLIENT_ID      = '1000.BMJ414JAF95SXHD4YKRK0FJ3JC57VH';
        $CLIENT_SECRET  = 'e9a796ffde50de7a3198d63f134196d125bae343d0';
        $REFRESH_TOKEN  = '1000.b4d2d568df487f80bc73675a27101c45.d7cc4b483d0157d16f672e86dc354d62';

        $postData = 'refresh_token='.$REFRESH_TOKEN.'&client_id='.$CLIENT_ID.'&client_secret='.$CLIENT_SECRET.'&grant_type='.'refresh_token';

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://accounts.zoho.com/oauth/v2/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData,
        ));
        $response               = curl_exec($curl);
        $arrRefreshTokResponse  = json_decode($response,true);
        $varAccessToken         = $arrRefreshTokResponse['access_token'];
        $err                    = curl_error($curl);

        if($err){
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
            
            $zlead = PHP_EOL.$varEmail.":".$body;
            $file = fopen("/home/valuecoc/calendly-log/sanjeev-cld.txt","a");
            fwrite($file, $zlead);
            fclose($file);
        }else{
            $zoho_data = array(
            'First_Name'    => $varFirstName,
            'Last_Name'     => $varLastName,
            'Email'         => $varEmail,
            'Company'       => $company,
            'Country1'      => '',
            'Phone'         => $varPhoneNo,
            'Lead_Source'   => '',
            'Lead_Status'   => '',
            'Owner'         => 779804104,
            'Description'   => $requirement,
            'UTM_Source'    => '',
            'Property'      => '',
            'IP_Address1'   => '',
            'Ref_Url'       => ''
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

            $response  = curl_exec($curl);
            $err       = curl_error($curl);
            curl_close($curl);
            
            if($err){
                $file = fopen("/home/valuecoc/calendly-log/sanjeev-cld.txt","a");
                fwrite($file, "cURL Error #:" . $err);
                fclose($file);
            }else{
                $body1 = '';
                $response = json_decode($response); 
                $body1 .= "Details are:".print_r($response,1);
                $zlead = PHP_EOL.$varEmail.":".$body1;
                $file = fopen("/home/valuecoc/calendly-log/sanjeev-cld.txt","a");
                fwrite( $file, $zlead );
                fclose($file);
            }
            
        }
        $file = fopen("/home/valuecoc/calendly-log/sanjeev-cld.txt","a");
        fwrite( $file, time()."<br>" );
        fclose($file);
    }
endif;
die("Are You kidding Me");
?>