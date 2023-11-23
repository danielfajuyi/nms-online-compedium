<?php 
session_start();
  #print_r($_SESSION);
  $_SESSION['login'] = true;
$_SESSION['email'] = $_GET['email'];

if(!isset($_SESSION['email']) or $_SESSION['email'] != $_GET['email']){
    header('location:http://localhost:3000/login');

}
else{
    header('location:http://localhost:/phppages/dashboard/dashboard.php');

}
    
 ## 

##if(!isset($_SESSION['login'])){
   # header(' location:https://localhost:3000');
#}

?>