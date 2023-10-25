


<?php



require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
                    
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=465;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='ssl';
                   
    
                    $mail->Username='nmsonlinecompedium@gmail.com';
                    $mail->Password='xulr wmmf wfba ofki';
    
                    $mail->setFrom('nmsonlinecompedium@gmail.com', 'NMS online compedium');
                    $mail->addAddress($email);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verification code";
                    $mail->Body="<p>Dear ". $fullname .", </p> <h3>Your verification code is  <span style='color:blue;text-decoration:underline;font-family:sans serif tahoma;font-size:20px;letter-spacing:3px;'>$otp </span><br>
                    <div style=' 
                    height:400px;
                    font-family:sans serif tahoma;
                    font-size:17px;
                    min-width:400px;
                    word-spacing:3px;
                    text-align:justify;
                    padding:20px;
                    border:2px ridge green;
                    border-radius:10px;
                    background:black;
                    margin-top: 50px;
                    color:white;'>
                    <img style='  width: 30px;
                    height: 30px;
                    border-radius:50%;
                    margin:50px;' src='nms-logo.png'alt='nmsLogo'><br> Thank you for your registeration,  we are glad  to have  you onboard. <br>Please Authenticate your email above to choose your prefered subscription and start  practicing, To impove chances of gaining admission into the <span style='font-family:lucida sanserif; margin:5px; color:purple;'>NIGERIAN MILITARY SCHOOL ZARIA</span>.
                    <div class='child'>
                    
                    <span></span>
                    </div>
                    </div>
                    
                    
                    
                    </h3>
                    <br><br>
                    <p>With regrads,</p>";
                   
                    
                   
                            if(!$mail->send()){
                                
                                    #if email was not sent 
                      echo "Register Failed, Authentication email could not be sent.. TRY using a different network connecction provider. Go back and try again";
                                
                                
                            }else{  ##if email is sent register the user

                                mysqli_query($conn,$query);
                                
                                
                             echo "Register Successfully, Authenntication code was  sent to " . $email . 'PLEASE!! check your email';
                                
                                  
                            }
        

?>

