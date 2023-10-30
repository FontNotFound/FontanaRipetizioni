<?php

include("../components/head.php");

$target_dir = "../docs/";
$target_file = $target_dir . basename($_FILES["document"]["name"]);
$abs_path = "docs/". basename($_FILES["document"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
   
    $username = $_POST['userDoc'];
    $email = $_POST['emailDoc'];
    $materia = $_POST['materiaDoc'];
    $argomento = $_POST['argomentoDoc'];
    $nome = $_POST['nameDoc'];

    if($result = $conn->query("INSERT INTO documento VALUES ('".$nome."','".$materia."','".$argomento."','".$abs_path."','".date('Y-m-d H:i', strtotime("now"))."')")){
        if($result = $conn->query("INSERT INTO documento_utenti VALUES ('".$nome."','".$username."','".$email."')")){  
            $_SESSION['response'] = 'Success';
            $_SESSION['response_message'] =  "Il file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " e' stato caricato.";
        }
    }

} else {
    $_SESSION['response']= 'Error';
    $_SESSION['responsee_message'] = "Errore durante il caricamento del file.";
}

header("location: ../pannelloControllo.php");

?>