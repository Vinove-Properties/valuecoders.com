<?php
/*
Template Name: Payment success Page
*/ 
?>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
// Include configuration file 
session_start();
require_once get_template_directory() .'/stripe_pay/config.php';
include get_template_directory() .'/stripe_pay/dbConnect.php';
//if (isset($_SESSION['customers'], $_SESSION['techitm'], $_SESSION['dedicateditm'], $_SESSION['times'], $_SESSION['addons'])) {
// Insert transaction data into the database
$custoer_detail = $_SESSION['customers']; 
$techitem= $_SESSION['techitm'];
$dedicatedItem= $_SESSION['dedicateditm'];
$timesitem= $_SESSION['times'];
 $addons = $_SESSION['addons'];
 $addonstp = $_SESSION['addonsprice'];
 $tdtext = $_SESSION['tdtext']; 
 $tdprice = $_SESSION['tdprice']; 
 $atdtext = $_SESSION['atdtext']; 
 $atdprice = $_SESSION['atdprice']; 
$arr_vc1 = json_decode(stripslashes($techitem), true);
$arr_vc2 = json_decode(stripslashes($dedicatedItem), true);
$arr_vc3 = json_decode(stripslashes($timesitem), true);
$arr_vc4 = json_decode(stripslashes($custoer_detail), true);
$arr_vc5 = $addons;
$arr_vc6 = $addonstp;
$arr_vc7 = $tdtext;
$arr_vc8 = $tdprice;
$arr_vc9 = $atdtext;
$arr_vc10 = $atdprice;
 //print_r($arr_vc1); die;
// print_r($arr_vc2);
 //print_r($arr_vc3); 
// print_r($arr_vc5);

$timeval = array_values($arr_vc3);
$tech_array = $arr_vc1;
$dedicated_array = $arr_vc2;
$time_array = $timeval;
$result = array();
foreach($tech_array as $key=>$val){ // Loop though one array
	$dedicated_val = $dedicated_array[$key]; // Get the values from the other array
	$time_val = $time_array[$key]; // Get the values from the other array
	//$colour_val = $colour_array[$key]; // Get the values from the other array
	$result[$key] = array( 
		'tech_item' => $val,
		'dedicted' => $dedicated_val,
		'time' => $time_val,
		//'colour' => $colour_val
	);
} 
                    
                    
					 
//echo "<pre>"; print_r($result);
    $pageview = $_GET['getID']; 
	//$selectproduct =mysqli_query($db_conn, "select * from products where id = '$pageview' ");
    //$rowproduct =mysqli_fetch_array($selectproduct,MYSQLI_ASSOC); 			
			
    $payment_id = $statusMsg = '';
    $ordStatus = 'error';

// Check whether stripe checkout session is not empty
if(!empty($_GET['session_id'])){
    $session_id = $_GET['session_id'];
    
    // Fetch transaction data from the database if already exists
    //$sql = "SELECT * FROM orders WHERE checkout_session_id = '".$session_id."'";
    //$result = $db_conn->query($sql);
	//if ( !empty($result->num_rows) && $result->num_rows > 0) {
		
      //  $orderData = $result->fetch_assoc();
        
       // $paymentID = $orderData['id'];
       // $transactionID = $orderData['txn_id'];
       // $paidAmount = $orderData['paid_amount'];
        //$paidCurrency = $orderData['paid_amount_currency'];
       // $paymentStatus = $orderData['payment_status'];
        
       // $ordStatus = 'success';
       // $statusMsg = 'Your Payment has been Successful!';
   // }else{
		
        // Include Stripe PHP library 
        require_once get_template_directory() .'/stripe_pay/stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY);
        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);


        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
        
        if(empty($api_error) && $checkout_session){
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            // Retrieves the details of customer
            try {
                // Create the PaymentIntent
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            if(empty($api_error) && $intent){ 
                // Check whether the charge is successful
                if($intent->status == 'succeeded'){
                    // Customer details
                    $name = $customer->name;
                    $email = $customer->email;
                   
                    // Transaction details 
                   $transactionID = $intent->id;
                   $paidAmount = $intent->amount;
                   $paidAmount = ($paidAmount/100);
                   $paidCurrency = $intent->currency;
                   $paymentStatus = $intent->status;
                   $order_id = 'RC'. mt_rand();
				   $firstName = $arr_vc4['firstName'];
				   $lastname = $arr_vc4['lastname'];
				   $cont_email = $arr_vc4['cont_email'];
				   $cont_phone = $arr_vc4['cont_phone'];
				   $cont_country = $arr_vc4['cont_country'];
				   $cont_tax = $arr_vc4['cont_tax'];
				   $texteareacostm = $arr_vc4['texteareacostm'];
				   $userid = 1;
                   $sqll = "INSERT INTO customer_details(Order_id,userid,price,first_name,last_name,email,phone,country,taxid,comment,date) VALUES('".$order_id."','".$userid."','".$paidAmount."','".$firstName."','".$lastname."','".$cont_email."','".$cont_phone."','".$cont_country."','".$cont_tax."','".$texteareacostm."',NOW())"; 
								
				    $insert = $db_conn->query($sqll);
                   	$productlist = "";
                   	
                    foreach($result as $results){
					$itemname = $results['tech_item'];
					$dedicted_hours = $results['time'];
				    if($itemname == 'C/C  '){
				       $itemname = 'C/C++'; 
				    }
					if($dedicted_hours == 160){
				    $dedicted_dev = $results['dedicted'];
					}else{
					$dedicted_dev = 0;
					}
				//$dedicted_developr = isset($dedicted_dev) ? (int)$dedicted_dev : 0;
					
				    
					
					$sql = "INSERT INTO orders(order_id,name,email,technology_name,dedicated_developer,dedicated_hours,addons_timezone,addons_timeprice,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,checkout_session_id,created,modified) VALUES('".$order_id."','".$name."','".$email."','".$itemname."',$dedicted_dev,'".$dedicted_hours."','".$arr_vc5."','".$arr_vc6."','USD','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$paymentStatus."','".$session_id."',NOW(),NOW())"; 
					
					// $sql = "INSERT INTO orders(order_id,name,email,technology_name,dedicated_developer,dedicated_hours,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,checkout_session_id,created,modified) VALUES('".$order_id."','".$name."','".$email."','".$itemname."',$dedicted_dev,'".$dedicted_hours."','USD','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$paymentStatus."','".$session_id."',NOW(),NOW())"; 
					
								
					$insert = $db_conn->query($sql);
					if($dedicted_hours == 40){ $timeprice1 = 30; }
					if($dedicted_hours == 80){ $timeprice1 = 27; }
					if($dedicted_hours == 120){ $timeprice1 = 25; }
					if($dedicted_hours == 160){ $timeprice1 = $dedicted_dev; }
					$amountpice = $timeprice1*$dedicted_hours;
					$paidprice +=$amountpice;
					$count1 = $arr_vc6 * $paidprice;
                    $count2 = $count1 / 100;
                    
                    $count3 = $arr_vc8 * $paidprice;
                    $count4 = $count3 / 100;
                    
                    $count5 = $arr_vc10 * $paidprice;
                    $count6 = $count5 / 100;
					if($dedicted_hours == 160){	
			     	$productlist.="<p><strong>$itemname (Dedicated)</strong> : $$timeprice1</p>";
					}else{
					$productlist.="<p><strong>$itemname($dedicted_hours  hrs @ $$timeprice1 /hrs) </strong> : $$amountpice</p>";	
					}          
					
                    }
                    if(!empty($arr_vc5) || !empty($arr_vc8) || !empty($arr_vc10)){
			    	$adonslist="
                   
                                      <p>Addons:</p>
                                       <p><strong> $arr_vc5 </strong> : $$count2</p>
                                                
                                       <p><strong> $arr_vc7 </strong> : $$count4</p>
                                                
                                        <p><strong> $arr_vc9 </strong> : $$count6</p>
                                        
                                                
                    "; 
                    } 
			    	// order email
			    	
			    	$to      = $cont_email; // Send email to our user
$subject = 'Thank you for Your Order ('. $order_id.') with ValueCoders'; // Give the email a subject 
$message = '<html><body>';
$message .= '<p>Hi '.ucfirst($firstName).',</p>';
$message .= '<p>Greetings from ValueCoders! Your order has been confirmed, with the details -</p>';
$message .= '<p>Date of Order: '.date("Y-m-d").'</p>';
$message .= '<p>Order ID: '. $order_id.'</p>';
$message .= '<p>Total Cost: $'.$paidAmount.'</p>';
$message .= '<p>Product/Service details:</p>';
$message .=  $productlist;
$message .=  $adonslist;
$message .= '<p>We are happy to confirm that you have ordered the above products/services. One of our representatives will connect with you shortly via the contact credentials provided by you.</p>';
$message .= '<p>You can give us customer satisfaction ratings or feedback at <a href="mailto:sales@valuecoders.com">sales@valuecoders.com.</a></p>';
$message .= "<p>Let us know if there's anything else we can help with or how we can improve our services.</p>";
$message .= "<p>Connect with us today <a href='https://www.valuecoders.com/contact'>https://www.valuecoders.com/contact</a></p>";
$message .= '<p>Thanks<br>
ValueCoders Team<br>
</p>';
$message .= '</body></html>';
$headers = 'From:Valuecoders<noreply@gmail.com>' . "\r\n"; // Set from headers
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
mail($to, $subject, $message, $headers); // Send our email
					
                    $paymentID = $db_conn->insert_id;
                    
						$ordStatus = 'success';
						$statusMsg = 'Your Payment has been Successful!';?>
                    <script>
						//setTimeout(function(){window.location = 'https://www.valuecoders.com/v2wp/payment-thank-you/'} , 5000);
                  window.location = 'https://www.valuecoders.com/v2wp/payment-thank-you/';
    </script> 
              <?php   }else{
                    $statusMsg = "Transaction has been failed!";
                }
            }else{
                $statusMsg = "Unable to fetch the transaction details! $api_error"; 
            }
            
            $ordStatus = 'success';
        }else{
            $statusMsg = "Transaction has been failed! $api_error"; 
        }
   // }
}else{
	$statusMsg = "Invalid Request!";
}
//}
//session_unset();
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Stripe Payment Status - codeat21 </title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
</head>
<body class="App">
	<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
	<div class="wrapper">
		<?php if(!empty($paymentID)){ ?>
			<h4>Payment Information</h4>
			<p><b>Reference Number:</b> <?php echo $paymentID; ?></p>
			<p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
			<p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
			<p><b>Payment Status:</b> <?php echo $paymentStatus; ?></p>
				
			<!-- <h4>Product Information</h4>
			<p><b>Name:</b> <?php //echo $rowproduct['name']; ?></p>
			<p><b>Price:</b> <?php //echo $rowproduct['price'].' '.$rowproduct['currency']; ?></p> -->
		<?php } ?>
		<a href="../rate-card-v2.7.php" class="btn-link">Back to Product Page</a>
	</div>
</body>
</html>
