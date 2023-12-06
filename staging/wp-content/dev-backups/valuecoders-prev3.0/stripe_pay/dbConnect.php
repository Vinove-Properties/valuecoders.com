<?php 
// Database configuration   

// Connect with the database 
$db_conn = new mysqli("localhost", "valuecoc_wpsite", "W@89Uz*3J!gp6>dA", "valuecoc_wpsite"); 
// Display error if failed to connect 
if ($db_conn->connect_errno) { 
    printf("Connect failed: %s\n", $db_conn->connect_error); 
    exit(); 
}
?>