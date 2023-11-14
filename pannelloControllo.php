
<html>
    <head>
        <?php
        include("components/head.php");

        //Admin Login Control
        if (!isset($_SESSION['user']) || $_SESSION['user'] != 'Leonardo'){
            header("Location: index.php");
        }
        ?>
    </head>
    <body>
        <?php include("components/navbar.php"); ?>

        <div class="card card-content">
            <div class="row w-100 mx-auto px-auto justify-content-between">
                <div class="col-6 text-center justify-content-center">
                    <h2 class="text-danger my-2" style="font-weight: bolder"> Utenti </h2>
                    <table class="table-hover w-100">
                        <thead class="sticky-top bg-danger text-white">
                            <th> Nome </th>
                            <th> Email </th>
                            <th> Azione </th>
                        </thead>
                        <tbody>
                            <?php 
                                if($result = $conn->query("SELECT * FROM users")){
                                    foreach($result as $user){
                                        echo("
                                            <tr>
                                                <td> ".$user['nome']." </td>
                                                <td> ".$user['email']." </td>
                                                <td> 
                                                    <button class='btn btn-sm btn-danger' onClick=\"findDocuments('".$user['nome']."', '".$user['email']."')\"> Documenti </button> 
                                                </td>
                                            </tr>
                                        ");
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-6 text-center justify-content-center">
                    <h2 class="text-danger my-2" style="font-weight: bolder"> <span id="selectedElement"></span> </h2>
                    <table class="table-hover w-100">
                        <thead id="selectedHead" class="sticky-top bg-danger text-white">    
                        </thead>
                        <tbody id="selectedBody">
                        </tbody>
                    </table>
                    <div class="row w-100 mx-auto px-auto justify-content-end text-end">
                        <button style="display: none" class="btn btn-sm btn-danger my-2" id="uploadDocumentButton" onClick="openUploadDocumentModal()"> Carica File </button>
                    </div>
                </div>
            </div>

            <div class="row w-100 mx-auto px-auto justify-content-center mt-2">
                <h1 class="text-danger my-2" style="font-weight: bolder"> Video </h1>
                <table class="col-12 table-hover table-bordered w-100 mx-2 px-auto text-center">
                    <thead class="bg bg-danger text-white">
                        <tr>
                            <th scope="col"> Playlist </th> 
                            <th scope="col"> Argomento </th>
                            <th scope="col"> Materia </th>
                            <th scope="col"> Numero Lezioni </th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                    <tbody class="bg bg-white">
                       <?php
                            if($result = $conn->query("SELECT * FROM playlists AS p RIGHT JOIN video as v ON p.nome = v.playlist ORDER BY playlist")){
                                foreach($result as $video){
                                    echo("
                                        <tr>
                                            <td> ".$video['playlist']." </td>
                                            <td> ".$video['argomento']." </td>
                                            <td> ".$video['materia']."</td>
                                            <td> ".$video['numLezioni']."</td>
                                        </tr>
                                    ");
                                }
                                if($result->num_rows == 0)
                                    echo("<tr><td class='table-warning text-dark' style='font-weight: bold' scope='col' colspan=5> Nessun Nuovo Messaggio </td> </tr>");
                            }
                       ?>
                    </tbody>
                </table>
                <row class="w-100 mx-auto px-auto justify-content-end text-end">
                    <button class="btn btn-danger" onClick="openUploadVideoModal()">Carica Video</button>
                </div>
            </div>

            <div class="row w-100 mx-auto px-auto justify-content-center mt-2">
                <h1 class="text-danger my-2" style="font-weight: bolder"> Messaggi </h1>
                <table class="col-12 table-hover table-bordered w-100 mx-2 px-auto text-center">
                    <thead class="bg bg-danger text-white">
                        <tr>
                            <th scope="col"> Nome </th> 
                            <th scope="col"> Email </th>
                            <th scope="col"> Messaggio </th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                    <tbody class="bg bg-white">
                       <?php 
                            if($result = $conn->query("SELECT * FROM notifiche WHERE visto = false")){
                                foreach($result as $notifica){
                                    echo("
                                        <tr>
                                            <td> ".$notifica['nome']." </td>
                                            <td> ".$notifica['email']." </td>
                                            <td> ".$notifica['messaggio']."</td>
                                            <td> <button class='btn btn-sm btn-danger' onClick=\"signAsRead('".$notifica['nome']."','".$notifica['email']."')\"> Segna come letto </button> </td>
                                        </tr>
                                    ");
                                }
                                if($result->num_rows == 0)
                                    echo("<tr><td class='table-warning text-dark' style='font-weight: bold' scope='col' colspan=5> Nessun Nuovo Messaggio </td> </tr>");
                            }
                       ?>
                    </tbody>
                </table>
            </div>

            <div class="row w-100 mx-auto px-auto justify-content-center mt-2">
                <h1 class="text-danger my-2" style="font-weight: bolder"> Prenotazioni </h1>
                <table class="col-12 table-hover table-bordered w-100 mx-2 px-auto text-center">
                    <thead class="bg bg-danger text-white">
                        <tr>
                            <th scope="col"> Orario </th> 
                            <th scope="col"> Lunedì </th>
                            <th scope="col"> Martedì </th>
                            <th scope="col"> Mercoledì </th>
                            <th scope="col"> Giovedì </th>
                            <th scope="col"> Venerdì </th>
                            <th scope="col"> Sabato </th>
                            <th scope="col"> Domenica </th>
                        </tr>
                    </thead>
                    <tbody class="bg bg-white">
                        <?php
                            $fasce = [
                                "8:00 - 9:00", 
                                "9:00 - 10:00", 
                                "10:00 - 11:00", 
                                "11:00 - 12:00", 
                                "12:00 - 13:00", 
                                "13:00 - 14:00", 
                                "14:00 - 15:00", 
                                "15:00 - 16:00", 
                                "16:00 - 17:00", 
                                "17:00 - 18:00", 
                                "18:00 - 19:00", 
                                "19:00 - 20:00", 
                            ];
                            $settimana = 1;
                            for($i = 0; $i < count($fasce); $i++){
                                echo('<tr class="bg bg-white"><td class="bg bg-light text-dark" style="font-weight: bold"> '.$fasce[$i].' </td>');
                                if($result = $conn->query("SELECT * FROM ORARIO WHERE fascia = '".$fasce[$i]."' AND settimana = '".$settimana."' ORDER BY giorno")){
                                    foreach($result as $row){
                                        if($row['libero'])
                                            echo('<td class="table-light" onClick="openReservationModal(\''.$row['fascia'].'\', '.$row['giorno'].', '.$row['settimana'].')"> </td>');
                                        else{
                                            if($orders = $conn->query("SELECT * FROM PRENOTAZIONE WHERE fascia = '".$fasce[$i]."' AND settimana = '".$settimana."' AND giorno = '".$row['giorno']."'")){
                                                if($orders->num_rows != 0){
                                                    foreach($orders as $order){
                                                        echo('<td class="table-secondary disabled">'.$order['nome'].'</td>');
                                                    }
                                                } else {
                                                    echo('<td class="table-warning disabled"></td>');
                                                }
                                            } else {
                                                echo('<td class="table-secondary disabled"></td>');
                                            }
                                        }
                                    }
                                }
                                echo('</tr>');
                                // Free result set
                                $result -> free_result();
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Document -->
        <div class="modal fade" id="documentUploadModal" tabindex="-1" aria-labelledby="documentUploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                    <form action="admin/documentUpload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="userDoc">Utente</label>
                            <input type="text" class="form-control" id="userDoc" name="userDoc" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="userDoc">Email</label>
                            <input type="email" class="form-control" id="emailDoc" name="emailDoc" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nameDoc">Nome</label>
                            <input type="text" class="form-control" id="nameDoc" name="nameDoc" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="userDoc">Materia</label>
                            <select class="form-select col-12 form-control" aria-label="materia" name="materiaDoc">
                        </div>
                            <option selected>Altro</option>
                            <option value="Informatica">Informatica</option>
                            <option value="Sistemi e Reti">SIstemi e Reti</option>
                            <option value="TPSIT">TPSIT</option>
                        </select>
                        <div class="form-group">
                            <label for="argomentoDoc">Argomento</label>
                            <input type="text" class="form-control" id="argomentoDoc" name="argomentoDoc" placeholder="">
                        </div>
                        <input class="form-control" type="file" name="document" id="document">
                        <div class="row w-100 mx-auto px-auto justify-content-end text-end">
                            <input type="submit" class="btn btn-danger" value="Carica" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Video -->
        <div class="modal fade" id="videoUploadModal" tabindex="-1" aria-labelledby="videoUploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                    <form action="admin/documentUpload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomeVid">Nome</label>
                            <input type="text" class="form-control" id="nomeVid" name="nomeVid" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="linkVid">Link</label>
                            <input type="email" class="form-control" id="linkVid" name="linkVid" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="numVid">Numero</label>
                            <input type="text" class="form-control" id="numVid" name="numVid" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="materiaVid">Materia</label>
                            <select class="form-select col-12 form-control" aria-label="materiaVid" name="materiaVid">
                        </div>
                            <option selected>Altro</option>
                            <option value="Informatica">Informatica</option>
                            <option value="Sistemi e Reti">SIstemi e Reti</option>
                            <option value="TPSIT">TPSIT</option>
                        </select>
                        <div class="form-group">
                            <label for="argomentoVid">Argomento</label>
                            <input type="text" class="form-control" id="argomentoVid" name="argomentoVid" placeholder="">
                        </div>
                        <input class="form-control" type="file" name="document" id="document">
                        <div class="row w-100 mx-auto px-auto justify-content-end text-end">
                            <input type="submit" class="btn btn-danger" value="Carica" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/JavaScript">
        //Navbar Color set
        $('#navbarRow').addClass('bg-danger')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-danger")
        })

        selectedUser = "";
        selectedEail = "";

        //Sign Notify as Read
        function signAsRead(nome, email){
            $.ajax({
                url: 'admin/notify.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'nome': nome,
                    'email': email
                },
                success: function(data){
                    location.reload()
                }
            });
        }

        //Find Documents
        function findDocuments(user, email){
            $('#selectedHead').empty()
            $('#selectedBody').empty()

            $('#selectedElement').text("Documenti")
            $('#uploadDocumentButton').show();
            $.ajax({
                url: 'admin/adminController.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'type': 'document',
                    'user': user,
                    'email': email
                },
                success: function(data){
                    selectedUser = data[0].utente_nome
                    selectedEmail = data[0].utente_email

                    tableHead = 
                    " <th> Nome </th> " +
                    " <th> Argomento </th> " +
                    " <th> Materia </th> " +
                    " <th> Data </th> " +
                    " <th> Azione </th>"
                    $('#selectedHead').append(tableHead)
                    tableBody = ""
                    data.forEach((document, index) => {
                        console.log(document);
                        tableBody += "<tr>"+
                        " <td> " + document.nome + "</td>"+
                        " <td> " + document.argomento + "</td>"+
                        " <td> " + document.materia + "</td>"+
                        " <td> " + document.data + "</td>"+
                        " <td> <a download href="+document.path+" class='btn btn-sm btn-danger'> Scarica </button> </td>"+
                        "</tr>"
                    })
                    $('#selectedBody').append(tableBody)
                    console.log(data);
                }
            });
        }

        //Handle Upload Document Modal
        function openUploadDocumentModal(){
            $('#documentUploadModal').modal('show')
            $('#userDoc').val(selectedUser)
            $('#emailDoc').val(selectedEmail)
        }

        //Handle Upload Video Modal
        function openUploadVideoModal(){
            $('#videoUploadModal').modal('show')
        }



    </script>
</html>