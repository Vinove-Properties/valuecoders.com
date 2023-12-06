<?php
/*
Template Name: Payment data Page
*/ 
?>
<?php 
session_start(); 
$_SESSION['techitm'] = $_POST['techitem'];
$_SESSION['dedicateditm'] = $_POST['dedicateditm'];
$_SESSION['times'] = $_POST['times'];
$_SESSION['customers'] = $_POST['customers'];
$_SESSION['addons'] = $_POST['addons'];
$_SESSION['addonsprice'] = $_POST['addonsprice'];
$_SESSION['tdtext'] = $_POST['tdtext'];
$_SESSION['tdprice'] = $_POST['tdprice'];
$_SESSION['atdtext'] = $_POST['atdtext'];
$_SESSION['atdprice'] = $_POST['atdprice'];
?>