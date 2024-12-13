<?php
function checkInArray($needle, $haystack) {
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

$input_fld = 
["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","zMonaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland", "Eswatini", "Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"
];

function splEmailData( $is_country ){
    $is_country = trim( $is_country );
    $zoho_id = [
    'avi'       => 664032580, 
    'akhil'     => 708323463, 
    'sanjiv'    => 779804104, 
    'atul'      => 641628594, 
    'ankur'     => 658520861,
    'neha'      => 720093253,
    'pa'        => 668293911
    ];

$array_other = ['Congo, the Democratic Republic of the', 'Curaçao'];

$array_africa = [
'Angola',
'Burkina Faso',
'Burundi',
'Benin',
'Botswana',
'Central African Republic',
'Congo',
'Côte d\'Ivoire',
'Cameroon',
'Cabo Verde',
'Djibouti',
'Algeria',
'Egypt',
'Eritrea',
'Ethiopia',
'Gabon',
'Ghana',
'Gambia',
'Guinea',
'Equatorial Guinea',
'Guinea-Bissau',
'Kenya',
'Comoros',
'Liberia',
'Lesotho',
'Libya',
'Morocco',
'Madagascar',
'Mali',
'Mauritania',
'Mauritius',
'Malawi',
'Mozambique',
'Namibia',
'Niger',
'Nigeria',
'Rwanda',
'Seychelles',
'Sierra Leone',
'Senegal',
'Somalia',
'South Sudan',
'Sudan',
'Swaziland',
'Eswatini',
'Sao Tome and Principe',
'Chad',
'Togo',
'Tunisia',
'Tanzania, United Republic of',
'Uganda',
'South Africa',
'Zambia',
'Zimbabwe'
];

$array_me = [
'United Arab Emirates',
'uae',
'UAE',
'United Arab Emirates (UAE)',
'Bahrain',
'Israel',
'Jordan',
'Kuwait',
'Oman',
'Qatar',
'Saudi Arabia',
'Iraq',
'Yemen',
'Syrian Arab Republic'
];

$array_europe = [
    "Åland Islands",
    "Albania",
    "Andorra",
    "Antarctica",
    "Armenia",
    "Austria",
    "Azerbaijan",
    "Belarus",
    "Belgium",
    "Bosnia and Herzegovina",
    "Bouvet Island",
    "Bulgaria",
    "Collectivity of Saint Martin",
    "Croatia",
    "Cyprus",
    "Czechia",
    "Denmark",
    "Estonia",
    "Faroe Islands",
    "Finland",
    "France",
    "French Guiana",
    "French Polynesia",
    "French Southern Territories",
    "Georgia",
    "Germany",
    "Gibraltar",
    "Greece",
    "Greenland",
    "Guadeloupe",
    "Guernsey",
    "Heard Island and McDonald Islands",
    "Holy See",
    "Hungary",
    "Iceland",
    //"Ireland", #Moved to $array_uk Assinged to Akhil
    "Isle of Man",
    "Italy",
    "Jersey",
    "Latvia",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Macedonia, the former Yugoslav Republic of",
    "Malta",
    "Martinique",
    "Mayotte",
    "Moldova, Republic of",
    "Monaco",
    "Montenegro",
    "Netherlands",
    "New Caledonia",
    "Norway",
    "Poland",
    "Portugal",
    "Réunion",
    "Romania",
    "Russian Federation",
    "Saint Barthélemy",
    "Saint Helena, Ascension and Tristan da Cunha",
    "Saint Pierre and Miquelon",
    "San Marino",
    "Serbia",
    "Sint Maarten",
    "Slovakia",
    "Slovenia",
    "Spain",
    "Sweden",
    "Switzerland",
    "Turkey",
    "Ukraine",
    "Wallis and Futuna",
    "Western Sahara"
];

$array_uk   = ['United Kingdom', 'uk', 'UK', 'Ireland', 'ireland'];

// USA Segrated in 2 new Regin #North America #Latin America
$array_usa  = [
    'United States of America', 
    'USA', 
    'usa',
    'Brazil',
    'Colombia',
    'Argentina',
    'Peru',
    'Venezuela',
    'Chile',
    'Ecuador',
    'Bolivia',
    'Paraguay',
    'Uruguay',
    'Guyana',
    'Suriname',
    'Falkland Islands',
    'United States',
    'Canada'
];

$array_north_america = ['Canada', 'United States', 'United States of America','USA', 'usa'];
$array_latin_america = [
    "Anguilla",
    "Antigua and Barbuda",
    "Argentina",
    "Aruba",
    "Bahamas",
    "Barbados",
    "Belize",
    "Bermuda",
    "Bolivia, Plurinational State of",
    "Brazil",
    "Cayman Islands",
    "Chile",
    "Colombia",
    "Costa Rica",
    "Cuba",
    "Curaçao",
    "Dominica",
    "Dominican Republic",
    "Ecuador",
    "El Salvador",
    "Falkland Islands (Malvinas)",
    "Grenada",
    "Guatemala",
    "Guyana",
    "Haiti",
    "Honduras",
    "Jamaica",
    "Mexico",
    "Montserrat",
    "Nicaragua",
    "Panama",
    "Paraguay",
    "Peru",
    "Puerto Rico",
    "Saint Kitts and Nevis",
    "Saint Lucia",
    "Saint Vincent and the Grenadines",
    "South Georgia and the South Sandwich Islands",
    "Suriname",
    "Trinidad and Tobago",
    "Turks and Caicos Islands",
    "Uruguay",
    "Venezuela",
    "Virgin Islands, British",
    "Virgin Islands, U.S."
];


$array_apac = [
'American Samoa',
'Cook Islands',
//'Australia',
'Afghanistan',
'Bangladesh',
'Brunei Darussalam',
'Brunei',
'Bhutan',
'Cocos (Keeling) Islands',
'China',
'Christmas Island',
'Fiji',
'Micronesia, Federated States of',
'Guam',
'Hong Kong',
'Indonesia',
'Iran',
'British Indian Ocean Territory',
'Japan',
'Cambodia',
'Kiribati',
'Korea, Democratic People\'s Republic of',
'Korea, Republic of',
'Lao People\'s Democratic Republic',
'Sri Lanka',
'Marshall Islands',
'Myanmar',
'Mongolia',
'Macao',
'Northern Mariana Islands',
'Maldives',
'Malaysia',
'Norfolk Island',
'Nepal',
'Nauru',
'Niue',
//'New Zealand',
'Papua New Guinea',
'Philippines',
'Pakistan',
'Pitcairn',
'Palau',
'Solomon Islands',
'Singapore',
'Thailand',
'Tokelau',
'Timor-Leste',
'Timor L\'Este',
'Tonga',
'Tuvalu',
'Taiwan, Province of China',
'United States Minor Outlying Islands',
'Vietnam',
'Vanuatu',
'Samoa',
'North Korea',
'South Korea',
'Uzbekistan',
'Kazakhstan',
'Syria',
'Tajikistan',
'Laos',
'Lebanon',
'Kyrgyzstan',
'Turkmenistan',
'Palestine',
];
$array_anz = ['Australia', 'New Zealand'];
    $consoleArray = [];
    if( checkInArray( $is_country, $array_other ) ){
        $consoleArray = array( 
        'region'    => 'other',
        'lead_to'   => $zoho_id['pa'], 
        'mail_to'   => 'akhil@valuecoders.com', 
        'mail_cc'   => ['sanjiv@valuecoders.com', 'neha.raina@valuecoders.com']
        );
    }
    
    elseif( checkInArray( $is_country, $array_africa ) ){
        $consoleArray = array( 
            'region'    => 'africa', 
            'lead_to'   => $zoho_id['akhil'], 
            'mail_to'   => 'akhil@valuecoders.com', 
            'mail_cc'   => ['neha.raina@valuecoders.com']
        );
    }
    
    elseif( checkInArray( $is_country, $array_me ) ){
        $consoleArray = array( 
            'region'    => 'middle-east', 
            'lead_to'   => $zoho_id['sanjiv'], 
            'mail_to'   => 'sanjiv@valuecoders.com', 
            'mail_cc'   => ['neha.raina@valuecoders.com']
        );
    }

    elseif( checkInArray( $is_country, $array_europe ) ){
        $consoleArray = array( 
            'region'    => 'europe', 
            'lead_to'   => $zoho_id['pa'], 
            'mail_to'   => "pa", 
            'mail_cc'   => ['neha.raina@valuecoders.com']
        );
    }
    elseif( checkInArray( $is_country, $array_apac ) ){
        $consoleArray = array(
            'region'    => 'apac',
            'lead_to'   => $zoho_id['sanjiv'],
            'mail_to'   => 'sanjiv@valuecoders.com',
            'mail_cc'   => ['neha.raina@valuecoders.com']
        );
    }
    elseif( checkInArray( $is_country, $array_anz ) ){
        $consoleArray = array(
            'region'    => 'anz',
            'lead_to'   => $zoho_id['sanjiv'],
            'mail_to'   => 'sanjiv@valuecoders.com',
            'mail_cc'   => ['neha.raina@valuecoders.com']
        );
    }
    elseif( checkInArray( $is_country, $array_uk ) ){
        $consoleArray = array(
            'region'    => 'uk',
            'lead_to'   => $zoho_id['akhil'],
            'mail_to'   => 'akhil@valuecoders.com',
            'mail_cc'   => ['neha.raina@valuecoders.com']
        );
    }
    /*
    elseif( checkInArray( $is_country, $array_usa ) ){
        $consoleArray = array(
            'region'    => 'usa', 
            'lead_to'   => $zoho_id['akhil'],
            'mail_to'   => 'akhil@valuecoders.com',
            'mail_cc'   => ['neha.raina@valuecoders.com'] 
        );
    }
    */
    elseif( checkInArray( $is_country, $array_north_america ) ){
        $consoleArray = array(
            'region'    => 'usa', 
            'lead_to'   => $zoho_id['akhil'],
            'mail_to'   => 'akhil@valuecoders.com',
            'mail_cc'   => ['neha.raina@valuecoders.com', 'sanjiv@valuecoders.com'] 
        );
    }

    elseif( checkInArray( $is_country, $array_latin_america ) ){
        $consoleArray = array(
            'region'    => 'usa', 
            'lead_to'   => $zoho_id['akhil'],
            'mail_to'   => 'akhil@valuecoders.com',
            'mail_cc'   => ['neha.raina@valuecoders.com'] 
        );
    }
    
    elseif( strtolower($is_country) == 'india' ){
        $consoleArray = array( 
            'region'    => 'india', 
            'lead_to'   => $zoho_id['akhil'], 
            'mail_to'   => 'akhil@valuecoders.com', 
            'mail_cc'   => ['neha.raina@valuecoders.com'] 
        );
    }
    else{
         $consoleArray = array(
            'region'    => 'na', 
            'lead_to'   => $zoho_id['neha'],
            'mail_to'   => 'neha.raina@valuecoders.com', 
            'mail_cc'   => ['sanjiv@valuecoders.com', 'akhil@valuecoders.com']
        );
    }
    return $consoleArray;
}

/*
$datacheck = splEmailData('UK');
print_r( $datacheck );
*/