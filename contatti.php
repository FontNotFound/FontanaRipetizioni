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
        
        <!-- Contacts -->
        <div class="card col-lg-8 col-12 alert alert-success py-0 mx-auto mt-3">
            <div class="card-body col-lg-8 col-12 mx-auto py-0 mb-3 justify-content-center text-center">
                    <section class="mb-4">
                    <h2 class="h1-responsive font-weight-bold text-center my-4">Contattami</h2>
                    <p class="text-center text-success w-responsive mx-auto mb-5" style="font-weight: bold">Per domande riguardante il sistema di prenotazione, il pagamento, le lezioni o anche solo per curiosità puoi sempre contattarmi tramite modulo o telefono (anche Whatsapp!)</p>
                    <div class="row">
                        <div class="col-md-7 col-12 mb-md-0 mb-5">
                            <form id="contact-form" name="contact-form" action="admin/mail.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="name" class="">Nome</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="email" class="">Email</label>
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <label for="message">Inserisci il messaggio</label>
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row w-100 mt-2 justify-content-center text-center">
                                <div class="form-check">
                                    <input id="privacyCheck" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="text-dark form-check-label" for="flexCheckChecked">
                                        dichiaro di aver letto e accettato <a class="text-success" style="font-weight: bolder" href="docs/Informativa.pdf" download>l'informativa relativa all'utilizzo dei dati personali </a>
                                    </label>
                                </div>
                            </div>
                            <div class="text-center text-md-left">
                                <a class="btn btn-success text-white w-100 mt-1" onclick="submit()">Invia</a>
                            </div>
                            <div class="status"></div>
                        </div>
                        <div class="col-md-5 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><img src="img/svg/phone.svg" class="img-fluid">
                                    <p class="text-dark" style="font-weight: bold">+39 349 337 3696</p>
                                </li>

                                <li><img src="img/svg/mail.svg" class="img-fluid">
                                    <p class="text-dark" style="font-weight: bold">fontanalonardomail@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>

                    </section>
                    <!--Section: Contact v.2-->
            </div>
        </div>
        
    </body>
    <script type="text/JavaScript">
        //Navbar Color set
        $('#navbarRow').addClass('bg-success')
        $('.navbarbtn').each(function() {
            $(this).addClass("btn-success")
        })

        function submit(){
            if($('#privacyCheck').is(':checked')) 
                document.getElementById('contact-form').submit()
            else
                alert('Devi prima accettare l\'informativa sull\'utilizzo dei dati personali');
        }
    </script>
    </html>