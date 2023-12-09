


    



<?php
include '../dashboard/includes/candclass.php';

$exam = new candidates\exam;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
$subject =$_POST['subject'];
##echo $subject;
$year =$_POST['year'];

$result = mysqli_query($exam->getDB()," SELECT * FROM questions WHERE  `subject` = '{$subject}' AND `year` = '{$year}'" );
$data = array();
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

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.bt{
    width:20px;
    height:20;
 
 
   margin-left:20px
}
.dot{
  margin-left:20px;
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
.questions{

    
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
    bottom:55px;
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
    </style>
</head>

<body class="bg-dark">

        <?php
 
while( $row = mysqli_fetch_assoc($result)){
    $data[] =$row;
    
}
//shuffle($data);
shuffle($data);
?>
<button class="btn menu float-end btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#Id1" aria-controls="Id1"><i class="fa fa-navicon" aria-hidden="true"></i></button>
        
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="Id1" aria-labelledby="Enable both scrolling & backdrop">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="Enable both scrolling & backdrop">Questions navigation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <p><?php
            /*
            loop to display all quiuestion nav bvuttons
            
            */
for($i = 1; $i <= count($data); $i++){
    echo "
   <div class='btn btn-danger dot p-2 ml-2 btn-lg' onclick='currentSlide({$i})' style=' display:inline;;'>
  $i
 </div>

    
    
    ";
}
?>.

<div class="row pt-5">
<div class="col p-2">
  <h6> <span class="text-success"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span> Answerd <i class="fa fa-check" aria-hidden="true"></i>: <span id='ans'></span><kbd>of</kbd>  <?php echo count($data)?></h6>
 
</div>
</div>
</p>
          </div>
        </div>
<div class="container-fluid pt-5 bg-dark">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        




        <div class="info text-light">
            <h6>Subject: <i class="fa fa-book" aria-hidden="true"></i> <kbd><?php echo $subject?></kbd><br>
            Year: <i class="fa fa-calendar" aria-hidden="true"></i> <kbd><?php echo $year?></kbd><br>
            Questions : <i class="fa fa-question-circle" aria-hidden="true"></i><kbd><?php echo count($data)?></kbd><br>
            Time : <i class="fa fa-clock-o" aria-hidden="true"></i> <kbd>1:30:00</kbd>

<div class="timer float-end">Time_left: <i class="fa fa-hourglass-1 fa-spin" aria-hidden="true"></i> <kbd>1:29:45 </kbd></div>
            </h6>
        </div>

 <h2> 
    <!--  Next and previous button -->
 <button  class="btn col-2 pt-2  btn-lg float-end btn-success" onclick="plusSlides(1)">Next</button>
    <button  class="btn col-2 pt-2  btn-lg float-start btn-warning" onclick="plusSlides(-1)">prev</button></h2>
</div>
<form action="submit.php" method="post">
           <?php 
/*

the loop to display all question text and options from the data array

*/
            foreach($data as $index => $question){
            ?>
    <div class="questions  mySlides  conatiner  pt-5 bg-dark l ">
      <h5 class="text-light  float-left "> <?php echo $index+1 . ')  '. $question['question_text']?></h5>
             <?php  for($i = 1; $i <= 4; $i++)
                       {
                           $optionid = $question['question_id'].'_'.$question["option_$i"];

              ?>

               <div class="cover column bg-dark text-light">

        <h5>       <input onclick="handlestate('<?php echo $index +1?>')" type="radio" class="bg-dark text-white" name=" <?php echo $question['question_id']?>" id="<?php echo $optionid?>" value="<?php echo $i?>">
                <label  for="<?php echo $optionid?>"> <?php echo $question["option_$i"]?> </label>
        </h5>
               </div>

<?php
}?>


</div>

<?php

}

}
?>
<button name="submit" class=" btn sub btn-lg btn-danger"type="submit">Submit</button>

</form>
</div>

<?php

?>

<script>
 var x = 0;
function handlestate(q){
  
    let btn = document.getElementsByClassName("dot");
    //alert(btn[q])
    
    btn[q-1].style.background = "green";
  
 
    btn[q-1].style.color = "";
    for(i=0;i<btn.length;i++){
      let checked = btn[i].style.background;
      switch (checked){
        case "green": x++
        break;
        default:return ;
      }
    }
  
    document.getElementById('ans').innerHTML = x ;
}

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
}


</script>


</body>





    
</html>