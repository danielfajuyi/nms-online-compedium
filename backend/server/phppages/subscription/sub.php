<?php
session_start();
require '../dbconnect.php';
$email = $_GET['email'];
$_SESSION['email'] = $email;

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
        .card{
            width:15rem;
            height: 
                5rem;
            
        }
        img{
            height: 20rem;
        }
        .card-text{
            text-align: left;
            justify-content: left;
        }
        .aria{
            width:15px;
            color:white;
            height:15px;
            background:white;
            border-radius:50%;
        }
        @media screen and (max-width:991px) {
.prem{
    position: absolute;
    top: 700px;
}
            
        }
        @media screen and (max-width:615px) {
.ulti{
   position: absolute;
   top: 1400px;
            
        }
.container{
    text-align: center;
    justify-content: center;
}

    }
    input{
        display: none;
    }
    </style>
</head>
<body class="bg-dark">
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
   
  <script src="https://js.paystack.co/v1/inline.js"></script>





<div class="container-fluid">
    <div class="row justify-content-center align-items-center text-white g-2">
        <div class="col float-center">Dicsipline</div>
        <div class="col">knowlewdge</div>
        <div class="col">patroitism</div>
    </div>
</div>

<div class="container-fluid p-5 bg-success">
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col rounded Basic  ">
            <div class="card rounded borderd ">
              <img src="svg/rsm.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-success">Basic plan</h5>
                <h6 class="card-subtitle mb-2 text-muted text-success">Price -> <img src="svg/aira.png" class='aria' alt=""> 3000</h6>
                <p class="card-text text-white"><ul class="text-white float-end">
                    <li>
                        <b>one month access<i class="fa fa-universal-access" aria-hidden="true"></i></b>
                    </li>
                    <li>
                        Access upto 5 years past questions  <i class="fa fa-check text-success" aria-hidden="true"></i>
                    </li>
                    <li>
                        unlimited practice sessions <i class="fa fa-book" aria-hidden="true"></i>
                    </li>
                    <li>
                      progress tracking <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    
                    </li>
                    
                    <li>
                    <form action="initialize.php" method="post">
                            <input type="number" name="amount" class="hidden" value= '3000'>
                            <input type="number" name="plan" class="hidden" value= 'BASIC'>
                           
                        <button type="submit" name="pay_basic" class=" btn btn-warning">subscribe</button>
                    </li>
                </ul></p>
                
              </div>
            </div>
        </div>
        <div class="col rounded   prem ">
            <div class="card rounded ">
              <img src="svg/aki.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-success">premium plan</h5>
                <h6 class="card-subtitle mb-2 text-success">Price -> <img src="svg/aira.png" class='aria' alt="">  3500</h6>
                <p class="card-text text-white"><ul class="text-white float-end">
                    <li>
                        <b>two months access<i class="fa fa-universal-access" aria-hidden="true"></i></b>
                    </li>
                    <li>
                  Access  upto 10 years past questions  <i class="fa fa-check text-success" aria-hidden="true"></i>
                    </li>
                    <li>
                        unlimited practice sessions <i class="fa fa-book" aria-hidden="true"></i>
                    </li>
                    <li>
                      progress tracking <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    
                    </li>
                    <li>
                        customizable learning <i class="fa fa-pencil-square" aria-hidden="true"></i>
                      
                      </li>
                    <li>
                    <form action="initialize.php" method="post">
                            <input type="number" name="amount" class="hidden" value= '3500'>
                            <input type="number" name="plan" class="hidden" value= 'PREMIUM'>
                           
                        <button type="submit" name="pay_premium" class=" btn btn-warning">subscribe</button>
                    </li>
                </ul></p>
              </div>
            </div>
        </div>
        <div class="col rounded ulti  ">
            <div class="card rounded ">
              <img src="svg/somt.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-success">Ultimate plan</h5>
                <h6 class="card-subtitle mb-2 text-success ">Price -> <img src="svg/aira.png" class='aria' alt="">  7000</h6>
                <p class="card-text text-white"><ul class="text-white float-end">
                    <li>
                        <b>Full time access<i class="fa fa-universal-access" aria-hidden="true"></i></b>
                    </li>
                    <li>
                        Access full compedium past questions  <i class="fa fa-check text-success" aria-hidden="true"></i>
                    </li>
                    <li>
                        unlimited practice sessions <i class="fa fa-book" aria-hidden="true"></i>
                    </li>
                    <li>
                      progress tracking <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    
                    </li>
                    <li>
                        customizable learning <i class="fa fa-pencil-square" aria-hidden="true"></i>
                      
                      </li>
                      <li>
                    compete globally with other candidates <i class="fa fa-pencil-square" aria-hidden="true"></i>
                      
                      </li>
                      <li>
                       Admission guide and tips <i class="fa fa-question-circle" aria-hidden="true"></i>
                          
                          </li>
                    <li>
                        <form action="initialize.php" method="post">
                            <input type="number" name="amount" class="hidden" value= '7000'>
                            <input type="number" name="plan" class="hidden" value= 'ULTIMATE'>
                           
                        <button type="submit" name="pay_ultimate" class=" btn btn-warning">subscribe</button>
                        </form>
                       
                    </li>
                </ul></p>
              </div>
            </div>
        </div>
    </div>
</div>
    <div class="container second">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>