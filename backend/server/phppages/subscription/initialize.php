<?php
session_start();
 require '../../../../vendor/autoload.php';
 
 #$email = $_GET['email'];
 $email =$_SESSION['email'];

 $reference = rand(5000,1934532523455999);
 $date = date('d/m/Y / H:i:sa');
 
 

if(isset($_POST['pay_ultimate'])){
$paystack = new Yabacon\Paystack('sk_test_bee54a9dc1be5841efedc2abd6d12ea8199c472d');
$plan = 'ULTIMATE';
 $time = strtotime('+90 days ');
$expire = date('d/m/Y',$time);
$amount = 7000* 100;
    try
    {
      $tranx = $paystack->transaction->initialize([
        'amount'=>$amount,       // in kobo
        'email'=>$email,         // unique to customers
        'reference'=>$reference,
       # 'date' =>$date ,
       // unique to transactions
        'callback_url' => 'http://localhost/phppages/subscription/callback.php?amount='. $amount .'&email='. $email.'&date='. $date . '&plan='. $plan .'&expire= '. $expire .''

      ]);
    } catch(\Yabacon\Paystack\Exception\ApiException $e){
      print_r($e->getResponseObject());
      die($e->getMessage());
    }

    // store transaction reference so we can query in case user never comes back
    // perhaps due to network issue
    //save_last_transaction_reference($tranx->data->reference);

    // redirect to page so User can pay
    header('Location: ' . $tranx->data->authorization_url);
}
 






if(isset($_POST['pay_premium'])){
  $paystack = new Yabacon\Paystack('sk_test_bee54a9dc1be5841efedc2abd6d12ea8199c472d');
  $plan = 'PREMIUM';
   $time = strtotime('+60 days ');
  $expire = date('l,d/m/Y',$time);
  $amount = 3500 * 100;
      try
      {
        $tranx = $paystack->transaction->initialize([
          'amount'=>$amount,       // in kobo
          'email'=>$email,         // unique to customers
          'reference'=>$reference,
         # 'date' =>$date ,
         // unique to transactions
          'callback_url' => 'http://localhost/phppages/subscription/callback.php?amount='. $amount .'&email='. $email.'&date='. $date . '&plan='. $plan .'&expire= '. $expire .''
  
        ]);
      } catch(\Yabacon\Paystack\Exception\ApiException $e){
        print_r($e->getResponseObject());
        die($e->getMessage());
      }
  
      // store transaction reference so we can query in case user never comes back
      // perhaps due to network issue
      //save_last_transaction_reference($tranx->data->reference);
  
      // redirect to page so User can pay
      header('Location: ' . $tranx->data->authorization_url);
  }



  if(isset($_POST['pay_basic'])){
    $paystack = new Yabacon\Paystack('sk_test_bee54a9dc1be5841efedc2abd6d12ea8199c472d');
    $plan = 'BASIC';
     $time = strtotime('+ 30 days ');
    $expire = date('l,d/m/Y',$time);
    $amount = 3000 * 100;
        try
        {
          $tranx = $paystack->transaction->initialize([
            'amount'=>$amount,       // in kobo
            'email'=>$email,         // unique to customers
            'reference'=>$reference,
           # 'date' =>$date ,
           // unique to transactions
            'callback_url' => 'http://localhost/phppages/subscription/callback.php?amount='. $amount .'&email='. $email.'&date='. $date . '&plan='. $plan .'&expire= '. $expire .''
    
          ]);
        } catch(\Yabacon\Paystack\Exception\ApiException $e){
          print_r($e->getResponseObject());
          die($e->getMessage());
        }
    
        // store transaction reference so we can query in case user never comes back
        // perhaps due to network issue
        //save_last_transaction_reference($tranx->data->reference);
    
        // redirect to page so User can pay
        header('Location: ' . $tranx->data->authorization_url);
    }
     
   
 unset($_POST['pay']);?>