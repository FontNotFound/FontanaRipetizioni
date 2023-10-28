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

        <!-- include Login Controller -->
        <?php include('components/loginController.php'); ?>
        
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
    </body>
    <script type="text/JavaScript">
        //Navbar Color set
        $('#navbarRow').addClass('bg-info')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-info")
        })
    </script>
</html>