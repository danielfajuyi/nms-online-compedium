<?php
require "./phppages/dbconnect.php";

header('Access-Control-Allow-Origin: *');

    $user = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname =$_POST['fullname'];
    $mobile =$_POST['mobile'];
    $times_stamp = date("y/m/d:h:m:l:sa");

   $query = " INSERT INTO `registerd_candidates`( `fullname`, `user`, `password`, `mobile`, `email`, `reg_date`, `subscribed`, `subscription_type`) VALUES ('$fullname','$user','$password','$mobile','$email','$times_stamp','false',' NILL')";
    ##$result=mysqli_query($conn,$query);
    $auth =  "SELECT * FROM `registerd_candidates` WHERE `email` = '$email'";
    $exeauth= mysqli_query($conn,$auth);
    
    if(mysqli_num_rows($exeauth) > 0){
        echo "EMAIL ALREADY EXIST";
    }
    
    else{
        mysqli_query($conn,$query);
            echo "registerd succesfullly";
        
    }
    
?>