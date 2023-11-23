<?php
include  'includes/candclass.php';
//namespace Candidate;
session_start();
#echo $_SESSION['email'];

if(!isset($_SESSION['login'])){ 
    echo 'please login before you can access dashboard';
    die();
}
require '../dbconnect.php';

require_once 'includes/header.html';
 # candidates class

 


$user = new Candidates\Candidate();
#get db connection
$user->getDb();
#user email variable
$userEmail = $user->getEmail();
#fectch candidates indo
$getsubcand = $user->getsub($userEmail);
#handle new candidates
$user->ini_entry($userEmail);


#fetch candidates stats;
$getstat = $user->getstat($userEmail);
#$getstat = $user->getstat();



 #$email= $_SESSION['email'] ;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .dash-content{
            position:absolute;
            top:22vh;
            left:19vw;
        }
        @media screen and (max-width:766px){
            .dash-content{
            position:absolute;
            top:45vh;
            left:2vw;
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
            font-size:60px
        }
        .fa-user-secret{
            font-size:60px;
        }
        .up{
            marging-buttom:10px;
        }
        .halloffame{
            margin-left:50px;
        }
        .big{font-size:55px;}
    </style>
</head>
<body>

</div>
 <div class="container dash-content">
    <div class="row ">
        <div class=" bg-light rounded  float-end col-4">
            <h1> Stats<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></h1>
            <div>
                <h6>Ranking <i class="fa fa-line-chart " aria-hidden="true"></i>:<kbd>no <?php echo $user->ranking($userEmail);?> </kbd> </h6>
                <h6>rating :  <?php $user->rating($userEmail); ?> </h6>
                <h6>
                    last_score: <kbd> <?php echo $user->displaystat('last_score') ;?> </kbd>
                </h6>
                <h6>
                    highest_score: <kbd> <?php echo $user->displaystat('higest_score') ;?> </kbd>
                </h6>
                <h6>
                    overall_score: <kbd> <?php echo $user->displaystat('overall_score') ;?> </kbd>
                </h6>
            </div>
            
        </div>
        <div class="col bg-light">
        <h1>Info <i class="fa fa-desktop" aria-hidden="true"></i></h1>
        <div>
        <h6>examination-date: <kbd>11/march/2024</kbd></h6>
        <h6>
            examination-center: <kbd>chindit cantonment zaria</kbd>
        </h6>
        </div>
        </div>
        <div class="col bg-light">
             <i class="fa  fa-user-circle" aria-hidden="true"></i>
            <span class=''> <span><?php echo $user->displaystat('xp')?></span> XP <i class="fa fa-trophy" aria-hidden="true"></i></span>
            <br>
            <?php echo $user->display('fullname')?>
             <span class='stats' >
                Badges  <i class="fa fa-bandcamp" aria-hidden="true"></i> :
    </span> <br>
    <span class="stats">
                Ranking <i class="fa fa-bar-chart" aria-hidden="true"></i> : <?php echo $user->ranking($userEmail);?>
                
    </span >
        </div>
       
        
    </div>
    <div class="row pt-5 ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <h2 class="display-2"> Hall of Fame <i class="fa fa-trophy" aria-hidden="true"></i></h2>
        <div class="col mr-5 bg-warning ">
         <div class="content p-2">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <span><?php echo  $user->position(1,'xp');?> XP <i class="fa fa-trophy" aria-hidden="true"></i></span>
            <kbd class="up mb-2">current champion</kbd> <br>
            <div class='halloffame'>
            <h6>
          fullname : <kbd><?php echo  $user->position(1,'user');?></kbd>
            </h6> 
            <h6>
          Ranking : <kbd><?php echo  $user->ranking($user->position(1,'user'));?></kbd>
            </h6> 
          
          
          <h6> Rating : <kbd><?php echo $user->rating($user->position(1,'email'))?></kbd> </h6> 
          </div>
    </div>   
          </div>
        <div class="col mr-5  rounded bg-success ">
       <div class="content p-2">
            <i class="fa fa-user-md big" aria-hidden="true"></i>
            <span><?php echo  $user->position(2,'xp');?> XP <i class="fa fa-trophy" aria-hidden="true"></i></span>
            <kbd class="up mb-2">second place</kbd> <br>
            <div class='halloffame'>
            <h6>
          fullname : <kbd><?php echo $user->position(2,'user')?> </kbd>
            </h6> 
            <h6>
          Ranking : <kbd><?php echo  $user->ranking($user->position(2,'user'));?></kbd>
            </h6> 
          
          
          <h6> Rating :<?php echo  $user->rating($user->position(2,'email'));?>  </kbd> </h6> 
          </div> 
            
    </div>
    
        

    </div>
    <div class="row ${1| pt-5 ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col  ">
            <h4 class="display-4 ">progress <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></h4> <hr>
      <div style='height:50px;' class="mr-2 bg-secondary progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo $user->displaystat('progress');?>;"
              aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $user->displaystat('progress');?></div>
      </div>
        </div>
    </div>
 </div>  






</body>
</html>