<?php
session_start();
require "./phppages/dbconnect.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

    #$user = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname =$_POST['firstName'].' '.$_POST['lastName'];
    $mobile =$_POST['mobile'];
    $times_stamp = date('y/m/d/h-M-s');
    $otp = rand(100000,999999);


   $query = " INSERT INTO `registerd_candidates`( `fullname`,  `password`, `mobile`, `email`, `reg_date`, `subscribed`, `subscription_type`,`verification`, `verification_code`) VALUES ('$fullname','$password','$mobile','$email','$times_stamp','false','NULL', 'false', '$otp')";
    ##$result=mysqli_query($conn,$query);
##AUTHERNTICATION
    $authenticate_email =  "SELECT * FROM `registerd_candidates` WHERE `email` = '$email'";
    $authenticate_mobile =  "SELECT * FROM `registerd_candidates` WHERE `mobile` = '$mobile'";
   
    
    $execute_authenticate_email= mysqli_query($conn,$authenticate_email);
    $execute_authenticate_mobile= mysqli_query($conn,$authenticate_mobile);
   
    
    if(mysqli_num_rows($execute_authenticate_mobile) > 0 and mysqli_num_rows($execute_authenticate_email) > 0){
        print " mobile number and email address already exist. email:";
        print_r(json_encode($_POST['email'].', mobile: '.$_POST['mobile']));
                
            }
   else if(mysqli_num_rows($execute_authenticate_email) > 0){
        echo "An account with this email already exist   ";
        echo '     PLEASE LOGIN';
    }
    else if(mysqli_num_rows($execute_authenticate_mobile) > 0){
        echo "mobile number already exist";

    }
    
   else{
   
require "login-system-main/email.php";
##header('location: localhost/login-system-main/verification.php');

   }
    
?>