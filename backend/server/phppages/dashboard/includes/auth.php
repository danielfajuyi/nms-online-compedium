<?php 
session_start();
  #print_r($_SESSION);
  $_SESSION['login'] = true;
$_SESSION['email'] = $_GET['email'];
print_r($_SESSION);

if(!isset($_SESSION['email']) ){

    header('location:http://localhost:3000/login');

}
else{
    header('location:http://localhost:/phppages/dashboard/dashboard.php');

}
  
 

if(isset($_POST['signout'])){
  session_destroy();
  
    header(' location:https://localhost:3000');
}

?>