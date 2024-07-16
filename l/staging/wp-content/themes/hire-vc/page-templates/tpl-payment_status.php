<?php 
/*
Template Name: Stripe Payment Status - Template
*/
require get_template_directory().'/inc/str-config.php'; 
require get_template_directory().'/inc/str-dbConnect.php';
$payment_ref_id = $statusMsg = ''; 
$status = 'error'; 
 // Check whether the payment ID is not empty 
if(!empty($_GET['pid'])){
    $payment_txn_id  = base64_decode($_GET['pid']); 
     
    // Fetch transaction data from the database 
    $sqlQ = "SELECT id,txn_id,paid_amount,paid_amount_currency,payment_status,customer_name,customer_email FROM transactions WHERE txn_id = ?"; 
    $stmt = $db->prepare($sqlQ);  
    $stmt->bind_param("s", $payment_txn_id); 
    $stmt->execute(); 
    $stmt->store_result(); 
 
    if( $stmt->num_rows > 0 ){
        // Get transaction details
        $stmt->bind_result($payment_ref_id, $txn_id, $paid_amount, $paid_amount_currency, $payment_status, $customer_name, 
        $customer_email); 
        $stmt->fetch(); 
         
        $status     = 'success'; 
        $statusMsg  = 'Your Payment has been Successful!'; 
    }else{ 
        $statusMsg  = "Transaction has been failed!"; 
    }
}else{ 
    $redUrl = get_site_url('/ppc-management-master/');
    header("Location: $redUrl"); 
    exit; 
} 
?>

<?php if(!empty($payment_ref_id)){ ?>
    <h1 class="<?php echo $status; ?>"><?php echo $statusMsg; ?></h1>
    <h4>Payment Information</h4>
    <p><b>Reference Number:</b> <?php echo $payment_ref_id; ?></p>
    <p><b>Transaction ID:</b> <?php echo $txn_id; ?></p>
    <p><b>Paid Amount:</b> <?php echo $paid_amount.' '.$paid_amount_currency; ?></p>
    <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>

    <h4>Customer Information</h4>
    <p><b>Name:</b> <?php echo $customer_name; ?></p>
    <p><b>Email:</b> <?php echo $customer_email; ?></p>
<?php }else{ ?>
    <h1 class="error">Your Payment been failed!</h1>
    <p class="error"><?php echo $statusMsg; ?></p>
<?php } ?>