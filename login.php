
<!doctype html>
<html lang="it">
    <head>
        <?php include("components/head.php");?>
        <!--<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">-->
        <title>Accedi</title>
    </head>
    <body>
        <?php include("components/navbar.php"); ?>
        <div class="content">
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                <img src="img/svg/tiziaPc.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                    <div class="mb-4">
                    <h3 class="text-primary" style="font-weight: bolder">Accesso Area Riservata</h3>
                    <p class="mb-4">Accesso riservato ai ragazz* che hanno prenotato una lezione. per accedere utilizzare l'account fornito durante la lezione</p>
                    </div>
                    <form action="loginChecker.php" method="post">
                    <div class="form-group first">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="user">

                    </div>
                    <div class="form-group last mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        
                    </div>
                    
                    <div class="d-flex mb-5 align-items-center">
                        <span class="ml-auto"><a href="#" class="forgot-pass">Password Dimenticata</a></span> 
                    </div>

                    <input type="submit" value="Accedi" class="btn btn-block btn-primary">

                    </form>
                    </div>
                </div>
                
                </div>
                
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

        //Login control
        if(!logged){
            $('#loginModal').modal('show')
            $('#loginModal').fadeIn("slow")
        }
    </script> 
</html>
