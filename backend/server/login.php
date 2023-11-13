<?php
 if(isset($_POST['remember'])){
    require_once "./phppages/cookie.php";
}
if(isset($_COOKIE['userdata'])){
    $_POST['email'] = $_COOKIE[$cookie_value->email];
}
require "./phppages/dbconnect.php";
require "./phppages/session.php";


header('Access-Control-Allow-Origin: *');

   
    $password = $_POST['password'];
    $email = $_POST['email'];
   
  
    $auth =  "SELECT * FROM `registerd_candidates` WHERE `email` = '$email' AND `password` = '$password'";
    $exeauth= mysqli_query($conn,$auth);
    $row = mysqli_fetch_assoc($exeauth);
   
    if(mysqli_num_rows($exeauth)<=0){
        echo' Invalid credentials!!';

    }
   else if($row['verification'] != 1){
        echo 'please verify your email before attempting to login';
    }
else if ($row['subscribed'] != 1){
    echo' please subscribe to a plan to start practicing';
}
   
    
    else{
       echo' welcome back comrade!';
    }
    
?>                