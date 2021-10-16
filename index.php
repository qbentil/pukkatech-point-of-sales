<?php
include_once "./public_html/includes/actions.php";
require "./public_html/includes/head.php";
// require "./public_html/includes/navbar.php";

// 
if(!isset($_GET['register'])){
    require "./public_html/includes/login.php"; 
}  
if(isset($_GET['register'])){
    require "./public_html/includes/register.php"; 
}  
// login
require "./public_html/includes/footer.php";