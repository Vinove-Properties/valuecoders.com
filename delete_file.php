<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['delete']) && $_GET['delete']==1){
    $str=rtrim($_GET['imageName'],',');
    $imagPath='./uploads/'.$str;
    if(unlink($imagPath)){
        return true;
    }else{
        false;
    }
}
