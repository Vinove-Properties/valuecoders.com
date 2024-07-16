<?php 
$db = new mysqli('localhost', 'phpmyadmin', 'root', 'valuecoc_l7');  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}
?>