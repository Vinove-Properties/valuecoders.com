<?php
/*
Template Name: Stripe Payment Init - Template
*/
session_start();
require get_template_directory().'/inc/str-config.php'; 
//require get_template_directory().'/inc/str-dbConnect.php';
require get_template_directory().'/stripe-php/init.php'; 

\Stripe\Stripe::setApiKey(STRIPE_API_KEY);
$stripe     = new \Stripe\StripeClient(STRIPE_API_KEY);
$name       = ( isset($_POST['cont_name']) && !empty( $_POST['cont_name'] ) ) ? $_POST['cont_name'] : '';
$email      = ( isset($_POST['cont_email']) && !empty( $_POST['cont_email'] ) ) ? $_POST['cont_email'] : '';
$price      = ( isset( $_POST['op-plan'] ) && !empty( $_POST['op-plan'] ) ) ? round($_POST['op-plan']*100) : 0;
$cur        = ( isset( $_POST['op-currency'] ) && !empty( $_POST['op-currency'] ) ) ? $_POST['op-currency'] : 'usd';
$product    = ( isset( $_POST['plan-type'] ) && !empty( $_POST['plan-type'] ) ) ? $_POST['plan-type'] : 'null';
$page_url   = ( isset( $_POST['page_url'] ) && !empty( $_POST['page_url'] ) ) ? $_POST['page_url'] : 'null';

/*
echo '<pre>';
print_r( $_POST );
echo '</pre>';
die;
*/

$customer_id = 0;
try {   
    $customer = \Stripe\Customer::create(array(
        'name' => $name,  
        'email' => $email 
    ));
}catch(Exception $e) {
    $api_error = $e->getMessage();   
} 
 
if(empty($api_error) && $customer){ 
    $customer_id = $customer->id;
}else{ 
    http_response_code(500); 
    echo json_encode(['error' => $api_error]);
    die;
}

$stripe = new \Stripe\StripeClient(STRIPE_API_KEY);
try{
    $checkout_session = $stripe->checkout->sessions->create(
      [
        'line_items' => [
          [
            'price_data' => [
              'currency' => $cur,
              'product_data' => ['name' => $product],
              'unit_amount' => $price
            ],
            'quantity' => 1,
          ],
        ],
        'customer' => $customer_id,
        'mode' => 'payment',
        'success_url'   => $page_url."?session_id={CHECKOUT_SESSION_ID}", 
        'cancel_url'    => $page_url
      ]
    );
    global $wpdb;
    $wpdb->insert('transactions',[
        'customer_name' => $name,
        'customer_email' => $email,
        'item_name' => $product,
        'item_price' => ($checkout_session->amount_total/100),
        'item_price_currency' => $checkout_session->currency,
        'paid_amount' => ($checkout_session->amount_total/100),
        'paid_amount_currency' => $checkout_session->currency,
        'session_id' => $checkout_session->id,
        'payment_status' => 'process',
        'created' => date('Y-m-d H:i:s'),
        'modified' => date('Y-m-d H:i:s')
    ]);
    /*
    echo '<pre>';
    print_r( $_POST );
    print_r( $checkout_session );
    echo '</pre>';
    die;
    */
    header('location:'.$checkout_session->url);
    exit;
}catch(Exception $e) {
    $api_error = $e->getMessage();   
    echo $api_error; die;
}

// Set API key 
/*
$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 
 
if( $jsonObj->request_type == 'create_payment_intent' ){
    // Define item price and convert to cents 
    $itemPriceCents = round($jsonObj->price*100); 
     
    // Set content type to JSON 
    header('Content-Type: application/json'); 
     
    try { 
        // Create PaymentIntent with amount and currency 
        $paymentIntent = \Stripe\PaymentIntent::create([ 
            'amount' => $itemPriceCents, 
            'currency' => $jsonObj->currency, 
            'description' => $jsonObj->product, 
            'payment_method_types' => ['card'] 
        ]); 
     
        $output = [ 
            'id' => $paymentIntent->id, 
            'clientSecret' => $paymentIntent->client_secret 
        ]; 
     
        echo json_encode($output); 
    } catch (Error $e) { 
        http_response_code(500); 
        echo json_encode(['error' => $e->getMessage()]); 
    } 
}elseif( $jsonObj->request_type == 'create_customer' ){ 
    $payment_intent_id = !empty($jsonObj->payment_intent_id)?$jsonObj->payment_intent_id:''; 
    $name = !empty($jsonObj->name)?$jsonObj->name:''; 
    $email = !empty($jsonObj->email)?$jsonObj->email:''; 
     
    // Add customer to stripe 
    try {   
        $customer = \Stripe\Customer::create(array(
            'name' => $name,  
            'email' => $email 
        ));
    }catch(Exception $e) {
        $api_error = $e->getMessage();   
    } 
     
    if(empty($api_error) && $customer){ 
        try { 
            // Update PaymentIntent with the customer ID 
            $paymentIntent = \Stripe\PaymentIntent::update($payment_intent_id, [
                'customer' => $customer->id 
            ]); 
        } catch (Exception $e) {  
            // log or do what you want 
        } 
         
        $output = [ 
            'id' => $payment_intent_id, 
            'customer_id' => $customer->id 
        ]; 
        echo json_encode($output); 
    }else{ 
        http_response_code(500); 
        echo json_encode(['error' => $api_error]); 
    } 
}elseif( $jsonObj->request_type == 'payment_insert' ){
    $fbody  = $jsonObj;
    $fbody  = "\n\n".date("F j, Y, g:i a")."\n".$fbody;
    $fbody  = str_replace("<br>","\n",$fbody);
    $file   = fopen("/var/www/html/valuecoders-landing/wp/paylogs.txt","a");
    fwrite( $file, $jsonObj );
    fclose( $file );

    $payment_intent = !empty($jsonObj->payment_intent)?$jsonObj->payment_intent:''; 
    $customer_id = !empty($jsonObj->customer_id)?$jsonObj->customer_id:''; 
     
    // Retrieve customer info 
    try{
        $customer = \Stripe\Customer::retrieve($customer_id);  
    }catch(Exception $e){
        $api_error = $e->getMessage();   
    } 
     
    // Check whether the charge was successful 
    if( 
        !empty( $payment_intent ) && 
        ( $payment_intent->status == 'succeeded' ) ){        

        // Transaction details  
        $transaction_id = $payment_intent->id; 
        $paid_amount    = $payment_intent->amount; 
        $paid_amount    = ($paid_amount/100); 
        $paid_currency  = $payment_intent->currency; 
        $payment_status = $payment_intent->status; 
         
        $customer_name  = $customer_email = ''; 
        if(!empty($customer)){ 
            $customer_name = !empty($customer->name)?$customer->name:''; 
            $customer_email = !empty($customer->email)?$customer->email:''; 
        } 
         
        // Check if any transaction data is exists already with the same TXN ID 
        $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?"; 
        $stmt = $db->prepare($sqlQ);  
        $stmt->bind_param("s", $transaction_id); 
        $stmt->execute(); 
        $stmt->bind_result($row_id); 
        $stmt->fetch();
         
        $payment_id = 0; 
        if(!empty($row_id)){ 
            $payment_id = $row_id; 
        }else{ 
            // Insert transaction data into the database 
            $sqlQ = "INSERT INTO transactions (customer_name,customer_email,item_name,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES (?,?,?,?,?,?,?,?,?,NOW(),NOW())"; 
            $stmt = $db->prepare($sqlQ); 
            $stmt->bind_param("sssdsdsss", $customer_name, $customer_email, $itemName, $paid_amount, $currency, $paid_amount, $paid_currency, $transaction_id, $payment_status); 
            $insert = $stmt->execute(); 
             
            if($insert){ 
                $payment_id = $stmt->insert_id; 
            } 
        } 
         
        $output = [ 
            'payment_txn_id' => base64_encode($transaction_id) 
        ]; 
        echo json_encode($output); 
    }else{ 
        http_response_code(500); 
        echo json_encode(['error' => 'Transaction has been failed!']); 
    } 
}
*/
?>