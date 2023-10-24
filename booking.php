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

        <!-- Only section: Booking Form -->
        <div class="card w-100 bg bg-white py-0 justify-content-center text-center">
            <div class="card-content col-11 mb-1 text-white mb-2 mx-auto">
                <div class="row text-start justify-content-cetner w-100 mx-auto">
                    <p class="alert text-primary w-100" style="font-size: 2rem; font-weight: bolder"> Richiedi subito una lezione </p>
                </div>
                <!-- Materia -->
                <div id="materiaContainer" class="sectionContainer row w-100 justify-content-center text-center">
                    <h2 class="text-primary"> Seleziona la Materia </h2>
                    <div id="subjectSelect" class="row w-100 justify-content-center text-center">
                        <div materia="Informatica" class="selectioncard card card-content alert alert-primary text-white my-2 mx-auto col-2 rounded">
                            <img src="img/svg/informatica.svg" class="img-fluid filter-white"/>
                            <h5 class="text-white"> Informatica </h5>
                        </div>
                        <div materia="Sistemi e Reti" class="selectioncard card card-content alert alert-primary text-white my-2 mx-auto col-2 rounded">
                            <img src="img/svg/sistemi.svg" class="img-fluid filter-white"/>
                            <h5 class="text-white"> Sistemi e Reti </h5>
                        </div>
                        <div materia="TPSIT" class="selectioncard card card-content alert alert-primary text-white my-2 mx-auto col-2 rounded">
                            <img src="img/svg/tpsit.svg" class="img-fluid filter-white"/>
                            <h5 class="text-white"> T.P.S.I.T. </h5>
                        </div>
                        <div materia="Altro" class="selectioncard card card-content alert alert-primary text-white my-2 mx-auto col-2 rounded">
                            <img src="img/svg/informatica.svg" class="img-fluid filter-white"/>
                            <h5 class="text-white"> Altro </h5>
                        </div>
                    </div>
                </div> 
                <!-- Argomento -->
                <div previous="materia" id="argomentoContainer" class="sectionContainer row w-100 justify-content-center text-center" style="display: none">
                    <h2 class="text-primary"> Seleziona l'Argomento (in generale) </h2>
                    <select onChange="selectArg()" class="form-control form-select-lg w-100" id="argomentoSelect">
                        <?php 
                            if($result = $conn->query("SELECT * FROM Argomento ORDER BY Anno"))
                                foreach($result as $arg){
                                    echo("<option value='".$arg['nome']."' materia='".$arg['materia']."'> ".$arg['nome']." </option>");
                                }
                            if($result = $conn->query("SELECT DISTINCT materia FROM Argomento"))
                                foreach($result as $arg){
                                    echo("<option value='altro' materia='".$arg['materia']."'> Altro </option>");
                                }
                        ?>
                    </select>
                </div>
                <!-- Descrizione -->
                <div previous="argomento" id="descrizioneContainer" class="sectionContainer row w-100 justify-content-center text-center" style="display: none">
                    <div class="col-12">
                        <h2 class="text-primary"> Descrizione della lezione </h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-muted"> Descrivi brevemente le necessità riguardo gli argomenti e/o la tipologia di lezione preferita (teoria, esercizi ecc...) </h6>
                    </div>
                    <div class="mb-3 col-10">
                        <label for="descrizione" class="form-label">Specifiche della lezione</label>
                        <textarea class="form-control w-100" id="descrizione" rows="3"></textarea>
                    </div>
                </div>
                <!-- Calendario -->
                <div previous="descrizione" id="calendarioContainer" class="sectionContainer row w-100 justify-content-center text-center" style="display: none">
                    <div class="col-12">
                        <h2 class="text-primary"> Seleziona l'orario e il giorno della lezione </h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-muted"> E' possibile selezionare più orari e più giorni contemporaneamente </h6>
                    </div>
                    <div class="row text-start justify-content-cetner w-100 mx-auto">
                        <div class="row w-100 justify-content-end mx-auto my-1">
                            <div class="col-3 d-flex align-items-center mx-auto bg bg-primary" style="margin-right: 0px !important; padding-right: 0px !important">
                                <span id="month" class="text-white" style="font-weight: bold"></span>
                            </div>
                            <div class="col-8 justify-content-end text-end mx-auto bg bg-primary" style="margin-left: 0px !important; padding-left: 0px !important">
                            <div class="row w-100 justify-content-end text-end mx-auto my-1">
                                <!-- <button class="btn btn-primary btn-sm"> < </button> -->
                                <button class="btn btn-primary disabled"> Settimana Dal <span id="monday"></span> Al <span id="sunday"></span> </button>
                                <!-- <button class="btn btn-primary btn-sm"> > </button> -->
                            </div> 
                            </div>
                        </div> 
                        <div class="row w-100 justify-content-center mx-auto mb-2">
                            <table class="col-11 table-hover table-bordered w-100 mx-2 px-auto text-center">
                                <thead class="bg bg-light">
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
                                                    echo('<td id="row'.$i.'-'.$row['giorno'].'-'.$row['settimana'].'" class="table-light" onClick="selectReservationModal(\''.$row['fascia'].'\', '.$i.', '.$row['giorno'].', '.$row['settimana'].')"> </td>');
                                                else
                                                echo('<td class="table-secondary disabled"> </td>');
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
                        <div class="row w-100 justify-content-center mx-auto my-1">
                            <div class="col-10 justify-content-center">
                                <div class="row w-100 justify-content-between mx-auto my-0">
                                    <p id="totIncontri" class=" text-primary" style="display: none"> Totale Incontri: <span style="font-weight: bolder" id="numIncontri"></span> </p>
                                    <p id="totPrezzo" class=" text-primary" style="display: none"> Prezzo Totale: <span style="font-weight: bolder" id="prezzo"></span> <span id="bestPrice" style="display:none; font-weight: bolder; font-size: 0.8rem" class="text-warning"> Prezzo Migliore!</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contatti -->
                <div previous="calendario" id="phoneNumberContainer" class="sectionContainer row w-100 justify-content-center text-center" style="display: none">
                    <h2 class="text-primary"> Informazioni di Contatto </h2>
                    <div class="row w-100 justify-content-end text-end mt-1">
                        <div class="col-auto">
                            <span class="text-primary" style="font-weight:bolder"> Nome </span>
                        </div>
                        <div class="col-10">
                            <input type="text" id="name" class="form form-control w-100"/>
                        </div>
                    </div>    
                    <div class="row w-100 justify-content-end text-end mt-1">
                        <div class="col-auto">
                            <span class="text-primary" style="font-weight:bolder"> Telefono </span>
                        </div>
                        <div class="col-10">
                            <input type="number" id="phoneNumber" class="form form-control w-100"/>
                        </div>
                    </div>    
                    <div class="row w-100 justify-content-end text-end mt-1">
                        <div class="col-auto">
                            <span class="text-primary" style="font-weight:bolder"> Email </span>
                        </div>
                        <div class="col-10">
                            <input type="mail" id="email" class="form form-control w-100"/>
                        </div>
                    </div>    
                    <div class="row w-100 mt-2 justify-content-center text-center">
                        <div class="form-check">
                            <input id="privacyCheck" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="text-primary form-check-label" for="flexCheckChecked">
                                dichiaro di aver letto e accettato <a style="font-weight: bolder" href="docs/Informativa.pdf" download>l'informativa relativa all'utilizzo dei dati personali </a>
                            </label>
                        </div>
                    </div>
                </div>
                <p id="alertMessage" class="alert alert-danger text-danget" style="font-weight:bolder; display: none"></p>
                <!-- Next Button -->
                <div class="row w-100 mt-2 mb-3 justify-content-between text-end">
                    <button id="prevButton" class="btn btn-secondary my-2 mb-3 disabled" onClick="prevSection()"> Indietro </button>
                    <button id="nextbutton" class="btn btn-primary my-2 mb-3" onClick="nextSection()"> Avanti </button>
                </div>
            </div>
        </div>
        
    </body>

    <script type="text/JavaScript">
            
        //Navbar Color set
        $('#navbarRow').addClass('bg-primary')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-primary")
        })

        function getNextMonday(){
            var d = new Date();
            d.setDate(d.getDate() + (1 + 7 - d.getDay()) % 7);
            return d;
        }

        function getNextSunday(){
            var d = getNextMonday();
            d.setDate(d.getDate() + 6);
            return d;
        }

        Date.prototype.getWeekOfMonth = function(exact) {
            var month = this.getMonth()
                , year = this.getFullYear()
                , firstWeekday = new Date(year, month, 1).getDay()
                , lastDateOfMonth = new Date(year, month + 1, 0).getDate()
                , offsetDate = this.getDate() + firstWeekday - 1
                , index = 1 // start index at 0 or 1, your choice
                , weeksInMonth = index + Math.ceil((lastDateOfMonth + firstWeekday - 7) / 7)
                , week = index + Math.floor(offsetDate / 7)
            ;
            if (exact || week < 2 + index) return week;
            return week === weeksInMonth ? index + 5 : week;
        };

        mesi = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre']
        toggleHover = true
        section = "materia"
        selectedCaselle = []
        idCasella = 0;
        selected = {
            "materia": "",
            "argomento": "",
            "descrizione": "",
            "phoneNumber": "",
            "mail": "",
            "orario": [],
            "giorno": [],
            "settimana": "1",
            "nome": "",
            "mail": ""
        }


        date = new Date()
        $('#month').text(mesi[date.getMonth()])
        $('#monday').text(getNextMonday().getDate())
        $('#sunday').text(getNextSunday().getDate())

        $(".selectioncard").mouseover(function(){
            if(toggleHover == true)
                $(this).addClass("bg bg-primary").removeClass("alert alert-primary")
        })

        $(".selectioncard").mouseout(function(){
            if(toggleHover == true)
             $(this).addClass("alert alert-primary").removeClass("bg bg-primary")
        })

        $(".selectioncard").on('click', function(){
            if($(this).attr(section) != selected[section]){
                $(".selectioncard").each(function(){
                    $(this).addClass("alert alert-primary").removeClass("bg bg-primary") 
                })
                $(this).addClass("bg bg-primary").removeClass("alert alert-primary")
                toggleHover = false;
                selected[section] = $(this).attr(section)
            } else {
                $(this).addClass("alert alert-primary").removeClass("bg bg-primary") 
                toggleHover = true;
                selected[section] = ""
            }
        })

        function displayNewSection(){
            $(".sectionContainer").each(function(){
                $(this).hide()
            })
            $("#"+section+"Container").show()

        }

        function displayPrevSection(){
            $(".sectionContainer").each(function(){
                $(this).hide()
            })
            $("#"+oldSection+"Container").show()
            section = oldSection
            oldSection = $('#'+section+"Container").attr("previous")
            if(section == "descrizione" && selected['materia'] == "Altro")
            oldSection = "materia"

            if(section == "materia")
            $('#prevButton').removeClass("btn-primary").addClass("btn-secondary disabled")
        }
         
        function nextSection(){
            selected['descrizione'] = $('#descrizione').val()
            selected['phoneNumber'] = $('#phoneNumber').val()
            selected['mail'] = $('#email').val()
            selected['nome'] = $('#name').val()
            selected['prezzo'] = $('#prezzo').val()
            $("#alertMessage").hide()
            oldSection = section
            if(selected[section] == "" || selected[section] == null){
                $('#alertMessage').text("Seleziona un opzione per proseguire")
                $('#alertMessage').show()
                return
            }
            switch(section){
                case "materia":
                    if(selected["materia"] == "Altro"){
                        selected["argomento"] = "Altro"
                        section = "descrizione"
                        $('#prevButton').removeClass("disabled btn-secondary").addClass("btn-primary")
                        displayNewSection()
                    } else {
                        section = "argomento"
                        $('#argomentoSelect option').each(function() {
                            if($(this).attr('materia') !== selected['materia'])
                                $(this).hide()
                        })
                        $('#prevButton').removeClass("disabled btn-secondary").addClass("btn-primary")
                        displayNewSection()
                    }
                    break;
                case "argomento":
                    section = "descrizione"
                    displayNewSection()
                    break;
                case "descrizione":
                    section = "calendario"
                    displayNewSection()
                    break;
                case "calendario":
                    section="phoneNumber"
                    displayNewSection()
                    $('#nextButton').html("Invia")
                    break;
                case "phoneNumber":
                    if(!$('#privacyCheck').is(':checked')){
                        $('#alertMessage').text("Accetta l'informativa sulla Privacy per procedere")
                        $('#alertMessage').show()
                    } else {
                        //Invio al db
                        var xhr = new XMLHttpRequest()
                        xhr.open("POST", "esitoRichiesta.php", true)
                        xhr.setRequestHeader('Content-Type', 'application/json')
                        response = xhr.send(JSON.stringify({
                            selected: selected
                        }))
                        location.reload()
                    }
                    break;
            }
        }
        
        function prevSection(){
            displayPrevSection()
        }

        function selectArg(){
            selected['argomento'] = $('#argomentoSelect').val();
        }

        function selectReservationModal(fascia, num, giorno, settimana){
            casella = $('#row'+num+'-'+giorno+'-'+settimana)
            casella.toggleClass("table-light").toggleClass("table-info")
            
            if(selectedCaselle.some(e => e.casella == num+"-"+giorno+"-"+settimana)){
                index = selectedCaselle.findIndex(item => item.casella == num+"-"+giorno+"-"+settimana)
                selected['orario'].splice(index, 1)
                selected['giorno'].splice(index, 1)
                selectedCaselle = selectedCaselle.filter(function( obj ) {
                    return obj.casella !== num+"-"+giorno+"-"+settimana
                });
            }
            else{
                selectedCaselle.push({ 'id': idCasella, 'casella': num+"-"+giorno+"-"+settimana})
                selected['orario'].push(fascia)
                selected['giorno'].push(giorno)
                idCasella++
            }

            if(selectedCaselle.length > 0){
                selected["calendario"] = "ok"
                $('#numIncontri').text(selectedCaselle.length)
                if(selectedCaselle.length == 1){
                    $('#prezzo').text("11.99€/h")
                    $('#prezzo').val(11.99)
                    $('#bestPrice').hide()
                }
                if(selectedCaselle.length == 2){
                    $('#prezzo').text("9.99€/h")
                    $('#prezzo').val(9.99)
                    $('#bestPrice').hide()
                }
                if(selectedCaselle.length >= 4){
                    $('#prezzo').text("7.99€/h")
                    $('#prwzzo').val(7.99)
                    $('#bestPrice').show()
                }
                $('#totIncontri').show()
                $('#totPrezzo').show()
            }
            else{
                selected["calendario"] = ""
                $('#totIncontri').hide()
                $('#totPrezzo').hide()
            }

        }

    </script>
    </html>