<!DOCTYPE HTML>
<html>
    <head>
        <?php include('components/head.php');?>
    </head>
        <body class="bg bg-light">
        <title>
            Portale Ripetizioni | Leonardo Fontana
        </title>

        <!-- include navbar -->
        <?php include('components/navbar.php'); ?>
        
        <!-- First section: Subjects -->
        <div class="card w-100 alert alert-warning py-0">
            <div class="card-body w-100 mx-0 py-0 mb-3">
                <div class="row text-start justify-content-center w-100 mx-0">
                    <p class="alert text-dark w-100" style="font-size: 1.5rem; font-weight: bolder"> Materie </p>
                </div>
                <div class="row text-center justify-content-center w-100 mx-0">
                    <div class="col-10 text-white justify-content-center">
                        <div class="row h-100">
                            <div class="col-4 mx-auto">
                                <div class="card h-100 bg bg-warning text-white">
                                    <div class="card-body">
                                        <div class="row w-100 justify-content-center text-start">
                                            <div class="col-3">
                                                <img src="img/svg/informatica.svg" style="width: 100%" class="img-fluid filter-white"/>
                                            </div>
                                        </div>
                                        <div class="row w-100 justify-content- center text-start">
                                            <div class="col-12 mb-2">
                                                <span class="card-title"> Informatica </span>
                                            </div>
                                            <div class="col-12 text-start justify-content-start">
                                                <il style="list-style: none">
                                                    <li style="font-weight: bold"> Informatica e Programmazione C/C++/Java</li>
                                                    <li> Vedi Argomenti </li>
                                                </il>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-auto">
                                <div class="card h-100 bg bg-warning">
                                    <div class="card-body">
                                        <div class="row w-100 justify-content-center text-start">
                                            <div class="col-3">
                                                <img src="img/svg/sistemi.svg" style="width: 100%" class="img-fluid filter-white"/>
                                            </div>
                                        </div>
                                        <div class="row w-100 justify-content-center text-start">
                                            <div class="col-12 mb-2">
                                                <span class="card-title"> Sistemi </span>
                                            </div>
                                            <div class="col-12 text-start justify-content-start">
                                                <il style="list-style: none">
                                                    <li> Sistemi e Reti Informatiche </li>
                                                    <li> Vedi Argomenti </li>
                                                </il>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-auto">
                                <div class="card h-100 bg bg-warning">
                                    <div class="card-body">
                                        <div class="row w-100 justify-content-center text-start">
                                            <div class="col-3">
                                                <img src="img/svg/tpsit.svg" style="width: 100%" class="img-fluid filter-white"/>
                                            </div>
                                        </div>
                                        <div class="row w-100 justify-content-center text-start">
                                            <div class="col-12 mb-2">
                                                <span class="card-title"> TPSIT </span>
                                            </div>
                                            <div class="col-12 text-start justify-content-start">
                                                <il style="list-style: none">
                                                    <li> Tecnologia e Progettazione di Sistemi Informatici e di Telecomunicazione </li>
                                                    <li> Vedi Argomenti </li>
                                                </il>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second section: Info -->
        <div class="card w-100 bg bg-white py-0 justify-content-center text-center">
            <div class="card-content col-11 mb-1 text-white mb-2 mx-auto">
                <div class="row text-start justify-content-cetner w-100 mx-auto">
                    <p class="alert text-warning w-100" style="font-size: 1.5rem; font-weight: bolder"> Argomenti nello Specifico </p>
                </div>
                <div class="row w-100 justify-content-center mx-auto my-3">
                    <div class="table-responsive" style="height: 300px">
                        <table class="table-responsive table-hover table-striped bg bg-warning">
                            <thead class="sticky-top">
                                <th scope="col">Materia</th>
                                <th scope="col">Argomento</th>
                                <th scope="col">Anno di Riferimento</th>
                                <th scope="col">Descrizione</th>
                            </thead> 
                            <tbody>
                                <?php
                                    if($result = $conn->query("SELECT * FROM ARGOMENTO ORDER BY Materia, Anno ")){
                                        foreach($result as $row){
                                            echo('
                                                <tr>
                                                    <td scope="col">'.$row['materia'].'</td>
                                                    <td scope="col">'.$row['nome'].'</td>
                                                    <td scope="col">'.$row['anno'].'</td>
                                                    <td scope="col">'.$row['descrizione'].'</td>
                                                </tr>
                                            ');
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script type="text/JavaScript">
        //Navbar Color set
        $('#navbarRow').addClass('bg-warning')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-warning text-white")
        })
    </script>
</html>