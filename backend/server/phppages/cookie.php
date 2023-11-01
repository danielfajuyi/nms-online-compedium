<?php
# cookies
$d= strtotime("now");
$datestaamp = date("y/M/d:h:m:sa",$d);
$cookie_name = "userdata";
$cookie_value = array(   array(
    "email" => $email, "lastseen" => $datestaamp
) );
setcookie($cookie_name,$cookie_value, time()+ (86400*30), "/");

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
  } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
  }
  ?>