

<?php 

include 'candclass.php'





?>


<!DOCTYPE html>

<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- Modal trigger button -->


    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade " id="custom" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog bg-success  modal-lg  modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"><mark>customized Practice</mark></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark text-white">


                    <form action="../practice/practice.php" method="post">
                        <img src="nms-logo.webp" class=" mb-2 float-end w-2 " style="width: 60px; " alt="logo">
                        <div class="mb-3">
                            <label for="subject" class="form-label">
                                <h3>select Subject</h3>
                            </label>
                            <select multiple class="form-select form-select-lg" name="subject" id="subject">
                                <option selected value="english">English & verbal</option>
                                <option value="calculation">Mathematics& Quantitative</option>
                                <option value="General">General knowlede & current Affairs</option>
                                <option value="random">Random</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">
                                <h3> Year</h3>
                            </label>
                            <select class="form-select form-select-lg" name="year" id="year">
                                <script>
                                    //year display loop
                                    let year = 2022;

                                    while (year >= 2000) {
                                        let parent = document.getElementById('year');
                                        let opt = document.createElement('option');
                                        opt.setAttribute('value', year);
                                        opt.innerHTML = year + '  compedium past questions';
                                        parent.appendChild(opt);
                                        year--;
                                    }
                                    // Test preview values



                                </script>

                            </select>
                        </div>
                        <h5>Difficulty</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="difficulty" value="easy" id="easy">
                            <label class="form-check-label" for="easy">
                                easy
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="difficulty" value="normal" id="normal">
                            <label class="form-check-label" for="">
                                normal
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="hard" class="form-check-input" type="radio" name="difficulty" id=" hard">
                            <label class="form-check-label" for="hard">
                                Hard
                            </label>
                        </div>


                        <div class="prev pt-3">
                            <h4>Preview <i class="fa fa-eye" aria-hidden="true"></i></h4>
                            <ul>

                                <li>
                                    Category: <span id="sub"></span> <i class="fa fa-book" aria-hidden="true"></i>
                                </li>
                                <li>
                                    Year: <span id="ye"></span> <i class="fa fa-calendar" aria-hidden="true"></i>
                                </li>
                                <li>
                                    Difficulty: <span id="dif"></span> <i class="fa fa-superpowers"
                                        aria-hidden="true"></i>
                                </li>
                                <li>
                                    Duration: <span class="text-success"> <b>1 hour</b> <i
                                            class="fa fa-hourglass fa-bounce" aria-hidden="true"></i></span>
                                </li>
                            </ul>

                            <script>
                                setInterval(function show() {


                                    let selected_year = document.getElementById('year');
                                    let subject = document.getElementById('subject');
                                    let subPoint = document.getElementById('sub');
                                    let yearPoint = document.getElementById('ye');
                                    let difficulty = document.getElementsByName('difficulty');
                                    let difPoint = document.getElementById('dif');
                                    difficulty.forEach(level => {
                                        level.addEventListener('click', function check() { difPoint.innerHTML = level.getAttribute('value') })
                                    })

                                    subPoint.innerHTML = subject.value;
                                    yearPoint.innerHTML = selected_year.value;
                                }, 1000)
                            </script>
                        </div>
                </div>
                <div class="modal-footer bg-dark ">
                    <button type="button" class="btn mr-5 float-start btn-secondary"
                        data-bs-dismiss="modal">Close</button>

                    <button type="submit"  class="btn btn-primary">start practice <i class="fa fa-paper-plane"
                            aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

    </script>
<!-- full practice modal-->

    <!-- The Modal -->
    <div class="modal fade" id="full">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
<form action="../practice/practicecustom.php" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">full mock test</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">.</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h1 class="display-4">preview <i class="fa fa-eye" aria-hidden="true"></i></h1>
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col rounded bg-primary ">
                            <div class="p-3">
                                <h1>
                                    <i class="fa fa-tasks" aria-hidden="true"></i>

                                </h1>
                                <h4>subjects <i class="fa fa-book" aria-hidden="true"></i></h4>
                                <h5>english <kbd><b>30 questions </b></kbd></mar>
                                </h5>
                                <h5>mathematics <kbd><b>30 questions </b></kbd></mar>
                                </h5>
                                <h5>General knowledge<kbd><b>30 questions </b></kbd></mar>
<h1><i class="fa fa-clock-o" aria-hidden="true"></i></h1>
<h5>you have <kbd> 1 hour 30 minutes</kbd> to Answer all questions</h5>

                            </div>
                        </div>
                        <div class="col bg-danger">
                            <div class="p-3">
<h1><i class="fa fa-chain" aria-hidden="true"></i></h1>
                               
                                    <h4>Earn <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h4>
                                <h5>total XP : <kbd>100</kbd></h5>
                               <h5> Average rating : <kbd>10% <i class="fa fa-star-half" aria-hidden="true"></i></kbd></h5>
                                <h5>score high to climb the leaderboards</h5>
                                <h5>GOOD LUCK!!</h5>
                                    
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">start exam<i class="fa fa-send"
                            aria-hidden="true"></i></button>
                            </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>