<?php
namespace Candidates;
class Candidate {

    /*------------------------------¬
  THIS CLASS CONTAINS METHODS FOR HANDLING CANDIDATES PRACTICE DETAILS AND ALSO AUTHENTICATING CANDIDATES 😂👍

INFO::::::: The candidates class will get all instances and statistics of the sesssion user 



*/
public $query;
public $progress;
public $xp;
public $last_score;
public $higest_score;
public $overall_score;
public $rating;

#👇👇👇👇👇👇 the DATABASE connection method 👇👇👇👇👇
#  reffernce using $this->getDb() 


public function getDb(){
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
   else{
       return $conn;
   }



}




/*

GET THE SEESSIONUSER'S EMAIL ADDRESSS 
CALL usuing $this->getEmail()
*/
public function getEmail() {
  //session_start(); // Start the session if not already started
   if (isset($_SESSION['email'])) {
       $email = $_SESSION['email'];
       return $email;
   } else {
       return null; // Return null or 
       die('PLEASE LOGIN TO NMS-ONLINE-COMPEDIUM ');
  
       
       //handle the absence of email in the session as needed

   }
}




/*

*********GETTING info**************

THE METHOD BELLOW 👇👇👇👇 HANDLES THE FETCHING OF USER INFO FROM DB.

CALL::::: PASS THE USER EMAIL AS AN ARGUMENT WHEN CALLING.

*********eg $this->getsub('$email')********


*/

 public function getsub($email){

   ##$table_reg =;
   $query = "SELECT * FROM  `registerd_candidates` WHERE  `email` = '$email' ";
   return mysqli_query( $this->getDb(),$query);

       
}


/*

*********DISPLAY INFO**************

THE METHOD BELLOW 👇👇👇👇 HANDLES THE DISPLAYING OF USER INFORMATION.

CALL::::: PASS THE COLUMN NAME AS AN ARGUMENT WHEN CALLING.

COLUMN NAME REPRESNT'S SPECIFIC RECORDS.

*********eg $this->dispaly('fullname')********displays user's fullname
*/




function display($column){

   $row = mysqli_fetch_assoc($this->getsub($this->getEmail()));
   
   return $row[$column];
        
       
}


/*

*********GETTING STATS**************

THE METHOD BELLOW 👇👇👇👇 HANDLES THE FETCHING OF A SPECIFIC USER STATS FROM DB.

CALL::::: PASS THE USER EMAIL AS AN ARGUMENT WHEN CALLING.

*********eg $this->getstat('$email')********
*/



public function getstat($email){
 
   
$query = "SELECT * FROM  `stats`  WHERE `email` = '$email' ";
$result = mysqli_query($this->getDb(),$query);
return $result;
 
}

/*

*********DISPLAY STATS**************
THE METHOD BELLOW 👇👇👇👇 HANDLES THE DISPLAYING OF STATS
STATS ARE UNIQUE TO EACH USER
*/

function displaystat($column){
    $row = mysqli_fetch_assoc($this->getstat($this->getEmail()));
 
 $output =  $row[$column];
 return $output;
 
 }
 /*
 *********************HEADING*********************
             {HANDLING NEW USERS}
THE BELLOW METHOD 👇👇👇 WILL HANDLE USERS WHO ARE JUST ACCESSING 
THE DAHSBOARD FOR THE FIRST TIME ⌚
 ALGORITHM :: -> first we try to get the user's data for stats table
              ->if such data dosen't exist we create initial values for the user;
              ->if it does, we take no Action ( as we are handling new users)


 */
 public function ini_entry($email){
   $check = $this->getstat($email);
if(mysqli_num_rows($check)<= 0){

     $fullname = $this->display('fullname');
$query =" INSERT INTO `stats` (`email`,`user`,`xp`,`rating`,`progress`,`last_score`,`higest_score`,`overall_score`) VALUES ('$email','$fullname',0,1,0,0,0,0)";
mysqli_query($this->getDb(),$query);
?>
<div class="col-4 m-auto d-grid">
<div class="alert alert-success alert-sm   alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 
    <h4><strong>welcome!</strong></h4> <br> seems it your  First time login..check compedium guide if you need  help
    <button type="button" class="btn-danger pt-2 btn-block rounded" data-bs-dismiss="alert" aria-label="Close">close</button>
 </div>
</div>
 <?php
}
else{

 ?>
 <?php
}
 }







public function sort(){
    $query = " SELECT * FROM `stats` ORDER BY `xp` ASC  ";
 $result = mysqli_query($this->getDb(),$query);
return $result;
}

/*
 *********************HEADING*********************
             {RANKING USERS}
THE BELLOW METHOD 👇👇👇 WILL HANDLE RANKING OF THE users USERS
⌚
 ALGORITHM :: -> first we try to get all; users data for stats table SORTING IN ASCSENDING ORDER
              -> THEN WE CREATE AN EMPTY data ARRAY and store ALL the data we fecthed one by one
              ->THEN WE LOOP THROGH OUR ARRAY SEARCHING FOR THE THE DATA THAT MATCHES WHO WE ARE LOOKING FOR;
              ->IF WE FIND A MATCH THEN WE ADD ONE TO THE INDEX OF THAT MATCH 
              -> FINALLY WE RETURN THE INDEX WICH IS THE USER'S POSITION SORTED BY XP


 */
public function ranking($who_to_rank){
 $result=$this->sort();
if ($result->num_rows > 0){
$data = array();
$ranking = -1;

while($row = mysqli_fetch_assoc($result)){
#$total = count($row);
$data[] = $row;
 
   }
foreach($data as $index => $user){
    if($user['email'] == $who_to_rank or $user['user'] == $who_to_rank){

$ranking = $index + 1;
        }
   }
 return $ranking;
}

}



/*
 *********************HEADING*********************
             {RATING USERS}
THE BELLOW METHOD 👇👇👇 WILL HANDLE RATING  OF THE  USERS

 ALGORITHM :: -> first we try to get the user's RATING FIELD from the  stats table
              ->THEN WE MINUS 1 FROM THE USER'S RATING TO ENSURE RATING IS NOT MORE
               THAN FIVE AS WE CAN ONLY DISPLAY MAX OF STARTS;
              ->THEN we loop through the amount of rating the person has 
              ->FINALY WE CREATE A STAR FOR EACH LOOP

 */




public function rating($who_to_rate){
 $query = " SELECT `rating` FROM `stats` WHERE `email` = '{$who_to_rate}'  ";
 $result = mysqli_query($this->getDb(),$query);
 $row = mysqli_fetch_assoc($result);
 $rate = (int)$row['rating'] -1;

 if( $rate <= 5){
    $star = 0;
while($star <= $rate){
echo " <i class='fa text-success fa-star' aria-hidden='true'></i> ";
?>


 <?php 
   
$star++;
}

 }
else{
   echo ' sorry invalid rating';
}
 
}






public function set_stat($stat,$value){

    if ($stat == 'xp'){
        $former = $this->displaystat('xp');
 $update  =  $former + $value;
 mysqli_query($this->getDb(),"UPDATE `stats` SET `xp` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
    }




    if ($stat == 'progress'){
        (int)$value;
        $div =  $this->displaystat('xp');
   $int = (int)$div/100;
        $update  = $int + $value;
        mysqli_query($this->getDb(),"UPDATE `stats` SET `progress` = '{$update}'  WHERE `email` = '{$this->getEmail()}'");
           }




  if ($stat == 'rating'){
      $update  = $this->dispalystat('xp') /1000;
  mysqli_query($this->getDb(),"UPDATE `stats` SET `{$stat}` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
               }


     if ($stat == 'last_score'){
          $update  =  $value;
        mysqli_query($this->getDb(),"UPDATE `stats` SET '{$stat}' = '{$update}' WHERE `email` = '{$this->getEmail()}'");
                 }


if($stat == 'higest_score'){
$former = (int)$this->displaystat('higest_score');
 if($value > $former){
    $update  =  $value;
    mysqli_query($this->getDb(),"UPDATE `stats` SET `higest_score` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
 }
 else{

    return;
 }
   
}
if($stat == 'overall_score'){
    $former =  $this->displaystat('overall_score');
    $int = (int)$former;
         $update  = $int + (int)$value;
    $update  = $former+= $value;
    mysqli_query($this->getDb(),"UPDATE `stats` SET `overall_score` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
    
}

}






public function position($pos,$field){
 $result = $this->sort();
 if ($result->num_rows > 0){
    $data = array();
  $pos = $pos-1;
    
    while($row = mysqli_fetch_assoc($result)){
    #$total = count($row);
    $data[] = $row;
     
       }
foreach($data as $index => $user){
if($index == $pos){

    return $user[$field];
                  }
                             }


        }




    }

}

?>