<?php
require_once __DIR__ . '/envloader.php';
loadEnv();

$data = file_get_contents('php://input');
$json = json_decode($data, true);
function globalCountryListAry( $dcode ){
    $country_list = array(
        array("name" => "Afghanistan","code" => "AF","phone" => 93),
        array("name" => "Aland Islands","code" => "AX","phone" => 358),
        array("name" => "Albania","code" => "AL","phone" => 355),
        array("name" => "Algeria","code" => "DZ","phone" => 213),
        array("name" => "American Samoa","code" => "AS","phone" => 1684),
        array("name" => "Andorra","code" => "AD","phone" => 376),
        array("name" => "Angola","code" => "AO","phone" => 244),
        array("name" => "Anguilla","code" => "AI","phone" => 1264),
        array("name" => "Antarctica","code" => "AQ","phone" => 672),
        array("name" => "Antigua and Barbuda","code" => "AG","phone" => 1268),
        array("name" => "Argentina","code" => "AR","phone" => 54),
        array("name" => "Armenia","code" => "AM","phone" => 374),
        array("name" => "Aruba","code" => "AW","phone" => 297),
        array("name" => "Australia","code" => "AU","phone" => 61),
        array("name" => "Austria","code" => "AT","phone" => 43),
        array("name" => "Azerbaijan","code" => "AZ","phone" => 994),
        array("name" => "Bahamas","code" => "BS","phone" => 1242),
        array("name" => "Bahrain","code" => "BH","phone" => 973),
        array("name" => "Bangladesh","code" => "BD","phone" => 880),
        array("name" => "Barbados","code" => "BB","phone" => 1246),
        array("name" => "Belarus","code" => "BY","phone" => 375),
        array("name" => "Belgium","code" => "BE","phone" => 32),
        array("name" => "Belize","code" => "BZ","phone" => 501),
        array("name" => "Benin","code" => "BJ","phone" => 229),
        array("name" => "Bermuda","code" => "BM","phone" => 1441),
        array("name" => "Bhutan","code" => "BT","phone" => 975),
        array("name" => "Bolivia","code" => "BO","phone" => 591),
        array("name" => "Bonaire, Sint Eustatius and Saba","code" => "BQ","phone" => 599),
        array("name" => "Bosnia and Herzegovina","code" => "BA","phone" => 387),
        array("name" => "Botswana","code" => "BW","phone" => 267),
        array("name" => "Bouvet Island","code" => "BV","phone" => 55),
        array("name" => "Brazil","code" => "BR","phone" => 55),
        array("name" => "British Indian Ocean Territory","code" => "IO","phone" => 246),
        array("name" => "Brunei Darussalam","code" => "BN","phone" => 673),
        array("name" => "Bulgaria","code" => "BG","phone" => 359),
        array("name" => "Burkina Faso","code" => "BF","phone" => 226),
        array("name" => "Burundi","code" => "BI","phone" => 257),
        array("name" => "Cambodia","code" => "KH","phone" => 855),
        array("name" => "Cameroon","code" => "CM","phone" => 237),
        array("name" => "Canada","code" => "CA","phone" => 1),
        array("name" => "Cape Verde","code" => "CV","phone" => 238),
        array("name" => "Cayman Islands","code" => "KY","phone" => 1345),
        array("name" => "Central African Republic","code" => "CF","phone" => 236),
        array("name" => "Chad","code" => "TD","phone" => 235),
        array("name" => "Chile","code" => "CL","phone" => 56),
        array("name" => "China","code" => "CN","phone" => 86),
        array("name" => "Christmas Island","code" => "CX","phone" => 61),
        array("name" => "Cocos (Keeling) Islands","code" => "CC","phone" => 672),
        array("name" => "Colombia","code" => "CO","phone" => 57),
        array("name" => "Comoros","code" => "KM","phone" => 269),
        array("name" => "Congo","code" => "CG","phone" => 242),
        array("name" => "Congo, Democratic Republic of the Congo","code" => "CD","phone" => 242),
        array("name" => "Cook Islands","code" => "CK","phone" => 682),
        array("name" => "Costa Rica","code" => "CR","phone" => 506),
        array("name" => "Cote D'Ivoire","code" => "CI","phone" => 225),
        array("name" => "Croatia","code" => "HR","phone" => 385),
        array("name" => "Cuba","code" => "CU","phone" => 53),
        array("name" => "Curacao","code" => "CW","phone" => 599),
        array("name" => "Cyprus","code" => "CY","phone" => 357),
        array("name" => "Czech Republic","code" => "CZ","phone" => 420),
        array("name" => "Denmark","code" => "DK","phone" => 45),
        array("name" => "Djibouti","code" => "DJ","phone" => 253),
        array("name" => "Dominica","code" => "DM","phone" => 1767),
        array("name" => "Dominican Republic","code" => "DO","phone" => 1809),
        array("name" => "Ecuador","code" => "EC","phone" => 593),
        array("name" => "Egypt","code" => "EG","phone" => 20),
        array("name" => "El Salvador","code" => "SV","phone" => 503),
        array("name" => "Equatorial Guinea","code" => "GQ","phone" => 240),
        array("name" => "Eritrea","code" => "ER","phone" => 291),
        array("name" => "Estonia","code" => "EE","phone" => 372),
        array("name" => "Ethiopia","code" => "ET","phone" => 251),
        array("name" => "Falkland Islands (Malvinas)","code" => "FK","phone" => 500),
        array("name" => "Faroe Islands","code" => "FO","phone" => 298),
        array("name" => "Fiji","code" => "FJ","phone" => 679),
        array("name" => "Finland","code" => "FI","phone" => 358),
        array("name" => "France","code" => "FR","phone" => 33),
        array("name" => "French Guiana","code" => "GF","phone" => 594),
        array("name" => "French Polynesia","code" => "PF","phone" => 689),
        array("name" => "French Southern Territories","code" => "TF","phone" => 262),
        array("name" => "Gabon","code" => "GA","phone" => 241),
        array("name" => "Gambia","code" => "GM","phone" => 220),
        array("name" => "Georgia","code" => "GE","phone" => 995),
        array("name" => "Germany","code" => "DE","phone" => 49),
        array("name" => "Ghana","code" => "GH","phone" => 233),
        array("name" => "Gibraltar","code" => "GI","phone" => 350),
        array("name" => "Greece","code" => "GR","phone" => 30),
        array("name" => "Greenland","code" => "GL","phone" => 299),
        array("name" => "Grenada","code" => "GD","phone" => 1473),
        array("name" => "Guadeloupe","code" => "GP","phone" => 590),
        array("name" => "Guam","code" => "GU","phone" => 1671),
        array("name" => "Guatemala","code" => "GT","phone" => 502),
        array("name" => "Guernsey","code" => "GG","phone" => 44),
        array("name" => "Guinea","code" => "GN","phone" => 224),
        array("name" => "Guinea-Bissau","code" => "GW","phone" => 245),
        array("name" => "Guyana","code" => "GY","phone" => 592),
        array("name" => "Haiti","code" => "HT","phone" => 509),
        array("name" => "Heard Island and McDonald Islands","code" => "HM","phone" => 0),
        array("name" => "Holy See (Vatican City State)","code" => "VA","phone" => 39),
        array("name" => "Honduras","code" => "HN","phone" => 504),
        array("name" => "Hong Kong","code" => "HK","phone" => 852),
        array("name" => "Hungary","code" => "HU","phone" => 36),
        array("name" => "Iceland","code" => "IS","phone" => 354),
        array("name" => "India","code" => "IN","phone" => 91),
        array("name" => "Indonesia","code" => "ID","phone" => 62),
        array("name" => "Iran, Islamic Republic of","code" => "IR","phone" => 98),
        array("name" => "Iraq","code" => "IQ","phone" => 964),
        array("name" => "Ireland","code" => "IE","phone" => 353),
        array("name" => "Isle of Man","code" => "IM","phone" => 44),
        array("name" => "Israel","code" => "IL","phone" => 972),
        array("name" => "Italy","code" => "IT","phone" => 39),
        array("name" => "Jamaica","code" => "JM","phone" => 1876),
        array("name" => "Japan","code" => "JP","phone" => 81),
        array("name" => "Jersey","code" => "JE","phone" => 44),
        array("name" => "Jordan","code" => "JO","phone" => 962),
        array("name" => "Kazakhstan","code" => "KZ","phone" => 7),
        array("name" => "Kenya","code" => "KE","phone" => 254),
        array("name" => "Kiribati","code" => "KI","phone" => 686),
        array("name" => "Korea, Democratic People's Republic of","code" => "KP","phone" => 850),
        array("name" => "Korea, Republic of","code" => "KR","phone" => 82),
        array("name" => "Kosovo","code" => "XK","phone" => 383),
        array("name" => "Kuwait","code" => "KW","phone" => 965),
        array("name" => "Kyrgyzstan","code" => "KG","phone" => 996),
        array("name" => "Lao People's Democratic Republic","code" => "LA","phone" => 856),
        array("name" => "Latvia","code" => "LV","phone" => 371),
        array("name" => "Lebanon","code" => "LB","phone" => 961),
        array("name" => "Lesotho","code" => "LS","phone" => 266),
        array("name" => "Liberia","code" => "LR","phone" => 231),
        array("name" => "Libyan Arab Jamahiriya","code" => "LY","phone" => 218),
        array("name" => "Liechtenstein","code" => "LI","phone" => 423),
        array("name" => "Lithuania","code" => "LT","phone" => 370),
        array("name" => "Luxembourg","code" => "LU","phone" => 352),
        array("name" => "Macao","code" => "MO","phone" => 853),
        array("name" => "Macedonia, the Former Yugoslav Republic of","code" => "MK","phone" => 389),
        array("name" => "Madagascar","code" => "MG","phone" => 261),
        array("name" => "Malawi","code" => "MW","phone" => 265),
        array("name" => "Malaysia","code" => "MY","phone" => 60),
        array("name" => "Maldives","code" => "MV","phone" => 960),
        array("name" => "Mali","code" => "ML","phone" => 223),
        array("name" => "Malta","code" => "MT","phone" => 356),
        array("name" => "Marshall Islands","code" => "MH","phone" => 692),
        array("name" => "Martinique","code" => "MQ","phone" => 596),
        array("name" => "Mauritania","code" => "MR","phone" => 222),
        array("name" => "Mauritius","code" => "MU","phone" => 230),
        array("name" => "Mayotte","code" => "YT","phone" => 262),
        array("name" => "Mexico","code" => "MX","phone" => 52),
        array("name" => "Micronesia, Federated States of","code" => "FM","phone" => 691),
        array("name" => "Moldova, Republic of","code" => "MD","phone" => 373),
        array("name" => "Monaco","code" => "MC","phone" => 377),
        array("name" => "Mongolia","code" => "MN","phone" => 976),
        array("name" => "Montenegro","code" => "ME","phone" => 382),
        array("name" => "Montserrat","code" => "MS","phone" => 1664),
        array("name" => "Morocco","code" => "MA","phone" => 212),
        array("name" => "Mozambique","code" => "MZ","phone" => 258),
        array("name" => "Myanmar","code" => "MM","phone" => 95),
        array("name" => "Namibia","code" => "NA","phone" => 264),
        array("name" => "Nauru","code" => "NR","phone" => 674),
        array("name" => "Nepal","code" => "NP","phone" => 977),
        array("name" => "Netherlands","code" => "NL","phone" => 31),
        array("name" => "Netherlands Antilles","code" => "AN","phone" => 599),
        array("name" => "New Caledonia","code" => "NC","phone" => 687),
        array("name" => "New Zealand","code" => "NZ","phone" => 64),
        array("name" => "Nicaragua","code" => "NI","phone" => 505),
        array("name" => "Niger","code" => "NE","phone" => 227),
        array("name" => "Nigeria","code" => "NG","phone" => 234),
        array("name" => "Niue","code" => "NU","phone" => 683),
        array("name" => "Norfolk Island","code" => "NF","phone" => 672),
        array("name" => "Northern Mariana Islands","code" => "MP","phone" => 1670),
        array("name" => "Norway","code" => "NO","phone" => 47),
        array("name" => "Oman","code" => "OM","phone" => 968),
        array("name" => "Pakistan","code" => "PK","phone" => 92),
        array("name" => "Palau","code" => "PW","phone" => 680),
        array("name" => "Palestinian Territory, Occupied","code" => "PS","phone" => 970),
        array("name" => "Panama","code" => "PA","phone" => 507),
        array("name" => "Papua New Guinea","code" => "PG","phone" => 675),
        array("name" => "Paraguay","code" => "PY","phone" => 595),
        array("name" => "Peru","code" => "PE","phone" => 51),
        array("name" => "Philippines","code" => "PH","phone" => 63),
        array("name" => "Pitcairn","code" => "PN","phone" => 64),
        array("name" => "Poland","code" => "PL","phone" => 48),
        array("name" => "Portugal","code" => "PT","phone" => 351),
        array("name" => "Puerto Rico","code" => "PR","phone" => 1787),
        array("name" => "Qatar","code" => "QA","phone" => 974),
        array("name" => "Reunion","code" => "RE","phone" => 262),
        array("name" => "Romania","code" => "RO","phone" => 40),
        array("name" => "Russian Federation","code" => "RU","phone" => 7),
        array("name" => "Rwanda","code" => "RW","phone" => 250),
        array("name" => "Saint Barthelemy","code" => "BL","phone" => 590),
        array("name" => "Saint Helena","code" => "SH","phone" => 290),
        array("name" => "Saint Kitts and Nevis","code" => "KN","phone" => 1869),
        array("name" => "Saint Lucia","code" => "LC","phone" => 1758),
        array("name" => "Saint Martin","code" => "MF","phone" => 590),
        array("name" => "Saint Pierre and Miquelon","code" => "PM","phone" => 508),
        array("name" => "Saint Vincent and the Grenadines","code" => "VC","phone" => 1784),
        array("name" => "Samoa","code" => "WS","phone" => 684),
        array("name" => "San Marino","code" => "SM","phone" => 378),
        array("name" => "Sao Tome and Principe","code" => "ST","phone" => 239),
        array("name" => "Saudi Arabia","code" => "SA","phone" => 966),
        array("name" => "Senegal","code" => "SN","phone" => 221),
        array("name" => "Serbia","code" => "RS","phone" => 381),
        array("name" => "Serbia and Montenegro","code" => "CS","phone" => 381),
        array("name" => "Seychelles","code" => "SC","phone" => 248),
        array("name" => "Sierra Leone","code" => "SL","phone" => 232),
        array("name" => "Singapore","code" => "SG","phone" => 65),
        array("name" => "St Martin","code" => "SX","phone" => 721),
        array("name" => "Slovakia","code" => "SK","phone" => 421),
        array("name" => "Slovenia","code" => "SI","phone" => 386),
        array("name" => "Solomon Islands","code" => "SB","phone" => 677),
        array("name" => "Somalia","code" => "SO","phone" => 252),
        array("name" => "South Africa","code" => "ZA","phone" => 27),
        array("name" => "South Georgia and the South Sandwich Islands","code" => "GS","phone" => 500),
        array("name" => "South Sudan","code" => "SS","phone" => 211),
        array("name" => "Spain","code" => "ES","phone" => 34),
        array("name" => "Sri Lanka","code" => "LK","phone" => 94),
        array("name" => "Sudan","code" => "SD","phone" => 249),
        array("name" => "Suriname","code" => "SR","phone" => 597),
        array("name" => "Svalbard and Jan Mayen","code" => "SJ","phone" => 47),
        array("name" => "Swaziland","code" => "SZ","phone" => 268),
        array("name" => "Sweden","code" => "SE","phone" => 46),
        array("name" => "Switzerland","code" => "CH","phone" => 41),
        array("name" => "Syrian Arab Republic","code" => "SY","phone" => 963),
        array("name" => "Taiwan, Province of China","code" => "TW","phone" => 886),
        array("name" => "Tajikistan","code" => "TJ","phone" => 992),
        array("name" => "Tanzania, United Republic of","code" => "TZ","phone" => 255),
        array("name" => "Thailand","code" => "TH","phone" => 66),
        array("name" => "Timor-Leste","code" => "TL","phone" => 670),
        array("name" => "Togo","code" => "TG","phone" => 228),
        array("name" => "Tokelau","code" => "TK","phone" => 690),
        array("name" => "Tonga","code" => "TO","phone" => 676),
        array("name" => "Trinidad and Tobago","code" => "TT","phone" => 1868),
        array("name" => "Tunisia","code" => "TN","phone" => 216),
        array("name" => "Turkey","code" => "TR","phone" => 90),
        array("name" => "Turkmenistan","code" => "TM","phone" => 7370),
        array("name" => "Turks and Caicos Islands","code" => "TC","phone" => 1649),
        array("name" => "Tuvalu","code" => "TV","phone" => 688),
        array("name" => "Uganda","code" => "UG","phone" => 256),
        array("name" => "Ukraine","code" => "UA","phone" => 380),
        array("name" => "United Arab Emirates","code" => "AE","phone" => 971),
        array("name" => "United Kingdom","code" => "GB","phone" => 44),
        array("name" => "United States","code" => "US","phone" => 1),
        array("name" => "United States Minor Outlying Islands","code" => "UM","phone" => 1),
        array("name" => "Uruguay","code" => "UY","phone" => 598),
        array("name" => "Uzbekistan","code" => "UZ","phone" => 998),
        array("name" => "Vanuatu","code" => "VU","phone" => 678),
        array("name" => "Venezuela","code" => "VE","phone" => 58),
        array("name" => "Viet Nam","code" => "VN","phone" => 84),
        array("name" => "Virgin Islands, British","code" => "VG","phone" => 1284),
        array("name" => "Virgin Islands, U.s.","code" => "VI","phone" => 1340),
        array("name" => "Wallis and Futuna","code" => "WF","phone" => 681),
        array("name" => "Western Sahara","code" => "EH","phone" => 212),
        array("name" => "Yemen","code" => "YE","phone" => 967),
        array("name" => "Zambia","code" => "ZM","phone" => 260),
        array("name" => "Zimbabwe","code" => "ZW","phone" => 263)
    );
    $dialCode = str_replace("+", "", $dcode);
    $key = array_search( $dialCode, array_column($country_list, 'phone') );    
    if( $key ){
        return $country_list[$key]['name'];
    }else{
        return false;
    }    
}

function get_visitor_ip(){
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR']       = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP']    = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    return $ip;
}

define('CL_LOGFILE', '/home/valuecoders-com/public_html/log/crm.log');
$file = fopen(CL_LOGFILE,"a");
fwrite( $file, PHP_EOL.print_r($json,true) );
fclose( $file );

if( isset( $json['event'] ) && $json['event'] == "invitee.created" ){
    $event_url  = $json['payload']['event'];
    $firtName = $lastName = "";
    if( isset( $json['payload']['name'] ) ){
        $name = $json['payload']['name'];
        $nameArray  = explode( " ", $name );
        $firtName   = $nameArray[0];
        $lastName   = $nameArray[1];
    }
    $utm_source = $utm_medium = $utm_campaign = $pageUrl = '';

    if( isset($json['payload']['tracking']['utm_source']) && !empty($json['payload']['tracking']['utm_source']) ){
        $getUTM_source = $json['payload']['tracking']['utm_source'];

        if( $getUTM_source == "gglads" ){
            $utm_source = "Advertisement: Google";
        }elseif( $getUTM_source == "bingads" ){
            $utm_source = "Advertisement: Bing";
        }elseif( $getUTM_source == "facebookpaid" ){
            $utm_source = "Advertisement: FaceBook";
        }elseif( $getUTM_source == "quorapaid" ){
            $utm_source = "Advertisement: Quora";
        }elseif( $getUTM_source == "linkedinads" ){
            $utm_source = "Advertisement: LinkedIN";
        }elseif( $getUTM_source == "adroll" ){
            $utm_source = "Advertisement: Adroll";
        }else{
            $utm_source = "Calendly Webhook";
        }
    }
    
    if( isset( $json['payload']['tracking']['utm_term'] ) && !empty( $json['payload']['tracking']['utm_term'] ) ){
        $followPageUrl  = $json['payload']['tracking']['utm_term'];
        $pageUrl        = $json['payload']['tracking']['utm_term'];
    }


    if( isset( $json['payload']['tracking']['utm_campaign'] ) ){
        $utm_campaign = $json['payload']['tracking']['utm_campaign'];
    }

    if( isset( $json['payload']['tracking']['utm_medium'] ) ){
        $utm_medium = $json['payload']['tracking']['utm_medium'];
    }
    
    $phone      = isset($json['payload']['text_reminder_number']) && !empty($json['payload']['text_reminder_number']) ? $json['payload']['text_reminder_number'] : false;

    if( $phone === false ){
        $phone = (
        isset($json['payload']['questions_and_answers'][0]['answer']) && 
        !empty($json['payload']['questions_and_answers'][0]['answer'])
        ) ? $json['payload']['questions_and_answers'][0]['answer'] : '';
    }
    
    $phoneee    = explode(" ", $phone);    
    $country    = ( isset( $phoneee[0] ) ) ? globalCountryListAry( $phoneee[0] ) : "";
    $email      = $json['payload']['email'];
    $ipAddress  = get_visitor_ip();

    $comment    = "";
    $flds       = $json['payload']['questions_and_answers'];
    if( $flds ){
        foreach( $flds as $row){
            $comment .= "\n".$row['question']." : ".$row['answer'];
        }
    }

    $calBlockStatus = "Calendly Direct";
    if( !empty( $followPageUrl ) ){
        $comment .= "\n Source Page : ".$followPageUrl;
        $calBlockStatus = "From website landed to Calendly";
    }

    /*
    $comment    = $flds[0]['answer'];
    $startFrm   = $flds[1]['answer'];
    $howLong    = $flds[2]['answer'];
            
    if( !empty($startFrm) ){
        $comment .= "\n When are you looking to start : ".$startFrm;
    }

    if( !empty($howLong) ){
        $comment .= "\n How long would you need the professionals for : ".$howLong;
    }
    */

    /*Zoho CRM Code Starts Here*/
    $CLIENT_ID      = getenv('ZOHO_CLIENT_ID');
    $CLIENT_SECRET  = getenv('ZOHO_CLIENT_SECRET');
    $REFRESH_TOKEN  = getenv('ZOHO_REFRESH_TOKEN');
    $owner_id       = 668293911;
    $postData       = 'refresh_token='.$REFRESH_TOKEN.'&client_id='.$CLIENT_ID.'&client_secret='.$CLIENT_SECRET.'&grant_type='.'refresh_token';
    $curl = curl_init();
    curl_setopt_array( $curl, array(
        CURLOPT_URL => "https://accounts.zoho.com/oauth/v2/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData
    ) );
    $response = curl_exec($curl);
    $arrRefreshTokResponse =json_decode($response,true);
    $varAccessToken = $arrRefreshTokResponse['access_token'];
    $err = curl_error($curl);
    curl_close( $curl );
    
    if( !$err ){
    $curl = curl_init();
    $sJSON = json_encode(array(
    'First_Name'    => $firtName,
    'Last_Name'     => (!empty($lastName)) ? $lastName : "NA",
    'Email'         => $json['payload']['email'],
    'Country'       => $country,
    //'Country1'      => $country,
    'Property'      => 'ValueCoders',
    'Phone'         => $phone,
    'Lead_Source'   => "Calendly Direct",
    'Lead_Status'   => "Not Contacted Yet",
    'Owner'         => $owner_id,
    'SQL'           => "Yes",
    'Sales_Qualified_Lead' => "Yes",
    'IP_Address1'   => get_visitor_ip(),
    'IP_Address'    => get_visitor_ip(),
    'UTM_Source'    => $utm_source,
    'Description'   => $comment,
    'UTM_Medium'    => $utm_medium,
    'UTM_Campaign'  => $utm_campaign,
    'Company_Headcount' => "",
    'Calendly_Booked'   => "Yes",
    'Ref_Url'        => $pageUrl
    ));

    $sJSON          = str_replace('{','[{',$sJSON);
    $sJSON          = str_replace('}','}]',$sJSON);
    $postLeadData   = '{"data":' . $sJSON . '}';
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
    $response   = curl_exec($curl);
    
    $responseLL   = json_decode( $response );
    $file       = fopen(CL_LOGFILE,"a");
    fwrite( $file, PHP_EOL.$email."_:_".print_r($responseLL,1) );
    fclose( $file ); 
                    
    $err        = curl_error($curl);
    if( !$err ){
        $response   = json_decode( $response );
        if( isset($response->data[0]) && ($response->data[0]->code == "DUPLICATE_DATA") ) :
            $lead_id = ( isset( $response->data[0] ) ) ? $response->data[0]->details->id : 0;
            if( $lead_id !== 0 ){
                $zoho_data = array(
                'id'                => $lead_id,
                'First_Name'        => $firtName,
                'Last_Name'         => (!empty($lastName)) ? $lastName : "NA",
                'Company'           => "",
                'Lead_Status'       => "Not Contacted Yet",
                //'Lead_Source'     => "",
                'Property'          => 'ValueCoders',
		'Is_Duplicate'      => "Yes",
                'Calendly_Booked'   => "Yes",
                'SQL'               => "Yes",
                'Phone'             => $phone,
                'Company_Headcount' => "",
                'Description'       => $comment
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

                $response   = curl_exec($curl);
                $err        = curl_error($curl);
                if( !$err ){
                    $response   = json_decode( $response );
                    $file       = fopen(CL_LOGFILE,"a");
                    fwrite( $file, PHP_EOL.$email.":".print_r($response,1) );
                    fclose( $file );    
                }else{
                    $file       = fopen(CL_LOGFILE,"a");
                    fwrite( $file, "Error in Zoho Entry :".$err );
                    fclose( $file );    
                }
                curl_close( $curl );

                date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST
                $currentDateTime = new DateTime();
                $formattedDate = $currentDateTime->format('jS F Y \a\t g:i A');

                $notesRequest = 'https://www.zohoapis.com/crm/v2/Leads/'.$lead_id.'/Notes';
                $notes_data = [
                'Note_Content'  => 'New Inquiry Received from ValueCoders on '.$formattedDate.'. Content below:'."\n ".$comment."\n Calendly Booking : ".$calBlockStatus,
                'se_module'     => 'Leads'
                ];
                $nJSON  = json_encode( $notes_data );
                $nJSON  = str_replace('{','[{',$nJSON);
                $nJSON  = str_replace('}','}]',$nJSON);
                $postNotesData = '{"data":' . $nJSON . '}';

                $curl   = curl_init();        
                $sJSON  = json_encode( $zoho_data );
                $sJSON  = str_replace('{','[{',$sJSON);
                $sJSON  = str_replace('}','}]',$sJSON);
                $postLeadData = '{"data":' . $sJSON . '}';
                curl_setopt_array($curl, array(
                CURLOPT_URL => $notesRequest,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => "POST",
                CURLOPT_POSTFIELDS      => $postNotesData,
                CURLOPT_HTTPHEADER      => array(
                "authorization: Zoho-oauthtoken $varAccessToken",
                "cache-control: no-cache",
                "content-type: application/json"
                ),
                ));

                $response   = curl_exec($curl);
                $err        = curl_error($curl);
                if( !$err ){
                    $response   = json_decode( $response );
                    $file       = fopen(CL_LOGFILE,"a");
                    fwrite( $file, PHP_EOL."Notes : ".print_r($response,1) );
                    fclose( $file );    
                }else{
                    $file       = fopen(CL_LOGFILE,"a");
                    fwrite( $file, "Error Notes : ".$err );
                    fclose( $file );    
                }
                curl_close( $curl );                
            }
        endif;
    }else{
        
    }
    curl_close($curl);
    }    
}
?>