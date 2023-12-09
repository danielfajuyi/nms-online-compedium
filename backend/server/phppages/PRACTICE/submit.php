<?php

namespace candidates;
session_start();
include '../dashboard/includes/candclass.php';

$user = new candidate;
if(isset($_POST['submit'])){
 $db =$user->getDb();
$email = $user->getEmail(); 
$score =0;
for($i=1; $i<count($_POST) ; $i++){

    $selectedoption = $_POST[$i];
 $result = mysqli_query( $db, "SELECT correct_option FROM questions WHERE question_id = $i ");
 $row = mysqli_fetch_assoc($result);
if($row['correct_option'] == $selectedoption ){
    $score++;

}
}
#update naccessary Stats in the DB
$user->setstat('xp',$score);
$user->setstat('higest_score',$score);
$user->setstat('last_score',$score);
$user->setstat('rating',$score);
$user->setstat('progress',$score);
$user->setstat('overall_score',$score);
$user->displaystat('xp');

?> 
<div class="p-5">
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
  see   results
</button>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

    <div class="container p-5">
        <div class="row-cols-auto justify-content-center align-items-center p-5 g-2">

<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->




            <div class="alert p-5 alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
                <strong>Test submitted!</strong> <br> <h6>your stats have been updated view stats on your dashboard  </h6>
            <a href="../dashboard/dashboard.php"  type="button" class="btn btn-danger"   aria-label="Close">
              Dashboard
</a>
            </div>
            
        </div>
    </div>
<?php }?>