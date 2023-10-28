<!DOCTYPE HTML>
<html>
    <head>
        <?php include('components/head.php');?>
    </head>

        <body class="bg bg-light">
        <?php
            $logged = true;
            //Login Control
            if (!isset($_SESSION['user'])){
                $logged = false;
                echo '<script>var logged = false; </script>';
            }
        ?>
        <title>
            Portale Ripetizioni | Leonardo Fontana
        </title>

        <!-- include navbar -->
        <?php include('components/navbar.php'); ?>
        
        <!-- Video Select -->
        <div class="row w-100 justify-content-center text-center mx-0 px-0 mt-3">
           <h2 class="text-info"> Appunti ed Esercitazioni </h2>
        </div>

        <div class="row w-100 justify-content-center text-center mx-0 px-0 my-1">
            <div class="col-10 justify-content-center table-responsive">
                <table class="table-hover w-100">
                    <thead class="sticky-top table-info">
                        <th> Nome </th>
                        <th> Materia </th>
                        <th> Argomento </th>
                        <th> Data </th>
                        <th> Azione </th>
                    </thead>
                    <tbody>
                        <?php 
                            if($logged && $result = $conn->query("SELECT * FROM documento_utenti WHERE utente = '".$_SESSION['user']."'" )){
                                foreach($result as $document){
                                    echo("
                                        <tr>
                                            <td> ".$document['nome']." </td>
                                            <td> ".$document['materia']." </td>
                                            <td> ".$document['argomento']." </td>
                                            <td> ".$document['numLezioni']." </td>
                                            <td> <a download class='btn btn-info btn-sm' href='".$document['path']."'> Scarica </a> </td>
                                        </tr>
                                    ");
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Video Section -->
        <div class="row w-100 justify-content-center text-center mx-0 px-0 mt-2">
            <div class="card card-content col-10 mx-auto my-3 px-auto">
                <div class="row w-100 justify-content-between text-start">
                    <div class="col-3 justify-content-center table-responsive my-2">

                        <p class="alert alert-info text-info w-100 px-0 mx-0" style="font-weigth: bolder"> PLAYLIST NAME </p>
                        <table class="table-hover w-100">
                            <thead class="sticky-top">
                                <th> Numero </th>
                                <th> Nome </th>
                                <th> Azione </th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> Lezione 1 </td>
                                    <td> Boh </td>
                                    <td> <button class="btn btn-info btn-sm"> Vedi </button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-9 justify-content-center table-responsive my-2">
                        <p class="alert alert-info text-info w-100 px-0 mx-0" style="font-weigth: bolder"> NOME </p>
                         <div class="embed-responsive embed-responsive-21by9">
                         <iframe width="640" height="360" src="http://www.youtube.com/embed/dQw4w9WgXcQ?feature=player_embedded" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Prenota una Lezione</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
                
    </body>
    <script type="text/JavaScript">
        //Navbar Color set
        $('#navbarRow').addClass('bg-info')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-info")
        })

        //Login control
        if(!logged){
            $('#loginModal').modal('show')
            $('#loginModal').fadeIn("slow")
        }
    </script> 
</html>