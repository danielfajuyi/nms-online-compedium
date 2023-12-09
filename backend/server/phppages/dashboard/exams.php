<?php 
session_start();
require 'includes/authenticate.php';
require_once 'includes/header_exam.html';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .dash-content{
            position:absolute;
            top:22vh;
            left:19vw;
        }
        @media screen and (max-width:766px){
            .dash-content{
            position:absolute;
            top:50vh;
            left:2vw;
        }
        .top{
            margin-top:50px;
            margin-left:10px;
        }
        
        }
        .fa-user-circle{
            font-size:80px;
            padding-left:5px;
            margin-left:12px;
        }
        .stats{
            padding-top:10px;
            padding-left:5px;
            font-family:lucida sans-serif serif;
            font-size:15px;
            
        }
        .fa-support{
            font-size:50px
        }
        .fa-user-secret{
            font-size:55px;
        }
        .up{
            marging-buttom:10px;
        }
        .col{
            margin-right:50px
        }
    </style>
</head>
<body>
    




<div class="container dash-content">
<div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    <h2>  practice <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2><hr>
    <div class="col  bg-primary p-2 rounded ml-2">
        <h1><i class="fa fa-pencil-square" aria-hidden="true"></i></h1> 
        <h5>
            Full Mock practice
        </h5>
     <h6>   <ul>
            <li>

        simulate real-time Examinnation
            </li>
            <li>
                Test your knowlwdge on NMS common enttrance full examination
            </li>
            <li>
                Math,quantitative reasoning,english,Verbal and general knowlwdge.
            </li>
            <li>
          Earn XP as you practice
            </li>
        </ul>
        <button type='button' data-bs-toggle='modal' data-bs-target="#full" class='btn btn-success'>START</button>
    
</h6>



    </div>
    


<?php require 'includes/modals.php';?>
    
    <div class="col ml-2 top bg-success rounded ">
    <h1> <i class="fa fa-bullseye" aria-hidden="true"></i></h1> 
        <h5>
    Customized Practice
        </h5>
     <h6>   <ul>
            <li>

       custustomize your experience
            </li>
            <li>
                Test your knowlewdge on on specific subjects
            </li>
            <li>
                Choose your prefferd practice year
            </li>
            <li>
                Customize difficulty levels
            </li>
            <li>
              Earn XP as you practice
            </li>
        
              
            
        </ul>
        <button class='btn btn-primary rounded' type='button' data-bs-toggle='modal' data-bs-target="#custom">Start</button>
    </div>
 
</div>
<div class="row  p-5 ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    <h1>Mock <i class="fa fa-laptop" aria-hidden="true"></i></h1> <hr>
    <div class="col  bg-warning">
        <h1>
            <i class="fa fa-book" aria-hidden="true"></i>
        </h1>
        <h6>

NMS common entrance mock <br> DATE : <kbd> 5th/febuary/2024</kbd><br> TIME: <kbd>09:00 AM </kbd>

        </h6>
        <h5>
            The general common entrance mock examination will be conducted on the <mark>nms online compedium</mark> platform  <a href="#"> click </a> for more details.
        </h5>
    </div>
</div>

</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </body>
    