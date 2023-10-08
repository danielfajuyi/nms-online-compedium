<?php
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
    echo $suscess;
}