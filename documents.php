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
            <div class="col-lg-10 col-12 justify-content-center table-responsive">
                <table class="table-hover w-100">
                    <thead class="table-info">
                        <th> Nome </th>
                        <th class="d-none d-md-block"> Materia </th>
                        <th> Argomento </th>
                        <th class="d-none d-md-block"> Data </th>
                        <th> Azione </th>
                    </thead>
                    <tbody>
                        <?php 
                            if($logged && $result = $conn->query("SELECT * FROM documento_utenti LEFT JOIN documento ON documento_utenti.documento = documento.nome WHERE utente_nome = '".$_SESSION['user']."' AND utente_email = '".$_SESSION['email']."'" )){
                                foreach($result as $document){
                                    echo("
                                        <tr>
                                            <td> ".$document['nome']." </td>
                                            <td class='d-none d-md-block'> ".$document['materia']." </td>
                                            <td> ".$document['argomento']." </td>
                                            <td class='d-none d-md-block'> ".$document['data']." </td>
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