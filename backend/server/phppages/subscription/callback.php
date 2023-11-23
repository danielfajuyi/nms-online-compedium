<?php
session_start();

require '../../../../vendor/autoload.php';
require '../dbconnect.php';


echo  $_GET['reference'] .'<br>';
echo $_GET['email'] .'<br>';
echo $_GET['amount'] / 100 .'<br>';

echo $_GET['plan'].'<br>';
echo $_GET['expire'] .'<br>';
echo $_GET['date'] .'<br>';

 $ref= $_GET['reference'] ;
 $email=$_GET['email'] ;
 $amount=$_GET['amount'] ;

 $plan=$_GET['plan'];
 $expire=$_GET['expire'] ;
$date= $_GET['date'] ;


$query = " INSERT INTO `subscribed_candidates` (`email` , `subscription_type`,`subscription_date`, `expiry_date`, `reference`)VALUES( '$email','$plan','$date','$expire','$ref')";
$query_2 = " UPDATE `registerd_candidates` SET `subscribed` = 1 ,`subscription_type` = '$plan' WHERE `email` = '$email'";
$result =mysqli_query($conn,$query);
$result_2 = mysqli_query($conn,$query_2);
if ($result && $result_2){
    
?>
 <!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
<div class='container p-10'>
    <div class='row'>
        <div class='col p-2 bg-dark'>
            <div class='alert alert-success'>
                 <h3>subscription successfull </h3>
                <a href='http://localhost:3000/login' class='btn btn-success'> login </a>to start practicing goodluck!!</div>

          </div>
    </div>
</div>

</body>
<?php }
else{ ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
<div class='container p-10'>
    <div class='row'>
        <div class='col p-2 bg-dark'>
            <div class='alert alert-danger'>
                 <h3>subscription  failed! </h3>
                <a href='localhost:3000/login' class='btn btn-danger'> contact </a>support for details</div>

          </div>
    </div>
</div>

</body>
<?php }

    // Retrieve the request's body and parse it as JSON
    $event = Yabacon\Paystack\Event::capture();
    http_response_code(200);

    /* It is a important to log all events received. Add code *
     * here to log the signature and body to db or file       */
    openlog('MyPaystackEvents', LOG_CONS | LOG_NDELAY | LOG_PID, LOG_USER | LOG_PERROR);
    syslog(LOG_INFO, $event->raw);
    closelog();

    /* Verify that the signature matches one of your keys*/
    $my_keys = [
                'live'=>'sk_live_blah',
                'test'=>'sk_test_blah',
              ];
    $owner = $event->discoverOwner($my_keys);
    if(!$owner){
        // None of the keys matched the event's signature
    die();
    }

    // Do something with $event->obj
    // Give value to your customer but don't give any output
    // Remember that this is a call from Paystack's servers and
    // Your customer is not seeing the response here at all
    switch($event->obj->event){
        // charge.success
        case 'charge.success':
            if('success' === $event->obj->data->status){
                // TIP: you may still verify the transaction
                echo "successsss";
                // via an API call before giving value.
            }
            break;
    }
    echo $_GET['reference'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        echo  $_POST['reference'];


    }
    else if($_SERVER['REQUEST_METHOD'] === 'GET'){
        echo  $_GET['reference'];
        

    }
?>