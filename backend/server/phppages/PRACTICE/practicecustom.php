<?php
include '../dashboard/includes/candclass.php';

$exam = new candidates\exam;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$subject = array(
    'english','calculation','general'
);
 $english = array();
 $calculation = array();
 $general = array();
$result = mysqli_query($exam->getDb(), " SELECT * FROM `questions`");


while( $row  = mysqli_fetch_assoc($result) ){
if($row['subject']== 'english'){
    $english[] = $row;
}
if($row['subject']== 'calculation'){
    $calculation[] = $row;
}
if($row['subject']== 'general'){
    $general[] = $row;
}

}
#shuffle all questions in each subjects
shuffle($english);
shuffle($calculation);
shuffle($general);

##reduce the number of questions from each subject to 30
 $english = array_slice($english,0,30,true);
 $general = array_slice($general,0,30,true);
 $calculation = array_slice($calculation,0,30,true);
//calculating total amount of questions
$totalq = count($english)+count($general)+count($calculation);
#Now combine all subjects and questions into one single array
$combine_subject =array(
    $english,
    $calculation,
    $general
);

?>

<!DOCTYPE html>

<html lang="en">

<head>
<link rel="icon" href="nms-logo.webp" type="image/webp">
    <title>practice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .cover{
            margin-top:20px;
            max-width: 1000px;
         
            max-height:100000px;
            border:2px ridge white;
            border-radius:10px;
            text-align:left;
            font-family:sans-serif lucida ;
            cursor: pointer;
            position:relative;
        }
        .cover:hover{
            background:white;
            color:black;
        
        }

            input{
                color:red;
                font-size:40px;
                padding:5px;
                margin-left:10px;
                margin-right:10px;
                border:1px ridge black;
                margin-top:5px;
                width: 20px;
                height:20px;
              
                cursor: pointer;
            }
label{
    margin-left: 40px;
}

            
body {font-family: Verdana, sans-serif; margin:0}


/* The dots/bullets/indicators */
.bt{
    width:18px;
    height:20;
 margin-left:20px;
 margin-top:50px;
}
.dot{
  margin-left:10px;
  margin-top:10px;
}

.active, .dot:hover {
  background-color: green;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 500px) {
  *{font-size: 15px}

}
.questions{
padding-left:  20px;
position:relative;
margin-bottom:100px;
}

.container-fluid{
height:100vh;
}
.column:hover{
    background-color:white;
    color:black;
}
.sub{
    position:relative;
    bottom:70px;
    float:left;
}
.menu{
    position:relative;
    top:5vh;
    right: 20px;
    float:end;
}
.answerd{
    background-color:yellow;
}
.subject{
    position:absolute;
 font-family:lucida, sans-serif  tahoma;
   z-index:1;
 color:white;
    font-size:20px;
    right:10px;
    top:0px;
}
.slides{
  display:inline-block;
}
.q-nav{
  color:white;
  margin-left:20px;
  margin-top:10px;
}
    </style>
</head>

<body class="bg-dark main-father">
  <div class="q-nav">
    <h6>English</h6>
<?php

for($i=1; $i<=count($english); $i++){
echo  " <div class='slides'>
<button  id='english$i' onclick='currentSlide($i)' class='btn btn-warning dot'>$i</button>
</div>";}?>

</div>
<div class="q-nav">
  <h6>calculation</h6>
<?php

for($i=1; $i<=count($calculation); $i++){
  $y =$i+count($english);
echo  " <div class='slides'>
<button id='calculation$i' onclick='currentSlide($y)' class='btn btn-warning dot'>$i</button>
</div>";}?>

</div>
<div class="q-nav">
  <h6>general Knowledge</h6>
<?php
  $count = count($calculation)+count($english);
for($i=1; $i<=count($general); $i++){
$y = $i + $count;
echo  " <div class='slides'>

<button id='general$i'onclick='currentSlide($y)' class='btn btn-warning dot'>$i</button>
</div>";}?>

</div>


<div class="container-fluid  bg-dark">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        




        <div class="info  text-light">
          

<div class="timer pr-2 pb-2 float-end">Time left: <i class="fa fa-hourglass-1 fa-spin" aria-hidden="true"></i><i> 1:29:45</i>  </div>
            
        </div>

 <h2> 
    <!--  Next and previous button -->
 <button  class="btn col-2   btn-lg float-end btn-success" onclick="plusSlides(1)"> <i class="fa fa-forward" aria-hidden="true"></i></button>
    <button  class="btn col-2   btn-lg float-start btn-success" onclick="plusSlides(-1)"> <i class="fa fa-backward" aria-hidden="true"></i></button></h2>
</div>
<form action="submit.php" method="post">
<?php
foreach ($combine_subject as $key => $subjects) {
  # code...

   foreach($subjects as $index => $question){
 
?>



    <div class="questions  mySlides  conatiner  pt-2 bg-dark  ">
   
    <h5 class="text-light  float-left "> <?php echo '['. $index+1 . ']    '. $question['question_text']?></h5>
           <?php 
         $sub = $question['subject'];
           for($i = 1; $i <= 4; $i++)
                     {
                         $optionid = $question['question_id'].'_'.$question["option_$i"];
?>
            

           <div class="cover column bg-dark text-light">

      <h5>       <input onclick= " handlestate('<?php echo $question['subject']?><?php echo $index+1?>')" type="radio" class="bg-dark text-white" name=" <?php echo $question['question_id']?>" id="<?php echo $optionid?>" value="<?php echo $i?>">
              <label  for="<?php echo $optionid?>"> <?php echo $question["option_$i"]?> </label>
      </h5>
             </div>
          

<?php

}
  ?>
  </div>

<?php

   }

  }

?>
<button name="submit" class=" btn sub btn-lg btn-success"type="submit">Submit</button>

</form>


</div>


<script>
  
 var x = 0;

       
       function handlestate(q){

 //test       

let dos =  q.split(',')
let english = dos;
//test
document.getElementById(english).style.background ='green';

document.getElementById(english).classList.remove("btn-warning");

//function for counting answerd cquestions "btn-success"

}
 //function for changing dots colour when questios are answerd


let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);

}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  dots[slideIndex-1].classList.add('btn-info');

}


</script>


</body>





    
</html>
<?php
}

?>