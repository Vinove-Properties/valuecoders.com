<?php
session_start();
//require_once('common/config/config.inc.php');
//require_once('classes/class.pipeDrive.php');
//require_once('classes/class.mailchimp.php');

$varIPAdd = $_SERVER['REMOTE_ADDR'];
$varBrowserInfo = $_SERVER['HTTP_USER_AGENT'];
$varDateAdded = date('Y-m-d H:i:s');
$url = SITE_ROOT_URL . "common/uploaded_files/request_a_quote";
$varRefererURL = $_SERVER[HTTP_REFERER];

$varPayMailTo = PAYMENT_EMAIL;
$varConMailTo = "sanjiv.sethi@pixelcrayons.com";
$varFedMailTo = FEEDBACK_EMAIL;
$varMailCc = ADMIN_EMAIL;
$varMailBCc = "sanjiv.sethi@pixelcrayons.com";


$headers = "From: ashutosh.jha@mail.vinove.com";
$headers = "MIME-Version: 1.0";
$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
 $headers .= "CC: sanjiv.sethi@vinove.com".PHP_EOL;
 $headers .= "BCC: parvesh@vinove.com".PHP_EOL;

$jsonData = json_decode($_POST['model'], true);
//$objPD = new PipeDrive("553a8abf71b7308d844f119cd0f253d6da6014f6"); //pipedrive testing account
//$objMC = new MailChimp('a84c00b2961b1c194a89b62a81da711e-us11', '6c4832fd76'); // mailchimp testing account
//$objMCNonAcceptedList = new MailChimp('6138f1295f421b4072b5ff36f233de44-us11', '80a302518e');
//$objMCAcceptedList = new MailChimp('6138f1295f421b4072b5ff36f233de44-us11', '91bbf898d3');
// Utm Source

parse_str($jsonData['frmqueryString'], $arrQuery);
parse_str($jsonData['frmqueryString'], $arrQueryString);
parse_str($_POST['frmqueryString'], $arrQueryStringReq);
if($arrQueryString['utm_source']=="" && $arrQueryString["gclid"]=="")
{
parse_str($_SESSION["queryString"], $arrQueryString);
}
if($arrQueryStringReq['utm_source']=="" && $arrQueryStringReq["gclid"]=="")
{
parse_str($_SESSION["queryString"], $arrQueryStringReq);
}


//if ($arrQuery['utm_source']) {
//    $objPixel->addUtmDetails($jsonData['frmqueryString']);
//}

if ($_POST['type'] == "frmContact") {

    $headers .= "From: " . $_POST["email"] . " <" . $_POST["email"] . ">" . "\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    $name = $_POST['name'];
    $_SESSION['clientName'] = $name;
    $email = $_POST['email'];
    $phone = $_POST['areaCode'] . '-' . $_POST['phone'];
    $enquiry = $_POST['enquiry'];
    $query = $_POST['query'];


    $isPCUpdate = $_POST['pcUpdate'];
    $subject = "CONTACT_FORM_SUBJECT";
    $txt = " Dear Sales Team,

    Below are the details of user:

       Name: {$name}
       Email: {$email}
       Phone No.: {$phone}
       Enquiry For: {$enquiry}
       Query: {$query}
       Pc Update: {$isPCUpdate}
       Posted From: {$varRefererURL}
       Ip: {$varIPAdd}

    With Regards,
    PixelCrayons";

    @mail($varConMailTo, $subject, $txt, $headers);
     $arrToBeInsert = array(
         'ContactFormName' => $name,
         'ContactFormEmail' => $email,
         'ContactFormPhoneNumber' => $phone,
         'ContactFormTechnologyPreference' => $enquiry,
         'ContactFormDescription' => $query,
         'ContactFormFormSourceName' => 'Contact Us',
         'ContactFormIpAddress' => $varIPAdd,
         'ContactFormBrowserInfo' => $varBrowserInfo,
         'ContactFormDateAdded' => $varDateAdded,
         'UtmReferalUrl' => $_SERVER["HTTP_REFERER"],
         'ContactFormReceivePCUpdates' => $isPCUpdate
     );

     $db->insert('contact_form', $arrToBeInsert);
  $query = str_replace("+", " ", $query);
         $query = str_replace("&", " and ", $query);
         $query=preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', ' ', $query);
         $query = strip_tags(nl2br($query));
          $query = str_replace("br", "</br/>", $query);
        $query = html_entity_decode($query);
// //zoho
     $stpos = strpos($name," ");
     if($stpos===false) {
         $firstn = "";
         $lastn = $name;
     } else {
         $firstn = substr($name, 0,$stpos);
         $lastn = substr($name,($stpos+1));
     }
     $varDesc = " Enquiry For: {$enquiry}
        Query: {$query}";
        $CompanyName = explode("@",$email);

     $arrZoho = array(
                     'Email' => $email,
                     'First Name'=>$firstn,
                     'Last Name'=> $lastn,
                     'Phone' => $phone,
                     'Lead Status' => 'Not Contacted',
                     'Lead Source' => 'Website',
                     'UTM Source' => $_SERVER["HTTP_REFERER"],
                     'Property' => 'PixelCrayons',
                     'IP Address' => $varIPAdd,
                     'Description'=> $varDesc);
     if(strstr($name,"test")===false && strstr($email,"test")===false){
         zohoCrmUpdate($arrZoho);
     }



    //ppipedrive
//    $arrOrganisation = array(
//        'name' => $name
//    );
//    $arrPerson = array(
//        'name' => $name,
//        'email' => $email,
//        'phone' => $phone,
//        '21d2b309cc2f55cde0ae34a54a23968aa883b80d' => $enquiry,
//        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $query,
//        '0f6cafb7491d0549ba0475e76ed1aa8833bf6acc' => $isPCUpdate,
//        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Contact Us'
//    );
//    $arrDeal = array(
//        'title' => $enquiry
//    );
//    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
//    //mailchimp
//    $arrData = array('FNAME' => $name, 'PHONE' => $phone, 'FRMSRC' => 'Contact Us', 'DESC' => $query);
//    $varEmailId = $email;
//    if ($isPCUpdate == "Yes") {
//        //mailchimp
//        $objMCAcceptedList->executeMailChimp($arrData, $varEmailId);
//    } else {
//        $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);
//    }

    echo "success";
    return true;
}

/* * ******************************************** send feedback start *********************************************** */

if ($_POST['type'] == "frmFeedback") {
    $headers .= "From: " . $_POST["email"] . " <" . $_POST["email"] . ">" . "\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    // "CC: {$varMailCc}";
    $pticketID = $_POST['pticketID'];

    $name = $_POST['name'];
    //$_SESSION['clientName']= $name;
    $email = $_POST['email'];
    $query = $_POST['query'];
    $experience = $_POST['modeOfChk'];
    $isPCUpdate = $_POST['pcUpdate'];
    //$subject = FEEDBACK_SUBJECT;
    $subject = FEEDBACK_SUBJECT_ONE_MINUTE;
    if ($experience == 1) {
        $experienceTxt = "Excellent";
    } else if ($experience == 2) {
        $experienceTxt = "Satisfactory";
    } else {
        $experienceTxt = "Poor";
    }
    $txt = " Dear Sales Team,

    Below are the details of user Feedback:

       Project Id: {$pticketID}
       Name: {$name}
       Email: {$email}
       Experience: {$experienceTxt}
       Feedback: {$query}
       Pc Updates: {$isPCUpdate}
       Posted From: {$varRefererURL}
       Ip: {$varIPAdd}

    With Regards,
    PixelCrayons";

    @mail($varFedMailTo, $subject, $txt, $headers);
    $arrToBeInsert = array('pr_project_id' => $pticketID, 'pr_uname' => $name, 'pr_email' => $email, 'pr_feedback' => $experienceTxt, 'pr_satisfaction' => $experience, 'pr_Comment2' => $query, 'IPAddress' => $varIPAdd, 'date_time' => $varDateAdded, 'UtmReferalUrl' => $_SERVER["HTTP_REFERER"]);

    $varRes = $db->insert('feedback2', $arrToBeInsert);
    //ppipedrive
//    $arrOrganisation = array(
//        'name' => $name
//    );
//    $arrPerson = array(
//        'name' => $name,
//        'email' => $email,
//        'phone' => $phone,
//        '21d2b309cc2f55cde0ae34a54a23968aa883b80d' => $enquiry,
//        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $query,
//        '0f6cafb7491d0549ba0475e76ed1aa8833bf6acc' => $isPCUpdate,
//        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Contact Us'
//    );
//    $arrDeal = array(
//        'title' => $enquiry
//    );
//    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
//    //mailchimp
//    $arrData = array('FNAME' => $name, 'PHONE' => $phone, 'FRMSRC' => 'Contact Us', 'DESC' => $query);
//    $varEmailId = $email;
//    if ($isPCUpdate == "Yes") {
//        //mailchimp
//        $objMCAcceptedList->executeMailChimp($arrData, $varEmailId);
//    } else {
//        $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);
//    }

    echo "success";
}

/* * ******************************************* send feedback end ******************************************** */

/* * ******************************************** send feedback detail start *********************************************** */

if ($_POST['type'] == "frmFeedbackdetail") {

    $headers .= "From: " . $_POST["email"] . " <" . $_POST["email"] . ">" . "\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    // "CC: {$varMailCc}";
    $pticketID = $_POST['pticketID'];
    $name = $_POST['name'];
    //$_SESSION['clientName']= $name;
    $email = $_POST['email'];
    $query = $_POST['query'];
    $Promptness = $_POST['Promptness'];
    $Quality = $_POST['Quality'];
    $Conformance = $_POST['Conformance'];
    $Reporting = $_POST['Reporting'];
    $Complaints = $_POST['Complaints'];
    $Pricing = $_POST['Pricing'];
    $Invoices = $_POST['Invoices'];
    $OverallQuality = $_POST['OverallQuality'];
    $isPCUpdate = $_POST['pcUpdate'];
    $isShareOnLn = $_POST['lnShare'];
    $linkdinid = $_POST['linkdinid'];

    if ($_POST['linkdinid'] != "") {
        $lnId = "LINKEDIN ID: {$_POST['linkdinid']}";
    } else {
        $lnId = "";
    }

    //$subject = FEEDBACK_SUBJECT_ONE_MINUTE;
    $subject = FEEDBACK_SUBJECT;

    $txt = " Dear Sales Team,

    Below are the details of user Feedback:

       Project Id:{$pticketID}
       Name:{$name}
       Email: {$email}

       Service Response
       Promptness: {$Promptness}
       Quality: {$Quality}

       Service Quality
       Conformance: {$Conformance}
       Reporting: {$Reporting}
       Resolving Complaints: {$Complaints}

       Commercial
       Pricing: {$Pricing}
       Invoices: {$Invoices}

       Service Experience
       Overall Quality: {$OverallQuality}
       Feedback: {$query}
       Pc Updates: {$isPCUpdate}
       Share On Linkedin: {$isShareOnLn}
           {$lnId}
       Posted From: {$varRefererURL}
       IP: {$varIPAdd}

    With Regards,
    PixelCrayons";
    @mail($varFedMailTo, $subject, $txt, $headers);
    $arrToBeInsert = array('uname' => $name, 'uemail' => $email, 'ProjectId' => $pticketID, 'Promptness' => $Promptness, 'Quality' => $Quality, 'Conformance' => $Conformance, 'Reporting' => $Reporting, 'Complaints' => $Complaints, 'Pricing' => $Pricing, 'Invoices' => $Invoices, 'OverallQuality' => $OverallQuality, 'AdditionalComments' => $query, 'IPAddress' => $varIPAdd, 'FeedbackDate' => $varDateAdded, 'LinkdinId' => $linkdinid);

    $varRes = $db->insert('feedback', $arrToBeInsert);
    print_r($arrToBeInsert);
    $arrOrganisation = array(
        'name' => $name
    );
    $arrPerson = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        '21d2b309cc2f55cde0ae34a54a23968aa883b80d' => $enquiry,
        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $query,
        '0f6cafb7491d0549ba0475e76ed1aa8833bf6acc' => $isPCUpdate,
        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Contact Us'
    );
    $arrDeal = array(
        'title' => $enquiry
    );
    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
    //mailchimp
    $arrData = array('FNAME' => $name, 'PHONE' => $phone, 'FRMSRC' => 'Contact Us', 'DESC' => $query);
    $varEmailId = $email;
    if ($isPCUpdate == "Yes") {
        //mailchimp
        $objMCAcceptedList->executeMailChimp($arrData, $varEmailId);
    } else {
        $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);
    }

    echo "success";
}

/* * ******************************************* send feedback detail end ******************************************** */


if ($_POST['type'] == "frmRequest") {


    $headers .= "From: " . $_POST["email"] . " <" . $_POST["email"] . ">" . "\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    // "CC: {$varMailCc}";
    if ($_POST['techPrefr'] != '') {
        $techPrefr = implode(",", $_POST['techPrefr']);
    } else {
        $techPrefr = "No Preference";
    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['areaCode'] . '-' . $_POST['phone'];
    $isPCUpdate = $_POST['pcUpdate'];
    $country = $_POST['country'];
    $technology = $techPrefr;
    $query = $_POST['query'];
    $query = strip_tags(nl2br($query));

    $city = $_POST['city'];
    if ($_POST['AmPm'] == 'AM') {
        if ($_POST['hour'] == 12) {
            $dateTime = date('Y-m-d', strtotime($_POST['date'])) . ' 00:' . $_POST['minut'] . ':00';
        } else {
            $dateTime = date('Y-m-d', strtotime($_POST['date'])) . ' ' . $_POST['hour'] . ':' . $_POST['minut'] . ':00';
        }
    } else {
        if ($_POST['hour'] == 12) {
            $dateTime = date('Y-m-d', strtotime($_POST['date'])) . ' ' . ($_POST['hour']) . ':' . $_POST['minut'] . ':00';
        } else {
            $dateTime = date('Y-m-d', strtotime($_POST['date'])) . ' ' . ($_POST['hour'] + 12) . ':' . $_POST['minut'] . ':00';
        }
    }



    $subject = CONTACT_HAVE_US_CALL_YOU_SUBJECT;
    $txt = " Dear Sales Team,

    Below are the details of user:

       Name:{$name}
       Email: {$email}
       Phone No.:{$phone}
       City: {$city}
       Country: {$country}
       Technology Preference: {$technology}
       Pc Updates: {$isPCUpdate}
       Date-Time: {$dateTime}
       Posted From: {$varRefererURL}
       Ip: {$varIPAdd}

    With Regards,
    PixelCrayons";

    @mail($varConMailTo, $subject, $txt, $headers);

    $arrToBeInsert = array('ContactFormName' => $name, 'ContactFormEmail' => $email,
        'ContactFormPhoneNumber' => $phone, 'ContactFormFormSourceName' => 'Request a Call Back', 'ContactFormCountry' => $country, 'ContactFormCity' => $city,
        'ContactFormTechnologyPreference' => $techPrefr,
        'ContactFormDateTime' => $dateTime,
        'ContactFormIpAddress' => $varIPAdd,
        'ContactFormBrowserInfo' => $varBrowserInfo,
        'ContactFormDateAdded' => $varDateAdded,
        'ContactFormReceivePCUpdates' => $isPCUpdate,
        'UtmReferalUrl' => $_SERVER["HTTP_REFERER"],
        'UtmSource' => $arrQueryStringReq['utm_source'],
        'UtmMedium' => $arrQueryStringReq['utm_medium'],
        'UtmTerm' => $arrQueryStringReq['utm_term'],
        'UtmContent' => $arrQueryStringReq['utm_content'],
        'UtmCampaign' => $arrQueryStringReq['utm_campaign'],
        'UtmCampid' => $arrQueryStringReq['utm_campid'],
        'UtmPageName' => $arrQueryStringReq['PageName'],
        'UtmDeviceID' => $arrQueryStringReq['deviceID'],
        'UtmXForwardedFor' => $_POST['xForwordFor'],
    );

    $db->insert('contact_form', $arrToBeInsert);
 $query = str_replace("+", " ", $query);
        $query = str_replace("&", " and ", $query);
        $query=preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', ' ', $query);
         $query = strip_tags(nl2br($query));
         //$query = str_replace("br", "</br/>", $query);
       //$query = html_entity_decode($query);
//zoho
    $lead_source = "Website";
    if($arrQueryStringReq['utm_source']=="PPC"){
      $lead_source = "Advertisement";
    }
    $stpos = strpos($name," ");
    if($stpos===false) {
        $firstn = "";
        $lastn = $name;
    } else {
        $firstn = substr($name, 0,$stpos);
        $lastn = substr($name,($stpos+1));
    }
    $varDesc = "Technology Preference: {$technology}
    Date-Time: {$dateTime}";
    $CompanyName = explode("@",$email);
    $arrZoho = array(
                    'Email' => $email,
                    'First Name'=>$firstn,
                    'Last Name'=> $lastn,
                    'Phone' => $phone,
                    'City' => $city,
                    'Country' => $country,
                    'Lead Status' => 'Not Contacted',
                    'Lead Source' => $lead_source,
                    'UTM Source' => $_SERVER["HTTP_REFERER"],
                    'Property' => 'PixelCrayons',
                    'IP Address' => $varIPAdd,
                    'Description'=> $varDesc);

        zohoCrmUpdate($arrZoho);


    $arrOrganisation = array(
        'name' => $name
    );
    $arrPerson = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        '21d2b309cc2f55cde0ae34a54a23968aa883b80d' => $enquiry,
        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $query,
        '0f6cafb7491d0549ba0475e76ed1aa8833bf6acc' => $isPCUpdate,
        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Contact Us'
    );
    $arrDeal = array(
        'title' => $enquiry
    );
    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
    //mailchimp
    $arrData = array('FNAME' => $name, 'PHONE' => $phone, 'FRMSRC' => 'Contact Us', 'DESC' => $query);
    $varEmailId = $email;
    if ($isPCUpdate == "Yes") {
        //mailchimp
        $objMCAcceptedList->executeMailChimp($arrData, $varEmailId);
    } else {
        $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);
    }
    echo "success";
}

/********************************************* Contact Us Form *************************************************/

if ($jsonData['type'] == "frmQuote") {
    $headers .= "From: " . $jsonData['email'] . " <" . $jsonData['email'] . ">" . "\r\n";
    $headers .= "Reply-To: " . $jsonData['email'] . "\r\n";
    // "CC: {$varMailCc}";
    if ($jsonData['techPrefr'] == '') {
        $techPrefr = "No Preference";
    } else {
        $techPrefr = implode(",", $jsonData['techPrefr']);
    }


    if ($jsonData['fileurl'] != "") {
        $a = $jsonData['fileurl'];
        $purl = "{$a}";
        $fileurl = "Provided URL: {$purl}";
    } else {
        $fileurl = "";
    }

    $fileName = "Not Uploaded";
    /* if ($_FILES['file']['name'] != '') {
      $fileName1 = $url.'/'.$_FILES['file']['name'];
      $fileName = "<a href='{$fileName1}' target='_blank'>{$fileName1}</a>";
      } */
    if ($jsonData['hidFile'] != '') {
        $fileName = '';
        $fileArray = explode(',', $jsonData['hidFile']);

        foreach ($fileArray as $fileArrayValue) {

            $fileName1 = $url . '/' . $fileArrayValue;
            $fileName .= "{$fileName1}";
            $fileName .= "\r\n                   ";
        }
    }

    $name = $jsonData['name'];
    $email = $jsonData['email'];
    $phone = $jsonData['phone'];
    $isPCUpdate = $jsonData['pcUpdate'];
    $query = $jsonData['queryAboutService'];
    $query = strip_tags(nl2br($query));

    $budget = $jsonData['budget'];
    $fileurlName = $jsonData['fileurl'];



    if ($jsonData['AmPm'] == 'AM') {
        //$dateTime= $jsonData['date'].' '.$jsonData['hour'].':' .$jsonData['minut'].':00';
        if ($jsonData['hour'] == 12) {
            $dateTime = date('Y-m-d',strtotime($jsonData['date'])) . ' 00:' . $jsonData['minut'] . ':00';
        } else {
            $dateTime = date('Y-m-d',strtotime($jsonData['date'])) . ' ' . $jsonData['hour'] . ':' . $jsonData['minut'] . ':00';
        }
    } else {
        if ($jsonData['hour'] == 12) {
            $dateTime = date('Y-m-d',strtotime($jsonData['date'])) . ' ' . ($jsonData['hour']) . ':' . $jsonData['minut'] . ':00';
        } else {
            $dateTime = date('Y-m-d',strtotime($jsonData['date'])) . ' ' . ($jsonData['hour'] + 12) . ':' . $jsonData['minut'] . ':00';
        }
    }





    $subject = 'PixelCrayons.com: Contact Us';
    $txt = " Dear Sales Team,

    Below are the details of user:

       Name:{$name}
       Email: {$email}
       Phone No.:{$phone}
       File Uploaded: {$fileName}
       Query: {$query}
       Budget: {$budget}
       Pc Updates: {$isPCUpdate}
       {$fileurl}
       Posted From:{$varRefererURL}
       Ip: {$varIPAdd}

    With Regards,
    PixelCrayons";
    /* City: {$city}
       Country: {$country}
       Date-Time: {$dateTime} */


    @mail($varConMailTo, $subject, $txt, $headers);
    //ALTER TABLE  `contact_form` ADD  `file_url` VARCHAR( 100 ) NOT NULL AFTER  `ContactFormUploadedFileName` ;
    //ALTER TABLE  `contact_form` CHANGE  `file_url`  `file_url` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT  'Not Provided';

    $arrToBeInsert = array('ContactFormName' => $name, 'ContactFormEmail' => $email,
        'ContactFormPhoneNumber' => $phone, 'ContactFormDescription' => $query, 'ContactFormFormSourceName' => 'Request a Quote', 'ContactFormCompanyName' => $companyName, 'ContactFormWebisteURL' => $website, 'ContactFormCountry' => $country, 'ContactFormCity' => $city,
        'ContactFormTechnologyPreference' => $techPrefr, 'ContactFormDateTime' => $dateTime, 'ContactFormContactMode' => $contactMod, 'ContactFormBudget' => $budget, 'ContactFormUploadedFileName' => $fileName, 'ContactFormIpAddress' => $varIPAdd, 'ContactFormBrowserInfo' => $varBrowserInfo, 'ContactFormDateAdded' => $varDateAdded, 'ContactFormReceivePCUpdates' => $isPCUpdate,
        //'file_url' => $fileurlName,
        'UtmReferalUrl' => $_SERVER["HTTP_REFERER"],

        'UtmSource' => $arrQueryString['utm_source'],
        'UtmMedium' => $arrQueryString['utm_medium'],
        'UtmTerm' => $arrQueryString['utm_term'],
        'UtmContent' => $arrQueryString['utm_content'],
        'UtmCampaign' => $arrQueryString['utm_campaign'],
        'UtmCampid' => $arrQueryString['utm_campid'],
        'UtmPageName' => $arrQueryString['PageName'],
        'UtmDeviceID' => $arrQueryString['deviceID'],
        'UtmXForwardedFor' => $_POST['xForwordFor']);

    //echo"<pre>";print_r($arrToBeInsert);die;
    $db->insert('contact_form', $arrToBeInsert);
 $query = str_replace("+", " ", $query);
        $query = str_replace("&", " and ", $query);
        $query= preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', "  ", $query);
        $query = strip_tags(nl2br($query));
         //$query = str_replace("br", "</br/>", $query);
      // $query = html_entity_decode($query);

//zoho
    $stpos = strpos($name," ");
    if($stpos===false) {
        $firstn = $name;
        $lastn = $name;
    } else {
        $firstn = substr($name, 0,$stpos);
        $lastn = substr($name,($stpos+1));
    }

    $lead_source = "Website";
    if($arrQueryString['utm_source']=="adwords") {
      $lead_source = "Advertisement: Adwords";
    }
    if($arrQueryString['utm_source']=="bingads") {
      $lead_source = "Advertisement: Bing";
    }

    $utm_source = $_SERVER["HTTP_REFERER"];
    $utm_source = str_replace("&", "@", $utm_source);
    if($budget == ' < $1000') {
        $budget = 'Less than $1000';
    }

    $varDesc = "File Uploaded: {$fileName}
       Query: {$query}
       Budget: {$budget}
       Pc Updates: {$isPCUpdate}
       {$fileurl}
       Posted From:{$varRefererURL}";
        $CompanyName = explode("@",$email);
        $arrZoho = array(
                      'Email' => $email,
                    'First Name'=>$firstn,
                    'Last Name'=> $lastn,
                    'Phone' => $phone,
                    'Lead Status' => 'Not Contacted',
                    'Lead Source' => $lead_source,
                    'UTM Source' => $utm_source,
                    'Property' => 'PixelCrayons',
                    'IP Address' => $varIPAdd,
                    'Description'=> 'Query: ' .$query. '
        File Uploaded :' .$fileName. '
        Budget: ' .$budget. '
        Pc Updates :' .$isPCUpdate. '
        file url: ' .$fileurl);

        zohoCrmUpdate($arrZoho);




    //ppipedrive
//    $arrData = array('FNAME' => $name, 'PHONE' => $phone, 'FRMSRC' => 'Request a Quote', 'DESC' => $query);
//    $varEmailId = $email;
//    $arrOrganisation = array(
//        'name' => $companyName,
//        '4609b03791ba0cf4f49e66fec276e83d8b2541e8' => $website
//    );
//    $arrPerson = array(
//        'name' => $name,
//        'email' => $email,
//        'phone' => $phone,
//        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $query,
//        '0f6cafb7491d0549ba0475e76ed1aa8833bf6acc' => $isPCUpdate,
//        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Request a Quote',
//        'fb8b5d09c7b355bf284901dceed0138f1b4569f1' => $country,
//        '739a7b6d52eedc001e93c845fd1cb9e1bcfb9f61' => $city,
//        '346838132becfd9c16f29970d2d445e62526acf7' => $techPrefr,
//        '497e9d3727e187915d87c631307c1205c73ee28d' => $dateTime,
//        'e0b578783654deb7a6d0861dce1c7d42ddb7cc76' => $contactMod,
//        '95846f119a2a0dad2c5df30b52245c6eb0d487a7' => $fileName
//    );
//    $arrDeal = array(
//        'title' => 'Request a Quote'
//    );
//    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
//    if ($isPCUpdate == "Yes") {
//        //mailchimp
//        $objMCAcceptedList->executeMailChimp($arrData, $varEmailId);
//    } else {
//        $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);
//    }

    echo "success";
    return true;
}



if ($jsonData['frmType'] == "cms") {
    $headers .= "From: " . $jsonData['email'] . " <" . $jsonData['email'] . ">" . "\r\n";
    $headers .= "Reply-To: " . $jsonData['email'] . "\r\n";
    $varFileName = "Not Uploaded";

    if ($jsonData['hidFile'] != '') {
        $varFileName = '';
        $fileArray = explode(',', $jsonData['hidFile']);

        foreach ($fileArray as $fileArrayValue) {

            $fileName1 = $url . '/' . $fileArrayValue;
            $varFileName .= "{$fileName1}";
            $varFileName .= "\r\n                ";
        }
    }
    if ($jsonData['url'] == '') {
        $url = "Not Provided ";
    } else {
        $url = $jsonData['url'];
    }
    //$subject = "REQUEST FREE EVALUATION: PixelCrayons";
    if ($arrQuery['PageName'] == "partnership-programme") {
        $subject = PARTNERSHIP_PROGRAMME_SUBJECT;
    } else {
        $subject = REQUEST_FREE_EVALUATION_SUBJECT;
    }

    $txt = " Dear Sales Team,

    Below are the details of user:

       Name:{$jsonData['compName']}
       Email: {$jsonData['email']}
       Phone No.:{$jsonData['number']}
       File Name: $varFileName
       URL: $url
       Query: {$jsonData['req']}
       Posted From:{$varRefererURL}
       Ip: {$varIPAdd}

    With Regards,
    PixelCrayons";

    @mail($varConMailTo, $subject, $txt, $headers);
    $arrToBeInsert = array(
        'ContactFormEmail' => $jsonData['email'],
        'ContactFormPhoneNumber' => $jsonData['number'],
        'ContactFormWebisteURL' => $jsonData['url'],
        'ContactFormDescription' => $jsonData['req'],
        'ContactFormFormSourceName' => 'Request Free Evaluation',
        'ContactFormCompanyName' => $jsonData['compName'],
        'ContactFormUploadedFileName' => $varFileName,
        'ContactFormIpAddress' => $varIPAdd,
        'ContactFormBrowserInfo' => $varBrowserInfo,
        'UtmSource' => $arrQueryString['utm_source'],
        'UtmMedium' => $arrQueryString['utm_medium'],
        'UtmTerm' => $arrQueryString['utm_term'],
        'UtmContent' => $arrQueryString['utm_content'],
        'UtmCampaign' => $arrQueryString['utm_campaign'],
        'UtmCampid' => $arrQueryString['utm_campid'],
        'UtmPageName' => $arrQueryString['PageName'],
        'UtmDeviceID' => $arrQueryString['deviceID'],
        'UtmReferalUrl' => $_SERVER["HTTP_REFERER"],
        'UtmXForwardedFor' => $arrQueryString['xForwordFor'],
        'ContactFormDateAdded' => $varDateAdded);
    $db->insert('contact_form', $arrToBeInsert);

$name =$jsonData['compName'];
//zoho
    $lead_source = "Website";
    if($arrQueryString['utm_source']=="adwords") {
      $lead_source = "Advertisement: Adwords";
    }
    if($arrQueryString['utm_source']=="bingads") {
      $lead_source = "Advertisement: Bing";
    }

    $utm_source = $_SERVER["HTTP_REFERER"];
    $utm_source = str_replace("&", "@", $utm_source);

    $stpos = strpos($name," ");
    if($stpos===false) {
        $firstn = "";
        $lastn = $name;
    } else {
        $firstn = substr($name, 0,$stpos);
        $lastn = substr($name,($stpos+1));
    }

        $comments = $jsonData['req'];
        $comments = str_replace("+", " ", $comments);
        $comments = str_replace("&", " and ", $comments);
        $comments=preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', "  ", $comments);
         $comments = strip_tags(nl2br($comments));
         //$comments = str_replace("br", "</br/>", $comments);
       //$comments = html_entity_decode($comments);

    $varDesc = "       File Name: $varFileName
       URL: {$url}
       Query: {$comments}";
        $CompanyName = explode("@",$jsonData['email']);
        $arrZoho = array(
                        'Email' => $jsonData['email'],
                    'First Name'=>$firstn,
                    'Last Name'=> $lastn,
                    'Phone' => $jsonData['number'],
                    'Lead Status' => 'Not Contacted',
                    'Lead Source' => $lead_source,
                    'UTM Source' => $utm_source,
                    'Property' => 'PixelCrayons',
                    'IP Address' => $varIPAdd,
                    'Description'=> $varDesc);
    //if(strstr($jsonData['compName'],"test")===false && strstr($jsonData['email'],"test")===false){
        zohoCrmUpdate($arrZoho);
   // }


    //ppipedrive
//    $arrOrganisation = array(
//        'name' => $jsonData['compName'],
//        '4609b03791ba0cf4f49e66fec276e83d8b2541e8' => $jsonData['url']
//    );
//    $arrPerson = array(
//        'name' => $jsonData['compName'],
//        'email' => $jsonData['email'],
//        'phone' => $jsonData['number'],
//        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $jsonData['req'],
//        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Request Free Evaluation',
//        '95846f119a2a0dad2c5df30b52245c6eb0d487a7' => $varFileName
//    );
//    $arrDeal = array(
//        'title' => 'Request Free Evaluation'
//    );
//    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
//    //mailchimp
//    $arrData = array('FNAME' => $jsonData['compName'], 'PHONE' => $jsonData['number'], 'FRMSRC' => 'Request Free Evaluation', 'DESC' => $jsonData['req']);
//    $varEmailId = $jsonData['email'];
//    $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);
//
//    if ($arrQuery['PageName'] == 'partnership-programme') {
//        echo "partnership-programme";
//    } else {
//        echo "success";
//    }

    return true;
}

if ($jsonData['type'] == "footer") {
    $headers .= "From: " . $jsonData['email'] . " <" . $jsonData['email'] . ">" . "\r\n";
    $headers .= "Reply-To: " . $jsonData['email'] . "\r\n";
    $fileName = "Not Specified";
    if ($_FILES['file']['name'] != '') {
        /* $time = time();
          $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
          $fileName= $time . '.'.$ext;
          $target_path = $_SERVER['DOCUMENT_ROOT'] . '/'.SITE_NAME.'/upload/' .$fileName;

          $fileName1 = $url.'/'.$fileName;
          $fileName = "<a href='{$fileName1}' target='_blank'>{$fileName1}</a>"; */
        if ($jsonData['hidFilef'] != '') {
            $fileName1 = $url . '/' . $jsonData['hidFilef'];
            $fileName = "{$fileName1}";
        }
    }
    if ($jsonData['url'] == '') {
        $url = "Not Provided ";
    } else {
        $url = $jsonData['url'];
    }

    $companyName = $jsonData['cname'];
    $email = $jsonData['email'];
    $phone = $jsonData['phone'];
    $requirments = $jsonData['requirements'];
    $requirments = nl2br($requirments);



    //$subject = "GET IN TOUCH: PixelCrayons";
    $subject = CONTACT_GET_IN_TOUCH_SUBJECT;
    $txt = " Dear Sales Team,

    Below are the details of user:

       Name:{$companyName}
       Email: {$email}
       Phone No.:{$phone}
       File Name: {$fileName}
       URL: {$url}
       Requirements: {$requirments}
       Posted From:{$varRefererURL}
       Ip: {$varIPAdd}

    With Regards,
    PixelCrayons";


    mail($varConMailTo, $subject, $txt, $headers);
     $arrToBeInsert = array('ContactFormCompanyName' => $companyName, 'ContactFormWebisteURL' => $url, 'ContactFormDescription' => $requirments, 'ContactFormUploadedFileName' => $fileName, 'ContactFormEmail' => $email,
         'ContactFormPhoneNumber' => $phone, 'ContactFormFormSourceName' => 'Footer Form', 'ContactFormIpAddress' => $varIPAdd, 'ContactFormBrowserInfo' => $varBrowserInfo, 'ContactFormDateAdded' => $varDateAdded, 'UtmReferalUrl' => $_SERVER["HTTP_REFERER"]);
     $db->insert('contact_form', $arrToBeInsert);
    
     $name =$companyName;
     //zoho
     $requirments = str_replace("+", " ", $requirments);
         $requirments = str_replace("&", " and ", $requirments);
         $requirments=preg_replace('/[^a-zA-Z0-9_ \[\]\.\(\)-]/s', " ", $requirments);
         $requirments = strip_tags(nl2br($requirments));
          $requirments = str_replace("br", "</br/>", $requirments);
        $requirments = html_entity_decode($requirments);
    
     $lead_source = "Website";
     if($arrQueryString['utm_source']=="adwords") {
       $lead_source = "Advertisement: Adwords";
     }
     if($arrQueryString['utm_source']=="bingads") {
       $lead_source = "Advertisement: Bing";
     }
    //
     $utm_source = $_SERVER["HTTP_REFERER"];
     $utm_source = str_replace("&", "@", $utm_source);
    
     $stpos = strpos($name," ");
     if($stpos===false) {
         $firstn = "";
         $lastn = $name;
     } else {
         $firstn = substr($name, 0,$stpos);
         $lastn = substr($name,($stpos+1));
     }
     $varDesc = " File Name: {$fileName}
        URL: {$url}
        Requirements: {$requirments}";
        $companyName = explode ("@", $email);
     $arrZoho = array(
                     'Email' => $email,
                     'First Name'=>$firstn,
                     'Last Name'=> $lastn,
                     'Phone' => $phone,
                     'Lead Status' => 'Not Contacted',
                     'Lead Source' => $lead_source,
                     'UTM Source' => $utm_source,
                     'Property' => 'PixelCrayons',
                     'IP Address' => $varIPAdd,
                     'Description'=> $varDesc);
     if(strstr($companyName,"test")===false && strstr($email,"test")===false){
         zohoCrmUpdate($arrZoho);
    }
    //ppipedrive
//    $arrOrganisation = array(
//        'name' => $jsonData['compName'],
//        '4609b03791ba0cf4f49e66fec276e83d8b2541e8' => $jsonData['url']
//    );
//    $arrPerson = array(
//        'name' => $jsonData['compName'],
//        'email' => $jsonData['email'],
//        'phone' => $jsonData['number'],
//        'c2faeaf05401cab9f8614ba896b1df16b58bc0d4' => $jsonData['req'],
//        '28401e5c1d4ce4e24393f0ab8ec60715e022f0e6' => 'Request Free Evaluation',
//        '95846f119a2a0dad2c5df30b52245c6eb0d487a7' => $varFileName
//    );
//    $arrDeal = array(
//        'title' => 'Request Free Evaluation'
//    );
//    $objPD->addDeal($arrOrganisation, $arrPerson, $arrDeal);
//    //mailchimp
//    $arrData = array('FNAME' => $jsonData['compName'], 'PHONE' => $jsonData['number'], 'FRMSRC' => 'Request Free Evaluation', 'DESC' => $jsonData['req']);
//    $varEmailId = $jsonData['email'];
//    $objMCNonAcceptedList->executeMailChimp($arrData, $varEmailId);

    echo "success";
    return true;
}


if ($_POST['frmName'] == 'payment') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['areaCode'] . '-' . $_POST['phone'];
    $companyName = $_POST['companyName'];
    $website = $_POST['website'];
    $projectDetails = $_POST['projectDetails'];
    $amount = $_POST['amount'];
    $varMailTotalPay = $_POST['totalAmount'];
    $paymentMode = $_POST['paymentMode'];


    $arrToBeInsert = array('PaymentFormName' => $name, 'PaymentFormEmail' => $email, 'PaymentFormPhoneNumber' => $phone, 'PaymentFormCompanyName' => $companyName, 'PaymentFormWebisteURL' => $website,
        'PaymentFormProjectDetails' => $projectDetails, 'PaymentFormAmount' => $amount, 'PaymentFormTotalPay' => $varMailTotalPay, 'PaymentFormPayentMode' => $paymentMode, 'PaymentFormIpAddress' => $varIPAdd, 'PaymentFormBrowserInfo' => $varBrowserInfo, 'PaymentFormDateAdded' => $varDateAdded);
    $db->insert('payment_form', $arrToBeInsert);
    echo 'success';
}


if ($_POST['type'] == 'portfolio') {
    /* $fileName=$_POST['fileName'];
      $file = fopen($fileName, "r");
      while (!feof($file)) {
      echo fgets($file) . "<br />";
      }
      fclose($file); */
     
    $fileName = $_POST['fileName'];
    echo "<pre><code>";
    echo htmlentities(file_get_contents($fileName));
    echo "</code></pre>";
}


  function zohoCrmUpdate($argArrData)
    {
        //echo '<pre>';print_r($argArrData);die;

        $xml = '<Leads>
        <row no="1">
        <FL val="Lead Owner">sanjiv.sethi@mail.vinove.com</FL>';
        foreach($argArrData as $key=>$val)
        {
            if($val != '')    $xml .= '<FL val="'.$key.'">'.$val.'</FL>';
        }
               $xml .= '</row>
        </Leads>';

        // change below authtoken for changing CRM Account

 // $postData = 'newFormat=1&authtoken=24d286acd0b5b87e6f7e2770432d3723&scope=crmapi&duplicateCheck=2&xmlData='.$xml;
  //$postData = 'newFormat=1&authtoken=acbc9d5f2446cd69f5eef67d9970797f&scope=crmapi&duplicateCheck=2&xmlData='.$xml;
  $postData = 'newFormat=1&authtoken=906f8e4dc5c17de2667e99743fe685d4&scope=crmapi&duplicateCheck=2&xmlData='.$xml;
        $ch = curl_init('https://crm.zoho.com/crm/private/xml/Leads/insertRecords?');
  curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $body = "";
    $body .= "Dear Admin,"."<br>".$ch;
    $body .= "error"."==".curl_errno($ch)."<br/>";

    $headers = "MIME-Version: 1.0";
$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $headers .= "From: vkavasthi@gmail.com <vkavasthi@gmail.com>" . "\r\n";
    $headers .= "Reply-To: vkavasthi@gmail.com\r\n";
   // mail("vivek.avasthi@mail.vinove.com", "pixel test2",$xml, $headers);

    //$resp = $mailObj->sendEmail("vivek.avasthi@mail.vinove.com","vivek","vivek_avasthi@yahoo.com","hai",'',$body);
    $errors = curl_error($ch);
     $response2 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//var_dump($errors);
//var_dump($response);
$body .= "error response"."==".$response2."<br/>";
$body .= "error "."==".$errors."<br/>";
$body .= "erro1r "."==".var_dump($errors)."<br/>";
$body .= "response1"."==".var_dump($response2)."<br/>";
 $body .= " RESPONSE Details are:".print_r($response2)."<br>";

     @mail("vivek.avasthi@mail.vinove.com", "pixel test1", $body, $headers);

        if (!curl_errno($ch))
        {
            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($response);
            $body .= "Details are:".print_r($response)."<br>";





            $xml3 = '<Leads>
        <row no="1">
        <FL val="Lead Owner">parvesh@vinove.com</FL>';
        foreach($response as $key=>$val)
        {
            if($val != '')    $xml3 .= '<FL val="'.$key.'">'.$val.'</FL>';
        }
        $xml3 .= '</row>
        </Leads>';

  @mail("vivek.avasthi@mail.vinove.com", "pixel test1.1", $body.$xml3.$xml, $headers);
        }
        return true;
    }
    // get ip of system
    /*$conn = new mysqli('localhost','betavinc_amit','Admin^&*()','betavinc_case_study_demo');
    function get_client_ip_user() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }*/
 if ($_POST['action'] == "userRating") {
    if(!empty($_REQUEST['ratingPoints'])){
        $ratingNum = 1;
        $ratingPoints = $_REQUEST['rating'];
        $userip=get_client_ip_user();
        $post_id = $_REQUEST['rate_url'];
        $prevRatingQuery  = "SELECT * FROM post_rating where user_ip= '".$userip."' and rating_page_url='".$post_id."'";
        $prevRatingResult = mysqli_query($conn,$prevRatingQuery);

        $rowcount = mysqli_num_rows($prevRatingResult);
        if($rowcount==0)
        {

            $prevRatingQuery  = "SELECT rating_number FROM post_rating WHERE status = '1' and rating_page_url='".$post_id."' order by rating_id desc limit 0,1";
            $prevRating = mysqli_query($conn,$prevRatingQuery);

            $prevRating_data = mysqli_fetch_array($prevRating,MYSQLI_ASSOC);
            $oldrate=$prevRating_data['rating_number'];

            if($oldrate==''){

              $oldrate='4400';
            }
            $rating_number=$oldrate+1;
            $query = "INSERT INTO post_rating (user_ip, rating_page_url, rating_number,total_points,created,modified) VALUES('".$userip."','".$post_id."','".$rating_number."','".$ratingPoints."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
            $insert = mysqli_query($conn,$query);

        $query2 = "SELECT rating_number FROM post_rating WHERE status = '1' and rating_page_url='".$post_id."' order by rating_id desc limit 0,1";

        $ratingRow="";
        $rating_data ="";

        $rating_data = mysqli_query($conn,$query2);

        $rating_data_result = mysqli_fetch_array($rating_data,MYSQLI_ASSOC);


        $total = $rating_data_result['rating_number'];

        //$total=1001+1;
        $arrayt=array("totalClient"=>$total, "totalRating"=>$ratingPoints);

        echo json_encode($arrayt);
        //echo $rating['status'];
        //Return json formatted rating data
        //echo json_encode($ratingRow);
      //  die(0);
        }
    }

}
?>
