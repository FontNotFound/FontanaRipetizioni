<?php
    $logged = true;
    //Login Control
    if (!isset($_SESSION['user'])){
        $logged = false;
        echo '<script>var logged = false; </script>';
    } else {
        echo '<script>var logged = true; </script>';
    }
?>

<!-- Not Logged Modal -->
<div class="row w-100 mx-auto px-auto justify-content-center text-center">
        <div class="modal modal-lg mx-auto" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none">
            <div class="modal-dialog w-100 mx-0 px-0" style="max-width: 100% !important">
                <div class="modal-content" style="max-width: 100% !important">
                <div class="modal-body">
                    <h2 class="text-primary mt-2">Questi sono contenuti riservati</h2>
                    <p> Prenotando una lezione e potrai:</p>
                    <ul style="list-style: none" class="text-start justify-content-start">
                        <li class="text-start mx-0"> <img src="img/svg/video.svg" class="img-fluid"> Avere accesso alla Galleria dei Video Spiegazione </li>
                        <li class="text-start mx-0"> <img src="img/svg/webcam.svg" class="img-fluid"> Richiedere video spiegazione su argomenti specifici o singoli svolgimenti di esercizi </li>
                        <li class="text-start mx-0"> <img src="img/svg/folders.svg" class="img-fluid"> Avere accesso alle Esercitazioni e al Materiale ad-hoc per lo studio indivudale </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <div class="row w-100 mx-0 px-0 justify-content-between">
                        <div class="col-auto">
                            <div class="row w-100 mx-0 px-0">
                                <div class="col-auto d-flex align-items-center">
                                    <h6 class="text-info"> Hai gia' un account? </h6>
                                </div>
                                <div class="col-auto">
                                    <a type="button" class="btn btn-info" href="login.php">Accedi all'Area Riservata</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a type="button" class="btn btn-primary" href="booking.php">Prenota una Lezione</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
            
<script type="text/JavaScript">
    //Login control
    if(!logged){
        $('#loginModal').modal('show')
        $('#loginModal').fadeIn("slow")
    }
</script> 