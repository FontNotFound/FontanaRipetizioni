<!DOCTYPE HTML>
<html>
    <head>
        <?php include('components/head.php');?>
        <?php
            //Selezione video da POST request

        ?>
    </head>

        <body class="bg bg-light">
        <title>
            Portale Ripetizioni | Leonardo Fontana
        </title>

        <!-- include navbar -->
        <?php include('components/navbar.php'); ?>
        
        <!-- Video Select -->
        <div class="row w-100 justify-content-center text-center mx-0 px-0 mt-3">
           <h2 class="text-info"> Galleria Video </h2>
        </div>

        <div class="row w-100 justify-content-center text-center mx-0 px-0 my-1">
            <div class="col-10 justify-content-center table-responsive">
                <table class="table-hover w-100">
                    <thead class="sticky-top table-info">
                        <th> Nome </th>
                        <th> Materia </th>
                        <th> Argomento </th>
                        <th> Lezioni </th>
                        <th> Azione </th>
                    </thead>
                    <tbody>
                        <?php 
                            if($result = $conn->query("SELECT * FROM playlists")){
                                foreach($result as $playlist){
                                    echo("
                                        <tr>
                                            <td> ".$playlist['nome']." </td>
                                            <td> ".$playlist['materia']." </td>
                                            <td> ".$playlist['argomento']." </td>
                                            <td> ".$playlist['numLezioni']." </td>
                                            <td> <button class='btn btn-info btn-sm'> Riproduci </button> </td>
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
        
    </body>
    <script type="text/JavaScript">
        //Navbar Color set
        $('#navbarRow').addClass('bg-info')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-info")
        })
    </script> 
</html>