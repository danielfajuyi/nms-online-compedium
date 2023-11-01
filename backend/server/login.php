<?php
require "./phppages/dbconnect.php";
require "./phppages/session.php";


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

  
    $password = $_POST['password'];
    $email = $_POST['email'];
    $times_stamp = date("y/m/d:h:m:l:sa");

   $query = " SELECT * from `registerd_candidates` WHERE `email` = '$email' AND `password` = '$password'";
   $result = mysqli_query($conn,$query);
   $row = mysqli_num_rows($result);
   if($row >0){
echo 'login sucessfull';
   }

    
    else{
     echo 'invalid email or pasword';
    }
    ?>