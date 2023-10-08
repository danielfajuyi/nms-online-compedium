<?php
header("Access-Control-Allow-Origin: *");
##connection variables
$server = "localhost";
$user = "sirabdull";
## password is confidential
$password = "dashnov4";
$database = "candidates";
$suscess= '<h1>'.'connection sucessfull'.'<h1>';
$notestablished= '<h1>'.'connection UNsucessfull'.'<h1>';
##establishing connection

$conn = mysqli_connect($server,$user,$password,$database);
if(!$conn){
    echo $notestablished;
}
else {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email']
    $times_stamp = date("y/m/d:h:m:l:sa");

    $query = ' INSERT INTO `registerd_candidates`(username,email,mobile,password,reg_date,) VALUES("$user","$email","$mobile","$password","$times_stamp")';
    $result=mysqli_query($conn,$query);
    if($result){
        echo " <div>
        registerd sucessfully
        
        <div>"
        header("/");
    }
}