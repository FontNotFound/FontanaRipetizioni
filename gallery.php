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
                                            <td> <button class='btn btn-info btn-sm' onClick=\"selectPlaylist('".$playlist['nome']."')\"> Riproduci </button> </td>
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
        <div class="row w-100 justify-content-center text-center mx-0 px-0 mt-2" id="videoSection" style="display: none">
            <div class="card card-content col-10 mx-auto my-3 px-auto">
                <div class="row w-100 justify-content-between text-start">
                    <div class="col-3 justify-content-center table-responsive my-2">

                        <p class="alert alert-info text-info w-100 px-0 mx-0" style="font-weigth: bolder"> <span id="playlistName"></span> </p>
                        <table class="table-hover w-100">
                            <thead class="sticky-top">
                                <th> Numero </th>
                                <th> Nome </th>
                                <th> Azione </th>
                            </thead>
                            <tbody id="videoBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-9 justify-content-center table-responsive my-2" id="videoPlayer" style="display: none">
                        <p class="alert alert-info text-info w-100 px-0 mx-0" style="font-weigth: bolder"> <span id="videoName"></span> </p>
                         <div class="embed-responsive embed-responsive-21by9">
                         <iframe id="iframe" width="640" height="360" src="http://www.youtube.com/embed/dQw4w9WgXcQ?feature=player_embedded" frameborder="0" allowfullscreen></iframe>
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


        //Carica Playlist
        function selectPlaylist(playlist){
            $.ajax({
                url: 'gallery/videoPlayer.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'playlist': playlist,
                    'operation': 'loadPlaylist'
                }, 
                success: function(data){
                    //Change Names
                    $('#playlistName').text(data.nome)
                    $('#videoSection').show()

                    //Body load
                    tableBody = "<tr>"
                    data.videos.forEach(video => {
                        tableBody+=
                        "<td> "+video.numero+" </td>"+
                        "<td> "+video.nome+" </td>"+
                        "<td> <button class=\"btn btn-primary\" onClick=\"loadVideo('"+video.link+"', '"+video.nome+"')\"> Riproduci </button> </td>"
                    })
                    tableBody += "</td>"

                    $('#videoBody').append(tableBody);
                }
            });
        }

        //Carica Video
        function loadVideo(link, nome){
            $('#videoName').text(nome)
            $('#iframe').attr('src',link)
            $('#videoPlayer').show()
        }
    </script> 
</html>