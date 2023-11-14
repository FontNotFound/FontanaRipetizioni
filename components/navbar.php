<div id="navbarRow" class="row text-start justify-content-start w-100 bg my-0 py-0 mx-0 px-0 sticky-top">
    <div class="col-4 d-lg-block d-none">
        <h1 class="text-white mt-1">Portale Ripetizioni</h1>
    </div>
    <div class="col-4 d-lg-none d-block">
        <h6 class="text-white mt-1">Portale Ripetizioni</h6>
    </div>
    <div class="col-8 align-items-center d-block">
        <!-- Mobile Menu -->
        <div class="dropdown d-lg-none d-flerx">
            <button class="btn navbarbtn dropdown-toggle w-100 mt-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Esplora
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class=" dropdown-item" href="index.php">Home</a>
                <a class=" dropdown-item" href="preview.php">Info Lezioni</a>
                <a class=" dropdown-item" href="booking.php">Prenotazioni</a>
                <a class=" dropdown-item" href="gallery.php">Raccolta Video</a>
                <a class=" dropdown-item" href="documents.php">Esercitazioni</a>
                <a class=" dropdown-item" href="contatti.php">Contatti</a>
                <a class=" dropdown-item" href="login.php">Area Riservata</a>
            </div>
        </div>
        <!-- Desktop Menu -->
        <div class="row w-100 mx-0 px-0 d-lg-flex d-none">
            <div class="auto">
                <a class="navbarbtn btn" href="index.php">Home</a>
            </div>
            <div class="auto">
                <a class="navbarbtn btn" href="preview.php">Info Lezioni</a>
            </div>
            <div class="auto">
                <a class="navbarbtn btn" href="booking.php">Prenotazioni</a>
            </div>
            <div class="auto">
                <a class="navbarbtn btn" href="gallery.php">Raccolta Video</a>
            </div>
            <div class="auto">
                <a class="navbarbtn btn" href="documents.php">Esercitazioni</a>
            </div>
            <div class="auto">
                <a class="navbarbtn btn" href="contatti.php">Contatti</a>
            </div>
            <div class="auto">
                <?php 
                    if(isset($_SESSION['user'])){
                        echo('<a class="navbarbtn btn" href="logout.php"><img src="img/svg/logout.svg" class="img-fluid filter-white" title="Esci"></a>');
                        if($_SESSION['user'] == 'Leonardo')
                            echo('<a class="navbarbtn btn" href="pannelloControllo.php"><img src="img/svg/lock.svg" class="img-fluid filter-white" title="Admin"></a>');  
                    }
                    else
                        echo('<a class="navbarbtn btn" href="login.php"><img src="img/svg/login.svg" class="img-fluid filter-white" title="Accedi"></a>');
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row w-100 mx-0 px-0 justify-content-end text-center">
    <?php 
    if(isset($_SESSION['response'])){
        if($_SESSION['response'] == 'Success'){
            echo('
            <div class="col-12 alert alert-success w-100 mb-1 mt-0 px-auto py-1"> 
                <span class="text-success" style="font-weight: normal">'.$_SESSION['response_message'].'</span> 
            </div>
            ');
        }
        if($_SESSION['response'] == 'Error'){
            echo('
            <div class="col-12 alert alert-danger w-100 mb-1 mt-0 px-auto py-1"> 
                <span class="text-danger" style="font-weight: normal">'.$_SESSION['response_message'].'</span> 
            </div>
            ');
        }
        unset($_SESSION['response']);
        unset($_SESSION['response_message']);
    }
    
    ?>
</div>
